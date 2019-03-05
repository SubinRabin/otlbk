<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
  <div class="modal-content col-md-6 col-md-offset-3">
        <div class="modal-header">
          <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
             <h4 class="modal-title"><?php echo isset($_REQUEST['id']) && $_REQUEST['id']!="undefined" ? 'Edit' : 'Add' ?> Season</h4>
        </div>
        <div class="modal-body">
            <form method="post" id="RevenueSeason_form">
                <input type="hidden" name="season_id" id="season_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Season Name</label>
                        <input type="text" name="SeasonName" id="SeasonName" value="<?php echo isset($view[0]->SeasonName) ? $view[0]->SeasonName : '' ?>"> 
                    </div>

                    <div class="form-group col-md-6">
                        <label>From Date</label>
                        <input type="text" class="datePicker-hide datepicker" id="fromDate" name="fromDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->FromDate) ?  $view[0]->FromDate : date('Y-m-d') ?>"  >
                        <div class="input-group">
                            <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view[0]->FromDate) ?  date('d/m/Y',strtotime($view[0]->FromDate)) : date('d/m/Y') ?>"  >
                            <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>To Date</label>
                        <input type="text" class="datePicker-hide datepicker" id="toDate" name="toDate" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->ToDate) ?  $view[0]->ToDate : date('Y-m-d') ?>"  >
                        <div class="input-group">
                            <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view[0]->ToDate) ?  date('d/m/Y',strtotime($view[0]->ToDate)): date('d/m/Y') ?>"  >
                            <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
                <input type="button" id="RevenueSeasonSubmit" class="no-border btn-sm btn-success" value="<?php echo isset($_REQUEST['id']) && $_REQUEST['id']!="undefined" ? 'Update' : 'Insert' ?>">
        </div>
    </div>
<script type="text/javascript">

    
    var nextDay = new Date($("#fromDate").val());
    nextDay.setDate(nextDay.getDate() + 1);

    $("#fromDate").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
            var nextDay = new Date(dateText);
            nextDay.setDate(nextDay.getDate());
            $("#toDate").datepicker('option', 'minDate', nextDay);
        }
    });
    $("#toDate").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#fromDate" ).trigger('focus');
    });
    $("#alternate2").click(function() {
        $( "#toDate" ).trigger('focus');
    });
</script>
