<?php

class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kategori');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Kategori';
        $data['kategori'] = $this->m_kategori->display();
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Kategori';
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/insert_kategori');
        $this->load->view('templates/footer');
    }

    function update($id_kategori)
    {
        $data['judul'] = 'Update Kategori';
        $data['id_kategori'] = $id_kategori;
        $data['kategori'] = $this->m_kategori->display_byID($id_kategori);
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/update_kategori', $data);
        $this->load->view('templates/footer');
    }

    function insert_kategori()
    {
        $data = array(
            'id_kategori' => uniqid(),
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'insert_by' => $this->session->userdata("nama")

        );

        $data = $this->security->xss_clean($data);
        $result = $this->m_kategori->insert($data);
        if ($result == TRUE) {
            redirect('kategori');
        } else {
            redirect('kategori/insert');
        }
    }
    
    function update_kategori()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_kategori = $this->input->post('id_kategori');
        $data = $this->security->xss_clean($data);
        $result = $this->m_kategori->update($id_kategori, $data);
        if ($result == TRUE) {
            redirect('kategori');
        } else {
            redirect('kategori/update');
        }
    }

    function delete_kategori($id_kategori)
    {
        $id_kategori = $this->security->xss_clean($id_kategori);
        $result = $this->m_kategori->delete($id_kategori);
        if ($result == TRUE) {
            redirect('kategori');
        } else {
            redirect('kategori');
        }
    }
}
