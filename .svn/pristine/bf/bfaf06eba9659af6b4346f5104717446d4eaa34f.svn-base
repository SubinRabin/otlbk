<?php  
 $this->load->helper('common');
 $data = title();
$usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $data[0]->Title ?></title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mob.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast.style.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/css/dataTables.bootstrap4.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Buttons/css/buttons.dataTables.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Buttons/css/buttons.bootstrap4.min.css"> 
    <!--======== SCRIPT FILES =========-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <?php 
    // init_load_chat_list(); 
    ?>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script> -->
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css"></link>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toast.script.js"></script> 
    
    <script type="text/javascript" type="text/javascript" src="<?php echo base_url();?>assets/DataTables/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/js/dataTables.bootstrap4.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Responsive/js/dataTables.responsive.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>


    <!-- Chartist Charts -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/chartist-plugin-legend/0.6.1/chartist-plugin-legend.min.js"></script>


    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <!-- World Map Js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datamaps/0.5.8/datamaps.world.js"></script>

    <!-- jVector Map JS -->
<!--     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.js"></script> -->

    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
        // var myVar = setInterval(myTimer, 1000);

        // function myTimer() {
        //     alert("gfh");
            
        // }

    </script> 
    <style>
        .toast-top-center {
            left: 50%;
            padding: 10px !important;
            text-align: center;
            transform: translate(-50%,0);
        }
        .dropdown {
            display: inline-block;
            height: 62px;
        }
        .dropdown-menu {
            top: 60px;
            left: -275px;
            min-width: 300px;
            border-radius: 0 0 4px 4px;
            border: none;
        }
        @media only screen and (max-width : 425px) {
            .dropdown-menu {
                top: 64px;
                left: -150px;
            }
        }
        .dropdown-menu > li {
            border-bottom: 1px solid #eaeaea;
        }
        .dropdown-menu > li > a{
            padding: 5px 8px;
        }
        .dropdown-menu > li > a > i{
            font-size: 24px;
            color: #255a79;
        }
        .dropdown-menu > li:last-child {
            border-bottom: none;
        }
        .dropdown-menu .noti-title {
            padding: 8px 0;
        }
        .bold {
            font-weight: bold;
        }
        .noti-head {
            margin-left: 10px;
        }
        .noti-text {
            color: grey;
        }
        .spinner-wrap {
            height: 100vh;
            width: 100vw;
            background-color: #fff;
            z-index: 99999;
            position: fixed;
            top: 0;
            /* display: none; */
        }
        .spinner-wrap > .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .spinner-wrap > .spinner-logo {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 160px;
        }
        .spinner-wrap > p {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .chart-title {
            margin: 10px 0;
            color: #607D8B;
        }
    </style>
</head>
<body>

    <div class="spinner-wrap">
        <img src="<?php echo base_url();?>assets/images/logo.png" alt="Logo" class="spinner-logo">
        <img src="<?php echo base_url();?>assets/images/spinner.gif" alt="Loading..." class="spinner">
        <p></p>
    </div>

    <script>
        loading('start');
        window.onload = function() {
            loading('stop');
        };
        function loading (flag, message) {
            message = message || 'loading...';
            $('.spinner-wrap p').html(message);
            if (flag === 'start') {
                $('.spinner-wrap').css('display', 'block');
            }
            if (flag === 'stop') {
                $('.spinner-wrap').css('display', 'none');
            }
        };

        function switchClass(i) {
            var lis = $('#home-news > div');
            lis.eq(i).removeClass('home_header_on');
            // lis.eq(i).removeClass('home_header_out');
            i = i+1;
            if (i==lis.length) {
                i=0;
            }
            lis.eq(i).addClass('home_header_on');
            // lis.eq(i).addClass('home_header_out');
            setTimeout(function() {
                switchClass(i);
            }, 3500); 
        }

$(window).load(function() {
    setTimeout(function(){ 
         $.ajax({
              dataType: 'json',
              type: 'post',
              url: base_url+'backend/dashboard/offlineNotify',
              cache: false,
              success: function (response) {
                $("#home-news").html(response);
                switchClass(-1);
              }
            });

     }, 3000);
});

    </script>
<style type="text/css">
    .notification-page{
  margin:0 auto;
}
#home-news{
  font-size: 20px;
    text-align:center;
    /*text-transform:uppercase;*/
    color:#464646;
    height: 45px;
    line-height: 45px;
    overflow:hidden;
    position:relative;
}.home_header {
    position:absolute;
    width:100%;
    z-index:99;
    color:#fff;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
}
.home_header_on {
    z-index:100;
        line-height: 3;
}.home_header strong {
    color: white;
}.home_header span, .home_header strong {
    position:relative;
    top:-50px;
}
.home_header span {
    color: #99c4de;
}
.home_header_on *:nth-child(1) {
     top: 0;
    -webkit-transition: top .6s ease-in-out;
    -moz-transition: top .6s ease-in-out;
     transition: top .6s ease-in-out;
}.home_header_on *:nth-child(2) {
    top: 0;
    -webkit-transition: top .6s ease-in-out .15s;
    -moz-transition: top .6s ease-in-out .15s;
    transition: top .6s ease-in-out .15s;
}.home_header_on *:nth-child(3) {
    top: 0;
    -webkit-transition: top .6s ease-in-out .3s;
    -moz-transition: top .6s ease-in-out .3s;
    transition: top .6s ease-in-out .3s;
}.home_header_out *:nth-child(1) {
    top: 50px;
    -webkit-transition: top .6s ease-in-out;
    -webkit-transition: top .6s ease-in-out;
    -moz-transition: top .6s ease-in-out;
}.home_header_out *:nth-child(2) {
    top: 50px;
    -webkit-transition: top .6s ease-in-out .15s;
    -moz-transition: top .6s ease-in-out .15s;
    transition: top .6s ease-in-out .15s;
}.home_header_out *:nth-child(3) {
    top: 50px;
    -webkit-transition: top .6s ease-in-out .3s;
    -moz-transition: top .6s ease-in-out .3s;
    transition: top .6s ease-in-out .3s;
}
</style>
        <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="<?php echo base_url() ?>backend/dashboard" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo-white.png" alt="" /></a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-lg-7 col-md-7 col-sm-5 hidden-xs">
                <div class="notification-page">
                  <div id="home-news">
                  </div>
                </div>
