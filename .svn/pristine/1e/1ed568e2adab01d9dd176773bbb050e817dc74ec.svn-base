<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
 <link href="<?php echo base_url(); ?>skin/distn/css/bootstrap-imageupload.css" rel="stylesheet">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title formheadingrg"><span></span>Room Detail</h4>
        </div>
        <div class="modal-body">
<div class="container-fluid">
    <form action="update_new_hotel_room" method="post" id="new_hotel_room_detail_form" name="new_hotel_room_detail_form" enctype="multipart/form-data"> 
    <div class="mainformdivreg">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <br><br>
            </div>
        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="room_type" class="col-sm-3 control-label fontstyl" style="">Room Type<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <select name="room_type" class="form-control" id="room_type">
                             <option value="" ><?php echo $view[0]->Room_Type; ?></option>
                            <?php foreach ($room_type as $key => $value) { ?>
                                <option value="<?php echo $value->id; ?>" selected="selected"><?php echo $value->Room_Type; ?></option>
                            <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="room_type_err popup_err blink_me"></span>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label fontstyl" style="">Room Price <span class="starcolor">*</span></label>
                        <div class="col-sm-9">

                          <input type="number" class="form-control" id="price" name="price" value="<?php echo$view[0]->price; ?>"> 
                          <span class="price_err popup_err blink_me"></span>
                        </div>
                    </div>
                </div>
            </div>
         <div class="col-sm-1"></div>   
        </div>  
        <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="room_facilti" class="col-sm-3 control-label fontstyl" style="">Room Facilities</label>
                        <div class="col-sm-9">
                            <?php if (isset($view[0]->room_facilities)) {
                                            $room_facilty = explode(",",$view[0]->room_facilities);
                                        } else {
                                            $room_facilty = array();
                                        }
                                        $i=0; 
                                        $selected_room_fac = "";
                                        ?>
                            <select class="form-control multi-select2" id="room_facilti" name="room_facilti[]" data-placeholder="Select Facilities" multiple="multiple">
                             <?php foreach ($room_facilties as $key => $value) {
                                      if($room_facilty[$i]==$value->id) {
                                              $selected_room_fac = "selected"; ?>
                                        <?php 
                                      $i++; } else {
                                        $selected_room_fac = "";
                                      } ?>
                                <option <?php echo $selected_room_fac; ?> data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                             <?php } ?>
                            </select>
                        <!-- </div> -->
                        <span class="room_facilti_err popup_err blink_me"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="max_occ_adult" class="col-sm-3 control-label fontstyl" style=""> Occupancy<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <select name="max_occ_adult" class="form-control" id="max_occ_adult">
                            <option value="<?php echo$view[0]->occupancy; ?>" selected="selected"><?php echo$view[0]->occupancy; ?></option>
                                <?php for ($i=0 ; $i<=11; $i++) { ?>
                                    <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                                <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="max_occ_adult_err popup_err blink_me"></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-1"></div>
        </div>  
        <br>  
        <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="max_occ_childe" class="col-sm-3 control-label fontstyl" style="">Child Occupancy<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <select name="max_occ_childe" class="form-control" id="max_occ_childe">
                            <option value="<?php echo$view[0]->occupancy_child; ?>" selected="selected"><?php echo$view[0]->occupancy_child; ?></option>
                            <?php for ($i=0 ; $i<=11; $i++) { ?>
                                <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> child(s)</option>
                            <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="max_occ_childe_err popup_err blink_me"></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="no of rooms" class="col-sm-3 control-label fontstyl" style="">no of Rooms <span class="starcolor">*</span></label>
                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="no_rooms" name="no_rooms" value="<?php echo$view[0]->total_rooms; ?>"> 
                        <!-- </div> -->
                        <span class="no_rooms_err popup_err blink_me"></span>
                    </div>
                </div>
               </div>
            </div>
           <div class="col-sm-1"></div>
        </div>  
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="allotement" class="col-sm-3 control-label fontstyl" style="">Allotement<span class="starcolor">*</span></label>
                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="allotement" name="allotement" value="<?php echo$view[0]->allotement; ?>"> 
                        <!-- </div> -->
                        <span class="allotement_err popup_err blink_me"></span>
                    </div>
                </div>
               </div>
            </div>
            <br>
            <div class="col-sm-5">
              <div class=form-horizondal>
                <div class="form-group">
            <!-- bootstrap-imageupload. -->
                   <div class="imageupload panel panel-default col-sm-12">
                <div class="panel-heading clearfix">
                   <h3 class="panel-title pull-left">Upload Image</h3>
                        <!-- <button type="button" class="btn btn-default active">File</button>
                        <button type="button" class="btn btn-default">URL</button> -->
                </div>
                <div class="file-tab panel-body">
                    <label class="fa fa-upload btn btn-primary btn-file ">
                        <span>Browse</span>

                        <!-- The file is stored here. -->
                        <input type="file" name="image-file">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
                <div class="url-tab panel-body">
                    <div class="input-group">
                        <div class="input-group-btn">
                        <button type="button" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default">Remove</button>
                    <!-- The URL is stored here. -->
                    <input type="file" id="image-url" name="image-url" onchange="return ValidateFileUpload();" >
                </div>
            </div>
        </div>
        </div>

        <div class="col-sm-4"></div>
            <div class=form-horizondal>
            </div>
        </div>
            <div class="col-sm-1"></div>
        </div>   
        </div>
        </div>
        <div class="col-sm-12">
            <div class="modal-footer regclassfooter">
            </div>
            <div class="col-sm-12">
                <div class="text-right">
                    <input type="hidden" name="room_id" value="<?php echo $view[0]->room_id; ?>">
                    <button type="Submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
        </div>
        </div>
      </div>
    </div>
<script src="<?php echo base_url(); ?>skin/distn/js/bootstrap-imageupload.js"></script>

        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>