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
			'username' => $username,
			'level' => 'admin'
		);
		$id_user = $this->m_login->display_by_username($username);
		$userdata = $this->m_login->cek_login("users", $where);
		if ($userdata[0]->level == 'admin' && password_verify($password, $userdata[0]->password)) {
			$log = $this->m_login->get_id();
			$id_log = $log[0]->id_log;
			$data_session = array(
				'id_user' => $id_user,
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			$this->m_login->catat_login();

			redirect(base_url("dashboard"));
		} else {
			redirect(base_url("login?pesan=gagal"));
		}
	}

	function logout()
	{
		$this->m_login->catat_logout();
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
