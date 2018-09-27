<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
	}	
	public function index()
	{		
		$data['msg'] = $this->session->flashdata('msg');
			
		$data['main_content'] = 'index';
		if($this->session->userdata('login_id') !='')
		{
			$this->load->view('includes/login_template',$data);	
		}
		else
		{
			//$this->load->view('includes/login_template',$data);	
			$this->load->view('includes/logout_template',$data);	
		}
	}
}
