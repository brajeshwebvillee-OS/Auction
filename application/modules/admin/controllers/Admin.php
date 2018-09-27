<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   	public function __construct()
	{
		parent::__construct();
		 $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		date_default_timezone_set('Asia/Calcutta'); 
		$this->userid = $this->session->userdata('user_id');
		$this->load->model(array('admin/common_model'));
		
	}
	
	public function index($page = '')
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['main_content'] = 'dashboard';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
/* ------------------------------------- Material --------------------------------- */
	public function materials()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$data['materials'] = $this->common_model->getAllrecord('materials');
			$data['main_content'] = 'materials';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function material_add()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$this->form_validation->set_rules('material_name', 'Material Name', 'trim|required|unique[materials.material_name]');
			$data['material_name'] = $material_name = $this->input->post('material_name',TRUE);
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(
				   'entry_date' 	=> date('Y-m-d'),
				   'material_name' 	=> $material_name
			   );
			   
				$insert_id = $this->common_model->insertData('materials',$insertArray);
				$this->session->set_flashdata("msg","<font class='success'>Record Inserted Successfully..!!</font>");
				redirect('admin/materials');
			}
			
			$data['main_content'] = 'material_add';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	function check_material($material_name, $id) {
		$clients = $this->common_model->getsingle('materials',array('material_id !='=>$id,'material_name'=>$material_name));
		if($clients){
			 $this->form_validation->set_message('check_material', 'Material "'.$material_name.'" Already Exist Please Inter Other.');
			 return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function material_edit($id)
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$data['materials'] = $this->common_model->getsingle('materials',array('material_id'=>$id));
			
			$this->form_validation->set_rules('material_name', 'Material Name', 'trim|required|callback_check_material['.$id.']');
			$data['material_name'] = $material_name = $this->input->post('material_name',TRUE);
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(				 
				   'material_name' 	=> $material_name
			   );
			   
				$this->common_model->updateData('materials',$insertArray,array('material_id'=>$id));
				$this->session->set_flashdata("msg","<font class='success'>Record Updated Successfully..!!</font>");
				redirect('admin/materials');
			}
			
			$data['main_content'] = 'material_edit';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function material_view($id)
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$data['materials'] = $this->common_model->getsingle('materials',array('material_id'=>$id));
						
			$data['main_content'] = 'material_view';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function material_status($id,$status)
	{
		if($this->session->userdata('id') !='')
		{	
			$this->common_model->updateData('materials',array('status'=>$status),array('material_id'=>$id));
			$this->session->set_flashdata("msg","<font class='success'>Status Changed Successfully..!!</font>");
			redirect('admin/materials');
			
		}
		else
		{
			redirect('login');
		}
            
	}
/* ------------------------------------- Clients --------------------------------- */
	public function clients()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$data['clients'] = $this->common_model->getAllrecord('clients');
			$data['main_content'] = 'clients';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function client_add()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
			$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|unique[clients.mobile_no]|numeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			
			$data['client_name'] 	= $client_name 	= $this->input->post('client_name',TRUE);
			$data['mobile_no'] 		= $mobile_no 	= $this->input->post('mobile_no',TRUE);
			$data['address'] 		= $address 		= $this->input->post('address',TRUE);
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(
				   'entry_date' 	=> date('Y-m-d'),
				   'client_name' 	=> $client_name,
				   'mobile_no' 		=> $mobile_no,
				   'address' 		=> $address
			   );
			   
				$insert_id = $this->common_model->insertData('clients',$insertArray);
				$this->session->set_flashdata("msg","<font class='success'>Record Inserted Successfully..!!</font>");
				redirect('admin/clients');
			}
			
			$data['main_content'] = 'client_add';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	function check_mobile($mobile, $id) {
		$clients = $this->common_model->getsingle('clients',array('client_id !='=>$id,'mobile_no'=>$mobile));
		if($clients){
			 $this->form_validation->set_message('check_mobile', 'Mobile Number "'.$mobile.'" Already Exist Please Inter Other.');
			 return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function client_edit($id)
	{
		if($this->session->userdata('id') !='')
		{
			$data['clients'] = $this->common_model->getsingle('clients',array('client_id'=>$id));
			
			$data['msg'] = $this->session->flashdata('msg');
			$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
			$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|callback_check_mobile['.$id.']|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			
			$data['client_name'] 	= $client_name 	= $this->input->post('client_name',TRUE);
			$data['mobile_no'] 		= $mobile_no 	= $this->input->post('mobile_no',TRUE);
			$data['address'] 		= $address 		= $this->input->post('address',TRUE);
			
			if($this->form_validation->run() == TRUE) 
			{
				$update_data = array(				  
				   'client_name' 	=> $client_name,
				   'mobile_no' 		=> $mobile_no,
				   'address' 		=> $address
			   );
			   
				$this->common_model->updateData('clients',$update_data,array('client_id'=>$id));
				redirect('admin/clients');
				$this->session->set_flashdata("msg","<font class='success'>Record Updated Successfully..!!</font>");
			}
			
			$data['main_content'] = 'client_edit';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function client_view($id)
	{
		if($this->session->userdata('id') !='')
		{
			$data['clients'] = $this->common_model->getsingle('clients',array('client_id'=>$id));
			
			$data['main_content'] = 'client_view';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
		
	public function client_status($id,$status)
	{
		if($this->session->userdata('id') !='')
		{	
			$this->common_model->updateData('clients',array('status'=>$status),array('client_id'=>$id));
			$this->session->set_flashdata("msg","<font class='success'>Status Changed Successfully..!!</font>");
			redirect('admin/clients');
			
		}
		else
		{
			redirect('login');
		}
            
	}
/* ------------------------------------- Vehicles --------------------------------- */
	public function check_vehicle($vehicle_no,$client_id)
	{
		if($this->session->userdata('id') !='')
		{	
			$vehicles = $this->common_model->getsingle('vehicles',array('client_id'=>$client_id,'vehicle_no'=>$vehicle_no));
			if($vehicles){
				 $this->form_validation->set_message('check_vehicle', 'Vehicle Number Already Exist.');
				 return FALSE;
			}
			else {
				return TRUE;
			}
			
		}
		else
		{
			redirect('login');
		}
            
	}
	public function vehicles()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			$data['vehicles'] = $this->common_model->getAllrecord_vehicles();
			$data['main_content'] = 'vehicles';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function vehicle_add()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] 		= $this->session->flashdata('msg');
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			
			$data['client_id'] 	= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_no'] = $vehicle_no 	= $this->input->post('vehicle_no',TRUE);
			
			$this->form_validation->set_rules('client_id', 'Select Client', 'trim|required');
			$this->form_validation->set_rules('vehicle_no', 'Vehicle Number', 'trim|required|callback_check_vehicle['.$client_id.']');
			
			
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(
				   'entry_date' 	=> date('Y-m-d'),
				   'vehicle_no' 	=> $vehicle_no,
				   'client_id' 		=> $client_id
			   );
			   
				$insert_id = $this->common_model->insertData('vehicles',$insertArray);
				$this->session->set_flashdata("msg","<font class='success'>Record Inserted Successfully..!!</font>");
				redirect('admin/vehicles');
			}
			
			$data['main_content'] = 'vehicle_add';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function check_vehicle_up($vehicle_no,$client_id_id)
	{
		if($this->session->userdata('id') !='')
		{	
			$ids = explode('-',$client_id_id);
			$client_id = $ids[0];
			$id = $ids[1];
			
			$vehicles = $this->common_model->getsingle('vehicles',array('vehicle_id !='=>$id,'client_id'=>$client_id,'vehicle_no'=>$vehicle_no));
			if($vehicles){
				 $this->form_validation->set_message('check_vehicle_up', 'Vehicle Number Already Exist.');
				 return FALSE;
			}
			else {
				return TRUE;
			}
			
		}
		else
		{
			redirect('login');
		}
            
	}
	public function vehicle_edit($id)
	{
		if($this->session->userdata('id') !='')
		{
			$data['vehicles'] = $this->common_model->getsingle('vehicles',array('vehicle_id'=>$id));
			
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			
			$data['client_id'] 	= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_no'] = $vehicle_no 	= $this->input->post('vehicle_no',TRUE);
			
			$this->form_validation->set_rules('client_id', 'Select Client', 'trim|required');
			$this->form_validation->set_rules('vehicle_no', 'Vehicle Number', 'trim|required|callback_check_vehicle_up['.$client_id.'-'.$id.']');
			
			if($this->form_validation->run() == TRUE) 
			{
				$update_data = array(				  
				   'client_id' 	=> $client_id,
				   'vehicle_no' => $vehicle_no
			   );
			   
				$this->common_model->updateData('vehicles',$update_data,array('vehicle_id'=>$id));
				redirect('admin/vehicles');
				$this->session->set_flashdata("msg","<font class='success'>Record Updated Successfully..!!</font>");
			}
			
			$data['main_content'] = 'vehicle_edit';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function vehicle_status($id,$status)
	{
		if($this->session->userdata('id') !='')
		{	
			$this->common_model->updateData('vehicles',array('status'=>$status),array('vehicle_id'=>$id));
			$this->session->set_flashdata("msg","<font class='success'>Status Changed Successfully..!!</font>");
			redirect('admin/vehicles');
			
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function vehicle_view($id)
	{
		if($this->session->userdata('id') !='')
		{
			$data['vehicles'] = $this->common_model->getsingle('vehicles',array('vehicle_id'=>$id));
			
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			
			
			$data['main_content'] = 'vehicle_view';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
/* ------------------------------------- Gate Pass --------------------------------- */
	public function gate_pass_add()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] 		= $this->session->flashdata('msg');
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			$data['serial_no'] 		= $serial_no 	= $this->input->post('serial_no',TRUE);
			$data['date'] 			= $date 		= $this->input->post('date',TRUE);
			$data['in_time']		= $in_time 		= $this->input->post('in_time',TRUE);
			$data['out_time'] 		= $out_time 	= $this->input->post('out_time',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_id'] 	= $vehicle_id 	= $this->input->post('vehicle_id',TRUE);
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);
			$data['quantity'] 		= $quantity 	= $this->input->post('quantity',TRUE);
			
			
			$data['vehicles'] 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$client_id));
			
			$this->form_validation->set_rules('date', 'Date', 'trim|required');
			$this->form_validation->set_rules('serial_no', 'Slip Number', 'trim|required');
			$this->form_validation->set_rules('in_time', 'In Time', 'trim|required');
			$this->form_validation->set_rules('out_time', 'Out Time', 'trim|required');
			$this->form_validation->set_rules('client_id', 'Select Client', 'trim|required');
			$this->form_validation->set_rules('vehicle_id', 'Select Vehicle', 'trim|required');
			$this->form_validation->set_rules('material_id', 'Select Material', 'trim|required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
			
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(
				   'entry_date' 	=> date('Y-m-d'),
				   'serial_no' 		=> $serial_no,
				   'date' 			=> $date,
				   'in_time' 		=> $in_time,
				   'out_time' 		=> $out_time,
				   'client_id' 		=> $client_id,
				   'vehicle_id' 	=> $vehicle_id,
				   'material_id' 	=> $material_id,
				   'quantity' 		=> $quantity
			   );
			   
				$insert_id = $this->common_model->insertData('gate_pass',$insertArray);
				$this->session->set_flashdata("msg","<font class='success'>Record Inserted Successfully..!!</font>");
				redirect('admin/gate_passes');
			}
			
			$data['main_content'] = 'gate_pass_add';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function getvehicle()
	{
		if($this->session->userdata('id') !='')
		{
			$client_id = $_POST["client_id"];
			$vehicles 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$client_id));
			
			$veh = '<option value="">Select Vehicle</option>';
					if(count($vehicles)>0){ 
						for($i=0;$i<count($vehicles);$i++){ 
							$veh .='<option value="'.$vehicles[$i]->vehicle_id.'" >'.$vehicles[$i]->vehicle_no.'</option>';
						}			 
					} 
						
			echo $veh;
		}
		else
		{
			redirect('login');
		} 
		
	}
	public function gate_passes()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_id'] 	= $vehicle_id 	= $this->input->post('vehicle_id',TRUE);
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);
			
			$data['vehicles'] 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$client_id));
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			
			$data['gate_passes'] = $this->common_model->get_pass($from_date,$to_date,$client_id,$vehicle_id,$material_id);
			
			$data['main_content'] = 'gate_passes';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function gate_pass_edit($id)
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] 		= $this->session->flashdata('msg');
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			$data['gate_pass'] = $this->common_model->getsingle('gate_pass',array('id'=>$id));
			
			$data['date'] 			= $date 		= $this->input->post('date',TRUE);
			$data['serial_no'] 		= $serial_no 		= $this->input->post('serial_no',TRUE);
			$data['in_time']		= $in_time 		= $this->input->post('in_time',TRUE);
			$data['out_time'] 		= $out_time 	= $this->input->post('out_time',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_id'] 	= $vehicle_id 	= $this->input->post('vehicle_id',TRUE);
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);
			$data['quantity'] 		= $quantity 	= $this->input->post('quantity',TRUE);
			
			
			$data['vehicles'] 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$data['gate_pass']->client_id));
			
			$this->form_validation->set_rules('date', 'Date', 'trim|required');
			$this->form_validation->set_rules('serial_no', 'Slip Number', 'trim|required');
			$this->form_validation->set_rules('in_time', 'In Time', 'trim|required');
			$this->form_validation->set_rules('out_time', 'Out Time', 'trim|required');
			$this->form_validation->set_rules('client_id', 'Select Client', 'trim|required');
			$this->form_validation->set_rules('vehicle_id', 'Select Vehicle', 'trim|required');
			$this->form_validation->set_rules('material_id', 'Select Material', 'trim|required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
			
			
			if($this->form_validation->run() == TRUE) 
			{
				$insertArray = array(				  
				   'date' 			=> $date,
				   'serial_no' 		=> $serial_no,
				   'in_time' 		=> $in_time,
				   'out_time' 		=> $out_time,
				   'client_id' 		=> $client_id,
				   'vehicle_id' 	=> $vehicle_id,
				   'material_id' 	=> $material_id,
				   'quantity' 		=> $quantity
			   );
			   
				$this->common_model->updateData('gate_pass',$insertArray,array('id'=>$id));
				$this->session->set_flashdata("msg","<font class='success'>Record Update Successfully..!!</font>");
				redirect('admin/gate_passes');
			}
			
			$data['main_content'] = 'gate_pass_edit';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function gate_pass_delete($id)
	{
		if($this->session->userdata('id') !='')
		{	
			$this->common_model->deleteData('gate_pass',array('id'=>$id));
			$this->session->set_flashdata("msg","<font class='success'>Record Deleted Successfully..!!</font>");
			redirect('admin/gate_passes');
			
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function gate_pass_view($id)
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] 		= $this->session->flashdata('msg');
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			$data['gate_pass'] = $this->common_model->getsingle('gate_pass',array('id'=>$id));
			$data['vehicles'] 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$data['gate_pass']->client_id));
			
			$data['main_content'] = 'gate_pass_view';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function billing_amount()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_id'] 	= $vehicle_id 	= $this->input->post('vehicle_id',TRUE);
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);
			
			$data['vehicles'] 	= $this->common_model->getAllwhere('vehicles',array('status'=>0,'client_id'=>$client_id));
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			
			$data['gate_passes'] = $this->common_model->get_pass_for_billing($from_date,$to_date,$client_id,$vehicle_id,$material_id,'0');
			
			$data['main_content'] = 'billing_amount';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function billing_amount_update()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['vehicle_id'] 	= $vehicle_id 	= $this->input->post('vehicle_id',TRUE);
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);
			
			$gate_passes = $this->common_model->get_pass_for_billing($from_date,$to_date,$client_id,$vehicle_id,$material_id,'0');
			if(count($gate_passes)>0)
			{
				for($i=0;$i<count($gate_passes);$i++){
					$amount = $this->input->post('amount'.$gate_passes[$i]->id);
					if($amount!='')
					{
						$this->common_model->updateData('gate_pass',array('amount'=>$amount),array('id'=>$gate_passes[$i]->id));
					}
					
				}
				
				$this->session->set_flashdata("msg","<font class='success'>Amount Updated Successfully..!!</font>");
				redirect('admin/billing_amount');
			}
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function ganerate_bill()
	{
		if($this->session->userdata('id') !='')
		{	
	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);			
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			
			$data['bills']  = $this->common_model->ganerate_bill($from_date,$to_date,$client_id,$material_id,'0');
			$data['billsh'] = $this->common_model->ganerate_bill_group($from_date,$to_date,$client_id,$material_id,'0');
			
			$data['main_content'] = 'ganerate_bill';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function ganerate_bill_update()
	{
		if($this->session->userdata('id') !='')
		{	
	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			
			$data['material_id'] 	= $material_id 	= $this->input->post('material_id',TRUE);			
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
			$data['materials'] = $this->common_model->getAllwhere('materials',array('status'=>0));
			
			
			$bills = $this->common_model->ganerate_bill($from_date,$to_date,$client_id,$material_id,'0');
			
			$data['invoice_no'] 	= $invoice_no 	= $this->input->post('invoice_no',TRUE);
			$data['bill_amount'] 	= $bill_amount 	= $this->input->post('bill_amount',TRUE);
			$data['total_amount'] 	= $total_amount = $this->input->post('total_amount',TRUE);
			$data['due'] 			= $due 			= $this->input->post('due',TRUE);
			$data['tax_amount'] 	= $tax_amount 	= $this->input->post('tax_amount',TRUE);
			$data['tax_value'] 		= $tax_value 	= $this->input->post('tax_value',TRUE);
			$data['diposit_amount'] = $diposit_amount = $this->input->post('diposit_amount',TRUE);
			$data['due_amount']     = $due_amount   = $this->input->post('due_amount',TRUE);
			
			if(count($bills)>0){
				$old_due = $this->common_model->getsingle('dues',array('client_id'=>$client_id));
				if($old_due)
				{
					$this->common_model->updateData('dues',array('due_amount'=>$due),array('client_id'=>$client_id));	
				}else{
					$this->common_model->insertData('dues',array('due_amount'=>$due,'client_id'=>$client_id));	
				}
				$ins_data= array(
					'invoice_no' 		=> $invoice_no,
				   'bill_amount' 		=> $bill_amount,
				   'total_amount' 		=> $total_amount,
				   'due' 				=> $due,
				   'tax' 				=> $tax_value,
				   'tax_amount' 		=> $tax_amount,
				   'diposit_amount' 	=> $diposit_amount,
				   'client_id' 			=> $client_id,
				   'due_amount' 		=> $due_amount,
				   'from_date' 			=> $from_date,
				   'to_date' 			=> $to_date,
				   'entry_date' 		=> date('Y-m-d')				
				);
				$insert_id = $this->common_model->insertData('bills',$ins_data);
				for($i=0;$i<count($bills);$i++){
					$this->common_model->updateData('gate_pass',array('bill_id'=>$insert_id),array('id'=>$bills[$i]->id));
				}
			}
			
			$this->session->set_flashdata("msg","<font class='success'>Bill Ganerated Successfully..!!</font>");
			redirect('admin/bill_view/'.$insert_id);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function reports()
	{
		if($this->session->userdata('id') !='')
		{	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['from_date'] 		= $from_date 	= $this->input->post('from_date',TRUE);
			$data['to_date'] 		= $to_date 		= $this->input->post('to_date',TRUE);
			$data['client_id'] 		= $client_id 	= $this->input->post('client_id',TRUE);
			$data['invoice_no'] 	= $invoice_no 	= $this->input->post('invoice_no',TRUE);
			
			$data['clients'] 	= $this->common_model->getAllwhere('clients',array('status'=>0));
						
			$data['bills'] = $this->common_model->get_bills($from_date,$to_date,$client_id,$invoice_no);
			
			//echo "<pre>"; print_r($data['bills']); die;
			
			$data['main_content'] = 'reports';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	public function bill_view($bill_id)
	{
		if($this->session->userdata('id') !='')
		{	
	
			$data['msg'] = $this->session->flashdata('msg');
			
			$data['bills'] = $this->common_model->get_bill_info($bill_id);
			$data['bills_data'] = $this->common_model->getsingle('bills',array('bill_id'=>$bill_id));
			$data['billsh'] = $this->common_model->get_bill_info_group($bill_id);
			
			$data['main_content'] = 'bill_view';
			$this->load->view('includes/admin_template',$data);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function bill_download($bill_id)
	{
		if($this->session->userdata('id') !='')
		{	
			
			$data['bills'] = $this->common_model->get_bill_info($bill_id);
			$data['bills_data'] = $this->common_model->getsingle('bills',array('bill_id'=>$bill_id));
			$data['billsh'] = $this->common_model->get_bill_info_group($bill_id);
			
			$this->load->view('bill_download',$data);
			$this->load->library('dompdf_gen');
			$html = $this->output->get_output();
			
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$invoice_no = $data['bills_data']->invoice_no;
			$this->dompdf->stream("Invoice".$invoice_no.".pdf");
			 exit(0);
		}
		else
		{
			redirect('login');
		}
            
	}
	public function database_backup()
	{
		if($this->session->userdata('id') !='')
		{	
			
			$this->load->dbutil();

			$prefs = array(     
				'format'      => 'zip',             
				'filename'    => 'my_db_backup.sql'
				);


			$backup =& $this->dbutil->backup($prefs); 

			$db_name = 'backup-on-'. date("d-m-Y H-i-s") .'.zip';
			$save = FCPATH  .'database_backup/'.$db_name;
			$this->load->helper('file');
			write_file($save, $backup); 


			$this->load->helper('download');
			force_download($db_name, $backup);
		}
		else
		{
			redirect('login');
		}
            
	}
	
	
}	

?>	