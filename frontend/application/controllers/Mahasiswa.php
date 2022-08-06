<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	private $apikey;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model'); //load model mahasiswa
		$this->load->library('form_validation'); //load library
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
	}

	//method pertama yang akan di panggil
	public function index()
	{
		$data['title'] = "List Data Mahasiswa";
		$data['data_mahasiswa'] = $this->Mahasiswa_model->getAll($this->apikey);
		return array(
			$this->load->view('templates/header', $data),
			$this->load->view('templates/menu'),
			$this->load->view('mahasiswa/index'),
			$this->load->view('templates/footer')
		);
	}

	public function detail($npm)
	{
		$data = array(
			'title' => "Detail Data Mahasiswa",
			'data_mahasiswa' => $this->Mahasiswa_model->getById($npm, $this->apikey)
		);
		return array(
			$this->load->view('templates/header', $data),
			$this->load->view('templates/menu'),
			$this->load->view('mahasiswa/detail'),
			$this->load->view('templates/footer')
		);
	}

	public function add()
	{
		$data["title"] = "Tambah Data Mahasiswa";
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jk', 'jk', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required|date');

		if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('mahasiswa/add'),
				$this->load->view('templates/footer')
			);
		} else {
			$data = array(
				"npm" => $this->input->post('npm'),
				"id_kelas" => $this->input->post('id_kelas'),
				"nama" => $this->input->post('nama'),
				"jk" => $this->input->post('jk'),
				"alamat" => $this->input->post('alamat'),
				"tgl_lahir" => $this->input->post('tgl_lahir'),


				"KEY" => $this->apikey //sesuaikan dengan API Key kalian
			);
			$insert = $this->Mahasiswa_model->save($data);
			if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('mahasiswa');
			} elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
				$this->session->set_flashdata('message', 'Data Duplikat');
				redirect('mahasiswa');
			} else { //Jika response code yang dihasilkan selain 201 dan 400
				$this->session->set_flashdata('message', 'Gagal');
				redirect('mahasiswa');
			}
		}
	}

	public function edit($npm)
	{
		$data["title"] = "Edit Data Mahasiswa";
		$data["data_mahasiswa"] = $this->Mahasiswa_model->getById($npm, $this->apikey);
		//menerapkan rules validasi pada mahasiswa_model
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jk', 'jk', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required|date');
		//kondisi jika rules tidak terpenuhi (false), maka akan memanggil view saja, sedangkan
		//kondisi sebaliknya jika semua rules terpenuhi, maka akan menjalankan method save pada mahasiswa_model
		if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('mahasiswa/edit'),
				$this->load->view('templates/footer')
			);
		} else {
			$data = array(
				"npm" => $this->input->post('npm'),
				"id_kelas" => $this->input->post('id_kelas'),
				"nama" => $this->input->post('nama'),
				"jk" => $this->input->post('jk'),
				"alamat" => $this->input->post('alamat'),
				"tgl_lahir" => $this->input->post('tgl_lahir'),


				"KEY" => $this->apikey
			);
			$update = $this->Mahasiswa_model->update($data, $npm);
			if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa');
			} elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
				$this->session->set_flashdata('message', 'Gagal');
				redirect('mahasiswa');
			} else {
				$this->session->set_flashdata('message', 'Gagal!!');
				redirect('mahasiswa');
			}
		}
	}

	public function delete($npm)
	{
		$delete = $this->Mahasiswa_model->delete($npm, $this->apikey);
		if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('mahasiswa');
		} else {
			$this->session->set_flashdata('message', 'Gagal');
			redirect('mahasiswa');
		}
	}
}
