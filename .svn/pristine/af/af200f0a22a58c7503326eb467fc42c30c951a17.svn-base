<?php init_head(); 
$RoomAminities = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Room Aminities'); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Room Aminities</span>
                        <?php if ($RoomAminities[0]->create!=0) { ?>
                        <span class="pull-right"><a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#AminitiesModal" onclick="roomAminities_Modal();">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <!-- <?php print_r($RoomAminities); ?> -->
                            <table class="table table-condensed table-hover" id="room_aminities_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aminities</th>
                                        <th>Action</th>
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
<!-- Modal -->
<div id="AminitiesModal" class="modal fade delete_modal" role="dialog">
  
</div>
<?php init_tail(); ?>

