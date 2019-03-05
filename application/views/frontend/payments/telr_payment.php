<?php init_front_head(); ?> 
<head>
    <script src="<?php echo base_url(); ?>skin/js/common.js"></script>
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
								<span class="badge"><?php echo $currency.' '.$total ?></span>
									
							</div>
							
						</div>
					</div><br><br>
					<?php
					  $dateFormat="Y-m-d H:i:s";
                    // $timeNdate=gmdate($dateFormat, time()+$offset);
                    $timeNdate=date($dateFormat);

                    $secret=2;
                    $string = $secret.":".$store_id.":".$total.":".$currency.":1:".strtotime($timeNdate).":ABC123:Items:none";
                    $signature = hash('sha256', $string);
                    ?>
					<form action="https://secure.innovatepayments.com/gateway/index.html"
                     method="post">
                    <input name="ivp_store" type="hidden" value="<?php echo $store_id ?>">
                    <input name="ivp_amount" type="hidden" value="<?php echo $total ?>">
                    <input name="ivp_currency" type="hidden" value="<?php echo $currency ?>">
                    <input name="ivp_test" type="hidden" value="1">
                    <input name="ivp_timestamp" type="hidden" value="<?php echo strtotime($timeNdate) ?>">
                    <input name="ivp_cart" type="hidden" value="ABC123">
                    <input name="ivp_desc" type="hidden" value="Items">
                    <input name="ivp_extra" type="hidden" value="none">
                    <input name="ivp_signature" type="hidden"
                     value="<?php echo $signature ?>">
                     <input name="return_cb_auth" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=success') ?>">
                     <input name="return_cb_decl" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=failed') ?>">
                     <input name="return_cb_can" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=failed') ?>">  

                    <input name="return_auth" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=success') ?>">
                    <input name="return_decl" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=failed') ?>">
                    <input name="return_can" type="hidden"
                     value="<?php echo site_url('backend/common/paymentgateway?msg=failed') ?>">                 
                    <input type="submit" class="Purchase" value="Purchase">
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
        $(function(){
            $('.Purchase').hide();
            $('.Purchase').click();
        });        
     	function goBack() {
            window.history.back();
  		}
</script>

	

