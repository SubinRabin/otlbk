<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Transfer Suppliers </span>
                        <?php $supplierMenu = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Supplier'); 
                        if (count($supplierMenu)!=0 && $supplierMenu[0]->create==1) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/newsupplier" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="supplierTable">
                                <thead>
                                    <tr>
                                        <th>Supplier Code</th>
                                        <th>Supplier Name</th>
                                        <th>Landline Number</th> 
                                        <th>Sales Contact Person</th>
                                        <th>Sales Contact Number</th>
                                        <th>Sales Contact Email</th>
                                        <th>Credit Limit</th> 
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

