<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MK extends CI_Controller
{
	private $apikey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MK_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load library
		if ($this->session->userdata('login') !== 'logged' and empty($this->session->userdata('login'))) {
			redirect('auth', 'refresh');
		}
		$this->apikey = $this->session->userdata('key');
    }

    //method pertama yang akan di panggil
    public function index()
	{
        $data['title'] = "List Data Mata kuliah";

        $data['data_mk'] = $this->MK_model->getAll($this->apikey);

       return array(
           $this->load->view('templates/header', $data),
           $this->load->view('templates/menu'),
           $this->load->view('mk/index'),
           $this->load->view('templates/footer')
       );
    }

    public function detail($id_mk)
    {
        $data = array(
            'title' => "Detail Data Matkul",
            'data_mk' => $this->MK_model->getById($id_mk, $this->apikey)
        );
        return array(
            $this->load->view('templates/header', $data),
            $this->load->view('templates/menu'),
            $this->load->view('mk/detail'),
            $this->load->view('templates/footer')
        );
    }

    public function add()
    {
        $data["title"] = "Tambah Data Matakuliah";
        $this->form_validation->set_rules('id_mk', 'id_mk', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('sks', 'sks', 'trim|required');
        $this->form_validation->set_rules('kkm', 'kkm', 'trim|required');
       
        if ($this->form_validation->run() == false) {
           return array(
               $this->load->view('templates/header', $data),
               $this->load->view('templates/menu'),
               $this->load->view('mk/add'),
               $this->load->view('templates/footer')
           );
        } else {
            $data = array(
                "id_mk" => $this->input->post('id_mk'),
                "nama" => $this->input->post('nama'),
                "sks" => $this->input->post('sks'),
                "kkm" => $this->input->post('kkm'),
               
                "KEY" => $this->apikey
            );
            $insert = $this->MK_model->save($data);
            if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('mk');
            } elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('mk');
            } else { //Jika response code yang dihasilkan selain 201 dan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('mk');
            }
        }
    }
    public function edit($id_mk)
    {
        $data["title"] = "Edit Data Matkul";
        $data["data_mk"] = $this->MK_model->getById($id_mk);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('sks', ' sks', 'trim|required');
        $this->form_validation->set_rules('kkm', 'kkm', 'trim|required');

      
        //kondisi jika rules tidak terpenuhi (false), maka akan memanggil view saja, sedangkan
        //kondisi sebaliknya jika semua rules terpenuhi, maka akan menjalankan method save pada mahasiswa_model
        if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('mk/edit'),
				$this->load->view('templates/footer')
			);
        } else {
            $data = array(
                "id_mk" => $this->input->post('id_mk'),
                "nama" => $this->input->post('nama'),
                "sks" => $this->input->post('sks'),
                "kkm" => $this->input->post('kkm'),
          
                "KEY" => $this->apikey
            );
            $update = $this->MK_model->update($data, $id_mk);
            if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('mk');
            } elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('mk');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('mk');
            }
        }
    }

    public function delete($id_mk)
    {
        $delete = $this->MK_model->delete($id_mk,$this->apikey);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mk');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('mk');
        }
    }
}
