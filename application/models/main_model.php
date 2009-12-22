<?php

class Main_model extends Model {

	function __construct() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function get_last_blogs() {
		$this->db->select('fldID, fldTitle');
		$this->db->from('tblblog');
		$this->db->order_by('fldID', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		$row = $query->result();
		
		if($row):
			return $row;
		else:
			return false;
		endif;
	}
	
	function get_last_bookmarks() {
		$this->db->select('fldID, fldEntryID, fldTitle');
		$this->db->from('tblbookmark');
		$this->db->order_by('fldID', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		$row = $query->result();
		
		if($row):
			return $row;
		else:
			return false;
		endif;
	}

}