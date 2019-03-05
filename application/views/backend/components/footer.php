     
      <!-- Delete modal -->
      <div id="myModal" class="delete_modal modal">
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h4>Do you want to delete this !</h4>
          </div>
          <div class="modal-footer">
            <form action="<?php echo base_url(); ?>backend/" class="delete_id" id="delete_form">
                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="button" onclick="commonDelete();" class="waves-effect waves-light btn-sm btn-danger pull-right">Delete</button>
            </form>
          </div>
        </div>
      </div>

      <div id="myModalban" class="delete_modal modal">
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h4>Do you want to Ban this !</h4>
          </div>
          <div class="modal-footer">
            <form action="<?php echo base_url(); ?>backend/Hotels/delete_hotel" id="delete_formhotel" class="delete_id" enctype="multipart/form-data">

                <input type="hidden" id="delete_id" name="delete_id" class="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="button" onclick="blockHotel();"  class="waves-effect waves-light btn-sm btn-danger pull-right">Block</button>
            </form>
          </div>
        </div>
      </div>
      <button type="button" class="hide chatModal" data-toggle="modal" data-target="#chatRequestModal">Chat Modal</button>
      <div id="chatRequestModal" class="chatRequestModal delete_modal modal">
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h4 id="chat-request"></h4>
          </div>
          <div class="modal-footer">
            <form action="<?php echo base_url(); ?>" id="delete_formhotel" class="delete_id" enctype="multipart/form-data">
                <input type="hidden" name="agent_id" id="agent_id">
                <input type="hidden" name="request_id" id="request_id">
                <button type="button"  class="waves-effect waves-light btn-sm btn-danger pull-right" onclick="accept_request()">Accept</button>
                <button type="button"  class="waves-effect waves-light btn-sm btn-danger pull-right" class="cancel" onclick="cancel_request()">Cancel</button>
            </form>
          </div>
        </div>
      </div>

      
      <!-- view modal -->
        <div class="delete_modal modal fade" id="large_modal" role="dialog">
          <div class="modal-dialog modal-lg">
          </div>
        </div>


        <!-- calendar modal -->
        <div class="delete_modal modal fade modal-lg right md-effect-2" id="calendar_modal" role="dialog" style="max-height: 86%;" data-easein="slideRightIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        </div>
   </div>
    </div>
    <!--== BOTTOM FLOAT ICON ==-->
    <!-- <section>
        <div class="fixed-action-btn vertical">
            <a id="calendar_filter" data-toggle="modal" data-target="#calendar_modal" class="btn-floating btn-large blue pulse">
                <i class="fa fa-calendar-plus-o fa-2x"></i>
            </a>
        </div>
    </section> -->

<div id="myModalban" class="delete_modal modal">
        <div class="modal-content modal-content  col-md-6 col-md-offset-3">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h4>Do you want to Ban this !</h4>
          </div>
          <div class="modal-footer">
            <form action="<?php echo base_url(); ?>backend/Hotels/delete_hotel" id="delete_formhotel" enctype="multipart/form-data">

                <input type="text" id="delete_id" name="delete_id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>">
                <button type="submit"  class="waves-effect waves-light btn-sm btn-danger pull-right">Delete</button>
            </form>
          </div>
        </div>
      </div>


<!--<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>-->
   
<script type="text/javascript">
  $(document).ready(function() {
    $("#calendar_filter").click(function() {
        $("#calendar_modal").load(base_url+'backend/dashboard/calendar_modal');
    });
  });
</script>
<?php
 // $profile = profile();
 $chat = true;
  if (!empty($chat)) { 
    ?>
    <!--star live_chat_section-->
    <?php
     // $this->load->view('backend/chat/chat_list');
      ?>
<?php  } ?>
</body>

</html>
