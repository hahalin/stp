<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('home');
	}
	
	function user_info() {
		if ($this->uri->segment(2)) {
			//There is a username attached to the url
			
			//Check to see if the username exists, if it does it will send back and id, found in the models/user_model.php model
			if ($check = $this->user_model->getUserIdByUsername($this->uri->segment(2))) {
			
				//Use the ion auth library to get the data from that user, found in the ion auth docs http://benedmunds.com/ion_auth/#user
				$data['user_info'] = $this->ion_auth->user($check)->row();
				
				//Set the title of the page
				$data['title'] = $data['user_info']->username . "'s Profile";
				
				//Load the view with the new information
				$this->load->view('frontend/user_profile', $data);
			} else {
				//User does not exist
				redirect('home');
			}
		} else {
			redirect('home');
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */