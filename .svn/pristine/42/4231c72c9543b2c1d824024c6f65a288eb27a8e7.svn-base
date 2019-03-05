var contract_id = $('#contract_id').val();
var policyTable = $('#policyTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/tour/policy_details_list/'+contract_id,
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
          url: base_url+'/backend/tour/policy_validation',
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
        var policyTable = $('#policyTable').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/tour/policy_details_list/'+contract_id,
                type : 'GET'
            },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      });
    }
  });
}