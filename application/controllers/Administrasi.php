<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Kelas';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if (is_korfak($data['user']['role_id'])) {
            $this->db->select('fakultas');
            $this->db->from('data_tutor');
            $this->db->join('daftar_kelas', 'daftar_kelas.id = data_tutor.id_prodi');
            $this->db->where('data_tutor.id_user', $data['user']['id']);

            $mhs = $this->db->get()->row_array();
            if ($mhs['fakultas'] != null)
                redirect(base_url('administrasi/fakultas/' . $mhs['fakultas']));
        };


        $this->db->from('daftar_kelas');
        $this->db->where('tingkat', 1);
        $this->db->order_by('fakultas', 'ASC');
        $data['fakultas'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function fakultas($f)
    {
        $data['title'] = 'Daftar Kelas';

        $fakultas = urldecode($f);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->db->from('daftar_kelas');
        $this->db->where([
            'tingkat' => 2,
            'fakultas' => $fakultas
        ]);
        $this->db->order_by('jurusan');
        $data['jurusan'] = $this->db->get()->result_array();


        $data['daftar_prodi'] = $this->db->get_where('daftar_kelas', [
            'tingkat' => 3,
            'fakultas' => $fakultas
        ])->result_array();

        $i = 0;
        foreach ($data['daftar_prodi'] as $dp) {
            $jumlah_kelas = $this->db->get_where('daftar_kelas', [
                'tingkat' => 4,
                'prodi' => $dp['prodi']
            ])->num_rows();
            $data['daftar_prodi'][$i]['jumlah_kelas'] = $jumlah_kelas;
            $i++;
        }

        $data['fakultas'] = $fakultas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/fakultas', $data);
        $this->load->view('templates/footer');
    }
    public function tambahfakultas()
    {

        $fakultas = $this->input->post('fakultas');
        if (!ctype_alpha(str_replace(' ', '', $fakultas))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fakultas harus diisi dengan huruf alphabet saja, data Fakultas gagal ditambahkan</div>');
            redirect('administrasi');
        }


        $is_same = $this->db->get_where('daftar_kelas', ['tingkat' => 1, 'fakultas' => $this->input->post('fakultas')])->row_array()['fakultas'];

        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Fakultas telah ada, data gagal ditambahkan</div>');
            redirect('administrasi');
        } else {
            $data = [
                'tingkat' => 1,
                'fakultas' => htmlspecialchars($this->input->post('fakultas'))
            ];
            $this->db->insert('daftar_kelas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Fakultas berhasil ditambahkan</div>');
            redirect('administrasi');
        }
    }


    public function ubahFakultas($fakultas)
    {
        $fakultas = $this->input->post('fakultas');
        if (!ctype_alpha(str_replace(' ', '', $fakultas))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fakultas harus diisi dengan huruf alphabet saja, data Fakultas gagal diubah</div>');
            redirect('administrasi');
        }

        $is_same = $this->db->get_where('daftar_kelas', ['tingkat' => 1, 'fakultas' => $this->input->post('fakultas')])->row_array()['fakultas'];

        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Fakultas telah ada, data gagal diubah</div>');
            redirect('administrasi');
        } else {
            $this->db->set('fakultas', $this->input->post('fakultas'));
            $this->db->where('fakultas', urldecode($fakultas));
            $this->db->update('daftar_kelas');
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Fakultas berhasil diubah</div>');
            redirect('administrasi');
        }
    }

    public function tambahJurusan($fakultas)
    {
        $jurusan = $this->input->post('jurusan');
        if (!ctype_alpha(str_replace(' ', '', $jurusan))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan harus diisi dengan huruf alphabet saja, data Jurusan gagal ditambahkan</div>');
            redirect('administrasi/fakultas/' . urldecode($fakultas));
        }

        $data = [
            'tingkat' => 2,
            'fakultas' => urldecode($fakultas),
            'jurusan' => $this->input->post('jurusan')
        ];

        $is_same = $this->db->get_where('daftar_kelas', $data)->row_array()['jurusan'];
        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan telah ada, data gagal ditambahkan</div>');
        } else {
            $this->db->insert('daftar_kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jurusan berhasil ditambahkan</div>');
        }
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }

    public function hapusfakultas($fakultas)
    {

        $jurusan = $this->db->get_where('daftar_kelas', [
            'tingkat' => 2,
            'fakultas' => urldecode($fakultas)
        ])->result_array();


        foreach ($jurusan as $j) {
            $prodi = $this->db->get_where('daftar_kelas', [
                'tingkat' => 3,
                'jurusan' => $j['jurusan']
            ])->result_array();

            foreach ($prodi as $p) {
                $daftar_kelas = $this->db->get_where('daftar_kelas', [
                    'tingkat' => 4,
                    'prodi' => $p['prodi']
                ])->result_array();

                foreach ($daftar_kelas as $dk) {

                    $mhs = $this->db->get_where('mahasiswa', ['id_kelas' => $dk['id']])->result_array();
                    foreach ($mhs as $m) {
                        $this->db->where('id_mahasiswa', $m['id']);
                        $this->db->delete('nilai_sains');
                    }

                    $this->db->where('id_kelas', $dk['id']);
                    $this->db->delete('mahasiswa');

                    $this->db->where('id_kelas', $dk['id']);
                    $this->db->delete('data_halaqah');
                }
            }
        }

        $this->db->where('fakultas', urldecode($fakultas));
        $this->db->delete('daftar_kelas');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Fakultas berhasil dihapus </div>');
        redirect('administrasi');
    }

    public function ubahjurusan($fakultas, $jurusan)
    {
        $jurusan = $this->input->post('jurusan');
        if (!ctype_alpha(str_replace(' ', '', $jurusan))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan harus diisi dengan huruf alphabet saja, data Jurusan gagal diubah</div>');
            redirect('administrasi/fakultas/' . urldecode($fakultas));
        }
        $is_same = $this->db->get_where('daftar_kelas', [
            'tingkat' => 2,
            'fakultas' => urldecode($fakultas),
            'jurusan' => $this->input->post('jurusan')
        ])->row_array()['jurusan'];

        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan telah ada, data gagal diubah</div>');
        } else {
            $this->db->set('jurusan', $this->input->post('jurusan'));
            $this->db->where('jurusan', urldecode($jurusan));
            $this->db->update('daftar_kelas');

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Jurusan berhasil diubah </div>');
        }
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }

    public function tambahProdi($fakultas, $jurusan)
    {
        $prodi = $this->input->post('prodi');
        if (!ctype_alpha(str_replace(' ', '', $prodi))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Prodi harus diisi dengan huruf alphabet saja, data Prodi gagal ditambahkan</div>');
            redirect('administrasi/fakultas/' . urldecode($fakultas));
        }

        $data = [
            'tingkat'   => 3,
            'fakultas'  => urldecode($fakultas),
            'jurusan'   => urldecode($jurusan),
            'prodi'     => $this->input->post('prodi'),
            'semester'  => 'Ganjil'
        ];

        $is_same = $this->db->get_where('daftar_kelas', $data)->row_array()['prodi'];
        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Prodi telah ada, data gagal ditambahkan</div>');
        } else {
            $this->db->insert('daftar_kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Prodi berhasil ditambahkan</div>');
        }
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }

    public function hapusjurusan($fakultas, $jurusan)
    {

        $prodi = $this->db->get_where('daftar_kelas', [
            'tingkat' => 3,
            'jurusan' => urldecode($jurusan)
        ])->result_array();

        foreach ($prodi as $p) {
            $daftar_kelas = $this->db->get_where('daftar_kelas', [
                'tingkat' => 4,
                'prodi' => $p['prodi']
            ])->result_array();

            foreach ($daftar_kelas as $dk) {

                $mhs = $this->db->get_where('mahasiswa', ['id_kelas' => $dk['id']])->result_array();
                foreach ($mhs as $m) {
                    $this->db->where('id_mahasiswa', $m['id']);
                    $this->db->delete('nilai_sains');
                }

                $this->db->where('id_kelas', $dk['id']);
                $this->db->delete('mahasiswa');

                $this->db->where('id_kelas', $dk['id']);
                $this->db->delete('data_halaqah');
            }
        }
        $this->db->where('jurusan', urldecode($jurusan));
        $this->db->delete('daftar_kelas');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurusan berhasil dihapus </div>');
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }


    public function ubahprodi($fakultas, $id)
    {

        $prodi = $this->input->post('prodi');
        if (!ctype_alpha(str_replace(' ', '', $prodi))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Prodi harus diisi dengan huruf alphabet saja, data Prodi gagal diubah</div>');
            redirect('administrasi/fakultas/' . urldecode($fakultas));
        }

        $is_same = $this->db->get_where('daftar_kelas', ['prodi' => $this->input->post('prodi')])->row_array()['prodi'];
        if ($is_same != null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Prodi telah ada, data gagal diubah </div>');
        } else {
            $this->db->set('prodi', htmlspecialchars($this->input->post('prodi')));
            $this->db->where('id', urldecode($id));
            $this->db->update('daftar_kelas');

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Prodi berhasil diubah </div>');
        }
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }

    public function ubahSemester($fakultas)
    {
        $this->db->set('semester', $this->input->post('semester'));
        $this->db->where('prodi', $this->input->post('prodi'));
        $this->db->update('daftar_kelas');

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Semester <b class="text-success">' . $this->input->post('prodi') . '</b> berhasil diubah </div>');
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }


    public function hapusprodi($fakultas, $id)
    {
        $prodi = $this->db->get_where('daftar_kelas', [
            'id' => $id
        ])->row_array()['prodi'];

        $daftar_kelas = $this->db->get_where('daftar_kelas', [
            'tingkat' => 4,
            'prodi' => $prodi
        ])->result_array();

        foreach ($daftar_kelas as $dk) {

            $mhs = $this->db->get_where('mahasiswa', ['id_kelas' => $dk['id']])->result_array();
            foreach ($mhs as $m) {
                $this->db->where('id_mahasiswa', $m['id']);
                $this->db->delete('nilai_sains');
            }

            $this->db->where('id_kelas', $dk['id']);
            $this->db->delete('mahasiswa');

            $this->db->where('id_kelas', $dk['id']);
            $this->db->delete('data_halaqah');
        }

        $this->db->where('id', urldecode($id));
        $this->db->delete('daftar_kelas');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Prodi berhasil dihapus </div>');
        redirect('administrasi/fakultas/' . urldecode($fakultas));
    }

    public function Daftarkelas($id)
    {

        $data['title'] = 'Daftar Kelas';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prodi'] = $this->db->get_where('daftar_kelas', ['id' => $id])->row_array();

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
            ])->num_rows();

            $data['daftar_kelas'][$i]['anggota'] = $jumlah_mahasiswa;
            $i++;
        endforeach;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/editkelas', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKelas($id)
    {

        $kelas = $this->input->post('kelas');
        if (!ctype_alpha(str_replace(' ', '', $kelas))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kelas harus diisi dengan huruf alphabet saja, data Kelas gagal ditambahkan</div>');
            redirect('administrasi/daftarkelas/' . $id);
        }

        $data = [
            'tingkat'   => 4,
            'fakultas'  => $this->input->post('fakultas'),
            'jurusan'   => $this->input->post('jurusan'),
            'prodi'     => $this->input->post('prodi'),
            'semester'  => $this->input->post('semester'),
            'kelas'     => htmlspecialchars($this->input->post('kelas'))
        ];
        $this->db->insert('daftar_kelas', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas berhasil ditambahkan</div>');
        redirect('administrasi/daftarkelas/' . $id);
    }


    public function editKelas($id)
    {
        $kelas = $this->input->post('kelas');
        if (!ctype_alpha(str_replace(' ', '', $kelas))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kelas harus diisi dengan huruf alphabet saja, data Kelas gagal diubah</div>');
            redirect('administrasi/daftarkelas/' . $id);
        }

        $this->db->set('kelas', $this->input->post('kelas'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('daftar_kelas');

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kelas berhasil diubah</div>');
        redirect('administrasi/daftarkelas/' . $id);
    }

    public function hapusKelas($id, $idProdi, $anggota)
    {

        $this->db->where('id', urldecode($id));
        $this->db->delete('daftar_kelas');

        if ($anggota > 0) {

            $mhs = $this->db->get_where('mahasiswa', ['id_kelas' => $id])->result_array();
            foreach ($mhs as $m) {
                $this->db->where('id_mahasiswa', $m['id']);
                $this->db->delete('nilai_sains');
            }
            $this->db->where('id_kelas', $id);
            $this->db->delete('mahasiswa');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Kelas dan mahasiswa</b> berhasil dihapus </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Kelas</b> berhasil dihapus </div>');
        }
        redirect('administrasi/daftarkelas/' . $idProdi);
    }
}
