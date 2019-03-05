<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
</script>
  <div class="modal-content col-md-6 col-md-offset-3">
        <div class="modal-header">
             <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
             <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Close Out Period</h4>
        </div>
        <div class="modal-body">
            <div class="inn-title">
            </div>
            </br>
            <input type="hidden" name="contract_end" id="contract_end" value="<?php echo isset($contract_period[0]->to_date) ? $contract_period[0]->to_date : '' ?>" >
        <div class="row" style="margin-top: -8%;">
            <form  method="post" id="update_closeout_hotel" name="add_close_hotel" enctype="multipart/form-data"> 
                    <input type="hidden" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ''  ?>" name="id">
                    <input type="hidden" value="<?php echo $_REQUEST['hotel_id'] ?>" name="hotel_id">
                    <input type="hidden" value="<?php echo $_REQUEST['contract_id'] ?>" name="contract_id">
                    <?php if (isset($_REQUEST['id'])) { ?> 
                    <div class="form-group col-md-12">
                            <span><label>Closed Date :</label></span>
                            <span><?php echo date('d-m-Y',strtotime($view[0]->closedDate)) ?></span>
                             <br>
                    </div>    
                    <?php } else {?>
                    <div class="form-group col-md-6">
                            <label for="from_date_edit">From date</label>
                            <input type="text"  class="datePicker-hide datepicker" id="from_date_edit" name="from_date_edit"  placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $view[0]->from_date : '' ?>" >
                            <div class="input-group">
                                    <input class="datepicker" id="alternate1"  value="<?php echo isset($_REQUEST['id']) ? $view[0]->from_date : '' ?>" >
                                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="to_date_edit">To date</label>
                            <input type="text"  class="datePicker-hide datepicker" id="to_date_edit" name="     to_date_edit"  placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $view[0]->to_date : '' ?>" >
                            <div class="input-group">
                                    <input class="datepicker" id="alternate2"  value="<?php echo isset($_REQUEST['id']) ? $view[0]->to_date : '' ?>" >
                                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
                    </div>
                
                    <?php } ?>
                    <div class="form-group col-md-12">
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
                            <option selected="" value="<?php echo $value->id ?>"><?php echo $value->Room_Type; ?>  <?php echo $value->room_name; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->Room_Type ?>  <?php echo $value->room_name; ?></option>
                            <?php } }  ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="reason">Reason</label>
                        <textarea id="reason" name="reason" class="form-control"><?php echo isset($_REQUEST['id']) ? $view[0]->reason  : '' ?></textarea>
                    </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <div class="form-group col-md-12">
            <input type="submit" id="update_close_out" class="btn-sm btn-success" value="<?php echo isset($_REQUEST['id']) ? 'Update' : 'Insert' ?>">
        </div>
    </div>
</div>
<script type="text/javascript">

    var contract_end = new Date($("#to_date").val());
    var contract_start = new Date($("#from_date").val());
    var end_date = new Date($("#contract_end").val());
    var nextDay = new Date($("#from_date_edit").val());
    nextDay.setDate(nextDay.getDate() + 1);

    $("#from_date_edit").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: contract_start,
        maxDate: end_date,
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
            var nextDay = new Date(dateText);
            nextDay.setDate(nextDay.getDate() + 1);
            $("#to_date_edit").datepicker('option', 'minDate', nextDay);
        }
    });
    $("#to_date_edit").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: contract_start,
        maxDate: end_date,
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $("#from_date_edit").trigger('focus');
    });
    $("#alternate2").click(function() {
        $("#to_date_edit").trigger('focus');
    });
</script>
<script type="text/javascript">
    $('#contract').multiselect({

    });
    $('#room_type').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
</script>
