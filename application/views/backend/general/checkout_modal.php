<div class="modal-content modal-content  col-md-6 col-md-offset-3">
  <form id="2checkout_form" method="post" action="<?php echo base_url(); ?>gateways/two_checkout/complete_purchase">
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
              <input class="form-control" id="ccNo" type="text" autocomplete="off" required  placeholder="credit card number"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
             <input class="form-control" id="expMonth" type="number" maxlength="2" required  placeholder="card expiration month(MM)"/>
          </div>
          <div class="col-md-6 form-group">
               <input class="form-control" id="expYear" type="number" maxlength="4" required placeholder="card expiration year(YYYY)" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
             <input class="form-control" id="cvv" type="text" autocomplete="off" required placeholder="cvv" />
          </div>
          <div class="col-md-6 form-group">
                <input type="email" name="email" class="form-control" required placeholder="billing email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <input type="text" name="billingName" class="form-control" required placeholder="card holder name">
          </div>
          <div class="col-md-6 form-group">
              <input type="text" name="billingAddress1" class="form-control" required placeholder="billing address1">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <input type="text" name="billingAddress2" class="form-control" placeholder="billingAddress2">
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
           <input type="text" name="currency" class="form-control" placeholder="currency" value="USD" readonly>
          </div>
        </div>

  </div>
  <div class="modal-footer">
    
      <input type="submit" class="btn-sm btn-success" value="Pay">
   
  </div>
  </form>
</div>

<script>
 
    // $(function(){
     // $('#2checkout_form').validate();
    // });
     // Called when token created successfully.
    var successCallback = function(data) {
        var myForm = document.getElementById('2checkout_form');
         // Set the token as the value for the token input
        myForm.token.value = data.response.token.token;
         // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
        $('#2checkout_form').find('input[type="submit"]').addClass('disabled');
        myForm.submit();
    };
     // Called when token creation fails.
   var errorCallback = function(data) {
      // Retry the token request if ajax call fails
      if (data.errorCode === 200) {
           console.log('failed');
           tokenRequest();
           // This error code indicates that the ajax call failed. We recommend that you retry the token request.
       } else {
         alert(data.errorMsg);
       }
   };
   var tokenRequest = function() {
       // Setup token request arguments
       var args = {
           sellerId: "<?php echo $checkoutdata[0]->account_number; ?>",
           publishableKey: "<?php echo $checkoutdata[0]->publishable_key; ?>",
           ccNo: $("#ccNo").val(),
           cvv: $("#cvv").val(),
           expMonth: $("#expMonth").val(),
           expYear: $("#expYear").val()
       };
       // Make the token request
       TCO.requestToken(successCallback, errorCallback, args);
   };
   // $(function() {
     TCO.loadPubKey('<?php echo $checkoutdata[0]->enable == 1 ? 'sandbox' : 'production'; ?>');
       $("#2checkout_form").submit(function(e) {
           // Call our token request function
           tokenRequest();
           // Prevent form from submitting
           return false;
       });
   // });
</script>
  
