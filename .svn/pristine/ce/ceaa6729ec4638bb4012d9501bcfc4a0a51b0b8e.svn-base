var supplierTable = $('#supplierTable').dataTable({
	    "bDestroy": true,
	    "ajax": {
	        url : base_url+'/backend/transfer/supplier_details_list',
	        type : 'GET'
	    },
	"fnDrawCallback": function(settings){
	$('[data-toggle="tooltip"]').tooltip();          
	}
});
var vehicleTable = $('#vehicleTable').dataTable({
	    "bDestroy": true,
	    "ajax": {
	        url : base_url+'/backend/transfer/vehicle_list',
	        type : 'GET'
	    },
	"fnDrawCallback": function(settings){
	$('[data-toggle="tooltip"]').tooltip();          
	}
});
var contractTable = $('#contractTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/transfer/contract_details_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
});
$('#add_supplier_submit_button').click(function (e) {
  e.preventDefault();
      $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/transfer/supplier_validation',
      data: $('#add_supplier_form').serialize(),
      cache: false,
      success: function (response) {
        // alert("data");
        if (response.status == "1") {
          addToast(response.error,response.color);
          window.setTimeout(function(){
             $("#add_supplier_form").submit();
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
$("#add_vehicle_submit_button").click(function() {
	var SupplierId = $("#SupplierId").val();
	var VehicleName = $("#VehicleName").val();
	var vehicleType = $("#vehicleType").val();
	var VehicleNumber = $("#VehicleNumber").val();
	var OwnerName = $("#OwnerName").val();
	var ContactNumber = $("#ContactNumber").val();
	var OwnerAddress = $("#OwnerAddress").val();
	var ConSelect = $("#ConSelect").val();
	var citySelect = $("#citySelect").val();
	var WaitingTime = $("#WaitingTime").val();
	if (SupplierId=="") {
		addToast('Supplier name field is required!','orange');
		$("#SupplierId").focus();
	} else if(VehicleName=="") {
		addToast('Vehicle Name field is required!','orange');
		$("#VehicleName").focus();
	} else if(vehicleType=="") {
		addToast('Vehicle type field is required!','orange');
		$("#vehicleType").focus();
	} else if(VehicleNumber=="") {
		addToast('Vehicle number field is required!','orange');
		$("#VehicleNumber").focus();
	} else if(OwnerName=="") {
		addToast('Owner name field is required!','orange');
		$("#OwnerName").focus();
	} else if(ContactNumber=="") {
		addToast('Contact Number field is required!','orange');
		$("#ContactNumber").focus();
	} else if(OwnerAddress=="") {
		addToast('Address field is required!','orange');
		$("#OwnerAddress").focus();
	} else if(ConSelect=="") {
		addToast('Country field is required!','orange');
		$("#ConSelect").focus();
	} else if(citySelect=="") {
		addToast('City field is required!','orange');
	} else if(WaitingTime=="") {
		addToast('Waiting Time is required!','orange');
		$("#WaitingTime").focus();
	} else {
		if ($("#edit_id").val()=="") {
			addToast('Inserted is successfully','green');
		} else {
			addToast('Updated is successfully','green');
		}
		$('#add_vehicle_form').submit();
	}
});
$('#add_contract_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/transfer/contract_validation',
          data: $('#add_contract_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_contract_form").submit();
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
var contract_id = $('#contract_id').val();
var policyTable = $('#policyTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/transfer/policy_details_list/'+contract_id,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
});
$('#add_policy_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/transfer/policy_validation',
          data: $('#add_policy_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_policy_form").submit();
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
function deletepolicyfun(id) {
  deletepopupfun("delete_policy",id);
}
function deletesupplierfun(id) {
  deletepopupfun("delete_supplier",id);
}
function deletecontractfun(id) {
  deletepopupfun("delete_contract",id);
}
function deletevehiclefun(id) {
  deletepopupfun("delete_vehicle",id);
}
function commonDelete() {
	$.ajax({
	  dataType: 'json',
	  type: "POST",
	  url: $("#delete_form").attr("action"),
	  data: $("#delete_form").serialize(),
	  cache: false,
	  success: function (response) {
      	addToast(response.error,response.color);
	  	if ($("#module").val() == "Contract") {
  			contractTable.api().ajax.reload();
	  	} else if($("#module").val() == "Policy") {
  			policyTable.api().ajax.reload();
	  	} else if($("#module").val()== "vehicle") {
        vehicleTable.api().ajax.reload();
      } else {
  			supplierTable.api().ajax.reload();
	  	}
      	close_delete_modal();
 	  }
	});
}
