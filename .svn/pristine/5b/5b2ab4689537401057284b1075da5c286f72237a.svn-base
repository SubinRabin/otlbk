$(".checkout_active").click(function() {
    var err=0;
    var active=$('input[name=checkout_active]:checked').val();
    var label = $("#checkout_label").val();
    var acc_num = $("#checkout_acc_num").val();
    var pvt_key = $("#checkout_pvt_key").val();
    var publish_key = $("#checkout_publish_key").val();
    var currency = $("#checkout_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".checkout_label_err").css("color","red");
          err++;
        } 
        if(acc_num=="") {
          $(".checkout_acc_num_err").css("color","red");
          err++;
        } 
        if(pvt_key=="") {
          $(".checkout_pvt_key_err").css("color","red");
          err++;
        } 
        if(publish_key=="") {
          $(".checkout_publish_key_err").css("color","red");
          err++;
        } 
        if(currency=="") {
          $(".checkout_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#checkout_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".checkout_label_err").css("color","black");
            $(".checkout_acc_num_err").css("color","black");
            $(".checkout_pvt_key_err").css("color","black");
            $(".checkout_publish_key_err").css("color","black");
            $(".checkout_currency_err").css("color","black");
        }    
      }
})
$("#checkout_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_checkout_data_form").submit();
});
$(".paypal_active").click(function() {
    var err=0;
    var active=$('input[name=paypal_active]:checked').val();
    var label = $("#paypal_label").val();
    var username = $("#paypal_username").val();
    var password = $("#paypal_password").val();
    var signature = $("#paypal_signature").val();
    var currency = $("#paypal_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".paypal_label_err").css("color","red");
          err++;
        } 
        if(username=="") {
          $(".paypal_username_err").css("color","red");
          err++;
        } 
        if(password=="") {
          $(".paypal_password_err").css("color","red");
          err++;
        } 
        if(signature=="") {
          $(".paypal_signature_err").css("color","red");
          err++;
        } 
        if(currency=="") {
          $(".paypal_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#paypal_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".paypal_label_err").css("color","black");
            $(".paypal_username_err").css("color","black");
            $(".paypal_password_err").css("color","black");
            $(".paypal_signature_err").css("color","black");
            $(".paypal_currency_err").css("color","black");
        }    
      }
})
$("#paypal_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_paypal_data_form").submit();
});
$(".braintree_active").click(function() {
    var err=0;
    var active=$('input[name=braintree_active]:checked').val();
    var label = $("#braintree_label").val();
    var merchantid = $("#braintree_merchantid").val();
    var public_key = $("#braintree_pub_key").val();
    var private_key = $("#braintree_pvt_key").val();
    var currency = $("#braintree_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".braintree_label_err").css("color","red");
          err++;
        } 
        if(merchantid=="") {
          $(".braintree_merchantid_err").css("color","red");
          err++;
        } 
        if(public_key=="") {
          $(".braintree_pub_key_err").css("color","red");
          err++;
        } 
        if(private_key=="") {
          $(".braintree_pvt_key_err").css("color","red");
          err++;
        } 
        if(currency=="") {
          $(".braintree_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#braintree_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".braintree_label_err").css("color","black");
            $(".braintree_merchantid_err").css("color","black");
            $(".braintree_pub_key_err").css("color","black");
            $(".braintree_pvt_key_err").css("color","black");
            $(".braintree_currency_err").css("color","black");
        }    
      }
})
$("#braintree_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_braintree_data_form").submit();
});
$(".mollie_active").click(function() {
    var err=0;
    var active=$('input[name=mollie_active]:checked').val();
    var label = $("#mollie_label").val();
    var key = $("#mollie_api_key").val();
    var currency = $("#mollie_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".mollie_label_err").css("color","red");
          err++;
        } 
        if(key=="") {
          $(".mollie_api_key_err").css("color","red");
          err++;
        } 
        if(currency=="") {
          $(".mollie_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#mollie_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".mollie_label_err").css("color","black");
            $(".mollie_api_key_err").css("color","black");
            $(".mollie_currency_err").css("color","black");
        }    
      }
})
$("#mollie_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_mollie_data_form").submit();
});
$(".authorizeSIM_active").click(function() {
    var err=0;
    var active=$('input[name=authorizeSIM_active]:checked').val();
    var label = $("#authorizeSIM_label").val();
    var loginid = $("#authorizeSIM_loginid").val();
    var transid = $("#authorizeSIM_trans_id").val();
    var key = $("#authorizeSIM_secret_key").val();
    var currency = $("#authorizeSIM_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".authorizeSIM_label_err").css("color","red");
          err++;
        } 
        if(loginid=="") {
          $(".authorizeSIM_loginid_err").css("color","red");
          err++;
        } 
        if(transid=="") {
          $(".authorizeSIM_trans_id_err").css("color","red");
          err++;
        }
        if(key=="") {
          $(".authorizeSIM_secret_key_err").css("color","red");
          err++;
        }
        if(currency=="") {
          $(".authorizeSIM_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#authorizeSIM_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".authorizeSIM_label_err").css("color","black");
            $(".authorizeSIM_loginid_err").css("color","black");
            $(".authorizeSIM_trans_id_err").css("color","black");
            $(".authorizeSIM_secret_key_err").css("color","black");
            $(".authorizeSIM_currency_err").css("color","black");
        }    
      }
})
$("#authorizeSIM_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_authorizeSIM_data_form").submit();
});
$(".authorizeAIM_active").click(function() {
    var err=0;
    var active=$('input[name=authorizeAIM_active]:checked').val();
    var label = $("#authorizeAIM_label").val();
    var loginid = $("#authorizeAIM_loginid").val();
    var transid = $("#authorizeAIM_trans_id").val();
    var currency = $("#authorizeAIM_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".authorizeAIM_label_err").css("color","red");
          err++;
        } 
        if(loginid=="") {
          $(".authorizeAIM_loginid_err").css("color","red");
          err++;
        } 
        if(transid=="") {
          $(".authorizeAIM_trans_id_err").css("color","red");
          err++;
        }
        if(currency=="") {
          $(".authorizeAIM_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#authorizeAIM_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".authorizeAIM_label_err").css("color","black");
            $(".authorizeAIM_loginid_err").css("color","black");
            $(".authorizeAIM_trans_id_err").css("color","black");
            $(".authorizeAIM_currency_err").css("color","black");
        }    
      }
})
$("#authorizeAIM_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_authorizeAIM_data_form").submit();
});
$(".stripe_active").click(function() {
    var err=0;
    var active=$('input[name=stripe_active]:checked').val();
    var label = $("#stripe_label").val();
    var secret_key = $("#stripe_secret_key").val();
    var public_key = $("#stripe_pub_key").val();
    var currency = $("#stripe_currency").val();
      if(active== 1) {
        if(label=="") {
          $(".stripe_label_err").css("color","red");
          err++;
        } 
        if(secret_key=="") {
          $(".stripe_secret_key_err").css("color","red");
          err++;
        } 
        if(public_key=="") {
          $(".stripe_pub_key_err").css("color","red");
          err++;
        } 
        if(currency=="") {
          $(".stripe_currency_err").css("color","red");
          err++;
        }
        if(err>0){
          $("#stripe_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".stripe_label_err").css("color","black");
            $(".stripe_secret_key_err").css("color","black");
            $(".braintree_pub_key_err").css("color","black");
            $(".stripe_currency_err").css("color","black");
        }    
      }
})
$("#stripe_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_stripe_data_form").submit();
});
$("#test_paypal_button_submit").click(function(){
    addToast('Updated Successfully','green');
    $("#paypal_test_action").submit();
});
$("#test_checkout_button_submit").click(function(){
    addToast('Updated Successfully','green');
    $("#checkout_test_action").submit();
});
$(".telr_active").click(function() {
    var err=0;
    var active=$('input[name=checkout_active]:checked').val();
    var label = $("#telr_label").val();
    var store_id = $("#telr_store_id").val();
    var auth_id = $("#telr_auth_id").val();
      if(active== 1) {
        if(label=="") {
          $(".telr_label_err").css("color","red");
          err++;
        } 
        if(store_id=="") {
          $(".telr_store_id_err").css("color","red");
          err++;
        } 
        if(auth_id=="") {
          $(".telr_auth_id_err").css("color","red");
          err++;
        } 
        if(err>0){
          $("#telr_active_no"). prop("checked", true);
          addToast("All fields are mandatory to make it active!","orange");
        } else {
            $(".telr_label_err").css("color","black");
            $(".telr_store_id_err").css("color","black");
            $(".telr_auth_id_err").css("color","black");
        }    
      }
})
$("#telr_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#add_telr_data_form").submit();
});