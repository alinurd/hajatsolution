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
		$data['description'] = "Owner" . " - " ;
		$data['keywords'] = "Owner" ;

		$this->load->view('partials/_header', $data);
		$this->load->view('owner/index');
		$this->load->view('partials/_footer');
	}
	public function detail($id)
	{
		$data['title'] = trans("login");
		$data['description'] = trans("login") . " - " . $this->settings->application_name;
		$data['keywords'] = trans("login") . "," . $this->settings->application_name;

		$this->load->view('partials/_header', $data);
		$this->load->view('auth/login');
		$this->load->view('partials/_footer');
	}
}
