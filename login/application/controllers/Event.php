<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->helper('url', 'form');
	$this->load->library('session');
	$this->load->model('Product_Model');
	$this->load->model('adminlogin');
	$this->load->model('customer_modal');
	$this->load->model('event_model');
	$this->load->library('form_validation');
}

public function index()
{ 
	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{  
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['customer'] = $this->customer_modal->allcustomer("cutomar_details");
			$data['containt'] = "admin/add_event.php";
			$this->load->view('admin.php',$data);
		}
}

public function uploadfiles()
{
	$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
		if(!empty($_FILES))
			{
			$name = $_FILES['file']['name'];
			$config['upload_path']          = './event/';
			$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
			$_FILES['file']['type']= $_FILES['file']['type'];
			$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
			$_FILES['file']['error']= $_FILES['file']['error'];
			$_FILES['file']['size']= $_FILES['file']['size'];    
			$uploadPath = './event/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			echo json_encode($name);
				exit();
			}
		}
}

public function insertevent()
{
	$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
	else
		{	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('event', 'Event Name', 'required');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required');
			$this->form_validation->set_rules('des', 'Event Description', 'required');
			if ($this->form_validation->run() == FALSE)
			{  
				$data['event'] 		=$_POST['event'];
				$data['event_date'] =$_POST['event_date'];
				$data['des']		=$_POST['des'];
				$data['containt']	="admin/add_event.php";
				$this->load->view("admin",$data);
			}
			else
			{
				$datta = array('event_name'   => $_POST['event'],
								'event_photo'  => $_POST['cateimg'],
								'description'  => $_POST['des'],
								'event_date'	  => $_POST['event_date']);
				$qry = $this->event_model->eventinsert("event",$datta);
				if($qry)
				{
					redirect("Event/view_event?success=Event Title Add Successfully");
				}
			}
		}
}

