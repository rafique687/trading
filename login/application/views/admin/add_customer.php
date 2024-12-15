<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
    $("#contry").change(function () {
        var contry = $("#contry").val();
        //alert(contry);
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
					<h4>Add Customer :</h4>
				</div>
				<div class="form-body">
					<form action="<?php echo site_url()?>/customer/insercustomer" method="post" enctype="multipart/form-data"> 
					<div class="form-group"> 
						<label for="exampleInputEmail1">First Name</label> 
						<input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required="" value="<?php echo set_value('firstname'); ?>"> 
						<?php if(form_error('firstname')){?>
								<div class="custom"> <?php echo strip_tags(form_error('firstname'));?></div>  
						<?php  };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputPassword1">Last Name</label> 
						<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required="" value="<?php echo set_value('lastname'); ?>" > 
								<?php if(form_error('lastname'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('lastname'));?></div> 
						<?php   };?>
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Date Of Birth</label> 
						<input type="date" name="dob" class="form-control" required=""  value="<?php echo set_value('dob'); ?>" > 
							<?php if(form_error('lastname'))
							{?>
								<div class="custom"> <?php echo strip_tags(form_error('dob'));?></div> 
					<?php   };?>
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Email</label> 
						<input type="email" name="email" class="form-control" placeholder="Enter Email" required="" value="<?php echo set_value('email'); ?>"> 
							<?php if(form_error('email'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('email'));?></div> 
						<?php   };?>
					</div> 
					<div class="form-group"> 
						<label for="exampleInputPassword1">Mobile</label> 
						<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required="" value="<?php echo set_value('mobile'); ?>"> 
						<?php if(form_error('mobile'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('mobile'));?></div> 
				 <?php  };?>
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Mobile2(Optional)</label> 
						<input type="text" name="mobilealt" class="form-control" placeholder="Enter Alternative" value="<?php echo set_value('mobilealt'); ?>" > 
						<?php if(form_error('mobile')){?>
							<div class="custom"> <?php echo strip_tags(form_error('mobile'));?></div> 
						<?php  };?>
					</div>

					<div class="form-group"> 
						<label for="exampleInputPassword1">Country(Optional)</label> 
					
						<select class="form-control" id="contry" name="contry">

							<option >Select Country</option>
							<?php foreach ($contry as $cont) 
								{?>
									<option <?php if($cont['contryid']==set_value('contry'))
										{ echo "selected" ;} ?> value="<?php echo $cont['contryid'];?>" >
													<?php echo $cont['contry']?> 
									</option>
						  <?php } ?>
						</select> 
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">State(Optional)</label> 
						<select class="form-control" id="state" name="state">
							<?php //echo "<pre>"; print_r($state);?>
							<option >Select State</option>
							<?php 
							if(isset($state))
							{
								foreach($state as $stat)
								{?>
									<option <?php if($stat['stateid']==set_value('state')){ echo 'selected';}?> value="<?php echo  $stat['stateid']?>">
										<?php echo  $stat['state']; ?>
											
										</option>
							<?php } 

					 } ?>
						</select> 
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">City</label> 
						<select class="form-control"  id="city" name="city">
							<option >Select City</option>

						<?php	if(isset($city))
							{
								foreach($city as $cty)
								{?>
									<option <?php if($cty['ctid']==set_value('city')){ echo 'selected';}?> value="<?php echo  $cty['ctid']?>">
										<?php echo  $cty['cityname']; ?>
											
										</option>
							<?php } 

					 } ?>
						</select> 
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Zipcode</label> 
						<input type="text" name="zipcode" class="form-control" placeholder="Enter zipcode" required="" value="<?php echo set_value('city'); ?>"> 
						<?php if(form_error('zipcode'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('city'));?></div> 
				 <?php  };?> 
					</div>
					<div class="form-group"> 
						<label for="exampleInputPassword1">Address</label> 
						<textarea class="form-control" rows="3"   name="address" value="<?php echo set_value('address'); ?>">
						</textarea>
						<?php if(form_error('address'))
						{?>
							<div class="custom"> <?php echo strip_tags(form_error('address'));?></div> 
				 <?php  };?>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</div> 
					 </form> 
				</div>
		</div>
	</div>
	</div>
</div>
		