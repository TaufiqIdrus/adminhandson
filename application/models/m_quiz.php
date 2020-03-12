<?php

class M_quiz extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('soal_quiz', array('soal_quiz' => $data['soal_quiz']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('soal_quiz', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
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

    function update($id, $data)
    {
        $this->db->where('id_soal_quiz', $id);
        return $this->db->update('soal_quiz', $data);
    }

    function delete($id)
    {
        return $this->db->delete('soal_quiz', array('id_soal_quiz' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('soal_quiz', array('id_soal_quiz' => $id));
        return $query->result();
    }
}
