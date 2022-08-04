<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Jadwal_model extends CI_Model
{

    private $_guzzle;

    function __construct()
    {
        $this->_guzzle = new Client([
				'base_uri' => "http://localhost/tbpem/backend/jadwal/jadwal",
            'auth' => ['admin', '1234']
        ]);
    }

    function getAll()
    {
        return json_decode($this->_guzzle->get('', array(
            'query' => array(
                'KEY' => 'croot'
            )
        ))->getBody()->getContents(), True)['data'];
    }

    function getById($npm)
    {
        return json_decode($this->_guzzle->get('', array(
            'query' => array(
                'KEY' => 'croot',
                'npm' => $npm
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

    function update($data, $npm)
    {
        $response = $this->_guzzle->put('', [
            'http_errors' => false,
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }

    function delete($npm)
    {
        $response = $this->_guzzle->delete('', [
            'form_params' => [
                'http_errors' => false,
                'KEY' => 'croot',
                'npm' => $npm

            ]

        ]);
        $result = json_decode($response->getBody()->getContents(), TRUE);
        return $result;
    }
}
