<div class="modal-content modal-content  col-md-6 col-md-offset-3">
  <form id="2checkout_form" method="post" action="<?php echo base_url(); ?>gateways/braintree/complete_purchase">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">
        <div class="row">
          <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
                </div>
          <div class="col-md-6 form-group">
            <input type="number" name="total" id="total" class="form-control" placeholder="Amount">
             <input name="token" type="hidden" value="<?php echo $token ?>" />
          </div>
          <div class="col-md-6 form-group">
           <input type="text" name="currency" class="form-control" placeholder="currency">
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

