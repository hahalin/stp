<?php

Class CategoryC extends  CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		//$this->output->enable_profiler(TRUE);
	}
	
	function _bztree(&$list,$pid)
	{
		$cp=new Bzcategory();
		$cp->get_by_id($pid);
		if($cp)
		{
			$c=new Bzcategory();
			$c->order_by('id');
			$c->where_related('parent','id',$cp->id)->get();
			foreach($c as $ci)
			{
				$o=new stdClass();
				$o->parentid=$cp->id;		
				$o->id=$ci->id;
				$o->name=$ci->name;
				$list[]=$o;
				$this->_bztree($list,$o->id);
			}
		}
	}
	function bztree($pid='')
	{
		if (isset($_POST['node']))
		{			
			$pid=$_POST['node'];
			if ($pid=='treeroot') 
			{
				$pid='';
			}
		}
		if (isset($_GET['node']))
		{			
			$pid=$_GET['node'];
			if ($pid=='treeroot') 
			{
				$pid='';
			}
		}
		header('Content-Type:text/html; charset=utf-8');
		$c=new Bzcategory();
		$c->order_by('id');
		//$c->get();
		if ($pid=='') 
			$pid=null;
		$c->where_related('parent','id',$pid)->get();
		$list=array();
		//$pid=$pid==null?'':$pid;
		//$pid=$pid==''?null:$pid;
		
		foreach($c as $ci)
		{
			$o=new stdClass();
			//echo $ci->parent->get()->id.'</br>';
			
			//if ($ci->parent->get()->id==$pid)
			{
				//var_dump($ci->id.' '.$ci->parent->get()->id);
				//var_dump($ci->id.' '.$ci->parent->get()->id);
				//$o->parent=$ci->parent->get()->id;
				//if ($ci->parent->get()->id=='')
				//{
				//	$o->parentstr='null';
				//}
				$o->id=$ci->id;
				$ch=new Bzcategory();
				$ch->select_func('COUNT', '*', 'count');
				$ch->where_related('parent','id',$o->id)->get();
				//$o->childcount=$ch->count;
				$o->leaf=$ch->count==0;
				$o->text=$ci->name.'('.$ch->count.')';				
				$list[]=$o;
				
				//$this->_bztree($list, $o->id);
			}
		}
		echo json_encode($list);
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
