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
						<h4>Edit Event</h4>
						</div>
						<div class="form-body">
						 
							<form  action="<?php echo site_url()?>/Event/updateevent" method="post" enctype="multipart/form-data">
								<input type="hidden" name="eventid" value="<?php echo $id ?>">
								<div class="form-group"> 
								<label for="exampleInputEmail1">Event Name</label> 
								<input type="text" class="form-control" id="" name="event" placeholder="Event Name" required=""  value="<?php echo $event['event_name'] ?>"> 
								<?php if(form_error('event'))
									{?>
									<div class="custom"> <?php echo strip_tags(form_error('event'));?></div> 
							 <?php  };?>
								</div> 
								<div class="form-group"> 
									<label for="exampleInputEmail1">Event Date</label> 
									<input type="date" class="form-control" id="" name="event_date" placeholder="Event Date" required=""  value="<?php echo $event['event_date']; ?>"> 
									<?php if(form_error('event_date'))
										{?>
											<div class="custom"> <?php echo strip_tags(form_error('event_date'));?></div> 
								 <?php  };?>
								</div> 
								<div class="form-group"> 
									<label for="exampleInputPassword1">Event Description</label> 
									<textarea class="form-control" rows="3" placeholder="Event Description..."  name="des" required=""><?php echo $event['description'];?></textarea>
									<?php if(form_error('des'))
										{?>
											<div class="custom"> <?php echo strip_tags(form_error('des'));?></div> 
									<?php };?>
								</div>
								<input type="hidden" name="oldpic" value="<?php echo $event['event_photo']?>">
								<input type="hidden" value="" name="cateimg" id="cateimg">
							<div class="form-group col-12">
							<div id="dropzonewidget" class="dropzone" data-url="<?php echo site_url(); ?>Event/uploadfiles">
							</div> 
						</div>
						<div class="form-group col-12">
						<div class="dz-image">
							<?php $img=explode(",",$event['event_photo']);
							for($i=0;$i<count($img);$i++) 
							{
								if(!empty($img[$i]))
								{?>
							<a href="#" class="idd" id="<?php echo $img[$i];?>"><img src="<?php echo base_url()?>event/<?php echo $img[$i];?>" onerror="this.onerror=null; this.src='<?php echo base_url()?>defualt/defualt.jpg'" width="100" height="100"></a>
							<?php }
							 } ?>
						</div>
					</div>
							<button type="submit" class="btn btn-default">Submit</button> 
						</form> 
						</div>
					</div>
					

				</div>
			</div>
		</div>


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

<script>
$(document).ready(function(){ alert("fjdka");
$('.idd').on("click",function(){
 	var imgname =  $(this).attr("id");
	var cateid  = $("#idd").val();
	alert(imgname);
	var(cateid);
  	 var confirmalert = confirm("Are you sure want to delete this image?");
  if (confirmalert == true) {
	 // AJAX Request
	 $.ajax({
				url: "<?php echo base_url("Event/delimage");?>",
				type: "POST",
				data: {
						type: 1,
						cateid: cateid,
						imgnam: imgname,
					},
				cache: false,
				success: function(dataResult)
				{
					location.reload();				
				}
	 });
  }

});

});
</script>