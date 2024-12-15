<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_modal extends CI_Model {
	
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
	public function stormaildetails($tab,$data)
	{
		$this->db->insert($tab,$data);
    	return true;
	}
	public function maillist($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->order_by("mail_id", "DESC");
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function allthismailreceicer($tab,$condi)
	{	$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->row_array();
	}
	public function allcustomer($tab)
	{

		$this->db->select("*");
		$this->db->from("cutomar_details cst");
		$this->db->join("contry cnt","cst.countryid=cnt.contryid","left");
		$this->db->join("state std","cst.stateid=std.stateid","left");
		$this->db->join("city ctt","cst.city=ctt.ctid","left");
		$this->db->order_by("cst.cust_id", "DESC");
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function customerdetails($tab,$id)
	{
		$this->db->select("*");
		$this->db->from("cutomar_details cst");
		$this->db->join("contry cnt","cst.countryid=cnt.contryid","left");
		$this->db->join("state std","cst.stateid=std.stateid","left");
		$this->db->where("cst.cust_id",$id);
		$qry=$this->db->get();
		return $qry->row_array();

	}
	public function delcustomer($tab,$condi)
	{
		 $this -> db -> where($condi);
    	 $this -> db -> delete($tab);
    	 return true;
	}

	public function updatecustomer($tab,$upd,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}


	


}
    