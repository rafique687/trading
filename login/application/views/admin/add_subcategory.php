<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
    $("#parentcate").change(function () {
        var pcate = $("#parentcate").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/subcate?id="+pcate,
            type: "GET",
            data: "id = "+ contry,
            dataType: "html",
            success: function(data)
            { 
             $("#subcate").html(data);
            }               
        });
    });
});
</script>
<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Manage Category</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Sub Category:</h4>
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>/product/subaddproductinsert" method="post" enctype="multipart/form-data"> 
								<div class="form-group"> 
									<label for="exampleInputEmail1">Sub Category</label> 
									<input type="text" class="form-control" id="" name="product_name" placeholder="Sub Category Name"> 
								</div> 
								<div class="form-group"> 
									<label>Select Parent Category</label>
		                        		<select class="form-control" name="p_cate" required="" id="parentcate">
		                         		 <?php foreach ($parent_cate as $pr) {?>
		                          				<option value="<?php echo $pr['prod_id']?>"><?php echo $pr['product_name']?>
		                          					
		                          				</option>
		                         <?php } ?>
		                        </select> 
								</div> 
								<div class="form-group"> 
									<label>Select sub Category</label>
		                        	<select class="form-control" name="subcate" required="" id="subcate">
		                         
		                        	</select> 
								</div> 
								 <label>Status</label>
                        				<select class="form-control" name="stockstatus" required="">
                                        	<option value="0">Active</option>
                           					<option value="1">Inactive</option>
                        				</select>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Image</label> 
									<input type="file" class="form-control" name="productpic[]" placeholder="upload ..." multiple required="required"> 
								</div> 
								
								<!-- <div class="checkbox"> <label> 
									<input type="checkbox"> Check me out </label> 
								</div>  -->
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
					</div>

				</div>
			</div>
		</div>