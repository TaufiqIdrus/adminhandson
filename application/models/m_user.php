<?php

class M_user extends CI_Model
{

    function insert_user()
    {
        $data = array(
            'id_user' => uniqid(),
            'username' => $this->input->post('username'),
            'emailaddress' => $this->input->post('emailaddress'),
            'level' => $this->input->post('level'),
            'insert_by' => $this->session->userdata("nama"),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('users', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert user',
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

    function export()    
    {
        $query = $this->db->query("select * from users");
        return $query->result();
    }

    function update_user()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'username' => $this->input->post('username'),
            'emailaddress' => $this->input->post('emailaddress'),
            'level' => $this->input->post('level'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );
        $id_user = $this->input->post('id_user');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_user', $id_user);
        return $this->db->update('users', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update user',
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
        return $this->db->update('users', $data);
        //return $this->db->delete('users', array('id_user' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete user',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('users', array('id_user' => $id));
        return $query->result();
    }

    function arsip()
    {
        $query = $this->db->get_where('users', array('status'=>'deleted'));
        return $query->result();
    }
}
