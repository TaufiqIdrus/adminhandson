<?php

class Logaktivitas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_logaktivitas');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Log aktivitas';
        $data['logaktivitas'] = $this->m_logaktivitas->display();
        $this->load->view('templates/header', $data);
        $this->load->view('logaktivitas/index', $data);
        $this->load->view('templates/footer');
    }

}
