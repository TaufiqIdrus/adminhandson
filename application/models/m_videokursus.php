<?php

class M_videokursus extends CI_Model
{

    function insert_video()
    {
        $data = array(
            'id_video' => $this->input->post('id_video'),
            'id_kursus' => $this->input->post('id_kursus'),
            'id_bab' => $this->input->post('id_bab'),
            'judul_video' => $this->input->post('judul_video'),
            'video' => $this->_uploadVideo(),
            'durasi' => $this->input->post('durasi'),
            'id_kursus' => $this->input->post('id_kursus'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('videokursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert video',
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
        $query = $this->db->query("select * from videokursus where status ='active'");
        return $query->result();
    }

    function update_video()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        if (!empty($_FILES["video"]["name"])) {
            $data = array(
                'id_kursus' => $this->input->post('id_kursus'),
                'judul_video' => $this->input->post('judul_video'),
                'id_bab' => $this->input->post('id_bab'),
                'video' => $this->_uploadVideo(),
                'durasi' => $this->input->post('durasi'),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        } else {
            $data = array(
                'id_kursus' => $this->input->post('id_kursus'),
                'judul_video' => $this->input->post('judul_video'),
                'id_bab' => $this->input->post('id_bab'),
                'video' => $this->input->post('old_video'),
                'durasi' => $this->input->post('durasi'),
                'insert_by' => $this->session->userdata("nama"),
                'last_update' => mdate($datestring, $time)
            );
        }

        $id_video = $this->input->post('id_video');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_video', $id_video);
        return $this->db->update('videokursus', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update video',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->_deleteVideo($id);
        $this->db->where('id_video', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('videokursus', $data);
        //return $this->db->delete('videokursus', array('id_video' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete video',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('videokursus', array('id_video' => $id, 'status' => 'active'));
        return $query->result();
    }

    function display_video($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->result();
    }

    function display_bab($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->result();
    }

    function display_bab_kursus($id)
    {
        $query = $this->db->get_where('bab_kursus', array('id_bab' => $id, 'status' => 'active'));
        return $query->result()[0]->bab_kursus;
    }

    function display_kursus($id)
    {
        $query = $this->db->get_where('kursus', array('id_kursus' => $id));
        return $query->result()[0]->kursus;
    }

    function display_jumlah($id)
    {
        $query = $this->db->get_where('videokursus', array('id_kursus' => $id, 'status' => 'active'));
        return $query->num_rows();
    }

    private function _uploadVideo()
    {
        $config['upload_path']          = './upload/video/';
        $config['allowed_types']        = 'mp4';
        $config['file_name']            = $this->input->post('id_video');
        $config['overwrite']            = true;
        $config['max_size']             = 0; // no limit
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('video')) {
            return $this->upload->data("file_name");
        }
        return "default.mp4";
    }

    private function _deleteVideo($id)
    {
        $video = $this->display_byID($id);
        if ($video[0]->video != "default.mp4") {
            $filename = explode(".", $video[0]->video)[0];
            return array_map('unlink', glob(FCPATH . "upload/video/$filename.*"));
        }
    }

    function arsip()
    {
        $query = $this->db->get_where('videokursus', array('status' => 'deleted'));
        return $query->result();
    }
}
