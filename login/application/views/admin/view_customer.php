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
<!-------------button css------------------------------>
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

<!----------------------------------------------------------------------------------------->

<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					 <a href="<?php echo site_url()?>/Customer/addcustomer" class="btn btn-info pull-right">Add Customer</a>

					 <?php if(isset($_GET['text']))
						{?>
					 <a href="<?php echo site_url()?>/Customer/addcustomer" class="btn btn-info pull-right">Compose Text Message</a>
					<?php } 
					elseif(isset($_GET['whatsapp']))
						{?>?>

					  <a href="<?php echo site_url()?>/Customer/addcustomer" class="btn btn-info pull-right">Compose WhataApp</a>
					<?php } 
					else
						{?>
						<a href="<?php echo site_url()?>/Customer/createmail" class="btn btn-info pull-right">Compose Mail</a>
				  <?php } ?>

				  


					
					<h2 class="title1">Manage Customer</h2>
					
					<div class="table-responsive bs-example widget-shadow">
						<form action="<?php echo site_url()?>/customer/composemail" method="post">
                   
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
                    				
 <input type="checkbox"  value="<?php echo $cust['email'];?>" name="rowSelectCheckBox[]">
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
						 <input type="submit" name="email" value="Send Mail" class="btn btn-info"  id="btnSubmit">
						
							 <a href="<?php echo site_url()?>/Customer/maillist" class="btn btn-danger">Sent Mail</a>
				
						</form>
					</div>
				</div>
			</div>
		</div>
		
	    <!---------button js--------------------------->
<script src="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>js
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
  <script>
      /*$(document).ready(function() {
        $('#example').DataTable({
           dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
} );*/
    </script>
    <script>
     
     
      
    </script>

    <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        "pageLength": 10 ,
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
    </script>
  