<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Team_Model');
        $this->load->model('adminlogin');
        $this->load->library('form_validation');

      
    }

	public function index()
	{ //echo "string";exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{  		
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$condi = array('status'=>1);
			$data['team']=$this->Team_Model->team("team",$condi);
			//echo "<pre>"; print_r($data['team']);exit;
			$data['containt']='admin/team.php';
			$this->load->view("admin",$data);
		}
	}

	public function addteam()
	{  
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");
			    $data['containt']="admin/add_team.php";
				$this->load->view('admin.php',$data);
			}
	}

	public function random_string($length)
	{
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

		for ($i = 0; $i < $length; $i++)
		{
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}

	public function uploadfiles()
	{
		$name = $_FILES['file']['name'];
		$config['upload_path']          = './team/';
		$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
		$_FILES['file']['type']= $_FILES['file']['type'];
		$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
		$_FILES['file']['error']= $_FILES['file']['error'];
		$_FILES['file']['size']= $_FILES['file']['size'];    
		$uploadPath = './team/';
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		echo json_encode($name);
		exit();
	}

	public function add_team()
	{	//echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else{

			$data['all']=$this->adminlogin->allsetting("setting_table");	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('work','Enter Designation', 'required');
			$this->form_validation->set_rules('fb', 'Enter Face Url ', 'required');
			$this->form_validation->set_rules('tw','Enter Twitter Url', 'required');
			$this->form_validation->set_rules('ig', 'Enter Instagram Url ', 'required');
			$this->form_validation->set_rules('in','Enter LinkedIn Url', 'required');

			if ($this->form_validation->run() == FALSE)
				{
					$data['name']=$_POST['name'];
					$data['work']=$_POST['work'];
					$data['fb']=$_POST['fb'];
					$data['tw']=$_POST['tw'];
					$data['ig']=$_POST['ig'];
					$data['in']=$_POST['in'];
					$data['containt']="admin/add_team.php";
					$this->load->view("admin",$data);
				}
					else
					{  
						$datta = array('name' => $_POST['name'],
										'dp'  => $_POST['cateimg'],
								"designation"  => $_POST['work'],
								"twitter"	   => $_POST['tw'],
								"facebook"	   => $_POST['fb'] ,
								"instagram"	   => $_POST['ig'],
								"linkedin"	   => $_POST['in']);
						$qry = $this->Team_Model->productinsert("team",$datta);
							if($qry)
								{
									
									redirect("Team/index?sucess=Team Member Add Successfully");
								}
					}
				}
		}

	public function insertproduct()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{     $data['all']=$this->adminlogin->allsetting("setting_table");	

      			$config['upload_path']          = './products/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1000;
                $config['max_height']           = 7680;
				$this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('productpic'))
                {
                    $data['imgerror'] = array('error' => $this->upload->display_errors());
                    $data['containt']="admin/add_category.php";
                    $this->load->view("admin.php",$data);
                }
                else
                {   $data['all']=$this->adminlogin->allsetting("setting_table");	
                	$datta = array('product_name' => $_POST['product_name'],
                					'product_pic' => $_FILES['productpic']['name'],
                					 "parent_id"  =>$_POST['p_cate'],
                					    "status"  =>$_POST['stockstatus'] );
                	$qry = $this->Product_Model->productinsert("products",$datta);
	                  if($qry)
	                    {
	                    $data['success']="Category Successfuly Inserted";
	                	$data['containt']="admin/add_category.php";
                        $this->load->view("admin.php",$data);
	                    }
                }
        }
	}

	
	

	



	//***********Delet Product****************************************
	public function deleteproduct()
	{ 
		///echo "<pre>"; print_r($_GET);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{   $data['all']=$this->adminlogin->allsetting("setting_table");	
				$condi=array("team_id"=>$_GET['id']);
				$upd=array('status' =>0);
				$del=$this->Team_Model->deleteProduct('team',$condi,$upd);
				redirect("team/index?sucess=Member Successfully Deleted");
			}
	}

							
	public function editteam()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$condi=array("team_id"=>$_GET['id']);
				$data['editid']=$_GET['id'];
				$data['team']=$this->Team_Model->editteam('team',$condi);
				//echo "<pre>";print_r($data['team']);exit;
				$data['containt']="admin/edit_team.php";
				$this->load->view("admin",$data);
			}
	}


public function edit_insert()
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
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('work','Enter Designation', 'required');
			$this->form_validation->set_rules('fb', 'Enter Face Url ', 'required');
			$this->form_validation->set_rules('tw','Enter Twitter Url', 'required');
			$this->form_validation->set_rules('ig', 'Enter Instagram Url ', 'required');
			$this->form_validation->set_rules('in','Enter LinkedIn Url', 'required');
				if ($this->form_validation->run() == FALSE)
			{
				$condi=array("team_id"=>$_POST['gett']);
				$data['editid']=$_POST['gett'];
				$data['name']=$_POST['name'];
				$data['work']=$_POST['work'];
				$data['fb']=$_POST['fb'];
				$data['tw']=$_POST['tw'];
				$data['ig']=$_POST['ig'];
				$data['in']=$_POST['in'];
				$data['containt']="admin/edit_team.php";
				$this->load->view("admin",$data);
			}
			else
			{
				
				if(!empty($_POST['cateimg']))
				{
					//echo 'fdsjk';exit;
					$newpic  =$_POST['cateimg'].','.$_POST['oldpic'];
					//echo $newpic;exit;
				}
				if(empty($_POST['cateimg']))
				{
					$newpic  = $_POST['oldpic'];
					//echo $newpic; exit;
				}

					
					$condi=array("team_id"		=>$_POST['gett']);
					
					$datta = array('name' 		   => $_POST['name'],
									'dp' 		   => $newpic,
									"designation"  => $_POST['work'],
									"twitter"	   => $_POST['tw'],
									"facebook"	   => $_POST['fb'] ,
									"instagram"	   => $_POST['ig'],
									"linkedin"	   => $_POST['in']);
					$fire=$this->Team_Model->editinsert("team",$field,$condi);
					if($fire)
						{
							redirect("team/index?sucess=Member Update Successfully");
						}
			}
		}
	}



}
				