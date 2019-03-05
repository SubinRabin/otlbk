$(document).ready(function() {
	$('#login_form_button').click(function (e) {
		var url = $("#login_form").attr("action");
      e.preventDefault();
      $.ajax({
      	dataType: 'json',
        type: 'post',
        url: 'login',
        data: $('#login_form').serialize(),
		cache: false,
        success: function (response) {
        	if (response.status == "1") {
            addToast(response.error,response.color);
            // window.setTimeout(function(){
               $("#login_form").submit();
            // }, 1000);
        	} else {
        		addToast(response.error,response.color);
        	}
        },
         error: function (xhr,status,error) {
           window.location = base_url+"backend/";
        }
      });

    });
  $('#login_form_frontend_button').click(function (e) {
    var url = $("#front_login").attr("action");
      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: 'login',
        data: $('#front_login').serialize(),
        cache: false,
        success: function (response) {
          if (response.status == "1") {
               $("#front_login").submit();
          } else {
            $('.login-wrap').animo( { animation: 'tada' } );
            $(".error_msg").text(response.error);
          }
        }
      });

    });
  $("#check1").click(function(){
    if($(this).is(':checked')){     
    var sale_name     = $("#sale_name").val();
    var sale_mail     = $("#sale_mail").val();
    var sale_number   = $("#sale_number").val();
    var sale_password = $("#sale_password").val();
    $("#revenu_name").val(sale_name);
    $("#revenu_mail").val(sale_mail);
    $("#revenu_number").val(sale_number);
    $("#revenu_password").val(sale_password);
    }
  });
   $("#check2").click(function(){
    if($(this).is(':checked')){
    var revenu_name     = $("#revenu_name").val();
    var revenu_mail     = $("#revenu_mail").val();
    var revenu_number   = $("#revenu_number").val();
    var revenu_password = $("#revenu_password").val();
    $("#contract_name").val(revenu_name);
    $("#contract_mail").val(revenu_mail);
    $("#contract_number").val(revenu_number);
    $("#contract_password").val(revenu_password);
    
     }
  });
  $("#check3").click(function(){
    if($(this).is(':checked')){
    var contract_name     = $("#contract_name").val();
    var contract_mail     = $("#contract_mail").val();
    var contract_number   = $("#contract_number").val();
    var contract_password = $("#contract_password").val();
    $("#finance_name").val(contract_name);
    $("#finance_mail").val(contract_mail);
    $("#finance_number").val(contract_number);
    $("#finance_password").val(contract_password);
    
     }
  });
  $('#login_form_add_hotel').click(function (e) {
    var url = $("#front_hotel_add").attr("action");
      e.preventDefault();
      var property        = $("#property").val();
      var sell_currency   = $("#sell_currency").val();
      var numroom         = $("#numroom").val();
      // var website         = $("#website").val();
      var sale_name       = $("#sale_name").val();
      var revenu_name     = $("#revenu_name").val();
      var contract_name   = $("#contract_name").val();
      var finance_name    = $("#finance_name").val();
      var sale_mail       = $("#sale_mail").val();
      var revenu_mail     = $("#revenu_mail").val();
      var contract_mail   = $("#contract_mail").val();
      var finance_mail    = $("#finance_mail").val();
      var sale_number     = $("#sale_number").val();
      var revenu_number   = $("#revenu_number").val();
      var contract_number = $("#contract_number").val();
      var finance_number  = $("#finance_number").val();
      var filter          = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (property=="" || sell_currency=="" || numroom=="" || website=="" || 
        sale_name=="" || revenu_name=="" ||sale_mail=="" || revenu_mail=="" || contract_name=="" || finance_name=="" ||contract_mail=="" || finance_mail=="" ||contract_number=="" || finance_number=="" ||
        sale_number=="" || revenu_number=="" || !filter.test(sale_mail)
        || !filter.test(revenu_mail)) {
          if (property=="") {
            $(".property_err").text("Property field is required!");
          } else {
            $(".property_err").text("");
          }
           if (sell_currency=="") {
            $(".sell_currency_err").text("Sell Currency field is required!");
          } else {
            $(".sell_currency_err").text("");
          }
           if (numroom=="")        {
             $(".numroom_err").text("Number Of Room field is required!");
          } else {
            $(".numroom_err").text("");
          }
          // if (website=="")        {
          //    $(".website_err").text("Web Site field is required!");
          // } else {
          //   $(".website_err").text("");
          // }
          if (sale_name=="")      {
           $(".sale_name_err").text("Sales Team Name field is required!");
          } else {
            $(".sale_name_err").text("");
          }
          if (revenu_name=="")    {
           $(".revenu_name_err").text("Revenue Team Name field is required!");
          } else {
            $(".revenu_name_err").text("");
          }
          if (sale_mail=="")    {
           $(".sale_mail_err").text("Sales Team Mail field is required!");
          } else if (!filter.test(sale_mail)) {
            $(".sale_mail_err").text("Please enter a valid email address!");
          } else {
            $(".sale_mail_err").text("");
          }
          if (revenu_mail=="")    {
           $(".revenu_mail_err").text("Revenue Team Mail field is required!");
          } else if (!filter.test(revenu_mail)) {
            $(".revenu_mail_err").text("Please enter a valid email address!");
          } else {
            $(".revenu_mail_err").text("");
          }
          if (sale_number=="")    {
            $(".sale_number_err").text("Sales Team Number field is required!");
          } else {
            $(".sale_number_err").text("");
          }
          if (revenu_number=="")  {
           $(".revenu_number_err").text("Revenue Team Number field is required!");
          } else {
            $(".revenu_number_err").text("");
          }
          if (contract_number=="")  {
           $(".contract_number_err").text("Contract Team Number field is required!");
          } else {
            $(".contract_number_err").text("");
          }
          if (finance_number=="")  {
           $(".finance_number_err").text("Finance Team Number field is required!");
          } else {
            $(".finance_number_err").text("");
          }
          if (contract_mail=="")  {
           $(".contract_mail_err").text("Contract Team Mail field is required!");
          } else {
            $(".contract_mail_err").text("");
          }
          if (finance_mail=="")  {
           $(".finance_mail_err").text("Finance Team Mail field is required!");
          } else {
            $(".finance_mail_err").text("");
          }
          if (contract_name=="")  {
           $(".contract_name_err").text("Contract Team Name field is required!");
          } else {
            $(".contract_name_err").text("");
          }
           if (finance_name=="")  {
           $(".finance_name_err").text("Finance Team Name field is required!");
          } else {
            $(".finance_name_err").text("");
          }
      } else {
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'login/adding_hotel',
          data: $('#front_hotel_add').serialize(),
          cache: false,
          success: function (response) {
            if (response.status == "1") {
                $(".close").trigger('click');
                  waitingDialog.show('Registration successful.Someone from our team will contact you shortly',{dialogSize: 'lg', progressType: 'success'});
                  setTimeout(function () {
                    waitingDialog.hide();
                  }, 4000);
                  setTimeout(function () {
                    window.location.href = base_url;
                  }, 4000);
            } else {
              alert("Registration Failed");
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
      }
    });
  $('#login_form_hotel_panel').click(function (e) {
      e.preventDefault();
      var url = $("#hotel_panel_login").attr("action");
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'login/hotel_portel_login',
        data: $('#hotel_panel_login').serialize(),
        cache: false,
        success: function (response) {
          if (response.status == "1") {
               $("#hotel_panel_login").submit();
          } else {
            $(".error_msg1").text(response.error);
          }
        }
      });

    });
}) 
