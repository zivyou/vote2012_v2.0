<?php

/**
*      图片的处理应当注意：
*     unlink()这个函数只能删除同目录下的文件，如果想删除上一级的文件，必须给出绝对路径
*     unlink("D:\\htdocs\\vote2012\\upload");
*/

	class Madmin extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');			
			$this->load->library('image_lib'); 
			$this->load->library('session');
		}
		
		public function check_login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
			
			if($query->num_rows() == 1)  return true;
			else return false;
			
		}
		
		public function get_act()
		{
			$query = $this->db->query('SELECT * FROM activity');
			return $query->result();
		}
		
		public function get_can($segment = 1)
		{
			$from = ($segment-1) * 4;
			$end = $segment * 4;
			$query = $this->db->query("SELECT * FROM candidate LIMIT $from,$end");
			//$query = $this->db->query("SELECT * FROM candidate  ORDER BY pid DESC");
			return $query->result();
		}
		
		public function get_can_num()
		{
			$query = $this->db->query('SELECT * FROM candidate');
			return $query->num_rows();
		}
		
		public function get_can_via_id($id = 1)
		{
			$query = $this->db->query("SELECT * FROM candidate WHERE pid = '$id'");
			return $query->result();
		}
		
		public function can_update()
		{
			//此处应判断用户是否提交了完整的信息。
			$id = mysql_real_escape_string( $this->input->post('id') );
			$name = mysql_real_escape_string( $this->input->post('name') );
			$department = mysql_real_escape_string( $this->input->post('department') );
			$introduction = mysql_real_escape_string( $this->input->post('intro_editor') );
			
			if(!($id && $name && $department && $introduction))
				redirect('admin/can_manage');
			
			$query = $this->db->query("UPDATE candidate SET name='$name',department='$department',introduction='$introduction' WHERE pid = '$id'");
			return;
		}
		
		public function can_add()
		{
			/**
			*   图片上传处理
			*/
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['voerwrite'] = 'TRUE';
			$config['max_size'] = '4048';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			$config['remove_spaces'] = 'TRUE';
		  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			 
			if ( ! $this->upload->do_upload('image'))
			{
				//$error = $this->upload->display_errors();
				//echo $error;
				redirect('admin/can_add');	
			} 
			else
			{
			   $img = $this->upload->data();
			}
				
			$this->img_resize($img['file_name']);
			$img['file_name'] = $img['raw_name'].'_thumb'.$img['file_ext'];
			
			$name = mysql_real_escape_string( $this->input->post('name') );
			$department = mysql_real_escape_string( $this->input->post('department') );
			$introduction = mysql_real_escape_string($this->input->post('intro_editor'));
			if(!($name && $department && $introduction && $img['file_name']))
				redirect('admin/can_manage');
			
			$query = $this->db->query("INSERT INTO candidate(`name`,`department`,`introduction`,`img`) VALUE ('$name','$department','$introduction','$img[file_name]')");
			return;
		}
		
		
		public function img_resize($file_name)
		{
			//创建缩略图
			$config['image_library'] = 'gd2';
			$config['source_image'] = "./upload/$file_name";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['dynamic_output'] = FALSE;
			//$config['new_image'] = "./upload/";
			$config['width'] = 120;
			$config['height'] = 96;
			
			$this->image_lib->initialize($config);
			$this->image_lib->resize();	
			echo $this->image_lib->display_errors();
			unlink("D:\\htdocs\\vote2012_v2.0\\upload\\$file_name" );
			$this->image_lib->clear();
		}
		
		public function change_img_ok()
		{
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['voerwrite'] = 'TRUE';
			$config['max_size'] = '4048';
			$config['max_width']  = '2048';
			$config['max_height']  = '2048';
			$config['remove_spaces'] = 'TRUE';
		  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			 
			if ( ! $this->upload->do_upload('image'))
			{
				$error = $this->upload->display_errors();
				echo $error;
				
				redirect('admin/change_img');	
			} 
			else
			{
			   $img = $this->upload->data();
			}
			$this->img_resize($img['file_name']);
			$img['file_name'] = $img['raw_name'].'_thumb'.$img['file_ext'];
			
			$id = $this->uri->segment(3);
			
			$query = $this->db->query("SELECT * FROM candidate WHERE pid='$id'");
			$old_img = $query->result();
			foreach($old_img as $row):
				 if( is_file( "./upload/$row->img" ))
				 {					
unlink("D:\\htdocs\\vote2012_v2.0\\upload\\$file_name" );				 }
				 else
				 {
					redirect('admin/can_manage');
				 }
			
			endforeach;
			
			$this->db->query("UPDATE candidate SET img='$img[file_name]' WHERE pid='$id'");
			
			return true;
		}
		
		public function delete_can()
		{
			$id = $this->uri->segment(3);
			$query = $this->db->query("SELECT * FROM candidate WHERE pid='$id'");
			$old_img = $query->result();
			foreach($old_img as $row)
			{
				 if( is_file( "./upload/$row->img" ))
				 {
					 unlink("D:\\htdocs\\vote2012_v2.0\\upload\\$file_name" );("D:\\htdocs\\vote2012\\upload\\$row->img" );
				 }
				 else
				 {
					redirect('admin/can_manage');
				 }
			}
			
			$this->db->query("DELETE FROM candidate WHERE pid='$id'");
			
			return;
		}
		
		public function delete_act()
		{
			$query = $this->db->query("SELECT * FROM candidate");
			$old_img = $query->result();
			foreach($old_img as $row)
			{
				 if( is_file( "./upload/$row->img" ))
				 {
unlink("D:\\htdocs\\vote2012_v2.0\\upload\\$file_name" );				 }
				 else
				 {
					redirect('admin/act_manage');
				 }
			}
			
			$this->db->query("TRUNCATE TABLE candidate");
			$this->db->query("TRUNCATE TABLE activity");
			$this->db->query("TRUNCATE TABLE voters");			
			return;
		}
		
		public function act_add()
		{
			$introduction = $this->input->post('intro_editor');
			$chance = $this->input->post('chance');
			$requirement = $this->input->post('req_editor');
			$query = $this->db->query("INSERT INTO activity(`introduction`,`requirement`,`chance`) VALUE ('$introduction','$requirement','$chance')");
			
			return;
		}
		
		public function act_update()
		{
			//此处应判断用户是否提交了完整的信息。
			$introduction =  $this->input->post('intro_editor') ;
			$chance =  $this->input->post('chance') ;
			$requirement = $this->input->post('req_editor') ;
			
			if(!($requirement && $chance && $introduction))
			{
				//echo $introduction;
				//echo $chance;
				//echo $requirement;
				redirect('admin');
			}
			$query = $this->db->query("UPDATE activity SET chance='$chance',requirement='$requirement',introduction='$introduction'");
			return;
		}
		
		/**
		* 用户管理
		*/
		
		public function user_edited()
		{
			$username = $this->session->userdata("username");
			$query = $this->db->query("SELECT * FROM admin WHERE username='$username'");
			$var = $query->result();
			if(!$query->num_rows()) return;
			else 
			{
				foreach($var as $row)
				{
					$password = $this->input->post('password');
					$this->db->query("UPDATE admin SET password='$password' WHERE username='$username' ");
				}
			}
		}
		
		public function get_user()
		{
			$username = $this->session->userdata("username");
			$query = $this->db->query("SELECT * FROM admin WHERE username='$username'");
			return $query->result();
		}
		
		public function user_add()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$query_t = $this->db->query("SELECT * FROM admin WHERE username='$username'");
			if($query_t->num_rows()) {$this->session->set_flashdata('state',1); redirect('admin');}
			
			$query = $this->db->query("INSERT INTO admin(`username`,`password`,`mode`) VALUE ('$username','$password','1')");
			return ;
		}
	}