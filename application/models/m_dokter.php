<?php

class M_dokter extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('dokter', array('dokter' => $data['dokter']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('dokter', $data);
            $data = array(
                'id_user' => $this->session->userdata("id_user"),
                'username' => $this->session->userdata("nama"),
                'controller' => $this->uri->segment(1),
                'method' =>  $this->uri->segment(2),
                'activity' => 'Insert dokter',
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
        $query = $this->db->query("select * from dokter");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_dokter', $id);
        return $this->db->update('dokter', $data);
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update dokter',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete dokter',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
        return $this->db->delete('dokter', array('id_dokter' => $id));
        
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('dokter', array('id_dokter' => $id));
        return $query->result();
    }
}
