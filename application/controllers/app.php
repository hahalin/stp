<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class app extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('appcfg_model');
	}

	public function prodlist()
	{
		$this -> load -> helper('url');
		$this->load->library('parser');
		$this->load->view('prodlist');
		
	}
	
	public function addpid($pid)
	{
		$this -> load -> library('session');
		$newdata = array('username' => 'frank', 'email' => 'frank@a.b.c', 'logged_in' => TRUE);
		$list=array();
		$msg="initial,";
		if ($this->session->userdata('pidlist'))
		{
			$list=$this->session->userdata('pidlist');
		}
		if (!array_key_exists($pid,$list))
		{
			$list[$pid]=1;
			$msg .="add";
		}
		else 
		{
			$list[$pid] +=1;
			$msg .="modify";
		}
		$this -> session -> set_userdata('pidlist',$list);
		
		print "{success:true,msg:'".$msg."'}";
		
		
	}
	
	public function foo($p="default")
	{
	   print "foo";
	}

	public function testq()
	{
		print_r ($this -> appcfg_model ->q());
	}

	public function index() {
		return;
		$options = array(
		  'code' => $this -> input -> post('code'), 
		  'v' => $this -> input -> post('v')
		);

		$this -> load -> helper('form');
		$this -> load -> helper('url');
		$this -> load -> library('form_validation');
		$this->load->library('parser');

		$this -> form_validation -> set_rules('code', 'Title', 'required');
		$this -> form_validation -> set_rules('v', 'text', 'required');
		
		if ($this -> form_validation -> run() == FALSE) {
			$this -> load -> view('app/add');
		} else {
			$appcfg = $this -> appcfg_model -> add($options);
			
			$data=array('result'=>$appcfg);
			//$data['baseurl']=base_url();
			//$this->parser->parse('app/frmsuccess',$data);
			$this -> load -> view('app/frmsuccess',$data);
		}

		//$appcfg = $this -> appcfg_model -> add($options);
		
		return;


	}


	public function add() {

		$this -> load -> helper('form', 'url');
		$this -> load -> library('form_validation');
		$data['title'] = 'Create a appcfg item';

		$this -> load -> view('app/add');

		//print "indexa";
		return;
	}

}
