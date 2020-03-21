<?php 

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->helper('form');
	}

	function index(){
		$data['judul'] = 'Halaman Admin Handson Kelola.net';
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}

}