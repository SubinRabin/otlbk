<div class="modal-content modal-content  col-md-6 col-md-offset-3">
  <form id="offlineRequestActionForm" method="post">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
    <input type="hidden" name="val" value="<?php echo $_REQUEST['val']; ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body">
    <?php if ($_REQUEST['val']==0) { ?>
      <h4>Do you want to Cancel this booking!</h4>
    <?php } else { ?>
      <h4>Do you want to accept this booking!</h4>
      <br>
        <div class="row">
          <div class="col-md-6 form-group">
           <input type="hidden" name="hotelname" id="hotelname" value="<?php echo $view[0]->hotel_name; ?>">
            <input type="hidden" name="roomname" id="roomname" value="<?php echo $view[0]->room_name; ?>">
            <input type="hidden" name="suppliername" id="suppliername" value="<?php echo $view[0]->SupplierName; ?>">
            <input type="hidden" name="board" id="board" value="<?php echo $view[0]->board; ?>">
            <input type="hidden" name="hoteladrs" id="hoteladrs" value="<?php echo $view[0]->hotel_addresss; ?>">
            <input type="hidden" name="supplieradrs" id="supplieradrs" value="<?php echo $view[0]->SupllierAddress; ?>">
             <input type="hidden" name="sellingprice" id="sellingprice" value="<?php echo  $view[0]->room1Selling;?>">
            <input type="number" name="conNumber" id="conNumber" class="form-control" placeholder="Confirmation Number">
          </div>
          <div class="col-md-6 form-group">
            <input type="text" name="conName" id="conName" class="form-control" placeholder="Confirmation Name">
          </div>
        </div>
   <?php  } ?>
  </div>
  <div class="modal-footer">
    <?php if ($_REQUEST['val']==0) { ?>
      <button class="btn-sm btn-danger" data-dismiss="modal">No</button>
      <input type="button" class="btn-sm btn-success" id="CancelClick" value="Yes">
    <?php } else { ?>
      <button class="btn-sm btn-danger" data-dismiss="modal">No</button>
      <input type="button" class="btn-sm btn-success" id="AcceptClick" value="Yes">
   <?php  } ?>
  </div>
</div>
  </form>
<script type="text/javascript">
  $("#AcceptClick").click(function() {
      var conNumber = $("#conNumber").val();
      var conName = $("#conName").val();
      var hotelname = $("#hotelname").val();
      var roomname = $("#roomname").val();
      var suppliername = $("#suppliername").val();
      var board = $("#board").val();
      var hoteladrs = $("#hoteladrs").val();
      var supplieradrs = $("#supplieradrs").val();
      var sellingprice = $("#sellingprice").val();
      if(hotelname=="" || roomname=="" || suppliername=="" || board=="" || hoteladrs=="" || supplieradrs=="" || sellingprice=="" || sellingprice==0){
        addToast("Please edit the requests to add price details and other details","orange");
          $("#package").focus();
      }else if (conNumber=="") {
        addToast("Confirmation Number field is required!","orange");
        $("#conNumber").focus();
      } else if(conName=="") {
        addToast("Confirmation Name field is required!","orange");
        $("#conName").focus();
      } else {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/OfflineActionSubmit',
            data : $("#offlineRequestActionForm").serialize(),
            cache: false,
            success: function(response) {
              addToast("Accepted Successfully","green");
              document.location.reload(true);
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
      }
  });
  $("#CancelClick").click(function() {
    $.ajax({
          dataType: 'json',
          type: "POST",
          url: base_url+'backend/booking/OfflineActionSubmit',
          data : $("#offlineRequestActionForm").serialize(),
          cache: false,
          success: function(response) {
            addToast("Cancelled Successfully","green");
            document.location.reload(true);
          },
         error: function (xhr,status,error) {
           alert("Error: " + error);
        }
      });
  });
</script>