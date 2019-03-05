<?php  
$this->load->helper('common');
$data = title();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $data[0]->Title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico">
  
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>skin/dist/css/bootstrap.css" rel="stylesheet" media="screen">
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
	
	<!-- Load jQuery -->
	<script src="<?php echo base_url(); ?>skin/assets/js/jquery.v2.0.3.js"></script>
  <script src="<?php echo base_url(); ?>skin/js/agent.js"></script>
  <script type="text/javascript">
    var base_url = "<?php  echo base_url();?>"; 
  </script> 
</head>
<body>

  <div class="pageheading rmheading">
    <div class="container  full-container getheading">
      <span>Agent Registration</span>
    </div>
  </div>
  <form method="post" id="agent_reg">
   <input type="hidden" id="existing_mail_check" value="2">
   <div class="container-fluid">
    <div class="mainformdivreg">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <br><br>
          <h3 class="formheadingrg"><span></span>Personal Details</h3>
        </div>
        <div class="row">
         <div class="col-sm-1"></div>
         <div class="col-sm-5">
          <div class=form-horizondal>
            <div class="form-group">
              <label for="agency_name" class="col-sm-3 control-label fontstyl" style="">Agency Name<span class="starcolor">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="agency_name" name="agency_name">
                <span class="agency_name_err popup_err blink_me"></span>

              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class=form-horizondal>
            <div class="form-group">
              <label for="address" class="col-sm-3 control-label fontstyl" style="">Address <span class="starcolor">*</span></label>
              <div class="col-sm-9">
                <textarea id="address" name="address" class="form-control"></textarea>
                <span class="address_err popup_err blink_me"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>	
      <div class="row">
      	<div class="col-sm-1"></div>
       <div class="col-sm-5">
        <div class=form-horizondal>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label fontstyl" style="">Agency email <span class="starcolor">*</span></label>
            <div class="col-sm-9">

              <input type="text" class="form-control" id="email" name="email">
              <span class="agency_email_err popup_err blink_me"></span>
              <span class="agency_email_test_err popup_err blink_me"></span>
              <span class="agency_email_reg_err popup_err blink_me"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class=form-horizondal>
          <div class="form-group">
            <label for="pincode" class="col-sm-3 control-label fontstyl" style="">Pincode/Zipcode/ PostCode<span class="starcolor">*</span></label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="pincode" name="pincode">
              <span class="pincode_err popup_err blink_me"></span>

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>	
    <div class="row">
     <div class="col-sm-1"></div>
     <div class="col-sm-5">
      <div class=form-horizondal>
        <div class="form-group">
          <label for="first_name" class="col-sm-3 control-label fontstyl" style="">First Name<span class="starcolor">*</span></label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="first_name" name="first_name">
            <span class="first_name_err popup_err blink_me"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class=form-horizondal>
        <div class="form-group">
          <label for="telephone" class="col-sm-3 control-label fontstyl" style="">Telephone<span class="starcolor">*</span></label>

          <div class="col-sm-9">
            <input type="number" class="hide-spinner form-control" id="telephone" name="telephone">
            <span class="telephone_err popup_err blink_me"></span>

          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>	
  <div class="row">
   <div class="col-sm-1"></div>
   <div class="col-sm-5">
    <div class=form-horizondal>
      <div class="form-group">
        <label for="last_name" class="col-sm-3 control-label fontstyl" style="">Last Name<span class="starcolor">*</span></label>

        <div class="col-sm-9">
          <input type="text" class="form-control" id="last_name" name="last_name">
          <span class="last_name_err popup_err blink_me"></span>

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class=form-horizondal>
      <div class="form-group">
        <label for="phone" class="col-sm-3 control-label fontstyl" style="">Mobile Number<span class="starcolor">*</span></label>

        <div class="col-sm-9">
          <input type="number" class="hide-spinner form-control" id="phone" name="phone">
          <span class="mobile_err popup_err blink_me"></span>
          
        </div>
      </div>
    </div>
  </div>
</div>	
<div class="row">
 <div class="col-sm-1"></div>

 <div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="designation" class="col-sm-3 control-label fontstyl" style="">Designation<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="designation" name="designation">
        <span class="designation_err popup_err blink_me"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="preferred_currency" class="col-sm-3 control-label fontstyl" style="">Preferred Currency<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <select name="preferred_currency" class="form-control" id="preferred_currency">
          <?php foreach ($currency_list as $key => $value) { 
            if($view[0]->currency_type==$value->currency_type) {?>
              <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
            <?php } else { ?>
              <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
            <?php  } } ?>
            
          </select>
          <!-- </div> -->
          <span class="preferred_currency_err popup_err blink_me"></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-1"></div>
