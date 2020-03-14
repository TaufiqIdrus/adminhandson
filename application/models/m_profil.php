<?php

class M_profil extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $data['id_user']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('user_profile', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false; 
        }
    }

    function display()
    {
        $query = $this->db->query("select * from users");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user_profile', $data);
    }

    function delete($id)
    {
        return $this->db->delete('user_profile', array('id_user' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id));
        return $query->result();
    }

    function cek_profil($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id));
        return $query->num_rows();
    }
}
