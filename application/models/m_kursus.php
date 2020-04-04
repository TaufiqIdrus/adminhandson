<?php

class M_kursus extends CI_Model
{

    function insert_kursus()
    {
        $data = array(
            'id_kursus' => uniqid(),
            'kursus' => $this->input->post('kursus'),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
            'deskripsi_full' => $this->input->post('deskripsi_full'),
            'harga' => $this->input->post('harga'),
            'jumlahdiskon' => $this->input->post('jumlahdiskon'),
            'awal_diskon' => $this->input->post('awal_diskon'),
            'akhir_diskon' => $this->input->post('akhir_diskon'),
            'harga_diskon' => $this->input->post('harga') - $this->input->post('harga') * $this->input->post('jumlahdiskon') / 100,
            'durasi' => $this->input->post('durasi'),
            'persyaratan' => $this->input->post('persyaratan'),
            'gambar' => $this->_uploadImage(),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'id_subtitle' => $this->input->post('id_subtitle'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('kursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert kursus',
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
        $query = $this->db->query("select * from kursus where status = 'active'");
        return $query->result();
    }

    function update_kursus()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');

        if (!empty($_FILES["gambar"]["name"])) {
            $data = array(
                'kursus' => $this->input->post('kursus'),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'deskripsi_full' => $this->input->post('deskripsi_full'),
                'harga' => $this->input->post('harga'),
                'jumlahdiskon' => $this->input->post('jumlahdiskon'),
                'harga_diskon' => $this->input->post('harga') - $this->input->post('harga') * $this->input->post('jumlahdiskon') / 100,
                'durasi' => $this->input->post('durasi'),
                'persyaratan' => $this->input->post('persyaratan'),
                'gambar' => $this->_uploadImage(),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_bahasa' => $this->input->post('id_bahasa'),
                'id_subtitle' => $this->input->post('id_subtitle'),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        } else {
            $data = array(
                'kursus' => $this->input->post('kursus'),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'deskripsi_full' => $this->input->post('deskripsi_full'),
                'harga' => $this->input->post('harga'),
                'jumlahdiskon' => $this->input->post('jumlahdiskon'),
                'harga_diskon' => $this->input->post('harga') - $this->input->post('harga') * $this->input->post('jumlahdiskon') / 100,
                'durasi' => $this->input->post('durasi'),
                'persyaratan' => $this->input->post('persyaratan'),
                'gambar' => $this->input->post('old_image'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_bahasa' => $this->input->post('id_bahasa'),
                'id_subtitle' => $this->input->post('id_subtitle'),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        }
        $id_kursus = $this->input->post('id_kursus');
        $this->db->where('id_kursus', $id_kursus);
        $data = $this->security->xss_clean($data);
        return $this->db->update('kursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->_deleteImage($id);
        $this->db->where('id_kursus', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('kursus', $data);

        //return $this->db->delete('kursus', array('id_kursus' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete kursus',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('kursus', array('id_kursus' => $id));
        return $query->result();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/kursus/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('id_kursus');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $kursus = $this->display_byID($id);
        if ($kursus[0]->gambar != "default.jpg") {
            $filename = explode(".", $kursus[0]->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/kursus/$filename.*"));
        }
    }

    function arsip()
    {
        $query = $this->db->get_where('kursus', array('status' => 'deleted'));
        return $query->result();
    }

    function export()
    {
        $query = $this->db->query("select * from kursus");
        return $query->result();
    }
}
