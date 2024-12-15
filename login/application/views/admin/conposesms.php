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

	<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url()?>ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page compose">
				<?php if($type=='text Message'){ ?>
				<h2 class="title1">Send Text Message</h2>
			<?php  } 
			else{?> <h2 class="title1">Send WhatsApp Message</h2><?php } ?>
				
				<div class="col-md-12 compose-right widget-shadow" style="width: 100% !important;">
					<div class="panel-default">
						<div class="panel-heading">
							<?php if($type=='text Message'){ ?>
							Compose New Message 
						<?php } 
						else { echo "Send Whats App Message" ; }?>
						</div>
						<div class="panel-body">
							<div class="alert alert-info">
								Please fill details to send a new message
							</div>
							<?php 
							if($type=='text Message'){ ?>
							<form class="com-mail" action="<?php echo site_url()?>/MessageApi/sendsms" method="post" enctype="multipart/form-data">
							<?php } 
							if($type=='whatsApp'){?>
								<form class="com-mail" action="<?php echo site_url()?>/MessageApi/whatsappmsg" method="post" enctype="multipart/form-data">
							<?php  }?>
							<div class="form-control1 control3">
							<div class="mr">
								<ul>
							<?php for($i=0;$i<count($email); $i++)
							{?>
								<li style ="float:left" id="<?php echo $i;?>"><?php echo $email[$i]?><span data-id="<?php echo $email[$i]?>" class="close">&times;</span></li>
							<?php } ?>
						</ul>
					</div>
					
							</div>
							<input type="hidden" value="<?php echo implode(",",$email);?>" id="sendmail" name="sendmail">
							 
							  		<input type="hidden" name="type" value="<?php echo $type;?>">
							
							
								<div class="form-group">
									<textarea  class="form-control"  name="message" required="required" id="des">
										
								<?php  if(set_value('message'))
										{ echo set_value('message'); }; ?>
								</textarea>
								<?php if(form_error('message'))
								{?>
									<div class="custom"> <?php echo strip_tags(form_error('message'));?></div>
						 <?php  };?>
								</div>
								
								<input type="submit" value="Send Message"> 
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
	$(".close").on("click", function(){
		var em = $(this).data("id"); 
		var em1 = $("#sendmail").val();
		em1 = em1.split(",");
		em1 = em1.filter(em1=> em != em1);
		$("#sendmail").val(em1.join(",")); 
		$(this).parent().remove();
	});
// var closebtns = document.getElementsByClassName("close");
// var i;

// for (i = 0; i < closebtns.length; i++) {
//   closebtns[i].addEventListener("click", function() {
//     this.parentElement.style.display = 'none';
//   });
// }
</script>

<script>
$(document).ready(function(){
 
 var info = $('#des').val().trim();
 $("#des").val(info);
 

});
</script>

		