<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta'); 
        $this->load->model('registration/common_model');
                
	}
	function accept_terms() {
		if (isset($_POST['accept_terms'])) return true;
		$this->form_validation->set_message('accept_terms', 'Please read and accept our terms and conditions.');
		return false;
	}
      	
	//Registration Form
	public function index()
	{
		$data['banks_data'] = $this->common_model->getAllrecord('ac_banks');
		$data['errors'] ="";
		$data['otp'] ="";
		if($this->session->userdata('otp_no')!="")
		{
			$otp_no = $this->session->userdata('otp_no');
		}
		else
		{
			for ($i = 0; $i<6; $i++) 
			{
				$otp_n .= mt_rand(0,9);
			}
			$otp_no = "123456";//$otp_n;
		}
			
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|alpha_space');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|unique[ac_users.email]');
		$this->form_validation->set_rules('std', '', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]|unique[ac_users.mobile_no]');
		$this->form_validation->set_rules('identification_no', 'Personal Identification No.', 'trim|required');
		$this->form_validation->set_rules('identification_type', 'Personal Identification Type', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim');
		$this->form_validation->set_rules('district', 'District', 'trim');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('ac_holder_name', 'Account holder name', 'trim|required|alpha_space');
		$this->form_validation->set_rules('account_no_iban', 'Account Number/IBAN', 'trim|required|numeric');
		$this->form_validation->set_rules('bank', 'Bank Name', 'trim|required');
		$this->form_validation->set_rules('swift_code', 'Swift Code', 'trim|required');		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('accept_terms', '...', 'callback_accept_terms');
			
			
		$data['full_name'] 			= $full_name 			= $this->input->post('full_name',TRUE);			
		$data['email'] 				= $email 				= $this->input->post('email',TRUE);
		$data['mobile_no'] 			= $mobile_no 			= $this->input->post('mobile_no',TRUE);
		$data['identification_no'] 	= $identification_no 	= $this->input->post('identification_no',TRUE);
		$data['identification_type']= $identification_type 	= $this->input->post('identification_type',TRUE);
		$data['country']			= $country 				= $this->input->post('country',TRUE);
		$data['province']			= $province 			= $this->input->post('province',TRUE);
		$data['city']				= $city 				= $this->input->post('city',TRUE);
		$data['district']			= $district 			= $this->input->post('district',TRUE);
		$data['street']				= $street 				= $this->input->post('street',TRUE);
		$data['ac_holder_name']		= $ac_holder_name 		= $this->input->post('ac_holder_name',TRUE);
		$data['account_no_iban']	= $account_no_iban 		= $this->input->post('account_no_iban',TRUE);
		$data['bank']				= $bank 				= $this->input->post('bank',TRUE);
		$data['swift_code']			= $swift_code 			= $this->input->post('swift_code',TRUE);
		$data['password']			= $password 			= $this->input->post('password',TRUE);
		
		if($this->form_validation->run() == TRUE) 
		{
			
			$data['upload_path'] = 'documents/';
			$data['allowed_types'] = 'gif|jpg|png';
			$data['max_size'] = '20480000';
			$data['max_width'] = '10240000';
			$data['max_height'] = '7680000';
			$data['encrypt_name'] = false;

			$this->load->library('upload', $data);
			$user_doc = '';
			if ($this->upload->do_upload('document'))
			{
				$attachment_data = array('upload_data' => $this->upload->data());
				$user_doc = $attachment_data['upload_data']['file_name'];
			}
			else
			{
				if($_FILES['document']['name']!="")
				{
					//$data['errors'] = $this->upload->display_errors();
					$data['errors'] = "Allowed upload type jpg, png and jpeg images only.";
				}else{
					$data['errors']="";
				}
				
			}
			
			if($data['errors']=="")
			{				
				$insertArray = array(
						'full_name' 			=> $full_name,
						'email'	 				=> $email,								
						'mobile_no' 			=> $mobile_no,
						'identification_no' 	=> $identification_no,
						'identification_type' 	=> $identification_type,
						'country'				=> $country,
						'province'				=> $province,
						'city'					=> $city,
						'district'				=> $district,
						'street'				=> $street,
						'ac_holder_name'		=> $ac_holder_name,
						'account_no_iban'		=> $account_no_iban,
						'bank_id'					=> $bank,
						'swift_code'			=> $swift_code,
						'password'				=> md5($password),
						'user_doc'				=> $user_doc,
						'registration_date' 	=> date('Y-m-d'),
						'otp_no'				=> $otp_no
				);
				$this->session->set_userdata($insertArray);
								
				//$this->common_model->insertData('ac_users',$insertArray);
				$data['otp'] ="yes";
			}			
								
		}
		$this->load->library('recaptcha');
				//$recaptcha = $this->input->post('g-recaptcha-response');
		$data['widget'] =	$this->recaptcha->getWidget();
		$data['script'] =	$this->recaptcha->getScriptTag();
		
		$data['main_content'] = 'index';
		$this->load->view('includes/logout_template',$data);	
		
	}
	public function otp_match()
	{
		$otp = $this->input->post('otp');
		if($otp==$this->session->userdata('otp_no'))
		{
			echo "1";
		}else{
			echo "0";
		}		
	}
	
	public function test()
	{
		echo "<pre>"; print_r($this->session->userdata());
		
	}
	
}
