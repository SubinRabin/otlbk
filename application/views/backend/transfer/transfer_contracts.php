<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Transfer Contracts </span>
                        <?php $contractMenu = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Contracts'); 
                        if (count($contractMenu)!=0 && $contractMenu[0]->create==1) { ?>
                          <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/newcontract" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                        <input type="hidden" id="module" value="Contract">
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="contractTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Contract Code</th>
                                        <th>Contract Name</th>
                                        <th>Vehicles</th>
                                        <th>Valid From</th>
                                        <th>Valid To</th>
                                        <th>Passenger Cost</th>
                                        <th>Passenger Selling</th> 
                                        <th>Enable/Disable</th>
                                        <th style="width:67px">P & T</th>
                                        <th style="width:67px">Action</th> 
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
<script src="<?php echo base_url(); ?>assets/js/transfer.js"></script>
<script>
function contractStatus(id) {
  var contractStatus = $("#contractStatus"+id).val();
  if($("#contractStatus"+id).is(':checked')) { 
    var status = '1';
  } else {
    var status = '0';
  }
  $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/transfer/contractStatus?id='+id+'&status='+status,
      success: function(data) {
        addToast("Updated Successfully","green");
      }
  });
}
</script>
<?php init_tail(); ?>

