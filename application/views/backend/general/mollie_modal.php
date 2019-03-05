<div class="modal-content modal-content  col-md-6 col-md-offset-3">
  <form id="2checkout_form" method="post" action="<?php echo base_url(); ?>backend/common/TestPaymentGateway_Mollie">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">
        <div class="row">
          <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount"> 
          </div>
          <div class="col-md-6 form-group">
           <input type="text" name="currency" class="form-control" readonly placeholder="currency" value="EUR">
          </div>
        </div>

  </div>
  <div class="modal-footer">
    
      <input type="submit" class="btn-sm btn-success" value="Pay">
   
  </div>
  </form>
</div>
<script>
    braintree.setup('<?php echo $token; ?>', 'dropin', {
      container: 'bt-dropin'
    });
</script>

