<?php
//http://chris-schmitz.com/codeigniter-base-model/

class appcfg_model extends MY_Model {

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
	
	public function q()
	{
		
		$query = $this->db->get('appcfg');
		
		
		$this->another_model->output();
		
		return $query;
		
	}
	public function another_output()
	{
		
	}
}