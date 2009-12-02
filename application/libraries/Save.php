<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 

class Save {
	
	var $CI = null;

	function Save($_args = null) {
		$this->CI =& get_instance();
		
		$this->url = $_args['link'];
		
		$this->CI->load->helper('file');
	}
	
	function get_url() {
		return $this->url;
	}
	
	function get_contents() {
		if($handle = fopen($this->get_url(), 'rb')):
			$contents = stream_get_contents($handle);
			fclose($handle);
			return $contents;
		else:
			return false;
		endif;
	}
	
	function create_zip() {
		$contents = $this->get_contents();
	
		$zip = new ZipArchive;
		$filename = time().'_ffmarks.zip';

		if($zip->open($filename, ZIPARCHIVE::CREATE)!== true):
		    return false;
		endif;

		$zip->addFromString(str_replace(array('.', '/', 'http:'), '', $this->get_url()).'.html', $contents);
		$zip->close();

		header('Content-Type: application/zip');
		header('Content-Length: '.filesize($filename));
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		
		readfile($filename);
		unlink($filename); 
	}
}