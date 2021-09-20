<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_posyandu extends CI_Controller
{

	function __construct()

	{
		parent::__construct();
		if ($this->session->userdata('auth') == false) {
			redirect(base_url('auth/login'));
		}
		$this->load->model('App');
	}

	public function index()
	{
		
		$view['_title'] = "Data Balita &mdash; Go-Posyandu";
		$view['vaksin'] = $this->App->get_all('imunisasi');
		$view['posyandu'] = $this->App->get_all('kader');
		$view['kelainan'] = $this->App->get_all('kelainan');
		$view['warna'] = $this->App->get_all('status_gizi');
		$view['listdata'] = $this->App->get_all_posyanduu();
		//$view['listdata'] = $this->App->get_all('posyanduu');

		$this->template->display_theme('pages/V_posyandu', $view);
		unset($_SESSION['alert']);
	}

	public function ack_add()
	{
		// $id_kategori = $this->input->post('id');
		/*$data_kategori = $this->M_kategori->get_one_kategori_id($id_kategori)->row();*/

		$data['id'] = $this->App->GenerateId('posyanduu', 'p');
		$data['nama_balita'] = $this->input->post('nama_balita');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['nama_ibu'] = $this->input->post('nama_ibu');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['usia_balita'] = $this->input->post('usia_balita');
		$data['berat_badan'] = $this->input->post('berat_badan');
		$data['tinggi_badan'] = $this->input->post('tinggi_badan');
		$data['lingkar_kepala'] = $this->input->post('lingkar_kepala');
		$data['imunisasi'] = $this->input->post('imunisasi');
		$data['kelainan'] = $this->input->post('kelainan');


		// $file = $_FILES['bukti']['name'];

		// $upload = $this->uploader->image();

		// if ($upload['status'] == 'success') {
		// 	$nama_file = $upload['data']['file_name'];
		// 	$data['barbuk'] = $nama_file;
		// } else {
		// 	$data['barbuk'] = '';
		// }

		// var_dump($data);
		$insert = $this->App->insert('posyanduu', $data);
		if ($insert) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil membuat data balita.');
			redirect(base_url('admin/posyanduu'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal membuat data balita.');
			redirect(base_url('admin/posyanduu'));
		}
	}

	public function ack_view($id)
	{
		$where['id'] = $id;
		$data = $this->App->get_where('posyanduu', $where);
		echo json_encode($data->row());
	}

	public function ack_update()
	{
		$where['id'] = $this->input->post('id');	
		$data['nama_balita'] = $this->input->post('nama_balita');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['nama_ibu'] = $this->input->post('nama_ibu');
		$data['tgl_lahir'] = $this->input->post('tgl_lahir');
		$data['usia_balita'] = $this->input->post('usia_balita');
		$data['berat_badan'] = $this->input->post('berat_badan');
		$data['tinggi_badan'] = $this->input->post('tinggi_badan');
		$data['lingkar_kepala'] = $this->input->post('lingkar_kepala');
		$data['imunisasi'] = $this->input->post('imunisasi');
		$data['kelainan'] = $this->input->post('kelainan');
		//$file = $_FILES['bukti']['name'];
	

		// var_dump($data);
		// die();

		$update = $this->App->update('posyanduu', $data, $where);
		if ($update) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil mengubah data posyanduu');
			redirect(base_url('admin/posyanduu'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal mengubah data posyanduu.');
			redirect(base_url('admin/posyanduu'));
		}
	}
	

	public function ack_delete()
	{
		$where['id'] = $this->input->post('id');

		// $filelama = $this->App->get_where('posyanduu', $where)->row();
		// if ($filelama->posyandu != '') {
		// 	$this->uploader->delete_foto($filelama->posyanduu);
	

		$delete = $this->App->delete('posyanduu', $where);

		if ($delete) {
			$this->session->set_flashdata('alert', 'success|<b>Success</b> Berhasil hapus data posyandu.');
			redirect(base_url('admin/posyanduu'));
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Gagal</b> Gagal hapus data posyandu.');
			redirect(base_url('admin/posyanduu'));
		}
	}
	
	public function search()
	{
		$where['nik_balita'] = $this->input->post('cari');

		$data = $this->App->get_where('posyanduu', $where);
		echo json_encode($data->row());
	}
}

