<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettify.css" />

  <div class="modal-content col-md-12">
        <div class="modal-header">
          <button type="button" class="close close_edit_modal" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Hotels Banner</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="permission_check" value="<?php echo $permission!='' ? $permission : '' ?>">
            <div class="row">
                <div class="col-xs-5">
                    <span>Inactive Hotels</span>
                    <select name="country_from[]" id="undo_redo" class="form-control" size="13" multiple="multiple">
                        <?php foreach ($hotels as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->hotel_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="col-xs-2">
                    <button type="button" id="undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                    <button type="button" id="undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                    <button type="button" id="undo_redo_rightSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                    <button type="button" id="undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" id="undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                    <button type="button" id="undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                </div>
                
                <div class="col-xs-5">
                    <span>Active Hotels</span>
                    <form id="hotels_banner_form" method="post">
                    <select name="hotels_to[]" id="undo_redo_to" class="form-control" size="13" multiple="multiple"></select>
                    </form>
                </div>
            </div>
        <div class="modal-footer">
            <input type="button" id="update_hotels_banner" class="no-border btn-sm btn-success" value="Update">
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
    

    // make code pretty
    window.prettyPrint && prettyPrint();

    $('#undo_redo').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length = 1;
        }
    });
    <?php if ($permission!='') { ?>
    var permission_check = $("#permission_check").val().split(",");
    $.each(permission_check, function(i, v) {
    $('#undo_redo option[value='+v+']').attr('selected','selected');
    });
    <?php } ?>

    <?php if ($permission!='') { ?>
    $("#undo_redo_rightSelected").trigger('click');
    $('#undo_redo_to').prop('selectedIndex', 0).focus(); 
    <?php } ?>
// });
</script>