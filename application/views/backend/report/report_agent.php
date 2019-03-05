<?php init_head(); 
$AgentReport = menuPermissionAvailability($this->session->userdata('id'),'Report','Agent Report'); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Agent Report</span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Agent</label>
                                <select name="agent_select" id="agent_select" onchange ="agent_select_fun()" >
                                    <option value="">-- Select --</option>
                                    <?php $count=count($view);
                                    for ($i=0; $i <$count ; $i++) { 
                                    if (isset($_REQUEST['agent_id']) && $_REQUEST['agent_id']==$view[$i]->id) {
                                    ?>
                                    <option selected="" value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->First_Name .' '. $view[$i]->Last_Name; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->First_Name .' '. $view[$i]->Last_Name; ?></option>

                                    <?php } } ?>
                                </select>
                        </div>
                    </div>
                        <div  class="col-sm-2">
                            <div class="form-group ">                           
                                <label for="from_date">From date</label>
                                <input type="text" class="datePicker-hide datepicker form-control" id="from_date" name="from_date" placeholder="dd/mm/yyyy" value="<?php echo  date('Y-m-d', strtotime('-4 week')); ?>" >
                                <div class="input-group">
                                    <input class="datepicker" id="alternate1" value="<?php echo  date('d/m/Y', strtotime('-4 week')); ?>" >
                                <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                </div>
                            </div>
                        </div>
                        <div  class="col-sm-2">
                            <div class="form-group ">                           
                                <label for="to_date">To date</label>
                                <input type="text" class="datePicker-hide datepicker form-control" id="to_date" name="to_date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d'); ?>" >
                                <div class="input-group">
                                    <input class="datepicker" id="alternate2" value="<?php echo date('d/m/Y'); ?>" >
                                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="button" class="mar_top_23 btn-sm btn-primary" id="search_booking_agents11" value="Search" onclick="agent_select_fun()">
                        </div>
                     <input type="hidden" name="agent_id" id="agent_id" value="">
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="agent_finance">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Agent Id</th>
                                        <th>Agent Name</th>
                                        <th>Number of Booking</th>
                                        <th>Total Amount</th>
                                        <?php if ($AgentReport[0]->view!=0) { ?>
                                        <th>Action</th>
                                        <?php } else { ?>
                                        <th> </th> 
                                        <?php } ?>
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
    $(document).ready(function() {

        var agent_select = $("#agent_select").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var agent_finance = $('#agent_finance').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/Report/agent_report_list?agent_id='+agent_select+'&from_date='+from_date+'&to_date='+to_date,
                type : 'GET'
            },
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            }
        });
    });
    $("#from_date").datepicker({
            altField: "#alternate1",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
    });
    $("#to_date").datepicker({
        altField: "#alternate2",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $("#from_date").trigger('focus');
    });
    $("#alternate2").click(function() {
        $("#to_date").trigger('focus');
    });
</script>
<?php init_tail(); ?>
