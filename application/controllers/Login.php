<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	// Halaman index
	public function index() {
		
		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');		
		if($valid->run()) {
			$this->simple_login->login($username,$password,base_url('dashboard'), base_url('login'));
		}
		// End validasi
		
		$data = array(	'title'	=> 'Login');
		$this->load->view('login_view', $data);
		//migrasi ke server baru
		// redirect('http://192.168.0.91/lessential/login', 'refresh');
	}
	// public function by_portal()
	// {
	// 	date_default_timezone_set("Asia/Jakarta");
	// 	$this->load->model("user/M_User_Portal");

	// 	# ambil parameter
	// 	$email = trim($this->input->get('email'));
	// 	$password = trim($this->input->get('password'));
	// 	$rawkey = trim($this->input->get('key'));
	// 	$key = base64_decode(strrev(str_replace("~".$this->config->item("my_loginkey"), "", $rawkey)));
		
	// 	# jika key sudah tidak valid maka abaikan
	// 	$date_redirect = strtotime($key);
	// 	$date_now      = strtotime(date("Y-m-d H:i:s"));
	// 	$date_diff_second   = $date_now - $date_redirect;
		
	// 	if($date_diff_second > $this->config->item("my_logintimeout")){
	// 		exit("Link sudah kadaluawarsa, silahkan buka kembali aplikasi melalui sso");
	// 	}

	// 	# cek email & password
	// 	$user_sso = $this->M_User_Portal->table()
	// 					->where("email", $email)
	// 					->where("password", $password)
	// 					->get()->row();

	// 	if( empty($user_sso) )
	// 	{
	// 		exit("User tidak ditemukan");
	// 	}

	// 	# cek user tsb bisa akses ini aplikasi atau engga
	// 	if( $this->M_User_Portal->canIAccessApp($this->config->item("my_appcode"), $user_sso) === False )
	// 	{
	// 		exit("Anda tidak memiliki hak akses untuk membuka aplikasi ini");
	// 	}

	// 	# inject email & password di local
	// 	# buat session & alihkan ke dashboard 
	// 	$this->simple_login->login($user_sso->nik);
	// }
	
	// Logout
	public function logout() {
		$this->simple_login->logout();
	}
}