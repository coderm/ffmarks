<?php

class Bookmarks extends Controller {

	function __construct() {
		parent::Controller();
		
		$this->config->load('bookmarks');
		//$this->load->model('Bookmarks_model', 'bookmarks');
		$this->load->library('pagination');
	}
	
	function index() {
		$_nickname = $this->uri->segment(2);
		$_page = $this->uri->segment(3);
		
		$data['user'] = $this->Bookmarks_model->get_ff_uid($_nickname);
		
		if($data['user']):
			$data['title'] = 'Bookmarks of '.$_nickname;
			
			$data['nickname'] = $_nickname;
			
			$data['feed'] = true;
			$data['feed_title'] = $_nickname.'\'s RSS Feed';
			$data['feed_url'] = 'http://ffmarks.com/feed/'.$_nickname.'/';
			$data['sid'] = str_replace('-', '', $this->session->userdata('id'));
			
			$config['base_url'] = base_url().'bookmarks/'.$data['nickname'].'/';
			$config['total_rows'] = $this->Bookmarks_model->count_total_bookmarks($_nickname);
			$config['per_page'] = 20;
			$config['full_tag_open'] = '<ul class="clear pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active">';
			$config['cur_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			
			$this->pagination->initialize($config); 
			
			$data['bookmarks'] = $this->Bookmarks_model->get_bookmarks($_nickname, $config['per_page'], $this->uri->segment(3));
		endif;
		
		$this->load->view('bookmarks/view_bookmarks', $data);
	}
	
	function delete() {
		$_id = $this->uri->segment(3);
		
		if(empty($_id) || !is_numeric($_id))
			return false;
			
		$delete = $this->Bookmarks_model->delete($_id);
		
		/*if($delete)
			echo 'Deleted.';*/
			
		echo $delete;
	}

}