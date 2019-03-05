<?php init_head(); 
$HotelReport= menuPermissionAvailability($this->session->userdata('id'),'Report','Hotel Report'); 
?>
<script src="<?php echo base_url(); ?>assets/js/hotel_finance.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Hotel Report</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select Hotel</label>
                            <select name="hotel_select" id="hotel_select" onchange ="hotel_select_fun()">
                                <option value="">-- Select --</option>
                                <?php $count=count($view);
                               for ($i=0; $i <$count ; $i++) { 
                                if (isset($_REQUEST['hotel_id']) && $_REQUEST['hotel_id']==$view[$i]->id) {
                                ?>
                                <option selected="" value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $view[$i]->id; ?>"><?php echo $view[$i]->hotel_name; ?></option>
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
                    <input type="button" class="mar_top_23 btn-sm btn-primary" id="search" onclick="hotel_select_fun()" value="Search">
                </div>
                <input type="hidden" name="hotel_id" id="hotel_id" value="">
                    
            <div class="clearfix">
            <br>
                <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="hotel_finance">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hotel Id</th>
                                        <th>Hotel Name</th>
                                        <th>Number of Booking</th>
                                        <th>Total Amount</th>
                                        <?php if ($HotelReport[0]->view!=0) { ?>
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
<script type="text/javascript">
    $( document ).ready(function() {
    // var hotel_select = $("#hotel_select").val();

    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    var hotel_finance = $('#hotel_finance').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'backend/Report/hotel_select_list?from_date='+from_date+'&to_date='+to_date,
            type : 'GET'
            },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
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
    });
</script>
<?php init_tail(); ?>
