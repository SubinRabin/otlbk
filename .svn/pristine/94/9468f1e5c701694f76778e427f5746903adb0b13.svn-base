<?php init_hotel_login_header();
$menu = hotel_menu_permission();
 ?>
  	<!-- Content Here -->
<?php if (isset($_REQUEST['proc'])) { ?>
 <script type="text/javascript">
    AddToast('success','Hotel Details Update Successfully','!');
  </script>
  <?php } ?>
        <div class="padding10">
	        <div class="row">
                <div class="tab-pane " id="details">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="col-md-6 pad_left_0">
                        <h3>Hotel Details</h3>
                      </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="btn-toolbar pull-right">
                                    <?php if ($menu[0]->edit_profile=="1"){ ?>
                                    <button class="btn  hide" id="hotel_login_detail_back" name="hotel_login_detail_back"><i class="fa fa-hand-o-left"></i>&nbsp;Back</button>
                                    <div id="hidden-div">
                                    <button class="btn btn-info" id="hotel_login_edit" name="hotel_login_edit"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="<?php echo base_url(); ?>dashboard/updating_hotel_details" name="hotel_log_detail" id="hotel_log_detail" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Hotel Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="hotel_name" name="hotel_name" type="text" value="<?php echo $view[0]['hotel_name']; ?>" readonly >
                                    <span class="hotel_name_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                    <label for="" class="control-label">Market</label><span class="popup_err">*</span>
                                    <input class="form-control" id="market" name="market" type="text" value="<?php echo $view[0]['market']; ?>" readonly >
                                    <span class="market_err popup_err blink_me"></span>
                                </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                    <label for="" class="control-label">Property Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="property_name" name="property_name" type="text" value="<?php echo $view[0]['property_name']; ?>" readonly >
                                    <span class="property_name_err popup_err blink_me"></span>
                                </div>
                              </div>
                            </div>
                             <div class="row">
                              <div class="col-md-4">
                              <div class="form-group">
                                    <label for="" class="control-label">Brand Name</label><span class="popup_err">*</span>
                                    <input class="form-control" id="brand_name" name="brand_name" type="text" value="<?php echo $view[0]['brand_name']; ?>" readonly >
                                    <span class="brand_name_err popup_err blink_me"></span>
                                </div>
                              </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">City</label><span class="popup_err">*</span>
                                    <input class="form-control" id="city" name="city" type="text" value="<?php echo $view[0]['city']; ?>" readonly>
                                    <span class="city_err popup_err blink_me"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">City Near by Places</label><span class="popup_err">*</span>
                                    <input class="form-control" id="citynearby" name="citynearby" type="text" value="<?php echo $view[0]['city_near_by']; ?>" readonly>
                                    <span class="citynearby_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div> 
                       <div class="row"> 
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="" class="control-label">City Description</label><span class="popup_err">*</span>
                              <textarea readonly class="form-control" rows="4" id="citydes" name="citydes" type="text" ><?php echo $view[0]['city_description'];  ?>
                              </textarea>
                               <span class="citydes_err popup_err blink_me"></span>
                              </div>
                          </div>
                          <!-- <div class="col-md-4">
                              <div class="form-group">
                              <label for="" class="control-label">Board</label>
                              <span class="popup_err">*</span>
                                    <select class="form-control" id="board" name="board" data-placeholder=" Board"  disabled>
                                      <?php foreach ($board as $key => $value) { ?>
                                            <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                      <?php } ?>
                                            <!-- <option value="RO">RO</option>
                                            <option value="B&B">B&B</option>
                                            <option value="HB">HB</option>
                                            <option value="FB">FB</option>
                                            <option value="AL">AL</option> -->
                                        <!-- </select>
                                <span class="board_err popup_err blink_me"></span>
                                </div> 
                            </div>  -->
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="" class="control-label">Select Hotel Facilities</label><span class="popup_err">*</span>
                                    <?php if(empty($hotel_facilities[0])){ ?>
                                    <select class="form-control multi-select2" id="hotel_facilties" name="hotel_facilties[]" data-placeholder="Select Facilities" multiple="multiple" disabled>
                                        <?php foreach ($hfacilities as $key =>$value) {?> 
                                          <option value="<?php echo ($value->id) ?>">
                                          <?php echo($value->Hotel_Facility);?>     
                                          </option> 
                                        <?php }?>
                                    </select>
                                    <?php } else{ ?>
                                      <select class="form-control multi-select2" id="hotel_facilties" name="hotel_facilties[]" data-placeholder="Select Facilities" multiple="multiple" disabled>
                                            <?php foreach ($hotel_facilities as $key =>$value) { ?>
                                            <option selected data-icon="<?php echo base_url() ?>  <?php echo $value[0]->icon_src ?>" value="<?php echo $value[0]->id ?>">
                                            <?php echo $value[0]->Hotel_Facility ?>
                                            </option>
                                            <?php  } ?>
                                            <?php foreach ($hfacilities as $key =>$value) {?>  
                                            <option value="<?php echo ($value->id) ?>"><?php echo($value->Hotel_Facility);?>
                                            </option>   <?php }?>
                                    </select>
                                <?php  } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                 <label for="" class="control-label">Select Room Facilities</label><span class="popup_err">*</span>
                                    <?php if(empty($room_facilities[0])){ ?>
                                      <select class="form-control multi-select2" id="room_facilties1" data-placeholder="Select Facilities" multiple="multiple" name="room_facilties1[]" disabled>
                                          <?php foreach ($rfacilities as $key =>$value) {   ?> 
                                            <option value="<?php echo ($value->id) ?>">
                                            <?php echo $value->Room_Facility;?>  
                                            </option> 
                                          <?php }?>
                                      </select>
                                    <?php } else{ ?>
                                      <select class="form-control multi-select2" id="room_facilties1" data-placeholder="Select Facilities" multiple="multiple" name="room_facilties1[]" disabled>
                                         <?php foreach ($room_facilities as $key =>$value) { ?>
                                         <option selected data-icon="<?php echo base_url() ?><?php echo $value[0]->icon_src ?>" value="<?php echo $value[0]->id ?>">
                                          <?php echo $value[0]->Room_Facility ?>
                                         </option>
                                        <?php }foreach ($rfacilities as $key =>$value) {   ?>   
                                          <option value="<?php echo ($value->id) ?>"><?php echo $value->Room_Facility;?>    
                                          </option>
                                       <?php }?>
                                       </select>
                                    <?php  } ?>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""  class="control-label">Room Aminities</label>
                                    
                                    <?php if(empty($room_amin[0])){ ?>
                                      <select class="form-control multi-select2" id="room_aminity" data-placeholder="Select Aminity" multiple="multiple" name="room_aminity[]" disabled>
                                          <?php foreach ($rAminity as $key =>$value) {   ?> 
                                            <option value="<?php echo ($value->id) ?>">
                                            <?php echo $value->Aminities;?>  
                                            </option> 
                                          <?php }?>
                                      </select>
                                    <?php } else{ ?>
                                      <select class="form-control multi-select2" id="room_aminity" data-placeholder="Select Aminity" multiple="multiple" name="room_aminity[]" disabled>
                                         <?php foreach ($room_amin as $key =>$value) { ?>
                                         <option selected data-icon="<?php echo base_url() ?>" value="<?php echo $value[0]->id ?>">
                                          <?php echo $value[0]->Aminities ?>
                                         </option>
                                          <?php }foreach ($rAminity as $key =>$value) { ?>   
                                          <option value="<?php echo $value->id ?>"><?php echo $value->Aminities;?></option>
                                      <?php } ?>
                                      </select>
                                    <?php  } ?>
                                  </div>
                            </div>
                          
                            <div class="form-group col-md-4">
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
                            <div class="col-md-4">
                               <div class="form-group">
                                   <label for=""  class="control-label">Star Rating</label>
                                   <div class="form-control" id="starr" name="starr" >
                                   <?php if (($view[0]['rating'])==5) { ?>
                                   <input checked="" class="filled-in" id="5" name="starr" type="radio" value="5" />
                                   <?php } else{ ?>
                                   <input  class="filled-in" id="5" name="starr" type="radio" value="5" />
                                   <?php } ?>
                                   <label for="5">5</label>
                                   <?php if (($view[0]['rating'])==4) { ?>
                                   <input checked="" class="filled-in" id="4" name="starr" type="radio" value="4" />
                                    <?php } else{ ?>
                                   <input class="filled-in" id="4" name="starr" type="radio" value="4" />
                                   <?php } ?>
                                   <label for="4">4</label>
                                    <?php if (($view[0]['rating'])==3) { ?>
                                   <input checked="" class="filled-in" id="3" name="starr" type="radio" value="3" />
                                   <?php } else{ ?>
                                   <input class="filled-in" id="3" name="starr" type="radio" value="3" />
                                   <?php } ?>
                                   <label for="3">3</label>
                                   <?php if (($view[0]['rating'])==2) { ?>
                                   <input checked="" class="filled-in" id="2" name="starr" type="radio" value="2" />
                                   <?php } else { ?>
                                   <input class="filled-in" id="2" name="starr" type="radio" value="2" />
                                   <?php } ?>
                                   <label for="2">2</label>
                                   <?php if (($view[0]['rating'])==1) { ?>
                                   <input checked="" class="filled-in" id="1" name="starr" type="radio"  value="1" />
                                   <?php } else { ?>
                                   <input class="filled-in" id="1" name="starr" type="radio" value="1" />
                                   <?php } ?>
                                   <label for="1">1</label>
                                    <?php if (($view[0]['rating'])==10) { ?>
                                   <input checked="" class="filled-in" id="10" name="starr" type="radio"  value="10" />
                                   <?php } else { ?>
                                   <input class="filled-in" id="10" name="starr" type="radio"  value="10" />
                                   <?php } ?>
                                   <label for="10">Hotel Apartment</label>
                               </div>
                               <span class="starr_err popup_err blink_me"></span>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                          <div class="col-md-4">
                                <div class="form-group">
                                   
                                  <label for="" class="control-label">Part of Any Chain or Collection</label>
                                    <input class="form-control" id="part_of_chain" name="part_of_chain" type="text" value="<?php echo $view[0]['chain']; ?>" readonly>
                                </div>
                            </div>
                                
                            <div class="col-md-4">
                                
                                    <!--<div class="col-md-6">-->
                                        <div class="form-group">
                                            <label for="" class="control-label">No of Rooms</label><span class="popup_err">*</span>
                                            <input class="form-control" id="total_no_of_rooms" name="total_no_of_rooms" type="text" value="<?php echo $view[0]['Number_of_room']; ?>" readonly>
                                     <span class="total_no_of_rooms_err popup_err blink_me"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="" class="control-label">Website</label>
                                           <input class="form-control" id="Website" name="Website" type="text" value="<?php echo $view[0]['website']; ?>" readonly>
                                     <span class="Website_err popup_err blink_me"></span>

                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="" class="control-label">Accepting VCC</label><span class="popup_err">*</span>
                                           <input class="form-control" id="accept_vcc" name="accept_vcc" type="text" value="<?php echo $view[0]['accepting_vcc']; ?>" readonly>
                                     <span class="accept_vcc_err popup_err blink_me"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                           <label for="" class="control-label">Channel Manager:(if any)</label><span class="popup_err">*</span>
                                           <input class="form-control" id="channel_manager" name="channel_manager" type="text" value="<?php echo $view[0]['channel']; ?>" readonly>
                                        </div>
                                    </div>
                                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Hotel Descriptions:</label><span class="popup_err">*</span>
                                    <textarea readonly class="form-control" rows="4" id="hotel_description" name="hotel_description"><?php echo $view[0]['hotel_description']; ?>
                                    </textarea>
                                     <span class="hotel_description_err popup_err blink_me"></span>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Part of Any Chain or Collection</label><span class="popup_err">*</span>
                                    <input class="form-control" id="part_of_chain" name="part_of_chain" type="text" value="<?php echo $view[0]['chain']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Selling Currency</label><span class="popup_err">*</span>
                                    <select name="sell_currency"  id="sell_currency" class="form-control" disabled>
                                      <?php foreach ($currency_list as $key => $value) { 
                                        if(($view[0]['sell_currency']) == $value->currency_type) {?>
                                      <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                       <?php }    else { ?>
                                      <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                      <?php  } } ?>
                                    </select>
                                    <span class="sell_currency_err popup_err blink_me"></span>

                                </div>
                            </div>
                            
                            
                            


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""  class="control-label">Search keywords</label>
                                    <input type="text" name="keyword" id="keyword" value="
                                    <?php $am = $implodedata2;
                                    $aminity = explode("close",$am);
                                    foreach ($aminity as $item) {}
                                    echo join ('close', $aminity); ?>" data-role="tagsinput" />
                                </div>
                            </div> 
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Location</label>
                                <input id="locationss" name="locationss" type="text" class="form-control" />
                              </div>
                            </div>                                                       
                            
                        </div>

                        <input id="us3-lat" name="us3-lat" type="hidden"/>
                        <input id="us3-lon" name="us3-lon" type="hidden"/>
                        <input type="hidden" name="country" class="form-control" id="us3-country" value="<?php echo isset($view[0]->country_code) ? $view[0]->country_code : '' ?>">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div id="us3" style="width: 100%; height: 350px;"></div>
                                    <script>
                                        $('#us3').locationpicker({
                                            location: {   
                                                latitude: <?php echo $view[0]['lattitude']; ?>,
                                                longitude: <?php echo $view[0]['longitude']; ?>
                                            },
                                            radius: 300,
                                styles: ['road','red'],
                                inputBinding: {
                                    latitudeInput: $('#us3-lat'),
                                    longitudeInput: $('#us3-lon'),
                                    locationNameInput: $('#locationss')
                                },
                                enableAutocomplete: true,
                                onchanged: function (currentLocation, radius, isMarkerDropped) {
                                    // Uncomment line below to show alert on each Location Changed event
                                    // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                                }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row" style="margin-top: 10px;">
                              <?php if ($menu[0]->edit_profile=="1"){ ?>
                                <button class="btn btn-success pull-right hide"  id="hotel_login_detail_update" name="hotel_login_detail_update" type="button" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form> 
                   </div>
                   </div>
                </div>   
	        </div>
        </div>
    </div>
</div>
<?php init_hotel_login_footer(); ?>

