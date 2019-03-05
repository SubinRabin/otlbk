<?php init_head(); ?>
    <div class="sb2-2">
        <div class="sb2-2-1">
            <div class="inn-title">
                <span>Activity Logs</span>
             </div>
            <div class="clearfix"></div>
            <div class="col s3">
                <span class="pull-left">
                    <div class="input-group date">
                        <input type="text" id="activity_log_date" name="activity_log_date" class="form-control datepicker activity-log-date" value="">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar calendar-icon"></i>
                        </div>
                    </div>
                </span>
            </div>
            <div class="col s9">
                <?php $activitylogMenu = menuPermissionAvailability($this->session->userdata('id'),'Activity Logs','');  
                if (count($activitylogMenu)!=0 && $activitylogMenu[0]->delete==1) { ?>
                    <span class="pull-right"><a href="#" class="btn-sm btn-danger" id="ClearActivityLog">Clear Log</a></span>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                <div class="tab-inn">
                <table class="table" id="ActivityLog-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>User Type</th>
                            <th>User</th>
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
<script type="text/javascript">
    $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                var date = $(".datepicker").val();
                var ActivityLogtable = $('#ActivityLog-table').dataTable({
                        "bDestroy": true,
                        "ajax": {
                            url : base_url+'/backend/common/ActivityLogList?date='+date,
                            type : 'GET'
                        },
                    "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                    }
                  }); 
            }
        });
</script>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<?php init_tail(); ?>

