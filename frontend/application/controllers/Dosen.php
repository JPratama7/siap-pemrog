<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	private $apikey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load library
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
    }

    //method pertama yang akan di panggil
    public function index()
    {
        $data['title'] = "List Data Dosen";
        $data['data_dosen'] = $this->Dosen_model->getAll($this->apikey);
		return array(
           $this->load->view('templates/header', $data),
           $this->load->view('templates/menu'),
           $this->load->view('dosen/index'),
           $this->load->view('templates/footer')
       );
    }


    public function detail($id_dosen)
    {
        $data = array(
            'title' => "Detail Data Dosen",
            'data_dosen' => $this->Dosen_model->getById($id_dosen, $this->apikey)
        );
        return array(
            $this->load->view('templates/header', $data),
            $this->load->view('templates/menu'),
            $this->load->view('dosen/detail'),
            $this->load->view('templates/footer')
        );
    }

    public function add()
    {
        $data["title"] = "Tambah Data Mahasiswa";
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal', 'trim|required');
      
        if ($this->form_validation->run() == false) {
           return array(
               $this->load->view('templates/header', $data),
               $this->load->view('templates/menu'),
               $this->load->view('dosen/add'),
               $this->load->view('templates/footer')
           );
        } else {
            $data = array(
                "nama" => $this->input->post('nama'),
                "jk" => $this->input->post('jk'),
                "alamat" => $this->input->post('alamat'),
                "tgl_lahir" => $this->input->post('tgl_lahir'),
                "KEY" => $this->apikey
            );
            $insert = $this->Dosen_model->save($data);
            if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('dosen');
            } elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('dosen');
            } else { //Jika response code yang dihasilkan selain 201 dan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('dosen');
            }
        }
    }
    public function edit($id_dosen)
    {
        $data["title"] = "Edit Data dosen";
        $data["data_dosen"] = $this->Dosen_model->getById($id_dosen,$this->apikey);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal', 'trim|required');
        //kondisi jika rules tidak terpenuhi (false), maka akan memanggil view saja, sedangkan
        //kondisi sebaliknya jika semua rules terpenuhi, maka akan menjalankan method save pada mahasiswa_model
        if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('dosen/edit'),
				$this->load->view('templates/footer')
			);
        } else {
            $data = array(
                "id_dosen" => $this->input->post('id_dosen'),
                "nama" => $this->input->post('nama'),
                "jk" => $this->input->post('jk'),
                "alamat" => $this->input->post('alamat'),
                "tgl_lahir" => $this->input->post('tgl_lahir'),
                "KEY" => $this->apikey
            );
            $update = $this->Dosen_model->update($data, $id_dosen);
            if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('dosen');
            } elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('dosen');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('dosen');
            }
        }
    }

    function delete($id_dosen)
    {
        $delete = $this->Dosen_model->delete($id_dosen, $this->apikey);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('dosen');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('dosen');
        }
    }
}
