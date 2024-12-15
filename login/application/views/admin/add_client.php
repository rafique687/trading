<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Add Client</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							
							<h4>Add Client</h4>
						
						</div>
						<div class="form-body">
						
				<form action="<?php echo site_url()?>Client/add_client" method="post">
					
					<div class="form-group"> 
						<label for="exampleInputEmail1">Client Name</label> 
						<input type="text" class="form-control" id="catename" name="name" placeholder="Enter Name" required=""  value="<?php echo set_value('name'); ?>"> 
						<?php if(form_error('name'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('name'));?></div> 
			 	 <?php  };?>
					</div> 
				 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Company Url</label> 
						<input type="text" class="form-control" id="degi" name="url" placeholder="Company Url" required=""  value="<?php echo set_value('url'); ?>"> 
						<?php if(form_error('url'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('url'));?></div> 
			 	 <?php  };?>
					</div> 
				  
					<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="stockstatus" required="" id="stock">
						<option <?php if(set_value('stockstatus')==1){ echo "selected";}?> value="1">Active</option>
                        <option <?php if(set_value('stockstatus')==2){ echo "selected";}?>  value="2">Inactive</option>
					</select>
					</div>
					
					<div class="form-group col-12">
					<div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>Client/uploadfiles">
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