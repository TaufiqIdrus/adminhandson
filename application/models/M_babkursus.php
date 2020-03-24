<?php

class M_babkursus extends CI_Model
{

    function insert_bab()
    {
        $data = array(
            'id_bab' => $this->input->post('id_bab'),
            'id_kursus' => $this->input->post('id_kursus'),
            'bab_kursus' => $this->input->post('bab_kursus'),
            'insert_by' => $this->session->userdata("nama")
        );

        $data = $this->security->xss_clean($data);
        $this->db->insert('bab_kursus', $data);
        $data = array(
            'id_log' => uniqid(),
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
        } else {
            return false;
        }
    }

    function display($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_kursus' => $id, 'status'=>'active'));
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

    function update_bab()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'bab_kursus' => $this->input->post('bab_kursus'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_bab = $this->input->post('id_bab');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_bab', $id_bab);
        return $this->db->update('bab_kursus', $data);
        $data = array(
            'id_log' => uniqid(),
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

    function delete_bab($id_bab)
    {
        $this->db->where('id_bab', $id_bab);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('bab_kursus', $data);

        //return $this->db->delete('bab_kursus', array('id_bab' => $id));

        $data = array(
            'id_log' => uniqid(),
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
