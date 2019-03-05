<?php init_head(); 
$Payment = menuPermissionAvailability($this->session->userdata('id'),'General','Currency'); 
?>
    <div class="sb2-2">
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Payment Settings</span>
                    </div>
                    <div class="tab-inn">
                        <div class="row"> 
                            <div class="col-md-8">
                                <h4><label for="list-title">Currency Type List</label></h4>
                            <?php if (count($Payment)!=0 && $Payment[0]->create==1 && $Payment[0]->edit==1) { ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group col-md-12">
                                        <button type="button" id="currency_refresh_button" class="waves-effect waves-light btn-sm btn-success pull-right">Refresh</button>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                            <div class="table-responsive table-desi">
                                <form action="<?php echo base_url(); ?>backend/common/currency_amount" name="refresh_form" id="refresh_form" method="post" enctype="multipart/form-data">
                                <table class="table table-condensed table-hover" id="currency_list">
                                   <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Currency Type</th>
                                        <th>Currency Name</th>
                                        <th>Amount</th>
                                    </tr>
                                   </thead>
                                    <tbody>
                                    </tbody>
                                </table>             
                                </form>
                            </div>
                            </div>   
                            <?php  if (count($Payment)!=0 && $Payment[0]->create==1) { ?>                                                     
                                <div class="form-group col-md-4">
                                    <br>
                                    <br>
                                    <form action="<?php echo base_url(); ?>backend/common/new_currency_update" name="add_currency_form" id="add_currency_form" method="post" enctype="multipart/form-data">     
                                        <div class="form-group col-md-12">
                                            <label for="list-title"> Currency Type</label>
                                            <input type="text" class="form-control" name="currency_type" id="currency_type">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="list-title"> Currency Name</label>
                                            <input type="text" name="currency_name" class="form-control" id="currency_name">
                                        </div>
                                        <button type="button" id="currency_add_button" class="waves-effect waves-light btn-sm btn-success pull-right">Add</button>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <br>

                    <!-- <div class="form-group col-md-4">
                        <label for="list-title">Markup</label>
                        <div class="input-group">
                          <div class="input-group-addon">%</div>
                          <input type="text" class="form-control" id="markup" name="markup" placeholder="Percentage" value="<?php echo $view[0]->markup ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="list-title">Tax</label>
                        <div class="input-group">
                          <div class="input-group-addon">%</div>
                          <input type="text" class="form-control" id="tax" name="tax" placeholder="Percentage" value="<?php echo $view[0]->tax ?>">
                        </div>
                    </div> -->
                    
                <?php   if (count($Payment)!=0 && $Payment[0]->edit==1) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="list-title">Currency Type</label>
                                <form action="<?php echo base_url(); ?>backend/common/payment_settings_update" name="payment_settings_form" id="payment_settings_form" method="post" enctype="multipart/form-data">
                                <br>
                                <select name="preferred_currency"  id="preferred_currency">
                                    <?php foreach ($currency_list as $key => $value) { 
                                        if($view[0]->currency_type==$value->currency_type) {?>
                                        <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                    <?php } else { ?>
                                        <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                    <?php  } } ?>
                    
                                </select>
                                 <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group col-md-12">
                                    <button type="button" id="payment_form_button" class="waves-effect waves-light btn-sm btn-success pull-right">update</button>
                                    </div>
                                    </div>
                                 </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>

<?php init_tail(); ?>


