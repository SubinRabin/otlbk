<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                            <span>Edit Role</span>
                            <?php } else { ?>
                            <span>Add New Role</span>
                        <?php }?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/common/menu_permission" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="tab-inn">
                        <form method="post" id="role_form" action="<?php echo base_url() ?>backend/Common/RoleDetails" name="role_form" enctype="multipart/form-data">        
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="form-group col-md-4" style="margin-left: 15px;">
                                     <input type="hidden" name="edit_id" id="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                                    <label>Role Name</label><span>*</span>
                                    <input type="text" class="form-control" name="roleName" id="roleName" value="<?php echo isset($edit[0]->role_name) ? $edit[0]->role_name : ''; ?>">
                                    
                                </div>
                                </div>
                            </div>
                            <div class="container">
                           <table  id="tab-per">
                            <tr>
                                <th>Permission</th>
                                <th>View</th> 
                                <th>Create</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <!-- <th>All</th> -->
                            </tr>
                            <?php foreach ($defaultmenu as $key => $value) {                         
                                if (isset($value->sub_menu) && $value->sub_menu=="Profit Report") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Agent Report") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Hotel Report") {
                                    $CDdisabled = 'disabled';
                                } else if (isset($value->sub_menu) && $value->sub_menu=="Payment") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Hotel Booking") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Tour Booking") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Transfer Booking") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="S/O Sales & Availability") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Settings") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Mail") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Customer Care Details") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="About Us") {
                                    $CDdisabled = 'disabled';
                                } else if(isset($value->sub_menu) && $value->sub_menu=="Payment Gateways") {
                                    $CDdisabled = 'disabled';
                                }else {
                                    $CDdisabled = '';
                                }
                                if (isset($value->sub_menu) && $value->sub_menu=="Hotel Reviews") {
                                    $Cdisabled = 'disabled';
                                } else {
                                    $Cdisabled = '';
                                }

                                if(isset($value->main_menu) && $value->main_menu=="Online Payments") {
                                    $CEDdisabled = 'disabled';
                                } else if(isset($value->main_menu) && $value->main_menu=="Finance") {
                                    $CEDdisabled = 'disabled';
                                } else if(isset($value->main_menu) && $value->main_menu=="History Logs") {
                                    $CEDdisabled = 'disabled';
                                } else if(isset($value->main_menu) && $value->main_menu=="Report") {
                                    $CEDdisabled = 'disabled';
                                }  else if(isset($value->main_menu) && $value->main_menu=="Error Logs") {
                                    $CEDdisabled = "disabled";
                                } else {
                                    $CEDdisabled = '';
                                }

                                if(isset($value->main_menu) && $value->main_menu=="Activity Logs") {
                                    $CEdisabled = "disabled";
                                } else if(isset($value->main_menu) && $value->main_menu=="Reviews") {
                                    $CEdisabled = 'disabled';
                                } else {
                                    $CEdisabled = "";
                                }
                                if (isset($value->sub_menu) && $value->sub_menu=="Database Backup") {
                                    $Edisabled = 'disabled';
                                } else {
                                    $Edisabled = '';
                                }
                                if (isset($value->sub_menu) && $value->sub_menu=="Currency") {
                                    $Ddisabled = 'disabled';
                                } else if (isset($value->sub_menu) && $value->sub_menu=="Add Icons") {
                                    $Ddisabled = 'disabled';
                                } else if(isset($value->main_menu) && $value->main_menu=="Offline Requests") {
                                    $Ddisabled = 'disabled';
                                } else {
                                    $Ddisabled = '';
                                }
                                // if (isset($value->sub_menu) && $value->sub_menu=="S/O Sales & Availability") {
                                //     $CEDdisabled = 'disabled';
                                // } else {
                                //     $CEDdisabled = '';
                                // }
                                

                                ?>

                            <tr>
                                <th><input type="hidden" class="form-control" name="menuCheck[<?php echo $value->id ?>]" id="user" value="<?php echo $value->id ?>"> <?php echo $value->main_menu ?>  <?php echo isset($value->sub_menu) && $value->sub_menu!="" ? '-> '.$value->sub_menu : '' ?></th>
                                <th> 
                                    <div class="center">
                                        <input type="checkbox" class="filled-in" id="view<?php echo $value->id ?>" name="viewCheck[<?php echo $value->id ?>]" value="1"   <?php echo isset($view[$key]->menu_id) && $view[$key]->menu_id==$value->id &&  $view[$key]->view==1 ? 'checked' : '' ?>  /> 
                                        <label for="view<?php echo $value->id ?>"></label>
                                    </div>
                                </th>
                                <th>
                                    <div class="center">
                                        <input type="checkbox" <?php echo $CDdisabled."".$Cdisabled."".$CEDdisabled.""."".$CEdisabled ?> class="filled-in" id="user_create<?php echo $value->id ?>"  name="createCheck[<?php echo $value->id ?>]" value="1" <?php echo isset($view[$key]->menu_id) && $view[$key]->menu_id==$value->id &&  $view[$key]->create==1 ? 'checked' : '' ?>/>
                                        <label for="user_create<?php echo $value->id ?>"></label>
                                    </div>
                                </th>
                                <th >
                                    <div class="center">
                                        <input type="checkbox" <?php echo $CEDdisabled."".$CEdisabled."".$Edisabled ?> class="filled-in" id="user_edit<?php echo $value->id ?>"  name="editCheck[<?php echo $value->id ?>]" value="1" <?php echo isset($view[$key]->menu_id) && $view[$key]->menu_id==$value->id &&  $view[$key]->edit==1 ? 'checked' : '' ?>/>
                                        <label for="user_edit<?php echo $value->id ?>"></label>
                                    </div>
                                    
                                </th>
                                <th>
                                    <div class="center">
                                        <input type="checkbox" <?php echo $CDdisabled."".$CEDdisabled." ".$Ddisabled ?> class="filled-in" id="user_del<?php echo $value->id ?>" name="deleteCheck[<?php echo $value->id ?>]" value="1" <?php echo isset($view[$key]->menu_id) && $view[$key]->menu_id==$value->id &&  $view[$key]->delete==1 ? 'checked' : '' ?>/>
                                        <label for="user_del<?php echo $value->id ?>"></label>
                                    </div>
                                </th>
                                <!-- <th>
                                    <div class="center">
                                        <input type="checkbox" class="filled-in" id="user_all<?php echo $value->id ?>"  name="view[all]" value="on" />
                                        <label for="user_all<?php echo $value->id ?>"></label>
                                    </div>
                                </th> -->
                            </tr>
                            <?php } ?>
                        </table>
                        
                        <div class="row" style="margin-right: 1px; margin-top: 5px;">
                            <button type="button" id="role_form_button" class="waves-effect waves-light btn-sm btn-success pull-right"><?php echo isset($edit[0]->id) && $edit[0]->id!="" ? 'Update' : 'Submit' ?></button>
                        </div>   
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>

<?php init_tail(); ?>


