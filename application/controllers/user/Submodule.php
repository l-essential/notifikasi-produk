<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submodule extends CI_Controller {

	//load database
	public function __construct(){ 
		parent::__construct();
		$this->load->model('user/submodule_model');
		$this->load->model('user/module_model');
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
		base_url('user/submodule');
	}else{
	redirect(base_url('dashboard/eror'));
	exit();
	  }											  				
	}
	//List submodule & Tambah submodule
	public function index(){
		//cek Hak Akses submodule
		$this->check('submodule','r');
		$submodule = $this->submodule_model->listing();
		$module    = $this->module_model->listing();
		$valid     = $this->form_validation;
		$valid->set_rules('nama_submodule','Nama submodule','is_unique[tbl_submodule.nama_submodule]');
		if($valid->run()==FALSE){			
		$data = array('sub_judul'  => 'Submodule',					  
					  'sub_judul1' => 'List',
					  'module'     =>  $module,
					  'submodule'  =>  $submodule,
					  'isi'  	   => 'user/submodule/list',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array(),
					  'status_note_ra'  => $this->M_notifikasi->getmerekbystatusnotera()->result_array(),
					  'status_note_rndcm'  => $this->M_notifikasi->getmerekbystatusnoternd()->result_array()
					);
		
		$this->load->view('layout/wrapper',$data);
	}else{
			$i = $this->input;
			$data = array ('id_module'        => $i->post('id_module'),
						   'nama_submodule'   => $i->post('nama_submodule'),
						   'url_sub'	      => $i->post('url_sub'),
						   'jenis_form'	      => $i->post('jenis_form'),
						   'urutan'       	  => $i->post('urutan'),
						   'create_by'		  => $this->session->userdata('username'),
						   'create_date'	  => date('Y-m-d H:i:s'),
						   );
			$this->submodule_model->tambah($data);	
			$this->session->set_flashdata('sukses','Data Berhasil Di Tambah');
			redirect(base_url('user/submodule'));
		}		
	}

	//Edit submodule
	public function edit($id_submodule){
		//cek Hak Akses submodule
		$this->check('submodule','u');
		$submodule = $this->submodule_model->detail($id_submodule);
		$module    = $this->module_model->listing();
		$valid     = $this->form_validation;
		$valid->set_rules('create_date','Create submodule','is_unique[tbl_submodule.create_date]');
		if($valid->run()==FALSE){		
			$data = array('sub_judul'    => 'Submodule',
					  	  'sub_judul1'   => 'Edit',
					  	  'module'       =>  $module,
					  	  'submodule'	 =>	 $submodule,					  
							'isi'          => 'user/submodule/edit',
							'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
							'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array(),
							'status_note_ra'  => $this->M_notifikasi->getmerekbystatusnotera()->result_array(),
					  		'status_note_rndcm'  => $this->M_notifikasi->getmerekbystatusnoternd()->result_array()
						);						
			$this->load->view('layout/wrapper',$data);			
		}else{
			$i = $this->input;
			$data = array( 'id_module'        => $i->post('id_module'),
						   'nama_submodule'   => $i->post('nama_submodule'),
						   'url_sub'	      => $i->post('url_sub'),
						   'jenis_form'	      => $i->post('jenis_form'),
						   'urutan'           => $i->post('urutan'),
						   'change_by'		  => $this->session->userdata('username'),
						   'change_date'	  => date('Y-m-d H:i:s'),
						   );
			$this->submodule_model->edit($data,$id_submodule);
			$this->session->set_flashdata('sukses','Data Berhasil Di Update');
			redirect(base_url('user/submodule'));
		}			
	}
	//Hapus submodule
	public function hapus($id_submodule){
		//cek Hak Akses submodule
		$this->check('submodule','d');
		$cek  		 = $this->role_model->hapus_submodule($id_submodule);
		$view_module = $cek->view_module;
		$c 			 = $cek->c;
		$r 			 = $cek->r;
		$u 			 = $cek->u;
		$d 			 = $cek->d;
		if($view_module >0 || $c >0 || $r >0 || $u >0 || $d >0){
			print_r($cek);
			$this->session->set_flashdata('error','Data Tidak Berhasil Di Hapus, Data sudah ada transaksi di Role Akses');
			redirect(base_url('user/submodule'));	
	}else{
		$id_submodule = $this->uri->segment(4);
		$data4 = array('id_submodule' => $id_submodule );
		$this->submodule_model->delete_submodule($data4);
		$this->role_model->delete_submodule($data4);			
			$this->session->set_flashdata('sukses','Data Berhasil Di Hapus');
			redirect(base_url('user/submodule'));
		}
	}
}
