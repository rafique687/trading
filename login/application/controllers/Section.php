<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('section_model');
        $this->load->model("adminlogin");
        $this->load->helper('url', 'form');
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
			if(isset($_GET['success']))
			{
				$data['success']=$_GET['success'];
			}
				$scondi=array("section_id"=>$_GET['section_id'],"sessting_id "=>$_GET['sessting_id']);
				$data['form_fck']=$this->section_model->session_fetch("setting_table",$scondi);

				/********************************************************************/
				$condi1=array("sessting_id "=>1);
				$conddi3=array("section_id"=>3);
				$data['fck']=$this->adminlogin->basic_setting("setting_table",$conddi3);
				$data['form_setting']=$this->adminlogin->basic_setting("setting_table",$condi1);
				/********************************************************************/
				$data['containt']="admin/section.php";
				$this->load->view('admin.php',$data);
		}

	}
	
    public function updatesetting()
    {
    	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('home','Home Page Content','required');
				if ($this->form_validation->run() == FALSE)
				{
					$data['sessting_id']=$_POST['id'];
					$data['containt']="admin/section.php";
					$this->load->view("admin",$data);
				}
				else
				{
					$condi=array("sessting_id"=>$_POST['id']);
					$updates=array("field_value"=>$_POST['home']);
					$fire=$this->section_model->updatesection("setting_table",$updates,$condi);
					if($fire)
					{
						redirect("section/index?sessting_id=".$_POST['id']."&success=Content Successfully updated &section_id=".$_POST['section_id']);
					}
				}
		}
	}

	public function addbanner()
	{
    	$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
			$data['containt']="admin/add_banner.php";
			$this->load->view("admin",$data);
		}
	}
	public function insetbanner()
	{  ///echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('title','Banner Page Title','required');

				if ($this->form_validation->run() == FALSE)
					{
					 	$data['title']=$_POST['title'];
					 	$data['banner_section']=$_POST['banner_section'];
					 	$data['bannerstatus']=$_POST['bannerstatus'];
						$data['containt']="admin/add_banner.php";
					    $this->load->view("admin",$data);
					}
					else
					{
						$config['upload_path']          = './banner/';
		                $config['allowed_types']        = 'gif|jpg|png|jpeg';
		                $config['max_size']             = 10000;
		                $config['max_width']            = 10000;
		                $config['max_height']           = 76800;
						$this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('bannerpic'))
		                {	$data['title']=$_POST['title'];
		                    $data['imgerror'] = array('error' => $this->upload->display_errors());
		                    $data['containt']="admin/add_banner.php";
		                    $this->load->view("admin.php",$data);
		                }	
			 			else
			 			{
						$bannerinsert=array("title" => $_POST['title'],
								  "banner_section" => $_POST['banner_section'],
								    "bannerstatus" => $_POST['bannerstatus'],
								       "bannerpic" => $_FILES['bannerpic']['name']
								         );
						$fire=$this->section_model->insertbanner("banner",$bannerinsert);
						if($fire)
						{
							redirect("Section/view_banner?success=Banner Successfully inserted");
						}
					   }
				}
			}
	}
	public function editbanner()
	{
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
			 $condi=array("bannerid"=>$_GET['id']);
			 $data['row']=$this->section_model->bannerrow("banner",$condi);
			 $data['containt']="admin/edit_banner.php";
			 $this->load->view("admin",$data);
			}
	}

	public function editinsert()
	{

		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('title','Banner Page Title','required');
				if ($this->form_validation->run() == FALSE)
					{
					 	$data['title']=$_POST['title'];
						$data['containt']="admin/add_banner.php";
					    $this->load->view("admin",$data);
					}
					else
					{
						if($_FILES['bannerpic']['name']==true)
						{ //echo "ysd";exit;
						$config['upload_path']          = './banner/';
		                $config['allowed_types']        = 'gif|jpg|png|jpeg';
		                $config['max_size']             = 10000;
		                $config['max_width']            = 10000;
		                $config['max_height']           = 76800;
						$this->load->library('upload', $config);

		                if ( !$this->upload->do_upload('bannerpic'))
		                {
		                	//echo "error";exit;
		                	$data['title']=$_POST['title'];
		            		$data['bannerid']=$_POST['bannerid'];
		                    $data['imgerror'] = array('error' => $this->upload->display_errors());
		                    $data['containt']="admin/add_banner.php";
		                    $this->load->view("admin.php",$data);
		                }

			 			else
			 			{ 
			 			$condi=array("bannerid"=>$_POST['bannerid']);
			 			$newpic=$_FILES['bannerpic']['name'].','.$_POST['bannerpic'];
						$bannerinsert=array("title" => $_POST['title'],
								  "banner_section" => $_POST['banner_section'],
								    "bannerstatus" => $_POST['bannerstatus'],
								       "bannerpic" => $newpic
								         );
						$fire=$this->section_model->updatetbanner("banner",$bannerinsert,$condi);
						if($fire)
						{
							redirect("Section/view_banner?success=Banner Successfully Upadated");
						}
					}
					   }
					   else
					   {
					   	//echo "fdskf";exit;
					   	$condi=array("bannerid"=>$_POST['bannerid']);
					   	$newpic=$_FILES['bannerpic']['name'];
						$bannerinsert=array("title" => $_POST['title'],
								  "banner_section" => $_POST['banner_section'],
								    "bannerstatus" => $_POST['bannerstatus'],
								       "bannerpic" => $newpic
								         );
						$fire=$this->section_model->updatetbanner("banner",$bannerinsert,$condi);
						if($fire)
						{
							redirect("Section/view_banner?success=Banner Successfully Upadated");
						}

					   }
				}
			}
	}
	public function view_banner()
	{
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");
				$data['product']=$this->section_model->fetch_allbanner("banner");
				$data['containt']="admin/view_banner.php";
				$this->load->view("admin",$data);
			}
	}

	public function delbanner()
	{
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{	$condi=array("bannerid"=>$_GET['id']);
				$fire=$this->section_model->delbanner("banner",$condi);
				if($fire)
				{
					redirect("Section/view_banner?sucess=Banner Successfully Delete");
				}
			}

	}
}
