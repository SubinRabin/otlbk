<?php init_hotel_login_header(); ?>
<script src="<?php echo base_url(); ?>skin/js/hotel_portel_booking.js"></script>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
					<h3>Booking History</h3>
			</div>
			<div class="col-md-6">
					<span class="reject_msg"></span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</br>
	</br>
		<div class="col-md-12">
			<table class="table table-striped center" id="hotel_booking_history_table">
  				<thead class="thead-dark">
					<tr>
						<td>Slno</td>
            <td>Book Id</td>
						<td>Book Date</td>
            <td>confirmation</td>
						<td>Room Type</td>
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
	    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="height: 100px;">
        <p>Do you want cancel this booking?</p>
        <input type="hidden" name="id" id="id">
        <button type="button" id="reject_button" class="ml10 btn btn-danger pull-right">Yes</button>
        <button type="button" data-dismiss="modal" id="reject_button" class="close_but btn btn-primary ml10 pull-right">No</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="height: 200px;">
      	<form id="invoice_form" name="invoice_form" method="post">
        <div class="col-md-12 form-group">
        	<p>Do you want Accept this booking?</p>
        </div>
      	<div class="col-md-6 form-group">
      		<input type="text" class="form-control" id="booking_invoice_id" name="booking_invoice_id" placeholder="Invoice ID" >
      		<input type="hidden" name="id" id="booking_id">
      		<input type="hidden" name="invoice_ck" id="invoice_ck" value="0">
      		<span class="text-danger invoice_err"></span>
      	</div>
      	<div class="col-md-6 form-group">
      		<input type="date" class="form-control" id="booking_invoice_date" name="booking_invoice_date" placeholder="Invoice date" >
      		<span class="text-danger invoice_date_err"></span>
      	</div>
        <div class="col-md-12 form-group">
	        <button type="button" id="accept_button" class="ml10 btn btn-danger pull-right">Yes</button>
	        <button type="button" data-dismiss="modal" id="accept_no_button" class="close_but btn btn-primary ml10 pull-right">No</button>
        </div>
    	</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade col-md-6 col-md-offset-3" id="booking_success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <!-- Modal content-->
  
  </div>
</div>
<?php init_hotel_login_footer(); ?>

