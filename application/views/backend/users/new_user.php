<?php init_head(); ?>

<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                        <span>Edit User </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/users" class="btn-sm btn-primary">Back</a></span>
                        <?php } else { ?>
                        <span>Add New User </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/users" class="btn-sm btn-primary">Back</a></span>
                        <?php }?>
                    </div>
                    <div class="tab-inn">
                        <form method="post" action="<?php echo base_url('backend/users/add_new_user'); ?>" id="user_form" name="user_form" enctype="multipart/form-data"> 
                            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                            <?php if (isset($edit[0]->id)) { ?>
                                <input type="hidden" name="pass_change" id="pass_change" value="1">
                            <?php } else { ?>
                                <input type="hidden" name="pass_change" id="pass_change" value="0">
                            <?php } ?>
                            <div class="clearfix">
                            <br>
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label><span>*</span>
                                            <input id="first_name" name="first_name" type="text" class="form-control" value="<?php echo isset($edit[0]->First_Name) ? $edit[0]->First_Name : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label><span>*</span>
                                            <input id="last_name" name="last_name" type="text" class="form-control" value="<?php echo isset($edit[0]->Last_Name) ? $edit[0]->Last_Name : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Mobile</label><span>*</span>
                                        <input id="phone" name="phone" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Phone_Num) ? $edit[0]->Phone_Num : '' ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="new_user">Date Of Birth</label>
                                            <input type="text" class="datePicker-hide datepicker input-group-addon" id="datepicker" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" />
                                            <?php $today=date('d/m/Y'); ?>
                                            <div class="input-group">
                                            <input class="form-control datepicker date-pic" id="alternate" name="" value="<?php echo $today ?>">
                                            <label for="datepicker" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sex</label><span>*</span>
                                            <select name="sex" id="sex" >
                                                <?php foreach ($edit['gender'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ((isset($_REQUEST['myAccount']) && $_REQUEST['myAccount']==1) || !isset($_REQUEST['myAccount'])) { ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label><span>*</span>     <select name="category">
                                                <?php foreach ($role as $key => $value) { 
                                                if($edit[0]->Category==$value->role_name) {?>
                                        <option selected="" value="<?php echo $value->id ?>"><?php echo $value->role_name ?></option>
                                            <?php } else { ?>
                                    <option  value="<?php echo $value->id ?>"><?php echo $value->role_name ?></option>
                                        <?php  } } ?>
                                                <!-- <?php foreach ($role as $key => $value) { ?>
                                                <option value="<?php echo $value->role_name ?>"><?php echo $value->role_name ?></option>
                                                <?php } ?> -->
                                            </select>                                               
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input id="city" name="city" type="text" class="form-control" value="<?php echo isset($edit[0]->City) ? $edit[0]->City : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input id="country" name="country" type="text" class="form-control" value="<?php echo isset($edit[0]->Country) ? $edit[0]->Country : '' ?>">
                                        </div>
                                    </div>
                                    <?php if (isset($edit[0]->Password) && $edit[0]->Password!="") { ?>
                                        <div class="col-md-12">
                                                <input type="checkbox" class="form-control" id="change_pass" name="change_pass filled-in" value="0">
                                                <label for="change_pass">Change Password</label>
                                        </div>
                                        <input type="hidden" name="pass_status" value="1">
                                        </br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="password" name="password" type="password" class="form-control Default_password" disabled="disabled" value="" placeholder="*********************">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="password1" type="password" class="form-control Default_password" disabled="disabled" value="" placeholder="*********************">
                                                <label for="password1">Confirm Password</label>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label><span>*</span>
                                                <input id="password" name="password" type="password" class="form-control" value="<?php echo isset($edit[0]->Password) ? $edit[0]->Password : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password1">Confirm Password</label><span>*</span>
                                                <input name="password1" type="password" class="form-control" value="<?php echo isset($edit[0]->Password) ? $edit[0]->Password : '' ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label><span>*</span>
                                            <input id="email" name="email" type="email" class="form-control" onsubmit="user_email_validation()" <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?> readonly <?php } ?> value="<?php echo isset($edit[0]->Email) ? $edit[0]->Email : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="active">Address:</label>
                                            <textarea id="address" name="address" class="form-control add " ><?php echo isset($edit[0]->Address) ? $edit[0]->Address : '' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="list-title">Currency Type</label>
                                            <select name="preferred_currency"  id="preferred_currency">
                                            <?php foreach ($currency_list as $key => $value) { 
                                            if($edit[0]->CurrencyType==$value->currency_type) {?>
                                            <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                            <?php } else { ?>
                                            <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                            <?php  } } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12 text-center">
                                            <span class="single-upload-img">
                                             <?php if (isset($edit[0]->Img) && $edit[0]->Img!="") { ?>
                                                <img id="load_image" src="<?php echo base_url();?>uploads/user_profile_pic/<?php echo $edit[0]->id;?>/thumb_<?php echo $edit[0]->Img;?>" alt="">
                                               <?php } else { ?>
                                                <img id="load_image" src="<?php echo base_url() ?>assets/images/user/1.png" alt="">
                                               <?php } ?>
                                            </span>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="file-upload-single">
                                                Choose File
                                                <input type="file" id="Img" name="Img" onchange="return ValidateFileUpload();">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col s12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                    <input type="button" id="add_user_button" class="waves-effect waves-light btn-sm btn-success pull-right" value="Update">
                                <?php } else { ?>
                                    <input type="button" id="add_user_button" class="waves-effect waves-light btn-sm btn-success pull-right" value="Submit">
                                </div>
                                <?php }?>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<script type="text/javascript">
    // var tpj=jQuery;
    // $( document ).ready(function() {
        $("#datepicker").datepicker({
            yearRange: "1950:<?php echo date('Y') ?>",
            altField: "#alternate",
            // altField: "#alternate",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate").click(function() {
            $( "#datepicker" ).trigger('focus');
        });
    // });
</script>
<?php init_tail(); ?>

