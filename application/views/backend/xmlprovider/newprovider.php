<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Xml Providers</h2>
                <?php } else { ?>
                <h2>New Providers Add</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/xmlprovider" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/xmlprovider/addprovider" name="add_xml_form" id="add_xml_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo isset($edit[0]->Name) ? $edit[0]->Name : ''; ?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="list-title">Url</label>
                            <input type="text" class="form-control" id="provider_url" name="provider_url" placeholder="Provider Url" value="<?php echo isset($edit[0]->url) ? $edit[0]->url : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Connection String</label>
                            <input type="text" class="form-control" id="con_string" name="con_string" placeholder="Connection String" value="<?php echo isset($edit[0]->ConnectionString) ? $edit[0]->ConnectionString : '';?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Username</label>
                             <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo isset($edit[0]->UserName) ? $edit[0]->UserName : '';?>">
                    	</div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo isset($edit[0]->password) ? $edit[0]->password : '';?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Commision</label>
                             <input type="text" class="form-control" id="commision" name="commision" placeholder="Commision" value="<?php echo isset($edit[0]->Commision) ? $edit[0]->Commision : '';?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_xml_submit_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_xml_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                   
                    
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/xmlprovider.js"></script>

<?php init_tail(); ?>


