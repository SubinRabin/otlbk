<?php init_head();?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
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
                				  <div class="col-md-12"> 
                					        <div class="form-group col-md-2">
                						              <label for="from_date">From date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="from_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" />
                                          <?php $today=date('d/m/Y'); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo $today ?>">
                                          <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="to_date">To date</label>
                               			      <input type="text" class="datePicker-hide datepicker input-group-addon" id="to_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" />
                                          <?php $today=date('d/m/Y'); ?>
                                          <div class="input-group">
                                          <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo $today ?>">
                                          <label for="to_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                          </div>
                               		</div>
                               		<div class="form-group col-md-2">
                						              <label for="from_date">Country</label>
                               	          <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
                                          <option value=" "> Country </option>
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
                                          <input type="button" class="mar_top_23 btn-sm btn-primary" id="SearchNightReport30" value="Search">
                                  </div>
                          </div>
                      </form>
                      <input type="hidden" name="agent_id" id="agent_id" value="2">
                            <div class="clearfix">
                    		            <br>
                            	    <div class="col-md-12">
                    				            <div class="tab-inn">
                        			               <div class="table-responsive table-desi">
                            				              <table class="table table-condensed table-hover" id="NightReporttbl30">
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

<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<script type="text/javascript">
    var tpj=jQuery;
    $( document ).ready(function() {
            tpj("#from_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      altField: "#alternate1",
                      // altField: "#alternate",
                      dateFormat: "yy-mm-dd",
                      altFormat: "dd/mm/yy",
                      changeYear : true,
                      changeMonth : true,
            });
            tpj("#alternate1").click(function() {
                tpj( "#from_date" ).trigger('focus');
            });
            tpj("#to_date").datepicker({
                      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
                      altField: "#alternate2",
                      // altField: "#alternate",
                      dateFormat: "yy-mm-dd",
                      altFormat: "dd/mm/yy",
                      changeYear : true,
                      changeMonth : true,
            });
            tpj("#alternate2").click(function() {
                tpj( "#to_date" ).trigger('focus');
            });
    });
</script>

                

                               	

                    

