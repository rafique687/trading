
	<!-- team -->
	<div class="team jarallax" id="team">
		<div class="team-dot">
			<div class="container">
				<div class="wthree-heading about-heading">
					<h3> Team</h3>

				</div>
				<div class="agile-team-grids">
		<?php
         $api_tm = $mydata['baseurl']."home/team";
         $jsontm= file_get_contents($api_tm);
         $tm = json_decode($jsontm, true);
         //echo "<pre>"; print_r($Services);exit;
         foreach ($tm as $team) {?>
					<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="<?php echo $mydata['baseurl'].'team/'.$team['dp'];?>" alt="" />
								</div>
								<div class="back">
									<h4><?php echo $team['name'];?></h4>
									<p><?php echo $team['designation'];?></p>
									<div class="w3l-social">
										<ul>
											<?php if(!empty($team['facebook'])){?>
											<li><a href="<?php echo $team['facebook']?>"><i class="fa fa-facebook"></i></a></li>
										<?php } ?>
										<?php if(!empty($team['twitter'])){?>
											<li><a href="<?php echo $team['twitter'];?>"><i class="fa fa-twitter"></i></a></li>
										<?php  }?>
										<?php if(!empty($team['instagram'])){?>
											<li><a href="<?php echo $team['instagram'];?>"><i class="fa fa-instagram"></i></a></li>
										<?php } ?>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
					<?php } ?>
				<!-- 	<div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/tm2.jpg" alt="" />
								</div>
								<div class="back">
									<h4>Steven Wilson</h4>
									<p>guider</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/tm3.jpg" alt="" />
								</div>
								<div class="back">
									<h4>Johan Botha</h4>
									<p>Business man</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="col-sm-3 team-grid">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<img src="images/tm4.jpg" alt="" />
								</div>
								<div class="back">
									<h4>Mary Jane</h4>
									<p>Analist</p>
									<div class="w3l-social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<!-- //team -->