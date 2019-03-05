$(document).ready(function() {
     // alert("data");

	$('#login_form_agent_reg').click(function () {
    // var url = $("#agent_reg").attr("action");
   	 // alert("data");
    // });
      var agency_name      = $("#agency_name").val();
      var agency_email = $("#email").val();
      var first_name       = $("#first_name").val();
      var last_name       = $("#last_name").val();
      var designation     = $("#designation").val();
      var nature_business   = $("#nature_business").val();
      var country     = $("#country").val();
      var website   = $("#website").val();
      var address = $("#address").val();
      var pincode = $("#pincode").val();
      var telephone = $("#telephone").val();
      var mobile = $("#phone").val();
      var preferred_currency = $("#preferred_currency").val();
      var business_type = $("#business_type").val();
      var city = $("#city").val();
      var fax = $("#fax").val();
      // var markup = $("#markup").val();
      var iata_reg = $("#iata_reg").val();
      var username = $("#username").val();
      var password = $("#password").val();
      var confirm_password = $("#confirm_password").val();
      var accounts_name = $("#first_name_accounts").val();
      var accounts_number = $("#number_accounts").val();
      var accounts_email = $("#email_accounts").val();
      var accounts_password=$("#password_accounts").val();
      var reservation_name = $("#first_name_reservation").val();
      var reservation_email = $("#email_reservation").val();
      var reservation_number = $("#number_reservation").val();
      var  reservation_password= $("#password_reservation").val();
      var management_name = $("#first_name_management").val();
      var management_email = $("#email_management").val();
      var management_number = $("#number_management").val();
      var management_password = $("#password_management").val();
      var existing_mail_check = $("#existing_mail_check").val();
      var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (agency_name=="" || agency_email=="" || first_name=="" || last_name=="" || 
        designation=="" || nature_business=="" ||country=="" || website=="" || 
        address=="" || pincode=="" || telephone=="" || mobile=="" || preferred_currency=="" || 
        business_type=="" || city=="" || fax==""  || username=="" || password=="" || 
        confirm_password=="" || accounts_name=="" || accounts_email=="" || accounts_number=="" || accounts_password=="" || reservation_name=="" || 
        reservation_email=="" || reservation_number=="" || reservation_password==""|| management_name=="" || management_email=="" || management_number=="" || management_password==""|| existing_mail_check==0) {
            agency_email_already_registered();
          if (agency_name=="") {
            $(".agency_name_err").text("Agency Name field is required!");
          } else {
            $(".agency_name_err").text("");
          }
          if (agency_email=="") {
            $(".agency_email_err").text("Agency Email field is required!");
          } else {
            $(".agency_email_err").text("");
            var res = agency_email_already_registered();
            if (!filter.test(agency_email)) {
              $(".agency_email_test_err").text("Please enter a valid email address!");
            } else if (res==0) {
              $(".agency_email_test_err").text("Email already exists");
            } else {
              $(".agency_email_test_err").text("");
            }
            if (existing_mail_check==0) {
              $(".agency_email_reg_err").text("Mail already exist");
            } else {
              $(".agency_email_reg_err").text("");
            }
          }
           if (first_name=="")        {
             $(".first_name_err").text("First Name field is required!");
          } else {
            $(".first_name_err").text("");
          }
          if (last_name=="")        {
             $(".last_name_err").text("Last Name field is required!");
          } else {
            $(".last_name_err").text("");
          }
          if (designation=="")      {
           $(".designation_err").text("Designation field is required!");
          } else {
            $(".designation_err").text("");
          }
          if (nature_business=="")    {
           $(".nature_business_err").text("Nature Of Business field is required!");
          } else {
            $(".nature_business_err").text("");
          }
          if (country=="")    {
           $(".country_err").text("Country field is required!");
          } else {
            $(".country_err").text("");
          }
          if (website=="")    {
           $(".website_err").text("Website field is required!");
          } else {
            $(".website_err").text("");
          }
          if (address=="")    {
           $(".address_err").text("Address field is required!");
          } else {
            $(".address_err").text("");
          }
          if (pincode=="")    {
           $(".pincode_err").text("Pincode/Zipcode/Postcode field is required!");
          } else {
            $(".pincode_err").text("");
          }
          if (telephone=="")    {
           $(".telephone_err").text("Telephone field is required!");
          } else {
            $(".telephone_err").text("");
          }
          if (mobile=="")    {
           $(".mobile_err").text("Mobile field is required!");
          } else {
            $(".mobile_err").text("");
          }
          if (business_type=="")    {
           $(".business_type_err").text("Business Type field is required!");
          } else {
            $(".business_type_err").text("");
          }
          if (city=="")    {
           $(".city_err").text("City field is required!");
          } else {
            $(".city_err").text("");
          }
          if (fax=="")    {
           $(".fax_err").text("Fax field is required!");
          } else {
            $(".fax_err").text("");
          }
          if (iata_reg=="")    {
           $(".iata_reg_err").text("IATA Registration field is required!");
          } else {
            $(".iata_reg_err").text("");
          }
          if (username=="")    {
           $(".username_err").text("Username field is required!");
          } else {
            $(".username_err").text("");
          }
          if (password=="")    {
           $(".password_err").text("Password field is required!");
          } else {
            $(".password_err").text("");
          }
          if (confirm_password=="")    {
           $(".confirm_password_err").text("Confirm Password field is required!");
          } else {
            $(".confirm_password_err").text("");
          }
          if(password!=confirm_password)  {
           $(".password_check_err").text("Both the password and confirm password must be the same!");
          }else {
            $(".password_check_err").text("");
          }
          if (accounts_name=="")    {
           $(".accounts_name_err").text("Name in Accounts field is required!");
          } else {
            $(".accounts_name_err").text("");
          }
          if (accounts_email=="")    {
           $(".accounts_email_err").text("Email in Accounts field is required!");
          } else {
            $(".accounts_email_err").text("");
          }
          if (!filter.test(accounts_email)) {
            $(".accounts_email_test_err").text("Please enter a valid email address!");
          } else {
            $(".accounts_email_test_err").text("");
          }
          if (accounts_number=="")    {
           $(".accounts_number_err").text("Number in Accounts field is required!");
          } else {
            $(".accounts_number_err").text("");
          }
          if (reservation_name=="")    {
           $(".reservation_name_err").text("Name in Reservation/Operations field is required!");
          } else {
            $(".reservation_name_err").text("");
          }
          if (reservation_email=="")    {
           $(".reservation_email_err").text("Email in Reservation/Operations field is required!");
          } else {
            $(".reservation_email_err").text("");
          }
          if (!filter.test(reservation_email)) {
            $(".reservation_email_test_err").text("Please enter a valid email address!");
          } else {
            $(".reservation_email_test_err").text("");
          }
          if (reservation_number=="")    {
           $(".reservation_number_err").text("Number in Reservation/Operations field is required!");
          } else {
            $(".reservation_number_err").text("");
          }
          if (management_name=="")    {
           $(".management_name_err").text("Name in Management field is required!");
          } else {
            $(".management_name_err").text("");
          }
          if (management_email=="")    {
           $(".management_email_err").text("Email in Management field is required!");
          } else {
            $(".management_email_err").text("");
          }
          if (!filter.test(management_email)) {
            $(".management_email_test_err").text("Please enter a valid email address!");
          } else {
            $(".management_email_test_err").text("");
          }
          if (management_number=="")    {
           $(".management_number_err").text("Number in Management field is required!");
          } else {
            $(".management_number_err").text("");
          }
          if (accounts_password=="")    {
           $(".accounts_password_err").text("Password in Accounts field is required!");
          } else {
            $(".accounts_password_err").text("");
          }
          if (reservation_password=="")    {
           $(".reservation_password_err").text("Password in Reservation field is required!");
          } else {
            $(".reservation_password_err").text("");
          }
          if (management_password=="")    {
           $(".management_password_err").text("Password in Management field is required!");
          } else {
            $(".management_password_err").text("");
          }


    } else {
          $("#agent_reg").attr("action","agent_reg_insert");
          $("#agent_reg").submit();
      }
  });
});
function iata_check(data) {
  if(data=='1') {
      $(".iata_number").removeClass("hide");
  } else {
      $(".iata_number").addClass("hide");
  }
}
function agency_email_already_registered() {
  $.ajax({
    dataType: 'json',
    type: 'post',
    url: base_url+'Profile/agent_validation',
    data: $('#agent_reg').serialize(),
    cache: false,
      success: function (response) {
          $("#existing_mail_check").val(response);
      }
    });
}
