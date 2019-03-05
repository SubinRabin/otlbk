<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <!--  <input type="hidden" name="hotel_id" id="hotel_id" value=""> -->
        	<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
            <input type="hidden" name="from_date" id="from_date" value="<?php echo isset($_REQUEST['from_date']) ? $_REQUEST['from_date']: ''; ?>">
            <input type="hidden" name="to_date" id="to_date" value="<?php echo isset($_REQUEST['to_date']) ? $_REQUEST['to_date']: ''; ?>">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Detail Report</span>
                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="hotel_finance_view">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking ID</th>
                                        <th>Invoice ID</th>
                                        <!-- <th>Per room amount</th> -->
                                        <th>Number of rooms</th>
                                        <th>Number of days</th>
                                        <th>Total amount</th>
                                        <th>Booking date</th>
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
<script type="text/javascript">
    $(document).ready(function() {
      var fin_id = $("#id").val();
      var to_date = $("#to_date").val();
      var from_date = $("#from_date").val();
      var hotel_finance_view = $('#hotel_finance_view').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/Report/hotel_finance_view_dtails?id='+fin_id+'&from_date='+from_date+
                '&to_date='+to_date,
                type : 'GET'
            },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      }); 
  }); 

</script>
<?php init_tail(); ?>





