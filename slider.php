	<!--banner-->
	<div class="w3l_banner_info">
				<div class=" slider">
					<div class="callbacks_container">
			<!--Slider-->
		<?php	 
			$api_banner = $mydata['baseurl']."home/banner";
    		$jsonbanner= file_get_contents($api_banner);
    		$banner = json_decode($jsonbanner, true);
    		//echo "<pre>";print_r($banner);?>
    		
				<ul class="rslides" id="slider3">
				<?php foreach ($banner as  $baner) {?>
					<li>
						<div class="slider_banner_info">
							 <h4><?php echo $baner['title']?></h4>
							<p>Experience the highest level of business assistance We provide top consulting services since 2007 Experience the highest level of business assistance.</p>
						</div>

					</li>
					<?php  }?>
				</ul>
				
					</div>
				</div>
				<div class="clearfix"></div>
			<!--//Slider-->
			
			</div>
	
		<!--//banner-->
		
	</div>	
	<!-- //banner --> 

	<!--Slider-->
