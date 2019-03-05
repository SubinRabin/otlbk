  <!-- Modal content-->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
                <span>Do you want Accept this booking?</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Add Reference Id</h4> -->
        </div>
        <div class="modal-body">
               <!-- <form method="post" id="update_voucher_entry_form"> 
                <input type="text" class="form-control" name="refe_id" id="ref_id" value=""> -->
                <input type="hidden" name="book_id" id="book_id" value="<?php echo $_REQUEST['book_id'] ?>">
                <input type="hidden" name="agent_id" id="agent_id" value="<?php echo $_REQUEST['agent_id'] ?>">
                <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                <input type="hidden" id="checkInDate" value="<?php echo $_REQUEST['checkInDate'] ?>">
                <input type="hidden" id="total_amount" value="<?php echo array_sum(explode(",", $view[0]->individual_amount)) ?>">
                <input type="hidden" id="agent_markup" value="<?php echo $view[0]->agent_markup ?>">
                <input type="hidden" id="admin_markup" value="<?php echo $view[0]->admin_markup ?>">
                <input type="hidden" id="normal_price" value="<?php echo $view[0]->normal_price ?>">

                 <?php
                  $check_date = strtotime($_REQUEST['checkInDate']);
                  $today = strtotime(date('m/d/Y'));
                  if($check_date >= $today) {
                    $validateDate =  "true";
                  } else {
                    $validateDate =  "false";
                  }
                  ?>
                 <input type="hidden" id="validateDate" value="<?php echo $validateDate ?>">
      
                <form   action="" id="invoice_form" name="invoice_form" method="post">
                    <div class="row">
                      <div class="col-md-6 form-group">
                            <input type="hidden" class="form-control" id="booking_invoice_id" name="booking_invoice_id" placeholder="Invoice ID" readonly>
                            <input type="hidden" name="id" id="booking_id" value="<?php echo $_REQUEST['book_id'] ?>">
                            <input type="hidden" name="hotel_id" id="hotels_id" value="<?php echo $view[0]->hotel_id ?>">
                            <input type="hidden" name="agent_id" id="agents_id" value="<?php echo $view[0]->agent_id ?>">
                            <input type="hidden" name="invoice_ck" id="invoice_ck" value="0">
                            <span class="text-danger invoice_err"></span>
                      </div>
                      <div class="col-md-6 form-group">
                            <input type="hidden" class="form-control" id="booking_invoice_date" name="booking_invoice_date" placeholder="Invoice date" readonly >
                            <span class="text-danger invoice_date_err"></span>
                      </div> 

                      <?php if($view[0]->booking_flag==4) { ?>
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation" name="booking_confirmation" value="<?php echo $view[0]->confirmationNumber ?>" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation_name" name="booking_confirmation_name" value="<?php echo $view[0]->confirmationName ?>" readonly>
                        </div>
                        <?php   } else { ?>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" id="booking_confirmation" name="booking_confirmation" placeholder="Confirmation number">
                        </div>
                      <div class="col-md-6 form-group">
                          <input type="text" class="form-control" id="booking_confirmation_name" name="booking_confirmation_name" placeholder="Confirmation name">
                      </div>
                      <?php  } ?>
                        
                  </div>
                </form>
        </div>
    
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-12 form-group">
             <button type="button" data-dismiss="modal" id="accept_no_button" class="btn-sm btn-danger ">No</button>
             <button type="button" id="accept_button"  class="btn-sm btn-success">Yes</button>
           </div>
         </div>
        </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>

