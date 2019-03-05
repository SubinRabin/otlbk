  <?php init_hotel_login_header(); ?>

<div class="dashboard-right offset-0">
    <!-- Tab panes from left menu -->
    <div class="tab-content5 cpadding40">
                <div class="tab-pane " id="details">
                        <div class="padding40">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="btn-toolbar pull-right">
                                        <button class="btn btn-info hide" id="hotel_login_detail_back" name="hotel_login_detail_back"><i class="fa fa-hand-o-left"></i>&nbsp;Back</button>
                                        <div id="hidden-div">
                                        <button class="btn btn-info" id="hotel_login_edit" name="hotel_login_edit"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo base_url(); ?>backend/hotels/updating_hotel_details" name="hotel_log_detail" id="hotel_log_detail" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">Hotel Name</label><span class="popup_err">*</span>
                                        <input class="form-control" id="hotel_name" name="hotel_name" type="text" value="<?php echo ($view[0]['hotel_name']); ?>" readonly >
                                        <span class="hotel_name_err popup_err blink_me"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">City</label><span class="popup_err">*</span>
                                        <input class="form-control" id="city" name="city" type="text" value="<?php echo ($view[0]['city']); ?>" readonly>
                                        <span class="city_err popup_err blink_me"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">City Near by Places</label><span class="popup_err">*</span>
                                        <input class="form-control" id="citynearby" name="citynearby" type="text" value="<?php echo ($view[0]['city_near_by']); ?>" readonly>
                                        <span class="citynearby_err popup_err blink_me"></span>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="" class="control-label">Select Hotel Facilities</label>
                                        <select class="form-control multi-select2" id="hotel_facilties" name="hotel_facilties" data-placeholder="Select Facilities" multiple="multiple" disabled>
                                                <?php foreach ($hotel_facilities as $key =>
                                                $value) { ?>
                                                <option selected data-icon="<?php echo base_url() ?><?php echo $value[0]->icon_src ?>" value="<?php echo $value[0]->id ?>">
                                                    <?php echo $value[0]->Hotel_Facility ?>
                                                </option>
                                                <?php  } ?>
                                            </select>
                                <!-- <span class="hotel_facilties_err popup_err blink_me"></span> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                   <label for="" class="control-label">Select Room Facilities</label>
                                        <select class="form-control multi-select2" id="room_facilties1" data-placeholder="Select Facilities" multiple="multiple" name="room_facilties1[]" disabled>
                                           <?php foreach ($room_facilities as $key =>
                                           $value) { ?>
                                           <option selected data-icon="<?php echo base_url() ?><?php echo $value[0]->icon_src ?>" value="<?php echo $value[0]->id ?>">
                                               <?php echo $value[0]->Room_Facility ?>
                                           </option>
                                           <?php  } ?>
                                        </select>
                                        <!-- <span class="room_facilties1_err popup_err blink_me"></span> -->
                                    </div>
                                </div>
                                         <div class="form-group col-md-6">
                                    <p><label>Complimentry</label></p>
                                    <?php if (($view[0]['wifi'])=='on') { ?>
                                    <input checked="" class="filled-in" id="wifi" name="wifi" type="checkbox" value="on"/>
                                    <?php } else{ ?>
                                    <input class="filled-in" id="wifi" name="wifi" type="checkbox" value="on"/>
                                    <?php } ?><label for="wifi">Wifi</label>
                                    <?php if (($view[0]['internet'])=='on') { ?>
                                    <input checked="" class="filled-in" id="Internet" name="internet" type="checkbox" value="on"/>
                                    <?php } else{ ?>
                                    <input class="filled-in" id="Internet" name="internet" type="checkbox" value="on"/>
                                    <?php } ?><label for="Internet">Internet</label>
                                    <?php if (($view[0]['parking'])=='on') { ?>
                                    <input checked="" class="filled-in" id="parking" name="parking" type="checkbox" value="on"/>
                                    <?php } else{ ?>
                                    <input class="filled-in" id="parking" name="parking" type="checkbox" value="on"/>
                                    <?php } ?>
                                    <label for="parking">parking</label>
                                </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                               <label for=""  class="control-label">Star Rating</label><span class="popup_err">*</span>
                                               <div class="form-control" id="starr" name="starr" >
                                               <?php if (($view[0]['rating'])==5) { ?>
                                               <input checked="" class="filled-in" id="5" name="rating" type="radio" value="5" />
                                               <?php } else{ ?>
                                               <input  class="filled-in" id="5" name="rating" type="radio" value="5" />
                                               <?php } ?>
                                               <label for="5">5</label>
                                               <?php if (($view[0]['rating'])==4) { ?>
                                               <input checked="" class="filled-in" id="4" name="rating" type="radio" value="4" />
                                                <?php } else{ ?>
                                               <input class="filled-in" id="4" name="rating" type="radio" value="4" />
                                               <?php } ?>
                                               <label for="4">4</label>
                                                <?php if (($view[0]['rating'])==3) { ?>
                                               <input checked="" class="filled-in" id="3" name="rating" type="radio" value="3" />
                                               <?php } else{ ?>
                                               <input class="filled-in" id="3" name="rating" type="radio" value="3" />
                                               <?php } ?>
                                               <label for="3">3</label>
                                               <?php if (($view[0]['rating'])==2) { ?>
                                               <input checked="" class="filled-in" id="2" name="rating" type="radio" value="2" />
                                               <?php } else { ?>
                                               <input class="filled-in" id="2" name="rating" type="radio" value="2" />
                                               <?php } ?>
                                               <label for="2">2</label>
                                               <?php if (($view[0]['rating'])==1) { ?>
                                               <input checked="" class="filled-in" id="1" name="rating" type="radio" value="1" />
                                               <?php } else { ?>
                                               <input  class="filled-in" id="1" name="rating" type="radio" value="1"onclick="return false;" />
                                               <?php } ?>
                                               <label for="1">1</label>
                                           </div>
                                           <span class="starr_err popup_err blink_me"></span>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">City Description</label><span class="popup_err">*</span>
                                        <textarea readonly class="form-control" rows="4" id="citydes" name="citydes" type="text" ><?php echo ($view[0]['city_description']);  ?>
                                        </textarea>
                                         <span class="citydes_err popup_err blink_me"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">No of Rooms</label><span class="popup_err">*</span>
                                                <input class="form-control" id="total_no_of_rooms" name="total_no_of_rooms" type="text" value="<?php echo ($view[0]['Number_of_room']); ?>" readonly>
                                         <span class="total_no_of_rooms_err popup_err blink_me"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="" class="control-label">Website</label><span class="popup_err">*</span>
                                               <input class="form-control" id="Website" name="Website" type="text" value="<?php echo ($view[0]['website']); ?>" readonly>
                                         <span class="Website_err popup_err blink_me"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="" class="control-label">Accepting VCC</label><span class="popup_err">*</span>
                                               <input class="form-control" id="accept_vcc" name="accept_vcc" type="text" value="<?php echo ($view[0]['accepting_vcc']); ?>" readonly>
                                         <span class="accept_vcc_err popup_err blink_me"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="" class="control-label">Channel Manager:(if any)</label>
                                               <input class="form-control" id="channel_manager" name="channel_manager" type="text" value="<?php echo ($view[0]['channel']); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">Hotel Descriptions:</label><span class="popup_err">*</span>
                                        <textarea readonly class="form-control" rows="4" id="hotel_description" name="hotel_description"><?php echo ($view[0]['hotel_description']); ?>
                                        </textarea>
                                         <span class="hotel_description_err popup_err blink_me"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">Part of Any Chain or Collection</label>
                                        <input class="form-control" id="part_of_chain" name="part_of_chain" type="text" value="<?php echo ($view[0]['chain']); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">Selling Currency</label><span class="popup_err">*</span>
                                        <select id="sell_currency" class="form-control" name="sell_currency" disabled >
                                           <?php if (($view[0]['sell_currency'])==AED) {?>
                                            <option selected="selected" >Dirham (AED)</option>
                                            <?php } else{ ?>
                                            <option value="AED">Dirham (AED)</option>
                                            <?php }  if (($view[0]['sell_currency'])==USD) {?>
                                            <option selected="selected" >Dollars (USD)</option>
                                            <?php } else{ ?>
                                            <option value="USD">Dollars (USD)</option>
                                            <?php }  if (($view[0]['sell_currency'])==INR) {?>
                                            <option selected="selected" >Rupees (INR)</option>
                                            <?php } else{ ?>
                                            <option value="INR">Rupees (INR)</option>
                                            <?php }  if (($view[0]['sell_currency'])==GBP) {?>
                                            <option selected="selected" >Pounds (GBP)</option>
                                            <?php } else{ ?>
                                            <option value="GBP">Pounds (GBP)</option>
                                            <?php }  if (($view[0]['sell_currency'])==EUR) {?>
                                            <option selected="selected" >Euro (EUR)</option>
                                            <?php } else{ ?>
                                            <option value="EUR">Euro (EUR)</option>
                                            <?php } ?>
                                        </select>
                                         <span class="sell_currency_err popup_err blink_me"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""  class="control-label">Hotel Location</label><span class="popup_err">*</span>
                                        <input id="locationss" class="form-control" type="text" value="<?php echo ($view[0]['location']); ?>" readonly>
                                         <span class="locationss_err popup_err blink_me"></span>
                                    </div>
                                </div>
                            </div>

                            <input id="us3-lat" type="hidden"/>
                            <input id="us3-lon" type="hidden"/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div id="us3" style="width: 100%; height: 350px;"></div>
                                        <script>
                                            $('#us3').locationpicker({
                                                location: {   
                                                    latitude: <?php echo ($view[0]['lattitude']); ?>,
                                                    longitude: <?php echo ($view[0]['longitude']); ?>
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

                            <div class="col-sm-12">
                                <div class="row" style="margin-top: 10px;">
                                    <button class="btn btn-info pull-right hide"  id="hotel_login_detail_update" name="hotel_login_detail_update" type="button" >Save</button>
                                </div>
                            </div>
                        </div>
                   </form> 
                </div>
                <div class="clearfix">
</div>
</div></div>
<!-- END OF CONTENT -->
<?php init_hotel_login_footer(); ?>