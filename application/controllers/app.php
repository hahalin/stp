<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class app extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('jsondata');
		//$this -> load -> model('appcfg_model');
	}

	public function index() {

	    $this->output->enable_profiler(TRUE);
		$user_id = $this->session->userdata('id');
		$user_name = $this->session->userdata('name');
    	$is_admin = $this->session->userdata('is_admin');
    	$isLoggedIn = $this->session->userdata('isLoggedIn');

        /*
        $isLoggedIn =1;
        $is_admin=0;
        $user_id=2;
        $user_name="TestUser";
		 */

        $data['user_id']=$user_id;
		$data['user_name']=$user_name;
		$data['is_admin']=$is_admin;
		$data['isLoggedIn']=$isLoggedIn;

		$this -> load -> helper('form');
		$data['error']=$this->session->flashdata('error');
		//$data['error']=$this->session->userdata('error');

		$c=new category();
		$c->where_not_in_related('parentcategory');
		$c->get();

		$tree=array();
		foreach($c as $ci)
		{
			$o=new stdClass();
			$o->text=$ci->name;
			$o->id=$ci->id;

			$subc=new category();
			$subc->where_related_parentcategory('id',$ci->id);
			$subc->get();
			$subarray=array();
			foreach($subc as $subci)
			{
				$subo=new stdClass();
				$subo->text=$subci->name;
				$subo->id=$subci->id;
				$subarray[]=$subo;
			}
			$o->children=$subarray;
			$tree[]=$o;

		}

		$data['tree']=$tree;


		$cmpgroup=array();

		$bc=new bzcategory();
		//$bc->where_not_in_related('parent');
		//$bc_cmp=$bc->company;
		//$bc_cmp->where_related('bzcategory','id','$(parent).id');

		$bc->where_related_company('id is not null');
		$bc->order_by('rand()')->limit(6);
		$bc->distinct();
		$bc->get();
		$btree=array();
		foreach($bc as $ibc)
		{
			$bo=new stdClass();
			$bo->text=$ibc->name;
			$bo->id=$ibc->id;

			$cmplist=array();

			$cmp=new company();
			$cmp->where_related_bzcategory('id',$bo->id);
			$cmp->order_by('rand()')->limit(3)->get();

		    foreach ($cmp as $cmpi)
			{
				$co=new stdClass();
				$co->name=$cmpi->name;
				$co->id=$cmpi->id;
				$cmplist[]=$co;
			}

			$bo->children=$cmplist;

			$btree[]=$bo;
		}

		$cmpgroup['hot']=$btree;

		//category begin
		$bc2=new bzcategory();
		$bc2->where_related_company('id is not null');
		$bc2->order_by('rand()')->limit(6);
		$bc2->distinct()->get();
		$list=array();
		foreach($bc2 as $item)
		{
			$o=new stdClass();
			$o->id=$item->id;
			$o->name=$item->name;

			$cmp=new company();
			$cmp->where_related_bzcategory('id',$o->id);
			$cmp->order_by('rand()')->limit(3)->get();
			$sublist=array();
			foreach($cmp as $subitem)
			{
				$subo=new stdClass();
				$subo->id=$subitem->id;
				$subo->name=$subitem->name;
				$sublist[]=$subo;
			}
			$o->children=$sublist;
			$list[]=$o;
		}

		$cmpgroup['category']=$list;
		//category end

		//sec start
		$sec=new sec();
		$sec->get();
		$list=array();
		foreach($sec  as $item)
		{
			$o=new stdClass();
			$o->id=$item->id;
			$o->name=$item->name;

			$p=new province();
			$p->where_related_sec('id',$item->id);
			//$p->where_related_company('')
			$p->order_by('rand()')->limit(5);
			$p->get();

			$cmp=new company();
			//$cmp->where_related_province('id',$p->id);
			$sublist=array();

			$cmp->where_related('province/sec','id',$item->id);
			$cmp->order_by('rand()')->limit(1)->get();
			foreach($cmp as $subitem)
			{
				$subo=new stdClass();
				$subo->id=$subitem->id;
				$subo->name=$p->name.'-'.$subitem->name;
				$sublist[]=$subo;
			}

			$cmp->where_related('province/sec','id',$item->id);
			$cmp->order_by('rand()')->limit(1)->get();
			foreach($cmp as $subitem)
			{
				$subo=new stdClass();
				$subo->id=$subitem->id;
				$subo->name=$p->name.'-'.$subitem->name;
				$sublist[]=$subo;
			}

			$cmp->where_related('province/sec','id',$item->id);
			$cmp->order_by('rand()')->limit(1)->get();
			foreach($cmp as $subitem)
			{
				$subo=new stdClass();
				$subo->id=$subitem->id;
				$subo->name=$p->name.'-'.$subitem->name;
				$sublist[]=$subo;
			}

			$o->children=$sublist;
			$list[]=$o;
		}

		$cmpgroup['sec']=$list;

		//sec end

		//province start

		$p=new province();
		$p->get();
		$list=array();
		foreach($p  as $item)
		{
			$o=new stdClass();
			$o->id=$item->id;
			$o->name=$item->name;

			$cmp=new company();
			$sublist=array();

			$cmp->where_related('province','id',$item->id);
			$cmp->order_by('rand()')->limit(3)->get();
			foreach($cmp as $subitem)
			{
				$subo=new stdClass();
				$subo->id=$subitem->id;
				$subo->name=$subitem->name;
				$sublist[]=$subo;
			}
			$o->children=$sublist;
			$list[]=$o;
		}

		$cmpgroup['province']=$list;


		//province end


		$data['cmpgroup']=$cmpgroup;

		//$data['btree']=$btree;

		//category begin
		$cb=new category();
		$cb->where_related('parentcategory');
		$cb->distinct();
		$cb->get();
		$cblist=array();
		$pagesize=10;
		foreach($cb as $item)
		{
			$o=new stdClass();
			$o->id=$item->id;
			$o->name=$item->name;
			$o->active=false;
			$o->active=false;

			$children=new category();
			$children->where_related_parentcategory('id',$o->id)->get();
			$childlist=array();
			foreach ($children as $citem)
			{
				$childo=new stdClass();
				$childo->id=$citem->id;
				$childo->name=$citem->name;
				$childo->active=false;
				$childlist[]=$childo;
			}
			$o->count=count($childlist);
			$o->children=$childlist;
			$cblist[]=$o;
		}
		$data['category']=$cblist;
		$data['category_link']=site_url('productcrl/category/');


		//category end



		$this -> load -> view('main',$data);


		return;

		print '<br>';
		print_r($this->session->userdata);
		print '</br>';


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

	public function pricing()
	{
		$this->load->view('header');

		$data['css']=array(
			'plan',
			'adminia-1.1'
		);

		$this->load->view('pricing',$data);

		$this->load->view('footer');
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
		print '<pre>';
		print_r($this->session->userdata);
		print '</pre>';
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
        $o=new stdClass;
        $o->success=true;
        $o->msg=$msg;
		print json_encode($o);


	}

	public function foo($p="default")
	{
	   print "foo";
	}

	public function testq()
	{
		$this->load->model('appcfg_model');
		$this->load->model('another_model');
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
