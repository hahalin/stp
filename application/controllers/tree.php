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
	
}

?>