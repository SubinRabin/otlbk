<?php init_hotel_login_header(); ?>
<link href="<?php echo base_url(); ?>skin/css/hotel_portel.css" rel="stylesheet" media="screen">
  <!-- Content Here -->

<div class="row">
  <div class="col-md-12">
    <div class="col-md-6">
      <h3>Photo gallery</h3>
    </div>
    <div class="col-md-6">
        <?php if (isset($_REQUEST['proc'])) { ?>
        <script type="text/javascript">
        AddToast('success','Image uploaded Successfully','!');
        </script>
        <?php } ?>
    </div>
  </div>
</div>
<br><br><br>
<div class="row">
  <div class="col-md-12">
    <form action="<?php echo base_url(); ?>dashboard/image_update_hotel" method="post" enctype="multipart/form-data" id="image_gallery_form">
      <div class="row">
          <div class="box">
              <div class="js--image-preview">
                      <span class="image-title">Main Image</span>
                      <?php 

                          if (isset($view[0]['Image1'])) { ?>
                          <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]['id'];; ?>/<?php echo $view[0]['Image1'];?>" class="img1preview" >
                          <?php  } else {  ?>
                         <img src="" class="img1preview" >
                      <?php   }?>
              </div>
              <div class="upload-options">
                      <label>
                          <input type="file" onchange=" return ValidateImageFileUpload('img1');" class="image-upload" id="img1" name="img1" accept="image/*" />
                          <p><i class="fa fa-upload"></i></p>
                      </label>
              </div>
               
          </div>

          <div class="box">
              <div class="js--image-preview">
                      <?php 
                          if (isset($view[0]['Image2'])) { ?>
                          <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]['id']; ?>/<?php echo $view[0]['Image2'];?>" class="img2preview" >
                          <?php  } else {  ?>
                         <img src="" class="img2preview" >
                      <?php   }?>
              </div>
              <div class="upload-options">
                      <label>
                          <input type="file" onchange="ValidateImageFileUpload('img2');" class="image-upload" id="img2" name="img2" accept="image/*" />
                          <p><i class="fa fa-upload"></i></p>
                      </label>
              </div>
          </div>

          <div class="box">
              <div class="js--image-preview">

                      <?php 
                          if (isset($view[0]['Image3'])) { ?>
                          <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]['id']; ?>/<?php echo $view[0]['Image3'];?>" class="img3preview" >
                          <?php  } else {  ?>
                         <img src="" class="img3preview" >
                      <?php   }?>
              </div>
              <div class="upload-options">
                      <label>
                          <input type="file" onchange="ValidateImageFileUpload('img3');" class="image-upload" id="img3" name="img3" accept="image/*" />
                          <p><i class="fa fa-upload"></i></p>
                      </label>
              </div>
          </div>
          <div class="box">
              <div class="js--image-preview">
                      <?php 
                          if (isset($view[0]['Image4'])) { ?>
                          <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]['id']; ?>/<?php echo $view[0]['Image4'];?>" class="img4preview" >
                          <?php  } else {  ?>
                         <img src="" class="img4preview" >
                      <?php   }?>
              </div>
              <div class="upload-options">
                  <label>
                      <input type="file" onchange="ValidateImageFileUpload('img4');" class="image-upload" id="img4" name="img4" accept="image/*" />
                      <p><i class="fa fa-upload"></i></p>
                  </label>
              </div>
          </div>
          <div class="box">
              <div class="js--image-preview">
                      <?php 
                      if (isset($view[0]['Image5'])) { ?>
                      <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]['id']; ?>/<?php echo $view[0]['Image5'];?>" class="img5preview" >
                      <?php  } else {  ?>
                         <img src="" class="img5preview" >
                      <?php   }?>
              </div>
              <div class="upload-options">
                  <label>
                      <input type="file" onchange="ValidateImageFileUpload('img5');" class="image-upload" id="img5" name="img5" accept="image/*" />
                      <p><i class="fa fa-upload"></i></p>
                  </label>
              </div>
          </div>
          <div class="col-md-12">
              <input type="hidden" name="hotel_id" value="<?php echo $view[0]['id'];?>">
              <button type="button" style="margin-right: 45px;" class="btn btn-primary pull-right"  id='submit_image' value="Upload">Upload</button>
          </div>
      </div>
    </form>
  </div>
</div>
<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
<script>
  $(document).ready(function() {
      $("#submit_image").click(function() {
        
            $("#image_gallery_form").submit();
        
      })
  });
       function ValidateImageFileUpload(inputId) {
        var fuData = document.getElementById(inputId);
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

  if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('.'+inputId+'preview').attr('src', e.target.result);
              }
              reader.readAsDataURL(fuData.files[0]);
          }

      } 
    } 
 

</script>
<?php init_hotel_login_footer(); ?>

