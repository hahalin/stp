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
	
	function index()
	{
		$this->load->view('uploadcsv',array('error'=>''));
	}
	function upload($action='category')
	{
		$this->load->view('uploadcsv',array('error'=>'','action'=>$action));
	}
	
	function listupload()
	{
		$this->load->view('uploadcsv',array('error'=>'','action'=>'listcontent'));
	}
	
	function listcontent()
	{
		header('Content-Type:text/html; charset=utf-8');

		$config=$this->getUploadConfig();

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		$filename=$data['upload_data']['full_path'];
		$fsrc=strtolower(substr(basename($filename),0,7));
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
	        
	        $o=new stdClass();
	        
	        if ($fsrc=='product')
	        {
	           $o->nid=$out[$n][0];
	           $o->title=$out[$n][1];
	           $o->img=$out[$n][2];
	           $o->catid=$out[$n][3];
	           $o->ref=$out[$n][4];
	           $o->name=$out[$n][5];
	        }
	        
	        if ($fsrc=='company')
	        {
	           if ($out[$n][2] && (rtrim($out[$n][2])!=''))
	           {
		           $bc=new Bzcategory();
				   
				   $bc->get_by_code($out[$n][2]);
				   if (!$bc->id)
				   {
				   	  echo $out[$n][1].' cat tid not exits:'.$out[$n][2].'</br>';
				   } 	
				   else 
				   {
			           $o->nid=$out[$n][0];
			           $o->title=$out[$n][1];
			           $o->tid=$out[$n][2];
			           $o->ename=$out[$n][3];
			           $o->addr2=$out[$n][4];
			           $o->addr=$out[$n][5];
			           $o->web=$out[$n][6];
			           $o->province=$out[$n][7];
			           $o->scope=$out[$n][8];
			           $o->email=$out[$n][9];
			           $o->tel=$out[$n][10];
			           $o->fax=$out[$n][11];
					   
					   $c=new Company();
					   $c->nid=$out[$n][0];
					   $c->name=$out[$n][1];
					   //$c->tid=$o->tid;
					   //$c->save_bzcategory($bc);
					   $c->save(
					   		array(
								'bzcategory'=>$bc
							)
					   );
					   
					   $p=new Province();
					   $p->get_by_code($out[$n][7]);
					   if ($p->id)
					   {
						  $c->save($p);
						  //$c->province=$p;				   	
					   }
					   else 
					   {
					      $c->save();
					   }
					   foreach ($c->error->all as $e)
						{
							echo 'save '.$c->name.' error:'.$e.'</br>';
						}
					   $list[]=$o;
				   }
	           }
	        }
			$n++;
		}
		fclose($handle);
		echo '<pre>';
		print_r($list);
		echo '</pre>';
	}
	
	function getUploadConfig()
	{
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|csv';
		$config['max_size']	= '0';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		return $config;
	}
	
	
	function _loadsec()
	{
		header('Content-Type:text/html; charset=utf-8');

		$config=$this->getUploadConfig();

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		$filename=$data['upload_data']['full_path'];
		$fsrc=strtolower(substr(basename($filename),0,7));
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
			$m->save();
			foreach ($m->error->all as $e)
			{
				echo 'save '.$out[$n][2].' error:'.$e.'</br>';
			}
			$list[]=$out;
			$n++;
		}
		fclose($handle);
		
		print '<pre>';
		print_r($list);
		print '</pre>';
		
		
		
	}
	function _loadprovince()
	{
		header('Content-Type:text/html; charset=utf-8');

		$config=$this->getUploadConfig();

		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		$filename=$data['upload_data']['full_path'];
		$fsrc=strtolower(substr(basename($filename),0,7));
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
		
		print '<pre>';
		print_r($list);
		print '</pre>';
				
	}

	function _upload_avatar()
	{
		header('Content-Type:text/html; charset=utf-8');
		$config=$this->getUploadConfig();
		$config['allowed_types'] = 'gif|jpg|png';
		echo '<pre>';
		print_r ($config);
		echo '</pre>';
		//$config['max_size']	= '100';// in KB
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		$data = array('upload_data' => $this->upload->data());
		$filename=$data['upload_data']['full_path'];
		echo $filename;
		//$fsrc=strtolower(substr(basename($filename),0,7));
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		
		echo '<img src="'.base_url().'assets/uploads/'.$data['upload_data']['file_name'].'"/>';
		
		//echo '<img src="/stp_cosmos/assets/uploads/201302271428558604.jpg">';
		$ftemp=base_url().'assets/uploads/'.$data['upload_data']['file_name'];
		
		$config['image_library'] = 'gd2';
		$config['source_image']	= $config['upload_path'].$data['upload_data']['file_name'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 75;
		$config['height']	= 150;

		$this->load->library('image_lib', $config); 
		$this->image_lib->resize();
		echo '<pre>';
		//$ftemp=base_url().'assets/uploads/'.pathinfo($this->image_lib->full_dst_path)['filename'].'.'.pathinfo($this->image_lib->full_dst_path)['extension'];
		echo '</pre>';
		//$ftemp=base_url().'assets/uploads/'.$data['upload_data']['file_name'];
		echo $ftemp;
		echo '<img src="'.$ftemp.'"/>';
	}
	
	/*
	 *  action
	 *    category : default
	 * 	  sec1 : _loadsec
	 * 	  province : _loadprovince
	 *    bzcategory : _loadbzcategory
	 *    listcontent : listcontent
	*/
	function load($action)
	{
		if ($action=='avatar')
		{
			$this->_upload_avatar();
			return;
		}
		
		if ($action=='listcontent')
		{
			$this->listcontent();
			return;
		}
		
		if ($action=='bzcategory')
		{
			$this->_loadbzcategory();
			return;
		}
		
		if ($action=='province')
		{
			$this->_loadprovince();
			return;
		}
		
		if ($action=='sec')
		{
			$this->_loadsec();
			return;
		}
		
		if ($action=='category')
		{
			$this->_loadcategory();
			return;
		}
		
	} 
	
	function _loadcategory()
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
			
			$obj=new stdClass;
			$obj->ida=$d[1];
			$obj->nm=$d[2];
			$obj->pida=$d[0];
			
			$c=new Category();
			$c->code=$d[1];
			$c->name=$d[2];
			$c->save();
			foreach ($c->error->all as $e)
			{
				echo 'save '.$c->name.' error:'.$e.'</br>';
			}
			$obj->id=0;
			if($c->id)
			{
				$obj->id=$c->id;
			}
			$list[]=$obj;
			$n++;
		}
		fclose($handle);
		
		$listb=$list;
		
		foreach ($list as $ic)
		{
			//use parent;
			$c=new Category();
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
					$cs=new Category();
					
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
						$cs->save_parentcategory($c);
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

		return;
		print '<pre>';
		print_r($out);
		print '</pre>';		
	}
	
	function _loadbzcategory()
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