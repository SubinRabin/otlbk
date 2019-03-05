<?php init_head_company_popup(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<div id="myModal" class="modal-bg-fix modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select A Company</h4>
            </div>
            <div class="modal-body">
                <form name="company_add"  id="company_add" action="<?php echo base_url('backend/finance/account_head'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label for="sel1">Select list:</label>
                          <select class="form-control" id="one_company" onchange ="company_one_fun()">
                             <option value="" disabled selected>-- Select --</option><span>*</span>
                            <?php foreach ($view as $key => $value) { ?>
                             <option  value="<?php echo $value->Com_ID; ?>"><?php echo $value->Com_Name; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <input type="text" name="id" id="delete_id" hidden>
                        <div class="form-group col-md-6">
                            <label for="c_address">Address :</label>
                            <textarea name="c_address" id="c_address" class="form-control" readonly></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="c_tin">Tin No. :</label><span>*</span>
                            <input id="c_tin" name="c_tin" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date-picker">Opening Date :</label>
                            <input type="text" id="date-picker" name="date-picker" class="form-control" readonly>
                        </div>
                    </div>
                     <div style="text-align: center;"> 
                        <button type="submit" class="btn-sm btn-primary">Select</button>
                        <button type="submit" class="btn-sm btn-danger">Cancel</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
