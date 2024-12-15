<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<script>
$(document).ready(function(){ 
  $('.checkss').on("click", function(e) {
    e.preventDefault();
       var contry = ($(this).val());
       /* var status = ($("#status").val()); */
       var myarr = contry.split(",");
           // alert(contry);
      jQuery.ajax({ 
      url: "<?php echo site_url()?>/product/category_status?id="+myarr[0] +"&statuss="+myarr[1],
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
        <div class="tables" style="margin-top:0px;">
        <?php if(isset($_GET['category']))
            {?>
              <a href="<?php echo site_url()?>/category/addcategory?id=<?php echo $_GET['category']?>" class="btn btn-info pull-right">Add Subcategory</a>
            <?php } 
            else
            {?>
            <a href="<?php echo site_url()?>/category/addcategory?id=<?php echo $_GET['id']?>" class="btn btn-info pull-right">Add Category</a>
          <?php } ?>
          <h2 class="title1"><?php if(isset($catename)){ echo $catename['product_name']; } else { echo 'Manage Category'; } ?></h2>
        
          <div class="table-responsive bs-example widget-shadow">
            <!-- <table id="example" class="table table-striped table-bordered" style="width:100%"> -->
            
          <?php if(isset($_GET['category']))
            {?>
            <h4>Sub Category</h4>
          <?php } 
          else
            {?>
              <h4>Category</h4>
            <?php }?> 
             <table id="example" class="table table-striped table-bordered" style="width:100%">
            
              
            <?php if(isset($_GET['sucess']))
              {?>
                  <div class="alert alert-success">
                      <strong><?php echo $_GET['sucess']?></strong> 
                  </div> 
              <?php } ?> 
              <thead> 
                <tr> 
                  <th style="width:20px;">S.No</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                </tr> 
              </thead>  
              <tbody> 
                 <?php  $i=1;
                 //echo "<pre>"; print_r($product);exit;
                 foreach($product as $prod){?>
                <tr> 
                  <td style="width:20px;">
                      <?php echo $i ?>
                  </th> 
                  <td>
                      <?php echo $prod['product_name']?>
                  </td>
                  <?php  $dd=list($street) = explode(',',$prod['product_pic'] )[0];?>
                  <td>
                    <?php 
                         $kk=base_url()."products/".$dd;
                          $dfl=base_url()."defualt/defualt.jpg";
                    ?>
                      <img src='<?php echo $kk; ?>' onerror="this.onerror=null; this.src='<?php echo $dfl; ?>'" height="50" width="50">
                  </td> 
                  <td>
                      <?php if(isset($_GET['category']))
                        {?>
                          <a href="<?php echo site_url()?>/category/editcategory?id=<?php echo $prod['prod_id']?>
                          &category=<?php echo $_GET['category']?>" class="btn btn-info"><i class="fa fa-edit"></i>
                      </a>
                  <?php }
                        else
                        {?>
                          <a href="<?php echo site_url()?>/category/editcategory?id=<?php echo $prod['prod_id']?>" class="btn btn-info"><i class="fa fa-edit"></i>
                  <?php }?>
                      <?php if(isset($_GET['category']))
                        {?>
                          <a href="<?php echo site_url()?>/category/deleteproduct?id=<?php echo $prod['prod_id']."&category=".$_GET['category'];?>" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </a> 
                  <?php }
                    else{ ?>
                          <a href="<?php echo site_url()?>/category/deleteproduct?id=<?php echo $prod['prod_id']?>" class="btn btn-danger">
                            <i class="fa fa-trash" ></i>
                          </a> 
                  <?php } ?>
                      <a href="<?php echo site_url()?>/category/viewcategory?category=<?php echo $prod['prod_id']?>" class="btn btn-info"><i class="fa fa-cog"></i>
                      </a>
                      <?php if($prod['status']==1)
                          {  ?>
                        
                          <!-- <input type="hidden" id="status" value="<?php echo $prod['status'];?>" class="status"> -->
                            <label class="switch"><input type="checkbox" value="<?php echo $prod['prod_id'],",".$prod['status']?>" checked class="checkss" name="status">
                            <span class="slider round"></span></label>
                    <?php } 
                       elseif($prod['status']==2)
                          {  ?>
                          
                         
                            <label class="switch">
                              <input type="checkbox" value="<?php echo $prod['prod_id'].",".$prod['status']?>" id="dact" name="status" class="checkss" >
                            <span class="slider round"></span>
                          </label>
                           <!--  <input type="hidden" id="status" value="<?php echo $prod['status'];?>" class="status"> -->
                  <?php } ?>
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
  targets:[2, 3]
  }]
});
  $('.dataTables_length').addClass('bs-select');
});
    </script>
    