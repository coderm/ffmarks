<?php
class About extends Controller {

	function __constructor() {
		parent::Controller();
	}
	
	function index() {
		$data['title'] = 'About';
		
		$this->load->view('about/view_about', $data);
	}
	
	function source() {
		$data['title'] = 'Source';
		
		$this->load->view('about/view_source', $data);
	}
	
}