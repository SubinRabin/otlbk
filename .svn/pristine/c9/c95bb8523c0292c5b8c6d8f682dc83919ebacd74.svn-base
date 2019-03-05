<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Cancellation Policy</h2>
                <?php } else { ?>
                <h2>Add Cancellation Policy</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/contractpolicy?id=<?php echo $contract_id ?>" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/tour/addpolicy" name="add_policy_form" id="add_policy_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <input type="hidden" name="contract_id" value="<?php echo isset($contract_id) ? $contract_id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">From Date</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="from_date" name="from_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->from_date) ?  $edit[0]->from_date : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate1" value="<?php echo isset($edit[0]->from_date) ?  date('d/m/Y',strtotime($edit[0]->from_date)) : date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="list-title">To Date</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="to_date" name="to_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->to_date) ?  $edit[0]->to_date : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate2" value="<?php echo isset($edit[0]->to_date) ?  date('d/m/Y',strtotime($edit[0]->to_date)) : date('d/m/Y') ?>" >
                                <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Day From</label>
                            <input type="number" class="form-control" id="from_day" name="from_day" placeholder="From Day" value="<?php echo isset($edit[0]->from_day) ? $edit[0]->from_day : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Day To</label>
                            <input type="number" class="form-control" id="to_day" name="to_day" placeholder="To Day" value="<?php echo isset($edit[0]->to_day) ? $edit[0]->to_day : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo isset($edit[0]->description) ? $edit[0]->description : '' ?></textarea>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="list-title">Cancellation %</label>
                            <input type="number" class="form-control" id="cancle_percent" name="cancel_percent" placeholder="Cancellation Percentage" value="<?php echo isset($edit[0]->cancel_percent) ? $edit[0]->cancel_percent : ''; ?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-md-offset-6">
                            <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                <button type="button" style="margin-top: 25px" id="add_policy_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_policy_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                            <?php } ?>
                        </div>
                    </div>                  
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/policy.js"></script>
<script>
    $("#from_date").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#to_date").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $("#from_date").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#to_date").trigger('focus');
        }); 
</script>
<?php init_tail(); ?>


