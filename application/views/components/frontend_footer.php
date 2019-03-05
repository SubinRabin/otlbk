<?php 
$CustomerSupport = CustomerSupport();
?>
</div>

<section class="footer">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="text-hldr">
               <h3 class="footer-title">We Find More Hotels</h3>
               <p class="footer-dec">Compare all the top travel sites in one simple search and find just what you're after Too easy.</p>
            </div>
            <div class="soc-holder">
               <p class="social-dec">Join Us</p>
               <a class="btn btn-social-icon btn-dropbox" href="<?php echo $CustomerSupport[0]->fb_link; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
               <a class="btn btn-social-icon btn-google-plus" href="<?php echo $CustomerSupport[0]->g_link; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
               <a class="btn btn-social-icon btn-twitter" href="<?php echo $CustomerSupport[0]->tw_link; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
               <a class="btn btn-social-icon btn-youtube" href="<?php echo $CustomerSupport[0]->yt_link; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="text-hldr">
               <h3 class="footer-title">Best Price Guaranteed</h3>
               <p class="footer-dec">No booking fee,no mark-up thats our promise to you.</p>
            </div>
            <div class="footer-search">
               <form action="#">
                  <!-- Store Search -->
                  <div class="col-lg-12">
                     <div class="block d-flex">
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Enter Your Email ">
                        <!-- Search Button -->
                        <button class="btn btn-main">Sign Up</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-md-4">
            <h3 class="footer-title">Travellers love us</h3>
            <p class="footer-dec">Over 400 million travellers trusted us to find the best deal on their hotels last year.</p>
            <div class="call-to-action">
               <?php $conNum = explode("<br>", $CustomerSupport[0]->cusNumber);
                  foreach ($conNum as $key => $value) {
                     if ($value!="") {
                  ?>
                  <p><i class="fa fa-phone"></i>Ph: <a href="#"><?php echo $value ?></a></p>
               <?php } } ?>
               <br>
               <p><i class="fa fa-envelope-o"></i>Email: <a href="#"><?php echo $CustomerSupport[0]->cusEmail; ?></a></p>
            </div>
         </div>
      </div>
      <div class="row">
         <hr>
         <div class="footernav">
            <ul>
               <li><a href="<?php echo base_url()?>">Home</a></li>
               <li><a href="<?php echo base_url()?>about_us">About Us</a></li>
               <li><a href="<?php echo base_url()?>hotelslist">Hotels</a></li>
               <li><a href="<?php echo base_url()?>events">Events</a></li>
               <li><a href="<?php echo base_url()?>contactus">Contact Us</a></li>
               <li><a href="<?php echo base_url()?>termsandCondition">Terms & Conditions</a></li>
               <li><a href="<?php echo base_url()?>policies">Privacy Policy</a></li>
            </ul>
         </div>
         <div>
            <img class="pull-right" src="<?php echo base_url()?>agentLoginStyle\img\visa.png">
            <img class="pull-right" src="<?php echo base_url()?>agentLoginStyle\img\mastercard.png">
         </div>
      </div>
      <p class="footer-copy">Copyright @ 2018- All Rights Reserved</p>
   </div>
</section>
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>

<script src="<?php echo base_url(); ?>agentLoginStyle/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>agentLoginStyle/js/menu/script.js"></script>
<!-- Javascript  -->
<script src="<?php echo base_url(); ?>skin/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>skin/assets/js/initialize-loginpage.js"></script>
<script src="<?php echo base_url(); ?>skin/assets/js/jquery.easing.js"></script>
<!-- Load Animo -->
<script src="<?php echo base_url(); ?>skin/plugins/animo/animo.js"></script>
<script>
 function errorMessage(){
  $('.login-wrap').animo( { animation: 'tada' } );
}
</script>
<script type="text/javascript">

  var $ = jQuery.noConflict(); $(document).ready(function()  { $('#myCarousel').carousel({ interval: 2000, cycle: true }); });

</script>
</body>
</html>
