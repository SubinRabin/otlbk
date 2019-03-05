<?php  init_load_frontend_header();
 ?>

<style>
  .banner-bottom {
    background-image: url("<?php echo base_url() ?>agentLoginStyle/img/baner3.jpg");
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

</style>

      <!--baner-->
                  <!--carosel fade-->
             <!-- <img src="<?php echo base_url() ?>uploads/about/<?php echo $view[0]->wall_image ?>" > -->
      <!--baner-->
      <section class="banner-bottom">
        <p class="aboutus-title">Events</p>
      </section>
      <br><br>
      <section>
                  <div class="container">
                     <div class="row">
                        <?php if(!empty($view)){
                          foreach($view as $event_value){ ?>
                          <a href="<?php echo base_url()?>events_view/<?php echo $event_value->id ?>"> <div class="col-lg-4">
                              <div class="cuadro_intro_hover" style="height:230px">
                                 <img src="<?php echo base_url(); ?>uploads/events/<?php echo $event_value->id."/".$event_value->event_image ?>" class="img-responsive" width="100%"  alt=""/>
                                 <div class="caption">
                                    <div class="blur"></div>
                                    <div class="caption-text">
                                       <h3 class="news-title"><?php echo $event_value->event_name; ?></h3>
                                       <p class="news-dec">
                                         Address: <?php echo $event_value->event_adrs; ?><br>
                                         <?php echo date("d M Y", strtotime($event_value->start_date)); ?> to <?php  echo date("d M Y", strtotime($event_value->end_date)); ?>
                                       </p>
                                    </div>
                                 </div>
                              </div></a>
                           </div>
                           <?php } 
                         } else { ?>
                          <h3>No Events</h3>
                       <?php  } ?>
                        </div>
                     </div>
                  </div>
               </section>
       
     <?php init_load_frontend_footer(); ?>