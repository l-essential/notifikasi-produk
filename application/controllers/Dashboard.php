<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Calendar_model');
		$this->session->userdata('id_group');
		$this->load->model('notifikasi/M_notifikasi');
	}
	//Index Dashboard
	public function index(){
		$test = $this->session->userdata('id_group');
		//print_r($test); exit();
		$data = array('sub_judul'  => 'Dashboard',
					  'sub_judul1' => 'list',
					  'isi'  	   => 'dashboard/list',
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array());
		$this->load->view('layout/wrapper',$data);
	}
	Public function getEvents()
	{
		$id_login = $this->session->userdata('id');
		$result=$this->Calendar_model->getEvents($id_login);
		echo json_encode($result);
	}
	/*Add new event */
	Public function addEvent()
	{
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}
	public function eror()
	{
		$data = array('sub_judul'    => 'Dashboard',
					  'sub_judul1'   => 'Error',
					  'isi'			 => 'dashboard/error');
		$this->load->view('layout/wrapper',$data);
	}

	public function FunctionName(Type $var = null)
	{
		# code...
	}
}