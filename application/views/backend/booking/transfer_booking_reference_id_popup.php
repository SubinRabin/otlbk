  <!-- Modal content-->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
                <span>Do you want Accept this booking?</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <input type="hidden" name="book_id" id="book_id" value="<?php echo $_REQUEST['book_id'] ?>">
                <input type="hidden" name="agent_id" id="agent_id" value="<?php echo $_REQUEST['agent_id'] ?>">
                <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo $_REQUEST['vehicle_id'] ?>">
                <input type="hidden" id="agent_markup" value="<?php echo $view[0]->agent_markup ?>">
                <input type="hidden" id="admin_markup" value="<?php echo $view[0]->admin_markup ?>">
                <form   action="" id="invoice_form" name="invoice_form" method="post">
                    <input type="hidden" name="bookid" id="bookid" value="<?php echo $view[0]->id ?>">
                    <input type="hidden" name="vehicleid" id="vehicleid" value="<?php echo $view[0]->vehicleid ?>">
                    <input type="hidden" name="agent_id" id="agents_id" value="<?php echo $view[0]->agent_id ?>">
                </form>
                <!-- <h4 class="modal-title">Add Reference Id</h4> -->
        </div>
       <!--  <div class="modal-body">       
                <form   action="" id="invoice_form" name="invoice_form" method="post">
                  <div class="row">
                      <div class="col-md-6 form-group">
                            <input type="hidden" class="form-control" id="booking_invoice_id" name="booking_invoice_id" placeholder="Invoice ID" readonly>
                           
                            <input type="hidden" name="invoice_ck" id="invoice_ck" value="0">
                            <span class="text-danger invoice_err"></span>
                      </div>
                      <div class="col-md-6 form-group">
                            <input type="hidden" class="form-control" id="booking_invoice_date" name="booking_invoice_date" placeholder="Invoice date" readonly >
                            <span class="text-danger invoice_date_err"></span>
                      </div>                       
                  </div> 
                </form>
        </div> -->
    
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-12 form-group">
             <button type="button" data-dismiss="modal" id="accept_no_button" class="btn-sm btn-danger ">No</button>
             <button type="button" id="transfer_accept_button"  class="btn-sm btn-success">Yes</button>
           </div>
         </div>
        </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<script type="text/javascript">
  $("#transfer_accept_button").click(function(e) {
      var book_id = $("#bookid").val();
      var vehicle_id = $("#vehicleid").val();
      var agent_id = $("#agentid").val();
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/transfer_portel_admin_permission?id='+book_id+'&vehicle_id='+vehicle_id+'&agent_id='+agent_id,
            cache: false,
            success: function(response) {
              addToast("Accepted Successfully","green");
              document.location.reload(true);
           
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
      });
</script>
