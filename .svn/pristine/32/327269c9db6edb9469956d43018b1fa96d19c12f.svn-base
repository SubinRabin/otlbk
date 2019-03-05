<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="modal-dialog" style="height: auto;">
    	<!-- Modal content-->
  	<div class="modal-content">
    		<div class="modal-body">
	        <p>Do you want cancel this booking?</p>
	        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">
	        <input type="hidden" name="check_in" id="check_in" value="<?php echo $_REQUEST['check_in'] ?>">
          <div class="row">
            <?php if(count($cancelation)!=0) {
             ?>
            <div class="col-md-12">
              <h4 class="bold">Cancelation Policy</h4>
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr style="background-color: #0074b9;color: white">
                        <th>Cancelled on or After</th>
                        <th>Cancelled on or Before</th>
                        <th>Cancellation Charge</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php foreach ($cancelation as $Canckey => $Cancvalue) { 
                        if ($Cancvalue->application=="NON REFUNDABLE") {  ?>
                        <tr>
                          <td><?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></td>
                          <td><?php echo date('d/m/Y',strtotime($view[0]->check_in)) ?></td>
                          <td><?php echo $Cancvalue->cancellationPercentage ?>% (<?php echo $Cancvalue->application ?>)</td>
                        </tr>
                      <?php   } else { ?>
                        <tr>
                          <td><?php 
                          if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in))) < date('Y-m-d')) {
                            echo date('d/m/Y');
                          } else {
                            echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in)));
                          }
                          ?></td>
                          <td><?php echo date('d/m/Y' , strtotime('-'.$Cancvalue->daysTo.' days', strtotime($view[0]->check_in))) ?></td>
                          <td><?php echo $Cancvalue->cancellationPercentage ?>% (<?php echo $Cancvalue->application ?>)</td>
                        </tr>
                    <?php } } ?>
                    </tbody>
              </table>
            </div>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-md-12">
    	        <button type="button" id="reject_button" class="ml10 btn btn-danger pull-right">Yes</button>
    	        <button type="button" data-dismiss="modal" id="cancel_reject" class="close_but btn btn-primary ml10 pull-right">No</button>
            </div>
          </div>
    		</div>
  	</div>
	</div>
