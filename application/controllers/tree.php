<?php

class tree extends CI_Controller {

	function index(){
		
		
		$list=Array();
		
		for ($i=0;$i<10;$i++)
		{
			$o=new stdClass();
			$o->text=($i+1);
			$o->textv=($i+1).'v';
			$o->leaf=true;
			$o->id=($i+1);
			
			$list[]=$o;
		}
		
		echo json_encode($list);
		
		
	}
	
	function sec()
	{
		header('Content-Type:text/html; charset=utf-8');
		
		$this->output->enable_profiler(TRUE);
		$c=new sec();
		//$c->where_not_in_related('parent');
		$c->get();
		
		$ary=array();
		foreach($c as $ci)
		{
			$o=new stdClass();
			$o->text=$ci->name;
			$o->id=$ci->id;
			
			$subc=new province();
			$subc->where_related_sec('id',$ci->id)->get();
			$subary=array();	
			foreach($subc as $subci)
			{
				
				$subo=new stdClass();
				$subo->text=$subci->name;
				$subo->id=$subci->id;
				$subo->leaf=true;
				$subary[]=$subo;
				
			}
			$o->leaf = count($subary)==0?true:false;
			if (!$o->leaf)
			{
				$o->children=$subary;
				$o->text=$o->text.'('.count($subary).')';
			}
			$ary[]=$o;
		}
		
		echo '<pre>';
		print_r($ary);
		echo '</pre>';
	}
	
	function bzcategory()
	{
		header('Content-Type:text/html; charset=utf-8');
		
		$this->output->enable_profiler(TRUE);
		$c=new bzcategory();
		$c->where_not_in_related('parent');
		$c->get();
		
		$ary=array();
		foreach($c as $ci)
		{
			$o=new stdClass();
			$o->text=$ci->name;
			$o->id=$ci->id;
			
			$subc=new bzcategory();
			$subc->where_related_parent('id',$ci->id)->get();
			$subary=array();	
			foreach($subc as $subci)
			{
				
				$subo=new stdClass();
				$subo->text=$subci->name;
				$subo->id=$subci->id;
				$subo->leaf=true;
				$subary[]=$subo;
				
			}
			$o->leaf= count($subary)==0?true:false;
			if (!$o->leaf)
			{
				$o->children=$subary;
				$o->text=$o->text.'('.count($subary).')';
			}
			$ary[]=$o;
		}
		
		echo '<pre>';
		print_r($ary);
		echo '</pre>';
	}
	
	function category()
	{
		header('Content-Type:text/html; charset=utf-8');
		
		$this->output->enable_profiler(TRUE);
		$c=new category();
		$c->where_not_in_related('parentcategory');
		$c->get();
		
		$ary=array();
		foreach($c as $ci)
		{
			$o=new stdClass();
			$o->text=$ci->name;
			$o->id=$ci->id;
			
			$subc=new category();
			$subc->where_related_parentcategory('id',$ci->id)->get();
			$subary=array();	
			foreach($subc as $subci)
			{
				
				$subo=new stdClass();
				$subo->text=$subci->name;
				$subo->id=$subci->id;
				$subo->leaf=true;
				$subary[]=$subo;
				
			}
			$o->leaf= count($subary)==0?true:false;
			if (!$o->leaf)
			{
				$o->children=$subary;
				$o->text=$o->text.'('.count($subary).')';
			}
			$ary[]=$o;
		}
		
		echo '<pre>';
		print_r($ary);
		echo '</pre>';
	}
	
}

?>