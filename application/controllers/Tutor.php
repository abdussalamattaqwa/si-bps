<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Tutor';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = search_user_role($data['user']['role_id']);

        $this->db->select("`data_tutor`.*,`user`.`name`,`user`.`jk`, `user_role`.`role`, `user`.`id` as `iduser`, `user`.`is_active`, `daftar_kelas`.`prodi`, `daftar_kelas`.`fakultas`");

        $this->db->from('user');
        $this->db->join('data_tutor', 'data_tutor.id_user = user.id', 'left');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi', 'left');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where_in('role_id', [3, 5, 7, 8]);

        $data['jk'] = $data['user']['jk'];


        if (isset($_GET['jk'])) {
            if ($data['status'] == 'dosen') {
                $data['jk'] = $_GET['jk'];
                $this->db->where('user.jk', $data['jk']);
            }
        } else
            $this->db->where('user.jk', $data['user']['jk']);

        $this->db->order_by('fakultas');
        $this->db->order_by('role_id');
        $data['tutor'] = $this->db->get()->result_array();


        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 3);
        $this->db->order_by('fakultas');
        $data['prodi'] = $this->db->get()->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/daftartutor', $data);
        $this->load->view('templates/footer_tables');
    }


    public function tambah_tutor()
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

        if ($this->input->post('nim') != null) {
            $this->form_validation->set_rules('nim', 'NIM', 'trim|is_unique[data_tutor.nim]', [
                'is_unique' => 'NIM telah terdaftar'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Tutor';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


            $data['status'] = 'tutor';


            if (is_korfak($data['user']['role_id'])) {
                $this->db->where('id = 7 OR id = 8');
            } else {
                $this->db->where('id = 3 OR id = 5 OR id = 7 OR id = 8');
            }
            $data['role'] = $this->db->get('user_role')->result_array();


            if (is_korfak($data['user']['role_id'])) {

                $idprodi = $this->db->get_where('data_tutor', ['id_user' => $data['user']['id']])->row_array()['id_prodi'];
                $this->db->select('fakultas');
                $this->db->from('daftar_kelas');
                $this->db->where('id', $idprodi);
                $fakultas_korfak = $this->db->get()->row_array()['fakultas'];


                $this->db->where('fakultas', $fakultas_korfak);
            }

            $this->db->from('daftar_kelas');
            $this->db->where('tingkat', 3);
            $this->db->order_by('fakultas');
            $this->db->order_by('jurusan');
            $data['prodi'] = $this->db->get()->result_array();

            // rsort($data['role_id']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/registrasi', $data);
            $this->load->view('templates/footer');
        } else {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $roleinput = htmlspecialchars($this->input->post('role_id', true));
            if ($data['user']['role_id'] > $roleinput) {

                $this->load->view('auth/blocked');
                return;
            }

            die;
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


            $dosendb = $this->db->get_where('user', ['email' => htmlspecialchars($email)])->row_array();

            $data = [
                'id_user'   => $dosendb['id'],
                'nim'       => htmlspecialchars($this->input->post('nim')),
                'nama'       => htmlspecialchars($this->input->post('name')),
                'id_prodi'     => $this->input->post('prodi'),
                'telp'       => htmlspecialchars($this->input->post('telp')),
                'alamat'       => htmlspecialchars($this->input->post('alamat'))
            ];

            $this->db->insert('data_tutor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tutor berhasil ditambahkan.</div>');
            redirect('Tutor');
        }
    }





    public function update_tutor()
    {
        $idUser = $this->input->post('idUser');
        $idTutor = $this->input->post('idTutor');

        $user = $this->db->get_where('user', ['id' => $idUser])->row_array();
        $email = $this->input->post('email', true);
        $username = $this->input->post('username');

        if ($user['email'] != $email) {
            $registrasiEmail = $this->db->get_where('user', ['email' => $email])->num_rows();
            if ($registrasiEmail >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Email Telah digunakan Data <b>' . $user["name"] . ' gagal diubah.</div>');
                redirect('Tutor/edit_tutor/' . $idUser);
            }
        }

        if ($user['username'] != $username) {
            $registrasiUsername = $this->db->get_where('user', ['username' => $username])->num_rows();
            if ($registrasiUsername >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username Telah digunakan, Data <b>' . $user["name"] . '</b> gagal diubah.</div>');
                redirect('Tutor/edit_tutor/' . $idUser);
            }
        }

        $active = $this->input->post('is_active');
        if ($active == null) $active = 0;


        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
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
                redirect('Tutor/edit_tutor/' . $idUser);
            } else {
                if (strlen($password1) < 3) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password harus minimal 3 karakter</div>');
                    redirect('Tutor/edit_tutor/' . $idUser);
                }

                $data['password'] = password_hash($password1, PASSWORD_DEFAULT);
            }
        }

        $this->db->where('id', $idUser);
        $this->db->update('user', $data);


        $data = [
            'nim' => htmlspecialchars($this->input->post('nim')),
            'nama' => htmlspecialchars($this->input->post('name')),
            'telp'       => htmlspecialchars($this->input->post('telp')),
            'id_prodi'       => $this->input->post('prodi'),
            'alamat'  => htmlspecialchars($this->input->post('alamat')),
        ];

        $this->db->set($data);
        $this->db->where('id_user', $idUser);
        $this->db->update('data_tutor');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tutor berhasil diubah</div>');
        redirect('Tutor');
    }



    public function edit_tutor($idUser)
    {
        $data['title'] = 'Daftar Tutor';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = 'tutor';

        $this->db->from('user');
        $this->db->join('data_tutor', 'user.id = data_tutor.id_user', 'left');
        $this->db->where('user.id = ' . $idUser);
        $data['user_edit'] = $this->db->get()->row_array();


        if (is_korfak($data['user']['role_id'])) {
            $this->db->where('id = 7 OR id = 8');
        } else {
            $this->db->where('id = 3 OR id = 5 OR id = 7 OR id = 8');
        }
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 3);
        $this->db->order_by('fakultas');
        $data['prodi'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/registrasi_edit', $data);
        $this->load->view('templates/footer');
    }

    public function detail_tutor($iduser)
    {
        $data['status'] = 'tutor';
        $data['allow'] = true;

        $userl = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('user');
        $this->db->join('data_tutor', 'data_tutor.id_user = user.id', 'left');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi', 'left');
        $this->db->where('id_user', $iduser);
        $data['user'] = $this->db->get()->row_array();
        if ($userl['jk'] == 'L' && $data['user']['jk'] == 'P') {
            $data['allow'] = false;
        }

        $this->load->view('administrasi/detail', $data);
    }
    public function hapus($id_user, $id_tutor)
    {
        $gambar = $this->db->get_where('user', ['id' => $id_user])->row_array()['image'];
        if ($gambar != 'default.jpg' && $gambar != 'defaultp.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $gambar);
        }

        $this->db->where('id', $id_user);
        $this->db->delete('user');

        $this->db->where('id', $id_tutor);
        $this->db->delete('data_tutor');

        $this->db->where('id_tutor', $id_tutor);
        $this->db->set('id_tutor', '0');
        $this->db->update('data_halaqah');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tutor berhasil dihapus</div>');
        redirect('tutor');
    }
}
