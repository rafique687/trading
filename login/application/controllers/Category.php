<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
	{   $data['all']=$this->adminlogin->allsetting("setting_table");	
		$data['containt']="admin/login.php";
		$this->load->view('adminlogin.php',$data);
	}

	public function addcategory()
	{  
		$sessiontrue=$this->session->userdata("user_name");
			if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
			else
			{
				if(isset($_GET['id']))
				{
					
					$data['all']=$this->adminlogin->allsetting("setting_table");	
					$condi = array('prod_id' => $_GET['id']);
					$data['catename']=$this->Product_Model->getcatename("products",$condi);
					//print_r($data['catename']);exit;
					$data['pid']=$_GET['id'];

				}
				else
				{
					$or=array("status"=>2);
					$data['all']=$this->adminlogin->allsetting("setting_table");	
					$data['pid']=$_GET['id'];
				}

				    $data['all']=$this->adminlogin->allsetting("setting_table");
				    $data['containt']="admin/add_category.php";
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
		$config['upload_path']          = './products/';
		$userpic= $_FILES['file']['name']= $_FILES['file']['name'];
		$_FILES['file']['type']= $_FILES['file']['type'];
		$_FILES['file']['tmp_name']= $_FILES['file']['tmp_name'];
		$_FILES['file']['error']= $_FILES['file']['error'];
		$_FILES['file']['size']= $_FILES['file']['size'];    
		$uploadPath = './products/';
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		echo json_encode($name);
		exit();
	}

	public function add_maiandsubcate()
	{	
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else{
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$this->load->library('form_validation');
				$this->form_validation->set_rules('product_name', 'Category Name', 'required');
				$this->form_validation->set_rules('des', 'Category Description', 'required');
				if ($this->form_validation->run() == FALSE)
					{
						$data['product_name']=$_POST['product_name'];
						$data['des']=$_POST['des'];
						$data['pid']=$_POST['p_cate'];
						$data['containt']="admin/add_category.php";
						$this->load->view("admin",$data);
					}
					else
					{  
						$datta = array('product_name' => $_POST['product_name'],
										'product_pic'  => $_POST['cateimg'],
										"parent_id"    => $_POST['p_cate'],
										"description"  => $_POST['des'],
										"status"	   => $_POST['stockstatus'],
										"main_cate"	   => $_POST['p_cate'] );
						$qry = $this->Product_Model->productinsert("products",$datta);
							if($qry)
								{
									if($_POST['p_cate']==0)
									{
									redirect("category/viewcategory?sucess=Category Successfully Added &id=".$_POST['p_cate']);
									}
									else
									{
										redirect("category/viewcategory?category=".$_POST['p_cate']."& sucess=Sub Category Successfully Added &id=1");	
									}
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

	public function viewcategory()
	{ 
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{  $data['all']=$this->adminlogin->allsetting("setting_table");
			if(isset($_GET['category']))
			{	
				$cateid=array("prod_id"=>$_GET['category']);
				$data['catename']=$this->Product_Model->getcatename("products",$cateid);
				$id=$_GET['category'];
				$or=array("status"=>2);
				$condi = array('parent_id' => $id,'status'=>1);
				$data['product']=$this->Product_Model->maincategory("products",$condi,$or);
				$data['containt']='admin/product.php';
				$this->load->view("admin",$data);
			}
			else
			{  //echo "fdjks";exit;
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$id=0;
				$or=array("status"=>2);
				//$or=array("status"=>2);
				$condi = array('parent_id' => $id,"status"=>1);
				$data['product']=$this->Product_Model->maincategory("products",$condi,$or);
				//echo "<pre>"; print_r($data['product']);exit;
				$data['containt']='admin/product.php';
				$this->load->view("admin",$data);
			}
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

	public function subaddproductinsert()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
		{
			redirect("dashboard/index");
		}
		else
		{   $data['all']=$this->adminlogin->allsetting("setting_table");	
			$pic= count($_FILES['productpic']['name']);
			$userpic='';
			for($i = 0; $i < $pic; $i++)
				{
						$userpic= $_FILES['userfile']['name']= $_FILES['productpic']['name'][$i];
						$_FILES['userfile']['type']= $_FILES['productpic']['type'][$i];
						$_FILES['userfile']['tmp_name']= $_FILES['productpic']['tmp_name'][$i];
						$_FILES['userfile']['error']= $_FILES['productpic']['error'][$i];
						$_FILES['userfile']['size']= $_FILES['productpic']['size'][$i];    
						$uploadPath = './subproducts/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if(!$this->upload->do_upload('userfile'))
						{
						print_r($this->upload->display_errors());
						}
				}
			
		$imploadpicname=implode(",",$_FILES['productpic']['name']);
		$datta = array('product_name' =>$_POST['product_name'],"parent_id"=>$_POST['p_cate'],"status"=>$_POST['stockstatus'],'product_pic'=>$imploadpicname,);
		$qry = $this->Product_Model->productinsert("products",$datta);
		if($qry)
			{
				redirect("product/subaddproduct");
			}
		}
	}
			
	public function view_subcategory()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
		{   $data['all']=$this->adminlogin->allsetting("setting_table");	
			$data['product']=$this->Product_Model->subproduct("products");
			//echo "<pre>"; print_r($data['product']);exit;
			$data['containt']='admin/view_subproduct.php';
			$this->load->view("admin",$data);
		}
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
		$condi=array("prod_id "=>$_GET['id']);
		
		$data['product']=$this->Product_Model->jqsubproduct("state",$condi);
		$this->load->view("state",$data);
	}
	
	//*****************udate product status***********************
	public function category_status()
	{   
		$condi=array("prod_id"=>$_GET['id']);
		$upd=array("status"=>2);
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

	public function iteninsert()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{   $data['all']=$this->adminlogin->allsetting("setting_table");	
				$this->load->library('form_validation');
				$this->form_validation->set_rules('product_name', 'Product Name', 'required');
				$this->form_validation->set_rules('des', 'Product Description', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$data['product_name']=$_POST['product_name'];
					$data['product_name']=$_POST['des'];
					$data['parent_cate']=$this->Product_Model->mainproduct("products");
					$data['containt']="admin/add_item.php";
					$this->load->view("admin",$data);
				}
				else
				{
				$pic= count($_FILES['productpic']['name']);
				$userpic='';
				for($i = 0; $i < $pic; $i++)
				{
					$userpic= $_FILES['userfile']['name']= $_FILES['productpic']['name'][$i];
					$_FILES['userfile']['type']= $_FILES['productpic']['type'][$i];
					$_FILES['userfile']['tmp_name']= $_FILES['productpic']['tmp_name'][$i];
					$_FILES['userfile']['error']= $_FILES['productpic']['error'][$i];
					$_FILES['userfile']['size']= $_FILES['productpic']['size'][$i];    
					$uploadPath = './item/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if(!$this->upload->do_upload('userfile'))
						{
							$data['error']=$this->upload->display_errors();
							$data['containt']="admin/add_item.php";
							$data['parent_cate']=$this->Product_Model->mainproduct("products");
							$this->load->view('admin.php',$data);
						}
				}
					
					$imploadpicname=implode(",",$_FILES['productpic']['name']);
						$datta = array('item_name' => $_POST['product_name'],
										"root_cate"=> $_POST['p_cate'],
										"item_status"=>$_POST['stockstatus'],
										'item_pic'   =>$imploadpicname,
										"description"=>$_POST['des']);
						$qry = $this->Product_Model->productinsert("item",$datta);
					if($qry)
						{
							
							redirect("product/view_product?sucess=Product Successfully Stored");
						}
			}
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
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$data['product']=$this->Product_Model->viewitem("item");
				$data['containt']='admin/view_item.php';
				$this->load->view("admin",$data);
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
				$condi=array("prod_id"=>$_GET['id']);
				$upd=array('status' =>0);
				$del=$this->Product_Model->deleteProduct('products',$condi,$upd);
				redirect("Category/viewcategory?category=".$_GET['category'].'&sucess=Category Successfully Delete');
			}
	}

	public function deletesubcate()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
			redirect("dashboard/index");
			}
			else
			{
			$condi=array("prod_id"=>$_GET['id']);
			$upd=array('status' =>0);
			$del=$this->Product_Model->deleteProduct('products',$condi,$upd);
			redirect("product/viewcategory/?id=0");
			}
	}
							
	public function editcategory()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
				$data['all']=$this->adminlogin->allsetting("setting_table");	
				$condi=array("prod_id"=>$_GET['id']);
				$data['editid']=$_GET['id'];
				$data['containt']="admin/edit_product.php";
				$data['product']=$this->Product_Model->getimage('products',$condi);
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
				$this->form_validation->set_rules('product_name', 'Product Name', 'required');
				$this->form_validation->set_rules('des', 'Product Description', 'required');
				if ($this->form_validation->run() == FALSE)
			{
				$condi=array("prod_id"=>$_POST['gett']);
				$data['editid']=$_POST['gett'];
				$data['product']=$this->Product_Model->getimage('products',$condi);
				$data['parent_cate']=$this->Product_Model->mainproduct("products");
				$data['containt']="admin/edit_product.php";
				$this->load->view("admin",$data);
			}
			else
			{
				if(isset($_POST['category']))
				{
					$parentid=$_POST['category'];
				}
				else
				{
					$parentid=0;
				}
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

					
					$condi=array("prod_id"		=>$_POST['gett']);
					$field=array("product_name" => $_POST['product_name'],
									"parent_id"	=> $parentid,
									"product_pic"  => $newpic,
									"description"  => $_POST['des'],
									"status"		=> $_POST['stockstatus']);
					$fire=$this->Product_Model->editinsert("products",$field,$condi);
						if($fire)
							{
								if(isset($_POST['category']))
								{
									redirect("category/viewcategory/?category=".$_POST['category']."&sucess=Sub Category Successfully updated");
								}
								else
								{
									redirect("category/viewcategory/?id=0&sucess=Category Successfully updated");
								}
							}
			}
		}
	}
					

	//*************************Delete sub project ***********************************
	public function deletesubproduct()
	{
		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
				$this->load->helper("url");
				if($_GET['id'])
				{
					$condi=array("prod_id"=>$_GET['id']);
					$getpic=$this->Product_Model->getimage('products',$condi);
					if($getpic)
						{
							$pic_array=explode(",",$getpic['product_pic']);
							$no_Of_pic=count($pic_array);
							for($i=0;$i<$no_Of_pic;$i++)
							{
								delete_files("products/".$pic_array[$i]);
								$path = base_url().'/products/'.$pic_array[$i];
								@unlink($path);
							}
								$del=$this->Product_Model->deleteProduct('products',$condi);
						}
				}
					redirect("product/view_subproduct");
			}
	}

