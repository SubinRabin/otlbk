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
								<?php $currency = $this->session->userdata('pay_currency');
								$total = $this->session->userdata('totalamount'); ?>
								<span class="badge"><?php echo $currency.' '.$total ?></span>
							</div>
							
						</div>
					</div><br><br>
					 	<form id="2checkout_form_payment" method="post" action="<?php echo base_url(); ?>gateways/authorize_aim/complete_purchase_booking" id="authorize_form">
					 		 <input name="token" type="hidden" value="" />
					 		  <input id="currency" type="hidden" name="currency" value="<?php echo $currency ?>"/>
					            <input id="total" type="hidden" name="total" value="<?php  echo preg_replace('[,]','',$total) ?>"/>
					 	
					        <div class="row">
					        	<div class="col-md-6 form-group">
          							<input type="text" name="ccNo" id="ccNo" class="form-control" placeholder="ccNo" placeholder="Credit card Number">
          						</div>
					          <div class="col-md-6 form-group">
					          	<input class="form-control" id="expMonth" name="expMonth" type="number" maxlength="2" required  placeholder="card expiration month(MM)"/>
					          </div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6 form-group">
					               <input class="form-control" id="expYear" name="expYear" type="number" maxlength="4" required placeholder="card expiration year(YYYY)" />
					          	</div>
					          	<div class="col-md-6 form-group">
					             <input class="form-control" id="cvv" type="text" autocomplete="off" required placeholder="cvv" name="cvv"/>
					          	</div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6 form-group">
					              <input type="text" name="billingName" class="form-control" required placeholder="card holder name">
					          	</div>
					          	<div class="col-md-6 form-group">
					              <input type="text" name="billingAddress1" class="form-control" required placeholder="billing address1">
					          	</div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6 form-group">
					               <input type="text" name="billingCity" class="form-control" required placeholder="biiling city">
					          	</div>
					          	<div class="col-md-6 form-group">
					           		<input type="text" name="billingState" class="form-control" placeholder="billingstate">
					          	</div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6 form-group">
					               <input type="text" name="billingCountry" class="form-control" placeholder="billingCountry" >
					          	</div>
					          	<div class="col-md-6 form-group">
					          		<input type="text" name="billingPostcode" class="form-control" placeholder="billing postcode">
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
    function goBack() {
    	window.history.back();
  	}
</script>

	

