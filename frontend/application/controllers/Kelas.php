<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	private $apikey;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_model'); //load model mahasiswa
		$this->load->library('form_validation');
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
	}

	//method pertama yang akan di panggil
	function index()
	{
		$data['title'] = "List Data Kelas";

		$data['data_kelas'] = $this->Kelas_model->getAll($this->apikey);

		return array(
			$this->load->view('templates/header', $data),
			$this->load->view('templates/menu'),
			$this->load->view('kelas/index'),
			$this->load->view('templates/footer')
		);
	}

	function detail($id_kelas)
	{
		$data = array(
			'title' => "Detail Data Kelas",
			'data_kelas' => $this->Kelas_model->getById($id_kelas, $this->apikey)
		);
		return array(
			$this->load->view('templates/header', $data),
			$this->load->view('templates/menu'),
			$this->load->view('kelas/detail'),
			$this->load->view('templates/footer')
		);
	}

	function add()
	{
		$data["title"] = "Tambah Data Kelas";
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required|numeric');
		$this->form_validation->set_rules('id_wali', 'id_wali', 'trim|required|numeric');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required|numeric');
		$this->form_validation->set_rules('tahunid', 'tahunid', 'trim|required|numeric');

		var_dump($this->form_validation->run());
		if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('kelas/add'),
				$this->load->view('templates/footer')
			);
		} else {
			$data = array(
				"id_kelas" => $this->input->post('id_kelas'),
				"id_wali" => $this->input->post('id_wali'),
				"jurusan" => $this->input->post('jurusan'),
				"tahunid" => $this->input->post('tahunid'),
				"KEY" => $this->apikey
			);
			$insert = $this->Kelas_model->save($data);
			if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
				return array(
					$this->session->set_flashdata('flash', 'Ditambahkan'),
					redirect('kelas')
				);
			} elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
				return array(
					$this->session->set_flashdata('message', 'Data Duplikat'),
					redirect('kelas')
				);

			} else { //Jika response code yang dihasilkan selain 201 dan 400
				return array(
					$this->session->set_flashdata('message', 'Gagal'),
					redirect('kelas')
				);
			}
		}
	}

	function edit($id_kelas)
	{
		$data["title"] = "Edit Data Kelas";
		$data["data_kelas"] = $this->Kelas_model->getById($id_kelas, $this->apikey);
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim|required|numeric');
		$this->form_validation->set_rules('id_wali', 'id_wali', 'trim|required|numeric');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required|numeric');
		$this->form_validation->set_rules('tahunid', 'tahunid', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('kelas/edit'),
				$this->load->view('templates/footer')
			);
		} else {
			$data = array(
				"id_kelas" => $this->input->post('id_kelas'),
				"id_wali" => $this->input->post('id_wali'),
				"jurusan" => $this->input->post('jurusan'),
				"tahunid" => $this->input->post('tahunid'),

				"KEY" => $this->apikey
			);
			$update = $this->Kelas_model->update($data, $id_kelas);
			if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('kelas');
			} elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
				$this->session->set_flashdata('message', 'Gagal');
				redirect('kelas');
			} else {
				$this->session->set_flashdata('message', 'Gagal!!');
				redirect('kelas');
			}
		}
	}

	function delete($id_kelas)
	{
		$delete = $this->Kelas_model->delete($id_kelas, $this->apikey);
		if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('kelas');
		} else {
			$this->session->set_flashdata('message', 'Gagal');
			redirect('kelas');
		}
	}
}
