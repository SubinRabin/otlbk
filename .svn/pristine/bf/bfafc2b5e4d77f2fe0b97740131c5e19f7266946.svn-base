<?php init_head();  ?>
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
  }
  .multi-select-trans2  .select-dropdown ,.select-wrapper.multi-select-trans2 .caret{
    display: none ! important;
  }
</style>


    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Contract</h2>
                <?php } else { ?>
                <h2>New Contract Add</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/tour_contracts" class="btn-sm btn-primary">Back</a></span>
            </div>
            <input type="hidden" id="BlackOutHistory" value="<?php echo isset($edit[0]->BlackOut) ? $edit[0]->BlackOut : '' ?>">
            <form action="<?php echo base_url(); ?>backend/tour/addcontract" name="add_contract_form" id="add_contract_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="stay_pay">Contract Code</label>
                            <input type="text" class="form-control" id="contract_max_id" name="contract_max_id" value="<?php echo isset($edit[0]->contract_code) ? $edit[0]->contract_code : $contract_max_id ; ?>" readonly>
                                    
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="stay_pay">Type of Tour</label>
                            <div id="tour_type_select">
                            <select  class="tour_type" name="tour_type" id="tour_type">
                                <option value="">Select Type of Tour</option>
                               <?php $count=count($types);
                                    for ($i=0; $i <$count ; $i++) {  ?>
                                        <option value="<?php echo $types[$i]->id; ?>" <?php echo(isset($edit[0]->tour_type)&&($edit[0]->tour_type == $types[$i]->id) ? 'selected' : '')  ?>><?php echo $types[$i]->type; ?></option>
                                <?php  } ?> 
                            </select>
                            </div>    
                        </div>
                        <div class="form-group col-md-4">
                            <label for="list-title">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo isset($edit[0]->description) ? $edit[0]->description : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="list-title">Supplier Name</label>
                            <select name="supplier_id"  id="supplier_id">
                                <option value="">Select Supplier</option>
                                <?php $count=count($supplier);
                                    for ($i=0; $i <$count ; $i++) {  ?>
                                        <option value="<?php echo $supplier[$i]->id; ?>" <?php echo(isset($edit[0]->supplier_id) && ($edit[0]->supplier_id) == $supplier[$i]->id ? 'selected' : '')  ?>><?php echo $supplier[$i]->supplier_name; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="list-title">Valid From</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="valid_from" name="valid_from" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->valid_from) ?  $edit[0]->valid_from : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate1" value="<?php echo isset($edit[0]->valid_from) ?  date('d/m/Y',strtotime($edit[0]->valid_from)) : date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                           </div>
                        </div>
                         <div class="form-group col-md-4">
                          <label for="list-title">Valid to</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="valid_to" name="valid_to" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->valid_to) ?  $edit[0]->valid_to : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate2" value="<?php echo isset($edit[0]->valid_to) ?  date('d/m/Y',strtotime($edit[0]->valid_to)) : date('d/m/Y') ?>" >
                                <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                           </div>
                        </div>
                    </div>
                    <div class="row">                      
                        <div class="form-group col-md-4">
                            <label for="list-title">Adult Cost</label>
                            <input type="number" class="form-control" id="adult_cost" name="adult_cost" placeholder="Adult Cost value" value="<?php echo isset($edit[0]->adult_cost) ? $edit[0]->adult_cost : ''; ?>">
                        </div> 
                        <div class="form-group col-md-4">
                           <label for="list-title">Adult Selling</label>
                            <input type="number" class="form-control" id="adult_selling" name="adult_selling" placeholder="Adult Selling" value="<?php echo isset($edit[0]->adult_selling) ? $edit[0]->adult_selling : ''; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="list-title">Child Cost</label>
                            <input type="number" class="form-control" id="child_cost" name="child_cost" placeholder="Child Cost" value="<?php echo isset($edit[0]->child_cost) ? $edit[0]->child_cost : ''; ?>">
                            
                        </div> 
                    </div>
                    <div class="row">                       
                        <div class="form-group col-md-4">
                           <label for="list-title">Child Selling</label>
                            <input type="number" class="form-control" id="child_selling" name="child_selling" placeholder="Child Selling" value="<?php echo isset($edit[0]->child_selling) ? $edit[0]->child_selling : ''; ?>">
                        </div>
                        <div class="form-group col-md-2">
                           <label for="list-title">Maximum child age</label>
                            <select name="max_childAge" mySelectBoxClass" id="max_childAge">
                                <?php for ($i=0; $i <18 ; $i++) { ?>
                                <option value="<?php echo $i ?>" <?php echo isset($edit[0]->max_childAge) && ($i==$edit[0]->max_childAge) ? 'selected' : ''; ?> ><?php echo $i ?></option>
                                <?php } ?>
                                </select>
                        </div>
                    </div>
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
                                            <button type="button" onclick="blackOutSelect();" id="blackOut_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" onclick="blackOutSelect();" id="blackOut_undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
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
                            </div>
                    <div class="row">                  
                        <div class="form-group col-md-6 col-md-offset-6">
                            <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                  <button type="button" id="add_contract_submit_button" style="margin-top: 25px" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_contract_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                            <?php } ?>
                        </div>
                    </div>                  
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/contract.js"></script>
<script>
    stayChange();

    window.prettyPrint && prettyPrint();
    $('#blackOut_undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            },
            fireSearch: function(value) {
                return value.length = 1;
            },
        });
    $("#valid_from").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                stayChange();
            }
        });
        $("#valid_to").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
            onSelect: function(dateText) {
                stayChange();
            }
        });
        $("#alternate1").click(function() {
            $("#valid_from").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#valid_to").trigger('focus');
        }); 
        function stayChange() {
        var valid_from = $("#valid_from").val();
        var valid_to = $("#valid_to").val();
        $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'backend/tour/dateLoop?start='+valid_from+'&end='+valid_to,
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
       });

       $.each(BlackOutHistory, function (j, item1) {
            $("#blackOut_undo_redo option[value='"+item1+"']").attr('selected','selected');
            // $("#"+item1).attr("checked","checked");
       });
            $("#blackOut_undo_redo_rightSelected").trigger('click');
    }
        function ValidateFileUpload() {
            var fuData = document.getElementById('contract_image');
            var FileUploadPath = fuData.value;   
              if (fuData.files && fuData.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      $('#load_image').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(fuData.files[0]);
              }   
        }
</script>
<?php init_tail(); ?>


