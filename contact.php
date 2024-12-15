<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3l-services-heading">
				<h3>Contact Us</h3>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-5 address">
					<h4>Contact Info</h4>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Visit Us</h5>
							<p><?php echo $mydata['basic'][10]['field_value'];?> </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:<?php echo $mydata['basic'][2]['field_value'];?>"> <?php echo $mydata['basic'][2]['field_value'];?></a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Call Us</h5>
							<p>+91 <?php echo $mydata['basic'][1]['field_value'];?></p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-7 contact-form">
					<form action="<?php echo $mydata['baseurl'].'home/inquery';?>" method="post">
						<input type="text" name="name" placeholder="First Name" required="">

						<input class="email" name="lastname" type="text" placeholder="Last Name" required="">
						<input type="text" name="subject" placeholder="Subject" required="">
						<input class="email" name="email" type="text" placeholder="Email" required="">
						<textarea name="message" placeholder="Message" required=""></textarea>
						<input type="submit" value="SUBMIT">
					</form>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- map -->
	 <div class="agileits-w3layouts-map">
		<iframe src="<?php echo $mydata['basic'][11]['field_value'];?>" class="map" allowfullscreen=""></iframe>
	</div> 
	<!-- //map -->