<!--                 <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form> -->
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">

                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="<?php echo user_image(); ?>" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
                    
<div style="display: inline-block;float: right;margin-right: 15px;">
    <div class="dropdown notify_dropdown">
                      
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.dropdown').on('show.bs.dropdown', function() {
                              $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
                            });

                            $('.dropdown').on('hide.bs.dropdown', function() {
                              $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
                            });
                        });
                    </script>
                <?php $Booking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Hotel Booking');  ?>
                        <?php if (count($Booking)!=0 && isset($Booking[0]->view) && $Booking[0]->view!=0) { ?>
                        <a class="waves-effect btn-noti dropdown-toggle" id="calendar_filter" href="<?php echo base_url(); ?>backend/booking"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a>
                <?php } ?>
                <a class="waves-effect btn-noti dropdown-toggle" id="open_chat_list" target="_blank" href="https://dashboard.tawk.to/login#/chat"><i class="fa fa-wechat" aria-hidden="true"></i></a>
</div>                  

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="<?php echo base_url(); ?>backend/login/general_settings" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>General Setting</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>backend/users/new_user?edit_id=<?php echo $this->session->userdata('id'); ?>&myAccount=<?php echo $this->session->userdata('role'); ?>" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Edit profile</a>
                    <?php if ($usersmenu[0]->create!=0) { ?>
                    <li><a href="<?php echo base_url(); ?>backend/users/new_user" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a>
                    </li>
                    <?php } ?>
                    <!-- <li><a href="#" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a>
                    </li> -->
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>backend/logout" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

