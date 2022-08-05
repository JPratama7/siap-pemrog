<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	private $apikey;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model'); //load model mahasiswa
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

        $data['data_jadwal'] = $this->Jadwal_model->getAll($this->apikey);

       return array(
           $this->load->view('templates/header', $data),
           $this->load->view('templates/menu'),
           $this->load->view('jadwal/index'),
           $this->load->view('templates/footer')
       );
    }

    public function detail($id_jadwal)
    {
        $data = array(
            'title' => "Detail Data Jadwal;",
            'data_jadwal' => $this->Jadwal_model->getById($id_jadwal,$this->apikey)
        );
        return array(
            $this->load->view('templates/header', $data),
            $this->load->view('templates/menu'),
            $this->load->view('jadwal/detail'),
            $this->load->view('templates/footer')
        );
    }

    public function add()
    {
        $data["title"] = "Tambah Data Jadwal";
        $this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim|required|numeric');
        $this->form_validation->set_rules('id_kelas', 'Nama', 'trim|required');
        $this->form_validation->set_rules('id_dosen', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required|date');
        $this->form_validation->set_rules('mulai', 'mulai', 'trim|required');
        $this->form_validation->set_rules('selesai', 'selesai', 'trim|required');

        if ($this->form_validation->run() == false) {
           return array(
               $this->load->view('templates/header', $data),
               $this->load->view('templates/menu'),
               $this->load->view('jadwal/add'),
               $this->load->view('templates/footer')
           );
        } else {
            $data = array(
                "id_jadwal" => $this->input->post('id_jadwal'),
                "id_kelas" => $this->input->post('id_kelas'),
                "id_dosen" => $this->input->post('id_dosen'),
                "tanggal" => $this->input->post('tanggal'),
                "mulai" => $this->input->post('mulai'),
                "selesai" => $this->input->post('selesai'),
                "KEY" => $this->apikey
            );
            $insert = $this->Jadwal_model->save($data);
            if ($insert['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('jadwal');
            } elseif ($insert['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('jadwal');
            } else { //Jika response code yang dihasilkan selain 201 dan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('jadwal');
            }
        }
    }
    public function edit($id_jadwal)
    {
        $data["title"] = "Edit Data Jadwal";
        $data["data_jadwal"] = $this->Jadwal_model->getById($id_jadwal);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim|required|numeric');
        $this->form_validation->set_rules('id_kelas', 'Nama', 'trim|required');
        $this->form_validation->set_rules('id_dosen', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required|date');
        $this->form_validation->set_rules('mulai', 'mulai', 'trim|required');
        $this->form_validation->set_rules('selesai', 'selesai', 'trim|required');
        //kondisi jika rules tidak terpenuhi (false), maka akan memanggil view saja, sedangkan
        //kondisi sebaliknya jika semua rules terpenuhi, maka akan menjalankan method save pada mahasiswa_model
        if ($this->form_validation->run() == false) {
			return array(
				$this->load->view('templates/header', $data),
				$this->load->view('templates/menu'),
				$this->load->view('jadwal/edit'),
				$this->load->view('templates/footer')
			);
        } else {
            $data = array(
                "id_jadwal" => $this->input->post('id_jadwal'),
                "id_kelas" => $this->input->post('id_kelas'),
                "id_dosen" => $this->input->post('id_dosen'),
                "tanggal" => $this->input->post('tanggal'),
                "mulai" => $this->input->post('mulai'),
                "selesai" => $this->input->post('selesai'),
                "KEY" => $this->apikey
            );
            $update = $this->Jadwal_model->update($data, $id_jadwal);
            if ($update['response_code'] === 201) { //Jika response code yang dihasilkan 201
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('jadwal');
            } elseif ($update['response_code'] === 400) { //Jika response code yang dihasilkan 400
                $this->session->set_flashdata('message', 'Gagal');
                redirect('jadwal');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('jadwal');
            }
        }
    }

    public function delete($id_jadwal)
    {
        $delete = $this->Jadwal_model->delete($id_jadwal, $this->apikey);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('jadwal');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('jadwal');
        }
    }
}
