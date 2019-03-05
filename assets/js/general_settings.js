// $(document).ready(function() {
  var icon_list_table = $('#icon_list_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/icon_list_table',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  var DatabaseBackuptable = $('#DatabaseBackup-table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/DatabaseBackupList',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  $("#CreateBackupDb").click(function(e) {
    e.preventDefault();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'backend/common/make_backup_db',
        cache: false,
        success: function (response) {
          addToast(response.error,response.color);
           DatabaseBackuptable.api().ajax.reload();
        },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });

  });
  function deleteBackupDB(backup) {
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'backend/common/delete_backup/'+backup,
        cache: false,
        success: function (response) {
          addToast(response.error,response.color);
           DatabaseBackuptable.api().ajax.reload();
        },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });
  }
  var ActivityLogtable = $('#ActivityLog-table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/ActivityLogList',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 

  $("#ClearActivityLog").click(function() {
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'backend/common/ClearActivityLog',
        cache: false,
        success: function (response) {
          addToast(response.error,response.color);
           ActivityLogtable.api().ajax.reload();
          },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });
  });
	$('#general_setting_buttons').click(function (e) {
      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'backend/login/general_settings_update',
        data: $('#general_settings_form').serialize(),
    	  cache: false,
        success: function (response) {
          if (response.status == "1") {
            addToast(response.error,response.color);
            window.setTimeout(function(){
               $("#general_settings_form").submit();
            }, 1500);
          } else {
            addToast(response.error,response.color);
          }
        },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });

    });


