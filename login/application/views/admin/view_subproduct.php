<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
				
					<h2 class="title1">Manage Category</h2>
				
					<div class="table-responsive bs-example widget-shadow">
						
						<a href="<?php echo site_url()?>/Product/addcategory/1" class="btn btn-info pull-right">Add Sub Category</a>
						<h4>Sub Category</h4>
						<table class="table table-bordered"> 
							<?php if(isset($_GET['sucess']))
							{?>
									<div class="alert alert-success">
  										<strong><?php echo $_GET['sucess']?></strong> 
									</div> 
							<?php } ?>
							<thead> 
								<tr> 
									<th style="width:20px;">S.No</th>
				                    <th>Category Name</th>
				                    <th>Main Category</th>
				                    <th>Image</th>
				                    <th>Status</th>
				                    <th>Action</th>
								</tr> 
							</thead> 
							<tbody> 
						     <?php  $i=1;
						     foreach($product as $prod){?>
								<tr> 
									<td style="width:20px;"><?php echo $i ?></th> 
									<td><?php echo $prod['sucate'];?></td>
									<td><?php echo $prod['prcate'];?></td>
									<td><img src='<?php $dd=list($street) = explode(',',$prod['product_pic'] )[0];
                          				echo base_url();?>products/<?php echo $dd?>'  onerror="this.onerror=null; this.src='<?php echo base_url()?>products/product-10.jpg'" width="50" height="50">
                          			</td> 
									<td><?php if($prod['status']==0){ echo "In Stock";} else {echo "out of stock";}?></td> 
									<td>
										<a href="<?php echo site_url()?>/product/editproduct?id=<?php echo $prod['prod_id']?>" class="btn btn-info"><i class="fa fa-edit"></i>
										</a>
                        				<a href="<?php echo site_url()?>/product/deletesubproduct?id=<?php echo $prod['prod_id']?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                        				</a>
                        			</td> 
									
								</tr> 
							<?php
									$i++;
								} ?>
								
								 
							</tbody> 
						</table> 
					</div>
				</div>
			</div>
		</div>