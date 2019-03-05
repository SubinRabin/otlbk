$(document).ready(function() {
 
  $('#year').datepicker({
      minViewMode: 'years',
      autoclose: true,
       format: 'yyyy',
       orientation: "bottom",
  }); 
  $('#year').change(function() {
     room_change();
  });
  $('#year').click(function() {
      $('.datepicker-years').css('display','block');
  });

 // var table_hotel_detail = $('#table_hotel_detail').dataTable({
 //        "bDestroy": true,
 //        "ajax": {
 //            url : base_url+'dashboard/hotel_room_list',
 //            type : 'GET'
 //        },
 //    "fnDrawCallback": function(settings){
 //    $('[data-toggle="tooltip"]').tooltip();          
 //    }
 //  });
 $('#add_button').click(function (e){
    var hotel_id = $('#hotel_id').val();
    $("#contract_model").load(base_url+'dashboard/contract_Modal?hotel_id='+hotel_id);
  });
 // var contract_table = $('#contract_table').dataTable({
 //        "bDestroy": true,
 //        "ajax": {
 //            url : base_url+'/dashboard/contract_data?id='+sValue,
 //            type : 'GET'
 //        },
 //      "fnDrawCallback": function(settings){
 //      $('[data-toggle="tooltip"]').tooltip();          
 //      }
 //    });
  // $('#room_contract').change(function()){
  //   alert('sdfs');
  //   var r_id = $(this).find("option:selected").text();
  //   $('#id').val(r_id);

  // }



});
function allotement_update() {
  // $('#calEditForm').attr("action",base_url+'dashboard/allotement_update');
  // $('#calEditForm').submit();
  $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'dashboard/allotement_update',
      data: $('#calEditForm').serialize(),
      success: function(data) {
        addToast("Updated Successfully","green");
        document.location.reload(true);
      }
  });
  // $('#allotement_update_form').attr("action",base_url+'/backend/hotels/allotement_update');
  // $('#allotement_update_form').submit();
}
function cancellationCheck(days,percent) {
  $("#canModal").load(base_url+"dashboard/cancellationCheck_modal?days="+days+'&percent='+percent);
}

function room_change(){
  $("#allotement_filter").submit();
  var hotel_id = $("#hotel_id").val();
  var contract_id = $("#con_id").val();
  var room_id = $("#room_id").val();
  // var year = $("#year").val();
  // var month =  $("#month").val();
  window.location = base_url+"dashboard/allotement?hotel_id="+hotel_id+"&room_id="+room_id+'&con_id='+contract_id;
}
function deletefunctionn(room_id) {
  deletepopupfun("delete_room_type_hotel_log",room_id);
  }  
function deletepopup(action,room_id) {
    $("#room_id").val(room_id);
    $("#new_hotel_room_delete").attr("action",action);
    $('#myModaldelete').modal();
}
function policy_view(hotel_id,id){
//alert(id)
    $('#policy_model').modal({backdrop: 'static'});
    $("#policy_model").load(base_url+'dashboard/policies?hotel_id='+hotel_id+'&id='+id);
    $("#policy_model").load(CancellationPolicySelectfun(hotel_id,id));
}
function country_accessible_modal(hotel_id,id) {
    $("#accessible_modal").load(base_url+'dashboard/country_accessible_modal?hotel_id='+hotel_id+'&id='+id);
}
function contract_copy(hotel_id,id){
    $("#contract_model").load(base_url+'dashboard/contract_Modal?hotel_id='+hotel_id+'&id='+id+'&copy=1');
}
function contract_edit(hotel_id,id){
  $("#contract_model").load(base_url+'dashboard/contract_Modal?hotel_id='+hotel_id+'&id='+id);
}
function contract_delete(hotel_id,id){
  $("#id").val(id);
}
function editfunctionn(room_id) {
  $("#myModaledit").load(base_url+'dashboard/room_detail_viewings?id='+room_id);
}
function vieweditfunctionn(room_id) {
  $("#myModaleditview").load(base_url+'dashboard/room_detail_viewings_only?id='+room_id);
}

