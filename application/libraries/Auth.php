<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Auth {

	var $CI = null;

	function Auth() {
		$this->CI =& get_instance();
	}

	function process_login($login = null) {
		if(!isset($login))
			return false;
			
		if(count($login) != 2)
			return false;
			
		$nickname = $login[0];
		$password = $login[1];
		
		$this->CI->load->library('FriendFeed', $login);
		
		$r = $this->CI->friendfeed->validate();
		
		if ($r && $r->success):
			$this->CI->session->set_userdata('logged_user', $nickname);
			$this->CI->session->set_userdata('nickname', $nickname);
			$this->CI->session->set_userdata('remotekey', $password);

			$query = $this->CI->db->query('SELECT fldID, fldUsername FROM tbluser WHERE fldUsername = "'.$nickname.'"');
			if(!$u = $query->row()):
			
				$r = $this->CI->friendfeed->profile();
				
				$this->CI->db->query('INSERT INTO tbluser(fldID, fldUsername, fldDate) VALUES("'.$r->id.'", "'.$nickname.'", "'.date('Y-m-d H:i:s').'")');
				
				$this->CI->session->set_userdata('id', $r->id);
			else:
				$this->CI->session->set_userdata('id', $u->fldID);
			endif;
			return true;
		else:
			return false;
		endif;
	}
	
	/**
	 * 
	 * @access public
	 * @return void
	 */
	function redirect() {
		redirect(base_url());
	}
	
	/**
	 *
	 * This function restricts users from certain pages.
	 * use restrict(TRUE) if a user can't access a page when logged in
	 *
	 * @access	public
	 * @param	boolean	wether the page is viewable when logged in
	 * @return	void
	 */	
	function restrict($logged_out = FALSE) {
		if($logged_out && $this->logged_in()):
			redirect();
		endif;

		if(!$logged_out && !$this->logged_in()):
			$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string());
			redirect('login');
		endif;
	}
	
	/**
	 *
	 * Checks if a user is logged in
	 *
	 * @access	public
	 * @return	boolean
	 */	
	function logged_in() {
		if ($this->CI->session->userdata('logged_user') == false):
			return false;
		else:
			return true;
		endif;
	}
	
	/**
	 *
	 * @access	public
	 * @return	boolean
	 */	
	function logout() {
		$this->CI->session->sess_destroy();
		
		return true;
	}

}