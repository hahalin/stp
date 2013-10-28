<?php

Class Rfqcrl extends  CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->output->enable_profiler(TRUE);
	}


	function _showerr($model)
	{
		
		foreach ($model->error->all as $e)
		{
			echo $e .'</br>';
		}				
	}

	function createrfqstatus()
	{
		$m=new rfqstatus();
		$m->name='initial';
		$m->save();
		$this->_showerr($m);
		
		$m=new rfqstatus();
		$m->name='received';
		$m->save();
		$this->_showerr($m);
		
		$m=new rfqstatus();
		$m->name='canceled';
		$m->save();
		$this->_showerr($m);
		
		echo '<p><a href="' . site_url('rfqcrl') . '">Back to Productcrl</a></p>';
		
		
	}

    function index()
	{

		$data=array();
		
		$data['title']='RFQ Controller Example';
		
		$act=array();
		$act['title']='Add rfqstatus';
		$act['url']='rfqcrl/createrfqstatus';
		$data['act'][]=$act;

		$this->load->view('header');
		$this->load->view('rfqcrl',$data);
		$this->load->view('footer_base');
		
	} 	
	
	
	
}
?>