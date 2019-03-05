<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> XML Providers </span>
                        <?php $xmlMenu = menuPermissionAvailability($this->session->userdata('id'),'XML Providers',''); 
                        if($xmlMenu[0]->create!=0) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/xmlprovider/newprovider" class="btn-sm btn-primary">Add</a></span
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="xmlTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Connection String</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Commision</th> 
                                        <th>Disable/Enable</th>
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
<script src="<?php echo base_url(); ?>assets/js/xmlprovider.js"></script>
<?php init_tail(); ?>

