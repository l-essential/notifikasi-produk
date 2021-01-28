<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_User_Portal extends CI_Model
{
    public $table = 'users';
    public $table_perm = 'v_role_apps';
    public $db_sso = '';

    public function __construct()
    {
        parent::__construct();

        $this->db_sso = $this->load->database('sso', true);
    }

    public function table()
    {
        return $this->db_sso->from($this->table);
    }

    public function canIAccessApp($app_code, $user)
    {
      $row = $this->db_sso->from($this->table_perm)
                  ->where('key', $app_code)
                  ->where('role_id', $user->role_id)
                  ->get()->row();

      if( !empty($row) ){
        return TRUE;
      }else{
        return FALSE;
      }
    }
} 