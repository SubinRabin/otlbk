<?php init_head(); ?>
<script type="text/javascript">
    function goBack() {
    window.history.back();
}
</script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>All Seasons</span>
                        <span class="pull-right"><a href="#" onclick="goBack()" class="btn-sm btn-primary">Back</a></span>
                        <?php $seasonmenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Contract Season'); 
                        if (count($seasonmenu)!=0 && $seasonmenu[0]->create==1) { ?>
                            <span class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#season_modal" id="season_modal_btn" class="btn-sm btn-success">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="tab-inn">
                        <form id="contractChangeForm" action="<?php echo base_url() ?>backend/hotels/seasons">
                            <input type="hidden" id="hotel_id" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label>Contract Id</label>
                                    <select id="contract_id" name="contract_id" onchange="contractChangefun();">
                                        <?php foreach ($contract as $key => $value) {
                                            if ($_REQUEST['contract_id']==$value->contract_id) { ?>
                                            <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                                        <?php } else {  ?>
                                            <option value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="season_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Season Name</th>
                                        <th>Contract</th>
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

<div id="season_modal" class="delete_modal modal fade col-md-12" role="dialog" style="max-height: 78%; width: 90%;">
 
</div>
<script>
    var seasonhotel_id = $("#hotel_id").val();
  var seasoncontract_id = $("#contract_id").val();
  var season_table = $('#season_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/hotels/seasonList?hotel_id='+seasonhotel_id+'&contract_id='+seasoncontract_id,
            type : 'GET'
        },
      "fnDrawCallback": function(settings){
      $('[data-toggle="tooltip"]').tooltip();          
      }
    });
    $("#season_modal_btn").click(function() {
    var hotel_id = $("#hotel_id").val();
    var contract_id  = $("#contract_id").val(); 
     $("#season_modal").load(base_url+'backend/hotels/season_modal?hotel_id='+hotel_id+'&contract_id='+contract_id);
  });
</script>
<?php init_tail(); ?>

