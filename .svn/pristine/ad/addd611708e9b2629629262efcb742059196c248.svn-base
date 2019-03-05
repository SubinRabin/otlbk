    <div class="modal-dialog ">
          <div class="modal-content">
                  <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Cancellations</h4>
                  </div>
                  <div class="modal-body">
                     
                         <form action="" name="cancel_form" id="cancel_form" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-12 form-group">
                                    <label>Do you Want to Cancel this Booking?</label>
                                       
                                        <input type="hidden" name="book_id" id="book_id" value="<?php echo $_REQUEST['book_id'] ?>">
                              </div>
                      </form>
                    </div>
                           <div class="modal-footer">
                              <div class="row">
                                    <button type="button" id="no" class="btn-sm btn-danger">No</button>
                                    <button type="button" id="CancelYes" class="btn-sm btn-primary">Yes</button> &nbsp
                              </div>
                          </div>
                     
                  
          </div>
      </div>
<script src="<?php echo base_url(); ?>assets/js/referance_add.js"></script>
<script type="text/javascript">
  // $(document).ready(function() {

  $("#CancelYes").click(function() {
    var book_id       = $("#book_id").val();
    addToast('Updated successfully',"green");
       $("#cancel_form").attr('action',base_url+'backend/booking/transfercancellationUpdate');
       $("#cancel_form").submit();
  });
  $("#no").click(function() {
    $("#cancel_form").attr('action',base_url+'backend/booking/transfercancellationno');
    $("#cancel_form").submit();
   });
// });
</script>
