<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link href="<?php echo base_url(); ?>/css/dropzone.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/js/dropzone.js"></script>
<!-- main content start-->

<div id="page-wrapper">
	<div class="main-page">
		<div class="forms">
			<h2 class="title1">Manage Event</h2>
			<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
				<div class="form-title">
				<h4>Add Event Details</h4>
				</div>
				<div class="form-body">
					 	<div class="form-group">
							<button class="btn btn-info active" id="vid" >Upload Video</button>
							<button class="btn btn-info" id="pic">Upload Photo</button>
							<button class="btn btn-info" id="url">Upload Url</button>
						</div>
						<form  action="<?php echo site_url()?>/Event/inserteventdetails" method="post" enctype="multipart/form-data" id="Video" style="display:none;">
						<?php if(isset($_GET['event_id']))
						{?>
							<input type="hidden" value="<?php echo $_GET['event_id'] ?>" name="mainid">
					<?php } 
					else
						{ ?>
							<input type="hidden" value="<?php echo $mainid ?>" name="mainid">
					<?php } ?>
						<div class="form-group" > 
							<label for="exampleInputEmail1">Video Title</label> 
							<input type="text" class="form-control" name="title" placeholder="Enter Video Title" required=""> 
							<label for="exampleInputEmail1">Upload Event Video</label> 
							<input type="file" class="form-control" name="video" placeholder="Event Name"  value="<?php echo set_value('event'); ?>" required> 
							<?php if(form_error('event'))
								{?>
								<div class="custom"> <?php echo strip_tags(form_error('event'));?></div> 
							<?php  };?>
						</div> 
					 <input type="submit" id="submit" value="submit" class="btn btn push" style="display: none ; background-color: #F2B33F;color:#fff">
					</form> 
					<form id="photo" style="display:none;" action="<?php echo site_url()?>/Event/inserteventphotodetails" method="post" enctype="multipart/form-data">
							<?php if(isset($_GET['event_id']))
						{?>
							<input type="hidden" value="<?php echo $_GET['event_id'] ?>" name="mainid">
					<?php } 
					else
						{ ?>
							<input type="hidden" value="<?php echo $mainid ?>" name="mainid">
					<?php } ?>
						<!-- <div class="form-group" id="photo" style="display:none;">  -->
							<label for="exampleInputEmail1">Photo Title</label> 
							<input type="text" class="form-control" name="phototitle" placeholder="Enter Photo Title" required=""> 
							<label for="exampleInputEmail1">Upload Event Photos</label> 
								<input type="hidden" value="" name="cateimg" id="cateimg">
						<div class="form-group col-12">
					
						<div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>Event/uploadfiles" required>
						</div> 
						</div> 
							<?php if(form_error('event'))
								{?>
								<div class="custom"> <?php echo strip_tags(form_error('event'));?></div>
						<?php  };?>
						<!-- </div>  -->
						<input type="submit" id="submit" value="submit" class="btn btn push"style=" background-color: #F2B33F;color:#fff" >
					</form>
					<form id="eventurl" style="display: none;" action="<?php echo site_url()?>/Event/inserteventurldetails" method="post" enctype="multipart/form-data">
						<div class="form-group"> 
								<?php if(isset($_GET['event_id']))
						{?>
							<input type="hidden" value="<?php echo $_GET['event_id'] ?>" name="mainid">
					<?php } 
					else
						{ ?>
							<input type="hidden" value="<?php echo $mainid ?>" name="mainid">
					<?php } ?>
							<label for="exampleInputEmail1">Url Title</label> 
							<input type="text" class="form-control" name="urltitle" placeholder="Enter Photo Title" required>
							<label for="exampleInputEmail1">Upload Event Url</label> 
							<input type="text" class="form-control"  name="url" placeholder="Event Name"   value="<?php echo set_value('event'); ?>" required> 
							<?php if(form_error('event'))
								{?>
								<div class="error" style="color:red"><?php echo form_error('event');?></div>
							<?php  };?>
						</div> 
						
						<input type="submit" id="submit" value="submit" class="btn btn push" style=" background-color: #F2B33F;color:#fff">
					</form>
				</div>
			</div>

		</div>
	</div>
		</div>


<script>
$(document).ready(function(){ 
    $("#pic").click(function () {
         $(this).removeClass("btn btn-info").addClass("course-btn-tab-selected");
        $("#vid").removeClass("course-btn-tab-selected").addClass("btn btn-info");
        $("#url").removeClass("course-btn-tab-selected").addClass("btn btn-info");
        $("#photo").show();
        $("#Video").hide();
        $("#submit").show();
        $("#eventurl").hide();
         
    });

    $("#vid").click(function () {
         $(this).removeClass("btn btn-info").addClass("course-btn-tab-selected");
         $("#pic").removeClass("course-btn-tab-selected").addClass("btn btn-info");
        $("#url").removeClass("course-btn-tab-selected").addClass("btn btn-info");
        $("#photo").hide();
        $("#Video").show();
        $("#eventurl").hide();
         $("#submit").show();
         
    });

     $("#url").click(function () {
        $("#url").removeClass("btn btn-info").addClass("course-btn-tab-selected");
        $("#vid").removeClass("course-btn-tab-selected").addClass("btn btn-info");
         $("#pic").removeClass("course-btn-tab-selected").addClass("btn btn-info");
       
        $("#photo").hide();
        $("#Video").hide();
        $("#eventurl").show();
         $("#submit").show();
         
    });
});
</script>
<script>
	Dropzone.autoDiscover = false;
		$(".dropzone").dropzone({
			url: $("#dropzonewidget").data("url"),
			addRemoveLinks: true,
			success: function (file, response) {
				var nm = $("#cateimg").val();
				nm = nm.split(",");
				nm.push(response.replace(/"/g, ''));
				nm = nm.filter(ele=>ele!="");
				nm.join(",");
				$("#cateimg").val(nm)
				file.previewElement.classList.add("dz-success");
			},
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			}
		});
</script>
