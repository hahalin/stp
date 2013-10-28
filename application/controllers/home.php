<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['user_info'] = $this->ion_auth->user()->row();
		$data['title'] = "Welcome to my new Web Startup!";
		
		$data['users'] = $this->user_model->getTopUsers();
		
		$this->load->view('frontend/home_view', $data);
	}
	
	public function features()
	{
		$data['user_info'] = $this->ion_auth->user()->row();
		$data['title'] = "Features";
		$this->load->view('frontend/features_view', $data);
	}
	
	public function app()
	{
		$data['user_info'] = $this->ion_auth->user()->row();
		$data['title'] = "iPhone App";
		$this->load->view('frontend/app_view', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */