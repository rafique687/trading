<!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
          <h2 class="title1">Manage Category</h2>
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>Add Sub Category:</h4>
            </div>
            <div class="form-body">
              <form  action="<?php echo site_url()?>/product/edit_insertsubcategory" method="post" enctype="multipart/form-data"> 
                 <input type="hidden" name="gett" value="<?php echo $editid?>">
                <div class="form-group"> 
                  <label for="exampleInputEmail1">Sub Category</label> 
                  <input type="text" class="form-control" name="product_name" value="<?php echo $product['product_name'];?>"> 
                </div> 
                <div class="form-group"> 
                  <label>Select Parent Category</label>
                                <select class="form-control" name="p_cate" required="">
                                 
                                     <option <?php if($product['parent_id']==0) {echo 'selected'; }?> value="0">Main Category
                                    </option>
                                    <option <?php if($product['parent_id']==1) {echo 'selected'; }?> value="1">
                                      Sub Category
                                    </option>
                            
                            </select> 
                </div> 
                 <label>Stock Status</label>
                                <select class="form-control" name="stockstatus" required="">
                                          <option <?php if($product['status']==0){ echo "selected";}?>value="0">
                                            In stock
                                          </option>
                                          <option <?php if($product['status']==1){ echo "selected";}?>value="1">
                                            Out of Stock
                                          </option>
                                </select>
                <div class="form-group"> 
                  <label for="exampleInputPassword1">Image</label> 
                  <input type="file" class="form-control" name="productpic[]" placeholder="upload ..." multiple > 
                   </div> 
                     <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." required="" name='des' id="des">
                          <?php echo $product['description'];?>
                        </textarea>
                      </div>
                    </div>
                    
                  </div>
                   <?php if(isset($imgerror)){?>
                  <div class="alert alert-warning">
                      <strong>Warning!</strong> <?php echo $imgerror['error']?>
                  </div> <?php } ?>
                  <?php if(isset($success)){?>
                  <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $success;?>
                  </div> <?php } ?>
                <div>
                  <img src="<?php $dd=list($street) = explode(',',$product['product_pic'] )[0];
                          echo base_url();?>subproducts/<?php echo $dd?>"" width="50" height="50"" width="100" height="50">
                </div>
                          <input type="hidden" name="oldpic" value="<?php echo $product['product_pic']?>">
             
                <button type="submit" class="btn btn-default" style="margin-top:2%">Submit</button> 
              </form> 
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
$(document).ready(function(){
 
 var info = $('#des').val().trim();
 $("#des").val(info);
});
</script>