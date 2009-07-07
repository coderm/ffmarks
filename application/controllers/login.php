<?php

class Login extends Controller {

	function __construct() {
		parent::Controller();
	}
	
	function index() {
		$data['title'] = 'Login';
		
		$data['uid'] = 0;
		
		$this->auth->restrict(true);
		
		if($this->input->post('login_check') != false):
			$login = array($this->input->post('nickname'), $this->input->post('remotekey'));
			if($this->auth->process_login($login)):
				$this->auth->redirect();
			else:
				$data['error'] = 'Login failed, please try again.';
			endif;
		endif;
		
		$this->load->view('login/view_login', $data);
	}
	
	function out() {
		if($this->auth->logout()) 
			redirect('/login');
	}

}