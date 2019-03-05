<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<style>
    html{
        overflow:scroll ! important;
    }
</style>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
					<div class="row">
						<div class="col-md-12">
							<h3>Booking List</h3>
							<!-- <span class="reject_msg"></span> -->
							<div class="row">
								<input type="hidden" id="filter" value="2">
				                <div class="col-md-12 mar_top_10">
				                    <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);padding-left: 0px;">
				                    	<li class="tab col s2"><a class="Pending active" href="#" onclick="bkfilter('2')">Pending</a></li>
				                    	<li class="tab col s2"><a class="CanPending" href="#" onclick="bkfilter('5')">Cancellation Pending</a></li>
				                    	<li class="tab col s2"><a class="AccPending" href="#" onclick="bkfilter('4')">Accept Pending</a></li>
				                    	<li class="tab col s2"><a class="Accepted" href="#" onclick="bkfilter('1')">Accepted</a></li>
<!-- 			                            <li class="tab col s2"><a class="Rejected" href="#" onclick="bkfilter('0')">Rejected</a></li> -->
			                            <li class="tab col s2"><a class="Cancelled" href="#" onclick="bkfilter('3')">Cancelled</a></li>
			                            <li class="tab col s2"><a class="OnRequest" href="#" onclick="bkfilter('8')">On Request</a></li>
				                        
				                    </ul>
				                </div>
				            </div>
						</div>
						<div class="clearfix"></div>
						</br>
						</br>
						<div class="col-md-12">
							<table class="table table-striped center" id="agent_booking_table">
				  				<thead class="thead-dark">
										<tr>
										<td>Slno</td>
										<td>Book Id</td>
										<td>Book date</td>
										<td>Hotel Name</td>
										<td>Room Type</td>
										<td>invoice</td>
										<td>voucher</td>
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


	    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  	
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var agent_booking_table = $('#agent_booking_table').dataTable({
	        "bDestroy": true,
	        "order": [[ 2, 'desc' ]],
	        "ajax": {
	            url : base_url+'Payment/agent_booking_list',
	            type : 'GET'
	        },
	    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
           return nRow;
        }
	  });
 	 });
</script>
<?php init_front_head_footer(); ?> 
