<?php

class HelloWorld extends Controller {

	function HelloWorld() {
		parent::Controller();
	}
	
	function index() {
		$data['title'] = 'ffmarks';
		$data['message'] = 'Bu da sayfanın mesajı';
		
		//$this->load->library('auth'); 
		
		$this->auth->restrict();
		
		$data['uid'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('nickname');
		$data['picture'] = 'http://i.friendfeed.com/p-'.str_replace('-', '', $data['uid']).'-small-1';
		
		$this->load->view('view_helloworld', $data);
	}

}