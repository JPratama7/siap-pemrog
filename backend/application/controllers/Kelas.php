<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Kelas extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->methods['kelas_get']['limit'] = 10;
    }
    function index_get()
    {

        $data = $this->Kelas_model->get_kelas($this->get('id_kelas'));
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

    function index_post()
    {
		$id_kelas = $this->post('id_kelas');
		$data = array(
            'id_kelas' => $id_kelas,
            'jurusan' => $this->post("jurusan"),
            'id_wali' => $this->post("id_wali"),
            'tahunid' => $this->post("tahunid"),
        );
        $duplikasi = $this->Kelas_model->get_kelas($id_kelas);
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
        } elseif ($this->Kelas_model->insert_kelas($data) > 0) {
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

    function index_delete()
    {
        $id_kelas = $this->delete('id_kelas');
        //Jika field npm tidak diisi
        if ($id_kelas == NULL) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Kelas_model->delete_kelas($id_kelas) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data kelas Dengan ID ' . $id_kelas . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Mahasiswa Dengan NPM ' . $id_kelas . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
		$id_kelas = $this->put('id_kelas');
		$data = array(
			'id_kelas' => $id_kelas,
			'jurusan' => $this->put("jurusan"),
			'id_wali' => $this->put("id_wali"),
			'tahunid' => $this->put("tahunid")
		);
        if ($id_kelas == NULL) {
            return $this->response(
                [
                    'status' => $id_kelas,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Kelas_model->update_kelas($data, $id_kelas) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data kelas Dengan ID ' . $id_kelas . ' Berhasil Diubah',
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
