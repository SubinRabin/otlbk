<?php init_hotel_login_header(); ?>
 <script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
 <link href="<?php echo base_url(); ?>skin/distn/css/bootstrap-imageupload.css" rel="stylesheet">
<div class="row">
        <div class="col-md-12">
        	<?php if (isset($_REQUEST['proc'])) { ?>
            <script type="text/javascript">
            AddToast('success','Added Room Successfully','!');
            </script> <?php } ?>
            <?php if (isset($_REQUEST['update'])) { ?>
            <script type="text/javascript">
            AddToast('success','Update Room Detail Successfully','!');
            </script>
            <?php } ?>
            <?php if (isset($_REQUEST['dlt'])) { ?>
            <script type="text/javascript">
            AddToast('success','Deleted Room Successfully','!');
            </script>
            <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h3>Room Details</h3>
        </div>
        <div class="col-md-6">
            <br>
            <button type="button" class="btn btn-info btn-lg pull-right fa fa-plus" data-toggle="modal" data-target="#myModal"> Add Room</button>
        </div>
    </div>
</div>
<br><br>
<!-- delete -->
<div class="row">
<div class="modal fade" id="myModaldelete" role="dialog">
    <div class="modal-dialog modal-lg modal-width-60">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button><br><br>
              <h4 class="modal-title"></h4>
            </div>
                <div class="modal-body">
                  <p><h4>Do you want to delete this !</h4></p>
                </div>
        <div class="modal-footer">
        	<div class="row">
        		<div class="col-sm-7">
        		</div>
        			<div class="col-sm-4">
                    <form action="<?php echo base_url(); ?>delete_room_type_hotel_log" method="post" id="new_hotel_room_delete">
                    <input type="hidden" id="room_id" name="room_id" value="">
                      <button type="Submit" class="btn btn-danger stle">DELETE</button>
                      </form>
                    </div>
        <div class="col-sm-1">
        </div></div>
       </div><br>
      </div>
    </div>

</div>

</div>

<!-- delete -->

  <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-width-80">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title formheadingrg"><span></span>Room Detail</h4>
        </div>
        <div class="modal-body">
<div class="container-fluid">
	<form action="add_new_hotel_room" method="post" id="new_hotel_room_detail_form" name="new_hotel_room_detail_form" enctype="multipart/form-data"> 
    <div class="mainformdivreg">
     	<div class="col-sm-12">
            <div class="col-sm-12">
               	<br><br>
                
            </div>
        <div class="row">
      	<div class="col-sm-1"></div>
        <div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="room_type" class="col-sm-3 control-label fontstyl" style="">Room type<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <select name="room_type" class="form-control" id="room_type">
                        	 <option value="" selected="selected">Room Type</option>
                            <?php foreach ($room_type as $key => $value) { ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                            <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="room_type_err popup_err blink_me"></span>
                    </div>
        		</div>
            </div>
    	</div>
        	<div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="price" class="col-sm-3 control-label fontstyl" style="">Room Price <span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="price" name="price">
		                  <span class="price_err popup_err blink_me"></span>
                        </div>
            		</div>
                </div>
        	</div>
          	<div class="col-sm-1"></div>
        </div>	
        <div class="row">
      	<div class="col-sm-1"></div>
        	<div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="room_facilti" class="col-sm-3 control-label fontstyl " style="">Room Facilities<span class="starcolor">*</span></label></label>
                        <div class="col-sm-9">
                            <select name="room_facilti[]" class="form-control multi-select2" id="room_facilti" data-placeholder="Select Facilities" multiple="multiple">
                              <?php foreach ($room_facilties as $key => $value) { ?>
                            <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                             <?php } ?>
                            </select> 
                            
                        	<!-- <select class="form-control multi-select2" id="room_facilti" name="room_facilti[]" data-placeholder="Select Facilities" multiple="multiple">
                             <?php foreach ($room_facilties as $key => $value) { ?>
                            <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                             <?php } ?>
                            </select> -->
                        
                        <span class="room_facilti_err popup_err blink_me"></span>
                        </div> 
                    </div>
        		</div>
            </div>
    	
            <div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="max_occ_adult" class="col-sm-3 control-label fontstyl" style=""> Occupancy</label>
                        <div class="col-sm-9">
                        <select name="max_occ_adult" class="form-control" id="max_occ_adult">
                                <?php for ($i=0 ; $i<=11; $i++) { ?>
                                    <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                                <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="max_occ_adult_err popup_err blink_me"></span>
                    </div>
        		</div>
            </div>
    	</div>
          	<div class="col-sm-1"></div>
        </div>	
         <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="room_name" class="col-sm-3 control-label fontstyl" style="">Room Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="room_name" name="room_name">
                          <span class="room_name_err popup_err blink_me"></span>
                        <!-- </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="Standard_capacity" class="col-sm-3 control-label fontstyl" style=""> Standard Capacity</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="standard_capacity" name="standard_capacity">
                          <span class="price_err popup_err blink_me"></span>
                        
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-1"></div>
        </div>  
        <div class="row">
      	<div class="col-sm-1"></div>
        	<div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="max_occ_childe" class="col-sm-3 control-label fontstyl" style="">Child Occupancy</label>
                        <div class="col-sm-9">
                        <select name="max_occ_child" class="form-control" id="max_occ_child">
                            <?php for ($i=0 ; $i<=11; $i++) { ?>
                                <option value="<?php echo $i+0; ?>"><?php echo $i+0; ?> child(s)</option>
                            <?php } ?>
                        </select>
                        <!-- </div> -->
                        <span class="max_occ_child_err popup_err blink_me"></span>
                    </div>
        		</div>
            </div>
    	</div>
        	<div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="number_of_room" class="col-sm-3 control-label fontstyl" style="">no of Rooms<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="no_rooms" name="no_rooms">
                        <!-- </div> -->
                        <span class="no_rooms_err popup_err blink_me"></span>
                    </div>
        		</div>
               </div>
    	   </div>
        
       </div> 
        <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="allotement" class="col-sm-3 control-label fontstyl" style="">Allotement</label>
                        <div class="col-sm-9">
                         <input type="text" class="form-control" id="allotement" name="allotement">
                          <span class="allotement_err popup_err blink_me"></span>
                        <!-- </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-5">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="max_total" class="col-sm-3 control-label fontstyl" style="">Max total<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="max_total" name="max_total">
                        <!-- </div> -->
                        <span class="max_total_err popup_err blink_me"></span>
                    </div>
                </div>
               </div>
           </div>
        
       </div> 
       <br>

    <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div class= "form-horizondal"> 
                    <div class="form-group">
                        <div class="imageupload panel panel-default col-sm-12">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">Upload Image</h3> 
                            </div>
                            <div class="file-tab panel-body">
                                <label class="fa fa-upload btn btn-primary btn-file ">
                                    <span>Browse</span>
                                        <!-- The file is stored here.-->
                                        <input type="file" name="image-file">
                                </label>
                                        <button type="button" class="btn btn-default">Remove</button>
                            </div>
                            <div class="url-tab panel-body">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                            <button type="button" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default">Remove</button>
                                <input type="file" id="image-url" name="image-url" onchange="return ValidateFileUpload();" >
                                <span class="number_of_room_err popup_err blink_me"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                    <div class="col-sm-6"></div>
            
        </div>
    </div>



            
            <div class="col-sm-6"></div>
        </div>   
     	</div>
     	</div>
     	<div class="col-sm-12">
	        <div class="modal-footer regclassfooter">
	        </div>
			<div class="col-sm-12">
				<div class="text-right">
					<button type="button" class="btn btn-warning" id="hotel_login_room_add" name="hotel_login_room_add">Add</button>
				</div>
			</div>
        </div>
    </form>
  </div>
</div>
        
        
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-md-12">
        	<table class="table table-striped" id="table_hotel_detail">
        	  <thead>
        	    <tr>
        	      <th scope="col">#</th>
        	      <th scope="col">Room Type</th>
        	      <th scope="col">Number Of Room</th>
        	      <th scope="col">Adults</th>
        	      <th scope="col">Child</th>
        	      <th scope="col">Amount</th>
        	      <th scope="col">Action</th>
        	    </tr>
        	  </thead>
        	  <tbody>
        	    
        	  </tbody>
        	</table>
        </div>
    </div>
</div>
<div class="modal fade col-md-8 center" id="myModaledit" role="dialog">
<div class="modal-dialog modal-lg modal-width-80">
</div>
</div>
 <div class="modal fade col-md-8 center" id="myModaleditview" role="dialog">
    <div class="modal-dialog modal-lg modal-width-80">
    </div>
</div>
</div>
<script src="<?php echo base_url(); ?>skin/distn/js/bootstrap-imageupload.js"></script>

        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
<?php init_hotel_login_footer(); ?>
