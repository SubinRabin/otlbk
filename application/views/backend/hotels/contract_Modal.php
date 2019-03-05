<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />

 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php if (isset($_REQUEST['copy'])) { ?>
         <h4 class="modal-title">Copy Contract <?php echo isset($_REQUEST['copy']) ? ' - '.$view[0]->contract_id : '' ?></h4>
        <?php } else { ?>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Contract <?php echo isset($_REQUEST['id']) ? ' - '.$view[0]->contract_id : '' ?></h4>
        <?php } ?>
      </div>
      <div class="modal-body">
        <form method="post" id="add_contract" name="add_contract" enctype="multipart/form-data"> 
        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['id']) ? $view[0]->contract_id : '' ?>" >
        <?php 
            $contract_type = array('Main'=>'Main','Sub'=>'Sub');
            $board = array('RO'=>'RO','BB'=>'BB','HB'=>'HB','FB'=>'FB','AI'=>'AI');
            ?>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="board">Board</label>
                <select name="board" id="board" class="form-control">
                    <?php foreach ($board as $key => $value) { 
                        if(isset($_REQUEST['id']) && $view[0]->board==$value  ) { ?>
                        <option selected="" value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } } ?>
                </select>
            </div> 

            <div class="form-group col-md-4">
                <label for="datepicker">From date</label>
                <input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker" name="date_picker" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->from_date) ?  $view[0]->from_date : date('Y-m-d') ?>" />
                <div class="input-group">
                    <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($view[0]->from_date) ?  date('d/m/Y',strtotime($view[0]->from_date)) : date('d/m/Y') ?>">
                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="datepicker">To date</label>
                <input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker1" name="date_picker1" placeholder="dd/mm/yyyy" value="<?php echo isset($view[0]->to_date) ? $view[0]->to_date : date('Y-m-d',strtotime('+1 month')) ?>" />
                <div class="input-group">
                    <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($view[0]->to_date) ? date('d/m/Y',strtotime($view[0]->to_date)) : date('d/m/Y',strtotime('+1 month')) ?>">
                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="form-group col-md-4">
                <label for="tax">Tax Pecentage : </label>
                <input id="tax" name="tax" type="number" value="<?php echo isset($view[0]->tax_percentage) ? $view[0]->tax_percentage : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="max_age">Max child age : </label>
                <select name="max_age" id="max_age" class="form-control">
                    <?php for ($i=1; $i <= 18; $i++) { 
                        if ($view[0]->max_child_age==$i) { ?>
                            <option selected="selected" value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } else { ?>
                            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } } ?>
                </select>
            </div>
           <!--  <div class="form-group col-md-4">
                <label for="markup">Markup(%) :</label>
                <input id="markup"  name="markup" type="number" value="<?php echo isset($view[0]->markup) ? $view[0]->markup : '' ?>">
            </div> -->
        <!-- </div>
        <div class="row"> -->
            <div class="form-group col-md-4">
                <label for="contract_type">Contract Type</label>
                <select name="contract_type" id="contract_type" class="form-control" onchange="maincontractCheck();">
                    <?php foreach ($contract_type as $key => $value1) { 
                         if(isset($_REQUEST['id']) && $view[0]->contract_type==$value1  ) { ?>
                        <option selected="" value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Contract Name</label><span>*</span>
                <input type="text" name="contract_name" id="contract_name" class="form-control" value="<?php echo isset($view[0]->contractName) ? $view[0]->contractName : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Booking Code</label>
                <input type="text" name="BookingCode" id="BookingCode" class="form-control" value="<?php echo isset($view[0]->BookingCode) ? $view[0]->BookingCode : '' ?>">
            </div>
             <div class="form-group col-md-4">
                <label for="contract_type">Contract Agreement</label>
                <select name="contract_agreement" id="contract_agreement" class="form-control">
                    <option value="fit" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'fit' ? 'selected' : '' ?>>Fit</option>
                   <option value="offer" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'offer' ? 'selected' : '' ?>>Offer</option> 
                    <option value="commissionable" <?php echo isset($view[0]->contract_agreement)&&$view[0]->contract_agreement == 'commissionable' ? 'selected' : '' ?>>Commissionable</option>                
                </select>
            </div>
            <div class="form-group col-md-4 linked_contract">
                <input type="hidden" class="lin_con" value="<?php echo isset($view[0]->linkedContract) ? $view[0]->linkedContract : '' ?>">
                <label>Linked Contract</label><span>*</span>
                <select class="form-control" id="linked_contract" name="linked_contract">
                    <option>--Select Contract--</option>
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <p>
                  <input type="checkbox" class="filled-in non-refundable" name="nonRefundable" <?php echo isset($view[0]->nonRefundable) && $view[0]->nonRefundable==1 ? 'checked' : '' ?> id="non-refundable"  />
                  <label for="non-refundable">Non Refundable</label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Nationality Permission</h4>
                <br>
            </div>
            <div class="row">
                <input type="hidden" id="permission_check" value="<?php echo isset($view[0]->nationalityPermission) ? $view[0]->nationalityPermission : '' ?>">
                <div class="col-md-12">
                    <div class="col-xs-5">
                        <span>Active Nationality</span>
                        <select name="nationality_from[]" id="undo_redo" class="form-control" size="13" multiple="multiple">
                            <?php foreach ($nationality as $key => $value) { ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-xs-2">
                        <button type="button" id="undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                        <button type="button" id="undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                        <button type="button" id="undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                        <button type="button" id="undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" id="undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                        <button type="button" id="undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                    </div>
                    
                    <div class="col-xs-5">
                        <span>Inactive Nationality</span>
                        <form id="country_permission_form" method="post">
                        <select name="nationality_to[]" id="undo_redo_to" class="form-control" size="13" multiple="multiple"></select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
      <div class="modal-footer">
        <?php if (isset($_REQUEST['copy'])) { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_submit">Copy</button>
        <?php } else if(isset($_REQUEST['id']))  { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_update">Update</button>
        <?php } else { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_submit">Submit</button>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script type="text/javascript">
    var nextDay = new Date($("#date_picker1").val());
    nextDay.setDate(nextDay.getDate() + 1);
    $("#date_picker").datepicker({
        altField: "#alternate1",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y') ?>),
        changeYear : true,
        changeMonth : true,
        onSelect: function(dateText) {
        var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
        $("#date_picker1").datepicker('option', 'minDate', nextDay);
      }
    });

    $("#date_picker1").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#date_picker" ).trigger('focus');
    });
    $("#alternate2").click(function() {
        $( "#date_picker1" ).trigger('focus');
    });
    // $(document).ready(function() {
    maincontractCheck();
    window.prettyPrint && prettyPrint();
    $('#undo_redo').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length = 1;
        }
    });

    <?php if (isset($view[0]->nationalityPermission)) { ?>
    var permission_check = $("#permission_check").val().split(",");
    $.each(permission_check, function(i, v) {
    $('#undo_redo option[value='+v+']').attr('selected','selected');
    });
    <?php } ?>

    <?php if (isset($view[0]->nationalityPermission)) { ?>
    $("#undo_redo_rightSelected").trigger('click');
    $('#undo_redo_to').prop('selectedIndex', 0).focus(); 
    <?php } ?>

// });
    function maincontractCheck() {
        if($("#contract_type").val()!="Main") {
            $("#linked_contract option").remove();
            $("#linked_contract").append('<option value="">--Select Contract--</option>');
            $(".linked_contract").removeClass("hide")
           var hotel_id = $("#id").val();
           <?php if (isset($_REQUEST['copy'])) { ?>
            var contract_id = "";
           <?php } else { ?>
            var contract_id = $("#contract_id").val();
           <?php } ?>
            $.ajax({
                dataType: 'json',
                type: "Post",
                url: base_url+'/backend/hotels/maincontractCheck?hotel_id='+hotel_id+'&contract_id='+contract_id,
                success: function(data) {
                    $.each(data, function(i, v) {
                        if ($(".lin_con").val()==v.id) {
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        $("#linked_contract").append('<option '+selected+' value="'+v.id+'">'+v.contract_id+" - "+v.board+'</option>');
                    });
                }
            }); 
        } else {
            $("#linked_contract option").remove();
            $("#linked_contract").append('<option value="">--Select Contract--</option>');
            $(".linked_contract").addClass("hide")
        }
    }

</script>

