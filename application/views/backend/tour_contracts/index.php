<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Tour Contracts </span>
                        <?php  $contractMenu = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Contracts'); 
                        if (count($contractMenu)!=0 && $contractMenu[0]->create==1) { ?>
                          <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/newcontract" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="contractTable">
                                <thead>
                                    <tr>
                                        <th>Contract Code</th>
                                        <th>Type of Tour</th>
                                        <th>Supplier Name</th> 
                                        <th>Valid From</th>
                                        <th>Valid To</th>
                                        <th>Adult Cost</th>
                                        <th>Adult Selling</th> 
                                        <th>Child Cost</th>
                                        <th>Child Selling</th>
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
<script src="<?php echo base_url(); ?>assets/js/contract.js"></script>
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
      url: base_url+'/backend/tour/contractStatus?id='+id+'&status='+status,
      success: function(data) {
        addToast("Updated Successfully","green");
      }
  });
}
</script>
<?php init_tail(); ?>

