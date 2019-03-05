<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="modal-content col-md-8 col-md-offset-2">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="list-img">Observation</h4>
    </div>
    <div class="modal-body">
      <form action="<?php echo base_url(); ?>backend/hotels/hotel_observation_comment_update" method="post" id="observation_form" enctype="multipart/form-data">
          <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['id'] ?>">
            <div class="row">
              <div class="form-group col-md-12">
                  <label for="command">Comment</label>
                  <textarea id="comment" type="text" name="comment" class="form-control" rows="5" cols="20" ><?php  echo isset($view[0]->observation_command) ? $view[0]->observation_command: ''  ?></textarea>
              </div>
         	</div>
			</form>
  	</div>
    <div class="modal-footer">
      <div class="form-group col-md-12">
          <input type="button" class="btn-sm btn-success update_button pull-right" id="comment_click"  value="Update">
      </div>
    </div>
</div>
