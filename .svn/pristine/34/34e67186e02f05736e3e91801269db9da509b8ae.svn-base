<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoteleasy</title>
    
    <!-- Bootstrap -->
    <!-- <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <link href="<?php echo base_url(); ?>skin/assets/css/custom.css" rel="stylesheet" media="screen">

    <!-- Animo css-->
    <link href="<?php echo base_url(); ?>skin/plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
    
    <link href="<?php echo base_url(); ?>skin/examples/carousel/carousel.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
    <!-- Fonts -->  
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>   
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/assets/css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast.style.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toast.script.js"></script>
    <!-- Load jQuery -->
    <script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>skin/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script src="<?php echo base_url(); ?>assets/js/login.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/pop_up.js"></script> 
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
  </head>
  <body>

</head>
<body>
    <div class="login-fullwidith">
        <!-- Login Wrap  -->
        <div class="login-wrap">
            <img src="<?php echo base_url() ?>skin/images/logo.png" class="login-img" alt="logo"/><br/>
            <form method="post" action="<?php echo base_url('dashboard/hotel_login'); ?>" id="hotel_panel_login">
            <div class="login-c1">
                <span class="error_msg"></span>
                <div class="cpadding50">
                    <input type="text" class="form-control logpadding" name="user_name" id="user_name" placeholder="Username" class="validate">
                    <br/>
                    <input type="password" class="form-control logpadding" name="password" id="password" placeholder="Password" class="validate">
                </div>
            </div>
            <div class="login-c2">
                <div class="logmargfix">
                    <div class="chpadding50">
                            <div class="alignbottom">
                                <button action="#" class="btn-search4" id="login_form_hotel_panel" type="submit" value="Login">Submit</button>                           
                            </div>
                            <div class="alignbottom2">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox">Remember
                                </label>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </form>
            <div class="login-c3">
                <div class="left"><a href="<?php echo base_url('dashboard/agent_reg'); ?>" class="whitelink"><span></span>Website</a></div>
                <div class="right"><a href="#" class="whitelink">Lost password?</a></div>
                <div class="addhotel">
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Add Your Hotel</button>
                </div>
            </div>          
        </div>
    </div> 


<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg width_90" style="padding-top: 22px;">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="post" action="<?php echo base_url('dashboard/popup'); ?>" id="front_hotel_add"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo base_url(); ?>/assets/images/closeall.png" width="20px"> </button>
      </div>
      <div class="modal-body">
      <div class="col-sm-12">
         <h3 class="formheadingrg"><span></span> Hotel Details</h3>
      </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Hotel Name :<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="property" id="property" >
                          <span class="property_err popup_err blink_me"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Selling Currency :<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control" name="sell_currency" id="sell_currency">
                            <option selected="selected">Dirham (AED)</option>
                            <option>Dollars (USD)</option>
                            <option>Rupees (INR)</option>
                            <option>Pounds (GBP)</option>
                            <option>Euro (EUR)</option>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Star Ratings :</label>
                        <div class="col-sm-6">
                          <fieldset>
                            <span class="star-cb-group">
                              <input type="radio" id="rating-1" name="str1" value="1" /><label for="rating-1">1</label>
                              <input type="radio" id="rating-2" name="str1" value="2" /><label for="rating-2">2</label>
                              <input type="radio" id="rating-3" name="str1" value="3" /><label for="rating-3">3</label>
                              <input type="radio" id="rating-4" name="str1" value="3" /><label for="rating-3">4</label>
                              
                              <input type="radio" id="rating-5" name="str1" value="5" checked="checked"/><label for="rating-5">5</label>
                            </span>
                          </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Accepting VCC :</label>
                        <div class="col-sm-9">
                          <fieldset>
                            <span class="star-cb-group">
                              <input type="radio" id="acs" name="acs" value="0" checked="checked" /><label for="yes">Yes</label>
                              <input type="radio" id="acs" name="acs" value="1" /><label for="rating-5">No</label>
                            </span>
                          </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">No of Rooms :<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="numroom" name="numroom">
                          <span class="numroom_err popup_err blink_me"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Channel Manager:(if any)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="channel" name="channel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Website :<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="website" name="website">
                          <span class="website_err popup_err blink_me"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class=form-horizondal>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl ">Part of Any Chain or Collection:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="chain" name="chain">
                        </div>
                    </div>
                </div>
            </div>
        </div>  <hr>
        <div class="col-sm-12">
         <h3 class="formheadingrg"><span></span>Contact Details</h3>
      </div>
      <br><br>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label for="Sales" class="fontstyl">Sales Team</label>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label for="Revenue" class="fontstyl">Revenue Team</label>
            </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="salename"  class="fontstyl">Name<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="text" class="form-control " id="sale_name" name="sale_name">
                <span class="sale_name_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="text" class="form-control" id="revenu_name" name="revenu_name">
                <span class="revenu_name_err popup_err blink_me"></span>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="mailstr"  class="fontstyl">Email<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="email" class="form-control " id="sale_mail" name="sale_mail">
                          <span class="sale_mail_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="email" class="form-control" id="revenu_mail" name="revenu_mail">
                <span class="revenu_mail_err popup_err blink_me"></span>
            </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="mbnum"  class="fontstyl">Number:<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="number" class="form-control " id="sale_number" name="sale_number">
                <span class="sale_number_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <input type="number" class="form-control" id="revenu_number" name="revenu_number">
                <span class="revenu_number_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button action="#" type="button" class="btn btn-warning" id="login_form_add_hotel" value="Adding" name="login_form_add_hotel">Send</button>
      </div>
      </form>
    </div>

  </div>
</div>
    <script type="text/javascript"></script>
    <!-- Javascript  -->
    <script src="<?php echo base_url(); ?>skin/assets/js/initialize-loginpage.js"></script>
    <script src="<?php echo base_url(); ?>skin/assets/js/jquery.easing.js"></script>
    <!-- Load Animo -->
    <script src="<?php echo base_url(); ?>skin/plugins/animo/animo.js"></script>
    <script>
    function errorMessage(){
        $('.login-wrap').animo( { animation: 'tada' } );
    }
    </script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>