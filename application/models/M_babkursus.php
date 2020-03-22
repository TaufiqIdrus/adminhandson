<?php

class M_babkursus extends CI_Model
{

    function insert_bab($data)
    {
        $query = $this->db->get_where('bab_kursus', array('id_bab' => $data['id_bab']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('bab_kursus', $data);
            $data = array(
                'id_user' => $this->session->userdata("id_user"),
                'username' => $this->session->userdata("nama"),
                'controller' => $this->uri->segment(1),
                'method' =>  $this->uri->segment(2),
                'activity' => 'Insert bab kursus',
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

    function display($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_kursus' => $id));
        return $query->result();
    }

    function displaykursus($id_bab)
    {
        $query = $this->db->get_where('bab_kursus', array('id_bab' => $id_bab));
        return $query->result()[0]->bab_kursus;
    }

    function displayjumlahbab($id_kursus)
    {
        $query = $this->db->get_where('bab_kursus', array('id_kursus' => $id_kursus));
        return $query->num_rows();
    }

    function update_bab($id, $data)
    {
        $this->db->where('id_bab', $id);
        return $this->db->update('bab_kursus', $data);
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update bab kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete_bab($id)
    {
        return $this->db->delete('bab_kursus', array('id_bab' => $id));
        $data = array(
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete bab kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }
}
