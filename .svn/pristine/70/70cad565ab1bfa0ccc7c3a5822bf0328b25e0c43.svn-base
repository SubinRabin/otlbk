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
                        <span>Hotel Booking Details</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            
                            <li class="tab col"><a class="Pending active" href="#" onclick="filter('2')">Pending</a></li>
                            <li class="tab col"><a class="Rejected" href="#" onclick="filter('5')">Cancellation Pending</a></li>
                            <li class="tab col"><a class="Rejected" href="#" onclick="filter('4')">Hotel Approved</a></li>
                            <li class="tab col"><a class="Accepted" href="#" onclick="filter('1')">Accepted</a></li>
                           <!--  <li class="tab col"><a class="Rejected" href="#" onclick="filter('0')">Rejected</a></li> -->
                            <li class="tab col"><a class="Rejected" href="#" onclick="filter('3')">Cancelled</a></li>
                            <li class="tab col"><a class="Rejected" href="#" onclick="filter('8')">On Request</a></li>
                            <li class="tab col"><a class="Amendment" href="#" onclick="filter('9')">Amendment</a></li>

                          </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="hotel_booking_table">
                                <thead>
                                    <tr>
                                        <td>Slno</td>
                                        <td>Booking Id</td>
                                        <td>Booking Date</td>
                                        <td>Hotel Name</td>
                                        <td>Room Type</td>
                                        <td>Check In</td>
                                        <td>Check Out</td>
                                        <td>No of days</td>
                                        <td>No of rooms</td>
                                        <td>Price</td>
                                        <td>Status</td>
                                        <td title="Confirmation Number">C No</td>
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
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
    var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "order": [[ 2, 'desc' ]],
        "ajax": {
            url : base_url+'/backend/booking/hotel_booking_list',
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  });
// });
</script>
<?php init_tail(); ?>


