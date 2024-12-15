<?php //echo "<pre>"; print_r($profiledetail);?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">Update Profile</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form action="#" method="post">
					<div class="sign-u">
							<input type="text" name="firstname" value="<?php echo $profiledetail['first_name']?>">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" value="<?php echo $profiledetail['last_name']?>" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="email" value="<?php echo $profiledetail['email']?>"required="">
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
								<input type="text" value="<?php echo $profiledetail['mobile']?>"required="">
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
						<label class="control-label">Select Country</label>
								<select class="form-control1">
								
									<option >Select Contry</option>
									<?php foreach ($contry as $cont) 
									{?>
										<option <?php if($profiledetail['country']==$cont['contryid'])
														 { echo 'selected';} ?> 
														 value="<?php echo $cont['contryid'];?>">
														 <?php echo $cont['contry']?> 
										</option>
							  <?php } ?>
							</select>
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
						<label>Select State</label>
								<select class="form-control1">
									<option >Select State</option>
									<?php foreach ($state as $stat) 
									{?>
										<option <?php if($profiledetail['state']==$stat['stateid']){ echo 'selected';}?> value="<?php echo $stat['stateid']?>">
											<?php echo $stat['state']?> 
										</option>
							  <?php } ?>
									
								</select>
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
						<label>Select City</label>
								<select class="form-control1">
									<option >1</option>
									<option >2</option>
								</select>
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
						<input type="text" name="zipcode" value="<?php echo $profiledetail['zipcode']?>" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="form-group">
						<label>Address</label> 
									<textarea class="form-control" rows="3" placeholder="Enter Description..."  name="des" required id="des">

									</textarea>
						<div class="clearfix"> </div>
					</div>
				

					
					
					
					<h6>Login Information :</h6>
					<div class="sign-u">
								<input type="password" placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" placeholder="Confirm Password" required="">
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
						<a class="" href="login.html">
							Login
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
</script>">
<script>
$(document).ready(function(){
 
 var info = $('#des').val().trim();
 $("#des").val(info);
});
</script>
		