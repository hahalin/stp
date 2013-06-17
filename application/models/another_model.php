<?php
//http://chris-schmitz.com/codeigniter-base-model/

class another_model extends MY_Model {

    var $primary_table = 'appcfg';

    var $validate_field_existence = false;

    var $fields = array(
        'id',
        'code',
        'v',
        'is_active',
        'date_created',
        'date_modified'
    );

    var $required_fields = array(
        'code',
        'v'
    );
	
	public function output()
	{
		
		print "another model output</br>";
		
		
	}
}