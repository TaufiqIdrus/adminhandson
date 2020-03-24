<?php

class M_dokterkursus extends CI_Model
{

    function insert_dokter()
    {
        $data = array(
            
            'id_dokter' => $this->input->post('id_dokter'),
            'id_kursus' => $this->input->post('id_kursus'),
            'id_dokterkursus' => $this->input->post('id_dokterkursus')
        );

        $data = $this->security->xss_clean($data);
        $this->db->insert('dokter_kursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert dokter Kursus',
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

    function displaynamadokter($id)
    {
        $query = $this->db->get_where('dokter', array('id_dokter' => $id));
        return $query->result()[0]->dokter;
    }

    function displayiddokter($id)
    {
        $query = $this->db->get_where('dokter_kursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->result();
    }

    function displayjumlahdokter($id)
    {
        $query = $this->db->get_where('dokter_kursus', array('id_kursus' => $id));
        return $query->num_rows();
    }

    function displaykursus($id_bab)
    {
        $query = $this->db->get_where('bab_kursus', array('id_bab' => $id_bab));
        return $query->result()[0]->bab_kursus;
    }

    function displaydokter($id_kursus)
    {
        $query = $this->db->query("SELECT * FROM dokter WHERE dokter.id_dokter not in (select id_dokter from dokter_kursus where id_kursus = '$id_kursus' and status = 'active')");
        return $query->result();
    }


    function delete_dokter($id)
    {
        $this->db->where('id_dokterkursus', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('dokter_kursus', $data);
       // return $this->db->delete('dokter_kursus', array('id_dokterkursus' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete Dokter kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }
}
