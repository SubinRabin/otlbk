<style type="text/css">
    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        position: relative;
        opacity: 52;
        left: 0px;
    }
    [type="number"] {
        margin-bottom: 5px;
    }
</style>
<div class="modal-dialog" style="width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-body">
                <form id="DW-bulk-update-form" action="<?php echo base_url() ?>backend/hotels/MultipleDateBulkUpdate" method="post">
                    
                    <input type="hidden" name="room_id"  id="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="hotel_id"  id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" id="bulk_alt_contract_id" value="<?php echo $_REQUEST['contract_id'] ?>">
                    <input type="hidden" class="contract_type" value="<?php echo $type[0]->contract_type ?>">
                    <?php 
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td width="20px">sl.no</td>
                                        <td width="150px">From date</td>
                                        <td width="150px">To date</td>
                                        <td width="180px">Season</td>
                                        <td>Room</td>
                                        <td width="150px">Amount</td>
                                        <td width="80px">Alt</td>
                                        <td width="80px">cut off</td>
                                        <td width="120px">Action</td>
                                    </tr>
                                </thead>
                                <tbody class="dw-tbody">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" class="FromDate" name="FromDate[00]" required="" readonly="" class="form-control">
                                            <p>
                                              <label>
                                                <input type="checkbox" class="select-All-Check" name="checkboxAll[00]" />
                                                <span>Select All Rooms</span>
                                              </label>
                                            </p>
                                        </td>
                                        <td>
                                            <input type="text" required class="ToDate" name="ToDate[00]" readonly="" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" required class="SeasonName" name="SeasonName[00]" class="form-control">
                            
                                        </td>
                                        <td>
                                            
                                            <?php foreach ($room_types as $key => $value) { 
                                                 ?>
                                             <p>
                                              <label>
                                                <input type="checkbox" name="roomName[00][<?php echo $value->id ?>]" value="<?php echo $value->id ?>" />
                                                <span><?php echo $value->Room_Type; ?>  <?php echo $value->room_name; ?></span>
                                              </label>
                                            </p>
                                            <?php } ?>
                                        <input type="hidden" name="bulk-alt-room_id[00]" class="bulk-alt-room_id">
                                        </td>
                                        <td>
                                            <?php foreach ($room_types as $key => $value) { 
                                                 ?>
                                                <input type="number" class="Amount" name="Amount[00][<?php echo $value->id ?>]" >
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php foreach ($room_types as $key => $value) { 
                                                 ?>
                                                <input type="number" class="allotment" name="allotment[00][<?php echo $value->id ?>]"  <?php echo $type[0]->contract_type=="Sub" ? 'Readonly' : '' ?>>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php foreach ($room_types as $key => $value) { 
                                                 ?>
                                                <input type="number" class="cutoff" name="cutoff[00][<?php echo $value->id ?>]"  <?php echo $type[0]->contract_type=="Sub" ? 'Readonly' : '' ?>>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="copyClick"><i class="fa fa-copy"></i></button>
                                            <button type="button" class="addClick"><i class="fa fa-plus-square"></i></button>
                                            <button type="button" class="removeClick"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <button id="DW-bulk-allotement" type="button" class="btn btn-sm btn-default nBtn">Update</button>
                        <button type="button" class="btn btn-default nBtn nclose" data-dismiss="modal">X</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>


   <script type="text/javascript">
    $('.room_type').multiselect({
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
   
    // $(function() {
        seasonchange();

        var nextDay = new Date($("#bulk-alt-fromDate").val()); 
        var contract_end = new Date($("#to_date").val());
        var contract_start = new Date($("#from_date").val());
        var tomorrow = new Date;
        tomorrow.setDate(contract_start.getDate() + 1);
        nextDay.setDate(nextDay.getDate() + 1);
         

        $(".FromDate").datepicker({
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: contract_start,
            maxDate: contract_end,
            changeYear : true,
            changeMonth : true,
        });
        $(".ToDate").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: contract_start,
            maxDate: contract_end,
            changeYear : true,
            changeMonth : true,
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
