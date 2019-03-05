<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Agent Credit Details</span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/agents" class="btn-sm btn-primary">Back</a></span>
                        <span class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#credit_add_out_add" class="btn-sm btn-success">Add</a></span>
                    </div>
                    <hr>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover"  id="agent_credit_detail">
                            	<input type="hidden" name="agent_id" id="agent_id" value="<?php echo($_REQUEST['id']) ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>credit amount</th>
                                        <th>total</th>
                                        <th>Credit date</th>
                                        <th>credited from</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="delete_modal modal fade" id="credit_add_out_add" role="dialog">
  <div class="modal-dialog ">
 <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add New Details</h4>
    </div>
    <div class="modal-body">
        <div class="inn-title">
        </div>
         </br>
	    <div class="row" style="margin-top: -8%;">
	        <form action="add_credit" method="post" id="add_credit" name="add_credit" enctype="multipart/form-data"> 
	            <input type="hidden" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id'] : ''?> " name="agent_id">
	            <input type="hidden" value="<?php echo $view1[0]->Credit_amount ?>" name="credit">
	             <div class="form-group col-md-12">
	                <label for="amount">Credit Amount</label>
	                <input id="amount" name="amount" type="text" class="form-control" value="">
	            </div>
	        </form>
	    </div>
    </div>
    <div class="modal-footer">
        <input type="button" id="credit_button" class="btn-sm btn-success" value="Submit">
    </div>
 </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/agent_credit.js"></script>
<?php init_tail(); ?>
