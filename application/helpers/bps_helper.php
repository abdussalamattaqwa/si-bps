<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        if (in_array(strtolower($ci->uri->segment(1)), ['dosen', 'tutor', 'halaqah'])) {
            $menu = 'administrasi';
        }

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}




function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function search_user_role($role_id)
{
    if ($role_id == 2 || $role_id == 4 || $role_id == 6) {
        return 'dosen';
        // spesific only dosen or tutor edit view administrasi registrasi
    } else if ($role_id == 3 || $role_id == 5 || $role_id == 7 || $role_id == 8) {
        // Control Halaqah Function tutor diubah juga
        //  Control Tutor Function tambah tutor diubah juga
        //  Control Tutor Function edit tutor diubah juga
        return 'tutor';
    } else if ($role_id == 1) {
        return 'admin';
    } else {
        return 'user';
    }
}



function is_korfak($role_id)
{
    if ($role_id == 7) {
        return true;
    } else {
        return false;
    }
}
