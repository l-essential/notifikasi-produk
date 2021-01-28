<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('tbl_login', array(
										'username' => $username,
										'password' => sha1($password)
										));
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 			= $this->CI->db->query("SELECT * FROM tbl_login WHERE username = '$username'");
			$admin 			= $row->row();
			$id 			= $admin->id_login;
			$cek_pass		= $admin->password;
			// $foto 	        = $admin->foto;
			$id_group		= $admin->id_group;
			$NIK			= $admin->NIK;
			$id_akses		= $admin->id_akses;
			$last_access	= date('Y-m-d H:i:s');
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('password', $cek_pass); 
			$this->CI->session->set_userdata('id_group', $id_group); 
			$this->CI->session->set_userdata('NIK', $NIK);
			// $this->CI->session->set_userdata('foto', $foto); 
			$this->CI->session->set_userdata('id_akses', $id_akses);
			$this->CI->session->set_userdata('last_access', $last_access);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			// Kalau benar di redirect
			$this->CI->db->query("UPDATE tbl_login SET last_access = '$last_access' WHERE id_login = '$id'"); 
			redirect(base_url('dashboard'));

		}else{
			$this->CI->session->set_flashdata('error','Oopss.. Username / Password salah');
			// redirect( $this->config->item("my_sso_url") . "/admin" );
			
			redirect('login','refresh');
			
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '' && $this->CI->session->userdata('id_group')=='') {
			$this->CI->session->set_flashdata('error','Oops...silakan login dulu');
			redirect(base_url('login'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('id_group');
		$this->CI->session->unset_userdata('NIK');
		//$this->CI->session->unset_userdata('foto');
		$this->CI->session->unset_userdata('id_userlogin');
		$this->CI->session->unset_userdata('id_akses');
		$this->CI->session->unset_userdata('last_access');
		$this->CI->session->unset_userdata('id');
		unset($_SESSION['admin']);
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url('login'));
		// redirect( $this->CI->config->item("my_sso_url") . "/admin" );
	
	}
}