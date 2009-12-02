<?php

class Offline extends Controller {

	function __construct() {
		parent::Controller();
	}
	
	function index($_eid = '') {
		$this->auth->restrict();
		
		$this->load->model('Offline_model', 'offline');
		
		$_link = $this->offline->get_entry_url($_eid);
		if($_link):
			$data['link'] = $_link;
			$this->load->library('save', $data);
			$this->save->create_zip();
		else:
			echo 'This entry don\'t have a link.';
		endif;
	}
	
	function _remap($method) {
		$this->index($method);
	}

}