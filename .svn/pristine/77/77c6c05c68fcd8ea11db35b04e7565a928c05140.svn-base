<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> stop sale</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="add_stopSale" name="add_stopSale" enctype="multipart/form-data"> 
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="date_picker">From Date :</label>
                <input type="date" id="from_date" name="from_date" class="datepicker" value="<?php echo isset($view[0]->from_date) ? $view[0]->from_date : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="date_picker1">To Date :</label>
                <input type="date" id="to_date" name="to_date" class="datepicker" value="<?php echo isset($view[0]->to_date) ? $view[0]->to_date : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Contracts</label>
                <?php  if (isset($_REQUEST['id'])) {
                            $contracts = explode(",", $view['0']->contracts);
                        } else {
                            $contracts = array();
                        }
                ?>
                <div class="multi-select-mod">
                    <select id="contract" name="contract[]" multiple="multiple" size="5" class="form-control">
                        <?php    
                        $i=0;
                            foreach ($contract as $key => $value) { 
                                if($contracts[$i]==$value->contract_id) {
                                $i++;
                                    ?>
                            <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                            <?php  } else { ?>
                            <option value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                        <?php }  } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <?php  if (isset($_REQUEST['id'])) {
                        $room_type = explode(",", $view['0']->room_types);
                    } else {
                        $room_type = array();
                    }
            ?>
            <div class="form-group col-md-4">
                <label>Room Types</label>
                <div class="multi-select-mod">
                    <select id="room_types" name="room_types[]" multiple="multiple" size="5" class="form-control">
                        <?php
                        $i=0;
                         foreach ($room_types as $key => $value) {
                            if ($room_type[$i]==$value->id) {
                            $i++;
                             ?>
                            <option selected="" value="<?php echo $value->id ?>"><?php echo $value->Room_Type ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->Room_Type ?></option>
                        <?php } 
                    } ?>
                    </select>
                </div>
            </div>
        </div>
        </form>
      <div class="modal-footer">
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="stopsale_submit"><?php echo isset($_REQUEST['id']) ? 'Update' : 'Submit' ?></button>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $('#contract').multiselect({

    });
    $('#room_types').multiselect({

    });
</script>