<?php

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		
		$sta = $this->session->userdata('admin');
		if (!isset($sta) || $sta!=='ok' )
		{
 			redirect('login');	
 		}
	}
	
	public function index()
	{
		$this->load->view('admin_head');
		$this->load->view('admin_center');
		$this->load->view('admin_left');		
		$this->load->view('admin_footer');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('username');
		redirect('admin');
	}
	
	public function act_manage()
	{		
		$this->load->model('Madmin');
		$data['activity'] = $this->Madmin->get_act();
		
		$this->load->view('admin_head',$data);
		$this->load->view('admin_left');	
		$this->load->view('act_manage');
		$this->load->view('admin_footer');
	}
	
	public function can_manage()
	{
		$this->load->model('Madmin');
		
		$config['base_url'] = site_url('/admin/can_manage/');
		$config['total_rows'] = $this->Madmin->get_can_num();
		$config['per_page'] = 4;
		$config['first_link'] = '第一页';
		$config['last_link'] = '最后一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config);
		
		$segment=$this->uri->segment(3);
		if(!$segment) $segment = 1;
		$data['candidate'] = $this->Madmin->get_can($segment);
		
		$var = $this->Madmin->get_act();
		if(!$var) $data['act_num'] = 0;
		else $data['act_num'] = 1;
		
		$this->load->view('admin_head',$data);
		$this->load->view('admin_left');	
		$this->load->view('can_manage');
		//$this->load->view('admin_footer');
	}
	
	public function can_editor()
	{
		$this->load->model('Madmin');
		$id = $this->uri->segment(3);
		$data['candidate'] = $this->Madmin->get_can_via_id($id);
		
		$this->load->view('admin_head');
		$this->load->view('admin_left');
		$this->load->view('can_editor',$data);
		$this->load->view('admin_footer');
	}
	
	public function can_edited()
	{
		$this->load->model('Madmin');
		$this->Madmin->can_update();
		
		redirect('admin/can_manage');
	}
	
	public function change_img()
	{
		$data['id'] = $this->uri->segment(3);
		$this->load->view('admin_head',$data);
		$this->load->view('admin_left');
		$this->load->view('change_img');
		$this->load->view('admin_footer');
			
	}
	
	public function change_img_ok()
	{		
	
		$this->load->model('Madmin');
		
		if($this->Madmin->change_img_ok())
		{
			//$this->load->view('admin_head');
			//$this->load->view('admin_footer');
			//echo "图片更新成功！";
			redirect('admin/can_manage');
		}	
		
	}
	
	public function can_add()
	{
		$this->load->view('admin_head');
		$this->load->view('admin_left');
		$this->load->view('can_add');
		//$this->load->view('admin_footer');
	}
	
	public function act_add()
	{		
		$this->load->view('admin_head');
		$this->load->view('admin_left');
		$this->load->view('act_add');
		//$this->load->view('admin_footer');
		
	}
	
	public function act_add_ok()
	{
		$this->load->model("Madmin");
		$this->Madmin->act_add();
		redirect('admin/act_manage');
	}
	
	public function act_editor()
	{		
		$this->load->model('Madmin');
		$data['activity'] = $this->Madmin->get_act();
		
		$this->load->view('admin_head',$data);
		$this->load->view('admin_left');
		$this->load->view('act_editor');
		//$this->load->view('admin_footer');
	}
	
	public function act_edited()
	{
		$this->load->model('Madmin');
		$this->Madmin->act_update();
		
		redirect('admin/act_manage');
	}
	

	public function can_add_ok()
	{
		$this->load->model("Madmin");
		$this->Madmin->can_add();
		
		redirect('admin/can_manage');
	}
	
	public function delete_can()
	{
		$this->load->model("Madmin");
		$this->Madmin->delete_can();
		
		redirect('admin/can_manage');
	}
			
	public function delete_act()
	{
		$this->load->model("Madmin");
		$this->Madmin->delete_act();
		
		redirect('admin/act_manage');
	}
	
	/**
	*   用户管理
	*/
	public function user_add()
	{
		$this->load->view('admin_head');
		$this->load->view('admin_left');
		$this->load->view('user_add');
		$this->load->view('admin_footer');
	}
	
	public function user_add_ok()
	{
		$this->load->model("Madmin");
		$this->Madmin->user_add();
		
		redirect('admin');
	}
	
	public function user_editor()
	{
		$this->load->model("Madmin");
		$data['admin'] = $this->Madmin->get_user();
		
		$this->load->view('admin_head',$data);
		$this->load->view('admin_left');
		$this->load->view('user_editor');
		$this->load->view('admin_footer');
	}
	
	public function user_edited()
	{
		$this->load->model("Madmin");
		$this->Madmin->user_edited();
		
		redirect('admin');
	}
}