<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
	private const _primary_key = 'id_kelas';
	private const _tabel = 'kelas';

    function get_kelas($id_kelas)
    {
        if ($id_kelas) {
            $this->db->where(self::_primary_key, $id_kelas);
            $this->db->limit(1);
        }
        return $this->db->get(self::_tabel)->result_array();
    }

    function insert_kelas($data)
    {
        $this->db->insert(self::_tabel, $data);
        return $this->db->affected_rows();
    }
    function update_kelas($data, $id_kelas)
    {
        $this->db->update(self::_tabel, $data, [self::_primary_key => $id_kelas]);
        return $this->db->affected_rows();
    }
    function delete_kelas($id_kelas)
    {
        $this->db->delete(self::_tabel, [self::_primary_key => $id_kelas]);
        return $this->db->affected_rows();
    }
}
