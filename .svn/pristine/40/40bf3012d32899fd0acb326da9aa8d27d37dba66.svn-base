<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo isset($view[0]->id) ? 'Edit'  : 'Add' ?> Room Aminities</h4>
      </div>
      <div class="modal-body">
      	<form id="roomAminitieForm" method="post">
      		<input type="hidden" name="id" id="id" value="<?php echo isset($view[0]->id) ? $view[0]->id  : '' ?>">
	        <div class="row">
	        	<div class="col-md-12 form-group">
	        		<label>Room Aminitie</label>
	        		<input type="text" name="roomAminitie" id="roomAminitie" class="form-control" value="<?php echo isset($view[0]->Aminities) ? $view[0]->Aminities  : '' ?>">
	        	</div>
	        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="AminitieSubmit" class="btn-sm btn-success"><?php echo isset($view[0]->id) ? 'Update'  : 'Submit' ?></button>
      </div>
    </div>
</div>
