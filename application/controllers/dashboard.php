<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->helper('form');
		$this->load->model('m_dashboard');
	}

	function index()
	{

		$data['judul'] = 'Dashboard';
		$data['jumlah_user'] = $this->m_dashboard->jumlah_user();
		$data['jumlah_dokter'] = $this->m_dashboard->jumlah_dokter();
		$data['jumlah_kursus'] = $this->m_dashboard->jumlah_kursus();
		$data['jumlah_video'] = $this->m_dashboard->jumlah_video();
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}
}
