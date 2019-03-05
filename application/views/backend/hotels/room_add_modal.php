 <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="list-img"><?php echo $title; ?></h4>
    </div>
    <div class="modal-body">
      <form method="post" id="allotement_form" enctype="multipart/form-data">
      <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['id'] ?>">
      <input type="hidden" name="room_id" id="room_id" value="<?php echo isset($view[0]->room_id) ?$view[0]->room_id : '' ?>">
      <div class="row">
          <div class="row">
            <div class="form-group col-md-6">
                  <label class="col-md-12 pad_left_none"><span>Room Image</span><span class="right text-primary"><?php echo isset($view[0]->images) ?$view[0]->images : '' ?></span></label>
                  <input id="room_image" type="file" name="image-file" class="form-control" onchange="return ValidateFileUpload(event);">
              </div>
              <div class="form-group col-md-6">
                  <label for="room_name">Room Name</label>
                  <input id="room_name" type="text" name="room_name" class="form-control" value="<?php echo isset($view[0]->room_name) ? $view[0]->room_name : '' ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="room_type">Select room type</label>
                  <select name="roomtype" id="room_type" class="form-control">
                      <option value="" selected="selected">Room Type</option>
                      <?php foreach ($room_type as $key => $value) { 
                            if (isset($view[0]->room_type) && $value->id==$view[0]->room_type) { ?>
                               <option selected="" value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                          <?php  }  else { ?>
                          <option value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                      <?php } } ?>
                  </select>
              </div>
              <!-- <div class="form-group col-md-6">
                  <label for="price">Per room Price</label>
                  <input id="price" type="number" name="price" class="form-control" value="<?php echo isset($view[0]->price) ? $view[0]->price : '' ?>">
              </div> -->
              <div class="form-group col-md-6 room_facilties">
                  <label for="room_facilties">Select room facilities</label>

               <?php   if (isset($view[0]->room_facilities)) {
                          $room_facilities_val = explode(",",$view[0]->room_facilities);
                      } else {
                          $room_facilities_val = array();
                      }
                       $i=0; 
                          $selected_room_fac = "";
                ?>
            
                          
                <div class="multi-select-mod">
                    <select class="form-control" multiple="" name="room_facilties[]" id="room_facilties">
                        <?php 
                        $i=0;
                        foreach ($room_facilties as $key => $value) { 
                            if ($room_facilities_val[$i]==$value->id) {
                            $i++; ?>
                            <option selected="" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>

                        <?php } else { ?>
                            <option <?php echo $selected_room_fac; ?> data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                        <?php } }  ?>
                    </select>
                </div>
           </div> 

                         
              <div class="form-group col-md-6 room_facilties">
                  <label for="occupancy">Select Max Occupancy adults</label>
                  <select id="occupancy" name="occupancy" class="form-control">
                      <option value="" disabled selected>Adults</option>
                      <?php for ($i=0 ; $i<=16; $i++) { 
                        if (isset($view[0]->occupancy) && $i+1==$view[0]->occupancy) { ?>
                               <option selected="" value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                          <?php  }  else { ?>
                          <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                      <?php } }?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label for="occupancy_child">Select Max Occupancy childs</label>
                  <select id="occupancy_child" name="occupancy_child" class="form-control">
                      <option value="" disabled selected>Children</option>
                      <?php for ($i=0 ; $i<=16; $i++) { 
                        if (isset($view[0]->occupancy_child) && $i+0==$view[0]->occupancy_child) { ?>
                               <option selected="" value="<?php echo $i+0; ?>"><?php echo $i+0 ?> child(s)</option>
                          <?php  }  else { ?>
                          <option value="<?php echo $i+0; ?>"><?php echo $i+0; ?> child(s)</option>
                      <?php } } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label for="maxtotal">Maximum Capacity</label>
                  <input type="number" name="max_total" id="max_total" value="<?php echo isset($view[0]->max_total) ? $view[0]->max_total : '' ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="standard capacity">Standard capacity</label>
                  <input type="number" name="standarad" id="standarad" value="<?php echo isset($view[0]->standard_capacity) ? $view[0]->standard_capacity : '' ?>">
              </div>
              <div class="form-group col-md-6">
                  <label for="no_of_rooms">No of room's</label>
                  <input type="number" name="no_of_rooms" id="no_of_rooms" value="<?php echo isset($view[0]->total_rooms) ? $view[0]->total_rooms : '' ?>">
                  <!-- <select id="no_of_rooms" name="no_of_rooms" class="form-control">
                      <option value="" disabled selected>Room's</option>
                      <?php for ($i=0 ; $i<=11; $i++) { 
                        if (isset($view[0]->total_rooms) && $i+1==$view[0]->total_rooms) { ?>
                               <option selected="" value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                          <?php  }  else { ?>
                          <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                      <?php } }?>
                  </select> -->
              </div>
              <div class="form-group col-md-6">
                  <label for="LinkedRoom">Linked Room</label>
                  <select id="LinkedRoom" name="LinkedRoom" class="form-control">
                    <option>--Select--</option>
                    <?php foreach ($linkedRooms as $LRkey => $LRvalue) {
                      if(isset($view[0]->linked_to_room_type) && $view[0]->linked_to_room_type==$LRvalue->id) { ?>
                        <option selected="" value="<?php echo $LRvalue->id ?>"><?php echo $LRvalue->room_name." ".$LRvalue->Room_Type ?></option>
                      <?php } else { ?>
                        <option value="<?php echo $LRvalue->id ?>"><?php echo $LRvalue->room_name." ".$LRvalue->Room_Type ?></option>
                    <?php } } ?>
                  </select>
              </div>
          </div>
      </div>
    </form>
    </div>
    <div class="modal-footer">
    <div class="form-group col-md-12">
          <input type="button" class="sss pull-right btn-sm btn-success" onclick="room_allotement_add_fun();"    value="<?php echo isset($view[0]->room_id) ? 'Update' : 'Add' ?>" > 
          <button class="yourmodalid hide"  data-toggle="modal" data-target="#yourmodalid">modal</button>
    </div>
    </div>
</div>
<!-- <?php if (isset($view[0]->room_id)) { ?> data-toggle="modal" data-target="#yourmodalid" onclick="update_fun();" <?php }else { ?> onclick="room_allotement_add_fun();" <?php  }?>
 -->
 
<div class="modal fade delete_modal" id="yourmodalid" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update</h4>
        </div>
        <div class="modal-body">
              <p>Do you want to update?</p>
        </div>
        <div class="modal-footer">
              <div class="form-group col-md-12">
                  <button type="button" class="btn-sm btn-success"  id="update_room" onclick="room_allotement_update_fun();"  data-dismiss="modal">Update</button>
              </div>
        </div>
      </div>
    </div>
</div>
  



<script type="text/javascript">
  $(document).ready(function() {
      $('#room_facilties').multiselect();
  });
   $('#room_facilties').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });

</script>
