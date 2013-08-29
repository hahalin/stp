<?php

/*

 author:Frank
 2013/8/27
 create a library , input datamapper model based data, 
 output datatable ui. 
  
*/

class hgrid_states 
{
	protected $states = array(
		0	=> 'unknown',
		1	=> 'list',
		2	=> 'add',
		3	=> 'edit',
		4	=> 'delete',
		5	=> 'insert',
		6	=> 'update',
		7	=> 'ajax_list',
		8   => 'ajax_list_info',
		9	=> 'insert_validation',
		10	=> 'update_validation',
		11	=> 'upload_file',
		12	=> 'delete_file',
		13	=> 'ajax_relation',
		14	=> 'ajax_relation_n_n',
		15	=> 'success',
		16  => 'export',
		17  => 'print'
	);
	
protected function get_method_name()
	{
		$ci = &get_instance();		
		return $ci->router->method;
	}
	
	protected function get_controller_name()
	{
		$ci = &get_instance();		
		return $ci->router->class;
	}	

	protected function getStateCode()
	{
		$state_string = $this->get_state_info_from_url()->operation;
		
		if( $state_string != 'unknown' && in_array( $state_string, $this->states ) )
			$state_code =  array_search($state_string, $this->states);
		else
			$state_code = 0;
		
		return $state_code;
	}

	public function getState()
	{
		return $this->states[$this->getStateCode()];
	}
	

	protected function get_state_info_from_url()
	{
		$ci = &get_instance();
		
		$segment_position = count($ci->uri->segments) + 1;
		$operation = 'list';
		
		$segements = $ci->uri->segments;
		foreach($segements as $num => $value)
		{
			if($value != 'unknown' && in_array($value, $this->states))
			{
				$segment_position = (int)$num;
				$operation = $value; //I don't have a "break" here because I want to ensure that is the LAST segment with name that is in the array.
			}
		}
		
		$function_name = $this->get_method_name();
		
		if($function_name == 'index' && !in_array('index',$ci->uri->segments))
			$segment_position++;
		
		$first_parameter = isset($segements[$segment_position+1]) ? $segements[$segment_position+1] : null;
		$second_parameter = isset($segements[$segment_position+2]) ? $segements[$segment_position+2] : null;		
		
		return (object)array('segment_position' => $segment_position, 'operation' => $operation, 'first_parameter' => $first_parameter, 'second_parameter' => $second_parameter);
	}

	protected function get_method_hash()
	{
		$ci = &get_instance();
		
		$state_info = $this->get_state_info_from_url();
		$extra_values = $ci->uri->segment($state_info->segment_position - 1) != $this->get_method_name() ? $ci->uri->segment($state_info->segment_position - 1) : '';
		
		return md5($this->get_controller_name().$this->get_method_name().$extra_values);
	}	

}

class hgrid extends hgrid_states
{
	const	VERSION = "1.3.3";
	
	const	JQUERY 			= "jquery-1.8.2.min.js";
	const	JQUERY_UI_JS 	= "jquery-ui-1.9.0.custom.min.js";
	const	JQUERY_UI_CSS 	= "jquery-ui-1.9.0.custom.min.css";
	
	private $model						=null;
	private $columns					=array();
	private $list  						=array();
	private $echo_and_die				= false;

	protected $theme 					= null;
	protected $default_theme		= 'datatables';
	protected $css_files				= array();
	protected $js_files					= array();
	protected $post_js_files					= array();
	
	protected $default_config_path					= 'assets/hgrid/config';
	protected $default_assets_path					= 'assets/hgrid';
	
	//private $model=''; 
	
	public function set_theme($theme = null)
	{
		$this->theme = $theme;
	}
	
	protected function _initialize_variables()
	{
		$ci = &get_instance();
		$ci->load->config('grocery_crud');
		
		$this->config = (object)array();
		
		/** Initialize all the config variables into this object */
		$this->config->default_language 	= $ci->config->item('grocery_crud_default_language');
		$this->config->date_format 			= $ci->config->item('grocery_crud_date_format');
		$this->config->default_per_page		= $ci->config->item('grocery_crud_default_per_page');
		$this->config->file_upload_allow_file_types	= $ci->config->item('grocery_crud_file_upload_allow_file_types');
		$this->config->file_upload_max_file_size	= $ci->config->item('grocery_crud_file_upload_max_file_size');
		$this->config->default_text_editor	= $ci->config->item('grocery_crud_default_text_editor');
		$this->config->text_editor_type		= $ci->config->item('grocery_crud_text_editor_type');
		$this->config->character_limiter	= $ci->config->item('grocery_crud_character_limiter');
		
		/** Initialize default paths */
		$this->default_javascript_path				= $this->default_assets_path.'/js';
		$this->default_css_path						= $this->default_assets_path.'/css';
		$this->default_texteditor_path 				= $this->default_assets_path.'/texteditor';
		$this->default_theme_path					= $this->default_assets_path.'/themes';
	
		
		$this->character_limiter = $this->config->character_limiter;
		
		if($this->character_limiter === 0 || $this->character_limiter === '0')
		{
			$this->character_limiter = 1000000; //a big number
		}
		elseif($this->character_limiter === null || $this->character_limiter === false)
		{
			$this->character_limiter = 30; //is better to have the number 30 rather than the 0 value
		}
	}

