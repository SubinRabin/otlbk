<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Voucher Settings</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                               <div class="form-group col-md-6">
                                   <label for="voucher_type">Voucher Type</label>
                                   <select id="voucher_type" name="voucher_type" onchange="voucher_type_change_in_settings()">
                                        <?php foreach ($voucher_type as $key => $value) { 
                                          if (isset($_REQUEST['filter']) && $_REQUEST['filter']==$value->Fvt_ID) { ?>
                                            <option selected="" value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
                                        <?php } else { ?>
                                          <option value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
                                        <?php } } ?>
                                    </select>
                               </div>
                               <div class="form-group col-md-6">
                                   <input type="button" class="btn-sm btn-primary mar_top_23" id="voucher_settings_btn" value="Save">
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi custom-switch">
                            <form method="post" id="voucher_settings_form">
                                <input type="hidden" name="voucher_type_id" id="voucher_type_id">
                            <table class="table table-condensed table-hover" id="voucher_settings_tables">
                                <thead>
                                    <tr>
                                        <th>Account Head</th>
                                        <th><div class="switch">
                                            Dr
                                            <label>
                                              <input type="checkbox" id="dr_check_all"  onchange="dr_change_check_all();">
                                              <span class="lever"></span>
                                            </label>
                                          </div>
                                        </th>
                                        <th><div class="switch">
                                            Cr
                                            <label>
                                              <input type="checkbox" id="cr_check_all" onchange="cr_change_check_all();">
                                              <span class="lever"></span>
                                            </label>
                                          </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($voucher_settings_list as $key => $value) { 
                                    if (isset($_REQUEST['filter'])) {
                                      if ($_REQUEST['filter']==$value->Vtl_FvtID) {
                                       if ($value->Vtl_AllowDr==0) {
                                            $allowdr = '<div class="switch">
                                                    <label>
                                                      <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs">
                                                      <span class="lever"></span>
                                                    </label>
                                                  </div>';
                                        } else {
                                            $allowdr = '<div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs" checked>
                                                          <span class="lever"></span>
                                                        </label>
                                                      </div>';
                                        }
                                        if ($value->Vtl_AllowCr==0) {
                                            $allowcr = '<div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs">
                                                          <span class="lever"></span>
                                                        </label>
                                                      </div>';
                                        } else {
                                            $allowcr = '<div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs" checked>
                                                          <span class="lever"></span>
                                                        </label>
                                                      </div>';
                                        }
                                      } else {
                                        $allowdr = '<div class="switch">
                                                    <label>
                                                      <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs">
                                                      <span class="lever"></span>
                                                    </label>
                                                  </div>';
                                        $allowcr = '<div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs">
                                                          <span class="lever"></span>
                                                        </label>
                                                      </div>';
                                      }
                                    } else {
                                        $allowdr = '<div class="switch">
                                                    <label>
                                                      <input type="checkbox" name="voc_set_dr['.$key.']" class="dr_childs">
                                                      <span class="lever"></span>
                                                    </label>
                                                  </div>';
                                        $allowcr = '<div class="switch">
                                                        <label>
                                                          <input type="checkbox" name="voc_set_cr['.$key.']" class="cr_childs">
                                                          <span class="lever"></span>
                                                        </label>
                                                      </div>';
                                    }
                                    ?>
                                  <tr>
                                    <td><?php echo $value->Fah_Name ?><input type="hidden" name="voc_set_id[<?php echo $key ?>]" value="<?php echo $value->Vtl_ObjectID ?>"/></td>
                                    <td><?php echo $allowdr ?></td>
                                    <td><?php echo $allowcr ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
