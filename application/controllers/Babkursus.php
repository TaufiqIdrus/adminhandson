<?php

class Babkursus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kursus');
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
        $this->load->view('babkursus/index', $data);
        $this->load->view('templates/footer');
    }

    function managebab($id_kursus)
    {
        $data['judul'] = 'Manage Bab Video Kursus';
        $data['babkursus'] = $this->m_babkursus->display($id_kursus);
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('babkursus/managebab', $data);
        $this->load->view('templates/footer');
    }

    function insertbab($id_kursus)
    {
        $data['judul'] = 'Insert Bab Video Kursus';
        $data['id_kursus'] = $id_kursus;
        $this->load->view('templates/header', $data);
        $this->load->view('babkursus/insertbab', $data);
        $this->load->view('templates/footer');
    }

    function insert_bab()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_babkursus->insert_bab();
        if ($result == TRUE) {
            redirect('babkursus/managebab/'  . $id_kursus);
        } else {
            redirect('babkursus/insertbab/'  . $id_kursus);
        }
    }

    function updatebab($id_bab)
    {
        $data['judul'] = 'Insert Bab Video Kursus';
        $data['id_kursus'] = $this->input->get('id_kursus');
        $data['id_bab'] = $id_bab;
        $data['bab_kursus'] = $this->m_babkursus->displaykursus($id_bab);
        $this->load->view('templates/header', $data);
        $this->load->view('babkursus/updatebab', $data);
        $this->load->view('templates/footer');
    }

    function update_bab()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_babkursus->update_bab();
        if ($result == TRUE) {
            redirect('babkursus/managebab/'  . $id_kursus);
        } else {
            redirect('babkursus/updatebab/'  . $id_kursus);
        }
    }

    function delete_bab($id_bab)
    {
        $id_kursus = $this->input->get('id_kursus');
        $id_bab = $this->security->xss_clean($id_bab);
        $result = $this->m_babkursus->delete_bab($id_bab);
        if ($result == TRUE) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('babkursus/managebab/'  . $id_kursus);
        }
    }
}
