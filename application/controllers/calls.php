<?php

class Calls extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	
	function testadd()
	{
		$this->output->enable_profiler(TRUE);
			
		
		$ua=new User();
		//$ua->id=1;
		$ua->name='Wang';
		$ua->username='Wang';
		$ua->email='Wang3@gmail.com';
		$ua->password='abc';
		$ua->confirm_password='abc';
		$group = new Group();
		$group->get_by_id(1);
		//$group->get_by_id(1);
		//$ua->group=$group;
		//$ua->save();
		/*
		$ua->trans_start();
		$success = $ua->save($group);
		$success = $ua->save();
		
		foreach ($ua->error->all as $e)
		{
    		echo $e . "<br />";
		}
		*/
		$ua->get_by_id(8);
		$ub=new User();
		$ub->get_by_id(1);
		
		/*
		$data=array(
			//'id'=>2,
			'name'=>'wang',
			'email'=>'wang2@gmail.com',
			'username'=>'wang',
			'password'=>'abc',
			'confirm_password'=>'abc',
			'group'=>1
		);
		$success = $ua->from_array($data, array(
				//'id',
				'name',
				'email',
				'username',
				'password',
				'confirm_password',
				'group'
			), TRUE);
  	 	*/
  	 	
		$ua->trans_complete();
		$success="";
		if (!$success)
		{
			
		}
		else 
		{
			//echo 1;
		}

		$call=new Call();
		$rel=array(
			'caller'=>$ua,
			'receiver'=>$ub
		);
		
		echo $call->billid;
		$call->save($rel);
		
		return;
		
		$ub=new User();
		$ub->username='prg';
		$ub->email='prg@a.b.c';
		$ub->password='prg';
		$ub->save();
		
		$call=new Calls();
		$rel=array(
			'caller'=>$ua,
			'receiver'=>$ub
		);
		
		echo 'abbc';
		return;
		$call->save($rel);
		
				
	}
}


?>