<?php

class Feed extends Controller {

	function __construct() {
		parent::Controller();
		
		$this->load->model('Bookmarks_model', 'bookmarks');
	}
	
	function index() {
		$_nickname = $this->uri->segment(2);
		
		$data['nickname'] = $_nickname;
		$data['bookmarks'] = $this->bookmarks->get_bookmarks($_nickname);
		
		//$this->auth->restrict();
		
		$this->load->view('feed/view_feed', $data);
	}

}