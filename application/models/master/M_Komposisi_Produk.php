<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komposisi_Produk extends CI_Model
{

  public $table = 'tbl_komposisi_produk';
  public $table_mesin = 'tbl_mesin';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function table($as = '')
  {
      $table = !empty($as) ? $this->table . " $as" : $this->table;
      return $this->db->from($table);
  } 
  public function table_mesin($as = '')
  {
      $table = !empty($as) ? $this->table_mesin . " $as" : $this->table_mesin;
      return $this->db->from($table);
  } 
 
}
