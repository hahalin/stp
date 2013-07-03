<?php

class login extends CI_Controller {

    function index() {
		       	
        redirect('app');
		return;
        if( $this->session->userdata('isLoggedIn') ) {
            redirect('app');
        } else {
            $this->show_login(false);
        }
    }

	function register()
	{
		
	}

    function login_user() {
        // Create an instance of the user model
        $this->load->helper('password');
        $this->load->model('user_m');
		$userid=$this->input->post('userid');
		$pwd=$this->input->post('pwd');
		

		$options = array(
		    'cost' => 7,
		    'salt' => 'BCryptRequires22Chrcts',
		);
		//rasmuslerdorf
		$pwd=password_hash($pwd, PASSWORD_BCRYPT, $options);
		
		if( $userid && $pwd && $this->user_m->validate_user($userid,$pwd)) {
            /*				
			$this->session->set_userdata( array(
	                //'id'=>$this->details->id,
	                //'name'=> $this->details->firstName . ' ' . $this->details->lastName,
	                //'email'=>$this->details->email,
	                //'avatar'=>$this->details->avatar,
	                //'tagline'=>$this->details->tagline,
	                //'isAdmin'=>$this->details->isAdmin,
	                //'teamId'=>$this->details->teamId,
	                'id'=>'001',
	                'name'=>$this->input->post('userid'),
	                'is_admin'=> false,
	                'isLoggedIn'=>true
	            )
	        );
 		    */
 		    //$this->session->set_flashdata('error','');
 		    redirect('app');
			return;
		}
		$this->session->set_flashdata('error',"帳號密碼輸入錯誤" );//帳號密碼輸入錯誤
	    redirect('app',$data);
		return;
		
		return;
        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->user_m->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            redirect('/main/show_main');
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('login',$data);
    }

    function logout_user() {
      $this->session->sess_destroy();
      $this->index();
    }

    function showphpinfo() {
        echo phpinfo();
    }
	
	function updatesession()
	{
		$this->session->set_userdata('fromlogin',1);
		print '<pre>';
		print_r($this->session->userdata);
		print '</pre>';
	}


}