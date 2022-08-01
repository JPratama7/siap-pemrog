<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
	private const _primary_key = 'id_jadwal';
	private const _tabel = 'jadwal';

    function get_jadwal($id_jadwal)
    {
        if ($id_jadwal) {
            $this->db->where(self::_primary_key, $id_jadwal);
            $this->db->limit(1);
        }
		$this->db->join('kelas as k', 'k.id_kelas = jadwal.id_kelas');
		$this->db->join('dosen as d', 'd.id_dosen = jadwal.id_dosen');
        return $this->db->get(self::_tabel)->result_array();
    }

    public function insert_jadwal($data)
    {
        $this->db->insert($this->_tabel, $data);
        return $this->db->affected_rows();
    }
    public function update_jadwal($data, $id_jadwal)
    {
        $this->db->update(self::_tabel, $data, [self::_primary_key => $id_jadwal]);
        return $this->db->affected_rows();
    }
    public function delete_jadwal($id_jadwal)
    {
        $this->db->delete(self::_tabel, [self::_primary_key => $id_jadwal]);
        return $this->db->affected_rows();
    }
}