function CancellationPolicySelectfun(hotel_id,id) {
  $("#CancellationPolicySelect option").remove();
  var contract_id = id;
  $.ajax({
            dataType: 'json',
            type: "Post",
            url: base_url+'dashboard/cancellationPolicySelect?hotel_id='+hotel_id+'&contract_id='+contract_id,
            success: function(data) {
              //alert(data)
                    $.each(data, function(i, v) {
                          $("#CancellationPolicySelect").append('<option value="'+v.id+'">'+v.SeasonName+' - daysInAdvance : '+v.daysInAdvance+'</option>');
                    });
            CancellationPolicyContentfun();
            }
    }, 'JSON');
}
function CancellationPolicyContentfun() {
  var valId = $("#CancellationPolicySelect").val();
  var contract_id = $("#contract_id").val();
  var hotel_id = $("#hotel_id").val();
  $.ajax({
            dataType: 'json',
            type: "Post",
            url: base_url+'dashboard/CancellationPolicyContentget?hotel_id='+hotel_id+'&contract_id='+contract_id+'&id='+valId,
            success: function(data) {
                    $(".cancel_policy .trumbowyg-editor").html(data.cancelation_policy);
          // $("#cancel_policy").val(data.cancelation_policy);
            }
    }, 'JSON');
}

// image upload
$('#add_more').click(function() {
          "use strict";
          $(this).before($("<div/>", {
            id: 'filediv'
          }).fadeIn('slow').append(
            $("<input/>", {
              name: 'file[]',
              type: 'file',
              id: 'file',
              multiple: 'multiple',
              accept: 'image/*'
            })
          ));
        });

        $('#upload').click(function(e) {
          "use strict";
          e.preventDefault();

          if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
            alert("No files are selected.");
            return false;
          }

          // Now, upload the files below...
          // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
        });

        deletePreview = function (ele, i) {
          "use strict";
          try {
            $(ele).parent().remove();
            window.filesToUpload.splice(i, 1);
          } catch (e) {
            console.log(e.message);
          }
        }

        $("#file").on('change', function() {
          "use strict";

          // create an empty array for the files to reside.
          window.filesToUpload = [];

          if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function(i, img) {
              var reader = new FileReader(),
                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                preview = newElement.find("img");

              reader.onloadend = function() {
                preview.attr("src", reader.result);
                preview.attr("alt", img.name);
              };

              try {
                window.filesToUpload.push(document.getElementById("file").files[i]);
              } catch (e) {
                console.log(e.message);
              }

              if (img) {
                reader.readAsDataURL(img);
              } else {
                preview.src = "";
              }

              newElement.appendTo("#filediv");
            });
          }
});
$("#policy_click").click(function() {
  var imp_remarks = $("#imp_remarks").val();
  var cancel_policy = $("#cancel_policy").val();
  var imp_notes = $("#imp_notes").val();
  if (imp_remarks=="") {
      addToast("Important Remarks & Policies field is required!","orange");
  } else if (cancel_policy=="") {
      addToast("Cancellation Policy field is required!","orange");
  } else if (imp_notes=="") {
      addToast("Important Notes & Conditions field is required!","orange");
  } else {
      $("#imp_remarks").val(imp_remarks);
      $("#cancel_policy").val(cancel_policy);
      $("#imp_notes").val(imp_notes);
      addToast("Updated Successfully","green");
      $("#contract-policy-form").attr("action",base_url+"dashboard/policiesSubmit");
      $("#contract-policy-form").submit();
    }
  });
