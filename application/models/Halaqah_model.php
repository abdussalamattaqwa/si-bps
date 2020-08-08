<?php
class Halaqah_model extends CI_Model
{
    public function get_halaqah($tahun, $idkelas)
    {
        $data['tahun'] = urldecode($tahun);

        $data['kelas'] = $this->db->get_where('daftar_kelas', ['id' => $idkelas])->row_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jk'] = $data['user']['jk'];

        $status = search_user_role($data['user']['role_id']);
        if ($status == 'dosen') {
            if (isset($_GET['jk'])) {
                $data['jk'] = $_GET['jk'];
            }
        }
        $jk = $data['jk'];

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
        return $data;
    }
}
