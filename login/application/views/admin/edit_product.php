<link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Manage Category</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Category</h4>
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>/category/edit_insert" method="post" enctype="multipart/form-data"> 
								<input type="hidden" name="gett" value="<?php echo $editid?>" id="idd">
								<?php if(isset($_GET['category']))
								{?>
								<input type="hidden" name="category" value="<?php echo $_GET['category']?>">
						 <?php  } ?>
								<div class="form-group"> 
									<label for="exampleInputEmail1">Category Name</label> 
									<input type="text" class="form-control" name="product_name" value="<?php echo $product['product_name']?>"> 
									<?php if(form_error('product_name'))
										  {?>
										   <div class="custom"> <?php echo strip_tags(form_error('product_name'));?></div>
											
									<?php  };?>
								</div> 
								 
								 <label>Status</label>
                        				<select class="form-control" name="stockstatus" required="">
                                        	<option <?php if($product['status']==1)?>value="1">Active</option>
                           					<option <?php if($product['status']==2)?>value="2">Inactive</option>
                           					
                        				</select>
                        				<input type="hidden" name="oldpic" value="<?php echo $product['product_pic']?>">
							
								<div class="form-group"> 
									<label for="exampleInputPassword1">Description</label> 
									<textarea class="form-control"  name="des" id="des">
										<?php echo $product['description']?>
									</textarea>
									<?php if(form_error('des'))
										{?>
											 <div class="custom"> <?php echo strip_tags(form_error('des'));?></div>
										<?php  };?>
									
									
								</div>
								 <div class="form-group col-12">
				           
				               <div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>category/uploadfiles">

				           		</div> 
				           		<input type="hidden" value="" name="cateimg" id="cateimg">

				    <div class="form-group col-12">
						<div class="dz-image" style="margin-top: 5px;">
							<?php $img=explode(",",$product['product_pic']);
							for($i=0;$i<count($img);$i++) 
							{
								if(!empty($img[$i]))
								{?>
							<a href="#" class="idd" id="<?php echo $img[$i];?>"><img src="<?php echo base_url()?>products/<?php echo $img[$i];?>" onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="100" height="100"></a>
							<?php }
							 } ?>
						</div>
					</div>
					          
					        </div>
								
								
								<button type="submit" class="btn btn-default">Submit</button> 
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
$(document).ready(function(){
 
	var info = $('#des').val().trim();
	$("#des").val(info);
	

});
</script>



<script>
$(document).ready(function(){ 
$('.idd').on("click",function(){
 	var imgname =  $(this).attr("id");
	var cateid  = $("#idd").val();
	
  	 var confirmalert = confirm("Are you sure want to delete this image?");
  if (confirmalert == true) {
	 // AJAX Request
	 $.ajax({
				url: "<?php echo base_url("Category/delimage");?>",
				type: "POST",
				data: {
						type: 1,
						cateid: cateid,
						imgnam: imgname,
					},
				cache: false,
				success: function(dataResult)
				{
					location.reload();				
				}
	 });
  }

});

});
</script>