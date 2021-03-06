<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Dosen';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select("`data_dosen`.*, `user_role`.`role`, `user`.`name`, `user`.`is_active`, `user`.`jk`");
        $this->db->from('user');
        $this->db->join('data_dosen', 'data_dosen.id_user = user.id', 'left');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where('role_id = 2 OR role_id = 4 OR role_id = 6');
        $this->db->order_by('role_id');
        $data['dosen'] = $this->db->get()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/daftardosen', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_dosen()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] > 4) {
            redirect('dosen');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered!'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');

        $this->form_validation->set_rules('nip', 'NIP', 'trim|numeric|is_unique[data_dosen.nip]');
        $this->form_validation->set_rules('telp', 'telephone', 'trim|numeric|max_length[15]');
        $err = false;
        if (isset($_POST['name']) && $_POST['name'] != null) {
            $nama = $_POST['name'];
            if (!ctype_alpha(str_replace([' ', '.', ','], '', $nama))) {
                $err = true;
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama harus mengandung huruf saja</div>');
            }
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Dosen';
            $data['status'] = 'dosen';

            $this->db->where('id = 2 OR id = 4 OR id = 6');
            $data['role'] = $this->db->get('user_role')->result_array();

            $data['tblKembali'] = base_url('dosen');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/registrasi', $data);
            $this->load->view('templates/footer');
        } else {

            if ($err) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama harus diisi dengan huruf saja</div>');
                redirect('Dosen/tambah_dosen');
            }

            if (search_user_role($this->input->post('role_id')) != 'dosen') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hayo, mau apa ayo. form ini khusus untuk menambahkan dosen</div>');
                redirect('Dosen/tambah_dosen');
            }

            $email = $this->input->post('email', true);
            $active = $this->input->post('is_active');
            if ($active == null) $active = 0;

            $gambar = 'default.jpg';
            if ($this->input->post('jk') == 'P') $gambar = 'defaultp.jpg';
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username')),
                'jk' => $this->input->post('jk'),
                'email' => htmlspecialchars($email),
                'image' => $gambar,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => $active,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);


            $dosendb = $this->db->get_where('user', ['email' => $email])->row_array();

            $data = [
                'id_user'   => $dosendb['id'],
                'nip'       => htmlspecialchars($this->input->post('nip')),
                'nama'       => htmlspecialchars($this->input->post('name')),
                'telp'       => htmlspecialchars($this->input->post('telp')),
                'alamat'       => htmlspecialchars($this->input->post('alamat'))
            ];

            $this->db->insert('data_dosen', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dosen berhasil ditambahkan.</div>');
            redirect('Dosen');
        }
    }


    public function edit_dosen($idUser)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha');
        // $this->form_validation->set_rules('nip', 'NIP', 'numeric');
        $this->form_validation->set_rules('telp', 'Telephone', 'numeric');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            if ($data['user']['role_id'] > 5) {
                redirect('dosen');
            }
            $data['title'] = 'Daftar Dosen';

            $data['status'] = 'dosen';

            $this->db->from('user');
            $this->db->join('data_dosen', 'user.id = data_dosen.id_user', 'left');
            $this->db->where('user.id = ' . $idUser);
            $data['user_edit'] = $this->db->get()->row_array();

            $this->db->where('id = 2 OR id = 4 OR id = 6');
            $data['role'] = $this->db->get('user_role')->result_array();
            $data['tblKembali'] = base_url('dosen');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/registrasi_edit', $data);
            $this->load->view('templates/footer');
        } else {

            if (!ctype_alpha(str_replace([' ', '.', ','], '', $this->input->post('name')))) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama harus menggunakan huruf saja</div>');
                redirect('dosen/edit_dosen/' . $idUser);
            }
            if (!ctype_alnum(str_replace(' ', '', $this->input->post('nip')))) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP harus menggunakan angka saja</div>');
                redirect('dosen/edit_dosen/' . $idUser);
            }

            if (search_user_role($this->input->post('role_id')) != 'dosen') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hayo, mau apa ayo. form ini khusus untuk mengedit dosen</div>');
                redirect('dosen/edit_dosen');
            }
            $idUser = $this->input->post('idUser');
            $idDosen = $this->input->post('idDosen');

            $this->db->from('user');
            $this->db->join('data_dosen', 'data_dosen.id_user = user.id', 'left');
            $this->db->where('user.id', $idUser);
            $user = $this->db->get()->row_array();


            $email = htmlspecialchars($this->input->post('email', true));
            $username = htmlspecialchars($this->input->post('username'));
            $nip = htmlspecialchars($this->input->post('nip'));

            if ($user['email'] != $email) {
                $registrasiEmail = $this->db->get_where('user', ['email' => $email])->num_rows();
                if ($registrasiEmail >= 1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email Telah digunakan, Data <b>' . $user["name"] . ' gagal diubah.</div>');
                    redirect('Dosen/edit_dosen/' . $idUser . '/' . $idDosen);
                }
            }

            if ($user['username'] != $username) {
                $registrasiUsername = $this->db->get_where('user', ['username' => $username])->num_rows();
                if ($registrasiUsername >= 1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username Telah digunakan, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                    redirect('Dosen/edit_dosen/' . $idUser . '/' . $idDosen);
                }
            }

            if ($user['nip'] != $nip) {
                $registrasiNip = $this->db->get_where('data_dosen', ['nip' => $nip])->num_rows();
                if ($registrasiNip >= 1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">NIP telah terdaftar, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                    redirect('Dosen/edit_dosen/' . $idUser . '/' . $idDosen);
                }
            }

            $active = $this->input->post('is_active');
            if ($active == null) $active = 0;
            $gambar = 'default.jpg';
            if ($this->input->post('jk') == 'P') $gambar = 'defaultp.jpg';

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'jk' => $this->input->post('jk'),
                'image' => $gambar,
                'username' => $username,
                'email' => htmlspecialchars($email),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => $active
            ];

            if ($this->input->post('password1') != null || $this->input->post('password2') != null) {
                $password1 = $this->input->post('password1');
                $password2 = $this->input->post('password2');


                if ($password1 != $password2) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password harus sama</div>');
                    redirect('Dosen/edit_dosen/' . $idUser . '/' . $idDosen);
                } else {
                    if (strlen($password1) < 6) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password harus minimal 3 karakter</div>');
                        redirect('Dosen/edit_dosen/' . $idUser . '/' . $idDosen);
                    }

                    $data['password'] = password_hash($password1, PASSWORD_DEFAULT);
                }
            }

            $this->db->where('id', $idUser);
            $this->db->update('user', $data);


            $data = [
                'nip' => htmlspecialchars($this->input->post('nip')),
                'nama' => htmlspecialchars($this->input->post('name')),
                'telp'       => htmlspecialchars($this->input->post('telp')),
                'alamat'  => htmlspecialchars($this->input->post('alamat')),
            ];

            $this->db->set($data);
            $this->db->where('id_user', $idUser);
            $this->db->update('data_dosen');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data dosen berhasil diubah</div>');
            redirect('Dosen');
        }
    }


    public function detail_dosen($id_user)
    {
        $data['allow'] = true;
        $this->db->from('user');
        $this->db->join('data_dosen', 'data_dosen.id_user = user.id', 'left');
        $this->db->where('id_user', $id_user);
        $data['user'] = $this->db->get()->row_array();
        $data['status'] = 'dosen';
        $this->load->view('administrasi/detail', $data);
    }

    public function hapusDosen($idUser, $id)
    {

        $gambar = $this->db->get_where('user', ['id' => $idUser])->row_array()['image'];
        if ($gambar != 'default.jpg' && $gambar != 'defaultp.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $gambar);
        }

        $this->db->where('id', $idUser);
        $this->db->delete('user');

        $this->db->where('id', $id);
        $this->db->delete('data_dosen');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data dosen berhasil dihapus</div>');
        redirect('dosen');
    }
}
