<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/review.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Review </span><span class="pull-right"><a href="<?php echo base_url(); ?>backend/reviews" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <div class="tab-inn">
                         <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>"> 
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input id="username" name="username" type="text" class="form-control"  value="<?php echo isset($edit[0]->Username) ? $edit[0]->Username : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="evaluation">Evaluation</label>
                                    <input type="text" class="form-control" value="<?php echo isset($edit[0]->Evaluation) ? $edit[0]->Evaluation : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control" value="<?php echo isset($edit[0]->Title) ? $edit[0]->Title : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comment">Comment</label>
                                    <input id="comment" name="comment" type="text" class="form-control" value="<?php echo isset($edit[0]->Comment) ? $edit[0]->Comment : '' ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                	<label for="cleanliness">Cleanliness</label>
                                    <input id="cleanliness" name="cleanliness" type="range" class="validate" min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Cleanliness) ? $edit[0]->Cleanliness : '' ?>">
                             </div>
                             <div class="form-group col-md-6">
                                	<label for="room_comfort">Room Comfort</label>
                                    <input id="room_comfort" name="room_comfort" type="range" class="validate"  min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Room_Comfort) ? $edit[0]->Room_Comfort : '' ?>">
                             </div>
                             <div class="form-group col-md-6">
                                	<label for="location">Location</label>
                                    <input id="location" name="location" type="range" class="validate" min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Location) ? $edit[0]->Location : '' ?>">
                             </div>
                              <div class="form-group col-md-6">
                                	<label for="service_staff">Service & Staff</label>
                                    <input id="service_staff" name="service_staff" type="range" class="validate"  min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Service_Staff) ? $edit[0]->Service_Staff : '' ?>">
                             </div>
                              <div class="form-group col-md-6">
                                	<label for="sleep_quality">Sleep Quality</label>
                                    <input id="sleep_quality" name="sleep_quality" type="range" class="validate"  min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Sleep_Quality) ? $edit[0]->Sleep_Quality : '' ?>">
                             </div>
                             <div class="form-group col-md-6">
                                	<label for="value_price">Value For Price</label>
                                    <input id="value_price" name="value_price" type="range" class="form-control"  min="0" max="5" step="0.1" value ="<?php echo isset($edit[0]->Value_Price) ? $edit[0]->Value_Price : '' ?>">
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php init_tail(); ?>