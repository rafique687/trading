<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
{ 	
	$condi = array('sessting_id' =>8);	
	$logo = array('sessting_id' =>4);
	$data['logo'] = $this->home_model->home("setting_table",$logo);
	$data['content'] = $this->home_model->home("setting_table",$condi);
	$fav = array('sessting_id' =>5);
	$data['fav'] = $this->home_model->home("setting_table",$fav);
	$data['containt'] = "front/index.php";
	$this->load->view('front',$data);
}
	public function about()
	{ 
		$condi = array('sessting_id' =>$_GET['id']);
		$logo = array('sessting_id' =>4);
		$data['logo'] = $this->home_model->home("setting_table",$logo);
		
		$fav = array('sessting_id' =>5);
		$data['fav'] = $this->home_model->home("setting_table",$fav);
		$logo = array('sessting_id' =>$_GET['id']);
		$data['content'] = $this->home_model->home("setting_table",$logo);
		    // echo "<pre>";
			// echo  json_encode($data['content']);
			// echo "<pre>";
			// echo  json_encode($data['logo']);
			// echo "<pre>";
			// echo  json_encode($data['fav']);

			echo  json_encode($data);exit;
	}

	
	public function insercustomer()
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
					
						 $data['containt'] = "admin/add_customer.php";
					$this->load->view('admin.php',$data);
					}
				else
					{

					    $feeddata=array("first_name" => $_POST['firstname'],"last_name"=>$_POST['lastname'],
											  "dob"  => $_POST['dob'],	   	   "email" =>$_POST['email'],
											"mobile" => $_POST['mobile'],   "mobilealt"=>$_POST['mobilealt'],
										 "countryid" => $_POST['contry'],	 "stateid" => $_POST['state'],
										 	  "city" => $_POST['city'],	     "zipcode" => $_POST['zipcode'],
										   "address" => $_POST['address']
										);
						$fire= $this->customer_modal->addcustomer("cutomar_details",$feeddata);
						if($fire)
						{
							redirect("Customer");
						}	
			}




	}
}


	public function composemail()
	{
		$data['email']=$_POST['rowSelectCheckBox'] ;
		//echo "<pre>"; print_r($data['email']);exit;
		$data['containt']="admin/compose.php";
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
    //echo "<pre>"; print_r($_FILES);exit;
	$this->load->library('form_validation');
	$this->form_validation->set_rules('sendmail', 'Enter Receiver Email', 'required');
	$this->form_validation->set_rules('subject', 'Email Subject', 'required');
	$this->form_validation->set_rules('message', 'Message Body content', 'required');
	
	if ($this->form_validation->run() == FALSE)
	{

		$data['email']=explode(",",$_POST['sendmail']);
	 	$data['subject']=$_POST['subject'];
	 	$data['message']=$_POST['message'];
		$data['containt']="admin/compose.php";
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
                {
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
				        	echo "fdjsakf";exit;
				        	$maildate=date("y-m-d");
				        	$emaildata= array("subject"  =>['subject'] ,
				        		"message" 	=> $_POST['message'],
				        	 "attachment"	=> $_FILE['attach']['name'],
				        	 	   "date" 	=> $maildate,
				        	"mailreceiver"	=> $_POST['sendmail']);
				        	if($fire=$this->customer_modal->stormaildetails("send_maildetails",$maildata))
				        	{
				        		redirect("cutomer/maillist?success=Mail Send Successfully");
				        	}

				           // redirect("customer?success=Mail Send Successfully");
				        }
				        }
		        }

				
				else
				{
					

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

		        // Add a recipient
		        $reciver=explode(",",$_POST['sendmail']);
		        //echo "<pre>"; print_r($reciver);exit;
		        for($i=0;$i<count($reciver); $i++)
		        {
		        $mail->addAddress($reciver[$i]);
		       }
		        // $mail->addAddress('pfdjksafj@gmail.com');

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

		        //$mail->AddAttachment($_FILES['attach']['name']);
		        //echo "here"; exit;
		        //print_r($mail);exit;
		        if(!$mail->send()){
		            echo 'Message could not be sent.';
		            echo 'Mailer Error: ' . $mail->ErrorInfo;exit;
		        }else{
		           		$maildate=date("y-m-d");
			        	$emaildata= array("subject"  =>['subject'] ,
			        		"message" 		=> $_POST['message'],
			        		"date" 			=> $maildate,
			        		"mailreceiver"  => $_POST['sendmail']);
			        	if($fire=$this->customer_modal->stormaildetails("send_maildetails",$maildata))
			        	{
			        		redirect("cutomer/maillist?success=Mail Send Successfully");
			        	}
		        }
		    }
		}
	}
}

