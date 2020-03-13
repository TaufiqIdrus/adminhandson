<?php

class M_user extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('users', array('username' => $data['users'], 'emailaddress' => $data['emailaddress']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('users', $data);
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
        return $this->db->update('users', $data);
    }

    function delete($id)
    {
        return $this->db->delete('users', array('id_user' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('users', array('id_user' => $id));
        return $query->result();
    }
}
