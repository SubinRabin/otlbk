<div class="modal-content modal-content  col-md-6 col-md-offset-3">
  <form id="2checkout_form" method="post" action="<?php echo base_url(); ?>gateways/authorize_aim/complete_purchase">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="number" name="total" id="total" class="form-control" placeholder="Amount">
             <input name="token" type="hidden" value="" />
          </div>
          <div class="col-md-6 form-group">
             <input class="form-control" name="ccNo" id="ccNo" type="text" autocomplete="off" required placeholder="Credit card number" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <input class="form-control" name="expMonth" id="expMonth" type="number" maxlength="2" required placeholder="Card Expiration Month" />
          </div>
          <div class="col-md-6 form-group">
               <input class="form-control" id="expYear" name="expYear" type="number" maxlength="4" required placeholder="card expiration year(YYYY)" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
             <input class="form-control" id="cvv" name="cvv" type="text" autocomplete="off" required placeholder="cvv" />
          </div>
           <div class="col-md-6 form-group">
              <input type="text" name="billingName" class="form-control" required placeholder="card holder name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <input type="text" name="billingAddress1" class="form-control" required placeholder="billing address1">
          </div>
          <div class="col-md-6 form-group">
               <input type="text" name="billingCity" class="form-control" required placeholder="biiling city">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
           <input type="text" name="billingState" class="form-control" placeholder="billingstate">
          </div>
          <div class="col-md-6 form-group">
               <input type="text" name="billingCountry" class="form-control" placeholder="billingCountry" >
          </div>
        </div>
         <div class="row">
          <div class="col-md-6 form-group">
           <input type="text" name="billingPostcode" class="form-control" placeholder="billing postcode">
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

