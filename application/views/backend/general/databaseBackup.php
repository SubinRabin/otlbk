<?php init_head(); ?>
    <div class="sb2-2">
        <div class="sb2-2-1">
            <div class="col s6">
                <h2>Database Backup</h2>
            </div>
            <div class="col s6">
                <?php $dbMenu = menuPermissionAvailability($this->session->userdata('id'),'General','Database Backup'); 
                if (count($dbMenu)!=0 && $dbMenu[0]->create==1) { ?>
                    <span class="pull-right"><a href="#" class="btn-sm btn-primary" id="CreateBackupDb">Create Database Backup</a></span>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                <div class="tab-inn">
                <table class="table" id="DatabaseBackup-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Backup</th>
                            <th>Backup size</th>
                            <th>Date</th>
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
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<?php init_tail(); ?>

