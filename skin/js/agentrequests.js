// @new offline tour request
// load the modal to add new offline tour request
function OfflineTourRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflineTourRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
// @new offline transfer request
// load the modal to add new offline transfer request
function OfflineTransferRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflineTransferRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
// @new offline visa request
// load the modal to add new offline visa request
function OfflineVisaRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflineVisaRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
// @new offline package request
// load the modal to add new offline package request
function OfflinePackageRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflinePackageRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
// @new offline flight request
// load the modal to add new offline flight request
function OfflineFlightRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflineFlightRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
// @new offline park request
// load the modal to add new offline park request
function OfflineParkRequestModal() {
  $("#myModal").load(base_url+'OfflineRequests/OfflineParkRequestModal');
  $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
  });
}
$(document).ready(function() {
	// @datatables
	// list the offline tour requests to the datatable 
	var offlineTourRequestTable = $('#offlineTourRequestTable').dataTable({
	        "bDestroy": true,
	        "ajax": {
	            url : base_url+'OfflineRequests/offlineTourRequestList',
	            type : 'GET'
	        },
	    "fnDrawCallback": function(settings){
	    $('[data-toggle="tooltip"]').tooltip();          
	    }
	});
	// list the offline transfer requests to the datatable 
	var offlineTransferRequestTable = $('#offlineTransferRequestTable').dataTable({
	        "bDestroy": true,
	        "ajax": {
	            url : base_url+'OfflineRequests/offlineTransferRequestList',
	            type : 'GET'
	        },
	    "fnDrawCallback": function(settings){
	    $('[data-toggle="tooltip"]').tooltip();          
	    }
	});
	// list the offline tour requests to the datatable 
	var offlineVisaRequestTable = $('#offlineVisaRequestTable').dataTable({
	        "bDestroy": true,
	        "ajax": {
	            url : base_url+'OfflineRequests/offlineVisaRequestList',
	            type : 'GET'
	        },
	    "fnDrawCallback": function(settings){
	    $('[data-toggle="tooltip"]').tooltip();          
	    }
	});
  // list the offline package requests to the datatable 
  var offlinePackageRequestTable = $('#offlinePackageRequestTable').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'OfflineRequests/offlinePackageRequestList',
              type : 'GET'
          },
      "fnDrawCallback": function(settings){
      $('[data-toggle="tooltip"]').tooltip();          
      }
  });
  // list the offline flight requests to the datatable 
  var offlineFlightRequestTable = $('#offlineFlightRequestTable').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'OfflineRequests/offlineFlightRequestList',
              type : 'GET'
          },
      "fnDrawCallback": function(settings){
      $('[data-toggle="tooltip"]').tooltip();          
      }
  });
  // list the offline park requests to the datatable 
  var offlineParkRequestTable = $('#offlineParkRequestTable').dataTable({
          "bDestroy": true,
          "ajax": {
              url : base_url+'OfflineRequests/offlineParkRequestList',
              type : 'GET'
          },
      "fnDrawCallback": function(settings){
      $('[data-toggle="tooltip"]').tooltip();          
      }
  });
  
	// @new offline tour request
	// validating the new offline tour request form data
	$("#OfflineTourRequestSubmit").click(function(e){
        e.preventDefault();
          var tour_type = $("#tour_type").val();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          var contactemail = $("#contactemail").val();
          var contactnum = $("#contactnum").val();
          if (tour_type=="") {
            $("#tour_type").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Tour type field is required","!");</script>');
          } else if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else {
              OfflineTourRequestSubmitfunc();
          }
        });
	// @new offline transfer request
	// validating the new offline transfer request form data
	$("#OfflineTransferRequestSubmit").click(function(e){
        e.preventDefault();
          var transfertype = $('input[name=transfertype]:checked').val();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          var arrivalNo = $("#arrivalNo").val();
          var arrivalTime = $("#arrivalTime").val();
          var pickpoint = $("#pickpoint").val();
          var droppoint = $("#droppoint").val();
          var departureNo = $("#departureNo").val();
          var departureTime = $("#departureTime").val();
          var pickpoint1 = $("#pickpoint1").val();
          var droppoint1 = $("#droppoint1").val();
          if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else if (arrivalNo=="") {
            $("#arrivalNo").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Arrival flight no field is required","!");</script>');
          } else if (arrivalTime=="") {
            $("#arrivalTime").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Arrival flight time field is required","!");</script>');
          } else if(pickpoint=="") {
            $("#pickpoint").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Pickup point field is required","!");</script>');
          }else if(droppoint=="") {
            $("#droppoint").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Dropoff point field is required","!");</script>');
          } else if(transfertype=='two-way' && departureNo=="") {
            $("#departureNo").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Departure flight no field is required","!");</script>');
          } else if(transfertype=='two-way' && departureTime=="") {
            $("#departureTime").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Departure flight time field is required","!");</script>');
          } else if(transfertype=='two-way' && pickpoint1=="") {
            $("#pickpoint1").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Return pickup point field is required","!");</script>');
          }else if(transfertype=='two-way' && droppoint1=="") {
            $("#droppoint1").focus();
             $('.msg').append('<script type="text/javascript"> AddToast("danger","Return dropoff point field is required","!");</script>');
          } else {
              OfflineTransferRequestSubmitfunc();
          }
    });
  // @new offline visa request
	// validating the new offline visa request form data
	$("#OfflineVisaRequestSubmit").click(function(e){
        e.preventDefault();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          var visa_type = $("#visa_type").val();
          var firstname = $("#firstname").val();
          var lastname = $("#lastname").val();
          if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else if (visa_type=="") {
            $("#visa_type").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Visa type field is required","!");</script>');
          } else if (firstname=="") {
            $("#firstname").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Firstname field is required","!");</script>');
          } else if (lastname=="") {
            $("#lastname").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Lastname field is required","!");</script>');
          } else {
              OfflineVisaRequestSubmitfunc();
          }
        });
  // @new offline package request
  // validating the new offline package request form data
  $("#OfflinePackageRequestSubmit").click(function(e){
        e.preventDefault();
          var tourreq = $("#tourreq").val();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          var budget = $("#budget").val();
          if (tourreq=="") {
            $("#visa_type").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Tour required field is required","!");</script>');
          } else if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else if (budget=="") {
            $("#budget").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Budget field is required","!");</script>');
          } else {
              OfflinePackageRequestSubmitfunc();
          }
        });
  // @new offline flight request
  // validating the new offline flight request form data
  $("#OfflineFlightRequestSubmit").click(function(e){
        e.preventDefault();
          var from = $("#From").val();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          if (from=="") {
            $("#From").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","From field is required","!");</script>');
          } 
          else if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else {
              OfflineFlightRequestSubmitfunc();
          }
    });
  // @new offline park request
  // validating the new offline park request form data
  $("#OfflineParkRequestSubmit").click(function(e){
        e.preventDefault();
          var themePark = $("#themePark").val();
          var Destination = $("#Destination").val();
          var nationality = $("#nationality").val();
          if (themePark=="") {
            $("#themePark").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Themepark field is required","!");</script>');
          } else if (Destination=="") {
            $("#Destination").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Destination field is required","!");</script>');
          } else if(nationality=="") {
            $("#nationality").focus();
            $('.msg').append('<script type="text/javascript"> AddToast("danger","Nationality field is required","!");</script>');
          } else {
              OfflineParkRequestSubmitfunc();
          }
        });
});

