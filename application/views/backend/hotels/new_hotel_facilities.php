<?php init_head(); ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s6">
                <?php if (isset($facility_edit[0]->id) && $facility_edit[0]->id!="") { ?>
                    <h2>Edit Hotel Facility</h2>
                <?php } else { ?>
                    <h2>Add New Hotel Facility</h2>
                <?php }?>
            </div>
            <div class="col s6">
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/hotel_facilities" class="btn-sm btn-primary">Back</a></span>
            </div>
            <div class="clearfix">
            <br>
            <div class="col-md-12">
            <form action="<?php echo base_url(); ?>backend/hotels/hotel_facilities" name="hotel_facility_form" id="hotel_facility_form" method="post">
                <input type="hidden" name="facility_edit_id" value="<?php echo isset($facility_edit[0]->id) ? $facility_edit[0]->id : '' ?>">
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="list-title">Enter Hotel Facility</label>
                        <input id="list-title" type="text" name="hotel_facility" value="<?php echo isset($facility_edit[0]->Hotel_Facility) ? $facility_edit[0]->Hotel_Facility : ''; ?>" class="validate">
                    </div>
                    <div class="form-group col-md-5">
                        <label >Icon</label>
                        <?php if (isset($facility_edit[0]->id)) { ?>
                            <select class="icons" name="icon">
                                <?php foreach ($icons as $key => $value) {
                                    if ($value->id == $facility_edit[0]->Icon) { 
                                         $selected = "selected='selected'";
                                     } else {
                                          $selected = "";
                                     }?>
                                    <option <?php echo $selected; ?> value="<?php echo $value->id; ?>" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" alt="" class="circle"><?php echo $value->icon_name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } else { ?>
                            <select class="icons" name="icon">
                                <option value="" selected>Icon</option>
                                <?php foreach ($icons as $key => $value) { ?>
                                    <option value="<?php echo $value->id; ?>" data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" alt="" class="circle"><?php echo $value->icon_name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <?php  if (isset($facility_edit[0]->id) && $facility_edit[0]->id!="") { ?>
                            <button type="button" id="hotel_facility_form_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                        <?php } else { ?>
                            <button type="button" id="hotel_facility_form_button" class="waves-effect waves-light btn-sm btn-success">Submit</button>
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

