<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		//$this->load->library('session');
		
	}

	
	public function index()
	{
		

		
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		} else {
			$data['user_info'] = $this->ion_auth->user()->row();
			$data['title'] = $data['user_info']->username . "'s Dashboard";
			$this->load->view('backend/dashboard_view', $data);
		}
	}
	
	public function logout() {
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		} else {
			$this->ion_auth->logout();
			redirect('home');
		}
	}
	
	function profile() {
		//Make sure there is a third segment because there is no 'index' for this function
		if ($this->uri->segment(3)) {
			//Make sure they are logged in
			if (!$this->ion_auth->logged_in()) {
				//redirect them to the login page
				redirect('auth/login', 'refresh');
			} else {
				if ($this->uri->segment(3) == "edit") {
						
					$this->load->helper('form');
						
					//Edit the profile
					$data['user_info'] = $this->ion_auth->user()->row();
					$this->output->enable_profiler(TRUE);
					$data['title'] = "Editing Profile";
					$this->load->view('backend/edit_profile', $data);
				} else if ($this->uri->segment(3) == "update") {
					//Updating user profile
					$user_id = $this->ion_auth->user()->row()->id;
					
					$data = array(
						'company' => $this->input->post('company'),
						'phone' => $this->input->post('phone'),
						'biography' => $this->input->post('biography')
					);
					
					if ($this->ion_auth->update($user_id, $data)) {
						redirect('dashboard');
					} else {
						redirect('dashboard/profile/edit');
					}
				}
			}
		} else {
			redirect('home');
		}
	}
	
	function account() {
		//Make sure there is a third segment because there is no 'index' for this function
		if ($this->uri->segment(3)) {
			//Make sure they are logged in
			if (!$this->ion_auth->logged_in()) {
				//redirect them to the login page
				redirect('auth/login', 'refresh');
			} else {
				if ($this->uri->segment(3) == "edit") {
					$this->load->helper('form');
					//Edit the profile
					$data['user_info'] = $this->ion_auth->user()->row();
					$data['title'] = "Editing Account Information";
					$this->load->view('backend/edit_account', $data);
				} else if ($this->uri->segment(3) == "update") {
					//Updating user profile
					$user_id = $this->ion_auth->user()->row()->id;
					
					$data = array(
						'email' => $this->input->post('email'),
						'first_name' => $this->input->post('fname'),
						'last_name' => $this->input->post('lname')
					);
					
					if ($this->ion_auth->update($user_id, $data)) {
						redirect('dashboard');
					} else {
						redirect('dashboard/account/edit');
					}
				}
			}
		} else {
			redirect('home');
		}
	}
    
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */