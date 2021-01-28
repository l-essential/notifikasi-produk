<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Role_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function listing_utama($id_group)
        {
            $this->db->select('*');
            $this->db->from('tbl_role');
            $this->db->where('id_group', $id_group);
            $query = $this->db->get();
            return $query->result();
        }
        public function listing($id_group)
        {
            $this->db->select('tbl_role.*, tbl_group.nama_group, tbl_module.nama_module, tbl_submodule.nama_submodule');
            $this->db->from('tbl_role');
            $this->db->join('tbl_group', 'tbl_role.id_group = tbl_group.id_group','LEFT');
            $this->db->join('tbl_module', 'tbl_role.id_module = tbl_module.id_module','LEFT');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule','LEFT');
            $this->db->where('tbl_role.id_group',$id_group);
            $query = $this->db->get();
            return $query->row();
        }    
        public function tambah($data)
        {
            $this->db->insert('tbl_role', $data);
        }
        public function edit($data)
        {
            $this->db->where(array('id_group'      => $data['id_group'],
                                   'id_module'     => $data['id_module'],
                                   'id_submodule'  => $data['id_submodule']));
            $this->db->update('tbl_role',$data);
        }
        public function akses_module($id_group,$id_module)
        {
            $this->db->select('*');
            $this->db->from('tbl_role');
            $this->db->where(array('id_group'  => $id_group,
                                   'id_module' => $id_module));            
            $query = $this->db->get();
            return $query->row();
        }
        public function cek_submodule($id_group,$id_submodule)
        {
            $this->db->select('*');
            $this->db->from('tbl_role');
            $this->db->where(array('id_group'  => $id_group,
                                   'id_submodule' => $id_submodule));            
            $query = $this->db->get();
            return $query->result();
        }
        public function akses_submodule($id_group,$id_module,$id_submodule)
        {
            $this->db->select('*');
            $this->db->from('tbl_role');
            $this->db->where(array('id_group'     => $id_group,
                                  'id_module'    => $id_module,
                                  'id_submodule' => $id_submodule));
            $query = $this->db->get();
            return $query->row();
        }
        public function delete_role($data2)
        {
            $this->db->where('id_group',$data2['id_group']);
            $this->db->delete('tbl_role',$data2);
        }
        public function delete_submodule($data4)
        {
            $this->db->where('id_submodule',$data4['id_submodule']);
            $this->db->delete('tbl_role',$data4);
        }
        public function get_row($param=array())
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where($param);
            $query = $this->db->order_by('id_role','DESC');
            $query = $this->db->get();
            return $query->row();
        }
        public function view_submodule($id_group,$url_sub)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_sub));
            $query = $this->db->get();
            return $query->row();
        }

        public function view_calendar($id_group,$url_cal)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_cal));
            $query = $this->db->get();
            return $query->row();
        }

         public function view_grafik_a($id_group,$url_a)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_a));
            $query = $this->db->get();
            return $query->row();
        }

        public function view_grafik_b($id_group,$url_b)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_b));
            $query = $this->db->get();
            return $query->row();
        }

        public function view_grafik_c($id_group,$url_c)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_c));
            $query = $this->db->get();
            return $query->row();
        }

        public function view_grafik_d($id_group,$url_d)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_d));
            $query = $this->db->get();
            return $query->row();
        }

        public function view_grafik_e($id_group,$url_e)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_e));
            $query = $this->db->get();
            return $query->row();
        }

         public function view_grafik_f($id_group,$url_f)
        {
            $this->db->select('tbl_role.*, tbl_submodule.url_sub');
            $this->db->from('tbl_role');
            $this->db->join('tbl_submodule', 'tbl_role.id_submodule = tbl_submodule.id_submodule', 'LEFT');
            $this->db->where(array('id_group'   => $id_group,
                                   'url_sub'    => $url_f));
            $query = $this->db->get();
            return $query->row();
        }

        public function hapus_submodule($id_submodule)
        {
            $query = $this->db->get_where('tbl_role', array('id_submodule' => $id_submodule));
            return $query->row();
        }
    }       