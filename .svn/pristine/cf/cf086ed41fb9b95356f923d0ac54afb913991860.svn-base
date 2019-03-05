<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <h2>About us details</h2>
            </div>
            <form action="<?php echo base_url(); ?>backend/common/about_update" name="about_update_form" id="about_update_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Title</label>
                            <input type="text" class="form-control" id="about_title" name="about_title" placeholder="Title" value="<?php if(!empty($view[0]->about_title)){
                                echo $view[0]->about_title;
                            } ?>">
                    	</div>
                        <div class="form-group col-md-6">
                            <label for="list-title">About Content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content"><?php if(!empty($view[0]->about_content)){
                                echo $view[0]->about_content;
                            } ?></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="list-title">Wall Image</label>
                            <input type="file" class="form-control" id="wall_image" name="wall_image" placeholder="Wall Image" onchange="return ValidateFileUpload();">
                        </div>
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="../../uploads/about/<?php echo $view[0]->wall_image; ?>" alt="" id="load_image"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="list-title">Front Image</label>
                            <input type="file" class="form-control" id="front_image" name="front_image" placeholder="Front Image" onchange="return ValidateFileUpload1();">
                        </div> 
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="../../uploads/about/<?php echo $view[0]->front_image; ?>" alt="" id="load_image1"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="list-title">Back Image</label>
                            <input type="file" class="form-control" id="back_image" name="back_image" placeholder="Back Image" onchange="return ValidateFileUpload2();">
                        </div>
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="../../uploads/about/<?php echo $view[0]->back_image; ?>" alt="" id="load_image2"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="list-title">Best Hotel Description</label>
                            <textarea class="form-control" id="best_hotel" name="best_hotel" placeholder="Best Hotel Description"><?php if(!empty($view[0]->best_hotel)){
                                echo $view[0]->best_hotel;
                            } ?></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Best Price Guarantee Description</label>
                            <textarea class="form-control" id="best_price" name="best_price" placeholder="Best Price Guarantee Description"><?php if(!empty($view[0]->best_price_guarantee)){
                                echo $view[0]->best_price_guarantee;
                            } ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Super Fast Booking Description</label>
                            <textarea class="form-control" id="best_booking" name="best_booking" placeholder="Super Fast Booking Description "><?php if(!empty($view[0]->super_fast_booking)){
                                echo $view[0]->super_fast_booking;
                            } ?></textarea>
                        </div> 
                    </div>
                    <div class="row">
                        <?php $aboutMenu = menuPermissionAvailability($this->session->userdata('id'),'General','About Us'); 
                            if (count($aboutMenu)!=0 && $aboutMenu[0]->edit==1) { ?>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <button type="submit" style="margin-top: 25px" id="about_update_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    
                    
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<script>   
$("#about_update_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#about_update_form").submit();
});````````````````````````````````
function ValidateFileUpload() {
        var fuData = document.getElementById('wall_image');
        var FileUploadPath = fuData.value;   
// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }   
}
function ValidateFileUpload1() {
        var fuData = document.getElementById('front_image');
        var FileUploadPath = fuData.value;   
// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image1').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }   
}
function ValidateFileUpload2() {
        var fuData = document.getElementById('back_image');
        var FileUploadPath = fuData.value;   
// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image2').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }   
}
</script>
<?php init_tail(); ?>


