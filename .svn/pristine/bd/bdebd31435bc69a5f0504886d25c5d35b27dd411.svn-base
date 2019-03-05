<?php init_hotel_login_header(); 
$menu = hotel_menu_permission();
$contractmenu=Con_menu_permission($_REQUEST['con_id']);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<style type="text/css">
    .prev {
        background: none ! important;
    }
    .mar_top_23 {
        margin-top: 23px;
    }
</style>
<?php 
    foreach ($contract as $key1 => $value1) {
        if ($value1->contract_id==$_REQUEST['con_id']) {
           $designation = $value1->contract_type;
        }
       
    }
 ?>
 <div class="sb2-2-add-blog sb2-2-1 hotel-view-readonly form-group">
 <h2>Allotment Details <span class="pull-right"><a href="<?php echo base_url(); ?>dashboard/hotel_room_contracts"  class="btn-sm btn-primary">Back</a></span></h2>
            <input type="hidden" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
            </br>
        <div class="row">
            <form method="get" id="allotement_filter" action="<?php echo base_url(); ?>dashboard/contractProcess">
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <label>Contract</label>
                        <select id="con_id" class="form-control" name="con_id" onchange="room_change();" >

                            <?php foreach ($contract as $key => $value) { 
                                $contract_exp= $value->contract_id."-".$value->board;
                                if ($value->contract_id==$_REQUEST['con_id']) { ?>
                                <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $contract_exp?></option>
                            <?php  } else { ?>
                                <option value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Room</label>
                        <select id="room_id" class="form-control" name="room_id" onchange="room_change();" >
                            <?php foreach ($rooms as $key => $value) { 
                                if ($value->id==$_REQUEST['room_id']) { ?>
                                <option selected="" value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?> </option>
                            <?php  } else { ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <?php if ($contractmenu[0]->sale_availability=="1"){ ?>
                        <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulk-update" value="Bulk Update" data-toggle="modal" data-target="#bulk-update-modal">
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php echo $calendar ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
            <!-- </div> -->
        <!-- </div> -->

        <!-- Edit Calendar Modal -->
        <div id="calModal" class="modal fade-scale" role="dialog">
          <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <form id="calEditForm" method="post">
                    <input type="hidden" name="calEdithotel_id" value="<?php echo $_REQUEST['hotel_id']?>">
                    <input type="hidden" name="calEditcontract_id" value="<?php echo $_REQUEST['con_id']?>">
                    <input type="hidden" name="calEditroom_id" value="<?php echo $_REQUEST['room_id']?>">
                <div class="row">
                    <input id="calMap" type="hidden" name="calDate">
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-5 m-t-5">Amount</label>
                        <div class="col-sm-7">
                            <?php if($contractmenu[0]->edit_rate==1) { ?>
                                <input id="calEditAmt" type="text" class="form-control" name="calEditAmt">
                            <?php } else { ?>
                                <input id="calEditAmt" type="text" class="form-control" name="calEditAmt" disabled="true">
                            <?php } ?>
                            <span class="alt-amount_err popup_err blink_me"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-5 m-t-5">Allocation</label>
                        <div class="col-sm-7">
                             <input id="calEditAlot" <?php echo $designation == "Sub" ? 'disabled' : '' ?> name="calEditAlot" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-5 m-t-5">Cut-off</label>
                        <div class="col-sm-7">
                            <input id="calEditBal" <?php echo $designation == "Sub" ? 'disabled' : '' ?> name="calEditBal" type="number" class="form-control">
                            <span class="bulk-alt-cut-off_err popup_err blink_me"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-5 m-t-5">Closed out</label>
                        <div class="col-sm-7">
                            <p class="mb-0 mt-5">
                              <input type="checkbox" name="calEditclosedout" class="squaredTwo" id="calEditclosedout" <?php echo $designation == "Sub" ? 'disabled' : '' ?>/>
                              <label for="calEditclosedout"></label>
                            </p>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <?php if ($contractmenu[0]->sale_availability=="1"){ ?>
                        <button id="calUpdateBtn" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp;Update</button>
                        <?php }  ?>
                        <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">X</button>
                    </div>
                </div>
                </form>
              </div>
            </div>

          </div>
        </div>

<!-- Bulk update Calendar Modal -->
        <div id="bulk-update-modal" class="modal fade-scale" role="dialog">
          <div class="modal-dialog transformx50" style="margin: 30px 0">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <form id="bulk-update-form" method="post">
                    <input type="hidden" id="tot-rooms" value="<?php echo $rooms[0]->total_rooms ?>">
                    <input type="hidden" name="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                    <input type="hidden" name="month" value="<?php echo isset($_REQUEST['month']) ? $_REQUEST['month'] : date('m') ?>">
                    <!-- <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>"> -->
                    <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
                    <input type="hidden" name="edit_permission" value="<?php echo $edit_permission[0]->edit_rate ?>">
                <div class="row">
                    
                     <?php $date = date('Y-m-d', strtotime("+1 day", strtotime(date('m/d/Y'))));
                        $date1 = date('d/m/Y', strtotime("+1 day", strtotime(date('m/d/Y'))));
                        ?>
                    <div class="form-group row">
                        <!-- <label for="" class="control-label col-sm-4 m-t-5">From date</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-fromDate" name="bulk-alt-fromDate" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div> -->
                        <label for="" class="control-label col-sm-4 m-t-5">From Date</label>
                        <div class="col-sm-8">
                        <input type="text" style="width: 100% ! important;opacity: 0" class="mySelectCalendar" id="bulk-alt-fromDate" name="bulk-alt-fromDate" placeholder="mm/dd/yyyy" value="<?php echo date('Y-m-d') ?>" />
                        <div class="input-group" style="transform: translateY(-27px);">
                        <input type="text"  name="" readonly="" class="form-control" id="alternate3" value="<?php echo date('d/m/Y') ?>">
                        <label for="bulk-alt-fromDate" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div></div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="" class="control-label col-sm-4 m-t-5">To date</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-toDate" name="bulk-alt-toDate" type="date" class="form-control" value="<?php echo date('Y-m-d' , strtotime("+2 days")) ?>">
                        </div> -->
                        <label for="" class="control-label col-sm-4 m-t-5">To Date</label>
                        <div class="col-sm-8">
                        <input type="text" style="width: 0px ! important;opacity: 0" class=" mySelectCalendar" id="bulk-alt-toDate" name="bulk-alt-toDate" placeholder="mm/dd/yyyy" value="<?php echo $date ; ?>" />
                        <div class="input-group"  style="transform: translateY(-27px);">
                        <input type="text" name="" readonly="" class="form-control" id="alternate2" value="<?php echo $date1; ?>">
                        <label for="bulk-alt-toDate" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Rooms</label>
                        <div class="col-sm-8">
                            <div class="multi-select-mod">
                                    <select id="bulk-alt-room_id" class="multi-select2 form-control" name="bulk-alt-room_id[]"  multiple="">
                                <?php foreach ($rooms as $key => $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                <?php }  ?>
                                </select>
                                <span class="bulk-alt-room_id_err popup_err blink_me"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Amount</label>
                        <div class="col-sm-8">
                            <?php if($contractmenu[0]->edit_rate==1) { ?>
                                <input id="bulk-alt-amount" name="bulk-alt-amount" type="number" class="form-control">
                            <?php } else { ?>
                                <input id="bulk-alt-amount" name="bulk-alt-amount" type="number" class="form-control" disabled="true">
                            <?php } ?>
                            <span class="bulk-alt-amount_err popup_err blink_me"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Allotment</label>
                        <div class="col-sm-8">
                             <input id="bulk-alt-allotment" <?php echo $designation == "Sub" ? 'disabled' : '' ?> name="bulk-alt-allotment" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-cut-off" <?php echo $designation == "Sub" ? 'disabled' : '' ?> name="bulk-alt-cut-off" type="number" class="form-control">
                            <span class="bulk-alt-cut-off_err popup_err blink_me"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Closed out</label>
                        <div class="col-sm-8">
                            <p class="mt-5 mb-0">
                              <input type="checkbox" class="squaredTwo" id="bulk-alt-closedout" name="bulk-alt-closedout"  >
                              <label for="bulk-alt-closedout"></label>
                            </p>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <button id="bulk-alt-UpdateBtn" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp;Update</button>
                        <button type="button" class="btn btn-inverse btn-sm" data-dismiss="modal">x</button>
                    </div>
                </div>
                </form>
              </div>
            </div>
            </div>
        </div>
<!-- Cancellation Modal -->
<div id="canModal" class="modal fade-scale" role="dialog">
</div>


<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toast.script.js"></script> 
<script>
    $(function() {
        // $("#bulk-alt-room_id").selectpicker();
        $(document).on('click', '.editCal', function(event) {
            event.preventDefault();
            var targetLi = $(this).closest('li');
            $('#calMap') .val(targetLi.attr('id'));
            $('#calEditAmt').val(targetLi.find('.cal-amt').children('span').text());
             $('#calEditBal').val(targetLi.find('.cal-bal').children('span').text());
             $('#calEditAlot').val(targetLi.find('.cal-alot-real').children('span').text());

            $('#calEditBkd').val(targetLi.find('.cal-bkd').children('span').text());
            if (targetLi.find('img').length > 0==true) {
                $("#calEditclosedout").prop('checked', 'checked');
            } else {
                $("#calEditclosedout").prop('checked', 'checked');
                $("#calEditclosedout").trigger("click");
 
            }
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
            if ($('#calEditAmt').val()==0) {
                $(".alt-amount_err").text("Amount must greater than 0");
                $("#calEditAmt").focus();
            } else {
                $('.nclose').trigger('click');
                allotement_update();
            }
        });
        $("#bulk-alt-UpdateBtn").click(function() {
            var rooms  = $("#bulk-alt-room_id").val();
            var From   = $("#bulk-alt-fromDate").val();
            var to     = $("#bulk-alt-toDate").val();
            var Amount = $("#bulk-alt-amount").val();
            if (From=="") {
                $(".bulk-alt-fromDate_err").text("From date is required!");
            } else if(to=="") {
                $(".bulk-alt-toDate_err").text("To date is required!");  
                $(".bulk-alt-fromDate_err").text("");
            } else if(rooms==null) {
                $(".bulk-alt-toDate_err").text("");  
                $(".bulk-alt-room_id_err").text("Must select a room!");
            } else if(Amount!="" && Amount==0) {
                $(".bulk-alt-room_id_err").text("");
                $(".bulk-alt-amount_err").text("Amount must greater than 0");
            }else {
                $(".bulk-alt-room_id_err").text("");
                $(".bulk-alt-fromDate_err").text("");
                $(".bulk-alt-toDate_err").text("");  
                $(".bulk-alt-amount_err").text("");
                $("#bulk-update-form").attr('action',base_url+'dashboard/allotementBlkupdate');
                $("#bulk-update-form").submit();
            }
        });
    });
     var tpj=jQuery;
    $( document ).ready(function() {
            var nextDay = new Date(tpj("#bulk-alt-toDate").val());
                nextDay.setDate(nextDay.getDate() + 1);
                tpj("#bulk-alt-toDate").datepicker({
                minDate: +1,
                altField: "#alternate2",
                altFormat: "dd/mm/yy",
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
               
                }
            });
            tpj("#bulk-alt-fromDate").datepicker({
                minDate: 0,
                altField: "#alternate3",
                altFormat: "dd/mm/yy",
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    var nextDay = new Date(dateText);
                    nextDay.setDate(nextDay.getDate() + 1);
                    tpj("#bulk-alt-toDate").datepicker('option', 'minDate', nextDay);
                    setTimeout(function(){
                    tpj( "#bulk-alt-toDate" ).datepicker('show');
                    },16);
                }
            });
            tpj("#alternate2").click(function() {
            tpj( "#bulk-alt-toDate" ).trigger('focus');
            });
            tpj("#alternate3").click(function() {
            tpj( "#bulk-alt-fromDate" ).trigger('focus');
            });
 });
</script>
 <script type="text/javascript" src="<?php echo base_url(); ?>skin/js/search.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> -->
<?php init_hotel_login_footer(); ?>

