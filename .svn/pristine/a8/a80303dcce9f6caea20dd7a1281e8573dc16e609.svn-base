<?php 
  $this->load->helper("common");
  $id=$this->session->userdata();
  $admin_name=$this->session->userdata('hotel_name');
  $hotel_log_id=$this->session->userdata('id');
?>
<?php  
 $this->load->helper('common');
 $data = title();
 ?>  
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/fav.ico">
    <title><?php echo $data[0]->Title ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>skin/assets/css/custom.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>skin/assets/css/dashboard.css" rel="stylesheet" media="screen">
    <!-- Carousel -->
    <link href="<?php echo base_url(); ?>skin/examples/carousel/carousel.css" rel="stylesheet">
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/font-awesome.css" media="screen" /> -->
    <!-- PIECHART -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/jquery.easy-pie-chart.css">
    <!-- Picker UI--> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/css/jquery-ui.css" />   
    <link rel="stylesheet" href="<?php echo base_url(); ?>skin/assets/css/jquery.dataTables.min.css" />   
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery --> 
    <script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>skin/assets/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap chips -->
    <link href="<?php echo base_url(); ?>skin/plugins/bootstrap-chips/bootstrap-tagsinput.css" rel="stylesheet" />
    <style type="text/css">
      .bootstrap-tagsinput {
        background-color: #eee;
      }
    </style>
    <script src="<?php echo base_url(); ?>skin/plugins/bootstrap-chips/bootstrap-tagsinput.js"></script>
 
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&sensor=false&libraries=places'></script>
    <script src="<?php echo base_url(); ?>assets/js/locationpicker.jquery.js"></script>
    <script src="<?php echo base_url(); ?>skin/js/jquery.toaster.js"></script>
    <script src="<?php echo base_url(); ?>skin/js/tost.js"></script>
  </head>
  <body id="top">
  <!-- CONTENT -->
    <div class="container2">
      <div class="container2 offset-0">
        <!-- CONTENT -->
        <div class="col-md-12  offset-0">
          <!-- LEFT MENU -->
          <div class="dashboard-left offset-0 textcenter">
          <br/><br/>
            <a href="#"><img src="<?php echo base_url(); ?>skin/images/dash/logo.png" width="130px;" alt=""/></a><br/>
            <span class="size12 grey lh5">Welcome to the Admin Panel</span><br/>
            <br/>
            <span class="size12 dark"><h4><?php print_r($admin_name); ?></h4></span>
            <a href="<?php echo base_url(); ?>backend/logout/hotel_logout"><img src="<?php echo base_url(); ?>skin/images/dash/logout.png" alt=""/></a>
            <h6>Log Out</h6>
            <br/>
            <!-- <?php 
                $menu = hotel_menu_permission();
            ?>
            
            <!-- Nav tabs -->
            <ul class="nav dashboard-tabs">
              <li>
                <a href="<?php echo base_url(); ?>dashboard/hotel_panel">
                <div class="dash-ct">
                  <span class="dashboard-icon left"></span> 
                  <span class="dtxt">Dashboard</span>
                </div>
                </a>
              </li>         
              <li>
                <a href="<?php echo base_url(); ?>dashboard/hotel_details">
                <div class="dash-ct">
                  <span class="forums-icon  left"></span> 
                  <span class="dtxt">Details</span>
                </div>
                </a>
              </li>
              <li class="dropdown">
                <!-- <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="<?php echo base_url(); ?>dashboard/hotel_room_contracts"> -->
                  <a href="<?php echo base_url(); ?>dashboard/hotel_room_contracts">
                <div class="dash-ct">
                  <span class="topics-icon left"></span> 
                  <span class="dtxt">Contract
                </div>
                </a>
                <!-- <ul aria-labelledby="myTabDrop1" role="menu" class="dropdown-menu2">
                <li><a href="<?php echo base_url(); ?>dashboard/hotel_room_details">Rooms</a></li>
                <li><a href="<?php echo base_url(); ?>dashboard/hotel_room_contracts">Contract</a></li>
                </ul>
              </li> --><!--
              <li>
                <a href="<?php echo base_url(); ?>dashboard/room_rate_details">
                <div class="dash-ct">
                  <span class="password-icon  left"></span> 
                  <span class="dtxt">Rooms Rate</span>
                </div>
                </a>
              </li>-->
             <!-- <li>
                <a href="<?php echo base_url(); ?>dashboard/room_min_stay">
                <div class="dash-ct">
                  <span class="tools-icon  left"></span> 
                  <span class="dtxt">Minimum Stay</span>
                </div>
                </a>
              </li>-->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#">
                <div class="dash-ct">
                  <span class="pages-icon left"></span> 
                  <span class="dtxt">Bookings
                  <b class="lightcaret "></b></span>
                </div>
                </a>
                <ul aria-labelledby="myTabDrop1" role="menu" class="dropdown-menu2">
                <li><a href="<?php echo base_url(); ?>dashboard/hotel_room_booking_details">Booking</a></li>
                <li><a href="<?php echo base_url(); ?>dashboard/hotel_room_booking_history">Booking history</a></li>
                </ul></li> 
              <li>
                <a href="<?php echo base_url(); ?>dashboard/hotel_gallery_image">
                <div class="dash-ct">
                  <span class="wishlist-icon  left"></span> 
                  <span class="dtxt">Photo Gallery</span>
                </div>
                </a>
              </li><li>
                <a href="<?php echo base_url(); ?>dashboard/social_media">
                <div class="dash-ct">
                  <span class="replies-icon  left"></span> 
                  <span class="dtxt">Social Media</span>
                </div>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>dashboard/contact_info">
                <div class="dash-ct">
                  <span class="profile-icon left"></span> 
                  <span class="dtxt">Contact Info</span>
                </div>
                </a>
              </li>
              <li>
              <!--<a href="<?php echo base_url(); ?>dashboard/contract">
                <div class="dash-ct">
                  <span class="appearance-icon left"></span> 
                  <span class="dtxt">Contract</span>
                </div>
                </a>
              </li>-->
              <!-- <li>
                <a href="<?php echo base_url(); ?>dashboard/policy_hotel">
                <div class="dash-ct">
                  <span class="topics-icon left"></span> 
                  <span class="dtxt">Policy</span>
                </div>
                </a>
              </li> -->

              
            </ul>
         

            <br/>
            <div class="clearfix"></div>
          </div>
          <!-- LEFT MENU -->
          <!-- RIGHT CPNTENT -->

          <div class="dashboard-right  offset-0">
          <!-- Tab panes from left menu -->
          <div class="tab-content5">
          
            <!-- TAB 1 -->
             <?php 
              $count1 = hotel_portal_notify_count1();
              $count2 = hotel_portal_notify_count2();
              $notify = hotel_portal_notify();
              if (count($notify)!=0) {
                $notify_count= (count($count1)+(count($count2)));
              } else {
                $notify_count = "0";
              }
              ?>
            <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right" style="margin-right: 34px ! important">
                <li><a href="#" id="messages" data-content="
                
                  <?php  if (count($notify)!=0) {
                   foreach ($notify as $key => $value) {
                    if ($value->rejected==2) { ?>
                        <div class='msgbox offset-0'><a href='<?php echo base_url(); ?>Dashboard/booking_details_portel?id=<?php echo $value->bk_id?>'><img src='<?php echo base_url(); ?>uploads/rooms/<?php echo $value->room_id ?>/<?php echo $value->images ?>' alt='' width='30' class='left margright10 roundav'/>
                        <span class='opensans size13 dark'>You have a New booking request </span><br/></div>
                  <?php } if ($value->rejected==0) { ?>
                        <div class='msgbox offset-0'><a href='<?php echo base_url(); ?>Dashboard/booking_details_portel?id=<?php echo $value->bk_id?>'><img src='<?php echo base_url(); ?>uploads/rooms/<?php echo $value->room_id ?>/<?php echo $value->images ?>' alt='' width='30' class='left margright10 roundav'/>
                        <span class='opensans size13 dark'>You have a new cancelled request</span><br/></div>
                  <?php } } } ?>
                
                " data-original-title="<span class='dark bold'>Notifications</span>">Notifications<span class="d-mes active"><?php echo $notify_count; ?></span></a></li>
              </ul>
            </div>
            <div class="tab-pane cpadding40 active" id="profile" style="padding-top: 0">
              <!-- <?php $notify = hotel_portal_notify();
              if (count($notify)!=0) {
                $req_notify_arr= array();
                $can_notify_arr= array();
                foreach ($notify as $key => $value) {
                   if ($value->booking_flag==2) {
                     $req_notify_arr[$key] =  $value->booking_flag;
                    }
                    if ($value->booking_flag==3) {
                     $can_notify_arr[$key] =  $value->booking_flag;
                    }
                }
                $req_notify= count($req_notify_arr);
                $can_notify= count($can_notify_arr);
                $notify_count = $req_notify+$can_notify;
              } else {
                $notify_count = "0";
              }
              ?> -->
             
           <!-- <div class="line2"></div> -->

            



