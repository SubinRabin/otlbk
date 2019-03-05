<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Revenue List </span>
                        <?php $revenueMenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Revenue List'); 
                            if (count($revenueMenu)!=0 && $revenueMenu[0]->create==1) { ?>
                                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/RevenueEdit" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="col-md-12 mar_top_10">
                      <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                        <li class="tab col s2"><a class="Pending active" href="#" onclick="RevenueFilter('1')">Current</a></li>
                        <li class="tab col s2"><a class="Rejected" href="#" onclick="RevenueFilter('0')">Expired</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="Revenue_list_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hotels</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Contracts</th>
                                        <th>Agents</th>
                                        <th>Markup</th>
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

<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
    RevenueFilter(1);
</script>
<?php init_tail(); ?>
