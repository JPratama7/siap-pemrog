<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load library
    }

    //method pertama yang akan di panggil
    public function index()
	{
        $data['title'] = "List Data Mahasiswa";

        $data['data_jadwal'] = $this->Nilai_model->getAll();

		print_r($data);
//        return array(
//            $this->load->view('templates/header', $data),
//            $this->load->view('templates/menu'),
//            $this->load->view('mahasiswa/index'),
//            $this->load->view('templates/footer')
//        );
    }

    public function detail($npm)
    {
        $data = array(
            'title' => "Detail Data Mahasiswa",
            'data_mahasiswa' => $this->Nilai_model->getById($npm)
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
        $this->form_validation->set_rules('npm', 'NPM', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required|numeric|min_length[9]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
//            return array(
//                $this->load->view('templates/header', $data),
//                $this->load->view('templates/menu'),
//                $this->load->view('mahasiswa/add'),
//                $this->load->view('templates/footer')
//            );
        } else {
            $data = array(
                "npm" => $this->input->post('npm'),
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "alamat" => $this->input->post('alamat'),
                "agama" => $this->input->post('agama'),
                "no_hp" => $this->input->post('no_hp'),
                "email" => $this->input->post('email'),
                "KEY" => "joseganteng" //sesuaikan dengan API Key kalian
            );
            $insert = $this->Nilai_model->save($data);
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
        $data["data_mahasiswa"] = $this->Nilai_model->getById($npm);
        //menerapkan rules validasi pada mahasiswa_model
        $this->form_validation->set_rules('npm', 'NPM', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required|numeric|min_length[9]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
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
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "alamat" => $this->input->post('alamat'),
                "agama" => $this->input->post('agama'),
                "no_hp" => $this->input->post('no_hp'),
                "email" => $this->input->post('email'),
                "KEY" => "joseganteng" //sesuaikan dengan API Key kalian
            );
            $update = $this->Nilai_model->update($data, $npm);
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
        $delete = $this->Nilai_model->delete($npm);
        if ($delete['response_code'] === 200) { //Jika response code yang dihasilkan 200
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mahasiswa');
        } else {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('mahasiswa');
        }
    }
}
