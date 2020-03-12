<?php

class M_login extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where)->result();
	}

	function catat_login($data)
	{
		$this->db->insert('log_aktivitas', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}

	function catat_logout($id_log, $data)
	{
		$this->db->where('id_log', $id_log);
		return $this->db->update('log_aktivitas', $data);
	}

	function get_id()
	{
		$query = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id_log DESC LIMIT 1");
		return $query->result();
	}
}
