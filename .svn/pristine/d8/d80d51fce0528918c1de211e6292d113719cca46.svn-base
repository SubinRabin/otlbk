<?php init_head();?>
<style type="text/css">
.multi-select-trans1 .form-control {
    padding: 0px 0 !important;
  }
  .input-hide input {
    display: none ! important;
  }
  .input-hide li {
    display: none ! important;
  }
</style>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                      <div class="inn-title">
                        <span>Booking Report</span>
                      </div> 
                      <input type="hidden" id="filter" value="2">
                      <form method="get" id="bookingReport_filter">
                				  <div class="col-md-12"> 
                					        <div class="form-group col-md-2">
                						              <label for="from_date">From date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="from_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo date('d/m/Y') ?>" readonly>
                                          <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="to_date">To date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="to_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                                          <?php $today=date('d/m/Y'); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo $today ?>" readonly>
                                          <label for="to_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="from_date">Country</label>
                               	          <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                                          <?php $count=count($view);
                                          for ($i=0; $i <$count ; $i++) { ?>
                                          <option value="<?php echo $view[$i]->id;?>"><?php echo $view[$i]->name; ?></option>
                                          <?php  } ?>
                                          </select>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="stateSelect">State</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="stateSelect" id="stateSelect"  onchange ="StateSelectFun();" class="form-control">
                                          <option value="">Select</option>
                                          </select> 
                                          </div>
                               		</div>
                                  <div class="form-group col-md-2">
                                          <label for="hotelname">Hotel</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                         <select name="HotelSelect" id="HotelSelect" class="form-control">
                                          <option value="">Select</option>
                                          </select> 
                                        </div>
                                  </div>
                                  <div class="form-group col-md-2">
                                          <label for="citySelect">Agent</label>
                                          <select name="agent_id" id="agent_id">
                                          <option value=" "> Select </option>
                                          <?php $count=count($agents);
                                          for ($i=0; $i <$count ; $i++) { ?>
                                          <option value="<?php echo $agents[$i]->id;?>"><?php echo $agents[$i]->First_Name.' '.$agents[$i]->Last_Name; ?></option>
                                          <?php  } ?>
                                          </select>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group col-md-2 col-md-offset-10">
                                          <input type="button" class="mar_top_23 btn-sm btn-primary" id="BookingFormReportButton" value="Search">
                                  </div>
                                </div>
                      </form>
                      <input type="hidden" name="agent_id" id="agent_id" value="2">
                      <div class="row">
                        <div class="col-md-12 mar_top_10">
                          <ul class="tabs" style="box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.16);">
                            
                            <li class="tab col s2"><a class="Received" href="#" onclick="bookingreportfilter('2')">Received</a></li>
                            <li class="tab col s2"><a class="Materialized" href="#" onclick="bookingreportfilter('1')">Materialized</a></li>
                            <li class="tab col s2"><a class="Cancelled" href="#" onclick="bookingreportfilter('3')">Cancelled</a></li>
                          </ul>
                        </div>
                    </div>
                        <div class="clearfix"><br>
                            <div class="col-md-12">
                    				  <div class="tab-inn">
                        			  <div class="table-responsive table-desi">
                            			<table class="table table-condensed table-hover" id="BookingReportTable">
                               			<thead>
                                    	<tr>
                                        <th>Name</th>
                                        <th class="summable">TOTAL TRANSACTIONS</th>
                                        <th class="summable">TRANSACTIONS % FROM TOTAL</th>
                                        <th class="summable">TOTAL ROOM NIGHTS</th>
                                        <th class="summable">ROOM NIGHT % FROM TOTAL</th>
                                        <th>AVERAGE LEAD DAYS</th>
                                        <th>AVERAGE LENGTH OF STAY</th>
                                      </tr>
                                		</thead>
                                	  <tbody>
                                		</tbody>
                                    <tfoot>
                                      <tr>
                                        <th>Grand Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="3"></th>
                                        
                                      </tr>
                                    </tfoot>
                            			</table>
                            		</div>
                            	</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>

<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<script type="text/javascript">
    // $( document ).ready(function() {
            $("#from_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      altField: "#alternate1",
                      // altField: "#alternate",
                      dateFormat: "yy-mm-dd",
                      altFormat: "dd/mm/yy",
                      changeYear : true,
                      changeMonth : true,
            });
            $("#alternate1").click(function() {
                $( "#from_date" ).trigger('focus');
            });
            $("#to_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      altField: "#alternate2",
                      // altField: "#alternate",
                      dateFormat: "yy-mm-dd",
                      altFormat: "dd/mm/yy",
                      changeYear : true,
                      changeMonth : true,
            });
            $("#alternate2").click(function() {
                $( "#to_date" ).trigger('focus');
            });
            $('#BookingReportTable').dataTable();
    // });
</script>

<?php init_tail(); ?>
                

                               	

                    

