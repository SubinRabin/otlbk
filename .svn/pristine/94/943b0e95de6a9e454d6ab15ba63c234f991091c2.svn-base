<?php init_head(); 
$Profilemenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Profile'); 
?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&sensor=false&libraries=places'></script>
<script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1 hotel-view-readonly">
            <h2>Hotel Details <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels"  class="btn-sm btn-primary">Back</a></span>
                <?php if ($Profilemenu[0]->edit!=0) { ?>
                <span class="pull-right"><a href="#" data-toggle="modal" data-target="#Password_modal" class="btn-sm btn-primary" style="margin-right: 5px;">Change Password</a></span><?php } ?>
            </h2>
            </br>
            <ul class="nav nav-tabs tab-list">
                <li class="home active"><a data-toggle="tab" href="#home"><i class="fa fa-map" aria-hidden="true"></i> <span>Location</span></a>
                </li>
                <li class="menu1"><a data-toggle="tab" href="#menu1"><i class="fa fa-info" aria-hidden="true"></i> <span>Details</span></a>
                </li>
                <li class="menu3"><a data-toggle="tab" href="#menu3"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Photo Gallery</span></a>
                <li class="menu4"><a data-toggle="tab" href="#menu4"><i class="fa fa-facebook" aria-hidden="true"></i> <span>Social Media</span></a>
                </li>
                <li class="menu5"><a data-toggle="tab" href="#menu5"><i class="fa fa-phone" aria-hidden="true"></i> <span>Contact Info</span></a></li>
                <!-- <li class="menu6"><a data-toggle="tab" href="#menu6"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Contract</span></a></li>
                <li class="menu7"><a data-toggle="tab" href="#menu7"><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Policies</span></a>
                </li> -->
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="box-inn-sp">
                        <div class="bor mar_top_0">
                        <div class="row">
                            <input type="hidden" id="us3-lat" />
                            <input type="hidden" id="us3-lon" />
                            <div class="form-group col-md-12">
                                <label for="us3-address">Where is the hotel location</label>
                                <input type="text" class="form-control" value="<?php echo $view[0]->location;?>">
                            </div>
                            <div class="form-horizontal col s12">
                                <div id="us3" style="width: 100%; height: 400px;"></div>
                            <script>
                                $('#us3').locationpicker({
                                    location: {
                                        latitude: <?php echo isset($view[0]->lattitude) && $view[0]->lattitude!="" ? $view[0]->lattitude : '25.253160' ?>,
                                        longitude: <?php echo isset($view[0]->longitude) && $view[0]->longitude !="" ? $view[0]->longitude : '55.328495' ?>
                                    },
                                    position:location,
                                    markerIcon: undefined,
                                    markerDraggable: false,
                                    radius: 300,
                                    styles: ['road','red'],
                                    enableAutocomplete: false,
                                    onchanged: function (currentLocation, radius, isMarkerDropped) {
                                    }
                                });
                            </script>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="bor mar_top_0">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->hotel_name;?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="property_name">Property Name</label><span>*</span>
                                    <input id="property_name" name="property_name" type="text" class="form-control" value="<?php echo isset($view[0]->property_name) ? $view[0]->property_name : '' ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="brand_name">Brand Name</label><span>*</span>
                                    <input id="brand_name" name="brand_name" type="text" class="form-control" value="<?php echo isset($view[0]->brand_name) ? $view[0]->brand_name : '' ?>" readonly>
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->city;?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>City near by places</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->city_near_by;?>" readonly>
                                </div>
                        
                                
                                <div class="form-group col-md-6">
                                    <label>City description</label>
                                    <textarea  class="form-control" readonly><?php echo $view[0]->city_description;?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Hotel facilities</label>
                                    <ul class="hotelpreferences2">
                                        <?php
                                           foreach ($hotel_facilities as $key => $value) {
                                            if (isset($value[0]->Hotel_Facility)) {
                                            ?>
                                            <li><?php echo $value[0]->Hotel_Facility ?></li>
                                        <?php } else {
                                          echo  "No Records";
                                        }
                                    } ?>
                                    </ul>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Room facilities</label>
                                    <ul class="hotelpreferences2">
                                        <?php foreach ($room_facilities as $key1 => $value3) {
                                            if (isset($value3[0]->Room_Facility)) {
                                            ?>
                                            <li><?php echo $value3[0]->Room_Facility; ?></li>
                                        <?php } else {
                                          echo  "No Records";
                                        } }?>
                                    </ul>
                                </div>

                                

                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    
                                    <p><label>Complimentry</label></p>
                                    <input class="filled-in" type="checkbox" <?php echo $view[0]->wifi=="on" ? 'Checked' : '';?> readonly>
                                    <label >Wifi </label> &nbsp&nbsp&nbsp
                                    <input class="filled-in" type="checkbox" <?php echo $view[0]->internet=="on" ? 'Checked' : '';?> readonly>
                                    <label >Internet </label>&nbsp&nbsp&nbsp
                                    <input class="filled-in" type="checkbox" <?php echo $view[0]->parking=="on" ? 'Checked' : '';?> readonly>
                                    <label >Parking </label>
                                </div>
                                <div class="form-group col-md-6">
                                        <p><label>Star Rating</label></p>
                                        <input type="radio" class="filled-in"   value="5" <?php echo $view[0]->rating=="5" ? 'Checked' : '';?>  readonly />
                                        <label for="5">5</label>
                                        &nbsp&nbsp&nbsp
                                        <input type="radio" class="filled-in"  value="4" <?php echo $view[0]->rating=="4" ? 'Checked' : '';?> readonly />
                                        <label for="4">4</label>
                                        &nbsp&nbsp&nbsp
                                        <input type="radio" class="filled-in"  value="3" <?php echo $view[0]->rating=="3" ? 'Checked' : '';?> readonly />
                                        <label for="3">3</label>
                                        &nbsp&nbsp&nbsp
                                        <input type="radio" class="filled-in"  value="2" <?php echo $view[0]->rating=="2" ? 'Checked' : '';?> readonly />
                                        <label for="2">2</label>
                                        &nbsp&nbsp&nbsp
                                        <input type="radio" class="filled-in"  value="1" <?php echo $view[0]->rating=="1" ? 'Checked' : '';?> readonly />
                                        <label for="1">1</label>
                                        &nbsp&nbsp&nbsp
                                        <input type="radio" class="with-gap" value="10" <?php echo $view[0]->rating=="10" ? "checked" : '' ?>  />
                                        <label for="10">Hotel Apartment</label>
                                        &nbsp&nbsp&nbsp
                                    </div>
                            </div>
                            <div class="row">
                               <!--  <div class="form-group col-md-6">
                                    <label>Room Aminities</label>
                                    <ul class="hotelpreferences2">
                                    <?php foreach ($room_aminities as $key5 => $value5) {
                                        if (isset($value5[0]->Aminities)) {
                                        ?>
                                        <li><?php echo $value5[0]->Aminities; ?></li>
                                    <?php } else {
                                      echo  "No Records";
                                    } }?>
                                    </ul>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label>Search keywords</label>
                                    <?php $keywords  = explode("close", $view[0]->keywords) ?>
                                    <ul class="hotelpreferences2">
                                    <?php if ($view[0]->keywords!="") {
                                     foreach ($keywords as $key10 => $value10) {
                                        if ($value10!="") {
                                        ?>
                                        <li><?php echo $value10 ?></li>
                                    <?php } } } else {  echo "No Records"; }?>
                                    </ul>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" readonly><?php echo $view[0]->hotel_description;?></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>No of Rooms</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->Number_of_room;?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Website</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->website;?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <p><label for="accepting_vcc">Accepting VCC</label></p>
                                    <input name="accepting" type="radio" class="with-gap" id="yes" <?php echo $view[0]->accepting_vcc=="0" ? 'Checked' : 'disabled';?> value="0" readonly />
                                    <label for="yes">Yes</label>
                                    <input name="accepting" type="radio" class="with-gap" id="no" <?php echo $view[0]->accepting_vcc=="1" ? 'Checked' : 'disabled';?> value="1" readonly />
                                    <label for="no">No</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Channel Manager</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->channel;?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Part of Any Chain or Collection</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->chain;?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Selling Currency</label>
                                    <input type="text" class="form-control" value="<?php echo $view[0]->sell_currency;?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php 
                                        if ($view[0]->promoteList==1) {
                                            $promoteList = "Last";
                                        } else if($view[0]->promoteList==2) {
                                            $promoteList = "Medium";
                                        } else {
                                            $promoteList = "Top";
                                        }

                                    ?>
                                    <label>Search list on</label>
                                    <input type="text" class="form-control" value="<?php echo $promoteList;?>" readonly>
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="file-field input-field">
                            <div class="row">
                                <?php for($q=1 ; $q<=5; $q++) {
                                    $image = "Image".$q;
                                    if (isset($view[0]->$image) && $view[0]->$image!="") { ?>
                                <div class="box">
                                    <div class="js--image-preview">
                                        <?php if (isset($view[0]->$image) && $view[0]->$image!="" && $q==1) { ?>
                                        <span class="image-title">Main Image</span>
                                        <?php 
                                        }
                                            if (isset($view[0]->Image1)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->$image;?>" class="img1preview" >
                                            <?php  } else { if(isset($_REQUEST['hotels_edit_id'])) { ?>
                                            <p class="center">No Records</p>
                                        <?php  } }?>
                                   </div>
                                    <div class="upload-options1">
                                        <label>
                                            <p><a href="#" data-toggle="modal" data-target="#<?php echo $image ?>"><i class="fa fa-eye"></i></a></p>
                                        </label>
                                    </div>
                                </div>
                                <?php } } 
                                    if (!isset($view[0]->Image1) ||  !isset($view[0]->Image2) || !isset($view[0]->Image3) || !isset($view[0]->Image4) || !isset($view[0]->Image5)) { ?>
                                        <p class="center">No photos available!</p>
                                 <?php   }    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="bor mar_top_0">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Facebook Url</label>
                                <input type="text" value="<?php echo $view[0]->facebook;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label >Google Plus Url</label>
                                <input type="text" value="<?php echo $view[0]->google_plus;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Twitter Url</label>
                                <input type="text" value="<?php echo $view[0]->twitter;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Linkedin Url</label>
                                <input type="text" value="<?php echo $view[0]->linked_in;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>WhatsApp Number</label>
                                <input type="text" value="<?php echo $view[0]->whatsapp;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Vk Url</label>
                                <input type="text" value="<?php echo $view[0]->vk_url;?>" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div class="bor mar_top_0">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4>Sales Team</h4>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n1">First Name</label>
                                        <input id="t5-n1" type="text" name="sales_fname"  class="form-control sales_fname" value="<?php echo $view[0]->sale_name;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n2">Last Name</label>
                                        <input id="t5-n2" type="text" name="sales_lname" class="form-control sales_lname" value="<?php echo $view[0]->sale_lname;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="t5-n3">Phone</label>
                                        <input id="t5-n3" type="number" name="sales_phone" class="form-control sales_phone" value="<?php echo $view[0]->sale_number;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n4">Mobile</label>
                                        <input id="t5-n4" type="number" name="sales_mobile" class="form-control sales_mobile" value="<?php echo $view[0]->sale_mobile;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="t5-n5">Email</label>
                                        <input id="t5-n5" type="email" name="sales_mail" class="form-control sales_mail" value="<?php echo $view[0]->sale_mail;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n6">Address</label>
                                        <textarea id="t5-n6" name="sales_address" class="form-control" readonly><?php echo $view[0]->sale_address;?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4>Revenue Team</h4>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n1">First Name</label>
                                        <input id="t5-n1" type="text" name="revenue_fname"  class="form-control revenue_fname" value="<?php echo $view[0]->revenu_name;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n2">Last Name</label>
                                        <input id="t5-n2" type="text" name="revenue_lname" class="form-control revenue_lname" value="<?php echo $view[0]->revenu_lname;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="t5-n3">Phone</label>
                                        <input id="t5-n3" type="number" name="revenue_phone" class="form-control revenue_phone" value="<?php echo $view[0]->revenu_number;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n4">Mobile</label>
                                        <input id="t5-n4" type="number" name="revenue_mobile" class="form-control revenue_mobile" value="<?php echo $view[0]->revenu_mobile;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="t5-n5">Email</label>
                                        <input id="t5-n5" type="email" name="revenue_mail" class="form-control revenue_mail" value="<?php echo $view[0]->revenu_mail;?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="t5-n6">Address</label>
                                        <textarea id="t5-n6" name="revenue_address" class="form-control" readonly><?php echo $view[0]->revenu_address;?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-12">
                                    <h4>Reservation Team</h4>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_fname">First Name</label><span>*</span>
                                    <input  id="contract_fname" type="text" name="contract_fname"  class="form-control contract_fname" value="<?php echo isset($view[0]->contract_name) ? $view[0]->contract_name : '' ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_lname">Last Name</label>
                                    <input  id="contract_lname" type="text" name="contract_lname" class="form-control contract_lname" value="<?php echo isset($view[0]->contract_lname) ? $view[0]->contract_lname : '';?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contract_phone">Phone</label><span>*</span>
                                    <input id="contract_phone" type="number" name="contract_phone" class="hide-spinner form-control contract_phone" value="<?php echo isset($view[0]->contract_number) ? $view[0]->contract_number : '';?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contract_mobile">Mobile</label><span>*</span>
                                    <input id="contract_mobile" type="number" name="contract_mobile" class="hide-spinner form-control contract_mobile" value="<?php echo isset($view[0]->contract_mobile) ? $view[0]->contract_mobile : '';?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contract_mail">Email</label><span>*</span>
                                    <input id="contract_mail" type="email" name="contract_mail" class="form-control contract_mail" value="<?php echo isset($view[0]->contract_mail) ? $view[0]->contract_mail : '';?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contracts_address">Address</label><span>*</span>
                                    <textarea id="contracts_address" name="contracts_address" class="form-control contracts_address" readonly><?php echo isset($view[0]->contracts_address) ? $view[0]->contracts_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4>Finance Team</h4>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_fname">First Name</label><span>*</span>
                                    <input id="finance_fname" type="text" name="finance_fname"  class="form-control finance_fname" value="<?php echo isset($view[0]->finance_name) ? $view[0]->finance_name : '' ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_lname">Last Name</label>
                                    <input  type="text" name="finance_lname" class="form-control finance_lname" value="<?php echo isset($view[0]->finance_lname) ? $view[0]->finance_lname : '';?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="finance_phone">Phone</label><span>*</span>
                                    <input id="finance_phone" type="number" name="finance_phone" class="hide-spinner form-control finance_phone" value="<?php echo isset($view[0]->finance_number) ? $view[0]->finance_number : '';?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_mobile">Mobile</label><span>*</span>
                                    <input id="finance_mobile" type="number" name="finance_mobile" class="hide-spinner form-control finance_mobile" value="<?php echo isset($view[0]->finance_mobile) ? $view[0]->finance_mobile : '';?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="finance_mail">Email</label><span>*</span>
                                    <input id="finance_mail" type="email" name="finance_mail" class="form-control finance_mail" value="<?php echo isset($view[0]->finance_mail) ? $view[0]->finance_mail : '';?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finance_address">Address</label><span>*</span>
                                    <textarea id="finance_address" name="finance_address" class="form-control finance_address" readonly><?php echo isset($view[0]->finance_address) ? $view[0]->finance_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row"
