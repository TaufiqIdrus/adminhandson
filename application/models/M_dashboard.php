<?php

class M_dashboard extends CI_Model
{

    function jumlah_dokter()
    {
        $query = $this->db->get_where('dokter', array('status'=>'active'));
        return $query->num_rows();
    }

    function jumlah_user()
    {
        $query = $this->db->get_where('users', array('status'=>'active'));
        return $query->num_rows();
    }

    function jumlah_kursus()
    {
        $query = $this->db->get_where('kursus', array('status'=>'active'));
        return $query->num_rows();
    }

    function jumlah_video()
    {
        $query = $this->db->get_where('videokursus', array('status'=>'active'));
        return $query->num_rows();
    }
}
