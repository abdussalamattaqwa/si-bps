<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = search_user_role($user['role_id']);

        if ($data['status'] == 'dosen') {
            $this->db->from('user');
            $this->db->join('data_dosen', 'data_dosen.id_user = user.id', 'left');
            $this->db->where('user.id', $user['id']);
            $data['user'] = $this->db->get()->row_array();
        } else if ($data['status'] == 'tutor') {
            $this->db->from('user');
            $this->db->join('data_tutor', 'data_tutor.id_user = user.id', 'left');
            $this->db->where('user.id', $user['id']);
            $data['user'] = $this->db->get()->row_array();
        } else {
            $data['user'] = $user;
        }
        // echo 'Selamat datang ' . $data['user']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'trim|numeric|max_length[12]');
        $this->form_validation->set_rules('telp', 'Telephone', 'trim|numeric|max_length[12]');
        $this->form_validation->set_rules('nim', 'NIP', 'trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim'
        );

        $err = false;
        $errnama = '';
        if (isset($_POST['name'])) {
            if (!ctype_alpha(str_replace(' ', '', $_POST['name']))) {
                $err = true;

                $errnama = '<div class="alert alert-warning" role="alert">Nama harus menggunakan huruf, dan tidak boleh mengandung angka, dimbol, dll</div';
                $this->session->set_flashdata('message', $errnama);
            }
        }

        if ($this->form_validation->run()  == false) {

            $data['id_user'] = $user['id'];
            $data['status'] = search_user_role($user['role_id']);
            $data['input'] = false;


            if ($data['status'] == 'dosen') {
                $this->db->from('user');
                $this->db->join('data_dosen', 'data_dosen.id_user = user.id', 'left');
                $this->db->where('user.id', $user['id']);
                $data['user'] = $this->db->get()->row_array();
                if ($data['user']['id_user'] == null) $data['input'] = true;
            } else if ($data['status'] == 'tutor') {
                $this->db->from('user');
                $this->db->join('data_tutor', 'data_tutor.id_user = user.id', 'left');
                $this->db->where('user.id', $user['id']);
                $data['user'] = $this->db->get()->row_array();
                if ($data['user']['id_user'] == null) $data['input'] = true;
            } else {
                $data['user'] = $user;
            }


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            if ($err) {
                $this->session->set_flashdata('message', $errnama);
                redirect('user/edit');
            }
            $iduser = $this->input->post('id_user');
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $username = htmlspecialchars($this->input->post('username'));
            if ($user['username'] != $username) {
                $registrasiUsername = $this->db->get_where('user', ['username' => $username])->num_rows();
                if ($registrasiUsername >= 1) {
                    $this->session->set_flashdata('message', $errnama . '<div class="alert alert-warning" role="alert">Username Telah digunakan, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                    redirect('user/edit');
                }
            }

            $email = htmlspecialchars($this->input->post('email'));
            if ($user['email'] != $email) {
                $registrasiUsername = $this->db->get_where('user', ['email' => $email])->num_rows();
                if ($registrasiUsername >= 1) {
                    $this->session->set_flashdata('message', $errnama . '<div class="alert alert-warning" role="alert">Email telah digunakan, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                    redirect('user/edit');
                }
            }

            $dataUser = [
                'name' => htmlspecialchars($this->input->post('name')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username'))
            ];
            $this->db->set($dataUser);
            $this->db->where('id', $iduser);
            $this->db->update('user');
            $datasession = [
                'email' => htmlspecialchars($this->input->post('email')),
                'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($datasession);

            if ($this->input->post('nip') || $this->input->post('nim')) {

                $data = [
                    'nama' => htmlspecialchars($this->input->post('name')),
                    'telp' => htmlspecialchars($this->input->post('telp')),
                    'alamat' => htmlspecialchars($this->input->post('alamat'))
                ];
                $input = $this->input->post('input');
                if ($input == 1) {
                    $data['id_user'] = $iduser;
                    if ($this->input->post('nip')) {
                        $data['nip'] = $this->input->post('nip');
                        $this->db->set($data);
                        $this->db->insert('data_dosen', $data);
                    } else if ($this->input->post('nim')) {
                        $data['nim'] = $this->input->post('nim');
                        $this->db->set($data);
                        $this->db->insert('data_tutor', $data);
                    }
                } else {
                    if ($this->input->post('nip')) {
                        $data['nip'] = $this->input->post('nip');
                        $this->db->set($data);
                        $this->db->where('id_user', $iduser);
                        $this->db->update('data_dosen');
                    } else if ($this->input->post('nim')) {
                        $data['nim'] = $this->input->post('nim');
                        $this->db->set($data);
                        $this->db->where('id_user', $iduser);
                        $this->db->update('data_tutor');
                    }
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update</div>');

            redirect('user');
        }
    }


    public function changepassword()
    {
        $data['title'] = 'Change Password';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot be the same as current password </div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
