<?php init_hotel_login_header(); ?>
<!-- RIGHT CPNTENT -->
<div class="dashboard-right offset-0">
    <!-- Tab panes from left menu -->
    <div class="tab-content5">
        <!-- TAB 1 -->
<!--         <ul class="d-status">
            <li>
                <a data-content="No new messages..." data-original-title="<span class='dark bold'>Notifications</span>" href="#" id="messages">
                    Available Room
                    <span class="d-mes active">
                        3
                    </span>
                </a>
            </li>
            <li class="popwidth">
                <a data-content="fdsfd" href="#" id="tasks">
                    Booked Room
                    <span class="d-tas active">
                        6
                    </span>
                </a>
            </li>
        </ul> -->
        <br>
            <div class="line2"></div>
                <div class="tab-pane cpadding40 active" id="profile">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-credit-card fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content dark-blue">
                                  <div class="circle-tile-number text-faded">Credit Info</div>
                                  <div class="circle-tile-description text-faded">Available<span class="countervenue">1890 AED</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded">Used<span class="countervenue">610 AED</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded"> Limit<span class="countervenue">2500 AED</span><span>:</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-gift fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content dark-blue">
                                  <div class="circle-tile-number text-faded">Rewards</div>
                                  <div class="circle-tile-description text-faded">Pending<span class="countervenue">3</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded">Accumulated<span class="countervenue">3</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded"> Total<span class="countervenue">8</span><span>:</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-hotel fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content dark-blue">
                                    <div class="circle-tile-number text-faded">Bookings</div>
                                    <div class="circle-tile-description text-faded">Confirmed<span class="countervenue">22</span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Cancelled<span class="countervenue">22</span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">On Request<span class="countervenue">22</span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">In Process<span class="countervenue">22</span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Rejected<span class="countervenue">22</span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Total<span class="countervenue">33</span><span>:</span></div>
                                </div>
                            </div>  
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- END OF TAB 1 -->
                <!-- DROPDOWN 1 -->
                <div class="tab-pane padding40" id="dropdown1">
                    Rooooooom
                </div>
                <!-- END OF DROPDOWN 1 -->
                <!-- DROPDOWN 2 -->
                <div class="tab-pane padding40" id="dropdown2">
                    Rooooms detailssssssss
                </div>
                <!-- END OF DROPDOWN 2 -->
                <!-- TAB 2 -->
                <div class="tab-pane" id="details">
                    <div class="padding40">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="hotel_name">
                                    Hotel Name
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="hotel_name" name="hotel_name" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">
                                    City
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="city" name="city" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="citynearby">
                                    City near by places
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="citynearby" name="citynearby" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="citydes">
                                    City description
                                </label>
                                <span>
                                    *
                                </span>
                                <textarea class="form-control" id="citydes" name="citydes" type="text">
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>
                                    Select hotel facilities
                                </label>
                                <span>
                                    *
                                </span>
                                <select class="form-control mySelectBoxClass hasCustomSelect" id="hotel_facilties" multiple="" name="hotel_facilties[]">
                                    <option value="">
                                        Hotel facilities
                                    </option>
                                    <option value="">
                                        Hotel facilities
                                    </option>
                                    <option value="">
                                        Hotel facilities
                                    </option>
                                    <?php foreach ($hotel_facilties as $key =>
                                    $value) { ?>
                                    <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id ?>">
                                        <?php echo $value->
                                        Hotel_Facility ?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>
                                    Select room facilities *
                                </label>
                                <select class="form-control" id="room_facilties1" multiple="" name="room_facilties1[] ">
                                    <option disabled="" value="">
                                        Room facilities
                                    </option>
                                    <span>
                                        *
                                    </span>
                                    <?php foreach ($room_facilties as $key =>
                                    $value) { ?>
                                    <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id ?>">
                                        <?php echo $value->
                                        Room_Facility ?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <p>
                                    <label>
                                        Complimentry
                                    </label>
                                </p>
                                <input class="filled-in" id="wifi" name="wifi" type="checkbox" value="on"/>
                                <label for="wifi">
                                    Wifi
                                </label>
                                <input class="filled-in" id="Internet" name="internet" type="checkbox" value="on"/>
                                <label for="Internet">
                                    Internet
                                </label>
                                <input class="filled-in" id="parking" name="parking" type="checkbox" value="on"/>
                                <label for="parking">
                                    parking
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <p>
                                    <label>
                                        Star Rating
                                    </label>
                                </p>
                                <input class="filled-in" id="5" name="rating" type="radio" value="5"/>
                                <label for="5">
                                    5
                                </label>
                                <input class="filled-in" id="4" name="rating" type="radio" value="4"/>
                                <label for="4">
                                    4
                                </label>
                                <input class="filled-in" id="3" name="rating" type="radio" value="3"/>
                                <label for="3">
                                    3
                                </label>
                                <input class="filled-in" id="2" name="rating" type="radio" value="2"/>
                                <label for="2">
                                    2
                                </label>
                                <input checked="" class="filled-in" id="1" name="rating" type="radio" value="1"/>
                                <label for="1">
                                    1
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="chips chips-placeholder">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="hotel_description">
                                    Hotel Descriptions:
                                </label>
                                <span>
                                    *
                                </span>
                                <textarea class="form-control" id="hotel_description" name="hotel_description">
                                </textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="total_no_of_rooms">
                                    No of Rooms
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="total_no_of_rooms" name="total_no_of_rooms" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Website">
                                    Website
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="Website" name="Website" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="accept_vcc">
                                    Accepting VCC
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="accept_vcc" name="accept_vcc" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="channel_manager">
                                    Channel Manager:(if any)
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="channel_manager" name="channel_manager" type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="part_of_chain">
                                    Part of Any Chain or Collection
                                </label>
                                <span>
                                    *
                                </span>
                                <input class="form-control" id="part_of_chain" name="part_of_chain" type="text">
                                </input>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-12">
                                <div class="chips2 chips-placeholder1">
                                </div>
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="sell_currency">
                                    Selling Currency
                                </label>
                                <span>
                                    *
                                </span>
                                <select id="sell_currency" class="form-control" name="sell_currency">
                                    <option selected="selected" value="AED">
                                        Dirham (AED)
                                    </option>
                                    <option value="USD">
                                        Dollars (USD)
                                    </option>
                                    <option value="INR">
                                        Rupees (INR)
                                    </option>
                                    <option value="GBP">
                                        Pounds (GBP)
                                    </option>
                                    <option value="EUR">
                                        Euro (EUR)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <input id="us3-lat" type="hidden"/>
                        <input id="us3-lon" type="hidden"/>
                        <div class="form-group col-md-12">
                            <label for="us3-address">
                                Where is the hotel location
                            </label>
                            <input class="form-control" type="text" value="5">
                            </input>
                        </div>
                        <div class="form-horizontal col s12">
                            <div id="us3" style="width: 100%; height: 400px;">
                            </div>
                            <script>
                                $('#us3').locationpicker({
                                    location: {
                                        latitude: 46.6863481,
                                        longitude: 7.863204900000028
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
                <!-- END OF TAB 2 -->
                <!-- TAB 3 -->
                <div class="tab-pane" id="payment">
                    <div class="padding40">
                        paymentpaymentpaymentpaymentpaymentpaymentpayment
                    </div>
                </div>
                <!-- END OF TAB 3 -->
                <!-- TAB 4 -->
                <div class="tab-pane" id="photo">
                    <div class="padding40">
                        photophotophotophotophoto
                    </div>
                </div>
                <!-- END OF TAB 4 -->
                <!-- TAB 5 -->
                <div class="tab-pane" id="social">
                    <div class="padding40">
                        socialsocialsocialsocialsocial
                    </div>
                </div>
                <!-- END OF TAB 5 -->
                <!-- TAB 6 -->
                <div class="tab-pane" id="Contact">
                    <div class="padding40">
                        ContactContactContactContact
                    </div>
                </div>
                <!-- END OF TAB 6 -->
                <!-- TAB 7 -->
                <div class="tab-pane" id="policy">
                    <div class="padding40">
                        policypolicypolicypolicypolicy
                    </div>
                </div>
                <!-- END OF TAB 7 -->
                <!-- TAB 12 -->
                <div class="tab-pane" id="photo">
                    <div class="padding40">
                        Photoseeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee - comingsoon
                    </div>
                </div>
                <!-- END OF TAB 12 -->
            </br>
        </br>
    </div>
</div>
<!-- End of Tab panes from left menu -->
<!-- END OF RIGHT CPNTENT -->
<div class="clearfix">
</div>
<!-- END OF CONTENT -->
<?php init_hotel_login_footer(); ?>