//*****************edit subProduct*************************************

	public function editsubproduct()
	{

		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
			{
				$condi=array("prod_id"=>$_GET['id']);
				$check=array("parent_id"=>0);
				$data['editid']=$_GET['id'];
				$data['containt']="admin/edit_subcategory.php";
				$data['product']=$this->Product_Model->getimage('products',$condi);
				$data['p_cate']=$this->Product_Model->mainproduct('products');
				$this->load->view("admin",$data);
			}

	}

//****************Edit inser sub category************************

//***************Insert edit product**********************************
public function edit_insertsubcategory()
	{

		$sessiontrue=$this->session->userdata("user_name");
		if(!isset($sessiontrue))
			{
				redirect("dashboard/index");
			}
		else
		{
			if($_FILES['productpic']['name'][0])
				{  
					$pic= count($_FILES['productpic']);
					$userpic='';
					for($i = 0; $i < $pic; $i++)
					{
						$userpic= $_FILES['userfile']['name']= $_FILES['productpic']['name'][$i];
						$_FILES['userfile']['type']= $_FILES['productpic']['type'][$i];
						$_FILES['userfile']['tmp_name']= $_FILES['productpic']['tmp_name'][$i];
						$_FILES['userfile']['error']= $_FILES['productpic']['error'][$i];
						$_FILES['userfile']['size']= $_FILES['productpic']['size'][$i];    
						$uploadPath = './subproducts/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if(!$this->upload->do_upload('userfile'))
							{
								print_r($this->upload->display_errors());
								$data['imgerror'] = array('error' => $this->upload->display_errors());
								$data['containt']="admin/edit_subcategory.php";
								//echo "<pre>"; print_r($data['error']);
								$this->load->view("admin.php",$data);
							}
							else
							{
								$condi=array("prod_id"      => $_POST['gett']);
								$field=array("product_name" => $_POST['product_name'],
												"product_pic"  => $pushpic,
												"parent_id"	=> $_POST['p_cate'],
												"description"  => $_POST['des'],
												"status"		=> $_POST['stockstatus']);
								$fire=$this->Product_Model->editinsert("products",$field,$condi);
									if($fire)
									{
										redirect("product/view_subproduct");
									}

							}
					}
				}
	//|*************************************************************
			else
			{
				$condi=array("prod_id"=>$_POST['gett']);
				$field=array("product_name" => $_POST['product_name'],
								"parent_id"	=> $_POST['p_cate'],
								"product_pic"  => $_POST['oldpic'],
								"description"  => $_POST['des'],
								"status"		=> $_POST['stockstatus']);
				$fire=$this->Product_Model->editinsert("products",$field,$condi);
				if($fire)
				{
					redirect("product/view_subproduct");
				}
			}
		}
	}

	//************************Edit item*******************************
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
				//echo "<pre>"; print_r($data['product']);exit;
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
				//**************************************************************
				$this->load->library('form_validation');
				$this->form_validation->set_rules('product_name', 'Product Name', 'required');
				$this->form_validation->set_rules('des', 'Product Description', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$condi=array("item_id"=>$_POST['gett']);
					$data['product']=$this->Product_Model->itemrow('item',$condi);
					//echo "<pre>"; print_r($data['product']);exit;
					$data['p_cate']=$this->Product_Model->mainproduct('products');
					$data['subcate']=$this->Product_Model->subproduct('products');
					$data['editid']=$_POST['gett'];
					$data['parent_cate']=$this->Product_Model->mainproduct("products");
					$data['containt']="admin/edit_item.php";
					$this->load->view("admin",$data);
				}
				else
				{
					$data['product_name']=$_POST['product_name'];
					$data['product_name']=$_POST['des'];
					$data['p_cate']=$_POST['p_cate'];
					$data['stockstatus']=$_POST['stockstatus'];
						
						if(isset($_FILES['productpic']['name'][0]))
						{  
							$pic= count($_FILES['productpic']['name']);
							$userpic='';
							for($i = 0; $i<$pic; $i++)
							{
								$userpic= $_FILES['userfile']['name']= $_FILES['productpic']['name'][$i];
								$_FILES['userfile']['type']= $_FILES['productpic']['type'][$i];
								$_FILES['userfile']['tmp_name']= $_FILES['productpic']['tmp_name'][$i];
								$_FILES['userfile']['error']= $_FILES['productpic']['error'][$i];
								$_FILES['userfile']['size']= $_FILES['productpic']['size'][$i];    
								$uploadPath = './item/';
								$config['upload_path'] = $uploadPath;
								$config['allowed_types'] = 'jpg|jpeg|png|gif';
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								if(!$this->upload->do_upload('userfile'))
									{
										print_r($this->upload->display_errors());exit;
									}
							}
										
										$imploadpicname=implode(",",$_FILES['productpic']['name']);
										$pushpic=$imploadpicname.$_POST['oldpic'];
										$condi=array("item_id"      => $_POST['gett']);
										$field=array("item_name" => $_POST['product_name'],
														"item_pic"  => $pushpic,
														"root_cate"	=> $_POST['p_cate'],
														"description"  => $_POST['des'],
														"item_status"		=> $_POST['stockstatus']);
										$fire=$this->Product_Model->editinsert("item",$field,$condi);
											if($fire)
											{
												redirect("product/view_item");
											}
							}
//|*************************************************************
							else
							{
								$condi=array("item_id"=>$_POST['gett']);
								$field=array("item_name" => $_POST['product_name'],
												"root_cate"	=> $_POST['p_cate'],
												"item_pic"  => $_POST['oldpic'],
												"description"  => $_POST['des'],
												"item_status"		=> $_POST['stockstatus']);
								$fire=$this->Product_Model->editinsert("item",$field,$condi);
								if($fire)
								{
									redirect("product/view_item");
								}
							}
					}
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
			$this->load->helper("url");

			if($_GET['id'])
			{
				$condi=array("item_id"=>$_GET['id']);
				$getpic=$this->Product_Model->getimage('item',$condi);
				if($getpic)
					{
						$pic_array=explode(",",$getpic['item_pic']);
						$no_Of_pic=count($pic_array);
							for($i=0;$i<$no_Of_pic;$i++)
							{
								delete_files("item/".$pic_array[$i]);
								$path = base_url().'/item/'.$pic_array[$i];
								@unlink($path);
							}
						$del=$this->Product_Model->deleteProduct('item',$condi);
					}
			}
				redirect("product/view_item");
		}
}

public function delimage()
{
  
	$condi=array("prod_id"=>$_POST['cateid']);
				$getpic=$this->Product_Model->getimage('products',$condi);
				//echo '<pre>'; print_r($getpic);exit;
				if($getpic)
				{
					$pic_array=explode(",",$getpic['product_pic']);
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
						
							delete_files("products".$path,TRUE);
							

			/**************upadate in database********************************** */
			$impd=implode(",",$pic_array);
			$upd=array("product_pic"=>$impd);
			
			$getpic=$this->Product_Model->imageupdate('products',$condi,$upd);
			

					
				}
}

}
				