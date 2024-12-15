<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1"><?php if(isset($catename)){ echo 'Add Category In '.$catename['product_name']; } else { echo 'Manage Category';}?></h2>
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
						
					<form action="<?php echo site_url()?>Category/add_maiandsubcate" method="post">
					<input type="hidden" value="<?php echo $pid;?>" name="p_cate" id="main">
					<div class="form-group"> 
						<label for="exampleInputEmail1">Category Name</label> 
						<input type="text" class="form-control" id="catename" name="product_name" placeholder="Category Name" required=""  value="<?php echo set_value('product_name'); ?>"> 
						<?php if(form_error('product_name'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('product_name'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group">
						<label>Status</label>
							<select class="form-control" name="stockstatus" required="" id="stock">
								<option value="1">Active</option>
								<option value="2">Inactive</option>
							</select>
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Description</label> 
						<textarea class="form-control" rows="3" placeholder="Enter Description..."  name="des" required="" id="des" value="<?php echo set_value('des'); ?>"></textarea>
						<?php if(form_error('des'))
							{?>
								<div class="custom"> <?php echo strip_tags(form_error('des'));?></div>
					 <?php  };?>
					</div>
					<div class="form-group col-12">
					<div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>category/uploadfiles">
					</div> 
					<input type="hidden" value="" name="cateimg" id="cateimg">
					</div>			
					<button type="submit" class="btn btn-default push" id="submi">Submit</button>
				</div>
				</form> 
				</div>
					</div>

				</div>
			</div>
		</div>
		
<script>
	Dropzone.autoDiscover = false;
		$(".dropzone").dropzone({
			url: $("#dropzonewidget").data("url"),
			addRemoveLinks: true,
			success: function (file, response) {
				var nm = $("#cateimg").val();
				nm = nm.split(",");
				nm.push(response.replace(/"/g, ''));
				nm = nm.filter(ele=>ele!="");
				nm.join(",");
				$("#cateimg").val(nm)
				file.previewElement.classList.add("dz-success");
			},
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			}
		});
</script>

<script>
$(document).ready(function() {
	$('#submitt').on('click', function() {
		var p_cate 		= $('#main').val();
		var cateimg 	= $('#cateimg').val();
		var catename 	= $('#catename').val();
		var stock 		= $('#stock').val();
		var des 	= $('#des').val();
		if(p_cate!="" && cateimg!="" && catename!="" && stock!="" && des!="")
		{
			$("#subm").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("Category/insertcategoryajax");?>",
				type: "POST",
				data: {
						type: 1,
						p_cate: p_cate,
						product_name: catename,
						des: des,
						stockstatus: stock,
						cateimg:cateimg
					 },
				cache: false,
				success: function(dataResult)
				{
				if(p_cate==0)
				{
				 window.location.href = "<?php echo site_url();?>/category/viewcategory/?id=0&sucess=Category Successfully Uploaded";	
				 }	
				 else
				 {
				 window.location.href = "<?php echo site_url();?>/category/viewcategory/?category="+p_cate+"&sucess=Subcategory Successfully Uploaded";	
				 }				
				}
					
			});
		}
		else{
			alert('Please fill all the field !');
			/*if(p_cate=='NULL'|| p_cate=="")
			{
				$("#errmsg").show();
				var errName = document.getElementByID("errmsg");
				errName.innerHTML += "Category Name required";
				errName.innerHTML += ".red {color:red;}";
				document.getElementByID("name").val = errName;					
								
			}*/
		}
	});
});
</script>