var eventTable = $('#xmlTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/xmlprovider/xml_details_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
$('#add_xml_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/xmlprovider/provider_validation',
          data: $('#add_xml_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_xml_form").submit();
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
function deletexmlfun(id) {
  deletepopupfun("xmlprovider/delete_xml",id);
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
      	close_delete_modal();
      	var eventTable = $('#xmlTable').dataTable({
		        "bDestroy": true,
		        "ajax": {
		            url : base_url+'/backend/xmlprovider/xml_details_list',
		            type : 'GET'
		        },
		    "fnDrawCallback": function(settings){
		    $('[data-toggle="tooltip"]').tooltip();          
		    }
		  });
 	  }
	});
}
function ActiveStatus(id) {
    var ActiveStatus = $("#ActiveStatus"+id).val();
    if($("#ActiveStatus"+id).is(':checked')) { 
      var status = '1';
    } else {
      var status = '0';
    }
    $.ajax({
        dataType: 'json',
        type: "Post",
        url: base_url+'/backend/Xmlprovider/ActiveStatus?id='+id+'&status='+status,
        success: function(data) {
          addToast("Updated Successfully","green");
        }
    });
  }
