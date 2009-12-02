<?php

class Blog_model extends Model {

	function __construct() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function get_last_entries() {
		$this->db->select('fldID, fldDate, fldTitle, fldBody');
		$this->db->from('tblblog');
		$this->db->order_by('fldID', 'desc');
		$query = $this->db->get();
		$row = $query->result();
		
		if($row):
			return $row;
		else:
			return false;
		endif;
	}

}