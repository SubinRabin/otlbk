<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        $("#from_date").datepicker({
            yearRange: "1950:<?php echo date('Y') ?>",
            altField: "#alternate",
            // altField: "#alternate",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate").click(function() {
            $( "#from_date" ).trigger('focus');
        });
        $("#to_date").datepicker({
            yearRange: "1950:<?php echo date('Y') ?>",
            altField: "#alternate",
            // altField: "#alternate",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate1").click(function() {
            $( "#to_date" ).trigger('focus');
        });
    
    });
</script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                    <div class="inn-title">
                        <span>View Ledger</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label>Trans Head :</label>
                                    <select id="trans_head" onchange="account_change('trans_head','child_head');">
                                        <option value="">--Select--</option>
                                        <?php foreach ($main_account_head as $key => $value) { ?>
                                            <option value="<?php echo $value->Fah_ID ?>"><?php echo $value->Fah_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Child Head :</label>
                                    <select id="child_head">
                                        <option value="">--Select--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Cost Center :</label>
                                    <select id="cost_center">
                                        <option value="">--Select--</option>
                                        <?php foreach ($cost_center as $key => $value) { ?>
                                            <option value="<?php echo $value->Fcc_ObjectID ?>"><?php echo $value->Fcc_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <?php $from_date = date('Y-m-d', strtotime("-3 week"));  
                                        $from_date1 = date('d/m/Y', strtotime("-3 week"));  
                                    ?>
                                    <label>From:</label>
                                    <input type="text" id="from_date" value="<?php echo $from_date ?>" class="datePicker-hide">
                                    <div class="input-group">
                                            <input class="form-control date-pic" id="alternate" name="" value="<?php echo $from_date1 ?>">
                                            <label for="alternate" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <?php $to_date = date('Y-m-d');
                                        $to_date1 = date('d/m/Y');  ?>
                                    <label>To:</label>
                                    <input type="date" id="to_date" value="<?php echo $to_date ?>" class="datePicker-hide">
                                    <div class="input-group">
                                            <input class="form-control date-pic" id="alternate1" name="" value="<?php echo $to_date1 ?>">
                                            <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="button" name="" class="btn-sm btn-primary mar_left_5 pull-right" id="ledger_view_btn" value="Show"></ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bor">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="ledger_table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Narration</th>
                                        <th>Cheque No</th>
                                        <th>Cheque Date</th>
                                        <th>Receipt No</th>
                                        <th>Voucher No</th>
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
<div class="container">
  <!-- Modal -->
      <div class="modal-bg-fix modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <form name="company_delt"  id="company_delt" action="<?php echo base_url('backend/finance/copmany_dlete'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4><br>
                    </div>
                    <input type="text" name="id" id="delete_id" hidden>
                    <div class="modal-body">
                      <p>Do You Want Delete???</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn-danger">Delete</button>
                    </div>
               </form>
              </div>
            </div>
      </div>
  
</div>

<?php init_tail(); ?>
