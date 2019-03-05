<?php init_head(); ?>

<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Agent Sales Report</span>
                    </div>
                    <form method="Post" id="agentSale_filter" name="agentSale_filter">
                        <div class="col-md-2 form-group">
                            <label>Month</label>
                            <select name="month" id="month" >
                                <?php for ($i=1; $i <=12 ; $i++) { 
                                    if (date('m')==$i) {
                                        $selected = 'selected'; 
                                    } else {
                                        $selected = ''; 
                                    }
                                ?>
                                    <option  <?php echo $selected ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Year</label>
                            <select name="year" id="year" >
                                <?php for ($i=2017; $i <=date('Y') ; $i++) {
                                    if (date('Y')==$i) {
                                        $selected = 'selected'; 
                                    } else {
                                        $selected = ''; 
                                    }
                                 ?>
                                    <option <?php echo $selected ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
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
                        <div class="form-group col-md-2">
                            <input type="button" class="mar_top_23 btn-sm btn-primary" id="AgentSalesFilter" value="Search" >
                        </div>
                    </form>
                     <input type="hidden" name="agent_id" id="agent_id" value="">
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="AgentSales">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hotel</th>
                                        <th>Agent</th>
                                        <th>Total Room Nights</th>
                                        <th class="summable">Total Cost</th>
                                        <th class="summable">Total Selling</th>
                                        <th class="summable">Total Margin</th>
                                        <th class="summable">%Margin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Grand Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
<script type="text/javascript">
    // $( document ).ready(function() {

            var agent_select = $("#agent_select").val();
            var month    = $("#month").val();
            var year      = $("#year").val();
            // alert(base_url+'/backend/Report/agentsalesfilter?agent_id='+agent_select+'&from_date='+from_date+'&to_date='+to_date)
            // alert(base_url+'/backend/Report/agentsalesfilter?agent_id='+agent_select+'&month='+month+'&year='+year);
            var AgentSales   = $('#AgentSales').dataTable({
                "bDestroy": true,
                "ajax": {
                    url : base_url+'/backend/Report/agentsalesfilter?agent_id='+agent_select+'&month='+month+'&year='+year,
                    type : 'GET'
                },
                
                "fnDrawCallback": function(settings){
                $('[data-toggle="tooltip"]').tooltip();          
                },
                "footerCallback":function(row, data, start, end, display){

                    // console.log('started',tfoot)
                    var api = this.api();
                    api.columns('.summable').every(function() {
                        var sum = api.cells(null, this.index()).render('display').reduce(function(a, b) {var x = parseFloat(a) || 0.00;var y = parseFloat(b) || 0.00;return x + y;}, 0);console.log(this.index() + ' ' + sum);$(this.footer()).html('<h5>'+sum.toFixed(2)+'</h5>');});
                }
            });

            var ava_end = new Date($("#to_date").val());
            var ava_start = new Date($("#from_date").val());
            var nextDay = new Date($("#fromDate").val());
            var end_date = new Date($("#ava_end").val());
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
            }
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
                      minDate: ava_end,
                      maxDate: end_date,
                      changeYear : true,
                      changeMonth : true,
            });
            $("#alternate2").click(function() {
                $( "#to_date" ).trigger('focus');
            });
    // });
</script>

<?php init_tail(); ?>
