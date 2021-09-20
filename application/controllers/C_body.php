<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_body extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!empty($_GET['data'])) {
			$this->session->set_flashdata('kader', $_GET['data']);
		} else {
			$this->session->set_flashdata('kader', '');
		}
		//cek login
		if ($this->session->userdata('auth') == false) {
			redirect(base_url('auth/login'));
		}
	}

	public function index()
	{
		// $this->session->userdata('reg_barbuk');
		$view['_title'] = "Dashboard &mdash; Go-Posyandu";
		$view['kategori'] = $this->app->get_all('kategori');
		$view['status_bb'] = $this->app->get_all('status');
		$view['jaksa'] = $this->getJaksa();
		$this->template->display_theme('pages/V_dashboard', $view);
		unset($_SESSION['alert']);
	}

	public function redirect()
	{
		redirect(base_url('admin/dashboard'));
	}

	function getJaksa()
	{
		$ch = curl_init();

		$url = 'https://izin.kejari-kediri.go.id/api/';
		$params = array(
			'req' => 'jf',
			'key' => 'IW4hJGRhbDRoazN5cmFoNHNpYUQ0ciFzQXk0'
		);

		curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_data = curl_exec($ch);
		curl_close($ch);

		$datas = json_decode($curl_data);

		return $datas->data;
	}
}
