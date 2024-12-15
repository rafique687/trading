<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_model extends CI_Model {
	public function session_fetch($tab,$condi)
	{
		$this->db->select();
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}
	public function bannerrow($tab,$condi)
	{
		$this->db->select();
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();
	}

	public function updatesection($tab,$data,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$data);
    	return true;
	}
	public function updatetbanner($tab,$data,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$data);
    	return true;
	}
	public function insertbanner($tb,$data)
	{
		$this->db->insert($tb,$data);
		return true;
	}
	public function fetch_allbanner($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function delbanner($tab,$condi)
	{
		 $this -> db -> where($condi);
    	 $this -> db -> delete($tab);
    	 return true;
	}

	public function allsetting($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}


}
    