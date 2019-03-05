<?php init_head(); ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s6">
                <?php if (isset($room_facility_edit[0]->id) && $room_facility_edit[0]->id!="") { ?>
                    <h2>Edit Room Facilities/Amenities</h2>
                <?php } else { ?>
                    <h2>Add New Room Facilities/Amenities</h2>
                <?php }?>
            </div>
            <div class="col s6">
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/room_facilities" class="btn-sm btn-primary">Back</a></span>
            </div>
            <div class="clearfix">
            <br>
            <div class="col-md-12">
            <form action="<?php echo base_url(); ?>backend/hotels/room_facilities" name="room_facility_form" id="room_facility_form" method="post">
                <input type="hidden" name="room_facility_edit_id" value="<?php echo isset($room_facility_edit[0]->id) ? $room_facility_edit[0]->id : '' ?>">
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="list-title">Enter Room Facilities/Amenities</label>
                        <input id="list-title" type="text" name="room_facility" value="<?php echo isset($room_facility_edit[0]->Room_Facility) ? $room_facility_edit[0]->Room_Facility : ''; ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="icons">Icon</label>
                        <?php if (isset($room_facility_edit[0]->id)) { ?>
                            <select class="icons" name="icon">
                                <?php foreach ($icons as $key => $value) {
                                    if ($value->id == $room_facility_edit[0]->Icon) { 
                                         $selected = "selected='selected'";
                                     } else {
                                          $selected = "";
                                     }?>
                                    <option <?php echo $selected; ?> value="<?php echo $value->id; ?>" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" alt="" class="circle"><?php echo $value->icon_name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } else { ?>
                            <select class="icons" name="icon">
                                <option value="">Icon</option>
                                <?php foreach ($icons as $key => $value) { ?>
                                    <option value="<?php echo $value->id; ?>" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" alt="" class="circle"><?php echo $value->icon_name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <?php  if (isset($room_facility_edit[0]->id) && $room_facility_edit[0]->id!="") { ?>
                            <button type="button" id="room_facility_form_button" class="waves-effect waves-light btn-sm pull-right btn-success">Update</button>
                        <?php } else { ?>
                            <button type="button" id="room_facility_form_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                        
                    </div>
                    <?php }?>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<?php init_tail(); ?>

