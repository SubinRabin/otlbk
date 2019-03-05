<?php init_head();  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />

<style>
  .hide {
        display:none;
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
                    <h2>Edit vehicle</h2>
                <?php } else { ?>
                <h2>Add new vehicle </h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/transfer_vehicle" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/transfer/addvehicle" name="add_vehicle_form" id="add_vehicle_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-8">
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Vehicle Code</label>
                            <input type="text" class="form-control" id="vehicleCode" name="vehicleCode" value="<?php echo isset($edit[0]->vehicleCode) ? $edit[0]->vehicleCode : $vehicle_max_id ?>" readonly >
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="list-title">Supplier Name</label>
                            <select  name="SupplierId" id="SupplierId">
                                <option value="">Select Supplier</option>
                                <?php $count=count($supplier);
                                    for ($i=0; $i <$count ; $i++) {  ?>
                                        <option value="<?php echo $supplier[$i]->id; ?>" <?php echo(isset($edit[0]->SupplierId) && ($edit[0]->SupplierId) == $supplier[$i]->id ? 'selected' : '')  ?>><?php echo $supplier[$i]->supplier_name; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="VehicleName">Vehicle Name</label>
                            <input type="text" class="form-control" id="VehicleName" name="VehicleName" placeholder="Vehicle Name" value="<?php echo isset($edit[0]->VehicleName) ? $edit[0]->VehicleName : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicleType">Vehicle Type</label>
                            <input type="text" class="form-control" id="vehicleType" name="vehicleType" placeholder="Vehicle Type" value="<?php echo isset($edit[0]->vehicleType) ? $edit[0]->vehicleType : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="VehicleNumber">Vehicle Number</label>
                            <input type="text" class="form-control" id="VehicleNumber" name="VehicleNumber" placeholder="Vehicle Number" value="<?php echo isset($edit[0]->VehicleNumber) ? $edit[0]->VehicleNumber : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="OwnerName">Owner Name</label>
                            <input type="text" class="form-control" id="OwnerName" name="OwnerName" placeholder="Owner Name" value="<?php echo isset($edit[0]->OwnerName) ? $edit[0]->OwnerName : ''; ?>">
                    	</div>
                        <div class="form-group col-md-6">
                            <label for="ContactNumber">Contact Number</label>
                            <input type="number" class="form-control" id="ContactNumber" name="ContactNumber" placeholder="Contact Number" value="<?php echo isset($edit[0]->ContactNumber) ? $edit[0]->ContactNumber : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="OwnerAddress">Address</label>
                            <textarea class="form-control" id="OwnerAddress" name="OwnerAddress" placeholder="Owner Address" ><?php echo isset($edit[0]->OwnerAddress) ? $edit[0]->OwnerAddress : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="form-group col-md-6">
                            <label for="Country">Country</label>
                            <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                            <option value="">Select</option>
                            <?php $count=count($view);
                            for ($i=0; $i <$count ; $i++) { ?>
                              <option <?php echo isset($edit[0]->Country) && $edit[0]->Country ==$view[$i]->id  ? 'selected' : '' ?> value="<?php echo $view[$i]->id;?>" countrycode="<?php echo $view[$i]->sortname; ?>"><?php echo $view[$i]->name; ?></option>
                            <?php  } ?>
                          </select>
                        </div> 
                        <div class="form-group col-md-6">
                           <label for="citySelect">City</label>
                            <input type="hidden" id="hiddenCity" value="<?php echo isset($edit[0]->City) ? $edit[0]->City : '' ?>">
                            <div class="multi-select-mod multi-select-trans multi-select-trans1">
                              <select name="citySelect" id="citySelect"  class="form-control input-hide">
                              <option value="">Select</option>
                              </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="WaitingTime">Waiting Time</label>
                            <input type="number" class="form-control" id="WaitingTime" name="WaitingTime" placeholder="Waiting Time" value="<?php echo isset($edit[0]->WaitingTime) ? $edit[0]->WaitingTime : ''; ?>">
                            
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="list-title">Waiting Time Type</label>
                            <select  name="WaitingTimeType" id="WaitingTimeType">
                                <option <?php echo isset($edit[0]->WaitingTimeType) && $edit[0]->WaitingTimeType=='days' ? 'selected' : '' ?>>days</option>
                                <option <?php echo isset($edit[0]->WaitingTimeType) && $edit[0]->WaitingTimeType=='hours' ? 'selected' : '' ?>>hours</option>
                                <option <?php echo isset($edit[0]->WaitingTimeType) && $edit[0]->WaitingTimeType=='minutes' ? 'selected' : '' ?>>minutes</option>
                            </select>
                            
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="WaitingTime">Passengers</label>
                            <select  name="Passengers" id="Passengers">
                                <?php for ($i=1; $i < 16; $i++) { 
                                    if (isset($edit[0]->Passengers) && $edit[0]->Passengers==$i) { ?>
                                    <option selected=""><?php echo $i ?></option>
                                 <?php  } else {
                                 ?>
                                    <option><?php echo $i ?></option>
                                <?php } } ?>
                            </select>
                            
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="list-title">Bags</label>
                            <select  name="Bags" id="Bags">
                                <?php for ($i=1; $i < 16; $i++) { 
                                    if (isset($edit[0]->Bags) && $edit[0]->Bags==$i) { ?>
                                    <option selected=""><?php echo $i ?></option>
                                <?php  } else {
                                 ?>
                                    <option><?php echo $i ?></option>
                                <?php } } ?>
                            </select>
                            
                        </div> 
                    </div>
                     <div class="row">                    
                        <div class="form-group col-md-12">
                          <div class="row">
                                <div class="col-xs-5">

                                    <label>Airports</label>
                                    <?php
                                     $AirportIDs = array();   
                                     foreach ($vehicleAirportsID as $key => $value) {
                                        $AirportIDs[$key] = $value->airportID;
                                     }  ?>
                                    <input type="hidden" id="airporttext" value="<?php echo implode(",", $AirportIDs) ?>">
                                    <div class="multi-select-mod multi-select-trans multi-select-trans1">
                                    <select id="Airports_undo_redo" class="airportSelect form-control"  multi-select-trans2"  size="13" multiple="multiple">
                                    
                                    </select>
                                    </div>    
                                </div>
                                
                                <div class="col-xs-2">
                                    <button type="button" id="Airports_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                    <button type="button"  id="Airports_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                    <button type="button" id="Airports_undo_redo_rightSelected"  class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" id="Airports_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" id="Airports_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                    <button type="button" id="Airports_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                </div>
                                
                                <div class="col-xs-5">
                                    <label>Selected Airports</label>
                                    <div class="multi-select-mod multi-select-trans multi-select-trans1">
                                    <select name="airports[]" class="form-control multi-select-trans2"  id="Airports_undo_redo_to" size="13" multiple="multiple"></select>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            	</div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <span class="single-upload-img">
                             <?php if (isset($edit[0]->vehicle_image) && $edit[0]->vehicle_image!="") { ?>
                                <img id="load_image" src="<?php echo base_url();?>uploads/vehicle_images/<?php echo $edit[0]->id;?>/<?php echo $edit[0]->vehicle_image;?>" alt="">
                               <?php } else { ?>
                                <img id="load_image" src="<?php echo base_url() ?>assets/images/user/1.png" alt="">
                               <?php } ?>
                            </span>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="file-upload-single">
                                Choose File
                                <input type="file" id="profile_image" name="profile_image" onchange="return ValidateFileUpload();">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-6">
                        <div class="form-group col-md-12">
                            <button type="button" id="add_vehicle_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right"><?php echo isset($edit[0]->id) && $edit[0]->id!="" ? 'Update' : 'Submit' ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            </form>
    </div>
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/transfer.js"></script>
<script type="text/javascript">
    ConSelectFun();
    window.prettyPrint && prettyPrint();

    $('#Airports_undo_redo').multiselect({
        submitAllRight : true,
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length = 1;
        },
    });

    function selectedAirports() {
      var airporttext = $("#airporttext").val().split(",");
      $.each(airporttext, function(i, v) {
          $('#Airports_undo_redo option[value='+v+']').attr('selected','selected');
      });
      $("#Airports_undo_redo_rightSelected").trigger('click');
    $('#Airports_undo_redo_to').prop('selectedIndex', 0).focus(); 
    }

    
    function ConSelectFun(){
          AirportSelectFun();

      var hiddenCity = $("#hiddenCity").val();
      $('#citySelect option').remove();
      var ConSelect = $('#ConSelect option:selected').attr('countrycode');
      $.ajax({
        url: base_url+'/backend/tour/CitySelect?Concode='+ConSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#citySelect').append('<option value="">Select</option>');
          $.each(data, function(i, v) {
            if (hiddenCity==v.id) {
              selected = 'selected';
            } else {
              selected = '';
            } 
            $('#citySelect').append('<option '+selected+' value="'+ v.id +'">'+ v.CityName +'</option>');
          });
        }
      });
      
    }
    function AirportSelectFun(){
      $('#Airports_undo_redo option').remove();
      var ConSelect = $('#ConSelect option:selected').attr('countrycode');
      $.ajax({
        url: base_url+'/backend/transfer/AirportSelect?Concode='+ConSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $.each(data, function(i, v) {
            $('#Airports_undo_redo').append('<option value="'+ v.id +'">'+ v.name +'</option>');
          });
      selectedAirports();
        }
      });
    }
    function ValidateFileUpload() {
        var fuData = document.getElementById('profile_image');
        var FileUploadPath = fuData.value;

    //To check if user upload any file
          
            var Extension = FileUploadPath.substring(
            FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //The file uploaded is an image

    if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

    // To Display
              if (fuData.files && fuData.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      $('#load_image').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(fuData.files[0]);
              }

          } 
        //The file upload is NOT an image
        else {
          error = "Photo only allows file types of JPG, JPEG and BMP. ";
          color = "red";
          $("#profile_image").val("");
          $("#load_image").attr("src",base_url+"assets/images/user/1.png");
          addToast(error,color);
          }
    }
</script>

<?php init_tail(); ?>


