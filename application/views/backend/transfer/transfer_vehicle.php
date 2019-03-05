<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Transfer vehicle </span>
                        <?php $vehicleMenu = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Vehicle'); 
                        if (count($vehicleMenu)!=0 && $vehicleMenu[0]->create==1) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/newvehicle" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <input type="hidden" id="module" value="vehicle">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="vehicleTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vehicle Code</th>
                                        <th>Supplier Code</th>
                                        <th>Vehicle Name</th> 
                                        <th>Passengers</th>
                                        <th>bags</th>
                                        <th>Country & City</th>
                                        <th>Waiting time</th> 
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
</div>
<script src="<?php echo base_url(); ?>assets/js/transfer.js"></script>
<?php init_tail(); ?>

