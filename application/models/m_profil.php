<?php

class M_profil extends CI_Model
{

    function insert_profil()
    {
        $data = array(
            'id_profile' => $this->input->post('id_profile'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'birthdate' => $this->input->post('birthdate'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
            'pendidikan' => $this->input->post('pendidikan'),
            'gambar' => $this->_uploadImage(),
            'id_user' => $this->input->post('id_user'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('user_profile', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Insert profil',
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
        $query = $this->db->query("select * from users where status = 'active'");
        return $query->result();
    }

    function update_profil()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        if (!empty($_FILES["gambar"]["name"])) {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'birthdate' => $this->input->post('birthdate'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'alamat' => $this->input->post('alamat'),
                'pendidikan' => $this->input->post('pendidikan'),
                'gambar' => $this->_uploadImage(),
                'id_user' => $this->input->post('id_user'),
                'last_update' => mdate($datestring, $time),
                'insert_by' => $this->session->userdata("nama")
            );
        }else{
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'birthdate' => $this->input->post('birthdate'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'alamat' => $this->input->post('alamat'),
                'pendidikan' => $this->input->post('pendidikan'),
                'gambar' => $this->input->post('old_image'),
                'id_user' => $this->input->post('id_user'),
                'last_update' => mdate($datestring, $time),
                'insert_by' => $this->session->userdata("nama")
            );
        }
        
        $id_user = $this->input->post('id_user');
        $data = $this->security->xss_clean($data);
        $this->db->where('id_user', $id_user);
        return $this->db->update('user_profile', $data);
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Update profil',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function delete($id)
    {
        $this->_deleteImage($id);
        $this->db->where('id_user', $id);
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->update('user_profile', $data);
        //return $this->db->delete('user_profile', array('id_user' => $id));
        $data = array(
            'id_log' => uniqid(),
            'id_user' => $this->session->userdata("id_user"),
            'username' => $this->session->userdata("nama"),
            'controller' => $this->uri->segment(1),
            'method' =>  $this->uri->segment(2),
            'activity' => 'Delete profil',
            'ip_address' => $this->input->ip_address(),

        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('log_aktivitas', $data);
    }

    function display_byID($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id, 'status' =>'active'));
        return $query->result();
    }


    function cek_profil($id)
    {
        $query = $this->db->get_where('user_profile', array('id_user' => $id, 'status' =>'active'));
        return $query->num_rows();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('id_profile');
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
        $profil = $this->display_byID($id);
        if ($profil[0]->gambar != "default.jpg") {
            $filename = explode(".", $profil[0]->gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/profil/$filename.*"));
        }
    }

    function arsip($id)
    {
        $query = $this->db->get_where('user_profile', array('status'=>'deleted'));
        return $query->result();
    }
}
