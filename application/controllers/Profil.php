<?php

class Profil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_user');
        $this->load->model('m_profil');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Profil User';
        $data['user'] = $this->m_profil->display();
        $this->load->view('templates/header', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('templates/footer');
    }

    function arsip()
    {
        $data['judul'] = 'Arsip Profil User';
        $data['user'] = $this->m_profil->display();
        $this->load->view('templates/header', $data);
        $this->load->view('profil/arsip', $data);
        $this->load->view('templates/footer');
    }

    function insert($id_user)
    {
        $data['judul'] = 'Insert Profil User';
        $data['id_user'] = $id_user;
        $this->load->view('templates/header', $data);
        $this->load->view('profil/insert_profil', $data);
        $this->load->view('templates/footer');
    }

    function update($id_user)
    {
        $data['judul'] = 'Update User';
        $data['id_user'] = $id_user;
        $data['profil'] = $this->m_profil->display_byID($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('profil/update_profil', $data);
        $this->load->view('templates/footer');
    }

    function insert_profil()
    {
        $id_user = $this->input->post('id_user');
        $result = $this->m_profil->insert_profil();
        if ($result == TRUE) {
            redirect('profil');
        } else {
            redirect('kursus/insert/' . $id_user);
        }
    }

    function delete($id_profil)
    {
        $id_profil = $this->security->xss_clean($id_profil);
        $result = $this->m_profil->delete($id_profil);
        if ($result == TRUE) {
            redirect('profil');
        } else {
            redirect('profil');
        }
    }

    function update_profil()
    {
        $id_user = $this->input->post('id_user');
        $result = $this->m_profil->update_profil();
        if ($result == TRUE) {
            redirect('profil');
        } else {
            redirect('profil/update' . $id_user);
        }
    }







}
