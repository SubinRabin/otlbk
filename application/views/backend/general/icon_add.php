<?php init_head();
$AddIcon = menuPermissionAvailability($this->session->userdata('id'),'General','Add Icon'); 
 ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col-md-6">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Icon</h2>
                <?php } else { ?>
                    <h2>Add Icon</h2>
                <?php }?>
            </div>
            <div class="col-md-6">
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/common/icons" class="btn-sm btn-primary">Back</a></span>
            </div>
            <div class="col-md-12">
            <form action="<?php echo base_url(); ?>backend/common/icons_add" name="icons_form" id="icons_form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="list-title">Enter Icon Name</label>
                        <input id="icons" type="text" name="icons" value="<?php echo isset($edit[0]->icon_name) ? $edit[0]->icon_name : ''; ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="file-field input-field">
                            <div class="btn">
                                <label for="file" style="color: white;line-height: 31px;text-indent: 8px;">Icon</label>
                                <input name="icon_src" id="file" class="hide white" type="file" onchange="return ValidateFileUploadicon();">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  id="icon_upload" type="text">
                            </div>
                            <?php if (isset($edit[0]->icon_src) && $edit[0]->icon_src!="") { ?>
                                <img src="<?php echo base_url();?><?php echo $edit[0]->icon_src;?>" alt="">
                          <?php } else { ?>
                                <img src="" alt="">
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                            <button type="button" id="icons_form_button" class=" btn-sm btn-success pull-right">Update</button>
                        <?php } else { ?>
                            <button type="button" id="icons_form_button" class=" btn-sm btn-success pull-right">Submit</button>
                    </div>
                    <?php }?>
                </div>
            </form>
            </div>
        </div>
    </div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<?php init_tail(); ?>

