<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Child policy</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="add_childPolicy" name="add_childPolicy" enctype="multipart/form-data"> 
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['contract_id']) ? $_REQUEST['contract_id'] : '' ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="age_from">Age From :</label><span>*</span>
                <input type="number" id="age_from" name="age_from" class="form-control" value="<?php echo isset($view[0]->ageFrom) ? $view[0]->ageFrom : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="age_to">Age To :</label><span>*</span>
                <input type="number" id="age_to" name="age_to" class="form-control" value="<?php echo isset($view[0]->ageTo) ? $view[0]->ageTo : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="room_type">Room Type :</label><span>*</span>
                <?php  if (isset($_REQUEST['id'])) {
                        $room_type = explode(",", $view[0]->roomType);
                    } else {
                        $room_type = array();
                    }
            ?>
                <div class="multi-select-mod">
                    <select class="form-control" multiple="" name="room_type[]" id="room_type">
                        <?php 
                        $i=0;
                        foreach ($room_types as $key => $value) { 
                            if ($room_type[$i]==$value->id) {
                            $i++; ?>
                            <option selected="" value="<?php echo $value->room_type ?>"><?php echo $value->Room_Type ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->room_type ?>"><?php echo $value->Room_Type ?></option>
                        <?php } }  ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label>Discount :</label>
                <input type="number" id="discount" name="discount" class="form-control" value="<?php echo isset($view[0]->discount) ? $view[0]->discount : '' ?>">
            </div>
            <div class="form-group col-md-2">
                <label>D.Type :</label>
                <select class="form-control" name="discountType">
                    <option <?php echo isset($view[0]->discountType) && $view[0]->discountType=='%' ? 'selected' : '' ?> value="%">%</option>
                    <option <?php echo isset($view[0]->discountType) && $view[0]->discountType=='AED' ? 'selected' : '' ?> value="AED">AED</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="age_from">Board :</label><span>*</span>
                <select class="form-control" id="board" name="board">
                    <?php foreach ($board as $key => $value) {
                        if (isset($_REQUEST['id']) && $view[0]->board==$value) { ?>
                        <option selected="" value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } } ?>
                </select>
            </div>
        </div>
        </form>
      <div class="modal-footer">
            <button type="button" class="btn-sm btn-success" name="childPolicy_submit" id="childPolicy_submit"><?php echo isset($_REQUEST['id']) ? 'Update' : 'Submit' ?></button>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $('#contract').multiselect({

    });
    $('#room_type').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
</script>