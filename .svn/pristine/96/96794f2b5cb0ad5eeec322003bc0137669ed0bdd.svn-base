$(document).ready(function() {
  $(".bootstrap-tagsinput .tag [data-role='remove']").css('display', 'none');
  $(".bootstrap-tagsinput").css('cursor', 'not-allowed');
  $('#room_aminity, #keyword').on('beforeItemAdd', function(event) {
    event.cancel = true;
  });
    setTimeout(function (){
        jQuery(document).ready(function() {
            jQuery(".stats2container").niceScroll({horizrailenabled:true,cursorwidth:"3px",cursorcolor:"#ccc",});
            jQuery(".fixedtopic").niceScroll({horizrailenabled:false,cursorwidth:"3px",cursorcolor:"#ccc",});
            jQuery(".dashboard-left").niceScroll({horizrailenabled:false,cursorwidth:"3px",cursorcolor:"#ccc",});
        });
    }, 1500);   

    //------------------------------
    //POPOVER
    //------------------------------
    $(function (){
        $("#messages").popover({placement:'bottom', trigger:'click',html : true});
        $("#notifications").popover({placement:'bottom', trigger:'click',html : true});
        $("#tasks").popover({placement:'bottom', trigger:'click',html : true});
    });

    // //------------------------------
    // //Nice Scroll
    // //------------------------------
    //     jQuery(document).ready(function() {
    //     "use strict";
    //       var nice = jQuery("html").niceScroll({
    //         cursorcolor:"#ccc",
    //         cursorborder :"0px solid #fff",     
    //         railpadding:{top:0,right:0,left:0,bottom:0},
    //         cursorwidth:"5px",
    //         cursorborderradius:"0px",
    //         cursoropacitymin:0,
    //         cursoropacitymax:0.7,
    //         boxzoom:true,
    //         autohidemode:false
    //       });  
          
    //       jQuery("#air").niceScroll({horizrailenabled:false});
    //       jQuery("#hotel").niceScroll({horizrailenabled:false});
    //       jQuery("#car").niceScroll({horizrailenabled:false});
    //       jQuery("#vacations").niceScroll({horizrailenabled:false});
          

    //       jQuery('html').addClass('no-overflow-y');
          
    //     });

    //------------------------------
    //COUNT VISITORS
    //------------------------------
    $(function($) {
        $('.countrevenue').countTo({
            from: 1,
            to: 112500,
            speed: 2000
        });                                     
    }); 

    //------------------------------
    // SELECT2 MULTISELECT
    //------------------------------

    $('.multi-select2').select2({
        width:"100%"
    });    

   $("#hotel_login_edit").click(function() {
       $("#hotel_login_detail_back").removeClass("hide");
       $("#hotel_login_detail_update").removeClass("hide");
       $("input").removeAttr('readonly');
       $("select").removeAttr('disabled');
       $("textarea").removeAttr('readonly');
       $(".bootstrap-tagsinput .tag [data-role='remove']").css('display', 'inline');
       $(".bootstrap-tagsinput").css('cursor', 'auto');
       $('#room_aminity, #keyword').on('beforeItemAdd', function(event) {
         event.cancel = false;
       });
       $(this).addClass("hide");
   });
    $("#hotel_login_detail_back").click(function() {
       $("select").attr('disabled','disabled');
       $("input").attr('readonly','readonly');
       $("textarea").attr('readonly','readonly');
       $("#hotel_login_detail_update").addClass("hide");
       $("#hotel_login_edit").removeClass("hide");
       $(".bootstrap-tagsinput .tag [data-role='remove']").css('display', 'none');
       $(".bootstrap-tagsinput").css('cursor', 'not-allowed');
       $('#room_aminity, #keyword').on('beforeItemAdd', function(event) {
         event.cancel = true;
       });
       $(this).addClass("hide");
   });
   
  $("#hotel_contract_edit").click(function() {
       $("#hotel_contract_detail_back").removeClass("hide");
       $("#Contract_detail_update").removeClass("hide");
       $("input").removeAttr('readonly');
       $("select").removeAttr('disabled');
       $("textarea").removeAttr('readonly');
       $(this).addClass("hide");
   });
    $("#hotel_contract_detail_back").click(function() {
       $("select").attr('disabled','disabled');
       $("input").attr('readonly','readonly');
       $("textarea").attr('readonly','readonly');
       $("#Contract_detail_update").addClass("hide");
       $("#hotel_contract_edit").removeClass("hide");
       $(this).addClass("hide");
   });
$('#hotel_login_detail_update').click(function () {
  

    var hotel_name         = $("#hotel_name").val();
    var market             = $("#market").val();
    var property_name      = $("#property_name").val();
    var brand_name         = $("#brand_name").val();
    var city               = $("#city").val();
    var citynearby         = $("#citynearby").val();
    var citydes            = $("#citydes").val();
    var board              = $("#board").val();
    var total_no_of_rooms  = $("#total_no_of_rooms").val();
    // var Website            = $("#Website").val();
    var accept_vcc         = $("#accept_vcc").val();
    var hotel_description  = $("#hotel_description").val();
    var locationss         = $("#locationss").val();
    if (hotel_name==""||market==""||property_name==""||city=="" ||citynearby==""||citydes=="" ||board==""||total_no_of_rooms==""||
         accept_vcc=="" || hotel_description=="" ||locationss=="") {

          if (hotel_name=="")    {
           $(".hotel_name_err").text("Hotel name is required!");
           $("#hotel_name").focus();
          } else {
            $(".hotel_name_err").text("");
          }
          if(market==""){
           $(".market_err").text("market name is required!");
           $("#market").focus();
          } else {
            $(".market_err").text("");
          }
          if(property_name==""){
           $(".property_name_err").text("property name is required!");
           $("#property_name").focus();
          } else {
            $(".property_name_err").text("");
          }
          if(brand_name==""){
           $(".brand_name_err").text("brand name is required!");
           $("#brand_name").focus();
          } else {
            $(".brand_name_err").text("");
          }
          if (city=="")    {
           $(".city_err").text("City is required!");
           $("#city").focus();
          } else {
            $(".city_err").text("");
          }
          if (citynearby=="")    {
           $(".citynearby_err").text("City Near by Places is required!");
           $("#citynearby").focus();
          } else {
            $(".citynearby_err").text("");
          }
          if (citydes=="")    {
           $(".citydes_err").text("City Description is required!");
           $("#citydes").focus();
          } else {
            $(".citydes_err").text("");
          }
           if (board=="")    {
           $(".board_err").text("Board name is required!");
           $("#board").focus();
          } else {
            $(".board_err").text("");
          }
          if (total_no_of_rooms=="")    {
           $(".total_no_of_rooms_err").text("No of Rooms is required!");
           $("#total_no_of_rooms").focus();
          } else {
            $(".total_no_of_rooms_err").text("");
          }
          if (accept_vcc=="")    {
           $(".accept_vcc_err").text("Accepting VCC is required!");
           $("#accept_vcc").focus();
          } else {
            $(".accept_vcc_err").text("");
          }
          if (hotel_description=="")    {
           $(".hotel_description_err").text("Hotel Descriptions is required!");
           $("#hotel_description").focus();
          } else {
            $(".hotel_description_err").text("");
          }
          if (locationss=="")    {
           $(".locationss_err").text("hotel location is required!");
           $("#locationss").focus();
          } else {
            $(".locationss_err").text("");
          }
    } else {
          $("#hotel_log_detail").attr("action","updating_hotel_details");
          $("#hotel_log_detail").submit();
    }
});

// contact_info_update
  $("#hotel_login_edit_contact").click(function() {
       $("#hotel_login_detail_back_contact").removeClass("hide");
       $("#hotel_login_contact_update").removeClass("hide");
       $("input").removeAttr('readonly');
       $("select").removeAttr('disabled');
       $("textarea").removeAttr('readonly');
       $("#sales_mail").attr('readonly','readonly');
       $("#revenue_mail").attr('readonly','readonly');
       $("#contract_mail").attr('readonly','readonly');
       $("#finance_mail").attr('readonly','readonly');
       $(this).addClass("hide");
   });
    $("#hotel_login_detail_back_contact").click(function() {
       $("select").attr('disabled','disabled');
       $("input").attr('readonly','readonly');
       $("textarea").attr('readonly','readonly');
       $("#hotel_login_contact_update").addClass("hide");
       $("#hotel_login_edit_contact").removeClass("hide");
       $(this).addClass("hide");
   });
$('#hotel_login_contact_update').click(function () {
    var sales_fname     = $("#sales_fname").val();
    // var sales_lname     = $("#sales_lname").val();
    var sales_phone     = $("#sales_phone").val();
    var sales_mobile    = $("#sales_mobile").val();
    // var sales_mail     = $("#sales_mail").val();
    var sales_address   = $("#sales_address").val();
    //var revenue_fname   = $("#revenue_fname").val();
    var revenue_lname   = $("#revenue_lname").val();
    var revenue_phone   = $("#revenue_phone").val();
    var revenue_mobile  = $("#revenue_mobile").val();
    // var revenue_mail   = $("#revenue_mail").val();
    var revenue_address = $("#revenue_address").val();
    var contract_fname = $("#contract_fname").val();
    // var contract_mail = $("#contract_mail").val();
    var contract_phone = $("#contract_phone").val();
    var contract_mobile = $("#contract_mobile").val();
    var contracts_address = $("#contracts_address").val();
    var finance_fname = $("#finance_fname").val();
    // var finance_mail = $("#finance_mail").val();
    var finance_phone = $("#finance_phone").val();
    var finance_mobile = $("#finance_mobile").val();
    var finance_address = $("#finance_addres").val();

    var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( sales_fname=="" ||sales_phone=="" ||sales_mobile=="" ||sales_address=="" ||revenue_fname=="" ||revenue_phone=="" ||revenue_mobile=="" ||revenue_address=="" ||contract_fname=="" ||contract_phone=="" ||contract_mobile=="" ||contracts_address=="" ||finance_fname=="" ||finance_phone=="" ||finance_mobile==""||finance_address=="" ) {


        if (sales_fname=="")    {
           $(".sales_fname_err").text("Sales first name is required!");
          } else {
            $(".sales_fname_err").text("");
          }
          // if (sales_lname=="")    {
          //  $(".sales_lname_err").text("Sales last name is required!");
          // } else {
          //   $(".sales_lname_err").text("");
          // }
          if (sales_phone=="")    {
           $(".sales_phone_err").text("sales phone number is required!");
          } else {
            $(".sales_phone_err").text("");
          }
          if (sales_mobile=="")    {
           $(".sales_mobile_err").text("sales mobile number is required!");
          } else {
            $(".sales_mobile_err").text("");
          }
          // if (!filter.test(sales_mail)) {
          //     $(".sales_mail_err").text("Please enter a valid email address!");
          //   } else {
          //     $(".sales_mail_err").text("");
          //   }
          if (sales_address=="")    {
           $(".sales_address_err").text("Sales address is required!");
          } else {
            $(".sales_address_err").text("");
          }
          if (revenue_fname=="")    {
           $(".revenue_fname_err").text("Revenue first name is required!");
          } else {
            $(".revenue_fname_err").text("");
          }
          if (revenue_lname=="")    {
           $(".revenue_lname_err").text("Revenue last name is required!");
          } else {
            $(".revenue_lname_err").text("");
          }
          if (revenue_phone=="")    {
           $(".revenue_phone_err").text("Revenue phone number is required!");
          } else {
            $(".revenue_phone_err").text("");
          }
          if (revenue_mobile=="")    {
           $(".revenue_mobile_err").text("Revenue mobile number is required!");
          } else {
            $(".revenue_mobile_err").text("");
          }
          if (contract_fname=="")    {
           $(".contract_fname_err").text("Contract  First name is required!");
          } else {
            $(".contract_fname_err").text("");
          }
          if (contract_phone=="")    {
           $(".contract_phone_err").text("Contract Phone number is required!");
          } else {
            $(".contract_phone_err").text("");
          }
          if (contract_mobile=="")    {
           $(".contract_mobile_err").text("Contract mobile number is required!");
          } else {
            $(".contract_mobile_err").text("");
          }
          if (contracts_address=="")    {
           $(".contracts_address_err").text("Contract Address  is required!");
          } else {
            $(".contracts_address_err").text("");
          }
          if (finance_fname=="")    {
           $(".finance_fname_err").text("Finance  First name is required!");
          } else {
            $(".finance_fname_err").text("");
          }
          if (finance_phone=="")    {
           $(".finance_phone_err").text("Finance Phone number is required!");
          } else {
            $(".finance_phone_err").text("");
          }
          if (finance_mobile=="")    {
           $(".finance_mobile_err").text("Finance mobile number is required!");
          } else {
            $(".finance_mobile_err").text("");
          }
          if (finance_address=="")    {
           $(".finance_address_err").text("Finance Address  is required!");
          } else {
            $(".finance_address_err").text("");
          }
          // if (!filter.test(revenue_mail)) {
          //     $(".revenue_mail_err").text("Please enter a valid email address!");
          // } else {
          //     $(".revenue_mail_err").text("");
          // }
          // if (!filter.test(contract_mail)) {
          //     $(".contract_mail_err").text("Please enter a valid email address!");
          // } else {
          //     $(".contract_mail_err").text("");
          // }
          // if (!filter.test(finance_mail)) {
          //     $(".finance_mail_err").text("Please enter a valid email address!");
          // } else {
          // $(".finance_mail_err").text("");
          // }
          if (revenue_address=="")    {
           $(".revenue_address_err").text("Revenue address is required!");
          } else {
            $(".revenue_address_err").text("");
          }
    } else {
          $("#hotel_log_detail_contact").attr("action","updating_hotel_contact");
          $("#hotel_log_detail_contact").submit();
           // alert("haggasf")
    }


});


        setTimeout(function() {
            $('#Successalrt').fadeOut('fast');
        }, 3500);

// Contract update
$("#hotel_contract_edit").click(function() {
       $("#hotel_contract_detail_back").removeClass("hide");
       $("#contract_detail_update").removeClass("hide");
       $("input").removeAttr('readonly');
       $("select").removeAttr('disabled');
       $("textarea").removeAttr('readonly');
       $(this).addClass("hide");
  });

$("#hotel_contract_detail_back").click(function() {
       $("select").attr('disabled','disabled');
       $("input").attr('readonly','readonly');
       $("textarea").attr('readonly','readonly');
       $("#contract_detail_update").addClass("hide");
       $("#hotel_contract_edit").removeClass("hide");
       $(this).addClass("hide");
   });
$('#contract_detail_update').click(function () {
    var contract_id        = $("#contract_id").val();
    var hotel_id           = $("#hotel_id").val();
    var markup             = $("#markup").val();
    var credit_limit       = $("#credit_limit").val();
    var credit_period      = $("#credit_period").val();
    var cheque_no          = $("#cheque_no").val();
    var bank_name          = $("#bank_name").val();
    var account_no         = $("#account_no").val();
    var account_holder     = $("#account_holder").val();
    var iban               = $("#iban").val();
    var swift              = $("#swift").val();
    var ifsc               = $("#ifsc").val();
    var hotel_admin_name   = $("#hotel_admin_name").val();
    var admin_email        = $("#admin_email").val();
    if (contract_id==""||hotel_id==""||markup==""||credit_limit=="" ||credit_period==""||cheque_no=="" ||bank_name ==""||account_no==""||
        account_holder =="" ||iban=="" ||swift=="" ||ifsc==""||hotel_admin_name==""||admin_email==""){
          if (contract_id=="")    {
           $(".contract_id_err").text("Contract id is required!");
          } else {
            $(".contract_id_err").text("");
          }
          if(hotel_id==""){
           $(".hotel_id").text("Hotel id name is required!");
          } else {
            $(".hotel_id_err").text("");
          }
          if(markup==""){
           $(".markup_err").text("Markup Percentage is required!");
          } else {
            $(".markup_err").text("");
          }
          if(credit_limit==""){
           $(".credit_limit_err").text("Credit Limit is required!");
          } else {
            $(".credit_limit_err").text("");
          }
          if(credit_period==""){
           $(".credit_period_err").text("Credit period is required!");
          } else {
            $(".credit_period_err").text("");
          }
          if(cheque_no==""){
           $(".cheque_no_err").text("Cheque no is required!");
          } else {
            $(".cheque_no_err").text("");
          }
          if(bank_name==""){
           $(".bank_name_err").text("Bank Name is required!");
          } else {
            $(".bank_name _err").text("");
          }
          if(account_no==""){
           $(".account_no_err").text("Account no is required!");
          } else {
            $(".account_no_err").text("");
          }
          if(account_holder==""){
           $(".account_holder_err").text("Account Holder is required!");
          } else {
            $(".account_holder_err").text("");
          }
          if(iban==""){
           $(".iban_err").text("IBAN is required!");
          } else {
            $(".iban_err").text("");
          }
          if(swift==""){
           $(".swift_err").text("SWIFT is required!");
          } else {
            $(".swift_err").text("");
          }
           if(ifsc==""){
           $(".ifsc_err").text("IFSC is required!");
          } else {
            $(".ifsc_err").text("");
          }
           if(hotel_admin_name==""){
           $(".hotel_admin_name").text("Hotel Admin Name is required!");
          } else {
            $(".hotel_admin_name").text("");
          }
           if(admin_email==""){
           $(".admin_email").text(" Admin Email is required!");
          } else {
            $(".admin_email").text("");
          }
    }
    else {
          $("#contract_detail").attr("action","update_hotel_contract");
          $("#contract_detail").submit();
         }
          
});
// social
 $("#hotel_login_edit_social").click(function() {
       $("#hotel_login_detail_back_social").removeClass("hide");
       $("#new_hotel_form_login_detail_update_social").removeClass("hide");
       $("input").removeAttr('readonly');
       $(this).addClass("hide");
   });
    $("#hotel_login_detail_back_social").click(function() {
       $("input").attr('readonly','readonly');
       $("#hotel_login_detail_update_social").addClass("hide");
       $("#hotel_login_edit_social").removeClass("hide");
       $(this).addClass("hide");
   });
   

$('#hotel_login_detail_update_social').click(function () {

    var facebook    = $("#facebook").val();
    var google_plus = $("#google_plus").val();
    var twitter     = $("#twitter").val();
    var linked_in   = $("#linked_in").val();
    var whatsapp    = $("#whatsapp").val();
    var vk_url      = $("#vk_url").val();
     
          $("#hotel_log_detail_social").attr("action","socialmedia_update");
          $("#hotel_log_detail_social").submit();
});
        setTimeout(function() {
            $('#Successalrt').fadeOut('fast');
        }, 3500);



// social
$('#hotel_login_room_add').click(function () {
    var room_type         = $("#room_type").val();
    var price             = $("#price").val();
    var no_rooms          = $("#no_rooms").val();
    var allotement        = $("#allotement").val();
    var room_facilti      = $("#room_facilti").val();
    var max_occ_adult     = $("#max_occ_adult").val();
    var room_name         = $("#room_name").val();
    var standard_capacity = $("#standard_capacity").val();
    var max_occ_child     = $("#max_occ_child").val();
    var max_total         = $("#max_total").val();
    if (room_type=="" || price=="" || no_rooms=="" || allotement=="" || room_facilti=="" || max_occ_adult=="" || room_name=="" || standard_capacity=="" || max_occ_child=="" || max_total=="" ) {
       if (room_type=="")    {
           $(".room_type_err").text("Room Type is required!");
          } else {
            $(".room_type_err").text("");
          }
          if (price=="")    {
           $(".price_err").text("Room Price is required!");
          } else {
            $(".price_err").text("");
          }
          if (no_rooms=="")    {
           $(".no_rooms_err").text("Number of Rooms is required!");
          } else {
            $(".no_rooms_err").text("");
          }
          if (allotement=="")    {
           $(".allotement_err").text("allotement is required!");
          } else {
            $(".allotement_err").text("");
          }
          if (room_facilti=="")    {
           $(".room_facilti_err").text("Room Facilities is required!");
          } else {
            $(".room_facilti_err").text("");
          }
          if (max_occ_adult=="")    {
           $(".max_occ_adult_err").text("Occupancy of Adult is required!");
          } else {
            $(".max_occ_adult_err").text("");
          }
          if (room_name=="")    {
           $(".room_name_err").text("Room name is required!");
          } else {
            $(".room_name_err").text("");
          }
          if (standard_capacity=="")    {
           $(".standard_capacity_err").text("Standard Cpapacity is required!");
          } else {
            $(".standard_capacity_err").text("");
          }
          if (max_occ_child=="")    {
           $(".max_occ_child_err").text("Occupancy of Child is required!");
          } else {
            $(".max_occ_child_err").text("");
          }
          if (max_total=="")    {
           $(".max_total_err").text("Max Total is required!");
          } else {
            $(".max_total_err").text("");
          }
     }
        else {
              $("#new_hotel_room_detail_form").attr("action","add_new_hotel_room");
              $("#new_hotel_room_detail_form").submit();
             }

});
$("#contract_policy").click(function() {
            var imp_remarks   = $(".imp_remarks .trumbowyg-editor").html();
            var cancel_policy = $(".cancel_policy .trumbowyg-editor").html();
            
            var imp_notes     = $(".imp_notes .trumbowyg-editor").html();

            if (imp_remarks==""|| cancel_policy=="" || imp_notes=="") {

                if (imp_remarks=="")    {
                    $(".imp_remarks_err").text("Important Remarks & Policies field is required!");
                } else {
                    $(".imp_remarks_err").text("");
                }
             if (cancel_policy=="")    {

                    $(".cancel_policy_err").text("Cancellation Policy field is required!");
                } else {
                    $(".cancel_policy_err").text("");
                }
              if (imp_notes=="")    {
                    $(".imp_notes_err").text("Important Notes & Conditions field is required!");
                } else {
                    $(".imp_notes_err").text("");
                }
            }
            else {
                $("#imp_remarks").val(imp_remarks);
        $("#cancel_policy").val(cancel_policy);
        $("#imp_notes").val(imp_notes);
         $("#policy_form").attr("action",base_url+"Dashboard/contract_policy_submit");
        $("#policy_form").submit();
      //   $.ajax({
      //   dataType: 'json',
      //   type: 'post',
      //   url: base_url+'/backend/hotels/policiesSubmit',
      //   data: $('#contract-policy-form').serialize(),
      //   cache: false,
      //   success: function (response) {
      //     addToast("Updated Successfully","green");
      //   }
      // });
             }
        });

$("#check1").click(function(){
    if($(this).is(':checked')){     
    var sales_fname = $("#sales_fname").val();
    var sales_lname = $("#sales_lname").val();
    var sales_phone = $("#sales_phone").val();
    var sales_mobile = $("#sales_mobile").val();
    var sales_address = $("#sales_address").val();
    // var sales_address = $("#sales_address").val();
    // var sales_address = document.getElementById("sales_address").value;
    $("#revenue_fname").val(sales_fname);
    $("#revenue_lname").val(sales_lname);
    $("#revenue_phone").val(sales_phone);
    $("#revenue_mobile").val(sales_mobile);
    $("#revenue_address").val(sales_address);
    // document.getElementById("revenue_address").value("sales_address");
    }
  });
  $("#check2").click(function(){
    if($(this).is(':checked')){
    var revenue_fname = $("#revenue_fname").val();
    var revenue_lname = $("#revenue_lname").val();
    var revenue_phone = $("#revenue_phone").val();
    var revenue_mobile = $("#revenue_mobile").val();
    var revenue_address = $("#revenue_address").val();
    $("#contract_fname").val(revenue_fname);
    $("#contract_lname").val(revenue_lname);
    $("#contract_phone").val(revenue_phone);
    $("#contract_mobile").val(revenue_mobile);
    $("#contracts_address").val(revenue_address);
    }
  });
  $("#check3").click(function(){
    if($(this).is(':checked')){
    var contract_fname = $("#contract_fname").val();
    var contract_lname = $("#contract_lname").val();
    var contract_phone = $("#contract_phone").val();
    var contract_mobile = $("#contract_mobile").val();
    var contracts_address = $("#contracts_address").val();
    $("#finance_fname").val(contract_fname);
    $("#finance_lname").val(contract_lname);
    $("#finance_phone").val(contract_phone);
    $("#finance_mobile").val(contract_mobile);
    $("#finance_address").val(contracts_address);
    }
  });

function ValidateFileUpload() {
        var fuData = document.getElementById('image-url');
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

}

});

function myFunction_sales() {
    var x = document.getElementById("sales_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction_revenue() {
    var x = document.getElementById("revenue_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction_contract() {
    var x = document.getElementById("contract_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction_finance() {
    var x = document.getElementById("finance_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


