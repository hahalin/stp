<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usercrl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->config->item('use_mongodb', 'ion_auth') ?$this->load->library('mongo_db') :$this->load->database();
		$this->output->enable_profiler(TRUE);
		
	}

	public function index()
	{
		redirect('home');
	}
	
	function GetCompanies($uid)
	{
		$u=new User();
		$u->get_by_id($uid);
		$c=$u->company->get();
		
		$list=array();
		foreach($c as $item)
		{
			$list[]=$item;
		}
	}
	
	//set company
	function JoinCompany($uid,$cid)
	{
		$this->output->enable_profiler(TRUE);
		$u=new User();
		$u->get_by_id($uid);
		$c=new Company();
		$c->get_by_id($cid);
		$u->save($c);
	}
	
	function checklogin()
	{
		echo $this->ion_auth->get_user_id();
		//$user=new user();
		$s=new ion_auth_model();
		$s->user($this->ion_auth->get_user_id());
		echo $s->row()->username;
		return;
		//$u=new user();
		//$u->get_by_id($this->ion_auth->get_user_id())->get();
		//$u->where('id',7);	
		//$u->get();
		//echo $u->username;
		
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