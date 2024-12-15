<!DOCTYPE html>
<html lang="en">
  <head>
    <title>iFiFresh | i fresh Jodhpur | Contact iFresh Jodhpur</title>
    <meta name="description" content="Food shopping online is now easy as every product on your monthly shopping list, is now available online at i Fresh app. Contact us at +91-80-1098-1098
email : info@ifresh.co.in" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<?php include("header.php");?>
<?php include("navbar.php");?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-----***************************************************************************************-->
    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <!--<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="icon icon-map-marker"></span>
              </div>-->
              <div class="media-body">
                <h3 class="heading">Address</h3>
                <span>Ifresh,Plot No.180 Ground Floor, Maan ji ka Hatha Paota, Jodhpur</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <!--<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="icon icon-phone"></span>
              </div>-->
              <div class="media-body">
                <h3 class="heading">Phone No.</h3>
                <span>80-1098-1098</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <!--<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="icon icon-envelope"></span>
              </div>-->
              <div class="media-body">
                <h3 class="heading">Email</h3>
                <span> info@ifresh.co.in</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
             
              <div class="media-body">
                <h3 class="heading">Website</h3>
                <span>ifresh.co.in</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
    <!----------**********************************************************************************-->

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
            <!--<div id="map" class="bg-white"></div>-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d447.10972944114667!2d73.04056271356889!3d26.29806006590092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418d1d3d127d99%3A0xe3e054b04c6f2cbc!2siFresh!5e0!3m2!1sen!2sin!4v1597921594025!5m2!1sen!2sin" width="600" height="553" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </section>
<?php include("footer.php");?>
<?php if(isset($_POST))
{
@$to = "info@ifresh.co.in";
@$subject = $_POST['subject'];
@$from=$_POST["email"];
@$msg=$_POST["message"];
@$headers = "From: $from";

mail($to,$subject,$msg,$headers);
echo "<script> window.location='index.php'<script>";
}

?>
