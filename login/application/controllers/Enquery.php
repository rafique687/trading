<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Product_Model');
        $this->load->model('adminlogin');
        $this->load->model('Enquery_model');
        $this->load->library('form_validation');
        //$this->load->library("PhpMailer");
       // $mail = $this->phpmailer->load();
        
       // $this->laod->library('form_validation');
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
				$data['enquery'] = $this->Enquery_model->allenuery("inquety");
				$data['containt'] = "admin/view_enquery.php";
				$this->load->view('admin.php',$data);
			}
	}
	public function sendreply()
	{ 
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{  $data['all']=$this->adminlogin->allsetting("setting_table");	
				$data['containt'] = "admin/composereplymail.php";
			   $this->load->view('admin.php',$data);
			}

	}
	


	public function composemail()
	{   //echo "<pre>"; print_r($_POST);exit;
		$data['all']=$this->adminlogin->allsetting("setting_table");	
		$data['email']=$_POST['rowSelectCheckBox'] ;
		$data['all']=$this->adminlogin->allsetting("setting_table");	
		//echo "<pre>"; print_r($data['email']);exit;
		if(isset($_POST['email']))
		{
			$data['containt']="admin/compose.php";
		}
		elseif(isset($_POST['text']))
		{
			$data['text']=1;
			$data['containt']="admin/conposesms.php";
		}
		else
		{
			$data['whatsapp']=1;
			$data['containt']="admin/conposesms.php";
		}
		$this->load->view("admin",$data);
   }

   public function createmail()
	{
		
		$data['all']=$this->adminlogin->allsetting("setting_table");	
		$data['containt']="admin/createmail.php";
		$this->load->view("admin",$data);
   }

   public function sendmail()
    { 
	$sessiontrue=$this->session->userdata("user_name");
	if(!isset($sessiontrue))
	{
		redirect("dashboard/index");
	}
	else
	{ 
    $data['all']=$this->adminlogin->allsetting("setting_table");	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('mailid', 'Enter Receiver Email', 'required');
	$this->form_validation->set_rules('subject', 'Email Subject', 'required');
	$this->form_validation->set_rules('message', 'Message Body content', 'required');
	
	if ($this->form_validation->run() == FALSE)
	{     
			
		$data['email']=$_POST['mailid'];
	 	$data['subject']=$_POST['subject'];
	 	$data['message']=$_POST['message'];
		$data['containt']="admin/composereplymail.php";
		$this->load->view("admin",$data);
	}
	else
	{   
				
				if(isset($_FILES['attach']['name'][0]))
				{
					//echo "file";exit;
					$config['upload_path']          = './attachment/';
	                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
	                $config['max_size']             = 10000;
	                $config['max_width']            = 10000;
	                $config['max_height']           = 76800;
				$this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('attach'))
                {   $data['all']=$this->adminlogin->allsetting("setting_table");	
                    $data['imgerror'] = array('error' => $this->upload->display_errors());
                    print_r($data['imgerror']);exit;
                    $data['containt']="admin/add_category.php";
                    $this->load->view("admin.php",$data);
                }
                else
                {
					
                		$this->load->library('phpmailer_lib');

						// PHPMailer object
						
		        		$mail = $this->phpmailer_lib->load();
                	   	$datta = $this->upload->data();
                	   	$attachmentapth=$datta['full_path'];
					     // SMTP configuration
						$mail->isSMTP();
						$mail->SMTPOptions = array(
							'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							)
						);
				        $mail->Host     = 'ssl://smtp.gmail.com';
				        $mail->SMTPAuth = true;
				        $mail->Username = 'info.rafique687@gmail.com';
				        $mail->Password = 'rafique@123';
				        $mail->SMTPSecure = 'ssl';
				        $mail->Port     = 465;

				        $mail->setFrom('info.rafique687@gmail.com', 'kabir hasan');
				        $mail->addReplyTo('info.rafique687@gmail.com');

				        // Add a recipient
				        $reciver=explode(",",$_POST['sendmail']);
				        //echo "<pre>"; print_r($reciver);exit;
				        for($i=0;$i<count($reciver); $i++)
				        {
				        $mail->addAddress($reciver[$i]);
				       }
				       //$mail=$this->email->attach($attachmentapth);
				        // $mail->addAddress('pfdjksafj@gmail.com');
				       //$mail=$attachmentapth;
				        $mail->addAttachment($attachmentapth);
				        // Add cc or bcc 
				        $mail->addCC('khna.arbani@gmail.com');
				        //$mail->addBCC('info.rafique687@gmail.com');

				        // Email subject
				        $mail->Subject = $_POST['subject'];

				        // Set email format to HTML
				        $mail->isHTML(true);

				        // Email body content
				        $mailContent =$_POST['message'];
				        $mail->Body = $mailContent;

				        // Send email

				        //$mail->AddAttachment($_FILES['attach']['name']);
				        //echo "here"; exit;
				       // print_r($mail);exit;
				        if(!$mail->send()){
				            echo 'Message could not be sent.';
				            echo 'Mailer Error: ' . $mail->ErrorInfo;exit;
				        }else
				        {
				        	//echo "fdjsakf";exit;
				        	$maildate=date("y-m-d");
				        	$emaildata= array("subject"  =>$_POST['subject'] ,
				        		"message" 	=> $_POST['message'],
				        	 "attachment"	=> $_FILES['attach']['name'],
				        	 	   "date" 	=> $maildate,
				        	"mailreceiver"	=> $_POST['sendmail']);
				        	if($fire=$this->customer_modal->stormaildetails("send_maildetails",$emaildata))
				        	{
				        		redirect("Customer/maillist?success=Mail Send Successfully");
				        	}

				           // redirect("customer?success=Mail Send Successfully");
				        }
				        }
		        }

				
				else
				{

				//echo "<pre>";print_r($_POST);
				
		        $this->load->library('phpmailer_lib');

		        // PHPMailer object
		        $mail = $this->phpmailer_lib->load();

		        // SMTP configuration
				$mail->isSMTP();
				$mail->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);
		        $mail->Host     = 'ssl://smtp.gmail.com';
		        $mail->SMTPAuth = true;
		        $mail->Username = 'info.rafique687@gmail.com';
		        $mail->Password = 'rafique@123';
		        $mail->SMTPSecure = 'ssl';
		        $mail->Port     = 465;

		        $mail->setFrom('info.rafique687@gmail.com', 'kabir hasan');
		        $mail->addReplyTo('info.rafique687@gmail.com');

		      
		        $mail->addAddress($_POST['mailid']);
		 

		        // Add cc or bcc 
		        $mail->addCC('info.rafique687@gmail.com');
		        //$mail->addBCC('info.rafique687@gmail.com');

		        // Email subject
		        $mail->Subject = $_POST['subject'];

		        // Set email format to HTML
		        $mail->isHTML(true);

		        // Email body content
		        $mailContent =$_POST['message'];
		        $mail->Body = $mailContent;

		        // Send email

		       // $mail->AddAttachment($_FILES['attach']['name']);
		        //echo "here"; exit;
		        //print_r($mail);exit;
		        if(!$mail->send()){
		            echo 'Message could not be sent.';
		            echo 'Mailer Error: ' . $mail->ErrorInfo;exit;
		        }else{

		           		$maildate=date("y-m-d");
			        	$emaildata= array("subject"  => $_POST['subject'] ,
						        		  "message"  => $_POST['message'],
						        	 "inquery_date"  => $maildate,
						        		  "subject"  => $_POST['subject'],
						        	   "replygetid"  => $_POST['inq_id'],
			        					  "subject"  => $_POST['subject']);
			        	if($fire=$this->Enquery_model->replymail("inquety",$emaildata))
			        	{
			        		$where=array("inquryid"=>$_POST['inq_id']);
			        		$upd= array('reply_status' =>2 );
			        		$update=$this->Enquery_model->equrystatusupdate("inquety",$where,$upd);
			        		if($update)
			        		{
			        			redirect("Enquery/index?success=Reply Send Successfully");
			        		}

			        		
			        	}
		        }
		    }
		}
	}
}

