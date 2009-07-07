<?php

class Bookmarks extends Controller {

	function __construct() {
		parent::Controller();
		
		$this->load->model('Bookmarks_model', 'bookmarks');
	}
	
	function index() {
		
		$_nickname = $this->uri->segment(2);
		$_page = $this->uri->segment(3);
		
		//echo $_user.'/'.$_page;
		
		$data['title'] = 'Bookmarks of '.$_nickname;
		
		$data['nickname'] = $_nickname;
		
		$data['feed'] = true;
		$data['feed_title'] = $_nickname.'\'s RSS Feed';
		$data['feed_url'] = 'http://ffmarks.com/feed/'.$_nickname.'/';
		
		$config['total_rows'] = $this->bookmarks->count_total_bookmarks($_nickname);
		$config['per_page'] = 5;
		
		$data['bookmarks'] = $this->bookmarks->get_bookmarks($_nickname, $config['per_page'], 0);
		
		//$this->auth->restrict();
		
		$this->load->view('bookmarks/view_bookmarks', $data);
	}
	
	/*function _remap($method) {
		$this->index($method);
	}*/

}