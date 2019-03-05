<?php init_head();
$RoomType = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Room Type'); 
 ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>All Room Types</span>
                        <?php if ($RoomType[0]->create!=0) { ?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/new_room_type" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="room_type_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Categories</th>
                                        <th>Date</th>
                                        <?php if($RoomType[0]->edit!=0) { ?>
                                        <th>Edit</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if($RoomType[0]->delete!=0){ ?>
                                        <th>Delete</th>
                                        <?php } else { ?>
                                        <th> </th> 
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

