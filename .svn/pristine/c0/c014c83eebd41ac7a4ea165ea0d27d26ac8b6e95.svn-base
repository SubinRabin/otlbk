<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="modal-content col-md-10 col-md-offset-2">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="list-img">Allotment Rooms</h4>
    </div>
    <div class="modal-body">
      <form id="contract-policy-form" method="post">
        <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
        <input type="hidden" name="contract_id" value="<?php echo $_REQUEST['id'] ?>">
        <div class="row">
            <div class="form-group col-md-12 imp_remarks">
                <label for="t5-n1">Allotment Rooms</label>
                <select class="form-control" id="cnt_alt_select" onchange="allotement_redirect('<?php echo $_REQUEST['hotel_id'] ?>','<?php echo $_REQUEST['id'] ?>');">
                  <option>--Select Room--</option>
                  <?php foreach ($list as $key => $value) { ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->room_name." - ".$value->room_type_name ?></option>
                  <?php } ?>
                </select>
            </div>
        </div>
        </form>
  	</div>
</div>
