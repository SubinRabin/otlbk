<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="booking-view">
	<div class="row">
		<div class="col-md-6">
			<h3>Booking view</h3>
		</div>
		<div class="col-md-6">
			</br>
			<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>Payment/agent_booking">back</a>
		</div>
	</div>
</div>
<div class="clearfix"></div>
</br>
</br>
<div class="my-card">
<div class="row">
	<div class="col-md-12">

		<div class="row">
			
			<div class="col-md-12">
				<h4 class="dark bold">Hotel Details</h4>
			</div>
			<div class="col-md-12">
				
				<div class="col-md-8">
					<div class="col-md-6">
						<p><span class="opensans size17 bold"><?php echo $view['HotelName'] ?></span></p>
						<p><?php if ($view['Rating']=='OneStar') {
							$star = '1';
						} else if($view['Rating']=='TwoStar') {
							$star = '2';
						} else if($view['Rating']=='ThreeStar') {
							$star = '3';
						} else if($view['Rating']=='FourStar') {
							$star = '4';
						} else if($view['Rating']=='FiveStar') {
							$star = '5';
						} ?>
						<p><img src="<?php echo base_url();?>skin/images/bigrating-<?php echo $star ?>.png" alt=""/></p>
						<div class="row">
							<div class="col-md-12">
								<h4>Address</h4>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<?php echo $view['AddressLine1'] ?>
									</br>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<h4>Location</h4>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<?php echo $view['City'] ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			</br>
			
			<div class="clearfix"></div>
			</br>
		
		</div><!-- mark -->

	</div>
	<div class="line2"></div>
	<div class="col-md-12 sleft_bor">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Booking Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
					<span>Booking Id : <?php echo $view['@attributes']['BookingId'] ?></span><br>
					<span>Room type : <?php echo isset($view['Roomtype']['RoomDetails'][0]['RoomName']) ? $view['Roomtype']['RoomDetails'][0]['RoomName'] : $view['Roomtype']['RoomDetails']['RoomName']  ?></span><br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view['BookingDate'])) ?></span>
				</div>
			</div>
		</div>
		</br>
		<div class="line2"></div>
		<div class="row">
			<div class="col-md-12">
				<div class="padding20 margtop25" style="background-color: ghostwhite;">
					<div class="row">
						<div class="col-sm-6"  style="border-right: 1px dashed #bbb">
							<?php 
								$AdultCount = 0;
								$ChildCount = array();
								if (isset($view['Roomtype']['RoomDetails'][0])) {
									foreach ($view['Roomtype']['RoomDetails'] as $key => $value) {
										$AdultCount +=$value['AdultCount'];
										$ChildCount[$key] =$value['ChildCount'];
									}
								} else {
									$AdultCount = $view['Roomtype']['RoomDetails']['AdultCount'];
									$ChildCount[0] = $view['Roomtype']['RoomDetails']['ChildCount'];
								}
							 ?>
							<label>Adult(s) Details <span class="badge"><?php echo $AdultCount ?></span></label>
								
						</div>
						<div class="col-sm-6">
							<label>Children(s) Details <span class="badge"><?php echo array_sum($ChildCount); ?> childs</span></label>
						</div>
					</div>
				</div><br>
				<div class="col-mds-12">
				<h4>Contact Details</h4>
					<table class="table table-bordered guest-table ">
		                <thead class="table-dark">
		                  <tr>
		                    <th style="width: 50px" class="text-center">#</th>
		                    <th style="width: 150px">Adult/Children</th>
		                    <th>Name</th>
		                    <th style="width: 90px" class="text-center">Age</th>
							<td style="width: 100px">Lead Guest</td>
		                  </tr>
		                </thead>
		                <tbody class="guesttbody">
		                <?php
		                if (isset($view['Roomtype']['RoomDetails'][0])) {
		                	$RoomDetails = $view['Roomtype']['RoomDetails'];
		                } else {
		                	$RoomDetails[0] = $view['Roomtype']['RoomDetails'];
		                }
		                // print_r($view['Roomtype']['RoomDetails']);exit();
		                 foreach ($RoomDetails as $key => $value) { ?>
		                  <tr class="room-no">
		                    <td class="text-center"><i class="fa fa-home"></i></td>
		                    <td colspan="5">Room <?php echo $key+1 ?></td>
		                  </tr>
		                  <?php
		                  	if (isset($value['GuestInfo']['Guest'][0])) {
		                  		$GuestInfo = $value['GuestInfo']['Guest'];
		                  	} else {
		                  		$GuestInfo[0] = $value['GuestInfo']['Guest'];
		                  	}
		                   foreach ($GuestInfo as $key1 => $value1) { ?>
		                  <tr>
		                    <td class="text-center"><?php echo $key1+1 ?></td>
		                    <td><?php echo $value1['@attributes']['GuestType'] ?></td>
		                    <td><?php echo $value1['Title'].' '.$value1['FirstName'].' '.$value1['LastName'] ?></td>
		                    <td><?php echo $value1['Age'] ?></td>
		                    <td class="text-center"><?php echo $value1['@attributes']['LeadGuest'] ?></td>
	                      </tr>
		                <?php } } ?>  	
	               		</tbody>
                	</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>Day Details</h4> 
				<p>Total Days : <?php echo $view1[0]->no_of_days ?></p>
				<p>No of rooms : <?php echo $view1[0]->no_of_rooms ?></p>
				<span>Check In Date : </span><span class="bold">
					<?php $check_in=date_create($view['CheckInDate']);
				 		echo date_format($check_in,'d-M-Y') ?></span>&nbsp
				<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view['CheckOutDate']);
							echo date_format($check_out,'d-M-Y') ?></span>
			</div>
			</br>
			<div class="line2"></div>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				// print_r($ExBed);
		        $total_markup = $view1[0]->agent_markup+$view1[0]->admin_markup;
				$book_room_count = $view1[0]->no_of_rooms;
				// $individual_amount = explode(",", $view[0]->individual_amount);
				// $individual_discount = explode(",", $view[0]->individual_discount);
				$checkin_date=date_create($view['CheckInDate']);
				$checkout_date=date_create($view['CheckOutDate']);
				$no_of_days=date_diff($checkin_date,$check_out);
				$tot_days = $no_of_days->format("%a");

				for ($i=1; $i <= $book_room_count; $i++) { ?>
				<div class="row payment-table-wrap">
            		<div class="col-md-12">
            			<h4 class="room-name">Room <?php echo $i; ?></h4>
            			<table class="table-bordered" >
            				<thead>
            					<tr>
            						<th style="width: 85px;">Date</th>
	            					<th style="width: calc(100% - 265px);">Room Type</th>
	            					<th style="width: 60px; text-align: center">Board</th>
	            					<th style="width: 120px; text-align: right">Rate</th>
            					</tr>
            				</thead>
            				<tbody>
            					<?php 
			            			if (isset($view['Roomtype']['RoomDetails'][$i-1])) {
			            				$RoomDetails = $view['Roomtype']['RoomDetails'][$i-1] ;
			            			} else {
			            				$RoomDetails = $view['Roomtype']['RoomDetails'];
			            			}
            						$amount[$i] = $RoomDetails['RoomRate']['@attributes']['RoomFare'];
            						$total[$i] = $RoomDetails['RoomRate']['@attributes']['TotalFare'];
            						$tax[$i] = $RoomDetails['RoomRate']['@attributes']['RoomTax'];
            					?>
            					<tr>
	            					<td><?php echo date('d/m/Y',strtotime($view['CheckInDate'])) .' to '.date('d/m/Y',strtotime($view['CheckOutDate'])) ?></td>
	            					<td><?php echo $RoomDetails['RoomName'] ?></td>
	            					<td style="text-align: center"></td>
	            					<td style="text-align: right">
            							<p class="new-price">
<?php  
            								 		$RoomFare = $RoomDetails['RoomRate']['@attributes']['RoomFare'];
            								 		$RoomFare = ($RoomFare*$total_markup/100)+$RoomFare;
            								 		echo xml_currency_change($RoomFare,'USD',agent_currency()),agent_currency(); 
            								 		 ?>
            								</p>
	            					</td>
            					</tr>
            					
            					
            				
            				</tbody>
            				<tfoot>
            					<tr>
            						<?php 
            						$RoomRate = $RoomDetails['RoomRate']['@attributes']['RoomFare'];
			            							 $RoomRate = ($RoomRate*$total_markup/100)+$RoomRate;
            								 		?>
            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo xml_currency_change($RoomRate,'USD',agent_currency()),agent_currency(); ?></td>
            					</tr>
            				</tfoot>
            			</table>
            		<div>
            	</div>
            		<?php } ?>
            	
			</div>
			<div class="col-md-12">
			    <div class="col-md-6">
				    <p>Tax</p>
			    </div>
			    <div class="col-md-6">
				    <p><?php 
							     $taxamount = array_sum($tax);
							     $taxamount = ($taxamount*$total_markup/100)+$taxamount;
							    echo xml_currency_change($taxamount,'USD',agent_currency()),agent_currency(); ?>
			    </div>
			    
			    <div class="col-md-6 bold">
				    <p>GRAND TOTAL</p>
			    </div>
			    <div class="col-md-6 bold">
				    <p><?php 
							    $totalAmount = array_sum($total);
							    $totalAmount = ($totalAmount*$total_markup/100)+$totalAmount; ?>
							    <p>
							    <?php 
						    	echo xml_currency_change($totalAmount,'USD',agent_currency()),agent_currency(); ?>
				    <!-- $final_total = $array_sumTotal;

				    echo agent_currency() ?> <?php echo currency_type(agent_currency(),ceil($final_total)) ?> --></p>
			    </div>
				<!-- </div> -->
			</div>
		</div>
		</br>
		<?php if(count($view['SpecialRequest'])!=0 && isset($view['SpecialRequest'])) { ?>
			<div class="col-mds-12">
				<div class="card">
					<div class="card-header text-uppercase" style="padding: 10px; border: 1px solid #ccc; ">
						<h4 class="bold" style=" border-bottom:  1px solid #ccc;">Special Request</h4>
						<br>
						<p><?php echo $view[0]->SpecialRequest  ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="row">
			<div class="col-md-12">
				<h4 class="bold">Important Remarks</h4>
				<div style ="whitespace:pre-wrap"><?php  echo isset($view['HotelCancelPolicies']['DefaultPolicy']) ? $view['HotelCancelPolicies']['DefaultPolicy'] : '' ?></div>
			</div>
			<?php if(isset($view['HotelCancelPolicies']['CancelPolicy']) && count($view['HotelCancelPolicies']['CancelPolicy'])!=0) {  
				$cancelation = $view['HotelCancelPolicies']['CancelPolicy'];
				$NoShowPolicy = $view['HotelCancelPolicies']['NoShowPolicy'];	
			?>

			<div class="col-md-12">
				<h4 class="bold">Cancelation Policy</h4>
				<table class="table table-bordered table-hover">
						<thead>
					      <tr style="background-color: #0074b9;color: white">
					        <th>Cancelled on or After</th>
					        <th>Cancelled on or Before</th>
					        <th>Cancellation Charge</th>
					      </tr>
					    </thead>
					    <tbody> 
					    	<?php 
					    	if (isset($cancelation[0])) {
						    	foreach ($cancelation as $Canckey => $Cancvalue) { 
						    		if($Cancvalue['@attributes']['ChargeType'] == 'Fixed'){ 
				                      $cancelcharge = xml_currency_change($Cancvalue['@attributes']['CancellationCharge'],'USD',agent_currency()).' '.agent_currency();
				                    } else {
				                        $cancelcharge = $Cancvalue['@attributes']['CancellationCharge'].'%' ;
				                    } ?>
					    		<tr>
							    		<td><?php 
							    			echo date('d/m/Y' , strtotime($Cancvalue['@attributes']['FromDate']));
							    		?></td>
							    		<td><?php 
							    			echo date('d/m/Y' , strtotime($Cancvalue['@attributes']['ToDate']));
							    			?>
						    			</td>
							    		<td><?php echo $cancelcharge  ?> </td>
							    	</tr>
							<?php } 
							} else { 
								if($cancelation['@attributes']['ChargeType'] == 'Fixed'){ 
			                      $cancelcharge = xml_currency_change($cancelation['@attributes']['CancellationCharge'],'USD',agent_currency()).' '.agent_currency();
			                    } else {
			                        $cancelcharge = $cancelation['@attributes']['CancellationCharge'].'%' ;
			                    } ?>
								<tr>
						    		<td><?php 
						    			echo date('d/m/Y' , strtotime($cancelation['@attributes']['FromDate']));
						    		?></td>
						    		<td><?php 
						    			echo date('d/m/Y' , strtotime($cancelation['@attributes']['ToDate']));
						    			?>
					    			</td>
						    		<td><?php echo $cancelcharge ?> </td>
						    	</tr>
							<?php } ?>
							<?php 
							if (isset($NoShowPolicy[0])) {
								foreach ($NoShowPolicy as $Canckey => $Cancvalue) { 
									if($Cancvalue['@attributes']['ChargeType'] == 'Fixed'){ 
				                    	$cancelcharge = xml_currency_change($Cancvalue['@attributes']['CancellationCharge'],'USD',agent_currency()).' '.agent_currency();
				                    } else {
				                        $cancelcharge = $Cancvalue['@attributes']['CancellationCharge'].'%' ;
				                    } ?>
						    		
							    	<tr>
							    		<td><?php 
							    			echo date('d/m/Y' , strtotime($Cancvalue['@attributes']['FromDate']));
							    		?></td>
							    		<td><?php 
							    			echo date('d/m/Y' , strtotime($Cancvalue['@attributes']['ToDate']));
							    			?>
						    			</td>
							    		<td><?php echo $cancelcharge ?> </td>
							    	</tr>
							<?php }
							} else { 
								if($NoShowPolicy['@attributes']['ChargeType'] == 'Fixed'){ 
                      				$cancelcharge = xml_currency_change($NoShowPolicy['@attributes']['CancellationCharge'],'USD',agent_currency()).' '.agent_currency();
                    			} else {
                       				 $cancelcharge = $NoShowPolicy['@attributes']['CancellationCharge'].'%' ;
                    			} ?>
								<tr>
						    		<td><?php 
						    			echo date('d/m/Y' , strtotime($NoShowPolicy['@attributes']['FromDate']));
						    		?></td>
						    		<td><?php 
						    			echo date('d/m/Y' , strtotime($NoShowPolicy['@attributes']['ToDate']));
						    			?>
					    			</td>
						    		<td><?php echo $cancelcharge ?> </td>
						    	</tr>
							<?php } ?>
							
				    	</tbody>
				</table>
			</div>
			<?php } ?>
			<div class="col-md-12">
				<h4 class="bold">Important Notes</h4>
				<div><?php  echo isset($view['HotelPolicyDetails']) ? $view['HotelPolicyDetails'] : '' ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

				<h4>progress : <?php if ($view1[0]->bookingFlg==0) { ?>
					<span class="red">Rejected</span>
				<?php } else if($view1[0]->bookingFlg==1) { ?><span class="green">Success</span><?php } else if($view1[0]->bookingFlg==2) { ?><span class="orange">Pending</span> <?php } ?></h4>
			</div>
		</div>
	</div>
</div>
</div>
<?php init_front_head_footer(); ?> 


