<?php init_head(); 
$Review = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Hotel'); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Review Details</span>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="review_list_table">
                                <thead>
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Hotel Location</th>
                                        <th>Name</th>
                                        <th>Evaluation</th>
                                        <th>Title</th>
                                        <th>Comment</th>
                                        <!-- <th>View</th> -->
                                        <?php if ($Review[0]->edit!=0) { ?>
                                        <th>View</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
                                        <?php if ($Review[0]->delete!=0) { ?>
                                        <th>Delete</th>
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
<script src="<?php echo base_url(); ?>assets/js/review.js"></script>
<?php init_tail(); ?>

