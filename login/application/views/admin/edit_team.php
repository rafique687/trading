<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Add Team</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							
							<h4>Add Team</h4>
						
						</div>
						<div class="form-body">
						
					<form action="<?php echo site_url()?>team/add_team" method="post">
					<input type="hidden" name="gett" value="<?php echo $editid?>">
					<div class="form-group"> 
						<label for="exampleInputEmail1">Name</label> 
						<input type="text" class="form-control" id="catename" name="name" required="" value="<?php echo $team['name'];?>" > 
						<?php if(form_error('name'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('name'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Designation</label> 
						<input type="text" class="form-control" id="degi" name="work"  required=""  value="<?php echo $team['designation']; ?>"> 
						<?php if(form_error('work'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('work'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Facebook Url</label> 
						<input type="text" class="form-control" id="degi" name="fb" required=""  value="<?php echo $team['facebook']; ?>"> 
						<?php if(form_error('fb'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('fb'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Twitter</label> 
						<input type="text" class="form-control" id="degi" name="tw" required=""  value="<?php echo $team['twitter']; ?>"> 
						<?php if(form_error('tw'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('tw'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Instagram</label> 
						<input type="text" class="form-control" id="degi" name="ig" required=""  value="<?php echo $team['instagram']; ?>"> 
						<?php if(form_error('ig'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('ig'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">Linke In</label> 
						<input type="text" class="form-control" id="degi" name="in" required=""  value="<?php echo $team['linkedin']; ?>"> 
						<?php if(form_error('in'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('ig'));?></div> 
			 	 <?php  };?>
					</div> 
					<div class="form-group">
						<label>Status</label>
							<select class="form-control" name="stockstatus" required="" id="stock">
								<option <?php if($team['status']==1){ echo 'selectd';}?>value="1">Active</option>
								<option <?php if($team['status']==2){ echo 'selectd';}?> value="2">Inactive</option>
							</select>
					</div>
					
					<div class="form-group col-12">
					<div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>Team/uploadfiles">
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