<?php init_hotel_login_header(); ?>
<style type="text/css">
#sales_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #revenue_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #contract_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #finance_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
</style>
<div class="padding10">
	        <div class="row">
                <div class="tab-pane " id="details">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="col-md-6 pad_left_0">
                        <h3>Sales Team</h3>
                      </div>
                      <div class="col-md-6">
                       <?php if (isset($_REQUEST['proc'])) { ?>
                        <script type="text/javascript">
                        AddToast('success','Contact Details Update Successfully','!');
                      </script> <?php } ?>
                      </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="btn-toolbar pull-right">
                                    <button class="btn  hide" id="hotel_login_detail_back_contact" name="hotel_login_detail_back_contact"><i class="fa fa-hand-o-left"></i>&nbsp;Back</button>
                                    <div id="hidden-div">
                                    <button class="btn btn-info" id="hotel_login_edit_contact" name="hotel_login_edit_contact"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo base_url(); ?>backend/hotels/updating_hotel_contact" name="hotel_log_detail_contact" id="hotel_log_detail_contact" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">First Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="sales_fname" name="sales_fname" type="text" value="<?php echo $view[0]['sale_name']; ?>" readonly >
                                    <span class="sales_fname_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="sales_lname" name="sales_lname" type="text" value="<?php echo $view[0]['sale_lname']; ?>" readonly>
                                    <span class="sales_lname_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Phone</label><span class="popup_err">*</span>
                                    <input class="form-control" id="sales_phone" name="sales_phone" type="text" value="<?php echo $view[0]['sale_number']; ?>" readonly >
                                    <span class="sales_phone_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Mobile</label><span class="popup_err">*</span>
                                    <input class="form-control" id="sales_mobile" name="sales_mobile" type="text" value="<?php echo $view[0]['sale_mobile']; ?>" readonly>
                                    <span class="sales_mobile_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input class="form-control" id="sales_mail" name="sales_mail" type="text" value="<?php echo $view[0]['sale_mail']; ?>" readonly >
                                    <span class="sales_mail_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sales_password" class="control-label">Password</label><span class="popup_err">*</span>
                                    <input class="form-control" id="sales_password" name="sales_password" type="Password" value="<?php echo $view[0]['sale_password']; ?>" readonly>
                                    <span class="sales_password_err popup_err blink_me"></span>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="" class="control-label">Address</label><span class="popup_err">*</span>
                                    <textarea readonly class="form-control" rows="4" id="sales_address" name="sales_address" type="text" ><?php echo $view[0]['sale_address'];  ?>
                                    </textarea>
                                     <span class="sales_address_err popup_err blink_me"></span>

                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6 ">
                               <div class="form-group">
                                    <h3>Revenue Team </h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" class="filled-in" name="check1" id="check1" />
                                    <label for="check1">Same as above</label>
                                </div>
                            </div>
                        </div>
                         <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">First Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="revenue_fname" name="revenue_fname" type="text" value="<?php echo $view[0]['revenu_name']; ?>" readonly >
                                    <span class="revenue_fname_err popup_err blink_me"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="revenue_lname" name="revenue_lname" type="text" value="<?php echo $view[0]['revenu_lname']; ?>" readonly>
                                    <span class="revenue_lname_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Phone</label><span class="popup_err">*</span>
                                    <input class="form-control" id="revenue_phone" name="revenue_phone" type="text" value="<?php echo $view[0]['revenu_number']; ?>" readonly >
                                    <span class="revenue_phone_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Mobile</label><span class="popup_err">*</span>
                                    <input class="form-control" id="revenue_mobile" name="revenue_mobile" type="text" value="<?php echo $view[0]['revenu_mobile']; ?>" readonly>
                                    <span class="revenue_mobile_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input class="form-control" id="revenue_mail" name="revenue_mail" type="text" value="<?php echo $view[0]['revenu_mail']; ?>" readonly >
                                    <span class="revenue_mail_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="revenue_password" class="control-label">Password</label><span class="popup_err">*</span>
                                    <input class="form-control" id="revenue_password" name="revenue_password" type="Password" value="<?php echo $view[0]['revenue_password']; ?>" readonly>
                                    <span class="revenue_password_err popup_err blink_me"></span>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Address</label><span class="popup_err">*</span>
                                    <textarea readonly class="form-control" rows="4" id="revenue_address" name="revenue_address" type="text" ><?php echo $view[0]['revenu_address'];  ?>
                                    </textarea>
                                     <span class="revenue_address_err popup_err blink_me"></span>

                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6 ">
                               <div class="form-group">
                                    <h3>Reservation Team </h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" class="filled-in" name="check2" id="check2" />
                                    <label for="check2">Same as above</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_fname" class="control-label">First Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="contract_fname" name="contract_fname" type="text" value="<?php echo $view[0]['contract_name']; ?>" readonly >
                                    <span class="contract_fname_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="contract_lname" name="contract_lname" type="text" value="<?php echo $view[0]['contract_lname']; ?>" readonly>
                                    <span class="reservation_lname_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_phone" class="control-label">Phone</label><span class="popup_err">*</span>
                                    <input class="form-control" id="contract_phone" name="contract_phone" type="text" value="<?php echo $view[0]['contract_number']; ?>" readonly>
                                    <span class="contract_phone_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_mobile" class="control-label">Mobile</label><span class="popup_err">*</span>
                                    <input class="form-control" id="contract_mobile" name="contract_mobile" type="text" value="<?php echo $view[0]['contract_mobile']; ?>" readonly>
                                    <span class="contract_mobile_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_mail" class="control-label">Email</label>
                                    <input class="form-control" id="contract_mail" name="contract_mail" type="text" value="<?php echo $view[0]['contract_mail']; ?>" readonly >
                                    <span class="contract_mail_err popup_err blink_me"></span>
                                </div>
                            </div>
                             <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_password" class="control-label">Password</label><span class="popup_err">*</span>
                                    <input class="form-control" id="contract_password" name="contract_password" type="Password" value="<?php echo $view[0]['contract_password']; ?>" readonly>
                                    <span class="contract_password_err popup_err blink_me"></span>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contracts_address" class="control-label">Address</label><span class="popup_err">*</span>
                                    <textarea readonly class="form-control" rows="4" id="contracts_address" name="contracts_address" type="text" ><?php echo $view[0]['contracts_address']; ?>
                                    </textarea>
                                     <span class="contracts_address_err popup_err blink_me"></span>

                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <h3>Finance Team </h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" class="filled-in" name="check3" id="check3" />
                                    <label for="check3">Same as above</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_fname" class="control-label">First Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="finance_fname" name="finance_fname" type="text" value="<?php echo $view[0]['finance_name']; ?>" readonly >
                                    <span class="finance_fname_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_lname" class="control-label">Last Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="finance_lname" name="finance_lname" type="text" value="<?php echo $view[0]['finance_lname']; ?>" readonly>
                                    <span class="finance_lname_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_phone" class="control-label">Phone</label><span class="popup_err">*</span>
                                    <input class="form-control" id="finance_phone" name="finance_phone" type="text" value="<?php echo $view[0]['finance_number']; ?>" readonly >
                                    <span class="finance_phone_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_mobile" class="control-label">Mobile</label><span class="popup_err">*</span>
                                    <input class="form-control" id="finance_mobile" name="finance_mobile" type="text" value="<?php echo $view[0]['finance_mobile']; ?>" readonly>
                                    <span class="finance_mobile_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_mail" class="control-label">Email</label>
                                    <input class="form-control" id="finance_mail" name="finance_mail" type="text" value="<?php echo $view[0]['finance_mail']; ?>" readonly >
                                    <span class="finance_mail_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_password" class="control-label">Password</label><span class="popup_err">*</span>
                                    <input id="finance_password" type="password" name="finance_password" class="form-control finance_password" value=" <?php echo $view[0]['finance_password']; ?>" readonly>
                                    <span class="finance_password_err popup_err blink_me"></span>
                                </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finance_address" class="control-label">Address</label><span class="popup_err">*</span>
                                    <textarea readonly class="form-control" rows="4" id="finance_address" name="finance_address" type="text" ><?php echo $view[0]['finance_address']; ?>
                                    </textarea>
                                     <span class="finance_address_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row" style="margin-top: 10px;">
                                <button class="btn btn-success pull-right hide"  id="hotel_login_contact_update" name="hotel_login_contact_update" type="button" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </form>
                     </div> 
                   </div>
                   </div>
                </div>   
	        </div>
        </div>
<?php init_hotel_login_footer(); ?>
