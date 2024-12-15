<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

	public function productinsert($tab,$condi)
	{
		$this->db->insert($tab,$data);
    	return true;
	}
}
    