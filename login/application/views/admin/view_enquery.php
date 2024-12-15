<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){ 
$('.checkss').change(function () {
var contry = ($(this).val());
jQuery.ajax({ 
              url: "<?php echo site_url()?>/product/item_status?id="+contry,
              type: "GET",
              data: "id = "+ contry,
              dataType: "html",
              success: function(response)
              {
              if (response != 0) {  
                  //alert("Category status changed!!!!");  
                  //location.reload();  
              }  
          },  
                error: function (response)
                 {  
                    if (response != 1)
                     {  
                        alert("Error!!!!");  
                     }  
                  }               
        });
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
         
        <h2 class="title1">Manage Enquery</h2>
        
        <div class="table-responsive bs-example widget-shadow">
             <h4>Enquery List</h4>
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <?php if(isset($_GET['success']))
              {?>
                  <div class="alert alert-success">
                      <strong><?php echo $_GET['success']?></strong> 
                  </div> 
              <?php } ?>
            
           
              <thead> 
                <tr> 
                  <th style="width:20px;">S.No</th>
                  <th>Name</th>
                  <th>Subject</th>
                    <th>Message</th>
                  
                   <th>Date</th>
                  
                   <th>Action</th>
                </tr> 
              </thead> 
              <tbody> 
                 <?php  $i=1;
                foreach($enquery as $prod){?>
                 
                <tr> 
                  <td><?php echo $i ?></td>
                            <td><?php echo $prod['inqury_name'];?></td>
                            <td><?php echo $prod['subject']?></td>
                            <td><?php echo $prod['inquery_email']?></td>
                             <td><?php echo $prod['inquery_date']?></td>
                         
                            <td>
                            <?php if($prod['reply_status']==1)
                            {?> <a href="<?php echo site_url()?>/Enquery/sendreply?enqid=<?php echo $prod['inquryid'];?>&subject=<?php echo $prod['subject']?>&mailid=<?php echo $prod['inquery_email']?>" class="btn btn-info">Reply</a> <?php } 
                            else {?><button class="btn btn-danger">Replyed</button></td>
                          <?php  } ?>
                            </td>
                          
                    
                  
                </tr> 
              <?php
                  
                  $i++;
                } ?>
                
                 
              </tbody> 
            </table> 
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
   
    </script>

    <script>
      $(document).ready(function () {
$('#example').DataTable({
  "aaSorting": [],
  columnDefs: [{
  orderable: false,
  targets: [4, 6]

  }]
});
  $('.dataTables_length').addClass('bs-select');
});
    </script>
    
    