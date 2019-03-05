 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Extrabed</h4>
       </div>
      <div class="modal-body">
        <form method="post" id="extrabed_form" name="extrabed_form" enctype="multipart/form-data"> 
        <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['contract_id']) ? $_REQUEST['contract_id'] : '' ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" >
        <input type="hidden" name="contract_end" id="contract_end" value="<?php echo isset($contract_period[0]->to_date) ? $contract_period[0]->to_date : '' ?>" >
        <div class="row">
            <div class="form-group col-md-4">
                <label for="room_type">Room Type :</label><span>*</span>
                <?php  if (isset($_REQUEST['id'])) {
                        $room_type = explode(",", $extrabed[0]->roomType);
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
                            <option value="<?php echo $value->id ?>"><?php echo $value->Room_Type; ?>  <?php echo $value->room_name; ?></option>
                        <?php } }  ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="Season">Season</label><span>*</span>
                <div class="multi-select-mod">
                <?php if (isset($_REQUEST['id'])) { ?>
                    <select class="form-control" id="Season" name="Season">
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
                    <select class="form-control season" id="Season" name="Season[]" multiple="">
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
        <?php if (!isset($_REQUEST['id'])) { ?>
        </div>
        <div class="row">
        <?php } ?>        
            <div class="form-group col-md-4">
                <label>From Date</label>
                <input type="text"  class="datePicker-hide datepicker" id="fromDate" name="fromDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->from_date : '' ?>" >
                <div class="input-group">
                    <input class="datepicker" id="alternate1" readonly="" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->from_date : '' ?>" >
                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
        <?php if (isset($_REQUEST['id'])) { ?>
        </div>
        <div class="row">
        <?php } ?> 
            <div class="form-group col-md-4">
                <label>To Date</label>
                <input type="text"  class="datePicker-hide datepicker" id="toDate" name="toDate" readonly="" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->to_date : '' ?>" >
                <div class="input-group">
                    <input class="datepicker" id="alternate2" readonly="" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->to_date : '' ?>" >
                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
        
             <div class="form-group col-md-4">
                <label>Child age from</label>
                <input type="number"   id="ChildAgeFrom" name="ChildAgeFrom" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->ChildAgeFrom : '' ?>" >
            </div>
            <div class="form-group col-md-4">
                <label>Child age to</label>
                <input type="number"   id="ChildAgeTo" name="ChildAgeTo" value="<?php echo isset($_REQUEST['id']) ? $extrabed[0]->ChildAgeTo : '' ?>" >
            </div>
            <div class="form-group col-md-4">
                <label>Child amount</label>
                <input type="number"   id="ChildAmount" name="ChildAmount" value="<?php echo isset($_REQUEST['id']) ? round(contract_currency_type(hotel_currency_type($_REQUEST['hotel_id']),$extrabed[0]->ChildAmount)) : '' ?>" >
            </div>
            <div class="form-group col-md-4">
                <label>Adult amount</label>
                <input type="number" min="0" name="Amount" id="Amount" value="<?php echo isset($_REQUEST['id']) ? round(contract_currency_type(hotel_currency_type($_REQUEST['hotel_id']),$extrabed[0]->amount)) : '' ?>">
            </div>
        </div>
        </form>
      <div class="modal-footer">
            <button type="button" class="btn-sm btn-success"  id="extrabed_submit">Update</button>
      </div>
    </div>
  </div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
    $('#room_type').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });

    <?php if (!isset($_REQUEST['id'])) { ?>
        $('#Season').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
    <?php } ?>
    $('#Season').multiselect({
            onChange: function(element, checked) {
                var season = $('#Season option:selected');
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
            $('#Season').multiselect('disable');
        }
        else {
            $('#alternate1').attr('disabled', 'disabled');
            $('#alternate2').attr('disabled', 'disabled');
            $('#Season').multiselect('enable');
        }
    });
    // $(document).ready(function() {
        seasonchange();
        $("#Season").change(function() {
            // var season = $(this).val();
            // if (season=="Other") {
            //     $("#fromDate").removeAttr("readonly");
            //     $("#toDate").removeAttr("readonly");
            //     $("#fromDate").val("");
            //     $("#toDate").val("");
            // } else {
                seasonchange();
            // }
            
        });
    // });
    function seasonchange() {
        var season = $("#Season").val();
        if (season=="Other") {
            $("#alternate1").removeAttr("disabled");
            $("#alternate2").removeAttr("disabled");

            $("#fromDate").datepicker( "option", "disabled", false );
            $("#toDate").datepicker( "option", "disabled", false );
        } else {
            $.ajax({
              dataType: 'json',
              type: "Post",
              url: base_url+'/backend/hotels/SeasonDateCheck',
              data: $('#extrabed_form').serialize(),
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
    var nextDay = new Date($("#fromDate").val());
    var end_date = new Date($("#contract_end").val());
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
