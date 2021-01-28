<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Module_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function listing()
        {
        	$this->db->select('*');
        	$this->db->from('tbl_module');
        	$this->db->order_by('urutan');
        	$query = $this->db->get();
            return $query->result();
        }
        public function detail($id_module)
        {
            $query = $this->db->get_where('tbl_module', array('id_module' => $id_module ));
            return $query->row();
        }
        public function tambah($data)
        {
            $this->db->insert('tbl_module',$data);
        }
        public function edit($data,$id_module)
        {
            $this->db->where('id_module',$id_module);
            $this->db->update('tbl_module',$data);
        }
        public function delete($data){
            $this->db->where('id_module',$data['id_module']);
            $this->db->delete('tbl_module',$data);
        }
    }       