<?php

class M_login extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where)->result();
	}

	function catat_login()
	{
		$data = array(
			'id_log' => uniqid(),
			'id_user' => $this->session->userdata("id_user"),
			'username' => $this->session->userdata("nama"),
			'controller' => $this->uri->segment(1),
			'method' =>  $this->uri->segment(2),
			'activity' => 'Login',
			'ip_address' => $this->input->ip_address(),

		);
		$data = $this->security->xss_clean($data);
		$this->db->insert('log_aktivitas', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}

	function catat_logout()
	{
		$data = array(
			'id_log' => uniqid(),
			'id_user' => $this->session->userdata("id_user"),
			'username' => $this->session->userdata("nama"),
			'controller' => $this->uri->segment(1),
			'method' =>  $this->uri->segment(2),
			'activity' => 'Logout',
			'ip_address' => $this->input->ip_address(),

		);
		$data = $this->security->xss_clean($data);
		$this->db->insert('log_aktivitas', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}

	function get_id()
	{
		$query = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id_log DESC LIMIT 1");
		return $query->result();
	}

	function display_by_username($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->result()[0]->id_user;
	}
}
