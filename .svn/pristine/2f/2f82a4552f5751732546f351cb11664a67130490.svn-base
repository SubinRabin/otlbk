<?php init_head(); 
$contractmenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Contract'); 
?>
<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="inn-title">
            <span>All Contract</span>
        </div>
        </br>
        <div class="col-md-6">
            <div class="form-group">
               <label>Select Hotel</label><span>*</span>
                <select name="hotel_contract" id="hotel_contract">
                	<?php 
                    foreach ($view as $key => $value) {
                        if (isset($_REQUEST['hotel_id']) && $_REQUEST['hotel_id']==$value->id) {
                        ?>
                        <option selected="" value="<?php echo $value->hotel_id; ?>"><?php echo $value->hotel_name; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value->hotel_id; ?>"><?php echo $value->hotel_name; ?></option>

                	<?php } } ?>
                </select>
                <input type="hidden" name="hotel_id" id="hotel_id" value="">
                <input type="hidden" name="filter" id="filter" value="1">
            </div>
        </div>
            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels"  class="btn-sm btn-primary">Back</a></span>
            <?php if ($contractmenu[0]->create!=0) { ?>
            <span  name="add_button" id="add_button" class="pull-right hide" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#contract_model" class="btn-sm btn-success">Add</a></span>
            <?php } ?>
        <div class="row">
            <div class="col-md-12 mar_top_10">
              <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                <li class="tab col s2"><a class="Pending active" href="#" onclick="ContractFilter('1')">Current</a></li>
                <li class="tab col s2"><a class="Rejected" href="#" onclick="ContractFilter('0')">Expired</a></li>
              </ul>
            </div>
        </div>    
        <div class="row">
		    <div class="col-md-12">
		        <div class="box-inn-sp">
		            <div class="tab-inn">
		                <div class="table-responsive table-desi custom-switch">
		                    <table class="table table-condensed table-hover" id="contract_table">
		                        <thead>
		                            <tr>
		                                <th>#</th>
                                        <th>Contract ID</th>
                                        <th>Con type</th>
                                        <th>Con Name</th>
                                        <th>Linked Con</th>
                                        <th>Board</th>
                                        <th title="Booking Code">Booking Code</th>
                                        <th>Max Child age</th>
                                        <th>NRF</th>
		                                <th>From date</th>
		                                <th>To date</th>
                                        <th>Season</th>
                                        <th>Accessible</th>
                                        <th>Disable/Enable</th>
		                                <th width="12%">Action</th>
                                        <th>Refresh Copy</th>
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
<div id="policy_model" class="delete_modal modal fade col-md-12" role="dialog" style="max-height: 78%; width: 90%;">
 
</div>
<div id="accessible_modal" class="delete_modal modal fade col-md-12" role="dialog" style="max-height: 78%; width: 90%;">
 
</div>
<div id="season_modal" class="delete_modal modal fade col-md-12" role="dialog" style="max-height: 78%; width: 90%;">
 
</div>
<div id="refresh_modal" class="modal-bg-fix modal fade" role="dialog" style="max-height: 70%; width: 30%;">
 
</div>
 <link href="<?php echo base_url(); ?>assets/select2/select2.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/select2/select2.min.js" type="text/javascript"></script>

<script type="text/javascript">
// $(document).ready(function() {
    var sText = $(this).find("option:selected").text();
    var sValue = hotel_contract.value;
    var filter = $("#filter").val();
    $('#hotel_id').val(sValue);
     var contract_table = $('#contract_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/hotels/contract_hotel?id='+sValue+'&filter='+filter,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }

 });

 $("#hotel_contract").select2({
    width: '100%'
});
// });
function ContractFilter(val) {
    var sValue =  $('#hotel_id').val();
    $('#filter').val(val);
     var contract_table = $('#contract_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/hotels/contract_hotel?id='+sValue+'&filter='+val,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }

     });
}
</script>

<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<?php init_tail(); ?>

