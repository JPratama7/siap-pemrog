<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Auth_model");
	}

	function index()
	{
		$this->load->view('auth/login');
	}

	function logout()
	{
		$_SESSION = array();
		redirect('auth/index');
	}

	function login()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
		$user = $this->Auth_model->get_login($username, $password);
		if (!empty($user)) {
			$user_data = array(
				'username' => $user['username'],
				'login' => 'logged',
			);
			$this->session->set_userdata($user_data);
			redirect('mahasiswa');
		} else {
			$this->session->set_flashdata('msg', 'Username dan Password tidak cocok');
			redirect('auth/index');
		}
	}


	function generatekey()
	{
		$this->load->view('auth/generate');
	}

	function generate()
	{
		$uname = $this->session->userdata('username');
		if (empty($uname)) {
			redirect('auth/index');
		}
		$ukey = $this->Auth_model->getkeyuser($uname);
		if (empty($ukey)) {
			$key = $this->Auth_model->generateRandomString();
			$update = array(
				'apikey' => $key
			);
			$this->Auth_model->update_data('user', $update, array(
				'username' => $uname
			));
			$insert = array(
				'user_id' => rand(1, 9999),
				'key' => $key
			);
			$this->Auth_model->insert_data('keys', $insert);
			$data = array(
				'key' => $key
			);
			$this->load->view('auth/generate', $data);
		} else {
			$data = array(
				'key' => $ukey
			);
			$this->session->set_userdata(array(
				'key' => $ukey
			));
			$this->load->view('auth/generate', $data);
		}
	}

	function daftar()
	{
		$this->load->view('auth/daftar');
	}

	function insertdaftar()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
		$user = $this->Auth_model->get_login($username, $password);
		if (empty($user)) {
			$data = array(
				'username' => $username,
				'password' => $password
			);
			$this->Auth_model->insert_data('user', $data);
			$this->session->set_userdata(array(
				'username' => $username
			));
			redirect('auth/generatekey');
		} else {
			$this->session->set_flashdata('msg', 'Username dan Password sudah terdaftar');
			redirect('auth/index');
		}
	}
}
