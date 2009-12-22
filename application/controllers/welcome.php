<?php

class Welcome extends Controller {

	function __construct() {
		parent::Controller();
		
		//$this->load->model('Bookmarks_model', 'bookmarks');
	}
	
	function index() {		
		$data['uid'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('nickname');
		$data['picture'] = 'http://i.friendfeed.com/p-'.str_replace('-', '', $data['uid']).'-small-1';
		
		$data['users'] = $this->Bookmarks_model->get_new_users();
		
		if($data['uid']):
			$data['title'] = 'Dashboard';
			
			$data['bookmarks'] = $this->Bookmarks_model->get_my_last_bookmarks($data['username']);
			$this->load->view('bookmarks/view_me', $data);
		else:
			$this->load->view('welcome/view_welcome', $data);
		endif;
	}

}