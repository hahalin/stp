<?php

//require_once(APPPATH.'libraries/crypt/Bcrypt.php');

class category_m extends CI_Model {

	function list_category($pid=0, $level = 1) {
		$this -> db -> from('category');
		$this -> db -> where(array('pid' => $pid));
		//$this -> db -> limit($num_posts);
		//$this -> db -> order_by('createdDate', 'desc');

		$list = $this -> db -> get() -> result_array();

		if (is_array($list) && count($list) > 0) {
			return $list;
		}
		else 
		{
			$_list=array();
			for ($i=0;$i<10;$i++)
			{
				$obj=new stdClass();
				$obj->title='title'.($i+1);	
				$obj->id=($i+1);
				array_push($_list,$obj);
			}
			return $_list;
		}
		
		return false;
	}

}
