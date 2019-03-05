<?php init_hotel_login_header(); ?>
<?php $hotel_log_id=$this->session->userdata('id'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/summernote.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#imp_remarks').trumbowyg();
        $('#cancel_policy').trumbowyg();
        $('#imp_notes').trumbowyg();
    });
</script><br>


    <div class="inn-title">
        <h3><span>Policies</span></h3>
    </div>
      <div>
       <?php if (isset($_REQUEST['update'])) { ?>
        <div class="alert alert-success  col-sm-8 pull-right" id="Successalrt">
        <strong>Success!</strong> Policies Update Successfully!!!!
        </div><br><br> <?php } ?>
      </div>
    <form action="hotel_policy_add_update" method="post" id="new_hotel_form" name="new_hotel_form" enctype="multipart/form-data"> 
    <input type="hidden" name="hotel_id" value="<?php echo $hotel_log_id; ?>">
        <div class="bor">
            <div class="row">
                <div class="form-group col-md-12 imp_remarks">
                    <label for="t5-n1">Important Remarks & Policies</label>
                    <textarea class="form-control" name="imp_remarks" id="imp_remarks" ><?php echo isset($view[0]->Important_Remarks_Policies) ? $view[0]->Important_Remarks_Policies : '' ?></textarea>
                    </textarea>
                </div>
                <div class="form-group col-md-12 cancel_policy">
                    <label for="t5-n1">Cancellation Policy</label>
                    <textarea class="form-control" name="cancel_policy" id="cancel_policy"><?php echo isset($view[0]->Important_Notes_Conditions) ? $view[0]->Important_Notes_Conditions : '' ?></textarea>
                </div>
                <div class="form-group col-md-12 imp_notes">
                    <label for="t5-n1">Important Notes & Conditions</label>
                    <textarea class="form-control" name="imp_notes" id="imp_notes" ><?php echo isset($view[0]->cancelation_policy) ? $view[0]->cancelation_policy : '' ?></textarea>
                </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" id="hotel_tab_7" class="waves-effect waves-light btn pull-right btn-warning" value="Update">
                </div>
            </div>

       </div>
   </div>
  </div>
</form>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/summernote.js"></script> 

<?php init_hotel_login_footer(); ?>