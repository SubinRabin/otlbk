// $(document).ready(function() {
  var agent_table = $('#agent_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/agents/agent_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
	$('#add_agent_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/agents/agent_validation',
          data: $('#agent_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#agent_form").submit();
              }, 1500);
            }
             else {
              addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    });

  /* Delete data */
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
          agent_table.api().ajax.reload(function(){ 
            $(".Rejected").trigger('click');
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

  $("#update_hotels_banner").click(function() {
    $("#undo_redo_to option").attr('selected','selected');
    var hotels = $("#undo_redo_to option").length;
    if (hotels==0) {
      addToast('Must select a hotel','orange');
    } else if (hotels < 6) {
      addToast('Max 6 hotels','orange');
    } else if (hotels > 6) {
      addToast('Max 6 hotels','orange');
    } else {
      $("#hotels_banner_form").attr('action',base_url+'backend/agents/hotelsBannerUpdate');
      $("#hotels_banner_form").submit();
    }
  })
// });
 function deletefun(id) {
  deletepopupfun("agents/delete_agent",id);
}
function view_modal(id) {
  $("#large_modal").modal('show');
  $("#large_modal").load('agents/view_agent?id='+id);
}
function banner_modal(id) {
  $("#myModalbanner").load(base_url+'backend/agents/banner_modal?id='+id);
}

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
      color = "red";
      $("#profile_image").val("");
      $("#load_image").attr("src",base_url+"assets/images/user/1.png");
      addToast(error,color);
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
      color = "red";
      $("#tradefile").val("");
      $("#load_image1").attr("src",base_url+"assets/images/user/1.png");
      addToast(error,color);
     }
}
function AgentLogoUpload(){
  var agent_logo=document.getElementById('logo');
  var filepath=agent_logo.value;
  var ext=filepath.substring(filepath.lastIndexOf('.')+1).toLowerCase();
  // $file_name=$edit[0]->agency_code;
  // echo("Pass 1");
  if (ext == "bmp" || ext == "jpeg" || ext == "jpg" || ext == "png") 
      {
          if (agent_logo.files && agent_logo.files[0]) 
          {
              var reader = new FileReader();
              reader.onload = function(e) 
              {
                  $('#load_image2').attr('src', e.target.result);
              }
              reader.readAsDataURL(agent_logo.files[0]);
          }
      } 
else 
{
      error = "Photo only allows file types of JPG, JPEG and BMP. ";
      color = "red";
      $("#logo").val("");
      // $("#load_image2").attr("src",base_url+"assets/images/user/1.png");
      addToast(error,color);
     }
}



function iata_check(data) {
  if(data=='1') {
      $(".iata_number").removeClass("hide");
  } else {
      $(".iata_number").addClass("hide");
  }
}

function filter(val) {
  var agent_table = $('#agent_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/agents/agent_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
function agentpermissionfun(id,val) {
  addToast("Unblocked Successfully","green");
  if (val==1) {
    $(".Accepted").trigger('click');
  } 
  $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'/backend/agents/agentspermission?id='+id+'&&flag=1',
        data: $('#room_facility_form').serialize(),
    cache: false,
          success: function (response) {
            var agent_table = $('#agent_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/agents/agent_list?filter='+val,
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
          var agent_table = $('#agent_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/agents/agent_list',
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