<?php


class Nilai_model extends CI_Model
{
    public function get_data_nilai($tahun, $idkelas)
    {
        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();

        $this->db->select('*, mahasiswa.id as idmhs');
        $this->db->from('mahasiswa');
        $this->db->join('nilai_sains', 'mahasiswa.id = nilai_sains.id_mahasiswa', 'left');
        $this->db->where('id_kelas', $idkelas);
        $this->db->where('mahasiswa.angkatan', $tahun);
        $this->db->order_by('nim', 'ASC');
        $data['mahasiswa'] = $this->db->get()->result_array();


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

        $data['tahun'] = $tahun;

        return $data;
    }
}
