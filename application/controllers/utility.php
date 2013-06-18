<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once(APPPATH.'libraries/crypt/Bcrypt.php');


class utility extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this -> load -> model('appcfg_model');
		$this->load->helper('password');
		$this->load->library('unit_test');
	}
	
	public function utest()
	{

		
		$test = 1 + 1;

		$expected_result = 2;

		$test_name = 'Adds one plus one';

		//$this->unit->run($test, $expected_result, $test_name);
		
		
		$r='$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
		
		$this->unit->run($this->gentest(), 'is_string','test is string');
		
		$this->unit->run($this->gentest(), $r,'test pawword');
		
		echo '<pre>';
		//print_r( $result);
		echo '</pre>';
		
		echo $this->unit->report();
		
		
	}

	public function addtest()
	{
		return (1+1);
	}

	public function showsalt()
	{
		$bcrypt = new Bcrypt(15);
		print $bcrypt->getSalt();
	}

	public function gentest()
	{
	
		$options = array(
		    'cost' => 7,
		    'salt' => 'BCryptRequires22Chrcts',
		);
		$result=password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options)."\n";
		print trim($result);
		return trim($result);
		
		
	}
	
	public function genpwd($pwd='pwd')
	{
		$bcrypt = new Bcrypt(15);

		$hash = $bcrypt->hash($pwd);
		
		//return $hash;
		print $hash;		
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
