<?php

class M_dokter extends CI_Model
{

    function insert_dokter()
    {
        $data = array(
            'id_dokter' => uniqid(),
            'dokter' => $this->input->post('dokter'),
            'spesialis' => $this->input->post('spesialis'),
            'rwyt_pendidikan' => $this->input->post('rwyt_pendidikan'),
            'rwyt_pekerjaan' => $this->input->post('rwyt_pekerjaan'),
            'motto' => $this->input->post('motto'),
            'gambar' => $this->_uploadImage(),
            'insert_by' => $this->session->userdata("nama")
        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('dokter', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert dokter',
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
        $query = $this->db->query("select * from dokter where status = 'active'");
        return $query->result();
    }

    function update_dokter()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');

        if (!empty($_FILES["gambar"]["name"])) {
            $data = array(
                'dokter' => $this->input->post('dokter'),
                'spesialis' => $this->input->post('spesialis'),
                'rwyt_pendidikan' => $this->input->post('rwyt_pendidikan'),
                'rwyt_pekerjaan' => $this->input->post('rwyt_pekerjaan'),
                'motto' => $this->input->post('motto'),
                'gambar' => $this->_uploadImage(),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        } else {
            $data = array(
                'dokter' => $this->input->post('dokter'),
                'spesialis' => $this->input->post('spesialis'),
                'rwyt_pendidikan' => $this->input->post('rwyt_pendidikan'),
                'rwyt_pekerjaan' => $this->input->post('rwyt_pekerjaan'),
                'motto' => $this->input->post('motto'),
                'gambar' => $this->input->post('old_image'),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        }
        $id_dokter = $this->input->post('id_dokter');
        $this->db->where('id_dokter', $id_dokter);
        $data = $this->security->xss_clean($data);
        return $this->db->update('dokter', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update dokter',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->_deleteImage($id);
        $this->db->where('id_dokter', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('dokter', $data);

        //return $this->db->delete('dokter', array('id_dokter' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete dokter',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('dokter', array('id_dokter' => $id));
        return $query->result();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/dokter/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('id_dokter');
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
        $dokter = $this->display_byID($id);
        if ($dokter[0]->gambar != "default.jpg") {
            $filename = explode(".", $dokter[0]->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/dokter/$filename.*"));
        }
    }

    function arsip()
    {
        $query = $this->db->get_where('dokter', array('status'=>'deleted'));
        return $query->result();
    }
}
