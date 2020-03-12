<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_login');
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
	}

	function index()
	{
		$data['judul'] = 'Login Admin Handson Kelola.net';

		$this->load->helper('form');
		$this->load->view('v_login', $data);
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$username = $this->security->xss_clean($username);
		$password = $this->security->xss_clean($password);
		$where = array(
			'username' => $username
		);

		$userdata = $this->m_login->cek_login("users", $where);
		if ($username == 'admin' && password_verify($password, $userdata[0]->password)) {
			$data = array(
				'id_user' => $userdata[0]->id_user,
				'username' => $userdata[0]->username
			);
			$data = $this->security->xss_clean($data);
			$this->m_login->catat_login($data);
			$log = $this->m_login->get_id();
			$id_log = $log[0]->id_log;
			$data_session = array(
				'nama' => $username,
				'id_log' => $id_log,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);


			redirect(base_url("dashboard"));
		} else {
			redirect(base_url("login?pesan=gagal"));
		}
	}

	function logout()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = now('Asia/Jakarta');
		$id_log = $this->session->userdata("id_log");
		$data = array(
			'logout_time' =>mdate($datestring, $time)
		);
		$this->m_login->catat_logout($id_log,$data);
		
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
