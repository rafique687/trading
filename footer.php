<!-- footer -->

<!-- <div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3>
					<a class="navbar-brand" href="index.php">
								<img src="<?php echo $mydata['baseurl'];?>settingpic/<?php echo $mydata['basic'][3]['field_value'];?>"  style="width: 10%; height:300%">
					</a>
				</h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a class="scroll" href="#home">Home </a></li>
					<li><a class="scroll" href="#about">About</a></li>
					<li><a class="scroll" href="#services">Services</a></li>
					<li><a class="scroll" href="#gallery">Gallery</a></li>
					<li><a class="scroll" href="#team">Team</a></li>
					<li><a class="scroll" href="#contact">Contact</a></li>
				 </ul>
			</div>
			<div class="clearfix"></div>
	</div>
</div> -->
<div class="copy-right wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
			<p> &copy; 2020 <?php echo $mydata['basic'][0]['field_value'];?> . All Rights Reserved | Design by  <a href="http://Adiyogitechnosoft.com/">Adiyogi Technosoft</a></p>
			<p style="margin-left: 30%">
			<?php if(!empty($mydata['basic'][5]['field_value']))
        	{?>
        		<a href="<?php echo $mydata['basic'][5]['field_value']?>" class="facebook">
				<i class="fa fa-facebook"></i>
				</a>
	  <?php } ?>
	  <?php if(!empty($mydata['basic'][6]['field_value']))
        {?>
        	<a href="<?php echo $mydata['basic'][6]['field_value'];?>" class="instagram">
				<i class="fa fa-instagram"></i>
			</a>
  <?php } ?>
   <?php if(!empty($mydata['basic'][7]['field_value']))
        {?>
        	<a href="<?php echo $mydata['basic'][7]['field_value'];?>" class="linkedin">
				<i class="fa fa-linkedin"></i>
			</a>
  <?php } ?>
  <?php if(!empty($mydata['basic'][8]['field_value']))
        	{?>
        		 <a href="<?php echo $mydata['basic'][8]['field_value']?>" class="twitter">
				<i class="fa fa-twitter"></i>
				</a>
	  <?php } ?>
	  <?php if(!empty($mydata['basic'][8]['field_value']))
        {?>
        	<a href="<?php echo $mydata['basic'][8]['field_value'];?>" class="google-plus">
	  		<i class="fa fa-google-plus"></i>
	  		</a>
<?php   } ?>
			</p>

	</div>

	<?php echo $mydata['basic'][12]['field_value'];?>
</div>
<!-- //footer -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--banner Slider starts Here-->
		<script src="js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
	<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});
		});
    </script>
<!-- //gallery -->
<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#more").click(function(event){	 
			$("#moreabout").show();
		});
	});
</script> 


<!-- Head -->

     
</body>
</html>