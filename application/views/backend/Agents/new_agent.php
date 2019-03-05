<?php init_head(); ?>

<style>
#password_accounts + .fa {
   cursor: pointer;
   pointer-events: all;
 }
 
#password_reservation + .fa {
   cursor: pointer;
   pointer-events: all;
 }
 #password_management + .fa {
   cursor: pointer;
   pointer-events: all;
 }


/* Styles for CodePen Demo Only */
</style>


<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                        <span>Edit Agent </span>
                        <?php } else { ?>
                        <span>Add New Agent </span>
                        <?php }?>
                        <span class="pull-right" style="margin-left: 10px;"><a href="<?php echo base_url(); ?>backend/agents" class="btn-sm btn-primary">Back</a></span>
                        <?php if (isset($edit[0]->id)) { ?>
                            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#myModalbanner" onclick="banner_modal('<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>');" class="btn-sm btn-warning">Banners</a></span>
                        <?php } ?>
                    </div>
                    <div class="tab-inn">
                       <!--  <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                        <h2>Edit Agent</h2>
                        <?php } else { ?>
                        <h2>Add New Agent</h2>
                        <?php }?> -->
                        <form method="post" action="<?php echo base_url('backend/agents/add_new_agent'); ?>" name="agent_form" id="agent_form" enctype="multipart/form-data"> 
                            
                            <span class="opensans dark bold"><h3><b>Personal Details</b></h3></span>
                            <br>
                            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <?php 
                                            if (isset($edit[0]->id) && $edit[0]->id!="") {
                                         ?>
                                            <div class="form-group">
                                                <label for="agency_code">Agency Code</label>
                                                <input id="agency_code" name="agency_code" type="text" class="form-control" value="<?php echo isset($edit[0]->Agent_Code) ? $edit[0]->Agent_Code : '' ?>" readonly>
                                            </div>
                                        <?php 
                                          } else { ?>
                                            <div class="form-group">
                                                <label for="agency_code">Agency Code</label>
                                                <input id="agency_code" name="agency_code" type="text" class="form-control" value="<?php echo isset($agent_max_id) ? $agent_max_id : '' ?>" readonly>
                                            </div>
                                         <?php }
                                         ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agency_name">Agency Name*</label>
                                                <input id="agency_name" name="agency_name" type="text" class="form-control" value="<?php echo isset($edit[0]->Agency_Name) ? $edit[0]->Agency_Name : '' ?>">
                                                
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="email">Agency Email*</label>
                                                <input id="email" name="email" type="email" onsubmit="email_validation()"  class="form-control" value="<?php echo isset($edit[0]->Email) ? $edit[0]->Email : '' ?>">
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name*</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" value="<?php echo isset($edit[0]->First_Name) ? $edit[0]->First_Name : '' ?>">
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name*</label>
                                            <input id="last_name" name="last_name" type="text" class="form-control" value="<?php echo isset($edit[0]->Last_Name) ? $edit[0]->Last_Name : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="designation">Designation*</label>
                                            <input id="designation" name="designation" type="text" class="form-control" value="<?php echo isset($edit[0]->Designation) ? $edit[0]->Designation : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="nature_business">Nature Of Business*</label>
                                            <input id="nature_business" name="nature_business" type="text" class="form-control" value="<?php echo isset($edit[0]->Nature_Business) ? $edit[0]->Nature_Business : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="business_type">Business Type*</label>
                                            <input id="business_type" name="business_type" type="text" class="form-control" value="<?php echo isset($edit[0]->Business_Type) ? $edit[0]->Business_Type : '' ?>">
                                            </div> 
                                        </div>

                                        <div class="col-md-6">
                                           <div class="form-group">
                                            <label for="iata_status">IATA Status*</label>
                                            <br>
                                            <p>
                                                <?php  if (isset($edit[0]->Iata_Status) && $edit[0]->Iata_Status=="Approved") { ?>
                                                    <input class="with-gap" name="iata_status" type="radio" id="test1" checked="" value="Approved" onclick="iata_check('1')" />
                                                    <label for="test1">Approved</label>
                                                    <input class="with-gap" name="iata_status" type="radio" id="test2"  value="Not Approved" onclick="iata_check('2')" />
                                                    <label for="test2">Not Approved</label>
                                                <?php } else { ?>
                                                   <input class="with-gap" name="iata_status" type="radio" id="test1" value="Approved" onclick="iata_check('1')"/>
                                                    <label for="test1">Approved</label>
                                                    <input class="with-gap" name="iata_status" type="radio" id="test2" checked  value="Not Approved" onclick="iata_check('2')" />
                                                    <label for="test2">Not Approved</label>
                                                <?php } ?>
                                            </p>
                                            </div> 
                                        </div>
                                        <div class="col-md-6 iata_number hide">
                                            <div class="form-group">
                                                <label for="iata_reg">IATA Reg: Number*</label>
                                                <input id="iata_reg" name="iata_reg" type="text" class="form-control" value="<?php echo isset($edit[0]->Iata_Reg_Number) ? $edit[0]->Iata_Reg_Number : '' ?>">
                                            </div> 
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12 text-center">
                                            <span class="single-upload-img">
                                             <?php if (isset($edit[0]->profile_image) && $edit[0]->profile_image!="") { ?>
                                                <img id="load_image" src="<?php echo base_url();?>uploads/agent_profile_pic/<?php echo $edit[0]->id;?>/thumb_<?php echo $edit[0]->profile_image;?>" alt="">
                                               <?php } else { ?>
                                                <img id="load_image" src="<?php echo base_url() ?>assets/images/user/1.png" alt="">
                                               <?php } ?>
                                            </span>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="file-upload-single">
                                                Choose File
                                                <input type="file" id="profile_image" name="profile_image" onchange="return ValidateFileUpload();">
                                            </div>
                                            <!-- <div class="btn"> -->
                                                <!-- <span>Profile Picture</span> -->
                                                
                                            <!-- </div> -->