public function replyedlist()
{
	$data['all']=$this->adminlogin->allsetting("setting_table");	
	$data['replyed']=$this->Enquery_model->allreplyed("inquety");
	//echo '<pre>'; print_r($data['replyed'][0]['inquryid']);
	if($data['replyed'])
	{
		$condi= array('replygetid' =>$data['replyed'][0]['inquryid']);
		//print_r($condi);exit;
		$data['answer']=$this->Enquery_model->answer("inquety",$condi);
		//echo "<pre>";print_r($data['answer']['message']);
	}
	
	$data['containt']="admin/replyed.php";
	$this->load->view("admin",$data);

}

public function allthismailreceicer()
{
	$data['all']=$this->adminlogin->allsetting("setting_table");	
	$condi=array("mail_id"=>$_GET['id']);
	$data['replyed']=$this->customer_modal->allthismailreceicer("send_maildetails",$condi);
	
	$data['containt']="admin/allmailreceiver.php";
	$this->load->view("admin",$data);
}
			


public function deletecustomer()
{
	//echo "<pre>"; print_r($_GET);exit;
	$condi=array("cust_id"=>$_GET['id']);
	$fire=$this->customer_modal->delcustomer("cutomar_details",$condi);
	if($fire)
	{
		redirect("customer");
	}
}


