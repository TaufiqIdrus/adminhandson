<?php

class M_Logaktivitas extends CI_Model
{
    function display()
    {
        $query = $this->db->query("select * from log_aktivitas");
        return $query->result();
    }
}
