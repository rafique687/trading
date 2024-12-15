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
					<h2 class="title1">Manage Customer</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Customer :</h4>
						</div>
						<div class="form-body">
							<form action="<?php echo site_url()?>/customer/updatecustomer" method="post" enctype="multipart/form-data"> 
							<input type="hidden" value="<?php echo $_GET['id']?>" name="cust_id">
							<div class="form-group"> 
								<label for="exampleInputEmail1">First Name</label> 
								<input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required="" value="<?php echo $customer['first_name']; ?>"> 
								<?php if(form_error('firstname')){?>
									<div class="custom"> <?php echo strip_tags(form_error('firstname'));?></div> 
								<?php  };?>
							</div> 
								
							<div class="form-group"> 
								<label for="exampleInputPassword1">Last Name</label> 
								<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required="" value="<?php echo $customer['last_name']; ?>" > 
								<?php if(form_error('lastname'))
								{?>
									<div class="error" style="color:red"><?php echo form_error('lastname');?></div> 
						 <?php  };?>
							</div>
							<div class="form-group"> 
								<label for="exampleInputPassword1">Date Of Birth</label> 
								<input type="date" name="dob" class="form-control" required="" value="<?php echo $customer['dob']; ?>" > 
								<?php if(form_error('dob'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('dob'));?></div>
									 
						 <?php  };?>
							</div>
							<div class="form-group"> 
								<label for="exampleInputPassword1">Email</label> 
								<input type="email" name="email" class="form-control" placeholder="Enter Email" required="" value="<?php echo $customer['email']; ?>"> 
								<?php if(form_error('email')){?>
									<div class="custom"> <?php echo strip_tags(form_error('email'));?></div> 
								<?php  };?>
							</div> 
								<div class="form-group"> 
									<label for="exampleInputPassword1">Mobile</label> 
									<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required="" value="<?php echo $customer['mobile']; ?>"> 
									<?php if(form_error('mobile')){?>
										<div class="custom"> <?php echo strip_tags(form_error('mobile'));?></div> 
									<?php  };?>
								</div>
								<div class="form-group"> 
									<label for="exampleInputPassword1">Mobile2(Optional)</label> 
									<input type="text" name="mobilealt" class="form-control" placeholder="Enter Alternative" value="<?php echo $customer['mobilealt']; ?>" > 
									<?php if(form_error('mobilealt')){?>
										<div class="custom"> <?php echo strip_tags(form_error('mobilealt'));?></div> 
									<?php  };?>
								</div>

							<div class="form-group"> 
								<?php // echo $customer['countryid'];exit; ?>
								<label for="exampleInputPassword1">Contry(Optional)</label> 
								<select class="form-control" id="contry" name="contry">
									<option >Select Country</option>
									<?php 
									 foreach ($contry as $cont) 
										{?>
											 <option <?php if($customer['countryid']==$cont['contryid'])
														 { echo 'selected';} ?> 
														 value="<?php echo $cont['contryid'];?>" value="<?php echo set_value('contry'); ?>">
														 <?php echo $cont['contry']?> 
											</option> 
						  		 <?php } ?>
								</select> 
							</div>
							 
							<div class="form-group"> 
								<label for="exampleInputPassword1">State(Optional)</label> 
								<select class="form-control" id="state" name="state">
									<option >Select State</option>
									<?php foreach ($state as $stat) 
								{?>
									<option <?php if($customer['stateid']==$stat['stateid']){ echo 'selected';}?> value="<?php echo $stat['stateid']?>" value="<?php echo set_value('state'); ?>">
										<?php echo $stat['state']?> 
									</option>
						  <?php } ?>
								</select> 
							</div>
							<div class="form-group"> 
								<label for="exampleInputPassword1">City(Optional)</label> 
								<select class="form-control" id="city" name="city">
									<option >Select City</option>
									<?php foreach ($city as $ct) 
								{?>
									<option <?php if($customer['city']==$ct['ctid']){ echo 'selected';}?> value="<?php echo $ct['ctid']?>" value="<?php echo set_value('cityname'); ?>">
										<?php echo $ct['cityname']?> 
									</option>
						  <?php } ?>
								</select> 
							</div>
							
							<div class="form-group"> 
								<label for="exampleInputPassword1">Zip Code(Optional)</label> 
								<input type="text" name="zipcode" class="form-control" placeholder="Enter Zipcode" required="" value="<?php echo $customer['zipcode']; ?>"> 
								<?php if(form_error('zipcode')){?>
									<div class="custom"> <?php echo strip_tags(form_error('zipcode'));?></div>
								<?php  };?>
							</div>
							<div class="form-group"> 
								<label for="exampleInputPassword1">Address</label> 
								<textarea class="form-control" rows="3"   name="address" id="des">
									<?php echo $customer['address']; ?>
                    			</textarea>
                    			<?php if(form_error('address')){?>
									<div class="custom"> <?php echo strip_tags(form_error('address'));?></div> 
								<?php  };?>
							</div>
							
							</div> 
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