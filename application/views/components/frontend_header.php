<?php  
$this->load->helper('common');
$data = title();
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oteleasy | Login</title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">
  <!-- Fonts -->  
  <link  href="<?php echo base_url(); ?>agentLoginStyle/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
  <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->

  <link href="<?php echo base_url(); ?>agentLoginStyle/css/style.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>agentLoginStyle/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>agentLoginStyle/css/menu/styles.css" rel="stylesheet" type="text/css">

  <!-- Load jQuery -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/login.js"></script> 
  <script src="<?php echo base_url(); ?>assets/js/pop_up.js"></script> 
  <script type="text/javascript">
    var base_url = "<?php  echo base_url();?>"; 
  </script> 
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be3cfb370ff5a5a3a712774/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<style type="text/css">
  .bg-blue {
     background:#1b88ce none repeat scroll 0 0;
     color: #fff ! important;
  }
  #cssmenu > ul > li > a  {
    letter-spacing: 2px;
    padding: 27px 18px;
    margin: 0px ! important;
  }
</style>
<body>
 <section class="head-section" style="box-shadow: 0px 2px 7px;">
  <div class="container">
   <div class="row">
    <div class="col-md-3">
     <div class="logo"><a href="<?php echo base_url(); ?>"><img width="120" src="<?php echo base_url(); ?>skin/images/agent_login/logo.png"   alt=""/></a></div>
     <!--logo-->
   </div>
   <?php
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('/',$link);
    $Clink = end($link_array);
    ?>
   <!--col-md-4-->
   <div class="col-md-9">
     <div id='cssmenu'>
      <ul>
        <li ><a class="<?php echo $Clink == '' ? 'bg-blue' : '' ?>" href='<?php echo base_url()?>'>Home</a></li>
        <li>
          <a class="<?php echo $Clink == 'about_us' ? 'bg-blue' : '' ?>" href='<?php echo base_url()?>about_us'>About Us</a>
        </li>
        <li>
          <a class="<?php echo $Clink == 'hotelslist' ? 'bg-blue' : '' ?>" href='<?php echo base_url()?>hotelslist'>Hotels</a>
        </li>
        <li><a class="<?php echo $Clink == 'events' ? 'bg-blue' : '' ?>" href='<?php echo base_url()?>events'>Events</a></li>
        <li><a href="#" >Get in Touch</a></li>
      </ul>
   </div>
  </div>
    <!--col-md-8-->
  </div>
</div>
</section>
              