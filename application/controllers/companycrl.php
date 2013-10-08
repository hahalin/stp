<?php

Class Companycrl extends CI_Controller{
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->library('jsondata');
		//header('Content-Type:text/html; charset=utf-8');
		$this->output->enable_profiler(TRUE);
	}
	
	function category($id)
	{
		$data=array();
	    $ca=new bzcategory();
		$ca->where_related('parent');
		$ca->distinct();
		$ca->get();
		
		
		$list=array();
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
				$data['activebread']=$item->name;
				$data['companies']=$item->company->get();	
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
					$data['activebread']=$childitem->name;
					//$cmp->where_related_bzcategory('id',$o_child->id)->get();
					//$o_child->cmplist=$cmp;
					$data['companies']=$childitem->company->get();
					$o->active=true;
				}				
				$childlist[]=$o_child;
			}
			$o->children=$childlist;
			$list[]=$o;	
			//echo "</br>";
		}
		
		
		//$this -> load -> view('header',$data);
		$data['bzcategory']=$list;
		
		//$this -> load -> view('header_base',$data);
		//$this -> load -> view('bzcategory',$data);
		
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