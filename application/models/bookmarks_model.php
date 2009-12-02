<?php

class Bookmarks_model extends Model {

	function __construct() {
		parent::Model();
		$this->CI =& get_instance();
	}
	
	function get_bookmarks($_nickname, $num = 0, $offset = 0) {
		$_uid = $this->get_ff_uid($_nickname);
		
		if(!$_uid)
			return 'No record(s)';

		$this->db->select('fldID, fldDate, fldEntryID, fldEntryType, fldUserID, fldServiceName, fldServiceUrl,
						   fldServiceIconUrl, fldTitle, fldLink, fldUserProfileUrl, fldUserProfileName');
		$this->db->from('tblbookmark');
		$this->db->where('fldUserID', $_uid);
		$this->db->order_by('fldID', 'desc');
		$this->db->limit($num, $offset);
		$query = $this->db->get();
		$row = $query->result();
		
		if($row = $query->result()):
			return $row;
		else:
			return false;
		endif;
	}
	
	function get_my_last_bookmarks($_nickname) {
		$_uid = $this->get_ff_uid($_nickname);
		
		if(!$_uid)
			return 'No record(s)';

		$this->db->select('fldID, fldDate, fldEntryID, fldEntryType, fldUserID, fldServiceName, fldServiceUrl,
						   fldServiceIconUrl, fldTitle, fldLink, fldUserProfileUrl, fldUserProfileName');
		$this->db->from('tblbookmark');
		$this->db->where('fldUserID', $_uid);
		$this->db->order_by('fldID', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		$row = $query->result();
		
		if($row = $query->result()):
			return $row;
		else:
			return false;
		endif;
	}
	
	function get_new_users() {
		$this->db->select('fldID, fldUsername, fldDate');
		$this->db->from('tbluser');
		$this->db->order_by('fldDate', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();
		$row = $query->result();
		
		if($row = $query->result()):
			return $row;
		else:
			return false;
		endif;
	}
	
	function count_total_bookmarks($_nickname) {
		$_uid = $this->get_ff_uid($_nickname);
		
		if(!$_uid)
			return 'No record(s)';

		$this->db->from('tblbookmark');
		$this->db->where('fldUserID', $_uid);

		return $this->db->count_all_results();
	}
	
	function get_ff_uid($_nickname) {
		$this->db->select('fldID, fldUsername');
		$this->db->from('tbluser');
		$this->db->where('fldUsername', $_nickname);
		$query = $this->db->get();
		
		if($row = $query->row()):
			return str_replace('-', '', $row->fldID);
		else:
			return false;
		endif;
	}
	
	function delete($_id) {
		$_sid = str_replace('-', '', $this->session->userdata('id'));
		
		$this->db->select('fldID, fldUserID');
		$this->db->from('tblbookmark');
		$this->db->where('fldID', $_id);
		$query = $this->db->get();
		
		if($row = $query->row()):
			return $row->fldUserID == $_sid ? $this->db->delete('tblbookmark', array('fldID' => $_id)) : false; 
		else:
			return false;
		endif;
	}

}