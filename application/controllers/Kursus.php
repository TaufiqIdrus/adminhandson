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
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
        //coba
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
        $data['bahasa']=$this->m_bahasa->display();

        $this->load->view('templates/header', $data);
        $this->load->view('kursus/insert_kursus');
        $this->load->view('templates/footer');
    }

    function update($id_kursus)
    {
        $data['judul'] = 'Update Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/update_kursus', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_kursus)
    {
        $data['judul'] = 'Update Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['kategori'] = $this->m_kategori->display();
        $data['bahasa']=$this->m_bahasa->display();
        $data['kursus'] = $this->m_kursus->display_byID($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('kursus/detail_kursus', $data);
        $this->load->view('templates/footer');
    }

    function insert_kursus()
    {
        $data = array(
            'kursus' => $this->input->post('kursus'),
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
        $result = $this->m_kursus->insert($data);
        if ($result == TRUE) {
            redirect('kursus');
        } else {
            redirect('kursus/insert');
        }
    }

    function update_kursus()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'kursus' => $this->input->post('kursus'),
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
        $id_kursus = $this->input->post('id_kursus');
        $data = $this->security->xss_clean($data);
        $result = $this->m_kursus->update($id_kursus, $data);
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
            redirect('kursus');
        } else {
            redirect('kursus');
        }
    }
}
