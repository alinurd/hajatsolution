<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_Controller extends Home_Core_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('bcrypt');
	}

	/**
	 * Login
	 */
	public function index()
	{
	 

		$data['title'] = "Owner";
		$data['description'] = "Owner" ;
		$data['keywords'] = "Owner" ;

		$this->load->view('partials/_header', $data);
		$this->load->view('owner/index');
		$this->load->view('partials/_footer');
	}
	public function detail($id)
	{
		 //slider posts
		 $this->slider_posts = get_cached_data('slider_posts');
		 if (empty($this->slider_posts)) {
			 $this->slider_posts = $this->post_model->get_slider_posts();
			 set_cache_data('slider_posts', $this->slider_posts);
		 }
 
		 $count_key = 'posts_count';
		 $posts_key = 'posts';
		 //posts count
		 $total_rows = get_cached_data($count_key);
		 if (empty($total_rows)) {
			 $total_rows = $this->post_model->get_post_count();
			 set_cache_data($count_key, $total_rows);
		 }
		 //set paginated
		 $pagination = $this->paginate(lang_base_url(), $total_rows);
		 $data['posts'] = get_cached_data($posts_key . '_page' . $pagination['current_page']);
		 if (empty($data['posts'])) {
			 $data['posts'] = $this->post_model->get_paginated_posts($pagination['per_page'], $pagination['offset']);
			 set_cache_data($posts_key . '_page' . $pagination['current_page'], $data['posts']);
		 }

		 

		 
		$data['title'] = trans("login");
		$data['description'] = trans("login") . " - " . $this->settings->application_name;
		$data['keywords'] = trans("login") . "," . $this->settings->application_name;

		$this->load->view('partials/_header', $data);
		$this->load->view('owner/detail');
		$this->load->view('partials/_footer');
	}
}
