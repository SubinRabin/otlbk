<!DOCTYPE html>
<html lang="en">
<?php  $this->load->helper('url');
 $this->load->helper('common');
 $data = title();
  ?>
<head>
    
 <meta charset="UTF-8">
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
    <link href="<?php echo base_url(); ?>assets/css/toast.style.min.css" rel="stylesheet">
    <!--======== SCRIPT FILES =========-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toast.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
        $(document).ready(function () {
            var url = window.location.href;
            var lastPart = url.substr(url.lastIndexOf('/') + 1);
            if (lastPart!="") {
                window.location = base_url+"backend/";
            }
        });
        
    </script> 
</head>

<body>
    <div class="blog-login">
        <div class="blog-login-in">
            <form method="post" action="<?php echo base_url('backend/dashboard'); ?>" id="login_form"> 
                <img src="<?php echo base_url(); ?>assets/images/logo.png" width="150px" alt="" />
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="user_name">Username</label>
                        <input id="user_name" name="user_name" type="text" class="validate form-control" placeholder="Username">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="validate form-control" placeholder="password">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                       <button  class="waves-effect waves-light btn btn-log-in" id="login_form_button" type="submit" value="Login">Login</button> 
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>backend/login/forget_password" class="for-pass">Forgot Password?</a>
            </form>
        </div>
    </div>

</body>

</html>
