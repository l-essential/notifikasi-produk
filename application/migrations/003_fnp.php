<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Fnp extends CI_Migration 
{
    public function up()
    {
        ## TABLE: tbl_merek
        $this->dbforge->add_field(array(
            'idmerek' => array(
                'type'  => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'namamerek' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'namaproduk' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'bentuksediaan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'warnasediaan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'noformula' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'norevisi' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'tglberlaku' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'formulakhusus' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'persamaanproduk' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'kategori' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'subkategori' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'klaimproduk' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'carapakai' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'perhatian' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'catatan' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'catatanra' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pdf' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'status_approve_rnd' => array(
                'type'  => 'INT',
                'null' => FALSE
            ),
            'approve_rnd_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'approve_rnd_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'status_approve_ra' => array(
                'type'  => 'INT',
                'null' => FALSE
            ),
            'approve_ra_by' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'approve_ra_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'createdate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updatedate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('idmerek', TRUE);
        $this->dbforge->create_table('tbl_merek');

        ## TABLE: tbl_Komposisi
        $this->dbforge->add_field(array(
            'idkomposisi' => array(
                'type'  => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'idmerek' => array(
                'type'  => 'BIGINT',
                'null' => FALSE
            ),
            'namadagang' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'inciname' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'fungsi' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'nocas' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'konsentrasi' => array(
                'type' => 'FLOAT',
                'null' => TRUE
            ),
            'createdate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updatedate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('idkomposisi', TRUE);
        $this->dbforge->create_table('tbl_komposisi');

        ## TABLE: tbl_prosedur
        $this->dbforge->add_field(array(
            'idprosedur' => array(
                'type'  => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'idmerek' => array(
                'type'  => 'BIGINT',
                'null' => FALSE
            ),
            'prosedur' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'createdate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updatedate' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('idprosedur', TRUE);
        $this->dbforge->create_table('tbl_prosedur');


        ## tbl_bentukkemasan
        $this->dbforge->add_field([
            'idbk' => array(
                'type' => 'BIGINT',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'idmerek' => array(
                'type'  => 'BIGINT',
                'null' => FALSE
            ),
            'primer' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'sekunder' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'ukurankemasan' => array(
                'type' => 'INT',
                'null' => TRUE
            ),
            'satuan' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
        ]);
        $this->dbforge->add_key('idprosedur', TRUE);
        $this->dbforge->create_table('tbl_prosedur');
    }

    public function down()
    {
        $this->dbforge->drop_table('tbl_merek');
        $this->dbforge->drop_table('tbl_komposisi');
        $this->dbforge->drop_table('tbl_prosedur');
        $this->dbforge->drop_table('tbl_bentukkemasan');
    }
}