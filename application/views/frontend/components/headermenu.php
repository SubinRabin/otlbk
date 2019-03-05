<?php  
  $this->load->helper("common");
  $id=$this->session->userdata('agent_id');
  $flag=$this->session->userdata('currency');
  $view = agent_image();
  $contry = contry_image();
  $data = title();
  $flag_i = substr($flag, 0, 2);
  $flag_img = strtolower($flag_i);
?>
<style type="text/css">
	.msgbox.read {
      background: #f2f2f2;
}
</style>
<head>
    <script src="<?php echo base_url(); ?>skin/js/common.js"></script>
</head>
  <body id="top" class="thebg">
	<!-- Top wrapper -->			  
	<div class="navbar-wrapper2 navbar-fixed-top min-height-sets">
      <div class="container">
		<div class="navbar mtnav">
			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="<?php echo base_url(); ?>/hotels" class="navbar-brand"><img src="<?php echo base_url(); ?>skin/images/logo.png" alt="Hotels" class="logo"/></a>
			  </div>
			  <div class="navbar-collapse collapse">
			  	<?php $all_notification_count = agent_portal_notify_count();
                      $all_count = count(($all_notification_count));
			  	      $notify = array();
			  	      $notify = agent_portal_notify();
	               if (count($notify)!=0) {
	                  $req_notify_arr= array();
	                  $reject_notify_arr= array();
	                  $approved_notify_arr= array();
	                foreach ($notify as $key => $value) {
	                    if ($value->booking_flag==2) {
	                        $req_notify_arr[$key] =  $value->booking_flag;
	                    }
	                    if ($value->booking_flag==0) {
	                        $reject_notify_arr[$key] =  $value->booking_flag;
	                    }
	                    if ($value->booking_flag==1) {
	                        $approved_notify_arr[$key] =  $value->booking_flag;
	                    }
	                }
	                  $req_notify= count($req_notify_arr);
	                  $reject_notify= count($reject_notify_arr);
	                  $approved_notify= count($approved_notify_arr);
	                  $notify_count = $req_notify+$reject_notify+$approved_notify;
	               } else {
	                    $notify_count = "0";
	                 }
	            ?>
				<ul class="nav navbar-nav navbar-right" style="margin-top: 5px">
					  <li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
					  <li><a href="<?php echo base_url(); ?>hotels" class="active">Hotels</a></li>
            <li><a href="<?php echo base_url(); ?>transfer" class="active">Transfer</a></li>
            <li><a href="<?php echo base_url(); ?>tour" class="active">Tour</a></li>
					  <!-- <li><a href="#">Sights</a></li>
					  <li><a href="#">Transfer</a></li> -->
            <li class="favourite_dropdown dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-heart-o"></i><span class="d-mes active">0</span></a>
              <ul class="dropdown-menu">
                  
              </ul>
            </li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="d-mes active"><?php echo $all_count ?></span></a>
              <ul class="dropdown-menu">
                  <?php  if ($notify_count!=0) {
                      foreach ($notify as $key => $value) {
                        if ($value->booking_flag==1) { ?>
                          <?php if ($value->readed==2){ ?>
                                <li class='msgbox  offset-0'>
                              <?php }else{ ?><li class='msgbox read offset-0'><?php } ?>
                              <a href='<?php echo base_url(); ?>Payment/agent_booking_view?id=<?php echo $value->bk_id?>'><img src='<?php echo base_url(); ?>uploads/rooms/<?php echo $value->room_id ?>/<?php echo $value->images ?>' alt='' width='30' class='left margright10 roundav'/>
                            <span class='opensans size13 dark'> <?php echo $value->hotel_name ?></span><br/><span class='opensans size12'><?php echo $value->hotel_name ?> Approved your booking</span></a></li>
                            <?php } if ($value->booking_flag==0) { ?>
                               <?php if ($value->readed==2){ ?>
                                <li class='msgbox  offset-0'>
                              <?php }else{ ?><li class='msgbox read offset-0'><?php } ?><a href='<?php echo base_url(); ?>Payment/agent_booking_view?id=<?php echo $value->bk_id?>'><img src='<?php echo base_url(); ?>uploads/rooms/<?php echo $value->room_id ?>/<?php echo $value->images ?>' alt='' width='30' class='left margright10 roundav'/>
                            <span class='opensans size13 dark'> Rejected request </span><br/><span class='opensans size12'><?php echo $value->hotel_name ?> rejected your booking</span></a></li>

                            <?php } if ($value->booking_flag==2) { ?>
                             <?php if ($value->readed==2){ ?>
                                <li class='msgbox  offset-0'>
                              <?php }else{ ?><li class='msgbox read offset-0'><?php } ?><a href='<?php echo base_url(); ?>Payment/agent_booking_view?id=<?php echo $value->bk_id?>'><img src='<?php echo base_url(); ?>uploads/rooms/<?php echo $value->room_id ?>/<?php echo $value->images ?>' alt='' width='30' class='left margright10 roundav'/>
                            <span class='opensans size13 dark'>New booking request</span><br/><span class='opensans size12'>You are booked <?php echo $value->hotel_name ?></span></a></li>
              
                            <?php } }  ?><li class='text-center view-more'><a href='<?php echo base_url(); ?>Payment/all_notification'>view more</a></li>
                            <?php }else { echo "No Notifications"; } ?>
              </ul>
            </li>
           <li class="dropdown">
                    <?php if ($flag_img!=""){ ?>
                    <a data-toggle="dropdown" class="dropdown-toggle"><img src="<?php echo base_url();?>assets/images/flg/<?php echo $flag_img; ?>.png"><span  style="color: #607D8B;"> / <?php echo $flag ?></span><b class="lightcaret mt-2 xml-default"></b></a>
                    <?php	} else {
                    	$on_flag = onload_currency();
                      $onflag_i = substr($on_flag, 0, 2);
                      $onflag_img = strtolower($onflag_i);
                      ?>
                    <a data-toggle="dropdown" class="dropdown-toggle"><img src="<?php echo base_url();?>assets/images/flg/<?php echo $onflag_img; ?>.png"><span  style="color: #607D8B;"> / <?php echo $on_flag ?></span><b class="lightcaret mt-2 xml-default"></b></a>
                    <?php } ?>

              <ul class="dropdown-menu xml-default" style="width: 300px;">
                 <?php  foreach ($contry as $key => $value2) { 
                    $country = $value2->currency_name;
                    $con= ($value2->currency_type);
                    $result = substr($con, 0, 2);
                    $img = strtolower($result);
                    $type= $value2->currency_type;
                    ?>
                  <div class="col-sm-3 text-center">
                     <div class="row">
                     		<li class="dropdown-header" title="<?php echo $country; ?>" style="cursor: pointer;"><a 
                          	onclick="currency_change('<?php echo $type ?>');" ><img src="<?php echo base_url();?>assets/images/flg/<?php echo $img; ?>.png"><span>  <?php echo $con; ?></span></a>
                          </li>
                          </li>
                     </div>
                  </div> 
                  <?php  } ?>
              </ul>
            </li>

					  <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
              <ul class="dropdown-menu">
                  <li class="dropdown-header" style="background: url('<?php echo base_url().'skin/images/dash/no-avatar.jpg' ?>'); height: 122px; background-size: cover;   width: 110px;"><img src="<?php echo base_url();?>uploads/agent_profile_pic/<?php echo $id;?>/thumb_<?php echo $view;?>" class="dash-avatar img_size_custom" alt=""/></li> 
                  <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
                  <li><a href="<?php echo base_url(); ?>backend/logout/agent_logout">Logout</a></li>
              </ul>
            </li>
				</ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
        </div>

      </div>
	      <?php if (!empty($this->session->flashdata('message'))) { ?>
		      <div class="sucess_msg_fix_toaster">
			  	 <?php echo $this->session->flashdata('message');  ?>
		       </div>
           <script type="text/javascript">
            $(document).ready(function() {
              tpj('.successModal').trigger('click'); 
              tpj('#successModal').removeClass('fade'); 
              tpj('.modal').css({"display":"block","top":"262px"});
            })
          </script>
	      <?php } ?>
         <?php if (!empty($this->session->flashdata('failed'))) { ?>
          <div class="sucess_msg_fix_toaster" style="background: red;">
           <?php echo $this->session->flashdata('failed');  ?>
           </div>
        <?php } ?>
    </div>
	<!-- /Top wrapper -->	
  
  <style type="text/css">
    .succesimage { 
   position: relative; 
   width: 100%; /* for IE 6 */
}

