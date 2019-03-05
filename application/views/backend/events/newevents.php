<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Events</h2>
                <?php } else { ?>
                <h2>New Events Add</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/events" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/events/addevents" name="add_events_form" id="add_events_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Event Name</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name" value="<?php echo isset($edit[0]->event_name) ? $edit[0]->event_name : ''; ?>"">
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="list-title">Image</label>
                            <input type="file" class="form-control" id="event_image" name="event_image" placeholder="Event Image" onchange="return ValidateFileUpload();">
                        </div>
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="../../uploads/events/<?php echo isset($edit[0]->id) ? $edit[0]->id : ''; ?>/<?php echo isset($edit[0]->event_image) ? $edit[0]->event_image : ''; ?>" alt="" id="load_image"></span>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Event Description</label>
                            <textarea class="form-control" id="event_des" name="event_des" placeholder="Event Description"><?php echo isset($edit[0]->event_description) ? $edit[0]->event_description : ''; ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Event Address</label>
                            <textarea class="form-control" id="event_adrs" name="event_adrs" placeholder="Event Address"><?php echo isset($edit[0]->event_adrs) ? $edit[0]->event_adrs : ''; ?></textarea>
                    	</div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                           <div class="form-group">
                                <label for="from_date">Start Date</label>
                                <input type="text" class="datePicker-hide datepicker form-control" id="start_date" name="start_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->start_date) ?  $edit[0]->start_date : date('Y-m-d') ?>" >
                                <div class="input-group">
                                <input class="datepicker" id="alternate1" value="<?php echo isset($edit[0]->start_date) ?  date('d/m/Y',strtotime($edit[0]->start_date)) : date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                             <div class="form-group">
                                <label for="from_date">End Date</label>
                                <input type="text" class="datePicker-hide datepicker form-control" id="end_date" name="end_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->end_date) ?  $edit[0]->end_date : date('Y-m-d') ?>" >
                                <div class="input-group">
                                <input class="datepicker" id="alternate2" value="<?php echo isset($edit[0]->end_date) ?  date('d/m/Y',strtotime($edit[0]->end_date)) : date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_events_submit_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_events_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                   
                    
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/events.js"></script>
<script>   

$("#start_date").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#end_date").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $("#start_date").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#end_date").trigger('focus');
        }); 
function ValidateFileUpload() {
        var fuData = document.getElementById('event_image');
        var FileUploadPath = fuData.value; 

        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

        if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
  
// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          } 
        } 
        else {
          error = "Photo only allows file types of JPG, JPEG and BMP. ";
          color = "red";
          $("#event_image").val("");
          $("#load_image").attr("src",base_url+"assets/images/user/1.png");
          addToast(error,color);
        }     
}
</script>
<?php init_tail(); ?>


