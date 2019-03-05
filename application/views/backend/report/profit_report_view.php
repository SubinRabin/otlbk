<?php init_head(); 
$RepProfit = menuPermissionAvailability($this->session->userdata('id'),'Report','Profit Report'); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
          <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Detail Report</span>
                    </div>
                
                    <div class="tab-inn">
                       <div class="table-responsive table-desi">
                        <table class="table table-condensed table-hover" id="profit_report_view">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking Id</th>
                                    <th>Invoice Id</th>
                                    <th>Hotel Id</th>
                                    <th>Per room amount</th>
                                    <th>Number of Rooms</th>
                                    <th>Number of Days</th>
                                    <th>Tax</th>
                                    <th>Tax amount</th>
                                    <th>Admin Markup %</th>
                                    <th>Admin Markup</th>
                                    <th>Invoice Date</th>
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
<?php init_tail(); ?>
