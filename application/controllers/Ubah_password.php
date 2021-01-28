<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/userlogin_model');
	}
	public function index()
    {
    	$data = array('sub_judul'    => 'Ubah Password',
					  'sub_judul1'   => 'Ubah Password',					  
			          'isi'     	 => 'ubah_password');			
		$this->load->view('layout/wrapper',$data);
	}
	public function change_password()
	{
		$id_login = $this->session->userdata('id');
		$password = $this->session->userdata('password');
		$i = $this->input;
		$data = array ('password'    	  => sha1($i->post('password_baru')),
					   'change_by' 	      => $this->session->userdata('username'),
					   'change_date'	  => date('Y-m-d H:i:s'));
		
		$this->userlogin_model->edit($data,$id_login);
		$old_password = sha1($i->post('password_lama'));
	if($old_password != $password){
			$this->session->set_flashdata('error', 'Maaf Password Lama Anda Salah');
		redirect(base_url('ubah_password'));
	}else{
		$this->userlogin_model->edit($data,$id_login);
		$this->session->set_flashdata('sukses', 'Password Berhasil Di Rubah, Silahkan login dengan menggunakan Password yang baru');
		redirect(base_url('ubah_password'));
	}
  }
}