<?php

class M_voucher extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('voucher', array('kode_voucher' => $data['kode_voucher']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('voucher', $data);
            $data = array(
                'id_log' => uniqid(),
                'id_user' => $this->session->userdata("id_user"),
                'username' => $this->session->userdata("nama"),
                'controller' => $this->uri->segment(1),
                'method' =>  $this->uri->segment(2),
                'activity' => 'Insert voucher',
                'ip_address' => $this->input->ip_address(),

            );
            $data = $this->security->xss_clean($data);
            $this->db->insert('log_aktivitas', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    function insert_kursus($data)
    {
        $this->db->insert('voucher_k', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert ketesediaan voucher',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function display()
    {
        $query = $this->db->query("select * from voucher where status = 'active'");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_voucher', $id);

        return $this->db->update('voucher', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'update voucher',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'delete voucher',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);

        $this->db->where('id_voucher', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('voucher', $data);

        // return $this->db->delete('voucher', array('id_voucher' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('voucher', array('id_voucher' => $id),);
        return $query->result();
    }

    function arsip()
    {
        $query = $this->db->get_where('voucher', array('status' => 'deleted'));
        return $query->result();
    }

    function manage_kursus($id_voucher)
    {
        $query = $this->db->get_where('voucher_k', array('id_voucher' => $id_voucher, 'status' => 'active'));
            return $query->result();
        
    }

    function manage_kategori($id_voucher)
    {
        $query = $this->db->get_where('voucher_k', array('id_voucher' => $id_voucher, 'status' => 'active'));
            return $query->result();
        
    }

    function display_nama_kursus($id_kursus)
    {
        $query = $this->db->get_where('kursus', array('id_kursus' => $id_kursus, 'status' => 'active'));
        if ($query->num_rows() > 0) {
            return $query->result()[0]->kursus;
        }else{
            return "Kursus sudah tidak aktif";
        }
    }

    function displaykursus($id_voucher)
    {
        $query = $this->db->query("SELECT * FROM kursus WHERE kursus.id_kursus not in (select id_kursus from voucher_k where id_voucher = '$id_voucher' and status = 'active') and status = 'active'");
        return $query->result();
    }

    function delete_kursus($id)
    {
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'delete voucher kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);

        $this->db->where('id_ket', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('voucher_k', $data);

        // return $this->db->delete('voucher', array('id_voucher' => $id));
    }

    function display_nama_kategori($id_kategori)
    {
        $query = $this->db->get_where('kategori', array('id_kategori' => $id_kategori, 'status' => 'active'));
        if ($query->num_rows() > 0) {
            return $query->result()[0]->kategori;
        }else{
            return "Kategori sudah tidak aktif";
        }
    }

    function displaykategori($id_voucher)
    {
        $query = $this->db->query("SELECT * FROM kategori WHERE kategori.id_kategori not in (select id_kursus from voucher_k where id_voucher = '$id_voucher' and status = 'active') and status = 'active'");
        return $query->result();
    }

    function delete_kategori($id)
    {
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'delete voucher kategori',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);

        $this->db->where('id_ket', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('voucher_k', $data);

        // return $this->db->delete('voucher', array('id_voucher' => $id));
    }
}
