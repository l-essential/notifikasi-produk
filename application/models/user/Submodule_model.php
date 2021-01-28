<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Submodule_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function listing()
        {
            $this->db->select('tbl_submodule.*,tbl_module.nama_module');
            $this->db->from('tbl_submodule');
            $this->db->join('tbl_module', 'tbl_submodule.id_module = tbl_module.id_module', 'LEFT');
            $this->db->order_by('tbl_submodule.id_module');
            $this->db->order_by('tbl_submodule.urutan');
            $query = $this->db->get();
            return $query->result();
        }
        public function detail($id_submodule)
        {
            $query = $this->db->get_where('tbl_submodule', array('id_submodule' => $id_submodule));
            return $query->row();
        }
        public function tambah($data)
        {
            $this->db->insert('tbl_submodule',$data);
        }
        public function edit($data,$id_submodule)
        {
            $this->db->where(array('id_submodule' => $id_submodule));
            $this->db->update('tbl_submodule',$data);
        }
        public function delete_submodule($data4){
            $this->db->where('id_submodule',$data4['id_submodule']);
            $this->db->delete('tbl_submodule',$data4);
        }
        public function listing_module($id_module)
        {
            $this->db->select('tbl_submodule.*, tbl_module.nama_module');
            $this->db->from('tbl_submodule');
            $this->db->join('tbl_module','tbl_module.id_module = tbl_submodule.id_module');
            $this->db->where('tbl_submodule.id_module', $id_module);
            $this->db->order_by('urutan');
            $query = $this->db->get();
            return $query->result();
        }        
        public function cek_module($id_module){
            $this->db->select('tbl_submodule.id_module');
            $this->db->from('tbl_submodule');
            $this->db->join('tbl_module', 'tbl_submodule.id_module = tbl_submodule.id_module', 'LEFT');
            $this->db->where('tbl_submodule.id_module',$id_module);
            $query = $this->db->get();
            return $query->row();
        }
    }       