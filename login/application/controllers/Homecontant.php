<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homecontant extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->helper('url', 'form');
    $this->load->library('session');
    $this->load->model('Product_Model');
    $this->load->model('home_model');
    $this->load->model('customer_modal');
    $this->load->library('form_validation');
}

public function index()
{ //echo "gfdk";exit;
    $mobile = array('sessting_id' =>2);
    $mobilee = $this->home_model->home("setting_table",$mobile);
    $mail = array('sessting_id' =>3);
    $maill = $this->home_model->home("setting_table",$mail);
    $logo = array('sessting_id' =>4);
    $llogo = $this->home_model->home("setting_table",$logo);
    $fav = array('sessting_id' =>5);
    $ffav = $this->home_model->home("setting_table",$fav);
    $logo_session=array("log"=>$llogo['field_value'],"fav"=>$ffav['field_value'],"mobile"=>$mobilee['field_value'],"mail"=>$maill['field_value']);
    $this->session->set_userdata($logo_session);
   
    $result = $this->_post_api($url);
    $this->log("result");
    $data['content']=$this->log($result);
    echo  json_encode($data);exit;
}

private function _post_api($url) {
        try { //echo "<pre>"; print_r($url);exit;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            $result = curl_exec($ch);
            
        } catch (Exception $e) {
            return false;
        }
        $this->log("url");
        $this->log($url);
        curl_close($ch);
        if ($result)
            return $result;
        else
            return false;
    }

     private function log($message) {
     
     $data['kk']=json_decode($message, true);
      return $data['kk'];
      
    }


 }


