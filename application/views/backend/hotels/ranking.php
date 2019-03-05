<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Hotel Rankings </span>
                        <?php $rankingMenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotel Ranking'); 
                        if (count($rankingMenu)!=0 && $rankingMenu[0]->create==1) { ?>
                            <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/newranking" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                        <input type="hidden" id="filter" value="1">
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Accepted active" href="#" onclick="Rankingfilter('1')">Current </a></li>
                            <li class="tab col s2"><a class="Pending" href="#" onclick="Rankingfilter('2')">Expired</a></li>

                          </ul>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="rankingTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name of The Hotels</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>From Date</th>
                                        <th>To Date</th>  
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
  function rankingStatus(id) {
    var rankingStatus = $("#rankingStatus"+id).val();
    if($("#rankingStatus"+id).is(':checked')) { 
      var status = '1';
    } else {
      var status = '0';
    }
    $.ajax({
        dataType: 'json',
        type: "Post",
        url: base_url+'/backend/hotels/rankingStatus?id='+id+'&status='+status,
        success: function(data) {
          addToast("Updated Successfully","green");
        }
    });
  }
</script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<?php init_tail(); ?>

