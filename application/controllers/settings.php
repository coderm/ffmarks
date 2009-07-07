<?php

class Settings extends Controller {

	function __constructor() {
		parent::Controller();
	}
	
	function index() {
		$data['title'] = 'Settings';
		
		$this->load->view('settings/view_settings', $data);
	}
	
}