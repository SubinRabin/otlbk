<?php init_hotel_login_header(); ?>
	 <div class="row">
      <div class="col-md-12">
          <div class="col-md-6">
                <h3>Social Media Details</h3>
          </div>
          <div class="col-md-5">
              <br>
                <div class="btn-toolbar pull-right">
	                <button class="btn  hide" id="hotel_login_detail_back_social" name="hotel_login_detail_back_social"><i class="fa fa-hand-o-left"></i>&nbsp;Back</button>
	                <div id="hidden-div">
	                <button class="btn btn-info" id="hotel_login_edit_social" name="hotel_login_edit_social"><i class="fa fa-edit"></i>&nbsp;Edit</button>
	                </div>
	            </div>
          </div>
          <?php if (isset($_REQUEST['proc'])) { ?>
          <script type="text/javascript">
          AddToast('success','Social Media Details Update Successfully','!');
         </script>
         <?php } ?>
      </div>
  </div>
<br>
	<div class="row">
    <div class="col-md-12">
       <form action="<?php echo base_url(); ?>backend/hotels/socialmedia_update" name="hotel_log_detail_social" id="hotel_log_detail_social" method="post">
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">Facebook Url</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="facebook" name="facebook" type="text" value="<?php echo $view[0]['facebook']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">Google Plus Url</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="google_plus" name="google_plus" type="text" value="<?php echo $view[0]['google_plus']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">Twitter Url</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="twitter" name="twitter" type="text" value="<?php echo $view[0]['twitter']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">Linkedin Url</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="linked_in" name="linked_in" type="text" value="<?php echo $view[0]['linked_in']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">WhatsApp Number</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="whatsapp" name="whatsapp" type="text" value="<?php echo $view[0]['whatsapp']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="control-label">Vk Url</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" id="vk_url" name="vk_url" type="text" value="<?php echo $view[0]['vk_url']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
	               <div class="col-md-10">
	                    <button class="btn btn-success pull-right"  id="hotel_login_detail_update_social" name="hotel_login_detail_update_social" type="button" ><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                </div>
	            </div>
            </div>
       </form>
    </div>
  </div>
</div>

<?php init_hotel_login_footer(); ?>
