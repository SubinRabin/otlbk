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
                        <span>Allotment utilization Report</span>
                      </div> 
                      <form method="get" id="bookingReport_filter">
                        <input type="hidden" id="hiddenState" value="<?php echo isset($_REQUEST['stateSelect'])?$_REQUEST['stateSelect']:''?>" >
                        <input type="hidden" id="hiddenHotel" value="<?php echo isset($_REQUEST['HotelSelect'])?$_REQUEST['HotelSelect']:''?>" >
                				  <div class="col-md-12"> 
                					        <div class="form-group col-md-2">
                						              <label for="from_date">From date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="from_date" name="from_date" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['from_date'])?$_REQUEST['from_date']:date('Y-m-d' ,strtotime('-2 months')) ?>" />
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($_REQUEST['from_date'])?date('d/m/Y',strtotime($_REQUEST['from_date'])):date('d/m/Y' ,strtotime('-2 months')) ?>">
                                          <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="to_date">To date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="to_date" name="to_date" placeholder="dd/mm/yyyy" value="<?php echo isset($_REQUEST['to_date'])?$_REQUEST['to_date']:date('Y-m-d') ?>" />
                                          <?php $today=date('d/m/Y'); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($_REQUEST['to_date'])?date('d/m/Y',strtotime($_REQUEST['to_date'])):$today ?>">
                                          <label for="to_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="from_date">Country</label>
                               	          <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                                          <option value=""> Country </option>
                                          <?php $count=count($view);
                                          for ($i=0; $i <$count ; $i++) { ?>
                                          <option value="<?php echo $view[$i]->id;?>" <?php if(isset($_REQUEST['ConSelect']) && $_REQUEST['ConSelect']== $view[$i]->id) echo "selected"; else ""; ?>><?php echo $view[$i]->name; ?></option>
                                          <?php  } ?>
                                          </select>
                               		</div> 
                               		<div class="form-group col-md-2">
                                          <label for="stateSelect">State</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="stateSelect" id="stateSelect" onchange ="StateSelectFun()" class="form-control">
                                          <option value="">Select</option>
                                          </select> 
                                          </div>
                               		</div>
                                  <!-- <div class="form-group col-md-2">
                                          <label for="citySelect">City</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="citySelect" id="citySelect"  class="form-control">
                                          <option value="">Select</option>
                                          </select>
                                          </div> 
                                  </div> -->
                                  <div class="form-group col-md-2">
                                          <label for="from_date">Hotel</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="HotelSelect" id="HotelSelect" class="form-control">
                                          <option value="">--select hotel--</option>
                                          </select>
                                          </div>
                                  </div>
                                  <!-- <div class="form-group col-md-2">
                                          <label for="roomSelect">Room</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="roomSelect" id="roomSelect"  class="form-control">
                                          <option value="">--Select room--</option>
                                          </select> 
                                          </div>
                                  </div>
                                  <div class="form-group col-md-2">
                                          <label for="ContractSelect">Contract</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="contractSelect" id="contractSelect"  class="form-control">
                                          <option value="">--Select Contract--</option>
                                          </select> 
                                          </div>
                                  </div> -->
                                  <div class="form-group col-md-2">
                                          <input type="button" class="mar_top_23 btn-sm btn-primary" id="altUtlzFormReport" value="Search">
                                  </div>
                          </div>
                      </form>
                      <input type="hidden" name="agent_id" id="agent_id" value="2">
                            <div class="clearfix">
                    		            <br>

                            	    <div class="col-md-12">
                                    <div class="text-right"><p class="text-success" style="font-weight:bold;color: chocolate;"><i>*The negative values for balance allotment indicates booking on request.</i></p></div>
                    				            <div class="tab-inn">
                                          <div id="altUtlzReportTable">
                                            <?php if (isset($_REQUEST['from_date'])) {
                                              $from_date=date_create($_REQUEST['from_date']);
                                              $to_date=date_create($_REQUEST['to_date']);
                                              $no_of_days=date_diff($from_date,$to_date);
                                              $tot_days = $no_of_days->format("%a");
                                              foreach ($rooms as $key => $value) { ?>
                                                <h4><?php echo $value->room_name ?></h4>
                                                <table class="table table-responsive table-bordered" style="overflow-x: scroll;   display: block;">
                                                  <thead style="background: #50c3b8;color: white; font-weight: bold;">
                                                    <tr>
                                                      <td>Date</td>
                                                      <?php for($i=0;$i<$tot_days;$i++) { 
                                                        $ndate = date('Y-m-d', strtotime($_REQUEST['from_date']. ' + '.$i.' days'));
                                                       ?>
                                                        <td style="width: 100px;"><?php echo $ndate ?></td>
                                                      <?php } ?>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td>Allotment</td>
                                                      <?php for($i=0;$i<$tot_days;$i++) { 
                                                         $ndate1 = date('Y-m-d', strtotime($_REQUEST['from_date']. ' + '.$i.' days'));
                                                       ?>
                                                        <td><?php $allotement = $this->Finance_Model->utilizationAlotfun($value->id,$ndate1,$_REQUEST['HotelSelect']);
                                                        echo $allotement[0]->allotement; ?></td>
                                                      <?php } ?>
                                                    </tr>
                                                    <tr>
                                                      <td>Utilized</td>
                                                      <?php for($i=0;$i<$tot_days;$i++) { 
                                                        $ndate2 = date('Y-m-d', strtotime($_REQUEST['from_date']. ' + '.$i.' days'));
                                                       ?>
                                                        <td><?php $utilized = $this->Finance_Model->utilizedAlotfun($value->id,$ndate2);
                                                        echo $utilized[0]->utilized;
                                                       ?></td>
                                                      <?php } ?>
                                                    </tr>
                                                    <tr>
                                                      <td>Balance</td>
                                                      <?php for($i=0;$i<$tot_days;$i++) { 
                                                        $ndate = date('Y-m-d', strtotime($_REQUEST['from_date']. ' + '.$i.' days'));
                                                       ?>
                                                        <td><?php $allotement = $this->Finance_Model->utilizationAlotfun($value->id,$ndate,$_REQUEST['HotelSelect']);
                                                        $utilized = $this->Finance_Model->utilizedAlotfun($value->id,$ndate);
                                                          echo ($allotement[0]->allotement)-($utilized[0]->utilized); ?></td>
                                                      <?php } ?>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <br>
                                            <?php } } ?>
                                          </div>
                        			              <!-- <div class="table-responsive table-desi">
                            				              <table class="table table-condensed table-hover" id="altUtlzReportTable">
                               					                  <thead>
                                    				              <tr>
                                    				                <th>Date</th>
                                                            <th>TOTAL ALLOTMENT</th>
                                                            <th>UTILIZED ALLOTMENT</th>
                                                            <th>BALANCE ALLOTMENT</th>
                                        			            </tr>
                                				                  </thead>
                                	    		                <tbody>
                                				                  </tbody>
                            				              </table>
                            			            </div> -->
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
            ConSelectFun();

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
    // });
</script>
<?php init_tail(); ?>

                

                               	

                    