</div>	
<div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="nature_business" class="col-sm-3 control-label fontstyl" style="">Nature Of Business<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nature_business" name="nature_business">
        <span class="nature_business_err popup_err blink_me"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="business_type" class="col-sm-3 control-label fontstyl" style="">Business Type<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="business_type" name="business_type">
        <span class="business_type_err popup_err blink_me"></span>

      </div>
    </div>
  </div>
</div>
<div class="col-sm-1"></div>
</div>	
<div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-5">
   <div class=form-horizondal>
     <div class="form-group">
       <label for="country" class="col-sm-3 control-label fontstyl" style="">Country<span class="starcolor">*</span></label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="country" name="country">
         <span class="country_err popup_err blink_me"></span>

       </div>
     </div>
   </div>
 </div>
 <div class="col-sm-5">
   <div class=form-horizondal>
     <div class="form-group">
       <label for="city" class="col-sm-3 control-label fontstyl" style="">City<span class="starcolor">*</span></label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="city" name="city">
         <span class="city_err popup_err blink_me"></span>

       </div>
     </div>
   </div>
 </div>
 <div class="col-sm-1"></div>

</div>	
<div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="website" class="col-sm-3 control-label fontstyl" style="">Website<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="website" name="website">
        <span class="website_err popup_err blink_me"></span>

      </div>
    </div>
  </div>
</div>
<div class="col-sm-5">
  <div class=form-horizondal>
    <div class="form-group">
      <label for="fax" class="col-sm-3 control-label fontstyl" style="">Fax<span class="starcolor">*</span></label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="fax" name="fax">
        <span class="fax_err popup_err blink_me"></span>

      </div>
    </div>
  </div>
</div>
<div class="col-sm-1"></div>
</div>	
<div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-5">
  <div class=form-horizondal>
   <div class="form-group">
    <br>
    <label for="iata_status" class="col-sm-3 control-label fontstyl" >IATA Status <span class="starcolor">*</span></label>
    <p>
      <!-- <?php  if (isset($edit[0]->Iata_Status) && $edit[0]->Iata_Status=="Approved") { ?> -->
      <input name="iata_status" type="radio" id="test1" checked="" value="Approved" onclick="iata_check('1')" />
      <label for="test1" class="col-sm-3 control-label">Approved</label>
      <input name="iata_status" type="radio" id="test2"  value="Not Approved" onclick="iata_check('2')" />
      <label for="test2" class="col-sm-3 control-label">Not Approved</label>
      <!-- <?php } else { ?> -->
      <input name="iata_status" type="radio" id="test1" value="Approved" onclick="iata_check('1')"/>
      <label for="test1" class="control-label fontstyl">Approved</label>
      <input name="iata_status" type="radio" id="test2" checked  value="Not Approved" onclick="iata_check('2')" />
      <label for="test2" class="control-label fontstyl">Not Approved</label>
      <!-- <?php } ?> -->
    </p>
    <!-- <div class="col-sm-1"></div> -->

  </div> 
