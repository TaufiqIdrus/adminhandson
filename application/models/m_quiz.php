<?php

class M_quiz extends CI_Model
{
    function display_kursus()
    {
        $query = $this->db->query("select * from kursus");
        return $query->result();
    }

    function display_soal($id_kursus)
    {
        $query = $this->db->get_where('soal_quiz', array('id_kursus' => $id_kursus));
        return $query->result();
    }

    function insert_soal($data)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal' => $data['id_soal']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('soal_quiz', $data);
            $data = array(
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
            }
        } else {
            return false;
        }
    }

    function insert_jawaban($data)
    {
        $this->db->insert('jawaban_quiz', $data);
        $data = array(
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

    function pilihan($id)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id));
        return $query->result();
    }

    function ganti_jawaban($id, $data)
    {
        $this->db->where('id_soal', $id);
        return $this->db->update('soal_quiz', $data);
        $data = array(
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

    function display_pilihan($id_soal)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal));
        return $query->result();
    }

    function display_jawaban($id_jawaban)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_jawaban' => $id_jawaban));
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

    function displayjawaban($id_soal)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal));
        return $query->result();
    }

    function display_teks($id_soal)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal' => $id_soal));
        return $query->result()[0]->soal_quiz;
    }

    function update_jawaban($id, $data)
    {
        $this->db->where('id_jawaban', $id);
        return $this->db->update('jawaban_quiz', $data);
        $data = array(
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
        return $this->db->delete('soal_quiz', array('id_soal' => $id));
        $data = array(
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


    function display()
    {
        $query = $this->db->query("select * from soal_quiz");
        return $query->result();
    }



    function update_soal($id, $data)
    {
        $this->db->where('id_soal', $id);
        return $this->db->update('soal_quiz', $data);
        $data = array(
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
        return $this->db->delete('jawaban_quiz', array('id_jawaban' => $id));
        $data = array(
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

    function display_byID($id)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal_quiz' => $id));
        return $query->result();
    }
}
