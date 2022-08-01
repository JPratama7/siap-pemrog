<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
	private const _primary_key = 'id_nilai';
	private const _tabel = 'nilai';

	function get_nilai($id_nilai)
	{
		if ($id_nilai) {
			$this->db->where(self::_primary_key, $id_nilai);
			$this->db->limit(1);
		}
		$this->db->join('mk', 'mk.id_mk = nilai.id_matkul');
		$this->db->join('mahasiswa as m', 'm.npm = nilai.npm');
		return $this->db->get(self::_tabel)->result_array();
	}

	public function insert_nilai($data)
	{
		$this->db->insert(self::_tabel, $data);
		return $this->db->affected_rows();
	}

	public function update_nilai($data, $id_nilai)
	{
		$this->db->update(self::_tabel, $data, [self::_primary_key => $id_nilai]);
		return $this->db->affected_rows();
	}

	public function delete_nilai($id_nilai)
	{
		$this->db->delete(self::_tabel, [self::_primary_key => $id_nilai]);
		return $this->db->affected_rows();
	}
}
