<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageApi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Product_Model');
        $this->load->model('message_model');
        $this->load->model('customer_modal');
         $this->load->model('adminlogin');
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
			{  $data['all']=$this->adminlogin->allsetting("setting_table");
				$data['customer'] = $this->customer_modal->allcustomer("cutomar_details");
				$data['containt'] = "admin/messageWhatsApp.php";
				$this->load->view('admin.php',$data);
			}
	}
	
	public function composeSms()
	{  //echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{ 
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['type']=$_POST['type'];
			$data['email']=$_POST['rowSelectCheckBox'] ;
			$data['containt']="admin/conposesms.php";
			$this->load->view("admin",$data);
		}
    }
    public function composeTextMessage()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{ 
			$data['all']=$this->adminlogin->allsetting("setting_table");
			//$data['email']=$_POST['rowSelectCheckBox'] ;
			$data['type']=$_GET['type']  ;
			$data['containt']="admin/composetext.php";
			$this->load->view("admin",$data);
		}
    }

   public function sendsms()
    { // echo "udkf";exit;
     $sessiontrue=$this->session->userdata("user_name");
	 if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{ 
	    	 //echo "<pre>"; print_r($_POST);exit;
			 $this->load->library('form_validation');
			 $this->form_validation->set_rules('sendmail', 'Enter Receiver Mobile No', 'required');
			 $this->form_validation->set_rules('message', 'Message Body Not Be Empty', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
			$data['email']=explode(",",$_POST['sendmail']);
			$data['message']=$_POST['message'];
			$data['type']=$_POST['type'];
			if(isset($_POST['textsms']))
			{
				$data['containt']="admin/composetext.php";
			}
			else
			{
				$data['text']=$_POST['type'];
				$data['containt']="admin/conposesms.php";
			}
			
			$this->load->view("admin",$data);
		}
		else
		{
			//$ok="yes";
			// Account details
			$apiKey = urlencode('Your apiKey');
			// Message details
			$numbers = $_POST['sendmail'];
			$sender = urlencode('iFresh');
			$message = rawurlencode($_POST['message']);
			
			//$numbers = implode(‘,’, $numbers);
			
			// Prepare data for POST request
			$data = array('apikey'=>$apiKey,'numbers' =>$numbers, "sender" => $sender, "message" =>$message);
			// Send the POST request with cURL
			$ch = curl_init("https://api.textlocal.in/send/");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			// Process your response here
			//echo $response;
			$ok=1;
			if($ok)
			{
				$date=date("y-m-d");
				$data=array("customerno"	=> $_POST['sendmail'],
			   "message"		=> $_POST['message'],
			   "date"		=> $date);
				$fire=$this->message_model->sendwhatapp("textsmessage",$data);
				if($fire)
				{
					redirect("MessageApi/textmsg?success=Text Message sent successfully");
				}

			}
		}
	}
	}

	public function textmsg()
	{
	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{ 
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['containt']="admin/textmsg.php";
			$data['recored'] =$this->message_model->allmessage("textsmessage");
			$this->load->view("admin",$data);
		}
	}

	public function textmsgdetails()
	{
	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{   $condi = array('sms_id' =>$_GET['id']);
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['containt']="admin/textmsgdetails.php";
			$data['recored'] =$this->message_model->textsmsdetails("textsmessage",$condi);
			$this->load->view("admin",$data);
		}
	}
    
    public function whatsappreceiver()
	{
	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{   $condi = array('sms_id' =>$_GET['id']);
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['containt']="admin/whatsappmsgdetails.php";
			$data['recored'] =$this->message_model->textsmsdetails("textsmessage",$condi);
			$this->load->view("admin",$data);
		}
	}



	public function whatsappmsg()
	{ //echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
			$this->load->library('form_validation');
			 $this->form_validation->set_rules('sendmail', 'Enter Atleast One Number', 'required');
			 $this->form_validation->set_rules('message', 'Message Body Not Be Empty', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
			$data['email']=explode(",",$_POST['sendmail']);
			$data['message']=$_POST['message'];
			$data['type']=$_POST['type'];
			$data['containt']="admin/composetext.php";
			
			$this->load->view("admin",$data);
		}
		else
		{
		//echo "<pre>"; print_r($_POST);exit;
		 	"https://api.callmebot.com/whatsapp.php?phone=[phone_number]&text=[message]&apikey=[your_apikey]";

			/*"POST https://eu34.chat-api.com/instance76869/sendMessage?token=6lo8cdcdx760m5rq
			JSON body:";
			{
			  "phone": "919001979342",
			  "body": "WhatsApp API on chat-api.com works good"
			}
	}*/
	$ok=1;
	if($ok)
	{
		$date=date("y-m-d");
		$data=array("customerno"	=> $_POST['sendmail'],
			  "message"		=> $_POST['message'],
			    "date"		=> $date );
		$fire=$this->message_model->sendwhatapp("whatsmessage",$data);
		if($fire)
		{
			redirect("MessageApi/sendwhatappsmessge?success=WhatsApp send successfully");
		}					
				
	}
	}
}
}
	public function sendwhatappsmessge()
	{
	$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
	{
		redirect("dashboard/index");
	}
	else
	{ 
		$data['all']=$this->adminlogin->allsetting("setting_table");
		$data['containt']="admin/whatsmessage.php";
		$data['recored'] =$this->message_model->allwhatsapp("whatsmessage");
		$this->load->view("admin",$data);
		}
}

public function whatappuserdetails()
{
	$data['all']=$this->adminlogin->allsetting("setting_table");
	$condi=array("mail_id"=>$_GET['id']);
	$data['allreceiver']=$this->customer_modal->allthismailreceicer("send_maildetails",$condi);
	//echo '<pre>'; print_r($data['allreceiver']);exit;
	$data['containt']="admin/allmailreceiver.php";
	$this->load->view("admin",$data);
}
}





	