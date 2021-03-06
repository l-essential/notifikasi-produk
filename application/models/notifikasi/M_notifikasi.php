<?php 
 
class M_notifikasi extends CI_Model{
	// ============================================================================= INSERT DATA
	function add($data, $table){
		$query = $this->db->insert($table, $data);
		return $query;
	}

	function getdata($table){
		$query = $this->db->get($table);
		return $query;
	}


	// ============================================================================= MEREK
	public function getmerek()
    {
		$query = $this->db->get('tbl_merek');
		return $query;
	}

	public function getmerekbystatusnoternd()
    {
		$this->db->select('namamerek, namaproduk');
		$this->db->where('note_status_rndcm', 1);
		$query = $this->db->get('tbl_merek'); 
		return $query;
	}

	public function getmerekbystatusnotera()
    {
		$this->db->select('namamerek, namaproduk');
		$this->db->where('note_status_ra', 1);
		$query = $this->db->get('tbl_merek'); 
		return $query;
	}

	public function getmerekbystatusra()
    {
		$this->db->select('namamerek, namaproduk');
		$this->db->where('status_approve_ra', 0);
		$this->db->where('bk', 1);
		$this->db->where('komposisi', 1);
		$this->db->where('prosedur', 1);
		$query = $this->db->get('tbl_merek'); 
		return $query;
	}

	public function getmerekbystatusrnd()
    {
		$this->db->select('namamerek, namaproduk');
		$this->db->where('status_approve_rnd', 0);
		$this->db->where('bk', 1);
		$this->db->where('komposisi', 1);
		$this->db->where('prosedur', 1);
		$query = $this->db->get('tbl_merek'); 
		return $query;
	}
	
	public function getmerekbyid($idmerek){
		$query = $this->db->get_where('tbl_merek', ['idmerek' => $idmerek]);
		return $query;
	}

	public function updatemerek($idmerek, $data, $table){
		$this->db->where('idmerek', $idmerek);
		$this->db->update($table, $data);
	}


	// ============================================================================== BK
	public function getbkbyidmerek($idmerek){
		$query = $this->db->get_where('tbl_bentukkemasan', ['idmerek' => $idmerek]);
		return $query;
	}

	public function getbkbyidbk($idmerek, $idbk){
		$this->db->where('idmerek', $idmerek);
		$this->db->where('idbk', $idbk);
		return $this->db->get('tbl_bentukkemasan');
	}

	public function editbk($idmerek, $idbk, $data, $table){
		$this->db->where('idmerek', $idmerek);
		$this->db->where('idbk', $idbk);
		$this->db->update($table, $data);
	}

	public function hapusbk($idmerek, $idbk){
		$this->db->where('idmerek', $idmerek);
		$this->db->where('idbk', $idbk);
		$this->db->delete('tbl_bentukkemasan');
	}
	
	// ============================================================================== KOMPOSISI
	public function getkomposisi($idmerek){
		$query = $this->db->get_where('tbl_komposisi', ['idmerek' => $idmerek]);
		return $query;
	}

	public function getitemkomposisi($idkomposisi){
		$query = $this->db->get_where('tbl_komposisi', ['idkomposisi' => $idkomposisi]);
		return $query;
	}

	public function hapuskomposisi($idkomposisi){
		$this->db->where('idkomposisi', $idkomposisi);
		$this->db->delete('tbl_komposisi');
	}

	public function hapuskomposisiall($idmerek){
		$this->db->where('idmerek', $idmerek);
		$this->db->delete('tbl_komposisi');
	}

	public function updatekomposisi($idkomposisi, $data, $table){
		$this->db->where('idkomposisi', $idkomposisi);
		$this->db->update($table, $data);
	}

	public function delpdf($idmerek){
		$data = ['pdf' => NULL];
		$this->db->where('idmerek', $idmerek);        
		$this->db->update('tbl_merek', $data);
	}


	// ============================================================================== PROSEDUR
	public function getprosedur($idmerek){
		$query = $this->db->get_where('tbl_prosedur', ['idmerek' => $idmerek]);
		return $query;
	}

	public function getitemprosedur($idprosedur){
		$query = $this->db->get_where('tbl_prosedur', ['idprosedur' => $idprosedur]);
		return $query;
	}

	public function hapusprosedur($idprosedur){
		$this->db->where('idprosedur', $idprosedur);
		$this->db->delete('tbl_prosedur');
	}

	public function updateprosedur($idprosedur, $data, $table){
		$this->db->where('idprosedur', $idprosedur);
		$this->db->update($table, $data);
	}

	public function delallpro($idmerek){
		$this->db->where('idmerek', $idmerek);
		$this->db->delete('tbl_prosedur');
	}

	// ============================================================================== DELETE ALL DATA
	public function delalldata($idmerek){
		$this->db->delete('tbl_merek', ['idmerek' => $idmerek]); 
		$this->db->delete('tbl_komposisi', ['idmerek' => $idmerek]);
		$this->db->delete('tbl_prosedur', ['idmerek' => $idmerek]);
	}

	// ============================================================================== MASTER BENTUK SEDIAAN
	
	function getbs($idbs){
		$query = $this->db->get_where('tbl_masterbs', ['idbs' => $idbs]);
		return $query;
	}

	public function updatebs($idbs, $data, $table){
		$this->db->where('idbs', $idbs);
		$this->db->update($table, $data);
	}

	public function delbs($idbs){
		$this->db->delete('tbl_masterbs', ['idbs' => $idbs]);
	}

// ============================================================================== MASTER BENTUK Kemasan
	
	function getbk($idbk){
		$query = $this->db->get_where('tbl_masterbk', ['idbk' => $idbk]);
		return $query;
	}

	public function updatebk($idbk, $data, $table){
		$this->db->where('idbk', $idbk);
		$this->db->update($table, $data);
	}

	public function delbk($idbk){
		$this->db->delete('tbl_masterbk', ['idbk' => $idbk]);
	}


}