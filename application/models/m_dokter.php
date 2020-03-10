<?php

class M_dokter extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('dokter', array('dokter' => $data['dokter']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('dokter', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from dokter");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_dokter', $id);
        return $this->db->update('dokter', $data);
    }

    function delete($id)
    {
        return $this->db->delete('dokter', array('id_dokter' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('dokter', array('id_dokter' => $id));
        return $query->result();
    }
}
