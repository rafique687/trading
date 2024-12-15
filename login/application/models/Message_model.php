<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
	
	public function sendwhatapp($tab,$data)
	{
		$this->db->insert($tab,$data);
		$insert_id = $this->db->insert_id();
    	return true;

	}
	
	public function allmessage($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->order_by("sms_id", "DESC");
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function allwhatsapp($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->order_by("whatapp_id", "DESC");
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
	
	public function textsmsdetails($tab,$condi)
	{	$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->row_array();
	}
	

}
    