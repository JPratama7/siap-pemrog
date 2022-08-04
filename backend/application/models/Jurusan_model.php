<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
	private const _primary_key = 'id_jurusan';
	private const _tabel = 'jurusan';

	function get_jurusan($id_jurusan)
	{
		if ($id_jurusan) {
			$this->db->where(self::_primary_key, $id_jurusan);
			$this->db->limit(1);
		}
		return $this->db->get(self::_tabel)->result_array();
	}

	public function insert_jurusan($data)
	{
		$this->db->insert(self::_tabel, $data);
		return $this->db->affected_rows();
	}

	public function update_jurusan($data, $id_jurusan)
	{
		$this->db->update(self::_tabel, $data, [self::_primary_key => $id_jurusan]);
		return $this->db->affected_rows();
	}

	public function delete_jurusan($id_jurusan)
	{
		$this->db->delete(self::_tabel, [self::_primary_key => $id_jurusan]);
		return $this->db->affected_rows();
	}
}
