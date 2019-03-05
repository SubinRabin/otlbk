<?php init_head(); 
$Booking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Hotel Booking'); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Hotel Request Details</span>
                        <?php  $hotelMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Hotels'); 
                        if($hotelMenu[0]->create!=0) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/offlinerequest/new_hotel_requests" class="btn-sm btn-primary">Add</a></span>
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
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="offline_booking_table">
                                <thead>
                                    <tr>
                                        <td>Slno</td>
                                        <td>Booking Id</td>
                                        <td>Booking Date</td>
                                        <td>Hotel Name</td>
                                        <td>Room Type</td>
                                        <td>Destination</td>
                                        <td>Supplier</td>
                                        <td>Check In</td>
                                        <td>Check Out</td>
                                        <td>No of days</td>
                                        <td>No of rooms</td>
                                        <td>Price</td>
                                        <td>Status</td>
                                        <td>Action</td>
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
</div>
<div class="modal fade delete_modal" id="reference_add_modal" role="dialog">
</div>
<div class="modal fade delete_modal" id="cancelModel" role="dialog">
</div>
<div class="modal fade delete_modal" id="rejectModel" role="dialog">
</div>
<div class="modal fade delete_modal" id="booking_modal" role="dialog">
</div>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
    var offline_booking_table = $('#offline_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/booking/offline_booking_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
// });
</script>
<?php init_tail(); ?>


