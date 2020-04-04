<?php

class Voucher extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_voucher');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
    }

    function index()
    {
        $data['judul'] = 'Manage Voucher';
        $data['voucher'] = $this->m_voucher->display();
        $this->load->view('templates/header', $data);
        $this->load->view('voucher/index', $data);
        $this->load->view('templates/footer');
    }

    function arsip()
    {
        $data['judul'] = 'Arsip Voucher';
        $data['voucher'] = $this->m_voucher->arsip();
        $this->load->view('templates/header', $data);
        $this->load->view('voucher/arsip', $data);
        $this->load->view('templates/footer');
    }

    function insert()
    {
        $data['judul'] = 'Insert Voucher';
        $this->load->view('templates/header', $data);
        $this->load->view('voucher/insert_voucher');
        $this->load->view('templates/footer');
    }

    function update($id_voucher)
    {
        $data['judul'] = 'Update Voucher';
        $data['id_voucher'] = $id_voucher;
        $data['voucher'] = $this->m_voucher->display_byID($id_voucher);
        $this->load->view('templates/header', $data);
        $this->load->view('voucher/update_voucher', $data);
        $this->load->view('templates/footer');
    }

    function insert_voucher()
    {
        $data = array(
            'id_voucher' => uniqid(),
            'kode_voucher' => $this->input->post('kode_voucher'),
            'deskripsi' => $this->input->post('deskripsi'),
            'potongan' => $this->input->post('potongan'),
            'jenispotongan' => $this->input->post('jenispotongan'),
            'reseller' => $this->input->post('reseller'),
            'bonus_reseller' => $this->input->post('bonus_reseller'),
            'tersedia_untuk' => $this->input->post('tersedia_untuk'),
            'expired_date' => $this->input->post('expired_date'),
            'jumlah_tersedia' => $this->input->post('jumlah_tersedia'),
            'insert_by' => $this->session->userdata("nama")
        );

        $data = $this->security->xss_clean($data);
        $result = $this->m_voucher->insert($data);
        if ($result == TRUE) {
            redirect('voucher');
        } else {
            redirect('voucher/insert');
        }
    }

    function update_voucher()
    {
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = now('Asia/Jakarta');
        $data = array(
            'kode_voucher' => $this->input->post('kode_voucher'),
            'deskripsi' => $this->input->post('deskripsi'),
            'potongan' => $this->input->post('potongan'),
            'jenispotongan' => $this->input->post('jenispotongan'),
            'reseller' => $this->input->post('reseller'),
            'bonus_reseller' => $this->input->post('bonus_reseller'),
            'tersedia_untuk' => $this->input->post('tersedia_untuk'),
            'expired_date' => $this->input->post('expired_date'),
            'jumlah_tersedia' => $this->input->post('jumlah_tersedia'),
            'insert_by' => $this->session->userdata("nama"),
            'last_update' => mdate($datestring, $time)
        );
        $id_voucher = $this->input->post('id_voucher');
        $data = $this->security->xss_clean($data);
        $result = $this->m_voucher->update($id_voucher, $data);
        if ($result == TRUE) {
            redirect('voucher');
        } else {
            redirect('voucher/update');
        }
    }

    function delete_voucher($id_voucher)
    {
        $id_voucher = $this->security->xss_clean($id_voucher);
        $result = $this->m_voucher->delete($id_voucher);
        if ($result == TRUE) {
            redirect('voucher');
        } else {
            redirect('voucher');
        }
    }
}
