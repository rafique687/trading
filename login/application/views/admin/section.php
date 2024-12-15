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
					<h2 class="title1">Manage Section</h2>
				<!-- 	<?php if($_GET['sessting_id']==8)
					{?>
					<h2 class="title1">Update Home Page Content</h2>
			  <?php }
			 			 elseif ($_GET['sessting_id']==6) 
					 		    	{?>
					 		    	<h2>About Page Content :</h2>
					 		  <?php }
					 		    elseif ($_GET['sessting_id']==7) 
					 		    {?>
					 		    	<h2>Terms And Codnition :</h2>
					 		  <?php  }

					  			 ?> -->
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<!-- <?php if($_GET['sessting_id']==8)
									{?>
										<h4>Home Page Content :</h4>
					 		   <?php } 
					 		    elseif ($_GET['sessting_id']==6) 
					 		    	{?>
					 		    		<h4>About Page Content :</h4>
					 		  <?php }
					 		    elseif ($_GET['sessting_id']==7)
					 		    {?>
					 		    	<h4 >Terms And Codnition :</h4>
					 		  <?php  }

					  			 ?> -->
					  			 <h4>Update Setting</h4>

						</div>
						<div class="form-body">
							<?php if(isset($success))
							{?>
									<div class="alert alert-success">
  										<strong><?php echo $_GET['success']?></strong> 
									</div> 
							<?php }  ?> 
							<form action="<?php echo site_url()?>/section/updatesetting" method="post" enctype="multipart/form-data"> 
								<?php 
								if(isset($_GET['sessting_id']))
								{?>
									<input type="hidden" value="<?php echo $_GET['sessting_id']?>" name="id">
									<input type="hidden" value="<?php echo $_GET['section_id']?>" name="section_id">
								<?php } ?>
								<label><?php echo $form_fck['field_name'] ?></label>
						
						 		<textarea  id="editor" required="" name="home">
						 			<?php echo $form_fck['field_value'] ?>
						 		</textarea>
						 
								<button type="submit" class="btn btn-default">Submit</button>
						 	</form> 
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<script>
	initSample();
</script>
