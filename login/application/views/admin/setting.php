<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
    $("#contry").change(function () {
        var contry = $("#contry").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerystate?id="+contry,
            type: "GET",
            data: "id = "+ contry,
            dataType: "html",
            success: function(data)
            { 
             $("#state").html(data);
            }               
        });
    });
});
</script>
<script>
$(document).ready(function(){ 
    $("#state").change(function () {
        var state = $("#state").val();
            jQuery.ajax({
            url: "<?php echo site_url()?>/product/jquerycity?id="+state,
            type: "GET",
            data: "id = "+ state,
            dataType: "html",
            success: function(data)
            { 
             $("#city").html(data);
            }               
        });
    });
});
</script>
<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url()?>ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="<?php echo base_url()?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Update Setting</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Site Setting :</h4>
						</div>
						<div class="form-body">
							<form action="<?php echo site_url()?>/Dashboard/updatesetting" method="post" enctype="multipart/form-data"> 
								<?php
								 foreach ($form_setting as $setting)
								{ ?>
								<?php if($setting['field_type']=='text')
								{?>
								<input type="hidden" value="<?php echo $setting['section_id']?>" name="section_id">
									<input type="hidden" value="<?php echo $setting['sessting_id']?>" name="id[]">
										<div class="form-group"> 
										<label for="exampleInputEmail1"><?php echo $setting['field_name']?></label> 
										<input type="<?php echo $setting['field_type']?>" class="form-control" value="<?php echo $setting['field_value']?>" name="val[]" > 
										</div> 
								<?php }
								if($setting['field_type']=='textarea') 
							 		{?>
							 			<input type="hidden" value="<?php echo $setting['sessting_id']?>" name="id[]">
								 		<div class="form-group"> 
										<label for="exampleInputPassword1"><?php echo $setting['field_name']?></label> 
										<textarea class="form-control" rows="3"   name="val[]" required="" id="des">
										<?php echo $setting['field_value']?>
										</textarea>
										</div>	
							 <?php  } 
									if($setting['field_type']=='fck')
								 	{?>
								 		<input type="hidden" value="<?php echo $setting['sessting_id']?>" name="id[]">
								 		<label for="exampleInputEmail1"><?php echo $setting['field_name']?></label> 
								 	<textarea  id="<?php echo 'editor'.$setting['sessting_id']?>" required="" name="val[]">
								 			<?php echo $setting['field_value']?>
									 </textarea> 
									
								
									
					 		  <?php }
							 
							if($setting['field_type']=='file') 
							 {?>
							 <div class="form-group"> 
							 <label for="exampleInputEmail1"><?php echo $setting['field_name']?></label> 
							 <input type="hidden" value="<?php echo $setting['sessting_id']?>" name="fileid[]">
										
							<input type="file" class="form-control" name="val[]" > 
							
						</div>
						<div class="form-group"><img src="<?php echo base_url()?>settingpic/<?php echo $setting['field_value']?>" width="10%" height="10%"> </div>
						<div style="clear: both;"></div>
						
					   <?php } ?>
									
							  	
						
							  			
							

						<?php	} ?>
	
							
						 <button type="submit" class="btn btn-default" style="margin-top:10px;">Submit</button> </form>
						</div>

					</div>
					
								
					
				</div>
			</div>
		</div>
		

<script type="text/javascript">
	 /*  
      CKEDITOR.replace( 'editor1' );
	  CKEDITOR.add   
	  CKEDITOR.replace( 'editor2' );
	  CKEDITOR.add    
	  CKEDITOR.replace( 'rafique' );
      CKEDITOR.add     */     
   </script>

<script>
	initSample();
	</script>

	<script>
$(document).ready(function(){
 
	var info = $('#des').val().trim();
	$("#des").val(info);
	

});
</script>
								 <?php 
	foreach ($form_setting as $ss)
	{
		if($ss['field_type']=="fck")
		{
		$editor="editor".$ss['sessting_id'];
		//echo "</br>";
		echo "<script>
		CKEDITOR.replace('".$editor."');
		CKEDITOR.add  </script>";
		 
		}
	}
	?>


  