<!--                                             <div class="file-path-wrapper">
                                                <input class="file-path form-control" type="text">
                                            </div> -->
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="phone">Mobile*</label>
                                    <input id="phone" name="phone" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Mobile) ? $edit[0]->Mobile : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Preferred Currency</label>
                                    <select name="preferred_currency"  id="preferred_currency">
                                        <?php foreach ($currency_list as $key => $value) { 
                                            if(isset($view[0]->Preferred_Currency) && $view[0]->Preferred_Currency==$value->currency_type) {?>
                                            <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php } else { ?>
                                            <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php  } } ?>
                        
                                    </select>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group date">
                                        <label class="new_user">Date Of Birth</label>
                                        <input type="text" class="datePicker-hide datepicker input-group-addon" id="datepicker" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" />
                                        <?php $today=date('d/m/Y'); ?>
                                        <div class="input-group">
                                            <input class="form-control datepicker date-pic" id="alternate" name="" value="<?php echo $today ?>">
                                            <label for="datepicker" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                    <label for="pincode">Pincode/Zipcode/Postcode*</label>
                                    <input id="pincode" name="pincode" type="text" class="form-control" value="<?php echo isset($edit[0]->Pincode) ? $edit[0]->Pincode : '' ?>">
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Sex</label>
                                    <select name="sex">
                                        <?php foreach ($edit['gender'] as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="telephone">Telephone*</label>
                                    <input id="telephone" name="telephone" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Phone_Num) ? $edit[0]->Phone_Num : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="city">City*</label>
                                    <input id="city" name="city" type="text" class="form-control" value="<?php echo isset($edit[0]->City) ? $edit[0]->City : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="credit">Credit Amount*</label>
                                    <input id="credit" name="credit" type="number" class="form-control" value="<?php echo isset($edit[0]->Credit_amount) ? $edit[0]->Credit_amount : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="country">Country*</label>
                                    <input id="country" name="country" type="text" class="form-control" value="<?php echo isset($edit[0]->Country) ? $edit[0]->Country : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="username">Username*</label>
                                    <input id="username" name="username" type="text" class="form-control" value="<?php echo isset($edit[0]->Username) ? $edit[0]->Username : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <?php if (isset($edit[0]->password)) { ?>
                                        <label for="password">Password</label>
                                        <input id="password" name="password" type="password" class="form-control Default_password" value="" placeholder="*********">
                                    <?php } else { ?>
                                        <label for="password">Default Password is "welcomeagent"</label>
                                        <input id="password" name="password" type="password" class="form-control" value="welcomeagent">
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                    <label for="fax">Fax*</label>
                                    <input id="fax" name="fax" type="text" class="form-control" value="<?php echo isset($edit[0]->Fax) ? $edit[0]->Fax : '' ?>">
                                   </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="address" class="active">Address*</label>
                                    <textarea id="address" name="address" class="materialize-textarea"><?php echo isset($edit[0]->Address) ? $edit[0]->Address : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="website">Website*</label>
                                    <input id="website" name="website" type="text" class="form-control" value="<?php echo isset($edit[0]->Website) ? $edit[0]->Website : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="markup">Agent Default Markup%*</label>
                                    <input id="markup" name="markup" type="text" class="form-control" value="<?php echo isset($edit[0]->Markup) ? $edit[0]->Markup : '' ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gen_markup"><?php echo $title[0]->Title ?> Markup%*</label>
                                        <input id="gen_markup" name="gen_markup" type="text" class="form-control" value="<?php echo isset($edit[0]->general_markup) ? $edit[0]->general_markup : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <label for="tradefile">Trade license  : </label><?php  if ( isset($edit[0]->tradefile)) { ?>
                                           <span><a class="pull-right" href="<?php echo base_url(); ?>uploads/trade_license/<?php echo $edit[0]->id ?>/<?php echo $edit[0]->tradefile ?>"><?php echo isset($edit[0]->tradefile) ? $edit[0]->tradefile : '' ?></a></span>
                                       <?php } ?>
                                        <input type="file" id="tradefile" name="tradefile" class="form-control" onchange="return TradeFileUpload();">
                                </div>

                                <div class="col-md-4">
                                        <label for="logo">Logo  : </label><?php  if ( isset($edit[0]->logo)) { ?>
                                           <span><a class="pull-right" href="<?php echo base_url(); ?>uploads/agent_logo/<?php echo $edit[0]->id ?>/<?php echo $edit[0]->logo ?>"><?php echo isset($edit[0]->logo) ? $edit[0]->logo : '' ?></a></span>
                                       <?php } ?>
                                        <input type="file" id="logo" name="logo" class="form-control" onchange="return AgentLogoUpload();">
                                </div>
                            </div>
                            <br>
                            <span class="opensans dark bold"><h3><b>Contact Details</b></h3></span>
                             <div class="form-group col-sm-3">
                             </div>
                             <div class="form-group col-sm-3">
                                Accounts*
                             </div>
                             <div class="form-group col-sm-3">
                                Reservation/Operations
                             </div>
                             <div class="form-group col-sm-3">
                                Management
                             </div>
                             <div class="form-group col-sm-3">
                                <br>
                                Name: *
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <label for="first_name_accounts">User Name</label>
                                <input id="first_name_accounts" name="first_name_accounts" type="text" class="form-control" value="<?php echo isset($edit[0]->First_Name_Accounts) ? $edit[0]->First_Name_Accounts : '' ?>">
                                </div> 
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="first_name_reservation">User Name</label>
                                <input id="first_name_reservation" name="first_name_reservation" type="text" class="form-control" value="<?php echo isset($edit[0]->First_Name_Reservation) ? $edit[0]->First_Name_Reservation : '' ?>">
                                </div>
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="first_name_management">User Name</label>
                                <input id="first_name_management" name="first_name_management" type="text" class="form-control" value="<?php echo isset($edit[0]->First_Name_Management) ? $edit[0]->First_Name_Management : '' ?>">
                                </div> 
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                <br>
                                Email: *
                                </div> 
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email_accounts">Email</label>
                                    <input id="email_accounts" name="email_accounts" type="email" onsubmit="email_validation()"  class="form-control" value="<?php echo isset($edit[0]->Email_Accounts) ? $edit[0]->Email_Accounts : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email_reservation">Email</label>
                                    <input id="email_reservation" name="email_reservation" type="email" onsubmit="email_validation()"  class="form-control" value="<?php echo isset($edit[0]->Email_Reservation) ? $edit[0]->Email_Reservation : '' ?>">
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email_management">Email</label>
                                    <input id="email_management" name="email_management" type="email" onsubmit="email_validation()"  class="form-control" value="<?php echo isset($edit[0]->Email_Management) ? $edit[0]->Email_Management : '' ?>">
                                </div> 
                             </div>
                             
                             <div class="col-md-3">
                                <div class="form-group">
                                <br>
                                Number: *
                                </div>
                             </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="number_accounts">Mobile</label>
                                    <input id="number_accounts" name="number_accounts" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Number_Accounts) ? $edit[0]->Number_Accounts : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="number_reservation">Mobile</label>
                                    <input id="number_reservation" name="number_reservation" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Number_Reservation) ? $edit[0]->Number_Reservation : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="number_management">Mobile</label>
                                    <input id="number_management" name="number_management" type="number" class="hide-spinner form-control" value="<?php echo isset($edit[0]->Number_Management) ? $edit[0]->Number_Management : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <br>
                                Password: *
                                </div> 
                             </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group has-feedback">
                                        <label for="password_accounts">Password</label>
                                        <input id="password_accounts" name="password_accounts" type="password"  class="form-control" value="<?php echo isset($edit[0]->accounts_password) ? $edit[0]->accounts_password : '' ?>">
                                        <i class="fa fa-eye form-control-feedback" onclick="myFunction_accounts()"></i>
                                    </div>
                                </div>
                            </div>
                   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group has-feedback">
                                        <label for="password_reservation">Password</label>
                                        <input id="password_reservation" name="password_reservation" type="password"   class="form-control" value="<?php echo isset($edit[0]->reservation_password) ? $edit[0]->reservation_password : '' ?>">
                                        <i class="fa fa-eye form-control-feedback" onclick="myFunction_reservation()"></i>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group has-feedback">
                                        <label for="password_management">Password</label>
                                        <input id="password_management" name="password_management" type="password"   class="form-control" value="<?php echo isset($edit[0]->management_password) ? $edit[0]->management_password : '' ?>">
                                        <i class="fa fa-eye form-control-feedback" onclick="myFunction_management()"></i>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   
                                     
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                    <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <input type="button" id="add_agent_button" class="waves-effect waves-light btn-sm btn-success pull-right" value="Update">
                                    <?php } else { ?>
                                     <input type="button" id="add_agent_button" class="waves-effect waves-light btn-sm btn-success pull-right" value="Submit">
                                     <?php
                                       }
                                     ?>
                                    </div> 
                                </div>
                            </div>
                       </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalbanner" class="delete_modal modal">
</div>
<script src="<?php echo base_url(); ?>assets/js/agent.js"></script>
<script type="text/javascript">

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

