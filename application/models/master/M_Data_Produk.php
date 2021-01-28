<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data_Produk extends CI_Model
{

  public $table = 'M_PRODUCT';
  public $table_subtitusi = 'M_SUBSTITUTE';
  public $ob;

  public function __construct()
  {
    parent::__construct();

    $this->ob = $this->load->database('ob', TRUE);
  }

  public function table_prod($as = '')
  {
    $table = !empty($as) ? $this->table . " $as" : $this->table;
    return $this->ob->from($table);
  }
  public function table_subt($as = '')
  {
    $table = !empty($as) ? $this->table_subtitusi . " $as" : $this->table_subtitusi;
    return $this->ob->from($table);
  }

  public function detail($where = array())
  {
    return $this->table()
                ->where($where)
                ->get()
                ->row();
  }

  public function forDropdown()
  {
    $data = $this->table()->get()->result();

    $return = [];
    foreach ($data as $key => $value) {
      $return[] = ['value' => $value->M_PRODUCT_ID, 'label' => $value->NAME];
    }

    return $return;
  }

  public  function row_produk($value)
  {
    return $this->table_prod()
                ->where("VALUE",$value)
                ->get()
                ->row();
  }
  public function prod_subt($M_PRODUCT_ID)
  {
    return $this->table_subt("t_sub")
                ->select("M_PRODUCT.NAME, M_PRODUCT.VALUE")
                ->join("M_PRODUCT", "M_PRODUCT.M_PRODUCT_ID=t_sub.SUBSTITUTE_ID", "LEFT")
                ->where("t_sub.M_PRODUCT_ID", $M_PRODUCT_ID)
                ->get()
                ->result();
  }

}