$('#contract_submit').click(function () {
    var tax             = $("#tax").val();
    var markup          = $("#markup").val();
    var max_age         = $("#max_age").val();
    var date_picker     = $("#date_picker").val();
    var date_picker1    = $("#date_picker1").val();
    var board           = $("#board").val();
    var hotel_id        = $("#id").val();
    var contract_type   = $("#contract_type").val();
    var linked_contract = $("#linked_contract").val();
    var contract_name   = $("#contract_name").val();

    if (tax==""||markup==""||max_age==""||date_picker==""||contract_name=="" ||date_picker1==""||board=="" ||board==""||contract_type=="" ) {
    
     if(tax=="")
    {
      $(".tax_err").text("Tax % field is required!");
    } else {
      $(".tax_err").text("");
    }
    if(markup=="")
    {
      $(".markup_err").text("Markup field is required!");
    } else {
      $(".markup_err").text("");
    } 
    if(max_age=="")
    {
      $(".max_age_err").text("Max. child age field is required!");
    } else {
      $(".max_age_err").text("");
    } 
    if(date_picker=="")
    {
      $(".date_picker_err").text("From date field is required!");
    } else {
      $(".date_picker_err").text("");
    } 
    if(date_picker1=="")
    {
      $(".date_picker1_err").text("To Date field is required!");
    } else {
      $(".date_picker1_err").text("");
    } 
    if(contract_type=="")
    {
      $(".contract_type_err").text("Contract Type  field is required!");
    } else {
      $(".contract_type_err").text("");
    }
    if(contract_name=="")
    {
      $(".contract_name_err").text("Contract Name  field is required!");
    } else {
      $(".ccontract_name_err").text("");
    }
    if(contract_type=="Sub" && linked_contract=="")
    {
      $(".linked_contract_err").text("Linked Contract  field is required!");
    } else {
      $(".linked_contract_err").text("");
    }

}
else
    {
       //addToast('Contract Updated successfully',"green");
       
       $("#add_contract").attr("action",base_url+'dashboard/add_contract');
       $("#add_contract").submit();
     }
});
$('#contract_update').click(function () {
    // var amount          = $("#amount").val();
    // var application     = $("#application").val();
    // var classification  = $("#classification").val();
    // var rate_type       = $("#rate_type").val();
    var tax             = $("#tax").val();
    var markup          = $("#markup").val();
    var max_age         = $("#max_age").val();
    var date_picker     = $("#date_picker").val();
    var date_picker1    = $("#date_picker1").val();
    var board           = $("#board").val();
    var hotel_id        = $("#id").val();
    var contract_type   = $("#contract_type").val();
    var linked_contract = $("#linked_contract").val();
    var contract_name   = $("#contract_name").val();
    if (tax==""||markup==""||max_age==""||date_picker==""||contract_name==""||date_picker1==""||board=="" ||board==""||contract_type=="" ) {
    
     if(tax=="")
    {
      $(".tax_err").text("Tax % field is required!");
    } else {
      $(".tax_err").text("");
    }
    if(markup=="")
    {
      $(".markup_err").text("Markup field is required!");
    } else {
      $(".markup_err").text("");
    } 
    if(max_age=="")
    {
      $(".max_age_err").text("Max. child age field is required!");
    } else {
      $(".max_age_err").text("");
    } 
    if(date_picker=="")
    {
      $(".date_picker_err").text("From date field is required!");
    } else {
      $(".date_picker_err").text("");
    } 
    if(date_picker1=="")
    {
      $(".date_picker1_err").text("To Date field is required!");
    } else {
      $(".date_picker1_err").text("");
    } 
    if(contract_type=="")
    {
      $(".contract_type_err").text("Contract Type  field is required!");
    } else {
      $(".contract_type_err").text("");
    }
    if(contract_name=="")
    {
      $(".contract_name_err").text("Contract Name  field is required!");
    } else {
      $(".ccontract_name_err").text("");
    }
    if(contract_type=="Sub" && linked_contract=="")
    {
      $(".linked_contract_err").text("Linked Contract  field is required!");
    } else {
      $(".linked_contract_err").text("");
    }
}
    else
      {
       //addToast('Contract Updated successfully',"green");
       
       $("#add_contract").attr("action",base_url+'dashboard/update_contract');
       $("#add_contract").submit();
     }
  
});
  
  // $("#room_contract").live('change',function(){
  //   // alert("asdas");
  // });
// $("#reject_button").click(function() {
//   // $("#add_contract").attr('action',base_url+'dashboard/add_contract');
//   // $("#add_contract").submit();
//   e.preventDefault();
//   var id = $("#id").val();
//   alert("#id");
//   $.ajax({
//     dataType: 'json',
//     type: "POST",
//     url: base_url+'dashboard/contract_delete?id='+id,
//     cache: false,
//     success: function (response) {
//       $(".close_but").trigger("click");
//       $(".reject_msg").append('<div class="alert alert-success"><strong>Success!</strong> Cancelled Successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>');
//         hotel_booking_table.api().ajax.reload(function(){ 
//         }, true); 
//     }
//   });
// });

