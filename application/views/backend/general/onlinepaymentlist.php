<?php init_head(); 
?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Online Payment Records</span>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="paymentrecordstable">
                                <thead>
                                    <tr>
                                        <td>Slno</td>
                                        <td>Booking Id</td>
                                        <td>Date</td>
                                        <td>Transaction Id</td>
                                        <td>Order Number</td>
                                        <td>Amount</td>
                                        <td>Payment Method</td>
                                        <td>Agent</td>
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
// $(document).ready(function() {
    var paymentrecordstable = $('#paymentrecordstable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/common/onlinepaymentslist',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
// });
</script>
<?php init_tail(); ?>


