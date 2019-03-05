<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Tour Requests </span>
                        <?php $tourMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Tours'); 
                        if (count($tourMenu)!=0 && $tourMenu[0]->create==1) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/offlinerequest/new_tour_requests" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                     <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            
                            <li class="tab col s2"><a class="Pending active" href="#" onclick="offlinefilter('2')">Pending</a></li>
                            <li class="tab col s2"><a class="Accepted" href="#" onclick="offlinefilter('1')">Accepted</a></li>
                           <!--  <li class="tab col s2"><a class="Rejected" href="#" onclick="offlinefilter('0')">Rejected</a></li> -->
                            <li class="tab col s2"><a class="Rejected" href="#" onclick="offlinefilter('0')">Cancelled</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="tourRequestTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking ID</th>
                                        <th>Request Date</th>
                                        <th>Type of Tour</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <th>Price</th> 
                                        <th>Status</th> 
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
<div class="modal fade delete_modal" id="reference_add_modal" role="dialog">
</div>
<div class="modal fade delete_modal" id="cancelModel" role="dialog">
</div>
<div class="modal fade delete_modal" id="rejectModel" role="dialog">
</div>
<div class="modal fade delete_modal" id="booking_modal" role="dialog">
</div>
<script type="text/javascript">
    var tourRequestTable = $('#tourRequestTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/offlinerequest/offline_tour_request_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
function OffllineTourRequestactionfun(id,val) {
  $("#booking_modal").load(base_url+"backend/offlinerequest/OfflineActionModal?id="+id+'&val='+val);
  $('#booking_modal').modal({
    backdrop: 'static',
    keyboard: false
  });
}
function offlinefilter(val) {
    var tourRequestTable = $('#tourRequestTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/offlinerequest/offline_tour_request_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
</script>
<?php init_tail(); ?>

