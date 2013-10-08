<?php

/**
 * Category Class
 * Used to organize Bugs
 *
 * @license 	MIT License
 * @category	Models
 * @author  	Phil DeJarnett
 * @link    	http://www.overzealous.com/dmz/
 */
class Bzcategory extends DataMapper {

	// --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------

	public $has_many = array(
		'parent'=>array(
			'class'=>'bzcategory',
			'other_field'=>'bzcategory',
			'join_table'=>'bzcategories_parents'
		),
		'bzcategory'=>array(
			'class'=>'parentcategory',
			'other_field'=>'parent',
			'join_table'=>'bzcategories_parents'
		),
		'bzcategorycode'=>array(
			'class'=>'bzcategorycode',
			'other_field'=>'bzcategory',
			'join_table'=>'bzcategorycodes'
		),
		'company'=>array(
		  'class'=>'company',
		  'join_table'=>'bzcategories_companies'
		)
	);
	
	// --------------------------------------------------------------------
	// Validation
	// --------------------------------------------------------------------	
	
	public $validation = array(
		'name' => array(
			'rules' => array('required', 'trim', 'unique', 'max_length' => 40)
		)
	);
	
	// Default to ordering by name
	public $default_order_by = array('name');
	
	// --------------------------------------------------------------------	
	
	/**
	 * Returns the name of this status.
	 * @return $this->name
	 */
	function __toString()
	{
		return empty($this->name) ? $this->localize_label('unset') : $this->name;
	}
}

/* End of file category.php */
/* Location: ./application/models/category.php */