	protected function _theme_view($view, $vars = array(), $return = FALSE)
	{
		$vars = (is_object($vars)) ? get_object_vars($vars) : $vars;
		
		$file_exists = FALSE;

		$ext = pathinfo($view, PATHINFO_EXTENSION);
		$file = ($ext == '') ? $view.'.php' : $view;

		$view_file = $this->theme_path.$this->theme.'/views/';
		
		if (file_exists($view_file.$file))
		{
			$path = $view_file.$file;
			$file_exists = TRUE;
		}

		if ( ! $file_exists)
		{
			throw new Exception('Unable to load the requested file: '.$file, 16);
		}
		
		extract($vars);
		
		#region buffering...
		ob_start();

		include($path);

		$buffer = ob_get_contents();
		@ob_end_clean();		
		#endregion
		
		if ($return === TRUE)
		{
			return $buffer;
		}
		
		$this->views_as_string .= $buffer;
	}

	protected function _add_js_vars($js_vars = array())
	{
		$javascript_as_string = "<script type=\"text/javascript\">\n";
		foreach ($js_vars as $js_var => $js_value) {
			$javascript_as_string .= "\tvar $js_var = '$js_value';\n";
		}
		$javascript_as_string .= "\n</script>\n";
		$this->views_as_string .= $javascript_as_string;
	}	
	
	protected function setThemeBasics()
	{
		$this->theme_path = $this->default_theme_path;
		if(substr($this->theme_path,-1) != '/')
			$this->theme_path = $this->theme_path.'/';
			
		include($this->theme_path.$this->theme.'/config.php');
		
		$this->theme_config = $config;
	}

	public function set_css($css_file)
	{
		$this->css_files[sha1($css_file)] = base_url().$css_file;
	}

	public function set_js($js_file)
	{
		$this->js_files[sha1($js_file)] = base_url().$js_file;
	}	
	public function set_post_js($js_file)
	{
		$this->post_js_files[sha1($js_file)] = base_url().$js_file;
	}	

	public function get_css_files()
	{
		return $this->css_files;
	}

	public function get_js_files()
	{
		return $this->js_files;
	}	
	protected function get_layout()
	{
		$js_files = $this->get_js_files();
		$css_files =  $this->get_css_files();

		/*
		if($this->unset_jquery)
			unset($js_files[sha1($this->default_javascript_path.'/'.hgrid::JQUERY)]);
		
		if($this->unset_jquery_ui)
		{
			unset($css_files[sha1($this->default_css_path.'/ui/simple/'.hgrid::JQUERY_UI_CSS)]);
			unset($js_files[sha1($this->default_javascript_path.'/jquery_plugins/ui/'.hgrid::JQUERY_UI_JS)]);
		}
		*/
		
		if($this->echo_and_die === false)
		{
			/** Initialize JavaScript variables */
			$js_vars =  array(
					'default_javascript_path'	=> base_url().$this->default_javascript_path,
					'default_css_path'			=> base_url().$this->default_css_path,
					'default_texteditor_path'	=> base_url().$this->default_texteditor_path,
					'default_theme_path'		=> base_url().$this->default_theme_path,
					'base_url'				 	=> base_url()
			);
			$this->_add_js_vars($js_vars);			
			
			return (object)array('output' => $this->views_as_string, 'js_files' => $js_files, 'css_files' => $css_files);
		}
		elseif($this->echo_and_die === true)
		{
			echo $this->views_as_string;
			die();
		}
	}

	protected function pre_render()
	{
		$this->_initialize_variables();
		
		/*
		$this->_initialize_helpers();
		$this->_load_language();
		$this->state_code = $this->getStateCode();
		
		if($this->basic_model === null)
			$this->set_default_Model();
		
		$this->set_basic_db_table($this->get_table());	

		$this->_load_date_format();
		
		$this->_set_primary_keys_to_model();
		 */
	}
	
	public function setColumns($columns)
	{
		$this->columns=$columns;
	}
	public function setList($list)
	{
		$this->list=$list;
	}
	
	public function render()
	{
	
		echo $this->default_assets_path;
	
		$this->pre_render();		
				
		if($this->theme === null)
					$this->set_theme($this->default_theme);

		$this->setThemeBasics();
		
		$data=(object)array();
		$data->unique_hash			= $this->get_method_hash();
		$data->columns				=$this->columns;
		$data->list				=$this->list;
				
		$data->list_view = $this->_theme_view('list.php',$data,true);
		$this->_theme_view('list_template.php',$data);
		foreach($this->post_js_files as $f)
		{
			$this->js_files[]=$f;
		}
		return $this->get_layout();
	}
	
}


?>