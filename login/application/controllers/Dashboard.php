<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('adminlogin');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
	}
	public function index()
	{   
		//$pp=$this->load->library('php_image_magician.php');
		
		$sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
		//echo "<pre>"; print_r($sitesettingdetails);exit;
					$data['sitename']	=	$sitesettingdetails[0]['field_value'];
					$data['mobile'] 	=	$sitesettingdetails[1]['field_value'];
					$data['logo']		=	$sitesettingdetails[3]['field_value'];
					$data['fivicon']	= 	$sitesettingdetails[4]['field_value'];

		$this->load->view('login.php',$data);
	}

	public function adminlogin()
	{   
		$data['enquery']=$this->adminlogin->allinquery("inquety");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user', 'User Must Be Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
			$data['sitename']	=	$sitesettingdetails[0]['field_value'];
			$data['mobile'] 	=	$sitesettingdetails[1]['field_value'];
			$data['logo']		=	$sitesettingdetails[3]['field_value'];
			$data['fivicon']	= 	$sitesettingdetails[4]['field_value'];
			$data['user']		=	$_POST['user'];
			$data['logo']		=	$_POST['logo'];
			$data['password']	=	$_POST['password'];
			$this->load->view('login',$data);
		}
		else
		{
			$condi = array('email' =>$_POST['user'],'password'=>$_POST['password'],'status'=>0 );
			$userdetail=$this->adminlogin->login("admin",$condi);
			if($userdetail)
			{
				$admin_session = array(	"id"=> $userdetail['id'],
										"user_name" => $userdetail['user_name'],
										"name" => $userdetail['first_name'],
										"dp" => $userdetail['pic']
										);
				$this ->session -> set_userdata($admin_session);
				$sessiontrue=$this->session->userdata();
				if($sessiontrue==TRUE)
				{
					$sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
					//echo "<pre>";print_r($sitesettingdetails);exit;
					$sitename	=	$sitesettingdetails[0]['field_value'];
					$mobile 	=	$sitesettingdetails[1]['field_value'];
					$logo		=	$sitesettingdetails[3]['field_value'];
					$fivicon	= 	$sitesettingdetails[4]['field_value'];
					$fb			= 	$sitesettingdetails[21]['field_value'];
					$insta		= 	$sitesettingdetails[22]['field_value'];
					$in 		= 	$sitesettingdetails[23]['field_value'];
					$twiter 	= 	$sitesettingdetails[24]['field_value'];	
					$gp		 	= 	$sitesettingdetails[25]['field_value'];	
					//*************Site Setting*******************************************
					$sitesetting_session = array(
													"Site_name" => $sitename,
													"mobile" 	=> $mobile,
													"logo"		=> $logo,
													"fivicon"   => $fivicon,
													"fb"		=> $fb,
													"insta"		=> $insta,
													"in"		=> $in,
													"gp"		=> $gp,
													"twiter"	=> $twiter
												);
					$setting=$this ->session -> set_userdata($sitesetting_session);
					$sitess=$this->session->userdata($setting);
					//echo "<pre>"; print_r($sitess);exit;
					//*************End Site Setting*************************************					
					$data['containt']="admin/index.php";
					$this->load->view('admin.php',$data);
				}
			  else
				{
					$data['logo']=$_POST['logo'];
					$data['containt']="admin/login.php";
				}
				$this->load->view('adminlogin',$data);
			}
			else{
					$sitesettingdetails=$this->adminlogin->sitedetails("setting_table");
					$data['sitename']	=	$sitesettingdetails[0]['field_value'];
					$data['mobile'] 	=	$sitesettingdetails[1]['field_value'];
					$data['logo']		=	$sitesettingdetails[3]['field_value'];
					$data['fivicon']	= 	$sitesettingdetails[4]['field_value'];
					$data['user']=$_POST['user'];
					$data['logo']=$_POST['logo'];
					$data['password']=$_POST['password'];
					$data['paaserror']="User Or Password Not Match";
					$this->load->view('login',$data);
				}
		}
	}
	public function logout()
	{  
		$array_items = array('id', 'user_name');
		if(session_destroy())
		{  
			redirect("dashboard/index");exit;
		}
	}
	public function configarray()
	{
		$setting =array("Basic","About","Term","Privacy","Services");
		return $setting;
    } 
	public function mydashboar()
	{
		
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				if(isset($_GET['Profile']))
				{
				
                 $data['profilesuccess']=$_GET['Profile'];
                 
				}
				$data['enquery']=$this->adminlogin->allinquery("inquety");
				
				
				$data['containt']="admin/index.php";
				$this->load->view('admin.php',$data);
			}
	}
	public function edit_profile()
	{   $sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{  $data['all']=$this->adminlogin->allsetting("setting_table");
				$id=$this->session->userdata("id");
				$condi = array('id' =>$id);
				$data['userid']=$id;
				$data['contry']=$this->adminlogin->contry("contry");
				$data['state']=$this->adminlogin->contry("state");
				$data['city']=$this->adminlogin->contry("city");
				$data['profiledetail']=$this->adminlogin->profiledetails("admin",$condi);
				//echo "<pre>"; print_r($data['profiledetail']);exit;
				$data['containt']="admin/edit_profile.php";
				$this->load->view('admin.php',$data);
			}
	}

	public function updateprofile()
	{
		$data['all']=$this->adminlogin->allsetting("setting_table");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'User Email', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('contry', 'Contry Selection', 'required');
		$this->form_validation->set_rules('state', 'State Selection', 'required');
		$this->form_validation->set_rules('city', 'City Name', 'required');
		$this->form_validation->set_rules('zipcode', 'Zip Code', 'required'); 
		$this->form_validation->set_rules('address', 'Address', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			//echo "fdkf";exit;
			$condi= array('id' =>$_POST['id']);
		 	$data['firstname']=$_POST['firstname'];
		 	$data['lastname']=$_POST['lastname'];
		 	$data['email']=$_POST['email'];
		 	$data['mobile']=$_POST['mobile'];
		 	$data['contry']=$_POST['contry'];
		 	$data['state']=$_POST['state'];
		 	$data['city']=$_POST['city'];
		 	$data['zipcode']=$_POST['zipcode'];
		 	$data['address']=$_POST['address'];
		 	$data['userid']=$_POST['id'];
			$data['contry']=$this->adminlogin->contry("contry");
			$data['state']=$this->adminlogin->contry("state");
			$data['city']=$this->adminlogin->contry("city");
			$data['profiledetail']=$this->adminlogin->profiledetails("admin",$condi);
			$data['containt']="admin/edit_profile.php";
			$this->load->view('admin.php',$data);
		}
		else
		{  if($_FILES['dp']['name']==TRUE)
			{ 
			    $config['upload_path']          = './dp/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('dp'))
                {
                	
                	    $condi=array('id'=>$_POST['id']);
                	    echo $this->upload->display_errors();exit;
                        $data['imgerror'] = array('error' => $this->upload->display_errors());
                        $data['userid']=$_POST['id'];
						$data['contry']=$this->adminlogin->contry("contry");
						$data['state']=$this->adminlogin->contry("state");
						$data['city']=$this->adminlogin->contry("city");
						$data['profiledetail']=$this->adminlogin->profiledetails("admin",$condi);
						$data['containt']="admin/edit_profile.php";
						$this->load->view('admin.php',$data);
                }
                else
                {
                	$condi=array("id"=>$_POST['id']);
					$instdata = array('first_name' => $_POST['firstname'] ,
									   'last_name' => $_POST['lastname'] ,
									       'email' => $_POST['email'] ,
									  	  'mobile' => $_POST['mobile'] ,
									  	 'country' => $_POST['contry'],
									  	   'state' => $_POST['state'],
									  		'city' => $_POST['city'],
									     'zipcode' => $_POST['zipcode'],
									  	 'address' => $_POST['address'],
									  		 'pic' => $_FILES['dp']['name']);
					$fire=$this->adminlogin->updateprofile("admin",$instdata,$condi);
					if($fire)
					{
						redirect("dashboard/mydashboar?profile=Profile Successfully Update");
					}
				}
			}
			else
			{ // echo "no file";exit;
				$condi=array("id"=>$_POST['id']);
					$instdata = array('first_name' => $_POST['firstname'] ,
									   'last_name' => $_POST['lastname'] ,
									       'email' => $_POST['email'] ,
									  	  'mobile' => $_POST['mobile'] ,
									  	 'country' => $_POST['contry'],
									  	   'state' => $_POST['state'],
									  		'city' => $_POST['city'],
									     'zipcode' => $_POST['zipcode'],
									  	 'address' => $_POST['address']
									  	);
					$fire=$this->adminlogin->updateprofile("admin",$instdata,$condi);
					if($fire)
					{
							redirect("dashboard/mydashboar?profile=Profile Successfully Update");
			}
			}
		}
	}

	public function changepassword()
	{
		$data['containt']="admin/changepassword.php";
		$this->load->view("admin",$data);
	}

    public function updatepassword()
    {
    	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('pass','New Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('cpass', 'Password', 'required|matches[pass]');
        $this->form_validation->set_rules('pass', 'Password', 'required|matches[cpass]');
        if ($this->form_validation->run() == FALSE)
								{
								 	$data['pass']=$_POST['pass'];
								 	$data['cpass']=$_POST['cpass'];
									$data['containt']="admin/changepassword.php";
										$this->load->view("admin",$data);
								}
								else
								{
									$id= $this->session->userdata("id");
									$condi = array('id' => $id );
									$data = array('password' => $_POST['pass'] );
									$fire=$this->adminlogin->updatepass("admin",$data,$condi);
									if($fire)
									{
										//echo "fdkjf";exit;
									   redirect("dashboard/mydashboar?Profile=Password Successfully Changed")	;
									}
								}
    }

    public function setting()
    {
    	 $sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{   $condi=array("section_id"=>$_GET['sectionid']);
				$conddi=array("section_id"=>3);
				$data['fck']=$this->adminlogin->basic_setting("setting_table",$conddi);
				$data['form_setting']=$this->adminlogin->basic_setting("setting_table",$condi);
				$data['all']=$this->adminlogin->allsetting("setting_table");
				//echo "<pre>"; print_r($data['all']);exit;
				$data['containt']="admin/setting.php";
				$this->load->view('admin.php',$data);
			}

    }

     public function ckeditor()
    {
    	 $sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{   
				$data['containt']="admin/ckeditor.php";
				$this->load->view('admin.php',$data);
			}

	}
	

	private function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = './settingpic/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '1000000';
		$config['overwrite']     = FALSE;
	
		return $config;
	}

    public function updatesetting()
    {
    	//echo "<pre>"; print_r($_POST);
    	//echo "<pre>"; print_r($_FILES);exit;
    	if(isset($_FILES['val']['name']))
    	{
    		$this->load->library('upload');
			$files = $_FILES;
			$cpt = count($_FILES['val']['name']);
			for($i=0; $i<$cpt; $i++)
			{    
				if(!empty($_FILES['val']['name'][$i]))
				{ 
					//echo "<pre>" ; print_r($_FILES['val']['name'][$i]);
					$config = array();
					$config['upload_path'] = './settingpic/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '1000000';
					$config['overwrite']     = FALSE;      
					$_FILES['val']['name']= $files['val']['name'][$i];
					$_FILES['val']['type']= $files['val']['type'][$i];
					$_FILES['val']['tmp_name']= $files['val']['tmp_name'][$i];
					$_FILES['val']['error']= $files['val']['error'][$i];
					$_FILES['val']['size']= $files['val']['size'][$i];    
					$this->upload->initialize($config);
					$this->upload->do_upload('val');
					if(!empty($_FILES['val']['name'][$i]))
					{
						$condi=array("sessting_id"=>$_POST['fileid'][$i]);
						$datta=array("field_value"=>$_FILES['val']['name']);
						$this->adminlogin->updateprofile("setting_table",$datta,$condi); 
					}
				}
			}
    	}

		$totalupadte= count($_POST['id']);
		//echo $totalupadte;exit;
		for($i= 0; $i < $totalupadte; $i++ )
		{
			$condi=array("sessting_id"=>$_POST['id'][$i]);
			$datta=array("field_value"=>$_POST['val'][$i]);
		$fire=$this->adminlogin->updateprofile("setting_table",$datta,$condi);
		
			
		}
		redirect("dashboard/mydashboar?Profile=Setting Successfully Update");
		}
	
	}
?>
