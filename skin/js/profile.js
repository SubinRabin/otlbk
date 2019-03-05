$(document).ready(function() {
 	$('#profile_update').click(function (e) {
 		var fname              = $("#name").val();
 		var lname              = $("#lastname").val();
 		var address            = $("#address").val();
 		var country            = $("#country").val();
    var city               = $("#city").val();
    var phone              = $("#phone").val();
    var phone_num          = $("#phone_num").val();
    var state              = $("#state").val();
    var designation        = $("#designation").val();
    var pin_code           = $("#pin_code").val();
    var nature_business    = $("#nature_business").val();
    // var markup             = $("#markup").val();
 		var business_type      = $("#business_type").val();
    var Name_Accounts      = $("#First_Name_Accounts").val();
    var Name_Reservation   = $("#First_Name_Reservation").val();
    var Name_Management    = $("#First_Name_Management").val();
    var Email_Accounts     = $("#Email_Accounts").val();
    var Email_Reservation  = $("#Email_Reservation").val();
    var Email_Management   = $("#Email_Management").val();
    var Number_Accounts    = $("#Number_Accounts").val();
    var Number_Reservation = $("#Number_Reservation").val();
    var Number_Management  = $("#Number_Management").val();
    var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (fname=="" || lname=="" || address=="" || country=="" || 
        city=="" || phone=="" ||phone_num=="" || state=="" || 
        designation=="" || pin_code=="" || nature_business=="" || /*markup=="" ||*/
        business_type=="" || Name_Accounts=="" || 
        Name_Reservation=="" || Name_Management=="" || Email_Accounts=="" ||
        Email_Reservation==""  || Email_Management=="" || Number_Accounts=="" || 
        Number_Reservation=="" || Number_Management=="" || !filter.test(Email_Accounts) ||
        !filter.test(Email_Reservation)|| !filter.test(Email_Management)) {
 		if (fname=="") {
 			$(".name_error").text("First Name field is required");
      $("#name").focus();
    }else{
 			$(".name_error").text("");
    }
 		 if (lname=="") {
 			$(".lastname_error").text("Last Name field is required");
 			$("#lastname").focus();
      }else{
      $(".lastname_error").text("");
      }
 		 if (phone=="") {
      $(".phone_error").text("Mobile field is required");
      $("#phone").focus();
      }else{
      $(".phone_error").text("");
    }
      if (phone_num=="") {
      $(".phone_num_error").text("Phone Number field is required");
      $("#phone_num").focus();
      }else{
      $(".phone_num_error").text("");
    }
      if (country=="") {
      $(".country_error").text("Country field is required");
      $("#country").focus();
      }else{
      $(".country_error").text("");
    }
      if (city=="") {
      $(".city_error").text("City field is required");
      $("#city").focus();
      }else{
      $(".city_error").text("");
    }
      if (address=="") {
 			$(".address_error").text("Address field is required");
 			$("#address").focus();
      }else{
      $(".address_error").text("");
    }
 		 if (state=="") {
      $(".state_error").text("state field is required");
      $("#state").focus();
      }else{
      $(".state_error").text("");
    }
      if (designation=="") {
      $(".designation_error").text("Designation field is required");
      $("#designation").focus();
      }else{
      $(".designation_error").text("");
    }
      if (pin_code=="") {
      $(".pin_code_error").text("Pin Code field is required");
      $("#pin_code").focus();
      }else{
      $(".pin_code_error").text("");
    }
      if (nature_business=="") {
      $(".nature_business_error").text("Nature Of Business field is required");
      $("#nature_business").focus();
      }else{
      $(".nature_business_error").text("");
    }
    //  if (markup=="") {
    //   $(".markup_error").text("Markup field is required");
    //   $("#markup").focus();
    //   }else{
    //   $(".nature_business_error").text("");
    // }
    if (business_type=="") {
      $(".business_type_error").text("Business Type field is required");
      $("#business_type").focus();
      }else{
      $(".business_type_error").text("");
    }
      if (Name_Accounts=="") {
      $(".First_Name_Accounts_error").text("Account Name field is required");
      $("#First_Name_Accounts").focus();
      }else{
      $(".First_Name_Accounts_error").text("");
    }
      if (Name_Reservation=="") {
      $(".First_Name_Reservation_error").text("Reservation Name field is required");
      $("#First_Name_Reservation").focus();
      }else{
      $(".First_Name_Reservation_error").text("");
    }
      if (Name_Management=="") {
      $(".First_Name_Management_error").text("Management Name field is required");
      $("#First_Name_Management").focus();
      }else{
      $(".First_Name_Management_error").text("");
    }
      if (Email_Accounts=="") {
      $(".Email_Accounts_error").text("Account Mail field is required");
      $("#Email_Accounts").focus();
      }else{
      $(".Email_Accounts_error").text("");
    }
      if (!filter.test(Email_Accounts)) {
              $(".Email_Accounts_error").text("Please enter a valid email address!");
            } else {
              $(".Email_Accounts_error").text("");
            }
      if (Email_Reservation=="") {
      $(".Email_Reservation_error").text("Reservation Mail field is required");
      $("#Email_Reservation").focus();
      }else{
      $(".Email_Reservation_error").text("");
    }
      if (!filter.test(Email_Reservation)) {
            $(".Email_Reservation_error").text("Please enter a valid email address!");
          } else {
            $(".Email_Reservation_error").text("");
          }
      if (Email_Management=="") {
      $(".Email_Management_error").text("Management Mail field is required");
      $("#Email_Management").focus();
      }else{
      $(".Email_Management_error").text("");
    }
      if (!filter.test(Email_Management)) {
            $(".Email_Management_error").text("Please enter a valid email address!");
          } else {
            $(".Email_Management_error").text("");
          }
      if (Number_Accounts=="") {
      $(".Number_Accounts_error").text("Account Phone Number field is required");
      $("#Number_Accounts").focus();
      }else{
      $(".Number_Accounts_error").text("");
      }
      if (Number_Reservation=="") {
      $(".Number_Reservation_error").text("Reservation Phone Number field is required");
      $("#Number_Reservation").focus();
      }else{
      $(".Number_Reservation_error").text("");
      }
      if (Number_Management=="") {
      $(".Number_Management_error").text("Management Phone Number field is required");
      $("#Number_Management").focus();
      }else{
      $(".Number_Management_error").text("");
    }
    
}
    else {
      $('#profile_form').submit();
 		}
 	});
    

 	$('#change_password_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'profile/password_update',
          data: $('#change_password_form').serialize(),
          cache: false,
          success: function (response) {
          	if (response.status!=1) {
          		$(".password_error").css("color","red");
          		$(".password_error").text(response.error);
          	} else {
             $(".update_msg").append('<div class="alert alert-success"><strong>Success!</strong> Updated Successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>')
          		// $(".password_error").text("Password changed");
          		// $(".password_error").css("color","green");
              $(".password_error").text("");
          		$("#old_password").val("");
          		$("#new_password").val("");
          	}
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    });
})
function ValidateFileUpload() {
        var fuData = document.getElementById('profile_image');
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }

      } 
