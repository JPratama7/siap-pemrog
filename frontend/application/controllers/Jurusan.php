<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	private $apikey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load library
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
    }

    //method pertama yang akan di panggil
    public function index()
	{
        $data['title'] = "List Data Jurusan";

        $data['data_jurusan'] = $this->Jurusan_model->getAll($this->apikey);

       return array(
           $this->load->view('templates/header', $data),
           $this->load->view('templates/menu'),
           $this->load->view('jurusan/index'),
           $this->load->view('templates/footer')
       );
    }

    public function detail($id_jurusan)
    {
        $data = array(
            'title' => "Detail Data Mahasiswa",
            'data_jurusan' => $this->Jurusan_model->getById($id_jurusan, $this->apikey)
        );
        return array(
            $this->load->view('templates/header', $data),
            $this->load->view('templates/menu'),
            $this->load->view('jurusan/detail'),
            $this->load->view('templates/footer')
        );
    }

    public function add()
    {
        $data["title"] = "Tambah Data Jurusan";
        $this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      
        if ($this->form_validation->run() == false) {
           return array(
               $this->load->view('templates/header', $data),
               $this->load->view('templates/menu'),
               $this->load->view('jurusan/add'),
               $this->load->view('templates/footer')
           );
        } else {
            $data = array(
                "id_jurusan" => $this->input->post('id_jurusan'),
                "nama" => $this->input->post('nama'),
                "KEY" => $this->apikey
            );
            $insert = $this->Jurusan_model->save($data);
            if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('jurusan');
            } elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('jurusan');
            } else { //Jika response code yang dihasilkan selain 201 dan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('jurusan');
            }
        }
    }
    public function edit($id_jurusan)
    {
        $data["title"] = "Edit Data Jurusan";
        $data["data_jurusan"] = $this->Jurusan_model->getById($id_jurusan);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        //kondisi jika rules tidak terpenuhi (false), maka akan memanggil view saja, sedangkan
        //kondisi sebaliknya jika semua rules terpenuhi, maka akan menjalankan method save pada mahasiswa_model
        if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('jurusan/edit'),
				$this->load->view('templates/footer')
			);
        } else {
            $data = array(
                "id_jurusan" => $this->input->post('id_jurusan'),
                "nama" => $this->input->post('nama'),
                "KEY" => $this->apikey
            );
            $update = $this->Jurusan_model->update($data, $id_jurusan);
            if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('jurusan');
            } elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('jurusan');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('jurusan');
            }
        }
    }

    public function delete($id_jurusan)
    {
        $delete = $this->Jurusan_model->delete($id_jurusan, $this->apikey);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('jurusan');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('jurusan');
        }
    }
}
