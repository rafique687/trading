<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){ 
  $("#kk").click(function(){
    $("#prosetting").show();
     $("#upp").show();
    $("#kk").hide();
  });
  $("#upp").click(function(){
    $("#prosetting").hide();
     $("#upp").hide();
    $("#kk").show();
  });
});
</script>
<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<!-- <button id="showLeftPush"><i class="fa fa-bars"></i></button> -->
				<!--toggle button end-->
				<?php //print_r($_GET);exit;?>
				<?php if(isset($_GET['profile']))
				{?>
						<div class="alert alert-success">
  										<strong> <?php echo $_GET['profile'];?></strong> 
									</div>
				<?php }
				?>

			<?php if(isset($_GET['Profile']))
				{?>
						<div class="alert alert-success">
  										<strong>  <?php echo $_GET['Profile'];?></strong> 
									</div>
				<?php }
				?>
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
			
				
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> -->
								<a href="#">
								<div class="profile_img">	
									<span class="prfil-img">
										<img src="<?php echo base_url()?>/dp/<?php echo $sessiontrue=$this->session->userdata('dp');?>" alt="" style="width:50px !important; height: 50px !important;"> </span> 
									<div class="user-name" style="margin-top: 20px !important;">
										<p><?php echo $sessiontrue=$this->session->userdata('name');?>
											
										</p>

										
									</div>
									<div class="col-sm-1 pull-right" style="margin-top: 15px;">
										<i class="fa fa-angle-down lnr" id="kk"></i>
									    <i class="fa fa-angle-up lnr" id="upp"></i>	
									</div>
									
									<div class="clearfix"></div>	
								</div>

							</a>
							<ul class="dropdown-menu drp-mnu" style="display: none; width: 100px !important;" id="prosetting">
								<li> <a href="<?php echo site_url()?>/dashboard/setting?sectionid=1"><i class="fa fa-cog"></i> Settings</a> </li> 
								<!-- <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>  -->
								<li> <a href="<?php echo site_url()?>/dashboard/edit_profile"><i class="fa fa-suitcase"></i> Edit Profile</a> </li>
								<li> <a href="<?php echo site_url()?>/dashboard/changepassword"><i class="fa fa-lock"></i> Change Password</a> </li>  
								<li> <a href="<?php echo site_url()?>/dashboard/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->