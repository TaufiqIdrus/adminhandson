<?php

class M_videokursus extends CI_Model
{

    function insert_video()
    {
        $data = array(
            'id_video' => uniqid(),
            'id_kursus' => $this->input->post('id_kursus'),
            'id_bab' => $this->input->post('id_bab'),
            'judul_video' => $this->input->post('judul_video'),
            'video' => $this->input->post('video'),
            'durasi' => $this->input->post('durasi'),
            'id_kursus' => $this->input->post('id_kursus'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('videokursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert video',
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
        $query = $this->db->query("select * from videokursus");
        return $query->result();
    }

    function update_video()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'id_kursus' => $this->input->post('id_kursus'),
            'judul_video' => $this->input->post('judul_video'),
            'id_bab' => $this->input->post('id_bab'),
            'video' => $this->input->post('video'),
            'durasi' => $this->input->post('durasi'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_video = $this->input->post('id_video');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_video', $id_video);
        return $this->db->update('videokursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update video',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->db->where('id_video', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('videokursus', $data);
        //return $this->db->delete('videokursus', array('id_video' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete video',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('videokursus', array('id_video' => $id));
        return $query->result();
    }

    function display_video($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->result();
    }

    function display_bab($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->result();
    }

    function display_bab_kursus($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_bab' => $id));
        return $query->result()[0]->bab_kursus;
    }
    function display_jumlah($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id));
        return $query->num_rows();
    }

    
}
