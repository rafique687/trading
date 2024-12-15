<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

	public function eventinsert($tab,$data)
	{
		$fire=$this->db->insert($tab,$data);
		//echo "<pre>"; print_r($fire);
		  
    	return true;
	}
	public function insert_eventdetails($tab,$data)
	{
		$fire=$this->db->insert($tab,$data);
		return true;
	}
	public function viewevent_details($tab,$where)
	{
		$this->db->select("*")
				 ->distinct()
				/* ->from("event_details")*/
				 ->from("event_details as evd")
				 ->join("event as evt","evd.parent_cateid=evt.eventid","inner")
				 ->group_by("evd.evencteidd")
				->where("evd.parent_cateid",$where);
				/*->where("parent_cateid",$where);*/

		$qry=$this->db->get();
		return $qry->result_array();
	}

	public function viewevent($tab,$where)
	{
		$this->db->where($where);
		
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}

	public function  getevent($tab,$condi)
	{
		$this->db->where($condi);
		$qry=$this->db->get($tab);
		return $qry->row_array();

	}


	

	
	public function viewitem($tab)
	{
			$this->db->select('*');
			$this->db->from("item as itm");
			$this->db->JOIN("products as prd","itm.root_cate = prd.prod_id","inner");
			$this->db->WHERE('item_status',1);
			$query = $this->db->get();
			return $query->result_array();
	}

	

	//**********Delete Product******************************
	public function deleteProduct($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;
	}

	public function editinsert($tab,$upd,$condi)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}
	public function statusupdate($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;

	}
	public function deleteventpic($tab,$condi)
	{
		$this->db->where($condi);
		$this->db->delete($tab);
		return true;
	}

	public function imageupdate($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;
	}

	public function updateevent($tab,$condi,$upd)
	{

		$this->db->where($condi);
		$this->db->update($tab,$upd);
		return true;
	}
}
    