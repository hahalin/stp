<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this -> load -> model('appcfg_model');
	}

	public function index() {
		$this -> load -> view('welcome_message');
	}

	public function app($p="add") {

		$this -> load -> helper('form');
		$this -> load -> library('form_validation');

		$data['title'] = 'Create a appcfg item';

		$this -> form_validation -> set_rules('title', 'Title', 'required');
		$this -> form_validation -> set_rules('text', 'text', 'required');

		$this->load->view('app/add');

		print "indexa";
		return;
	}

	public function foo($pa = "default") {
		$this -> load -> library('session');

		$newdata = array('username' => 'frank', 'email' => 'frank@a.b.c', 'logged_in' => TRUE);
		session_start();
		$_SESSION["a"] = "se value a";
		$this -> session -> set_userdata($newdata);

		print "foo" . $pa;
		print '</br>';
		print "<pre>";
		print_r($this -> session -> userdata);
		print '</pre>';
	}

	public function getsv() {
		session_start();
		print $_SESSION["a"];
	}

	public function addcfg() {

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
