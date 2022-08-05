<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Jurusan_model extends CI_Model
{

    private $_guzzle;

    function __construct()
    {
        $this->_guzzle = new Client([
            'base_uri' => "http://localhost/tbpem/backend/jurusan/",
            'auth' => ['admin', '1234']
        ]);
    }

    function getAll($apikey)
    {
        return json_decode($this->_guzzle->get('', array(
            'query' => array(
                'KEY' => $apikey
            )
        ))->getBody()->getContents(), True)['data'];
    }

    function getById($id_jurusan, $apikey)
    {
        return json_decode($this->_guzzle->get('', array(
            'query' => array(
                'KEY' => $apikey,
                'id_jurusan' => $id_jurusan
            )
        ))->getBody()->getContents(), True)['data'][0];
    }

    function save($data)
    {
        $response = $this->_guzzle->post('', [
            'http_errors' => false,
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }

    function update($data)
    {
        $response = $this->_guzzle->put('', [
            'http_errors' => false,
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }

    function delete($id_jurusan, $apikey)
    {
        $response = $this->_guzzle->delete('', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => $apikey,
                'id_jurusan' => $id_jurusan

            ]

        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }
}
