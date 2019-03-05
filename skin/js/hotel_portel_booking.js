$(document).ready(function() {
	var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Dashboard/hotel_booking_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  var hotel_booking_history_table = $('#hotel_booking_history_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Dashboard/hotel_booking_history',
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
    var id = $("#idz").val();
    var hotel_id = $("#hotelz_id").val();
    var agent_id = $("#agentz_id").val();
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+'dashboard/booking_reject?id='+id+'&hotel_id='+hotel_id+'&agent_id='+agent_id,
      cache: false,
      success: function (response) {
        $(".close_but").trigger("click");
        $(".reject_msg").append('<script type="text/javascript"> AddToast("success","Cancellation request sent Successfully","!");</script>');
          hotel_booking_table.api().ajax.reload(function(){ 
          }, true); 
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
    // alert("gjhsgdja");
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
              var hotel_booking_table = $('#hotel_booking_table').dataTable({
                  "bDestroy": true,
                  "ajax": {
                      url : base_url+'Dashboard/hotel_booking_list',
                      type : 'GET'
                  },
              "fnDrawCallback": function(settings){
              $('[data-toggle="tooltip"]').tooltip();          
              }
            }); 
            }
        });
      }
    });
  
  //    // var booking_invoice_id =  $("#booking_invoice_id").val();
     // var booking_invoice_date =  $("#booking_invoice_date").val();
     // var invoice_check = $("#invoice_ck").val();
     // invoice_check1(booking_invoice_id);
     //  if (booking_invoice_id=="") {
     //    $(".invoice_err").text("Invoice field is required!");
     //  } else if(invoice_check==1) {
     //    $(".invoice_date_err").text("Invoice Id already exist!"); 
     //  } else if(booking_invoice_date=="") {
     //    $(".invoice_date_err").text("Invoice date field is required!"); 
     //  } else {
        //booking_accept_fun();
      
 
});
function deletefun(id,hotel_id,agent_id) {
    $("#idz").val(id);
    $("#hotelz_id").val(hotel_id);
    $("#agentz_id").val(agent_id);
}
function hotelactionfun(id,val,hotel_id,agent_id) {
  $("#booking_id").val(id);
  $("#hotels_id").val(hotel_id);
  $("#agents_id").val(agent_id);
}
function invoice_check1(booking_invoice_id) {
  if (booking_invoice_id!="") {
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'dashboard/invoice_check?id='+booking_invoice_id,
        cache: false,
        success: function (response) {
            $("#invoice_ck").val(response);
        }
      });
  }
}
 

function hotel_invoice(id) {
  $("#booking_success_modal").load(base_url+'dashboard/hotel_invoice?id='+id);
}
function bkfilter(val) {
    $(".Pending").removeClass('active');
    $(".Accepted").removeClass('active');
    $(".Rejected").removeClass('active');
    $(".Cancelled").removeClass('active');
    $(".CanPending").removeClass('active');
    $(".AccPending").removeClass('active');
    $(".OnRequest").removeClass('active');
    if (val==0) {
      $(".Rejected").addClass('active');
    } else if(val==1) {
      $(".Accepted").addClass('active');
    } else if(val==2) {
      $(".Pending").addClass('active');
    } else if(val==3) {
      $(".Cancelled").addClass('active');
    } else if(val==5) {
      $(".CanPending").addClass('active');
    } else if(val==4) {
      $(".AccPending").addClass('active');
    } else if(val==8) {
      $(".OnRequest").addClass('active');
    }
    var hotel_booking_table = $('#hotel_booking_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'Dashboard/hotel_booking_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
