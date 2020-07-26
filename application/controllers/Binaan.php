<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Binaan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Halaqah Binaan';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $dataTutor = $this->db->get_where('data_tutor', ['id_user' => $data['user']['id']])->row_array();


        if ($dataTutor == null) {
            $dataTutor['id'] = null;
        }

        $this->db->select('data_halaqah.id, data_halaqah.level, daftar_kelas.kelas');
        $this->db->where('id_tutor', $dataTutor['id']);
        $this->db->from('data_halaqah');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_halaqah.id_kelas');
        $this->db->where('data_halaqah.tahun', date('Y'));
        $data['halaqah'] = $this->db->get()->result_array();

        $pilih_angkatan = (date('m') <= 8) ? date('Y') - 1 : date('Y');

        $this->db->select('tahun');
        $this->db->from('data_halaqah');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'asc');
        $data['tahun'] = $this->db->get()->result_array();

        $now = false;
        $lastyear = false;
        foreach ($data['tahun'] as $thn) {
            if ($thn['tahun'] == date('Y')) {
                $now = true;
            }
            if ($thn['tahun'] == (date('Y') - 1)) {
                $lastyear = true;
            }
        }

        if (!$lastyear) {
            $data['tahun'][]['tahun'] = date('Y') - 1;
        }
        if (!$now) {
            $data['tahun'][]['tahun'] = (date('Y'));
        }
        rsort($data['tahun']);

        $i = 0;
        foreach ($data['tahun'] as $t) {

            if ($t['tahun'] == $pilih_angkatan) {
                $data['tahun'][$i]['selected'] = 'selected';
            } else {
                $data['tahun'][$i]['selected'] = '';
            }
            $i++;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('binaan/index', $data);
        $this->load->view('templates/footer');
    }


    public function ajax_data_binaan()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $dataTutor = $this->db->get_where('data_tutor', ['id_user' => $data['user']['id']])->row_array();
        if ($dataTutor == null) {
            $dataTutor['id'] = null;
        }

        $this->db->select('data_halaqah.id, data_halaqah.level, daftar_kelas.kelas');
        $this->db->where([
            'id_tutor' => $dataTutor['id']
        ]);
        $this->db->from('data_halaqah');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_halaqah.id_kelas');
        $this->db->where('data_halaqah.tahun', $_GET['tahun']);
        $this->db->where('daftar_kelas.semester', $_GET['semester']);
        $data['halaqah'] = $this->db->get()->result_array();

        if (count($data['halaqah']) < 1) {
            echo '<div class="alert alert-danger" role="alert">Halaqah tidak ditemukan, silahkan hubungi kordinator fakultas atau kordinator BPS UNM</div>';
        } else {
            $this->load->view('binaan/ajax_data_binaan', $data);
        };
    }
    public function nilai($idhalaqah)

    {
        $data['title'] = 'Halaqah Binaan';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['halaqah'] = $this->db->get_where('data_halaqah', ['id' => $idhalaqah])->row_array();
        $data['kelas'] = $this->db->get_where('daftar_kelas', [
            'id' => $data['halaqah']['id_kelas']
        ])->row_array();


        $this->db->select('*, mahasiswa.id as idmhs');
        $this->db->from('mahasiswa');
        $this->db->join('nilai_sains', 'mahasiswa.id = nilai_sains.id_mahasiswa', 'left');
        $this->db->where('id_halaqah', $idhalaqah);
        $data['mahasiswa'] = $this->db->get()->result_array();

        $check = false;
        foreach ($data['mahasiswa'] as $mhs) :
            if ($mhs['id_mahasiswa'] == null) {
                $this->db->insert('nilai_sains', ['id_mahasiswa' => $mhs['idmhs']]);
                $check = true;
            }
        endforeach;

        if ($check) {
            $this->db->select('*, mahasiswa.id as idmhs');
            $this->db->from('mahasiswa');
            $this->db->join('nilai_sains', 'mahasiswa.id = nilai_sains.id_mahasiswa', 'left');
            $this->db->where('id_halaqah', $idhalaqah);
            $data['mahasiswa'] = $this->db->get()->result_array();
        }

        $i = 0;
        foreach ($data['mahasiswa'] as $mhs) :
            $kehadiran = $mhs['kehadiran'] * 45 / 100;
            $mid = $mhs['mid'] * 15 / 100;
            $final = $mhs['final_test'] * 30 / 100;
            $tugas = $mhs['tugas'] * 10 / 100;
            $akhir = $kehadiran + $mid + $final + $tugas;
            $huruf = 'E';
            if ($akhir >= 91) {
                $huruf = 'A';
            } else if ($akhir >= 86) {
                $huruf = 'A-';
            } else if ($akhir >= 81) {
                $huruf = 'B+';
            } else if ($akhir >= 76) {
                $huruf = 'B';
            } else if ($akhir >= 71) {
                $huruf = 'B-';
            } else if ($akhir >= 66) {
                $huruf = 'C+';
            } else if ($akhir >= 61) {
                $huruf = 'C';
            } else if ($akhir >= 55) {
                $huruf = 'C-';
            } else {
                $huruf = 'E';
            }
            $data['mahasiswa'][$i]['akhir'] = $akhir;
            $data['mahasiswa'][$i]['huruf'] = $huruf;
            $i++;

        endforeach;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('binaan/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function isinilai($jenis_nilai, $idhalaqah)
    {

        $data['title'] = 'Halaqah Binaan';


        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->select('daftar_kelas.kelas, daftar_kelas.prodi, data_halaqah.id as idhalaqah, data_halaqah.level');
        $this->db->from('daftar_kelas');
        $this->db->join('data_halaqah', 'data_halaqah.id_kelas = daftar_kelas.id');
        $this->db->where('data_halaqah.id', $idhalaqah);
        $data['halaqah'] = $this->db->get()->row_array();


        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_halaqah' => $idhalaqah])->result_array();

        $i = 0;
        foreach ($data['mahasiswa'] as $mhs) :
            $nilai = $this->db->get_where('nilai_sains', ['id_mahasiswa' => $mhs['id']])->row_array()[$jenis_nilai];
            $data['mahasiswa'][$i]['nilai'] = $nilai;
            $i++;
        endforeach;

        $data['jenis_nilai'] = $jenis_nilai;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('binaan/isinilai', $data);
        $this->load->view('templates/footer');
    }

    public function input($jenis_nilai, $idhalaqah)
    {

        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_halaqah' => $idhalaqah])->result_array();


        foreach ($data['mahasiswa'] as $mhs) :
            $nilai = $this->input->post($mhs['id']);
            if ($nilai != null) {

                $this->db->set($jenis_nilai, $nilai);
                $this->db->where('id_mahasiswa', $mhs['id']);
                $this->db->update('nilai_sains');
            }
        endforeach;


        redirect('binaan/nilai/' . $idhalaqah);
    }

    public function tambahmahasiswa($idkelas, $idhalaqah)
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'jk' => 'l',
            'angkatan' => 2016,
            'id_kelas' => $idkelas,
            'id_halaqah' => $idhalaqah
        ];

        $this->db->insert('mahasiswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa berhasil ditambahkan</div>');

        redirect('binaan/nilai/' . $idhalaqah);
    }

    public function hapusmahasiswa($idhalaqah, $idmahasiswa)
    {

        $this->db->where('id', $idmahasiswa);
        $this->db->delete('mahasiswa');
        $this->db->where('id_mahasiswa', $idmahasiswa);
        $this->db->delete('nilai_sains');

        // var_dump($idmahasiswa);
        // echo '<br><br>';
        // var_dump($idhalaqah);
        // die;
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Mahasiswa berhasil diihapus</div>');

        redirect('binaan/nilai/' . $idhalaqah);
    }

    public function editmahasiswa($idhalaqah, $idmahasiswa)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'telp' => $this->input->post('telp')
        ];
        $this->db->where('id', $idmahasiswa);
        $this->db->set($data);
        $this->db->update('mahasiswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil diubah</div>');

        redirect('binaan/nilai/' . $idhalaqah);
    }
}
