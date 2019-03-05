$(document).ready(function() {
  // $('#forget_password_button').click(function () {
  //   $(".success").text("");
  //   var email  = $("#email").val();
  //   var existing_mail_check = $("#existing_mail_check").val();
  //   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  //     if (email=="" || !filter.test(email) || existing_mail_check==2) {
  //     	user_registered_mail_check(email)
  //     	if (email=="") {
  //             alert("Please enter your registerd email!");
  //           } else if(!filter.test(email)) {
  //             alert("Please enter a valid email address!");
  //           }
  //          user_registered_mail_check(email)
  //     	      if (existing_mail_check!=0) {
  //             alert("This Mail is not exist");
  //           }
  //         }
  //     else {
  //         $("#forget_password").submit();
  //     }
  // });
  $("#agent_forget_password_button").click(function() {

    var agent_code = $("#agent_code").val();
    var email = $("#email").val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (agent_code=="") {
      $(".error").text('Agent Code is Required!');
      $("#agent_code").focus();
    } else if (!filter.test(email)) {
      $(".error").text('Please provide a valid email address');
      $("#email").focus();
     return false;
    } else {
        $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'Admin/agent_forget_password',
        data: $('#agent_forget_password').serialize(),
        cache: false,
          success: function (response) {
            // alert(response.error);
            if (response.error=="Success") {
             $('#agent_forget_password').attr("action",base_url+"admin/agent_password_update_success")
             $('#agent_forget_password').submit()
            } else {
              $(".error").text(response.error);
              $(".success").text("");
            }
          }
        });
    }
  })
  $("#admin_forget_password_button").click(function() {
    var email = $("#email").val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email=="") {
      $(".error").text('Enter your registerd email ID');
      $("#email").focus();
    } else if (!filter.test(email)) {
      $(".error").text('Please provide a valid email address');
      $("#email").focus();
     return false;
    } else {
        $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'backend/Login/admin_forget_password',
        data: $('#admin_forget_password').serialize(),
        cache: false,
          success: function (response) {
            // alert(response.error);
            if (response.error=="Success") {
             $('#admin_forget_password').attr("action",base_url+"backend/Login/admin_password_update_success")
             $('#admin_forget_password').submit()
            } else {
              $(".error").text(response.error);
              $(".success").text("");
            }
          }
        });
    }
  })

});
function user_registered_mail_check(email) {
  $.ajax({
    dataType: 'json',
    type: 'post',
    url: base_url+'backend/Login/user_mail_check?email='+email,
    data: $('#forget_password').serialize(),
    cache: false,
  success: function (response) {
          $("#existing_mail_check").val(response);
      }
    });
}