<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $this->session->userdata('Site_name'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel = "icon" href ="<?php echo base_url()?>settingpic/<?php echo $sessiontrue=$this->session->userdata('fivicon');?>"  type = "image/x-icon">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?php echo base_url()?>css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="<?php echo base_url()?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='<?php echo base_url()?>css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="<?php echo base_url()?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="<?php echo base_url()?>js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="<?php echo base_url()?>js/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>js/custom.js"></script>
<link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="<?php echo base_url()?>js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
					<link href="<?php echo base_url()?>css/owl.carousel.css" rel="stylesheet">
					<script src="<?php echo base_url()?>js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          <h1>
            <a class="navbar-brand" href="<?php echo base_url()?>dashboard/mydashboar">
              <span>

            </span>
             <!--  <?php echo $sessiontrue=$this->session->userdata('Site_name');?> -->
              <img src="<?php echo base_url().'settingpic/'.$sessiontrue=$this->session->userdata('logo');?>" style="width: 50%; height: 110%;"/></span>
              <span class="dashboard_text"></span>
            </a>
          </h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="<?php echo site_url()?>dashboard/mydashboar"">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			        <li class="treeview">
                <a href="<?php echo site_url()?>/category/viewcategory/?id=0">
                <i class="fa fa-sitemap"></i>
                <span>Manage Category</span>
                </a>
               
              </li>
              <li class="treeview">
                <a href="<?php echo site_url()?>/product/view_product">
                <i class="glyphicon glyphicon-th-list"></i>
                <span>Manage Product</span>
              
                </a>
              </li>
               <li class="treeview">
                <a href="<?php echo site_url()?>/Services/view_services">
                <i class="glyphicon glyphicon-th-list"></i>
                <span>Manage Services</span>
              
                </a>
              </li>
              <li class="treeview">
                <a href="<?php echo site_url()?>/team/index">
                <i class="fa fa-sitemap"></i>
                <span>Manage Team</span>
                </a>

                </li>
                 <li class="treeview">
                <a href="<?php echo site_url()?>/Client/index">
                <i class="fa fa-sitemap"></i>
                <span>Manage Client</span>
                </a>

                </li>
               <li class="treeview">
                <a href="<?php echo site_url()?>/Customer">
                <i class="fa fa-users"></i>
                <span>Manage Customer</span>
               </a>
              </li>
              <li class="treeview">
                <a href="<?php echo site_url()?>/MessageApi?text=1">
                  <i class="glyphicon glyphicon-envelope"></i>
                <span>Manage Message</span>
                </a>
              </li>
             
           
               <li class="treeview">
                <a href="<?php echo site_url()?>/Event/view_event/">
                  <i class="fa fa-calendar"></i>
                <span>Manage Event And Media</span>
                </a>
              </li>
              <li class="treeview">
                <a href="<?php echo site_url()?>/Enquery/">
                  <i class="fa fa-user"></i>
                <span>Manage Enquery</span>
                </a>
              </li>
              <li class="treeview">
                <a href="<?php echo site_url()?>/Enquery/replyedlist">
                  <i class="fa fa-user"></i>
                <span>Replyed Enquery</span>
                </a>
              </li>
             
               <li class="treeview">
                <a href="#">
                <i class="fa fa-cog"></i>
                <span>Manage Section</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=1">
                    <i class="fa fa-angle-right"></i>Basic
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=2">
                    <i class="fa fa-angle-right"></i>About
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=3">
                    <i class="fa fa-angle-right"></i>Terms
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=4">
                    <i class="fa fa-angle-right"></i>privacy
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=5">
                    <i class="fa fa-angle-right"></i>Services
                    </a>
                    <li>
                    <a href="<?php echo site_url()?>/dashboard/setting?sectionid=6">
                    <i class="fa fa-angle-right"></i>Social Media
                    </a>
                  </li>
                  </li>
                  </li>
           
                
                   <li><a href="<?php echo site_url()?>/Section/view_banner"><i class="fa fa-angle-right"></i>Banner</a></li>
                </ul>
              </li>
            
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->