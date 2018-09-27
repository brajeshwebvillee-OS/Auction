<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{
   function search_intro($key){
     $q = $this->db->query("SELECT * FROM users where ( login_id LIKE '%".$key."%' or full_name LIKE '%".$key."%' ) AND status = '0' ");
     $result = $q->result_array();
     return $result;    
    }
		
	 /*---GET SINGLE RECORD---*/
    function getsingle($table, $where)
    {
        $q = $this->db->get_where($table, $where);
        return $q->row();
    }
	
	 /*<!--INSERT RECORD FROM SINGLE TABLE-->*/
    function insertData($table, $dataInsert)
    {
        $this->db->insert($table, $dataInsert);
        return $this->db->insert_id();
    }
	
	 /*<!--UPDATE RECORD FROM SINGLE TABLE-->*/
    function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        return;
    }
	 /*<!--DELETE RECORD FROM SINGLE TABLE-->*/
    function deleteData($table, $where)
    {
        //$this->db->delete('mytable', array('id' => $id));
        $this->db->delete($table, $where);
        return;
    }
	
	 /*<!--GET ALL RECORD FROM SINGLE TABLE WITHOUT CONDITION-->*/
    function getAllrecord($table)
    {
        $this->db->select('*');
        $q = $this->db->get($table);
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	/*---GET MULTIPLE RECORD---*/
    function getAllwhere($table, $where)
    {
        $this->db->select('*');
        $q = $this->db->get_where($table, $where);
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	function getAllrecord_vehicles()
    {
        $this->db->select('v.*,c.client_name,c.mobile_no');				
		$this->db->join('clients as c','c.client_id=v.client_id');
        $q = $this->db->get_where('vehicles as v');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function get_pass($from_date='',$to_date='',$client_id='',$vehicle_id='',$material_id='')
    {
        $this->db->select('gp.*,c.client_name,m.material_name,v.vehicle_no');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		if($from_date!='')
		{
			$this->db->where('gp.date >=', $from_date);
		}
		if($to_date!='')
		{
			$this->db->where('gp.date <=', $to_date);
		}
		if($client_id!='')
		{
			$this->db->where('gp.client_id', $client_id);
		}
		if($vehicle_id!='')
		{
			$this->db->where('gp.vehicle_id', $vehicle_id);
		}
		if($material_id!='')
		{
			$this->db->where('gp.material_id', $material_id);
		}
		if($bill!='')
		{
			$this->db->where('gp.bill_id', $bill);
		}
		
		$this->db->order_by('gp.date','desc');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function get_pass_for_billing($from_date='',$to_date='',$client_id='',$vehicle_id='',$material_id='',$bill='')
    {
        $this->db->select('gp.*,c.client_name,m.material_name');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		if($from_date!='')
		{
			$this->db->where('gp.date >=', $from_date);
		}
		if($to_date!='')
		{
			$this->db->where('gp.date <=', $to_date);
		}
		if($client_id!='')
		{
			$this->db->where('gp.client_id', $client_id);
		}
		if($vehicle_id!='')
		{
			$this->db->where('gp.vehicle_id', $vehicle_id);
		}
		if($material_id!='')
		{
			$this->db->where('gp.material_id', $material_id);
		}
		if($bill!='')
		{
			$this->db->where('gp.bill_id', $bill);
		}
		
		$this->db->order_by('gp.date','asc');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function ganerate_bill($from_date='',$to_date='',$client_id='',$material_id='',$bill='')
    {
        $this->db->select('gp.*,c.client_name,m.material_name,v.vehicle_no');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		$this->db->where('gp.amount !=', '');
		if($from_date!='')
		{
			$this->db->where('gp.date >=', $from_date);
		}
		if($to_date!='')
		{
			$this->db->where('gp.date <=', $to_date);
		}
		if($client_id!='')
		{
			$this->db->where('gp.client_id', $client_id);
		}		
		if($material_id!='')
		{
			$this->db->where('gp.material_id', $material_id);
		}
		if($bill!='')
		{
			$this->db->where('gp.bill_id', $bill);
		}
		
		$this->db->order_by('gp.date','asc');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	function ganerate_bill_group($from_date='',$to_date='',$client_id='',$material_id='',$bill='')
    {
        $this->db->select('gp.id,gp.material_id,m.material_name');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		$this->db->where('gp.amount !=', '');
		if($from_date!='')
		{
			$this->db->where('gp.date >=', $from_date);
		}
		if($to_date!='')
		{
			$this->db->where('gp.date <=', $to_date);
		}
		if($client_id!='')
		{
			$this->db->where('gp.client_id', $client_id);
		}		
		if($material_id!='')
		{
			$this->db->where('gp.material_id', $material_id);
		}
		if($bill!='')
		{
			$this->db->where('gp.bill_id', $bill);
		}
		
		$this->db->order_by('m.material_id','asc');
		$this->db->group_by('gp.material_id');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	function get_bills($from_date='',$to_date='',$client_id='',$invoice_no='')
    {
        $this->db->select('b.*,c.client_name');				
		$this->db->join('clients as c','c.client_id=b.client_id');		
		if($from_date!='')
		{
			$this->db->where('b.entry_date >=', $from_date);
		}
		if($to_date!='')
		{
			$this->db->where('b.entry_date <=', $to_date);
		}
		if($client_id!='')
		{
			$this->db->where('b.client_id', $client_id);
		}		
		if($invoice_no!='')
		{
			$this->db->where('b.invoice_no', $invoice_no);
		}
		$this->db->order_by('b.entry_date','desc');
        $q = $this->db->get_where('bills as b');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function get_bill_info($bill_id)
    {
        $this->db->select('gp.*,c.client_name,m.material_name,v.vehicle_no');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		$this->db->where('gp.bill_id',$bill_id);		
		$this->db->order_by('gp.date','asc');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function get_bill_info_group($bill_id)
    {
        $this->db->select('gp.id,gp.material_id,m.material_name');				
		$this->db->join('clients as c','c.client_id=gp.client_id');
		$this->db->join('vehicles as v','v.vehicle_id=gp.vehicle_id');
		$this->db->join('materials as m','m.material_id=gp.material_id');
		$this->db->where('gp.bill_id',$bill_id);
		$this->db->order_by('m.material_id','asc');
		$this->db->group_by('gp.material_id');
        $q = $this->db->get_where('gate_pass as gp');
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	    	
}