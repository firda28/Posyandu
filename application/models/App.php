<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function insert($table = '', $data = '')
	{
		return $this->db->insert($table, $data);
	}

	public function get_all($table)
	{
		$this->db->from($table);
		return $this->db->get();
	}

	public function get_all_orderby($table, $field, $sort = "ASC")
	{
		$this->db->from($table);
		$this->db->order_by($field, $sort);
		return $this->db->get();
	}

	public function get_where($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	public function get_where_orderby($table, $where, $field, $sort = "ASC")
	{
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($field, $sort);
		return $this->db->get();
	}

	public function update($table = null, $data = null, $where = null)
	{
		$this->db->set($data, null);
		$this->db->where($where);
		return $this->db->update($table);
	}

	public function delete($table = null, $where = null)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function total_rows($table)
	{
		return $this->db->count_all_results($table);
	}

	public function total_rows_where($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get()->num_rows();
	}

	//pastikan fieldnya id String
	public function GenerateId($table, $data = 'R')
	{
		$query = $this->db->select('id')
			->from($table)
			->get();
		$row = $query->last_row();
		if ($row) {
			$idPostfix = (int)substr($row->id, 1) + 1;
			$nextId = $data . STR_PAD((string)$idPostfix, 7, "0", STR_PAD_LEFT);
		} else {
			$nextId = $data . '0000001';
		} // For the first time
		return $nextId;
	}

	public function get_all_posyanduu()
	{
		$this->db->select('posyanduu.id, posyanduu.nama_balita, posyanduu.jenis_kelamin, posyanduu.nama_ibu, posyanduu.tgl_lahir, posyanduu.usia_balita, posyanduu.berat_badan, posyanduu.tinggi_badan, posyanduu.lingkar_kepala, posyanduu.imunisasi, posyanduu.kelainan, posyanduu.status_gizi, imunisasi.vaksin as imunisasi, kader.posyandu as kader, kelainan.nama_kelainan as kelainan, status_gizi.warna as status_gizi');
		$this->db->from('posyanduu');
		$this->db->join('imunisasi', 'imunisasi.id=posyanduu.imunisasi', 'left');
		$this->db->join('kader', 'kader.id=posyanduu.kader', 'left');
		$this->db->join('kelainan', 'kelainan.id=posyanduu.kelainan', 'left');
		$this->db->join('status_gizi', 'status_gizi.id=posyanduu.status_gizi', 'left');
		//$this->db->join('status', 'status.id=barbuk.status', 'left');
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get();
		//echo $this->db->last_query();
		return $data;
	}

	public function get_where_posyanduu($where)
	{
		$this->db->select('posyanduu.id, posyanduu.nama_balita, posyanduu.jenis_kelamin, posyanduu.nama_ibu, posyanduu.tgl_lahir, posyanduu.usia_balita, posyanduu.berat_badan, posyanduu.tinggi_badan, posyanduu.lingkar_kepala, posyanduu.imunisasi, posyanduu.kelainan, posyanduu.status_gizi, imunisasi.vaksin as imunisasi, kader.posyandu as kader, kelainan.nama_kelainan as kelainan, status_gizi.warna as status_gizi');
		$this->db->from('posyanduu');
		$this->db->join('imunisasi', 'imunisasi.id=posyanduu.imunisasi', 'left');
		$this->db->join('kader', 'kader.id=posyanduu.kader', 'left');
		$this->db->join('kelainan', 'kelainan.id=posyanduu.kelainan', 'left');
		$this->db->join('status_gizi', 'status_gizi.id=posyanduu.status_gizi', 'left');
		$this->db->where($where);
		return $this->db->get();
	}

	public function get_like($keyword)
	{
		$this->db->select('posyanduu.id, posyanduu.nama_balita, posyanduu.jenis_kelamin, posyanduu.nama_ibu, posyanduu.tgl_lahir, posyanduu.usia_balita, posyanduu.berat_badan, posyanduu.tinggi_badan, posyanduu.lingkar_kepala, posyanduu.imunisasi, posyanduu.kelainan, posyanduu.status_gizi, imunisasi.vaksin as imunisasi, kader.posyandu as kader, kelainan.nama_kelainan as kelainan, status_gizi.warna as status_gizi');
		$this->db->from('posyanduu');
		$this->db->join('imunisasi', 'imunisasi.id=posyanduu.imunisasi', 'left');
		$this->db->join('kader', 'kader.id=posyanduu.kader', 'left');
		$this->db->join('kelainan', 'kelainan.id=posyanduu.kelainan', 'left');
		$this->db->join('status_gizi', 'status_gizi.id=posyanduu.status_gizi', 'left');
		$this->db->like('posyanduu.nama_balita', $keyword);
		$this->db->or_like('posyanduu.jenis_kelamin', $keyword);
		$this->db->or_like('posyanduu.nama_ibu', $keyword);
		$this->db->or_like('posyanduu.tgl_lahir', $keyword);
		$this->db->or_like('posyanduu.usia_balita', $keyword);
		$this->db->or_like('posyanduu.berat_badan', $keyword);
		$this->db->or_like('posyanduu.tinggi_badan', $keyword);
		$this->db->or_like('posyanduu.lingkar_kepala', $keyword);
		$this->db->or_like('posyanduu.imunisasi', $keyword);
		$this->db->or_like('posyanduu.kelainan', $keyword);
		$this->db->or_like('posyanduu.status_gizi', $keyword);
		return $this->db->get();
	}
}


