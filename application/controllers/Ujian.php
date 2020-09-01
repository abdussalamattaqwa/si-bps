<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Ujian SAINS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['daftar_kelas'] = $this->db->get('daftar_kelas')->result_array();

        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 1);
        $this->db->order_by('fakultas', 'ASC');
        $data['fakultas'] = $this->db->get()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ujian/index', $data);
        $this->load->view('templates/footer');
    }

    public function fakultas($f)
    {

        $data['title'] = 'Pilih Jurusan';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tblKembali'] = base_url('ujian');

        $fakultas = urldecode($f);

        $this->db->from('daftar_kelas');
        $this->db->where([
            'tingkat' => 2,
            'fakultas' => $fakultas
        ]);
        $this->db->or_where([
            'tingkat' => 3,
            'fakultas' => $fakultas
        ]);
        $this->db->order_by('jurusan');
        $data['jurusan'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ujian/fakultas', $data);
        $this->load->view('templates/footer');
    }

    public function kelas($id)
    {
        $data['title'] = 'Ujian SAINS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['prodi'] = $this->db->get_where('daftar_kelas', ['id' => $id])->row_array();

        $this->db->from('daftar_kelas');
        $this->db->where([
            'tingkat' => 4,
            'prodi' => $data['prodi']['prodi']
        ]);
        $this->db->order_by('kelas', 'ASC');
        $data['kelas'] = $this->db->get()->result_array();


        if (isset($_GET['tahun'])) {
            $pilih_angkatan = $_GET['tahun'];
        } else {
            $pilih_angkatan = (date('m') <= 8) ? date('Y') - 1 : date('Y');
        }


        $this->db->select('angkatan');
        $this->db->from('mahasiswa');
        $this->db->group_by('angkatan');
        $this->db->order_by('angkatan', 'desc');
        $data['tahun'] = $this->db->get()->result_array();

        $now = false;
        $lastyear = false;
        foreach ($data['tahun'] as $thn) {
            if ($thn['angkatan'] == date('Y')) {
                $now = true;
            }
            if ($thn['angkatan'] == (date('Y') - 1)) {
                $lastyear = true;
            }
        }

        if (!$lastyear) {
            $data['tahun'][]['angkatan'] = date('Y') - 1;
        }
        if (!$now) {
            $data['tahun'][]['angkatan'] = (date('Y'));
        }
        rsort($data['tahun']);

        $i = 0;
        foreach ($data['tahun'] as $t) {
            if ($t['angkatan'] == $pilih_angkatan) {
                $data['tahun'][$i]['selected'] = 'selected';
            } else {
                $data['tahun'][$i]['selected'] = '';
            }
            $i++;
        }

        $i = 0;
        foreach ($data['kelas'] as $kelas) :

            $idKelas = $kelas['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', [
                'id_kelas' => $idKelas,
                'angkatan' => $pilih_angkatan
            ])->num_rows();
            $data['kelas'][$i]['anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

        $data['angkatan'] = $pilih_angkatan;
        $data['tblKembali'] = base_url('ujian/fakultas/' . $data['prodi']['fakultas']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ujian/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_data_kelas($id)
    {
        $data['angkatan'] = $_GET['tahun'];


        $data['prodi'] = $this->db->get_where('daftar_kelas', ['id' => $id])->row_array();

        $this->db->from('daftar_kelas');
        $this->db->where([
            'tingkat' => 4,
            'prodi' => $data['prodi']['prodi']
        ]);
        $this->db->order_by('kelas', 'ASC');
        $data['kelas'] = $this->db->get()->result_array();

        $i = 0;
        foreach ($data['kelas'] as $kelas) :

            $idKelas = $kelas['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', [
                'id_kelas' => $idKelas,
                'angkatan' => $data['angkatan']
            ])->num_rows();
            $data['kelas'][$i]['anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;
        $this->load->view('ujian/ajax_data_kelas', $data);
    }




    public function mahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|integer|max_length[12]', [
            'integer' => 'NIM harus diisi dengan angka'
        ]);
        // $this->form_validation->set_rules('nim', 'NIM', 'required|trim|integer|is_unique[mahasiswa.nim]|max_length[12]', [
        //     'integer' => 'NIM harus diisi dengan angka',
        //     'is_unique' => 'NIM telah terdaftar kedalam sistem'
        // ]);
        $this->form_validation->set_rules('telp', 'Telp', 'trim|integer|max_length[15]', [
            'integer' => 'No. Telpon harus diisi dengan angka'
        ]);
        if (isset($_POST['nama'])) {
            if (!ctype_alpha(str_replace(' ', '', $this->input->post('nama')))) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama harus menggunakan huruf alphabet saja</div>');
            }
        }
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $idkelas = $this->uri->segment(3);
        if (!isset($idkelas)) {
            redirect('ujian');
        }
        if ($this->form_validation->run() == false) {

            $pilih_angkatan = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');

            $data['angkatan'] = $pilih_angkatan;
            $data['title'] = 'Ujian SAINS';

            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();

            $data['prodi'] = $this->db->get_where('daftar_kelas', [
                'prodi' => $data['kelas']['prodi'],
                'tingkat' => 3
            ])->row_array();

            $query = "SELECT `mahasiswa`.*, `daftar_kelas`.`kelas`, `nilai_sains`.`pre_test`, `nilai_sains`.`final_test` FROM mahasiswa JOIN `daftar_kelas` ON `mahasiswa`.`id_kelas` = `daftar_kelas`.`id` LEFT JOIN `nilai_sains` ON `mahasiswa`.`id` = `nilai_sains`.`id_mahasiswa`  WHERE `mahasiswa`.`id_kelas` = $idkelas AND  `mahasiswa`.`angkatan` = $pilih_angkatan AND `mahasiswa`.`jk` = '" . $data['user']['jk'] . "' ORDER BY `mahasiswa`.`id`";

            $data['pilihan_angkatan'] = $pilih_angkatan;

            $data['mahasiswa'] = $this->db->query($query)->result_array();

            $data['tblKembali'] = base_url('ujian/kelas/' . $data['prodi']['id']);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ujian/daftar_mahasiswa', $data);
            $this->load->view('templates/footer_tables');
        } else {


            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'telp' => $this->input->post('telp'),
                'jk' => $this->input->post('jk'),
                'angkatan' => $this->input->post('angkatan'),
                'id_kelas' => $idkelas
            ];

            $this->db->insert('mahasiswa', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa berhasil ditambahkan</div>');
            redirect('ujian/mahasiswa/' . $idkelas . '?tahun=' . $this->input->post('angkatan'));
        }
    }


    public function test($test, $proses, $idkelas, $id_mahasiswa)
    {
        $data['title'] = 'Ujian SAINS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id_mahasiswa])->row_array();
        $data['test'] = $test;
        $data['proses'] = $proses;

        $data['tblKembali'] = base_url('ujian/mahasiswa/' . $data['kelas']['id'] . '?tahun=' . $data['mahasiswa']['angkatan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ujian/test', $data);
        $this->load->view('templates/footer');
    }

    public function input_test($test, $proses, $id_kelas, $angkatan, $id_mahasiswa)
    {
        $tajwid = $this->input->post('tajwid');
        $kelancaran = $this->input->post('kelancaran');
        $makhraj = $this->input->post('makhraj');

        // var_dump($makhraj);
        if ($makhraj == null) {
            $makhraj = 0;
        } else {
            $makhraj = count($makhraj);
        }
        $tajwid *= 0.5;
        $kelancaran *= 0.15;
        $makhraj = (28 - $makhraj) * 100 / 28 * 0.35;
        $total = $tajwid + $kelancaran + $makhraj;

        if ($proses == 'new') {
            $this->db->insert('nilai_sains', [
                'id_mahasiswa' => $id_mahasiswa,
                $test => $total
            ]);
        } else {
            $this->db->set([$test => $total]);
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->update('nilai_sains');
        }

        redirect('ujian/mahasiswa/' . $id_kelas . '?tahun=' . $angkatan);
    }

    public function editMahasiswa($idKelas, $idMahasiswa)
    {
        $error = false;
        // $errornimunique = '';
        $errornim = '';
        $errorname = '';
        $errortelp = '';

        // $nimbefore = $this->input->post('nimbefore');
        // $nim = $this->input->post('nim');

        // if ($nim != $nimbefore) {
        //     $ceknim = $this->db->get_where('mahasiswa', [
        //         'nim' => $nim
        //     ])->num_rows();
        //     if ($ceknim != 0) {
        //         $error = true;
        //         $errornimunique = '<div class="alert alert-danger" role="alert">NIM telah terdaftar</div>';
        //     }
        // }

        if (!ctype_digit($this->input->post('nim'))) {
            $error = true;
            $errornim = '<div class="alert alert-danger" role="alert">NIM harus diisi dengan angka</div>';
        }

        if (!ctype_digit($this->input->post('telp'))) {
            $error = true;
            $errortelp = '<div class="alert alert-danger" role="alert">Telp harus diisi dengan angka</div>';
        }

        if (!ctype_alpha(str_replace(' ', '',  $this->input->post('nama')))) {
            $error = true;
            $errorname = '<div class="alert alert-danger" role="alert">Nama harus menggunakan huruf saja</div>';
        }

        if ($error) {
            $this->session->set_flashdata('message', $errornim .
                // $errornimunique .
                $errorname .
                $errortelp);
            redirect('ujian/mahasiswa/' . $idKelas . '?tahun=' . $_GET['tahun']);
        }


        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'angkatan' => $this->input->post('angkatan')
        ];

        $this->db->set($data);
        $this->db->where('id', $idMahasiswa);
        $this->db->update('mahasiswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil diubah</div>');
        redirect('ujian/mahasiswa/' . $idKelas . '?tahun=' . $_GET['tahun']);
    }

    public function hapusMahasiswa($idKelas, $idMahasiswa, $tahun)
    {
        $this->db->where('id', $idMahasiswa);
        $this->db->delete('mahasiswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil dihapus</div>');
        redirect('ujian/mahasiswa/' . $idKelas . '?tahun=' . $tahun);
    }
}
