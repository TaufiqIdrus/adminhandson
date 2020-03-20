<?php

class M_kursus extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('kursus', array('kursus' => $data['kursus']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('kursus', $data);
            $data = array(
                'id_user' => $this->session->userdata("id_user"),
                'username' => $this->session->userdata("nama"),
                'controller' => $this->uri->segment(1),
                'method' =>  $this->uri->segment(2),
                'activity' => 'Insert kursus',
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
        $query = $this->db->query("select * from kursus");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_kursus', $id);
        return $this->db->update('kursus', $data);
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        return $this->db->delete('kursus', array('id_kursus' => $id));
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('kursus', array('id_kursus' => $id));
        return $query->result();
    }
}
