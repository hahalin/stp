<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		//$this->load->library('session');
		
	}

	
	public function index()
	{
		
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		} else {
			$data['user_info'] = $this->ion_auth->user()->row();
			$data['title'] = $data['user_info']->username . "'s Dashboard";
			//$this->load->view('backend/dashboard_view', $data);
			$data['sidetabidx']=1;
			$this->load->view('developer-admin/head',$data);
			$this->load->view('developer-admin/dashboard', $data);
		}
	}
	
	public function inbox()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			$this->session->set_userdata('prior_url',current_url());
			redirect('auth/login', 'refresh');
		} else {
			$data['user_info'] = $this->ion_auth->user()->row();
			$data['title'] = $data['user_info']->username . "'s Dashboard";
			//$this->load->view('backend/dashboard_view', $data);
			$data['sidetabidx']=2;
			$this->load->view('developer-admin/head',$data);
			$this->load->view('developer-admin/inbox', $data);
		}
	}
	
	public function logout() {
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		} else {
			$this->ion_auth->logout();
			redirect('home');
		}
	}
	
	function profile() {
		//Make sure there is a third segment because there is no 'index' for this function
		if ($this->uri->segment(3)) {
			//Make sure they are logged in
			if (!$this->ion_auth->logged_in()) {
				//redirect them to the login page
				redirect('auth/login', 'refresh');
			} else {
				if ($this->uri->segment(3) == "edit") {
						
					$this->load->helper('form');
						
					//Edit the profile
					$data['user_info'] = $this->ion_auth->user()->row();
					$this->output->enable_profiler(TRUE);
					$data['title'] = "Editing Profile";
					$this->load->view('backend/edit_profile', $data);
				} else if ($this->uri->segment(3) == "update") {
					//Updating user profile
					$user_id = $this->ion_auth->user()->row()->id;
					
					$data = array(
						'company' => $this->input->post('company'),
						'phone' => $this->input->post('phone'),
						'biography' => $this->input->post('biography')
					);
					
					if ($this->ion_auth->update($user_id, $data)) {
						redirect('dashboard');
					} else {
						redirect('dashboard/profile/edit');
					}
				}
			}
		} else {
			redirect('home');
		}
	}
	
	function account() {
		//Make sure there is a third segment because there is no 'index' for this function
		if ($this->uri->segment(3)) {
			//Make sure they are logged in
			if (!$this->ion_auth->logged_in()) {
				//redirect them to the login page
				redirect('auth/login', 'refresh');
			} else {
				if ($this->uri->segment(3) == "edit") {
					$this->load->helper('form');
					//Edit the profile
					$data['user_info'] = $this->ion_auth->user()->row();
					$data['title'] = "Editing Account Information";
					$this->load->view('backend/edit_account', $data);
				} else if ($this->uri->segment(3) == "update") {
					//Updating user profile
					$user_id = $this->ion_auth->user()->row()->id;
					
					$data = array(
						'email' => $this->input->post('email'),
						'first_name' => $this->input->post('fname'),
						'last_name' => $this->input->post('lname')
					);
					
					if ($this->ion_auth->update($user_id, $data)) {
						redirect('dashboard');
					} else {
						redirect('dashboard/account/edit');
					}
				}
			}
		} else {
			redirect('home');
		}
	}
    
	function bzcategory($id,$page=1)
	{
		$data=array();
		$data['user_info'] = $this->ion_auth->user()->row();
		//$data['title'] = $data['user_info']->username . "'s Dashboard";
		$data['title']= '企業名冊';
		
		
	    $ca=new bzcategory();
		$ca->where_related('parent');
		$ca->distinct();
		$ca->get();
		
		$list=array();
		$pagesize=10;
		foreach($ca as $item)
		{
			//echo $item->name;
			$o=new stdClass();
			$o->id=$item->id;
			$o->name=$item->name;
			$o->active=false;
			if ($id==$item->id)
			{
				$o->active=true;
				$data['activebread']=$item->name.' - 未分細類';
				$data['companies']=$item->company->get_paged($page,$pagesize);
			}
			
			$children=new bzcategory();
			$children->where_related_parent('id',$o->id)->get();
			$childlist=array();
			
			if (count($children)>0)
			{
				//$o->cmpcount=count($children);
			}
			else 
			{
				//$o->cmpcount=$item->company->count();
				
			}
			$o->cmpcount=$item->company->count();
			
			if($o->cmpcount > 0 )
			{
				$o_child=new stdClass();
				$o_child->id=$item->id;
				$o_child->name='未分細類';
				$o_child->active=false;	
				$o_child->cmpcount=$o->cmpcount;
				$childlist[]=$o_child;	
			}
			
			foreach($children as $childitem)
			{
				$o_child=new stdClass();
				$o_child->id=$childitem->id;
				$o_child->name=$childitem->name;
				$o_child->active=$childitem->false;
				
				$cmp=new company();
				
				$cmpcount=$childitem->company->count();	
				$o_child->cmpcount=$cmpcount;
				if ($id==$childitem->id)
				{
					$o_child->active=true;
					$data['activebread']=$o->name.' - '.$childitem->name;
					$data['companies']=$childitem->company->get_paged($page,$pagesize);
					$o->active=true;
				}				
				$childlist[]=$o_child;
			}
			$o->children=$childlist;
			$list[]=$o;	
		}
		
		$cmplist=$data['companies'];
		
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
			if ($id==$item->id)
			{
				
			}
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
		$data['category_link']=site_url('dashboard/bzcategory/');
		
		$data['header']='企業名冊';
		$data['bzcategory']=$list;	
		
		$data['baselink']=site_url('dashboard/bzcategory/');
		$data['mylink']=site_url('dashboard/bzcategory/'.$id);
		
		$data['category_id']=$id;
		
		$data['$sidetabidx']=1;
		$this->load->view('developer-admin/head',$data);
		$this->load->view('developer-admin/bzcategory',$data);
		return;
		$this -> load -> view('jarvis/bzcategories',$data);
		
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */