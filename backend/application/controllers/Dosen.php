<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Dosen extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->methods['dosen_get']['limit'] = 10;
    }
    function index_get()
    {

        $data = $this->Dosen_model->get_dosen($this->get('id_dosen'));
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
        $data = array(
            'id_dosen' => rand(1000,9999),
            'nama' => $this->post('nama'),
            'tgl_lahir' => $this->post('tgl_lahir'),
			'alamat' => $this->post('alamat'),
			'jk' => $this->post('jk'),
        );
        $duplikasi = $this->Dosen_model->get_dosen($data['id_dosen']);
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
        } elseif ($this->Dosen_model->insert_dosen($data) > 0) {
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
        $id_dosen = $this->delete('id_dosen');
        //Jika field npm tidak diisi
        if ($id_dosen == NULL) {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }  elseif ($this->Dosen_model->delete_dosen($id_dosen) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Dosen Dengan ID ' . $id_dosen . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        } else {
            return $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Dosen Dengan ID ' . $id_dosen . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
		$id_dosen = $this->put('id_dosen');
		$data = array(
			'nama' => $this->put('nama'),
			'tgl_lahir' => $this->put('tgl_lahir'),
			'alamat' => $this->put('alamat'),
			'jk' => $this->put('jk')
		);
        if ($id_dosen == NULL) {
            return $this->response(
                [
                    'status' => $id_dosen,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif (array_search("", $data)){
			return $this->response(
				[
					'status' => $id_dosen,
					'response_code' => RestController::HTTP_BAD_REQUEST,
					'message' => 'Data Tidak Boleh Kosong',
				],
				RestController::HTTP_BAD_REQUEST
			);
		} elseif ($this->Dosen_model->update_dosen($data, $id_dosen) > 0) {
            return $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Dosen Dengan ID ' . $id_dosen . ' Berhasil Diubah',
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
