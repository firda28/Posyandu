<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_status_gizi extends CI_Controller
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
		$view['_title'] = "Data status_gizi &mdash; Go-Posyandu";
		$where['id_user'] = $iduser;
		$view['listdata'] = $this->App->get_all_orderby('status_gizi', "id", "DESC");
		$this->template->display_theme('pages/V_status_gizi', $view);
		unset($_SESSION['alert']);
	}

	public function ack_add()
	{
		$data['id'] = $this->App->GenerateId('status_gizi', 'S');
		$data['warna'] = $this->input->post('warna');
		$data['keterangan'] = $this->input->post('keterangan');
		$insert = $this->App->insert('status_gizi', $data);
		if ($insert) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		}
	}

	public function ack_view($id)
	{
		$where['id'] = $id;
		$data = $this->App->get_where('status_gizi', $where);
		echo json_encode($data->row());
	}

	public function ack_update()
	{
		$where['id'] = $this->input->post('id');
		$data['warna'] = $this->input->post('warna');
		$data['keterangan'] = $this->input->post('keterangan');
		$update = $this->App->update('status_gizi', $data, $where);
		if ($update) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		}
	}

	public function ack_delete()
	{
		$where['id'] = $this->input->post('id');
		$delete = $this->App->delete('status_gizi', $where);
		if ($delete) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data status gizi.');
			redirect(base_url('/admin/status_gizi'));
		}
	}
}
