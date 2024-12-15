<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Client_Model');
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
			$data['team']=$this->Client_Model->team("client",$condi);
			//echo "<pre>"; print_r($data['team']);exit;
			$data['containt']='admin/view_client.php';
			$this->load->view("admin",$data);
		}
	}

	public function addclient()
	{  
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");
			    $data['containt']="admin/add_client.php";
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
		//echo "<pre>"; print_r($_FILES);exit;	
		$name = $_FILES['file']['name'];
		$config['upload_path']          = './client/';
		$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
		$_FILES['file']['type']= $_FILES['file']['type'];
		$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
		$_FILES['file']['error']= $_FILES['file']['error'];
		$_FILES['file']['size']= $_FILES['file']['size'];    
		$uploadPath = './client/';
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
	
		echo json_encode($name);
		exit();
	}

	public function add_client()
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
			$this->form_validation->set_rules('url','Enter Company Url', 'required');
			

			if ($this->form_validation->run() == FALSE)
				{
					$data['name']=$_POST['name'];
					$data['stockstatus']=$_POST['stockstatus'];
					$data['url']=$_POST['url'];
					$data['containt']="admin/add_client.php";
					$this->load->view("admin",$data);
				}
					else
					{  
						$datta = array('name' 		  => $_POST['name'],
									   'status'  => $_POST['stockstatus'],
										"url"  		  => $_POST['url'],
										"logo"		  => $_POST['cateimg']);
								
						$qry = $this->Client_Model->productinsert("client",$datta);
							if($qry)
								{
									
									redirect("Client/index?sucess=Client Add Successfully");
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
		//echo "<pre>"; print_r($_GET);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{   $data['all']=$this->adminlogin->allsetting("setting_table");	
				$condi=array("client_id"=>$_GET['id']);
				$upd=array('status' =>0);
				$del=$this->Client_Model->deleteProduct('client',$condi,$upd);
				redirect("client/index?sucess=Client Successfully Deleted");
			}
	}

							
	public function editclient()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$condi=array("client_id"=>$_GET['id']);
				$data['editid']=$_GET['id'];
				$data['team']=$this->Client_Model->editteam('client',$condi);
				//echo "<pre>";print_r($data['team']);exit;
				$data['containt']="admin/edit_client.php";
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
			$this->form_validation->set_rules('url','Enter Company Url', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$condi=array("client_id"=>$_POST['gett']);
				$data['editid']=$_POST['gett'];
				$data['name']=$_POST['name'];
				$data['url']=$_POST['url'];
				$data['stockstatus']=$_POST['stockstatus'];
				$cond = array('client_id' => $_POST['gett'] );
				$data['team']=$this->Client_Model->editteam('client',$condi);
				$data['containt']="admin/edit_client.php";
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

					
					$condi=array("client_id"		=>$_POST['gett']);
					$datta = array('name' 		   => $_POST['name'],
									'logo' 		   => $newpic,
									"url"  		   => $_POST['url'],
									"status"	   => $_POST['stockstatus']
								  );
					$fire=$this->Client_Model->editinsert("client",$datta,$condi);
					if($fire)
						{
							redirect("client/index?sucess=Client Update Successfully");
						}
			}
		}
	}

	public function delimage()
{
  //echo "<pre>"; print_r($_POST);exit;
	$condi=array("client_id"=>$_POST['cateid']);
				$getpic=$this->Client_Model->getimage('client',$condi);
				//echo '<pre>'; print_r($getpic);exit;
				if($getpic)
				{
					$pic_array=explode(",",$getpic['logo']);
					$no_Of_pic=count($pic_array);
					
						//unset($array[1]);
						
						for($i=0;$i<$no_Of_pic;$i++)
							{
								if($pic_array[$i]==$_POST['imgnam'])
								{
									unset($pic_array[$i]);
								}
							}
							
							$path= base_url().'client'.$_POST['imgnam'];
						
							delete_files("client".$path,TRUE);
							

			/**************upadate in database********************************** */
			$impd=implode(",",$pic_array);
			$upd=array("logo"=>$impd);
			
			$getpic=$this->Client_Model->imageupdate('client',$condi,$upd);
			

					
				}
}



}
				