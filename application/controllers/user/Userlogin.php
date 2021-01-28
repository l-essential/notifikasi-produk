<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {

	//load database
	public function __construct(){ 
		parent::__construct();
		$this->load->model('user/userlogin_model');
		$this->load->model('user/group_model');
		// $this->load->model('hrd/karyawan_model');
		$this->load->helper('tanggalindonesia');
		$this->id_group = $this->session->userdata('id_group');
		$this->load->model('notifikasi/M_notifikasi');
	}
	//Cek Hak Akses Submodule
	public function check($submodule,$crud)
	{
		$this->load->model('user/role_model');
		$t = $this->role_model->get_row(array('tbl_role.id_group'     =>$this->id_group, 
											  'tbl_submodule.url_sub' =>$submodule));		
		if($t->$crud==1) {
		base_url('user/userlogin');
	}else{
	redirect(base_url('dashboard/eror'));
	exit();
	  }											  				
	}
	//List Userlogin
	public function index(){
		//cek Hak Akses Userlogin
		$this->check('userlogin','r');
		$userlogin = $this->userlogin_model->listing();
		$group     = $this->group_model->listing();
		// $karyawan  = $this->karyawan_model->listing();
		$data = array('sub_judul'  	  => 'Userlogin',					  
					  'sub_judul1' 	  => 'list',
					  'group'     	  =>  $group,
					  'userlogin' 	  =>  $userlogin,
					  // 'karyawan' 	  =>  $karyawan,
					  'isi'  	  	  => 'user/user_login/list',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
		$this->load->view('layout/wrapper',$data);	
	}
	//Tambah Userlogin
	public function tambah(){
		//cek Hak Akses Userlogin
		$this->check('userlogin','c');
		$userlogin = $this->userlogin_model->listing();
		$group     = $this->group_model->listing();
		$karyawan  = $this->userlogin_model->listing_karyawan();
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','is_unique[tbl_login.username]');
		if($valid->run()==FALSE){
		$data = array('sub_judul'  => 'Userlogin',					  
					  'sub_judul1' => 'Tambah',
					  'userlogin'  =>  $userlogin,
					  'group'	   =>  $group,
					  'karyawan'   =>  $karyawan,
					  'isi'  	   => 'user/user_login/tambah',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
		$this->load->view('layout/wrapper',$data);
	}else{
		$i = $this->input;
			$data = array ('username'     		 => $i->post('username'),
						   'password'			 => sha1($i->post('password')),
						   'NIK'	     		 => $i->post('nik'),
						   'id_group'      		 => $i->post('id_group'),
						   'id_akses'      		 => $i->post('id_akses'),
						   'create_by'     		 => $this->session->userdata('username'),
						   'create_date'   		 => date('Y-m-d H:i:s'),
						   'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
						   'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
			$this->userlogin_model->tambah($data);	
		$this->session->set_flashdata('sukses','Data Berhasil Di Tambah');
		redirect(base_url('user/userlogin'));
		}		
	}
	//Edit Userlogin
	public function edit($id_login){
		//cek Hak Akses Userlogin
		$this->check('userlogin','r');
		$karyawan  = $this->userlogin_model->listing_karyawan();
		$group 	   = $this->group_model->listing();
		$userlogin = $this->userlogin_model->detail($id_login);
		$valid     = $this->form_validation;
		$valid->set_rules('username','Username','required',
			 array('required' => 'ID harus diisi !'));
		if($valid->run()==FALSE){		
			$data = array('sub_judul'    => 'Userlogin',
					  	  'sub_judul1'   => 'Edit',
					  	  'group'		 =>  $group,
					  	  'karyawan'	 =>  $karyawan,
					  	  'userlogin'	 =>	 $userlogin,					  
							'isi'          => 'user/user_login/edit',
							'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
							'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());						
			$this->load->view('layout/wrapper',$data);			
		}else{
			$i = $this->input;
			if($i->post('password')!=''){
			$data = array ('password'         => sha1($i->post('password')),
						   'username'		  => $i->post('username'),
						   'id_group'   	  => $i->post('id_group'),
						   'id_akses'   	  => $i->post('id_akses'),
						   'change_by'        => $this->session->userdata('username'),
						   'change_date'	  => date('Y-m-d H:i:s'),
						   'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
						   'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
			$this->userlogin_model->edit($data,$id_login);			
			$this->session->set_flashdata('sukses','Data Berhasil Di Update');
			redirect(base_url('user/userlogin'));
		}else{
			$data = array ('id_group'   	  => $i->post('id_group'),
						   'username'		  => $i->post('username'),
						   'id_akses'   	  => $i->post('id_akses'),
						   'change_by'        => $this->session->userdata('username'),
						   'change_date'	  => date('Y-m-d H:i:s'),
						   'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
						   'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
			$this->userlogin_model->edit($data,$id_login);			
			$this->session->set_flashdata('sukses','Data Berhasil Di Update');
			redirect(base_url('user/userlogin'));
			}
		}
	}
	//Hapus Userlogin
	public function hapus($id_login){
		//cek Hak Akses Userlogin
		$this->check('userlogin','r');
		$data = array('id_login' => $id_login );
		$this->userlogin_model->hapus($data);			
			$this->session->set_flashdata('sukses','Data Berhasil Di Hapus');
			redirect(base_url('user/userlogin'));
	}
}