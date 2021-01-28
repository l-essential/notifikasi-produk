<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

	//load database
	public function __construct(){ 
		parent::__construct();
		$this->load->model('user/module_model');
		$this->load->model('user/role_model');
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
		base_url('user/module');
	}else{
	redirect(base_url('dashboard/eror'));
	exit();
	  }											  				
	}
	//List module & Tambah module
	public function index(){
		//cek Hak Akses Module
		$this->check('module','r');
		$module = $this->module_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('nama_module','Nama module','is_unique[tbl_module.nama_module]');
		if($valid->run()==FALSE){
			
		$data = array('sub_judul'  => 'Module',					  
					  'sub_judul1' => 'list',
					  'module'	   =>  $module,
					  'isi'  	   => 'user/module/list',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
		
		$this->load->view('layout/wrapper',$data);
	}else{
			$i = $this->input;
			$data = array ('nama_module'   => $i->post('nama_module'),
						   'url'   		   => $i->post('url'),
						   'logo'  		   => $i->post('logo'),
						   'submodule'	   => $i->post('submodule'),
						   'urutan'        => $i->post('urutan'),
						   'create_by'	   => $this->session->userdata('username'),
						   'create_date'   => date('Y-m-d H:i:s'),
						   'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
						   'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
			$this->module_model->tambah($data);	
			$this->session->set_flashdata('sukses','Data Berhasil Di Tambah');
			redirect(base_url('user/module'));
		}		
	}

	//Edit module
	public function edit($id_module){
		//cek Hak Akses Module
		$this->check('module','u');
		$module = $this->module_model->detail($id_module);
		$valid = $this->form_validation;
		$valid->set_rules('create_module','Create module','is_unique[tbl_module.create_module]');
		if($valid->run()==FALSE){		
			$data = array('sub_judul'    => 'module',
					  	  'sub_judul1'   => 'Edit',
					  	  'module'		 =>	 $module,					  
							'isi'          => 'user/module/edit',
							'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
							'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());						
			$this->load->view('layout/wrapper',$data);			
		}else{
			$i = $this->input;
			$data = array ('nama_module'   => $i->post('nama_module'),
						   'url'   		   => $i->post('url'),
						   'logo'  		   => $i->post('logo'),
						   'submodule'	   => $i->post('submodule'),
						   'urutan'        => $i->post('urutan'),
						   'change_by'	   => $this->session->userdata('username'),
						   'change_date'   => date('Y-m-d H:i:s'),
						   'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
						   'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
			$this->module_model->edit($data,$id_module);			
			$this->session->set_flashdata('sukses','Data Berhasil Di Update');
			redirect(base_url('user/module'));
		}			
	}
	//Hapus module
	public function hapus($id_module){
		//cek Hak Akses Module		
		$this->check('module','d');
		$cek  = $this->submodule_model->cek_module($id_module);
		if(count($cek) > 0){
			$this->session->set_flashdata('error','Data Tidak Berhasil Di Hapus, Data sudah ada transaksi di Submodule');
			redirect(base_url('user/module'));	
		}else{
		$data = array('id_module' => $id_module);
		$this->module_model->delete($data);	
			$this->session->set_flashdata('sukses','Data Berhasil Di Hapus');
			redirect(base_url('user/module'));
		}
	}
}
