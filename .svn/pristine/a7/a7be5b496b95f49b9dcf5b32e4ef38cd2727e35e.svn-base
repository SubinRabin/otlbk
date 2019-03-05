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
                        <span>Revenue Edit  </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/Revenue" class="btn-sm btn-primary">Back</a></span>
                        <?php } else { ?>
                        <span>Revenue Add  </span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/Revenue" class="btn-sm btn-primary">Back</a></span>
                        <?php }?>
                    </div>
                    <div class="tab-inn">
                        <form method="post" action="RevenueSubmit" name="RevenueForm" id="RevenueForm" enctype="multipart/form-data"> 
                            <input type="hidden" name="id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
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
                                <div class="col-md-6">
                                    
                                    <label>Providers</label>
                                    <div class="custom-control custom-checkbox">
                                        <input name="TBO" <?php echo isset($edit[0]->tbo) && $edit[0]->tbo == 1 ? 'checked' : '' ?> type="checkbox" style="display: none;" class="custom-control-input" id="TBO">
                                        <label class="custom-control-label" for="TBO">Tbo hotels</label>
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
                                            <input type="hidden" name="hoteltext" id="hoteltext" value="<?php echo isset($edit[0]->hotels) ? $edit[0]->hotels : ''; ?>"></p>
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
                                            <button type="button" onclick="RevenueContractSelect();" id="contract_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="contract_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block" onclick="RevenueContractSelect();"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="contract_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="contract_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="contract_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label for="contract_undo_redo_to">Selected Contracts</span>
                                            </select>
                                            <select name="ConSelect[]" class="form-control multi-select-trans2"  id="contract_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="context" id="context" value="<?php echo isset($edit[0]->contracts) ? $edit[0]->contracts : ''; ?>"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                           <label> Agents</label>
                                            <select  id="Agents_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                                <?php foreach ($agents as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>"><?php echo $value->First_Name.' '.$value->Last_Name ?></option>
                                                <?php } ?>
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="Agents_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button" onclick="RevenueAgentSelect();"  id="Agents_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" onclick="RevenueAgentSelect();"  id="Agents_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="Agents_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="Agents_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="Agents_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Selected Agents</label>
                                            <select name="Agents[]" class="form-control multi-select-trans2" id="Agents_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="Agentstext" id="Agentstext" value="<?php echo isset($edit[0]->Agents) ? $edit[0]->Agents : ''; ?>"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                               <!--  <div class="col-md-3">
                                    <label>Season</label>
                                    <select class="season"  name="season" id="season">
                                        <option value="">--select--</option>
                                        <?php foreach ($Season as $key => $value) { ?>
                                            <option <?php echo isset($edit[0]->Season) && $edit[0]->Season==$value->id ? 'selected' : ''; ?> value="<?php echo $value->id ?>"><?php echo $value->SeasonName ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>other</label>
                                    <div class="input-group">
                                        <input type="checkbox" <?php echo isset($_REQUEST['id']) && $edit[0]->Season=="Other" ? 'checked' : '' ?> name="other_season" class="filled-in" id="other_season"/>
                                        <label for="other_season">Other Season</label>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="text" class="datePicker-hide datepicker" id="fromDate" name="fromDate" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->FromDate) ?  $edit[0]->FromDate : date('Y-m-d') ?>"  >
                                                <div class="input-group">
                                                    <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($edit[0]->FromDate) ?  date('d/m/Y',strtotime($edit[0]->FromDate)) : date('d/m/Y') ?>"  >
                                                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="text" class="datePicker-hide datepicker" id="toDate" name="toDate" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->ToDate) ?  $edit[0]->ToDate : date('Y-m-d') ?>"  >
                                                <div class="input-group">
                                                    <input class="form-control datepicker date-pic" id="alternate2" name=""  value="<?php echo isset($edit[0]->ToDate) ?  date('d/m/Y',strtotime($edit[0]->ToDate)): date('d/m/Y') ?>"  >
                                                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Markup">Markup%</label>
                                        <input id="Markup" name="Markup" type="number" class="form-control" value="<?php echo isset($edit[0]->Markup) ? $edit[0]->Markup : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                            <input type="button" id="RevenueUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Update">
                                        <?php } else { ?>
                                            <input type="button" id="RevenueUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Submit">
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
    // $(document).ready(function() {
        // make code pretty
        // stayChange();

        window.prettyPrint && prettyPrint();

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
               RevenueContractSelect();
             },
             afterMoveToRight: function($left, $right, $options) { 
               RevenueContractSelect();
             }
        });

        $('#Agents_undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;

            },
            afterMoveToLeft: function($left, $right, $options) { 
               RevenueAgentSelect();
             },
             afterMoveToRight: function($left, $right, $options) { 
               RevenueAgentSelect();
             }
        });

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
        
    $("#season").change(function() {
        var season = $("#season").val();
        if (season!="") {
        $.ajax({
            dataType: 'json',
            url: base_url+'backend/hotels/RevenueSeasonGet?id='+season,
            cache: false,
            success: function (response) {
              $("#fromDate").val(response.FromDate);
              $("#toDate").val(response.ToDate);
              $("#alternate1").val(response.AltFromDate);
              $("#alternate2").val(response.AltToDate);
            },
             error: function (xhr,status,error) {
               alert("Error: " + error);
            }
          });
        }
    });

    $("#other_season").click(function() {
        if($('#other_season').is(':checked')){
            $('#alternate1').removeAttr('disabled');
            $('#alternate2').removeAttr('disabled');
            $('#season').attr('disabled', 'disabled');
            $('#season').material_select();
        }
        else {
            $('#alternate1').attr('disabled', 'disabled');
            $('#alternate2').attr('disabled', 'disabled');
            $('#season').removeAttr('disabled');
            $('#season').material_select();
        }
    });
    function RevenueContractSelect() {
        var hotelValues = [];
        $('#contract_undo_redo_to option').each(function() {
              hotelValues.push($(this).val());
        });
        $('[name="context"]').val(hotelValues);
    }
    function RevenueAgentSelect() {
        var agentValues = [];
        $('#Agents_undo_redo_to option').each(function() {
              agentValues.push($(this).val());
        });
        $('[name="Agentstext"]').val(agentValues);
    }

    <?php if (count($edit)!=0) { ?>
            var hoteltext = $("#hoteltext").val().split(",");
            $.each(hoteltext, function(i, v) {
                $('#hotel_undo_redo option[value='+v+']').attr('selected','selected');
            });

            $("#hotel_undo_redo_rightSelected").trigger('click');
            $('#hotel_undo_redo_to').prop('selectedIndex', 0).focus();  

            var Agentstext = $("#Agentstext").val().split(",");
            $.each(Agentstext, function(i, v) {
                $('#Agents_undo_redo option[value='+v+']').attr('selected','selected');
            });

            $("#Agents_undo_redo_rightSelected").trigger('click');
            $('#Agents_undo_redo_to').prop('selectedIndex', 0).focus();  

    <?php } ?>
</script>
<?php init_tail(); ?>



