<?php init_head();  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/trumbowyg.css">
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Terms and Conditions</h2>
                <?php } else { ?>
                <h2>Add Terms and Conditions</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/tour/contractconditions?id=<?php echo $contract_id ?>" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/tour/addcondition" name="add_condition_form" id="add_condition_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <input type="hidden" name="contract_id" value="<?php echo isset($contract_id) ? $contract_id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="list-title">Terms and Conditions</label>
                            <textarea class="form-control" id="conditions" name="conditions"><?php echo isset($edit[0]->conditions) ? $edit[0]->conditions : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-md-offset-6">
                            <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                <button type="button" style="margin-top: 25px" id="add_condition_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                            <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_condition_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                            <?php } ?>
                        </div>
                    </div>                  
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script> 

<script>
    $('#conditions').trumbowyg();
    $('#add_condition_submit_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'/backend/tour/condition_validation',
          data: $('#add_condition_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_condition_form").submit();
              }, 1500);
            }
             else {
              addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    });
   
</script>
<?php init_tail(); ?>


