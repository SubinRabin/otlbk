<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toast.script.js"></script> 
<script type="text/javascript">
            // When the document is ready
    $(document).ready(function () {
        $('#year').datepicker({
            minViewMode: 'years',
            autoclose: true,
             format: 'yyyy'
        });  
        // $('#month').datepicker({
        //     minViewMode: 'month',
        //     autoclose: true,
        //      format: 'mm'
        // }); 
        $('#year').change(function() {
           room_change_allotement();
        });
        // $('#month').change(function() {
        //    room_change_allotement();
        // });
    });
</script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Allotement</span>
                        <span class="pull-right "><a href="<?php echo base_url(); ?>backend/hotels/contract_menu" class="btn-sm btn-primary">Back</a></span>
                    </div>
                </div>
                <form method="get" id="allotement_filter" action="<?php echo base_url(); ?>backend/hotels/allotement">
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year" id="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Month</label>
                        <select name="month"  id="month" onchange="room_change_allotement();">
                            <?php for ($i=01; $i <=12 ; $i++) { 
                                if(isset($_REQUEST['month']) && $i==$_REQUEST['month']) {
                                    ?>
                                    <option selected="" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } else if($i==date('m')) { ?>
                                <option selected="" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Hotel</label>
                        <select id="id" name="id" onchange="room_change_allotement();" >
                            <?php foreach ($hotels as $key => $value) { 
                                if ($value->hotel_id==$_REQUEST['id']) { ?>
                                <option selected="" value="<?php echo $value->hotel_id ?>"><?php echo $value->hotel_name ?></option>
                            <?php  } else { ?>
                                <option value="<?php echo $value->hotel_id ?>"><?php echo $value->hotel_name ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Contract</label>
                        <select id="con_id" name="con_id" onchange="room_change_allotement();" >
                            <?php foreach ($contract as $key => $value) { 
                                if ($value->contract_id==$_REQUEST['con_id']) { ?>
                                <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                            <?php  } else { ?>
                                <option value="<?php echo $value->contract_id ?>"><?php echo $value->contract_id ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Room</label>
                        <select id="room_id" name="room_id" onchange="room_change_allotement();" >
                            <?php foreach ($rooms as $key => $value) { 
                                if ($value->id==$_REQUEST['room_id']) { ?>
                                <option selected="" value="<?php echo $value->id ?>"><?php echo $value->room_name ?></option>
                            <?php  } else { ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->room_name ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulk-update" value="Bulk Update" data-toggle="modal" data-target="#bulk-update-modal">
                    </div>
                </div>
                </form>
                <div class="col-md-12">
                    <div><?php echo $calendar; ?></div>
                </div>
            </div>
        </div>
<?php 
    foreach ($contract as $key1 => $value1) {
        if ($value1->contract_id==$_REQUEST['con_id']) {
           $designation = $value1->designation;
        }
    }
 ?>

        <!-- Edit Calendar Modal -->
        <div id="calModal" class="modal fade-scale" role="dialog">
          <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">
                    <input id="calMap" type="hidden">
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Amount</label>
                        <div class="col-sm-8">
                            <input id="calEditAmt" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="calEditBal" type="text" class="form-control" <?php echo $designation!='Main' ? 'Readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Alloted</label>
                        <div class="col-sm-8">
                            <input id="calEditAlot" type="text" class="form-control" <?php echo $designation!='Main' ? 'Readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <button id="calUpdateBtn" type="button" class="btn btn-sm btn-default nBtn">Update</button>
                        <button type="button" class="btn btn-default nBtn nclose" data-dismiss="modal">X</button>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>


         <!-- Bulk update Calendar Modal -->
        <div id="bulk-update-modal" class="modal fade-scale" role="dialog">
          <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <form id="bulk-update-form" method="post">
                    <input type="hidden" id="tot-rooms" value="<?php echo $rooms[0]->total_rooms ?>">
                    <input type="hidden" name="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                    <input type="hidden" name="month" value="<?php echo isset($_REQUEST['month']) ? $_REQUEST['month'] : date('m') ?>">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
                <div class="row">
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">From date</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-fromDate" name="bulk-alt-fromDate" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">To date</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-toDate" name="bulk-alt-toDate" type="date" class="form-control" value="<?php echo date('Y-m-d' , strtotime("+2 days")) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Rooms</label>
                        <div class="col-sm-8">
                            <div class="multi-select-mod">
                                    <select id="bulk-alt-room_id" name="bulk-alt-room_id[]"  multiple="">
                                        <option disabled="" value="">--select--</option>>
                                <?php foreach ($rooms as $key => $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->room_name ?></option>
                                <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Amount</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-amount" name="bulk-alt-amount" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-cut-off" name="bulk-alt-cut-off" type="number" class="form-control" <?php echo $designation!='Main' ? 'Readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Alloted</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-allotment" name="bulk-alt-allotment" type="number" class="form-control" <?php echo $designation!='Main' ? 'Readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Closed out</label>
                        <div class="col-sm-8">
                            <p>
                              <input type="checkbox" class="filled-in" id="bulk-alt-closedout" name="bulk-alt-closedout" <?php echo $designation!='Main' ? 'disabled' : '' ?>/>
                              <label for="bulk-alt-closedout">close</label>
                            </p>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <button id="bulk-alt-UpdateBtn" type="button" class="btn btn-sm btn-default nBtn">Update</button>
                        <button type="button" class="btn btn-default nBtn nclose" data-dismiss="modal">X</button>
                    </div>
                </div>
                </form>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(document).on('click', '.editCal', function(event) {
            event.preventDefault();
            var cureData = $(this).closest('li');
            $('#calMap') .val(cureData.attr('id'));
            // alert(cureData.find('.cal-amt').children('span').text());
            $('#calEditAmt').val(cureData.find('.cal-amt').children('span').text());
            $('#calEditBal').val(cureData.find('.cal-bal').children('span').text());
            $('#calEditAlot').val(cureData.find('.cal-alot').children('span').text());
            $('#calEditBkd').val(cureData.find('.cal-bkd').children('span').text());
        });
        $(document).on('click', '#calUpdateBtn', function(event) {
            event.preventDefault();
            var targetId = $('#calMap') .val();
            var target = $('#' + targetId);
            target.find('.cal-amt').children('span').text($('#calEditAmt').val());
            target.find('.cal-bal').children('span').text($('#calEditBal').val());
            target.find('.cal-alot').children('span').text($('#calEditAlot').val());
            target.find('.cal-bkd').children('span').text($('#calEditBkd').val());
            target.find('.cal-bkd').children('span').text($('#calEditBkd').val());
            $(".alt-price-"+targetId).val($('#calEditAmt').val());
            $(".alt-roomalt-"+targetId).val($('#calEditAlot').val());
            $(".alt-cut-off-"+targetId).val($('#calEditBal').val());
            $('.nclose').trigger('click');
            allotement_update();
        });
        $("#bulk-alt-UpdateBtn").click(function() {
            var rooms = $("#bulk-alt-room_id").val();
            var amount = $("#bulk-alt-amount").val();
            var total_rooms = $("#tot-rooms").val();
            var allotement = $("#bulk-alt-allotment").val();
            var Cut_off = $("#bulk-alt-cut-off").val();
            if(rooms=="") {
                addToast('Must select an room!','orange');
                $("#bulk-alt-room_id").focus();
            } else if (amount=="") {
                addToast('Amount field is required!','orange');
                $("#bulk-alt-amount").focus();
            } else if (30<Cut_off) {
                addToast('Max Cut off is 30','orange');
                $("#bulk-alt-cut-off").focus();
            } else if (total_rooms<allotement) {
                addToast('Max allotement is '+total_rooms,'orange');
                $("#bulk-alt-allotment").focus();
            } else {
                $("#bulk-update-form").attr('action',base_url+'backend/hotels/allotementBlkupdate');
                $("#bulk-update-form").submit();
            }
        })
    });
</script>


<?php init_tail(); ?>
