<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
	private $apikey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load library
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
    }

    //method pertama yang akan di panggil
    public function index()
	{
        $data['title'] = "List Data Nilai";

        $data['data_nilai'] = $this->Nilai_model->getAll($this->apikey);

       return array(
           $this->load->view('templates/header', $data),
           $this->load->view('templates/menu'),
           $this->load->view('nilai/index'),
           $this->load->view('templates/footer')
       );
    }

    public function detail($id_nilai)
    {
        $data = array(
            'title' => "Detail Data Nilai",
            'data_nilai' => $this->Nilai_model->getById($id_nilai,$this->apikey)
        );
        return array(
            $this->load->view('templates/header', $data),
            $this->load->view('templates/menu'),
            $this->load->view('nilai/detail'),
            $this->load->view('templates/footer')
        );
    }

    public function add()
    {
        $data["title"] = "Tambah Data Nilai";
        $this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim|required|numeric');
        $this->form_validation->set_rules('id_matkul', 'id_matkul', 'trim|required');
        $this->form_validation->set_rules('npm', ' npm', 'trim|required');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
       
        if ($this->form_validation->run() == false) {
           return array(
               $this->load->view('templates/header', $data),
               $this->load->view('templates/menu'),
               $this->load->view('nilai/add'),
               $this->load->view('templates/footer')
           );
        } else {
            $data = array(
                "id_nilai" => $this->input->post('id_nilai'),
                "id_matkul" => $this->input->post('id_matkul'),
                "npm" => $this->input->post('npm'),
                "nilai" => $this->input->post('nilai'),
              
                "KEY" => $this->apikey
            );
            $insert = $this->Nilai_model->save($data);
            if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('nilai');
            } elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('nilai');
            } else { //Jika response code yang dihasilkan selain 201 dan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('nilai');
            }
        }
    }
    public function edit($id_nilai)
    {
        $data["title"] = "Edit Data Mahasiswa";
        $data["data_mahasiswa"] = $this->Nilai_model->getById($id_nilai);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim|required|numeric');
        $this->form_validation->set_rules('id_matkul', 'id_matkul', 'trim|required');
        $this->form_validation->set_rules('npm', ' npm', 'trim|required');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
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
                "id_nilai" => $this->input->post('id_nilai'),
                "id_matkul" => $this->input->post('id_matkul'),
                "npm" => $this->input->post('npm'),
                "nilai" => $this->input->post('nilai'),
              
                "KEY" => $this->apikey
            );
            $update = $this->Nilai_model->update($data, $id_nilai);
            if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('nilai');
            } elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('nilai');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('nilai');
            }
        }
    }

    public function delete($id_nilai)
    {
        $delete = $this->Nilai_model->delete($id_nilai, $this->apikey);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('nilai');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('nilai');
        }
    }
}
