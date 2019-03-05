// $(document).ready(function() {
    $("#accept_button").click(function(e) {
      var id = $("#book_id").val();
      var hotel_id = $("#hotels_id").val();
      var agent_id = $("#agents_id").val();
      var booking_confirmation = $("#booking_confirmation").val();
      var booking_confirmation_name = $("#booking_confirmation_name").val();
      if (booking_confirmation=="") {
        $("#booking_confirmation").focus();
        $("#booking_confirmation").css("border","1px solid red");
      } else if(booking_confirmation_name=="") {
        $("#booking_confirmation_name").focus();
        $("#booking_confirmation_name").css("border","1px solid red");
      } else {
        // $("#invoice_form").attr("action",base_url+'backend/booking/hotel_portel_admin_permission?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id);
        // $("#invoice_form").submit();
        $("#booking_confirmation").css("border","1px solid gray");
         $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/hotel_portel_admin_permission?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id+'&booking_confirmation='+booking_confirmation+'&booking_confirmation_name='+booking_confirmation_name,
            cache: false,
            success: function(response) {
              addToast("Accepted Successfully","green");
              document.location.reload(true);
           
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
      }
    });
    $("#reject_button").click(function(e){

    var id = $("#idz").val();
    var hotel_id = $("#hotelz_id").val();
    var agent_id = $("#agentz_id").val();
    addToast("Canceld Successfully","green");
    $.ajax({
      // dataType: 'json',
      type: "POST",
      url: base_url+'backend/booking/cancellationUpdate?book_id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id,
      cache: false,
      success: function (response) {
        document.location.reload(true); 
      }
    });

  });
  

  /*Xml Accept click funtion*/
  $("#xmlaccept_button").click(function(e) {
      var id = $("#book_id").val();
      var hotel_id = $("#hotels_id").val();
      var agent_id = $("#agents_id").val();
      var booking_confirmation = $("#booking_confirmation").val();
      var booking_confirmation_name = $("#booking_confirmation_name").val();
      if (booking_confirmation=="") {
        $("#booking_confirmation").focus();
        $("#booking_confirmation").css("border","1px solid red");
      } else if(booking_confirmation_name=="") {
        $("#booking_confirmation_name").focus();
        $("#booking_confirmation_name").css("border","1px solid red");
      } else {
        // $("#invoice_form").attr("action",base_url+'backend/booking/hotel_portel_admin_permission?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id);
        // $("#invoice_form").submit();
        $("#booking_confirmation").css("border","1px solid gray");
         $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/hotel_portel_xmlaccept?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id+'&booking_confirmation='+booking_confirmation+'&booking_confirmation_name='+booking_confirmation_name,
            cache: false,
            success: function(response) {
              addToast("Accepted Successfully","green");
              document.location.reload(true);
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
      }
    });

  
// }); 
function filter(val) {
    var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "order": [[ 2, 'desc' ]],
        "ajax": {
            url : base_url+'/backend/booking/hotel_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function add_reference_entry_fun(book_id,agent_id,hotel_id,checkInDate) {
  $("#reference_add_modal").load(base_url+"backend/booking/booking_reference_id_popup?book_id="+book_id+'&agent_id='+agent_id+'&hotel_id='+hotel_id+'&checkInDate='+checkInDate);
}
// @Xml confirmation entry modal
function xmlcancelPopup(id,status = 'HotelCancel') {
  $("#cancelModel").load(base_url+"backend/booking/xmlBookingCancelModal?id="+id+"&status="+status);
}
function add_reference_entryxml_fun(book_id,agent_id,hotel_id,checkInDate) {
  $("#reference_add_modal").load(base_url+"backend/booking/xmlbooking_reference_id_popup?book_id="+book_id+'&agent_id='+agent_id+'&hotel_id='+hotel_id+'&checkInDate='+checkInDate);
}
function cancelPopup(book_id,hotel_id) {
  $("#cancelModel").load(base_url+"backend/booking/BookingCancel?book_id="+book_id+'&hotel_id='+hotel_id);
}
function rejectPopup(book_id,hotel_id) {
  $("#rejectModel").load(base_url+"backend/booking/BookingReject?book_id="+book_id+'&hotel_id='+hotel_id);
}

function offlinefilter(val) {
    var offline_booking_table = $('#offline_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/booking/offline_booking_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
function OfflineEditModal(id) {
  $("#OfflineModal").load(base_url+"backend/booking/OfflineEditModal?id="+id);
  $('#OfflineModal').modal({
    backdrop: 'static',
    keyboard: false
  });
}
function OfflineRequestUpdate() {
  var hotelName = $("#hotelName").val(); 
  var roomName = $("#roomName").val();
  var SupplierName = $("#SupplierName").val();
  var HotelAddress = $("#HotelAddress").val();
  var SupplierAddress = $("#SupplierAddress").val();
  if (hotelName=="") {
    addToast("Hotel name field is required!","orange");
    $("#hotelName").focus(); 
  } else if(roomName=="") {
    addToast("Room name field is required!","orange");
    $("#roomName").focus(); 
  } else if(SupplierName=="") {
    addToast("Supplier name field is required!","orange");
    $("#SupplierName").focus(); 
  } else if(HotelAddress=="") {
    addToast("Hotel address field is required!","orange");
    $("#HotelAddress").focus();
  } else if(SupplierAddress=="") {
    addToast("Supplier address field is required!","orange");
    $("#SupplierAddress").focus();
  } else {
    addToast("Updated Successfully","green");
    $("#OfflineRequestForm").attr('action',base_url+'backend/booking/OfflineRequestupdate');
    $("#OfflineRequestForm").submit();
  }
}
function OffllineBookingactionfun(id,val) {
  $("#booking_modal").load(base_url+"backend/booking/OfflineActionModal?id="+id+'&val='+val);
  $('#booking_modal').modal({
    backdrop: 'static',
    keyboard: false
  });
}
function tourlistfilter(val) {
    var tour_booking_table = $('#tour_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/booking/tour_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function transferlistfilter(val) {
    var transfer_booking_table = $('#transfer_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/booking/transfer_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function transfer_add_reference_entry_fun(book_id,agent_id,vehicle_id) {
  $("#reference_add_modal").load(base_url+"backend/booking/transferbooking_reference_id_popup?book_id="+book_id+'&agent_id='+agent_id+'&vehicle_id='+vehicle_id);
}
function transfercancelPopup(book_id) {
  $("#cancelModel").load(base_url+"backend/booking/transferbookingcancel?book_id="+book_id);
}
function tour_add_reference_entry_fun(book_id,agent_id,tour_id) {
  $("#reference_add_modal").load(base_url+"backend/booking/tourbooking_reference_id_popup?book_id="+book_id+'&agent_id='+agent_id+'&tour_id='+tour_id);
}
function tourcancelPopup(book_id) {
  $("#cancelModel").load(base_url+"backend/booking/tourbookingcancel?book_id="+book_id);
}
function xmlamendmentPopup(id) {
  $("#amendmentModel").load(base_url+"backend/booking/xmlBookingAmendmentModal?id="+id);
}
function xmlamendmentCheckStatus(id) {
  alert(id);
  $.ajax({
      // dataType: 'json',
      type: "POST",
      url: base_url+'backend/booking/amendmentCheckStatus?bookingid='+id,
      cache: false,
      success: function (response) {
        alert(response);
      }
    });
}
