// $(document).ready(function() {
  $("#roleButton").click(function(e){
        var role = $("#role").val();
        var id   = $("#user_id").val();
        $("#roleName").attr('action',base_url+'backend/dashboard/RoleSelectAdd?id='+id);
        $("#roleName").submit();
    });
  var users_list_table = $('#users_list_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/users/users_list_table',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 

	$('#add_user_button').click(function (e) {
		var url = $("#user_form").attr("action");
      e.preventDefault();
        $.ajax({
        	dataType: 'json',
          type: 'post',
          url: 'user_validation',
          data: $('#user_form').serialize(),
  		cache: false,
          success: function (respose) {
          	if (respose.status == "1") {
              addToast(respose.error,respose.color);
              window.setTimeout(function(){
                 $("#user_form").submit();
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
        if (response.status=="1") {
          close_delete_modal();
          users_list_table.api().ajax.reload(function(){ 
            $(".Blocked").trigger('click');
            addToast(response.error,response.color);
          }, true); 
        } else {
          addToast(response.error,response.color);
        }
      },
      error: function (xhr,status,error) {
           alert("Error: " + error);
        }
    });


  });

  $("#change_pass").click(function() {
    if ($("#change_pass").val()==0) {
      $("#change_pass").val("1");
      $("#pass_change").val("0");
      $(".Default_password").removeAttr("disabled");
    } else {
      $("#change_pass").val("0");
      $("#pass_change").val("1");
      $(".Default_password").attr("disabled","disabled");
    }
  })
    
// });
 function deletefun(id) {
  deletepopupfun("users/delete_user",id);
}
function ValidateFileUpload() {
        var fuData = document.getElementById('Img');
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
      color = "red";
      $("#Img").val("");
      $("#load_image").attr("src","");
      addToast(error,color);
      }
}
function filter(val) {
  var users_list_table = $('#users_list_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/users/users_list_table?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
function userpermissionfun(id,val) {
  addToast("Unblocked Successfully","green");
  if (val==1) {
    $(".Unblocked").trigger('click');
  } 
  $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'/backend/users/userspermission?id='+id+'&&flag=1',
        data: $('#room_facility_form').serialize(),
        cache: false,
          success: function (response) {
            var users_list_table = $('#users_list_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/users/users_list_table?filter='+val,
                type : 'GET'
            },
          "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
          }
        }); 
        },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });
  
}
 function commonDelete() {
      $.ajax({
      dataType: 'json',
      type: "POST",
      url: $("#delete_form").attr("action"),
      data: $("#delete_form").serialize(),
      cache: false,
      success: function (response) {
        if (response.status==1) {
          close_delete_modal();
          addToast(response.error,response.color);
          var users_list_table = $('#users_list_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/users/users_list_table',
                type : 'GET'
            },
            "fnDrawCallback": function(settings){
              $('[data-toggle="tooltip"]').tooltip();          
            }
          }); 
        } else {
          addToast(response.error,response.color);
        }
      }
    });
  }

  
            

