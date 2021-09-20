<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {


	function __construct()

	{
		parent::__construct();
		if ($this->session->userdata('auth') == false) {
			redirect(base_url('auth/login'));
		}
		$this->load->model('App');
	}

	public function redirect(){
		redirect(base_url('admin/dashboard'));
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
		}
	// public function index(){
	// 	// if(isset($_POST['login'])){
	// 		$user = $this->input->post('user',true);
	// 		$pass = $this->input->post('pass',true);
	// 		$cek = $this->model('App')->login($user,$pass);
	// 		$hasil = count($cek);
	// 		if($hasil>0){
	// 			redirect(base_url('auth/V_body'));
	// 		}else{
	// 			redirect(base_url('auth/login'));
	// 		}
			// 	$login =$this->db->get_where('login',array('username'=>$user,'password' =>$pass))->row();
			// 	if($login->user =='posyandu1'){
			// 		redirect('auth/login');
			// 	}elseif($login->user =='posyandu2'){
			// 		redirect('auth/login');
			// 	}else{
			// 		redirect('auth/login');
			// 	}
			// }

