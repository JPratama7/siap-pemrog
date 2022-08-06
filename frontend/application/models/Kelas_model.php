<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Kelas_model extends CI_Model
{

    private $_guzzle;

    function __construct()
    {
        $this->_guzzle = new Client([
            'base_uri' => "http://localhost/tbpem/backend/kelas/",
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

    function getById($id_kelas, $apikey)
    {
        return json_decode($this->_guzzle->get('', array(
            'query' => array(
                'KEY' => $apikey,
                'id_kelas' => $id_kelas
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

    function update($data, $id_kelas)
    {
        $response = $this->_guzzle->put('', [
            'http_errors' => false,
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }

    function delete($id_kelas, $apikey)
    {
        $response = $this->_guzzle->delete('', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => $apikey,
                'id_kelas' => $id_kelas

            ]

        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }
}
