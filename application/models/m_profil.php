<?php

class M_profil extends CI_Model
{

    function insert_profil()
    {
        $data = array(
            'id_profile' => uniqid(),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'birthdate' => $this->input->post('birthdate'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
            'pendidikan' => $this->input->post('pendidikan'),
            'profilepic' => $this->input->post('profilepic'),
            'id_user' => $this->input->post('id_user'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('user_profile', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert profil',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from users where status = 'active'");
        return $query->result();
    }

    function update_profil()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'birthdate' => $this->input->post('birthdate'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
            'pendidikan' => $this->input->post('pendidikan'),
            'profilepic' => $this->input->post('profilepic'),
            'id_user' => $this->input->post('id_user'),
            'last_update' => mdate($datestring, $time),
            'insert_by' => $this->session->userdata("nama")
        );
        $id_user = $this->input->post('id_user');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_user', $id_user);
        return $this->db->update('user_profile', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update profil',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('user_profile', $data);
        //return $this->db->delete('user_profile', array('id_user' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete profil',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id, 'status' =>'active'));
        return $query->result();
    }

    function cek_profil($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id, 'status' =>'active'));
        return $query->num_rows();
    }
}
