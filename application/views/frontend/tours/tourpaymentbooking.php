<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?>
	<div class="container breadcrub">
		<ol class="track-progress" data-steps="5">
	      <li class="done">
	        <span>Search</span>
	      </li><li class="done">
	        <span>Search Tours</span>
	        <i></i>
	      </li><li class="done">
	        <span>Tour Information</span>
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
	<div class="container">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 paymentbox grey">
						<!-- <span class="opensans size18 dark bold">Book Hotel Details</span> <br> <br> -->
						<img src="<?php echo base_url();?>uploads/tour_services_images/<?php echo $_REQUEST['tourid'] ?>/<?php echo $tourdetails[0]->image ?>" class="left margright20" width="100%" alt=""/>
						
						
					<div class="clearfix"></div>
					<div class="hpadding20 margtop20">
						<p><span class="opensans size20 bold"><?php echo $tourdetails[0]->type?></span></p>
				    </div>		
		            <div class="line3"></div>
		            <div class="hpadding20 margtop20">
						<span class="opensans size15 bold">Location</span><br>
						<td class="center green bold"><?php echo $tourdetails[0]->city.', '.$tourdetails[0]->country; ?></td> <br> <br>
						<div class="clearfix"></div>	
						<div class="wh50percent chckin_err textleft left"><br></div>
						<div class="wh50percent  textleft right"><br></div>
					</div>					    			
					<div class="line3"></div>
					<div class="hpadding20 margtop20" style="min-height: 83px;">
						<span class="opensans size15 bold">Highlights</span>
						<br>
					     <td class="center green bold"><?php echo $tourdetails[0]->highlights?></td> <br> <br>
				    </div>
					<div class="line3"></div>
				</div><br/>
			</div>
			<!-- END OF LEFT CONTENT -->
			<!-- RIGHT CONTENT -->
			<?php
		        $result = array();
	          	$arrivaldate=date_create($_REQUEST['arrivaldate']);
		       	$adultcount = $_REQUEST['adults'];
			   	$childcount = $_REQUEST['childs'];
			   	if (isset($_REQUEST['room1-childAge'])) {
					foreach ($_REQUEST['room1-childAge'] as $key => $age) { 
						if($age > $tourdetails[0]->max_childAge) {
							$adultcount++;
							$childcount--;
						}
					}
				} 
			   	$total_amount = ($adultcount * $tourdetails[0]->adult_selling) + ($childcount * $tourdetails[0]->child_selling);
			   	$total_amount = ($total_amount*$totalMarkup)/100+$total_amount;
				$viwedate1 = date("d/m/Y", strtotime(isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : ''));
            ?>
			<div class="col-md-8 pagecontainer2 offset-0">
			<form method="post" name="payment_form" id="payment_form">

				<?php if (isset($_REQUEST['mulltiServiceDate'])) { 
				foreach ($_REQUEST['mulltiServiceDate'] as $key => $value) { ?>
					<input type="hidden" name="mulltiServiceDate[]" value="<?php echo $value ?>">
					<input type="hidden" name="mulltiService[]" value="<?php echo $_REQUEST['mulltiService'][$key] ?>">
					<input type="hidden" name="mulltiServiceFromTime[]" value="<?php echo $_REQUEST['mulltiServiceFromTime'][$key] ?>">
					<input type="hidden" name="mulltiServiceToTime[]" value="<?php echo $_REQUEST['mulltiServiceToTime'][$key] ?>">
				<?php } } ?>
				<input type="hidden" name="RequestType" value="<?php echo $_REQUEST['RequestType'] ?>">
				<input type="hidden" name="nationality" id="nationality" value="<?php echo $_REQUEST['nationality']?>">
				<input type="hidden" name="adults" id="adults" value="<?php echo $_REQUEST['adults'] ?>">
				<input type="hidden" name="childs" id="childs" value="<?php echo $_REQUEST['childs'] ?>">
				<input type="hidden" name="tourid" id="tourid" value="<?php echo $_REQUEST['tourid'] ?>">
				<input type="hidden" name="contractid" id="contractid" value="<?php echo $_REQUEST['contractid'] ?>">
				<input type="hidden" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>">
				<?php if (isset($_REQUEST['room1-childAge'])) {
									foreach ($_REQUEST['room1-childAge'] as $key => $value) { ?>
										<input type="hidden" name="room1-childAge[]" value="<?php echo $value; ?>">
							<?php   }
							} ?>
				<input type="hidden" name="token" value="<?php echo $_REQUEST['token'] ?>">
				<input type="hidden" name="SpecialRequest" value="<?php echo $_REQUEST['SpecialRequest'] ?>">
				
				<div class="padding30 grey">
					<div class="clearfix"></div>
					<div class="line4"></div>
					<div class="row margtop15">
						<div class="col-sm-6">
							<span class="opensans size13"><b>Date of Tour</b></span>
							<input type="hidden" class="form-control wh90percent mySelectCalendar" id="datepicker3" name="arrivaldate" placeholder="mm/dd/yyyy" readonly value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" />
							<input type="text" class="form-control wh90percent" value="<?php echo $viwedate1  ?>" readonly>
						</div>
						
						<div class="col-sm-6 text-center">
							<span class="opensans size13"><b>Number of Days</b></span><br>
						<?php echo $tourdetails[0]->duration.' '.$tourdetails[0]->durationType ?>
						</div>
					</div>

					<div class="padding20 margtop25" style="background-color: ghostwhite;">
						<div class="row">
							<div class="col-sm-6"  style="border-right: 1px dashed #bbb; border-radius: 5px;">
								<?php 
				                       $adultss= $_REQUEST['adults']; ?>
								<label>Adult(s) : <span class="badge"><?php echo $adultss ?></span></label>
									
							</div>
							<div class="col-sm-6">
								<?php if (isset($_REQUEST['childs'])) {
			            				$childss= $_REQUEST['childs'];
			            			} else {
			            				$childss= "0";
			            			} ?>
								<label>Child(s) : <span class="badge"><?php echo $childss ?></span></label>
							</div>
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
				<?php if (isset($_REQUEST['mulltiServiceDate'])) { ?>
				<h4 class="opensans dark bold">Tour details</h4>     
				<div class="row payment-table-wrap">
					<div class="col-md-8">
						<table class="table-bordered">
							<thead>
		    					<tr>
		    						<th>Services</th>
		    						<th>Date</th>
		        					<th style="width:100px;">schedule</th>
		    					</tr>
	    					</thead>
	    					<tbody>
	    						<?php foreach ($_REQUEST['mulltiServiceDate'] as $key => $value) { ?>
			    					<tr>
		    							<td><?php echo $_REQUEST['mulltiService'][$key] ?></td>
			        					<td><?php echo date('d/m/Y' ,strtotime($value)) ?></td>
			        					<td><?php echo $_REQUEST['mulltiServiceFromTime'][$key] ?> - <?php echo $_REQUEST['mulltiServiceToTime'][$key] ?></td>
			    					</tr>	
	    						<?php } ?>
	    					</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
           			<h4 class="opensans dark bold">Booking Amount Breakup</h4>
	            	<div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			
	            			<table class="table-bordered" >
	            				<thead>
	            					<tr>
	            						<th style="width: 85px;">Date of Tour</th>
		            					<th style="width: 150px;">Tour</th>
		            					<th style="width: 100px; text-align: right">Rate</th>
	            					</tr>
	            				</thead>
	            				<tbody>
	            					<tr>
		            					<td><?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) ?></td>
		            					<td style="text-align: center"><?php echo $tourdetails[0]->type ?></td>
		            					<td style="text-align: right"><?php 
		            						echo currency_type(agent_currency(),$total_amount) ?> <?php echo agent_currency() ?></small>
		            						<br>
	            					</tr>
	            				</tbody>
	            				<tfoot>
	            					<tr>
	            						<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
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
        $("#payment_form").attr("action",base_url+"tour/tourbookingconfirm");
        $("#payment_form").submit();
    });
</script>
<?php init_front_black_tail(); ?> 

	
