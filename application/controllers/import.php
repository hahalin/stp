<?php

Class Import extends  CI_Controller{
	
	private $filename;
	function __construct($filename='')
	{
		parent::__construct();
		
		$this->filename=$filename;
		$this->load->helper(array('form', 'url'));
		$this->output->enable_profiler(TRUE);
	}
	
	function dirtop()
	{
		header('Content-Type:text/html; charset=utf-8');
		
		$c=new Bzcategory();
		$c->include_related_count('parent')->get();
		foreach($c as $ci)
		{
			if ($ci->parent_count==0)
			{
				echo $ci->name."</br>";
			}
		}
	}
	
	function index()
	{
		$this->load->view('uploadcsv',array('error'=>''));
	}
	function upload($action='category')
	{
		$this->load->view('uploadcsv',array('error'=>'','action'=>$action));
	}
	
	function getUploadConfig()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|csv';
		$config['max_size']	= '0';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		return $config;
	}
	
	function load($action)
	{
		header('Content-Type:text/html; charset=utf-8');
		echo $action.'</br>';
		
		$config=$this->getUploadConfig();

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		$filename=$data['upload_data']['full_path'];
		$handle = fopen($filename, 'r');
		$out = array (); 
	    $n = 0; 
		$list=array();
		$listb=array();
		
	    while ($d = fgetcsv($handle, 10000)) { 
	        $num = count($d); 
	        for ($i = 0; $i < $num; $i++) { 
	            $out[$n][$i] = $d[$i];
	        }
			
			$c=new Category();
			$c->code=$d[1];
			$c->name=$d[2];
			$c->save();
			foreach ($c->error->all as $e)
			{
				echo 'save '.$c->name.' error:'.$e.'</br>';
			}
			$n++;
		}
		return;
		print '<pre>';
		print_r($out);
		print '</pre>';
		
	} 
	
	function loadcsv()
	{
		$config=$this->getUploadConfig();

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		
		$filename=$data['upload_data']['full_path'];		
		$handle = fopen($filename, 'r');
		$out = array (); 
	    $n = 0; 
		$list=array();
		
	    while ($d = fgetcsv($handle, 10000)) { 
	        $num = count($d); 
	        for ($i = 0; $i < $num; $i++) { 
	            $out[$n][$i] = $d[$i];
	        }
			$obj=new stdClass;
			$obj->ida=$d[1];
			$obj->nm=$d[2];
			$obj->pida=$d[0];
			
			$c=new Bzcategory();
			$c->code=$d[1];
			$c->name=$d[2];
			$c->save();
			
			$code=new Bzcategorycode();
			$code->code=$d[1];
			$code->name=$d[2];
			$code->save();
			if ($c->id)
			{
				$code->save($c);
			}
			foreach ($code->error->all as $e)
			{
				echo 'save code error:'.$e.'</br>';
			}
			/*
			if (count($c->get_by_code($d[1]))==0)
			{
			}*/
			
			//echo $c->id.$d[2];
			
			foreach ($c->error->all as $e)
			{
    			echo $e . $c->name."<br />";
			}
			$obj->id=0;
			if ($c->id !='')
			{
				//echo 'save id '.$c->id . '</br>';
				$obj->id=$c->id;
			}
			$list[]=$obj;
			//echo "</br>";
	        $n++; 
	    }
		
		$listb=$list;
		foreach ($list as $ic)
		{
			//use parent;
			$c=new Bzcategory();
			$c->get_by_id($ic->id);
			if (!$c->id)
			{
				$c->get_by_name($ic->nm);
			}
			
			if (!$c->id)
			{
				echo 'parent '.$ic-nm.' find child error without correct id';
				continue;
			}
			
			//find child
			foreach($listb as $icb)
			{
				if ($icb->pida==$ic->ida)
				{
					$cs=new Bzcategory();
					
					if ($icb->id)
					{
						$cs->get_by_id($icb->id);
					}
					else 
					{
						echo 'child '.$icb->nm .' use name save parent</br>';
						$cs->get_by_name($icb->nm);
					}
					if ($cs->id)
					{
						$cs->save_parent($c);
						if (count($cs->error->all)>0)
						{
							echo 'child '.$cs->name.' save parent occurs error:';
							foreach($cs->error->all as $e)
							{
								echo $e.',';
							}
							echo '</br>';
						}
					}
					else 
					{
						echo 'child save parent faild without correct id';
					}
				}
			}
		}
		
		fclose($handle);
		return; 

			

		echo '<pre>'; 		
		print_r ($out);
		echo '</pre>';
    	//$result = input_csv($handle); //解
		
	}
	function getCategory()
	{
		//$this->filename='20130104_154447_taxonomy_terms.dataset';
		$this->filename='20130104_154442_taxonomy_terms.dataset'; //address
		//$this->filename='20130104_154405_taxonomy_terms.dataset'; //buzcat
		
		//$file=file(APPPATH . 'data/'.$this->filename);
		$file_content = file_get_contents(APPPATH . 'sql/data/'.$this->filename);
		$file_content_as_array = unserialize($file_content);
		
		$vid_mapping = array();
		
		//print '<pre>';
		//print_r($file_content_as_array);
		//print '</pre>';
		
		foreach ($file_content_as_array['vocabularies'] as $vocabulary_from_file) {
			
			//print_r($vocabulary_from_file);
			echo $vocabulary_from_file->vid.','.$vocabulary_from_file->machine_name;
			echo '</br>';	
			
		}
	}
} 


?>