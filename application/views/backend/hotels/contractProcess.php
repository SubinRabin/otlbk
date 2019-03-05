<?php init_head(); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/summernote.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css">

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->

<style type="text/css">
  .trumbowyg-fullscreen-button {
    /*display: none ! important;*/
  }
  .blk-mod .btn-group, .blk-mod button, .blk-mod .dropdown-menu {
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
  .multi-select-trans1 .form-control {
    padding: 0px 0 !important;
  }
  .input-hide input {
    display: none ! important;
  }
  .input-hide li {
    display: none ! important;
  }
 .custom-select-option{
    font-size: 10px;
  }
  .multi-select-mod-closed [type="checkbox"]:not(:checked),.multi-select-mod-closed [type="checkbox"]:checked {
    opacity: 0 ! important;
  }
 .custom-dd-style {
        transform: translateY(10px);
        position: absolute;
        background: #fff;
        box-shadow: 0 2px 1px 0 #ccc;
        padding: 10px;
        z-index: 1;
        display: none;
 }
</style>

<div class="sb2-2">
    <?php $contractmenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Contract'); ?>
        <div class="sb2-2-add-blog sb2-2-1 hotel-view-readonly">
            <h2>Contract Details <small>(currency : <?php echo hotel_currency_type($_REQUEST['hotel_id']) ?>)</small>
                <span class="pull-right"> 
                    <a href="<?php echo base_url(); ?>backend/hotels/contract_menu"  class="btn-sm btn-primary">Back</a>
                </span>
                <?php if($contractmenu[0]->edit!=0) { ?>
                <span class="pull-right"  style="margin-right: 5px;"> 
                        <div class="btn-sm btn-primary" id="menu_per" style="transform: translateY(9px);width: 203px;text-align: center;cursor:pointer;">Menu Permission
                        </div>
                        <div id="custom-select-option-box" class="btn-sm custom-dd-style">
                            <div class="custom-select-option">
                                    <input type="checkbox" class="filled-in" name="checksales"  id="checksales" <?php echo isset($view[0]->sale_availability) && $view[0]->sale_availability=="1" ? "checked" : "" ?>  value="" />
                                    <label for="checksales">S/O Sales Availability</label>
                            </div>
                            <div class="custom-select-option">
                                    <input type="checkbox" class="filled-in" name="checkrate"  id="checkrate" <?php echo isset($view[0]->edit_rate) && $view[0]->edit_rate=="1" ? "checked" : "" ?>  value="" />
                                    <label for="checkrate">Edit rate</label>
                            </div>
                        </div>
                </span>
            <?php } ?>
            </h2>
            <input type="hidden" id="contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
            <input type="hidden" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">

            </br>
            <ul class="nav nav-tabs tab-list">
                <li class="home active"><a data-toggle="tab" href="#home"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Rates/Avail</span></a>
                </li>
                <li class="menu1"><a data-toggle="tab" href="#menu1"><i class="fa fa-cutlery" aria-hidden="true"></i> <span>Board Supplements</span></a>
                </li>
                <li class="menu2"><a data-toggle="tab" href="#menu2"><i class="fa fa-users" aria-hidden="true"></i> <span>General Supplements</span></a>
                <li class="menu3"><a data-toggle="tab" href="#menu3"><i class="fa fa-bed" aria-hidden="true"></i> <span>Extrabed</span></a>
                </li>
                <li class="menu4"><a data-toggle="tab" href="#menu4"><i class="fa fa-ban" aria-hidden="true"></i> <span>Cancellation Policy</span></a></li>
                <li class="menu5"><a data-toggle="tab" href="#menu5"><i class="fa fa-hourglass-end" aria-hidden="true"></i> <span>Minimum stay</span></a></li>
                <li class="menu6"><a data-toggle="tab" href="#menu6"><i class="fa fa-times-circle-o" aria-hidden="true"></i> <span>Close Out Period</span></a></li>
                <li class="menu7"><a data-toggle="tab" href="#menu7"><i class="fa fa-book" aria-hidden="true"></i> <span>Policies</span></a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade active in">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <?php 
                            foreach ($contract as $key1 => $value1) {
                                // exit();
                                if ($value1->contract_id==$_REQUEST['con_id']) {
                                    $startYear = date('Y' ,strtotime($value1->from_date));
                                    $endYear = date('Y' ,strtotime($value1->to_date));
                                    $designation = $value1->contract_type;

                                    if (date('Y-m-d') > $value1->from_date) {
                                        $sdate = date('Y-m-d');
                                    } else {
                                        $sdate = $value1->from_date;
                                    }
                                     ?>
                                    <input type="hidden" id="from_date" name="from_date" value="<?php echo $sdate ?>">
                                    <input type="hidden" id="to_date" name="to_date" value="<?php echo $value1->to_date ?>">
                                <?php }
                            }
                         ?>
                        <form method="get" id="allotement_filter" action="<?php echo base_url(); ?>backend/hotels/contractProcess">
                            <div class="col-md-12">
                                <div class="form-group col-md-2">
                                    <label>Year</label>
                                    <select name="year" id="year">
                                        <?php
                                            
                                        for ($i=$startYear; $i <=$endYear ; $i++) { 
                                            if (isset($_REQUEST['year']) && $_REQUEST['year']==$i) { ?>
                                                <option selected="" value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php   } else { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Month</label>
                                    <select name="month"  id="month" onchange="room_change_allotement();">
                                        <?php for ($i=1; $i <=12 ; $i++) { 
                                            if(isset($_REQUEST['month']) && $i==$_REQUEST['month']) {
                                                ?>
                                                <option selected="" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } else {
                                            if($i==date('m')) {?>
                                                <option selected="" value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                         <?php } else {
                                         ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } } } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Contract</label>
                                    <select id="con_id" name="con_id" onchange="room_change_allotement();" >
                                        <?php foreach ($contract as $key => $value) { 
                                            $contract_exp= $value->contract_id."-".$value->board;
                                            if ($value->contract_id==$_REQUEST['con_id']) { ?>
                                            <option selected="" value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                        <?php  } else { ?>
                                            <option value="<?php echo $value->contract_id ?>"><?php echo $contract_exp ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Room</label>
                                    <select id="room_id" name="room_id" onchange="room_change_allotement();" >
                                        <?php foreach ($rooms as $key => $value) { 
                                            if ($value->id==$_REQUEST['room_id']) { ?>
                                            <option selected="" value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                        <?php  } else { ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <?php if($contractmenu[0]->edit!=0) { ?>
                                        <div class="row">
                                            <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulk-update" value="Bulk Update" data-toggle="modal" data-target="#bulk-update-modal">
                                            <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulkUpdate" title="Room wise bulk update" value="RW update" data-toggle="modal" data-target="#childPolicy_modal">
                                            <?php if($allotment==0) { ?>
                                                 <input type="button" class="mar_top_23 btn-sm btn-primary" id="bulkUpdate1" title="Date wise bulk update" value="DW update" data-toggle="modal" data-target="#datewise_modal">

                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            </form>
                            <div class="col-md-12">
                                <div class><?php 
                                echo $calendar;
                                 ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($contractmenu[0]->create!=0) { ?>
                                 <span  id="BoardSupplement_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="BoardSupplement_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Board</th>
                                                <th>Room Type</th>
                                                <th>Season</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Start Age</th>
                                                <th>Final Age</th>
                                                <th>Amount</th>
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
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($contractmenu[0]->create!=0) { ?>
                                <span  id="GeneralSupplement_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="GeneralSupplement_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <!-- <th>Board</th> -->
                                                <th>Type</th>
                                                <th>Room Type</th>
                                                <th>Season</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Min Child Age</th>
                                                <th>Adult Amount</th>
                                                <th>Child Amount</th>
                                                <th>Application</th>
                                                <th>Mandatory</th>
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
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <span  id="childPolicy_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span> -->
                                <?php if($contractmenu[0]->create!=0) { ?>
                                    <span  id="extrabed_modal_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <!-- <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="childPolicy_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Age From</th>
                                                <th>Age To</th>
                                                <th>Room Type</th>
                                                <th>Discount of</th>
                                                <th>Board</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> -->
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="extrabed_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Room Type</th>
                                                <th>Season</th>
                                                <th>From date</th>
                                                <th>To date</th>
                                                <th>Child age from</th>
                                                <th>Child age to</th>
                                                <th>Child Amount</th>
                                                <th>Adult Amount</th>
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
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($contractmenu[0]->create!=0) { ?>
                                    <span  id="CancellationFee_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="CancelationFee_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Season</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Day From</th>
                                                <th>Day To</th>
                                                <th>Cancellation %</th>
                                                <th>Room Type</th>
                                                <th>Application</th>
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
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($contractmenu[0]->create!=0) { ?>
                                    <span  id="MinimumStay_button" class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="MinimumStay_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Season</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Days</th>
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
                </div>
                <div id="menu6" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($contractmenu[0]->create!=0) { ?>
                                    <span class="pull-right" style="margin-right: 5px;"><a id="closeOutModal" href="#" data-toggle="modal" data-target="#childPolicy_modal" class="btn-sm btn-success">Add</a></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="table-responsive table-desi">
                                    <table class="table table-condensed table-hover" id="hotel_closeout_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Closed date</th>
                                                <th>Reason</th>
                                                <th>Room Type</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <form id="contract-policy-form" method="post">
                                <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                                <input type="hidden" name="contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
                            <div class="form-group col-md-12 imp_remarks">
                                <label for="t5-n1">Important Remarks & Policies</label>
                                <textarea class="form-control" name="imp_remarks" id="imp_remarks" ><?php echo isset($policy[0]->Important_Remarks_Policies) ? $policy[0]->Important_Remarks_Policies : '' ?></textarea>
                                </textarea>
                            </div>
                            <div class="form-group col-md-12 cancel_policy">
                                <label for="t5-n1">Cancellation Policy  </label>
                                <label>
                                    <div class="form-group">
                                        <div class="multi-select-mod multi-select-trans1 input-hide">
                                            <select name="CancellationPolicySelect" id="CancellationPolicySelect" class="form-control" onchange="CancellationPolicyContentfun()">
                                                <option>select</option>
                                            </select>
                                        </div>
                                    </div>
                                </label>
                                <textarea class="form-control" name="cancel_policy" id="cancel_policy"></textarea>
                            </div>
                            <div class="form-group col-md-12 imp_notes">
                                <label for="t5-n1">Important Notes & Conditions</label>
                                <textarea class="form-control" name="imp_notes" id="imp_notes" ><?php echo isset($policy[0]->Important_Notes_Conditions) ? $policy[0]->Important_Notes_Conditions : '' ?></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <?php if($contractmenu[0]->edit!=0) { ?>
                                <input type="button" class="btn-sm btn-success update_button pull-right" id="policy_click"  value="Submit">
                            <?php } ?>
                          </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div id="childPolicy_modal" class="modal-bg-fix modal fade" role="dialog" style="max-height: 78%;">
 
</div>
<div id="datewise_modal" class="modal-bg-fix modal fade" role="dialog" style="width: 95%; max-height: 78%;">
 
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/summernote.js"></script> 

<script type="text/javascript">
    $(document).ready(function() {
        $(".menu1").click(function() {
            var sValue = $("#hotel_id").val();
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
        });
        var hotel_id = $("#hotel_id").val();
        var contract_id = $("#contract_id").val();
        var childPolicy_table = $('#childPolicy_table').dataTable({
              "bDestroy": true,
              "ajax": {
                  url : base_url+'/backend/hotels/childPolicy_list?id='+hotel_id+'&con_id='+contract_id,
                  type : 'GET'
              },
          "fnDrawCallback": function(settings){
          $('[data-toggle="tooltip"]').tooltip();          
          }

        });
    });

</script>

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
                        <label for="" class="control-label col-sm-4 m-t-5">Amount (<?php echo hotel_currency_type($_REQUEST['hotel_id']) ?>)</label>
                        <div class="col-sm-8">
                            <input id="calEditAmt" name="calEditAmt" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Cut-off</label>
                        <div class="col-sm-8">
                            <input id="calEditBal" <?php echo $designation!='Main' ? 'disabled' : '' ?> name="calEditBal" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Allocation</label>
                        <div class="col-sm-8">
                            <input id="calEditAlot" <?php echo $designation!='Main' ? 'disabled' : '' ?> name="calEditAlot" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-sm-4 m-t-5">Closed out</label>
                        <div class="col-sm-8">
                            <p>
                              <input type="checkbox"  name="calEditclosedout" class="filled-in" id="calEditclosedout"/>
                              <label for="calEditclosedout">close</label>
                            </p>
                        </div>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <button id="calUpdateBtn" type="button" class="btn btn-sm btn-default nBtn">Update</button>
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
          <div class="modal-dialog modal-sms">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <form id="bulk-update-form" method="post">
                    <input type="hidden" id="tot-rooms" value="<?php echo $hotels[0]->Number_of_room ?>">
                    <input type="hidden" name="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                    <input type="hidden" name="year" value="<?php echo isset($_REQUEST['year']) ? $_REQUEST['year'] : date('Y') ?>">
                    <input type="hidden" name="month" value="<?php echo isset($_REQUEST['month']) ? $_REQUEST['month'] : date('m') ?>">
                    <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                    <input type="hidden" name="contract_id" value="<?php echo $_REQUEST['con_id'] ?>">
                    <input type="hidden" name="bulk_alt_contract_id" value="<?php echo $_REQUEST['con_id'] ?>">

                    <?php 
                    ?>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Seasons</label>
                        <div class="form-group" style="height: 35px;">
                            <div class="blk-mod multi-select-mod multi-select-trans">
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
                        <div class=" form-group" style="height: 35px;">
                            <div class="blk-mod multi-select-mod multi-select-trans">
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
                    <div class="col-sm-6">
                        <label for="" class="control-label">Rooms</label>
                        <div class=" form-group" style="height: 35px;">
                            <div class="blk-mod multi-select-mod multi-select-trans">
                                <select id="bulk-alt-room_id" name="bulk-alt-room_id[]"  multiple="" class="form-control">
                                        <!-- <option disabled="" value="">--select--</option> -->
                                <?php foreach ($rooms as $key => $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->room_name." ".$value->room_type_name ?></option>
                                <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Amount (<?php echo hotel_currency_type($_REQUEST['hotel_id']) ?>)</label>
                        <div class="">
                            <input id="bulk-alt-amount" name="bulk-alt-amount" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label">Allotment</label>
                        <div class="">
                            <input id="bulk-alt-allotment" <?php echo $designation!='Main' ? 'disabled' : '' ?> name="bulk-alt-allotment" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">Cut-off</label>
                        <div class="">
                            <input id="bulk-alt-cut-off" <?php echo $designation!='Main' ? 'disabled' : '' ?> name="bulk-alt-cut-off" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label pull-left">Closed out</label>
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
                            <p class="custom-checkbox multi-select-mod-closed">
                              <input type="checkbox" name="Open" class="filled-in c-open" id="Open" <?php echo $designation!='Main' ? 'disabled' : '' ?>/>
                              <label for="Open">Open</label>
                              <input type="checkbox" name="Close" class="filled-in c-closed" id="Close" <?php echo $designation!='Main' ? 'disabled' : '' ?>/>
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
<!-- Cancellation Modal -->
<div id="canModal" name = "canModal" class="modal fade-scale" role="dialog" data-toggle="modal" data-target="#canModal">
</div>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>

<script>
                
    // $( document ).ready(function() {
        $('#alternate1').attr('disabled', 'disabled');
        $('#alternate2').attr('disabled', 'disabled');

        CancelationFee_contract_id = $('#contract_id').val();
        CancelationFee_hotel_id = $('#hotel_id').val();
        var CancelationFee_table = $('#CancelationFee_table').dataTable({
              "bDestroy": true,
              "ajax": {
                  url : base_url+'/backend/hotels/CancelationFeeList?hotel_id='+CancelationFee_hotel_id+'&contract_id='+CancelationFee_contract_id,
                  type : 'GET'
              },
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            }
        });
    
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
        $('#bulk-alt-season').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
        $('#bulk-alt-days').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
        $(".home").click(function() {
            document.location.reload(true);
        });
        $("#menu_per").on("click", function() {
        $("#custom-select-option-box").toggle();
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

        $(".editCal").click(function(event)  {
            event.preventDefault();
            var targetLi = $(this).closest('li');
            $('#calMap') .val(targetLi.attr('id'));
            // alert(targetLi.find('.cal-amt').children('span').text());
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
        $("#calUpdateBtn").click(function(event)  {
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
                addToast('Amount must greater than 0','orange');
                $("#calEditAmt").focus();
            } else {
                $('.nclose').trigger('click');
                allotement_update();
            }
            
        });
        $("#bulk-alt-UpdateBtn").click(function() {
            var season = $("#bulk-alt-season").val();
            var Otherseason =  $("#other_season").is(":checked");
            var rooms = $("#bulk-alt-room_id").val();
            var from_date = $("#bulk-alt-fromDate").val();
            var to_date = $("#bulk-alt-toDate").val();
            var amount = $("#bulk-alt-amount").val();
            var total_rooms = $("#tot-rooms").val();
            var allotement = $("#bulk-alt-allotment").val();
            var Cut_off = $("#bulk-alt-cut-off").val();
            var closedOut = $("#bulk-alt-closedout").is(":checked"); 
            var dayss = $("#bulk-alt-days").val();
            if ((season=="" || season==null) && Otherseason==false) {
                addToast('Must select a season!','orange');
            } else {
               if (Otherseason==true) {
                    if (from_date=="") {
                        addToast('From date field is required!','orange');
                        $("#bulk-alt-fromDate").focus();
                    } else if(to_date=="") {
                        addToast('To date field is required!','orange');
                        $("#bulk-alt-toDate").focus();
                    } else if(dayss=="") {
                        addToast('Days field is required!','orange');
                        $("#bulk-alt-days").focus();
                    } else if(rooms=="" || rooms==null) {
                        addToast('Must select a room!','orange');
                        $("#bulk-alt-room_id").focus();
                    } else if(amount!="" &&  amount==0) {
                        addToast('Amount must greater than 0','orange');
                        $("#bulk-alt-amount").focus();
                    } else {
                        $("#bulk-update-form").attr('action',base_url+'backend/hotels/allotementBlkupdate');
                        $("#bulk-update-form").submit();
                    }
               } else {
                    if(dayss=="") {
                        addToast('Days field is required!','orange');
                        $("#bulk-alt-days").focus();
                    } else if(rooms=="" || rooms==null) {
                        addToast('Must select a room!','orange');
                        $("#bulk-alt-room_id").focus();
                    } else {
                        $("#bulk-update-form").attr('action',base_url+'backend/hotels/allotementBlkupdate');
                        $("#bulk-update-form").submit();
                    }
               }
            }
        })
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
<script type="text/javascript">
    // $(document).ready(function() {
        $('#imp_remarks').trumbowyg();
        $('#cancel_policy').trumbowyg();
        $('#imp_notes').trumbowyg();

       
        $('#year').change(function() {
           room_change_allotement();
        });
        $('#year').click(function() {
            $('.datepicker-years').css('display','block');
        });
    // });
</script>
<?php init_tail(); ?>


