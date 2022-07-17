<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
	private const _primary_key = 'id_dosen';
	private const _tabel = 'dosen';

	function get_dosen($id_dosen)
	{
		if ($id_dosen) {
			$this->db->where(self::_primary_key, $id_dosen);
			$this->db->limit(1);
		}
		return $this->db->get(self::_tabel)->result_array();
	}

	public function insert_dosen($data)
	{
		$this->db->insert(self::_tabel, $data);
		return $this->db->affected_rows();
	}

	public function update_dosen($data, $id_dosen)
	{
		$this->db->update(self::_tabel, $data, [self::_primary_key => $id_dosen]);
		return $this->db->affected_rows();
	}

	public function delete_dosen($id_dosen)
	{
		$this->db->delete(self::_tabel, [self::_primary_key => $id_dosen]);
		return $this->db->affected_rows();
	}
}
