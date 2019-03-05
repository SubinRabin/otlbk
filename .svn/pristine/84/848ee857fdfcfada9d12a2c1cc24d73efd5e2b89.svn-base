<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel.js"></script>
<div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="inn-title">
                        <span>Close Out Period</span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels"  class="btn-sm btn-primary">Back</a></span>
                        <span class="pull-right" style="margin-right: 5px;"><a href="#" data-toggle="modal" data-target="#close_out_add" class="btn-sm btn-success">Add</a></span>
                    </div>
            </br>
        <div class="col-md-6">
            <div class="form-group">
               <label>Select Hotel</label><span>*</span>
                <select name="hotel_id" id="hotel_id" onchange="close_out_hotelChange();">
                    <?php $count=count($view);
                    for ($i=0; $i <$count ; $i++) { 
                        if (isset($_REQUEST['id']) && $_REQUEST['id']==$view[$i]->id) {
                        ?>
                        <option selected="" value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>

                    <?php } } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="hotel_closeout_table">
                                 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Reason</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="delete_modal modal fade" id="close_out_add" role="dialog">
      <div class="modal-dialog ">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Add Close Out Period</h4>
        </div>
        <div class="modal-body">
            <div class="inn-title">
            </div>
             </br>
        <div class="row" style="margin-top: -8%;">
            <form action="add_closeout_hotel" method="post" id="add_close_hotel" name="add_close_hotel" enctype="multipart/form-data"> 
                <input type="hidden" value="" name="hotelid" id="hotelid">
                 <div class="form-group col-md-6">
                    <label for="from_date">From date</label>
                    <input id="from_date" name="from_date" type="date" class="form-control" value="">
                </div>
                <div class="form-group col-md-6">
                    <label for="to_date">To date</label>
                    <input id="to_date" name="to_date" type="date" class="form-control" value="">
                </div>
                <div class="form-group col-md-12">
                    <label for="reason">Reason</label>
                    <textarea id="reason" name="reason" class="form-control"></textarea>
                </div>
            </form>
        </div>
        </div>
        <div class="modal-footer">
            <input type="submit" id="hotel_tab_8" class="btn-sm btn-success" value="Submit">
        </div>
     </div>
      </div>
    </div>
</div>
     <div class="delete_modal modal fade" id="close_out_update" role="dialog">
      <div class="modal-dialog ">
<?php init_tail(); ?>