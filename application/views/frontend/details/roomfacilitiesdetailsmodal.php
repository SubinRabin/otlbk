<div class="modal-dialog modal-sm">
  <div class="modal-content" style="width: 645px;">
    <div class="modal-header">
      <button type="button" class="close close-modal"  data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Hotel Facilities</h4>
    </div>
  	<div class="modal-body">
  		<div class="row" style="margin: 0 0 0 70px;">
    		<div class="col-md-12">
				  <ul class="checklist">
					<?php if (count($room_facilities[0])!=0) {
						foreach ($room_facilities as $key => $value) {
						?>
						<li><?php echo $value[0]->Room_Facility; ?></li>
					<?php } } ?>
				  </ul>
		    </div>
	    </div>
  	</div>
	</div>
</div>
<script type="text/javascript">
    $(document.ready(function(){ 
         $('.modal').on('hidden.bs.modal', function(e){ 
            $(this).removeData();
            $('#modal-container .modal-content').empty();
        });
    });
</script>
