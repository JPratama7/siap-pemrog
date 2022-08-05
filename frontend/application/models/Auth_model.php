<?php

class Auth_model extends CI_Model
{
	private $_guzzle;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_login($username, $password)
	{
		$data = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1")->result_array();
		return empty($data) ? array() : $data[0];
	}

	function generateRandomString($length = 8)
	{
		$characters = 'abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function getkeyuser($username){
		$data = $this->db->query("SELECT apikey FROM user WHERE username = '{$username}' LIMIT 1")->result_array();
		return empty($data) ? array() : $data[0]['apikey'];
	}

	function update_data($tabel, $data, $config){
		$this->db->update($tabel, $data, $config);
		return $this->db->affected_rows();
	}
	function insert_data($tabel, $data){
		$this->db->insert($tabel, $data);
		return $this->db->affected_rows();
	}
}
