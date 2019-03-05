<!DOCTYPE html>
<html>
<head>
    <title>Hotel | Login</title>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Main Style (Normalize Included) -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>skin/css/hotel_login_style.css"></style>
    <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen">

    <script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>skin/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pop_up.js"></script> 
    <script type="text/javascript">
        var base_url = "<?php  echo base_url();?>"; 
    </script> 
    <style type="text/css">
        .button-class {
            width: auto ! important; 
            box-shadow: unset ! important;
        }
        .modal-header {
            padding: 25px ! important;
        }
        .blink_me {
            color: red;
        }
        .Create-hotel {
            margin-top: 20px;
        }
        .Create-hotel button {
            box-shadow: unset ! important;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <!-- Image Here -->
        <div class="left-wrapper"></div>
        <!-- Login Page Content -->
        <div class="right-wrapper">
            <div class="right-content">
                <div class="product-logo">
                    <img src="<?php echo base_url() ?>skin/images/logo.png" alt="LOGO">
                </div>
                  <form method="post" action="<?php echo base_url('dashboard/hotel_panel'); ?>" id="hotel_panel_login">
                    <h2>Hotel Login</h2>
                    <div class="login-wrap">
                        <div class="input-wrap">
                            <span class="error_msg"></span>
                            <label for="">Hotel Code</label>
                            <input type="text" class="form-control logpadding" name="user_name" id="user_name" placeholder="Enter Your Hotel Code...." class="validate">  
                            <label for="">Password</label>
                            <input type="password" class="form-control logpadding" name="password" id="password" placeholder="Enter Your Password...." class="validate">
                        </div>
                        <div class="btn-wrap">
                            <input type="checkbox" >
                            <label>Keep me signed in</label>
                            <button action="#" class="btn-search4" id="login_form_hotel_panel" type="Submit" value="Login">Submit</button>

                            <!-- <a href="#"  class="Create-hotel" data-toggle="modal" data-target="#myModal">Create an new Hotel</a> -->
                        </div>
                        <div class="btn-card Create-hotel">
                            <img src="<?php echo base_url(); ?>skin/images/agent_login/hotel-btn-bg.jpg" alt="" width="100%">
                            <button type="button" data-toggle="modal" data-target="#myModal">Add Your Hotel</button>
                        </div>
                    </div>
                 </form>    
            </div>
        </div>
    </div>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="col-md-10 col-md-offset-1" style="margin-top: 3%">
    <!-- Modal content-->
    <div class="modal-content">
     <form method="post" action="<?php echo base_url('dashboard/popup'); ?>" id="front_hotel_add"> 
      <div class="modal-header">
        <button type="button" class="close button-class" data-dismiss="modal"><img src="<?php echo base_url(); ?>/assets/images/closeall.png" width="20px"> </button>
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
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Selling Currency:<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control" name="sell_currency" id="sell_currency">
                            <?php foreach ($currency_list as $key => $value) { 
                                    if($view[0]->currency_type==$value->currency_type) {?>
                                    <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')'?></option>
                                <?php } else { ?>
                                    <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                <?php  } } ?>
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
                        <div class="col-sm-9">
                          <fieldset>
                            <div class="col-sm-12">
                                <span class="star-cb-group form">
                                  <input type="radio" id="rating-1" name="str1" value="1" /><label for="rating-1">1</label>
                                  <input type="radio" id="rating-2" name="str1" value="2" /><label for="rating-2">2</label>
                                  <input type="radio" id="rating-3" name="str1" value="3" /><label for="rating-3">3</label>
                                  <input type="radio" id="rating-4" name="str1" value="3" /><label for="rating-3">4</label>
                                  <input type="radio" id="rating-5" name="str1" value="5" checked="checked"/><label for="rating-5">5</label>
                                  <input type="radio" id="rating-10" name="str1" value="10"/><label for="10">Hotel Apartment</label>
                                </span>
                            </div>
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
                        <label for="inputEmail3" class="col-sm-3 control-label fontstyl">Website :</label>
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
            <div class="col-sm-2">
                <div class="form-group">
                <label for="Sales" class="fontstyl">Sales Team</label>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <label for="Revenue" class="fontstyl">Revenue Team</label>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <label for="Revenue" class="fontstyl">Contract Team</label>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <label for="Revenue" class="fontstyl">Finance Team</label>
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
            <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control " id="sale_name" name="sale_name">
                <span class="sale_name_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control" id="revenu_name" name="revenu_name">
                <span class="revenu_name_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control " id="contract_name" name="contract_name">
                <span class="contract_name_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control " id="finance_name" name="finance_name">
                <span class="finance_name_err popup_err blink_me"></span>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="mailstr"  class="fontstyl">Email<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="email" class="form-control " id="sale_mail" name="sale_mail">
                <span class="sale_mail_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="email" class="form-control" id="revenu_mail" name="revenu_mail">
                <span class="revenu_mail_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="email" class="form-control " id="contract_mail" name="contract_mail">
                <span class="contract_mail_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="email" class="form-control " id="finance_mail" name="finance_mail">
                <span class="finance_mail_err popup_err blink_me"></span>
            </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="mbnum"  class="fontstyl">Number:<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="hide-spinner form-control " id="sale_number" name="sale_number">
                <span class="sale_number_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="hide-spinner form-control" id="revenu_number" name="revenu_number">
                <span class="revenu_number_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control " id="contract_number" name="contract_number">
                <span class="contract_number_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="text" class="form-control " id="finance_number" name="finance_number">
                <span class="finance_number_err popup_err blink_me"></span>
            </div>
            </div>
            
      </div>
      <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
                <label for="mailstr"  class="fontstyl">Password<span class="starcolor">*</span></label>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="password" class="form-control " id="sale_password" name="sale_password">
                <span class="sale_password_err popup_err blink_me"></span>
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                <input type="password" class="form-control" id="revenu_password" name="revenu_password">
                <span class="revenu_password_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="password" class="form-control " id="contract_password" name="contract_password">
                <span class="contract_password_err popup_err blink_me"></span>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="password" class="form-control " id="finance_password" name="finance_password">
                <span class="finance_password_err popup_err blink_me"></span>
            </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
               
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <!-- <input type="password" class="form-control " id="sale_password" name="sale_password">
                <span class="sale_password_err popup_err blink_me"></span> --> 
            </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                 <input type="checkbox" class="filled-in" name="check1" id="check1" />
                <label for="check1">Same as SalesTeam</label>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                <input type="checkbox" class="filled-in" name="check2" id="check2" />
                <label for="check1">Same as RevenueTeam</label>
            </div>
            </div>
                <div class="col-sm-2">
                <div class="form-group">
                 <input type="checkbox" class="filled-in" name="check3" id="check3" />
                <label for="check1">Same as ContractTeam</label>
            </div>
            </div>
            <div class="col-sm-1">
            </div>
        
        </div> 
      <div class="modal-footer">
        <button action="#" type="button" class="btn btn-warning button-class" id="login_form_add_hotel" value="Adding" name="login_form_add_hotel">Send</button>
      </div>
      </form>
    </div>

  </div>
</div>


</body>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</html>
