<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                    <div class="inn-title">
                        <span>Company</span>
                    </div>
                    <?php if (isset($_REQUEST['u'])) { ?>
                    <div class="alert alert-success" role="alert" style="width: 334px;">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Success!</strong> Updated successfully!
                    </div>
                    <?php } ?>
                    <?php if (isset($_REQUEST['n'])) { ?>
                    <div class="alert alert-success" role="alert" style="width: 334px;">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Success!</strong> Added successfully!
                    </div>
                    <?php } ?>
                    <?php if (isset($_REQUEST['d'])) { ?>
                    <div class="alert alert-success" role="alert" style="width: 334px;">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Success!</strong> Deleted successfully!
                    </div>
                    <?php } ?>
                    <div class="bor">
                        <form name="company_add"  id="company_add" action="<?php echo base_url('backend/finance/company_add'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Select Company :</label>
                                    <select id="company_select" name="company_select1" onchange ="company_change_fun()" >
                                        <option value="" disabled selected>-- Select --</option><span>*</span>
                                        <?php foreach ($view as $key => $value) { ?>
                                            <option  value="<?php echo $value->Com_ID; ?>"><?php echo $value->Com_Name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="company_select_error popup_comp_err "></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id">ID :</label>
                                    <input id="id" name="id" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <label for="c_name">Company Name :</label><span>*</span>
                                    <input id="c_name" name="c_name" type="text" class="form-control" >
                                    <span class="c_name_error popup_comp_err "></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="c_address">Address :</label>
                                    <textarea name="c_address" id="c_address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <label for="c_city">City :</label><span>*</span>
                                    <input id="c_city" name="c_city" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="c_state">State :</label><span>*</span>
                                    <input id="c_state" name="c_state" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <label for="c_pin">Pincode :</label><span>*</span>
                                    <input id="c_pin" name="c_pin" type="text" class="form-control">
                                <span class="c_pin_error popup_comp_err "></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="c_office_num">Office No :</label><span>*</span>
                                    <input id="c_office_num" name="c_office_num" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <label for="c_fax">Fax :</label><span>*</span>
                                    <input id="c_fax" name="c_fax" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="c_mob1">Mob No 1 :</label><span>*</span>
                                    <input id="c_mob1" name="c_mob1" type="number" class="hide-spinner form-control">
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <label for="c_mob2">Mob No 2 :</label><span>*</span>
                                    <input id="c_mob2" name="c_mob2" type="number" class="hide-spinner form-control">
                               </div>
                                <div class="form-group col-md-6">
                                    <label for="c_mail">Mail ID :</label><span>*</span>
                                    <input id="c_mail" name="c_mail" type="text" class="form-control">
                                <span class="c_mail_error popup_comp_err "></span>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-group col-md-6">
                                    <p><label>Type Of Firm :</label></p>
                                    <?php if ($firm=3) { ?>
                                    <input type="radio" class="with-gap" id="PVT" name="firm"  value="3"  checked />
                                    <label for="PVT">PVT</label>
                                   <?php  } else { ?>
                                   <input type="radio" class="with-gap" id="PVT" name="firm"  value="3"   />
                                    <label for="PVT">PVT</label>
                                    &nbsp&nbsp&nbsp
                                    <?php } if ($firm=2) { ?>
                                    <input type="radio" class="with-gap" name="firm" id="Properator"  value="2" checked />
                                    <label for="Properator">Properator</label>
                                     <?php  } else { ?>
                                      <input type="radio" class="with-gap" name="firm" id="Properator"  value="2" />
                                    <label for="Properator">Properator</label>
                                    &nbsp&nbsp&nbsp
                                     <?php } if ($firm=1) { ?>
                                    <input type="radio" class="with-gap" id="Partner" name="firm" value="1" checked />
                                     <label for="Partner">Partner</label>
                                     <?php  } else { ?>
                                     <input type="radio" class="with-gap" id="Partner" name="firm" value="1" />
                                     <label for="Partner">Partner</label>
                                     <?php } ?>
                                     &nbsp&nbsp&nbsp
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cst_num">CST No :</label><span>*</span>
                                    <input id="cst_num" name="cst_num" type="text" class="form-control">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="c_tin">Tin No. :</label><span>*</span>
                                        <input id="c_tin" name="c_tin" type="text" class="form-control">
                                    <span class="c_tin_error popup_comp_err "></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="c_cen">Cen No :</label><span>*</span>
                                        <input id="c_cen" name="c_cen" type="text" class="form-control">
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="date-picker">Opening Date :</label>
                                        <input type="date" id="date-picker" name="date-picker" class="datepicker">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <br><br>
                                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                                    <label for="filled-in-box">Is default</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" id="company_dlt" class="waves-effect mar_left_5 waves-light  pull-right btn-sm btn-danger" value="Delete"
                                    data-toggle="modal" data-target="#myModal">
                                    <input type="button" id="new_company" class="waves-effect mar_left_5 waves-light  pull-right btn-sm btn-success" value="Save">
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
      <div class="modal-bg-fix modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <form name="company_delt"  id="company_delt" action="<?php echo base_url('backend/finance/copmany_dlete'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4><br>
                    </div>
                    <input type="text" name="id" id="delete_id" hidden>
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
