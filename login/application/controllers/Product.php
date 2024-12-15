<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
        $this->load->library('session');
        $this->load->model('Product_Model');
        $this->load->model('adminlogin');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['containt']="admin/login.php";
		$this->load->view('adminlogin.php',$data);
	}

	public function addproduct()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['containt']="admin/add_item.php";
			$data['parent_cate']=$this->Product_Model->mainproduct("products");
			$this->load->view('admin.php',$data);
			//redirect("product/view_product?success=Product Successfully stored");
		}
	}


	public function subaddproduct()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$data['containt']="admin/add_subcategory.php";
			$data['parent_cate']=$this->Product_Model->mainproduct("products");
			$this->load->view('admin.php',$data);
		}
	}

	public function view_product()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("dashboard/index");
			}
		else
			{
                $condi = array('item_status' => 1 );
                $or = array('item_status' => 2 );
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$data['product']=$this->Product_Model->viewitem("item",$condi,$or);
				//echo "<pre>"; print_r($data['product']);exit;
				$data['containt']='admin/view_item.php';
				$this->load->view("admin",$data);
			}
	}


	public function iteninsert()
	{
		//echo "<pre>"; print_r($_POST);exit;
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
			$data['all']=$this->adminlogin->allsetting("setting_table");
			$this->load->library('form_validation');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('des', 'Product Description', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$data['product_name']=$_POST['product_name'];
					$data['product_name']=$_POST['des'];
					$data['p_cate']=$_POST['p_cate'];
					$data['stockstatus']=$_POST['stockstatus'];
					$data['subcate']=$_POST['subcate'];
					$data['parent_cate']=$this->Product_Model->mainproduct("products");
					$data['containt']="admin/add_item.php";
					$this->load->view("admin",$data);
				}
				else
				{
					$datta = array('item_name'    => $_POST['product_name'],
									"root_cate"   => $_POST['p_cate'],
									"item_status" =>$_POST['stockstatus'],
									'item_pic'    =>$_POST['cateimg'],
									"description" =>$_POST['des'],
									"sub_cate"	  =>$_POST['subcate']);
					$qry = $this->Product_Model->productinsert("item",$datta);
						if($qry)
						{
							redirect("product/view_product?success=Product Successfully Added");
						}
				}
			}
	}

	public function edititem()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("dashboard/index");
			}
		else
			{
			$condi=array("item_id"=>$_GET['id']);
			$data['editid']=$_GET['id'];
			$data['containt']="admin/edit_item.php";
			$data['product']=$this->Product_Model->itemrow('item',$condi);
			$data['p_cate']=$this->Product_Model->mainproduct('products');
			$data['subcate']=$this->Product_Model->subproduct('products');
			$this->load->view("admin",$data);
			}
	}



	public function inser_edititem()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("dashboard/index");
			}
		else
			{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('des', 'Product Description', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$condi=array("item_id"=>$_POST['gett']);
				$data['product']=$this->Product_Model->itemrow('item',$condi);
				$data['p_cate']=$this->Product_Model->mainproduct('products');
				$data['subcate']=$this->Product_Model->subproduct('products');
				$data['editid']=$_POST['gett'];
				$data['parent_cate']=$this->Product_Model->mainproduct("products");
				$data['containt']="admin/edit_item.php";
					$this->load->view("admin",$data);
			}
			else
			{
				$newpic=$_POST['cateimg'].','.$_POST['oldpic'];
				$data['product_name']=$_POST['product_name'];
				$data['product_name']=$_POST['des'];
				$data['p_cate']=$_POST['p_cate'];
				$data['stockstatus']=$_POST['stockstatus'];
				
				$condi=array("item_id"=>$_POST['gett']);
				$field=array("item_name" 	=> $_POST['product_name'],
								"root_cate"	=> $_POST['p_cate'],
								"item_pic"  	=> $newpic,
								"description"  => $_POST['des'],
								"item_status"	=> $_POST['stockstatus']);
				$fire=$this->Product_Model->editinsert("item",$field,$condi);
				if($fire)
				{ 
					redirect("product/view_product?success=Product Successfully Updated");
				}
			}
		}
	}

	public function delimage()
	{
 // echo "<pre>"; print_r($_POST);exit;
		$condi=array("item_id"=>$_POST['cateid']);
			$getpic=$this->Product_Model->getimage('item',$condi);
			if($getpic)
				{
					$pic_array=explode(",",$getpic['item_pic']);
					$no_Of_pic=count($pic_array);
					for($i=0;$i<$no_Of_pic;$i++)
						{
							if($pic_array[$i]==$_POST['imgnam'])
							{
								unset($pic_array[$i]);
							}
						}
							
					$path= base_url().'item'.$_POST['imgnam'];
				
					delete_files("item".$path,TRUE);
					
					/**************upadate in database********************************** */
					$impd=implode(",",$pic_array);
					$upd=array("item_pic"=>$impd);
					$getpic=$this->Product_Model->imageupdate('item',$condi,$upd);
				}
	}


	public function deleteitem()
	{  
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				$condi = array('item_id' => $_GET['id'] );
				$datt=array("item_status"=>0);
				$del=$this->Product_Model->deleteProduct('item',$condi,$datt);
				redirect("product/view_product?success=Product Successfully Deleted");
			}
	}

	public function item_status()
	{  //print_r($_GET);exit;
		$idexp=explode(",",$_GET['id']);
		//print_r($idexp);exit;
		$condi=array("item_id "=>$idexp[0]);
		if($idexp[1]==2)
		{
			 $upd=array("item_status"=>1);
		}
		else
		{
			$upd=array("item_status"=>2);
		}
		 $data['product']=$this->Product_Model->statusupdate("item",$condi,$upd);
		return true;
	}




	public function insertproduct()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{
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
			{
				$datta = array('product_name' =>$_POST['product_name'],'product_pic'=>$_FILES['productpic']['name'],"parent_id"=>$_POST['p_cate'],"status"=>$_POST['stockstatus'] );
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

	

	public function jquerysubcate()
	{
		$condi=array("parent_id"=>$_GET['id']);
		$data['product']=$this->Product_Model->jqsubproduct("products",$condi);
		$this->load->view("jquerysubcate",$data);
	}

	public function jquerystate()
	{
		$condi=array("contery_id "=>$_GET['id']);
		
		$data['product']=$this->Product_Model->jqsubproduct("state",$condi);
		$this->load->view("state",$data);
	}
	//*****************udate product status***********************
	public function category_status()
	{  //echo "<pre>"; print_r($_GET);exit;
		$condi=array("prod_id"=>$_GET['id']);
		if($_GET['statuss']==2)
		{
			$upd=array("status"=>1);
		}
		if($_GET['statuss']==1)
		{
			$upd=array("status"=>2);	
		}
		 $data['product']=$this->Product_Model->statusupdate("products",$condi,$upd);
		return true;
	}
	
	//************************************************************
	public function jquerycity()
	{
		$condi=array("stid"=>$_GET['id']);
		$data['product']=$this->Product_Model->jqsubproduct("city",$condi);
		$this->load->view("city",$data);
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
		$config['upload_path']          = './item/';
		$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
		$_FILES['file']['type']= $_FILES['file']['type'];
		$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
		$_FILES['file']['error']= $_FILES['file']['error'];
		$_FILES['file']['size']= $_FILES['file']['size'];    
		$uploadPath = './item/';
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
}


