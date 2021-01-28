<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Tbl_Produk extends CI_Migration 
{
    public function up()
    {
        ## TABLE: tbl_produk
        $this->dbforge->add_field(array(
            'id_produk' => array(
                'type'  => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_produk' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'kode_produk' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'no_mc' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'batch_size' => array(
                'type' => 'NUMERIC(18,0)',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'update_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'update_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_produk', TRUE);
        $this->dbforge->create_table('tbl_produk');

        ## TABLE: tbl_mesin
        $this->dbforge->add_field(array(
            'id_mesin' => array(
                'type'  => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_produk' => array(
                'type' => 'INT',
                'null' => FALSE
            ),
            'kode_mesin' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'nama_mesin' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'jam_mesin' => array(
                'type' => 'FLOAT',
                'null' => TRUE
            ),
            'jam_orang' => array(
                'type' => 'FLOAT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_mesin', TRUE);
        $this->dbforge->create_table('tbl_mesin');
        
        ## TABLE: tbl_mesin
        $this->dbforge->add_field(array(
            'id_komposisi_produk' => array(
                'type'  => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_produk' => array(
                'type' => 'INT',
                'null' => FALSE
            ),
            'kode_bahan' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'no_standar_bahan' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'nama_bahan' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'persen' => array(
                'type' => 'FLOAT',
                'null' => TRUE
            ),
            'create_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'create_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id_komposisi_produk', TRUE);
        $this->dbforge->create_table('tbl_komposisi_produk');
    }
    public function down()
    {
        $this->dbforge->drop_table('tbl_produk');
        $this->dbforge->drop_table('tbl_mesin');
        $this->dbforge->drop_table('tbl_komposisi_produk');
    }
}