<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function migrate()
  {
    // panggil function ini ketika ada perubahan pada migration cuy
      $this->load->library('migration');

      if ($this->migration->current() === FALSE)
      {
          show_error($this->migration->error_string());
      }
  }

  public function FunctionName(Type $var = null)
  {
    # code...
  }

  public function Tes(Type $var = null)
  {
    # code...
  }

}