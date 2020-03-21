<?php

class M_quiz extends CI_Model
{

    function insert_soal($data)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal' => $data['id_soal']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('soal_quiz', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function insert_jawaban($data)
    {
        $this->db->insert_batch('jawaban_quiz', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->db->showerror();
        }
    }

    function insert_satujawaban($data)
    {
        $this->db->insert('jawaban_quiz', $data);
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

    function insert_benar($id, $data)
    {
        $this->db->where('id_soal', $id);
        return $this->db->update('soal_quiz', $data);
    }

    function display_soal($id_kursus)
    {
        $query = $this->db->get_where('soal_quiz', array('id_kursus' => $id_kursus));
        return $query->result();
    }

    function display_pilihan($id_soal)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_soal' => $id_soal));
        return $query->result();
    }

    function display_jawaban($id_jawaban)
    {
        $query = $this->db->get_where('jawaban_quiz', array('id_jawaban' => $id_jawaban));
        if ($query->result() == null){
            echo 'Jawaban benar belum dipilih';
        }else{
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
    }

    function delete_soal($id)
    {
        return $this->db->delete('soal_quiz', array('id_soal' => $id));
    }


    function display()
    {
        $query = $this->db->query("select * from soal_quiz");
        return $query->result();
    }

    function display_kursus()
    {
        $query = $this->db->query("select * from kursus");
        return $query->result();
    }

    function update_soal($id, $data)
    {
        $this->db->where('id_soal', $id);
        return $this->db->update('soal_quiz', $data);
    }

    function delete_jawaban($id)
    {
        return $this->db->delete('jawaban_quiz', array('id_jawaban' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal_quiz' => $id));
        return $query->result();
    }
}