// @ adding offline tour requests
// submiting the new offline tour request form data
function OfflineTourRequestSubmitfunc() {
        $.ajax({
            dataType: 'json',
            url: base_url+'OfflineRequests/OfflineTourRequestSubmit',
            cache: false,
            data : $("#OfflineTourRequestform").serialize(),
            success: function (response) {
              $(".close_but").trigger("click");
              $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
                var offlineTourRequestTable = $('#offlineTourRequestTable').dataTable({
                      "bDestroy": true,
                      "ajax": {
                          url : base_url+'OfflineRequests/offlineTourRequestList',
                          type : 'GET'
                      },
                  "fnDrawCallback": function(settings){
                  $('[data-toggle="tooltip"]').tooltip();          
                  }
                }); 
            }
          });
}
// @ adding offline transfer requests
// submiting the new offline transfer request form data
function OfflineTransferRequestSubmitfunc() {
        $.ajax({
            dataType: 'json',
            url: base_url+'OfflineRequests/OfflineTransferRequestSubmit',
            cache: false,
            data : $("#OfflineTransferRequestform").serialize(),
            success: function (response) {
              $(".close_but").trigger("click");
              $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
                var offlineTransferRequestTable = $('#offlineTransferRequestTable').dataTable({
                      "bDestroy": true,
                      "ajax": {
                          url : base_url+'OfflineRequests/offlineTransferRequestList',
                          type : 'GET'
                      },
                  "fnDrawCallback": function(settings){
                  $('[data-toggle="tooltip"]').tooltip();          
                  }
                }); 
            }
          });
}
// @ adding offline visa requests
// submiting the new offline visa request form data
function OfflineVisaRequestSubmitfunc() {
  $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
  $("#OfflineVisaRequestform").attr('action',base_url+'OfflineRequests/OfflineVisaRequestSubmit');
  $("#OfflineVisaRequestform").submit();
}
// @ adding offline package requests
// submiting the new offline package request form data
function OfflinePackageRequestSubmitfunc() {
        $.ajax({
            dataType: 'json',
            url: base_url+'OfflineRequests/OfflinePackageRequestSubmit',
            cache: false,
            data : $("#OfflinePackageRequestform").serialize(),
            success: function (response) {
              $(".close_but").trigger("click");
              $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
                var offlinePackageRequestTable = $('#offlinePackageRequestTable').dataTable({
                      "bDestroy": true,
                      "ajax": {
                          url : base_url+'OfflineRequests/offlinePackageRequestList',
                          type : 'GET'
                      },
                  "fnDrawCallback": function(settings){
                  $('[data-toggle="tooltip"]').tooltip();          
                  }
                }); 
            }
          });
}
// @ adding flight transfer requests
// submiting the new offline flight request form data
function OfflineFlightRequestSubmitfunc() {
        $.ajax({
            dataType: 'json',
            url: base_url+'OfflineRequests/OfflineFlightRequestSubmit',
            cache: false,
            data : $("#OfflineFlightRequestform").serialize(),
            success: function (response) {
              $(".close_but").trigger("click");
              $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
                var offlineTransferRequestTable = $('#offlineFlightRequestTable').dataTable({
                      "bDestroy": true,
                      "ajax": {
                          url : base_url+'OfflineRequests/offlineFlightRequestList',
                          type : 'GET'
                      },
                  "fnDrawCallback": function(settings){
                  $('[data-toggle="tooltip"]').tooltip();          
                  }
                }); 
            }
          });
}
// @ adding flight transfer requests
// submiting the new offline flight request form data
function OfflineParkRequestSubmitfunc() {
        $.ajax({
            dataType: 'json',
            url: base_url+'OfflineRequests/OfflineParkRequestSubmit',
            cache: false,
            data : $("#OfflineParkRequestform").serialize(),
            success: function (response) {
              $(".close_but").trigger("click");
              $(".msg").append('<script type="text/javascript"> AddToast("success","Inserted Successfully","!");</script>');
                var offlineParkRequestTable = $('#offlineParkRequestTable').dataTable({
                      "bDestroy": true,
                      "ajax": {
                          url : base_url+'OfflineRequests/offlineParkRequestList',
                          type : 'GET'
                      },
                  "fnDrawCallback": function(settings){
                  $('[data-toggle="tooltip"]').tooltip();          
                  }
                }); 
            }
          });
}