<?php

class M_user extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('users', array('username' => $data['users'], 'emailaddress' => $data['emailaddress']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('users', $data);
            $data = array(
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
            }
        } else {
            return false; 
        }
    }

    function display()
    {
        $query = $this->db->query("select * from users");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
        $data = array(
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
        return $this->db->delete('users', array('id_user' => $id));
        $data = array(
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


}
