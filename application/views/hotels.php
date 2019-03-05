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
  li{
    display:inline;
  }d  

</style>    
      <section class="banner-bottom">
        <p class="aboutus-title">Hotels</p>
      </section>
      <br><br>
      <section>
                  <div class="container">
                     <div class="row">
                        <?php if(!empty($view)){
                          foreach($view as $hotel_value){ ?>
                         <a href="<?php echo base_url()?>hotels_view/<?php echo $hotel_value->id ?>">  <div class="col-lg-4">
                              <div class="cuadro_intro_hover" style="height:230px">
                                 <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $hotel_value->id?>/<?php echo $hotel_value->Image1 ?>" class="img-responsive" width="100%"  alt=""/>
                                 <div class="caption">
                                    <div class="blur"></div>
                                    <div class="caption-text">
                                       <h3 class="news-title"><?php echo $hotel_value->hotel_name; ?></h3>
                                       <p class="news-dec">
                                         <?php echo strlen($hotel_value->hotel_description) > 80 ? mb_substr($hotel_value->hotel_description,0,80).'..' : $hotel_value->hotel_description ; ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div></a>
                           <?php } 
                         } else { ?>
                          <h3>No Hotels</h3>
                       <?php  } ?>
                        </div>
                        <div class="text-center">
                        <?php foreach ($links as $link) {
                          ?>
                          <ul class="pagination">
                           <?php  echo "<li class='active'>". $link."</li>"; ?>
                          </ul>
                      <?php  } ?>
                    </div>
                     </div>
                  </div>
               </section>
       
     <?php init_load_frontend_footer(); ?>