$('#icons_form_button').click(function (e) {
    var url = $("#icons_form").attr("action");
      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: 'icon_validation',
        data: $('#icons_form').serialize(),
    cache: false,
        success: function (respose) {
          if (respose.status == "1") {
            addToast(respose.error,respose.color);
            window.setTimeout(function(){
               $("#icons_form").submit();
            }, 4000);
          } else {
            addToast(respose.error,respose.color);
          }
        },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });

    });
 $("#delete_form").submit(function(e){
  /*Form Submit*/
  e.preventDefault();
    var obj = $(this), action = obj.attr('name');
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: e.target.action,
      data: obj.serialize(),
      cache: false,
      success: function (response) {
        if (response.status==1) {
          close_delete_modal();
          addToast(response.error,response.color);
          var menu_per_tbl = $('#menu_per_tbl').dataTable({
                  "bDestroy": true,
                  "ajax": {
                      url : base_url+'/backend/common/per_tbl_role_name',
                      type : 'GET'
                  },
              "fnDrawCallback": function(settings){
              $('[data-toggle="tooltip"]').tooltip();          
              }
            }); 
        } else {
          addToast(response.error,response.color);
        }
      },
      error: function (xhr,status,error) {
           alert("Error: " + error);
        }
    });

  });
  $("#payment_form_button").click(function(e) {
    e.preventDefault();
    // var markup = $("#markup").val();
    // var tax = $("#tax").val();
    // if (markup=="") {
    //   addToast("Markup field is required !","orange");
    // } else if (tax=="") {
    //   addToast("Tax field is required !","orange");
    // } else {
      addToast("Updated Successfully","green");
      window.setTimeout(function(){
         $("#payment_settings_form").submit();
      }, 1000);
    // }
  });
  $("#mail_form_button").click(function(e) {
    e.preventDefault();
    var protocol = $("#protocol").val();
    var smtp_host = $("#smtp_host").val();
    var smtp_password = $("#smtp_password").val();
    var smtp_port = $("#smtp_port").val();
    var mailtype = $("#mailtype").val();
    var smtp_user = $("#smtp_user").val();
    var company_name = $("#company_name").val();
    if (protocol=="") {
      addToast("Protocol field is required !","orange");
    } else if (smtp_host=="") {
      addToast("Smtp host field is required !","orange");
    } else if (smtp_password=="") {
      addToast("Smtp password field is required !","orange");
    } else if (smtp_port=="") {
      addToast("Smtp port field is required !","orange");
    } else if (mailtype=="") {
      addToast("Mail type field is required !","orange");
    } else if (smtp_user=="") {
      addToast("Smtp user field is required !","orange");
    } else if (company_name=="") {
      addToast("Company name field is required !","orange");
    } else {
      addToast("Updated Successfully","green");
      window.setTimeout(function(){
         $("#mail_settings_form").submit();
      }, 1000);
    }
  });
  $('#test_mail_button').click(function () {
    var test_mail = $("#test_mail").val();
    var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (test_mail=="" || !filter.test(test_mail)) {
      if (test_mail=="") {
        addToast("Enter a mail you want to check!","orange");
      }else if (!filter.test(test_mail)) {
      addToast("Please enter a valid email address!","orange");
    }
  }else{
          $("#test_mail_form").submit();
    }
  });
  $("#currency_add_button").click(function (e) {
    e.preventDefault();
    var currency_type=$("#currency_type").val();
    var currency_name=$("#currency_name").val();
    if(currency_type==""){
      addToast("Currency Type Field is required","orange");
    }else if(currency_name==""){
      addToast("Currency Name Field is required","orange");
    }
    else{
       $("#add_currency_form").submit();
    }
  });
  var currency_list = $('#currency_list').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/currency_type_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 

  $("#currency_refresh_button").click(function() {
     $("#refresh_form").submit();

 });
   var menu_per_tbl = $('#menu_per_tbl').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/per_tbl_role_name',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 


  $("#role_form_button").click(function(e) {
        var roleName=$("#roleName").val();
        if(roleName==""){
              addToast("RoleName Field is required","orange");
        } else {   
              if ($("#edit_id").val()=="") {
                      $.ajax({
                      dataType: 'json',
                      type: 'post',
                      url: base_url+'/backend/common/CheckRolenameAvailablity?roleName='+roleName,
                      data: $('#role_form').serialize(),
                      cache: false,
                      success: function (response) {
                          if (response==false) {
                              addToast('This Role name Already exists',"orange");
                          }else{
                              addToast('Inserted Successfully','green');
                              $("#role_form").attr("action",base_url+"backend/Common/RoleDetails");
                              $("#role_form").submit();
                          }
                      }
                      });
              } else {
                  addToast(' Updated Successfully','green');
                  $("#role_form").attr("action",base_url+"backend/Common/RoleDetails");
                  $("#role_form").submit();
              }
        }
  });

  $("#update_hotels_banner").click(function() {
    $("#undo_redo_to option").attr('selected','selected');
    var hotels = $("#undo_redo_to option").length;
    if (hotels==0) {
      addToast('Must select a hotel','orange');
    } else if (hotels < 4) {
      addToast('Max 4 hotels','orange');
    } else if (hotels > 4) {
      addToast('Max 4 hotels','orange');
    } else {
      $("#hotels_banner_form").attr('action',base_url+'backend/common/hotelsBannerUpdate');
      $("#hotels_banner_form").submit();
    }
  })


   
// });
function ValidateFileUpload() {
        var fuData = document.getElementById('fav_icon');
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "ico") {

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
      error = "Photo only allows file types of ICO. ";
      color = "red";
      $("#fav_icon").val("");
      $("#load_image").attr("src","");
      addToast(error,color);
      }
}
function ValidateFileUpload1() {
        var fuData = document.getElementById('logo');
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "png") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#load_image1').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }

      } 
//The file upload is NOT an image
else {
      error = "Photo only allows file types of PNG. ";
      color = "red";
      $("#logo").val("");
      $("#load_image1").attr("src","");
      addToast(error,color);
      }
}
function ValidateFileUploadicon() {
        var fuData = document.getElementById('file');
        var FileUploadPath = fuData.value;

//To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "png") {

// To Display
          if (fuData.files && fuData.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#icon_upload').attr('src', e.target.result);
              }

              reader.readAsDataURL(fuData.files[0]);
          }

      } 
//The file upload is NOT an image
else {
      error = "Photo only allows file types of PNG. ";
      color = "red";
      $("#file").val("");
      $("#icon_upload").attr("src","");
      addToast(error,color);
      }
}
function RoleDel(id) {
  deletepopupfun(base_url+'backend/common/DeleteRole',id);
}
function banner_modal() {
  $("#myModalbanner").load(base_url+'backend/common/banner_modal');
}
