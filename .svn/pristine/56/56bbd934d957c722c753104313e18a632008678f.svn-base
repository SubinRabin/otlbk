<?php  init_load_frontend_header();
 ?>

<style>
  .banner-bottom {
    background-image: url("<?php echo base_url() ?>uploads/about/<?php echo $view[0]->wall_image ?>");
    height: 60%;
    position: relative;
  }
  .aboutus-title {
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 5em;
  }
  .aboutus-desc {
    height: 50%;
    margin: 7em auto 8em;
  }
  .aboutus-desc p::first-letter {
    /*font-size: 200%;*/
    text-transform: uppercase;
    color: black;
    font-weight: bold;
    font-size: 15px;
    margin-left: 20px;
  }

  .aboutus-img-wrap {
    width: 100%;
    height: 50%;
  }
  .aboutus-img-wrap > img:first-child {
    width: 90%;
    float: right;
  }
  .aboutus-img-wrap > img:last-child {
    width: 45%;
    left: 20px;
    bottom: -10%;
  }
  .aboutus-card-wrap .card {
    background-color: #fff;
    min-height: 225px;
    width: 100%;
    padding: 30px 40px;
    box-shadow: 0 0 40px rgba(0,0,0,.1);
    margin-bottom: 7em;
    text-align: center;
  }
  .aboutus-card-wrap .card > i {
    font-size: 2em;
  }
</style>

      <!--baner-->
                  <!--carosel fade-->
             <!-- <img src="<?php echo base_url() ?>uploads/about/<?php echo $view[0]->wall_image ?>" > -->
      <!--baner-->
      <section class="banner-bottom">
        <p class="aboutus-title">About Us</p>
      </section>
      <section class="aboutus-desc">
         <div class="container aboutus-desc">
            <div class="row">
               <div class="col-lg-7">
                  <h1><?php echo $view[0]->about_title ?></h1>
                  <p><?php echo $view[0]->about_content ?></p>
               </div>
                <div class="col-lg-5">
                  <div class="aboutus-img-wrap">
                    <img src="<?php echo base_url() ?>uploads/about/<?php echo $view[0]->back_image; ?>">
                    <img width="100px" src="<?php echo base_url() ?>uploads/about/<?php echo $view[0]->front_image; ?>" style="position:absolute">
                  </div>
               </div>
              
            </div>
         </div>
         
      </section>
       <section class="aboutus-card-wrap">
         <div class="container">
            <div class="row">
               <div class="col-lg-4">
                <div class="card">
                  <i class="fa fa-search"></i>
                  <h3>Best Hotels</h3>
                  <p><?php echo $view[0]->best_hotel ?></p>
                </div>
               </div>
               <div class="col-lg-4">
                <div class="card">
                  <i class="fa fa-dollar"></i>
                  <h3>Best Price Guarantee</h3>
                  <p><?php echo $view[0]->best_price_guarantee ?></p>
                </div>
               </div>
               <div class="col-lg-4">
                <div class="card">
                  <i class="fa fa-book"></i>
                  <h3>Super Fast Booking</h3>
                  <p><?php echo $view[0]->super_fast_booking ?></p>
                </div>
               </div>

              
            </div>
         </div>
         </div>
      </section>
     <?php init_load_frontend_footer(); ?>