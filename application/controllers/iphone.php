<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iphone extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->database();
	}
	
	function login_device()
	{
		//Crude way of authenticating iphone device, not recommended
		if ($this->input->post('key') == md5('webbootstrap_login')) {
		                
                if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {
                        //Good Login
                        $user_id = $this->ion_auth->get_user_id();
                        echo "userid-".$user_id;
                        exit();
                } else {
                        //Bad login
                        echo "NO";
                        exit();
                }
                
        } else {
                echo "NOKEY";
                exit();
        }
        
        return false;
	}
	
	function get_user_info() {
		header('Content-Type: application/json');
		
		if ($this->input->post('key') == md5('webbootstrap_getuserinfo')) {
		                
                $user_id = $this->input->post("UserID");
                                
                if ($user_data = $this->ion_auth->user($user_id)->row()) {
                                
	                $user_data = "{\"user_info\":[".json_encode($user_data)."]}";
	                
	                echo $user_data;
	                exit();
                
                } else {
                	echo "NOUSER";
                	exit();
                }
                
        } else {
                echo "NOKEY";
                exit();
        }
        
        return false;
	}
	
	function update_user() {
		
		if ($this->input->post('key') == md5('webbootstrap_updateuser')) {
		                
                $user_id = $this->input->post("UserID");
                                
                if ($this->ion_auth->user($user_id)->row()) {
                    //If user exists
                    
                    //Make data array 
	                $data = array (
	                	'first_name' => $this->input->post('first_name'),
	                	'last_name' => $this->input->post('last_name'),
	                	'biography' => $this->input->post('bio')
	                );
	                
	                if ($this->ion_auth->update($user_id, $data)) {
	                	//Updated successfully
	                	echo "UPDATED";
	                	exit();
	                } else {
	                	//Update unsuccessful
	                	echo "NOUPDATE";
	                	exit();
	                }
                
                } else {
                	echo "NOUSER";
                	exit();
                }
                
        } else {
                echo "NOKEY";
                exit();
        }
        
        return false;
	}
}

/* End of file iphone.php */
/* Location: ./application/controllers/iphone.php */