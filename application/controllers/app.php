<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class app extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('jsondata');
		$this -> load -> model('appcfg_model');
	}
	
	public function index() {

		$user_id = $this->session->userdata('id');
		$user_name = $this->session->userdata('name');
    	$is_admin = $this->session->userdata('is_admin');
    	$isLoggedIn = $this->session->userdata('isLoggedIn');
		
		$data['user_id']=$user_id;
		$data['user_name']=$user_name;
		$data['is_admin']=$is_admin;
		$data['isLoggedIn']=$isLoggedIn;
		
		$this -> load -> view('main',$data);
		
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
	
	
	public function getcategory($pid=0)
	{
		$this->load->model('category_m');
		$list=$this->category_m->list_category($pid);
		$obj=$this->jsondata->datawrapper($list);
		print json_encode($obj);
	}
	
	public function printsess()
	{
		$this -> load -> library('session');
		print_r($this->session->userdata);
	}

	public function setstyle()
	{
		$s=urlencode($this->input->post('style'));
		$this -> load -> library('session');
		$this->session->set_userdata('style',$s);
	} 
	public function getstyle()
	{
		$this -> load -> library('session');
		print $this->session->userdata('style');
		return $this->session->userdata('style');
	}

	public function prodlist()
	{
		//$this -> load -> helper('url');
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

	

	public function add() {

		$this -> load -> helper('form', 'url');
		$this -> load -> library('form_validation');
		$data['title'] = 'Create a appcfg item';

		$this -> load -> view('app/add');

		//print "indexa";
		return;
	}

}
