<?php
     $api_url = $mydata['baseurl']."/home/event";
    
     //echo $api_url;exit;
     $jsonEvent= file_get_contents($api_url);
     $event = json_decode($jsonEvent, true);
   // echo "<pre>"; print_r($event);exit;
    //echo base_url().$mydata['basic'][0]['field_value'];exit;
     
?>
<!-- gallery -->
	<div class="gallery" id="gallery">
		<div class="container">
			<div class="w3-gallery-head">
				<h3>Gallery</h3>
			</div>
		</div>
		<div class="w3_agile_services_grids">
			<ul class="w3l_gallery_grid" id="lightGallery">
				<?php foreach ($event as $prod) 
       			 {
       			  
       			 if(!empty($prod['event_photo']))
       			 {
       			 	$pic=explode(",", $prod['event_photo']);?>
				<li data-title="<?php echo $mydata['basic'][0]['field_value'];?>" data-desc="<?php echo $mydata['basic'][0]['field_value'];?>Photo gallery." data-src="<?php echo $mydata['baseurl'];?>event/<?php echo $pic[0];?>" data-responsive-src="<?php echo $event['url'];?>event/<?php echo $pic[0];?>"> 
					
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="<?php echo $event['url'];?>event/<?php echo $pic[0];?>" alt="" class="img-responsive"  height="300"/>
								<!-- <div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i>
									</p>
								</div> -->

							</a>

						</div>
					</div>
				</li>
			<?php  }  } ?>
				<!--<li data-title="Blista" data-desc="Lorem Ipsum is simply dummy text of the printing." data-src="images/g21.jpg" data-responsive-src="images/g2.jpg"> 
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="images/g21.jpg" alt="" class="img-responsive" />
								<div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i></p>
								</div>
							</a>
						</div>
					</div>
				</li>
			 <li data-title="Blista" data-desc="Lorem Ipsum is simply dummy text of the printing." data-src="images/g3.jpg" data-responsive-src="images/g3.jpg"> 
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="images/g31.jpg" alt="" class="img-responsive" />
								<div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i></p>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li data-title="Blista" data-desc="Lorem Ipsum is simply dummy text of the printing." data-src="images/g4.jpg" data-responsive-src="images/g4.jpg"> 
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="images/g41.jpg" alt="" class="img-responsive" />
								<div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i></p>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li data-title="Blista" data-desc="Lorem Ipsum is simply dummy text of the printing." data-src="images/g5.jpg" data-responsive-src="images/g5.jpg"> 
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="images/g51.jpg" alt="" class="img-responsive" />
								<div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i></p>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li data-title="Blista" data-desc="Lorem Ipsum is simply dummy text of the printing." data-src="images/g6.jpg" data-responsive-src="images/g6.jpg"> 
					<div class="w3_gallery_grid">
						<div class="hovereffect">
							<a href="#">
								<img src="images/g61.jpg" alt="" class="img-responsive" />
								<div class="overlay">
									<p><i class="fa fa-eye" aria-hidden="true"></i></p>
								</div>
							</a>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
	</div>

<!-- //gallery -->