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
                        <span>Booking Pattern Report</span>
                      </div> 
                      <input type="hidden" id="filter" value="2">
                      <form method="get" id="bookingpatternReport_filter" >
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
                                          <input type="button" class="mar_top_23 btn-sm btn-primary" id="BookingPatternReportButton" value="Search">
                                  </div>
                                </div>
                      </form>
                      <input type="hidden" name="agent_id" id="agent_id" value="2">
                        <div class="clearfix"><br>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box-inn-sp">
              <div class="col-md-12">
                <div class="col-md-6">
                   <h3>TOTAL TRANSACTIONS</h3>
                    <div class="chart-wrap">
                       <canvas id="TransactionsChart" style="position: relative; height:100%; width:100%"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>TOTAL ROOMNIGHTS</h3>
                    <div class="chart-wrap">
                        <canvas id="RoomNightsChart" style="position: relative; height:100%; width:100%"></canvas>

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
            $('#BookingPatternReportTable').dataTable();
           
    // });
</script>

<?php init_tail(); ?>
                

                               	

                    

