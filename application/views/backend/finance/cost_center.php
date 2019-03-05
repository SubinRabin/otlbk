<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                    <div class="inn-title">
                        <span>Cost Center</span>
                    </div>
                    
                    <div class="bor">
                        <form name="cost_center_form"  id="cost_center_form" action="<?php echo base_url('backend/finance/cost_center_save'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cost_center">Finance Cost Center :</label>
                                    <select id="cost_center" name="cost_center" onchange ="cost_center_change_fun()" >
                                        <option value="">--Select--</option>
                                        <?php foreach ($cost_center as $key => $value) { ?>
                                            <option value="<?php echo $value->Fcc_ObjectID ?>"><?php echo $value->Fcc_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6 pad_left_none">
                                        <label for="cost_id">Cost Center ID :</label><span>*</span>
                                        <input id="cost_id" readonly="" name="cost_id" type="text" class="form-control" value="<?php echo $max_id[0]->Fcc_ID+1 ?>"></td>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mar_top_23">
                                            <input type="checkbox" class="filled-in" name="cost_disble" id="cost_disble" value="1" />
                                            <label for="cost_disble">Disable</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cost_center_name">Cost Center Name :</label>
                                    <input id="cost_center_name" name="cost_center_name" type="text" class="form-control"> 
                                </div>
                               
                              
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">

                                    <input type="button"  class="waves-effect mar_left_5 waves-light  pull-right btn-sm btn-danger" id="delete_cost_center" value="Delete"
                                    >
                                    <input type="button" class="hide" id="hide_popup_btn" data-toggle="modal" data-target="#cost_delete_modal">
                                    <input type="button" id="cost_center_save" class="waves-effect mar_left_5 waves-light  pull-right btn-sm btn-success" value="Save">
                                    <a href="<?php echo base_url(); ?>backend/finance/cost_center?id=<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" class="waves-effect mar_left_5 waves-light btn-sm btn-primary pull-right" >New</a>
                                </div>
                            </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <!-- Modal -->
      <div class="modal-bg-fix modal fade" id="cost_delete_modal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <form name="cost_center_delt"  id="cost_center_delt" action="<?php echo base_url('backend/finance/cost_center_dlete'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4><br>
                    </div>
                    <input type="text" name="id" id="delete_id">
                    <div class="modal-body">
                      <p>Do You Want Delete???</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn-danger">Delete</button>
                    </div>
               </form>
              </div>
            </div>
      </div>
  
</div>

<?php init_tail(); ?>