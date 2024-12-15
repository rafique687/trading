<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>

 <script type="text/javascript">
 	function CheckUncheckAll()
 	{
		   var  selectAllCheckbox=document.getElementById("checkUncheckAll");
		   if(selectAllCheckbox.checked==true)
		   {
		    var checkboxes =  document.getElementsByName("rowSelectCheckBox[]");
		     for(var i=0, n=checkboxes.length;i<n;i++) {
		      checkboxes[i].checked = true;
		     }
		    }
		    else
		     {
		     var checkboxes =  document.getElementsByName("rowSelectCheckBox[]");
		     for(var i=0, n=checkboxes.length;i<n;i++) {
		      checkboxes[i].checked = false;
		     }
		    }
	}
</script>

<script type="text/javascript">
$(document).ready(function () {
    $('#btnSubmit').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#whatsApp').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>


<!--------------------boot strapdata table------------------------------------------------->
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!--------------------boot strapdata table------------------------------------------------->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css
" rel="stylesheet" type="text/css">

<!----------------------------------------------------------------------------------------->

<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					 <a href="<?php echo site_url()?>/Customer/addcustomer" class="btn btn-info pull-right">Add Customer</a>

				
					<a href="<?php echo site_url()?>/MessageApi/composeTextMessage?type=text" class="btn btn-info pull-right">Compose Message</a>

					<a href="<?php echo site_url()?>/MessageApi/composeTextMessage?type=whatsApp" class="btn btn-info pull-right">Compose Whats App</a>
				
					
					
					<h2 class="title1">Text/Whats App Message</h2>
					
					<div class="table-responsive bs-example widget-shadow">
						<form action="<?php echo site_url()?>/MessageApi/composeSms" method="post">
                   <h4>Send Message Detaails</h4>
					 <table id="example" class="table table-striped table-bordered " style="width:100%"> 
					 	<?php if(isset($_GET['success']))
							{?>
									<div class="alert alert-success">
  										<strong><?php echo $_GET['success']?></strong> 
								</div> 
							<?php } ?> 
					
							<thead> 
								<tr> 
								  <th><input type="checkbox" id="checkUncheckAll" onClick="CheckUncheckAll()"/>  S.No</th>
		                  		  <!-- <th style="width:20px;">checkbox</th> -->
						          <th>Fist Name</th>
						          <th>Last Name</th>
		                  		  <th>Mobile</th>
		                  		  <th>City</th>
						          <th>Action</th>
								</tr> 
							</thead> 
							<tbody> 
						<?php  $i=1;
						foreach($customer as $cust)
							{?>
								<tr> 
								    <td class="chk">
                    				
 <input type="checkbox"  value="<?php echo $cust['mobile'];?>" name="rowSelectCheckBox[]">
 	<?php echo $i ?>
									</td>
								    <td><?php echo $cust['first_name'];?></td>
								    <td><?php echo $cust['last_name'];?></td> 
								    <td><?php echo $cust['mobile'];?></td> 
				                    <td><?php echo $cust['cityname'];?></td> 
				                    <td>
				                    	<a href="<?php echo site_url()?>/customer/editcutomer/?id=<?php echo $cust['cust_id']?>" class="btn btn-info">
				                    		<i class="fa fa-edit"></i>
										</a>
                        				<a href="<?php echo site_url()?>/customer/deletecustomer/?id=<?php echo $cust['cust_id']?>" class="btn btn-danger">
                        					<i class="fa fa-trash"></i>
                        				</a>
                        			
                        			</td> 
				                </tr>
				      <?php $i++;
				  			} ?>
				  			
						   
				  		
				        	</tbody> 
						</table> 
						 <input type="submit" name="type" value="text Message" class="btn btn-info"  id="btnSubmit">
						 <input type="submit" name="type" value="whatsApp" class="btn btn-info"  id="whatsApp">
						 <a href="<?php echo site_url()?>/MessageApi/textmsg" class="btn btn-danger">Sent Message</a>
						  <a href="<?php echo site_url()?>/MessageApi/sendwhatappsmessge" class="btn btn-danger">Sent Whats App</a>
			
					
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url()?>js/bootstrap.js"> </script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<!-- //Bootstrap Core JavaScript -->
	<script>
			$(document).ready(function() {
    		$('#example').DataTable();
} );
		</script>
		