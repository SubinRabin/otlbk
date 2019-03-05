<?php init_head(); 
$agentmenu = menuPermissionAvailability($this->session->userdata('id'),'Agents',''); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Agents Details</span>
                        <?php if ($agentmenu[0]->create!=0) { ?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/agents/new_agent" class="btn-sm btn-primary">Add</a></span>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Accepted active" href="#" onclick="filter('1')">Accepted</a></li>
                            <li class="tab col s2"><a class="Pending" href="#" onclick="filter('2')">Pending</a></li>
                            <li class="tab col s2"><a class="Rejected" href="#" onclick="filter('0')">Blocked</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                           <!--  <?php print_r($agentmenu)?> -->
                            <table class="table table-condensed table-hover" id="agent_table">
                                <thead>
                                    <tr>
                                        <th>Credit</th>
                                        <th>Image</th>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <?php if ($agentmenu[0]->edit!=0) { ?>
                                        <th>Edit</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if ($agentmenu[0]->delete!=0) { ?>
                                        <th>Action</th>
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
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/agent.js"></script>
<?php init_tail(); ?>

