<?php init_head(); ?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&libraries=places'></script>
<script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script>
<style type="text/css">
    #room_add_table tbody {
        display:block;
        max-height:425px;
        overflow-y:auto;
    }
    #room_add_table thead, tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }

    #sales_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #revenue_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #contract_password + .fa {
        cursor: pointer;
        pointer-events: all;
    }
     #finance_password + .fa {
        cursor: pointer;
        pointer-events: all;
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
    .multi-select-mod button {
        background-color: transparent;
        color: #ccc;
        box-shadow: none;
        border: 1px solid #ccc;
        height: 34px;
        font-size: 14px;
        font-weight: normal;
        text-transform: capitalize;
        padding: 0 1rem;
    }

    .multi-select-mod button:hover {
        background-color: transparent;
        box-shadow: none;
        color: #ccc;
        border: 1px solid #ccc;
    }

    .multi-select-mod .dropdown-menu {
        left: 0;
        top: 34px;
    }

    .multi-select-mod label {
        color: black;
    }
    .multi-select-mod li.active a, .multi-select-mod li.active a:hover {
        background-color: #f1f1f1;
    }

    .multi-select-mod li.active a label {
        color: #000;
    }
    .multi-select-mod [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
        left: auto !important;
        opacity: 1 !important;
    }

    .multi-select-mod .btn-group, .multi-select-mod button, .multi-select-mod .dropdown-menu {
        width: 100%;
    }
    .multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
        border: 1px solid #cccccc ! important;
        margin-top: 9px;
    }
    .caret {
        display: none;
    } 
    .select {
        -webkit-appearance:none
    } 
    /*
    label input {
    display: none;*/
    /*text-align: center; *//* center checkbox horizontally */
    /*vertical-align: middle;  center checkbox vertically 
    }
    */
    /*label span {*//* <-- style the artificial checkbox */
    /*height: 10px;
    width: 10px;
    outline: 3px solid white;
    display: inline-block;
    position: relative;
    background-color:white;*/
    /* text-align: center;*/ /* center checkbox horizontally */
    /*vertical-align: middle;*/ /* center checkbox vertically */
    
    /*}
    [type=checkbox] + span:before {
    content: '\2716';
    position: relative;
    top: -3px;
    left: 2;
    color: red;
    align-content:center;
    
    }*/

    /*[type=checkbox]:checked + span:before {*//* <-- style its checked state..with a ticked icon */
    /*content: '\2714';
    position: relative;
    top: -3px;
    left: 2;
    color:green;  
    }*/
    .multiselect {
        width:20em;
        height:15em;
        border:solid 1px #c0c0c0;
        overflow:auto;
    }
     
    .multiselect label {
        display:block;
    }
     
    .multiselect-on {
        color:#ffffff;
        background-color:#000099;
    }
    .custom-select-option{
        font-size: 10px;
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
        <div class="sb2-2-add-blog sb2-2-1">
            <h2> Add Hotel Details <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels" class="btn-sm btn-primary">Back</a></span>
            <?php if (isset($_REQUEST['hotels_edit_id'])) { ?>
            <span class="pull-right"><a href="#" data-toggle="modal" data-target="#Password_modal" class="btn-sm btn-primary" style="margin-right: 5px; " >Change Password</a></span> 
            <span class="pull-right" style="margin-right: 5px;">
                        <div class="btn-sm btn-primary" id="menu_per" style="transform: translateY(10px);width: 203px;text-align: center;cursor:pointer;">Menu Permission
                        </div>
                        <div id="custom-select-option-box" class="btn-sm custom-dd-style">
                            <div class="custom-select-option" style="width: 183px;">
                                <input type="checkbox" class="filled-in" name="checkedit" id="checkedit" <?php echo isset($view[0]->edit_profile) && $view[0]->edit_profile=="1" ? "checked" : "" ?> value="" />
                                    <label for="checkedit">Edit profile</label>
                            </div>
                        </div>
            </span>

            <?php } ?> 
            </h2>
            </br>
            <ul class="nav nav-tabs tab-list">
                <li class="home active"><a><i class="fa fa-map" aria-hidden="true"></i> <span>Location</span></a>
                </li>
                <li class="menu1"><a><i class="fa fa-info" aria-hidden="true"></i> <span>Details</span></a>
                </li>
                <li class="menu3"><a><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Photo Gallery</span></a>
                <li class="menu4"><a><i class="fa fa-facebook" aria-hidden="true"></i> <span>Social Media</span></a>
                </li>
                <li class="menu5"><a><i class="fa fa-phone" aria-hidden="true"></i> <span>Contact Info</span></a>
                </li>
               <!--  <li class="menu6"><a><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Contract</span></a>
                </li>
                <li class="menu7"><a><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Policies</span></a> -->
                </li>
            </ul>
            <form action="add_new_hotel" method="post" id="new_hotel_form" name="new_hotel_form" enctype="multipart/form-data"> 
            <input type="hidden" name="room_aminities" id="room_aminities" value="<?php echo isset($view[0]->room_aminities) ? $view[0]->room_aminities : '' ?>">
            <input type="hidden" name="keywords" id="keywords" value="<?php echo isset($view[0]->keywords) ? $view[0]->keywords : '' ?>">
            <input type="hidden" name="hotels_edit_id" id="hotels_edit_id" value="<?php echo isset($view[0]->hotels_edit_id) ? $view[0]->hotels_edit_id : '' ?>">
            <input type="hidden" name="gallery_edit_image" id="gallery_edit_image" value="<?php echo isset($view[0]->gallery_images) ? $view[0]->gallery_images : '' ?>">
            <input type="hidden" name="deleted_id" id="deleted_id">
            <div class="tab-content">
                <div id="home" class="tab-pane fade active in">
                    <div class="box-inn-sp">
                        <div class="bor mar_top_0">
                        <div class="row">
                            <input type="hidden" name="latitude" style="width: 110px" id="us3-lat" value="<?php echo isset($view[0]->lattitude) ? $view[0]->lattitude : '' ?>"/>
                            <input type="hidden" name="longitude" style="width: 110px" id="us3-lon" value="<?php echo isset($view[0]->longitude) ? $view[0]->longitude : '' ?>"/>
                            <div class="form-group col-md-12">
                                <label for="us3-address">Where is the hotel located?</label>
                                <input type="text" name="location" class="form-control" id="us3-address" value="<?php echo isset($view[0]->location) ? $view[0]->location : '' ?>">
                                <input type="hidden" name="country" class="form-control" id="us3-country" value="<?php echo isset($view[0]->country_code) ? $view[0]->country_code : '' ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <div id="us3" style="width: 100%; height: 400px;"></div>
                            <script>
                                $('#us3').locationpicker({
                                    location: {
                                        latitude: <?php echo isset($view[0]->lattitude) && $view[0]->lattitude!="" ? $view[0]->lattitude : '25.253160' ?>,
                                        longitude: <?php echo isset($view[0]->longitude) && $view[0]->longitude !="" ? $view[0]->longitude : '55.328495' ?>
                                    },
                                    radius: 300,
                                    styles: ['road','red'],
                                    inputBinding: {
                                        latitudeInput: $('#us3-lat'),
                                        longitudeInput: $('#us3-lon'),
                                        radiusInput: $('#us3-radius'),
                                        locationNameInput: $('#us3-address'),
                                    },
                                    enableAutocomplete: true,
                                    onchanged: function (currentLocation, radius, isMarkerDropped) {
                                        // Uncomment line below to show alert on each Location Changed event
                                        //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                                    }
                                });
                            </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="button" class="waves-effect waves-light btn-sm teal darken-3 col_white pull-right" id="hotel_tab_1" value="Next">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="bor mar_top_0">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="hotel_name">Hotel Name</label><span>*</span>
                                    <input id="hotel_name" name="hotel_name" type="text" class="form-control" value="<?php echo isset($view[0]->hotel_name) ? $view[0]->hotel_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="property_name">Property Name</label>
                                    <input id="property_name" name="property_name" type="text" class="form-control" value="<?php echo isset($view[0]->property_name) ? $view[0]->property_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="brand_name">Brand Name</label>
                                    <input id="brand_name" name="brand_name" type="text" class="form-control" value="<?php echo isset($view[0]->brand_name) ? $view[0]->brand_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="from_date">Country</label>
                                    <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                                    <option value=" "> Country </option>
                                    <?php $count=count($contry);
                                    for ($i=0; $i <$count ; $i++) { ?>
                                    <option <?php echo isset($view[0]->country) && $view[0]->country ==$contry[$i]->id  ? 'selected' : '' ?> value="<?php echo $contry[$i]->id;?>" sortname="<?php echo  $contry[$i]->sortname; ?>"><?php echo $contry[$i]->name; ?></option>
                                    <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="stateSelect">State</label>
                                    <input type="hidden" id="hiddenState" value="<?php echo isset($view[0]->state) ? $view[0]->state : '' ?>">
                                    <div class="multi-select-mod multi-select-trans multi-select-trans1">
                                    <select name="stateSelect" id="stateSelect"  class="form-control">
                                    <option value="">Select</option>
                                    </select> 
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="city">City</label><span>*</span>
                                    <!-- <div class="multi-select-mod multi-select-trans multi-select-trans1">
                                        <select name="city" id="city"  class="form-control">
                                        <option value="">Select</option>
                                        </select> 
                                    </div> -->
                                    <input id="city" name="city" type="text" class="form-control" value="<?php echo isset($view[0]->city) ? $view[0]->city : '' ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="citynearby">City near by places</label><span>*</span>
                                    <input id="citynearby" name="citynearby" type="text" class="form-control" value="<?php echo isset($view[0]->city_near_by) ? $view[0]->city_near_by : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="citydes">City description</label><span>*</span>
                                    <textarea id="citydes" name="citydes" type="text" class="form-control"><?php echo isset($view[0]->city_description) ? $view[0]->city_description : '' ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Select hotel facilities</label><span>*</span>
                                    <?php 
                                    if (isset($view[0]->hotel_facilities)) {
                                        $hotel_facilities = explode(",",$view[0]->hotel_facilities);
                                    } else {
                                        $hotel_facilities = array();
                                    }
                                        $i=0; 
                                        $selected_hotel_fac = "";
                                        ?>
                                    <div class="multi-select-mod multi-select-trans">
                                        <select multiple id="hotel_facilties" name="hotel_facilties[]">
                                            <?php 
                                            foreach ($hotel_facilties as $key => $value) { 
                                                if($hotel_facilities[$i]==$value->id) {
                                                  $selected_hotel_fac = "selected"; ?>
                                                       
                                                    <?php 
                                                  $i++; } else {
                                                    $selected_hotel_fac = "";
                                                  }
                                                  ?>
                                                    <option <?php echo $selected_hotel_fac; ?> data-icon="<?php echo base_url() ?>"  value="<?php echo $value->id ?>"><?php echo $value->Hotel_Facility ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Select room facilities</label><span>*</span>
                                        <?php 
                                        if (isset($view[0]->room_facilities)) {
                                                $room_facilty = explode(",",$view[0]->room_facilities);
                                        } else {
                                            $room_facilty = array();
                                        }
                                            $i=0; 
                                            $selected_room_fac = "";
                                        ?>
                                    <div class="multi-select-mod multi-select-trans">
                                        <select  id="room_facilties1" multiple name="room_facilties1[]">
                                            <?php foreach ($room_facilties as $key => $value) { 
                                                if($room_facilty[$i]==$value->id) {
                                                  $selected_room_fac = "selected"; ?>
                                                    <?php 
                                                  $i++; } else {
                                                    $selected_room_fac = "";
                                                  } ?>
                                                <option <?php echo $selected_room_fac; ?> data-icon="<?php echo base_url() ?>"  value="<?php echo $value->id ?>"><?php echo $value->Room_Facility ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <p><label>Complimentry</label></p>
                                    <input type="checkbox" class="filled-in" id="wifi" <?php echo isset($view[0]->wifi) && $view[0]->wifi=="on" ? "checked" : '' ?> name="wifi" value="on" />
                                    <label for="wifi">Wifi</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="checkbox" class="filled-in" name="internet" <?php echo isset($view[0]->internet) && $view[0]->internet=="on" ? "checked" : '' ?> id="Internet" value="on" />
                                    <label for="Internet">Internet</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="checkbox" class="filled-in" name="parking" <?php echo isset($view[0]->parking) && $view[0]->parking=="on" ? "checked" : '' ?> id="parking" value="on" />
                                    <label for="parking">parking</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <p><label>Star Rating</label></p>
                                    <input type="radio" class="with-gap" id="5" name="rating" <?php echo isset($view[0]->rating) && $view[0]->rating=="5" ? "checked" : '' ?>  value="5" />
                                    <label for="5">5</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="radio" class="with-gap" id="4" name="rating" <?php echo isset($view[0]->rating) && $view[0]->rating=="4" ? "checked" : '' ?> value="4" />
                                    <label for="4">4</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="radio" class="with-gap" id="3" name="rating" <?php echo isset($view[0]->rating) && $view[0]->rating=="3" ? "checked" : '' ?> value="3" />
                                    <label for="3">3</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="radio" class="with-gap" name="rating" id="2" <?php echo isset($view[0]->rating) && $view[0]->rating=="2" ? "checked" : '' ?> value="2" />
                                    <label for="2">2</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="radio" class="with-gap" name="rating" id="1" <?php echo isset($view[0]->rating) && $view[0]->rating=="1" ? "checked" : '' ?> value="1" />
                                    <label for="1">1</label>
                                    &nbsp&nbsp&nbsp
                                    <input type="radio" class="with-gap" name="rating" id="10" <?php echo isset($view[0]->rating) && $view[0]->rating=="10" ? "checked" : '' ?> value="10" />
                                    <label for="10">Hotel Apartment</label>
                                    &nbsp&nbsp&nbsp
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="form-group col-md-12">
                                    <div id="chip1" class="chips chips-placeholder">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="hotel_description">Hotel Descriptions:</label><span>*</span>
                                    <textarea name="hotel_description" id="hotel_description" class="form-control"><?php echo isset($view[0]->hotel_description) ? $view[0]->hotel_description : '' ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="total_no_of_rooms">No of Rooms</label><span>*</span>
                                    <input id="total_no_of_rooms" name="total_no_of_rooms" type="number" class="form-control" value="<?php echo isset($view[0]->Number_of_room) ? $view[0]->Number_of_room : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Website">Website</label>
                                    <input id="Website" name="Website" type="text" class="form-control" value="<?php echo isset($view[0]->website) ? $view[0]->website : '' ?>">
                                </div>
                                <div class="form-group col-md-8">
                                    <p><label for="accepting_vcc">Accepting VCC</label></p>
                                    <input name="accepting" type="radio" class="with-gap" id="yes" <?php echo isset($view[0]->accepting_vcc) && $view[0]->accepting_vcc=="0" ? "checked" : '' ?> value="0"  />
                                    <label for="yes">Yes</label>
                                    <input name="accepting" type="radio" class="with-gap" id="no" <?php echo isset($view[0]->accepting_vcc) && $view[0]->accepting_vcc=="1" ? "checked" : '' ?> value="1" />
                                    <label for="no">No</label>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="channel_manager">Channel Manager:(if any)</label>
                                    <input id="channel_manager" name="channel_manager" type="text" class="form-control" value="<?php echo isset($view[0]->channel) ? $view[0]->channel : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="part_of_chain">Part of Any Chain or Collection</label>
                                    <input id="part_of_chain" name="part_of_chain" type="text" class="form-control" value="<?php echo isset($view[0]->chain) ? $view[0]->chain : '' ?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <div id="chip2" class="chips chips-placeholder">
                                    </div>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label>Select room aminities</label>
                                    <?php if (isset($view[0]->room_aminities)) {
                                            $room_aminity = explode(",",$view[0]->room_aminities);
                                        } else {
                                            $room_aminity = array();
                                        }
                                        $i=0; 
                                        $selected_room_amin = "";
                                    ?>
                                    <select multiple id="room_aminities" name="room_aminities[]">
                                        <option value="" disabled>Room aminities</option>
                                        <?php foreach ($room_aminities as $key => $value) {  
                                            if($room_aminity[$i]==$value->id) {
                                              $selected_room_amin = "selected"; ?>
                                                <?php 
                                              $i++; } else {
                                                $selected_room_amin = "";
                                              } ?>
                                            <option <?php echo $selected_room_amin; ?> value="<?php echo $value->id ?>"><?php echo $value->Aminities  ?></option>
                                        <?php  } ?>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="sell_currency">Selling Currency</label><span>*</span>
                                    <select name="sell_currency"  id="sell_currency">
                                        <?php foreach ($currency_list as $key => $value) { 
                                            if(isset($view[0]->sell_currency) && $view[0]->sell_currency==$value->currency_type) {?>
                                        <option selected="" value="<?php echo $value->currency_name. ' ('.($value->currency_type).')' ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php } else { ?>
                                            <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php  } } ?>
                
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Preferred currency</label>
                                    <select name="Preferred_currency"  id="sell_currency">
                                        <?php foreach ($currency_list as $key => $value) { 
                                            if(isset($view[0]->Preferred_currency) && $view[0]->Preferred_currency==$value->currency_type) {?>
                                        <option selected="" value="<?php echo $value->currency_name. ' ('.($value->currency_type).')' ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php } else { ?>
                                            <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php  } } ?>
                
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Search list on</label>
                                    <select name="promoteList"  id="promoteList">
                                        <option <?php echo isset($view[0]->promoteList) && $view[0]->promoteList==1 ? 'selected' : '' ?> value="1">Last</option>
                                        <option <?php echo isset($view[0]->promoteList) && $view[0]->promoteList==2 ? 'selected' : '' ?> value="2">Medium</option>
                                        <option <?php echo isset($view[0]->promoteList) && $view[0]->promoteList==3 ? 'selected' : '' ?> value="3">Top</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" id="hotel_tab_2" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Next">
                                    <input type="button" id="hotel_tab_2_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="box">
                                <div class="js--image-preview">
                                        <span class="image-title">Main Image</span>
                                        <?php 

                                            if (isset($view[0]->Image1)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->Image1;?>" class="img1preview" >
                                            <?php  } else {  ?>
                                           <img src="" class="img1preview" >
                                        <?php   }?>
                                </div>
                                <div class="upload-options">
                                        <label>
                                            <input type="file" onchange=" return ValidateImageFileUpload('img1');" class="image-upload" id="img1" name="img1" accept="image/*" />
                                            <p><i class="fa fa-upload"></i></p>
                                        </label>
                                </div>
                                 
                            </div>

                            <div class="box">
                                <div class="js--image-preview">
                                        <?php 
                                            if (isset($view[0]->Image2)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->Image2;?>" class="img2preview" >
                                            <?php  } else {  ?>
                                            <img src="" class="img2preview" >
                                        <?php  } ?>
                                </div>
                                <div class="upload-options">
                                        <label>
                                            <input type="file" onchange="ValidateImageFileUpload('img2');" class="image-upload" id="img2" name="img2" accept="image/*" />
                                            <p><i class="fa fa-upload"></i></p>
                                        </label>
                                </div>
                            </div>
                            <div class="box">
                                <div class="js--image-preview">
                                        <?php 
                                            if (isset($view[0]->Image3)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->Image3;?>" class="img3preview" >
                                            <?php  } else {  ?>
                                            <img src="" class="img3preview" >
                                        <?php  } ?>
                                </div>
                                <div class="upload-options">
                                        <label>
                                            <input type="file" onchange="ValidateImageFileUpload('img3');" class="image-upload" id="img3" name="img3" accept="image/*" />
                                            <p><i class="fa fa-upload"></i></p>
                                        </label>
                                </div>
                            </div>
                            <div class="box">
                                <div class="js--image-preview">
                                        <?php 
                                            if (isset($view[0]->Image4)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->Image4;?>" class="img4preview" >
                                            <?php  } else {  ?>
                                            <img src="" class="img4preview" >
                                        <?php  } ?>
                                </div>
                                <div class="upload-options">
                                        <label>
                                            <input type="file" onchange="ValidateImageFileUpload('img4');" class="image-upload" id="img4" name="img4" accept="image/*" />
                                            <p><i class="fa fa-upload"></i></p>
                                        </label>
                                    
                                </div>
                            </div>
                            <div class="box">
                                <div class="js--image-preview">
                                        <?php 
                                        if (isset($view[0]->Image5)) { ?>
                                        <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->Image5;?>" class="img5preview" >
                                        <?php  } else {  ?>
                                        <img src="" class="img5preview" >
                                        <?php   }?>
                                </div>
                                <div class="upload-options">
                                    <label>
                                        <input type="file" onchange="ValidateImageFileUpload('img5');" class="image-upload" id="img5" name="img5" accept="image/*" />
                                        <p><i class="fa fa-upload"></i></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="file-field form-group col-md-12">
                                <div class="btn image_butttt">
                                    <label for="multiple_image">Gallery Images</label>
                                    <input type="file" class="hide" name="gallery_image[]" id="multiple_image" onchange="multipleimagevalidation();" multiple >
                                </div>
                                <div class="file-path-wrapper pad_left_none">
                                    <input class="file-path form-control" type="text" placeholder="Upload one or more files" value="<?php echo isset($view[0]->gallery_images) ? $view[0]->gallery_images : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php 
                            if (isset($view[0]->gallery_images)) {
                         $gallery = explode(",", $view[0]->gallery_images);
                            foreach ($gallery as $key => $value) { ;?>
                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $value;?>" width="10%" height ="100x">
                            <?php } } else { if(isset($_REQUEST['hotels_edit_id'])) { ?>
                            <p class="center">No Records</p>
                            <?php } } ?>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="button" class="waves-effect waves-light btn-sm  teal darken-3 col_white mar_left_5 pull-right" id="hotel_tab_4" value="Next">
                                <input type="button" id="hotel_tab_4_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="bor mar_top_0">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc1">Facebook Url</label>
                                    <input id="t4-soc1" name="facebook" type="text" value="<?php echo isset($view[0]->facebook) ? $view[0]->facebook : 'http://facebook.com/' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc2">Google Plus Url</label>
                                    <input id="t4-soc2" name="googleplus" type="text" value="<?php echo isset($view[0]->google_plus) ? $view[0]->google_plus : 'http://google.com/gplus' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc3">Twitter Url</label>
                                    <input id="t4-soc3" name="twitter" type="text" value="<?php echo isset($view[0]->twitter) ? $view[0]->twitter : 'http://twitter.com/' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc4">Linkedin Url</label>
                                    <input id="t4-soc4" name="Linkedin" type="text" value="<?php echo isset($view[0]->linked_in) ? $view[0]->linked_in : 'http://Linkedin.com/ ' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc5">WhatsApp Number</label>
                                    <input id="t4-soc5" name="WhatsApp" type="text" class="form-control" value="<?php echo isset($view[0]->whatsapp) ? $view[0]->whatsapp : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="t4-soc6">Vk Url</label>
                                    <input id="t4-soc6" name="vkcom" type="text" value="<?php echo isset($view[0]->vk_url) ? $view[0]->vk_url : 'http://vk.com/' ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" id="hotel_tab_5" value="Next">
                                    <input type="button" id="hotel_tab_5_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div class="bor mar_top_0">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span>Sales Team</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n1">First Name</label><span>*</span>
                                    <input  type="text" name="sales_fname"  class="form-control sales_fname" value="<?php echo isset($view[0]->sale_name) ? $view[0]->sale_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n2">Last Name</label>
                                    <input  type="text" name="sales_lname" class="form-control sales_lname" value="<?php echo isset($view[0]->sale_lname) ? $view[0]->sale_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n3">Phone</label><span>*</span>
                                    <input id="t5-n3" type="number" name="sales_phone" class="hide-spinner form-control sales_phone" value="<?php echo isset($view[0]->sale_number) ? $view[0]->sale_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n4">Mobile</label><span>*</span>
                                    <input id="t5-n4" type="number" name="sales_mobile" class="hide-spinner form-control sales_mobile" value="<?php echo isset($view[0]->sale_mobile) ? $view[0]->sale_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n5">Email</label><span>*</span>
                                    <input id="t5-n5" type="email" name="sales_mail" class="form-control sales_mail" value="<?php echo isset($view[0]->sale_mail) ? $view[0]->sale_mail : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="t5-n5">Password</label><span>*</span>
                                        <input id="sales_password" type="password" name="sales_password" class="form-control sales_password" value="<?php echo isset($view[0]->sale_password) ? $view[0]->sale_password : '';?>"><i class="fa fa-eye form-control-feedback" onclick="myFunction_sales()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n6">Address</label><span>*</span>
                                    <textarea id="t5-n6" name="sales_address" class="form-control sales_address"><?php echo isset($view[0]->sale_address) ? $view[0]->sale_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <span>Revenue Team </span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="filled-in" name="check1" id="check1" />
                                    <label for="check1">Same as above</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="revenue_fname">First Name</label><span>*</span>
                                    <input id="revenue_fname" type="text" name="revenue_fname"  class="form-control revenue_fname" value="<?php echo isset($view[0]->revenu_name) ? $view[0]->revenu_name : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="revenue_lname">Last Name</label>
                                    <input id="revenue_lname" type="text" name="revenue_lname" class="form-control revenue_lname" value="<?php echo isset($view[0]->revenu_lname) ? $view[0]->revenu_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="revenue_phone">Phone</label><span>*</span>
                                    <input id="revenue_phone" type="number" name="revenue_phone" class="hide-spinner form-control revenue_phone" value="<?php echo isset($view[0]->revenu_number) ? $view[0]->revenu_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="revenue_mobile">Mobile</label><span>*</span>
                                    <input id="revenue_mobile" type="number" name="revenue_mobile" class="hide-spinner form-control revenue_mobile" value="<?php echo isset(    $view[0]->revenu_mobile) ? $view[0]->revenu_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="revenue_mail">Email</label><span>*</span>
                                    <input id="revenue_mail" type="email" name="revenue_mail" class="form-control revenue_mail" value="<?php echo isset($view[0]->revenu_mail) ? $view[0]->revenu_mail : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="revenue_mail">Password</label><span>*</span>
                                        <input id="revenue_password" type="password" name="revenue_password" class="form-control revenue_password" value="<?php echo isset($view[0]->revenue_password) ? $view[0]->revenue_password : '';?>"><i class="fa fa-eye form-control-feedback" onclick="myFunction_revenue()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="revenue_address">Address</label><span>*</span>
                                    <textarea id="revenue_address" name="revenue_address" class="form-control revenue_address"><?php echo isset($view[0]->revenu_address) ? $view[0]->revenu_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <span>Reservation Team</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="filled-in" name="check2" id="check2" />
                                    <label for="check2">Same as above</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_fname">First Name</label><span>*</span>
                                    <input  type="text" name="contract_fname"  class="form-control contract_fname" value="<?php echo isset($view[0]->contract_name) ? $view[0]->contract_name : '' ;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_lname">Last Name</label>
                                    <input  type="text" name="contract_lname" class="form-control contract_lname" value="<?php echo isset($view[0]->contract_lname) ? $view[0]->contract_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contract_phone">Phone</label><span>*</span>
                                    <input id="contract_phone" type="number" name="contract_phone" class="hide-spinner form-control contract_phone" value="<?php echo isset($view[0]->contract_number) ? $view[0]->contract_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_mobile">Mobile</label><span>*</span>
                                    <input id="contract_mobile" type="number" name="contract_mobile" class="hide-spinner form-control contract_mobile" value="<?php echo isset($view[0]->contract_mobile) ? $view[0]->contract_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contract_mail">Email</label><span>*</span>
                                    <input id="contract_mail" type="email" name="contract_mail" class="form-control contract_mail" value="<?php echo isset($view[0]->contract_mail) ? $view[0]->contract_mail : '';?>">
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="contract_mail">Password</label><span>*</span>
                                        <input id="contract_password" type="password" name="contract_password" class="form-control contract_password" value="<?php echo isset($view[0]->contract_password) ? $view[0]->contract_password : '';?>"><i class="fa fa-eye form-control-feedback" onclick="myFunction_contract()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contracts_address">Address</label><span>*</span>
                                    <textarea id="contracts_address" name="contracts_address" class="form-control contracts_address"><?php echo isset($view[0]->contracts_address) ? $view[0]->contracts_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <span>Finance Team</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" class="filled-in"  name="check3" id="check3" />
                                    <label for="check3">Same as above</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_fname">First Name</label><span>*</span>
                                    <input  type="text" name="finance_fname"  class="form-control finance_fname" value="<?php echo isset($view[0]->finance_name) ? $view[0]->finance_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_lname">Last Name</label>
                                    <input  type="text" name="finance_lname" class="form-control finance_lname" value="<?php echo isset($view[0]->finance_lname) ? $view[0]->finance_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="finance_phone">Phone</label><span>*</span>
                                    <input id="finance_phone" type="number" name="finance_phone" class="hide-spinner form-control finance_phone" value="<?php echo isset($view[0]->finance_number) ? $view[0]->finance_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_mobile">Mobile</label><span>*</span>
                                    <input id="finance_mobile" type="number" name="finance_mobile" class="hide-spinner form-control finance_mobile" value="<?php echo isset($view[0]->finance_mobile) ? $view[0]->finance_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="finance_mail">Email</label><span>*</span>
                                    <input id="finance_mail" type="email" name="finance_mail" class="form-control finance_mail" value="<?php echo isset($view[0]->finance_mail) ? $view[0]->finance_mail : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="finance_mail">Password</label><span>*</span>
                                        <input id="finance_password" type="password" name="finance_password" class="form-control finance_password" value="<?php echo isset($view[0]->finance_password) ? $view[0]->finance_password : '';?>"><i class="fa fa-eye form-control-feedback" onclick="myFunction_finance()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="finance_address">Address</label><span>*</span>
                                    <textarea id="finance_address" name="finance_address" class="form-control finance_address"><?php echo isset($view[0]->finance_address) ? $view[0]->finance_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" id="hotel_tab_6" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Submit">
                                    <input type="button" id="hotel_tab_6_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                                </div>
                            </div>                           
                    </div>
                </div>
                <!-- <div id="menu6" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <?php if (isset($_REQUEST['hotels_edit_id'])) { ?>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Contract ID</label>
                                <input  type="text" readonly  class="form-control contract_id" value="<?php echo isset($view[0]->contract_id) ? $view[0]->contract_id : '' ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Hotel ID</label>
                                <input  type="text" readonly class="form-control" value="<?php echo isset($view[0]->hotel_code) ? $view[0]->hotel_code : '' ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Contract Type</label><span>*</span>
                                <select name="contract_type" id="contract_type">
                                    <?php foreach ($contract_type as $key => $value) { ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Classification</label><span>*</span>
                                <select name="classification" id="classification">
                                    <?php foreach ($classification as $key => $value) { ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Application</label><span>*</span>
                                <select name="application" id="application">
                                    <?php foreach ($application as $key => $value) { ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="t5-n2">Max child Age</label><span>*</span>
                                <select name="max_child_age" id="max_child_age">
                                    <?php for ($i=1; $i < 12; $i++) { 
                                        if ($view[0]->max_child_age==$i) { ?>
                                            <option selected="selected" value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } else { ?>
                                            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Rate Type</label><span>*</span>
                                <select name="rate_type" id="rate_type">
                                    <?php foreach ($rate_type as $key => $value) { ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Tax percentage(%)</label><span>*</span>
                                <input type="number" class="form-control" name="tax_percentage" id="tax_percentage" value="<?php echo isset($view[0]->tax_percentage) ? $view[0]->tax_percentage : ''?>">
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Markup(%)</label><span>*</span>
                                <input  type="number" name="markup"  class="form-control" id="markup" value="<?php echo isset($view[0]->markup) ? $view[0]->markup : '' ?>">
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Credit Limit</label><span>*</span>
                                <input  type="number" name="credit_limit"  class="form-control" id="credit_limit" value="<?php echo isset($view[0]->credit_limit) ? $view[0]->credit_limit : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Credit Period</label><span>*</span>
                                <input  type="number" name="credit_period" class="form-control" id="credit_period" value="<?php echo isset($view[0]->credit_period) ? $view[0]->credit_period : '';?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Pay mode</label><span>*</span>
                                <select name="pay_mode" id="pay_mode">
                                    <?php foreach ($pay_mode as $key => $value) { ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Cheque No</label>
                                <input  type="text" name="check_number" class="form-control" id="check_number" value="<?php echo isset($view[0]->cheque_no) ? $view[0]->cheque_no : '';?>">
                            </div>                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Bank Name</label>
                                <input  type="text" id="bank_name" name="bank_name"  class="form-control" value="<?php echo isset($view[0]->bank_name) ? $view[0]->bank_name : '' ?>">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Account No</label>
                                <input  type="number" id="account_number" name="account_number" class="form-control " value="<?php echo isset($view[0]->account_number) ? $view[0]->account_number : '';?>">
                            </div>                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Account holder</label>
                                <input  type="text" id="account_holder" name="account_holder"  class="form-control" value="<?php echo isset($view[0]->account_holder) ? $view[0]->account_holder : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">IBAN</label>
                                <input  type="text" id="iban" name="iban" class="form-control" value="<?php echo isset($view[0]->iban) ? $view[0]->iban : '';?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">SWIFT</label>
                                <input  type="text" id="swift" name="swift"  class="form-control" value="<?php echo isset($view[0]->swift) ? $view[0]->swift : '' ?>">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">IFSC</label>
                                <input  type="text" id="ifsc" name="ifsc" class="form-control" value="<?php echo isset($view[0]->ifsc) ? $view[0]->ifsc : '';?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Hotel Admin Name</label><span>*</span>
                                <input  type="text" id="hotel_admin_name" name="hotel_admin_name"  class="form-control" value="<?php echo isset($view[0]->hotel_admin_name) ? $view[0]->hotel_admin_name : '' ?>">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Admin Email</label><span>*</span>
                                <input  type="text" id="hotel_admin_email" name="hotel_admin_email" class="form-control" value="<?php echo isset($view[0]->hotel_admin_email) ? $view[0]->hotel_admin_email : '';?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="button" id="hotel_tab_7" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Next">
                                <input type="button" id="hotel_tab_7_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div id="menu7" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="form-group col-md-12 imp_remarks">
                                <label for="t5-n1">Important Remarks & Policies</label>
                                <textarea class="form-control" name="imp_remarks" id="imp_remarks" ><?php echo isset($view[0]->Important_Remarks_Policies) ? $view[0]->Important_Remarks_Policies : '' ?></textarea>
                                </textarea>
                            </div>
                            <div class="form-group col-md-12 cancel_policy">
                                <label for="t5-n1">Cancellation Policy</label>
                                <textarea class="form-control" name="cancel_policy" id="cancel_policy"><?php echo isset($view[0]->cancelation_policy) ? $view[0]->cancelation_policy : '' ?></textarea>
                            </div>
                            <div class="form-group col-md-12 imp_notes">
                                <label for="t5-n1">Important Notes & Conditions</label>
                                <textarea class="form-control" name="imp_notes" id="imp_notes" ><?php echo isset($view[0]->Important_Notes_Conditions) ? $view[0]->Important_Notes_Conditions : '' ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="button" id="hotel_tab_8" class="waves-effect mar_left_5 waves-light btn-sm  green col_white pull-right" value="Submit">
                                <input type="button" id="hotel_tab_8_prev" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </form>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- view modal -->
    <div class="delete_modal modal fade" id="edit_modal" role="dialog">
      <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Edit</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="get_room_name">Room name</label>
                    <input id="get_room_name" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Select room type</label>
                    <select id="get_room_type_select">
                        <option value="" selected="selected">Room Type</option>
                        <?php foreach ($room_type as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="price">Per room Price</label>
                    <input id="get_price" type="number" class="form-control">
                </div>            
                <div class="form-group col-md-6 room_facilties">
                    <label>Select room facilities</label>
                    <select multiple id="get_room_facilties">
                        <option value="" disabled selected>Room facilities</option>
                        <?php foreach ($room_facilties as $key => $value) { ?>
                            <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 room_facilties">
                    <label>Select Max Occupancy adults</label>
                    <select id="get_occupancy">
                        <option value="" disabled selected>Adults</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Select Max Occupancy childs</label>
                    <select id="get_occupancy_child">
                        <option value="" disabled selected>Children</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> child(s)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>No of room's</label>
                    <select id="get_no_of_rooms">
                        <option value="" disabled selected>Room's</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default update_button" data-dismiss="modal">update</button>
        </div>
    </div>
  </div>
</div>
<!-- Change password modal -->
    <div class="modal fade delete_modal" id="Password_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      <input type="hidden" id="hotel_id" value="<?php echo isset($_REQUEST['hotels_edit_id']) ? $_REQUEST['hotels_edit_id'] : '' ?>">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="password" name="password" id="password" placeholder="password">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="change_password" class="btn-sm btn-primary">Update</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<script src="jquery-3.2.1.min.js"></script>
<script>
    $("#menu_per").on("click", function() {
        $("#custom-select-option-box").toggle();
    });
    $('#room_facilties1').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
    $('#hotel_facilties').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 0
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>

<?php init_tail(); ?>


