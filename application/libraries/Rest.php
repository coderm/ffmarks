<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Rest {
	var $CI;
	var $segments;
	var $dataType;
	var $data;
	var $functions;
	
	function __construct() {
		$this->CI =& get_instance();
		$this->segments = $this->CI->uri->uri_to_assoc();
	}
	
	function arrayobj($array) {
		$obj = new stdClass;
		foreach ($array as $key => $value) {
			if(is_array($value)) {
				$obj->$key = arrayobj($value);
			} else {
				if(is_numeric($key))
					break;

				$obj->$key = $value;
			}
		}
		return $obj;
	}
	
	function enableGet() {
		parse_str($_SERVER['QUERY_STRING'], $_GET);
		//return true;
	}
	
	function getRawInput() {
		return file_get_contents('php://input');
	}
	
	function jsonEncode($data) {
		return json_encode($data);
	}
	
	function jsonDecode($data) {
		return json_decode($data);
	}
	
	function serve($object) {
		$this->data = new stdClass();

		foreach($this->functions as $key => $value) {
			$key = strtolower($key);
			
			//if($key == $this->segments['rest']) {
			switch($this->dataType[$key]) {
				case 'get':
					$this->enableGet();
					$this->data = $this->arrayobj($_GET);
					$object->$value($this->data);
				break;
				case 'json':
					$object->$value($this-jsonDecode($this->getRawInput()));
				break;
				case 'post':
					$this->data = $this->arrayobj($_POST);
					$object->$value($this->data);
				break;
				case 'raw':
					$this->data = $this->getRawInput();
					$object->$value($this->data);
				break;
				case 'none':
					$object->$value();
				break;
				default: 
					$object->$value();
				break;
			}	
		//}
		}
	}
	
	function addFunction($functionname, $function, $type) {
		$functionname = strtolower($functionname);
		$this->functions[$functionname] = $function;
		$type = strtolower($type);
		
		switch($type) {
			case 'get':
				$this->dataType[$functionname] = 'get';
			break;
			case 'json':
				$this->dataType[$functionname] = 'json';
			break;
			case 'post':
				$this->dataType[$functionname] = 'post';
			break;
			case 'raw':
				$this->dataType[$functionname] = 'raw';
			break;
			case 'none':
				$this->dataType[$functionname] = 'none';
			break;
			default: 
				$this->dataType[$functionname] = 'none';
			break;
		}
	}
}
