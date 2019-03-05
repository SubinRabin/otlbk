<?php init_front_head(); ?> 
<head>
    <script src="<?php echo base_url(); ?>skin/js/common.js"></script>
    <script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
</head>
<body id="top" class="thebg">
  <div class="container offset-3"> 
    <div class="navbar-header">
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url(); ?>/hotels" class="navbar-brand"><img src="<?php echo base_url(); ?>skin/images/logo.png" alt="Hotels" class="logo"/></a>
    </div>
  </div>
  <div class="container breadcrub">
    
  </div>  
  <!-- CONTENT -->
  
  <div class="container">
    <div class="container  offset-0">
      <!-- LEFT CONTENT -->

      <div class="col-md-8 col-md-offset-2" >
        <div class="pagecontainer2 paymentbox grey">
          <div class="padding30">
            <span class="opensans size18 dark bold">Payment &nbsp;<small class="pay_error"></small></span> <br> <br>


          <div class="padding20 margtop25" style="background-color: ghostwhite;">
            <div class="row">
              <div class="col-sm-12 text-right" >
                <?php $currency = $this->session->userdata('pay_currency');
                $total = $this->session->userdata('totalamount'); ?>
                <span class="badge"><?php echo $currency.' '.$total ?></span>
                  
              </div>
              
            </div>
          </div><br><br>
            <form id="braintree_form_payment" method="post" action="<?php echo base_url(); ?>gateways/braintree/complete_purchase_booking">
               <input name="token" type="hidden" value="" />
                <input id="currency" type="hidden" name="currency" value="<?php echo $currency ?>"/>
                      <input id="total" type="hidden" name="total" value="<?php echo preg_replace('[,]','',$total) ?>"/>
            
                  <div class="row">
                        <div class="bt-drop-in-wrapper">
                           <div id="bt-dropin"></div>
                        </div>    
                  </div>
            </div>
            <div class="clearfix"></div>
            <a href="#" onclick="goBack()"  class="col-md-4 bold" style="left: 30px;bottom: 20px; padding: 15px;color: blue">Back</a>
             <input type="submit" class="col-md-4 col-md-offset-4 btn btn-success bold" style="right:30px;bottom: 20px; padding: 15px" value="Proceed to Pay">
             </form>
            <div class="hpadding20 margtop20">

            <br> <br>
            </div>
             </div><br/>
      </div>
      <!-- END OF LEFT CONTENT -->
    </div>
</div>
<!-- END OF CONTENT -->
<script>
      braintree.setup('<?php echo $token; ?>', 'dropin', {
        container: 'bt-dropin'
      });   
</script>

  

