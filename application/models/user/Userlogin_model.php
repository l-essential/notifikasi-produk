<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userlogin_model extends CI_Model {

    private $db2;

        public function __construct()
        {
            $this->load->database();
            $this->db2 = $this->load->database('eztna', TRUE);
        }
        public function listing()
        {
            $query = $this->db->query("SELECT a.*, b.namaKaryawan,c.kode_organisasi, d.nama_organisasi, e.namaDivisi, f.namaDepartment, h.namaSeksi, i.nama_group
             FROM tbl_login as a 
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.MS_Karyawan as b on a.NIK = b.NIK
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.tbl_detail_karyawan as c on a.NIK = c.NIK
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.tbl_organisasi as d on c.kode_organisasi = d.kode_organisasi
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.MS_Divisi as e on b.kodeDivisi = e.kodeDivisi
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.MS_Department as f on b.kodeDepartment = f.kodeDepartment
             LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.MS_Seksi as h on b.KodeSeksi = h.KodeSeksi
             LEFT JOIN tbl_group as i on a.id_group = i.id_group
             ");            
            
            return $query->result();
        }
        
        public function listing_karyawan()
        {
            $query = $this->db->query("SELECT * FROM [192.168.200.2].[EZ-TNA].dbo.MS_Karyawan where tglPengunduranDiri is NULL");            
            return $query->result();
        }
        public function listing_dept()
        {
            $query = $this->db->query("SELECT * FROM [192.168.200.2].[EZ-TNA].dbo.MS_Seksi where KodeSeksi != '_mgr_'");            
            return $query->result();
        }
        public function detail($id_login)
        {
            $query = $this->db->query("SELECT a.* FROM tbl_login as a LEFT JOIN [192.168.200.2].[EZ-TNA].dbo.MS_Karyawan as b on a.NIK = b.NIK where id_login=$id_login");            
            return $query->row();
        }
        public function tambah($data)
        {
            $this->db->insert('tbl_login',$data);
            return $this->db->insert_id();            
        }
        public function edit($data,$id_login)
        {
            $this->db->where('id_login',$id_login);
            $this->db->update('tbl_login',$data);
        }
        public function hapus($data){
            $this->db->where('id_login',$data['id_login']);
            $this->db->delete('tbl_login',$data);
        }
        public function cek_group($id_group){
            $this->db->select('tbl_login.id_group');
            $this->db->from('tbl_login');
            $this->db->join('tbl_group', 'tbl_login.id_group = tbl_group.id_group', 'LEFT');
            $this->db->where('tbl_login.id_group',$id_group);
            $query = $this->db->get();
            return $query->row();
        }
        public function cek_karyawan($id_karyawan){
            $this->db->select('tbl_login.*,tbl_login.id_karyawan');
            $this->db->from('tbl_login');
            $this->db->join('tbl_master_karyawan','tbl_login.id_karyawan = tbl_master_karyawan.id_karyawan');
            $this->db->where('tbl_login.id_karyawan',$id_karyawan);
            $query = $this->db->get();
            return $query->num_rows();
        }
        public function karyawan_detail($NIK){
        $query = $this->db2->get_where('tbl_detail_karyawan',array('NIK' => $NIK));
        return $query->row();
    }
    }       