<!-- about -->

<?php	 
	$api_urll = $mydata['baseurl']."home/aboutt?id=2";
	$jsonabout= file_get_contents($api_urll);
     $about = json_decode($jsonabout, true);
     //echo "<pre>"; print_r($about);exit;
?>
<div class="about" id="about">
	<div class="container">
		<div class="about-head text-center ">
			<h3>About</h3>
		</div>	
		<div class="about-bottom-grid1">
			<div class="col-md-6 bottomgridtext">
				<h3><?php echo $about['about'][2]['field_name'];?></h3>
				<p><?php echo $about['about'][2]['field_value'];?> </p>
				<div class="readmore-w3">
					<a href="moreabout.php" target="_blank" id="more">Read More</a>
				</div>
				
			</div>
			<div class="col-md-6 bottomgridimg">
				<img src="<?php echo $mydata['baseurl'].'banner/'.$about['aboutpic'][0]['bannerpic']?>" alt="" height="390">
			</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>


