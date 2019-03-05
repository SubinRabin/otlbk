<?php init_head();
$Iconmenu = menuPermissionAvailability($this->session->userdata('id'),'General','Add Icons'); 
 ?>
    <div class="sb2-2">
        <div class="sb2-2-1">
            <div class="col s6">
                <h2>All Icons</h2>
            </div>
            <div class="col s6">
                <?php if ($Iconmenu[0]->create!=0) { ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/common/icons_add_view" class="btn-sm btn-primary">Add</a></span>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                <table class="table" id="icon_list_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon Name</th>
                            <th>Icon</th>
                            <th>Created date</th>
                            <?php if ($Iconmenu[0]->edit!=0) { ?>
                            <th>Edit</th>
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
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<?php init_tail(); ?>

