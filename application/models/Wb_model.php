<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class WB_model extends CI_Model
{   
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
	
	function login($email_mobile_no, $password)
    {
		$q = $this->db->query("SELECT user_id,full_name,email,std,mobile_no,registration_date,crated_date FROM ac_users where ( email = '".$email_mobile_no."' or mobile_no ='".$email_mobile_no."' ) AND password = '".md5($password)."' ");
		$result = $q->row();
		return $result; 
    }
	
	function my_bids($user_id)
    {
        $this->db->select('bids.*');	
		$this->db->where('user_id',$user_id);			
		$this->db->from('ac_product_bids as bids');		
		$this->db->group_by('bids.product_id');
		$q = $this->db->get();
		if ($q->num_rows() > 0)
		{
		  return $q->result_array();
		} 
        
    }
	function get_winner_details_by_product($product_id)
    {
		$this->db->select_max('bid_amount');       	
		$this->db->where('product_id',$product_id);			
		$this->db->from('ac_product_bids');		
		$q = $this->db->get();
		if ($q->num_rows() > 0)
		{
		  return $q->result();
		}         
    }
	function my_bids_product($user_id)
    {
        $this->db->select('bids.*');	
		$this->db->where('user_id',$user_id);			
		$this->db->from('ac_product_bids as bids');		
		$this->db->group_by(array('bids.product_id','bids.user_id'));
		$q = $this->db->get();
		if ($q->num_rows() > 0)
		{
		  return $q->result();
		} 
        
    }
		
}