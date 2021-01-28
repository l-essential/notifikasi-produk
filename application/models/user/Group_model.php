<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Group_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function listing()
        {
            $query = $this->db->get('tbl_group');
            return $query->result();
        }
        public function detail($id_group)
        {
            $query = $this->db->get_where('tbl_group', array('id_group' => $id_group ));
            return $query->row();
        }
        public function tambah($data)
        {
            $this->db->insert('tbl_group',$data);
        }
        public function edit($data,$id_group)
        {
            $this->db->where('id_group',$id_group);
            $this->db->update('tbl_group',$data);
        }
        public function delete_role($data2){
            $this->db->where('id_group',$data2['id_group']);
            $this->db->delete('tbl_group',$data2);
        }
    }       