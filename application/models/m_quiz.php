<?php

class M_quiz extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('quiz', array('quiz' => $data['quiz']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('quiz', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from quiz");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_quiz', $id);
        return $this->db->update('quiz', $data);
    }

    function delete($id)
    {
        return $this->db->delete('quiz', array('id_quiz' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('quiz', array('id_quiz' => $id));
        return $query->result();
    }
}
