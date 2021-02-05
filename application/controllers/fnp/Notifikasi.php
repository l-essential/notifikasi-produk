<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->session->userdata('id_group');
		$this->load->library('form_validation');
		$this->load->model('notifikasi/M_notifikasi');
	}

	// ========================================================================================== INDEX
	public function index(){
		
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'list',
					  'isi'  	   => 'notifikasi/list',
					  'merek'      => $this->M_notifikasi->getmerek()->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
	}

	// ========================================================================================== VIEW DATA
	public function viewdata($idmerek){
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Lihat Data',
					  'isi'  	   => 'notifikasi/viewdata',
					  'merek'      => $this->M_notifikasi->getmerekbyid($idmerek)->row_array(),
					  'komposisi'  => $this->M_notifikasi->getkomposisi($idmerek)->result_array(),
					  'prosedur'   => $this->M_notifikasi->getprosedur($idmerek)->result_array(),
					//   'alldata'    =>  $this->M_notifikasi->getalldata($idmerek)->result_array(),
					  'total'      => null,
					  'bk'         => $this->M_notifikasi->getbkbyidmerek($idmerek)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
	}

	// ========================================================================================== HAPUS ALL DATA
	public function hapusalldata($idmerek){
		$this->M_notifikasi->delalldata($idmerek);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Dihapus<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi'));
	}


	// ========================================================================================== ERROR
	public function error()
	{
		$data = array('sub_judul'    => 'Notifikasi',
					  'sub_judul1'   => 'Error',
					  'isi'			 => 'notifikasi/error');
		$this->load->view('layout/wrapper',$data);
	}

	// ========================================================================================== ADD MEREK
	public function addmerek(){
		
		$this->form_validation->set_rules('namamerek', 'Nama Merek', 'required');
		$this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('bentuksediaan', 'Bentuk Sediaan', 'required');
		$this->form_validation->set_rules('warnasediaan', 'Warna Sediaan', 'required');
		// $this->form_validation->set_rules('ukurankemasan', 'Ukuran Kemasan', 'required');
		$this->form_validation->set_rules('noformula', 'No. Formula', 'required');
		$this->form_validation->set_rules('norevisi', 'No. Revisi', 'required');
		$this->form_validation->set_rules('tglberlaku', 'Tanggal Berlaku', 'required');
		$this->form_validation->set_rules('formulakhusus', 'Formula Khusus', 'required');
		$this->form_validation->set_rules('persamaanproduk', 'Persamaan Produk', 'required');
		$this->form_validation->set_rules('klaimproduk', 'Klaim Produk', 'required');
		$this->form_validation->set_rules('carapakai', 'Cara Pakai', 'required');
		$this->form_validation->set_rules('perhatian', 'Perhatian', 'required');
		// $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Add Merek',
					  'isi'  	   => 'notifikasi/addmerek',
					  'databs'     => $this->M_notifikasi->getdata('tbl_masterbs')->result_array(),
					  'databk'       => $this->M_notifikasi->getdata('tbl_masterbk')->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper', $data);
		}else{

			$file = $_FILES['filepdf']['name'];

			if(!empty($file)){
				$config['upload_path'] = './assets/doc/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']      = '2048';			
                
				$this->load->library('upload', $config);
				// $this->upload->initialize($config);

                if ($this->upload->do_upload('filepdf')) {
					$data = array(
						'namamerek'       		=> $this->input->post('namamerek'),
						'namaproduk'      		=> $this->input->post('namaproduk'),
						'bentuksediaan'   		=> $this->input->post('bentuksediaan'),
						'warnasediaan'    		=> $this->input->post('warnasediaan'),
						// 'primer'          	=> $this->input->post('primer'),
						// 'sekunder'        	=> $this->input->post('sekunder'),
						// 'ukurankemasan'   	=> $this->input->post('ukurankemasan'),
						'noformula'       		=> $this->input->post('noformula'),
						'norevisi'        		=> $this->input->post('norevisi'),
						'tglberlaku'      		=> $this->input->post('tglberlaku'),
						'formulakhusus'   		=> $this->input->post('formulakhusus'),
						'persamaanproduk' 		=> $this->input->post('persamaanproduk'),
						'kategori'        		=> $this->input->post('kategori'),
						// 'subkategori'     	=> $this->input->post('subkategori'),
						'klaimproduk'     		=> $this->input->post('klaimproduk'),
						'carapakai'       		=> $this->input->post('carapakai'),
						'perhatian'       		=> $this->input->post('perhatian'),
						'catatan'         		=> $this->input->post('catatan'),
						'catatanra'        		=> $this->input->post('catatanra'),
						'pdf' 					=> $this->upload->data('file_name'),
						'status_approve_rnd' 	=> '0',
						'status_approve_ra' 	=> '0',
						'createby'        		=> $this->session->userdata('NIK'),
						'createdate'      		=> date('Y-m-d H:i:s'),
						'updatedate'      		=> date('Y-m-d H:i:s')
					);
					$this->M_notifikasi->add($data, 'tbl_merek');
					$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Diperbaharui<strong class="green"></strong></div>');
					redirect(base_url('fnp/notifikasi/'));
                } else {
					var_dump($this->upload->display_errors('', ''));
					var_dump($_FILES);
                }
			}else{
			$data = array(
				'namamerek'       => $this->input->post('namamerek'),
				'namaproduk'      => $this->input->post('namaproduk'),
				'bentuksediaan'   => $this->input->post('bentuksediaan'),
				'warnasediaan'    => $this->input->post('warnasediaan'),
				// 'primer'          => $this->input->post('primer'),
				// 'sekunder'        => $this->input->post('sekunder'),
				// 'ukurankemasan'   => $this->input->post('ukurankemasan'),
				'noformula'       => $this->input->post('noformula'),
				'norevisi'        => $this->input->post('norevisi'),
				'tglberlaku'      => $this->input->post('tglberlaku'),
				'formulakhusus'   => $this->input->post('formulakhusus'),
				'persamaanproduk' => $this->input->post('persamaanproduk'),
				'kategori'        => $this->input->post('kategori'),
				// 'subkategori'     => $this->input->post('subkategori'),
				'klaimproduk'     => $this->input->post('klaimproduk'),
				'carapakai'       => $this->input->post('carapakai'),
				'perhatian'       => $this->input->post('perhatian'),
				'catatan'         => $this->input->post('catatan'),
				'catatanra'        => $this->input->post('catatanra'),
				'status_approve_rnd' => '0',
				'status_approve_ra' => '0',
				'createby'        => $this->session->userdata('NIK'),
				'createdate'      => date('Y-m-d H:i:s'),
				'updatedate'      => date('Y-m-d H:i:s')
			);
			$this->M_notifikasi->add($data, 'tbl_merek');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Diperbaharui<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/'));
			}
		}
	}

	public function editmerek($idmerek){
		$data['merek'] = $this->M_notifikasi->getmerekbyid($idmerek)->row_array();

		$this->form_validation->set_rules('namamerek', 'Nama Merek', 'required');
		$this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('bentuksediaan', 'Bentuk Sediaan', 'required');
		$this->form_validation->set_rules('warnasediaan', 'Warna Sediaan', 'required');
		// $this->form_validation->set_rules('ukurankemasan', 'Ukuran Kemasan', 'required');
		$this->form_validation->set_rules('noformula', 'No. Formula', 'required');
		$this->form_validation->set_rules('norevisi', 'No. Revisi', 'required');
		$this->form_validation->set_rules('tglberlaku', 'Tanggal Berlaku', 'required');
		$this->form_validation->set_rules('formulakhusus', 'Formula Khusus', 'required');
		$this->form_validation->set_rules('persamaanproduk', 'Persamaan Produk', 'required');
		$this->form_validation->set_rules('klaimproduk', 'Klaim Produk', 'required');
		$this->form_validation->set_rules('carapakai', 'Cara Pakai', 'required');
		$this->form_validation->set_rules('perhatian', 'Perhatian', 'required');
		// $this->form_validation->set_rules('catatan', 'Catatan', 'required');
		// $this->form_validation->set_rules('catatanra', 'Catatan', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Edit Merek',
					  'isi'  	   => 'notifikasi/editmerek',
					  'merek'      => $this->M_notifikasi->getmerekbyid($idmerek)->row_array(),
					  'databs'     => $this->M_notifikasi->getdata('tbl_masterbs')->result_array(),
					  'databk'       => $this->M_notifikasi->getdata('tbl_masterbk')->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper', $data);
		}else{

			$file = $_FILES['filepdf']['name'];

			if(!empty($file)){
				$config['upload_path'] = './assets/doc/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']      = '2048';			
                
				$this->load->library('upload', $config);
				// $this->upload->initialize($config);

                if ($this->upload->do_upload('filepdf')) {
					$old = $data['merek']['pdf'];
                    if ($old != $file) {
                        unlink(FCPATH . 'assets/doc/' . $old);
					}
					
					$data = array(
						'namamerek'       => $this->input->post('namamerek'),
						'namaproduk'      => $this->input->post('namaproduk'),
						'bentuksediaan'   => $this->input->post('bentuksediaan'),
						'warnasediaan'    => $this->input->post('warnasediaan'),
						// 'primer'          => $this->input->post('primer'),
						// 'sekunder'        => $this->input->post('sekunder'),
						// 'ukurankemasan'   => $this->input->post('ukurankemasan'),
						'noformula'       => $this->input->post('noformula'),
						'norevisi'        => $this->input->post('norevisi'),
						'tglberlaku'      => $this->input->post('tglberlaku'),
						'formulakhusus'   => $this->input->post('formulakhusus'),
						'persamaanproduk' => $this->input->post('persamaanproduk'),
						'kategori'        => $this->input->post('kategori'),
						// 'subkategori'     => $this->input->post('subkategori'),
						'klaimproduk'     => $this->input->post('klaimproduk'),
						'carapakai'       => $this->input->post('carapakai'),
						'perhatian'       => $this->input->post('perhatian'),
						'catatan'         => $this->input->post('catatan'),
						'catatanra'        => $this->input->post('catatanra'),
						'pdf' => $this->upload->data('file_name'),
						'updatedate'      => date('Y-m-d H:i:s')
					);
					$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');
					$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Diperbaharui<strong class="green"></strong></div>');
					redirect(base_url('fnp/notifikasi/'));
                } else {
					var_dump($this->upload->display_errors('', ''));
					var_dump($_FILES);
                }
			}else{
			$data = array(
				'namamerek'       => $this->input->post('namamerek'),
				'namaproduk'      => $this->input->post('namaproduk'),
				'bentuksediaan'   => $this->input->post('bentuksediaan'),
				'warnasediaan'    => $this->input->post('warnasediaan'),
				// 'primer'          => $this->input->post('primer'),
				// 'sekunder'        => $this->input->post('sekunder'),
				// 'ukurankemasan'   => $this->input->post('ukurankemasan'),
				'noformula'       => $this->input->post('noformula'),
				'norevisi'        => $this->input->post('norevisi'),
				'tglberlaku'      => $this->input->post('tglberlaku'),
				'formulakhusus'   => $this->input->post('formulakhusus'),
				'persamaanproduk' => $this->input->post('persamaanproduk'),
				'kategori'        => $this->input->post('kategori'),
				// 'subkategori'     => $this->input->post('subkategori'),
				'klaimproduk'     => $this->input->post('klaimproduk'),
				'carapakai'       => $this->input->post('carapakai'),
				'perhatian'       => $this->input->post('perhatian'),
				'catatan'         => $this->input->post('catatan'),
				'catatanra'        => $this->input->post('catatanra'),
				'updatedate'      => date('Y-m-d H:i:s')
			);
			$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Diperbaharui<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/'));
			}
		}
	}

	public function delpdf($idmerek){
		$data['merek'] = $this->M_notifikasi->getmerekbyid($idmerek)->row_array();
		$old = $data['merek']['pdf'];
		unlink(FCPATH . 'assets/doc/' . $old);
		$this->M_notifikasi->delpdf($idmerek);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>File PDF Berhasil Dihapus<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/editmerek/') . $idmerek);
	}

	// ========================================================================================== BENTUK KEMASAN
	public function addbk($idmerek){
		$this->form_validation->set_rules('ukurankemasan', 'ukuran kemasan', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Tambah Bentuk Kemasan',
					  'isi'  	   => 'notifikasi/addbk',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'bk'         => $this->M_notifikasi->getbkbyidmerek($idmerek)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array(),
					  'databk'     => $this->M_notifikasi->getdata('tbl_masterbk')->result_array()
					);
		$this->load->view('layout/wrapper',$data);
		}else{
			$data = array(
				'idmerek'       => $idmerek,
				'primer'        => $this->input->post('primer'),
				'sekunder'      => $this->input->post('sekunder'),
				'ukurankemasan' => $this->input->post('ukurankemasan'),
				'satuan'        => $this->input->post('satuan'),
			);
	
			$this->M_notifikasi->add($data,'tbl_bentukkemasan');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Bentuk Kemasan Berhasil Ditambahkan<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/addbk/') . $idmerek);
		}
	}

	public function editbk($idmerek, $idbk){
		$this->form_validation->set_rules('ukurankemasan', 'ukuran kemasan', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Edit Bentuk Kemasan',
					  'isi'  	   => 'notifikasi/editbk',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'edit'       => $this->M_notifikasi->getbkbyidbk($idmerek, $idbk)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array(),
					  'databk'     => $this->M_notifikasi->getdata('tbl_masterbk')->result_array()
					);
		$this->load->view('layout/wrapper',$data);
		}else{
			$data = array(
				// 'idmerek'       => $idmerek,
				'primer'        => $this->input->post('primer'),
				'sekunder'      => $this->input->post('sekunder'),
				'ukurankemasan' => $this->input->post('ukurankemasan'),
				'satuan'        => $this->input->post('satuan'),
			);
	
			$this->M_notifikasi->editbk($idmerek, $idbk, $data,'tbl_bentukkemasan');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Bentuk Kemasan Berhasil Diperbaharui<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/addbk/') . $idmerek);
		}
	}
	
	public function hapusbk($idmerek, $idbk){
		$this->M_notifikasi->hapusbk($idmerek, $idbk);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Bentuk Kemasan Berhasil Dihapus<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/addbk/') . $idmerek);
	}

	// ========================================================================================== KOMPOSISI
	public function addkomposisi($idmerek){
		// $this->form_validation->set_rules('namadagang', 'Nama Dagang', 'required');
		$this->form_validation->set_rules('inciname', 'INCI Name', 'required');
		$this->form_validation->set_rules('fungsi', 'Fungsi', 'required');
		$this->form_validation->set_rules('nocas', 'No. Cas', 'required');
		$this->form_validation->set_rules('konsentrasi', 'Konsentrasi (%)', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Add Komposisi',
					  'isi'  	   => 'notifikasi/addkomposisi',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'komposisi'  => $this->M_notifikasi->getkomposisi($idmerek)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
		}else{
			$data = array(
				'idmerek'         => $idmerek,
				'namadagang'      => $this->input->post('namadagang'),
				'inciname'        => $this->input->post('inciname'),
				'fungsi'          => $this->input->post('fungsi'),
				'nocas'           => $this->input->post('nocas'),
				'konsentrasi'     => floatval($this->input->post('konsentrasi')),
				'createdate'      => date('Y-m-d H:i:s'),
				'updatedate'      => date('Y-m-d H:i:s')
			);
	
			$this->M_notifikasi->add($data,'tbl_komposisi');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Komposisi Berhasil Ditambahkan<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/addkomposisi/') . $idmerek);
		}
	}

	public function importkomposisi($idmerek){
		if ( isset($_POST['import'])) {
			
            $file = $_FILES['csv']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan dicsv.
			$ekstensi  = explode('.', $_FILES['csv']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["csv"]["size"] > 0) {

					$i = 0;
					$handle = fopen($file, "r");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						
						// Data yang akan disimpan ke dalam database
						$data = [
							'idmerek'       => $idmerek,
							'namadagang' 	=> 	iconv('', 'UTF-8', $row[1]),
							'inciname' 		=> iconv('', 'UTF-8', $row[2]),
							'fungsi' 		=> $row[3],
							'nocas'			=> $row[4],
							'konsentrasi'	=> $row[5],
							'createdate'	=> date('Y-m-d H:i:s'),
							'updatedate'	=> date('Y-m-d H:i:s')
						];

						// Simpan data ke database.
						$this->M_notifikasi->add($data, 'tbl_komposisi');
					}

					fclose($handle);
					$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Komposisi Berhasil Ditambahkan<strong class="green"></strong></div>');
					redirect(base_url('fnp/notifikasi/addkomposisi/') . $idmerek);

				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
	}

	public function editkomposisi($idkomposisi, $idmerek){
		$this->form_validation->set_rules('namadagang', 'Nama Dagang', 'required');
		$this->form_validation->set_rules('inciname', 'INCI Name', 'required');
		$this->form_validation->set_rules('fungsi', 'Fungsi', 'required');
		$this->form_validation->set_rules('nocas', 'No. Cas', 'required');
		$this->form_validation->set_rules('konsentrasi', 'Konsentrasi (%)', 'required');

        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Edit Komposisi',
					  'isi'  	   => 'notifikasi/editkomposisi',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'getitem'    => $this->M_notifikasi->getitemkomposisi($idkomposisi)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
					);
		$this->load->view('layout/wrapper',$data);
		}else{
			$data = array(
				// 'idmerek'         => $idmerek,
				'namadagang'      => $this->input->post('namadagang'),
				'inciname'        => $this->input->post('inciname'),
				'fungsi'          => $this->input->post('fungsi'),
				'nocas'           => $this->input->post('nocas'),
				'konsentrasi'     => floatval($this->input->post('konsentrasi')),
				// 'createdate'      => date('Y-m-d H:i:s'),
				'updatedate'      => date('Y-m-d H:i:s')
			);

			$this->M_notifikasi->updatekomposisi($idkomposisi, $data, 'tbl_komposisi');
			$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Komposisi Berhasil Diperbaharui<strong class="green"></strong></div>');
			redirect(base_url('fnp/notifikasi/addkomposisi/') . $idmerek);
		}
	}

	public function hapuskomposisi($idkomposisi, $idmerek){
		$this->M_notifikasi->hapuskomposisi($idkomposisi);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Komposisi Berhasil Dihapus<strong class="green"></strong></div>');
		$this->M_notifikasi->getmerekbyid($idmerek)->result_array();
		redirect(base_url('fnp/notifikasi/addkomposisi/') . $idmerek);
	}

	public function delalldatakomp($idmerek){
		$this->M_notifikasi->hapuskomposisiall($idmerek);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Komposisi Berhasil Dihapus<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/addkomposisi/') . $idmerek);
	}

	// ========================================================================================== PROSEDUR
	public function addprosedur($idmerek){
		
		$this->form_validation->set_rules('prosedur', 'Prosedur Pembuatan', 'required');
	
        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Add Prosedur',
					  'isi'  	   => 'notifikasi/addprosedur',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'prosedur'   => $this->M_notifikasi->getprosedur($idmerek)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
		);
		$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			'idmerek'         => $idmerek,
			'prosedur'        => $this->input->post('prosedur'),
			'createdate'      => date('Y-m-d H:i:s'),
			'updatedate'      => date('Y-m-d H:i:s')
		);
		$this->M_notifikasi->add($data,'tbl_prosedur');

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Prosedur Pembuatan Berhasil Ditambahkan<strong class="green"></strong></div>');

		redirect(base_url('fnp/notifikasi/addprosedur/') . $idmerek);
		}
	}

	public function importprosedur($idmerek){
		if ( isset($_POST['import'])) {
			
            $file = $_FILES['csv']['tmp_name'];

			// Medapatkan ekstensi file csv yang akan dicsv.
			$ekstensi  = explode('.', $_FILES['csv']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				echo 'File tidak boleh kosong!';
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["csv"]["size"] > 0) {

					$i = 0;
					$handle = fopen($file, "r");
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;
						
						// Data yang akan disimpan ke dalam databse
						$data = [
							'idmerek'     => $idmerek,
							'prosedur'    => iconv('', 'UTF-8', $row[1]),
							'createdate'  => date('Y-m-d H:i:s'),
							'updatedate'  => date('Y-m-d H:i:s')
						];

						// Simpan data ke database.
						$this->M_notifikasi->add($data, 'tbl_prosedur');
					}

					fclose($handle);
					$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Prosedur Berhasil Ditambahkan<strong class="green"></strong></div>');
					redirect(base_url('fnp/notifikasi/addprosedur/') . $idmerek);

				} else {
					echo 'Format file tidak valid!';
				}
			}
        }
	}

	public function editprosedur($idprosedur, $idmerek){
		
		$this->form_validation->set_rules('prosedur', 'Prosedur Pembuatan', 'required');
	
        if($this->form_validation->run() == false)
        {
		$data = array('sub_judul'  => 'Notifikasi',
					  'sub_judul1' => 'Edit Prosedur',
					  'isi'  	   => 'notifikasi/editprosedur',
					  'merekbyid'  => $this->M_notifikasi->getmerekbyid($idmerek)->result_array(),
					  'getitem'    => $this->M_notifikasi->getitemprosedur($idprosedur)->result_array(),
					  'status_rnd' => $this->M_notifikasi->getmerekbystatusrnd()->result_array(),
					  'status_ra'  => $this->M_notifikasi->getmerekbystatusra()->result_array()
		);
		$this->load->view('layout/wrapper',$data);
		}else{
		$data = array(
			// 'idmerek'         => $idmerek,
			'prosedur'        => $this->input->post('prosedur'),
			// 'createdate'      => date('Y-m-d H:i:s'),
			'updatedate'      => date('Y-m-d H:i:s')
		);

		$this->M_notifikasi->updateprosedur($idprosedur, $data, 'tbl_prosedur');
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Prosedur Pembuatan Berhasil Diperbaharui<strong class="green"></strong></div>');

		redirect(base_url('fnp/notifikasi/addprosedur/') . $idmerek);
		}
	}

	public function hapusprosedur($idprosedur, $idmerek){
		$this->M_notifikasi->hapusprosedur($idprosedur);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Prosedur Berhasil Dihapus<strong class="green"></strong></div>');
		$this->M_notifikasi->getmerekbyid($idmerek)->result_array();
		redirect(base_url('fnp/notifikasi/addprosedur/') . $idmerek);
	}

	public function delallpro($idmerek){
		$this->M_notifikasi->delallpro($idmerek);
		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Prosedur Berhasil Dihapus<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/addprosedur/') . $idmerek);
	}


	// ========================================================================================== PRINT
	public function print($idmerek, $NIK1, $NIK2, $NIK3){
		$this->load->model('user/userlogin_model');
		$data = [
			'merek'      => $this->M_notifikasi->getmerekbyid($idmerek)->row_array(),
			'komposisi'  => $this->M_notifikasi->getkomposisi($idmerek)->result_array(),
			'prosedur'   => $this->M_notifikasi->getprosedur($idmerek)->result_array(),
			'bk'         => $this->M_notifikasi->getbkbyidmerek($idmerek)->result_array(),
			'approve1'     => $this->userlogin_model->karyawanbynik($NIK1),
			'approve2'     => $this->userlogin_model->karyawanbynik($NIK2),
			'approve3'     => $this->userlogin_model->karyawanbynik($NIK3)
		];
        $html = $this->load->view('notifikasi/print', $data);
	}


	// ========================================================================================== APPROVAL

	public function approve_ra($idmerek){

	$data = array(
		'status_approve_ra' => 1,
		'approve_ra_by'     => $this->session->userdata('NIK'),
		'approve_ra_at'     => date('Y-m-d H:i:s'),
	);
	$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');

	$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Disetujui<strong class="green"></strong></div>');
	redirect(base_url('fnp/notifikasi/'));
	}

	public function approve_rnd($idmerek){

		$data = array(
			'status_approve_rnd' => 1,
			'approve_rnd_by'     => $this->session->userdata('NIK'),
			'approve_rnd_at'     => date('Y-m-d H:i:s'),
		);
		$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Berhasil Disetujui<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/'));
	}

	public function unapprove_rnd($idmerek){
		$data = array(
			'status_approve_rnd' => 0,
			'approve_rnd_by'     => NULL,
			'approve_rnd_at'     => NULL,
		);
		$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Batal Disetujui<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/'));
	}

	public function unapprove_ra($idmerek){
		$data = array(
			'status_approve_ra' => 0,
			'approve_ra_by'     => NULL,
			'approve_ra_at'     => NULL,
		);
		$this->M_notifikasi->updatemerek($idmerek, $data, 'tbl_merek');

		$this->session->set_flashdata('message','<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>Data Merek Batal Disetujui<strong class="green"></strong></div>');
		redirect(base_url('fnp/notifikasi/'));
	}


}
