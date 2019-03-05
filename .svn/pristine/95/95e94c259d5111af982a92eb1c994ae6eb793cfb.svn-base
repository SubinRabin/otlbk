<?php init_head();  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<style>
.hide {
    display:none;
}
.multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
    border-color: transparent !important;
    transform: translateY(-8px) !important;
    padding: 0 !important;
    overflow: hidden !important;
  }
  .multi-select-trans .form-control {
    padding: 6px 0 !important;
  }
  .multi-select-trans1 .form-control {
    padding: 0px 0 !important;
  }
  .input-hide input {
    display: none ! important;
  }
  .input-hide li {
    display: none ! important;
  }
</style>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Service</h2>
                <?php } else { ?>
                <h2>New Service Add</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/tour_services" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/tour/addservice" name="add_service_form" id="add_service_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="stay_pay">Name</label>
                            <input type="text" class="form-control" id="type" name="type" value="<?php echo isset($edit[0]->type) ? $edit[0]->type : '' ; ?>">         
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="list-title">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Image" onchange="return ValidateFileUpload();">
                        </div> 
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="<?php echo base_url()?>/uploads/tour_services_images/<?php echo isset($edit[0]->id) ? $edit[0]->id : ''; ?>/<?php echo isset($edit[0]->image) ? $edit[0]->image : ''; ?>" alt=""
                                id="load_image"></span>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo isset($edit[0]->description) ? $edit[0]->description : '' ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Near by Places</label>
                            <input type="text" class="form-control" id="near_by" name="near_by" value="<?php echo isset($edit[0]->near_by) ? $edit[0]->near_by : '' ; ?>">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label for="from_date">Country</label>
                          <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                            <option value="">Select</option>
                            <?php $count=count($view);
                            for ($i=0; $i <$count ; $i++) { ?>
                              <option <?php echo isset($edit[0]->countryId) && $edit[0]->countryId ==$view[$i]->id  ? 'selected' : '' ?> value="<?php echo $view[$i]->id;?>" countrycode="<?php echo $view[$i]->sortname; ?>"><?php echo $view[$i]->name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                      <div class="form-group col-md-6">
                            <label for="citySelect">City</label>
                            <input type="hidden" id="hiddenCity" value="<?php echo isset($edit[0]->cityId) ? $edit[0]->cityId : '' ?>">
                            <div class="multi-select-mod multi-select-trans multi-select-trans1">
                              <select name="citySelect" id="citySelect"  class="form-control input-hide">
                              <option value="">Select</option>
                              </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row"> 

                      <div class="form-group col-md-6">
                            <label for="stay_pay">Highlights</label>
                            <textarea class="form-control" id="highlights" name="highlights"><?php echo isset($edit[0]->highlights) ? $edit[0]->highlights : '' ?></textarea>  
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="<?php echo isset($edit[0]->duration) ? $edit[0]->duration : '' ?>"> 
                        </div>
                        <div class="form-group col-md-3">
                            <label for="duration">Duration type</label>
                            <div class="multi-select-mod multi-select-trans multi-select-trans1">
                              <select name="durationType" id="durationType"  class="form-control input-hide">
                              <option value="">Select</option>
                              <option <?php echo isset($edit[0]->durationType) && $edit[0]->durationType == "days"  ? 'selected' : '' ?> value="days">Days</option>
                              <option <?php echo isset($edit[0]->durationType) && $edit[0]->durationType == "hrs"  ? 'selected' : '' ?> value="hrs">Hrs</option>
                              <option <?php echo isset($edit[0]->durationType) && $edit[0]->durationType == "mins"  ? 'selected' : '' ?> value="mins">Mins</option>
                              </select> 
                            </div>
                        </div> 
                        <div class="col-md-6">
                          <label>Schedules</label>
                          <span>
                          <button type="button" id="MultiServiceAdd" class="btn-sm btn-primary pull-right"><i class="fa fa-plus"></i></button>
                          </span>
                          <br>
                          <br>
                          <div class="clearfix"></div>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td>Services</td>
                                <td>Timing (From - To)</td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody class="multiSeriveTbody">
                              <?php foreach ($Services as $key => $value) { ?>
                                <tr>
                                  <td><input type="text" name="Services[]" value="<?php echo $value->Services ?>"></td>
                                  <td><input style="width: 47%" type="text" name="FromTiming[]" value="<?php echo $value->FromTime ?>"> - <input style="width: 47%" type="text" name="ToTiming[]" value="<?php echo $value->ToTime ?>"></td>
                                  <td><button onclick="copytrfun(event)" type="button" class="btn-sm btn-primary"><i class="fa fa-copy"></i></button>
                                  <button onclick="removetrfun(event)" type="button" class="btn-sm btn-danger red"><i class="fa fa-trash"></i></button></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>                                      
                    </div>  
                    <div class="row">
                        <div class="form-group col-md-6 col-md-offset-6">
                            <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                  <button type="button" id="add_service_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_service_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                            <?php } ?>
                        </div>
                    </div>                
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 

<script>

  $("#MultiServiceAdd").click(function() {
    $(".multiSeriveTbody").append('<tr> <td><input type="text" name="Services[]"></td><td><input style="width: 47%" type="text" name="FromTiming[]"> - <input style="width: 47%" type="text" name="ToTiming[]"></td><td><button type="button" class="btn-sm btn-primary"><i class="fa fa-copy"></i></button><button onclick="removetrfun(event)" type="button" class="btn-sm btn-danger red"><i class="fa fa-trash"></i></button></td></tr>');
  });
  
  function removetrfun(e) {
    var tr = e.target.closest('tr').remove();
  }

  function copytrfun(e) {
    $(e.target).closest('tr').clone().appendTo('.multiSeriveTbody');
  }
  ConSelectFun();
    $('#highlights').trumbowyg();
        function ValidateFileUpload() {
            var fuData = document.getElementById('image');
            var FileUploadPath = fuData.value;   
              if (fuData.files && fuData.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      $('#load_image').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(fuData.files[0]);
              }   
        }
    $('#add_service_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/tour/service_validation',
          data: $('#add_service_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_service_form").submit();
              }, 1500);
            }
             else {
              addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    });
    function ConSelectFun(){
      var hiddenCity = $("#hiddenCity").val();
      $('#citySelect option').remove();
      var ConSelect = $('#ConSelect option:selected').attr('countrycode');
      $.ajax({
        url: base_url+'/backend/tour/CitySelect?Concode='+ConSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#citySelect').append('<option value="">Select</option>');
          $.each(data, function(i, v) {
            if (hiddenCity==v.id) {
              selected = 'selected';
            } else {
              selected = '';
            } 
            $('#citySelect').append('<option '+selected+' value="'+ v.id +'">'+ v.CityName +'</option>');
          });
        }
      });
    }

    </script>
<?php init_tail(); ?>


