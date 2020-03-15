<?php

class Bahasa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_bahasa');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
        //haihaihai
    }

    function index()
    {
        $data['judul'] = 'Manage Bahasa';
        $data['bahasa']=$this->m_bahasa->display();
        $this->load->view('templates/header', $data);
        $this->load->view('bahasa/index', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Bahasa';
        $this->load->view('templates/header', $data);
        $this->load->view('bahasa/insert_bahasa');
        $this->load->view('templates/footer');
    }

    function update($id_bahasa)
    {
        $data['judul'] = 'Update Bahasa';
        $data['id_bahasa'] = $id_bahasa;
        $data['bahasa']=$this->m_bahasa->display_byID($id_bahasa);
        $this->load->view('templates/header', $data);
        $this->load->view('bahasa/update_bahasa',$data);
        $this->load->view('templates/footer');

        
    }

    function insert_bahasa()
    {
        $data = array(
            'bahasa' => $this->input->post('bahasa'),
            'insert_by' => $this->session->userdata("nama")
        );
        $data = $this->security->xss_clean($data);
        $result = $this->m_bahasa->insert($data);
        if ($result == TRUE) {
            redirect('bahasa');
        } else {
            redirect('bahasa/insert');
        }
    }

    function update_bahasa()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'bahasa' => $this->input->post('bahasa'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_bahasa = $this->input->post('id_bahasa');
        $data = $this->security->xss_clean($data);
        $result = $this->m_bahasa->update($id_bahasa, $data);
        if ($result == TRUE) {
            redirect('bahasa');
        } else {
            redirect('bahasa/update');
        }
    }

    function delete_bahasa($id_bahasa)
    {
        $id_bahasa = $this->security->xss_clean($id_bahasa);
        $result = $this->m_bahasa->delete($id_bahasa);
        if ($result == TRUE) {
            redirect('bahasa');
        } else {
            redirect('bahasa');
        }
    }

}
