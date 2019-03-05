<?php init_head(); ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s6">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Room Type</h2>
                <?php } else { ?>
                    <h2>Add New Room Type</h2>
                <?php }?>
            </div>
            <div class="col s6">
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/room_type" class="btn-sm btn-primary">Back</a></span>
            </div>
            <div class="clearfix">
            <br>
            <div class="col-md-12">
            <form action="<?php echo base_url(); ?>backend/hotels/room_type" name="room_type_form" id="room_type_form" method="post">
                <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="list-title">Enter Room Type</label>
                        <input id="list-title" type="text" name="room_type" value="<?php echo isset($edit[0]->Room_Type) ? $edit[0]->Room_Type : ''; ?>" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                            <button type="button" id="room_type_form_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                        <?php } else { ?>
                            <button type="button" id="room_type_form_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                        
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
