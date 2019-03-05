<script src="<?php echo base_url(); ?>assets/js/hotelportel.js"></script>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php if (isset($_REQUEST['copy'])) { ?>
         <h4 class="modal-title">Copy Contract <?php echo isset($_REQUEST['copy']) ? ' - '.$view[0]->contract_id : '' ?></h4>
        <?php } else { ?>
         <h4 class="modal-title"><?php echo isset($_REQUEST['id']) ? 'Edit' : 'Add' ?> Contract <?php echo isset($_REQUEST['id']) ? ' - '.$view[0]->contract_id : '' ?></h4>
        <?php } ?>
      </div>
      <div class="modal-body">
        <form method="post" id="add_contract" name="add_contract" enctype="multipart/form-data"> 
        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['hotel_id'] ?>" >
        <input type="hidden" name="contract_id" id="contract_id" value="<?php echo isset($_REQUEST['id']) ? $view[0]->contract_id : '' ?>" >
        
        <?php if (isset($_REQUEST['contract_id'])) {
            $data['view'] = $this->Hotels_Model->hotel_contract_list($_REQUEST['contract_id']);
            // print_r($data['view'][0]);
            // exit();
            //$data['amount'] = $data['view'][0]->amount;
            $data['date_picker'] = $data['view'][0]->from_date;
            $data['date_picker1'] = $data['view'][0]->to_date;
            $data['tax'] = $data['view'][0]->tax_percentage;
            $data['max_age'] = $data['view'][0]->max_child_age;
            $data['markup'] = $data['view'][0]->markup;
            //$data['classification'] = array($data['view'][0]->classification =>$data['view'][0]->classification,'Normal'=>'Normal','priority'=>'priority');
            //$data['application'] = array($data['view'][0]->application =>$data['view'][0]->application,'Per Room'=>'Per Room','Per Person'=>'Per Person');
            //$data['rate_type'] = array($data['view'][0]->rate_type =>$data['view'][0]->rate_type,'Net'=>'Net','Commision'=>'Commision');
            $data['tax_percentage'] = array($data['view'][0]->tax_percentage =>$data['view'][0]->tax_percentage,'Included'=>'Included','6'=>'6','8'=>'8','12' => '12','20'=>'20');
            
          $data['contract_type'] = array($data['view'][0]->contract_type =>$data['view'][0]->contract_type,'Main'=>'Main','Sub'=>'Sub');
          $data['board'] = array($data['view'][0]->board =>$data['view'][0]->board,'RO'=>'RO','B&B'=>'B&B','HB'=>'HB','FB'=>'FB','AL'=>'AL');

        } else {
            $classification = array('Normal'=>'Normal','priority'=>'priority');
            $application = array('Per Room'=>'Per Room','Per Person'=>'Per Person');
            $rate_type = array('Net'=>'Net','Commision'=>'Commision');
            $contract_type=array('' => '','Main'=>'Main','Sub'=>'Sub');
            // $contract_type = array('FIT'=>'FIT','Non Refundable'=>'Non Refundable','Opaque'=>'Opaque');
            $board = array('RO'=>'RO','B&B'=>'B&B','HB'=>'HB','FB'=>'FB','AL'=>'AL');
                    }
            ?>

       <!--  <div class="row">
            <div class="form-group col-md-4">
    	        <label for="amount">Amount</label>
    	        <input id="amount" name="amount" type="number" class="form-control" value="<?php echo isset($view[0]->amount) ? $view[0]->amount : '' ?>">
    	    </div> -->
    	    <!-- <div class="form-group col-md-4">
                <label for="application">Application : </label>
                <select name="application" id="application" class="form-control">
                    <?php foreach ($application as $key => $value) { ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div> -->
            <!-- <div class="form-group col-md-4">
                <label for="classification">Classification : </label>
                <select name="classification" id="classification" class="form-control">
                    <?php foreach ($classification as $key => $value) { ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
        </div> -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="board">Board</label>
                <select name="board" id="board" class="form-control">
                     <?php foreach ($board as $key => $value1) { 
                         if(isset($_REQUEST['id']) && $view[0]->board==$value1  ) { ?>
                        <option selected="" value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } } ?>
                   
                   
                </select>
                <span class="board_err popup_err blink_me"></span>
            </div>
            <div class="form-group col-md-4">
                <label for="date_picker">From Date:</label>
                <input type="date" id="date_picker" name="date_picker" class="form-control" value="<?php echo isset($view[0]->from_date) ? $view[0]->from_date : '' ?>">
                <span class="date_picker_err popup_err blink_me"></span>
            </div>
            <div class="form-group col-md-4">
                <label for="date_picker1">To Date:</label>
                <input type="date" id="date_picker1" name="date_picker1" class="form-control"  value="<?php echo isset($view[0]->to_date) ? $view[0]->to_date : '' ?>">
                <span class="date_picker1_err popup_err blink_me"></span>
            </div>
        </div>
            
        <div class="row">
            <div class="form-group col-md-4">
                <label for="tax">Tax Pecentage : </label>
                <input id="tax" name="tax" type="number" class="form-control" value="<?php echo isset($view[0]->tax_percentage) ? $view[0]->tax_percentage : '' ?>">
                <span class="tax_err popup_err blink_me"></span>
            </div>
            <div class="form-group col-md-4">
                <label for="max_age">Max child age : </label>
                <select name="max_age" id="max_age" class="form-control">
                    <?php for ($i=1; $i < 12; $i++) { 

                        if (isset($_REQUEST['id']) && $view[0]->max_child_age==$i) { ?>
                            <option selected="selected" value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } else { ?>
                            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } } ?>
                
                </select>
                <span class="max_age_err popup_err blink_me"></span>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="markup">markup %</label>
                    <input id="markup" name="markup" type="number" class="form-control" value="<?php echo isset($view[0]->markup) ? $view[0]->markup : '' ?>"> 
                </div>
                <span class="markup_err popup_err blink_me"></span>
            </div>
        </div>
            
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="contract_type">Contract Type</label>
                <select name="contract_type"   onchange="maincontractCheck();" id="contract_type" class="form-control">
                <?php foreach ($contract_type as $key => $value1) { 
                         if(isset($_REQUEST['id']) && $view[0]->contract_type==$value1  ) { ?>
                        <option selected="" value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $value1 ?>"><?php echo $value1 ?></option>
                    <?php } } ?>
                    </select>
                <span class="contract_type_err popup_err blink_me"></span>
            </div>
            <div class="form-group col-md-4">
                <label>Contract Name</label><span>*</span>
                <input type="text" name="contract_name" id="contract_name" class="form-control" value="<?php echo isset($view[0]->contractName) ? $view[0]->contractName : '' ?>">
                <span class="contract_name_err popup_err blink_me"></span>
            </div>
            
            <div class="form-group col-md-4 linked_contract">
                <label>Linked Contract</label><span>*</span>
                <select class="form-control" id="linked_contract" name="linked_contract">
                    <option>--Select Contract--</option>
                </select>
                <span class="linked_contract_err popup_err blink_me"></span>
            </div>
            
        </div>
    </form>
      <div class="modal-footer">
        <?php if (isset($_REQUEST['copy'])) { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_submit">Copy</button>
        <?php } else if(isset($_REQUEST['id']))  { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_update">Update</button>
        <?php } else { ?>
            <button type="button" class="btn-sm btn-success" name="contract_submit" id="contract_submit">Submit</button>
        <?php } ?>
      </div>
    </div>
  </div>
<script src="<?php echo base_url(); ?>skin/js/hotelportel.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        maincontractCheck();
    }); 
    function maincontractCheck() {
        if($("#contract_type").val()!="Main") {
            $("#linked_contract option").remove();
            $("#linked_contract").append('<option value="">--Select Contract--</option>');
            $(".linked_contract").removeClass("hide")
           var hotel_id = $("#id").val();
           <?php if (isset($_REQUEST['copy'])) { ?>
            var contract_id = "";
           <?php } else { ?>
            var contract_id = $("#contract_id").val();
           <?php } ?>
            $.ajax({
                dataType: 'json',
                type: "Post",
                url: base_url+'dashboard/maincontractCheck?hotel_id='+hotel_id+'&contract_id='+contract_id,
                success: function(data) {
                    $.each(data, function(i, v) {
                        $("#linked_contract").append('<option value="'+v.id+'">'+v.contract_id+" - "+v.board+'</option>');
                    });
                }
            }); 
        } else {
            $("#linked_contract option").remove();
            $("#linked_contract").append('<option value="">--Select Contract--</option>');
            $(".linked_contract").addClass("hide")
        }
    }
</script>

