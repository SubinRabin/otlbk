var contractTable = $('#contractTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/tour/contract_details_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
});
$('#add_contract_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/tour/contract_validation',
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
function deletecontractfun(id) {
  deletepopupfun("delete_contract",id);
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
        var contractTable = $('#contractTable').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/tour/contract_details_list',
                type : 'GET'
            },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      });
    }
  });
}