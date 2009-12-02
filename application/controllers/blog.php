<?php

class Blog extends Controller {

	function __construct() {
		parent::Controller();
		
		$this->load->model('Blog_model', 'blog');
	}
	
	function index() {
		//$this->auth->restrict();
		
		$data['title'] = 'Blog';
		
		$data['is_blog'] = true;
		
		$data['feed'] = true;
		$data['feed_title'] = 'ffmarks Blog RSS Feed';
		$data['feed_url'] = 'http://ffmarks.com/blog/feed/';
		
		$data['blog'] = $this->blog->get_last_entries();
		
		$this->load->view('blog/view_blog', $data);
	}
	
	function feed() {
		$data['blog'] = $this->blog->get_last_entries();
		
		$this->load->view('feed/view_blog_feed', $data);
	}

}