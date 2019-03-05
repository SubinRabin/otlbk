<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
	<div class="modal-content">
		<div class="modal-header">
	 			<button type="button" class="close" data-dismiss="modal">&times;</button>
	 			<h4 class="modal-title">Refresh copy </h4>
	 	</div>
	 	<div class="modal-body">
	 		<form id="refform" enctype="multipart/form-data"> 
	 		 		<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        	 		<input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['id']) ? $view[0]->contract_id : '' ?>" >
	 		 		<div class="row">
                    	<div class="form-group ">
                        	<input type="checkbox" class="filled-in" name="board" id="boardcy" <?php echo isset($view[0]->BoardCopy) && $view[0]->BoardCopy=="1" ? "checked" : "" ?> value="1" />
                        	<label for="boardcy">Board Copy</label>
                    	</div>
                    	<div class="form-group ">
                        	<input type="checkbox" class="filled-in" name="general"  id="gency"   <?php echo isset($view[0]->GenCopy) && $view[0]->GenCopy=="1" ? "checked" : "" ?> value="" />
                        	<label for="gency">General Copy</label>
                    	</div>
                    	<div class="form-group ">
                        	<input type="checkbox" class="filled-in" name="exbed" <?php echo isset($view[0]->EXbedCopy) && $view[0]->EXbedCopy=="1" ? "checked" : "" ?> id="exbedcy"  value="" />
                        	<label for="exbedcy">ExtraBed Copy</label>
                    	</div>
                    	<div class="form-group">
                        		<input type="checkbox" class="filled-in" name="cancel"  id="cancelcy"  <?php echo isset($view[0]->CancelCopy) && $view[0]->CancelCopy=="1" ? "checked" : "" ?> value="" />
                            	<label for="cancelcy">Cancellation Policy Copy</label>
                    	</div>
                    	<div class="form-group">
                        		<input type="checkbox" class="filled-in" name="minimum"  id="minimumcy" <?php echo isset($view[0]->MiniCopy) && $view[0]->MiniCopy=="1" ? "checked" : "" ?>  value="" />
                            	<label for="minimumcy">Minimum Stay Copy</label>
                    	</div>
                    	<!-- <div class="form-group">
                        		<input type="checkbox" class="filled-in" name="close"  id="closecy"  <?php echo isset($view[0]->CloseCopy) && $view[0]->CloseCopy=="1" ? "checked" : "" ?> value="" />
                            	<label for="closecy">Closeout Period Copy</label>
                    	</div>
                    	<div class="form-group">
                        		<input type="checkbox" class="filled-in" name="policy"  id="policycy" <?php echo isset($view[0]->PolicyCopy) && $view[0]->PolicyCopy=="1" ? "checked" : "" ?>  value="" />
                            	<label for="policycy">Policy Copy</label>
                    	</div> -->

                	</div>
       
        			<div class="modal-footer">
            			<button type="submit" class="btn-sm btn-success" name="refCopyUpdate" id="refCopyUpdate">Update</button>
      				</div>
      		</form>
      	</div>
			
	</div>

