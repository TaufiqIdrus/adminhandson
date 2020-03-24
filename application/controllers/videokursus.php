<?php

class Videokursus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_kursus');
        $this->load->model('m_videokursus');
        $this->load->model('m_kategori');
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage video kursus';
        $data['kursus'] = $this->m_kursus->display();
        $this->load->view('templates/header', $data);
        $this->load->view('videokursus/index', $data);
        $this->load->view('templates/footer');
    }

    function manage($id_kursus)
    {
        $data['judul'] = 'Manage Video Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['video'] = $this->m_videokursus->display_video($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('videokursus/manage', $data);
        $this->load->view('templates/footer');
    }

    function insert($id_kursus)
    {
        $data['judul'] = 'Insert Video Kursus';
        $data['id_kursus'] = $id_kursus;
        $data['bab_kursus'] = $this->m_videokursus->display_bab($id_kursus);
        $this->load->view('templates/header', $data);
        $this->load->view('videokursus/insert_video');
        $this->load->view('templates/footer');
    }

    function update($id_video)
    {
        $data['judul'] = 'Update Video Kursus';
        // $id_kursus = $this->input->get('id_kursus');
        $data['id_video'] = $id_video;
        $data['id_kursus'] = $this->input->get('id_kursus');
        // $data['bab_kursus'] = $this->m_videokursus->display_bab($id_kursus);
        $data['video'] = $this->m_videokursus->display_byID($id_video);
        $this->load->view('templates/header', $data);
        $this->load->view('videokursus/update_video');
        $this->load->view('templates/footer');
    }

    function insert_video()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_videokursus->insert_video();
        if ($result == TRUE) {
            redirect('videokursus/manage/' . $id_kursus);
        } else {
            redirect('videokursus/insert/' . $id_kursus);
        }
    }

    function update_video()
    {
        $id_kursus = $this->input->post('id_kursus');
        $result = $this->m_videokursus->update_video();
        if ($result == TRUE) {
            redirect('videokursus/manage/' . $id_kursus);
        } else {
            redirect('videokursus/update/' . $id_kursus);
        }
    }

    function delete_video($id_video)
    {
        $id_kursus = $this->input->get('id_kursus');
        $id_video = $this->security->xss_clean($id_video);
        $result = $this->m_videokursus->delete($id_video);
        if ($result == TRUE) {
            redirect('videokursus/manage/' . $id_kursus);
        } else {
            redirect('videokursus/update/' . $id_kursus);
        }
    }
}
