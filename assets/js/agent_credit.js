// $(document).ready(function() {
  var agent_id =  $("#agent_id").val();
  var agent_credit_detail = $('#agent_credit_detail').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/agents/agent_credit_view_tbl?id='+agent_id,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
  $('#credit_button').click(function (e) {
    var agent_id = $("#agent_id").val();
    var amount   = $("#amount").val();
    if(amount==""){
        addToast('Credit Amount Is Required',"orange");
        $("#amount").focus();
          }
      else{
          $("#add_credit").submit();
          addToast("Credit amount added Successfully","green");
      }    
    
    }); 
// });
