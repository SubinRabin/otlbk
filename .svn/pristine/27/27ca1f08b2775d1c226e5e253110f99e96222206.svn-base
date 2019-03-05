<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span><?php echo $_REQUEST['module'] ?> history Logs</span>
                        <span class="pull-right "><a href="<?php echo base_url(); ?>backend/dashboard/HistoryLogs" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <div class="tab-inn">
                        <input type="hidden" id="module" value="<?php echo $_REQUEST['module'] ?>">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover" id="History-log-view">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>User type</th>
                                        <th>User Name</th>
                                        <th>Event type</th>
                                        <th>Changes</th>
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
<script type="text/javascript">
    var module1 = $("#module").val();
    $('#History-log-view').dataTable({
        "bDestroy": true,
        "order": [[ 1, 'desc' ]],
        "ajax": {
            url : base_url+'/backend/dashboard/HistoryLogsViewList?module='+module1,
            type : 'GET'
        },

      "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
           return nRow;
        }
    });

</script>
<?php init_tail(); ?>