public function maillist()
{
	$data['mailsent']=$this->customer_modal->maillist("send_maildetails");
	$data['containt']="admin/maillist.php";
	$this->load->view("admin",$data);

}

public function allthismailreceicer()
{

	$condi=array("mail_id"=>$_GET['id']);
	$data['allreceiver']=$this->customer_modal->allthismailreceicer("send_maildetails",$condi);
	//echo '<pre>'; print_r($data['allreceiver']);exit;
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
			{   
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

public function inquery()
{ //echo "<pre>"; print_r($_POST);exit;
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
    $mail->addAddress($_POST['email']);
    $mail->addCC('info.rafique687@gmail.com');
    
    $mail->Subject = $_POST['subject'];
    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mailContent ="EMail:".$_POST['email']."</br>".$_POST['message'];
    $mail->Body=$_POST['message'];
     if(!$mail->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;exit;
    }
    else{  

               $maildate=date("y-m-d");
            $emaildata= array(
                                "inqury_name"    => $_POST['name'] ,
                                "inquery_email"  => $_POST['email'],
                                "subject" 		 => $_POST['subject'] ,
                                "message"        => $_POST['message'],
                                "inquery_date"   => $maildate
                            );
            if($fire=$this->customer_modal->stormaildetails("inquety",$emaildata))
            {
             echo" Your Enquery Successfully Submit, We Will Contact You Soon";
             redirect("../#contact");
            } 
    }
    }

public function basic()
{ 
	$basic = array('section_id' =>1);
	$or = array('section_id' =>6);
    $data['basic'] = $this->home_model->home("setting_table",$basic,$or);
    $data['baseurl']=base_url();
    print_r(json_encode($data));exit;
}

public function home()
{ 	
 	$page = array("section_id"=>$_GET['id']);
    $data = $this->home_model->home("setting_table",$page);
    
    print_r(json_encode($data));exit;
}
public function services()
{ 	//echo "ysd";exit;
 	$status = array("service_status"=>1);
    $data = $this->home_model->services("services",$status);
    print_r(json_encode($data));exit;
}
public function product()
{
	$status = array("status"=>1);
	//$or = array("status"=>2);
    $data = $this->home_model->product("products",$status);
    $data['url']=base_url();
    print_r(json_encode($data));exit;

}
public function event()
{
	$status = array("status"=>1);
	//$or = array("status"=>2);
    $data = $this->home_model->product("event",$status);
    $data['url']=base_url();
    print_r(json_encode($data));exit;

}

public function aboutt()
{ 	
 	$page = array("section_id"=>$_GET['id']);
    $data['about'] = $this->home_model->about("setting_table",$page);
    $condi= array("bannerstatus"=>1,"banner_section"=>'about');
    $data['aboutpic'] = $this->home_model->bannerr("banner",$condi);
    
    print_r(json_encode($data));exit;
}
public function banner()
{
	$condi = array("bannerstatus"=>1,"banner_section"=>'home');
    $data = $this->home_model->bannerr("banner",$condi);
   // print_r($data);exit;
    
    print_r(json_encode($data));exit;

}

public function gellary()
{
	$where = array("parent_cateid"=>$_GET['id']);
	//$or = array("status"=>2);
    $data = $this->home_model->gellary("event_details",$where);
    $data['url']=base_url();
    print_r(json_encode($data));exit;

}
public function clientlist()
{
	$status = array("status"=>1);
	//$or = array("status"=>2);
    $data = $this->home_model->client("client",$status);
    $data['url']=base_url();
    print_r(json_encode($data));exit;

}
public function team()
{ 	//echo "ysd";exit;
 	$status = array("status"=>1);
    $data = $this->home_model->services("team",$status);
    print_r(json_encode($data));exit;
}



			
	
}





	