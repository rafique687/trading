<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model {

	public function productinsert($tab,$data)
	{
		$fire=$this->db->insert($tab,$data);
		//echo "<pre>"; print_r($fire);
		  
    	return true;
	}
	public function mainproduct($tab)
	{
		$this->db->select("*");
		$this->db->where("parent_id=",0);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}
	public function maincategory($tab,$condi,$or)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->or_where($or);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}

	public function getcatename($tab,$id)
	{
		$this->db->select("product_name");
		$this->db->where($id);
		$qry=$this->db->get($tab);
		return $qry->row_array();

	}

	public function maincategoryy($tab,$condi)
	{
		$this->db->select("*");
		$this->db->where($condi);
		$this->db->or_where($or);
		$qry=$this->db->get($tab);
		return $qry->result_array();
	}

	public function subproduct($tab)
	{
			
			$this->db->select('ct.product_name as sucate, ct.product_pic,ct.description,ct.status,ct.prod_id, ct.parent_id, ct.main_cate,pc.product_name as prcate' , false);
       		$this->db->from('products ct');
        	$this->db->join('products pc', "ct.main_cate = pc.parent_id", 'inner');
        	$this->db->where('ct.parent_id', 1);
        	$this->db->group_by('ct.product_name');
        	$query = $this->db->get();
			return $query->result_array();
	}
	public function jqsubproduct($tab,$condi)
	{
		     $this->db->select('*');
		     $this->db->where($condi);
			 $this->db->from($tab);
			 $query = $this->db->get();
			return $query->result_array();

	}
	public function jqstate($tab,$condi)
	{
			 $this->db->select('*');
		     $this->db->where($condi);
			 $this->db->from($tab);
			 $query = $this->db->get();
			return $query->result_array();

	}

	public function viewitem($tab,$condi,$or)
	{
			$this->db->select('*');
			$this->db->select('ctt.product_name as subcatename,ctt.prod_id,prd.Product_name as maincate_name,prd.prod_id' , false);
			$this->db->from("item as itm");
			$this->db->JOIN("products as prd","itm.root_cate = prd.prod_id","inner");
			$this->db->JOIN("products as ctt","ctt.prod_id = itm.sub_cate","inner");
			$this->db->where($condi);
			$this->db->or_where($or);
			$query = $this->db->get();
			return $query->result_array(); 

			/* $this->db->select('itm.product_name as sucate, ct.product_pic,ct.description,ct.status,ct.prod_id, ct.parent_id, ct.main_cate,pc.product_name as prcate' , false);
			$this->db->select('itm.item_name,itm.description,itm.item_status,itm.itm_id,itm.item_pic, cat.product_name,sat.parent_id, cat.parent_id,sat.product_name as subcate,ct.product_name as maincatename,ct.prod_id' , false);
       		$this->db->from('products ct');
			$this->db->join('products pc', "ct.main_cate = pc.parent_id", 'inner');
			$this->db->from('products sat');
			$this->db->join('products pc', "ct.sub_cate = sat.parent_id", 'inner');
			$this->db->join('products pc', "ct.main_cate = pc.parent_id", 'inner');
        	$this->db->where('ct.parent_id', 1);
        	$this->db->group_by('ct.product_name');
        	$query = $this->db->get();
			return $query->result_array(); */
			
			
	}

	//***************fetch pic list***************************
	public function getimage($tab,$condi)
	{
			$this->db->select('*');
		    $this->db->where($condi);
			$this->db->from($tab);
			$query = $this->db->get();
			return $query->row_array();

	}

	//***********Fetch item row for edit******************
	public function itemrow($tab,$condi)
	{
			$this->db->select('*');
		    $this->db->where($condi);
			$this->db->from($tab);
			$query = $this->db->get();
			return $query->row_array();

	}

	//**********Delete Product******************************
	public function deleteProduct($tab,$condi,$upd)
	{
		$this -> db -> where($condi);
    	$this -> db -> update($tab,$upd);
    	return true;
	}

	public function imageupdate($tab,$condi,$upd)
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
}
    