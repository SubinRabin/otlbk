<?php init_head(); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />
<style type="text/css">
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

  .select-wrapper.multi-select-trans2 {
    border: none !important;
    box-shadow: none !important;
    padding: 6px 0px ! important;
  }
  .multi-select-trans2  .select-dropdown ,.select-wrapper.multi-select-trans2 .caret{
    display: none ! important;
  }

</style>

<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                        <span>Discount & Offers Edit  </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/Disoffers" class="btn-sm btn-primary">Back</a></span>
                        <?php } else { ?>
                        <span>Discount & Offers Add  </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/Disoffers" class="btn-sm btn-primary">Back</a></span>
                        <?php }?>
                    </div>
                    <div class="tab-inn">
                        <input type="hidden" id="BlackOutHistory" value="<?php echo isset($edit[0]->BlackOut) ? $edit[0]->BlackOut : '' ?>">
                        <form method="post" action="" name="disForm" id="disForm" enctype="multipart/form-data"> 
                            <input type="hidden" name="disEdit" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="contract_type">Contract Agreement</label>
                                        <select name="contract_agreement" id="contract_agreement" onchange="selecthotel()">
                                            <option value="">Select</option>
                                            <option value="fit" <?php echo isset($edit[0]->contract_agreement)&&$edit[0]->contract_agreement == 'fit' ? 'selected' : '' ?>>Fit</option>
                                            <option value="offer" <?php echo isset($edit[0]->contract_agreement)&&$edit[0]->contract_agreement == 'offer' ? 'selected' : '' ?>>Offer</option> 
                                            <option value="commissionable" <?php echo isset($edit[0]->contract_agreement)&&$edit[0]->contract_agreement == 'commissionable' ? 'selected' : '' ?>>Commissionable</option>                
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Hotels</label>
                                            <select name="hotel_select[]"  id="hotel_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                            <?php $count=count($view);
                                                for ($i=0; $i <$count ; $i++) {  ?>
                                                <option value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                                            <?php  } ?>
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="hotel_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button"  id="hotel_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="hotel_undo_redo_rightSelected"  class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="hotel_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="hotel_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="hotel_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Selected Hotels</label>
                                                <input type="hidden" name="hotel_id" value="<?php echo  $view[0]->id ?>">
                                                <!-- <input type="hidden" name="contract_id" value="<?php echo $_REQUEST['con_id'] ?>"> -->
                                            <select name="hotel[]" class="form-control multi-select-trans2"  id="hotel_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="hoteltext" id="hoteltext" value="<?php echo isset($edit[0]->hotelid) ? $edit[0]->hotelid : ''; ?>"></p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label >Contracts</label>
                                            <select  id="contract_undo_redo" name="con_select[]"  class="form-control multi-select-trans2" size="13" multiple="multiple">
                                            </select>
                                                                    
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="contract_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button" onclick="ContractSelect();" id="contract_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="contract_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block" onclick="ContractSelect();"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="contract_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="contract_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="contract_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label for="contract_undo_redo_to">Selected Contracts</span>
                                            </select>
                                            <select name="ConSelect[]" class="form-control multi-select-trans2"  id="contract_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="context" id="context" value="<?php echo isset($edit[0]->contract) ? $edit[0]->contract : ''; ?>"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                           <label> Rooms</label>
                                                <select  id="Room_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="Room_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button" onclick="RoomSelect();" id="Room_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" onclick="RoomSelect();" id="Room_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="Room_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="Room_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="Room_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Selected Rooms</label>
                                            <select name="Room[]" class="form-control multi-select-trans2" id="Room_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="roomtext" id="roomtext" value="<?php echo isset($edit[0]->room) ? $edit[0]->room : ''; ?>"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="season">Season</label>
                                    <div class="multi-select-mod multi-select-trans multi-select-trans1">
                                    <select name="season" id="season"  class="form-control input-hide">
                                      <option value="">Select</option>
                                    </select> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="from_date">Valid From</label>
                                        <input type="text" class="datePicker-hide datepicker form-control" id="from_date" name="from_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->BkFrom) ?  $edit[0]->BkFrom : date('Y-m-d') ?>" >
                                        <div class="input-group">
                                        <input class="datepicker" id="alternate1" value="<?php echo isset($edit[0]->BkFrom) ?  date('d/m/Y',strtotime($edit[0]->BkFrom)) : date('d/m/Y') ?>" >
                                        <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="to_date">Valid Untill</label>
                                        <input type="text" class="datePicker-hide datepicker form-control" id="to_date" name="to_date" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->BkTo) ?  $edit[0]->BkTo : date('Y-m-d') ?>" >
                                        <div class="input-group">
                                        <input class="datepicker" id="alternate2" value="<?php echo isset($edit[0]->BkTo) ?  date('d/m/Y',strtotime($edit[0]->BkTo)) : date('d/m/Y') ?>" >
                                        <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stay1">Stay From</label>
                                        <input type="text" class="datePicker-hide datepicker form-control" id="stay1" name="stay1" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->Styfrom) ?  $edit[0]->Styfrom : date('Y-m-d') ?>" >
                                        <div class="input-group">
                                        <input class="datepicker" id="alternate3" value="<?php echo isset($edit[0]->Styfrom) ?  date('d/m/Y',strtotime($edit[0]->Styfrom)) : date('d/m/Y') ?>" >
                                        <label for="alternate3" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stay2">Stay till</label>
                                        <input type="text" class="datePicker-hide datepicker form-control" id="stay2" name="stay2" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->Styto) ?  $edit[0]->Styto : date('Y-m-d') ?>" >
                                        <div class="input-group">
                                        <input class="datepicker" id="alternate4" value="<?php echo isset($edit[0]->Styto) ?  date('d/m/Y',strtotime($edit[0]->Styto)) : date('d/m/Y') ?>" >
                                        <label for="alternate4" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount">Minimum Length of Stay</label>
                                        <input id="minimum_stay" name="minimum_stay" type="number" class="form-control" value="<?php echo isset($edit[0]->minimum_stay) ? $edit[0]->minimum_stay : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount">Valid Before</label>
                                        <input id="bookBefore" name="bookBefore" type="number" class="form-control" value="<?php echo isset($edit[0]->Bkbefore) ? $edit[0]->Bkbefore : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount">Discount%</label>
                                        <input id="discount" name="discount" type="number" class="form-control" value="<?php echo isset($edit[0]->discount) ? $edit[0]->discount : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                           <label> Active dates</label>
                                                <select  id="blackOut_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="blackOut_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button" id="blackOut_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="blackOut_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="blackOut_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="blackOut_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="blackOut_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Blackout dates</label>
                                            <select name="BlackDate[]" class="form-control multi-select-trans2" id="blackOut_undo_redo_to"  size="13" multiple="multiple"></select>
                                        </div>
                                    </div>
                                    
                                </div>
                                     <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="NonRefundable">Non Refundable</label>
                                        <div class="switch">
                                            <label>
                                              No
                                              <input type="checkbox" <?php echo isset($edit[0]->NonRefundable) && $edit[0]->NonRefundable ==1 ? 'checked' : ''; ?> id="NonRefundable" name="NonRefundable">
                                              <span class="lever"></span>
                                              YES
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount">Discount Code</label>
                                        <input id="discountCode" name="discountCode" type="text" class="form-control" value="<?php echo isset($edit[0]->discountCode) ? $edit[0]->discountCode : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="stay_pay">Stay and Pay</label>
                                        <select  class="discount_type" name="discount_type" id="discount_type">
                                            <option value="">Select Discount Type</option>
                                            <option  value="EB" <?php echo isset($edit[0]->discount_type) &&  $edit[0]->discount_type=="EB"?'selected':'' ?>>EB offer(early bird)</option>
                                            <option  value="REB" <?php echo isset($edit[0]->discount_type) && $edit[0]->discount_type=="REB"?'selected':'' ?>>REB offer(rolling early bed)</option>
                                            <option  value="Longstay" <?php echo isset($edit[0]->discount_type) && $edit[0]->discount_type=="Longstay"?'selected':'' ?>>Long stay</option>
                                            <option  value="stay&pay" <?php echo isset($edit[0]->discount_type) && $edit[0]->discount_type=="stay&pay"?'selected':'' ?>>Stay & pay</option> 
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-3 stay_night" <?php echo  isset($edit[0]->discount_type) && $edit[0]->discount_type=="stay&pay"?'style="display:block"':'style="display:none"' ?>>
                                    <div class="form-group">
                                        <label for="discount">Stay Night</label>
                                        <input id="stay_night" name="stay_night" type="number" class="form-control" value="<?php echo isset($edit[0]->stay_night) ? $edit[0]->stay_night : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 pay_night" <?php echo  isset($edit[0]->discount_type) && $edit[0]->discount_type=="stay&pay"?'style="display:block"':'style="display:none"' ?> >
                                    <div class="form-group">
                                        <label for="discount">Pay Night</label>
                                        <input id="pay_night" name="pay_night" type="number" class="form-control" value="<?php echo isset($edit[0]->pay_night) ? $edit[0]->pay_night : ''; ?>">
                                    </div>
                                </div>
                              
                               
                               
                            </div>
                            <!-- <div class="">
                                <div class="col-md-12">
                                    <label>Black Out Dates</label>
                                    <ul class="rateAvailspl reteAvailspl list-unstyled">
                                        <li>
                                            <input id="2018-04-27" name="2018-04-27" class="dateAvail" checked="" type="checkbox" value="1">
                                            <label for="2018-04-27" class="date-select-label"></label>
                                          <div>
                                            <p class="mon-yr">Apr 2018</p>
                                            <p class="dt">27</p>
                                            <p class="day">Fri</p>
                                          </div>
                                       </li>
                                        <li>
                                            <input id="2018-04-28" name="2018-04-28" class="dateAvail" type="checkbox" value="1">
                                            <label for="2018-04-28" class="date-select-label"></label>
                                          <div>
                                            <p class="mon-yr">Apr 2018</p>
                                            <p class="dt">27</p>
                                            <p class="day">Fri</p>
                                          </div>
                                      </li>
                                    </ul>
                                </div>
                            </div> -->
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                            <input type="button" id="discountUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Update">
                                        <?php } else { ?>
                                            <input type="button" id="discountUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Submit">
                                        <?php
                                        }
                                        ?>
                                    </div> 
                                </div>
                            </div>
                        </form>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<script type="text/javascript">
    // 
        // make code pretty
       
        stayChange();

        window.prettyPrint && prettyPrint();
        
            $('#discount_type').on('change', function () {
                if ($('#discount_type').val()=="stay&pay") {
                    $('.stay_night').css("display","block");
                    $('.pay_night').css("display","block");
                } else {
                    $('#stay_night').val("");
                    $('#pay_night').val("");
                    $('.stay_night').css("display","none");
                    $('.pay_night').css("display","none");
                   
                }
            });
        

        $('#hotel_undo_redo').multiselect({
            submitAllRight : true,
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;
            },
            afterMoveToLeft: function($left, $right, $options) { 
               selecthotel();
             },
             afterMoveToRight: function($left, $right, $options) { 
               selecthotel();
             }

            //  moveToRight: function(Multiselect, $options, event, silent, skipStack) {
            //     var button = $(event.currentTarget).attr('id');
            //     var $left_options = Multiselect.$left.find('> option:selected');
            //     Multiselect.$right.eq(0).append($left_options);
            //  selecthotel();
            // },

        });

         $('#contract_undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;

            },
            afterMoveToLeft: function($left, $right, $options) { 
               ContractSelect();
            },
            afterMoveToRight: function($left, $right, $options) { 
               ContractSelect();
            }
        });

        $('#Room_undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;
            },
            afterMoveToLeft: function($left, $right, $options) { 
               RoomSelect();
            },
            afterMoveToRight: function($left, $right, $options) { 
               RoomSelect();
            }
        });
        $('#blackOut_undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;
            },
        });
         $("#from_date").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#to_date").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $("#from_date").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#to_date").trigger('focus');
        }); 
        $("#stay1").datepicker({
            altField: "#alternate3",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                stayChange();
            }
        });
        $("#stay2").datepicker({
            altField: "#alternate4",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                stayChange();
            }
        });
        $("#alternate3").click(function() {
            $("#stay1").trigger('focus');
        });
        $("#alternate4").click(function() {
            $("#stay2").trigger('focus');
        }); 

        <?php if (count($edit)!=0) { ?>
            var hoteltext = $("#hoteltext").val().split(",");
            $.each(hoteltext, function(i, v) {

                $('#hotel_undo_redo option[value='+v+']').attr('selected','selected');
            });

            $("#hotel_undo_redo_rightSelected").trigger('click');
            $('#hotel_undo_redo_to').prop('selectedIndex', 0).focus();  




        <?php } ?>
        

    // });
    function stayChange() {
        var stay1 = $("#stay1").val();
        var stay2 = $("#stay2").val();
        $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'backend/hotels/dateLoop?start='+stay1+'&end='+stay2,
          cache: false,
          success: function (response) {
                dateLoopDesignFunction(response);
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    }
    function dateLoopDesignFunction(response) {
       var BlackOutHistory = $("#BlackOutHistory").val().split(',');
       $(".rateAvailspl li").remove();
       $("#blackOut_undo_redo option").remove();
       $.each(response.date, function (i, item) {
             $("#blackOut_undo_redo").append('<option value="'+item+'">'+item+'</option>');
            // $(".rateAvailspl").append('<li>'+
            //                '<input id="'+item+'" name="BlackDate['+item+']" class="dateAvail" type="checkbox" value="'+item+'">'+
            //                 '<label for="'+item+'" class="date-select-label"></label>'+
            //                 '<div>'+
            //                     '<p class="mon-yr">'+response.monthYear[i]+'</p>'+
            //                     '<p class="dt">'+response.day[i]+'</p>'+
            //                     '<p class="day">'+response.days[i]+'</p>'+
            //                   '</div>'+
            //             '</li>');
       });

       $.each(BlackOutHistory, function (j, item1) {
            $("#blackOut_undo_redo option[value='"+item1+"']").attr('selected','selected');
            // $("#"+item1).attr("checked","checked");
       });
            $("#blackOut_undo_redo_rightSelected").trigger('click');
    }
</script>
<?php init_tail(); ?>



