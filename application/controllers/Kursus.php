<?php

class Kursus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kursus');
        $this->load->model('m_dokterkursus');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->model('m_dokter');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Kursus';
        $data['kursus'] = $this->m_kursus->display();
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Kursus';
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['dokter'] = $this->m_dokter->display();
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/insert_kursus');
        $this->load->view('templates/footer');
    }

    function update($id_kursus)
    {
        $data['judul'] = 'Update Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/update_kursus', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_kursus)
    {
        $data['judul'] = 'Detail Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa'] = $this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $data['dokterkursus'] = $this->m_dokterkursus->displayiddokter($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/detail_kursus', $data);
        $this->load->view('templates/footer');
    }

    function insert_kursus()
    {
        $result = $this->m_kursus->insert_kursus();
        if ($result == TRUE) {
            redirect('kursus');
        } else {
            redirect('kursus/insert');
        }
    }

    function update_kursus()
    {
        $result = $this->m_kursus->update_kursus();
        if ($result == TRUE) {
            redirect('kursus');
        } else {
            redirect('kursus/update');
        }
    }

    function delete_kursus($id_kursus)
    {
        $id_kursus = $this->security->xss_clean($id_kursus);
        $result = $this->m_kursus->delete($id_kursus);
        if ($result == TRUE) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('kursus');
        } else {
            redirect('kursus');
        }
    }
}
