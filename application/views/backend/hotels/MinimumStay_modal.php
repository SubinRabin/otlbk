<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Minimum Stay</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="MinimumStay_form" name="MinimumStay_form" enctype="multipart/form-data"> 
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['contract_id']) ? $_REQUEST['contract_id'] : '' ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" >
        <input type="hidden" name="contract_end" id="contract_end" value="<?php echo isset($contract_period[0]->to_date) ? $contract_period[0]->to_date : '' ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="season">Season</label><span>*</span>
                <div class="multi-select-mod">
                <?php if (isset($_REQUEST['id'])) { ?>
                    <select class="form-control" id="season" name="Season">
                        <?php if (count($seasons)!=0) { ?>
                            <option value="All">All</option>
                        <?php } ?>
                        <?php foreach ($seasons as $key => $value) { 
                             if (isset($_REQUEST['id']) && $view[0]->season==$value->id) { ?>
                            <option selected="" value="<?php echo $value->id ?>"><?php echo $value->SeasonName?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->SeasonName ?></option>
                        <?php }  } ?>
                        <option value="Other">Other</option>
                    </select>
                <?php } else { ?>
                    <select class="form-control season" multiple="" name="Season[]" id="season">
                        <?php 
                        foreach ($seasons as $key => $value) { 
                            if(isset($_REQUEST['id']) && $view[0]->season==$value->id) { ?>
                            <option selected="" title="<?php echo date('d/m/Y',strtotime($value->FromDate))." to ".date('d/m/Y',strtotime($value->ToDate))  ?>" value="<?php echo $value->id ?>"><?php echo $value->SeasonName ?></option>
                        <?php   } else { ?>
                            <option title="<?php echo date('d/m/Y',strtotime($value->FromDate))." to ".date('d/m/Y',strtotime($value->ToDate))  ?>" value="<?php echo $value->id ?>"><?php echo $value->SeasonName ?></option>
                        <?php }  }  ?>
                    </select>
                <?php } ?>
                </div>
            </div>
            <?php if (!isset($_REQUEST['id'])) { ?>
            <div class="form-group col-md-4">
                <label></label>
                <div class="input-group">
                    <input type="checkbox" <?php echo isset($_REQUEST['id']) && $view[0]->season=="Other" ? 'checked' : '' ?> name="other_season" class="filled-in" id="other_season"/>
                    <label for="other_season">Other Season</label>
                </div>
            </div>
            <?php } ?>
            <div class="form-group col-md-4">
                <label>From Date</label>
                <input type="text" class="datePicker-hide datepicker" id="fromDate" name="fromDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $view[0]->fromDate : '' ?>" >
                <div class="input-group">
                    <input class="datepicker" id="alternate1" disabled readonly="" value="<?php echo isset($_REQUEST['id']) ? date('d/m/Y' ,strtotime($view[0]->fromDate)) : '' ?>" >
                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
        <?php if (!isset($_REQUEST['id'])) { ?>
        </div>
        <div class="row">
        <?php } ?>
            <div class="form-group col-md-4">
                <label>To Date</label>
                <input type="text" class="datePicker-hide datepicker" id="toDate" name="toDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $view[0]->toDate : '' ?>" >
                <div class="input-group">
                    <input class="datepicker" id="alternate2" disabled readonly="" value="<?php echo isset($_REQUEST['id']) ? date('d/m/Y' ,strtotime($view[0]->toDate)) : '' ?>" >
                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
        <?php if (isset($_REQUEST['id'])) { ?>
        </div>
        <div class="row">
        <?php } ?>
            <div class="form-group col-md-4">
                <label>Days</label>
                <input type="number" id="minDay" name="minDay"  value="<?php echo isset($_REQUEST['id']) ? $view[0]->minDay : '' ?>">
            </div>
        </div>
        </form>
      <div class="modal-footer">
            <button type="button" class="btn-sm btn-success" name="MinimumStay_submit" id="MinimumStay_submit"><?php echo isset($_REQUEST['id']) ? 'Update' : 'Submit' ?></button>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $('#season').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
    $('#season').multiselect({
        onChange: function(element, checked) {
            var season = $('#season option:selected');
            var selected = [];
            $(season).each(function(index, brand){
                selected.push([$(this).val()]);
            });
            console.log(selected);
        }
    });
    $("#other_season").click(function() {
        if($('#other_season').is(':checked')){
            $('#alternate1').removeAttr('disabled');
            $('#alternate2').removeAttr('disabled');
            $('#season').multiselect('disable');
        }
        else {
            $('#alternate1').attr('disabled', 'disabled');
            $('#alternate2').attr('disabled', 'disabled');
            $('#season').multiselect('enable');
        }
    });

    $("#season").change(function() {
        seasonchange();
    });
    function seasonchange() {
      var season = $("#season").val();
      if (season=="Other") {
        $('#alternate1').removeAttr('disabled');
        $('#alternate2').removeAttr('disabled');

        $("#fromDate").datepicker( "option", "disabled", false );
        $("#toDate").datepicker( "option", "disabled", false );
      } else {
        $.ajax({
          dataType: 'json',
          type: "Post",
          url: base_url+'/backend/hotels/SeasonDateCheck',
          data: $('#MinimumStay_form').serialize(),
          success: function(data) {
            $("#fromDate").val(data[0].FromDate);
              $("#toDate").val(data[0].ToDate);

              $("#alternate1").attr("disabled","disabled");
              $("#fromDate").datepicker( "option", "disabled", false );

              $("#toDate").datepicker( "option", "disabled", false );
              $("#alternate2").attr("disabled","disabled");
          }
        });
      }
    }
    var contract_end = new Date($("#to_date").val());
    var contract_start = new Date($("#from_date").val());
    var end_date = new Date($("#contract_end").val());
    var nextDay = new Date($("#fromDate").val());
    nextDay.setDate(nextDay.getDate() + 1);

    $("#fromDate").datepicker({
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
            $("#toDate").datepicker('option', 'minDate', nextDay);
        }
    });
    $("#toDate").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: contract_start,
        maxDate: end_date,
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $("#fromDate").trigger('focus');
    });
    $("#alternate2").click(function() {
        $("#toDate").trigger('focus');
    });
</script>