.succesimage button { 
    position: absolute;
    top: -14px;
    left: 560px;
    background: black;
    padding: 10px;
    color: white;
    border-radius: 100px;
    opacity: 100 ! important;
    border: 1px solid white;
    width: 32px;
    height: 32px;
    line-height: 4px;
    text-align: left;
    text-indent: -1px;
}
  </style>
  <button type="button" class="successModal hide btn btn-info btn-lg" data-toggle="modal" data-target="#successModal">Open Modal</button>
<?php if (!empty($this->session->flashdata('message'))) { ?>
<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="succesimage">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
              <img style="width: 100%;" src="<?php echo base_url(); ?>skin/images/booking-successful.jpg">
        </div>
      </div>
    </div>
</div>
<?php } ?>
<?php
  $changePasswordRequest = changePasswordRequest($this->session->userdata('agent_id'));
  if ($changePasswordRequest==1) { ?>
  <button type="button" class="passwordResetModal hide btn btn-info btn-lg" data-toggle="modal" data-target="#successModal">Open Modal</button>
    <script type="text/javascript">
      $(document).ready(function() {
        tpj('.passwordResetModal').trigger('click'); 
        tpj('#passwordResetModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        tpj("#passwordResetModal").load(base_url+'hotels/passwordResetModal');
        tpj('#passwordResetModal').removeClass('fade'); 
        tpj('.modal').css({"display":"block","top":"262px"});

      });
    </script>

  <div id="passwordResetModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
<?php  }
?>


