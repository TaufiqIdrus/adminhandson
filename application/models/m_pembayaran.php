<?php

class M_pembayaran extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('pembayaran', array('pembayaran' => $data['pembayaran']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('pembayaran', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from pembayaran");
        return $query->result();
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('pembayaran', array('transaction_id' => $id));
        return $query->result();
    }
}
