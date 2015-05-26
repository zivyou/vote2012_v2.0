<?php

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
	
	}
	
	public function index()
	{
		$this->load->view('admin_login');
	}
	
	public function check_login()
	{
		$this->load->model("Madmin");
		$username = $this->input->post('username');
		
		//如果这个帐号已经登录：
		/*
		if($this->session->userdata('username') == $username)
		{
			$this->session->set_flashdata('state',1);
			redirect('login');
		}
		*/
		
		$result = $this->Madmin->check_login();
		if($result)  //启用session;
		{
			$this->session->set_userdata('admin','ok');
			$this->session->set_userdata('username',"$username");
			redirect('admin/index');
		}
		else	
		{
			$this->session->unset_userdata('admin','ok');
			$this->session->unset_userdata('username',"$username");
			redirect('login');
		}
	}
}