<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<?php if (count($view)==0) { ?>
		<p>No records found in this booking!</p>
<?php } else { ?>
<div class="sb2-2">
    <div class="sb2-2-3">
	    <div class="col-sm-12 col-xs-12">
		    <div class="card">
		        <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;"><h3>Hotel Details</h3>
		        </div>
		        <div class="card-block"  style="padding: 15px;">
		          	<div class="row m-b-1">
				        <div class="col-md-3 col-sm-3">
				            <div class="text-center mb-sm-0" style="background-color: #eaeaea">
                            	<img src="" width="70%"  >

				            </div>
				        </div>
				        <?php $currency="AED"; 
				        $check_in=date_create($view['CheckInDate']);
				        $now=date('m/d/Y');
         				$date1 = date_create($now);
         				$diff=date_diff($date1,$check_in);
         				$days=$diff->format("%a");
         				?>
				        <div class="col-md-9 col-sm-9">
				            <div class="row">
					            <div class="col-sm-6">
					               <form class="form-horizontal" role="form">
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                    <i class="fa fa-hotel" style="color: #4caf50;"></i>&nbsp;
			                                    	Hotel name :
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                	<label for=""><?php echo $view['HotelName'] ?>
			                                	
			                                	</label>
			                              	</div>
			                            </div>
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                <i class="fa fa-map-marker" style="color: #4caf50;"></i>&nbsp;
			                                    	Location :
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                    <label for=""><?php echo $view['City'] ?></label>
			                                </div>
			                            </div>
			                        </form>
					            </div>
					            <div class="col-sm-6">
					                <form class="form-horizontal" role="form">
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                <i class="fa fa-address-book-o" style="color: #4caf50;"></i>&nbsp;
			                                    	Address :  
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                     <label for=""><?php echo $view['AddressLine1'] ?></label>
			                                </div>
			                            </div>
			                        </form>			              		
					            </div>
				            </div>
				        </div>
		            </div>
		        </div>
		    </div>
	  	</div>

		<div class="col-md-12 sleft_bor">
			<div class="row">
				<div class="col-md-6">
					<h4 class="dark bold">Agent Name : <?php echo $view1[0]->AFName.' '.$view1[0]->ALName ?></h4>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h4 class="dark bold">Booking Details</h4>
					<br>
				</div>
				<div class="col-md-6">
						</br>
						<span class="pull-right" >
						<?php 
						$Booking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Hotel Booking'); 
            			if($Booking[0]->edit!=0) {
							if( $view1[0]->bookingFlg ==2 || $view1[0]->bookingFlg ==4) { ?>
							<a href="#" class="btn-sm btn-success  " data-toggle="modal" data-target="#reference_add_modal" onclick="add_reference_entryxml_fun(<?php echo $view1[0]->id; ?>,<?php echo $view1[0]->agent_id; ?>,<?php echo $view1[0]->Hotel_id; ?>,'<?php echo $view1[0]->Check_in; ?>');"  class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger "  data-toggle="modal" data-target="#cancelModel" onclick="xmlcancelPopup(<?php echo $view1[0]->id; ?>);"  href="#" > Cancel </a> <?php } ?>
							<?php if( $view1[0]->bookingFlg ==1 ) { ?> 
							<a class="btn-sm btn-danger " onclick="xmlcancelPopup(<?php echo $view1[0]->id; ?>);"  data-toggle="modal" data-target="#cancelModel"   href="#" > Cancel </a> <?php } ?>
							 &nbsp
							<?php if( $days >= 4 && date_format($check_in,'m/d/Y')>$now && ($view1[0]->bookingFlg != 5 || $view1[0]->bookingFlg != 3) && $view1[0]->bookingFlg!=9 && $view1[0]->PriceChange=="true") { ?> 
							<a class="btn-sm btn-info " onclick="xmlamendmentPopup(<?php echo $view1[0]->id; ?>);"  data-toggle="modal" data-target="#amendmentModel"   href="#" > Amendment </a> <?php } ?>
							<?php if( $view1[0]->bookingFlg ==5 ) { ?> 
							<a class="btn-sm btn-info " onclick="xmlcancelPopup(<?php echo $view1[0]->id; ?>,'CheckStatus');"  data-toggle="modal" data-target="#cancelModel"   href="#" > Check status </a> <?php } ?>
							<?php if ($view1[0]->bookingFlg==9) { ?>
								<a class="btn-sm btn-info " onclick="xmlamendmentCheckStatus('<?php echo $view1[0]->id; ?>');"  href="#" > Amendment CheckStatus </a>
							<?php } 
						} ?>
						 &nbsp<a class="btn-sm btn-primary" href="<?php echo  base_url(); ?>backend/booking">back</a>
					</span>
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $view1[0]->id ?>">
			<input type="hidden" name="Aid" id="Agentid" value="<?php echo $view1[0]->agent_id ?>">
		
				<!-- <div class="col-md-12">-->
			<div class="row">
				<div class="col-md-6"> 
					<span>Booking Id : <?php echo $view['@attributes']['BookingId'] ?></span><br>
					<span>Room Type : <?php echo isset($view['Roomtype']['RoomDetails'][0]['RoomName']) ? $view['Roomtype']['RoomDetails'][0]['RoomName'] : $view['Roomtype']['RoomDetails']['RoomName'] ?></span>
					<br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view['BookingDate'])) ?></span>
				</div>
			</div>
			
			</br>
			<div class="row">
				<div class="col-md-6">
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
					<h4 class="dark bold" >Adult(s) Details - <?php echo $AdultCount ?> adults</h4>
				</div>
				<div class="col-md-6">
					<h4 class="dark bold"> Childs(s) Details - <?php echo array_sum($ChildCount); ?> childs</h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9" >
			        <h4 class="dark bold" >Contact Details</h4> <br>
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
		                   foreach ($GuestInfo as $key1 => $value1) { 
		                   	 if ($value1['@attributes']['GuestInRoom']==$key+1) {
		                   	?>
		                  <tr>
		                    <td class="text-center"><?php echo $key1+1 ?></td>
		                    <td><?php echo $value1['@attributes']['GuestType'] ?></td>
		                    <td><?php echo $value1['Title'].' '.$value1['FirstName'].' '.$value1['LastName'] ?></td>
		                    <td class="text-center"><?php echo $value1['Age'] ?></td>
		                    <td class="text-center"><?php echo $value1['@attributes']['LeadGuest'] ?></td>
	                      </tr>
		                <?php } } } ?>  	
	               		</tbody>
                	</table>
					</div>

				</div>
				<?php if ($view1[0]->bookingFlg==9) { ?>
					<div class="scol-md-12">
					<div class="col-md-9" >
					<br>
			        <h4 class="dark bold" >Requested Amendments</h4> <br>
					<table class="table table-bordered guest-table ">
		                <thead class="table-dark">
		                  <tr>
		                    <th style="width: 50px" class="text-center">#</th>
		                    <th>Rooms</th>
		                    <th style="width: 150px">Adult/Children</th>
		                    <th>Existing</th>
		                    <th>Name</th>
		                    <th style="width: 90px" class="text-center">Age</th>
							<td style="width: 100px">Action</td>
		                  </tr>
		                </thead>
		                <tbody class="guesttbody">
		                <?php
		                 foreach ($amendment as $key => $value) { ?>
		                  <tr class="room-no">
		                    <td class="text-center"><?php echo $key+1 ?></td>
		                    <td style="text-transform: uppercase;"><?php echo $value->room; ?></td>
		                    <td><?php echo $value->guestType; ?></td>
		                    <td><?php echo $value->existingName; ?></td>
		                    <td><?php echo $value->title.' '.$value->firstName.' '.$value->lastName; ?></td>
		                    <td class="text-center"><?php echo $value->age; ?></td>
		                    <td><?php echo $value->action; ?></td>
		                  
	                      </tr>
		                <?php } ?>  	
	               		</tbody>
                	</table>
					</div>

				</div>
				<?php } ?>
			</div>
			<br>
			
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
								<h4 class="dark bold" >Day Details</h4> 
								<br>
								<p>Total Days : <?php echo $view1[0]->no_of_days ?></p>
								<p>No of rooms : <?php echo $view1[0]->no_of_rooms ?></p>
								<span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view['CheckInDate']);
				 				echo date_format($check_in,'d-M-Y') ?></span>&nbsp
								<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view['CheckOutDate']);
								echo date_format($check_out,'d-M-Y') ?></span>
					</div>
				</div>
			</div>
			</br>
    		<div class="">
      			<div class="card">
	                <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
		                
					<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
        						<h3>Booking Amount Breakup
    							<span class="pull-right" style="font-size: 18px; text-transform: capitalize;"> | Provider Status : <?php echo $view1[0]->ProviderStatus=="" ? 'Pending' : $view1[0]->ProviderStatus ?> </span>
        						<span class="pull-right" style="font-size: 18px; text-transform: capitalize; margin-right: 5px">progress : <?php if ($view1[0]->bookingFlg==0) { ?>
								<span class="text-danger">Rejected</span>
								<?php } else if($view1[0]->bookingFlg==1) { ?><span class="text-success">Success </span><?php } else if($view1[0]->bookingFlg==2) { ?><span class="label label-warning">Pending </span> <?php } else if($view1[0]->bookingFlg==3) { ?><span class="text-danger">Cancelled </span> <?php } else if($view1[0]->bookingFlg==4) { ?><span class="text-danger">Accepted Pending </span> <?php } else if($view1[0]->bookingFlg==5) { ?>
									<span class="text-danger">Cancellation Pending </span> 
								<?php } else if($view1[0]->bookingFlg==9) { ?>	
									<span class="text-info">Amendment stage </span> 
								<?php } ?> </span>
								</h3>
        				</div>

        				<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
							<?php 
							$adminMarkup = $view1[0]->admin_markup;
							$AgentMarkup = $view1[0]->agent_markup;
					        $total_markup = $adminMarkup+$AgentMarkup;
							$book_room_count = $view1[0]->no_of_rooms;
							$checkin_date=date_create($view['CheckInDate']);
							$checkout_date=date_create($view['CheckOutDate']);
							$no_of_days=date_diff($checkin_date,$check_out);
							$tot_days = $no_of_days->format("%a");

							for ($i=1; $i <= $book_room_count; $i++) { ?>
							<div class="row payment-table-wrap">
			            		<div class="col-md-12">
			            			<h4 class="room-name">Room <?php echo $i; ?> </h4><br>
			            			<table class="table-bordered" >
			            				<thead style="background-color: #F2F2F2;">
			            					<tr>
			            						<th style="width: 85px;">Date</th>
				            					<th style="width: calc(100% - 265px);">Room Type</th>
				            					<th style="width: 60px; text-align: center">Board</th>
				            					<th style="width: 60px; text-align: center">Cost Rate</th>
				            					<th style="width: 120px; text-align: right">Selling Rate</th>
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
            								 		echo xml_currency_change($RoomDetails['RoomRate']['@attributes']['RoomFare'],'USD',admin_currency()),admin_currency(); 
            								 		 ?>
	            								</p>
			            					</td>
			            					<td style="text-align: right">
	            								<p class="new-price">
	            									<?php  
            								 		$RoomFare = $RoomDetails['RoomRate']['@attributes']['RoomFare'];
            								 		$RoomFare = ($RoomFare*$total_markup/100)+$RoomFare;
            								 		echo xml_currency_change($RoomFare,'USD',admin_currency()),admin_currency(); 
            								 		 ?>
	            								</p>
			            					</td>
		            						</tr>
		            						<?php if (count($RoomDetails['Supplements'])!=0) { ?>
		            							<tr>
		            								<td> - </td>
		            								<td><?php echo $RoomDetails['Supplements']['Supp_info']['@attributes']['SuppName'] ?></td>
		            								<td></td>
		            								<td>incl.(<?php echo xml_currency_change($RoomDetails['Supplements']['Supp_info']['@attributes']['Price'],'USD',admin_currency()),admin_currency();  ?>)</td>
		            								<td>incl.(<?php 
		            									$SuppleFare = $RoomDetails['Supplements']['Supp_info']['@attributes']['Price'];
            								 			$SuppleFare = ($SuppleFare*$total_markup/100)+$SuppleFare;

		            									echo xml_currency_change($SuppleFare,'USD',admin_currency()),admin_currency();  ?>)</td>
		            							</tr>
			            					<?php } ?>
            							</tbody>
            							<tfoot>
			            					<tr>
			            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php  
            								 		echo xml_currency_change($RoomDetails['RoomRate']['@attributes']['RoomFare'],'USD',admin_currency()),admin_currency(); 
            								 		 ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php 
			            							 $RoomRate = $RoomDetails['RoomRate']['@attributes']['RoomFare'];
			            							 $RoomRate = ($RoomRate*$total_markup/100)+$RoomRate;
            								 		echo xml_currency_change($RoomRate,'USD',admin_currency()),admin_currency(); 
            								 		 ?></td>
			            					</tr>

            							</tfoot>
            						</table>
            						<br>
            					</div>
            				</div>
            				<?php } ?>
						</div>
				
						<div class="card-block"  style="padding: 15px;">
          					<div class="row m-b-1">
            					<div class="col-md-12">
            						<div class="col-md-12">
					
			    			<div class="col-md-6">
							    <p>Tax</p>
						    </div>
						    <div class="col-md-6">
							    <p><?php 
							     $taxamount = array_sum($tax);
							     $taxamount = ($taxamount*$total_markup/100)+$taxamount;
							    echo xml_currency_change($taxamount,'USD',admin_currency()),admin_currency(); ?></p>
						    </div>
							 
						    <div class="col-md-6 bold">
							    <p>GRAND TOTAL</p>
						    </div>

						    <div class="col-md-6 bold">
						    	<?php 
							    $totalAmount = array_sum($total);
							    $totalAmount = ($totalAmount*$total_markup/100)+$totalAmount; ?>
							    <p>
							    <?php 
						    	echo xml_currency_change($totalAmount,'USD',admin_currency()),admin_currency(); ?></p>
						    </div>
						    <div class="col-md-6 bold">
							    <p>Admin Profit</p>
						    </div>
						    <div class="col-md-6 bold">
						    	<?php
						    		$final = array_sum($total);
						    		$adminProfit= ($final*($adminMarkup))/100;
						    	 ?>
							    <p>
						    	<?php echo xml_currency_change($adminProfit,'USD',admin_currency()); echo admin_currency(); ?>
							    </p>
						    </div>
						    <div class="col-md-6 bold">
							    <p>Agent Profit</p>
						    </div>
						    <div class="col-md-6 bold">
						    	<?php
						    		$AgentProfit= ($final*($AgentMarkup))/100;
						    	 ?>
							    <p>
						    	<?php echo xml_currency_change($AgentProfit,'USD',admin_currency()),admin_currency(); ?>
							    </p>
						    </div>
							<div class="col-md-6 bold">
							    <p>COST PRICE TOTAL</p>
						    </div>
						    <div class="col-md-6 bold">
							    <p><?php echo xml_currency_change(array_sum($total),'USD',admin_currency()),admin_currency(); ?></p>
						    </div>
						</div>
            						
								</div>
							</div>
						</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (count($view['SpecialRequest'])!=0 && isset($view['SpecialRequest'])) { ?>
<div class="col-sm-12 col-xs-12">
	<div class="card">
		<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
			<h4 class="bold">Special Request</h4>
			<br>
			<p><?php echo $view[0]->SpecialRequest ?></p>
		</div>
	</div>
</div>
<?php } ?>
<?php if(isset($view['HotelCancelPolicies']['CancelPolicy']) && count($view['HotelCancelPolicies']['CancelPolicy'])!=0) { 

		$cancelation = $view['HotelCancelPolicies']['CancelPolicy'];
		$NoShowPolicy = $view['HotelCancelPolicies']['NoShowPolicy'];
		$DefaultPolicy = $view['HotelCancelPolicies']['DefaultPolicy'];
	?>
	<div class="col-sm-12 col-xs-12">
	<div class="card">
		<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
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
								if (isset($NoShowPolicy)) {
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
							<?php } } ?>
							
				    	</tbody>
				</table>
		</div>
		<br>
		<div class="card-header" style="padding: 10px;">
			<h4 class="bold">Hotel Policy Details</h4>
			<br>
			<p><?php echo $view['HotelPolicyDetails']; ?></p>
		</div>
	</div>
	</div>
<?php } ?>

<?php } ?>
<div class="modal fade delete_modal" id="reference_add_modal" role="dialog">
</div>
<div class="modal fade delete_modal" id="cancelModel" role="dialog">
</div>
<div class="modal fade delete_modal" id="amendmentModel" role="dialog">
</div>
<?php init_tail(); ?>



