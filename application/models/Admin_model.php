<?php

class Admin_model extends CI_Model
{

    public function get_user()
    {
        return $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function get_role()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function jumlah_user($key = 'user')
    {
        if ($key == 'dosen') {
            $this->db->from('user');
            $this->db->where('role_id', 2);
            $this->db->or_where('role_id', 4);
            $this->db->or_where('role_id', 6);
            return $this->db->get()->num_rows();
        } else if ($key == 'tutor') {
            $this->db->from('user');
            $this->db->where('role_id', 3);
            $this->db->or_where('role_id', 5);
            $this->db->or_where('role_id', 7);
            $this->db->or_where('role_id', 8);
            return $this->db->get()->num_rows();
        } else {
            $this->db->from('user');
            $this->db->where('role_id', 1);
            return $this->db->get()->num_rows();
        }
    }

    public function insert_role($data)
    {
        return $this->db->insert('user_role', $data);
    }

    public function update_role($data, $role_id)
    {
        $this->db->where('id', $role_id);
        return $this->db->update('user_role', $data);
    }

    public function delete_role($role_id)
    {
        $this->db->where('id', $role_id);
        return $this->db->delete('user_role');
    }

    public function get_user_menu()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('user_menu')->result_array();
    }

    public function change_access_menu($data)
    {
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            return $this->db->insert('user_access_menu', $data);
        } else {
            return $this->db->delete('user_access_menu', $data);
        }
    }

    public function get_data_user()
    {
        $this->db->select('user.*, user_role.*, user.id as iduser');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        // $this->db->where('user.id !=', 1);
        $this->db->order_by('role_id');
        return $this->db->get()->result_array();
    }

    public function get_user_role()
    {
        $this->db->from('user_role');
        $this->db->where('id != 1');
        return $this->db->get()->result_array();
    }

    public function insert_user($data, $role_id)
    {
        $this->db->insert('user', $data);
        if (search_user_role($role_id) == 'dosen') {
            $user = $this->db->get_where('user', ['email' => $data['email']])->row_array();
            $this->db->insert('data_dosen', [
                'id_user' => $user['id'],
                'nama' => $user['name']
            ]);
        }
        if (search_user_role($role_id) == 'tutor') {
            $user = $this->db->get_where('user', ['email' => $data['email']])->row_array();
            $this->db->insert('data_tutor', [
                'id_user' => $user['id'],
                'nama' => $user['name']
            ]);
        }
    }
}
