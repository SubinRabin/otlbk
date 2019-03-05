<?php init_head(); 
$Facilities = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotel Facilities'); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Hotel Facilities</span>
                        <?php if ($Facilities[0]->create!=0) { ?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/new_hotel_facilities" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="hotel_facility_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hotel Facilities</th>
                                        <th>Icons</th>
                                        <th>Date</th>
                                        <?php if($Facilities[0]->edit!=0) { ?>
                                        <th>Edit</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if($Facilities[0]->delete!=0){ ?>
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

