<?php defined('BASEPATH') or exit('No direct script access allowed');

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


		$data['title'] = "Group";
		$data['description'] = "Group";
		$data['keywords'] = "Group";
		$data['data'] = $this->auth_model->get_group();

		$this->load->view('partials/_header', $data);
		$this->load->view('owner/index');
		$this->load->view('partials/_footer');
	}
	public function detail($id)
	{
		$id = str_replace(array('{', '}'), '', $id);

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
			$data['posts'] = $this->post_model->get_paginated_user_posts($id, $pagination['per_page'], $pagination['offset']);
			set_cache_data($posts_key . '_page' . $pagination['current_page'], $data['posts']);
		}



		$data['k'] = $this->auth_model->get_group_id($id);
		$data['title'] = trans("login");
		$data['description'] = trans("login") . " - " . $this->settings->application_name;
		$data['keywords'] = trans("login") . "," . $this->settings->application_name;

		$this->load->view('partials/_header', $data);
		$this->load->view('owner/detail');
		$this->load->view('partials/_footer');
	}

	public function booking($id)
	{
		$id = str_replace(array('{', '}'), '', $id);

		$k = $this->post_model->get_post_and_user_by_post_id($id);
		$data['k'] = $k;
		$data['title'] = "Booking-" . $k->title;
		$data['description'] = "Booking-" . $k->title . " - " . $this->settings->application_name;
		$data['keywords'] = "Booking-" . $k->title . "," . $this->settings->application_name;
		$this->load->view('partials/_header', $data);
		$this->load->view('owner/booking');
		$this->load->view('partials/_footer');
	}
	public function add_booking()
	{
		$this->form_validation->set_rules('nama', trans("nama"), 'required|xss_clean');
		$this->form_validation->set_rules('tenor', trans("tenor"), 'required|xss_clean');
		$this->form_validation->set_rules('tgl', trans("tgl"), 'required|xss_clean');
		$this->form_validation->set_rules('hp', trans("hp"), 'required|xss_clean|min_length[12]|max_length[16]');
		$this->form_validation->set_rules('alamat', trans("alamat"), 'required|xss_clean|min_length[15]');
		$this->form_validation->set_rules('email', trans("email"), 'required|xss_clean|max_length[200]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->owner_model->booking_values());
			redirect($this->agent->referrer());
		} else {
			//if post added
			if ($this->owner_model->insert_booking()) {
				reset_cache_data_on_change();
				$this->session->set_flashdata('success', "booking acara berhasil, selanjutnya tunggu konfirmasi dari management");
				redirect(lang_base_url());
			} else {
				$this->session->set_flashdata('form_data', $this->owner_model->booking_values());
				$this->session->set_flashdata('error', trans("msg_error"));
				redirect($this->agent->referrer());
			}
		}
 	}
	public function add()
	{
		$data['title'] = 'owner add';

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/owner/add');
		$this->load->view('admin/includes/_footer');
	}
	public function add_user_post()
	{
		//validate inputs 
		doi::dump($this->input->post());
		$this->form_validation->set_rules('name', trans("username"), 'required|xss_clean|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('email', trans("email"), 'required|xss_clean|max_length[200]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->owner_model->input_values());
			redirect($this->agent->referrer());
		} else {
			$email = $this->input->post('email', true);
			$name = $this->input->post('name', true);
			$kategori = $this->input->post('kategori', true);
			$status = $this->input->post('status', true);
			$alamat = $this->input->post('alamat', true);

			//is email unique
			if (!$this->owner_model->is_unique_email($email)) {
				$this->session->set_flashdata('form_data', $this->owner_model->input_values());
				$this->session->set_flashdata('error', trans("email_unique_error"));
				redirect($this->agent->referrer());
			}

			//add user
			if ($this->owner_model->insert()) {
				$this->session->set_flashdata('success', trans("msg_user_added"));
			} else {
				$this->session->set_flashdata('error', trans("msg_error"));
			}

			redirect($this->agent->referrer());
		}
	}
}
