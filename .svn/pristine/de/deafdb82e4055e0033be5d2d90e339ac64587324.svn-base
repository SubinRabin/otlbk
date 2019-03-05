<?php init_head(); 
$Profilemenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Profile'); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>All Hotels</span>
                        <?php if ($Profilemenu[0]->create!=0) { ?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/new_hotel" class="btn-sm green btn-primary">Add hotel</a></span>
                        <?php } ?>
                    </div>
                     <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Accepted active" href="#" onclick="filter('1')">Accepted</a></li>
                            <li class="tab col s2"><a class="Pending" href="#" onclick="filter('2')">Pending</a></li>
                            <li class="tab col s2"><a class="Rejected" href="#" onclick="filter('0')">Rejected</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover" id="hotel_table">
                                <thead>
                                    <tr>
                                        <th>Rooms</th>
                                        <th>Hotel Id</th>
                                        <th>Hotel</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <?php if ($Profilemenu[0]->view!=0) { ?>
                                        <th>View</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if ($Profilemenu[0]->edit!=0) { ?>
                                        <th>Edit</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if ($Profilemenu[0]->delete!=0) { ?>
                                        <th width="12%">Action</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
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
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
function filter(val) {
   var hotel_table = $('#hotel_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/hotels/hotel_list?filter='+val,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}
</script>
<?php init_tail(); ?>
 
