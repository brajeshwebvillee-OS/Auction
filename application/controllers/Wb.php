<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Wb extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();        
		$this->load->model('wb_model');			
    }  	
/*----------------------------------------Bnak API----------------------------------------------*/	
	//Add BANK
	function add_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$bank_name 				= $this->post('bank_name');
			$exist_bank_name = $this->wb_model->getsingle('ac_banks',array('bank_name' => $bank_name));		
			if($bank_name=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_name input missing!', 'data'=>'');
			}			
			else if($bank_name!='' && $exist_bank_name)
			{
				$response= array('status'=>'201', 'message'=>'bank_name Already Exists!', 'data'=>'');
			}
			if($bank_name!='' && !$exist_bank_name)
			{
				$insdata = array(
							'bank_name' 	=> $bank_name,						
							'entry_date'	=> date('Y-m-d')
					);
				$this->wb_model->insertData('ac_banks',$insdata);
				$response= array('status'=>'200', 'message'=>'Bank added Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	//GET ALL BANKS
	function banks_get(){       
		$data = $this->wb_model->getAllwhere('ac_banks',array('bank_id !='=>'0'));
		if(count($data)>0)
		{
			$final = array();
			foreach($data as $d)
			{
				$final_data['bank_id'] 		= $d->bank_id;
				$final_data['bank_name'] 	= $d->bank_name;
				$final_data['entry_date'] 	= $d->entry_date;
				if($d->status=='0')
				{
					$final_data['status'] 	= "Active";
				}else{
					$final_data['status'] 	= "Deactive";
				}
				$final[] = $final_data;
			}			
			$response= array('status'=>'200', 'message'=>'success', 'data'=>$final );
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Edit Or View Bank
	function edit_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$bank_id 	= $this->post('bank_id');
			if($bank_id=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
			}
			$data = $this->wb_model->getsingle('ac_banks',array('bank_id'=>$bank_id));
			
			if($data && $bank_id!='')
			{
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'no record found!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}																		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Update Bank
	function update_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$bank_id 	= $this->post('bank_id');
			$bank_name 	= $this->post('bank_name');
			if($bank_id=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
			}
			$exist_bank_name = $this->wb_model->getsingle('ac_banks',array('bank_name' => $bank_name,'bank_id !='=>$bank_id));		
			if($bank_name=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_name input missing!', 'data'=>'');
			}			
			else if($bank_name!='' && $exist_bank_name)
			{
				$response= array('status'=>'201', 'message'=>'bank_name Already Exists!', 'data'=>'');
			}
			if($bank_id!='' && $bank_name!='' && !$exist_bank_name)
			{
				$updata = array(
							'bank_name' 	=> $bank_name
					);
				$this->wb_model->updateData('ac_banks',$updata,array('bank_id'=>$bank_id));
				$response= array('status'=>'200', 'message'=>'Bank Details Updated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}																		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Deactivate Bank
	function deactivate_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$bank_id 	= $this->post('bank_id');		
			if($bank_id=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
			}		
			if($bank_id!='')
			{
				$updata = array(
							'status' 	=> '1'
					);
				$this->wb_model->updateData('ac_banks',$updata,array('bank_id'=>$bank_id));
				$response= array('status'=>'200', 'message'=>'Bank Deactivated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Activate Bank
	function activate_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$bank_id 	= $this->post('bank_id');		
			if($bank_id=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
			}		
			if($bank_id!='')
			{
				$updata = array(
							'status' 	=> '0'
					);
				$this->wb_model->updateData('ac_banks',$updata,array('bank_id'=>$bank_id));
				$response= array('status'=>'200', 'message'=>'Bank Activated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}

/*----------------------------------------Registration API----------------------------------------------*/	
	//REGISTRATION API
	function register_post(){
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
		
		$errors					= "";
		$otp 					= "";
		$full_name 				= $this->post('full_name');
		$email 					= $this->post('email');
		$std 					= $this->post('std');
		$mobile_no 				= $this->post('mobile_no');
		$identification_no 		= $this->post('identification_no');
		$identification_type 	= $this->post('identification_type');
		$country 				= $this->post('country');
		$province 				= $this->post('province');
		$city 					= $this->post('city');
		$district 				= $this->post('district');
		$street 				= $this->post('street');
		$ac_holder_name 		= $this->post('ac_holder_name');
		$account_no_iban 		= $this->post('account_no_iban');
		$bank_id 				= $this->post('bank_id');
		$swift_code 			= $this->post('swift_code');
		$password 				= $this->post('password');
		$confirm_password 		= $this->post('confirm_password');
		
		
		if($full_name=='')
		{
			$response= array('status'=>'201', 'message'=>'full_name input missing!', 'data'=>'');
		}		
		$exist_email = $this->wb_model->getsingle('ac_users',array('email' => $email));
		$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		if($email=='')
		{
			$response= array('status'=>'201', 'message'=>'email input missing!', 'data'=>'');
		}
		else if (!preg_match($regex, $email)) 
		{
			$response= array('status'=>'201', 'message'=>'email Not Valid!', 'data'=>'');
		}	
		else if($email!='' && $exist_email)
		{
			$response= array('status'=>'201', 'message'=>'email Already Exists!', 'data'=>'');
		}
		if($std=='')
		{
			$response= array('status'=>'201', 'message'=>'std input missing!', 'data'=>'');
		}
		$exist_mobile_no = $this->wb_model->getsingle('ac_users',array('mobile_no' => $mobile_no));
		if($mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'mobile_no input missing!', 'data'=>'');
		}		
		else if($mobile_no!='' && $exist_mobile_no)
		{
			$response= array('status'=>'201', 'message'=>'mobile_no Already Exists!', 'data'=>'');
		}
		if($identification_no=='')
		{
			$response= array('status'=>'201', 'message'=>'identification_no input missing!', 'data'=>'');
		}
		if($identification_type=='')
		{
			$response= array('status'=>'201', 'message'=>'identification_type input missing!', 'data'=>'');
		}
		if($country=='')
		{
			$response= array('status'=>'201', 'message'=>'country input missing!', 'data'=>'');
		}
		if($province=='')
		{
			$response= array('status'=>'201', 'message'=>'province input missing!', 'data'=>'');
		}
		if($ac_holder_name=='')
		{
			$response= array('status'=>'201', 'message'=>'ac_holder_name input missing!', 'data'=>'');
		}
		if($account_no_iban=='')
		{
			$response= array('status'=>'201', 'message'=>'account_no_iban input missing!', 'data'=>'');
		}		
		if($bank_id=='')
		{
			$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
		}
		if($swift_code=='')
		{
			$response= array('status'=>'201', 'message'=>'swift_code input missing!', 'data'=>'');
		}
		if($password=='')
		{
			$response= array('status'=>'201', 'message'=>'password input missing!', 'data'=>'');
		}
		else if(strlen($password)<8)
		{
			$response= array('status'=>'201', 'message'=>'Password must be minimum 8 characters long!', 'data'=>'');
		}
		if($confirm_password=='')
		{
			$response= array('status'=>'201', 'message'=>'confirm_password input missing!', 'data'=>'');
		}
		if($confirm_password!=$password && $confirm_password!='' && $password!='' )
		{
			$response= array('status'=>'201', 'message'=>'confirm_password and password not match!', 'data'=>'');
		}
		
		if($full_name!='' && $email!='' && preg_match($regex, $email) && !$exist_email && $std!='' && $mobile_no!='' && !$exist_mobile_no 
			&& $identification_no!='' && $identification_type!='' && $country!='' && $province!='' && $ac_holder_name!=''
			&& $account_no_iban!='' && $bank_id!='' && $swift_code!='' && $password!='' && $confirm_password!='' 
			&& $confirm_password == $password && strlen($password)>8 )
		{
			$data['upload_path'] = 'uploads/user_documents/';
			$data['allowed_types'] = 'jpg|png|jpeg';
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
					$errors = "Allowed upload type jpg, png and jpeg images only.";
					$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
				}else{
					$errors="";
				}
				
			}
			
			if($errors=="")
			{				
				$insdata = array(
						'full_name' 			=> $full_name,
						'email'	 				=> $email,
						'std'	 				=> $std,						
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
						'bank_id'				=> $bank_id,
						'swift_code'			=> $swift_code,
						'password'				=> $password,
						'user_doc'				=> $user_doc,
						'registration_date' 	=> date('Y-m-d'),
						'otp_no'				=> $otp_no
				);
				$this->session->set_userdata($insdata);
				$response= array('status'=>'200', 'message'=>'OTP send successfully!', 'data'=>'');
			}
			
		}
		
		
		$this->response($response	, 200); // 200 being the HTTP response code		
		
	}
	
	//Submit OTP Registration API
	function submit_otp_post(){
		$otp 				= $this->post('otp');
		if($otp=='')
		{
			$response= array('status'=>'201', 'message'=>'otp input missing!', 'data'=>'');
		}
		if($otp!='' && $otp!=$this->session->userdata('otp_no'))
		{
			$response= array('status'=>'201', 'message'=>'OTP not match!', 'data'=>'');
		}
		if($this->session->userdata('otp_no')=='')
		{
			$response= array('status'=>'201', 'message'=>'Session Expired!', 'data'=>'');
		}
		if($otp!='' && $this->session->userdata('otp_no')!='' && $otp==$this->session->userdata('otp_no'))
		{
			$insdata = array(
						'full_name' 			=> $this->session->userdata('full_name'),
						'email'	 				=> $this->session->userdata('email'),
						'std'	 				=> $this->session->userdata('std'),						
						'mobile_no' 			=> $this->session->userdata('mobile_no'),
						'identification_no' 	=> $this->session->userdata('identification_no'),
						'identification_type' 	=> $this->session->userdata('identification_type'),
						'country'				=> $this->session->userdata('country'),
						'province'				=> $this->session->userdata('province'),
						'city'					=> $this->session->userdata('city'),
						'district'				=> $this->session->userdata('district'),
						'street'				=> $this->session->userdata('street'),
						'ac_holder_name'		=> $this->session->userdata('ac_holder_name'),
						'account_no_iban'		=> $this->session->userdata('account_no_iban'),
						'bank_id'				=> $this->session->userdata('bank_id'),
						'swift_code'			=> $this->session->userdata('swift_code'),
						'password'				=> md5($this->session->userdata('password')),
						'user_doc'				=> $this->session->userdata('user_doc'),
						'registration_date' 	=> $this->session->userdata('registration_date')						
				);
			$this->wb_model->insertData('ac_users',$insdata);
			
			//SESSION DESTROY
			$sessdata = array(
						'full_name' 			=> '',
						'email'	 				=> '',
						'std'	 				=> '',						
						'mobile_no' 			=> '',
						'identification_no' 	=> '',
						'identification_type' 	=> '',
						'country'				=> '',
						'province'				=> '',
						'city'					=> '',
						'district'				=> '',
						'street'				=> '',
						'ac_holder_name'		=> '',
						'account_no_iban'		=> '',
						'bank_id'				=> '',
						'swift_code'			=> '',
						'password'				=> '',
						'user_doc'				=> '',
						'registration_date' 	=> '',
						'otp_no'				=> ''
				);
			$this->session->unset_userdata($sessdata);
			$this->session->sess_destroy(); 
			
			$response= array('status'=>'200', 'message'=>'Registration Successfully!', 'data'=>'');
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	// Resend OTP
	function resend_otp_get(){
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
		if($this->session->userdata('otp_no')=='')
		{
			$response= array('status'=>'201', 'message'=>'Session Expired!', 'data'=>'');
		}
		else
		{
			$this->session->set_userdata('otp_no',$otp_no);
			$response= array('status'=>'200', 'message'=>'OTP send successfully!', 'data'=>'');
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//change mobile no. Registration API
	function change_mobile_no_post(){
		$mobile_no 				= $this->post('mobile_no');
		$exist_mobile_no = $this->wb_model->getsingle('ac_users',array('mobile_no' => $mobile_no));
		if($mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'mobile_no input missing!', 'data'=>'');
		}		
		else if($mobile_no!='' && $exist_mobile_no)
		{
			$response= array('status'=>'201', 'message'=>'mobile_no Already Exists!', 'data'=>'');
		}
		
		if($this->session->userdata('otp_no')=='')
		{
			$response= array('status'=>'201', 'message'=>'Session Expired!', 'data'=>'');
		}
		if($mobile_no!='' && !$exist_mobile_no && $this->session->userdata('otp_no')!='')
		{
			$this->session->set_userdata('mobile_no',$mobile_no);
			$response= array('status'=>'200', 'message'=>'mobile_no change successfully!', 'data'=>'');
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}

/*----------------------------------------Login API----------------------------------------------*/	
	// LOGIN
	function login_post(){
		$email_mobile_no = $this->post('email_mobile_no');
		$password 		 = $this->post('password');
		
		if($email_mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'email_mobile_no input missing!', 'data'=>'');
		}		
		if($password=='')
		{
			$response= array('status'=>'201', 'message'=>'password input missing!', 'data'=>'');
		}
		if($email_mobile_no!='' && $password!='')
		{
			$result = $this->wb_model->login($email_mobile_no ,$password);
			if($result)
			{
				$newdata = array( 	
					'user_id' => $result->user_id,
					'email' => $result->email,					
					'lgin' => TRUE,
				);
				$this->session->set_userdata($newdata);
				
				$response= array('status'=>'200', 'message'=>'login successfully!', 'data'=>$result);
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'email_mobile_no or password not match!', 'data'=>'');
			}
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	// LOGout
	function logout_get(){
		if($this->session->userdata('user_id') !='')
		{
			$array_items = array( 	
				'user_id' => '',
				'email' => '',					
				'lgin' =>''
			);
			
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy(); 
			$response= array('status'=>'200', 'message'=>'logout successfully!', 'data'=>'');
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
			
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Forgot Password
	function forgot_password_post(){
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
		
		$mobile_no 		 = $this->post('mobile_no');
		$exist_mobile_no = $this->wb_model->getsingle('ac_users',array('mobile_no' => $mobile_no));
		if($mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'mobile_no input missing!', 'data'=>'');
		}		
		else if($mobile_no!='' && !$exist_mobile_no)
		{
			$response= array('status'=>'201', 'message'=>'mobile_no Not Exists!', 'data'=>'');
		}
		
		if($mobile_no!='' && $exist_mobile_no)
		{
			$this->session->set_userdata('otp_no',$otp_no);
			$this->session->set_userdata('mobile_no',$mobile_no);
			$response= array('status'=>'200', 'message'=>'OTP send successfully!', 'data'=>'');
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Forgot Password Submit OTP
	function forgot_submit_otp_post(){
		$otp 				= $this->post('otp');
		if($otp=='')
		{
			$response= array('status'=>'201', 'message'=>'otp input missing!', 'data'=>'');
		}
		if($otp!='' && $otp!=$this->session->userdata('otp_no'))
		{
			$response= array('status'=>'201', 'message'=>'OTP not match!', 'data'=>'');
		}
		if($this->session->userdata('otp_no')=='')
		{
			$response= array('status'=>'201', 'message'=>'Session Expired!', 'data'=>'');
		}
		if($otp!='' && $this->session->userdata('otp_no')!='' && $otp==$this->session->userdata('otp_no'))
		{
			for ($i = 0; $i<6; $i++) 
			{
				$newpwd .= mt_rand(0,9);
			}
			$new_password = "123456";//$newpwd;
			
			$mobile_no = $this->session->userdata('mobile_no');
			$this->wb_model->updateData('ac_users',array('password'=>md5($new_password)),array('mobile_no'=>$mobile_no));
			
			//SESSION DESTROY
			$sessdata = array(											
						'mobile_no' => '',						
						'otp_no' 	=> ''						
				);
			$this->session->unset_userdata($sessdata);
			$this->session->sess_destroy(); 
			
			$response= array('status'=>'200', 'message'=>'Password send Successfully!', 'data'=>'');
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Change Password
	function change_password_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 				= $this->post('user_id');
			$old_password 			= $this->post('old_password');
			$new_password 			= $this->post('new_password');
			$confirm_password 		= $this->post('confirm_password');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			$user_data = $this->wb_model->getsingle('ac_users',array('user_id' => $user_id,'password'=>md5($old_password)));
			if($old_password=='')
			{
				$response= array('status'=>'201', 'message'=>'old_password input missing!', 'data'=>'');
			}
			else if(!$user_data)
			{
				$response= array('status'=>'201', 'message'=>'old_password Not match!', 'data'=>'');
			}
			if($new_password=='')
			{
				$response= array('status'=>'201', 'message'=>'new_password input missing!', 'data'=>'');
			}
			else if(strlen($new_password)<8)
			{
				$response= array('status'=>'201', 'message'=>'new_password must be minimum 8 characters long!', 'data'=>'');
			}
			if($confirm_password=='')
			{
				$response= array('status'=>'201', 'message'=>'confirm_password input missing!', 'data'=>'');
			}
			if($new_password!='' && $confirm_password!='' && $new_password!=$confirm_password)
			{
				$response= array('status'=>'201', 'message'=>'new_password and confirm_password not match!', 'data'=>'');
			}
			if($new_password!='' && $confirm_password!='' && $new_password==$confirm_password && $user_data && strlen($new_password)>8)
			{
				$this->wb_model->updateData('ac_users',array('password'=>md5($new_password)),array('user_id'=>$user_id));			
				$response= array('status'=>'200', 'message'=>'Password changed Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}	
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Edit OR View Profile
	function edit_profile_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 				= $this->post('user_id');
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			$user_data = $this->wb_model->getsingle('ac_users',array('user_id' => $user_id));
			if(!$user_data)
			{
				$response= array('status'=>'201', 'message'=>'no record found!', 'data'=>'');
			}
			else
			{
				$final = array();
				$final['user_id'] 			= $user_data->user_id;
				$final['full_name'] 		= $user_data->full_name;
				$final['email'] 			= $user_data->email;
				$final['std'] 				= $user_data->std;
				$final['mobile_no'] 		= $user_data->mobile_no;
				$final['country'] 			= $user_data->country;
				$final['province'] 			= $user_data->province;
				$final['city'] 				= $user_data->city;
				$final['identification_no'] = $user_data->identification_no;
				$final['identification_type'] = $user_data->identification_type;
				$final['district'] 			= $user_data->district;
				$final['street'] 			= $user_data->street;
				$final['ac_holder_name'] 	= $user_data->ac_holder_name;
				$final['account_no_iban'] 	= $user_data->account_no_iban;
				$final['bank_id'] 			= $user_data->bank_id;
				$bank_data = $this->wb_model->getsingle('ac_banks',array('id' => $user_data->bank_id));
				$final['bank'] 				= $bank_data->name;
				$final['swift_code'] 		= $user_data->swift_code;
				if($user_data->user_doc!='')
				{
				$final['user_doc'] 			= base_url()."documents/".$user_data->user_doc;	
				}else{
				$final['user_doc'] 			= $user_data->user_doc;
				}
				$final['registration_date'] = $user_data->registration_date;
				
				$final_data = (object)$final;
				$response= array('status'=>'200', 'message'=>'', 'data'=>$final_data);
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Update Profile
	function update_profile_post(){
		if($this->session->userdata('user_id') !='')
		{
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
			
			$errors					= "";
			$otp 					= "";
			$user_id 				= $this->post('user_id');
			$full_name 				= $this->post('full_name');
			$email 					= $this->post('email');
			$std 					= $this->post('std');
			$mobile_no 				= $this->post('mobile_no');
			$identification_no 		= $this->post('identification_no');
			$identification_type 	= $this->post('identification_type');
			$country 				= $this->post('country');
			$province 				= $this->post('province');
			$city 					= $this->post('city');
			$district 				= $this->post('district');
			$street 				= $this->post('street');
			$ac_holder_name 		= $this->post('ac_holder_name');
			$account_no_iban 		= $this->post('account_no_iban');
			$bank_id 				= $this->post('bank_id');
			$swift_code 			= $this->post('swift_code');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($full_name=='')
			{
				$response= array('status'=>'201', 'message'=>'full_name input missing!', 'data'=>'');
			}
			$exist_email = $this->wb_model->getsingle('ac_users',array('email' => $email,'user_id !='=>$user_id));
			$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if($email=='')
			{
				$response= array('status'=>'201', 'message'=>'email input missing!', 'data'=>'');
			}
			else if (!preg_match($regex, $email)) 
			{
				$response= array('status'=>'201', 'message'=>'email Not Valid!', 'data'=>'');
			}	
			else if($email!='' && $exist_email)
			{
				$response= array('status'=>'201', 'message'=>'email Already Exists!', 'data'=>'');
			}
			if($std=='')
			{
				$response= array('status'=>'201', 'message'=>'std input missing!', 'data'=>'');
			}
			$exist_mobile_no = $this->wb_model->getsingle('ac_users',array('mobile_no' => $mobile_no,'user_id !='=>$user_id));
			if($mobile_no=='')
			{
				$response= array('status'=>'201', 'message'=>'mobile_no input missing!', 'data'=>'');
			}		
			else if($mobile_no!='' && $exist_mobile_no)
			{
				$response= array('status'=>'201', 'message'=>'mobile_no Already Exists!', 'data'=>'');
			}
			if($identification_no=='')
			{
				$response= array('status'=>'201', 'message'=>'identification_no input missing!', 'data'=>'');
			}
			if($identification_type=='')
			{
				$response= array('status'=>'201', 'message'=>'identification_type input missing!', 'data'=>'');
			}
			if($country=='')
			{
				$response= array('status'=>'201', 'message'=>'country input missing!', 'data'=>'');
			}
			if($province=='')
			{
				$response= array('status'=>'201', 'message'=>'province input missing!', 'data'=>'');
			}
			if($ac_holder_name=='')
			{
				$response= array('status'=>'201', 'message'=>'ac_holder_name input missing!', 'data'=>'');
			}
			if($account_no_iban=='')
			{
				$response= array('status'=>'201', 'message'=>'account_no_iban input missing!', 'data'=>'');
			}		
			if($bank_id=='')
			{
				$response= array('status'=>'201', 'message'=>'bank_id input missing!', 'data'=>'');
			}
			if($swift_code=='')
			{
				$response= array('status'=>'201', 'message'=>'swift_code input missing!', 'data'=>'');
			}
			
			
			if($user_id!='' && $full_name!='' && $email!='' && preg_match($regex, $email) && !$exist_email && $std!='' && $mobile_no!='' && !$exist_mobile_no 
				&& $identification_no!='' && $identification_type!='' && $country!='' && $province!='' && $ac_holder_name!=''
				&& $account_no_iban!='' && $bank_id!='' && $swift_code!='')
			{
				$data['upload_path'] = 'uploads/user_documents/';
				$data['allowed_types'] = 'gif|jpg|png';
				$data['max_size'] = '20480000';
				$data['max_width'] = '10240000';
				$data['max_height'] = '7680000';
				$data['encrypt_name'] = false;

				$this->load->library('upload', $data);
				
				$user_doc_data = $this->wb_model->getsingle('ac_users',array('user_id'=>$user_id));
				$user_doc = $user_doc_data->user_doc;
				if ($this->upload->do_upload('document'))
				{
					if($user_doc!='')
					{
						$dir="uploads/user_documents/";
						unlink($dir.'/'.$user_doc);
					}
					$attachment_data = array('upload_data' => $this->upload->data());
					$user_doc = $attachment_data['upload_data']['file_name'];
				}
				else
				{
					if($_FILES['document']['name']!="")
					{					
						$errors = "Allowed upload type jpg, png and jpeg images only.";
						$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
					}else{
						$errors="";
					}
					
				}
				
				if($errors=="")
				{				
					$insdata = array(
							'user_id' 				=> $user_id,
							'full_name' 			=> $full_name,
							'email'	 				=> $email,
							'std'	 				=> $std,						
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
							'bank_id'				=> $bank_id,
							'swift_code'			=> $swift_code,						
							'user_doc'				=> $user_doc,						
							'otp_no'				=> $otp_no
					);
					$this->session->set_userdata($insdata);
					$response= array('status'=>'200', 'message'=>'OTP send successfully!', 'data'=>'');
				}
				
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
		
	}
	
	//Submit OTP Edit Profile
	function profile_submit_otp_post(){
		if($this->session->userdata('user_id') !='')
		{
			$otp 				= $this->post('otp');
			if($otp=='')
			{
				$response= array('status'=>'201', 'message'=>'otp input missing!', 'data'=>'');
			}
			if($otp!='' && $otp!=$this->session->userdata('otp_no'))
			{
				$response= array('status'=>'201', 'message'=>'OTP not match!', 'data'=>'');
			}
			if($this->session->userdata('otp_no')=='')
			{
				$response= array('status'=>'201', 'message'=>'Session Expired!', 'data'=>'');
			}
			if($otp!='' && $this->session->userdata('otp_no')!='' && $otp==$this->session->userdata('otp_no'))
			{
				$updata = array(
							'full_name' 			=> $this->session->userdata('full_name'),
							'email'	 				=> $this->session->userdata('email'),
							'std'	 				=> $this->session->userdata('std'),						
							'mobile_no' 			=> $this->session->userdata('mobile_no'),
							'identification_no' 	=> $this->session->userdata('identification_no'),
							'identification_type' 	=> $this->session->userdata('identification_type'),
							'country'				=> $this->session->userdata('country'),
							'province'				=> $this->session->userdata('province'),
							'city'					=> $this->session->userdata('city'),
							'district'				=> $this->session->userdata('district'),
							'street'				=> $this->session->userdata('street'),
							'ac_holder_name'		=> $this->session->userdata('ac_holder_name'),
							'account_no_iban'		=> $this->session->userdata('account_no_iban'),
							'bank_id'				=> $this->session->userdata('bank_id'),
							'swift_code'			=> $this->session->userdata('swift_code'),						
							'user_doc'				=> $this->session->userdata('user_doc')											
					);
				$this->wb_model->updateData('ac_users',$updata,array('user_id'=>$this->session->userdata('user_id')));			
				
				//SESSION DESTROY
				$sessdata = array(
							'user_id' 				=> '',
							'full_name' 			=> '',
							'email'	 				=> '',
							'std'	 				=> '',						
							'mobile_no' 			=> '',
							'identification_no' 	=> '',
							'identification_type' 	=> '',
							'country'				=> '',
							'province'				=> '',
							'city'					=> '',
							'district'				=> '',
							'street'				=> '',
							'ac_holder_name'		=> '',
							'account_no_iban'		=> '',
							'bank_id'				=> '',
							'swift_code'			=> '',						
							'user_doc'				=> '',						
							'otp_no'				=> ''
					);
				$this->session->unset_userdata($sessdata);
				$this->session->sess_destroy(); 
				
				$response= array('status'=>'200', 'message'=>'Profile Update Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET ALL Users
	function users_get(){ 
		if($this->session->userdata('user_id') !='')
		{
			$data = $this->wb_model->getAllwhere('ac_users',array('status !='=>'0'));
			if(count($data)>0)
			{
				$final = array();
				foreach($data as $d)
				{
					$final_data['user_id'] 					= $d->user_id;
					$final_data['full_name'] 				= $d->full_name;
					$final_data['email'] 					= $d->email;
					$final_data['std'] 						= $d->std;
					$final_data['mobile_no'] 				= $d->mobile_no;
					$final_data['country'] 					= $d->country;
					$final_data['province'] 				= $d->province;
					$final_data['city'] 					= $d->city;
					$final_data['identification_no'] 		= $d->identification_no;
					$final_data['identification_type'] 		= $d->identification_type;
					$final_data['district'] 				= $d->district;
					$final_data['street'] 					= $d->street;
					$final_data['ac_holder_name'] 			= $d->ac_holder_name;
					$final_data['account_no_iban'] 			= $d->account_no_iban;
					$final_data['bank_id'] 					= $d->bank_id;
					$bank_data = $this->wb_model->getsingle('ac_banks',array('bank_id'=>$d->bank_id));
					$final_data['bank_name'] 				= $bank_data->bank_name;
					$final_data['swift_code'] 				= $d->swift_code;
					if($d->user_doc!='')
					{
						$final_data['user_doc'] 			= base_url()."uploads/user_documents/".$d->user_doc;
					}else{
						$final_data['user_doc'] 			= $d->user_doc;
					}
					if($d->user_profile_pic!='')
					{
						$final_data['user_profile_pic'] 	= base_url()."uploads/profile_images/".$d->user_profile_pic;
					}else{
						$final_data['user_profile_pic'] 	= $d->user_profile_pic;
					}				
					if($d->status=='0')
					{
						$final_data['status'] 	= "Active";
					}else{
						$final_data['status'] 	= "Deactive";
					}
					$final_data['registration_date'] 		= $d->registration_date;
					$final[] = $final_data;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Activate User
	function activate_user_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 	= $this->post('user_id');		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}		
			if($user_id!='')
			{
				$updata = array(
							'status' 	=> '0'
					);
				$this->wb_model->updateData('ac_users',$updata,array('user_id'=>$user_id));
				$response= array('status'=>'200', 'message'=>'User Activated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	//Deactivate User
	function deactivate_user_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 	= $this->post('user_id');		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}		
			if($user_id!='')
			{
				$updata = array(
							'status' 	=> '1'
					);
				$this->wb_model->updateData('ac_users',$updata,array('user_id'=>$user_id));
				$response= array('status'=>'200', 'message'=>'User Deactivated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Upload Profile Image
	function upload_profile_image_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$user_id 	= $this->post('user_id');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if(empty($_FILES['files']['name']))
			{
				$response= array('status'=>'201', 'message'=>'Please Select file!', 'data'=>'');
			}		
			
			if($user_id!='' && !empty($_FILES['files']['name']))
			{
				$data['upload_path'] = 'uploads/profile_images/';
				$data['allowed_types'] = 'jpg|jpeg|png';
				$data['max_size'] = '20480000';
				$data['max_width'] = '10240000';
				$data['max_height'] = '7680000';
				$data['encrypt_name'] = false;

				$this->load->library('upload', $data);
				$errors="";
				if ($this->upload->do_upload('files'))
				{
					$attachment_data = array('upload_data' => $this->upload->data());
					$user_profile_pic = $attachment_data['upload_data']['file_name'];
				}
				else
				{
					if($_FILES['files']['name']!="")
					{					
						$errors = "Allowed upload type png, jpg and jpeg images only.";
						$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
					}else{
						$errors="";
					}
					
				}
				
				if($errors=="")
				{
					$user_data = $this->wb_model->getsingle('ac_users',array('user_id'=>$user_id));
					if($user_data->user_profile_pic!='')
					{
						$dir="uploads/profile_images/";
						unlink($dir.'/'.$user_data->user_profile_pic);
					}
					 
					$updata = array(
							'user_profile_pic' 			=> $user_profile_pic
					);
					$this->wb_model->updateData('ac_users',$updata,array('user_id'=>$user_id));
					$response= array('status'=>'200', 'message'=>'Profile picture Upload Successfully!', 'data'=>'');
				}
			} 
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}

/*----------------------------------------Category API----------------------------------------------*/	
	//Add category
	function add_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$errors="";
			$category_name 	= $this->post('category_name');
			$exist = $this->wb_model->getsingle('ac_categories',array('name' => $category_name));
			if($category_name=='')
			{
				$response= array('status'=>'201', 'message'=>'category_name input missing!', 'data'=>'');
			}		
			else if($category_name!='' && $exist)
			{
				$response= array('status'=>'201', 'message'=>'category_name Already Exists!', 'data'=>'');
			}
			
			if($category_name!='' && !$exist)
			{
				$data['upload_path'] = 'uploads/category_icon/';
				$data['allowed_types'] = 'png';
				$data['max_size'] = '20480000';
				$data['max_width'] = '10240000';
				$data['max_height'] = '7680000';
				$data['encrypt_name'] = false;

				$this->load->library('upload', $data);
				$icon = '';
				if ($this->upload->do_upload('icon'))
				{
					$attachment_data = array('upload_data' => $this->upload->data());
					$icon = $attachment_data['upload_data']['file_name'];
				}
				else
				{
					if($_FILES['icon']['name']!="")
					{					
						$errors = "Allowed upload type png images only.";
						$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
					}else{
						$errors="";
					}
					
				}
				
				if($errors=="")
				{
					$insdata = array(
							'name' 			=> $category_name,
							'icon' 			=> $icon,
							'entry_date'	=> date('Y-m-d')
					);
					$this->wb_model->insertData('ac_categories',$insdata);
					$response= array('status'=>'200', 'message'=>'Category added Successfully!', 'data'=>'');
				}
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Categories
	function categories_get(){ 
		if($this->session->userdata('user_id') !='')
		{
			$data = $this->wb_model->getAllrecord('ac_categories');
			if(count($data)>0)
			{
				$final = array();
				foreach($data as $d)
				{
					$final_data['category_id'] 	= $d->category_id;
					$final_data['name'] 		= $d->name;
					if($d->icon!='')
					{
						$final_data['icon'] 		= base_url()."uploads/category_icon/".$d->icon;
					}else{
						$final_data['icon'] 		= $d->icon;
					}
					if($d->status=='0')
					{
						$final_data['status'] 		= "Active";
					}else{
						$final_data['status'] 		= "Deactive";
					}
					
					$final_data['entry_date'] 	= $d->entry_date;
					$final[] = $final_data;
				}
				
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final );
			}
			else
			{
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$data );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}																		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Edit Or View Categories
	function edit_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$category_id 	= $this->post('category_id');
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}
			$data = $this->wb_model->getAllwhere('ac_categories',array('category_id'=>$category_id));
			
			if(count($data)>0 && $category_id!='')
			{
				$final = array();
				foreach($data as $d)
				{
					$final_data['category_id'] 	= $d->category_id;
					$final_data['name'] 		= $d->name;
					if($d->icon!='')
					{
						$final_data['icon'] 		= base_url()."uploads/category_icon/".$d->icon;
					}else{
						$final_data['icon'] 		= $d->icon;
					}
					
					$final_data['entry_date'] 	= $d->entry_date;
					
				}
				$finals = (object)$final_data;
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$finals );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'no record found!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}																		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Update category
	function update_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$errors="";
			$category_id 	= $this->post('category_id');
			$category_name 	= $this->post('category_name');
			$exist = $this->wb_model->getsingle('ac_categories',array('name' => $category_name,'category_id !='=>$category_id));
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}
			if($category_name=='')
			{
				$response= array('status'=>'201', 'message'=>'category_name input missing!', 'data'=>'');
			}		
			else if($category_name!='' && $exist)
			{
				$response= array('status'=>'201', 'message'=>'category_name Already Exists!', 'data'=>'');
			}
			
			if($category_id!='' && $category_name!='' && !$exist)
			{
				$data['upload_path'] = 'uploads/category_icon/';
				$data['allowed_types'] = 'png';
				$data['max_size'] = '20480000';
				$data['max_width'] = '10240000';
				$data['max_height'] = '7680000';
				$data['encrypt_name'] = false;

				$this->load->library('upload', $data);
				$icon_data = $this->wb_model->getsingle('ac_categories',array('category_id'=>$category_id));
				$icon = $icon_data->icon;
				if ($this->upload->do_upload('icon'))
				{
					$attachment_data = array('upload_data' => $this->upload->data());
					$icon = $attachment_data['upload_data']['file_name'];
				}
				else
				{
					if($_FILES['icon']['name']!="")
					{					
						$errors = "Allowed upload type png images only.";
						$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
					}else{
						$errors="";
					}
					
				}
				
				if($errors=="")
				{
					$updata = array(
							'name' 			=> $category_name,
							'icon' 			=> $icon						
					);
					$this->wb_model->updateData('ac_categories',$updata,array('category_id'=>$category_id));
					$response= array('status'=>'200', 'message'=>'Category updated Successfully!', 'data'=>'');
				}
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Activate Category
	function activate_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$category_id 	= $this->post('category_id');		
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}		
			if($category_id!='')
			{
				$updata = array(
							'status' 	=> '0'
					);
				$this->wb_model->updateData('ac_categories',$updata,array('category_id'=>$category_id));
				$response= array('status'=>'200', 'message'=>'Category Activated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}			
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Deactivate Category
	function deactivate_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$category_id 	= $this->post('category_id');		
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}		
			if($category_id!='')
			{
				$updata = array(
							'status' 	=> '1'
					);
				$this->wb_model->updateData('ac_categories',$updata,array('category_id'=>$category_id));
				$response= array('status'=>'200', 'message'=>'Category Deactivated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}

/*----------------------------------------Products API----------------------------------------------*/	
	//Add Product
	function add_product_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$user_id 				= $this->post('user_id');
			$category_id 			= $this->post('category_id');
			$product_name 			= $this->post('product_name');
			$description 			= $this->post('description');
			$selling_price 			= $this->post('selling_price');
			$bid_start_date_time 	= $this->post('bid_start_date_time');
			$bid_end_date_time 		= $this->post('bid_end_date_time');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}
			if($product_name=='')
			{
				$response= array('status'=>'201', 'message'=>'product_name input missing!', 'data'=>'');
			}
			else if(strlen($product_name)>40)
			{
				$response= array('status'=>'201', 'message'=>'product_name Max 40 Characters!', 'data'=>'');
			}		
			if($description=='')
			{
				$response= array('status'=>'201', 'message'=>'description input missing!', 'data'=>'');
			}
			if($selling_price=='')
			{
				$response= array('status'=>'201', 'message'=>'selling_price input missing!', 'data'=>'');
			}
			if($bid_start_date_time=='')
			{
				$response= array('status'=>'201', 'message'=>'bid_start_date_time input missing!', 'data'=>'');
			}
			if($bid_end_date_time=='')
			{
				$response= array('status'=>'201', 'message'=>'bid_end_date_time input missing!', 'data'=>'');
			}
			if($category_id!='' && $product_name!='' && strlen($product_name)<40 && $description!='' && $selling_price!=''
			 && $bid_start_date_time!='' && $bid_end_date_time!=''
			)
			{
				$insdata = array(
							'user_id' 				=> $user_id,
							'category_id' 			=> $category_id,
							'product_name' 			=> $product_name,
							'description' 			=> $description,
							'selling_price' 		=> $selling_price,
							'current_bid_amount' 	=> $selling_price,
							'bid_start_date_time' 	=> $bid_start_date_time,
							'bid_end_date_time' 	=> $bid_end_date_time,
							'entry_date'			=> date('Y-m-d')
					);
				$product_id = $this->wb_model->insertData('ac_products',$insdata);
				$ins_data = array('product_id'=>$product_id);			
				$response= array('status'=>'200', 'message'=>'Product added Successfully!', 'data'=>$ins_data);
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Add Product
	function upload_document_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $prod_user_data && !empty($_FILES['files']['name']))
			{
				$filesCount = count($_FILES['files']['name']);
				$error="1";
				for($i = 0; $i < $filesCount; $i++)
				{
					$_FILES['file']['name']     = $_FILES['files']['name'][$i];
					$_FILES['file']['type']     = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error']    = $_FILES['files']['error'][$i];
					$_FILES['file']['size']     = $_FILES['files']['size'][$i];
					
					// File upload configuration
					$uploadPath 			= 'uploads/product_documents/';
					$config['upload_path'] 	= $uploadPath;
					$config['allowed_types']= '*';
					
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					// Upload file to server
					if($this->upload->do_upload('file')){
						$error="0";
						// Uploaded file data
						$fileData = $this->upload->data();
						//$uploadData[$i]['file_name'] = $fileData['file_name'];
						
						$insdata = array(
							'product_id' 	=> $product_id,
							'document' 		=> $fileData['file_name'],						
							'upload_date'	=> date('Y-m-d')
						);
						$this->wb_model->insertData('ac_product_documents',$insdata);
					}
				}
				if($error==1)
				{
					$response= array('status'=>'201', 'message'=>'Some problem occurred, please try again!', 'data'=>'');
				}else{
					$response= array('status'=>'200', 'message'=>'Documents upload successfully!', 'data'=>'');
				}
				
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'please upload atleast one file!', 'data'=>'');
			}	
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Add Product
	function upload_images_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $prod_user_data && !empty($_FILES['files']['name']))
			{
				$filesCount = count($_FILES['files']['name']);
				$error="1";
				for($i = 0; $i < $filesCount; $i++)
				{
					$_FILES['file']['name']     = $_FILES['files']['name'][$i];
					$_FILES['file']['type']     = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error']    = $_FILES['files']['error'][$i];
					$_FILES['file']['size']     = $_FILES['files']['size'][$i];
					
					// File upload configuration
					$uploadPath 			= 'uploads/product_images/';
					$config['upload_path'] 	= $uploadPath;
					$config['allowed_types']= 'jpg|png|jpeg';
					
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					// Upload file to server
					if($this->upload->do_upload('file')){
						$error="0";
						// Uploaded file data
						$fileData = $this->upload->data();
						//$uploadData[$i]['file_name'] = $fileData['file_name'];
						
						$insdata = array(
							'product_id' 	=> $product_id,
							'image' 		=> $fileData['file_name'],						
							'upload_date'	=> date('Y-m-d')
						);
						$this->wb_model->insertData('ac_product_images',$insdata);
					}
				}
				if($error==1)
				{
					$response= array('status'=>'201', 'message'=>'Some problem occurred, please try again!', 'data'=>'');
				}else{
					$response= array('status'=>'200', 'message'=>'Images upload successfully!', 'data'=>'');
				}
				
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'please upload atleast one file!', 'data'=>'');
			}	
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET ALL Products
	function products_get(){       
		$data = $this->wb_model->getAllwhere('ac_products');
		if(count($data)>0)
		{
			$final_data = array();
			foreach($data as $d)
			{
				$final['product_id'] 			= $d->product_id;
				$final['user_id'] 				= $d->user_id;
				$final['product_name'] 			= $d->product_name;
				$final['category_id'] 			= $d->category_id;
				$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
				$final['category_name'] 		= $category_data->name;
				$final['description'] 			= $d->description;
				$final['selling_price'] 		= $d->selling_price;
				$final['bid_start_date_time'] 	= $d->bid_start_date_time;
				$final['bid_end_date_time'] 	= $d->bid_end_date_time;
				
				//documents
				$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
				if(count($documents)>0)
				{
					$final_document = array();
					foreach($documents as $dc)
					{
						$doc['id'] 			= $dc->id;
						$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
						$doc['upload_date'] = $dc->upload_date;
						$final_document[] 	= $doc;
					}
				$final['documents'] 	= $final_document;		
				}
				else{
				$final['documents'] 	= "";	
				}
				
				//Images
				$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
				if(count($images)>0)
				{
					$final_images = array();
					foreach($images as $img)
					{
						$im['id'] 			= $img->id;
						$im['image'] 		= base_url()."uploads/product_images/".$img->image;
						$im['upload_date'] 	= $img->upload_date;
						$final_images[] = $im;
					}
				$final['images'] 	= $final_images;		
				}
				else{
				$final['images'] 	= "";	
				}
				if($d->status=='0')
				{
					$final['status'] 	= "Active";
				}else{
					$final['status'] 	= "Deactive";
				}
				$final['entry_date'] 	= $d->entry_date;
				$final_data[] = $final;
			}			
			$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET ALL Products By category
	function products_by_category_post(){
		if($this->session->userdata('user_id') !='')
		{
			$category_id 		= $this->post('category_id');
			if($category_id=='')
			{
				$response= array('status'=>'201', 'message'=>'category_id input missing!', 'data'=>'');
			}
			$data = $this->wb_model->getAllwhere('ac_products',array('category_id'=>$category_id));
			if(count($data)>0 && $category_id!='')
			{
				$final_data = array();
				foreach($data as $d)
				{
					$final['product_id'] 			= $d->product_id;
					$final['user_id'] 				= $d->user_id;
					$final['product_name'] 			= $d->product_name;
					$final['category_id'] 			= $d->category_id;
					$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
					$final['category_name'] 		= $category_data->name;
					$final['description'] 			= $d->description;
					$final['selling_price'] 		= $d->selling_price;
					$final['bid_start_date_time'] 	= $d->bid_start_date_time;
					$final['bid_end_date_time'] 	= $d->bid_end_date_time;
					
					//documents
					$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
					if(count($documents)>0)
					{
						$final_document = array();
						foreach($documents as $dc)
						{
							$doc['id'] 			= $dc->id;
							$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
							$doc['upload_date'] = $dc->upload_date;
							$final_document[] 	= $doc;
						}
					$final['documents'] 	= $final_document;		
					}
					else{
					$final['documents'] 	= "";	
					}
					
					//Images
					$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
					if(count($images)>0)
					{
						$final_images = array();
						foreach($images as $img)
						{
							$im['id'] 			= $img->id;
							$im['image'] 		= base_url()."uploads/product_images/".$img->image;
							$im['upload_date'] 	= $img->upload_date;
							$final_images[] = $im;
						}
					$final['images'] 	= $final_images;		
					}
					else{
					$final['images'] 	= "";	
					}
					if($d->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$final['entry_date'] 	= $d->entry_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	//GET ALL My Products
	function my_products_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			$data = $this->wb_model->getAllwhere('ac_products',array('user_id'=>$user_id));
			if(count($data)>0 && $user_id!='')
			{
				$final_data = array();
				foreach($data as $d)
				{
					$final['product_id'] 			= $d->product_id;
					$final['user_id'] 				= $d->user_id;
					$final['product_name'] 			= $d->product_name;
					$final['category_id'] 			= $d->category_id;
					$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
					$final['category_name'] 		= $category_data->name;
					$final['description'] 			= $d->description;
					$final['selling_price'] 		= $d->selling_price;
					$final['bid_start_date_time'] 	= $d->bid_start_date_time;
					$final['bid_end_date_time'] 	= $d->bid_end_date_time;
					
					//documents
					$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
					if(count($documents)>0)
					{
						$final_document = array();
						foreach($documents as $dc)
						{
							$doc['id'] 			= $dc->id;
							$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
							$doc['upload_date'] = $dc->upload_date;
							$final_document[] 	= $doc;
						}
					$final['documents'] 	= $final_document;		
					}
					else{
					$final['documents'] 	= "";	
					}
					
					//Images
					$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
					if(count($images)>0)
					{
						$final_images = array();
						foreach($images as $img)
						{
							$im['id'] 			= $img->id;
							$im['image'] 		= base_url()."uploads/product_images/".$img->image;
							$im['upload_date'] 	= $img->upload_date;
							$final_images[] = $im;
						}
					$final['images'] 	= $final_images;		
					}
					else{
					$final['images'] 	= "";	
					}
					if($d->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$final['entry_date'] 	= $d->entry_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Activate Product
	function activate_product_post(){
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}	
			if($user_id!='' && $product_id!='' && $prod_user_data)
			{
				$updata = array(
							'status' 	=> '0'
					);
				$this->wb_model->updateData('ac_products',$updata,array('user_id'=>$user_id,'product_id'=>$product_id));
				$response= array('status'=>'200', 'message'=>'Product Activated Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Deactivate Product
	function deactivate_product_post(){
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}	
			if($user_id!='' && $product_id!='' && $prod_user_data)
			{
				$updata = array(
							'status' 	=> '1'
					);
				$this->wb_model->updateData('ac_products',$updata,array('user_id'=>$user_id,'product_id'=>$product_id));
				$response= array('status'=>'200', 'message'=>'Product Deactivated Successfully!', 'data'=>'');
			}	
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Delete Product
	function delete_document_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$document_id 		= $this->post('document_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			$prod_doc_data = $this->wb_model->getsingle('ac_product_documents',array('id'=>$document_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}
			if($document_id=='')
			{
				$response= array('status'=>'201', 'message'=>'document_id input missing!', 'data'=>'');
			}
			if($document_id!='' && $product_id!='' && !$prod_doc_data)
			{
				$response= array('status'=>'201', 'message'=>'document_id and product_id Not match!', 'data'=>'');
			}
			
			if($user_id!='' && $product_id!='' && $document_id!='' && $prod_user_data && $prod_doc_data)
			{
				
				$dir="uploads/product_documents/";
				unlink($dir.'/'.$prod_doc_data->document);
				$this->wb_model->deleteData('ac_product_documents',array('id'=>$document_id,'product_id'=>$product_id));	
				$response= array('status'=>'200', 'message'=>'document Deleted Successfully!', 'data'=>'');
			}			
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Delete Image
	function delete_image_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$image_id 			= $this->post('image_id');
			$prod_user_data = $this->wb_model->getsingle('ac_products',array('user_id'=>$user_id,'product_id'=>$product_id));
			$prod_img_data = $this->wb_model->getsingle('ac_product_images',array('id'=>$image_id,'product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$prod_user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id and product_id Not match!', 'data'=>'');
			}
			if($image_id=='')
			{
				$response= array('status'=>'201', 'message'=>'image_id input missing!', 'data'=>'');
			}
			if($image_id!='' && $product_id!='' && !$prod_img_data)
			{
				$response= array('status'=>'201', 'message'=>'image_id and product_id Not match!', 'data'=>'');
			}
			
			if($user_id!='' && $product_id!='' && $image_id!='' && $prod_user_data && $prod_img_data)
			{
			  
				$dir="uploads/product_images/";
				unlink($dir.'/'.$prod_img_data->image);
				$this->wb_model->deleteData('ac_product_images',array('id'=>$image_id,'product_id'=>$product_id));	
				$response= array('status'=>'200', 'message'=>'Image Deleted Successfully!', 'data'=>'');
			}			
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}

/*----------------------------------------favourite API----------------------------------------------*/	
	//Add To favourite
	function add_to_favourite_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$favourites_data 	= $this->wb_model->getsingle('ac_favourites',array('user_id'=>$user_id,'product_id'=>$product_id));
			$user_data 			= $this->wb_model->getsingle('ac_users',array('user_id'=>$user_id));
			$product_data 		= $this->wb_model->getsingle('ac_products',array('product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if($user_id!='' && !$user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if($product_id!='' && !$product_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $favourites_data)
			{
				$response= array('status'=>'201', 'message'=>'Already added favourite list!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$favourites_data && $user_data && $product_data)
			{
				$insdata = array(
					'product_id' 	=> $product_id,
					'user_id' 		=> $user_id,						
					'added_date'	=> date('Y-m-d')
				);
				$this->wb_model->insertData('ac_favourites',$insdata);
				$response= array('status'=>'200', 'message'=>'Add To favourite list successfully!', 'data'=>'');
				
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET ALL My favourite
	function my_favourites_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			$data = $this->wb_model->getAllwhere('ac_favourites',array('user_id'=>$user_id));
			if(count($data)>0 && $user_id!='')
			{
				$final_data = array();
				foreach($data as $d)
				{
					$final['product_id'] 			= $d->product_id;
					$final['user_id'] 				= $d->user_id;
					$product_data = $this->wb_model->getsingle('ac_products',array('product_id' => $d->product_id));		
					$final['product_name'] 			= $product_data->product_name;
					$final['category_id'] 			= $product_data->category_id;
					$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $product_data->category_id));		
					$final['category_name'] 		= $category_data->name;
					$final['description'] 			= $product_data->description;
					$final['selling_price'] 		= $product_data->selling_price;
					$final['bid_start_date_time'] 	= $product_data->bid_start_date_time;
					$final['bid_end_date_time'] 	= $product_data->bid_end_date_time;
					
					//documents
					$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $product_data->product_id));
					if(count($documents)>0)
					{
						$final_document = array();
						foreach($documents as $dc)
						{
							$doc['id'] 			= $dc->id;
							$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
							$doc['upload_date'] = $dc->upload_date;
							$final_document[] 	= $doc;
						}
					$final['documents'] 	= $final_document;		
					}
					else{
					$final['documents'] 	= "";	
					}
					
					//Images
					$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $product_data->product_id));
					if(count($images)>0)
					{
						$final_images = array();
						foreach($images as $img)
						{
							$im['id'] 			= $img->id;
							$im['image'] 		= base_url()."uploads/product_images/".$img->image;
							$im['upload_date'] 	= $img->upload_date;
							$final_images[] = $im;
						}
					$final['images'] 	= $final_images;		
					}
					else{
					$final['images'] 	= "";	
					}
					if($d->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$final['added_date'] 	= $d->added_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Remove To favourite
	function remove_to_favourite_post(){		
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$user_id 			= $this->post('user_id');
			$favourites_data 	= $this->wb_model->getsingle('ac_favourites',array('user_id'=>$user_id,'product_id'=>$product_id));
			$user_data 			= $this->wb_model->getsingle('ac_users',array('user_id'=>$user_id));
			$product_data 		= $this->wb_model->getsingle('ac_products',array('product_id'=>$product_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if($user_id!='' && !$user_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if($product_id!='' && !$product_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$favourites_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id and user_id not exist favourite list!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $favourites_data && $user_data && $product_data)
			{
				$where = array(
					'product_id' 	=> $product_id,
					'user_id' 		=> $user_id
				);
				$this->wb_model->deleteData('ac_favourites',$where);
				$response= array('status'=>'200', 'message'=>'Remove To favourite list successfully!', 'data'=>'');
				
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
/*----------------------------------------Wallet API----------------------------------------------*/		
	
	//Add Amount To Wallet
	function add_amount_by_bank_post(){
		if($this->session->userdata('user_id') !='')
		{
			$errors						= "";		
			$user_id 					= $this->post('user_id');
			$amount 					= $this->post('amount');
			$deposit_transaction_number = $this->post('deposit_transaction_number');
			$deposit_date 				= $this->post('deposit_date');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}		
			if($amount=='')
			{
				$response= array('status'=>'201', 'message'=>'amount input missing!', 'data'=>'');
			}
			if($deposit_transaction_number=='')
			{
				$response= array('status'=>'201', 'message'=>'deposit_transaction_number input missing!', 'data'=>'');
			}
			if($deposit_date=='')
			{
				$response= array('status'=>'201', 'message'=>'deposit_date input missing!', 'data'=>'');
			}
			
			if($user_id!='' && $amount!='' && $deposit_transaction_number!='' && $deposit_date!='' )
			{
				$data['upload_path'] = 'wallet/';
				$data['allowed_types'] = 'jpg|png|jpeg';
				$data['max_size'] = '20480000';
				$data['max_width'] = '10240000';
				$data['max_height'] = '7680000';
				$data['encrypt_name'] = false;

				$this->load->library('upload', $data);
				$payment_receipt = '';
				if ($this->upload->do_upload('payment_receipt'))
				{
					$attachment_data = array('upload_data' => $this->upload->data());
					$payment_receipt = $attachment_data['upload_data']['file_name'];
				}
				else
				{
					if($_FILES['payment_receipt']['name']!="")
					{					
						$errors = "Allowed upload type jpg, png and jpeg images only.";
						$response= array('status'=>'201', 'message'=>$errors, 'data'=>'');
					}else{
						$errors="";
					}
					
				}
				
				if($errors=="")
				{				
					$insdata = array(
							'user_id' 						=> $user_id,
							'amount'	 					=> $amount,
							'payment_type'	 				=> 'Deposit',						
							'payment_method' 				=> 'Bank_tranfer_deposit',
							'deposit_transaction_number' 	=> $deposit_transaction_number,
							'deposit_date' 					=> $deposit_date,
							'payment_receipt'				=> $payment_receipt,
							'entry_date' 					=> date('Y-m-d'),
							'payment_status'				=> "Pending"
					);
					$this->wb_model->insertData('ac_wallet_details',$insdata);
					$response= array('status'=>'200', 'message'=>'Payment Added successfully, wait for approval!', 'data'=>'');
				}
				
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
		
	}
	
	//Add Amount To Wallet by Pay Online
	function add_amount_pay_online_post(){
		if($this->session->userdata('user_id') !='')
		{	
			$user_id 			= $this->post('user_id');
			$amount 			= $this->post('amount');
			$card_number 		= $this->post('card_number');
			$security_code 		= $this->post('security_code');
			$expiration_date 	= $this->post('expiration_date');
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}		
			if($amount=='')
			{
				$response= array('status'=>'201', 'message'=>'amount input missing!', 'data'=>'');
			}
			if($card_number=='')
			{
				$response= array('status'=>'201', 'message'=>'card_number input missing!', 'data'=>'');
			}
			if($security_code=='')
			{
				$response= array('status'=>'201', 'message'=>'security_code input missing!', 'data'=>'');
			}
			if($expiration_date=='')
			{
				$response= array('status'=>'201', 'message'=>'expiration_date input missing!', 'data'=>'');
			}
			
			if($user_id!='' && $amount!='' && $card_number!='' && $security_code!='' && $expiration_date!='' )
			{							
				$insdata = array(
						'user_id' 						=> $user_id,
						'amount'	 					=> $amount,
						'payment_type'	 				=> 'Deposit',						
						'payment_method' 				=> 'Pay_online',
						'card_number' 					=> $card_number,
						'security_code' 				=> $security_code,
						'expiration_date'				=> $expiration_date,
						'entry_date' 					=> date('Y-m-d'),
						'payment_status'				=> "Approved"
				);
				$this->wb_model->insertData('ac_wallet_details',$insdata);
				
				$wallet_data = $this->wb_model->getsingle('ac_wallet',array('user_id'=>$user_id));
				if($wallet_data)
				{
					$final_amount = $wallet_data->current_amount + $amount;
					$this->wb_model->updateData('ac_wallet',array('current_amount'=>$final_amount),array('user_id'=>$user_id));
				}else{
					$this->wb_model->insertData('ac_wallet',array('user_id'=>$user_id,'current_amount'=>$amount));
				}
				
				$response= array('status'=>'200', 'message'=>'Payment Added successfully!', 'data'=>'');
				
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		$this->response($response	, 200); // 200 being the HTTP response code		
		
	}
	
	//GET ALL Transactions
	function transactions_get(){
		if($this->session->userdata('user_id') !='')
		{
			$data = $this->wb_model->getAllrecord('ac_wallet_details');
			if(count($data)>0)
			{
				$final_data = array();
				foreach($data as $d)
				{				
					$final['user_id'] 					= $d->user_id;
					$users_data = $this->wb_model->getsingle('ac_users',array('user_id'=> $d->user_id));		
					$final['full_name'] 				= $users_data->full_name;
					$final['amount'] 					= $d->amount;
					$final['payment_type'] 				= $d->payment_type;
					$final['payment_method'] 			= $d->payment_method;
					$final['deposit_transaction_number']= $d->deposit_transaction_number;
					
					if($d->deposit_date=='0000-00-00')
					{
						$final['deposit_date'] 			= "";
					}
					else
					{
						$final['deposit_date'] 			= $d->deposit_date;	
					}
					if($d->payment_receipt!='')
					{
						$final['payment_receipt'] 		= base_url()."uploads/wallet/".$dc->payment_receipt;
					}
					else
					{
						$final['payment_receipt'] 		= "";	
					}
					$final['entry_date'] 				= $d->entry_date;
					$final['payment_status'] 			= $d->payment_status;
					$final['created_date'] 				= $d->created_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	//GET My ALL Transactions
	function my_transactions_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 			= $this->post('user_id');
			$users_data = $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}		
			$data = $this->wb_model->getAllwhere('ac_wallet_details',array('user_id'=>$user_id));
			if($user_id!='' && $users_data && count($data)>0)
			{
				$final_data = array();
				foreach($data as $d)
				{				
					$final['user_id'] 					= $d->user_id;
					$final['amount'] 					= $d->amount;
					$final['payment_type'] 				= $d->payment_type;
					$final['payment_method'] 			= $d->payment_method;
					$final['deposit_transaction_number']= $d->deposit_transaction_number;
					
					if($d->deposit_date=='0000-00-00')
					{
						$final['deposit_date'] 			= "";
					}
					else
					{
						$final['deposit_date'] 			= $d->deposit_date;	
					}
					if($d->payment_receipt!='')
					{
						$final['payment_receipt'] 		= base_url()."uploads/wallet/".$dc->payment_receipt;
					}
					else
					{
						$final['payment_receipt'] 		= "";	
					}
					$final['entry_date'] 				= $d->entry_date;
					$final['payment_status'] 			= $d->payment_status;
					$final['created_date'] 				= $d->created_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	//GET My Balance
	function my_wallet_balance_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 			= $this->post('user_id');
			$users_data = $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}		
			$data = $this->wb_model->getsingle('ac_wallet',array('user_id'=>$user_id));
			if($user_id!='' && $users_data)
			{
				if($data)
				{
					$d['current_balance'] = $data->current_amount;
				}
				else
				{
					$d['current_balance'] = "0.00";
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$d);
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Past Products
	function past_products_get(){       
		$data = $this->wb_model->getAllwhere('ac_products',array('bid_end_date_time <'=>date('Y-m-d h:i:s')));
		if(count($data)>0)
		{
			$final_data = array();
			foreach($data as $d)
			{
				$final['product_id'] 			= $d->product_id;
				$final['user_id'] 				= $d->user_id;
				$final['product_name'] 			= $d->product_name;
				$final['category_id'] 			= $d->category_id;
				$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
				$final['category_name'] 		= $category_data->name;
				$final['description'] 			= $d->description;
				$final['selling_price'] 		= $d->selling_price;
				$final['bid_start_date_time'] 	= $d->bid_start_date_time;
				$final['bid_end_date_time'] 	= $d->bid_end_date_time;
				
				//documents
				$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
				if(count($documents)>0)
				{
					$final_document = array();
					foreach($documents as $dc)
					{
						$doc['id'] 			= $dc->id;
						$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
						$doc['upload_date'] = $dc->upload_date;
						$final_document[] 	= $doc;
					}
				$final['documents'] 	= $final_document;		
				}
				else{
				$final['documents'] 	= "";	
				}
				
				//Images
				$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
				if(count($images)>0)
				{
					$final_images = array();
					foreach($images as $img)
					{
						$im['id'] 			= $img->id;
						$im['image'] 		= base_url()."uploads/product_images/".$img->image;
						$im['upload_date'] 	= $img->upload_date;
						$final_images[] = $im;
					}
				$final['images'] 	= $final_images;		
				}
				else{
				$final['images'] 	= "";	
				}
				if($d->status=='0')
				{
					$final['status'] 	= "Active";
				}else{
					$final['status'] 	= "Deactive";
				}
				$final['entry_date'] 	= $d->entry_date;
				$final_data[] = $final;
			}			
			$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Future Products
	function future_products_get(){       
		$data = $this->wb_model->getAllwhere('ac_products',array('bid_start_date_time >'=>date('Y-m-d h:i:s')));
		if(count($data)>0)
		{
			$final_data = array();
			foreach($data as $d)
			{
				$final['product_id'] 			= $d->product_id;
				$final['user_id'] 				= $d->user_id;
				$final['product_name'] 			= $d->product_name;
				$final['category_id'] 			= $d->category_id;
				$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
				$final['category_name'] 		= $category_data->name;
				$final['description'] 			= $d->description;
				$final['selling_price'] 		= $d->selling_price;
				$final['bid_start_date_time'] 	= $d->bid_start_date_time;
				$final['bid_end_date_time'] 	= $d->bid_end_date_time;
				
				//documents
				$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
				if(count($documents)>0)
				{
					$final_document = array();
					foreach($documents as $dc)
					{
						$doc['id'] 			= $dc->id;
						$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
						$doc['upload_date'] = $dc->upload_date;
						$final_document[] 	= $doc;
					}
				$final['documents'] 	= $final_document;		
				}
				else{
				$final['documents'] 	= "";	
				}
				
				//Images
				$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
				if(count($images)>0)
				{
					$final_images = array();
					foreach($images as $img)
					{
						$im['id'] 			= $img->id;
						$im['image'] 		= base_url()."uploads/product_images/".$img->image;
						$im['upload_date'] 	= $img->upload_date;
						$final_images[] = $im;
					}
				$final['images'] 	= $final_images;		
				}
				else{
				$final['images'] 	= "";	
				}
				if($d->status=='0')
				{
					$final['status'] 	= "Active";
				}else{
					$final['status'] 	= "Deactive";
				}
				$final['entry_date'] 	= $d->entry_date;
				$final_data[] = $final;
			}			
			$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Current Products
	function current_products_get(){       
		$data = $this->wb_model->getAllwhere('ac_products',array('bid_start_date_time <='=>date('Y-m-d h:i:s'),'bid_end_date_time >='=>date('Y-m-d h:i:s')));
		if(count($data)>0)
		{
			$final_data = array();
			foreach($data as $d)
			{
				$final['product_id'] 			= $d->product_id;
				$final['user_id'] 				= $d->user_id;
				$final['product_name'] 			= $d->product_name;
				$final['category_id'] 			= $d->category_id;
				$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
				$final['category_name'] 		= $category_data->name;
				$final['description'] 			= $d->description;
				$final['selling_price'] 		= $d->selling_price;
				$final['bid_start_date_time'] 	= $d->bid_start_date_time;
				$final['bid_end_date_time'] 	= $d->bid_end_date_time;
				
				//documents
				$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
				if(count($documents)>0)
				{
					$final_document = array();
					foreach($documents as $dc)
					{
						$doc['id'] 			= $dc->id;
						$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
						$doc['upload_date'] = $dc->upload_date;
						$final_document[] 	= $doc;
					}
				$final['documents'] 	= $final_document;		
				}
				else{
				$final['documents'] 	= "";	
				}
				
				//Images
				$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
				if(count($images)>0)
				{
					$final_images = array();
					foreach($images as $img)
					{
						$im['id'] 			= $img->id;
						$im['image'] 		= base_url()."uploads/product_images/".$img->image;
						$im['upload_date'] 	= $img->upload_date;
						$final_images[] = $im;
					}
				$final['images'] 	= $final_images;		
				}
				else{
				$final['images'] 	= "";	
				}
				if($d->status=='0')
				{
					$final['status'] 	= "Active";
				}else{
					$final['status'] 	= "Deactive";
				}
				$final['entry_date'] 	= $d->entry_date;
				$final_data[] = $final;
			}			
			$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Place Bid
	function place_bid_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 			= $this->post('user_id');
			$product_id 		= $this->post('product_id');
			$bid_amount 		= $this->post('bid_amount');
			
			$users_data 	= $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));
			
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			else if($products_data->bid_end_date_time < date('Y-m-d h:i:s'))
			{
				$response= array('status'=>'201', 'message'=>'Auction ended product!', 'data'=>'');
			}
			if($bid_amount=='')
			{
				$response= array('status'=>'201', 'message'=>'bid_amount input missing!', 'data'=>'');
			}
			else if($products_data && $products_data->current_bid_amount >= $bid_amount)
			{
				$response= array('status'=>'201', 'message'=>'bid_amount graterthen current bid amount!', 'data'=>'');
			}
			
			$data = $this->wb_model->getsingle('ac_wallet',array('user_id'=>$user_id));
			if($user_id!='' && $users_data && $product_id!='' && $products_data && $products_data->current_bid_amount < $bid_amount && $products_data->bid_end_date_time >= date('Y-m-d h:i:s'))
			{
				$ins_data = array(
						'user_id'		=> $user_id,
						'product_id'	=> $product_id,
						'bid_amount'	=> $bid_amount,
						'bid_date'		=> date('Y-m-d')
						);
				$this->wb_model->insertData('ac_product_bids',$ins_data);
			
				//Update Bid amount
				$this->wb_model->updateData('ac_products',array('current_bid_amount'=> $bid_amount),array('product_id'=> $product_id));
						
				$response= array('status'=>'200', 'message'=>'your bid placed successfully', 'data'=>'');
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Current Products
	function all_bids_get(){ 
		if($this->session->userdata('user_id') !='')
		{
			$data = $this->wb_model->getAllwhere('ac_products');
			if(count($data)>0)
			{
				$final_data = array();
				foreach($data as $d)
				{
					$final['product_id'] 			= $d->product_id;				
					$final['product_name'] 			= $d->product_name;
					$final['category_id'] 			= $d->category_id;
					$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
					$final['category_name'] 		= $category_data->name;
					
					//bids
					$documents = $this->wb_model->getAllwhere('ac_product_bids',array('product_id' => $d->product_id));
					if(count($documents)>0)
					{
						$final_bids = array();
						foreach($documents as $dc)
						{
							$bd['bid_amount'] 	= $dc->bid_amount;
							$bd['bid_date'] 	= $dc->bid_date;
							$bd['bider_id'] 	= $dc->user_id;
							$final_bids[] 		= $bd;
						}
					$final['bids'] 	= $final_bids;		
					}
					else{
					$final['bids'] 	= "";	
					}
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//No. Of Bids
	function no_off_bids_post(){
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));		
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			
			$data = $this->wb_model->getAllwhere('ac_product_bids',array('product_id'=>$product_id));
			if($product_id!='' && $products_data)
			{
				if(count($data)>0)
				{
					$bid = count($data);
					$dd['product_id']= $product_id;
					$dd['no_of_bids']= "$bid";
				}
				else
				{
					$dd['product_id']= $product_id;
					$dd['no_of_bids']= "0";
				}			
				$response= array('status'=>'200', 'message'=>'', 'data'=>$dd);
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Highest Bids
	function heghest_bid_post(){
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));		
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			
			$highest_data = $this->wb_model->getsingle('ac_products',array('product_id'=>$product_id));
			$data = $this->wb_model->getAllwhere('ac_product_bids',array('product_id'=>$product_id));
			if($product_id!='' && $products_data)
			{
				if(count($data)>0)
				{
					$highest = $highest_data->current_bid_amount;
					$dd['product_id']= $product_id;
					$dd['highest_bid']= "$highest";
				}
				else
				{
					$dd['product_id']= $product_id;
					$dd['highest_bid']= "0";
				}			
				$response= array('status'=>'200', 'message'=>'', 'data'=>$dd);
			}		
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET Single Product Page
	function single_product_post(){
		if($this->session->userdata('user_id') !='')
		{
			$product_id 		= $this->post('product_id');
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));		
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			
			if($products_data && $product_id!='')
			{
				$d = $products_data;
				$final_data = array();
				
					$final['product_id'] 			= $d->product_id;
					$final['user_id'] 				= $d->user_id;
					$final['product_name'] 			= $d->product_name;
					$final['category_id'] 			= $d->category_id;
					$category_data = $this->wb_model->getsingle('ac_categories',array('category_id' => $d->category_id));		
					$final['category_name'] 		= $category_data->name;
					$final['description'] 			= $d->description;
					$final['selling_price'] 		= $d->selling_price;
					$final['current_bid_amount']    = $d->current_bid_amount;
					$final['bid_start_date_time'] 	= $d->bid_start_date_time;
					$final['bid_end_date_time'] 	= $d->bid_end_date_time;
					
					//documents
					$documents = $this->wb_model->getAllwhere('ac_product_documents',array('product_id' => $d->product_id));
					if(count($documents)>0)
					{
						$final_document = array();
						foreach($documents as $dc)
						{
							$doc['id'] 			= $dc->id;
							$doc['document'] 	= base_url()."uploads/product_documents/".$dc->document;
							$doc['upload_date'] = $dc->upload_date;
							$final_document[] 	= $doc;
						}
					$final['documents'] 	= $final_document;		
					}
					else{
					$final['documents'] 	= "";	
					}
					
					//Images
					$images = $this->wb_model->getAllwhere('ac_product_images',array('product_id' => $d->product_id));
					if(count($images)>0)
					{
						$final_images = array();
						foreach($images as $img)
						{
							$im['id'] 			= $img->id;
							$im['image'] 		= base_url()."uploads/product_images/".$img->image;
							$im['upload_date'] 	= $img->upload_date;
							$final_images[] = $im;
						}
					$final['images'] 	= $final_images;		
					}
					else{
					$final['images'] 	= "";	
					}
					if($d->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$final['entry_date'] 	= $d->entry_date;
					$final_data[] = $final;
							
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET my all bids
	function my_bids_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			$bids_datas 	= $this->wb_model->my_bids($user_id);		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			if(count($bids_datas)>0 && $user_id!='')
			{
				$final_data = array();
				foreach($bids_datas as $d)
				{
					$final['id'] 			= $d['id'];
					$final['user_id'] 		= $d['user_id'];
					$final['product_id'] 	= $d['product_id'];				
					$prod_data = $this->wb_model->getsingle('ac_products',array('product_id' => $d['product_id']));		
					$final['product_name'] 	= $prod_data->product_name;
					if($prod_data->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$bids_data = $this->wb_model->getAllwhere('ac_product_bids',array('product_id' => $d['product_id'] , 'user_id' => $d['user_id']));		
					if(count($bids_data)>0)
					{
						$final_bids = array();
						foreach($bids_data as $b)
						{
							$bb['id'] 			= $b->id;
							$bb['bid_amount'] 	= $b->bid_amount;
							$bb['bid_date'] 	= $b->bid_date;
							$final_bids[] = $bb;
						}
					$final['bids'] 	= $final_bids;		
					}
					else{
					$final['bids'] 	= "";	
					}
					
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}else{
				$response= array('status'=>'201', 'message'=>'you are not bid any products!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Add Watch List
	function add_watch_list_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			$product_id 	= $this->post('product_id');
			
			$users_data 	= $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));
			
			$exist_watch_list = $this->wb_model->getsingle('ac_watch_list',array('product_id' => $product_id,'user_id' => $user_id));		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $exist_watch_list)
			{
				$response= array('status'=>'201', 'message'=>'this product Watch list Already Exists!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$exist_watch_list && $users_data && $products_data)
			{
				$insdata = array(
							'user_id' 		=> $user_id,
							'product_id' 	=> $product_id,						
							'watch_date'	=> date('Y-m-d')
					);
				$this->wb_model->insertData('ac_watch_list',$insdata);
				$response= array('status'=>'200', 'message'=>'Product Watch list added Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//Remove Watch List
	function remove_watch_list_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			$product_id 	= $this->post('product_id');
			
			$users_data 	= $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));
			$products_data 	= $this->wb_model->getsingle('ac_products',array('product_id'=> $product_id));
			
			$exist_watch_list = $this->wb_model->getsingle('ac_watch_list',array('product_id' => $product_id,'user_id' => $user_id));		
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($product_id=='')
			{
				$response= array('status'=>'201', 'message'=>'product_id input missing!', 'data'=>'');
			}
			else if(!$products_data)
			{
				$response= array('status'=>'201', 'message'=>'product_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && !$exist_watch_list)
			{
				$response= array('status'=>'201', 'message'=>'this product Watch list Not Exists!', 'data'=>'');
			}
			if($user_id!='' && $product_id!='' && $exist_watch_list && $users_data && $products_data)
			{
				$deldata = array(
							'user_id' 		=> $user_id,
							'product_id' 	=> $product_id
					);
				$this->wb_model->deleteData('ac_watch_list',$deldata);
				$response= array('status'=>'200', 'message'=>'Product Watch list removed Successfully!', 'data'=>'');
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//GET watch List
	function watch_list_get(){
		if($this->session->userdata('user_id') !='')
		{
			$data = $this->wb_model->getAllwhere('ac_watch_list');
			if(count($data)>0)
			{
				$final_data = array();
				foreach($data as $d)
				{
					$prod_data = $this->wb_model->getsingle('ac_products',array('product_id' => $d->product_id));		
					$user_data = $this->wb_model->getsingle('ac_users',array('user_id' => $d->user_id));		
					$final['product_id'] 			= $prod_data->product_id;
					$final['user_id'] 				= $user_data->user_id;				
					$final['product_name'] 			= $prod_data->product_name;
					$final['user_name'] 			= $user_data->full_name;
					if($prod_data->status=='0')
					{
						$final['status'] 	= "Active";
					}else{
						$final['status'] 	= "Deactive";
					}
					$final['watch_date'] 	= $d->watch_date;
					$final_data[] = $final;
				}			
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//My watch List
	function my_watch_list_post(){ 
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			$users_data 	= $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $users_data )
			{
				$data = $this->wb_model->getAllwhere('ac_watch_list',array('user_id' => $user_id));
				if(count($data)>0)
				{
					$final_data = array();
					foreach($data as $d)
					{
						$prod_data = $this->wb_model->getsingle('ac_products',array('product_id' => $d->product_id));							
						$final['product_id'] 			= $prod_data->product_id;								
						$final['product_name'] 			= $prod_data->product_name;
						
						if($prod_data->status=='0')
						{
							$final['status'] 	= "Active";
						}else{
							$final['status'] 	= "Deactive";
						}
						$final['watch_date'] 	= $d->watch_date;
						$final_data[] = $final;
					}			
					$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
				}
				else
				{
					$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
				}
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	// Winning List
	function winning_list_get(){ 
		if($this->session->userdata('user_id') !='')
		{
			$products = $this->wb_model->getAllwhere('ac_products',array('bid_end_date_time <' => date('Y-m-d h:i:s')));
			if(count($products)>0)
			{
				$final_data = array();
				for($i=0;$i<count($products);$i++)
				{
					$pro['product_id'] 			= $products[$i]->product_id;
					$pro['product_name'] 		= $products[$i]->product_name;
					$pro['description'] 		= $products[$i]->description;
					$pro['bid_start_date_time'] = $products[$i]->bid_start_date_time;
					$pro['bid_end_date_time'] 	= $products[$i]->bid_end_date_time;
					if($products[$i]->status=='0')
					{
						$pro['status'] 	= "Active";
					}else{
						$pro['status'] 	= "Deactive";
					}
					$win_prod_data = $this->wb_model->get_winner_details_by_product($products[$i]->product_id);
					
					if($win_prod_data[0]->bid_amount!='')
					{
						$w_data = $this->wb_model->getsingle('ac_product_bids',array('bid_amount'=>$win_prod_data[0]->bid_amount,'product_id'=>$products[$i]->product_id));					
						$user_data = $this->wb_model->getsingle('ac_users',array('user_id'=>$w_data->user_id));					
						$final_d['winner_id'] 		= $user_data->user_id;
						$final_d['winner_name'] 	= $user_data->full_name;
						$final_d['bid_amount'] 		= $win_prod_data[0]->bid_amount;
						$pro['winner_details'] 		= $final_d;		
					}
					else{
						$pro['winner_details'] 	= "";	
					}
					
					$final_data[] = $pro;
				}
				$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	
	//My winning Products
	function my_winning_list_post(){
		if($this->session->userdata('user_id') !='')
		{
			$user_id 		= $this->post('user_id');
			$users_data 	= $this->wb_model->getsingle('ac_users',array('user_id'=> $user_id));
			if($user_id=='')
			{
				$response= array('status'=>'201', 'message'=>'user_id input missing!', 'data'=>'');
			}
			else if(!$users_data)
			{
				$response= array('status'=>'201', 'message'=>'user_id not exist!', 'data'=>'');
			}
			if($user_id!='' && $users_data )
			{
				$data = $this->wb_model->my_bids_product($user_id);	
							
				if(count($data)>0)
				{
					$final_data = array();
					foreach($data as $d)
					{
						$prod_data = $this->wb_model->getsingle('ac_products',array('product_id' => $d->product_id));							
						$win_prod_data = $this->wb_model->get_winner_details_by_product($d->product_id);
						$w_data = $this->wb_model->getsingle('ac_product_bids',array('bid_amount'=>$win_prod_data[0]->bid_amount,'product_id'=>$d->product_id));					
						
						if($prod_data->bid_end_date_time < date('Y-m-d h:i:s') && $w_data->user_id==$user_id)
						{
							$final['product_id'] 			= $prod_data->product_id;								
							$final['product_name'] 			= $prod_data->product_name;
							$final['description'] 			= $prod_data->description;
							$final['bid_start_date_time'] 	= $prod_data->bid_start_date_time;
							$final['bid_end_date_time'] 	= $prod_data->bid_end_date_time;
							if($prod_data->status=='0')
							{
								$final['status'] 	= "Active";
							}else{
								$final['status'] 	= "Deactive";
							}
							$final['bid_amount'] 	= $d->bid_amount;
							$final['bid_date'] 	= $d->bid_date;
							$final_data[] = $final;
						}
					}
					if(count($final_data)>0)
					{
						$response= array('status'=>'200', 'message'=>'success', 'data'=>$final_data );
					}
					else
					{
						$response= array('status'=>'201', 'message'=>'No winning products!', 'data'=>'' );
					}
					
				}
				else
				{
					$response= array('status'=>'201', 'message'=>'No Record found!', 'data'=>'' );
				}
			}
		}
		else
		{
			$response= array('status'=>'201', 'message'=>'Please Login first!', 'data'=>'' );
		}
        $this->response($response	, 200); // 200 being the HTTP response code		
	}
	

}
	

