<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_kelainan extends CI_Controller
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
		$view['_title'] = "Data kelainan &mdash; Go-Posyandu";
		$where['id_user'] = $iduser;
		$view['listdata'] = $this->App->get_all_orderby('kelainan', "id", "DESC");
		$this->template->display_theme('pages/V_kelainan', $view);
		unset($_SESSION['alert']);
	}

	public function ack_add()
	{
		$data['id'] = $this->App->GenerateId('kelainan', 'K');
		$data['nama_kelainan'] = $this->input->post('nama_kelainan');
		$data['ciri'] = $this->input->post('ciri');
		$insert = $this->App->insert('kelainan', $data);
		if ($insert) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data kelainan.');
			redirect(base_url('/admin/kelainan'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data kelainan.');
			redirect(base_url('/admin/kelainan'));
		}
	}

	public function ack_view($id)
	{
		$where['id'] = $id;
		$data = $this->App->get_where('kelainan', $where);
		echo json_encode($data->row());
	}

	public function ack_update()
	{
		$where['id'] = $this->input->post('id');
		$data['nama_kelainan'] = $this->input->post('nama_kelainan');
		$data['ciri'] = $this->input->post('ciri');
		$update = $this->App->update('kelainan', $data, $where);
		if ($update) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data kelainan.');
			redirect(base_url('/admin/kelainan'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data kelainan.');
			redirect(base_url('/admin/kelainan'));
		}
	}

	public function ack_delete()
	{
		$where['id'] = $this->input->post('id');
		$delete = $this->App->delete('kelainan', $where);
		if ($delete) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data kelainan.');
			redirect(base_url('/admin/kelainan'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data kelainan.');
			redirect(base_url('/admin/kelainan'));
		}
	}
}
