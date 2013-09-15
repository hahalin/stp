<?php

Class Productcrl extends CI_Controller{
	
	function __construct()
	{
		
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	
	function index()
	{
		
		
		
		$data=array();
		
		$data['title']='Product Controller Example';
		
		$act=array();
		$act['title']='Add product group';
		$act['url']='productcrl/create_group';
		$data['act'][]=$act;

		$act['title']='Add product';
		$act['url']='productcrl/create_product';
		$data['act'][]=$act;
		
		
		$this->load->view('header');
		$this->load->view('productcrl',$data);
		$this->load->view('footer-base');
	}
	function create_product()
	{
		header('Content-Type:text/html; charset=utf-8');	
		echo '<h2>Create Products</h2>';
		$m=new productgroup();
		$m->order_by('rand()')->limit(1)->get();
		
		$i=1;
		for ($i=1;$i<6;$i++)
		{
			$p=new product();
			$p->productname='productname'.$i;
			
			$pm=new product();
			//$pm->group_by('productname')->where_related('productgroup','id',$m->id)->having('productname',$p->productname)->having('COUNT(id) > 0')->get();
			$m->order_by('rand()')->limit(1)->get();
			$pm->group_by('productname')->having('productname',$p->productname)->get_by_related($m);
			
			if ($pm->exists())
			{
				echo 'already exists in group</br>';	
			}
			else 
			{  
				$p->save($m);
			}
			//$p->save($m);
			//$p->save();
			//$this->_showerr($p);
		}
		
		echo '<p><a href="' . site_url('productcrl') . '">Back to Product Controller</a></p>';		
	}
	
	function create_group()
	{
		header('Content-Type:text/html; charset=utf-8');	
		echo '<h1>Create Product Groups</h1>';
		$m=new productgroup();
		$m->groupname='LOCAL';
		$m->save();
		$this->_showerr($m);
		
		$m=new productgroup();
		$m->groupname='ISSA';
		$m->save();
		$this->_showerr($m);

		$m=new productgroup();
		$m->groupname='IMPA';
		$m->save();
		$this->_showerr($m);
		
		echo '<p><a href="' . site_url('productcrl') . '">Back to Product Controller</a></p>';
		
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
		
		$pics->product=$m;  
		
	}	
	
}


?>