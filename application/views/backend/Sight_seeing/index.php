<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>All Sight Seeing</span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/sight_seeing/new_sight_seeing" class="btn btn-primary">Add</a></span>
                    </div>
                    <!--  <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            <li class="tab col s2"><a class="Accepted" href="#" onclick="filter('1')">Accepted</a></li>
                            <li class="tab col s2"><a class="Pending active" href="#" onclick="filter('2')">Pending</a></li>
                            <li class="tab col s2"><a class="Rejected" href="#" onclick="filter('0')">Rejected</a></li>
                          </ul>
                        </div>
                    </div> -->
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover" id="hotel_table">
                                <thead>
                                    <tr>
                                        <th>Hotel Id</th>
                                        <th>Hotel</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>View</th>
                                        <?php if ($this->session->userdata('role')!=3) { ?>
                                        <th>Edit</th>
                                        <th>Action</th>
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

<?php init_tail(); ?>