</div>
</div>
            <!-- <div class="col-sm-5">
        		<div class=form-horizondal>
            		<div class="form-group">
                        <label for="markup" class="col-sm-3 control-label fontstyl" style="">Markup<span class="starcolor">*</span></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="markup" name="markup">
                  <span class="markup_err popup_err blink_me"></span>

                        </div>
            		</div>
                </div>
              </div> -->
              <div class="col-sm-1"></div>
            </div>
            <div class="row">
             <div class="col-sm-1"></div>
             <div class="col-sm-5 iata_number hide">
              <div class=form-horizondal>
                <div class="form-group">
                  <label for="iata_reg" class="col-sm-3 control-label fontstyl" style="">IATA Reg Number<span class="starcolor">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="iata_reg" name="iata_reg">
                    <span class="iata_reg_err popup_err blink_me"></span>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>	            
        </div>
      </div>
      <div class="col-sm-12">
        <div class="modal-footer regclassfooter">
        </div>
        <div class="row">
         <br>
         <!-- <div class="col-sm-6"></div> -->
         <div class="col-md-12 col-sm-12 col-xs-12">
          <h3 class="formheadingrg"><span></span> Access Details</h3>
        </div>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-sm-12">
        <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-5">
           <div class=form-horizondal>
            <div class="form-group">
              <label for="username" class="col-sm-3 control-label fontstyl" style="">Username<span class="starcolor">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="username">
                <span class="username_err popup_err blink_me"></span>
                <br>
              </div>
            </div>
          </div>
          <div class=form-horizondal>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label fontstyl" style="">Password<span class="starcolor">*</span></label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password">
                <span class="password_err popup_err blink_me"></span>

                <br>
              </div>
            </div>
          </div>	  
          <div class=form-horizondal>
            <div class="form-group">
              <label for="confirm_password" class="col-sm-3 control-label fontstyl" style="">Confirm Password<span class="starcolor">*</span></label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                <span class="password_check_err popup_err blink_me"></span>
                <span class="confirm_password_err popup_err blink_me"></span>
                
                <br>
              </div>
            </div>
          </div>   		                        
        </div>
        <div class="col-sm-6">
        </div>
      </div>	
      <div class="modal-footer regclassfooter">
      </div>
      <h3 class="formheadingrg"><span></span> Contact Details</h3><br>
      <div class="col-sm-1"></div>
      <div class="row">
        <div class="col-sm-2">
          <br> <br>
          <label for="name" class="col-sm-3 control-label fontstyl">Name<span class="starcolor">*</span></label> <br> <br> 
          <label for="email" class="col-sm-3 control-label fontstyl">Email<span class="starcolor">*</span></label> <br> <br> 
          <label for="number" class="col-sm-3 control-label fontstyl">Number<span class="starcolor">*</span></label><br> <br> <br>
          <label for="password" class="col-sm-3 control-label fontstyl">Password<span class="starcolor">*</span></label>
        </div>
        <div class="col-sm-2">
         <div class="form-group">
           <label for="accounts"  class="col-sm-3 control-label fontstyl">Accounts<span class="starcolor">*</span></label>
           <br>
           <input type="text" class="form-control " id="first_name_accounts" name="first_name_accounts" placeholder="User Name">
           <span class="accounts_name_err popup_err blink_me"></span>
           <br>
           <input type="text" class="form-control " id="email_accounts"
           name="email_accounts" placeholder="accounts Email">
           <span class="accounts_email_err popup_err blink_me"></span>
           <span class="accounts_email_test_err popup_err blink_me"></span>
           <br>
           <input type="number" class="hide-spinner form-control " id="number_accounts" name="number_accounts" placeholder="Accounts Number">
           <span class="accounts_number_err popup_err blink_me"></span>
           <br>
           <input type="password" class="hide-spinner form-control " id="password_accounts" name="password_accounts" placeholder="Accounts Password">
           <span class="accounts_password_err popup_err blink_me"></span>
         </div>
       </div>
       <div class="col-sm-2">
         <div class="form-group">
          <label for="reservation/operation"  class="col-sm-3 control-label fontstyl">Reservation/Operations<span class="starcolor">*</span></label>
          <input type="text" class="form-control" id="first_name_reservation" placeholder="User Name" name="first_name_reservation">
          <span class="reservation_name_err popup_err blink_me"></span>
          <br>
          <input type="text" class="form-control" id="email_reservation" placeholder="reservation Email" name="email_reservation">
          <span class="reservation_email_err popup_err blink_me"></span>
          <span class="reservation_email_test_err popup_err blink_me"></span>

          <br>
          <input type="number" class="hide-spinner form-control" id="number_reservation" placeholder="Reservation Number" name="number_reservation">
          <span class="reservation_number_err popup_err blink_me"></span>
          <br>
          <input type="password" class="hide-spinner form-control " id="password_reservation" name="password_reservation" placeholder="Reservation Password">
          <span class="reservation_password_err popup_err blink_me"></span>

        </div>
      </div>
      <div class="col-sm-3">
       <div class="form-group">
        <label for="management"  class="col-sm-3 control-label fontstyl">Management<span class="starcolor">*</span></label>
        <input type="text" class="form-control" id="first_name_management" name="first_name_management" placeholder="User Name">
        <span class="management_name_err popup_err blink_me"></span>
        <br>
        <input type="text" class="form-control" id="email_management" name="email_management" placeholder="Management Email">
        <span class="management_email_err popup_err blink_me"></span>
        <span class="management_email_test_err popup_err blink_me"></span>
        <br>
        <input type="number" class="hide-spinner form-control" id="number_management" placeholder="Management Number" name="number_management">
        <span class="management_number_err popup_err blink_me"></span>
        <br>
        <input type="password" class="hide-spinner form-control " id="password_management" name="password_management" placeholder="Management Password">
        <span class="management_password_err popup_err blink_me"></span>

      </div>
    </div>
  </div>
  <div class="modal-footer regclassfooter"></div>
  <div class="col-sm-12">
   <div class="text-right">
    <button type="button" class="btn btn-warning" id="login_form_agent_reg" name="login_form_agent_reg">Send</button>
  </div>
</div>
<div class="modal-footer regclassfooter"></div>
</div>
</div>
</div>
</form>


<!-- End of Container  -->

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
<script src="<?php echo base_url(); ?>skin/dist/js/bootstrap.min.js"></script>
</body>
</html>
