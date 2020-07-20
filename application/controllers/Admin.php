<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->Admin_model->get_user();
        $data['jumlah_user'] = $this->Admin_model->jumlah_user();
        $data['jumlah_dosen'] = $this->Admin_model->jumlah_user('dosen');
        $data['jumlah_tutor'] = $this->Admin_model->jumlah_user('tutor');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';

        $data['user'] = $this->Admin_model->get_user();

        $data['role'] = $this->Admin_model->get_role();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function tambahRole()
    {
        $data = [
            'role' => htmlspecialchars($this->input->post('role'))
        ];

        $this->Admin_model->insert_role($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan</div>');
        redirect('admin/role');
    }

    public function editRole()
    {
        $role_id = $this->input->post('roleId');
        $nama = htmlspecialchars($this->input->post('role'));

        $data = [
            'role' => $nama
        ];

        $this->Admin_model->update_role($data, $role_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nama Role Telah diubah</div>');
        redirect('admin/role');
    }

    public function hapusRole($id)
    {
        $this->Admin_model->delete_role($id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role berhasil dihapus</div>');
        redirect('admin/role');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';

        $data['user'] = $this->Admin_model->get_user();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['menu'] = $this->Admin_model->get_user_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $this->Admin_model->change_access_menu($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function daftaruser()
    {
        $data['title'] = 'Daftar User';

        $data['user'] = $this->Admin_model->get_user();

        $data['dataUser'] = $this->Admin_model->get_data_user();

        $data['role'] = $this->Admin_model->get_user_role();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/daftaruser', $data);
        $this->load->view('templates/footer_tables');
    }


    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = "Daftar User";
            $data['user'] = $this->Admin_model->get_user();

            $data['role'] = $this->Admin_model->get_user_role();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/registration', $data);
            $this->load->view('templates/footer');
        } else {
            $active = $this->input->post('is_active');
            $role_id = htmlspecialchars($this->input->post('role_id', true));

            $gambar = 'default.jpg';
            if ($this->input->post('jk') == 'P') $gambar = 'defaultp.jpg';
            if ($active == null) $active = 0;
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username')),
                'jk' => $this->input->post('jk'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => $gambar,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $role_id,
                'is_active' => $active,
                'date_created' => time()
            ];

            // $this->db->insert('user', $data);
            $this->Admin_model->insert_user($data, $role_id);


            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat USER berhasil ditambahkan.</div>');
            redirect('admin/daftaruser');
        }
    }



    public function edituser()
    {

        $idUser = $this->input->post('idUser');
        $user = $this->db->get_where('user', ['id' => $idUser])->row_array();
        $email = htmlspecialchars($this->input->post('email', true));
        $username = htmlspecialchars($this->input->post('username'));

        if ($email == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email tidak boleh kosong</div>');
            redirect('admin/daftaruser');
        }

        if ($username == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username tidak boleh kosong</div>');
            redirect('admin/daftaruser');
        }
        if ($user['email'] != $email) {
            $registrasiEmail = $this->db->get_where('user', ['email' => $email])->num_rows();
            if ($registrasiEmail >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email Telah digunakan, Data <b>' . $user["name"] . ' gagal diubah.</div>');
                redirect('admin/daftaruser');
            }
        }

        if ($user['username'] != $username) {
            $registrasiUsername = $this->db->get_where('user', ['username' => $username])->num_rows();
            if ($registrasiUsername >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username Telah digunakan, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                redirect('admin/daftaruser');
            }
        }

        $active = $this->input->post('is_active');
        if ($active == null) $active = 0;
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'jk' => $this->input->post('jk'),
            'username' => $username,
            'email' => htmlspecialchars($email),
            'role_id' => htmlspecialchars($this->input->post('role_id', true)),
            'is_active' => $active
        ];

        $this->db->where('id', $idUser);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah.</div>');
        redirect('admin/daftaruser');
    }


    public function hapususer()
    {
        $idUser = $this->input->post('idUser');
        $image = $this->input->post('image');
        $role_id = $this->input->post('role_id');

        if (search_user_role($role_id) == 'tutor') {
            $this->db->where('id_user', $idUser);
            $this->db->delete('data_tutor');
        } else if (search_user_role($role_id) == 'dosen') {
            $this->db->where('id_user', $idUser);
            $this->db->delete('data_dosen');
        }

        $this->db->where('id', $idUser);
        $this->db->delete('user');
        if ($image != 'default.jpg' && $image != 'defaultp.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $image);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.</div>');
        redirect('admin/daftaruser');
    }
}
