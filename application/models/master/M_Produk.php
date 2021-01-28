<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model
{

  public $table = 'tbl_produk';
  public $tbl_komposisi = 'tbl_komposisi_produk';
  public $tbl_mesin = 'tbl_mesin';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function delete_produk($data2){
    $this->db->where('id_produk',$data2['id_produk']);
    $this->db->delete('tbl_produk');
}
  public function tbl_produk($as = '')
  {
      $table = !empty($as) ? $this->table . " $as" : $this->table;
      return $this->db->from($table);
  } 
  public function tbl_komposisi($as = '')
  {
      $table = !empty($as) ? $this->tbl_komposisi . " $as" : $this->tbl_komposisi;
      return $this->db->from($table);
  } 
  public function tbl_mesin($as = '')
  {
      $table = !empty($as) ? $this->tbl_mesin . " $as" : $this->tbl_mesin;
      return $this->db->from($table);
  } 
  public function table()
  {
    return $this->db->from($this->table)->get()->result();
  }
  public function table_komposisi()
  {
    return $this->db->from($this->tbl_komposisi)->get()->result();
  }
  public function table_mesin()
  {
     $table = !empty($as) ? $this->tbl_mesin . " $as" : $this->tbl_mesin;
      return $this->db->from($table);
  }

  public function table_produk_detail($id_produk)
  {
    return $this->db->from($this->table)
                    ->where('id_produk', $id_produk)
                    ->get()
                    ->result();
  }
  public function table_bahan_detail($id_produk)
  {
    return $this->db
                    ->select('*')
                    ->from($this->tbl_komposisi)
                    ->where('id_produk', $id_produk)
                    ->group_start()
                    ->where('kode_bahan !=', '')
                    ->group_end()
                    ->get()
                    ->result();
  }
  public function table_mesin_detail($id_produk)
  {
    return $this->db
                    ->select('*')
                    ->from($this->tbl_mesin)
                    ->where('id_produk', $id_produk)
                    ->group_start()
                    ->where('jam_mesin !=', 0)
                    ->or_where('jam_orang !=', 0)
                    ->group_end()
                    ->get()
                    ->result();
  }
  public function simpan_ajax_bahan($data, $id_komposisi_produk)
  {
    if($id_komposisi_produk == ""){
      $this->db->insert($this->tbl_komposisi, $data);
    }else{
      $this->db->where('id_komposisi_produk',$id_komposisi_produk);
      $this->db->update($this->tbl_komposisi,$data);
    }
  }
  public function simpan_ajax_mesin($data, $id_mesin)
  {
    if($id_mesin == ""){
      $this->db->insert($this->tbl_mesin, $data);
    }else{
      $this->db->where('id_mesin',$id_mesin);
      $this->db->update($this->tbl_mesin,$data);
    }
  }
  public function update($data,$id_produk)
  {
      $this->db->where('id_produk',$id_produk);
      $this->db->update($this->table,$data);
  }
  public function delete_bahan($id_komposisi_produk)
  {
      $this->db->where('id_komposisi_produk',$id_komposisi_produk);
      $this->db->delete($this->tbl_komposisi);
  }
  public function delete_mesin($id_mesin)
  {
      $this->db->where('id_mesin',$id_mesin);
      $this->db->delete($this->tbl_mesin);
  }
  public function delete_pro($id_produk)
  {
      $this->db->where('id_produk',$id_produk);
      $this->db->delete($this->table);
  }

}
