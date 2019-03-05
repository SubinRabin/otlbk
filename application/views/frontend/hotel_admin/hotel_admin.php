<?php
   // print_r($hotel_facilities[0][0]->Hotel_Facility);
   // print_r($room_facilities[0][0]->Room_Facility);
   // exit();
  ?><script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
<?php init_hotel_login_header(); ?>
                <!-- DASHBOARD -->
                <div class="tab-pane active" id="profile">
                    <div class="padding40">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-credit-card fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content dark-blue">
                                  <div class="circle-tile-number text-faded">Rooms</div>
                                  <div class="circle-tile-description text-faded">Active<span class="countervenue"><?php echo $hotels_rooms_active_counts; ?></span><span>:</span></div>
                                  <div class="circle-tile-description text-faded">Inactive<span class="countervenue"><?php echo $hotels_rooms_inactive_counts; ?></span><span>:</span></div>
                                  <div class="circle-tile-description text-faded"> Total<span class="countervenue"><?php echo $hotels_rooms_inactive_counts+$hotels_rooms_active_counts; ?></span><span>:</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading light-blue"><i class="fa fa-gift fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content light-blue">
                                  <div class="circle-tile-number text-faded">Rewards</div>
                                  <div class="circle-tile-description text-faded">Pending<span class="countervenue">0</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded">Accumulated<span class="countervenue">0</span><span>:</span></div>
                                  <div class="circle-tile-description text-faded"> Total<span class="countervenue">0</span><span>:</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="circle-tile ">
                                <a href="#"><div class="circle-tile-heading light-green"><i class="fa fa-hotel fa-fw fa-3x"></i></div></a>
                                <div class="circle-tile-content light-green">
                                    <div class="circle-tile-number text-faded">Bookings</div>
                                    <div class="circle-tile-description text-faded">Confirmed<span class="countervenue"><?php echo $confirm_count; ?></span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Cancelled<span class="countervenue"><?php echo $cancel_count; ?></span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">On Request<span class="countervenue"><?php echo $request_count; ?></span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Rejected<span class="countervenue"><?php echo $reject_count; ?></span><span>:</span></div>
                                    <div class="circle-tile-description text-faded">Total<span class="countervenue"><?php echo $confirm_count+$cancel_count+$request_count+$reject_count ?></span><span>:</span></div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    </div>
                </div>

<!-- delete beloW -->


<div class="clearfix">
</div>
<!-- END OF CONTENT -->
<?php init_hotel_login_footer(); ?>
