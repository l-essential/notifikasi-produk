<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->session->userdata('id_group');
		$this->load->library('form_validation');
		$this->load->model('notifikasi/M_notifikasi');
    }
    
	
	public function masterbs(){

		$data = array('sub_judul'  => 'Master Data',
					  'sub_judul1' => 'Bentuk Sediaan',
					  'isi'  	   => 'masterdata/bentuksediaan',
					  'databs'       => $this->M_notifikasi->getdata('tbl_masterbs')->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambahbs(){
		$this->form_validation->set_rules('bentuksediaan', 'Bentuk Sediaan', 'required');

        if($this->form_validation->run() == false)
        {
			$data = array('sub_judul'  => 'Master Data',
						'sub_judul1'   => 'Tambah Data Bentuk Sediaan',
						'isi'  	       => 'masterdata/tambahbs',
						'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  	'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
						);
			$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			'bentuksediaan'   => $this->input->post('bentuksediaan'),
			'createdate'      => date('Y-m-d H:i:s'),
			'updatedate'      => date('Y-m-d H:i:s')
		);
		$this->M_notifikasi->add($data, 'tbl_masterbs');
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Master Bentuk Sediaan Berhasil Ditambahkan<strong class="green"></strong></div>');
		redirect(base_url('fnp/masterdata/masterbs'));
		}
	}

	public function editbs($idbs){
		$this->form_validation->set_rules('bentuksediaan', 'Bentuk Sediaan', 'required');

        if($this->form_validation->run() == false)
        {
			$data = array('sub_judul'  => 'Master Data',
						'sub_judul1'   => 'Edit Data Bentuk Sediaan',
						'isi'  	       => 'masterdata/editbs',
						'databs'       => $this->M_notifikasi->getbs($idbs)->row_array(),
						'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  	'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
						);
			$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			'bentuksediaan'   => $this->input->post('bentuksediaan'),
			'updatedate'      => date('Y-m-d H:i:s')
		);
		$this->M_notifikasi->updatebs($idbs, $data, 'tbl_masterbs');
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Master Bentuk Sediaan Berhasil Diperbaharui<strong class="green"></strong></div>');
		redirect(base_url('fnp/masterdata/masterbs'));
		}
	}

	public function delbs($idbs){
		$this->M_notifikasi->delbs($idbs);

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Bentuk Sediaan Berhasil Dihapus<strong class="green"></strong></div>');

		$this->M_notifikasi->getmerekbyid($idmerek)->result_array();
		redirect(base_url('fnp/masterdata/masterbs'));
	}

	public function masterbk(){

		$data = array('sub_judul'  => 'Master Data',
					  'sub_judul1' => 'Bentuk Kemasan',
					  'isi'  	   => 'masterdata/bentukkemasan',
					  'databk'       => $this->M_notifikasi->getdata('tbl_masterbk')->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambahbk(){
		$this->form_validation->set_rules('bentukkemasan', 'Bentuk Sediaan', 'required');

        if($this->form_validation->run() == false)
        {
			$data = array('sub_judul'  => 'Master Data',
						'sub_judul1'   => 'Tambah Data Bentuk Kemasan',
						'isi'  	       => 'masterdata/tambahbk',
						'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  	'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
						);
			$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			'bentukkemasan'   => $this->input->post('bentukkemasan'),
			'createdate'      => date('Y-m-d H:i:s'),
			'updatedate'      => date('Y-m-d H:i:s')
		);
		$this->M_notifikasi->add($data, 'tbl_masterbk');
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Master Bentuk Kemasan Berhasil Ditambahkan<strong class="green"></strong></div>');
		redirect(base_url('fnp/masterdata/masterbk'));
		}
	}

	public function editbk($idbk){
		$this->form_validation->set_rules('bentukkemasan', 'Bentuk kemasan', 'required');

        if($this->form_validation->run() == false)
        {
			$data = array('sub_judul'  => 'Master Data',
						'sub_judul1'   => 'Edit Data Bentuk Kemasan',
						'isi'  	       => 'masterdata/editbk',
						'databk'       => $this->M_notifikasi->getbk($idbk)->row_array(),
						'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  	'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
						);
			$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			'bentukkemasan'   => $this->input->post('bentukkemasan'),
			'updatedate'      => date('Y-m-d H:i:s')
		);
		$this->M_notifikasi->updatebk($idbk, $data, 'tbl_masterbk');
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Master Bentuk Kemasan Berhasil Diperbaharui<strong class="green"></strong></div>');
		redirect(base_url('fnp/masterdata/masterbk'));
		}
	}

	public function delbk($idbk){
		$this->M_notifikasi->delbk($idbk);

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Bentuk Kemasan Berhasil Dihapus<strong class="green"></strong></div>');

		$this->M_notifikasi->getmerekbyid($idmerek)->result_array();
		redirect(base_url('fnp/masterdata/masterbk'));
	}
}
