<?php init_hotel_login_header(); ?>

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="inn-title">
            <span style="font-size:20px">Contracts</span>
            
        <!--     $dat=$_SESSION;
            print_r($view->result());
            exit();  -->
            <input type="hidden" id="hotel_contract" value="<?php echo $hotel_code ?>">
            <span class="pull-right"><a href="<?php echo base_url(); ?>dashboard/hotel_panel"  class="btn-sm btn-primary">Back</a></span>
            <span  name="add_button" id="add_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#contract_model" class="btn-sm btn-success">Add</a></span>
            <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_code ?>">

        </div>
        </br>
            
            

        <div class="row">
        <div class="col-md-12">
            <div class="box-inn-sp">
                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-condensed table-hover" id="contract_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                        <th>Contract ID</th>
                                        <th>Contract Type</th>
                                        <th>Con Name</th>
                                        <th>Linked Con</th>
                                        <th>Board</th>
                                        <th>Max Child age</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Policies</th>
                                        <th>Allotement</th>
                                    <!-- <th width="12%">Action</th> -->
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
<div id="contract_model" class="modal-bg-fix modal fade" role="dialog" style="max-height: 78%;">
 
</div>
<div id="policy_model" class="modal-bg-fix modal fade policy" role="dialog" style="max-height: 78%; width: 90%;">
 
</div>
<div id="delete_modal" class="delete_modal modal fade col-md-12" role="dialog" style="max-height: 78%; width: 90%;">
 <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body" style="height: 100px;">
        <p>Do you want delete this contract?</p>
    <form action="<?php echo base_url(); ?>dashboard/contract_del" id="contract_del" name="contract_del method="post">
        <input type="hidden" name="id" id="id" value="">
        <button type="submit" id="reject_button" class="ml10 btn btn-danger pull-right">Yes</button>
        <button type="button" data-dismiss="modal" id="reject_button" class="close_but btn btn-primary ml10 pull-right">No</button>
    </form>

      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var sText = $(this).find("option:selected").text();
    var sValue = hotel_contract.value;
    $('#hotel_id').val(sValue);
     var contract_table = $('#contract_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/dashboard/contract_data?id='+sValue,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }

 });
});
</script>
<?php init_hotel_login_footer(); ?>
<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toast.script.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/jquery.toaster.js"></script>

