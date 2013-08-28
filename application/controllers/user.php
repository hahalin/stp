<?php

class User extends CI_Controller {


	function profile($action='edit',$id=0)
	{
		$this->load->view('header');
		$this->load->view('profile');
		$this->load->view('footer_base');				
	}

	
}

?>
