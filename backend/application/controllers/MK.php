<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class MK extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MK_model');
        $this->methods['nilai_get']['limit'] = 10;
    }
    function index_get()
    {
        $data = $this->MK_model->get_mk($this->get('id_mk'));
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
		$id_mk = $this->post('id_mk');
		$data = array(
            'id_mk' => $id_mk,
            'nama' => $this->post('nama'),
            'sks' => $this->post('sks'),
			'kkm' => $this->post('kkm')
        );
        $duplikasi = $this->MK_model->get_mk($id_mk);
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
        } elseif ($this->MK_model->insert_mk($data) > 0) {
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
        $id_mk = $this->delete('id_mk');
        //Jika field npm tidak diisi
        if ($id_mk == NULL) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->MK_model->delete_mk($id_mk) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data nilai Dengan ID ' . $id_mk . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Nilai Dengan ID ' . $id_mk . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
		$id_mk = $this->put('id_mk');
		$data = array(
            'id_mk' => $id_mk,
            'nama' => $this->put('nama'),
            'sks' => $this->put('sks'),
			'kkm' => $this->put('kkm')
		);
        if ($id_mk == NULL) {
            return $this->response(
                [
                    'status' => $id_mk,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->MK_model->update_mk($data, $id_mk) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data nilai Dengan ID ' . $id_mk . ' Berhasil Diubah',
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
