<?php

class Go extends Controller {

	function __construct() {
		parent::Controller();
		
		//$this->load->model('Bookmarks_model', 'bookmarks');
	}
	
	function index($_eid = '') {
		$data['title'] = 'Entry title';
		
		//$this->auth->restrict();
		
		$this->load->view('go/view_go', $data);
	}
	
	function _remap($method) {
		$this->index($method);
	}

}