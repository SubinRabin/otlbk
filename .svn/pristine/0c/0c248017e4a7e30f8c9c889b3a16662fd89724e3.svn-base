<style type="text/css">
    .multi-select-mod .btn-group, .multi-select-mod button, .multi-select-mod .dropdown-menu {
        top: 0px ! important;
    }
</style>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-body">
                <form id="bulk-update-form" method="post">
                    
                    <input type="hidden" name="room_id"  id="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="hotel_id"  id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" id="bulk_alt_contract_id" value="<?php echo $_REQUEST['contract_id'] ?>">
                    <input type="hidden" class="contract_type" value="<?php echo $type[0]->contract_type ?>">
                    <?php 
                    ?>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Seasons</label>
                        <div class="form-group">
                            <div class="multi-select-mod">
                            <select id="bulk-alt-season" name="bulk-alt-season[]" multiple = "" class="form-control" readonly="" onchange="seasonchange();">
                                <?php foreach ($seasons as $key => $value) { ?>
                                    <option title="<?php echo date('d/m/Y',strtotime($value->FromDate))." to ".date('d/m/Y',strtotime($value->ToDate))  ?>" value="<?php echo $value->id ?>"><?php echo $value->SeasonName ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label" style="opacity: 0">other</label>
                        <div class="input-group">
                            <p>
                                <input type="checkbox" name="other_season" class="filled-in" id="other_season"/>
                                <label for="other_season">Other Season</label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">From date</label>
                            <div class="">
                                <input type="text" class="datePicker-hide datepicker form-control" id="bulk-alt-fromDate"  readonly="" name="bulk-alt-fromDate" placeholder="dd/mm/yyyy" value="" >
                                <div class="input-group">
                                    <input class="datepicker" id="alternate1" readonly=""  value="" >
                                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label">To date</label>
                        <div class="">
                            <input type="text"  class="datePicker-hide datepicker form-control" id="bulk-alt-toDate"  readonly="" name="bulk-alt-toDate" placeholder="dd/mm/yyyy" value="" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate2" readonly=""  value="" >
                                <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Days</label>
                        <div class=" form-group">
                            <div class="multi-select-mod">
                                <select id="bulk-alt-days" name="bulk-alt-days[]"  multiple="" class="form-control">
                                    <option selected="" value="Sun">Sunday</option>
                                    <option selected="" value="Mon">Monday</option>
                                    <option selected="" value="Tue">Tuesday</option>
                                    <option selected="" value="Wed">Wednesday</option>
                                    <option selected="" value="Thu">Thursday</option>
                                    <option selected="" value="Fri">Friday</option>
                                    <option selected="" value="Sat">Saturday</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <label for="" class="control-label">Closed out</label>
                        <div class="">
                            <div class="switch">
                                <label>
                                  Open
                                  <input type="checkbox"  id="bulk-alt-closedout" name="bulk-alt-closedout">
                                  <span class="lever"></span>
                                  Close
                                </label>
                            </div>
                        </div>
                    </div> -->
                <!-- </div>
                <div class="row"> -->
                    <div class="col-sm-6">
                        <label for="" class="control-label">Rooms</label>
                        <div class=" form-group">
                            <div class="multi-select-mod">
                                <select class="form-control"  multiple="" name="bulk-alt-room_id[]" id="bulk-alt-room_id" onchange="RoomSelectFun();">
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
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped center" id="roomTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Room Name</th>
                                    <th>Amount <small>(<?php echo hotel_currency_type($_REQUEST['hotel_id']) ?>)</small></th>
                                    <th>Allotement</th>
                                    <th>Cutt off</th>
                                </tr>
                            </thead>
                            <tbody class="blk-Rw-Update-tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="btn-toolbar pull-right">
                        <button id="bulk-allotement" type="button" class="btn btn-sm btn-default nBtn">Update</button>
                        <button type="button" class="btn btn-default nBtn nclose" data-dismiss="modal">X</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>


   <script type="text/javascript">
    $('#room_type').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
    $('#bulk-alt-season').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
    });
    $('#bulk-alt-days').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
    });
   
   // $( document ).ready(function() {
        $('#alternate1').attr('disabled', 'disabled');
        $('#alternate2').attr('disabled', 'disabled');
    // });
    // $(function() {
        seasonchange();

        var nextDay = new Date($("#bulk-alt-fromDate").val()); 
        var contract_end = new Date($("#to_date").val());
        var contract_start = new Date($("#from_date").val());
        var tomorrow = new Date;
        tomorrow.setDate(contract_start.getDate() + 1);
        nextDay.setDate(nextDay.getDate() + 1);
            
        $("#bulk-alt-fromDate").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: contract_start,
            maxDate: contract_end,
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                var nextDay = new Date(dateText); 
                nextDay.setDate(nextDay.getDate());
                $("#bulk-alt-toDate").datepicker('option', 'minDate', nextDay);
            }
        });
        $("#bulk-alt-toDate").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: tomorrow,
            maxDate: contract_end,
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $("#bulk-alt-fromDate").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#bulk-alt-toDate").trigger('focus');
        });
        $('#bulk-alt-room_id').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
        
        $(".home").click(function() {
            document.location.reload(true);
        });
        $("#other_season").click(function() {
            if($('#other_season').is(':checked')){
                $('#alternate1').removeAttr('disabled');
                $('#alternate2').removeAttr('disabled');
                $('#bulk-alt-season').multiselect('disable');
            }   
            else {
                $('#alternate1').attr('disabled', 'disabled');
                $('#alternate2').attr('disabled', 'disabled');
                $('#bulk-alt-season').multiselect('enable');
            }
        });
        
    // });
    function seasonchange() {
        $.ajax({
              dataType: 'json',
              type: "Post",
              url: base_url+'/backend/hotels/SeasonDateCheck',
              data: $('#bulk-update-form').serialize(),
              success: function(data) {
                var from_date = data[0].FromDate;
                var res = from_date.split("-");
                var setfromdate = res[2]+'/'+res[1]+'/'+res[0];
                $('#alternate1').val(setfromdate);
                $("#bulk-alt-fromDate").val(setfromdate);
                
                $("#bulk-alt-fromDate").dateFormat("yy-mm-dd");
                $("#bulk-alt-toDate").dateFormat("yy-mm-dd");
                
                var to_date = data[0].ToDate;
                var res1 = to_date.split("-");
                var settodate = res1[2]+'/'+res1[1]+'/'+res1[0]
                $('#alternate2').val(settodate);
                $("#bulk-alt-toDate").val(settodate);
              }
          });
    }
</script>
