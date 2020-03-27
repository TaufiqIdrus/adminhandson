<?php

class M_quiz extends CI_Model
{
    function insert_soal()
    {
        $data = array(
            'id_kursus' => $this->input->post('id_kursus'),
            'id_soal' => $this->input->post('id_soal'),
            'soal_quiz' => $this->input->post('soal_quiz'),
            'insert_by' => $this->session->userdata("nama")
        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('soal_quiz', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert soal',
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

    function insert_jawaban()
    {
        $data = array(
            'id_jawaban' => $this->input->post('id_jawaban'),
            'id_soal' => $this->input->post('id_soal'),
            'jawaban_quiz' => $this->input->post('jawaban_quiz'),
            'insert_by' => $this->session->userdata("nama")
        );
        $this->db->insert('jawaban_quiz', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert jawaban',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->db->showerror();
        }
    }

    function ganti_jawaban($id, $data)
    {
        $this->db->where('id_soal', $id);
        return $this->db->update('soal_quiz', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Ganti jawaban',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }


    function update_jawaban()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $id_jawaban = $this->input->post('id_jawaban');
        $data = array(

            'jawaban_quiz' => $this->input->post('jawaban_quiz'),
            'last_update' => mdate($datestring, $time),
            'insert_by' => $this->session->userdata("nama")
        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id_jawaban', $id_jawaban);
        return $this->db->update('jawaban_quiz', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'update jawaban',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete_soal($id)
    {
        $this->db->where('id_soal', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('soal_quiz', $data);
        // return $this->db->delete('soal_quiz', array('id_soal' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'delete soal',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function update_soal()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $id_soal = $this->input->post('id_soal');
        $data = array(
            'soal_quiz' => $this->input->post('soal_quiz'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id_soal', $id_soal);
        return $this->db->update('soal_quiz', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'update soal',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete_jawaban($id)
    {
        $this->db->where('id_jawaban', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('jawaban_quiz', $data);
        // return $this->db->delete('jawaban_quiz', array('id_jawaban' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'delete jawaban',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }


    function display_kursus() //terpakai di index
    {
        $query = $this->db->query("select * from kursus where status = 'active'");
        return $query->result();
    }

    function display_soal($id_kursus) //terpakai di manage soal
    {
        $query = $this->db->get_where('soal_quiz', array('id_kursus' => $id_kursus, 'status' => 'active'));
        return $query->result();
    }

    function displayjawaban($id_soal) // terpakai di manage pilihan
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal, 'status' => 'active'));
        return $query->result();
    }

    function pilihan($id) // terpakai di ganti jawaban benar
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id, 'status' =>'active'));
        return $query->result();
    }
    function display()
    {
        $query = $this->db->query("select * from soal_quiz");
        return $query->result();
    }

    function display_pilihan($id_soal) 
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal, 'status' => 'active'));
        return $query->result();
    }

    function display_jawaban($id_jawaban) 
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_jawaban' => $id_jawaban, 'status' => 'active'));
        if ($query->result() == null) {
            echo 'Jawaban benar belum dipilih';
        } else {
            return $query->result()[0]->jawaban_quiz;
        }
    }

    function display_total($id_kursus)
    {
        $query = $this->db->get_where('soal_quiz', array('id_kursus' => $id_kursus));
        return $query->num_rows();
    }

    function display_jumlah($id_soal)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal));
        return $query->num_rows();
    }



    function display_teks($id_soal)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal' => $id_soal));
        return $query->result()[0]->soal_quiz;
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal_quiz' => $id));
        return $query->result();
    }

    function arsip_soal($id)
    {
        $query = $this->db->get_where('soal_quiz', array('status'=>'deleted'));
        return $query->result();
    }

    function display_kursus_arsip($id)
    {
        $query = $this->db->get_where('kursus', array('id_kursus'=>$id));
        return $query->result()[0]->kursus;
    }

    function display_soal_arsip($id)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal'=>$id));
        return $query->result()[0]->soal_quiz;
    }

    function arsip_jawaban($id)
    {
        $query = $this->db->get_where('jawaban_quiz', array('status'=>'deleted'));
        return $query->result();
    }
}
