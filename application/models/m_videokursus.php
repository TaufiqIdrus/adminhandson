<?php

class M_videokursus extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('videokursus', array('url_video' => $data['url_video']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('videokursus', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from videokursus");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_video', $id);
        return $this->db->update('videokursus', $data);
    }

    function delete($id)
    {
        return $this->db->delete('videokursus', array('id_video' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('videokursus', array('id_video' => $id));
        return $query->result();
    }

    function display_video($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id));
        return $query->result();
    }

    function display_jumlah($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id));
        return $query->num_rows();
    }
}
