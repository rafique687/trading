
<!-- services -->
	<div id="services" class="services">
	<div class="container">
	<div class="w3-services-head">
		<h3>services</h3>
		</div>
			<!-- banner-bottom -->
	<div class="banner-bottom">
		<?php
		     $api_url = $mydata['baseurl']."home/services";
		     $jsonServices= file_get_contents($api_url);
		     $Services = json_decode($jsonServices, true);
	     	 //echo "<pre>"; print_r($Services);exit;
	    foreach ($Services as  $service) 
		{?>
			<?php  $pic=explode(",", $service['service_pic']);?>
		 <div class="col-md-4 agileits_banner_bottom_left" style="background:url(<?php echo $mydata['baseurl'].'/item/'.$pic[0]?>);"> 
      
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class=" wthree_banner_bottom_grid_left">
						 <div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
								 <i class="<?php echo $service['icon']?>" aria-hidden="true"></i>
						</div>
					</div>
					<div class=" wthree_banner_bottom_grid_right">	
						<h4><?php echo $service['sevices_name']?></h4>
						<p><?php 
							echo $str = substr($service['service_des'], 0, 60) ?>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
  <?php } ?>
		<!-- <div class="col-md-4 agileits_banner_bottom_left1">
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class=" wthree_banner_bottom_grid_left">
						<div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
							<i class="fa fa-users" aria-hidden="true"></i>
						</div>
					</div>
					<div class=" wthree_banner_bottom_grid_right">	
						<h4>24/7 sloution</h4>
						<p>Morbi viverra lacus commodo felis semper, eu iaculis lectus feugiat.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div> -->
		<!-- <div class="col-md-4 agileits_banner_bottom_left2">
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class=" wthree_banner_bottom_grid_left">
						<div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
							<i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
					</div>
					<div class=" wthree_banner_bottom_grid_right">	
						<h4>online business</h4>
						<p>Morbi viverra lacus commodo felis semper, eu iaculis lectus feugiat.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div> -->
		<div class="clearfix"> </div>
	</div>

	
<!-- //banner-bottom -->
	</div>
</div>