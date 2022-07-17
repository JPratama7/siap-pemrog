<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	private const _primary_key = 'npm';
	private const _tabel = 'mahasiswa';

    function get_mahasiswa_data($npm)
    {
        if ($npm) {
            $this->db->where(self::_primary_key, $npm);
            $this->db->limit(1);
        }
        return $this->db->get(self::_tabel)->result_array();
    }

    public function insertMahasiswa($data)
    {
        $this->db->insert(self::_tabel, $data);
        return $this->db->affected_rows();
    }
    public function updateMahasiswa($data, $npm)
    {
        $this->db->update(self::_tabel, $data, [self::_primary_key => $npm]);
        return $this->db->affected_rows();
    }
    public function deleteMahasiswa($npm)
    {
        $this->db->delete(self::_tabel, [self::_primary_key => $npm]);
        return $this->db->affected_rows();
    }
}
