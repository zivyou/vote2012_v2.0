<?php

class Vote extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->model('Mvote');
		$data['activity'] = $this->Mvote->select_activity();
		$data['candidate'] = $this->Mvote->select_candidate();
		$data['rank'] = $this->Mvote->rank();
		$data['chance'] = $this->Mvote->select_chance();
		$data['state'] = '0';
		
		$this->load->view('head',$data);
		$this->load->view('top');
		$this->load->view('center',$data);
		$this->load->view('footer');
	}
	
	public function voted()
	{
		
		if(! $this->input->post('voteok'))
		{
			
			$this->session->set_flashdata('state',3);
			redirect('vote');
			//echo "你还没有选择投票项！";
		}

		if(! $this->input->post('sname'))
		{
			$this->session->set_flashdata('state',2);
			redirect('vote');
			
			//echo "你还没有输入身份证号！";
		}
		
		if(! $this->input->post('sid'))
		{
			
			$this->session->set_flashdata('state',2);
			redirect('vote');
			//echo "你还没有输入学号！";
		}
		
		/*
		if(! $this->input->post("auth"))
		{
			
			$this->session->set_flashdata('state',2);
			redirect('vote');
			//echo "你还没有输入验证码！";
		}
		*/
		//$data['sub'] = $sub;
		$this->load->model('Mvote');
		$chance = $this->Mvote->select_chance();
		if(count($this->input->post('voteok')) >  $chance->chance )
		{
			 
			$this->session->set_flashdata('state',4);
			redirect('vote');
			//echo "你选择的投票项太多了。。。";
		}

				
		$this->Mvote->vote();
		//此处应当记录投票人的学号，存在表voters中
		$this->Mvote->record_voter();
		
			
			$this->session->set_flashdata('state',1);
			redirect('vote');
	}
	

	public function introduction()
	{
		$this->load->model('Mvote');
		$data['introduction'] = $this->Mvote->select_intro($this->uri->segment(3));
		$data['candidate'] = $this->Mvote->select_candidate();
		
		$this->load->view('head',$data);
		$this->load->view('top');
		$this->load->view('introduction');
		$this->load->view('footer');
	}
	
	public function act_introduction()
	{
		$this->load->model('Mvote');
		$data['activity'] = $this->Mvote->select_activity();
		$data['chance'] = $this->Mvote->select_chance();
		
		$this->load->view('head',$data);
		$this->load->view('top');
		$this->load->view('act_introduction');
		$this->load->view('footer');
	}
	
	public function act_requirement()
	{
		$this->load->model('Mvote');
		$data['activity'] = $this->Mvote->select_activity();
		$data['chance'] = $this->Mvote->select_chance();
		
		$this->load->view('head',$data);
		$this->load->view('top');
		$this->load->view('act_requirement');
		$this->load->view('footer');
	}
}
