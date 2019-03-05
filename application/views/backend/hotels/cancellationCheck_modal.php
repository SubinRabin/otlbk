<div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content" style="width: 415px;">
      <div class="modal-body">
        <div class="row">
            <input id="calMap" type="hidden">
            <div class="form-group row col-md-12">
                <H4>Cancellation policy</H4>
            </div>
            <div class="form-group row col-md-12">
                <?php
                if($_REQUEST['application'] === 'F') {
                    $application = 'FREE OF CHARGE';
                } else{
                    $application = $_REQUEST['application'];
                } ?>
                Season : <?php echo $application; ?>
            </div>
            <div class="form-group row col-md-12">
                <?php if($_REQUEST['application']=== 'F') { ?>
                    
                        <span>Cancellation is free of charge.</span>
                    
                <?php } elseif ($_REQUEST['application']==='FIRST NIGHT') { ?>
                    
                        <span>
                            If cancelled before <?php echo date('d/m/Y', strtotime('-'.$_REQUEST['days'].' days', strtotime($_REQUEST['date'])))  ?>,amount deducted : 0%  <br> If cancelled after <?php echo date('d/m/Y', strtotime('-'.$_REQUEST['daysTo'].' days', strtotime($_REQUEST['date']))) ?>, amount deducted  : <?php echo $_REQUEST['percent'] ?>% of cost of first night.
                        </span>
                    
                <?php } elseif($_REQUEST['application']==='STAY') { ?>
                    
                        <span>
                            If cancelled before <?php echo date('d/m/Y', strtotime('-'.$_REQUEST['days'].' days', strtotime($_REQUEST['date'])))  ?>,amount deducted : 0%  <br> If cancelled after <?php echo date('d/m/Y', strtotime('-'.$_REQUEST['daysTo'].' days', strtotime($_REQUEST['date']))) ?>, amount deducted  : <?php echo $_REQUEST['percent'] ?>% of total booking cost.
                        </span>
                    
                <?php } ?> 
            </div>
            <div class="btn-toolbar pull-right">
                <button type="button" class="btn btn-default nBtn nclose" data-dismiss="canModal">X</button>
            </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    $(document.ready(function(){ 
         $('.modal').on('hidden.bs.modal', function(e){ 
            $(this).removeData();
            $('#modal-container .modal-content').empty();
        });
    });
</script>
