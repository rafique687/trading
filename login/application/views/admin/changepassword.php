  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
    $("#pcate").change(function () {
        var gender = $("#pcate").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerysubcate?id="+gender,
            type: "GET",
            data: "id = "+ gender,
            dataType: "html",
            success: function(data)
            { 
             $("#subcate").html(data);
            }               
        });
    });
});
</script>
<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Profile</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Change Password</h4>
							
						</div>
						<div class="form-body">
							<form  action="<?php echo site_url()?>/dashboard/updatepassword" method="post" method="post" enctype="multipart/form-data"> 
								
								<div class="form-group"> 
									<label for="exampleInputEmail1">New Password</label> 
									<input type="Password" class="form-control" id="pass" name="pass" placeholder="**********************" required="" value="<?php echo set_value('pass'); ?>"> 
									<?php if(form_error('pass'))
										{?>
											<strong style="color:red">
											 <?php echo form_error('pass');?>
											 </strong>
								 <?php  };?>
								</div> 
							

								<div class="form-group"> 
									<label for="exampleInputPassword1">Conform Password</label> 
									<input type="Password" class="form-control" id="cpass" name="cpass" placeholder="**********************" required="" value="<?php echo set_value('cpass'); ?>" > 
								</div> 
							
								<?php if(isset($error))
										{?>
											<strong style="color:red"><?php echo $error['pass']?></strong> 
									 <?php } ?>
									
					
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
					</div>

				</div>
			</div>
		</div>