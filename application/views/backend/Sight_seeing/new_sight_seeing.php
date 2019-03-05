<?php init_head(); ?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&sensor=false&libraries=places'></script>
<script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/summernote.css">
<script src="<?php echo base_url(); ?>assets/js/sight_seeing.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#imp_remarks').trumbowyg();
        $('#cancel_policy').trumbowyg();
        $('#imp_notes').trumbowyg();
    });
</script>
<style type="text/css">
    #tour_add_table tbody {
        display:block;
        max-height:425px;
        overflow-y:auto;
    }
    #tour_add_table thead, tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }
</style>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Add Sight Seeing Details <span class="pull-right"><a href="<?php echo base_url(); ?>backend/sight_seeing" class="btn btn-primary">Back</a></span></h2>
            </br>
            <ul class="nav nav-tabs tab-list">
                <li class="home active"><a ><i class="fa fa-map" aria-hidden="true"></i> <span>Location</span></a>
                </li>
                <li class="menu1"><a><i class="fa fa-info" aria-hidden="true"></i> <span>Details</span></a>
                </li>
                <li class="menu2"><a><i class="fa fa-bed" aria-hidden="true"></i> <span>Tour Operations</span></a>
                </li>
                <li class="menu3"><a><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Photo Gallery</span></a>
                <li class="menu4"><a><i class="fa fa-facebook" aria-hidden="true"></i> <span>Social Media</span></a>
                </li>
                <li class="menu5"><a><i class="fa fa-phone" aria-hidden="true"></i> <span>Contact Info</span></a>
                </li>
                <li class="menu6"><a><i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Policies</span></a>
                </li>
            </ul>
            <form action="add_new_hotel" method="post" id="new_hotel_form" name="new_hotel_form" enctype="multipart/form-data"> 
            <input type="hidden" name="room_aminities" id="room_aminities" value="<?php echo isset($view[0]->room_aminities) ? $view[0]->room_aminities : '' ?>">
            <input type="hidden" name="hotels_edit_id" id="hotels_edit_id" value="<?php echo isset($view[0]->hotel_id) ? $view[0]->hotel_id : '' ?>">
            <input type="hidden" name="gallery_edit_image" id="gallery_edit_image" value="<?php echo isset($view[0]->gallery_images) ? $view[0]->gallery_images : '' ?>">
            <input type="hidden" name="deleted_id" id="deleted_id">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <span>Location</span>
                        </div>
                        <div class="bor">
                        <div class="row">
                            <input type="hidden" name="latitude" style="width: 110px" id="us3-lat" value="<?php echo isset($view[0]->latitude) ? $view[0]->latitude : '' ?>"/>
                            <input type="hidden" name="longitude" style="width: 110px" id="us3-lon" value="<?php echo isset($view[0]->longitude) ? $view[0]->longitude : '' ?>"/>
                            <div class="form-group col-md-12">
                                <label for="us3-address">Where is the sight located?</label>
                                <input type="text" name="location" class="form-control" id="us3-address" value="<?php echo isset($view[0]->location) ? $view[0]->location : '' ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <div id="us3" style="width: 100%; height: 400px;"></div>
                            <script>
                                $('#us3').locationpicker({
                                    location: {
                                        latitude: <?php echo isset($view[0]->latitude) ? $view[0]->latitude : '25.253160' ?>,
                                        longitude: <?php echo isset($view[0]->longitude) ? $view[0]->longitude : '55.328495' ?>
                                    },
                                    radius: 300,
                                    styles: ['road','red'],
                                    inputBinding: {
                                        latitudeInput: $('#us3-lat'),
                                        longitudeInput: $('#us3-lon'),
                                        radiusInput: $('#us3-radius'),
                                        locationNameInput: $('#us3-address')
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
                                    <input type="button" class="waves-effect waves-light btn pull-right" id="sight_seeing_tab_1" value="Next">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Sight Seeing Details</span>
                    </div>
                    <div class="bor">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sight_seeing_name">Sight Seeing Name</label><span>*</span>
                                    <input id="sight_seeing_name" name="sight_seeing_name" type="text" class="form-control" value="<?php echo isset($view[0]->sight_name) ? $view[0]->sight_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">country</label><span>*</span>
                                    <input id="country" name="country" type="text" class="form-control" value="<?php echo isset($view[0]->country) ? $view[0]->country : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">state</label><span>*</span>
                                    <input id="state" name="state" type="text" class="form-control" value="<?php echo isset($view[0]->state) ? $view[0]->state : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label><span>*</span>
                                    <input id="city" name="city" type="text" class="form-control" value="<?php echo isset($view[0]->city) ? $view[0]->city : '' ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="description">Description</label><span>*</span>
                                    <textarea id="description" name="description" type="text" class="form-control"><?php echo isset($view[0]->description) ? $view[0]->description : '' ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="summary">Summary</label><span>*</span>
                                    <textarea id="summary" name="summary" type="text" class="form-control"><?php echo isset($view[0]->Summary) ? $view[0]->Summary : '' ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inclusion">Inclusion</label><span>*</span>
                                    <textarea id="inclusion" name="inclusion" type="text" class="form-control"><?php echo isset($view[0]->Inclusion) ? $view[0]->Inclusion : '' ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notes">Notes</label><span>*</span>
                                    <textarea id="notes" name="notes" type="text" class="form-control"><?php echo isset($view[0]->Notes) ? $view[0]->Notes : '' ?></textarea>
                                </div>

                            </div>
                            
                           
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" id="sight_seeing_tab_2" class="waves-effect mar_left_5 waves-light btn pull-right" value="Next">
                                    <input type="button" id="sight_seeing_tab_2_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Tour Operations</span>
                    </div>
                    <div class="bor ">
                            <div class="row">
                                <div class="form-group col-md-2">
                                        <span class="opensans size13"><b>From Date</b></span><span>*</span>
                                        <input type="date" class="form-control wh90percent mySelectCalendar" id="from_date" name="from_date" placeholder="mm/dd/yyyy" value="" />
                                </div>
                                <div class="form-group col-md-2">
                                        <span class="opensans size13"><b>To Date</b></span><span>*</span>
                                        <input type="date" class="form-control wh90percent mySelectCalendar" id="to_date" name="to_date" placeholder="mm/dd/yyyy" value="" />
                                </div>
                                <div class="form-group col-md-2">
                                        <span class="opensans size13"><b>From Time</b></span><span>*</span>
                                        <input type="Time" class="form-control wh90percent mySelectCalendar" id="from_time" name="from_time" placeholder="hh:mm:ss" value="" />
                                </div>
                                <div class="form-group col-md-2">
                                        <span class="opensans size13"><b>To Time</b></span><span>*</span>
                                        <input type="Time" class="form-control wh90percent mySelectCalendar" id="to_time" name="to_time" placeholder="hh:mm:ss" value="<?php echo isset($_REQUEST['To_Time']) ? $_REQUEST['To_Time'] : '' ?>" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Days Of Week</label>
                                    <select name="days_of_week" id="days_of_week">
                                        <option value="Daily" selected="">Daily</option>
                                        <option value="weekend">weekend</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Departure Point</label>
                                    <input type="text" class="form-control" name="departure_point" id="departure_point">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="button" class="pull-right teal darken-3 waves-effect waves-light btn" id="tour_operation_add" value="Add">
                            </div>
                        <div class="col-sm-12 collection pad_20">
                            <div class="">
                                <table class="" id="tour_add_table">
                                    <thead>
                                      <th>SL.No</th>
                                      <th>From Date</th>
                                      <th>To Date</th>
                                      <th>From Time</th>
                                      <th>To Time</th>
                                      <th>Days of week</th>
                                      <th>Departure point</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="button" class="pull-right waves-effect mar_left_5 waves-light btn" id="sight_seeing_tab_3" value="Next">
                                <input type="button" id="hotel_tab_3_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Photo Gallery</span>
                    </div>
                    <div class="bor">
                        <div class="row">
                            <div class="file-field form-group col-md-12">
                                <div class="btn">
                                    <span>Gallery Images</span>
                                    <input type="file" name="gallery_image[]" id="multiple_image" onchange="multipleimagevalidation();" multiple >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path form-control" type="text" placeholder="Upload one or more files" value="<?php echo isset($view[0]->gallery_images) ? $view[0]->gallery_images : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?php 
                            if (isset($view[0]->gallery_images)) {
                         $gallery = explode(",", $view[0]->gallery_images);
                            foreach ($gallery as $key => $value) { ;?>
                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $view[0]->hotel_id; ?>/<?php echo $value;?>" width="10%" height ="100x">
                            <?php } } else { if(isset($_REQUEST['hotels_edit_id'])) { ?>
                            <p class="center">No Records</p>
                            <?php } } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="button" class="waves-effect waves-light btn mar_left_5 pull-right" id="hotel_tab_4" value="Next">
                                <input type="button" id="hotel_tab_4_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                            </div>
                        </div>
                     </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Social Media</span>
                    </div>
                    <div class="bor">
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
                                    <input type="button" class="waves-effect mar_left_5 waves-light btn pull-right" id="hotel_tab_5" value="Next">
                                    <input type="button" id="hotel_tab_5_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Contact Info</span>
                    </div>
                    <div class="bor">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span>Sales Team</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n1">First Name</label><span>*</span>
                                    <input id="t5-n1" type="text" name="sales_fname"  class="form-control sales_fname" value="<?php echo isset($view[0]->sale_name) ? $view[0]->sale_name : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n2">Last Name</label><span>*</span>
                                    <input id="t5-n2" type="text" name="sales_lname" class="form-control sales_lname" value="<?php echo isset($view[0]->sale_lname) ? $view[0]->sale_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n3">Phone</label><span>*</span>
                                    <input id="t5-n3" type="number" name="sales_phone" class="form-control sales_phone" value="<?php echo isset($view[0]->sale_number) ? $view[0]->sale_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n4">Mobile</label><span>*</span>
                                    <input id="t5-n4" type="number" name="sales_mobile" class="form-control sales_mobile" value="<?php echo isset($view[0]->sale_mobile) ? $view[0]->sale_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n5">Email</label><span>*</span>
                                    <input id="t5-n5" type="email" name="sales_mail" class="form-control sales_mail" value="<?php echo isset($view[0]->sale_mail) ? $view[0]->sale_mail : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n6">Address</label><span>*</span>
                                    <textarea id="t5-n6" name="sales_address" class="form-control"><?php echo isset($view[0]->sale_address) ? $view[0]->sale_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <span>Revenue Team</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n1">First Name</label><span>*</span>
                                    <input id="t5-n1" type="text" name="revenue_fname"  class="form-control revenue_fname" value="<?php echo isset($view[0]->revenu_name) ? $view[0]->revenu_name : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n2">Last Name</label><span>*</span>
                                    <input id="t5-n2" type="text" name="revenue_lname" class="form-control revenue_lname" value="<?php echo isset($view[0]->revenu_lname) ? $view[0]->revenu_lname : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n3">Phone</label><span>*</span>
                                    <input id="t5-n3" type="number" name="revenue_phone" class="form-control revenue_phone" value="<?php echo isset($view[0]->revenu_number) ? $view[0]->revenu_number : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n4">Mobile</label><span>*</span>
                                    <input id="t5-n4" type="number" name="revenue_mobile" class="form-control revenue_mobile" value="<?php echo isset($view[0]->revenu_mobile) ? $view[0]->revenu_mobile : '';?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="t5-n5">Email</label><span>*</span>
                                    <input id="t5-n5" type="email" name="revenue_mail" class="form-control revenue_mail" value="<?php echo isset($view[0]->revenu_mail) ? $view[0]->revenu_mail : '';?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="t5-n6">Address</label><span>*</span>
                                    <textarea id="t5-n6" name="revenue_address" class="form-control"><?php echo isset($view[0]->revenu_address) ? $view[0]->revenu_address : '';?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="button" id="hotel_tab_6" class="waves-effect mar_left_5 waves-light btn pull-right" value="Next">
                                    <input type="button" id="hotel_tab_6_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                                </div>
                            </div>
                    </div>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <div class="inn-title">
                        <span>Policies</span>
                    </div>
                    <div class="bor">
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
                                <input type="button" id="hotel_tab_7" class="waves-effect mar_left_5 waves-light btn pull-right" value="Submit">
                                <input type="button" id="hotel_tab_7_prev" class="waves-effect  waves-light btn pull-right" value="Previous">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <label>Select room type</label>
                    <select id="get_room_type_select">
                        <option value="" selected="selected">Room Type</option>
                        <?php foreach ($room_type as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->Room_Type; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Per room Price</label>
                    <input id="get_price" type="number" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 room_facilties">
                    <select multiple id="get_room_facilties">
                        <option value="" disabled selected>Room facilities</option>
                        <?php foreach ($room_facilties as $key => $value) { ?>
                            <option data-icon="<?php echo base_url() ?><?php echo $value->icon_src ?>" value="<?php echo $value->id; ?>"><?php echo $value->Room_Facility; ?></option>
                        <?php } ?>
                    </select>
                    <label>Select room facilities</label>
                </div>
                <div class="form-group col-md-6 room_facilties">
                    <select id="get_occupancy">
                        <option value="" disabled selected>Adults</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> adult(s)</option>
                        <?php } ?>
                    </select>
                    <label>Select Max Occupancy</label>
                </div>
                <div class="form-group col-md-6">
                    <select id="get_occupancy_child">
                        <option value="" disabled selected>Children</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> child(s)</option>
                        <?php } ?>
                    </select>
                    <label>Select Max Occupancy</label>
                </div>
                <div class="form-group col-md-6">
                    <select id="get_no_of_rooms">
                        <option value="" disabled selected>Room's</option>
                        <?php for ($i=0 ; $i<=11; $i++) { ?>
                            <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                        <?php } ?>
                    </select>
                    <label>No of room's</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default update_button" data-dismiss="modal">update</button>
        </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/summernote.js"></script> 
