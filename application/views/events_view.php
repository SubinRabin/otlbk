<?php  init_load_frontend_header();
 ?>

<style>
  .banner-bottom {
   
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
  .aboutus-content {
        color: #fff;
        position: absolute;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2em;
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

</style>

      
      <section class="banner-bottom" style="background-image: url(<?php echo base_url()?>uploads/events/<?php echo $view[0]->id ?>/<?php echo $view[0]->event_image ?>)";>
        <p class="aboutus-title"><?php echo $view[0]->event_name ?></p>
        <p class="aboutus-content"> <?php echo date("d M Y", strtotime($view[0]->start_date)); ?> to <?php  echo date("d M Y", strtotime($view[0]->end_date)); ?></p>
      </section>
      <br><br>
       <section class="aboutus-desc">
         <div class="container aboutus-desc">
            <div class="row">
               <div class="col-lg-12">
                  <h1><?php echo $view[0]->event_name ?></h1>
                  <p><?php echo $view[0]->event_description ?></p>
               </div>
            </div>
         </div>
         
      </section>
       
     <?php init_load_frontend_footer(); ?>