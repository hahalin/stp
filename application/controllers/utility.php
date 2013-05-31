<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once(APPPATH.'libraries/crypt/Bcrypt.php');

class utility extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this -> load -> model('appcfg_model');
	}

	public function sAPPPATH()
	{
		$bcrypt = new Bcrypt(15);

		$hash = $bcrypt->hash('password');
		$isGood = $bcrypt->verify('password', $hash);
		
		//print $bcrypt.'</br>';
		print $hash.'</br>';		
		print $isGood;			
			
		//print APPPATH;
	}
}
