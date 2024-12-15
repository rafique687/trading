<?php include("header.php");?>
	
<?php	 
	$api_urll = "http://localhost/atrading/login/home/aboutt?id=2";
	$jsonabout= file_get_contents($api_urll);
     $about = json_decode($jsonabout, true);
     //echo "<pre>"; print_r($about);exit;
?>
<div class="about" id="moreabout" style="display: none;">
	<div class="container">
		<div class="about-head text-center ">
			<h3>About</h3>
		</div>	
		<div class="about-bottom-grid1">
			<div class="col-md-12 bottomgridtext">
				<h3><?php echo $about['about'][3]['field_name'];?></h3>
				<p><?php echo $about['about'][3]['field_value'];?> </p>
			
			</div>
			
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>
<?php include("slider.php");?>

<?php include("footer.php");?>

