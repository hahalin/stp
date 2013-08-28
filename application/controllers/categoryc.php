<?php

Class CategoryC extends  CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		$this->output->enable_profiler(TRUE);
	}
	
	function removecompany()
	{
		$c=new Company();
		$c->get();
		$c->truncate();
	}
	
	function dir($entity,$top=0)
	{
		header('Content-Type:text/html; charset=utf-8');
		
		$c=new $entity();
		
		//return;
		
		
		if ($top==0)
		{
			$c->get();
		}
		else 
		{
			$c->get($top,0);
		}
		$list=array();
		foreach($c as $ci)
		{
			$obj=new stdClass();
			foreach ($c->fields as $key)
			{
				$obj->$key=$c->$key;
			}
			//$obj->id=$ci->id;
			//$obj->name=$ci->name;
			$list[]=$obj;
			print $ci->name.'</br>';
		}
		
		echo json_encode($list);
		
	}
	
	
}

?>
