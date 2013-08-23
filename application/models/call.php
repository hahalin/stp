<?php

/**
 * Calls DataMapper Model
 *
 * The core class for the application
 *
 * @license		MIT License
 * @category	Models
 * @author  	Frank
 * @link    	http://
 */
class Call extends DataMapper {
	// --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------
	
 	var $created_field = 'created';
	 
	/*
 	
    var $updated_field = 'updated_on';
    
	var $local_time = TRUE;
    var $unix_timestamp = TRUE;
	*/
	
	public $has_one=array(
		'caller'=>array(
			'class'=>'user',
			'other_field'=>'hadcalled'
		),
		'receiver'=>array(
			'class'=>'user',
			'other_field'=>'becalled'
		)
	); 	
	
	 
	function __construct($id = NULL)
    {
    	//$this->created_field='created';
		//$this->local_time=true;
		//$this->unix_timestamp=true;
        parent::__construct($id);
		$icnt=1;
		$this->select_max('billid')->where('billid like',date('Ymd').'%')->limit(1);
		$this->get();
		if ($this->billid !== '')
		{
			$icnt=(int)substr($this->billid,-5)+1;
		}
		$this->billid=date('Ymd').str_pad($icnt,5,'0',STR_PAD_LEFT);
		
    }
	
}
