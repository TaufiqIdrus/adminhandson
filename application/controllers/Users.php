<?php

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_users');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Users';
        $data['users'] = $this->m_users->display();
        $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Users';
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();

        $this->load->view('templates/header', $data);
        $this->load->view('users/insert_users');
        $this->load->view('templates/footer');
    }

    function update($id_users)
    {
        $data['judul'] = 'Update Users';
        $data['id_users'] = $id_users;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['users'] = $this->m_users->display_byID($id_users);
        $this->load->view('templates/header', $data);
        $this->load->view('users/update_users', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_users)
    {
        $data['judul'] = 'Update Users';
        $data['id_users'] = $id_users;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['users'] = $this->m_users->display_byID($id_users);
        $this->load->view('templates/header', $data);
        $this->load->view('users/detail_users', $data);
        $this->load->view('templates/footer');
    }

    function insert_users()
    {
        $data = array(
            'users' => $this->input->post('users'),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
            'deskripsi_full' => $this->input->post('deskripsi_full'),
            'harga' => $this->input->post('harga'),
            'persyaratan' => $this->input->post('persyaratan'),
            'dokter' => $this->input->post('dokter'),
            'gambar' => $this->input->post('gambar'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'id_subtitle' => $this->input->post('id_subtitle'),
            'insert_by' => $this->session->userdata("nama")

        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_users->insert($data);
        if ($result == TRUE) {
            redirect('users');
        } else {
            redirect('users/insert');
        }
    }

    function update_users()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'users' => $this->input->post('users'),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
            'deskripsi_full' => $this->input->post('deskripsi_full'),
            'harga' => $this->input->post('harga'),
            'persyaratan' => $this->input->post('persyaratan'),
            'dokter' => $this->input->post('dokter'),
            'gambar' => $this->input->post('gambar'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'id_subtitle' => $this->input->post('id_subtitle'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_users = $this->input->post('id_users');
        $data = $this->security->xss_clean($data);
        $result = $this->m_users->update($id_users, $data);
        if ($result == TRUE) {
            redirect('users');
        } else {
            redirect('users/update');
        }
    }

    function delete_users($id_users)
    {
        $id_users = $this->security->xss_clean($id_users);
        $result = $this->m_users->delete($id_users);
        if ($result == TRUE) {
            redirect('users');
        } else {
            redirect('users');
        }
    }
}
