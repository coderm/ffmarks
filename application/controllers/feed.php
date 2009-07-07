<?php

class Feed extends Controller {

	function __construct() {
		parent::Controller();
	}
	
	function index($_nickname = '') {
		$this->load->model('Bookmarks_model', 'bookmarks');
		
		$data['nickname'] = $_nickname;
		$data['bookmarks'] = $this->bookmarks->get_bookmarks($_nickname);
		
		//$this->auth->restrict();
		
		$this->load->view('feed/view_feed', $data);
	}
	
	function _remap($method) {
		$this->index($method);
	}

}