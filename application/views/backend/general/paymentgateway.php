<?php init_head(); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"> </script>
<script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script type="text/javascript">
    var url      = window.location.href;
    // alert(url);
    setTimeout(function(){ 
        if (url!= base_url+"backend/common/paymentgateway") {
            window.location = base_url+"backend/common/paymentgateway";
        }
     }, 3000);

</script>
<div class="sb2-2">
         <?php if (isset($_REQUEST['msg'])) { ?> 
           <script type="text/javascript">
                <?php if ($_REQUEST['msg']=='success') { ?>
                    addToast('Payment successfully','green');
                <?php } else { ?>
                    addToast('Payment failed','red');
                <?php } ?>
          </script>
          <?php } 
          $tabName =  $this->session->userdata('tabName');
          $gatewaysMenu = menuPermissionAvailability($this->session->userdata('id'),'General','Payment Gateways'); 
          ?>
        <div class="sb2-2-add-blog sb2-2-1 hotel-view-readonly">
            <h2>Payment Gateways  
            </h2>
            </br>
            <ul class="nav nav-tabs tab-list">
                <li class="checkout <?php echo $tabName=="" || $tabName=="2CheckOut" ? 'active' : '' ?>"><a data-toggle="tab" href="#checkout"><i class="fa fa-money" aria-hidden="true"></i> <span>2CheckOut</span></a>
                </li>
                <li class="paypal <?php echo $tabName=="Paypal" ? 'active' : '' ?>"><a data-toggle="tab" href="#paypal"><i class="fa fa-paypal" aria-hidden="true"></i> <span>Paypal</span></a>
                </li>
                <li class="braintree <?php echo $tabName=="Braintree" ? 'active' : '' ?>"><a data-toggle="tab" href="#braintree"><i class="fa fa-money" aria-hidden="true"></i> <span>Braintree</span></a>
                <li class="mollie <?php echo $tabName=="Mollie" ? 'active' : '' ?>"><a data-toggle="tab" href="#mollie"><i class="fa fa-money" aria-hidden="true"></i> <span>Mollie</span></a>
                </li>
                <li class="sim <?php echo $tabName=="authorizeSIM" ? 'active' : '' ?>"><a data-toggle="tab" href="#sim"><i class="fa fa-money" aria-hidden="true"></i> <span>Authorize.net SIM</span></a></li>
                <li class="aim <?php echo $tabName=="authorizeAIM" ? 'active' : '' ?>"><a data-toggle="tab" href="#aim"><i class="fa fa-money" aria-hidden="true"></i> <span>Authorize.net AIM</span></a></li>
                <li class="stripe <?php echo $tabName=="Stripe" ? 'active' : '' ?>"><a data-toggle="tab" href="#stripe"><i class="fa fa-cc-stripe" aria-hidden="true"></i> <span>Stripe</span></a></li>
                <li class="telr <?php echo $tabName=="Telr" ? 'active' : '' ?>"><a data-toggle="tab" href="#telr"><i class="fa fa-money" aria-hidden="true"></i> <span>Telr</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="checkout" class="tab-pane fade  <?php echo $tabName=="" || $tabName=="2CheckOut" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/checkoutsubmit" name="add_checkout_data_form" id="add_checkout_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="checkout_label_err">*</span></label>
                                    <input type="text" name="checkout_label" id="checkout_label" class="form-control" value="<?php if(isset($checkout[0]->label)) echo $checkout[0]->label; else echo "2CheckOut" ?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Accout Number(Seller ID)<span class="checkout_acc_num_err">*</span></label>
                                    <input type="text" name="checkout_acc_num" id="checkout_acc_num" class="form-control" value="<?php if(isset($checkout[0]->account_number)) echo $checkout[0]->account_number;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Private Key<span class="checkout_pvt_key_err">*</span></label>
                                    <input type="text" id="checkout_pvt_key" class="form-control" name="checkout_pvt_key"value="<?php if(isset($checkout[0]->private_key)) echo $checkout[0]->private_key;?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Publishable Key<span class="checkout_publish_key_err">*</span></label>
                                    <input type="text" name="checkout_publish_key" id="checkout_publish_key" class="form-control" value="<?php if(isset($checkout[0]->publishable_key)) echo $checkout[0]->publishable_key;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="checkout_currency_err">*</span></label>
                                    <input type="text" name="checkout_currency" id="checkout_currency" class="form-control" value="<?php if(isset($checkout[0]->currency)) echo $checkout[0]->currency;?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="checkout_accepting">Enable test mode</label></p>
                                    <input name="checkout_accepting" type="radio" class="with-gap" id="checkout_accepting_yes" value="1" <?php if(isset($checkout[0]->enable) && $checkout[0]->enable == '1') echo "checked";?>/>
                                    <label for="checkout_accepting_yes">Yes</label>
                                    <input name="checkout_accepting" type="radio" class="with-gap" id="checkout_accepting_no" value="0" <?php if(isset($checkout[0]->enable) && $checkout[0]->enable == '0') echo "checked"; elseif(empty($checkout[0]->enable)) echo "checked"?> />
                                    <label for="checkout_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="checkout_default">Selected by default on invoice</label></p>
                                    <input name="checkout_default" type="radio" class="with-gap" id="checkout_default_yes" value="1" <?php if(isset($checkout[0]->on_invoice) && $checkout[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="checkout_default_yes">Yes</label>
                                    <input name="checkout_default" type="radio" class="with-gap" id="checkout_default_no" value="0" <?php if(isset($checkout[0]->on_invoice) && $checkout[0]->on_invoice == '0') echo "checked"; elseif(empty($checkout[0]->on_invoice)) echo "checked"?>/>
                                    <label for="checkout_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="checkout_active">Active</label></p>
                                    <input name="checkout_active" type="radio" class="with-gap checkout_active" id="checkout_active_yes" value="1" <?php if(isset($checkout[0]->active) && $checkout[0]->active == '1') echo "checked";?>/>
                                    <label for="checkout_active_yes">Yes</label>
                                    <input name="checkout_active" type="radio" class="with-gap checkout_active" id="checkout_active_no" value="0" <?php if(isset($checkout[0]->active) && $checkout[0]->active == '0') echo "checked"; elseif(empty($checkout[0]->active)) echo "checked"?>/>
                                    <label for="checkout_active_no">No</label>
                            </div>  
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="checkout_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?> 
                        </form> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>    
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="checkout_modal">Test Payment </button>
                        <?php } ?>             
                    </div>
                </div>
                <div id="telr" class="tab-pane fade  <?php echo $tabName=="Telr" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/telrsubmit" name="add_telr_data_form" id="add_telr_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="telr_label_err">*</span></label>
                                    <input type="text" name="telr_label" id="telr_label" class="form-control" value="<?php if(isset($telr[0]->label)) echo $telr[0]->label; else echo "Telr" ?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Store ID<span class="telr_store_id_err">*</span></label>
                                    <input type="text" name="telr_store_id" id="telr_store_id" class="form-control" value="<?php if(isset($telr[0]->store_id)) echo $telr[0]->store_id;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Authorization Key<span class="telr_auth_id_err">*</span></label>
                                    <input type="text" id="telr_auth_id" class="form-control" name="telr_auth_id"value="<?php if(isset($telr[0]->auth_id)) echo $telr[0]->auth_id;?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="telr_accepting">Enable test mode</label></p>
                                    <input name="telr_accepting" type="radio" class="with-gap" id="telr_accepting_yes" value="1" <?php if(isset($telr[0]->test_enable) && $telr[0]->test_enable == '1') echo "checked";?>/>
                                    <label for="telr_accepting_yes">Yes</label>
                                    <input name="telr_accepting" type="radio" class="with-gap" id="telr_accepting_no" value="0" <?php if(isset($telr[0]->test_enable) && $telr[0]->test_enable == '0') echo "checked"; elseif(empty($telr[0]->test_enable)) echo "checked"?> />
                                    <label for="telr_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="telr_default">Selected by default on invoice</label></p>
                                    <input name="telr_default" type="radio" class="with-gap" id="telr_default_yes" value="1" <?php if(isset($telr[0]->on_invoice) && $telr[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="telr_default_yes">Yes</label>
                                    <input name="telr_default" type="radio" class="with-gap" id="telr_default_no" value="0" <?php if(isset($telr[0]->on_invoice) && $telr[0]->on_invoice == '0') echo "checked"; elseif(empty($telr[0]->on_invoice)) echo "checked"?>/>
                                    <label for="telr_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="telr_active">Active</label></p>
                                    <input name="telr_active" type="radio" class="with-gap telr_active" id="telr_active_yes" value="1" <?php if(isset($telr[0]->active) && $telr[0]->active == '1') echo "checked";?>/>
                                    <label for="telr_active_yes">Yes</label>
                                    <input name="telr_active" type="radio" class="with-gap telr_active" id="telr_active_no" value="0" <?php if(isset($telr[0]->active) && $telr[0]->active == '0') echo "checked"; elseif(empty($telr[0]->active)) echo "checked"?>/>
                                    <label for="telr_active_no">No</label>
                            </div>  
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="telr_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div> 
                        <?php } ?>
                        </form>   
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>  
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="telr_modal">Test Payment </button>
                        <?php } ?>             
                    </div>
                </div>
                <div id="paypal" class="tab-pane fade <?php echo $tabName=="Paypal" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/paypalsubmit" name="add_paypal_data_form" id="add_paypal_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="paypal_label_err">*</span></label>
                                    <input type="text" name="paypal_label" class="form-control" id="paypal_label" value="<?php if(isset($paypal[0]->label)) echo $paypal[0]->label; else echo "Paypal" ?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Paypal API Username<span class="paypal_username_err">*</span></label>
                                    <input type="text" name="paypal_username" class="form-control" id="paypal_username" value="<?php if(isset($paypal[0]->username)) echo $paypal[0]->username;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Paypal API Password<span class="paypal_password_err">*</span></label>
                                    <input type="text" class="form-control" name="paypal_password" id="paypal_password" value="<?php if(isset($paypal[0]->password)) echo $paypal[0]->password;?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>API Signature<span class="paypal_signature_err">*</span></label>
                                    <input type="text" name="paypal_signature" id="paypal_signature" class="form-control" value="<?php if(isset($paypal[0]->signature)) echo $paypal[0]->signature;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="paypal_currency_err">*</span></label>
                                    <input type="text" name="paypal_currency" id="paypal_currency" class="form-control" value="<?php if(isset($paypal[0]->currency)) echo $paypal[0]->currency;?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="paypal_accepting">Enable test mode</label></p>
                                    <input name="paypal_accepting" type="radio" class="with-gap" id="paypal_accepting_yes" value="1" <?php if(isset($paypal[0]->enable) && $paypal[0]->enable == '1') echo "checked";?>/>
                                    <label for="paypal_accepting_yes">Yes</label>
                                    <input name="paypal_accepting" type="radio" class="with-gap" id="paypal_accepting_no" value="0" <?php if(isset($paypal[0]->enable) && $paypal[0]->enable == '0') echo "checked"; elseif(empty($paypal[0]->enable)) echo "checked"?> />
                                    <label for="paypal_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="paypal_default">Selected by default on invoice</label></p>
                                    <input name="paypal_default" type="radio" class="with-gap" id="paypal_default_yes" value="1" <?php if(isset($paypal[0]->on_invoice) && $paypal[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="paypal_default_yes">Yes</label>
                                    <input name="paypal_default" type="radio" class="with-gap" id="paypal_default_no" value="0" <?php if(isset($paypal[0]->on_invoice) && $paypal[0]->on_invoice == '0') echo "checked"; elseif(empty($paypal[0]->on_invoice)) echo "checked"?>/>
                                    <label for="paypal_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="paypal_active">Active</label></p>
                                    <input name="paypal_active" type="radio" class="with-gap paypal_active" id="paypal_active_yes" value="1" <?php if(isset($paypal[0]->active) && $paypal[0]->active == '1') echo "checked";?>/>
                                    <label for="paypal_active_yes">Yes</label>
                                    <input name="paypal_active" type="radio" class="with-gap paypal_active" id="paypal_active_no" value="0" <?php if(isset($paypal[0]->active) && $paypal[0]->active == '0') echo "checked"; elseif(empty($paypal[0]->active)) echo "checked"?>/>
                                    <label for="paypal_active_no">No</label>
                            </div>  
                        </div>
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?> 
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="paypal_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div> 
                        <?php } ?>
                        </form> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="paypal_modal">Test Payment </button>
                        <?php } ?>
                    </div>
                </div>
                <div id="braintree" class="tab-pane fade <?php echo $tabName=="Braintree" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/braintreesubmit" name="add_braintree_data_form" id="add_braintree_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="braintree_label_err">*</span></label>
                                    <input type="text" name="braintree_label" id="braintree_label" class="form-control" value="<?php if(isset($braintree[0]->label)) echo $braintree[0]->label; else echo "Braintree"?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Merchant ID<span class="braintree_merchantid_err">*</span></label>
                                    <input type="text" name="braintree_merchantid" id="braintree_merchantid" class="form-control" value="<?php if(isset($braintree[0]->merchantID)) echo $braintree[0]->merchantID?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Public key<span class="braintree_pub_key_err">*</span></label>
                                    <input type="text" class="form-control" name="braintree_pub_key" id="braintree_pub_key" value="<?php if(isset($braintree[0]->public_key)) echo $braintree[0]->public_key?>" >
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Private Key<span class="braintree_pvt_key_err">*</span></label>
                                    <input type="text" name="braintree_pvt_key" id="braintree_pvt_key_err" class="form-control" value="<?php if(isset($braintree[0]->private_key)) echo $braintree[0]->private_key?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="braintree_currency_err">*</span></label>
                                    <input type="text" id="braintree_currency" name="braintree_currency" class="form-control" value="<?php if(isset($braintree[0]->currency)) echo $braintree[0]->currency?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="braintree_accepting">Enable test mode</label></p>
                                    <input name="braintree_accepting" type="radio" class="with-gap" id="braintree_accepting_yes" value="1" <?php if(isset($braintree[0]->enable) && $braintree[0]->enable == '1') echo "checked";?>/>
                                    <label for="braintree_accepting_yes">Yes</label>
                                    <input name="braintree_accepting" type="radio" class="with-gap" id="braintree_accepting_no" value="0" <?php if(isset($braintree[0]->enable) && $braintree[0]->enable == '0') echo "checked"; elseif(empty($braintree[0]->enable)) echo "checked"?> />
                                    <label for="braintree_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="braintree_default">Selected by default on invoice</label></p>
                                    <input name="braintree_default" type="radio" class="with-gap" id="braintree_default_yes" value="1" <?php if(isset($braintree[0]->on_invoice) && $braintree[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="braintree_default_yes">Yes</label>
                                    <input name="braintree_default" type="radio" class="with-gap" id="braintree_default_no" value="0" <?php if(isset($braintree[0]->on_invoice) && $braintree[0]->on_invoice == '0') echo "checked"; elseif(empty($braintree[0]->on_invoice)) echo "checked"?>/>
                                    <label for="braintree_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="braintree_active">Active</label></p>
                                    <input name="braintree_active" type="radio" class="with-gap braintree_active" id="braintree_active_yes" value="1" <?php if(isset($braintree[0]->active) && $braintree[0]->active == '1') echo "checked";?>/>
                                    <label for="braintree_active_yes">Yes</label>
                                    <input name="braintree_active" type="radio" class="with-gap braintree_active" id="braintree_active_no" value="0" <?php if(isset($braintree[0]->active) && $braintree[0]->active == '0') echo "checked"; elseif(empty($braintree[0]->active)) echo "checked"?>/>
                                    <label for="braintree_active_no">No</label>
                            </div>  
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="braintree_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?>
                        </form> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?> 
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="braintree_modal">Test Payment </button>
                        <?php } ?>         
                    </div>
                </div>
                <div id="mollie" class="tab-pane fade <?php echo $tabName=="Mollie" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/molliesubmit" name="add_mollie_data_form" id="add_mollie_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="mollie_label_err">*</span></label>
                                    <input type="text" name="mollie_label" id="mollie_label" class="form-control" value="<?php if(isset($mollie[0]->label)) echo $mollie[0]->label; else echo "Mollie"?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>API key<span class="mollie_api_key_err">*</span></label>
                                    <input type="text" id="mollie_api_key" name="mollie_api_key" class="form-control" value="<?php if(isset($mollie[0]->api_key)) echo $mollie[0]->api_key?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Curcency<span class="mollie_currency_err">*</span></label>
                                    <input type="text" class="form-control" id="mollie_currency" name="mollie_currency" value="<?php if(isset($mollie[0]->currency)) echo $mollie[0]->currency?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="mollie_accepting">Enable test mode</label></p>
                                    <input name="mollie_accepting" type="radio" class="with-gap" id="mollie_accepting_yes" value="1" <?php if(isset($mollie[0]->enable) && $mollie[0]->enable == '1') echo "checked";?>/>
                                    <label for="mollie_accepting_yes">Yes</label>
                                    <input name="mollie_accepting" type="radio" class="with-gap" id="mollie_accepting_no" value="0" <?php if(isset($mollie[0]->enable) && $mollie[0]->enable == '0') echo "checked"; elseif(empty($mollie[0]->enable)) echo "checked"?> />
                                    <label for="mollie_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="mollie_default">Selected by default on invoice</label></p>
                                    <input name="mollie_default" type="radio" class="with-gap" id="mollie_default_yes" value="1" <?php if(isset($mollie[0]->on_invoice) && $mollie[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="mollie_default_yes">Yes</label>
                                    <input name="mollie_default" type="radio" class="with-gap" id="mollie_default_no" value="0" <?php if(isset($mollie[0]->on_invoice) && $mollie[0]->on_invoice == '0') echo "checked"; elseif(empty($mollie[0]->on_invoice)) echo "checked"?>/>
                                    <label for="mollie_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="mollie_active">Active</label></p>
                                    <input name="mollie_active" type="radio" class="with-gap mollie_active" id="mollie_active_yes" value="1" <?php if(isset($mollie[0]->active) && $mollie[0]->active == '1') echo "checked";?>/>
                                    <label for="mollie_active_yes">Yes</label>
                                    <input name="mollie_active" type="radio" class="with-gap mollie_active" id="mollie_active_no" value="0" <?php if(isset($mollie[0]->active) && $mollie[0]->active == '0') echo "checked"; elseif(empty($mollie[0]->active)) echo "checked"?>/>
                                    <label for="mollie_active_no">No</label>
                            </div>  
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="mollie_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?>
                        </form>
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="mollie_modal">Test Payment </button>
                        <?php } ?>           
                    </div>
                </div>
                <div id="sim" class="tab-pane fade <?php echo $tabName=="authorizeSIM" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/authorizeSIMsubmit" name="add_authorizeSIM_data_form" id="add_authorizeSIM_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="authorizeSIM_label_err">*</span></label>
                                    <input type="text" name="authorizeSIM_label" id="authorizeSIM_label" class="form-control" value="<?php if(isset($authorizeSIM[0]->label)) echo $authorizeSIM[0]->label; else echo "Authorize.net SIM"?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>API Login ID<span class="authorizeSIM_loginid_err">*</span></label>
                                    <input type="text" name="authorizeSIM_loginid" class="form-control" id="authorizeSIM_loginid"  value="<?php if(isset($authorizeSIM[0]->loginid)) echo $authorizeSIM[0]->loginid?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>API Transaction ID<span class="authorizeSIM_trans_id_err">*</span></label>
                                    <input type="text" class="form-control" name="authorizeSIM_trans_id" id="authorizeSIM_trans_id" value="<?php if(isset($authorizeSIM[0]->trans_id)) echo $authorizeSIM[0]->trans_id?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Secret Key<span class="authorizeSIM_secret_key_err">*</span></label>
                                    <input type="text" name="authorizeSIM_secret_key" class="form-control" id="authorizeSIM_secret_key"value="<?php if(isset($authorizeSIM[0]->secret_key)) echo $authorizeSIM[0]->secret_key?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="authorizeSIM_currency_err">*</span></label>
                                    <input type="text" name="authorizeSIM_currency" class="form-control" id="authorizeSIM_currency" value="<?php if(isset($authorizeSIM[0]->currency)) echo $authorizeSIM[0]->currency?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeSIM_accepting">Enable test mode</label></p>
                                    <input name="authorizeSIM_accepting" type="radio" class="with-gap" id="authorizeSIM_accepting_yes" value="1" <?php if(isset($authorizeSIM[0]->test_enable) && $authorizeSIM[0]->test_enable == '1') echo "checked";?>/>
                                    <label for="authorizeSIM_accepting_yes">Yes</label>
                                    <input name="authorizeSIM_accepting" type="radio" class="with-gap" id="authorizeSIM_accepting_no" value="0" <?php if(isset($authorizeSIM[0]->test_enable) && $authorizeSIM[0]->test_enable == '0') echo "checked"; elseif(empty($authorizeSIM[0]->test_enable)) echo "checked"?> />
                                    <label for="authorizeSIM_accepting_no">No</label>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeSIM_default">Selected by default on invoice</label></p>
                                    <input name="authorizeSIM_default" type="radio" class="with-gap" id="authorizeSIM_default_yes" value="1" <?php if(isset($authorizeSIM[0]->on_invoice) && $authorizeSIM[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="authorizeSIM_default_yes">Yes</label>
                                    <input name="authorizeSIM_default" type="radio" class="with-gap" id="authorizeSIM_default_no" value="0" <?php if(isset($authorizeSIM[0]->on_invoice) && $authorizeSIM[0]->on_invoice == '0') echo "checked"; elseif(empty($authorizeSIM[0]->on_invoice)) echo "checked"?>/>
                                    <label for="authorizeSIM_default_no">No</label>
                            </div>
                            <div class="form-group col-md-6">
                                <p><label for="authorizeSIM_default">Enable developer mode</label></p>
                                    <input name="authorizeSIM_developer" type="radio" class="with-gap" id="authorizeSIM_developer_yes" value="1" <?php if(isset($authorizeSIM[0]->developer_enable) && $authorizeSIM[0]->developer_enable == '1') echo "checked";?>/>
                                    <label for="authorizeSIM_developer_yes">Yes</label>
                                    <input name="authorizeSIM_developer" type="radio" class="with-gap" id="authorizeSIM_developer_no" value="0" <?php if(isset($authorizeSIM[0]->developer_enable) && $authorizeSIM[0]->developer_enable == '0') echo "checked"; elseif(empty($authorizeSIM[0]->developer_enable)) echo "checked"?> />
                                    <label for="authorizeSIM_developer_no">No</label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeSIM_active">Active</label></p>
                                    <input name="authorizeSIM_active" type="radio" class="with-gap authorizeSIM_active" id="authorizeSIM_active_yes" value="1" <?php if(isset($authorizeSIM[0]->active) && $authorizeSIM[0]->active == '1') echo "checked";?>/>
                                    <label for="authorizeSIM_active_yes">Yes</label>
                                    <input name="authorizeSIM_active" type="radio" class="with-gap authorizeSIM_active" id="authorizeSIM_active_no" value="0" <?php if(isset($authorizeSIM[0]->active) && $authorizeSIM[0]->active == '0') echo "checked"; elseif(empty($authorizeSIM[0]->active)) echo "checked"?>/>
                                    <label for="authorizeSIM_active_no">No</label>
                            </div> 
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="authorizeSIM_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?>
                        </form> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?> 
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="authorizeSIM_modal">Test Payment </button> 
                        <?php } ?>       
                    </div>
                </div>
                <div id="aim" class="tab-pane fade <?php echo $tabName=="authorizeAIM" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/authorizeAIMsubmit" name="add_authorizeAIM_data_form" id="add_authorizeAIM_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="authorizeAIM_label_err">*</span></label>
                                    <input type="text" name="authorizeAIM_label" id="authorizeAIM_label" class="form-control" value="<?php if(isset($authorizeAIM[0]->label)) echo $authorizeAIM[0]->label; else echo "Authorize.net AIM"?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>API Login ID<span class="authorizeAIM_loginid_err">*</span></label>
                                    <input type="text" name="authorizeAIM_loginid" class="form-control" id="authorizeAIM_loginid"  value="<?php if(isset($authorizeAIM[0]->loginid)) echo $authorizeAIM[0]->loginid?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>API Transaction ID<span class="authorizeAIM_trans_id_err">*</span></label>
                                    <input type="text" class="form-control" name="authorizeAIM_trans_id" id="authorizeAIM_trans_id" value="<?php if(isset($authorizeAIM[0]->trans_id)) echo $authorizeAIM[0]->trans_id?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="authorizeAIM_currency_err">*</span></label>
                                    <input type="text" name="authorizeAIM_currency" class="form-control" id="authorizeAIM_currency" value="<?php if(isset($authorizeAIM[0]->currency)) echo $authorizeAIM[0]->currency?>">
                            </div>    
                        </div>
                        <div class="row">     
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeAIM_accepting">Enable test mode</label></p>
                                    <input name="authorizeAIM_accepting" type="radio" class="with-gap" id="authorizeAIM_accepting_yes" value="1" <?php if(isset($authorizeAIM[0]->test_enable) && $authorizeAIM[0]->test_enable == '1') echo "checked";?>/>
                                    <label for="authorizeAIM_accepting_yes">Yes</label>
                                    <input name="authorizeAIM_accepting" type="radio" class="with-gap" id="authorizeAIM_accepting_no" value="0" <?php if(isset($authorizeAIM[0]->test_enable) && $authorizeAIM[0]->test_enable == '0') echo "checked"; elseif(empty($authorizeAIM[0]->test_enable)) echo "checked"?> />
                                    <label for="authorizeAIM_accepting_no">No</label>
                            </div> 
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeAIM_default">Selected by default on invoice</label></p>
                                    <input name="authorizeAIM_default" type="radio" class="with-gap" id="authorizeAIM_default_yes" value="1" <?php if(isset($authorizeAIM[0]->on_invoice) && $authorizeAIM[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="authorizeAIM_default_yes">Yes</label>
                                    <input name="authorizeAIM_default" type="radio" class="with-gap" id="authorizeAIM_default_no" value="0" <?php if(isset($authorizeAIM[0]->on_invoice) && $authorizeAIM[0]->on_invoice == '0') echo "checked"; elseif(empty($authorizeAIM[0]->on_invoice)) echo "checked"?>/>
                                    <label for="authorizeAIM_default_no">No</label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <p><label for="authorizeAIM_active">Active</label></p>
                                    <input name="authorizeAIM_active" type="radio" class="with-gap authorizeAIM_active" id="authorizeAIM_active_yes" value="1" <?php if(isset($authorizeAIM[0]->active) && $authorizeAIM[0]->active == '1') echo "checked";?>/>
                                    <label for="authorizeAIM_active_yes">Yes</label>
                                    <input name="authorizeAIM_active" type="radio" class="with-gap authorizeAIM_active" id="authorizeAIM_active_no" value="0" <?php if(isset($authorizeAIM[0]->active) && $authorizeAIM[0]->active == '0') echo "checked"; elseif(empty($authorizeAIM[0]->active)) echo "checked"?>/>
                                    <label for="authorizeAIM_active_no">No</label>
                            </div> 
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="authorizeAIM_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?>
                        </form> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="authorizeAIM_modal">Test Payment </button>
                        <?php } ?>              
                    </div>
                </div>
                <div id="stripe" class="tab-pane fade <?php echo $tabName=="Stripe" ? 'in active' : '' ?>">
                    <div class="bor mar_top_0">
                        <form action="<?php echo base_url(); ?>backend/common/stripesubmit" name="add_stripe_data_form" id="add_stripe_data_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Label<span class="stripe_label_err">*</span></label>
                                    <input type="text" name="stripe_label" id="stripe_label" class="form-control" value="<?php if(isset($stripe[0]->label)) echo $stripe[0]->label; else echo "Stripe"?>">
                            </div>
                            <div class="form-group col-md-6">
                                    <label>API secret key<span class="stripe_secret_key_err">*</span></label>
                                    <input type="text" name="stripe_secret_key" id="stripe_secret_key" class="form-control" value="<?php if(isset($stripe[0]->secret_key)) echo $stripe[0]->secret_key?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                    <label>Publishable key<span class="stripe_pub_key_err">*</span></label>
                                    <input type="text" class="form-control" name="stripe_pub_key" id="stripe_pub_key" value="<?php if(isset($stripe[0]->public_key)) echo $stripe[0]->public_key?>" >
                            </div>
                            <div class="form-group col-md-6">
                                    <label>Currency<span class="stripe_currency_err">*</span></label>
                                    <input type="text" id="stripe_currency" name="stripe_currency" class="form-control" value="<?php if(isset($stripe[0]->currency)) echo $stripe[0]->currency?>">
                            </div>   
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                    <p><label for="stripe_accepting">Enable test mode</label></p>
                                    <input name="stripe_accepting" type="radio" class="with-gap" id="stripe_accepting_yes" value="1" <?php if(isset($stripe[0]->enable) && $stripe[0]->enable == '1') echo "checked";?>/>
                                    <label for="stripe_accepting_yes">Yes</label>
                                    <input name="stripe_accepting" type="radio" class="with-gap" id="stripe_accepting_no" value="0" <?php if(isset($stripe[0]->enable) && $stripe[0]->enable == '0') echo "checked"; elseif(empty($stripe[0]->enable)) echo "checked"?> />
                                    <label for="stripe_accepting_no">No</label>
                            </div> 
                            <div class="form-group col-md-6">
                                    <p><label for="stripe_default">Selected by default on invoice</label></p>
                                    <input name="stripe_default" type="radio" class="with-gap" id="stripe_default_yes" value="1" <?php if(isset($stripe[0]->on_invoice) && $stripe[0]->on_invoice == '1') echo "checked";?>/>
                                    <label for="stripe_default_yes">Yes</label>
                                    <input name="stripe_default" type="radio" class="with-gap" id="stripe_default_no" value="0" <?php if(isset($stripe[0]->on_invoice) && $stripe[0]->on_invoice == '0') echo "checked"; elseif(empty($stripe[0]->on_invoice)) echo "checked"?>/>
                                    <label for="stripe_default_no">No</label>
                            </div>
                        </div> 
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                    <p><label for="stripe_active">Active</label></p>
                                    <input name="stripe_active" type="radio" class="with-gap stripe_active" id="stripe_active_yes" value="1" <?php if(isset($stripe[0]->active) && $stripe[0]->active == '1') echo "checked";?>/>
                                    <label for="stripe_active_yes">Yes</label>
                                    <input name="stripe_active" type="radio" class="with-gap stripe_active" id="stripe_active_no" value="0" <?php if(isset($stripe[0]->active) && $stripe[0]->active == '0') echo "checked"; elseif(empty($stripe[0]->active)) echo "checked"?>/>
                                    <label for="stripe_active_no">No</label>
                            </div>  
                        </div> 
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-6">
                                        <input type="submit" id="stripe_submit_button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Update">
                                </div>  
                            </div>
                        <?php } ?>
                        </form>
                        <?php  if (count($gatewaysMenu)!=0 && $gatewaysMenu[0]->edit==1) { ?>
                           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="stripe_modal">Test Payment </button>  
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade delete_modal" role="dialog"></div>   
</div>
 </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/paymentgateway.js"></script>
<script>
// window.onload = function() {
//     window.setTimeout(function(){
//         message_hide();
//     }, 3000);
// };
// function message_hide() {
//     $(".sucess_msg_fix_toaster").hide();
// }
$("#paypal_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/paypal_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#checkout_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/checkout_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#braintree_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/braintree_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#mollie_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/mollie_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#authorizeAIM_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/authorizeAIM_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#authorizeSIM_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/authorizeSIM_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#stripe_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/stripe_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});
$("#telr_modal").click(function(){
   $("#myModal").load(base_url+"backend/common/telr_modal");
   $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
  });
});

</script>

<?php init_tail(); ?>