public function editcutomer()
{
	$data['all']=$this->adminlogin->allsetting("setting_table");	
	$condi=array("cust_id"=>$_GET['id']);
	$data['editid']=$_GET['id'];
	$data['contry'] = $this->adminlogin->contry("contry");
	$data['state'] = $this->adminlogin->contry("state");
	$data['city'] = $this->adminlogin->contry("city");
	$data['customer'] = $this->customer_modal->customerdetails("cutomar_details",$_GET['id']);
	//echo "<pre>"; print_r($data['customer']);exit;	
	$data['containt']="admin/editcustomer.php";
	$this->load->view("admin",$data);					
}

public function updatecustomer()
{
	//echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{   $data['all']=$this->adminlogin->allsetting("setting_table");	
			  	$this->load->library('form_validation');
				$this->form_validation->set_rules('firstname', 'First Name', 'required');
				$this->form_validation->set_rules('lastname', 'Last Name', 'required');
				$this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
				$this->form_validation->set_rules('email', 'User Email', 'required');
				$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('zipcode', 'Zip Code', 'required'); 
				$this->form_validation->set_rules('address', 'Address', 'required');
				if ($this->form_validation->run() == FALSE)
					{
						
					 	$data['firstname'] = $_POST['firstname'];
					 	 $data['lastname'] = $_POST['lastname'];
					 	  	$data['email'] = $_POST['email'];
					 		  $data['dob'] = $_POST['dob'];
					 	   $data['mobile'] = $_POST['mobile'];
					 	   $data['contry'] = $_POST['contry'];
					 		$data['state'] = $_POST['state'];
					 		 $data['city'] = $_POST['city'];
					 	  $data['zipcode'] = $_POST['zipcode'];
					 	  $data['address'] = $_POST['address'];
					 	   $data['contry'] = $this->adminlogin->contry("contry");
							$data['state'] = $this->adminlogin->contry("state");
							 $data['city'] = $this->adminlogin->contry("city");
					
						 $data['containt'] = "admin/editcustomer.php";
					$this->load->view('admin.php',$data);
					}
				else
					{
						$condi= array('cust_id' => $_POST['cust_id'] );
					    $feeddata=array("first_name" => $_POST['firstname'],"last_name"=>$_POST['lastname'],
											  "dob"  => $_POST['dob'],	   	   "email" =>$_POST['email'],
											"mobile" => $_POST['mobile'],   "mobilealt"=>$_POST['mobilealt'],
										 "countryid" => $_POST['contry'],	 "stateid" => $_POST['state'],
										 	  "city" => $_POST['city'],	     "zipcode" => $_POST['zipcode'],
										   "address" => $_POST['address']
										);
						$fire= $this->customer_modal->updatecustomer("cutomar_details",$feeddata,$condi);
						if($fire)
						{
							redirect("Customer");
						}	
			}

	}
}


			
	
}





	