<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
    $("#contry").change(function () {
        var contry = $("#contry").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerystate?id="+contry,
            type: "GET",
            data: "id = "+ contry,
            dataType: "html",
            success: function(data)
            { 
             $("#state").html(data);
            }               
        });
    });
});
</script>
<script>
$(document).ready(function(){ 
    $("#state").change(function () {
        var state = $("#state").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerycity?id="+state,
            type: "GET",
            data: "id = "+ state,
            dataType: "html",
            success: function(data)
            { 
             $("#city").html(data);
            }               
        });
    });
});
</script>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Update Profile</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Profile :</h4>
						</div>
						<div class="form-body">
							<form action="<?php echo site_url()?>/Dashboard/updateprofile" method="post" enctype="multipart/form-data"> 
								<input type="hidden" name="id" value="<?php echo $userid?>">
								<div class="form-group"> 
									<label for="exampleInputEmail1">First Name</label> 
									<input type="text" class="form-control" value="<?php echo $profiledetail['first_name']?>" name="firstname" > 
									<?php if(form_error('firstname')){?>
										<div class="custom"> <?php echo strip_tags(form_error('firstname'));?></div>
										 
									<?php  };?>
								</div> 
								
								<div class="form-group"> 
									<label for="exampleInputPassword1">Last Name</label> 
									<input type="text" name="lastname" class="form-control" value="<?php echo $profiledetail['last_name']?>" required=""> 
									<?php if(form_error('lastname')){?>
										<div class="custom"> <?php echo strip_tags(form_error('lastname'));?></div>
										 
									<?php  };?>
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Email</label> 
									<input type="email" name="email" class="form-control" value="<?php echo $profiledetail['email']?>" required=""> 
									<?php if(form_error('email')){?>
										<div class="custom"> <?php echo strip_tags(form_error('email'));?></div>
										 
									<?php  };?>
								</div> 
								<div class="form-group"> 
									<label for="exampleInputPassword1">Mobile</label> 
									<input type="text" name="mobile" class="form-control" value="<?php echo $profiledetail['mobile']?>"required=""> 
									<?php if(form_error('mobile')){?>
										<div class="custom"> <?php echo strip_tags(form_error('mobile'));?></div>
										
									<?php  };?>
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Country</label> 
									<select class="form-control" id="contry" name="contry">
										<option >Select Country</option>
										<?php foreach ($contry as $cont) 
											{?>
											<option <?php if($profiledetail['country']==$cont['contryid'])
														 { echo 'selected';} ?> 
														 value="<?php echo $cont['contryid'];?>">
														 <?php echo $cont['contry']?> 
											</option>
							  			<?php } ?>
									</select> 
								</div>
							 
								<div class="form-group"> 
									<label for="exampleInputPassword1">State</label> 
									<select class="form-control" id="state" name="state">
										<option >Select State</option>
										<?php foreach ($state as $stat) 
									{?>
										<option <?php if($profiledetail['state']==$stat['stateid']){ echo 'selected';}?> value="<?php echo $stat['stateid']?>">
											<?php echo $stat['state']?> 
										</option>
							  <?php } ?>
									</select> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">City</label> 
									<select class="form-control"  id="city" name="city">
										<option >Select City</option>
										<?php foreach ($city as $cty) 
									{?>
										<option <?php if($profiledetail['city']==$cty['ctid']){ echo 'selected';}?> value="<?php echo $cty['cityname']?>">
											<?php echo $cty['cityname']?> 
										</option>
							  <?php } ?>
									</select> 
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Zip Code</label> 
									<input type="text" name="zipcode" class="form-control" value="<?php echo $profiledetail['zipcode']?>"required=""> 
									<?php if(form_error('zipcode')){?>
										<div class="custom"> <?php echo strip_tags(form_error('zipcode'));?></div>
										
									<?php  };?>
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Address</label> 
									<textarea class="form-control" rows="3"   name="address" id="des">
                        				<?php echo $profiledetail['address']?>
                        			</textarea>
									<?php if(form_error('address')){?>
										<div class="custom"> <?php echo strip_tags(form_error('address'));?></div>
											
									<?php  };?>
								</div>
								<div class="form-group col-sm-6"> 
									<label for="exampleInputFile">Upload Profile Picture</label> 
									<input type="file" id="exampleInputFile" name="dp">
									<?php if(isset($imgerror)){?>
										<div class="custom"> <?php echo strip_tags(form_error($imgerror['error']));?></div>
											
									 <?php } ?> 
									<?php // echo "<pre>"; print_r($profiledetail);exit;?>
								</div> 
								<div class="form-group col-sm-6"> 
									<img src="<?php echo base_url()?>dp/<?php echo $profiledetail['pic']?>" width="10%"></div>
								 <button type="submit" class="btn btn-default">Submit</button> </form> 
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
<script>
$(document).ready(function(){
 
 var info = $('#des').val().trim();
 $("#des").val(info);
});
</script>