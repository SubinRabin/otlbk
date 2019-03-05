<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Supplier</h2>
                <?php } else { ?>
                <h2>New Supplier Add</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/supplier_index" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/tour/addsupplier" name="add_supplier_form" id="add_supplier_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Supplier Code</label>
                            <input type="text" class="form-control" id="supplier_code" name="supplier_code" value="<?php echo isset($edit[0]->supplier_code) ? $edit[0]->supplier_code : $supplier_max_id ?>" readonly >
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="list-title">Supplier Name</label>
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="supplier Name" value="<?php echo isset($edit[0]->supplier_name) ? $edit[0]->supplier_name : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Landline Number</label>
                            <input type="text" class="form-control" id="phone_landline" name="phone_landline" placeholder="Landline Number" value="<?php echo isset($edit[0]->phone_landline) ? $edit[0]->phone_landline : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Sales Contact Person</label>
                            <input type="text" class="form-control" id="salescontact_person" name="salescontact_person" placeholder="Sales Contact Person" value="<?php echo isset($edit[0]->salescontact_person) ? $edit[0]->salescontact_person : ''; ?>">
                    	</div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                           <label for="list-title">Sales Contact Number</label>
                            <input type="text" class="form-control" id="salescontact_num" name="salescontact_num" placeholder="Sales Contact Number" value="<?php echo isset($edit[0]->salescontact_num) ? $edit[0]->salescontact_num : ''; ?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="list-title">Sales Contact Email</label>
                            <input type="text" class="form-control" id="sales_contact_email" name="sales_contact_email" placeholder="Sales Contact Email" value="<?php echo isset($edit[0]->sales_contact_email) ? $edit[0]->sales_contact_email : ''; ?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                           <label for="list-title">Credit Limit</label>
                            <input type="text" class="form-control" id="credit_limit" name="credit_limit" placeholder="Credit Limit" value="<?php echo isset($edit[0]->credit_limit) ? $edit[0]->credit_limit : ''; ?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="list-title">Ops Contact Person</label>
                            <input type="text" class="form-control" id="ops_contact_person" name="ops_contact_person" placeholder="Ops Contact Person" value="<?php echo isset($edit[0]->ops_contact_person) ? $edit[0]->ops_contact_person : ''; ?>">
                            
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                           <label for="list-title">Ops Contact Number</label>
                            <input type="text" class="form-control" id="ops_contact_num" name="ops_contact_num" placeholder="Ops Contact Number" value="<?php echo isset($edit[0]->ops_contact_num) ? $edit[0]->ops_contact_num : ''; ?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="list-title">Ops Contact Email</label>
                            <input type="text" class="form-control" id="ops_contact_email" name="ops_contact_email" placeholder="Ops Contact Email" value="<?php echo isset($edit[0]->ops_contact_email) ? $edit[0]->ops_contact_email : ''; ?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_supplier_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_supplier_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                   
                    
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/tour.js"></script>
<?php init_tail(); ?>


