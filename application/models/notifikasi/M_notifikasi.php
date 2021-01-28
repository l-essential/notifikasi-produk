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

	public function getmerekbystatusra()
    {
		$query = $this->db->get_where('tbl_merek', ['status_approve_ra' => 0]);
		return $query;
	}

	public function getmerekbystatusrnd()
    {
		$query = $this->db->get_where('tbl_merek', ['status_approve_rnd' => 0]);
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

	public function updatekomposisi($idkomposisi, $data, $table){
		$this->db->where('idkomposisi', $idkomposisi);
		$this->db->update($table, $data);
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

	// ============================================================================== GET ALL DATA
	// public function getalldata($idmerek){
	// 	$this->db->select('tbl_merek.*, tbl_komposisi.*, tbl_prosedur.prosedur');
	// 	$this->db->from('tbl_merek');
	// 	$this->db->join('tbl_komposisi', 'tbl_komposisi.idmerek = tbl_merek.idmerek');
	// 	$this->db->join('tbl_prosedur', 'tbl_prosedur.idmerek = tbl_merek.idmerek');
	// 	$this->db->where('tbl_merek.idmerek', $idmerek);
	// 	$query = $this->db->get();
	// 	return $query;
	// 	}


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