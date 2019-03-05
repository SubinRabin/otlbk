<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title formheadingrg"><span></span>Room Detail</h4>
        </div>
        <div class="modal-body">
<div class="container-fluid">
    <form action="add_new_hotel_room" method="post" id="new_hotel_room_detail_form" name="new_hotel_room_detail_form" enctype="multipart/form-data"> 
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
                        <label for="room_type" class="col-sm-3 control-label fontstyl" style="">Room type</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $view[0]->Room_Type; ?>" readonly> 
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label fontstyl" style="">Room Price </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="price" name="price" value="<?php echo$view[0]->price; ?>" readonly> 
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
                        <label for="room_facilti" class="col-sm-3 control-label fontstyl" style=""> Room facilities</label>
                        <div class="col-sm-9">
                            <?php if (isset($view[0]->room_facilities)) {
                                            $room_facilty = explode(",",$view[0]->room_facilities);
                                        } else {
                                            $room_facilty = array();
                                        }
                                        $i=0; 
                                        $selected_room_fac = "";
                                        ?>
                            <select class="form-control multi-select2" id="room_facilti" name="room_facilti[]" data-placeholder="Select Facilities" multiple="multiple" readonly>
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
                        <label for="max_occ_adult" class="col-sm-3 control-label fontstyl" style="">Occupancy</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo$view[0]->occupancy; ?>" readonly>
                        <!-- </div> -->
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
                        <label for="max_occ_childe" class="col-sm-3 control-label fontstyl" style="">Child Occupancy</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo$view[0]->occupancy_child; ?>" readonly>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="number_of_room" class="col-sm-3 control-label fontstyl" style="">no of Rooms</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo$view[0]->total_rooms; ?>" readonly>
                        <!-- </div> -->
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
                        <label for="allotement" class="col-sm-3 control-label fontstyl" style="">Allotement</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="allotement" name="allotement" value="<?php echo$view[0]->allotement; ?>" readonly>
                        <!-- </div> -->
                    </div>
                </div>
               </div>
           </div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="max_occ_childe" class="col-sm-3 control-label fontstyl" style="">Room Image</label>
                        <div class="col-sm-9">
                        <img width="100" src="<?php echo base_url();?>uploads/rooms/<?php echo $view[0]->room_id; ?>/<?php echo $view[0]->images; ?>">
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-5">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
  </div>

        </div>
        
      </div>
    </div>
