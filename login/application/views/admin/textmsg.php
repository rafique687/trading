<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
   $('.checkss').change(function () {
   
        var contry = ($(this).val());
        
            jQuery.ajax({ 
            url: "<?php echo site_url()?>/product/category_status?id="+contry,
            type: "GET",
            data: "id = "+ contry,
            dataType: "html",
            success: function(response)
            { 
              if (response != 0) {  
                        //alert("Category status changed!!!!");  
                        location.reload();  
                    }  
                },  
                error: function (response) {  
                    if (response != 1) {  
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


<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">


<!----------------------------------------------------------------------------------------->

<!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="tables">
       
          <h2 class="title1">Sent Text Message</h2>
        
          <div class="table-responsive bs-example widget-shadow">
            <!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->
          
            <h4>Sent Text Message Details</h4>
         
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
                            <th>Message</th>
                            <th>date</th>
                            <th>Receiver</th>
                </tr> 
              </thead> 
              <tbody> 
                 <?php  $i=1;
                 //echo "<pre>"; print_r($product);exit;
                 foreach($recored as $prod)
                  {?>
                    <tr> 
                      <td style="width:20px;"><?php echo $i ?></th> 
                      <td><?php echo $prod['message'];?></td>
                      <td><?php echo $prod['date'];?></td>
                      <td><a href="<?php echo site_url()?>/messageApi/textmsgdetails?id=<?php echo $prod['sms_id'];?>">Receiver</a></td>
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
  
    