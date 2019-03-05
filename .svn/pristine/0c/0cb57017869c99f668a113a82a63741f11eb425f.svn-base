<?php init_head(); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Transfer Booking Details</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Pending active" href="#" onclick="transferlistfilter('2')">Pending</a></li>
                            <li class="tab col s2"><a class="Accepted" href="#" onclick="transferlistfilter('1')">Accepted</a></li>
                            <li class="tab col s2"><a class="Rejected" href="#" onclick="transferlistfilter('3')">Cancelled</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="transfer_booking_table">
                                <thead>
                                    <tr>
                                       <td>Slno</td>
                                        <td>Book Id</td>
                                        <td>Book date</td>
                                        <td>Transfer Type</td>
                                        <td>Arrival</td>
                                        <td>Pickup/Dropoff</td>
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
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
    var transfer_booking_table = $('#transfer_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/booking/transfer_booking_list',
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  });

</script>
<?php init_tail(); ?>


