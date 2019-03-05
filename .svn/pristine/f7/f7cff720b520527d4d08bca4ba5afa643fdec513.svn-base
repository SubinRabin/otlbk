<?php init_head();  
$Mail = menuPermissionAvailability($this->session->userdata('id'),'General','Mail'); 
 ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <h2>Mail Settings</h2>
            </div>
            <form action="<?php echo base_url(); ?>backend/common/mail_settings_update" name="mail_settings_form" id="mail_settings_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                        <label for="list-title">Protocol</label>
                        <input type="text" class="form-control" id="protocol" name="protocol" placeholder="Protocol" value="<?php echo $view[0]->protocol ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Smtp Host</label>
                            <input type="text" class="form-control" id="smtp_host" name="smtp_host" placeholder="Smtp Host" value="<?php echo $view[0]->smtp_host ?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Smtp Password</label>
                            <input type="text" class="form-control" id="smtp_password" name="smtp_password" placeholder="Smtp Password" value="<?php echo $view[0]->smtp_password ?>">
                    	</div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Smtp Port</label>
                            <input type="text" class="form-control" id="smtp_port" name="smtp_port" placeholder="Smtp Port" value="<?php echo $view[0]->smtp_port ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Mail Type</label>
                            <input type="text" class="form-control" id="mailtype" name="mailtype" placeholder="Mail Type" value="<?php echo $view[0]->mailtype ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Smtp Timeout</label>
                            <select name="smtp_timeout">
                                <?php foreach ($timeout as $key => $value) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Charset</label>
                            <select name="smtp_charset">
                                <?php foreach ($Charset as $key => $value) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Smtp User</label>
                            <input type="text" class="form-control" id="smtp_user" name="smtp_user" placeholder="Smtp User" value="<?php echo $view[0]->smtp_user ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $view[0]->company_name ?>">
                        </div>
                        <?php if (count($Mail)!=0 && $Mail[0]->edit==1) { ?>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <button type="button" style="margin-top: 25px" id="mail_form_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <hr/>
            	</div>
            </form>
            <?php if (count($Mail)!=0 && $Mail[0]->edit==1) { ?>
            <form action="<?php echo base_url(); ?>backend/common/test_mail"  name="test_mail_form" id="test_mail_form" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                       <label for="list-title">Test Mail</label>
                       <input type="text" class="form-control" id="test_mail" name="test_mail">
                       <?php if (isset($error)) { ?>
                        <span class="mail_err"><?php echo $error ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-2">
                       <button type="button" id="test_mail_button" style="margin-top: 25px" class="waves-effect waves-light btn-sm btn-primary">Check</button>
                    </div>
            </form>
        <?php } ?>
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<?php init_tail(); ?>


