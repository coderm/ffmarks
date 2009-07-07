<?php

class Offline_model extends Model {

	function __construct() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function get_entry_url($_eid) {
		$this->db->select('fldEntryID, fldEntryType, fldLink');
		$this->db->from('tblbookmark');
		$this->db->where('fldEntryID', $_eid);
		$query = $this->db->get();
		
		if($row = $query->row()):
			if(empty($row->fldEntryType)):
				return $row->fldLink;
			else:
				return false;
			endif;
		else:
			return false;
		endif;
	}

}