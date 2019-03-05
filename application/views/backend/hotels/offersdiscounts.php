<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span> Discounts & Offers </span>
                        <?php  $discountMenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Discounts & Offers'); 
                        if (count($discountMenu)!=0 && $discountMenu[0]->create==1) { ?>
                            <span class="pull-right mar_left_5"><a href="<?php echo base_url(); ?>backend/hotels/newoffers" class="btn-sm btn-primary">Add</a></span>
                            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#large_modal" id="DiscountExcel-modal" class="btn-sm btn-info"><i class="fa fa-file-code-o"></i> Excel update</a></span>
                            <span class="pull-right mar_left_10"><a href="<?php echo base_url(); ?>uploads/sample.xlsx" ><i class="fa fa-download"></i> (Sample.xlsx*)</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Accepted active" href="#" onclick="Offersfilter('1')">Current offers</a></li>
                            <li class="tab col s2"><a class="Pending" href="#" onclick="Offersfilter('2')">Expired</a></li>

                          </ul>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="discountTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name of The Hotels</th>
                                        <th>Name of The Contracts</th>
                                        <th>Room Names</th>
                                        <th>Valid From</th>
                                        <th>Valid Untill</th>
                                        <th>Stay From</th>
                                        <th>Stay Till</th>  
                                        <th>Valid Before</th>
                                        <th>Discount %</th> 
                                        <th>NRF</th> 
                                        <th>Disable/Enable</th>
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
</div>
<script>
  function discountStatus(id) {
    var discountStatus = $("#discountStatus"+id).val();
    if($("#discountStatus"+id).is(':checked')) { 
      var status = '1';
    } else {
      var status = '0';
    }
    $.ajax({
        dataType: 'json',
        type: "Post",
        url: base_url+'/backend/hotels/discountStatus?id='+id+'&status='+status,
        success: function(data) {
          addToast("Updated Successfully","green");
        }
    });
  }
  $("#DiscountExcel-modal").click(function() {
    $("#large_modal").load(base_url+'backend/hotels/DiscountExcelModal');
  });
</script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<?php init_tail(); ?>

