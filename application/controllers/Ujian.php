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
        $this->load->view('Ujian/index', $data);
        $this->load->view('templates/footer');
    }

    public function fakultas($f)
    {

        $data['title'] = 'Ujian SAINS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

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
        $this->load->view('Ujian/fakultas', $data);
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




        $pilih_angkatan = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');


        $this->db->select('angkatan');
        $this->db->from('mahasiswa');
        $this->db->group_by('angkatan');
        $this->db->order_by('angkatan', 'desc');
        $data['tahun'] = $this->db->get()->result_array();

        $mhs = $this->db->get_where('mahasiswa', ['angkatan' => date('Y')])->num_rows();
        if ($mhs == 0) {
            $data['tahun'][]['angkatan'] = date('Y');
            rsort($data['tahun']);
        }

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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Ujian/kelas', $data);
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




    public function mahasiswa($idkelas)
    {
        $pilih_angkatan = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');

        $data['angkatan'] = $pilih_angkatan;
        $data['title'] = 'Ujian SAINS';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();


        $query = "SELECT `mahasiswa`.*, `daftar_kelas`.`kelas`, `nilai_sains`.`pre_test`, `nilai_sains`.`final_test` FROM mahasiswa 
        JOIN `daftar_kelas` ON `mahasiswa`.`id_kelas` = `daftar_kelas`.`id` 
        LEFT JOIN `nilai_sains` ON `mahasiswa`.`id` = `nilai_sains`.`id_mahasiswa`  WHERE `mahasiswa`.`id_kelas` = $idkelas AND 
        `mahasiswa`.`angkatan` = $pilih_angkatan AND
        `mahasiswa`.`jk` = '" . $data['user']['jk'] . "' ORDER BY `mahasiswa`.`id`";


        $data['mahasiswa'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Ujian/daftar_mahasiswa', $data);
        $this->load->view('templates/footer_tables');
    }


    public function tambahMahasiswa($idKelas)
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'jk' => $this->input->post('jk'),
            'angkatan' => $this->input->post('angkatan'),
            'id_kelas' => $idKelas
        ];

        $this->db->insert('mahasiswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa berhasil ditambahkan</div>');
        redirect('ujian/mahasiswa/' . $idKelas);
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Ujian/test', $data);
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
        redirect('ujian/mahasiswa/' . $idKelas);
    }

    public function hapusMahasiswa($idKelas, $idMahasiswa, $tahun)
    {
        $this->db->where('id', $idMahasiswa);
        $this->db->delete('mahasiswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil dihapus</div>');
        redirect('ujian/mahasiswa/' . $idKelas . '?tahun=' . $tahun);
    }
}