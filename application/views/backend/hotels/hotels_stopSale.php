<?php init_head(); 
$StopSale = menuPermissionAvailability($this->session->userdata('id'),'Hotels','S/O Sales & Availability'); 
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/summernote.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css">

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->

<style type="text/css">
  .trumbowyg-fullscreen-button {
    /*display: none ! important;*/
  }
  .multi-select-mod .btn-group, .multi-select-mod button, .multi-select-mod .dropdown-menu {
    top: -13px;
  }
  .multi-select-trans .select-wrapper input.select-dropdown, .dropdown-content.select-dropdown.multiple-select-dropdown{
    display: none !important;
  }

  .multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
    border-color: transparent !important;
    transform: translateY(-8px) !important;
    padding: 0 !important;
    overflow: hidden !important;
  }
  .multi-select-trans .form-control {
    padding: 6px 0 !important;
  }
</style>
<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-2">
        <div class="inn-title">
            <span>Stop sale 
            </span>
        </div>
        </br>
        
        <div class="bor mar_top_0 ">
            <div class="row">
                <form method="get" id="allotement_filter" action="<?php echo base_url(); ?>backend/hotels/hotels_stopSale">

                    <div class="col-md-12"> 
                        <div class="form-group col-md-2">
                           <label>Select Hotel</label><span>*</span>
                            <select name="hotel_id" id="hotel_stopSale" onchange="hotel_select()">
                                <?php $count=count($view);
                                for ($i=0; $i <$count ; $i++) { 
                                    if (isset($_REQUEST['hotel_id']) && $_REQUEST['hotel_id']==$view[$i]->hotel_id) {
                                    ?>
                                    <option selected="" value="<?php echo $view[$i]->hotel_id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $view[$i]->hotel_id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Year</label>
                            <input type="text" class="form-control" name="year" id="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Month</label>
                            <select name="month"  id="month" onchange="room_change()">
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
                            <label>Contract</label>
                            <select id="con_id" name="con_id" onchange="room_change();" >
                                <?php foreach ($contract as $key => $value) { 
                                    $contract_exp=$value->contract_id."-".$value->board;
                                    if ($value->contract_id==$_REQUEST['con_id']) { ?>
                                    <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                <?php  } else { ?>
                                    <option value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Room</label>
                            <select id="room_id" name="room_id" onchange="room_change();" >
                                <?php foreach ($rooms as $key => $value) { 
                                    if ($value->id==$_REQUEST['room_id']) { ?>
                                    <option selected="" value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                <?php  } else { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <?php if ($StopSale[0]->edit!=0) { ?>
                            <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulk-update" value="Bulk Update" data-toggle="modal" data-target="#bulk-update-modal">
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <!-- <?php print_r($view[0]->contract_id); ?> -->
                <?php 
                if(isset($_REQUEST['hotel_id']) && isset($_REQUEST['room_id'])){ ?>
                    <div class="row">
                    <div class="col-md-12">
                        <div class=""><?php 
                        echo $calendar;
                        ?>  </div>
                    </div>
                </div>
                <?php
                }
                ?>
                
            </div>
        </div>
        <!-- <div class="row">
		    <div class="col-md-12">
		        <div class="box-inn-sp">
		            <div class="tab-inn">
		                <div class="table-responsive table-desi">
		                    <table class="table table-condensed table-hover" id="stopSale_table">
		                        <thead>
		                            <tr>
		                                <th>#</th>
		                                <th>From date</th>
		                                <th>To date</th>
                                        <th>Contracts</th>
                                        <th>Room Types</th>
		                                <th width="12%">Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
        </div> -->
    </div>
 </div>
</div>
<div id="stopSale_modal" class="modal-bg-fix modal fade" role="dialog" style="max-height: 78%;">
 
</div>
</div>

<?php 
    foreach ($contract as $key1 => $value1) {
        if ($value1->contract_id==$_REQUEST['con_id']) {
           $designation = $value1->contract_type;
        }
    }
 ?>

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
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="calEditBal" <?php echo $designation=="Sub" ? 'disabled' : '' ?> name="calEditBal" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Allotment</label>
                        <div class="col-sm-8">
                            <input id="calEditAlot" <?php echo $designation=="Sub" ? 'disabled' : '' ?> name="calEditAlot" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Closed out</label>
                        <div class="col-sm-8">
                            <p>
                              <input type="checkbox" name="calEditclosedout" class="filled-in" id="calEditclosedout"/>
                              <label for="calEditclosedout">close</label>
                            </p>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <?php if ($StopSale[0]->edit!=0) { ?>
                        <button id="calUpdateBtn"  type="button" class="btn btn-sm btn-default nBtn">Update</button>
                        <?php } ?>
                        <button type="button" class="btn btn-default nBtn nclose" data-dismiss="modal">X</button>
                    </div>
                </div>
                </form>
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
                    <input type="hidden" id="tot-rooms" value="<?php echo $hotels[0]->Number_of_room ?>">
                    <input type="hidden" name="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                    <input type="hidden" name="month" value="<?php echo isset($_REQUEST['month']) ? $_REQUEST['month'] : date('m') ?>">
                    <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
                <div class="row">
<!--  -->   
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">From date</label>
                        <div class="col-sm-8">
                            <input type="text" class="datePicker-hide datepicker" id="bulk-alt-fromDate" name="bulk-alt-fromDate" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate1" value="<?php echo date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">To date</label>
                        <div class="col-sm-8">
                            <input type="text" class="datePicker-hide datepicker" id="bulk-alt-toDate" name="bulk-alt-toDate" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d' , strtotime("+2 days")) ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate2" value="<?php echo date('d/m/Y' , strtotime("+2 days")) ?>" >
                                <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Contract</label>
                        <div class="col-sm-8 form-group" style="height: 30px">
                            <div class="multi-select-mod multi-select-trans">
                                <select id="bulk-alt-con-id" name="bulk-alt-con-id[]"  multiple="" class="form-control">
                                    <?php foreach ($contract as $key => $value) { 
                                        $contract_exp=$value->contract_id."-".$value->board;
                                        if ($value->contract_id==$_REQUEST['con_id']) { ?>
                                        <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                    <?php  } else { ?>
                                        <option value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Rooms</label>
                        <div class="col-sm-8 form-group" style="height: 30px">
                            <div class="multi-select-mod multi-select-trans">
                                <select id="bulk-alt-room_id" name="bulk-alt-room_id[]"  multiple="" class="form-control">
                                    <?php foreach ($rooms as $key => $value) { ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-cut-off" name="bulk-alt-cut-off" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Allotment</label>
                        <div class="col-sm-8">
                            <input id="bulk-alt-allotment" name="bulk-alt-allotment" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Closed out</label>
                        <div class="col-sm-8">                      
                        <script type="text/javascript">
                            $( window ).load(function() {
                                $('.c-open').change(function(){
                                    if($(this).prop('checked') === true) {
                                        $('.c-closed').prop('checked',false)
                                    }
                                })
                                $('.c-closed').change(function(){
                                    if($(this).prop('checked') === true) {
                                        $('.c-open').prop('checked',false)
                                    }
                                })
                            })
                        </script>
                        <p class="custom-checkbox">
                          <input type="checkbox" name="Open" class="filled-in c-open" id="Open"/>
                          <label for="Open">Open</label>
                          <input type="checkbox" name="Close" class="filled-in c-closed" id="Close"/>
                          <label for="Close">close</label>
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
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/summernote.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
    // $(document).ready(function() {
        $('#imp_remarks').trumbowyg();
        $('#cancel_policy').trumbowyg();
        $('#imp_notes').trumbowyg();

        $('#year').datepicker({
            minViewMode: 'years',
            autoclose: true,
             format: 'yyyy',
             orientation: "bottom",
        });  
        $('#year').change(function() {
           room_change();
        });
        $('#year').click(function() {
            $('.datepicker-years').css('display','block');
        });
    // });
</script>
<script type="text/javascript">
// $(document).ready(function() {
    var sText = $("#hotel_stopSale").find("option:selected").text();
    var sValue = hotel_stopSale.value;
    $('#hotel_id').val(sValue);
     var contract_table = $('#stopSale_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/hotels/hotels_stopSale_list?id='+sValue,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
 });
var nextDay = new Date($("#bulk-alt-fromDate").val());
nextDay.setDate(nextDay.getDate() + 1);

$("#bulk-alt-fromDate").datepicker({
    altField: "#alternate1",
    dateFormat: "yy-mm-dd",
    altFormat: "dd/mm/yy",
    minDate: new Date(<?php date('d/m/Y') ?>),
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
    minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
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
$('#bulk-alt-con-id').multiselect({
    includeSelectAllOption: true,
    selectAllValue: 0
});
    $('.editCal').click(function(event) {
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
    $('#calUpdateBtn').click(function(event) {
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
            allot_update();
        });
            $("#bulk-alt-UpdateBtn").click(function() {
            var fromDate = $("#bulk-alt-fromDate").val();
            var toDate = $("#bulk-alt-toDate").val();
            var contract = $("#bulk-alt-con-id").val();
            var rooms = $("#bulk-alt-room_id").val();
            


            var total_rooms = $("#tot-rooms").val();
            var allotement = $("#bulk-alt-allotment").val();
            var Cut_off = $("#bulk-alt-cut-off").val();
            var allrooms = [];
            var s = document.getElementById("bulk-alt-room_id");
            for (var i = 0; i < s.options.length; i++) {
                if (s.options[i].selected == true) {
                    var room_select = s.options[i].value;
                    allrooms.push(room_select);
                }
            }
            var contract_select = [];
            var t = document.getElementById("bulk-alt-con-id");
            for (var i = 0; i < t.options.length; i++) {
                if (t.options[i].selected == true) {
                    var contract = t.options[i].value;
                    contract_select.push(contract);
                }
            }

            if (fromDate=="") {
                addToast('From date field is required!','orange');
                $("#bulk-alt-fromDate").focus();
            } else if(toDate=="") {
                addToast('To date field is required!','orange');
                $("#bulk-alt-toDate").focus();
            } else if(contract=="" || contract==null) {
                addToast('Contract field is required!','orange');
                $("#bulk-alt-con-id").focus();
            } else if(rooms=="" || rooms==null) {
                addToast('Rooms field is required!','orange');
                $("#bulk-alt-room_id").focus();
            } else {
                $("#bulk-update-form").attr('action',base_url+'backend/hotels/allotBlkupdate');
                $("#bulk-update-form").submit();
            }
           
        })
// });
</script>
<?php init_tail(); ?>

