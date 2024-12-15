<!-- main content start-->

	<div id="page-wrapper">
		<div class="main-page">
			<div class="forms">
				<h2 class="title1">Manage Category</h2>
				<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					<div class="form-title">
						<?php if($pid==0){ ?>
						<h4>Add Category</h4>
					<?php }
					else {?>
							<h4>Add Subcategory</h4>
					<?php } ?>
					</div>
					<div class="form-body">
 						<form  action="<?php echo site_url()?>/category/add_mainandsubcate" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?php echo $pid;?>" name="p_cate">
							<div class="form-group"> 
								<label for="exampleInputEmail1">Category Name</label> 
								<input type="text" class="form-control" id="" name="product_name" placeholder="Category Name" required=""  value="<?php echo set_value('product_name'); ?>"> 
								<?php if(form_error('product_name')){?>
								
									<div class="error" style="color:red"><?php echo form_error('product_name');?></div> 
								
								<?php  };?>
							</div> 
							<div class="form-group"> 
								<label>Stock Status</label>
									<select class="form-control" name="stockstatus" required="">
										<option value="1">In Stock</option>
										<option value="2">Out Of Stock</option>
									</select>
							</div>
							<div class="form-group"> 
								<label for="exampleInputPassword1">Image</label> 
								<input type="file" class="form-control" name="productpic[]" placeholder="upload ..." required="required" multiple> 
								
								<?php if(isset($imgerror)){?>
										<div class="error" style="color:red"><?php echo $imgerror['error']?></div> 
									<?php } ?>
							</div> 
							<div class="form-group"> 
								<label for="exampleInputPassword1">Description</label> 
								<textarea class="form-control" rows="3" placeholder="Enter Description..."  name="des" required=""  value="<?php echo set_value('des'); ?>"></textarea>
								<?php if(form_error('des'))
									{?>
										<div class="error" style="color:red"><?php echo form_error('des');?></div> 
							 <?php  };?>
							</div>
							<button type="submit" class="btn btn-default">Submit</button> 
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>