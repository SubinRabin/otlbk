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
  .line4{
    background:#e8e8e8;
    height:1px; 
    margin:17px 0 15px 0;
    padding:0; display:block;
  }
  ul.jslidetext{
width:100px;
list-style:none;
padding-left:0px;
padding-top:10px;
text-align:right;
margin:0 auto;
}
.jslidetext li{
margin-top:10px;
}

ul.jslidetext2{
  width:100px;
  list-style:none;
  padding-left:0px;
  text-align:right;
  margin:-5px auto 0 auto;
}
.jslidetext2 li{
  margin-top:22px;
}
.cstyle01{
  display: inline-block; 
  width: 100%;
  font-size:13px;
}/*CUSTOM COLUMNS*/
.w50percent{width:50%; float:left;}
.w40percent{width:40%; float:left;}
.w45percent{width:45%; float:left;}
.w50percentlast{width:50%; float:right;}
.wh33percentlast{width:33%;float: right;}
.wh40percentlast{width:40%;float: right;}

.wh33percent{width:33%; float: left;}
.wh66percent{width:66%;float:left;}

/*PERCENTAGES*/
.wh10percent{width:10%;}
.wh20percent{width:20%;}
.wh30percent{width:30%;}
.wh40percent{width:40%;}
.wh50percent{width:50%;}
.wh60percent{width:60%;}
.wh70percent{width:70%;}
.wh75percent{width:75%;}
.wh80percent{width:80%;}
.wh90percent{width:90%;}
.wh100percent{width:100%;}