>                                <div class="form-group col-md-12">
                                    <input type="button" id="hotel_tab_6" class="waves-effect mar_left_5 waves-light btn-sm  teal darken-3 col_white pull-right" value="Next">
                                    <input type="button" id="hotel_tab_6_prev" class="waves-effect  waves-light btn-sm  teal darken-3 col_white pull-right" value="Previous">
                                </div>
                            </div>
                        </div>
                </div>
                <!-- <div id="menu6" class="tab-pane fade">
                    <div class="bor mar_top_0">
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
                      
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Contract Type</label><span>*</span>
                                 <input  type="text" name="contract_type"  class="form-control" id="contract_type" value="<?php echo isset($view[0]->contract_type) ? $view[0]->contract_type: '' ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Classification</label><span>*</span>
                                <input  type="text" name="classification"  class="form-control" id="classification" value="<?php echo isset($view[0]->classification) ? $view[0]->classification: '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Application</label><span>*</span>
                                 <input  type="text" name="application"  class="form-control" id="application" value="<?php echo isset($view[0]->application) ? $view[0]->application: '' ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Max child Age</label><span>*</span>
                                 <input  type="number" name="max_child_age"  class="form-control" id="max_child_age" value="<?php echo isset($view[0]->max_child_age) ? $view[0]->max_child_age : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Rate Type</label><span>*</span>
                                 <input  type="text" name="rate_type"  class="form-control" id="rate_type" value="<?php echo isset($view[0]->rate_type) ? $view[0]->rate_type : '' ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Tax percentage(%)</label><span>*</span>
                                 <input  type="number" name="tax_percentage"  class="form-control" id="tax_percentage" value="<?php echo isset($view[0]->tax_percentage) ? $view[0]->tax_percentage: '' ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Markup(%)</label><span>*</span>
                                <input  type="number" name="markup"  class="form-control" id="markup" value="<?php echo isset($view[0]->markup) ? $view[0]->markup : '' ?>" readonly>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Credit Limit</label><span>*</span>
                                <input  type="number" name="credit_limit"  class="form-control" id="credit_limit" value="<?php echo isset($view[0]->credit_limit) ? $view[0]->credit_limit : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Credit Period</label><span>*</span>
                                <input  type="Number" name="credit_period" class="form-control" id="credit_period" value="<?php echo isset($view[0]->credit_period) ? $view[0]->credit_period : '';?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Pay mode</label><span>*</span>
                                 <input  type="text" name="pay_mode"  class="form-control" id="pay_mode" value="<?php echo isset($view[0]->pay_mode) ? $view[0]->pay_mode: '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Cheque No</label><span>*</span>
                                <input  type="text" name="check_number" class="form-control" id="check_number" value="<?php echo isset($view[0]->cheque_no) ? $view[0]->cheque_no : '';?>" readonly>
                            </div>                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Bank Name</label><span>*</span>
                                <input  type="text" id="bank_name" name="bank_name"  class="form-control" value="<?php echo isset($view[0]->bank_name) ? $view[0]->bank_name : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Account No</label><span>*</span>
                                <input  type="number" id="account_number" name="account_number" class="form-control " value="<?php echo isset($view[0]->account_number) ? $view[0]->account_number : '';?>" readonly>
                            </div>                        
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Account holder</label><span>*</span>
                                <input  type="text" id="account_holder" name="account_holder"  class="form-control" value="<?php echo isset($view[0]->account_holder) ? $view[0]->account_holder : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="t5-n2">IBAN</label><span>*</span>
                                <input  type="text" id="iban" name="iban" class="form-control" value="<?php echo isset($view[0]->iban) ? $view[0]->iban : '';?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">SWIFT</label><span>*</span>
                                <input  type="text" id="swift" name="swift"  class="form-control" value="<?php echo isset($view[0]->swift) ? $view[0]->swift : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">IFSC</label><span>*</span>
                                <input  type="text" id="ifsc" name="ifsc" class="form-control" value="<?php echo isset($view[0]->ifsc) ? $view[0]->ifsc : '';?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t5-n1">Hotel Admin Name</label><span>*</span>
                                <input  type="text" id="hotel_admin_name" name="hotel_admin_name"  class="form-control" value="<?php echo isset($view[0]->hotel_admin_name) ? $view[0]->hotel_admin_name : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-6">
                                <label for="t5-n2">Admin Email</label><span>*</span>
                                <input  type="text" id="hotel_admin_email" name="hotel_admin_email" class="form-control" value="<?php echo isset($view[0]->hotel_admin_email) ? $view[0]->hotel_admin_email : '';?>" readonly>
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
               <!--  <div id="menu7" class="tab-pane fade">
                        <div class="bor mar_top_0">
                            <div class="row">
                                <div class="form-group col-md-12 imp_remarks">
                                    <label for="t5-n1">Important Remarks & Policies</label>
                                    <div class="form-control word_wrap"><?php echo isset($view[0]->Important_Remarks_Policies) ? $view[0]->Important_Remarks_Policies : '' ?></div>
                                </div>
                                <div class="form-group col-md-12 cancel_policy">
                                    <label for="t5-n1">Cancellation Policy</label>
                                    <div class="form-control word_wrap"><?php echo isset($view[0]->cancelation_policy) ? $view[0]->cancelation_policy : '' ?></div>
                                </div>
                                <div class="form-group col-md-12 imp_notes">
                                    <label for="t5-n1">Important Notes & Conditions</label>
                                    <div class="form-control word_wrap" ><?php echo isset($view[0]->Important_Notes_Conditions) ? $view[0]->Important_Notes_Conditions : '' ?></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                <?php if ($this->session->userdata('role')!=3) { ?>
                    <?php if ($view[0]->hotels_delflg==2) { ?>
                        <a href="<?php echo base_url(); ?>backend/hotels/permission?id=<?php echo $view[0]->hotels_edit_id ?>&&flag=1" class="waves-effect waves-light btn pull-right teal darken-4">Accept</a>
                    <?php } else if ($view[0]->hotels_delflg==1) { ?>
                        <?php if ($Profilemenu[0]->edit!=0) { ?>
                        <a href="<?php echo base_url(); ?>backend/hotels/permission?id=<?php echo $view[0]->hotels_edit_id ?>&&flag=0" class="waves-effect waves-light btn-sm pull-right btn-danger">Reject</a> <?php } ?>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>backend/hotels/permission?id=<?php echo $view[0]->hotels_edit_id ?>&&flag=1" class="waves-effect waves-light btn-sm pull-right btn-danger">Unblocked</a>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<!-- Change password modal -->
    <div class="modal fade delete_modal" id="Password_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      <input type="hidden" id="hotel_id" value="<?php echo $_REQUEST['id'] ?>">
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

<?php for($q=1 ; $q<=5; $q++) {
    $image = "Image".$q;
    if (isset($view[0]->$image) && $view[0]->$image!="") {
    ?>

<div class="modal fade delete_modal" id="<?php echo $image ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    
  <div class="modal-dialog" role="document">
        <img alt="" src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotels_edit_id; ?>/<?php echo $view[0]->$image;?>">
    
  </div>
  <div class="col-md-3"></div>
  </div>
 </div>
</div>

<?php } } ?>
<?php init_tail(); ?>

