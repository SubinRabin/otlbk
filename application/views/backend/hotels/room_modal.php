<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="list-img"><img src="<?php echo base_url(); ?>uploads/rooms/<?php echo $view[0]->room_id ?>/<?php echo $view[0]->images ?>" alt=""></span> <?php echo $view[0]->Room_Type ?></h4>
    </div>
    <div class="modal-body">
      <div class="row">
          <div class="form-group col-md-6">
              <label>Room Type</label>
              <input type="text" class="form-control" value="<?php echo $view[0]->Room_Type;?>">
          </div>
          <div class="form-group col-md-6">
              <label>Per room price</label>
              <input type="text" class="form-control" value="<?php echo $view[0]->price;?>">
          </div>
          <div class="form-group col-md-6">
              <label>Occupancy Adult's</label>
              <input type="text" class="form-control" value="<?php echo $view[0]->occupancy;?> Adults">
          </div>
          <div class="form-group col-md-6">
              <label>Occupancy Children's</label>
              <input type="text" class="form-control" value="<?php echo $view[0]->occupancy_child;?> Child's">
          </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
              <label>No of room's</label>
              <input type="text" class="form-control" value="<?php echo $view[0]->total_rooms;?>">
          </div>
          <div class="form-group col-md-6">
              <label>Room Facilities</label>
              <ul class="hotelpreferences2">
                <?php foreach ($room_facilities as $key => $value) {?>
                    <li><?php echo $value[0]->Room_Facility; ?></li>
                <?php } ?>
              </ul>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn-sm btn-default" data-dismiss="modal">Close</button>
    </div>
</div>