<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Model {
	public function login($tab,$condi)
	{
		$this->db->select();
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}

	public function profiledetails($tab,$id)
	{
		$this->db->select();
        $this->db->where($id);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->row_array();
	}
	public function sitename($tab,$condi)
	{
		$this->db->select();
        $this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->row_array();
	}

	public function contry($tab)
	{
		$this->db->select();
        $this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function allinquery($tab)
	{
		$limit=5;
		$this->db->select();
        $this->db->from($tab);
        $this->db->limit($limit);
        $this->db->order_by("inquryid","desc");
		$qry=$this->db->get();
		return $qry->result_array();

	}

	public function fetchsetting($tab,$condi)
	{
		$this->db->select();
        $this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();

	}
	public function basic_setting($tab,$condi)
	{
		$this->db->select();
		$this->db->where($condi);
        $this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();

	}
	public function updateprofile($tab,$data,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$data);
    	return true;
	}
	public function updatepass($tab,$data,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$data);
    	return true;
	}
	public function allsetting($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$this->db->group_by("section_id");
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function sitedetails($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		//$this->db->group_by("section_id");
		$qry=$this->db->get();
		return $qry->result_array();

	}

}
    