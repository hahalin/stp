<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jsondata {

    public function __construct()
    {
        // Do something with $params
    }
	
	public function datawrapper($list)
	{
		$obj=new stdClass();
		if (is_array($list) && (count($list)>0))
		{
		  $obj->count=count($list);
		  $obj->data=$list;
		}
		return $obj;
	}
}