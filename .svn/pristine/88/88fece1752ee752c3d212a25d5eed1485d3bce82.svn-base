    <div class="modal-dialog ">
          <div class="modal-content">
                  <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Cancellations</h4>
                  </div>
                  <div class="modal-body">
                     
                         <form action="" name="cancel_form" id="cancel_form" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="RequestType" value="<?php echo $_REQUEST['status'] ?>">
                          <div class="row">
                              <div class="col-md-12 form-group">
                                    <label>Do you Want to Cancel this Booking?</label>
                                    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">
                                    <textarea class="form-cobtrol" name="narration" id="narration" placeholder="Enter cancellation feed back"></textarea>
                              </div>
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
    var book_id       = $("#id").val();
    var narration = $("#narration").val();
    if (narration=="") {
      addToast('Feed back field is required!',"orange");
      $("#narration").focus();
    } else {
      addToast('Upadted successfully',"green");
      $("#cancel_form").attr('action',base_url+'backend/booking/xmlcancellationUpdate');
      $("#cancel_form").submit();
    }
  });
  $("#no").click(function() {
    $("#cancel_form").attr('action',base_url+'backend/booking/cancellationno');
    $("#cancel_form").submit();
   });
// });
</script>
