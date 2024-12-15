<style>
/** {
  box-sizing: border-box;
}*/

.mr {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

 .mr ul li {
  border: 1px solid #ddd;
  margin-top: -1px; 
  float:left;/* Prevent double borders */
  background-color: #f6f6f6;
  padding: 5px;
  text-decoration: none;
  font-size: 13px;
  color: black;
  display: block;
  position: relative;
}

 .mr ul li:hover {
  background-color: #eee;

}

.close {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0%;
  padding: 5px 5px;
  transform: translate(-5%, -50%);
  
}

.close:hover {background: #010203; color:$ffff;}
</style>

<script src="<?php echo base_url()?>/js/whatappjquery.js"></script>
    <script>
        $(document).ready(function($){

       
        let data = [
            ]
            $("#essai").email_multiple({
                data: data
                // reset: true
               
              
            });
    });

     
    </script>


	<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url()?>ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	 <link rel="stylesheet" href="<?php echo base_url()?>/css/email.multiple.css">
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page compose">
				<?php if($type=='text'){ ?>
				<h2 class="title1">Send Text Message</h2>
			<?php }
			else {?> <h2 class="title1">Send WhatApp Message</h2> <?php } ?>
				
				<div class="col-md-12 compose-right widget-shadow" style="width: 100% !important;">
					<div class="panel-default">
						<div class="panel-heading">
							<?php if($type=='text'){ ?>
							Compose New Text Message 
						<?php } 
						else { echo "Send Whats App Message" ; }?>
						</div>
						<div class="panel-body">
							<!-- <div class="alert alert-info">
								Please fill details to send a new message
							</div> -->
							<?php if($type=='text'){ ?>
							<form class="com-mail" action="<?php echo site_url()?>/MessageApi/sendsms" method="post" enctype="multipart/form-data">
							<?php } 
							else{?>
								<form class="com-mail" action="<?php echo site_url()?>/MessageApi/whatsappmsg" method="post" enctype="multipart/form-data">
							<?php  }?>
						
							<input type="hidden" id="cl" value="" width="100%" name="sendmail">
							<input type="hidden" name="type" value="<?php echo $type;?>">

                           <input type="text" id=""  class="form-control" placeholder="Enter Comma Seprated Mobile Number"  name="sendmail" required="required" <?php if(set_value('sendmail'))
                           	{?> value="<?php echo set_value('sendmail');?>" <?php  } ?>">

                           	<?php if(form_error('sendmail'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('sendmail'));?></div>
						 <?php  };?>
                             

                             	<?php if(form_error('email'))
						{?>
							<div class="custom">  <?php echo strip_tags(form_error('email'));?></div> 
			 	 <?php  };?>
							
							    
							
								<div class="form-group">
									<label for="exampleInputEmail1">Message</label> 
									<textarea  class="form-control" rows="3" required="" name="message" id="des">
										<?php echo set_value('message'); ?>	
										
								</textarea>
							<?php if(form_error('message'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('message'));?></div>
						 <?php  };?>
								</div>
								
								<input type="submit" value="Send Message" name="textsms"> 
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
		<script>
	initSample();
</script>

<script>
 $(document).on('click', '.cancel-email', function() {
                
                var dl = $(this).attr("id");
                var kk = $("#cl").val();
              // alert(kk);
                kk = kk.split(",");
                kk = kk.filter(kk => dl != kk);
                
                $("#cl").val(kk.join(","));
               $(this).parent().remove();
 });


</script>

<script>
$(document).ready(function(){
 
	var info = $('#des').val().trim();
	$("#des").val(info);
	

});
</script>

		