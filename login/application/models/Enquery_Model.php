<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquery_model extends CI_Model {
	
	public function addcustomer($tab,$data)
	{
		$this->db->insert($tab,$data);
    	return true;
	}
	public function addemail($tab,$data)
	{
		$this->db->insert($tab,$data);
		$insert_id = $this->db->insert_id();
    	return insert_id;

	}
	public function replymail($tab,$data)
	{
		$this->db->insert($tab,$data);
    	return true;
	}
	public function allenuery($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->order_by("inquryid", "DESC");
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function allreplyed($tab)
	{	$this->db->select("*");
		$this->db->where("reply_status",2);
		//$this->db->where("reply_status",2);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}


	public function answer($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();

	}
	public function delcustomer($tab,$condi)
	{
		 $this -> db -> where($condi);
    	 $this -> db -> delete($tab);
    	 return true;
	}

	public function equrystatusupdate($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}


	


}
    