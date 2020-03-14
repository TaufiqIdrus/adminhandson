<?php

class Pembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_pembayaran');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Pembayaran';
        $data['pembayaran']=$this->m_pembayaran->display();
        $this->load->view('templates/header', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    

}
