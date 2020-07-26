<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaqah extends CI_Controller
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

        $data['title'] = 'Daftar Halaqah';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if (is_korfak($data['user']['role_id'])) {
            $this->db->select('fakultas');
            $this->db->from('data_tutor');
            $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi');
            $this->db->where('data_tutor.id_user', $data['user']['id']);

            $mhs = $this->db->get()->row_array();
            if ($mhs['fakultas'] != null)
                redirect(base_url('halaqah/fakultas/' . $mhs['fakultas']));
        };


        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 1);
        $this->db->order_by('fakultas', 'ASC');
        $data['fakultas'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('halaqah/index', $data);
        $this->load->view('templates/footer');
    }

    public function fakultas($f)
    {
        $data['title'] = 'Daftar Halaqah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jk'] = $data['user']['jk'];


        $data['fakultas'] = urldecode($f);

        $data['status'] = search_user_role($data['user']['role_id']);


        $pilih_angkatan = (date('m') <= 8) ? date('Y') - 1 : date('Y');

        $this->db->select('`data_halaqah`.*, `daftar_kelas`.`kelas`, `data_tutor`.`nama`');
        $this->db->from('data_halaqah');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_halaqah.id_kelas');
        $this->db->join('data_tutor', 'data_tutor.id = data_halaqah.id_tutor', 'left');
        $this->db->where('daftar_kelas.fakultas', $data['fakultas']);
        $this->db->where('data_halaqah.tahun', $pilih_angkatan);

        // if (isset($_GET['jk'])) {
        if ($data['status'] == 'dosen') {
            $data['jk'] = 'semua';
        } else
            $this->db->where('data_halaqah.jk', $data['user']['jk']);


        $this->db->where('daftar_kelas.semester', 'Ganjil');
        $this->db->order_by('kelas', 'asc');
        $data['halaqah'] = $this->db->get()->result_array();

        $i = 0;
        foreach ($data['halaqah'] as $h) :
            $idhalaqah = $h['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', ['id_halaqah' => $idhalaqah])->num_rows();
            $data['halaqah'][$i]['jumlah_anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

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
        $this->load->view('halaqah/daftarhalaqah', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_data_halaqah($fakultas)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jk'] = $data['user']['jk'];



        $data['fakultas'] = $fakultas;
        $data['tahun'] = $_GET['tahun'];
        $data['semester'] = $_GET['semester'];


        $this->db->select('`data_halaqah`.*, `daftar_kelas`.`kelas`,`daftar_kelas`.`semester`,`data_tutor`.`nama`');
        $this->db->from('data_halaqah');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_halaqah.id_kelas');
        $this->db->join('data_tutor', 'data_tutor.id = data_halaqah.id_tutor', 'left');
        $this->db->where('daftar_kelas.fakultas', $data['fakultas']);
        $this->db->where('data_halaqah.tahun', $data['tahun']);
        $this->db->where('daftar_kelas.semester', $data['semester']);

        $data['status'] = search_user_role($data['user']['role_id']);
        if (isset($_GET['jk'])) {
            if ($data['status'] == 'dosen') {
                $data['jk'] = $_GET['jk'];
                if ($data['jk'] != 'semua')
                    $this->db->where('data_halaqah.jk', $data['jk']);
            }
        } else
            $this->db->where('data_halaqah.jk', $data['user']['jk']);


        // $this->db->where('data_halaqah.jk', $data['user']['jk']);


        $this->db->order_by('kelas', 'asc');

        $data['halaqah'] = $this->db->get()->result_array();
        $i = 0;
        foreach ($data['halaqah'] as $h) :
            $idhalaqah = $h['id'];
            $jumlah_mahasiswa = $this->db->get_where('mahasiswa', ['id_halaqah' => $idhalaqah])->num_rows();
            $data['halaqah'][$i]['jumlah_anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

        $this->load->view('halaqah/ajax_data_halaqah', $data);
    }

    public function daftarjurusan($f)
    {
        $data['title'] = 'Daftar Halaqah';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['fakultas'] = urldecode($f);

        $this->db->select('id, tingkat, fakultas, jurusan, prodi, semester');
        $this->db->where([
            'tingkat' => 2,
            'fakultas' => $data['fakultas']
        ]);
        $this->db->or_where([
            'tingkat' => 3,
            'fakultas' => $data['fakultas']
        ]);
        $this->db->order_by('jurusan');
        $data['jurusan'] = $this->db->get('daftar_kelas')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('halaqah/daftarjurusan', $data);
        $this->load->view('templates/footer');
    }

    public function daftarkelas($idprodi)
    {
        $data['title'] = 'Daftar Halaqah';

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
        $this->db->order_by('angkatan', 'DESC');
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


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('halaqah/daftarkelas', $data);
        $this->load->view('templates/footer');
    }


    public function ajax_daftar_kelas($idprodi, $tahun)
    {
        // $idprodi = $_GET['prodi'];
        // $tahun = $_GET['tahun'];
        $data['tahun'] = $tahun;
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

        $this->load->view('halaqah/ajax_daftar_kelas', $data);
    }

    public function daftarmahasiswa($tahun, $idkelas)
    {
        $data['title'] = 'Daftar Halaqah';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->db->;
        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();


        $jk = $data['user']['jk'];
        $status = search_user_role($data['user']['role_id']);
        if ($status == 'dosen') {
            if (isset($_GET['jk'])) {
                $jk = $_GET['jk'];
            }
        }

        $query = "SELECT `mahasiswa`.*, `daftar_kelas`.`kelas`, `nilai_sains`.`pre_test`, `nilai_sains`.`final_test` FROM mahasiswa 
        JOIN `daftar_kelas` ON `mahasiswa`.`id_kelas` = `daftar_kelas`.`id` 
        LEFT JOIN `nilai_sains` ON `mahasiswa`.`id` = `nilai_sains`.`id_mahasiswa`  WHERE `mahasiswa`.`id_kelas` = $idkelas AND `mahasiswa`.`angkatan` = $tahun AND `mahasiswa`.`jk` = '$jk' ORDER BY `mahasiswa`.`id`";

        $data['mahasiswa'] = $this->db->query($query)->result_array();

        $data['belum'] = false;

        foreach ($data['mahasiswa'] as $mhs) :
            if ($mhs['id_halaqah'] == 0) {
                $data['belum'] = true;
            }
        endforeach;

        $query_halaqah = "SELECT `data_halaqah`.*, `data_tutor`.`nama`, `data_tutor`.`telp` FROM `data_halaqah` LEFT JOIN `data_tutor` 
        ON `data_halaqah`.`id_tutor` = `data_tutor`.`id` WHERE `data_halaqah`.`tahun` = $tahun AND `data_halaqah`.`jk` = '$jk' AND `data_halaqah`.`id_kelas` = '$idkelas' ORDER BY `data_halaqah`.`level` ASC";

        $data['halaqah'] = $this->db->query($query_halaqah)->result_array();


        $data['tahun'] = $tahun;
        $data['jk'] = $jk;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('halaqah/daftarmahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambahLevel($idkelas)
    {
        $data = [
            'id_kelas' => $idkelas,
            'level' => $this->input->post('level'),
            'tahun' => $this->input->post('tahun'),
            'jk' => $this->input->post('jk')
        ];

        $this->db->insert('data_halaqah', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaqah berhasil ditambahkan</div>');
        redirect('halaqah/daftarmahasiswa/' . $this->input->post('tahun') . '/' . $idkelas);
    }

    public function hapushalaqah($idkelas, $id, $tahun)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_halaqah');

        $this->db->set('id_halaqah', 0);
        $this->db->where('id_halaqah', $id);
        $this->db->update('mahasiswa');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Halaqah berhasil dihapus</div>');
        redirect('halaqah/daftarmahasiswa/' . $tahun . '/' . $idkelas);
    }

    public function ubahhalaqah($idkelas, $idhalaqah, $tahun)
    {
        $this->db->where('id', $idhalaqah);
        $this->db->set('level', $this->input->post('level'));
        $this->db->update('data_halaqah');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Halaqah berhasil diubah</div>');
        redirect('halaqah/daftarmahasiswa/' . $tahun . '/' . $idkelas);
    }

    public function tutor($tahun, $idkelas, $idhalaqah, $proses)
    {
        $data['title'] = 'Daftar Halaqah';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jk'] = $data['user']['jk'];

        $status = search_user_role($data['user']['role_id']);
        if ($status == 'dosen') {
            if (isset($_GET['jk'])) {
                $data['jk'] = $_GET['jk'];
            }
        }

        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();

        $data['halaqah'] = $this->db->get_where('data_halaqah', ['id' => $idhalaqah])->row_array();


        $data['proses'] = $proses;

        $this->db->select('data_tutor.*, fakultas, user.name');
        $this->db->from('user');
        $this->db->join('data_tutor', 'data_tutor.id_user = user.id', 'left');
        $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi', 'left');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where_in('role_id', [3, 5, 7, 8]);
        $this->db->where('user.jk', $data['jk']);
        $this->db->order_by('fakultas');
        $this->db->order_by('role_id');
        $data['tutor'] = $this->db->get()->result_array();

        $data['tahun'] = $tahun;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('halaqah/tutor', $data);
        $this->load->view('templates/footer_tables');
    }

    public function settutor($tahun, $idkelas, $idhalaqah, $idtutor)
    {
        $this->db->set('id_tutor', $idtutor);
        $this->db->where('id', $idhalaqah);
        $this->db->update('data_halaqah');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tutor berhasil diubah</div>');
        redirect('halaqah/daftarmahasiswa/'  . $tahun . '/' . $idkelas . '?jk=' . $_GET['jk']);
    }

    public function hapustutor($tahun, $idkelas, $idhalaqah)
    {
        $this->db->set('id_tutor', 0);
        $this->db->where('id', $idhalaqah);
        $this->db->update('data_halaqah');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tutor berhasil dihapus</div>');
        redirect('halaqah/daftarmahasiswa/' . $tahun . '/' . $idkelas);
    }

    public function pindahhalaqah($tahun, $idkelas, $idhalaqah, $idmahasiswa)
    {

        $this->db->set('id_halaqah', $idhalaqah);
        $this->db->where('id', $idmahasiswa);
        $this->db->update('mahasiswa');
        redirect('halaqah/daftarmahasiswa/' . $tahun . '/' . $idkelas);
    }

    public function printHalaqah($tahun, $idkelas)
    {
        $this->load->model('Halaqah_model');
        $data = $this->Halaqah_model->get_halaqah($tahun, $idkelas);


        $this->load->view('halaqah/print_halaqah', $data);
    }

    public function pdfHalaqah($tahun, $idkelas)
    {
        $this->load->model('Halaqah_model');
        $data = $this->Halaqah_model->get_halaqah($tahun, $idkelas);

        $jkhalaqah = ($data['jk'] == 'L') ? 'Ikhwah' : 'Akhwat';
        $nama = 'Halaqah ' .  $jkhalaqah . ' Kelas ' .  $data['kelas']['kelas'] . ' Semester ' .  $data['kelas']['semester'] . '_' . $tahun;

        $this->load->library('Mypdf');
        $this->mypdf->generate('halaqah/pdf_halaqah', $data, $nama);
    }

    public function excelHalaqah($tahun, $idkelas)
    {
        $this->load->model('Halaqah_model');
        $data = $this->Halaqah_model->get_halaqah($tahun, $idkelas);

        $jkhalaqah = ($data['jk'] == 'L') ? 'Ikhwah' : 'Akhwat';
        $nama = 'Halaqah ' .  $jkhalaqah . ' Kelas ' .  $data['kelas']['kelas'] . ' Semester ' .  $data['kelas']['semester'] . '_' . $tahun;

        $this->load->library('Myexcel');
        $this->myexcel->halaqah($nama, $jkhalaqah, $data);
    }
}