//The file upload is NOT an image
else {
      error = "Photo only allows file types of JPG, JPEG and BMP. ";
      color = "danger";
      $("#profile_image").val("");
      $("#load_image").attr("src","");
      AddToast(color,error);
      }
}
function TradeFileUpload(){
  var datastream=document.getElementById('tradefile');
  var filepath=datastream.value;
  var ext=filepath.substring(filepath.lastIndexOf('.')+1).toLowerCase();
  // $file_name=$edit[0]->agency_code;
  // echo("Pass 1");
  if (ext == "bmp" || ext == "jpeg" || ext == "jpg") 
      {
          if (datastream.files && datastream.files[0]) 
          {
              var reader = new FileReader();
              reader.onload = function(e) 
              {
                  $('#load_image1').attr('src', e.target.result);
              }
              reader.readAsDataURL(datastream.files[0]);
          }
      } 
else 
{
      error = "Photo only allows file types of JPG, JPEG and BMP. ";
      color = "danger";
      $("#tradefile").val("");
      $("#load_image1").attr("src",base_url+"assets/images/user/1.png");
      AddToast(color,error);
     }
}
function iata_check(data) {
  if(data=='1') {
      $(".iata_number").removeClass("hide");
  } else {
      $(".iata_number").addClass("hide");
  }
}
function myFunction_accounts() {
    var x = document.getElementById("password_accounts");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction_reservation() {
    var x = document.getElementById("password_reservation");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction_management() {
    var x = document.getElementById("password_management");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

