<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {
	

  function __construct() {
        parent::__construct();
       
  }


    public function index($id = '') 
	{
		$this->load->view('upload_view');			
    }
}

?>
