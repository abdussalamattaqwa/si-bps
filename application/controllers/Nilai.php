<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Daftar Nilai';


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if (is_korfak($data['user']['role_id'])) {
            $this->db->select('fakultas');
            $this->db->from('data_tutor');
            $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi');
            $this->db->where('data_tutor.id_user', $data['user']['id']);

            $mhs = $this->db->get()->row_array();
            if ($mhs['fakultas'] != null)
                redirect(base_url('nilai/fakultas/' . $mhs['fakultas']));
        };

        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 1);
        $this->db->order_by('fakultas', 'ASC');
        $data['fakultas'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nilai/index', $data);
        $this->load->view('templates/footer');
    }

    public function fakultas($fakultas)
    {

        $data['title'] = 'Daftar Nilai';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $fakultas = urldecode($fakultas);

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
        $this->load->view('nilai/fakultas', $data);
        $this->load->view('templates/footer');
    }

    public function prodi($idprodi)
    {
        $data['title'] = 'Daftar Nilai';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->db->get_where('daftar_kelas', ['id' => $idprodi])->row_array();

        $this->db->from('daftar_kelas');
        $this->db->where([
            'prodi'    => $data['prodi']['prodi'],
            'tingkat'   => 4
        ]);
        $this->db->order_by('kelas');
        $data['daftar_kelas'] = $this->db->get()->result_array();

        $this->db->select('angkatan');
        $this->db->from('mahasiswa');
        $this->db->group_by('angkatan');
        $this->db->order_by('angkatan', 'asc');
        $data['tahun'] = $this->db->get()->result_array();

        $pilih_angkatan = (date('m') <= 8) ? date('Y') - 1 : date('Y');

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
        foreach ($data['daftar_kelas'] as $kelas) :

            $idKelas = $kelas['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', [
                'id_kelas' => $idKelas,
                'angkatan' => $pilih_angkatan
            ])->num_rows();

            $data['daftar_kelas'][$i]['anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

        $data['angkatan'] = $pilih_angkatan;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nilai/prodi', $data);
        $this->load->view('templates/footer');
    }


    public function ajax_data_kelas($idprodi, $tahun)
    {
        $data['prodi'] = $this->db->get_where('daftar_kelas', ['id' => $idprodi])->row_array();

        $this->db->from('daftar_kelas');
        $this->db->where([
            'prodi'    => $data['prodi']['prodi'],
            'tingkat'   => 4
        ]);
        $this->db->order_by('kelas');
        $data['daftar_kelas'] = $this->db->get()->result_array();


        $i = 0;
        foreach ($data['daftar_kelas'] as $kelas) :

            $idKelas = $kelas['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', [
                'id_kelas' => $idKelas,
                'angkatan' => $tahun
            ])->num_rows();

            $data['daftar_kelas'][$i]['anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

        $data['angkatan'] = $tahun;
        $this->load->view('nilai/ajax_prodi', $data);
    }

    public function nilaikelas($tahun, $idkelas)
    {

        $this->load->model('Nilai_model');

        $data = $this->Nilai_model->get_data_nilai($tahun, $idkelas);

        $data['title'] = 'Daftar Nilai';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nilai/daftarmahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function print_nilai($tahun, $idkelas)
    {
        $this->load->model('Nilai_model');
        $data = $this->Nilai_model->get_data_nilai($tahun, $idkelas);
        $this->load->view('nilai/print_nilai', $data);
    }

    public function pdf_nilai($tahun, $idkelas)
    {
        $this->load->model('Nilai_model');
        $data = $this->Nilai_model->get_data_nilai($tahun, $idkelas);
        $nama = 'Nilai Kelas ' . $data['kelas']['kelas'] . ' Semester ' . $data['kelas']['semester'] . '_' . $tahun;
        $this->load->library('Mypdf');
        $this->mypdf->generate('nilai/pdf_nilai', $data, $nama);
    }

    public function excel_nilai($tahun, $idkelas)
    {
        $this->load->model('Nilai_model');
        $data = $this->Nilai_model->get_data_nilai($tahun, $idkelas);
        $nama = 'Nilai Kelas ' . $data['kelas']['kelas'] . ' Semester ' . $data['kelas']['semester'] . '_' . $tahun;

        $this->load->library('Myexcel');
        $this->myexcel->nilai($nama, $data);
    }
}
