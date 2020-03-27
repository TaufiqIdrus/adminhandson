<?php

class Dokterkursus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kursus');
        $this->load->model('m_dokterkursus');
        
        $this->load->model('m_babkursus');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->model('m_dokter');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
        //coba
    }

    function index()
    {
        $data['judul'] = 'Manage Bab Video Kursus';
        $data['kursus'] = $this->m_kursus->display();
        $this->load->view('templates/header', $data);
        $this->load->view('dokterkursus/index', $data);
        $this->load->view('templates/footer');
    }

    function managedokter($id_kursus)
    {
        $data['judul'] = 'Manage Dokter Pengajar Kursus';
        $data['dokterkursus'] = $this->m_dokterkursus->displayiddokter($id_kursus);
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('dokterkursus/managedokter', $data);
        $this->load->view('templates/footer');
    }

    function arsip()
    {
        $data['judul'] = 'Arsip Dokter Pengajar Kursus';
        $data['dokter'] = $this->m_dokterkursus->arsip();
        $this->load->view('templates/header', $data);
        $this->load->view('dokterkursus/arsip', $data);
        $this->load->view('templates/footer');
    }

    function insertdokter($id_kursus)
    {
        $data['judul'] = 'Insert Dokter Pengajar Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['dokter'] = $this->m_dokterkursus->displaydokter($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('dokterkursus/insertdokter', $data);
        $this->load->view('templates/footer');
    }

    function insert_dokter()
    {

        $id_kursus = $this->input->post('id_kursus');
        
        $result = $this->m_dokterkursus->insert_dokter();
        if ($result == TRUE) {
            redirect('dokterkursus/managedokter/'  . $id_kursus);
        } else {
            redirect('dokterkursus/insertdokter/'  . $id_kursus);
        }
    }

    function delete_dokter($id_dokterkursus)
    {
        $id_kursus = $this->input->get('id_kursus');
        $id_dokterkursus = $this->security->xss_clean($id_dokterkursus);
        $result = $this->m_dokterkursus->delete_dokter($id_dokterkursus);
        if ($result == TRUE) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('dokterkursus/managedokter/'  . $id_kursus);
        } 
    }
}
