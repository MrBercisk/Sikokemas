<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

	public function proses_login()
	{

		$username1 = $this->db->escape_str(trim(strip_tags($_POST['username'])));
		$password1 = $this->db->escape_str(trim(strip_tags(md5($_POST['password']))));

		$sql = "SELECT * FROM user	WHERE email = ? AND  password=?  ";
		return $this->db->query($sql, array($username1, $password1));
	}


	public function proses_login_dokter()
	{

		$username1 = $this->db->escape_str(trim(strip_tags($_POST['username'])));
		$password1 = $this->db->escape_str(trim(strip_tags(md5($_POST['password']))));

		$sql = "SELECT * FROM dokter	WHERE email = ? AND  password=?  ";
		return $this->db->query($sql, array($username1, $password1));
	}

	public function proses_daftar($data = null)
	{

		$this->db->insert('user', $data);
	}
}
