<?php
     $api_url = "http://localhost/atrading/login/home/basic";
     //echo $api_url;exit;
     $json= file_get_contents($api_url);
     $mydata = json_decode($json, true);
   	 //echo "<pre>"; print_r($mydata);exit
    //echo base_url().$mydata['basic'][0]['field_value'];exit;
     
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title><?php echo $mydata['basic'][0]['field_value'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Blista a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link rel="icon" href="<?php echo $mydata['baseurl'];?>settingpic/<?php echo $mydata['basic'][4]['field_value'];?>" type="image/x-icon">


	<!-- gallery -->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery -->

<!-- //Default-JavaScript-File -->
<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons-css-file -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">	<!-- bootstrap-css-file -->
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">	<!-- style-css-file -->

</head>
<!-- Head -->

		<!-- Scrolling Nav JavaScript --> 
    <script src="js/scrolling-nav.js"></script>  
<!-- //fixed-scroll-nav-js --> 

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- banner -->
	<div id="home" class="w3ls-banner"> 
		<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top"> 
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only"><?php echo $mydata['basic'][0]['field_value'];?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1>
							<a class="navbar-brand" href="index.php">
								<img src="<?php echo $mydata['baseurl'];?>settingpic/<?php echo $mydata['basic'][3]['field_value'];?>" style="width: 12%; height: 25	0%">
					</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right cl-effect-15">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="page-scroll scroll" href="#home">Home</a></li>
							<li><a class="page-scroll scroll" href="#about">About</a></li>
							<li><a class="page-scroll scroll" href="#services">Services</a></li>
							<li><a class="page-scroll scroll" href="#team">Team</a></li>
							<li><a class="page-scroll scroll" href="#gallery">Gallery</a></li>
							<li><a class="page-scroll scroll" href="#contact">Contact</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
	
		<!-- //header -->
	