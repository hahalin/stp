<?php
class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		//ion_auth included
		$this->load->library('form_validation');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?$this->load->library('mongo_db') :$this->load->database();
		
		$this->load->helper('language');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
				
		//
		
		$this->load->library('login_manager', array('autologin' => FALSE));
		$this->load->library('hgrid');
		$this->output->enable_profiler(TRUE);
	}

	function index()
	{
		//$this->login_manager->check_login(1);
		
		//rewrite chekc_login using ion_auth model
		if( ! $this->db->table_exists('users'))
		{
			redirect('admin/reset_warning');
		}
		else {
			if (!$this->ion_auth->logged_in())
			{
				redirect('auth/login');
			}			
		}
		
		$this->load->view('template_header', array('title' => 'Admin Console', 'section' => 'admin'));
		$this->load->view('admin/index');
		
		$this->load->view('template_footer');
		
	}
	
	function testdeveloper($page)
	{
		$this->load->view('developer-admin/'.$page);
	}
	
	function testjarvis($page)
	{
		$this->load->view('jarvis/'.$page);
	}
	
	
	function testhgrid()
	{
		
		$gd = new hgrid();
		
		$m=new Sec();
		$m->get();
		//$m->get();
		$columns=array();
		foreach($m->fields as $key)
		{
			$columns[]=(object)array(
				'field_name'=>$key,
				'display_as'=>$key
			);
		}
		$list=array();
		foreach ($m as $mi)
		{
			$o=new stdClass();
			foreach($m->fields as $fd)
			{
				
				$o->$fd=$mi->$fd;
			}
			$list[$o->id]=$o;
		}
		$gd->setColumns($columns);
		$gd->setList($list);
		
		$gd->set_post_js('assets/a.js');
		$output = $gd->render();
		
		$this->load->view('hgrid.php',$output);
		
		
	}

	function reset_warning()
	{
		if( ! $this->session->userdata('first_time') &&
				$this->db->table_exists('users') && $this->login_manager->get_user() !== FALSE)
		{
			show_error('The database is already configured');
		}
		$this->load->view('template_header', array('title' => 'First Time Setup', 'section' => 'admin', 'hide_nav' => TRUE));
		$this->load->view('admin/reset', array('first_time' => TRUE));
		$this->load->view('template_footer');
	}

	function resetstp()
	{
			$this->install();	
	}

	/**
	 * Resets the entire Database
	 */
	function reset()
	{
		//switch to stp version  reset;
		$this->install();
		return;
		$this->load->dbforge();
		try {
			// force disabling of g-zip so output can be streamed
			apache_setenv('no-gzip', '1');
		} catch(Exception $e) { /* ignore */ }

		$success = TRUE;

		$first_time = $this->session->userdata('first_time') ||
				( ! $this->db->table_exists('users') && $this->login_manager->get_user() === FALSE);

		if( ! $first_time)
		{
			$this->login_manager->check_login(1);
		}

		$this->session->set_userdata('first_time', TRUE);

		echo $this->load->view('template_header', array('title' => 'Resetting Database', 'section' => 'admin', 'hide_nav' => $first_time), TRUE);
		?><div class="database_setup"><?php
		$this->_message('Creating the Squash database at <strong>' . $this->db->database . '</strong><br/>', '');
		$success = $success && $this->_drop_tables();
		echo("<br/><br/>");
		$success = $success && $this->_create_tables();
		echo("<br/><br/>");
		$success = $success && $this->_init_data();

		?></div><?php
		if($success) {
			?><p><a href="<?php echo site_url('admin/init'); ?>">Continue</a></p><?php
		} else {
			?>An error occurred.  Please reset the database and try again.<?php
		}

		$this->load->view('template_footer');
	}

	function _drop_stptables() {
		$list = file(APPPATH . 'sql/dropstptable/tabledroplist.txt');
		foreach($list as $table) {
			$table = trim($table);
			if(empty($table) || $table[0] == '#') {
				continue;
			}
			if($this->db->table_exists($table)) {
				$this->_message("Dropping table $table...");
				if($this->dbforge->drop_table($table)) {
					echo("done.");
				} else {
					echo("ERROR.");
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	function _drop_tables() {
		$list = file(APPPATH . 'sql/tabledroplist.txt');
		foreach($list as $table) {
			$table = trim($table);
			if(empty($table) || $table[0] == '#') {
				continue;
			}
			if($this->db->table_exists($table)) {
				$this->_message("Dropping table $table...");
				if($this->dbforge->drop_table($table)) {
					echo("done.");
				} else {
					echo("ERROR.");
					return FALSE;
				}
			}
		}
		return TRUE;
	}
	
	function _create_stptables() {
		$this->load->helper('file');
		$path = APPPATH . 'sql/' . $this->db->dbdriver;
		$path = APPPATH . 'sql/stp';
		if( ! file_exists($path)) {
			show_error("ERROR: Unable to automatically create tables for " . $this->db->dbdriver . ' databases.');
		}
		$tables = get_filenames($path);
		foreach($tables as $table) {
			$n = str_ireplace('.sql', '', $table);
			$this->_message("Creating table $n...");
			$sql = file_get_contents($path . '/' . $table);
			if($this->db->query($sql)) {
				echo("done.");
			} else {
				echo("ERROR.");
				return FALSE;
			}
		}
		return TRUE;
	}
	

	function _create_tables() {
		$this->load->helper('file');
		$path = APPPATH . 'sql/' . $this->db->dbdriver;
		if( ! file_exists($path)) {
			show_error("ERROR: Unable to automatically create tables for " . $this->db->dbdriver . ' databases.');
		}
		$tables = get_filenames($path);
		foreach($tables as $table) {
			$n = str_ireplace('.sql', '', $table);
			$this->_message("Creating table $n...");
			$sql = file_get_contents($path . '/' . $table);
			if($this->db->query($sql)) {
				echo("done.");
			} else {
				echo("ERROR.");
				return FALSE;
			}
		}
		return TRUE;
	}
	
	function _loadsecs($filename)
	{
		$handle = fopen($filename, 'r');
		$out = array (); 
		$list=array();
	    $n = 0; 
		$list=array();
		$listb=array();
		
	    while ($d = fgetcsv($handle, 10000)) { 
	        $num = count($d); 
	        for ($i = 0; $i < $num; $i++) { 
	            $out[$n][$i] = $d[$i];
	        }
			$p=new sec();
			$p->name=$out[$n][2];
			$p->code=$out[$n][1];
			$p->save();
			foreach ($p->error->all as $e)
			{
				echo 'save '.$out[$n][2].' error:'.$e.'</br>';
			}
			$list[]=$out;
			$n++;
		}
		fclose($handle);
		return $n;
		
	}
	
	function _loadprovinces($filename)
	{
		$handle = fopen($filename, 'r');
		$out = array (); 
		$list=array();
	    $n = 0; 
		$list=array();
		$listb=array();
		
	    while ($d = fgetcsv($handle, 10000)) { 
	        $num = count($d); 
	        for ($i = 0; $i < $num; $i++) { 
	            $out[$n][$i] = $d[$i];
	        }
			
			$p=new Province();
			$p->name=$out[$n][2];
			$p->code=$out[$n][1];
			
			$s=new Sec();
			$s->get_by_code($out[$n][3]);
			
			if ($s->id)
			{
				$p->save($s);	
			}
			else 
			{
				echo 'save without sec </br>';
				$p->save();
			}
			
			foreach ($p->error->all as $e)
			{
				echo 'save '.$out[$n][2].' error:'.$e.'</br>';
			}
			$list[]=$out;
			$n++;
		}
		fclose($handle);
		return $n;
	}
	

	function _init_stpdata() {
		$this->load->helper('file');
		$success = TRUE;
		$path = APPPATH . 'sql/data/stp';
		$files = get_filenames($path);
		$filelist=array();
		$filelist[]='group.csv';
		$filelist[]='secs.csv';
		$filelist[]='provinces.csv';
		
		foreach($filelist as $file) {
			if( ! strpos($file, '.csv'))
			{
				continue;
			}
			$class = str_ireplace('.csv', '', $file);
			
			if ($class=='secs')
			{
				$this->_message("Importing data for $class ");
				$importfile=	$path . '/' . $file;
				//$num=$this->_load.$class($importfile);
				$num= $this->{'_load'.$class}($importfile);
				echo(" $num $class  were imported.");
			}
			if ($class=='provinces')
			{
				$this->_message("Importing data for $class ");
				$importfile=	$path . '/' . $file;
				//$num=$this->_load.$class($importfile);
				$num= $this->{'_load'.$class}($importfile);
				echo(" $num $class  were imported.");
			}
			
			if ($class =="group")
			{
					$object = new $class();
					$object->load_extension('csv');
					$num = $object->csv_import($path . '/' . $file, '', TRUE, array($this, '_save_object'));
					$n = ($num == 1) ? $class : plural($class);
					echo(" $num $n  were imported.");
				
			}
		}
		
		/*
		$group=new group();
		$group->name="admin";
		$group->save();
		
		$group=new group();
		$group->name="member";
		$group->save();
		*/
		
		return $success;
	}
	
	
	function _init_data() {
		$this->load->helper('file');
		$success = TRUE;
		$path = APPPATH . 'sql/data';
		$files = get_filenames($path);
		foreach($files as $file) {
			if( ! strpos($file, '.csv'))
			{
				continue;
			}
			$class = str_ireplace('.csv', '', $file);
			$this->_message("Importing data for $class ");
			$object = new $class();
			$object->load_extension('csv');
			$num = $object->csv_import($path . '/' . $file, '', TRUE, array($this, '_save_object'));
			$n = ($num == 1) ? $class : plural($class);
			echo(" $num $n  were imported.");
		}

		return $success;
	}

	function _save_object($obj) {
		if(!$obj->save())
		{
			$this->_message('Errors: <ul><li>' . implode('</li><li>', $r->error->all) . '</li></ul>', '');
			return FALSE;
		}
		$this->_message('.', '');
		return TRUE;
	}

	function _message($msg, $lb = '<br/>') {
		ob_start() ;
		echo($lb . $msg);
		ob_flush();
		flush();
	}


   function install()
   {
   		$this->load->dbforge();
		try {
			// force disabling of g-zip so output can be streamed
			apache_setenv('no-gzip', '1');
		} catch(Exception $e) { /* ignore */ }

		$success = TRUE;

		$this->session->set_userdata('first_time', TRUE);

		$first_time=true;
		echo $this->load->view('template_header', array('title' => 'Resetting Database', 'section' => 'admin', 'hide_nav' => $first_time), TRUE);
		?><div class="database_setup"><?php
		$this->_message('Creating the Squash database at <strong>' . $this->db->database . '</strong><br/>', '');
		$success = $success && $this->_drop_stptables();
		echo("<br/><br/>");
		$success = $success && $this->_create_stptables();
		echo("<br/><br/>");
		$success = $success && $this->_init_stpdata();

		?></div><?php
		if($success) {
			?><p><a href="<?php echo site_url('admin/init'); ?>">Continue</a></p><?php
		} else {
			?>An error occurred.  Please reset the database and try again.<?php
		}

		$this->load->view('template_footer');
   }

	/**
	 * Allows the creation of an Administrator
	 *
	 */
	function init($save = FALSE) {
		$first_time = $this->session->userdata('first_time');
		if( ! $first_time) {
			show_error('This page can only be accessed the first time.');
		}
		$user = new User();

		if($save)
		{
			$user->trans_start();
			$user->from_array($_POST, array('name', 'email', 'username', 'password', 'confirm_password'));
			$group = new Group();
			$group->get_by_id(1);
			if($user->save($group)) {
				$user->password = $this->input->post('password');
				if(!$this->login_manager->process_login($user)) {
					show_error('Errors: <ul><li>' . implode('</li><li>', $user->error->all) . '</li></ul><pre>' . var_export($user->error, TRUE) . '</pre>');
				}
				$this->session->unset_userdata('first_time');
				$user->trans_complete();
				redirect('welcome');
			}
		}

		$user->load_extension('htmlform');

		// ID is not included because it is not necessary
		$form_fields = array(
			'Contact Information' => 'section',
			'name' => array(
				'label' => 'Your Name'
			),
			'email',
			'Login Information' => 'section',
			'username',
			'password',
			'confirm_password'
		);

		$this->load->view('template_header', array('title' => 'Set Up Your Account', 'section' => 'admin'));
		$this->load->view('admin/init', array('user' => $user, 'form_fields' => $form_fields));
		$this->load->view('template_footer');
	}

}
