<?php

class Api extends Controller {

	function __construct() {
		parent::Controller();
		
		$this->load->library('rest');
	}
	
	function _add($data) {
		//if(method_exists($data, 'uid') && method_exists($data, 'eid'))
			echo 'jsonp_callback({ message: "bok", uid: "'.$data->uid.'", eid: "'.$data->eid.'" });';
	}
	
	function index() {
		$this->add();
	}
	
	function add() {
		$this->rest->addFunction('add', '_add', 'get');        
		$this->rest->serve($this);
	}
}