</style>
 <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>skin/assets/css/custom.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>skin/examples/carousel/carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>skin/updates/update1/css/style01.css" rel="stylesheet" media="screen">  
    <!-- bin/jquery.slider.min.css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.round.css" type="text/css"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.round-blue.css" type="text/css">    

        <!-- jQuery --> 
        <!-- jQuery-->  
        <script src="<?php echo base_url(); ?>skin/assets/js/jquery-ui.js"></script>  

      
      <section class="banner-bottom" style="background-image: url(<?php echo base_url()?>uploads/gallery/<?php echo $view[0]->id ?>/<?php echo $view[0]->Image1 ?>)";>
        <p class="aboutus-title"><?php echo $view[0]->hotel_name ?></p>
        
      </section>
       <section class="aboutus-desc">
         <div class="container aboutus-desc">
            <div class="row">
               <div class="col-lg-12">
                  <h1><?php echo $view[0]->hotel_name ?></h1>
                  <p  style="text-align: justify;"><?php echo $view[0]->hotel_description ?></p>  
                 
                    <div class="hpadding20">
                       <h3>Near by places</h3>
                      <?php echo $view[0]->city_near_by ?>
                    </div>
                    <div class="line4"></div> 
                    <div class="hpadding20">
                      <h3>Complimentary Wi-Fi </h3>
                      <?php echo $view[0]->wifi=='on' ? 'Yes' : 'No' ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="line4"></div> 
                    <div class="hpadding20">
                      <h3>Internet</h3>
                      <?php echo $view[0]->internet=='on' ? 'Internet is available. Wireless internet on site.' : 'No' ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="line4"></div> 
                    <div class="hpadding20">
                      <h3>Parking</h3>
                      <?php echo $view[0]->parking=='on' ? 'Yes' : 'No' ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="line4"></div> 
                <div class="hpadding20">
                  <h3>Hotel Facilities</h3>
                  <ul class="checklist">
                    <?php foreach ($hotel_facilities as $key => $value) {
                                            if (isset($value[0]->Hotel_Facility)) {
                                            ?>
                                            <li><?php echo $value[0]->Hotel_Facility ?></li>
                                        <?php } else {
                                          echo  "No Records";
                                        }
                                    } ?>
                  </ul>
                </div>
              <div class="clearfix"></div>
               <div class="line4"></div> 

            <div class="hpadding20">
              <div id="review_rating"></div>    
              <div class="clearfix"></div>
              <br/>
              <span class="opensans dark size16 bold">Average ratings</span>
            </div>
            
            <div class="line4"></div>
            
            <div class="hpadding20">
              <div id="average_rating">
                
              </div>  
              <div class="clearfix"></div>
              <br/>
              <span class="opensans dark size16 bold">Reviews</span>
            </div>
            
            <div class="line2"></div>
            <div id="review_data_id">
              
            </div>
            <br/>
            <br/>
            <div class="hpadding20">
              <span class="opensans dark size16 bold">Reviews</span> <br>
                  <i class="success_error err_hide"></i>
            </div>
            
            <div class="line2"></div>
              <div class="wh33percent left center">
              <ul class="jslidetext">
                <li>Cleanliness</li>
                <li>Room comfort</li>
                <li>Location</li>
                <li>Service & staff</li>
                <li>Sleep quality</li>
                <li>Value for Price</li>
              </ul>
              
              <ul class="jslidetext2">
                <li>Name</li>
                <li>Evaluation</li>
                <li>Title</li>
                <li>Comment</li>
              </ul>
            </div>
                <div class="wh66percent right offset-0">
              <form name="review_form" method="post" action="<?php echo base_url('welcome/review_add'); ?>" id="review_form">
                <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $view[0]->id ?>">
              <script>
                $(document).ready(function() {
                    trigerJslider();
                 trigerJslider2(); 
                 trigerJslider3(); 
                 trigerJslider4(); 
                 trigerJslider5(); 
                 trigerJslider6();
                });
                function trigerJslider(){
                  jQuery("#Slider1").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  testTriger();
                  }
                  function trigerJslider2(){
                  jQuery("#Slider2").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  }
                  function trigerJslider3(){
                  jQuery("#Slider3").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  }
                  function trigerJslider4(){
                  jQuery("#Slider4").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  }
                  function trigerJslider5(){
                  jQuery("#Slider5").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  }
                  function trigerJslider6(){
                  jQuery("#Slider6").slider({ from: 0, to: 5, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
                  }
                //This is a fix for when the slider is used in a hidden div
                function testTriger(){
                  setTimeout(function (){
                    $(".cstyle01").resize();
                  }, 500);  
                }
              </script>
              <div class="padding20 relative wh70percent">
                <div class="layout-slider wh100percent">
                <span class="cstyle01"><input id="Slider1" type="slider" name="cleanliness" value="0;4.2" /></span>
                </div>
                
                <div class="layout-slider margtop10 wh100percent">
                <span class="cstyle01"><input id="Slider2" type="slider" name="room_comfort" value="0;5.0" /></span>
                </div>
                
                <div class="layout-slider margtop10 wh100percent">
                <span class="cstyle01"><input id="Slider3" type="slider" name="location" value="0;2.5" /></span>
                </div>
                <div class="layout-slider margtop10 wh100percent">
                <span class="cstyle01"><input id="Slider4" type="slider" name="service_staff" value="0;3.8" /></span>
                </div>
                <div class="layout-slider margtop10 wh100percent">
                <span class="cstyle01"><input id="Slider5" type="slider" name="sleep_quality" value="0;4.4" /></span>
                </div>
                <div class="layout-slider margtop10 wh100percent">
                <span class="cstyle01"><input id="Slider6" type="slider" name="value_price" value="0;4.0" /></span>
                </div>
                <input type="text" id="review_uname" class="form-control margtop10 " placeholder="" name="review_uname">
                  <i class="name_error err_hide"></i>

                <select class="form-control mySelectBoxClass margtop10" name="evaluation" id="evaluation">
                  <option selected>Wonderful!</option>
                  <option>Nice</option>
                  <option>Neutral</option>
                  <option>Don't recommend</option>
                </select>
                <input type="text" class="form-control margtop10" placeholder="" name="title" id="title">
                  <i class="title_error err_hide"></i>
                <textarea class="form-control margtop10" rows="3" name="comment" id="comment"></textarea>
                  <i class="comment_error err_hide"></i>
                <div class="clearfix"></div>
                <button type="button" class="btn-search4 margtop20" id="frontend_review_add_button" name="frontend_review_add_button">Submit</button> 

              
                <br/>
                <br/>
                <br/>
              </form>
              </div>


               </div>
            </div>
         </div>
         
      </section>
      <script src="<?php echo base_url(); ?>skin/assets/js/jquery-ui.js"></script>
  
    <!-- Bootstrap   -->
    <script src="<?php echo base_url(); ?>skin/dist/js/bootstrap.min.js"></script>

        <!-- bin/jquery.slider.min.js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/draggable-0.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/details.js"></script>
     <?php init_load_frontend_footer(); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.slider.js"></script>
