<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_model {
	public function __construct()
	{
		parent::__construct();
	    $this->load->database();
	}

	public function agama(){
		$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaAgama');  
		$query = $this->db->get();
		return $query->result();
	}
	// public function agama_islam(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama','ISLAM');  
 //    	$this->db->group_by('namaAgama');
 //    	$this->db->order_by('Total','DESC');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	
	// public function agama_hindu(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama','HINDU');  
 //    	$this->db->group_by('namaAgama');  
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// public function agama_katolik(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama','KATOLIK');  
 //    	$this->db->group_by('namaAgama');  
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// public function agama_budha(){
	//    $this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //       $this->db->from('MS_Karyawan');
 //       $this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //       $this->db->where('namaAgama','BUDHA');  
 //       $this->db->group_by('namaAgama');  
	//    $query = $this->db->get();
	//    return $query->row();
	// }
	// public function agama_kristen(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama','KRISTEN');  
 //    	$this->db->group_by('namaAgama');  
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// public function agama_konghucu(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama','KRISTEN');  
 //    	$this->db->group_by('namaAgama');  
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// public function agama_lainnya(){
	// 	$this->db->select('LK_Agama.namaAgama, COUNT(MS_Karyawan.kodeAgama) As Total');
 //    	$this->db->from('MS_Karyawan');
 //    	$this->db->join('LK_Agama', 'MS_Karyawan.kodeAgama = LK_Agama.kodeAgama','LEFT'); 
 //    	$this->db->where('namaAgama', NULL);  
 //    	$this->db->group_by('namaAgama');  
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	public function status_kar(){
		$this->db->select('MS_TipeKaryawan.namaTipeKaryawan, COUNT(MS_Karyawan.kodeTipeKaryawan) As Total');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('MS_TipeKaryawan', 'MS_Karyawan.kodeTipeKaryawan = MS_TipeKaryawan.kodeTipeKaryawan','LEFT'); 
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaTipeKaryawan');
    	$this->db->order_by('COUNT(MS_Karyawan.kodeTipeKaryawan)','DESC'); 
    	$query = $this->db->get();
		return $query->result();
	}
	public function status_tetap(){
		$this->db->select('MS_TipeKaryawan.namaTipeKaryawan, COUNT(MS_Karyawan.kodeTipeKaryawan) As Total, tbl_organisasi.nama_organisasi, tbl_organisasi.kode_organisasi');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('tbl_detail_karyawan', 'MS_Karyawan.NIK = tbl_detail_karyawan.NIK','LEFT');
    	$this->db->join('tbl_organisasi', 'tbl_detail_karyawan.kode_organisasi = tbl_organisasi.kode_organisasi','LEFT');
    	$this->db->join('MS_TipeKaryawan', 'MS_Karyawan.kodeTipeKaryawan = MS_TipeKaryawan.kodeTipeKaryawan','LEFT'); 
    	$this->db->where('namaTipeKaryawan','TETAP');  
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaTipeKaryawan');  
    	$this->db->group_by('nama_organisasi');
    	$this->db->group_by('tbl_organisasi.kode_organisasi');
    	$this->db->order_by('tbl_organisasi.kode_organisasi');
		$query = $this->db->get();
		return $query->result();
	}
	public function status_kontrak(){
		$this->db->select('MS_TipeKaryawan.namaTipeKaryawan, COUNT(MS_Karyawan.kodeTipeKaryawan) As Total, tbl_organisasi.nama_organisasi, tbl_organisasi.kode_organisasi');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('tbl_detail_karyawan', 'MS_Karyawan.NIK = tbl_detail_karyawan.NIK','LEFT');
    	$this->db->join('tbl_organisasi', 'tbl_detail_karyawan.kode_organisasi = tbl_organisasi.kode_organisasi','LEFT');
    	$this->db->join('MS_TipeKaryawan', 'MS_Karyawan.kodeTipeKaryawan = MS_TipeKaryawan.kodeTipeKaryawan','LEFT'); 
    	$this->db->where('namaTipeKaryawan','KONTRAK');  
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaTipeKaryawan');  
    	$this->db->group_by('nama_organisasi');
    	$this->db->group_by('tbl_organisasi.kode_organisasi');
    	$this->db->order_by('tbl_organisasi.kode_organisasi');
		$query = $this->db->get();
		return $query->result();
	}
	public function status_probation(){
		$this->db->select('MS_TipeKaryawan.namaTipeKaryawan, COUNT(MS_Karyawan.kodeTipeKaryawan) As Total, tbl_organisasi.nama_organisasi, tbl_organisasi.kode_organisasi');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('tbl_detail_karyawan', 'MS_Karyawan.NIK = tbl_detail_karyawan.NIK','LEFT');
    	$this->db->join('tbl_organisasi', 'tbl_detail_karyawan.kode_organisasi = tbl_organisasi.kode_organisasi','LEFT');
    	$this->db->join('MS_TipeKaryawan', 'MS_Karyawan.kodeTipeKaryawan = MS_TipeKaryawan.kodeTipeKaryawan','LEFT'); 
    	$this->db->where('namaTipeKaryawan','PROBATION');  
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaTipeKaryawan');  
    	$this->db->group_by('nama_organisasi');
    	$this->db->group_by('tbl_organisasi.kode_organisasi');
    	$this->db->order_by('tbl_organisasi.kode_organisasi');
		$query = $this->db->get();
		return $query->result();
	}
	public function status_harian(){
		$this->db->select('MS_TipeKaryawan.namaTipeKaryawan, COUNT(MS_Karyawan.kodeTipeKaryawan) As Total, tbl_organisasi.nama_organisasi, tbl_organisasi.kode_organisasi');
    	$this->db->from('MS_Karyawan');
    	$this->db->join('tbl_detail_karyawan', 'MS_Karyawan.NIK = tbl_detail_karyawan.NIK','LEFT');
    	$this->db->join('tbl_organisasi', 'tbl_detail_karyawan.kode_organisasi = tbl_organisasi.kode_organisasi','LEFT');
    	$this->db->join('MS_TipeKaryawan', 'MS_Karyawan.kodeTipeKaryawan = MS_TipeKaryawan.kodeTipeKaryawan','LEFT'); 
    	$this->db->where('namaTipeKaryawan','HARIAN');  
    	$this->db->where('MS_Karyawan.tglPengunduranDiri', NULL);
    	$this->db->group_by('namaTipeKaryawan');  
    	$this->db->group_by('nama_organisasi');
    	$this->db->group_by('tbl_organisasi.kode_organisasi');
    	$this->db->order_by('tbl_organisasi.kode_organisasi');
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_acm($data4,$id_finger){
		$this->db4->where('ID',$id_finger);
		$this->db4->update('NGAC_USE',$data4);
	}
	public function karyawan_masuk($bulan){
		$tahun = date('Y');
		$this->db->select('MONTH(tglMulaiKerja) as nama_bulan, COUNT(MONTH(tglMulaiKerja)) as total');
    	$this->db->from('MS_Karyawan');
    	$this->db->where('YEAR(tglMulaiKerja)',$tahun);
    	$this->db->where('MONTH(tglMulaiKerja)',$bulan);  
    	$this->db->group_by('MONTH(tglMulaiKerja)');  
    	$this->db->order_by('MONTH(tglMulaiKerja)');
    	$query = $this->db->get();
		return $query->row_array();
    }
    public function karyawan_keluar($bulan){
		$tahun = date('Y');
		$this->db->select('MONTH(tglPengunduranDiri) as nama_bulan, COUNT(MONTH(tglPengunduranDiri)) as total');
    	$this->db->from('MS_Karyawan');
    	$this->db->where('YEAR(tglPengunduranDiri)',$tahun);
    	$this->db->where('MONTH(tglPengunduranDiri)',$bulan);  
    	$this->db->group_by('MONTH(tglPengunduranDiri)');  
    	$this->db->order_by('MONTH(tglPengunduranDiri)');
    	$query = $this->db->get();
		return $query->row_array();
    }
    public function get_bulan(){
    	$this->db->select('bulan');
    	$this->db->from('tbl_date_year');
    	$this->db->group_by('bulan');
    	$query = $this->db->get();
    	return $query->result();
    }
}