<?php

Class Companycrl extends CI_Controller{
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->helper('url');
		
		$this->load->library('jsondata');
		//header('Content-Type:text/html; charset=utf-8');
		$this->output->enable_profiler(false);
	}
	
	function json()
	{
		header('Content-Type:text/json; charset=utf-8');
		$this->output->enable_profiler(false);
		$list=array();
		for ($i=0;$i<3;$i++)
		{
			$o=new stdClass;
			$o->id=$i+1;
			$o->text="text".($i+1);
			$list[]=$o;
		}
		
		echo json_encode($list);
	}
	
	function company($id)
	{
		//header('Content-Type:text/html; charset=utf-8');
		$this->output->enable_profiler(false);
		$company=new company();
		$company->where('id',$id);
		$company->get();
		$this->load->view('header_base');
		if ($company->id)
		{
			$data=array();
			$data['name']=$company->name;
			$data['addr']=$company->addr;
			$data['web']=$company->web;
			$data['tel']=$company->tel;
			$data['email']=$company->email;
			//$data['tel']=$company->tel;
			//echo $company->name;
			echo '<pre>';
			//print_r ($company);
			echo '</pre>';
			$this->load->view('company_profile',$data);
		}
		//$this->load->view('footer_base');
	}
	
	
	function category($id,$page=1)
	{
		//$page=1;
		//$this->load->library('pagination');
		$data=array();
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
				//echo "active";
				$o->active=true;
				$data['activebread']=$item->name.' - 未分細類';
				$data['companies']=$item->company->get_paged($page,$pagesize);
				//$data['category_id']=$item->id;	
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
				//$o_child->cmpcount=$cmpcount;
				$o_child->cmpcount=$cmpcount;
				if ($id==$childitem->id)
				{
					$o_child->active=true;
					$data['activebread']=$o->name.' - '.$childitem->name;
					//$data['activebread']=$childitem->name;
						
					//$cmp->where_related_bzcategory('id',$o_child->id)->get();
					//$o_child->cmplist=$cmp;
					$data['companies']=$childitem->company->get_paged($page,$pagesize);
					$o->active=true;
				}				
				$childlist[]=$o_child;
			}
			$o->children=$childlist;
			$list[]=$o;	
			//echo "</br>";
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
		$data['category_link']=site_url('productcrl/category/');
		
		//$method=$this->router->fetch_method();
		//$class=$this->router->fetch_class();
		//$config['base_url'] = $base_url().'/'.$classn.'/'.$method;
		//$config['total_rows'] = 200;
		//$config['per_page'] = 20; 
		//$this->pagination->initialize($config); 
		//echo $this->pagination->create_links();
		
		//$this -> load -> view('header',$data);
		$data['header']='企業分類';
		$data['bzcategory']=$list;	
		
		$data['baselink']=site_url('companycrl/category/');
		$data['mylink']=site_url('companycrl/category/'.$id);
		
		//$this -> load -> view('header_base',$data);
		//$this -> load -> view('bzcategory',$data);
		$data['category_id']=$id;
		
		$this->load->view('developer-admin/bzcategory',$data);
		return;
		$this -> load -> view('jarvis/bzcategories',$data);
		
		//echo "</div></body></html>";
		//$this -> load -> view('pfooter',$data);
				
		//echo $id;
	}
	
	function clist()
	{
		$this->load->view('header');
		$data=array();
		$cmp=new company();
		$cmp->order_by('rand()')->limit(1)->get();
		$data['name']=$cmp->name;
		$data['web']=$cmp->web;
		$data['web']=$cmp->email;
		$data['addr']=$cmp->addr;
		$data['tel']=$cmp->tel;
		
		$data['category']=$cmp->bzcategory->name;
		
		$this->load->view('company_profile',$data);
		$this->load->view('footer_base');
	}
	
	function _showerr($model)
	{
		
		foreach ($model->error->all as $e)
		{
			echo $e .'</br>';
		}				
	}

	function product($act='add',$pa='')
	{
		
		$m=new Product();
		
		$m->productname="test producta";
		
		$m->save();
		
		$this->_showerr($m);				
		
		
		$pid=$m->id;
		
		$dpics=new Productpic();
		
		//$pics->  
		
	}		
}

?>