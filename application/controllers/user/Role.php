<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	//load database
	public function __construct(){ 
		parent::__construct();
		$this->load->model('user/role_model');
		$this->load->model('user/group_model');
		$this->load->model('user/module_model');
		$this->load->model('user/submodule_model');
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
		base_url('user/role');
	}else{
	redirect(base_url('dashboard/eror'));
	exit();
	  }											  				
	}
	//List Role
	public function listing($id_group){
		$id_akses	= $this->session->userdata('id_akses');
		if($id_akses==1){ 
		$role       = $this->role_model->listing($id_group);
		$group      = $this->group_model->detail($id_group);
		$module     = $this->module_model->listing();
		$submodule  = $this->submodule_model->listing();			
		$data 		= array('sub_judul'  => 'Role',					  
					  'sub_judul1' => 'list',
					  'module'     =>  $module,
					  'submodule'  =>  $submodule,
					  'role'	   =>  $role,
					  'group'	   =>  $group,
					  'isi'  	   => 'user/role/list',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
		$this->load->view('layout/wrapper',$data);
		}else{ 
			redirect(base_url('dashboard/eror')); exit(); };
	}

	//Tambah Role Akses
	public function tambah($id_group){
		$submodule 	  = $this->submodule_model->listing();
		$i            = $this->input;
		foreach($submodule as $submodule){
		$id_submodule = $submodule->id_submodule;		
		 	$data =  array('id_group'      	 => $i->post('id_group'),
			               'id_module'  	 => $i->post('id_module_'.$submodule->id_module),
			               'view_module'  	 => $i->post('view_module_'.$submodule->id_module),
			               'id_submodule'  	 => $i->post('id_submodule_'.$submodule->id_submodule),
						   'c'				 => $i->post('submodule_tambah_'.$submodule->id_submodule),
						   'r'				 => $i->post('submodule_view_'.$submodule->id_submodule),
						   'u'				 => $i->post('submodule_edit_'.$submodule->id_submodule),
						   'd'				 => $i->post('submodule_delete_'.$submodule->id_submodule),						   
			      		   'create_by'    	 => $this->session->userdata('username'),
							  'create_date'  	 => date('Y-m-d H:i:s'),
							  );
		 		$this->role_model->tambah($data);	
		}
		$this->session->set_flashdata('sukses','Data Berhasil Di Simpan');
		redirect(base_url('user/group'));		
	}

	//Edit Role Akses
	public function edit($id_group){
		$submodule 	   = $this->submodule_model->listing();
		$i             = $this->input;
		foreach($submodule as $submodule){
		$id_submodule = $submodule->id_submodule;
		$cek_submodule = $this->role_model->cek_submodule($id_group,$id_submodule);
		if(count($cek_submodule)>0) {		
		 	$data =  array('id_group'      	 => $i->post('id_group'),
			               'id_module'  	 => $i->post('id_module_'.$submodule->id_module),
			               'view_module'  	 => $i->post('view_module_'.$submodule->id_module),
			               'id_submodule'  	 => $i->post('id_submodule_'.$submodule->id_submodule),
						   'c'				 => $i->post('submodule_tambah_'.$submodule->id_submodule),
						   'r'				 => $i->post('submodule_view_'.$submodule->id_submodule),
						   'u'				 => $i->post('submodule_edit_'.$submodule->id_submodule),
						   'd'				 => $i->post('submodule_delete_'.$submodule->id_submodule),						   
			      		   'change_by'    	 => $this->session->userdata('username'),
							  'change_date'  	 => date('Y-m-d H:i:s'),
							  );
		 		$this->role_model->edit($data);	
		}else{
			$data =  array('id_group'      	 => $i->post('id_group'),
			               'id_module'  	 => $i->post('id_module_'.$submodule->id_module),
			               'view_module'  	 => $i->post('view_module_'.$submodule->id_module),
			               'id_submodule'  	 => $i->post('id_submodule_'.$submodule->id_submodule),
						   'c'				 => $i->post('submodule_tambah_'.$submodule->id_submodule),
						   'r'				 => $i->post('submodule_view_'.$submodule->id_submodule),
						   'u'				 => $i->post('submodule_edit_'.$submodule->id_submodule),
						   'd'				 => $i->post('submodule_delete_'.$submodule->id_submodule),						   
			      		   'change_by'    	 => $this->session->userdata('username'),
							  'change_date'  	 => date('Y-m-d H:i:s'),
							  );
		 		$this->role_model->tambah($data);
		 	}
		}
		
		$this->session->set_flashdata('sukses','Data Berhasil Di Simpan');
		redirect(base_url('user/group'));		
	}
}