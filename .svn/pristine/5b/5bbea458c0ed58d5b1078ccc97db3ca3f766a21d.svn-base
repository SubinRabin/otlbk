<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?>
	<div class="container breadcrub">
		<ol class="track-progress" data-steps="5">
	      <li class="done">
	        <span>Search</span>
	      </li><li class="done">
	        <span>Search Transfers</span>
	        <i></i>
	      </li><li class="done">
	        <span>Transfer Information</span>
	        <i></i>
	      </li><li class="active">
	        <span>Review Booking</span>
	        <i></i>
	      </li><li>
	        <span>Confirm</span>
	      </li>
	    </ol>
	</div>	
	<!-- CONTENT -->
	<?php
					
		$arrivaldate = $_REQUEST['arrivaldate'];
		$retuendate = $_REQUEST['returndate'];
		$passenger = $_REQUEST['passenger'];
		$type = $_REQUEST['transfertype'];
		if($type=='one-way') {
			$t = 1;
		} else {
			$t = 2;
		}
		$oneway_amt = $passenger * $transferdetails[0]->Passenger_selling;
		$oneway_amt = ($oneway_amt*$totalMarkup)/100+$oneway_amt;
	   	$total_amount = $t * $passenger * $transferdetails[0]->Passenger_selling;
		$total_amount = ($total_amount*$totalMarkup)/100+$total_amount;
	?>
	<div class="container">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 paymentbox grey">
						<!-- <span class="opensans size18 dark bold">Book Hotel Details</span> <br> <br> -->
						<img src="<?php echo base_url();?>uploads/tour_services_images/<?php echo $_REQUEST['vehicleid'] ?>/<?php echo $transferdetails[0]->vehicle_image ?>" class="left margright20" width="100%" alt=""/>
						
						
					<div class="clearfix"></div>
					<div class="hpadding20 margtop20">
						<p><span class="opensans size20 bold"><?php echo $transferdetails[0]->ContractName?></span></p>
				    </div>		
		            <div class="line3"></div>
		            <div class="hpadding20 margtop20" style="min-height: 83px;">
						<span class="opensans size15 bold">Vehicle Name</span>
						<br>
					     <td class="center green bold"><?php echo $transferdetails[0]->VehicleName?></td> <br> <br>
				    </div>
					<div class="line3"></div>
		           <div class="hpadding20 margtop20"><br> 
						<span class="opensans size15 bold">Vehicle Type</span>
						<br>
						<td class="center green bold"><?php echo $transferdetails[0]->vehicleType ?></td> <br> <br>
					</div>
					<div class="line3"></div>
					<div class="hpadding20 margtop20"><br> 
						<span class="opensans size15 bold">Description</span>
						<br>
						<td class="center green bold"><?php echo $transferdetails[0]->description ?></td> <br> <br>		
					</div>	
					<div class="padding30">					
							<div class="clearfix"></div>
					</div>
				</div><br/>
			</div>
			<!-- END OF LEFT CONTENT -->
			<!-- RIGHT CONTENT -->
			
			<div class="col-md-8 pagecontainer2 offset-0">
			<form method="post" name="payment_form" id="payment_form">
				<input type="hidden" name="RequestType" value="<?php echo $_REQUEST['RequestType'] ?>">
				<input type="hidden" name="transfertype" value="<?php echo $_REQUEST['transfertype'] ?>">
				<input type="hidden" name="nationality" id="nationality" value="<?php echo $_REQUEST['nationality']?>">
				<input type="hidden" name="location" value="<?php echo $_REQUEST['location'] ?>">
				<input type="hidden" name="region" value="<?php echo $_REQUEST['region'] ?>">
				<input type="hidden" name="airportID" value="<?php echo $_REQUEST['airportID'] ?>">
				<input type="hidden" name="passenger" id="passenger" value="<?php echo $_REQUEST['passenger'] ?>">
				<input type="hidden" name="vehicleid" id="vehicleid" value="<?php echo $_REQUEST['vehicleid'] ?>">
				<input type="hidden" name="contractid" id="contractid" value="<?php echo $_REQUEST['contractid'] ?>">
				<input type="hidden" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>">
				<input type="hidden"  name="returndate"  value="<?php echo isset($_REQUEST['returndate']) ? $_REQUEST['returndate'] : '' ?>" >
				<input type="hidden" name="token" value="<?php echo $_REQUEST['token'] ?>">
				<input type="hidden" name="SpecialRequest" value="<?php echo $_REQUEST['SpecialRequest'] ?>">
				
				<div class="padding30 grey">
					<div class="clearfix"></div>
					<div class="line4"></div>
					<div class="row margtop15">
						<div class="col-sm-4">
							<span class="opensans size13"><b>Arrival date</b></span>
							<input type="hidden" class="form-control wh90percent mySelectCalendar" id="datepicker3" name="arrivaldate" placeholder="mm/dd/yyyy" readonly value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" />
							<input type="text" class="form-control wh90percent" value="<?php echo $_REQUEST['arrivaldate']  ?>" readonly>
						</div>
						<?php $date = date('m/d/Y', strtotime("+1 day", strtotime(date('m/d/Y')))); 
						if($type=="two-way") { ?>
						<div class="col-sm-4">
							<span class="opensans size13"><b>Departure date</b></span>
							<input type="hidden" class="form-control wh90percent mySelectCalendar" id="datepicker3" name="departdate" readonly placeholder="mm/dd/yyyy" value="<?php echo isset($_REQUEST['returndate']) ? $_REQUEST['returndate'] : '' ?>" />
							<input type="text" class="form-control wh90percent" value="<?php echo $_REQUEST['returndate']  ?>" readonly>
						</div>
						<?php } ?>
						<div class="col-sm-4 text-center">
							<span class="opensans size13"><b>Passengers</b></span>
							<h4><?php echo $passenger ?></h4>
						</div>
					</div>
					<div class="col-md-6 textleft">
						<input type="text" class="hide" id="first_name" name="first_name" value="<?php echo $_REQUEST['first_name'] ?>">

						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="last_name" id="last_name" value="<?php echo $_REQUEST['last_name'] ?>">
						</div>
						<div class="col-md-6 textleft">
							</span><input type="text" class="hide" name="email" id="email" value="<?php echo $_REQUEST['email'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="contact_num" id="contact_num" value="<?php echo $_REQUEST['contact_num'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="arrivalno" id="arrivalno" value="<?php echo $_REQUEST['arrivalno'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="f_arrivaldate" id="f_arrivaldate" value="<?php echo $_REQUEST['f_arrivaldate'] ?>">
						</div>
						<?php if($type=="two-way") { ?>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="departno" id="departno" value="<?php echo $_REQUEST['departno'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="departdate" id="departdate" value="<?php echo $_REQUEST['departdate'] ?>">
						</div> 
						<?php } ?><br><br>
           			<h4 class="opensans dark bold">Booking Amount Breakup</h4>
	            	<div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			
	            			<table class="table-bordered" >
	            				<thead>
	            					<tr>
	            						<th style="width: 85px;">Transfer Type</th>
	            						<th style="width: 85px;">Date & Time</th>
		            					<th style="width:150px;">Vehicle Name</th>
		            					<th style="width: 100px; text-align: right">Rate</th>
	            					</tr>
	            				</thead>
	            				<tbody>
	            					<tr>
		            					<td><?php echo 'One-way' ?></td>
		            					<td><?php echo $_REQUEST['arrivaldate'] ?></td>
		            					<td><?php echo $transferdetails[0]->VehicleName ?> 
		            					<td style="text-align: right"><?php 
		            					echo currency_type(agent_currency(),$oneway_amt) ?> <?php echo agent_currency() ?></td>
	            					</tr>
	            					<?php if($type=='two-way') { ?>
	            					<tr>
		            					<td><?php echo 'Return' ?></td>
		            					<td><?php echo $_REQUEST['returndate'] ?></td>
		            					<td><?php echo $transferdetails[0]->VehicleName ?> 
		            					<td style="text-align: right"><?php 
		            					echo currency_type(agent_currency(),$oneway_amt) ?> <?php echo agent_currency() ?></td>
	            					</tr>

	            					<?php } ?>
	            				</tbody>
	            				<tfoot>
	            					<tr>
	            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
	            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo currency_type(agent_currency(),$total_amount)." ".agent_currency();  ?></td>
	            					</tr>
	            				</tfoot>
	            			</table>
	            		</div>
	            	</div>
                </div>
			<div class="clearfix pbottom15"></div>
			<div class="row">
				<div class="form-group col-md-12">
				<div class="form-group col-md-6">
					<p class="hpadding20">Tax : <span class="bold">
					<?php echo '0'; ?>%</span></p>
				</div>
				</div>
			</div>
			<div class="form-group col-md-10">
				<h3 class="hpadding20 margtop-0">Grand Total : <span class="green bold">
					<?php echo currency_type(agent_currency(),$total_amount) ?> <?php echo agent_currency(); ?> </span>
					
					</h3>
					<input type="hidden" name="tot" value="<?php echo $total_amount ?>">

				</form>
			</div>
			<?php $check_tot = $total_amount;
			if ($check_tot <= $agent_credit_amount) { ?>
				<div class="form-group col-md-2">
					<button class="bluebtn pull-right" id="Confirm_book" type="button" name="Confirm_book">Confirm</button>
				</div>
			<?php	} else { ?> 
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<p class="text-center text-danger">Credit amount too low.please contact admin</p>
					</div>
				</div>
			<?php } ?>
			
			<div class="clear-fix"></div>
		</div>
	</div>
		<!-- END OF RIGHT CONTENT -->
	</div>
</div>
<!-- END OF CONTENT -->
<script>
	$("#Confirm_book").click(function() {
        $("#payment_form").attr("action",base_url+"transfer/transferbookingconfirm");
        $("#payment_form").submit();
    });
</script>
<?php init_front_black_tail(); ?> 

	
