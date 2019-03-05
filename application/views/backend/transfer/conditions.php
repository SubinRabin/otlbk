<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Transfer Contracts - Terms and Conditions</span>
                        <span style="margin-left: 10px;" class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/newcondition/<?php echo $contract_id ?>" class="btn-sm btn-primary">Add</a></span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/transfer_contracts" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="contract_id" value="<?php echo $contract_id ?>" name="contract_id">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="conditionTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Terms and Conditions</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var contract_id = $('#contract_id').val();
var conditionTable = $('#conditionTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/transfer/condition_details_list/'+contract_id,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
});
function deleteconditionfun(id) {
  deletepopupfun("delete_condition",id);
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
        var conditionTable = $('#conditionTable').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/transfer/condition_details_list/'+contract_id,
                type : 'GET'
            },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      });
    }
  });
}
</script>
<?php init_tail(); ?>

