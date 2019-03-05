<?php init_head();  ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&libraries=places&callback=initMap"
        async defer></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />
<style type="text/css">
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
  #map {
        height: 80%;
        width:100%;
    }

</style>
<script type="text/javascript">
    function initMap() {
        var input = document.getElementById('locations');
        var countries = 'AE';

       // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set initial restrict to the greater list of countries.
        autocomplete.setComponentRestrictions(
            {'country': [countries]});

        // Specify only the data fields that are needed.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
              var place = autocomplete.getPlace();
              $(".tempLat").val(place.geometry.location.lat());
              $(".tempLong").val(place.geometry.location.lng());
              $(".tempLocation").val(input.value);
        });
        initMap1();
    }
    function initMap1() {
    var locations = [];
    $.each($(".datamap tr"),function(i,v) {
        latval = $(v).find('td').eq(0).find('input').val();
        longval = $(v).find('td').eq(1).find('input').val();
        locationval = $(v).find('td').eq(2).find('input').val();
        locations[i] = ['<strong>'+locationval+'</strong>',latval,longval,i];
    })

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(25.252778, 55.364444),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow({});

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
}

function locationsAdd() {
    tempLat = $(".tempLat").val();
    tempLong = $(".tempLong").val();
    tempLocation = $(".tempLocation").val();
    if (tempLat!="" && tempLong!="" && tempLocation!="") {
        $(".datamap").append('<tr><td style="display:none"><input type="text" name="multipleLat[]" value="'+tempLat+'" /></td><td style="display:none"><input type="text" name="multipleLong[]" value="'+tempLong+'" /></td><td><input type="text" name="multipleLocation[]" value="'+tempLocation+'" /></td><td> <button type="button" id="remove" class="btn-sm btn-danger" onclick="locationRemove(event)"><i class="fa fa-trash"></i></button></td></tr>');
        $(".tempLat").val("");
        $(".tempLong").val("");
        $(".tempLocation").val("");
        $("#locations").val("");
        initMap1();
    }
}
function locationRemove(e) {
    e.target.closest('tr').remove();
    initMap1();
}
</script>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit contract</h2>
                <?php } else { ?>
                <h2>Add new contract</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/transfer/transfer_contracts" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/transfer/addcontract" name="add_contract_form" id="add_contract_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="stay_pay">Contract Code</label>
                            <input type="text" class="form-control" id="contract_max_id" name="contract_max_id" value="<?php echo isset($edit[0]->contract_code) ? $edit[0]->contract_code : $contract_max_id ; ?>" readonly>
                                    
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="stay_pay">Contract Name</label>
                            <input type="text" class="form-control" id="contractName" name="contractName" value="<?php echo isset($edit[0]->ContractName) ? $edit[0]->ContractName : '' ; ?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="list-title">Valid From</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="valid_from" name="valid_from" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->valid_from) ?  $edit[0]->valid_from : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate1" value="<?php echo isset($edit[0]->valid_from) ?  date('d/m/Y',strtotime($edit[0]->valid_from)) : date('d/m/Y') ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                    	   </div>
                        </div>
                         <div class="form-group col-md-6">
                          <label for="list-title">Valid to</label>
                            <input type="text" class="datePicker-hide datepicker form-control" id="valid_to" name="valid_to" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->valid_to) ?  $edit[0]->valid_to : date('Y-m-d') ?>" >
                            <div class="input-group">
                                <input class="datepicker" id="alternate2" value="<?php echo isset($edit[0]->valid_to) ?  date('d/m/Y',strtotime($edit[0]->valid_to)) : date('d/m/Y') ?>" >
                                <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Passenger Cost (Per person)</label>
                            <input type="number" class="form-control" id="Passenger_cost" name="Passenger_cost" placeholder="Passenger Cost" value="<?php echo isset($edit[0]->Passenger_cost) ? $edit[0]->Passenger_cost : ''; ?>">
                        </div> 
                        <div class="form-group col-md-6">
                           <label for="list-title">Passenger Selling (Per person)</label>
                            <input type="number" class="form-control" id="Passenger_selling" name="Passenger_selling" placeholder="Passenger Selling" value="<?php echo isset($edit[0]->Passenger_selling) ? $edit[0]->Passenger_selling : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo isset($edit[0]->description) ? $edit[0]->description : '' ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Transfer Type</label>
                            <select name="transfer_type" id="transfer_type">
                                <option value="" >Select Transfer Type</option>
                                <option value="arrival" <?php echo isset($edit[0]->transfer_type) && $edit[0]->transfer_type=='arrival' ? "selected" : '' ?>>Arrivals Only</option>
                                <option value="departure" <?php echo isset($edit[0]->transfer_type) && $edit[0]->transfer_type=='departure' ? "selected" : '' ?>>Departures Only</option>
                                <option value="return" <?php echo isset($edit[0]->transfer_type) && $edit[0]->transfer_type=='return' ? "selected" : '' ?>>Returns</option>  
                            </select>
                        </div>
                    </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Vehicles</label>
                                            <?php
                                             $vehiclIds = array();   
                                             foreach ($contractVehiclesID as $key => $value) {
                                                $vehiclIds[$key] = $value->vehicleId;
                                            } ?>
                                            <input type="hidden" id="vehicletext" value="<?php echo implode(",", $vehiclIds) ?>">
                                            <select id="Vehicles_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                            <?php 
                                                foreach ($vehicles as $key => $value) { ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->supplier_code.'('.$value->CountryName.', '.$value->CityName.')'; ?></option>
                                            <?php  } ?>
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="Vehicles_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button"  id="Vehicles_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="Vehicles_undo_redo_rightSelected"  class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="Vehicles_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="Vehicles_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="Vehicles_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Selected Vehicles</label>
                                            <select name="vehicles[]" class="form-control multi-select-trans2"  id="Vehicles_undo_redo_to"  size="13" multiple="multiple"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="list-title" id="location_label">Add Drop Location</label>
                                    <div class="row">
                                        <div class="col-md-10 form-group">
                                            <input type="text" class="form-control" id="locations">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <button type="button" id="add" onclick="locationsAdd()">Add</button>
                                        </div>
                                    </div>
                                   
                                    <div id="map" style="height: 270px"></div>
                                    <div class="hide">
                                        <input type="text" class="tempLat">
                                        <input type="text" class="tempLong">
                                        <input type="text" class="tempLocation">
                                        
                                    </div> 
                                    <table class="datamap table table-responsive">
                                        <?php foreach ($locations as $key => $value) { ?>
                                            <tr>
                                                <td style="display:none"><input type="text" name="multipleLat[]" value="<?php echo $value->latitude ?>" /></td>
                                                <td style="display:none"><input type="text" name="multipleLong[]" value="<?php echo $value->longitude ?>" /></td>
                                                <td><input type="text" name="multipleLocation[]" value="<?php echo $value->location ?>" /></td>
                                                <td> <button type="button" id="remove" class="btn-sm btn-danger" onclick="locationRemove(event)"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        <?php } ?>
                                    </table>   
                                </div>
                            </div>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                    </div>
                    <div class="row">                  
                        <div class="form-group col-md-6 col-md-offset-6">
                            <button type="button" id="add_contract_submit_button" style="margin-top: 25px" class="waves-effect waves-light btn-sm btn-success pull-right"><?php echo isset($edit[0]->id) && $edit[0]->id!="" ? 'Update' : 'Submit' ?></button>
                        </div>
                    </div>                  
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/transfer.js"></script>
<script>

    $("#valid_from").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#valid_to").datepicker({
            altField: "#alternate2",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            minDate: new Date(<?php date('d/m/Y') ?>),
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $("#valid_from").trigger('focus');
        });
        $("#alternate2").click(function() {
            $("#valid_to").trigger('focus');
        }); 
    $("#transfer_type").change(function() {
        var type = $("#transfer_type").val();
        if(type=='arrival') {
            $("#location_label").text("Add Pick Locations");
        } else if(type=="departure") {
            $("#location_label").text("Add Drop Locations");
        } else {
            $("#location_label").text("Add Drop & Pick Locations"); 
        }   
    });
    window.prettyPrint && prettyPrint();

    $('#Vehicles_undo_redo').multiselect({
        submitAllRight : true,
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length = 1;
        },
    });

    var vehicletext = $("#vehicletext").val().split(",");
    $.each(vehicletext, function(i, v) {
        $('#Vehicles_undo_redo option[value='+v+']').attr('selected','selected');
    });

    $("#Vehicles_undo_redo_rightSelected").trigger('click');
    $('#Vehicles_undo_redo_to').prop('selectedIndex', 0).focus(); 

</script>
<?php init_tail(); ?>


