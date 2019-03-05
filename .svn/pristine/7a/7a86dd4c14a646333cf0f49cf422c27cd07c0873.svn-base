<?php init_head();
$usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>User Details </span>
                        <?php if ($usersmenu[0]->create!=0) { ?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/users/new_user" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mar_top_10">
                          <ul class="tabs">
                            <li class="tab col s3"><a class="Unblocked" href="#" onclick="filter('1')">Unblocked</a></li>
                            <li class="tab col s3"><a class="Blocked" href="#" onclick="filter('0')">Blocked</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="users_list_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <?php if ($usersmenu[0]->edit!=0) { ?>
                                        <th>Edit</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if ($usersmenu[0]->delete!=0) { ?>
                                        <th>Action</th>
                                        <?php } else{ ?>
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
</div>
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<?php init_tail(); ?>

