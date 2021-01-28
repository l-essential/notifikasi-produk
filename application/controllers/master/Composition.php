<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Composition extends CI_Controller {
    public $ad_org_id = "72438C4012C5442184AD62DD2EB53309";
    public $ad_org_id_holding = "5AB445334C5A49CF8025E663E25935EB";
    public $ob;
	//load database
	public function __construct(){ 
        parent::__construct();
        $this->load->model('master/M_Produk');
        $this->load->model('master/M_Komposisi_Produk');
        $this->load->model('master/M_Data_Produk');
        $this->id_group = $this->session->userdata('id_group');
        $this->ob = $this->load->database('ob', TRUE);
	}
	//Cek Hak Akses Submodule
	public function check($submodule,$crud)
	{
		$this->load->model('user/role_model');
		$t = $this->role_model->get_row(array('tbl_role.id_group'     =>$this->id_group, 
											  'tbl_submodule.url_sub' =>$submodule));		
		if($t->$crud==1) {
		base_url('master/composition');
	}else{
	redirect(base_url('dashboard/eror'));
	exit();
	  }											  				
	}
	//List submodule & Tambah submodule
	public function index(){
        //cek Hak Akses submodule
        $produk = $this->M_Produk->tbl_produk('t_prod')
                        ->select("(
                            SELECT COUNT(t_kom.id_produk) FROM ". $this->M_Produk->tbl_komposisi ." as t_kom
                        where 
                            t_kom.id_produk =t_prod.id_produk                        
                        ) AS total_produk
                        ")
                        ->select("t_prod.*")
                        // ->where("delete_by", null)
                        ->get()
                        ->result();

		$this->check('composition','r');
		$data = array('sub_judul'  => 'Master Composition',					  
                      'sub_judul1' => 'List',
                      'produk'     => $produk,
					  'isi'  	   => 'master/composition/list');
		
		$this->load->view('layout/wrapper',$data);
	}
	public function tambah_bahan($id_produk){
        $this->check('composition','c');
        $i = $this->input;
        $produk = $this->M_Produk->table_produk_detail($id_produk);
        $data = array('sub_judul'  => 'Add Master Composition',					  
                        'sub_judul1' => 'List',
                        'produk'      => $produk,
                        'isi'  	   => 'master/composition/tambah_bahan');
        
        $this->load->view('layout/wrapper',$data);
	}
	public function tambah(){
        $i = $this->input;
        $valid = $this->form_validation->set_rules('nama_produk', 'Produk Name', 'trim|required');
        if($valid->run() == false)
        {
            $this->check('composition','c');
            $data = array('sub_judul'  => 'Add Master Composition',					  
                          'sub_judul1' => 'List',
                          'isi'  	   => 'master/composition/tambah');
            
            $this->load->view('layout/wrapper',$data);
        }else{
            $data = array(
                'nama_produk' => $i->post('nama_produk'),
                'kode_produk' => $i->post('kode_produk'),
                'no_mc'       => $i->post('no_mc'),
                'batch_size'  => $i->post('batch_size'),
                'create_by'     => $this->session->userdata('username'),
                'create_date'   => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_produk', $data);
            $this->session->set_flashdata('sukses','Data berhasil ditambah');
            redirect(base_url('master/composition'));

        }
    }
    public function delete_produk($id_produk)
    {
        $this->check('composition','d');
        $this->M_Produk->delete_pro($id_produk);
        $this->session->set_flashdata('sukses','Data berhasil dihapus');
        redirect(base_url('master/composition'));
    }
    public function update($id_produk)
    {
        $this->check('composition', 'u');
        $i= $this->input;
        $data = array(
            'batch_size'  => $i->post('batch_size'),
            'update_by'   => $this->session->userdata('username'),
            'update_date' => date('Y-m-d H:i:s')
        );
        $this->M_Produk->update($data, $id_produk);
        $this->session->set_flashdata('sukses','Data berhasil diupdate');
        redirect(base_url('master/composition/tambah_bahan/'.$id_produk));
    }
    
    public function ajax_bahan($id_produk)
    {
        $data = array('bahan'  => $this->M_Produk->table_bahan_detail($id_produk),
					  'id_produk'  => $id_produk);
		$this->load->view('master/composition/1_bahan',$data);
    }
    public function ajax_mesin($id_produk)
    {
		$data = array('mesin'  => $this->M_Produk->table_mesin_detail($id_produk),
					  'id_produk'  => $id_produk);
		$this->load->view('master/composition/1_mesin',$data);
    }
    public function ajax_get_data()
    {
        $q = trim(strtoupper($this->input->post('q')));

        $no_order = $this->M_Data_Produk->table_prod()
                                ->where("ISACTIVE", "Y")
                                ->where_in('AD_ORG_ID', [$this->ad_org_id, $this->ad_org_id_holding])
                                ->like('UPPER(TRIM(NAME))', $q)
                                ->or_like('UPPER(TRIM(VALUE))', $q)
                                ->limit(3)
                                ->order_by("NAME")
                                ->get()
                                ->result();
        echo json_encode($no_order);
        exit;
    }
    public function ajax_get_detail()
    {
        $id = $this->input->post('id');

        $document_no   = $this->M_Data_Produk->table_prod()
                                ->select("VALUE, NAME, M_PRODUCT_ID")
                                ->where("ISACTIVE", "Y")
                                ->where_in('AD_ORG_ID', [$this->ad_org_id, $this->ad_org_id_holding])
                                ->where('VALUE', $id)
                                ->get()
                                ->row();  
        $prod = [];
        if(!empty($document_no))
        {
            $prod = 
                    $this->M_Data_Produk->table_prod('t_produk')
                    ->select("*")
                    ->where("VALUE", $document_no->VALUE)
                    ->get()
                    ->row();
        }

        $subtitusi = [];
        if(!empty($document_no))
        {
            $subtitusi = $this->M_Data_Produk->table_subt("t_sub")
                        ->select("t_sub.SUBSTITUTE_ID, t_sub.M_PRODUCT_ID, M_PRODUCT.NAME, M_PRODUCT.VALUE")
                        ->join("M_PRODUCT", "M_PRODUCT.M_PRODUCT_ID=t_sub.SUBSTITUTE_ID", "LEFT")
                        ->where_in("t_sub.M_PRODUCT_ID", $document_no->M_PRODUCT_ID)
                        ->get()
                        ->result();
        }

        echo json_encode([
            'prod'  => $prod,
            'subtitusi' => $subtitusi
        ]);
        exit;
    }
    public function simpan_ajax_bahan()
    {
        $id_produk = $this->input->post('id_produk');
        $valid = $this->form_validation->set_rules('persen', 'Persentase', 'trim|required')
                                        ->set_rules('kode_bahan', 'Kode Bahan', 'trim|required')
                                        ->set_rules('persen','Persentase',"trim|required|greater_than_equal_to[0]|less_than_equal_to[100]");
        if($valid->run() == false){
            $this->ajax_bahan($id_produk);
        }else{
            if($this->input->post('id_komposisi_produk') != ''){
                $id_komposisi_produk	   =$this->input->post('id_komposisi_produk');
            }else{
                $id_komposisi_produk    ="";
            }
            $data = array(
                        'id_produk'         => $id_produk,
                        'nama_bahan'        => $this->input->post('nama_bahan'),
                        'kode_bahan'        => $this->input->post('kode_bahan'),
                        'no_standar_bahan'  => $this->input->post('no_standar_bahan'),
                        'persen'            => $this->input->post('persen'),
                        'create_by'         => $this->session->userdata('username'),
                        'create_date'       => date('Y-m-d H:i:s')
                    );
            $this->M_Produk->simpan_ajax_bahan($data,$id_komposisi_produk);
            
        }
        // $this->ajax_bahan($id_produk);
    }
    public function simpan_ajax_mesin()
    {
        $id_produk = $this->input->post('id_produk');
        if($this->input->post('id_mesin') != ''){
            $id_mesin	=$this->input->post('id_mesin');
        }else{
            $id_mesin    ="";
        }
        $data = array(
                    'id_produk'         => $id_produk,
                    'kode_mesin'        => $this->input->post('kode_mesin'),
                    'nama_mesin'        => $this->input->post('nama_mesin'),
                    'jam_mesin'         => $this->input->post('jam_mesin'),
                    'jam_orang'         => $this->input->post('jam_orang'),
                    'create_by'         => $this->session->userdata('username'),
                    'create_date'       => date('Y-m-d H:i:s')
                );
        $this->M_Produk->simpan_ajax_mesin($data,$id_mesin);
        $this->ajax_mesin($id_produk);
    }

    public function hapus_ajax_bahan()
    {
        $id_komposisi_produk = $this->input->post('id');
        $this->M_Produk->delete_bahan($id_komposisi_produk);
    }

    public function hapus_ajax_mesin()
    {
        $id_mesin = $this->input->post('id');
        $this->M_Produk->delete_mesin($id_mesin);
    }
    
    public function ajax_detail_all()
    {
        $id = trim($this->input->get('id'));
        $header = $this->M_Produk->tbl_produk()
                    ->where('id_produk', $id)
                    ->get()
                    ->row();
        $nama = [];
        if(!empty($header))
        {
            $nama = $this->M_Produk->tbl_produk()
                            ->where('id_produk', $header->id_produk)
                            ->get()
                            ->row();
        }

        $bahan = [];
        if(!empty($header))
        {
            $bahan = $this->M_Produk->table_bahan_detail($header->id_produk);
        }

        $mesin = [];
        if(!empty($header))
        {
            $mesin = $this->M_Produk->table_mesin_detail($header->id_produk);
        }
        echo json_encode(array
            (
                'nama' => $nama,
                'bahan' => $bahan,
                'mesin' => $mesin
            )
        );
        return;
    }
    public function print_data($id)
    {
        $produk = $this->M_Produk->tbl_produk('t_head')
                    ->where('id_produk', $id)
                    ->get()
                    ->row();
        $bahan = $this->M_Produk->table_bahan_detail($id);
        $mesin = $this->M_Produk->table_mesin_detail($id);
        $data = array('produk' => $produk,
                    'bahan' => $bahan,
                    'mesin' => $mesin);
        $this->load->view('master/composition/print_komposisi', $data);
    }
    public function tes()
    {
        $id = trim(strtoupper($this->input->post('q')));
		if(!empty($id)){
            $query = $this->M_Data_Produk->table_prod("t_head")
                ->select("t_head.VALUE, t_head.NAME, M_PRODUCT_ID")
                ->where("t_head.ISACTIVE", "Y")
                ->where_in("t_head.AD_ORG_ID", [$this->ad_org_id, $this->ad_org_id_holding])
                ->like('UPPER(TRIM(NAME))',$id)
                ->or_like('UPPER(TRIM(VALUE))', $id)
                ->limit('5')
                ->order_by("t_head.NAME")
                ->get()
                ->result();
        }
        
        $return = [];
        foreach ($query as $key => $value) 
        {
            $return[] = [
                "id"    => $value->VALUE,
                "text" => $value->VALUE.' - '.$value->NAME,
            ];
        }
        echo json_encode($return);
        return;
    }
    public function unduh_file_import()
    {
        $this->load->helper("download");
        force_download(APPPATH . trim("\\files\import_produk.csv"), NULL);
    }
    public function unduh_file_import_bahan()
    {
        $this->load->helper("download");
        force_download(APPPATH . trim("\\files\import_bahan.csv"), NULL);
    }
    public function check_import()
    {
        #If file not uploaded
        if(empty($_FILES['file_url']['name']) === true) {
            echo json_encode(array("success" => false, "message" => "File upload wajib diisi"));
            return;
        }

        // valid: .csv
        $extension = pathinfo($_FILES['file_url']['name'], PATHINFO_EXTENSION);

        if($extension != 'csv'){
            echo json_encode(array("success" => false, "message" => "File upload wajib ber-format csv"));
            return;
        }

        #object
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();

        // file path
        $spreadsheet = $reader->load($_FILES['file_url']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
            'nama_produk',
            'kode_produk',
            'no_mc',
            'batch_size'
        );
        $makeArray = array(
            'nama_produk' => 'nama_produk',
            'kode_produk' => 'kode_produk',
            'no_mc' => 'no_mc',
            'batch_size' => 'batch_size'
        );
        
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
                $value = preg_replace('/\s+/', '', $value);
                $SheetDataKey[trim($value)] = $key;
            }
          }
        }

        #valid: kolom harus sama
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);
        if( !empty($dataDiff) ){
          echo json_encode(array("success" => false, "message" => "Kolom pada file csv tidak sesuai"));
          return;
            }

            if( $arrayCount == 1 ){
                echo json_encode(array("success" => false, "message" => "Tidak ada data yang bisa diimport"));
          return;
            }
            
            $status_valid = True;
            $fetchData = Array();
            
            for ($i = 2; $i <= $arrayCount; $i++)
        {
          $row_data = Array();

                $nama_produk = $SheetDataKey['nama_produk'];
                $nama_produk = filter_var(strtoupper(trim($allDataInSheet[$i][$nama_produk])), FILTER_SANITIZE_STRING);

                $kode_produk = $SheetDataKey['kode_produk'];
                $kode_produk = filter_var(strtoupper(trim($allDataInSheet[$i][$kode_produk])), FILTER_SANITIZE_STRING);

                $no_mc = $SheetDataKey['no_mc'];
                $no_mc = filter_var(strtoupper(trim($allDataInSheet[$i][$no_mc])), FILTER_SANITIZE_STRING);

                $batch_size = $SheetDataKey['batch_size'];
                $batch_size = filter_var(strtoupper(trim($allDataInSheet[$i][$batch_size])), FILTER_SANITIZE_STRING);
                
                # valid: nama_produk
                $row_data['nama_produk'] = $nama_produk;
                if(empty($nama_produk))
                {
                    $status_valid = False;
                    $row_data['nama_produk_status'] = False;
                    $row_data['nama_produk_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($nama_produk) < 5)
                {
                    $status_valid = False;
                    $row_data['nama_produk_status'] = False;
                    $row_data['nama_produk_message'] = "Kolom ini minimal 5 karakter";
                }

                # valid: kode_produk
                $row_data['kode_produk'] = $kode_produk;
                if(empty($kode_produk))
                {
                    $status_valid = False;
                    $row_data['kode_produk_status'] = False;
                    $row_data['kode_produk_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($kode_produk) < 4)
                {
                    $status_valid = False;
                    $row_data['kode_produk_status'] = False;
                    $row_data['kode_produk_message'] = "Kolom ini minimal 4 karakter";
                }
                // else{
                //     $data_kode_produk = $this->db->from('tbl_produk')
                //                     ->where('LOWER(kode_produk)', trim(strtolower($kode_produk)))
                //                     ->get()
                //                     ->row();

                //     if(!empty($data_kode_produk)){
                //         $status_valid = False;
                //         $row_data['kode_produk_status'] = False;
                //         $row_data['kode_produk_message'] = "Kode Produk ini ini sudah ada";
                //     }
                // }
                
                # valid: no_mc
                $row_data['no_mc'] = $no_mc;
                if(empty($no_mc))
                {
                    $status_valid = False;
                    $row_data['no_mc_status'] = False;
                    $row_data['no_mc_message'] = "Kolom ini wajib diisi";
                }
                // elseif(strlen($no_mc) < 3)
                // {
                //     $status_valid = False;
                //     $row_data['no_mc_status'] = False;
                //     $row_data['no_mc_message'] = "Kolom ini minimal 3 karakter";
                // }

                # kolom batch_size
                $row_data['batch_size'] = $batch_size;
                if(empty($batch_size))
                {
                    $status_valid = False;
                    $row_data['batch_size_status'] = False;
                    $row_data['batch_size_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($batch_size) < 1)
                {
                    $status_valid = False;
                    $row_data['batch_size_status'] = False;
                    $row_data['batch_size_message'] = "Kolom ini minimal 1 karakter";
                }

                $fetchData[] = $row_data;
            }


        if($status_valid === false){
          $message = "Terdapat beberapa kesalahan pada kolom yang bewarna merah";
        }else{
          $message = "";
        }

        echo json_encode(array("success" => $status_valid, "datas" => $fetchData, "message" => $message));
        return;
    }
    public function import_produk()
    {
        // If file not uploaded
        if(empty($_FILES['file_url']['name']) === true) {

            $this->session->set_flashdata('error','File csv wajib diupload');
            redirect(base_url('master/composition'));
            return;
        }
    
        // valid: .csv
        $extension = pathinfo($_FILES['file_url']['name'], PATHINFO_EXTENSION);

        if($extension != 'csv'){
            $this->session->set_flashdata('error','File wajib berformat .csv');
            redirect(base_url('master/composition'));
            return;
        }
    
        // object
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    
        // file path
        $spreadsheet = $reader->load($_FILES['file_url']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
            'nama_produk',
            'kode_produk',
            'no_mc',
            'batch_size'
        );
        $makeArray = array(
            'nama_produk' => 'nama_produk',
            'kode_produk' => 'kode_produk',
            'no_mc' => 'no_mc',
            'batch_size' => 'batch_size'
        );
    
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
            foreach ($dataInSheet as $key => $value) {
                if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                }
            }
        }
    
            # valid: kolom harus sama
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if( !empty($dataDiff) ){
                $this->session->set_flashdata('error','Kolom pada file sesuai');
                redirect(base_url('master/composition'));
                return;
            }
            
            $status_valid = True;
            $fetchData = Array();
            
            for ($i = 2; $i <= $arrayCount; $i++)
            {
                $row_data = Array();
                $nama_produk = $SheetDataKey['nama_produk'];
                $nama_produk = filter_var(strtoupper(trim($allDataInSheet[$i][$nama_produk])), FILTER_SANITIZE_STRING);

                $kode_produk = $SheetDataKey['kode_produk'];
                $kode_produk = filter_var(strtoupper(trim($allDataInSheet[$i][$kode_produk])), FILTER_SANITIZE_STRING);

                $no_mc = $SheetDataKey['no_mc'];
                $no_mc = filter_var(strtoupper(trim($allDataInSheet[$i][$no_mc])), FILTER_SANITIZE_STRING);

                $batch_size = $SheetDataKey['batch_size'];
                $batch_size = filter_var(strtoupper(trim($allDataInSheet[$i][$batch_size])), FILTER_SANITIZE_STRING);
                
                $row_data['nama_produk'] = $nama_produk;
                if(empty($nama_produk))
                {
                    $status_valid = False;
                    $row_data['nama_produk_status'] = False;
                    $row_data['nama_produk_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($nama_produk) < 5)
                {
                    $status_valid = False;
                    $row_data['nama_produk_status'] = False;
                    $row_data['nama_produk_message'] = "Kolom ini minimal 5 karakter";
                }

                # valid: kode_produk
                $row_data['kode_produk'] = $kode_produk;
                if(empty($kode_produk))
                {
                    $status_valid = False;
                    $row_data['kode_produk_status'] = False;
                    $row_data['kode_produk_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($kode_produk) < 4)
                {
                    $status_valid = False;
                    $row_data['kode_produk_status'] = False;
                    $row_data['kode_produk_message'] = "Kolom ini minimal 4 karakter";
                }
                // else{
                //     $data_kode_produk = $this->db->from('tbl_produk')
                //                     ->where('LOWER(kode_produk)', trim(strtolower($kode_produk)))
                //                     ->get()
                //                     ->row();

                //     if(!empty($data_kode_produk)){
                //         $status_valid = False;
                //         $row_data['kode_produk_status'] = False;
                //         $row_data['kode_produk_message'] = "Kode Produk ini ini sudah ada";
                //     }
                // }
                
                # valid: no_mc
                $row_data['no_mc'] = $no_mc;
                if(empty($no_mc))
                {
                    $status_valid = False;
                    $row_data['no_mc_status'] = False;
                    $row_data['no_mc_message'] = "Kolom ini wajib diisi";
                }
                // elseif(strlen($no_mc) < 3)
                // {
                //     $status_valid = False;
                //     $row_data['no_mc_status'] = False;
                //     $row_data['no_mc_message'] = "Kolom ini minimal 3 karakter";
                // }

                # kolom batch_size
                $row_data['batch_size'] = $batch_size;
                if(empty($batch_size))
                {
                    $status_valid = False;
                    $row_data['batch_size_status'] = False;
                    $row_data['batch_size_message'] = "Kolom ini wajib diisi";
                }
                elseif(strlen($batch_size) < 1)
                {
                    $status_valid = False;
                    $row_data['batch_size_status'] = False;
                    $row_data['batch_size_message'] = "Kolom ini minimal 1 karakter";
                }
                
    
                $fetchData[] = $row_data;
            }
    
            if(!empty($fetchData))
            {
                $this->db->insert_batch('tbl_produk', $fetchData);
            }

            $this->session->set_flashdata('sukses','Data berhasil diimport');
            redirect(base_url('master/composition'));
    }
    public function import_bahan()
    {
        // If file not uploaded
        if(empty($_FILES['file_url_bahan']['name']) === true) {

            $this->session->set_flashdata('error','File csv wajib diupload');
            redirect(base_url('master/composition'));
            return;
        }
    
        // valid: .csv
        $extension = pathinfo($_FILES['file_url_bahan']['name'], PATHINFO_EXTENSION);

        if($extension != 'csv'){
            $this->session->set_flashdata('error','File wajib berformat .csv');
            redirect(base_url('master/composition'));
            return;
        }
    
        // object
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    
        // file path
        $spreadsheet = $reader->load($_FILES['file_url_bahan']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $allDataInSheet_mesin = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
        // array Count
        $arrayCount = count($allDataInSheet);
        $arrayCount_mesin = count($allDataInSheet_mesin);
        $flag = 0;
        $createArray = array(
            'id_produk',
            'kode_bahan',
            'no_standar_bahan',
            'nama_bahan',
            'persen'
        );
        $makeArray = array(
            'id_produk' => $this->input->post('id_produk'),
            'kode_bahan' => 'kode_bahan',
            'no_standar_bahan' => 'no_standar_bahan',
            'nama_bahan' => 'nama_bahan',
            'persen' => 'persen'
        );
        $createArray_mesin = array(
            'id_produk',
            'kode_mesin',
            'nama_mesin',
            'jam_mesin',
            'jam_orang'
        );
        $makeArray_mesin = array(
            'id_produk' => 'id_produk',
            'kode_mesin' => 'kode_mesin',
            'nama_mesin' => 'nama_mesin',
            'jam_mesin' => 'jam_mesin',
            'jam_orang' => 'jam_orang'
        );
        // var_dump($makeArray);exit;
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
            foreach ($dataInSheet as $key => $value) {
                if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                }
            }
        }
        $SheetDataKey_mesin = array();
        foreach ($allDataInSheet_mesin as $dataInSheet) {
            foreach ($dataInSheet as $key => $value) {
                if (in_array(trim($value), $createArray_mesin)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey_mesin[trim($value)] = $key;
                }
            }
        }
    
            # valid: kolom harus sama
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if( !empty($dataDiff) ){
                $this->session->set_flashdata('error','Kolom pada file tidak sesuai');
                redirect(base_url('master/composition'));
                return;
            }
            
            $status_valid = True;
            $fetchData = Array();
            $fetchData_mesin = Array();
            
            for ($j=2; $j < $arrayCount_mesin; $j++) { 

                $row_data_mesin = Array();
                  
                $id_produk_mesin = $SheetDataKey_mesin['id_produk'];
                $id_produk_mesin = filter_var(trim($allDataInSheet_mesin[$j][$id_produk_mesin]), FILTER_SANITIZE_STRING);
                
                $kode_mesin = $SheetDataKey_mesin['kode_mesin'];
                $kode_mesin = filter_var(trim($allDataInSheet_mesin[$j][$kode_mesin]), FILTER_SANITIZE_STRING);
                
                $nama_mesin = $SheetDataKey_mesin['nama_mesin'];
                $nama_mesin = filter_var(strtoupper(trim($allDataInSheet_mesin[$j][$nama_mesin])), FILTER_SANITIZE_STRING);

                $jam_mesin = $SheetDataKey_mesin['jam_mesin'];
                $jam_mesin = filter_var(trim($allDataInSheet_mesin[$j][$jam_mesin]), FILTER_SANITIZE_STRING);

                $jam_orang = $SheetDataKey_mesin['jam_orang'];
                $jam_orang = filter_var(trim($allDataInSheet_mesin[$j][$jam_orang]), FILTER_SANITIZE_STRING);
                

                if(!empty($_POST['id_produk']))
                {
                    $id_produk_2 = $_POST['id_produk'];
                }
                if(!empty($id_produk_mesin)){
                    $id_produk_2 = $id_produk_mesin;
                }
                $row_data_mesin['id_produk'] = $id_produk_2;
                $row_data_mesin['kode_mesin'] = $kode_mesin;
                $row_data_mesin['nama_mesin'] = $nama_mesin;
                $row_data_mesin['jam_mesin'] = $jam_mesin;
                $row_data_mesin['jam_orang'] = $jam_orang;
                $fetchData_mesin[] = $row_data_mesin;
            }
            for ($i = 2; $i <= $arrayCount; $i++)
            {
                $row_data = Array();
                $id_produk = $SheetDataKey['id_produk'];
                $id_produk = filter_var(strtoupper(trim($allDataInSheet[$i][$id_produk])), FILTER_SANITIZE_STRING);

                $kode_bahan = $SheetDataKey['kode_bahan'];
                $kode_bahan = filter_var(strtoupper(trim($allDataInSheet[$i][$kode_bahan])), FILTER_SANITIZE_STRING);

                $no_standar_bahan = $SheetDataKey['no_standar_bahan'];
                $no_standar_bahan = filter_var(trim($allDataInSheet[$i][$no_standar_bahan]), FILTER_SANITIZE_STRING);

                $nama_bahan = $SheetDataKey['nama_bahan'];
                $nama_bahan = filter_var(trim($allDataInSheet[$i][$nama_bahan]), FILTER_SANITIZE_STRING);

                $persen = $SheetDataKey['persen'];
                $persen = filter_var(trim($allDataInSheet[$i][$persen]), FILTER_SANITIZE_STRING);
                # valid: kode_bahan
                if(!empty($_POST['id_produk']))
                {
                    $id_produk_1 = $_POST['id_produk'];
                }
                if(!empty($id_produk)){
                    $id_produk_1 = $id_produk;
                }
                $row_data['id_produk'] = $id_produk_1;
                # valid: kode_bahan
                $row_data['kode_bahan'] = $kode_bahan;
                # valid: kode_bahan
                $row_data['no_standar_bahan'] = $no_standar_bahan;

                # valid: kode_produk
                $row_data['nama_bahan'] = $nama_bahan;
                
                # valid: persen
                $row_data['persen'] = $persen;
                $fetchData[] = $row_data;

            }
    
            if(!empty($fetchData) && !empty($fetchData_mesin))
            {
                $this->db->insert_batch('tbl_komposisi_produk', $fetchData);
                $this->db->insert_batch('tbl_mesin', $fetchData_mesin);
            }
            // if(!empty($fetchData_mesin))
            // {
            // }

            $this->session->set_flashdata('sukses','Data berhasil diimport');
            redirect(base_url('master/composition'));
    }
    public function check_import_bahan()
    {
        #If file not uploaded
        if(empty($_FILES['file_url_bahan']['name']) === true) {
            echo json_encode(array("success" => false, "message" => "File upload wajib diisi"));
            return;
        }

        // valid: .csv
        $extension = pathinfo($_FILES['file_url_bahan']['name'], PATHINFO_EXTENSION);

        if($extension != 'csv'){
            echo json_encode(array("success" => false, "message" => "File upload wajib ber-format csv"));
            return;
        }

        #object
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();

        // file path
        $spreadsheet = $reader->load($_FILES['file_url_bahan']['tmp_name']);
        $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // array Count
        $arrayCount = count($allDataInSheet);
        $flag = 0;
        $createArray = array(
            'id_produk',
            'kode_bahan',
            'no_standar_bahan',
            'nama_bahan',
            'persen',
            'kode_mesin',
            'nama_mesin',
            'jam_mesin',
            'jam_orang'
        );
        $makeArray = array(
            'id_produk' => 'id_produk',
            'kode_bahan' => 'kode_bahan',
            'no_standar_bahan' => 'no_standar_bahan',
            'nama_bahan' => 'nama_bahan',
            'persen' => 'persen',
            'kode_mesin' => 'kode_mesin',
            'nama_mesin' => 'nama_mesin',
            'jam_mesin' => 'jam_mesin',
            'jam_orang' => 'jam_orang'
        );
        $SheetDataKey = array();
        foreach ($allDataInSheet as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArray)) {
                $value = preg_replace('/\s+/', '', $value);
                $SheetDataKey[trim($value)] = $key;
            }
          }
        }

        #valid: kolom harus sama
        $dataDiff = array_diff_key($makeArray, $SheetDataKey);
        if( !empty($dataDiff) ){
          echo json_encode(array("success" => false, "message" => "Kolom pada file csv tidak sesuai"));
          return;
            }

            if( $arrayCount == 1 ){
                echo json_encode(array("success" => false, "message" => "Tidak ada data yang bisa diimport"));
          return;
            }
            
            $status_valid = True;
            $fetchData = Array();
            
            for ($i = 2; $i <= $arrayCount; $i++)
        {
          $row_data = Array();

                $id_produk = $SheetDataKey['id_produk'];
                $id_produk = filter_var(trim($allDataInSheet[$i][$id_produk]), FILTER_SANITIZE_STRING);

                $kode_bahan = $SheetDataKey['kode_bahan'];
                $kode_bahan = filter_var(strtoupper(trim($allDataInSheet[$i][$kode_bahan])), FILTER_SANITIZE_STRING);

                $no_standar_bahan = $SheetDataKey['no_standar_bahan'];
                $no_standar_bahan = filter_var(trim($allDataInSheet[$i][$no_standar_bahan]), FILTER_SANITIZE_STRING);

                $nama_bahan = $SheetDataKey['nama_bahan'];
                $nama_bahan = filter_var(trim($allDataInSheet[$i][$nama_bahan]), FILTER_SANITIZE_STRING);

                $persen = $SheetDataKey['persen'];
                $persen = filter_var(strtoupper(trim($allDataInSheet[$i][$persen])), FILTER_SANITIZE_STRING);

                $kode_mesin = $SheetDataKey['kode_mesin'];
                $kode_mesin = filter_var(strtoupper(trim($allDataInSheet[$i][$kode_mesin])), FILTER_SANITIZE_STRING);

                $nama_mesin = $SheetDataKey['nama_mesin'];
                $nama_mesin = filter_var(strtoupper(trim($allDataInSheet[$i][$nama_mesin])), FILTER_SANITIZE_STRING);

                $jam_mesin = $SheetDataKey['jam_mesin'];
                $jam_mesin = filter_var(strtoupper(trim($allDataInSheet[$i][$jam_mesin])), FILTER_SANITIZE_STRING);

                $jam_orang = $SheetDataKey['jam_orang'];
                $jam_orang = filter_var(strtoupper(trim($allDataInSheet[$i][$jam_orang])), FILTER_SANITIZE_STRING);
                
                # valid: kode_bahan
                if(!empty($_POST['id_produk']))
                {
                    $id_produk_2 = $_POST['id_produk'];
                }elseif(!empty($id_produk)){
                    $id_produk_2 = $id_produk;
                }

                $row_data['id_produk'] = $id_produk_2;
                # valid: kode_bahan
                $row_data['kode_bahan'] = $kode_bahan;
                
                # valid: kode_bahan
                $row_data['no_standar_bahan'] = $no_standar_bahan;

                # valid: kode_produk
                $row_data['nama_bahan'] = $nama_bahan;
                
                # valid: persen
                $row_data['persen'] = $persen;
                $row_data['kode_mesin'] = $kode_mesin;
                $row_data['nama_mesin'] = $nama_mesin;
                $row_data['jam_mesin'] = $jam_mesin;
                $row_data['jam_orang'] = $jam_orang;
                $fetchData[] = $row_data;
            }


        if($status_valid === false){
          $message = "Terdapat beberapa kesalahan pada kolom yang bewarna merah";
        }else{
          $message = "";
        }

        echo json_encode(array("success" => $status_valid, "datas" => $fetchData, "message" => $message));
        return;
    }
}
