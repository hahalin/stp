<?php

Class Productcrl extends CI_Controller{
	
	function __construct()
	{
		
		parent::__construct();
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