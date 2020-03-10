<?php

class Dokter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
       $this->load->model('m_dokter');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Dokter';
        $data['dokter']=$this->m_dokter->display();
        $this->load->view('templates/header', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Dokter';
        $this->load->view('templates/header', $data);
        $this->load->view('dokter/insert_dokter');
        $this->load->view('templates/footer');
    }

    function update($id_dokter)
    {
        $data['judul'] = 'Update Dokter';
        $data['id_dokter'] = $id_dokter;
        $data['dokter']=$this->m_dokter->display_byID($id_dokter);
        $this->load->view('templates/header', $data);
        $this->load->view('dokter/update_dokter',$data);
        $this->load->view('templates/footer');
        
    }

    function insert_dokter()
    {
        $data = array(
            'dokter' => $this->input->post('dokter'),
            'deskripsi' => $this->input->post('deskripsi'),
            'insert_by' => $this->session->userdata("nama")
            
        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_dokter->insert($data);
        if ($result == TRUE) {
            redirect('dokter');
        } else {
            redirect('dokter/insert');
        }
    }

    function update_dokter()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'dokter' => $this->input->post('dokter'),
            'deskripsi' => $this->input->post('deskripsi'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_dokter = $this->input->post('id_dokter');
        $data = $this->security->xss_clean($data);
        $result = $this->m_dokter->update($id_dokter, $data);
        if ($result == TRUE) {
            redirect('dokter');
        } else {
            redirect('dokter/update');
        }
    }

    function delete_dokter($id_dokter)
    {
        $id_dokter = $this->security->xss_clean($id_dokter);
        $result = $this->m_dokter->delete($id_dokter);
        if ($result == TRUE) {
            redirect('dokter');
        } else {
            redirect('dokter');
        }
    }
}
