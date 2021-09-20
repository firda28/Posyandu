<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_kader extends CI_Controller
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
		$view['_title'] = "Data kader &mdash; Go-Posyandu";
		$where['id_user'] = $iduser;
		$view['listdata'] = $this->App->get_all_orderby('kader', "id", "DESC");
		$this->template->display_theme('pages/V_kader', $view);
		unset($_SESSION['alert']);
	}

	public function ack_add()
	{
		$data['id'] = $this->App->GenerateId('kader', 'K');
		$data['nama'] = $this->input->post('nama');
		$data['posyandu'] = $this->input->post('posyandu');
		$insert = $this->App->insert('kader', $data);
		if ($insert) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data kader.');
			redirect(base_url('/admin/kader'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data kader.');
			redirect(base_url('/admin/kader'));
		}
	}

	public function ack_view($id)
	{
		$where['id'] = $id;
		$data = $this->App->get_where('kader', $where);
		echo json_encode($data->row());
	}

	public function ack_update()
	{
		$where['id'] = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['posyandu'] = $this->input->post('posyandu');
		$update = $this->App->update('kader', $data, $where);
		if ($update) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data kader.');
			redirect(base_url('/admin/kader'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data kader.');
			redirect(base_url('/admin/kader'));
		}
	}

	public function ack_delete()
	{
		$where['id'] = $this->input->post('id');
		$delete = $this->App->delete('kader', $where);
		if ($delete) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data kader.');
			redirect(base_url('/admin/kader'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data kader.');
			redirect(base_url('/admin/kader'));
		}
	}
}