public function view_event()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		  	{
				redirect("dashboard/index");
		    }
		else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");
				$where=array("status"=>1);
				$data['event']=$this->event_model->viewevent("event",$where);
				$data['containt']='admin/view_event.php';
				$this->load->view("admin",$data);
			}
	}

	public function vieweventdetails()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		  	{
				redirect("dashboard/index");
		    }
		else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");
				$where=array("parent_cateid"=>$_GET['eventid']);
				$data['event_details']=$this->event_model->viewevent_details("event_details",$_GET['eventid']);
				//echo "<pre>"; print_r($data['event_details']);exit;
				$data['containt']='admin/event_details.php';
				$this->load->view("admin",$data);
			}
	}
	public function add_eventdetails()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		  	{
				redirect("dashboard/index");
		    }
		else
			{
				$data['maineventid']=$_GET['event_id'];
				$data['all']=$this->adminlogin->allsetting("setting_table");
				$data['containt']='admin/add_eventdetails.php';
				$this->load->view("admin",$data);
			}
	}

	public function inserteventdetails()
	{ 
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		  	{ 
				redirect("dashboard/index");
		    }
		else
			{
				
				if(!empty($_FILES['video']['name']))
				{  //echo "<pre>";print_r($_POST);exit;
					 $userpic= $_FILES['video']['name']= $_FILES['video']['name'];
					 $userpic= $_FILES['video']['name']= $_FILES['video']['name'];
        			 $_FILES['video']['type']= $_FILES['video']['type'];
        			 $_FILES['video']['tmp_name']= $_FILES['video']['tmp_name'];
        			 $_FILES['video']['error']= $_FILES['video']['error'];
        			 $_FILES['video']['size']= $_FILES['video']['size']; 
        			 $_FILES['video']['max_size'] = '100000';
        			 $_FILES['video']['max_width'] = '30000';
        			 $_FILES['video']['max_height'] = '30000';   
					 $uploadPath = './event/';
           			 $config['upload_path'] = $uploadPath;
           			 $config['allowed_types'] = 'mov|avi|flv|wmv|mp3|mp4|gif';
           			 $config['encrypt_name'] = TRUE; 
              		 $config['overwrite'] = TRUE;
           			 $this->load->library('upload', $config);
					 $this->upload->initialize($config);
					 if(!$this->upload->do_upload('video'))
							{   
								
								 $error=$this->response = $this->upload->display_errors();
								 echo "<pre>";print_r($error);exit;
								
							}

							else
							{
								$adddata=array("parent_cateid"=> $_POST['mainid'],
											   "eventvideo_photo_url"=> $_FILES['video']['name'],
												"title"=>$_POST['title']);
								$fire=$this->event_model->insert_eventdetails("event_details",$adddata);
								if($fire)
								{
									redirect("event/vieweventdetails?eventid=".$_POST['mainid']."&success=Even Video Upload Successfully");
								}
							}
				}
			}
		}
		public function inserteventurldetails()
	{	
			 //print_r($_POST);exit;
				 //echo "url";exit;
					$adddata=array("parent_cateid"=> $_POST['mainid'],
								   "eventvideo_photo_url"=> $_POST['url'],
												  "title"=> $_POST['urltitle']);
					$fire=$this->event_model->insert_eventdetails("event_details",$adddata);
						if($fire)
						{
							redirect("event/vieweventdetails?eventid=".$_POST['mainid']."&success=Even url Upload Successfully");
						}
	}
				
			public function  inserteventphotodetails()
				{  //echo "<pre>"; print_r($_POST);exit;
					$adddata=array("parent_cateid"=> $_POST['mainid'],
								   "eventvideo_photo_url"=> $_POST['phototitle'],
												  "title"=> $_POST['cateimg']);
					$fire=$this->event_model->insert_eventdetails("event_details",$adddata);
						if($fire)
						{
							redirect("event/vieweventdetails?eventid=".$_POST['mainid']."&success=Even Photo Upload Successfully");
						}
					}
		
		public function deleteeventalbum()
		{
			$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
		  	{ 
				redirect("dashboard/index");
		    }
			else
			{
				$condi = array('evencteidd' => $_GET['id']);
				$fire=$this->event_model->deleteventpic("event_details",$condi);
				if($fire)
				{
				redirect("event/vieweventdetails?eventid=".$_GET['eventid']);
			    }
			}
		}

		public function deleteevent()
		{
			$condi = array('eventid ' =>$_GET['id']);
			$fire=$this->event_model->deleteventpic("event",$condi);
			if($fire)
			{
				redirect("Event/view_event?success=Event Successfully Deleted");
			}
		}

		public function editevent()
		{
			$where=array("eventid"=>$_GET['id']);
			$data['id']=$_GET['id'];
			$data['event']=$this->event_model->getevent("event",$where);
			$data['containt']='admin/editevent.php';
			$this->load->view("admin",$data);
		}

		public function delimage()
{
  
	$condi=array("eventid "=>$_POST['cateid']);
				$getpic=$this->Product_Model->getimage('event',$condi);
				//echo '<pre>'; print_r($getpic);exit;
				if($getpic)
				{
					$pic_array=explode(",",$getpic['event_photo']);
					$no_Of_pic=count($pic_array);
					
						//unset($array[1]);
						
						for($i=0;$i<$no_Of_pic;$i++)
							{
								if($pic_array[$i]==$_POST['imgnam'])
								{
									unset($pic_array[$i]);
								}
							}
							
							$path= base_url().'products'.$_POST['imgnam'];
						
							delete_files("event".$path,TRUE);
							

			/**************upadate in database********************************** */
			$impd=implode(",",$pic_array);
			$upd=array("event_ph"=>$impd);
			
			$getpic=$this->event_model->imageupdate('event',$condi,$upd);
			

					
				}
}

public function updateevent()
{
	//echo "<pre>"; print_r($_POST);exit;
	$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
	else
		{	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('event', 'Event Name', 'required');
			$this->form_validation->set_rules('event_date', 'Event Date', 'required');
			$this->form_validation->set_rules('des', 'Event Description', 'required');
			if ($this->form_validation->run() == FALSE)
			{  
				$data['event'] 		=$_POST['event'];
				$data['id'] 		=$_POST['eventid'];
				$data['event_date'] =$_POST['event_date'];
				$data['des']		=$_POST['des'];
				$data['containt']	="admin/editevent.php";
				$this->load->view("admin",$data);
			}
			else
			{   $condi=array("eventid"=>$_POST['eventid']);
				$newpic=$_POST['cateimg'].','.$_POST['oldpic'];
				$datta = array('event_name'   => $_POST['event'],
								'event_photo'  => $newpic,
								'description'  => $_POST['des'],
								'event_date'	  => $_POST['event_date']);
				$qry = $this->event_model->updateevent("event",$condi,$datta);
				if($qry)
				{
					redirect("Event/view_event?success=Event Title upadated Successfully");
				}
			}
		}
}
	
}





	