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
                        <span>Total Room Night Report</span>
                      </div> 
                      <form method="get" id="allotement_filter" action="<?php echo base_url(); ?>backend/hotels/hotels_stopSale">
                				  <div class="col-md-12"> 
                					        <div class="form-group col-md-2">
                						              <label for="from_date">From date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="from_date" name="from_date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                                          <?php $today=date('d/m/Y'); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo $today ?>">
                                          <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="to_date">To date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="to_date" name="to_date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                                          <?php $today=date('d/m/Y' ,strtotime('+1 days')); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo $today ?>">
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
                                          <select name="stateSelect" id="stateSelect" onchange ="StateSelectFun()" class="form-control">
                                          <option value="">Select</option>
                                          </select> 
                                          </div>
                               		</div>
                                  <div class="form-group col-md-2">
                                          <label for="citySelect">City</label>
                                          <div class="multi-select-mod multi-select-trans1 input-hide">
                                          <select name="citySelect" id="citySelect"  class="form-control">
                                          <option value="">Select</option>
                                          </select>
                                          </div> 
                                  </div>
                                  <div class="form-group col-md-2">
                                          <input type="button" class="mar_top_23 btn-sm btn-primary" id="SearchNightReport" value="Search">
                                  </div>
                          </div>
                      </form>
                      <input type="hidden" name="agent_id" id="agent_id" value="2">
                            <div class="clearfix">
                    		            <br>
                            	    <div class="col-md-12">
                    				            <div class="tab-inn">
                        			               <div class="table-responsive table-desi">
                            				              <table class="table table-condensed table-hover" id="NightReporttbl">
                               					                  <thead>
                                    				              <tr>
                                        				                <th>#</th>
                                        				                <th>Lead Time</th>
                                        				                <th>No of Transaction</th>
                                        				                <th>No of Transaction %</th>
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
    </div>
</div>
<?php init_tail(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<script type="text/javascript">
    // $( document ).ready(function() {
            var nextDay = new Date($("#from_date").val());
            nextDay.setDate(nextDay.getDate() + 1);
            $("#from_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      altField: "#alternate1",
                      // altField: "#alternate",
                      dateFormat: "yy-mm-dd",
                      altFormat: "dd/mm/yy",
                      changeYear : true,
                      changeMonth : true,
                      onSelect: function(dateText) {
                        var nextDay = new Date(dateText);
                        nextDay.setDate(nextDay.getDate() + 1);
                        $("#to_date").datepicker('option', 'minDate', nextDay);
                          setTimeout(function(){
                            $( "#datepicker2" ).datepicker('show');
                          }, 16);     
                      }
            });
            $("#alternate1").click(function() {
                $( "#from_date" ).trigger('focus');
            });
            $("#to_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      minDate: nextDay,
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

                

                               	

                    

