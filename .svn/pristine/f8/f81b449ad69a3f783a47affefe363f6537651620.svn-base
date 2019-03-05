$(document).ready(function() {
  var agent_invoice_table = $('#agent_invoice_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Payment/agent_invoice_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 

  var offlineRequestTable = $('#offlineRequestTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Payment/offlineRequestList',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
    /* Delete data */
  $("#reject_button").click(function(e){
  /*Form Submit*/
  e.preventDefault();
    var id = $("#id").val();
    var check_in = $("#check_in").val();
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+'Payment/agent_booking_cancel?id='+id+'&check_in='+check_in,
      cache: false,
      success: function (response) {
        $(".close_but").trigger("click");
        $(".reject_msg").append('<script type="text/javascript"> AddToast("success","Cancelled Successfully","!");</script>');
         
        var filter = $("#filter").val();
          var agent_booking_table = $('#agent_booking_table').dataTable({
              "bDestroy": true,
              "ajax": {
                  url : base_url+'Payment/agent_booking_list?filter='+filter,
                  type : 'GET'
              },
          "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
          }
        });
      }
    });

  });
  var agent_booking_profit_table = $('#agent_booking_profit_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Payment/agent_booking_profit_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  $("#accept_button").click(function(e) {
    e.preventDefault();
      var id = $("#ids").val();
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
        $("#booking_confirmation").css("border","1px solid gray");
         $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'/Dashboard/hotel_portel_permission?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id,
            data: $('#invoice_form').serialize(),
            cache: false,
            success: function(response) {
              $(".close_but").trigger("click");
              window.location.reload();
            }
          }); 
      }
  });
     

  $("#reject_button").click(function(e){
  /*Form Submit*/
  e.preventDefault();
    var id = $("#id").val();
    var hotel_id = $("#hotelz_id").val();
    var agent_id = $("#agentz_id").val();
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+'dashboard/booking_reject?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id,
      cache: false,
      success: function (response) {
        $(".close_but").trigger("click");
        $(".reject_msg").append('<div class="alert alert-success"><strong>Success!</strong> Cancelled Successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>');
          hotel_booking_table.api().ajax.reload(function(){ 
          }, true); 
      }
    });

  });

  $("#OfflineRequestSubmit").click(function(e){
  e.preventDefault();
    var Destination = $("#Destination").val();
    var CheckIn = $("#CheckIn").val();
    var CheckOut = $("#CheckOut").val();
    var noOfRooms = $("#noOfRooms").val();
    var nationality = $('#nationality').val();

    if (Destination=="") {
      $("#Destination").focus();
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
    } else if(CheckIn=="") {
      $("#CheckIn").focus();
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Check In field is required","!");</script>');
    } else if(CheckOut=="") {
      $("#CheckIn").focus();
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Check Out field is required","!");</script>');
    } else if(nationality=="") {
      $("#nationality").focus();
      $(".msg").append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
    }else if(noOfRooms=="") {
      $("#noOfRooms").focus();
      $(".msg").append('<script type="text/javascript"> AddToast("danger","No of rooms field is required","!");</script>');
    } else {
        OfflineRequestSubmitfunc();
    }
  });

  $("#cancel_transfer").on().click(function() {
    $(this).attr('disabled','disabled');
    var id = $("#id").val();
    $.ajax({
      dataType: 'json',
      url: base_url+'Transfer/CancellationTransferBooking?id='+id,
      cache: false,
      success: function (response) {
        $("#cancel_reject").trigger("click");
        var transfer_booking_table = $('#transfer_booking_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'transfer/transfer_booking_list',
                type : 'GET'
            },
          "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
      }
    });
  });
  $("#cancel_tour").on().click(function() {
    $(this).attr('disabled','disabled');
    var id = $("#id").val();
    $.ajax({
      dataType: 'json',
      url: base_url+'tour/CancellationTourBooking?id='+id,
      cache: false,
      success: function (response) {
        $("#cancel_reject").trigger("click");
        var tour_booking_table = $('#tour_booking_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'tour/tour_booking_list',
                type : 'GET'
            },
          "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
      }
    });
  });
});
function deletefun(id,check_in) {
  $("#myModal").load(base_url+'Payment/CancellationBookingModal?id='+id+'&check_in='+check_in);
}
function bkfilter(val) {
    $(".Pending").removeClass('active');
    $(".Accepted").removeClass('active');
    $(".Rejected").removeClass('active');
    $(".Cancelled").removeClass('active');
    $(".CanPending").removeClass('active');
    $(".AccPending").removeClass('active');
    $(".OnRequest").removeClass('active');
    $("#filter").val(val);
    if (val==0) {
      $(".Rejected").addClass('active');
    } else if(val==1) {
      $(".Accepted").addClass('active');
    } else if(val==2) {
      $(".Pending").addClass('active');
    }else if(val==3) {
      $(".Cancelled").addClass('active');
    } else if(val==5) {
      $(".CanPending").addClass('active');
    } else if(val==4) {
      $(".AccPending").addClass('active');
    } else if(val==8) {
      $(".OnRequest").addClass('active');
    }
    var agent_booking_table = $('#agent_booking_table').dataTable({
        "bDestroy": true,
        "order": [[ 2, 'desc' ]],
        "ajax": {
            url : base_url+'Payment/agent_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function Proffilter(val) {
    $(".Pending").removeClass('active');
    $(".Accepted").removeClass('active');
    $(".Rejected").removeClass('active');
    $(".Cancelled").removeClass('active');
    if (val==0) {
      $(".Rejected").addClass('active');
    } else if(val==1) {
      $(".Accepted").addClass('active');
    } else if(val==2) {
      $(".Pending").addClass('active');
    }else if(val==3) {
      $(".Cancelled").addClass('active');
    }
    var agent_booking_profit_table = $('#agent_booking_profit_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Payment/agent_booking_profit_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
function hotel_invoice(){
  var id=$("#id").val();
  $("#booking_success_modal").load(base_url+'dashboard/hotel_invoice?id='+id);
}
function hotelactionfun() {
 
    var id=$("#id").val();
    var Hotelid=$("#Hotelid").val();
    var Agentid=$("#Agentid").val();

  // $("#id").val(id);
  // $("#Hotelid").val(hotel_id);
  // $("#Agentid").val(agent_id);
}
function OfflineRequestModal() {
  $("#myModal").load(base_url+'Payment/OfflineRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
function OfflineRequestSubmitfunc() {
  $.ajax({
      dataType: 'json',
      url: base_url+'Payment/OfflineRequestSubmit',
      cache: false,
      data : $("#OfflineRequestform").serialize(),
      success: function (response) {
        $(".close_but").trigger("click");
        $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
          var offlineRequestTable = $('#offlineRequestTable').dataTable({
                "bDestroy": true,
                "ajax": {
                    url : base_url+'Payment/offlineRequestList',
                    type : 'GET'
                },
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            }
          }); 
      }
    });
}
function tourfilter(val) {
    $(".Pending").removeClass('active');
    $(".Accepted").removeClass('active');
    $(".Rejected").removeClass('active');
    $(".Cancelled").removeClass('active');
    $(".CanPending").removeClass('active');
    $(".AccPending").removeClass('active');
    $(".OnRequest").removeClass('active');
    $("#filter").val(val);
    if (val==0) {
      $(".Rejected").addClass('active');
    } else if(val==1) {
      $(".Accepted").addClass('active');
    } else if(val==2) {
      $(".Pending").addClass('active');
    }else if(val==3) {
      $(".Cancelled").addClass('active');
    } else if(val==5) {
      $(".CanPending").addClass('active');
    } else if(val==4) {
      $(".AccPending").addClass('active');
    } else if(val==8) {
      $(".OnRequest").addClass('active');
    }
    var tour_booking_table = $('#tour_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'tour/tour_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function transferfilter(val) {
    $(".Pending").removeClass('active');
    $(".Accepted").removeClass('active');
    $(".Rejected").removeClass('active');
    $(".Cancelled").removeClass('active');
    $(".CanPending").removeClass('active');
    $(".AccPending").removeClass('active');
    $(".OnRequest").removeClass('active');
    $("#filter").val(val);
    if (val==0) {
      $(".Rejected").addClass('active');
    } else if(val==1) {
      $(".Accepted").addClass('active');
    } else if(val==2) {
      $(".Pending").addClass('active');
    }else if(val==3) {
      $(".Cancelled").addClass('active');
    } else if(val==5) {
      $(".CanPending").addClass('active');
    } else if(val==4) {
      $(".AccPending").addClass('active');
    } else if(val==8) {
      $(".OnRequest").addClass('active');
    }
    var transfer_booking_table = $('#transfer_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'transfer/transfer_booking_list?filter='+val,
            type : 'GET'
        },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    }
  }); 
}
function deletetransferfun(id) {
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
  // $("#myModal").load();
  $.ajax({
      // dataType: 'json',
      url: base_url+'Transfer/CancellationBookingModal?id='+id,
      cache: false,
      success: function (response) {
        $("#myModal").html(response);
      }
    });
}
function deletetourfun(id) {
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
  // $("#myModal").load();
  $.ajax({
      // dataType: 'json',
      url: base_url+'Tour/CancellationBookingModal?id='+id,
      cache: false,
      success: function (response) {
        $("#myModal").html(response);
      }
    });
}
