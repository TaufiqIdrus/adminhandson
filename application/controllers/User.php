<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_user');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->model('m_profil');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage User';
        $data['user'] = $this->m_user->display();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert User';
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $this->load->view('templates/header', $data);
        $this->load->view('user/insert_user');
        $this->load->view('templates/footer');
    }

    function update($id_user)
    {
        $data['judul'] = 'Update User';
        $data['id_user'] = $id_user;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['user'] = $this->m_user->display_byID($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('user/update_user', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_user)
    {
        $data['judul'] = 'Detail User';
        $data['id_user'] = $id_user;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['user'] = $this->m_user->display_byID($id_user);
        $data['profil'] = $this->m_profil->display_byID($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail_user', $data);
        $this->load->view('templates/footer');
    }

    function insert_user()
    {
        if ($this->input->post('password') == $this->input->post('password_confirm')) {
            $result = $this->m_user->insert_user();
            if ($result == TRUE) {
                redirect('user');
            } else {
                redirect('user/insert');
            }
        } else {
            redirect('user/insert');
        }
    }

    function update_user()
    {

        if ($this->input->post('password') == $this->input->post('password_confirm')) {
            $result = $this->m_user->update_user();
            if ($result == TRUE) {
                redirect('user');
            } else {
                redirect('user/insert');
            }
        } else {
            redirect('user/insert');
        }
    }

    function delete_user($id_user)
    {
        $id_user = $this->security->xss_clean($id_user);
        $result = $this->m_user->delete($id_user);
        if ($result == TRUE) {
            redirect('user');
        } else {
            redirect('user');
        }
    }
}
