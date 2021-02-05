<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Fnp extends CI_Migration 
{
    public function up()
    {
        ## TABLE: tbl_merek
        $this->dbforge->add_column('tbl_merek', [
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
                'type' => 'INT',
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
                'type' => 'INT',
                'null' => TRUE
            ),
            'approve_ra_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'createby' => array(
                'type' => 'INT',
                'null' => TRUE
            )
        ]);

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
        $this->dbforge->add_key('idbk', TRUE);
        $this->dbforge->create_table('tbl_bentukkemasan');
    }

    public function down()
    {
        $this->dbforge->drop_column('tbl_merek', 'catatanra');
        $this->dbforge->drop_column('tbl_merek', 'pdf');
        $this->dbforge->drop_column('tbl_merek', 'status_approve_rnd');
        $this->dbforge->drop_column('tbl_merek', 'approve_rnd_by');
        $this->dbforge->drop_column('tbl_merek', 'approve_rnd_at');
        $this->dbforge->drop_column('tbl_merek', 'status_approve_ra');
        $this->dbforge->drop_column('tbl_merek', 'approve_ra_by');
        $this->dbforge->drop_column('tbl_merek', 'approve_ra_at');
        $this->dbforge->drop_column('tbl_merek', 'createby');
        $this->dbforge->drop_table('tbl_bentukkemasan');
    }
}