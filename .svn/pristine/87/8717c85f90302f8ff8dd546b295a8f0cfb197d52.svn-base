<?php init_head(); 
$ProfitReport = menuPermissionAvailability($this->session->userdata('id'),'Report','Profit Report'); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Profit Report</span>
                    </div>                 
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Select Hotel</label><span>*</span>
                                <select name="hotel_select" id="hotel_select" onchange="select_profit_fun()" >
                                    <option value="">-- Select --</option>
                                    <?php $count=count($view);
                                    for ($i=0; $i <$count ; $i++) { 
                                    if (isset($_REQUEST['hotel_id']) && $_REQUEST['hotel_id']==$view[$i]->id) {
                                    ?>
                                    <option selected="" value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>

                                    <?php } } ?>
                                    <input type="hidden" name="hotel_id" id="hotel_id" value="">
                                </select>
                           
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Select Agent</label><span>*</span>
                                <select name="agent_select" id="agent_select" onchange="select_profit_fun()">
                                    <option value="">-- Select --</option>
                                    <?php $count=count($view1);
                                    for ($i=0; $i <$count ; $i++) { 
                                    if (isset($_REQUEST['agent_id']) && $_REQUEST['agent_id']==$view1[$i]->id) {
                                    ?>
                                    <option selected="" value="<?php echo $view1[$i]->id; ?>"><?php echo $view1[$i]->First_Name .' '. $view1[$i]->Last_Name; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $view1[$i]->id; ?>"><?php echo $view1[$i]->First_Name .' '. $view1[$i]->Last_Name; ?></option>

                                    <?php } } ?>
                                     <input type="hidden" name="agent_id" id="agent_id" value="">     
                                </select>
                            
                        </div>
                    </div>  
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="profit_report">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking Code</th>
                                        <th>Hotel Code</th>
                                        <th>booked rooms</th>
                                        <th>Number of days</th>
                                        <th>Admin Markup</th>
                                        <th>Total Amount</th>
                                        <!-- <th>Action</th> -->
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
<script type="text/javascript">
    var agent_select = $("#agent_select").val();
    var hotel_select = $("#hotel_select").val();
    alert(agent_select);
    alert(hotel_select);
    var profit_report = $('#profit_report').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/profit_report_list?hotel_id='+hotel_select+'&agent_id='+agent_select,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
        }
    }); 
</script>
<?php init_tail(); ?>
