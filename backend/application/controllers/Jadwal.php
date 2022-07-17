<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Jadwal extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->methods['jadwal_get']['limit'] = 10;
    }
    function jadwal_get()
    {

        $data = $this->Jadwal_model->get_jadwal($this->get('id_jadwal'));
        if (empty($data)) {
            return $this->response(
                array(
                    'data' => null,
                    'status' => 'Data Not Found',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ),
                RestController::HTTP_NOT_FOUND
            );
        }
        return $this->response(
            array(
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ),
            RestController::HTTP_OK
        );
    }

    function jadwal_post()
    {
		$id_jadwal = $this->post('id_jadwal');
		$data = array(
            'id_jadwal' => $id_jadwal,
            'id_kelas' => $this->post('id_kelas'),
            'id_dosen' => $this->post('id_dosen'),
			'tanggal' => $this->post('tanggal'),
			'mulai' => $this->post('mulai'),
			'selesai' => $this->post('selesai'),
        );
        $duplikasi = $this->Mahasiswa_model->get_mahasiswa_data($id_jadwal);
        if (
			array_search("", $data)
        ) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($duplikasi) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_NOT_ACCEPTABLE,
                    'message' => 'Data Duplikasi Terjadi',
                ],
                RestController::HTTP_NOT_ACCEPTABLE
            );
        } elseif ($this->jadwal_model->insert_jadwal($data) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function jadwal_delete()
    {
        $id_jadwal = $this->delete('id_jadwal');
        //Jika field npm tidak diisi
        if ($id_jadwal == NULL) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->jadwal_model->update_jadwal($id_jadwal) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data jadwal Dengan ID ' . $id_jadwal . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Mahasiswa Dengan NPM ' . $id_jadwal . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function jadwal_put()
    {
		$id_jadwal = $this->put('id_jadwal');
		$data = array(
			'id_jadwal' => $id_jadwal,
			'id_kelas' => $this->put('id_kelas'),
			'id_dosen' => $this->put('id_dosen'),
			'tanggal' => $this->put('tanggal'),
			'mulai' => $this->put('mulai'),
			'selesai' => $this->put('selesai')
		);
        if ($id_jadwal == NULL) {
            return $this->response(
                [
                    'status' => $id_jadwal,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Mahasiswa_model->updateMahasiswa($data, $id_jadwal) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data jadwal Dengan ID ' . $id_jadwal . ' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
