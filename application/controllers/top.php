<?php

class Top extends Controller {

	function __construct() {
		parent::Controller();
		
		//$this->load->model('Bookmarks_model', 'bookmarks');
	}
	
	function index($_eid = '') {
		$data['title'] = 'Entry title';
		
		//$this->auth->restrict();
		
		$this->load->view('go/view_top', $data);
	}
	
	function _remap($method) {
		$this->index($method);
	}

}