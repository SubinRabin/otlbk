<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>All Rooms</span>
                        <?php  $roomMenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Rooms'); 
                        if (count($roomMenu)!=0 && $roomMenu[0]->create==1) { ?>
                        <span class="pull-right mar_left_5"><a href="#" onclick="add_new_room('');" data-toggle="modal" data-target="#large_modal" class="btn-sm btn-primary green">Add Room</a></span>
                        <?php } ?>
                        <!-- <span class="pull-right mar_left_5"><a href="#" onclick="observation_pop('');" data-toggle="modal" data-target="#large_modal" class="btn-sm btn-primary green">Observation</a></span> -->
                        <!-- <span class="pull-right mar_left_5"><a href="<?php echo base_url('backend/hotels/minimum_stay'); ?>?id=<?php echo $_REQUEST['id'] ?>" class="btn-sm btn-primary green">Closed Out Period</a></span> -->
                        <span class="pull-right "><a href="<?php echo base_url(); ?>backend/hotels" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" id="hotel_id">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover" id="hotel_room_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Room Name</th>
                                        <th>Room Type</th>
                                        <th>Linked Room</th>
                                        <th>Max Rooms</th>
                                        <th>Standard Capacity</th>
                                        <th>Max Adults</th>
                                        <th>Max child</th>
                                        <th>Max Capacity</th>
                                        <th>Status</th>
                                        <?php if ($this->session->userdata('role')!=3) { ?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<?php init_tail(); ?>

