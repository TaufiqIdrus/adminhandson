<?php

class M_kategori extends CI_Model
{

    function insert($data)
    {
        $query = $this->db->get_where('kategori', array('kategori' => $data['kategori']), 1);
        if ($query->num_rows() == 0) {
            $this->db->insert('kategori', $data);
            $data = array(
                'id_log' => uniqid(),
                'id_user' => $this->session->userdata("id_user"),
                'username' => $this->session->userdata("nama"),
                'controller' => $this->uri->segment(1),
                'method' =>  $this->uri->segment(2),
                'activity' => 'Insert kategori',
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

    function display()
    {
        $query = $this->db->query("select * from kategori where status = 'active'");
        return $query->result();
    }

    function update($id, $data)
    {
        $this->db->where('id_kategori', $id);

        return $this->db->update('kategori', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'update kategori',
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
            'activity' => 'delete kategori',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);

        $this->db->where('id_kategori', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('kategori', $data);

        // return $this->db->delete('kategori', array('id_kategori' => $id));
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('kategori', array('id_kategori' => $id),);
        return $query->result();
    }
}
