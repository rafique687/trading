<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $sitename ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel = "icon" href ="<?php echo base_url()?>settingpic/<?php echo $fivicon ; ?>"  type = "image/x-icon">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?php echo base_url()?>css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS-->
<link href="<?php echo base_url()?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- side nav css file -->
 <link href='<?php echo base_url()?>css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="<?php echo base_url()?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>js/custom.js"></script>
<link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body>
<div class="main-content">

		<?php 
			$kk=base_url()."settingpic/".$logo;

			// echo $kk ;
		?>
		<!-- <img src="<?php echo $kk; ?>" class="img-thumbnail" alt="Logo"> <?php //exit; ?> -->
		<div id="page-wrapper">
				<div class="col-sm-4 col-sm-offset-4" style="padding-left:12%;">
					
					 <img src="<?php echo $kk; ?>"  alt="Logo" width="110px" height="100px;">
				</div>
				<div style="clear: both"></div>
			<div class="main-page login-page ">
				
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="<?php echo site_url()?>dashboard/adminlogin" method="post">
							<?php if(isset($paaserror))
								{?>
									<div class="custom"> <?php echo $paaserror ;?></div>
					  	 <?php } ?>
							<input type="email" class="user" name="user" placeholder="Enter Your Email" required="" autocomplete="off" value="<?php echo set_value('user'); ?>">
							<input type="hidden" value="<?php echo $logo; ?>" name="logo">
							<?php if(form_error('user'))
							{?>
								<div class="error" style="color:red">
  									<?php echo form_error('password');?>
  								</div> 
					 <?php  };?>
							<input type="password" name="password" class="lock" placeholder="Password" required=""value="<?php echo set_value('password'); ?>">
							<?php if(form_error('password'))
							{?>
								<div class="custom"> <?php echo strip_tags(form_error('password'));?></div>
  								
					 <?php  };?>
						
							<div class="clearfix"> </div>
							<input type="submit" name="Sign In" value="Sign In">
							<div class="registration">
							
							</div>
						</form>
					</div>
				</div>
				
			</div>
		
		
	</div>
</div>
	
	<!-- side nav js -->
	<script src='<?php echo base_url()?>js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?php echo base_url()?>js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="<?php echo base_url()?>js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url()?>js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url()?>js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>