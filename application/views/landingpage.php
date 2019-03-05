<?php  
$this->load->helper('common');
$data = title();
?>
<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<title><?php echo $data[0]->Title ?></title>
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">
<link  a href="<?php echo base_url(); ?>landingpage/css/style.css" rel="stylesheet" type="text/css">
<link  a href="<?php echo base_url(); ?>landingpage/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
</head>
<body>
   <div id="wraper">
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <!-- <div class="logo"><img src="http://localhost/works/landingpage/img/logo.png" class="img-responsive"  alt=""/></div> -->
                  <div class="logo"><img src="<?php echo base_url(); ?>skin/images/logo.png" class="img-responsive"  alt=""/></div>
               </div>
               <div class="col-md-4"></div>
               <div class="col-md-4">
                  <div class="call-to-action">
                  <!-- <p><i class=""></i><a href="<?php echo base_url(); ?>hotel_panel">Hotel Partner</a></p>
                     <p><i class=""></i><a href="<?php echo base_url(); ?>Agentlogin">Client Partner</a></p> -->
                  </div>
               </div>
            </div>
         </div>
         <!---->
      </section>
      <!---->
      <section>
         <div class="container">
            <div class="row">
               <h3 class="main-title">Your Preffered<span class="blue"> Global</span> <p>Travel Partner</p></h3>
            </div>
         </div>
      </section>
      <!---->
      <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
         <div class="testimonial4_header">
         </div>
      <!--	<ol class="carousel-indicators">
         <li data-target="#testimonial4" data-slide-to="0" class="active"></li>
         <li data-target="#testimonial4" data-slide-to="1"></li>
         <li data-target="#testimonial4" data-slide-to="2"></li>
      </ol>-->
      <div class="carousel-inner" role="listbox">
         <div class="item active">
            <div class="testimonial4_slide">
               <!--<img src="http://via.placeholder.com/100x100" class="img-circle img-responsive" />-->
               <h4 class="sub-title">Smart Room Management</h4>
               <p>Create variable rooms with different rates and add extra packages for each room type that can be booked as additional services</p>
               <!--<h4>Ben Hanna</h4>-->
            </div>
         </div>
         <div class="item">
            <div class="testimonial4_slide">
               <!--<img src="http://via.placeholder.com/100x100" class="img-circle img-responsive" />-->
               <h4 class="sub-title">Email Notifications</h4>
               <p>Send emails to your guests once they reserved / booked a room. Include the stay informations and payment advices</p>
               <!--	<h4>Ben Hanna</h4>-->
            </div>
         </div>
         <div class="item">
            <div class="testimonial4_slide">
               <!--	<img src="http://via.placeholder.com/100x100" class="img-circle img-responsive" />-->
               <h4 class="sub-title">Flexible Pricing</h4>
               <p>Offer different rates per season or promotional discounts for seasons for different room / accommodation</p>
               <!--<h4>Ben Hanna</h4>-->
            </div>
         </div>
      </div>
   </div>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-md-offset-1">
               <div class="link">
                  <a class="button" href="<?php echo base_url(); ?>hotel_panel">
                     <p>get distributed</p>
                     <h3>HOTEL PARTNER <span class="lg-span">LOGIN</span></h3>
                  </a>
               </div>
               <!--<div class="box-hldr">
                  <div class="box-hldrrlft">
                  <p class="partner">Hotel Partner</p>
                  </div>
                  <div class="box-hldrrgt">
                  <h4 class="box-lgn">LOGIN</h4>
                  </div>
               </div>--><!--box-hldr-->
            </div>
            <div class="col-md-4 col-md-offset-2">
               <div class="link">
                  <a class="button" href="<?php echo base_url(); ?>Agentlogin">
                     <p>buy from us</p>
                     <h3>CLIENT PARTNER <span class="lg-span">LOGIN</span></h3>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
</div><!--wraper-->
<div id="large-header" class="large-header space-header" >
  <canvas id="demo-canvas" width="100%" >
  </canvas>
</div>            






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>landingpage/bootstrap/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>landingpage/js/TweenLite.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/EasePack.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/header-animate.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/jquery_002.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/Landing.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>landingpage/js/wow.js"></script>

 <script type="text/javascript">// <![CDATA[

 var $ = jQuery.noConflict(); $(document).ready(function()  { $('#testimonial4').carousel({ interval: 4000, cycle: true }); });

        // ]]>
     </script>

  </body>
  </html>

