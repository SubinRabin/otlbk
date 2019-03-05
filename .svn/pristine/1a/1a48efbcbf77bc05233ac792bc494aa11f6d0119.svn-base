<?php  
 $this->load->helper('common');
 $data = title();
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast.style.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/css/dataTables.bootstrap4.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Buttons/css/buttons.dataTables.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/Buttons/css/buttons.bootstrap4.min.css"> 
    
    <!-- Dropzone -->
    <link href="<?php echo base_url(); ?>assets/css/dropzone.min.css" rel="stylesheet">

    <!--======== SCRIPT FILES =========-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
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
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
    <style>
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
    </style>
</head>
<body>
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
            <div class="col-lg-8 col-md-7 col-sm-5 hidden-xs">
<!--                 <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form> -->
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
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

                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="<?php echo base_url(); ?>assets/images/user/6.png" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="<?php echo base_url(); ?>backend/login/general_settings" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>General Setting</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>backend/users/new_user" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a>
                    </li>
                    <!-- <li><a href="#" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a>
                    </li> -->
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>backend/logout" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
