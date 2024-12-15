<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	
	public function maillist($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function home($tab,$condi,$or)
	{	$this->db->select("*");
		$this->db->where($condi);
		$this->db->or_where($or);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function services($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();

	}
	public function about($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();

	}
	public function product($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();

	}
	public function bannerr($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}
	
}
	
	
    