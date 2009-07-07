<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 

class FriendFeed {
	
	var $curl;

	function FriendFeed($_args = null) {	
		$this->nickname = $_args[0];
		$this->remotekey = $_args[1];
	}
	
	function validate() {
		return $this->fetch('http://friendfeed.com/api/validate');
	}
	
	function profile() {
		return $this->fetch('http://friendfeed.com/api/user/'.$this->nickname.'/profile?include=name,id,nickname');
	}
	
	function entry($_id) {
		return $this->fetch('http://friendfeed.com/api/feed/entry?entry_id='.$_id);
	}

	function fetch($_command) {
		$this->curl = curl_init("friendfeed.com");
		curl_setopt($this->curl, CURLOPT_URL, $_command);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		if(!empty($this->nickname) && !empty($this->nickname)):
			curl_setopt($this->curl, CURLOPT_USERPWD, $this->nickname.":".$this->remotekey);
			curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		endif;
		$response = curl_exec($this->curl);
		$r = json_decode($response);
		$info = curl_getinfo($this->curl);
		curl_close($this->curl);
		if($info["http_code"] != 200):
			return null;
		endif;
		return $r;
	}
}