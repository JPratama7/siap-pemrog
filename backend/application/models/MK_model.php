<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MK_model extends CI_Model
{
	private const _primary_key = 'id_mk';
	private const _tabel = 'mk';

	function get_mk($id_mk)
	{
		if ($id_mk) {
			$this->db->where(self::_primary_key, $id_mk);
			$this->db->limit(1);
		}
		return $this->db->get(self::_tabel)->result_array();
	}

	public function insert_mk($data)
	{
		$this->db->insert(self::_tabel, $data);
		return $this->db->affected_rows();
	}

	public function update_mk($data, $id_mk)
	{
		$this->db->update(self::_tabel, $data, [self::_primary_key => $id_mk]);
		return $this->db->affected_rows();
	}

	public function delete_mk($id_mk)
	{
		$this->db->delete(self::_tabel, [self::_primary_key => $id_mk]);
		return $this->db->affected_rows();
	}
}
