<?php

class Add extends Controller {

	function __construct() {
		parent::Controller();
	}
	
	function index() {
		/*
		 * TODO
		 * - uid kontrolu
		 * - uid@ffmarks kontrolu
		 * CHECK session kontrolu
		 * - session == uid kontrolu
		 * CHECK bookmarks'a kendi id olayını ekle. ayni entryi birden fazla kisi bookmark'layabilir.
		 * - data modeli yazilacak.
		 * butun bu maddeleri ya library ya da model olarak yapacagiz.
		 * Add model
		 * - Entry ekleme
		 * - Entry kontrol
		 * - User kontrol
		 * - User logged kontrol
		 */
		
		$this->load->library('FriendFeed');
		
		if(!$this->auth->logged_in()):
			$_data = "{message: 'Please login.'}";
		else:
		
			$_uid = $this->input->get('uid');
			$_eid = $this->input->get('eid');

			$_e = $this->friendfeed->entry($_eid);

			$_title = $_e->entries[0]->title;
			if(!empty($_e->entries[0]->service->entryType)):
				$_entryType = $_e->entries[0]->service->entryType;
			else:
				$_entryType = '';
			endif;
			$_serviceName = $_e->entries[0]->service->name;
			$_serviceUrl = $_e->entries[0]->service->profileUrl;
			$_serviceIconUrl = $_e->entries[0]->service->iconUrl;
			$_link = $_e->entries[0]->link;
			$_userProfileUrl = $_e->entries[0]->user->profileUrl;
			$_userProfileName = $_e->entries[0]->user->name;
			
			$this->db->query('INSERT INTO tblbookmark(fldDate, fldEntryID, fldEntryType, fldUserID, fldServiceName, fldServiceUrl,
													  fldServiceIconUrl, fldTitle, fldLink, fldUserProfileUrl,
													  fldUserProfileName)
													  VALUES("'.date('Y-m-d H:i:s').'", "'.$_eid.'", "'.$_entryType.'", "'.$_uid.'", "'.$_serviceName.'", "'.$_serviceUrl.'",
													  "'.$_serviceIconUrl.'", "'.htmlspecialchars($_title).'", "'.$_link.'", "'.$_userProfileUrl.'",
													  "'.$_userProfileName.'")');
			
			//$_data = "{eid:'".$_eid."',uid:'".$_uid."'}";
			$_data = "{message: 'Added'}";
		
		endif;
		
		echo $this->input->get('jsonp_callback').'('.$_data.');';
	}

}