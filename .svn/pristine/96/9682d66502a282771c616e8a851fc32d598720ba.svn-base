<?php init_hotel_login_header(); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/summernote.css">
<!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast.style.min.css"> -->
<script type="text/javascript">
    $(document).ready(function() {
        // $('#imp_remarks').trumbowyg();
        // $('#cancel_policy').trumbowyg();
        // $('#imp_notes').trumbowyg();

        $("#contract_policy").click(function() {
            // var imp_remarks   = $(".imp_remarks .trumbowyg-editor").html();
            // var cancel_policy = $(".cancel_policy .trumbowyg-editor").html();
            // var imp_notes     = $(".imp_notes .trumbowyg-editor").html();

            if (imp_remarks==""|| cancel_policy=="" || imp_notes=="") {

                if (imp_remarks=="")    {
                    $(".imp_remarks_err").text("Important Remarks & Policies field is required!");
                } else {
                    $(".imp_remarks_err").text("");
                }
             if (cancel_policy=="")    {

                    $(".cancel_policy_err").text("Cancellation Policy field is required!");
                } else {
                    $(".cancel_policy_err").text("");
                }
              if (imp_notes=="")    {
                    $(".imp_notes_err").text("Important Notes & Conditions field is required!");
                } else {
                    $(".imp_notes_err").text("");
                }
            }
            else {
                        
                        $("#policy_form").attr("action",base_url+"Dashboard/contract_policy_submit");
                        $("#policy_form").submit();
      
            }
        });

        
});

</script>
<style type="text/css">
  .modal-body {
    max-height: 60vh;
    overflow-y: scroll;
    }
</style> 
<?php if (isset($_REQUEST['contract_id'])) {
            $data['view'] = $this->Hotels_Model->get_policy($_REQUEST['contract_id'],$_REQUEST['hotel_id']);
    }
?>

<!-- <div>
       <?php if (isset($_REQUEST['update'])) { ?>
        <div class="alert alert-success  col-sm-8 pull-right" id="Successalrt">
        <strong>Success!</strong> Policies Update Successfully!!!!
        </div><br><br> <?php } ?>
</div> -->

<div class="modal-content">
<!-- <div class="modal-content col-md-10 col-md-offset-2">  -->
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><span class="list-img"> Policies</h4></span>
    </div>
     <form action="contract_policy_submit" method="post" id="policy_form" name="policy_form" enctype="multipart/form-data">
   
    <div class="modal-body">
    <div class="row">
        
            <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
            <input type="hidden" name="contract_id" id="contract_id" value="<?php echo $_REQUEST['id'] ?>">
            
                <div class="form-group col-md-12 imp_remarks">
                    <div class=form-horizondal>
                        <label for="t5-n1">Important Remarks & Policies</label>
                        <textarea class="form-control" name="imp_remarks" id="imp_remarks" disabled="true"><?php echo isset($view[0]->Important_Remarks_Policies) ? trim($view[0]->Important_Remarks_Policies) : '' ?></textarea>
                        
                        <span class="imp_remarks_err popup_err blink_me"></span>
                    </div>
                </div>
                <div class="form-group col-md-12 cancel_policy">
                    <div class=form-horizondal>
                        <label for="t5-n1">Cancellation Policy</label>
                        <label><div class="form-group">
                                        <div class="multi-select-mod multi-select-trans1 input-hide">
                                            <select name="CancellationPolicySelect" id="CancellationPolicySelect" class="form-control" onchange="CancellationPolicyContentfun()">
                                                <option>select</option>
                                            </select>
                                        </div>
                                </div>
                        </label>
                        <textarea class="form-control" name="cancel_policy" id="cancel_policy" disabled="true">
                            <?php echo isset($view[0]->cancelation_policy) ? trim($view[0]->cancelation_policy) : '' ?>
                        </textarea>
                        
                        <span class="cancel_policy_err popup_err blink_me"></span>
                    </div>
                </div>
                <div class="form-group col-md-12 imp_notes">
                    <div class=form-horizondal>
                        <label for="t5-n1">Important Notes & Conditions</label>
                        <textarea class="form-control" name="imp_notes" id="imp_notes" disabled="true"><?php echo isset($view[0]->Important_Notes_Conditions) ? trim($view[0]->Important_Notes_Conditions) : '' ?></textarea>
                        <span class="imp_notes_err popup_err blink_me"></span>
                    </div>
                </div>
           
        
    
            <!-- <div class="modal-footer">
                <div class="form-group col-md-12">
                    <br>
                    <input type="button" class="waves-effect waves-light btn pull-right btn-warning" id="contract_policy" name="contract_policy" value="Update">
                </div>
            </div> -->
        
    </div>
        
    </div>
    </form>
</div>


<?php init_hotel_login_footer(); ?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/summernote.js"></script> 







