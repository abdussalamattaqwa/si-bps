<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Baca Qur\'an';

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];
        $data['baca'] = $this->db->get_where('bc_quran', ['id_user' => $data['user']['id']])->result_array();
        $data['quran'] = $this->db->get('data_quran')->result_array();

        // $data['baca'] = $this->db->get_where('bc_quran', ['id' => ])->result_array();
        // $data['baca'] = $this->db->get('bc_quran');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/logbook', $data);
        $this->load->view('templates/footer');
    }

    public function masukkan_bacaan()
    {
        $awal_surah = $this->input->post('awal_surah');
        $awal_ayat = $this->input->post('awal_ayat');
        $akhir_surah = $this->input->post('akhir_surah');
        $akhir_ayat = $this->input->post('akhir_ayat');
        $baris_kolom = $this->input->post('baris_kolom');
        $id_user = $this->input->post('id_user');

        $data = [
            'id_user' => $id_user,
            'awal_surah' => $awal_surah,
            'awal_ayat' => $awal_ayat,
            'akhir_surah' => $akhir_surah,
            'akhir_ayat' => $akhir_ayat,
            'baris_kolom' => $baris_kolom
        ];
        $this->db->insert('bc_quran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bacaan telah ditambahkan</div>');
    }

    public function update_bacaan()
    {
        $awal_surah = $this->input->post('awal_surah');
        $awal_ayat = $this->input->post('awal_ayat');
        $akhir_surah = $this->input->post('akhir_surah');
        $akhir_ayat = $this->input->post('akhir_ayat');
        $baris_kolom = $this->input->post('baris_kolom');
        $id_user = $this->input->post('id_user');


        $data = [
            'awal_surah' => $awal_surah,
            'awal_ayat' => $awal_ayat,
            'akhir_surah' => $akhir_surah,
            'akhir_ayat' => $akhir_ayat
        ];

        $this->db->where([
            'id_user' => $id_user,
            'baris_kolom' => $baris_kolom
        ]);
        // $this->db->where('baris_kolom', $baris_kolom);
        $this->db->update('bc_quran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bacaan telah diubah</div>');
    }

    public function delete_bacaan()
    {
        $baris_kolom = $this->input->post('baris_kolom');
        $id_user = $this->input->post('id_user');

        $this->db->where([
            'id_user' => $id_user,
            'baris_kolom' => $baris_kolom
        ]);
        // $this->db->where('baris_kolom', $baris_kolom);
        $this->db->delete('bc_quran');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Bacaan telah dihapus</div>');
    }
}
