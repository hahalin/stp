<?php

//ssl pwd : ha242424

Class Productcrl extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
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

		$act['title']='Add product def table';
		$act['url']='productcrl/create_productdftb';
		$data['act'][]=$act;
		
		$act['title']='Add product def table columns';
		$act['url']='productcrl/create_productdftbcol';
		$data['act'][]=$act;
		
		$this->load->view('header');
		$this->load->view('productcrl',$data);
		$this->load->view('footer_base');
	    
	}
	
	//create def table columns
	function create_productdftbcol()
	{
		$this->output->enable_profiler(TRUE);
		
		$ptb=new prdtb();
				
		$ptb->order_by('rand()')->limit(1)->get();
		
		echo 'ptb:'.$ptb->title.'</br>';
		
		$col=new prdtbcol();
		
		$dt=new DateTime('NOW');
		
		$timezone='UP8';
		
		//date_default_timezone_set('UTC');
		
		//date_default_timezone_set('UP8');
		
		//date_default_timezone_set('Asia/Brunei');
		
		date_default_timezone_set('GMT');
		
		$now=time();
		
		$gmt=local_to_gmt($now);
		
		$t=gmt_to_local(time(),$timezone,false);
		
		$datestring = "%Y %m %d %H %i %s";
		
		echo mdate($datestring,$t).'</br>';
		
		date_default_timezone_set('Asia/Brunei');
		
		echo mdate($datestring,time()).'</br>';
						
		//echo standard_date('DATE_ATOM',time()).'</br>';
		
		//echo unix_to_human($t); //->format('YmdGis');
		
		return; 
		
		$now=time();
		
		$col->col_name='test'.$now->format('YmdGis');
		
		$col->save($ptb);
		
		$this->_showerr($col);
		
		$this->_showback();
	}
	
	
	//create def table
	function create_productdftb()
	{
		$this->output->enable_profiler(TRUE);
		
		$p=new product();
		
		$p->order_by('rand()')->limit(1)->get();
		
		echo 'get product '. $p->productname . '</br>';
		
		echo 'tb count='.$p->getdftbcount().'</br>';
		$icnt=$p->getdftbcount()+1;
		
		$ptb=new prdtb();
		$ptb->seqno=$icnt;
		$ptb->title=$p->id.'-'.'tb'.$icnt;
		$ptb->save($p);
		
		$this->_showerr($ptb);
		echo '<p><a href="' . site_url('productcrl') . '">Back to Productcrl</a></p>';
		
		
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

	function _showback()
	{
		echo '<p><a href="' . site_url('productcrl') . '">Back to Productcrl</a></p>';
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