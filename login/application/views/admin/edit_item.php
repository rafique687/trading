  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
  <link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<script>
$(document).ready(function(){ 
    $("#pcate").change(function () {
        var gender = $("#pcate").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerysubcate?id="+gender,
            type: "GET",
            data: "id = "+ gender,
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
					<h2 class="title1">Manage Product</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Product</h4>
							<?php if(isset($success)){?>
									<div class="alert alert-success">
  										<strong>Success!</strong> <?php echo $success?>
									</div> <?php } ?>
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>/product/inser_edititem" method="post" method="post" enctype="multipart/form-data"> 
								<input type="hidden" name="gett" value="<?php echo $editid?>">
								<div class="form-group"> 
									<label for="exampleInputEmail1">Edit Product</label> 
									<input type="text" class="form-control" id="" name="product_name" value="<?php echo $product['item_name'];?>" > 
									<?php if(form_error('product_name'))
										{?>
										<div class="custom"> <?php echo strip_tags(form_error('product_name'));?></div>
								<?php  };?>
								</div>
								<div class="form-group"> 
									<label>Select Parent Category</label>
		                        		<select class="form-control" name="p_cate" required="" id="pcate">
                         				<?php  foreach ($p_cate as $pr)
                         				 {?>
											<option <?php if($pr['prod_id']==$product['root_cate'])
                         					 { echo 'selected'; }?> value="<?php echo $pr['prod_id'];?>">
                                        		<?php echo $pr['product_name']?>
                         				    </option>
                        			<?php   } ?>
                        </select>
								</div>

								 <label>Stock Status</label>
                        				<select class="form-control" name="stockstatus" required="">
                                            <option 
                                             <?php if($product['root_cate']==1){ echo 'selecte';}?> value="1">In stock
                                            </option>
                           					<option <?php if($product['root_cate']==2){ echo 'selecte';}?> value="2">Out of Stock
                           					</option>
                        				</select>
                        				<?php if(isset($error))
										{?>
											<div class="custom"> <?php echo strip_tags(form_error($imgerror['error']));?></div>
											
								  <?php } ?>
							
								<input type="hidden" name="oldpic" value="<?php echo $product['item_pic']?>">
								<?php if(isset($error))
										{?>
												<div class="custom"> <?php echo strip_tags(form_error($imgerror['error']));?></div>
											
									 <?php } ?>
									
								<div class="row">
                    <div class="row">
                      <!-- textarea -->
                       <div class="form-group">
                        <label>Product Description</label>
                         <textarea class="form-control" rows="3" name="des" id="des">
										<?php echo $product['description']?>
									</textarea>
						<?php if(form_error('des'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('des'));?></div>
  				<?php  };?>
                          
									
                      </div>
                    </div>
                      <input type="hidden" value="" name="cateimg" id="cateimg">
                    <div class="form-group col-12">
				           
				               <div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>product/uploadfiles">

				           		</div> 

				    <div class="form-group col-12">
					
						<div class="dz-image" style="margin-top: 5px;">
							<?php $img=explode(",",$product['item_pic']);
							for($i=0;$i<count($img);$i++) 
							{
								if(!empty($img[$i]))
								{?>
							<a href="#" class="idd" id="<?php echo $img[$i];?>"><img src="<?php echo base_url()?>item/<?php echo $img[$i];?>" onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="100" height="100"></a>
							<?php }
							 } ?>
						</div>
					</div>
				           		
					          
					        </div>
                    <button type="submit" class="btn btn-default">Submit</button> 
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
$(document).ready(function(){
 
 var info = $('#des').val().trim();
 $("#des").val(info);
 

});
</script>


<script>
$(document).ready(function(){ 
$('.idd').on("click",function(){
 	var imgname =  $(this).attr("id");
	//alert(imgname);
	var cateid  = <?php echo $_GET['id']?>;
	var confirmalert = confirm("Are you sure want to delete this image?");
  if (confirmalert == true) {
	 // AJAX Request
	 $.ajax({
				url: "<?php echo base_url("product/delimage");?>",
				type: "POST",
				data: {
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