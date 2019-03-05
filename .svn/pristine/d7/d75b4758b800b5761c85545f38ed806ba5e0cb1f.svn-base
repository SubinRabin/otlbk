<?php init_head();  ?>
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <h2>Customer Care Details</h2>
            </div>
            <form action="<?php echo base_url(); ?>backend/common/customer_care_update" name="customer_care_form" id="customer_care_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                        <?php 
                            $arr = array();
                            $arr = explode("<br>", $view[0]->cusNumber);
                         ?>
                         <div class="row">
                            <div class="col-md-10 multiple-phone">
                        <label for="list-title">Phone</label>
                        <input type="text" class="form-control" name="phone[]" placeholder="Phone" value="<?php echo isset($arr[0]) ? $arr[0] : '' ?>"><?php foreach ($arr as $key => $value) { 
                            if ($key!=0) {
                            ?><br>
                            <input type="text" name="phone[]" class="form-control" value="<?php echo $value ?>">
                        <?php } } ?></div><div class="col-md-2" style="margin-top: 24px"><input type="button" class="btn btn-success" name="plus" id="plus" value="+"></div>
                        
                    </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($view[0]->cusEmail)){ echo $view[0]->cusEmail;} ?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description"><?php if(!empty($view[0]->description)){ echo $view[0]->description;} ?></textarea>
                    	</div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Facebook Link</label>
                            <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Facebook Link" value="<?php if(!empty($view[0]->fb_link)){ echo $view[0]->fb_link;} ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Twitter Link</label>
                            <input type="text" class="form-control" id="tw_link" name="tw_link" placeholder="Twitter Link" value="<?php if(!empty($view[0]->tw_link)){ echo $view[0]->tw_link;} ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Youtube Link</label>
                            <input type="text" class="form-control" id="yt_link" name="yt_link" placeholder="Youtube Link" value="<?php if(!empty($view[0]->yt_link)){ echo $view[0]->yt_link;} ?>">
                        </div>
                       
                    </div>
                   
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Google+</label>
                            <input type="text" class="form-control" id="g_link" name="g_link" placeholder="Google+" value="<?php if(!empty($view[0]->g_link)){ echo $view[0]->g_link;} ?>">
                        </div>
                        <?php $customercareMenu = menuPermissionAvailability($this->session->userdata('id'),'General','Customer Care Details'); 
                        if (count($customercareMenu)!=0 && $customercareMenu[0]->edit==1) { ?>
                            <div class="col-md-6">
                                <div class="form-group col-md-12">
                                    <button type="button" style="margin-top: 25px" id="customer_care_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Update</button>
                                </div>
                            </div>
                        <?php } ?> 
                    </div>
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/general_settings.js"></script>
<script>   $( "#plus" ).on("click", function() {

            $( ".multiple-phone" ).append( '<br><input type="text" name="phone[]" class="form-control" placeholder="Phone"/>');

        });
$("#customer_care_submit_button").click(function(){
    addToast('Updated Successfully','green');
    $("#customer_care_form").submit();
});
</script>
<?php init_tail(); ?>


