<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_imunisasi extends CI_Controller
{

	/**
	 * Developer : Didin Tri Anggoro
	 * Github	 : https://github.com/didintri196
	 * Email	 : didintri196@gmail.com
	 * Create At : 04-04-2021
	 */

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('auth') == false) {
			redirect(base_url('auth/login'));
		}
		$this->load->model('App');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$iduser = "1";
		$view['_title'] = "Data imunisasi &mdash; Go-Posyandu";
		$where['id_user'] = $iduser;
		$view['listdata'] = $this->App->get_all_orderby('imunisasi', "id", "DESC");
		
		$this->template->display_theme('pages/V_imunisasi', $view);
		unset($_SESSION['alert']);
	}

	public function ack_add()
	{
		$data['id'] = $this->App->GenerateId('imunisasi', 'K');
		$data['vaksin'] = $this->input->post('vaksin');
		$data['usia'] = $this->input->post('usia');
		$insert = $this->App->insert('imunisasi', $data);
		if ($insert) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		}
	}

	public function ack_view($id)
	{
		$where['id'] = $id;
		$data = $this->App->get_where('imunisasi', $where);
		echo json_encode($data->row());
	}

	public function ack_update()
	{
		$where['id'] = $this->input->post('id');
		$data['vaksin'] = $this->input->post('vaksin');
		$data['usia'] = $this->input->post('usia');
		$update = $this->App->update('imunisasi', $data, $where);
		if ($update) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		}
	}

	public function ack_delete()
	{
		$where['id'] = $this->input->post('id');
		$delete = $this->App->delete('imunisasi', $where);
		if ($delete) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data imunisasi.');
			redirect(base_url('/admin/imunisasi'));
		}
	}
}
