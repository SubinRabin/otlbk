<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/xml_payment.js"></script>
<script type="text/javascript">
	$(".xml-default").remove();
</script>
<style type="text/css">
	.b-rates--tax {
          background-color: #eee;
          padding: 10px 10px;
          font-weight: bold;
          margin-bottom: 0;
          color: #455A64;
        }        
        .b-rates--grand {
          margin-top: 0;
          background-color: #5cb85c;
          padding: 15px 10px;
          font-size: 18px;
          color: #fff;
          font-weight: bold;
          border-radius: 0 0 6px 6px;
        }
        	.payment-radio-group {

	}
	.payment-radio__btn:checked + label::before {
	  content: "\f192";
	  color: #15C85B;
	}
	.payment-radio__btn:checked + label {
	  border: 1px solid #C3F1D5;
	  background-color: #F4FDF8;
	}
	.payment-radio__label {
	  display: block;
	  position: relative;
	  border: 1px solid #ccc;
	  min-height: 55px;
	  padding: 10px 0 10px 45px;
	  border-radius: 5px;
	  margin-top: 15px;
	  cursor: pointer;
	}
	.payment-radio__label::before {
	  content: "\f10c";
	  font: normal normal normal 14px/1 FontAwesome;
	  text-rendering: auto;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	  position: absolute;
	  left: 15px;
	  top: 50%;
	  transform: translateY(-50%);
	  font-size: 20px;
	  color: #ccc;
	}
	.payment-radio__label > span {
	  color: #4D4E4E;
	  line-height: 2.3;
	}
	.payment-radio__label > small {
	  display: block;
	  width: calc(100% - 60px);
	  color: #b3b3b3;
	  font-weight: 100;
	  letter-spacing: .5px;
	}
	.payment-radio__label > span + small {
	  line-height: 1.3;
	}
	.payment-radio__label >img {
	  position: absolute;
	  right: 0;
	  top: 50%;
	  transform: translateY(-50%);
	}
</style>
	<div class="container breadcrub">
		<ol class="track-progress" data-steps="5">
	      <li class="done">
	        <span>Search</span>
	      </li><li class="done">
	        <span>Search Hotel</span>
	        <i></i>
	      </li><li class="done">
	        <span>Pax Information</span>
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
	if (count($HotelRoom)==0) { ?>
		<style>
	    .empty-state {position: relative;padding: 3em 0}
	    .empty-state > img {
	      left: 50%;
	      position: relative;
	      transform: translateX(-50%);
	      opacity: .7;
	      width: 100%;
	      max-width: 30em;
	    }
	    .empty-state > .empty-state__message, .empty-state > .empty-state__info {text-align: center}
	    .empty-state > .empty-state__info {color: #b3b3b3}

	    </style>
		<div class="empty-state">
			<img src="<?php echo base_url(); ?>skin/images/empty-state.png" alt="No Records">
			<h4 class="empty-state__message">No results found!</h4>
			<p class="empty-state__info">This service is temporary unavailable !</p>
		</div>
	<?php } else { ?>
	<div class="container">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 paymentbox grey">
						<!-- <span class="opensans size18 dark bold">Book Hotel Details</span> <br> <br> -->
						<img src="<?php echo $HotelPicture ?>" class="left margright20" width="100%" alt=""/>
						
						
					<div class="clearfix"></div>
					<div class="hpadding20 margtop20">
						<p><span class="opensans size20 bold"><?php echo $HotelName ?></span></p>
					    <?php if ($HotelRating =='OneStar') {
							$star = '1';
						} else if($HotelRating =='TwoStar') {
							$star = '2';
						} else if($HotelRating =='ThreeStar') {
							$star = '3';
						} else if($HotelRating =='FourStar') {
							$star = '4';
						} else if($HotelRating =='FiveStar') {
							$star = '5';
						} ?>
						<p><img src="<?php echo base_url();?>skin/images/bigrating-<?php echo $star ?>.png" alt=""/></p>
				    </div>		
		            <div class="line3"></div>
		            <div class="hpadding20 margtop20">
						<span class="opensans size15 bold">Address</span><br>
						<td class="center green bold"><?php echo $HotelAdrs; ?></td> <br> <br>
						<div class="clearfix"></div>	
						<div class="wh50percent chckin_err textleft left"><br></div>
						<div class="wh50percent  textleft right"><br></div>
					</div>					    			
					<div class="line3"></div>
					
				</div><br/>
			</div>
			<!-- END OF LEFT CONTENT -->
			<!-- RIGHT CONTENT -->
			<?php
				$start = $_REQUEST['Check_in'];
				$end = $_REQUEST['Check_out'];
				$first_date = strtotime($start);
				$second_date = strtotime($end);
		        $offset = $second_date-$first_date; 
		        $result = array();
	          	$checkin_date=date_create($_REQUEST['Check_in']);
				$checkout_date=date_create($_REQUEST['Check_out']);
				$no_of_days=date_diff($checkin_date,$checkout_date);
				$tot_days = $no_of_days->format("%a");
				for($i = 0; $i <= floor($offset/24/60/60); $i++) {
			        $result[1+$i]['date'] = date('m/d/Y', strtotime($start. ' + '.$i.'  days'));
			    }
		        $viwedate1 = date("d/m/Y", strtotime(isset($_REQUEST['Check_in']) ? $_REQUEST['Check_in'] : ''));
                $viwedate2 = date("d/m/Y", strtotime(isset($_REQUEST['Check_out']) ? $_REQUEST['Check_out'] : ''));
            ?>
			<div class="col-md-8 pagecontainer2 offset-0">
				<?php if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="failed") { ?> 
	           	<div class="alert failed-msg alert-danger alert-dismissible" role="alert" style="position:fixed;width:49.35%">
				  <strong>Payment failed!</strong> Please choose other payment option.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<script>
					window.setTimeout(function() {
					    $(".failed-msg").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);
				</script>
    	    <?php } ?>
			<form method="get" name="xml_payment_form" id="xml_payment_form">
				<input type="hidden" name="RequestType" value="<?php echo $_REQUEST['RequestType'] ?>">
				<input type="hidden" name="sessionID"  value="<?php echo $_REQUEST['sessionID'] ?>">
				<input type="hidden" name="room_index" value="<?php echo $_REQUEST['room_index'] ?>">
				<?php foreach ($_REQUEST['adults'] as $key => $value) { ?>
					<input type="hidden" name="adults[]" value="<?php echo $value ?>">
				<?php } ?>
				<?php foreach ($_REQUEST['Child'] as $key => $value) { ?>
					<input type="hidden" name="Child[]" value="<?php echo $value ?>">
				<?php } ?>
				
				<input type="hidden" name="Check_in" value="<?php echo isset($_REQUEST['Check_in']) ? $_REQUEST['Check_in'] : '' ?>">
				<input type="hidden"  name="Check_out"  value="<?php echo isset($_REQUEST['Check_out']) ? $_REQUEST['Check_out'] : '' ?>" />
				<input type="hidden" name="no_of_days"  value="<?php echo $tot_days ?>">
				<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
				<input type="hidden" name="hotel_name" id="hotel_name" value="<?php echo $HotelInfo['HotelName'] ?>">
				<input type="hidden" name="no_of_rooms" id="no_of_rooms" value="<?php echo count($_REQUEST['adults']) ?>">	
				<input type="hidden" name="countryname" id="countryname" value="<?php echo $_REQUEST['countryname'] ?>">
				<input type="hidden" name="cityname" id="cityname" value="<?php echo $_REQUEST['cityname'] ?>">
				<input type="hidden" name="citycode" id="citycode" value="<?php echo $_REQUEST['citycode'] ?>">		

        		<?php if (isset($HotelRoom[0])) {
						$RoomTypeName = $HotelRoom[0]['RoomTypeName'];
						$xmlCurrency = $HotelRoom[0]['RoomRate']['@attributes']['Currency'];
					} else {
						$RoomTypeName = $HotelRoom['RoomTypeName'];
						$xmlCurrency = $HotelRoom['RoomRate']['@attributes']['Currency'];
					}
				?>
				<div class="padding30 grey">
					<span class="opensans size18 dark bold"><?php echo $RoomTypeName;  ?></span>
					<div class="clearfix"></div>
					<div class="line4"></div>
					<div class="row margtop15">
						<div class="col-sm-3">
							<span class="opensans size13"><b>Check in date</b></span>
							<input type="hidden" class="form-control wh90percent mySelectCalendar" id="datepicker3" name="Check_in" placeholder="mm/dd/yyyy" readonly value="<?php echo isset($_REQUEST['Check_in']) ? $_REQUEST['Check_in'] : '' ?>" />
							<input type="text" class="form-control wh90percent" value="<?php echo $viwedate1  ?>" readonly>
						</div>
						<?php $date = date('m/d/Y', strtotime("+1 day", strtotime(date('m/d/Y')))); ?>
						<div class="col-sm-3">
							<span class="opensans size13"><b>Check out date</b></span>
							<input type="hidden" class="form-control wh90percent mySelectCalendar" id="datepicker3" name="Check_out" readonly placeholder="mm/dd/yyyy" value="<?php echo isset($_REQUEST['Check_out']) ? $_REQUEST['Check_out'] : '' ?>" />
							<input type="text" class="form-control wh90percent" value="<?php echo $viwedate2  ?>" readonly>
						</div>
						<div class="col-sm-3 text-center">
							<span class="opensans size13"><b>Number of Days</b></span>
							<h4><?php echo $tot_days ?></h4>
						</div>
						<div class="col-sm-3 text-center">
							<span class="opensans size13"><b>Number of Rooms</b></span>
							<h4><?php echo $_REQUEST['no_of_rooms'] ?></h4>
						</div>
					</div>

					<div class="padding20 margtop25" style="background-color: ghostwhite;">
						<div class="row">
							<div class="col-sm-6"  style="border-right: 1px dashed #bbb;">
								<?php 
				                       $adultss= array_sum($_REQUEST['adults']); ?>
								<label>Adult(s) : <span class="badge"><?php echo $adultss ?></span></label>
									
							</div>
							<div class="col-sm-6">
								<?php if (isset($_REQUEST['Child'])) {
			            				$childss= array_sum($_REQUEST['Child']);
			            			} else {
			            				$childss= "0";
			            			} ?>
								<label>Child(s) : <span class="badge"><?php echo $childss ?></span></label>
							</div>
						</div>
					</div>
						<?php for ($x=0; $x < count($_REQUEST['adults']); $x++) {
							for ($i=0; $i < $_REQUEST['adults'][$x] ; $i++) { 
						 ?>
								<input type="hidden" name="Room<?php echo ($x+1)  ?>Adulttitle[]" value="<?php echo $_REQUEST['Room'.($x+1).'Adulttitle'][$i] ?>">
								<input type="hidden" name="Room<?php echo ($x+1)  ?>AdultFirstName[]" value="<?php echo $_REQUEST['Room'.($x+1).'AdultFirstName'][$i] ?>">
								<input type="hidden" name="Room<?php echo ($x+1)  ?>AdultLastName[]" value="<?php echo $_REQUEST['Room'.($x+1).'AdultLastName'][$i] ?>">
								<input type="hidden" name="Room<?php echo ($x+1)  ?>AdultAge[]" value="<?php echo $_REQUEST['Room'.($x+1).'AdultAge'][$i] ?>">

								<?php } ?>
								<?php for ($i=0; $i < $_REQUEST['Child'][$x] ; $i++) { ?>
									<input type="hidden" name="Room<?php echo ($x+1)  ?>ChildTitle[]" value="<?php echo $_REQUEST['Room'.($x+1).'ChildTitle'][$i] ?>">
									<input type="hidden" name="Room<?php echo ($x+1)  ?>ChildFirstName[]" value="<?php echo $_REQUEST['Room'.($x+1).'ChildFirstName'][$i] ?>">
									<input type="hidden" name="Room<?php echo ($x+1)  ?>ChildLastName[]" value="<?php echo $_REQUEST['Room'.($x+1).'ChildLastName'][$i] ?>">
									<input type="hidden" name="Room<?php echo ($x+1)  ?>ChildAge[]" value="<?php echo $_REQUEST['Room'.($x+1).'ChildAge'][$i] ?>">
								<?php } ?>
						<?php } ?>
						<div class="col-md-6 textleft">
							</span><input type="text" class="hide" name="email" id="email" value="<?php echo $_REQUEST['email'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="contact_num" id="contact_num" value="<?php echo $_REQUEST['contact_num'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="address1" id="address1" value="<?php echo $_REQUEST['address1'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="address2" id="address2" value="<?php echo $_REQUEST['address2'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="nationality" id="nationality" value="<?php echo $_REQUEST['nationality'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="areacode" id="areacode" value="<?php echo $_REQUEST['areacode'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="stateSelect" id="stateSelect" value="<?php echo $_REQUEST['stateSelect'] ?>">
						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="citySelect" id="citySelect" value="<?php echo $_REQUEST['citySelect'] ?>">
 						</div>
						<div class="col-md-6 textleft">
							<input type="text" class="hide" name="zipcode" id="zipcode" value="<?php echo $_REQUEST['zipcode'] ?>">
						</div>

				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				$supplAmnt = array();
            	$tax = array();
            	$Amount = array();
            	$HotelRooms = array();
            	$total_markup = $agent_markup+$admin_markup;
	            if ($revenue_markup!=0) {
	              $total_markup = $agent_markup+$revenue_markup;
	            }
            	foreach ($_REQUEST['adults'] as $RAkey => $RAvalue) { ?>
	            	<div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			<h4 class="room-name">Room <?php echo $RAkey+1 ?></h4>
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
	            						if (isset($HotelRoom[$RAkey])) {
	            							 $HotelRooms = $HotelRoom[$RAkey];
		            					} else {
		            						$HotelRooms = $HotelRoom;
		            					}

		            					if ($PriceChanged['@attributes']['PriceChanged']!='true') {
		            					$tax[$RAkey] = $HotelRooms['RoomRate']['@attributes']['RoomTax'];
		            					$Amount[$RAkey] = $HotelRooms['RoomRate']['@attributes']['RoomFare'];
	            					 ?>

	            					 <input type="hidden" name="RoomIndex[]" value="<?php echo $HotelRooms['RoomIndex'] ?>">
	            					 <input type="hidden" name="Room<?php echo $RAkey+1 ?>" value="<?php echo $HotelRooms['RoomIndex'] ?>">
            						<input type="hidden" name="RoomTypeName[]" value="<?php echo $HotelRooms['RoomTypeName'] ?>">
            						<input type="hidden" name="RoomTypeCode[]" value="<?php echo $HotelRooms['RoomTypeCode'] ?>">
            						<input type="hidden" name="RatePlanCode[]" value="<?php echo $HotelRooms['RatePlanCode'] ?>">
            						<input type="hidden" name="RoomFare[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['RoomFare'] ?>">
            						<input type="hidden" name="RoomTax[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['RoomTax'] ?>">
            						<input type="hidden" name="TotalFare[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['TotalFare'] ?>">

	            					 <?php
	            					 	}
	            					  for ($i=0; $i <$tot_days ; $i++) {
            					 		if (isset($HotelRooms['RoomRate']['DayRates']['DayRate'][$i])) {
        					 				$DayRates = $HotelRooms['RoomRate']['DayRates']['DayRate'][$i]['@attributes']['BaseFare'];
            					 		} else {
        					 				$DayRates = $HotelRooms['RoomRate']['DayRates']['DayRate']['@attributes']['BaseFare'];
            					 		}
            					 		$DayRates = ($DayRates*$total_markup)/100+$DayRates;
            					 	 ?>
	            					<tr>
		            					<td><?php echo date('d/m/Y' ,strtotime($result[$i+1]['date'])) ?></td>
		            					<td><?php echo $HotelRooms['RoomTypeName'] ?></td>
		            					<td class="text-center">BB</td>
		            					<td class="text-right"><?php echo agent_currency().' '.xml_currency_change($DayRates,$HotelRooms['RoomRate']['@attributes']['Currency'],agent_currency()); ?></td>
	            					</tr>
	            					<?php
	            					}
	            					$suppl = 0;
        							  if (isset($HotelRooms['Supplements']['Supplement'][0])) {
				                        $Supplements = $HotelRooms['Supplements']['Supplement'];
				                      } else {
				                        $Supplements[0] = $HotelRooms['Supplements']['Supplement'];
				                      }
                                    foreach ($Supplements as $key1 => $value1) {
	            					 if (isset($value1['@attributes']['SuppName'])) { 
	            						?>
	            					<tr>
	            						<?php if (isset($PriceChanged['@attributes']['PriceChanged']) && $PriceChanged['@attributes']['PriceChanged']!='true') {
	            						 ?>
	            						<input type="hidden" name="Room<?php echo $RAkey+1 ?>SuppID[]" value="<?php echo $value1['@attributes']['SuppID']; ?>">
										<input type="hidden" name="Room<?php echo $RAkey+1 ?>SuppChargeType[]" value="<?php echo  $value1['@attributes']['SuppChargeType']; ?>">
										<input type="hidden" name="Room<?php echo $RAkey+1 ?>Price[]" value="<?php echo $value1['@attributes']['Price']; ?>">
										<?php } ?>
		            					<td></td>
		            					<td><?php echo $value1['@attributes']['SuppName'] ?></td>
		            					<td class="text-center">-</td>
		            					<td class="text-right"><?php echo $value1['@attributes']['SuppChargeType']=="AtProperty" ? '<span style="color: #0074b9;" title="Exclusive">Excl.</span> ' : '<span style="color: #0074b9;" title="Inclusive">Incl.</span> '  ?> <?php 
		            					$suppl = $value1['@attributes']['Price'];
		            					$supplAmnt = ($suppl*$total_markup)/100+$suppl;
		            					// $supplAmnt[$RAkey] = $value1['@attributes']['Price'];
		            					echo $value1['@attributes']['CurrencyCode'].' '.$suppl; ?></td>
	            					</tr>
	            					<?php } } ?>

	            				</tbody>
	            				
	            			</table>
	            		</div>
	            	</div>
            	<?php }
            		if ($PriceChanged['@attributes']['PriceChanged']!='true') {
		            	$taxAmount =  (array_sum($tax)*$total_markup)/100+array_sum($tax);
		        		$TotalAmount =  (array_sum($Amount)*$total_markup)/100+array_sum($Amount);
            		}
        	    ?>
        	    <?php 
        	    if (isset($PriceChanged['HotelRooms']) && count($PriceChanged['HotelRooms'])!=0) { ?>
				<h4 class="opensans dark bold">Changed New Price</h4>
				<?php foreach ($_REQUEST['adults'] as $RAkey => $RAvalue) { ?>
        	    	<div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			<h4 class="room-name">Room <?php echo $RAkey+1 ?></h4>
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
	            						if (isset($PriceChanged['HotelRooms']['HotelRoom'][$RAkey])) {
	            							 $HotelRooms = $PriceChanged['HotelRooms']['HotelRoom'][$RAkey];
		            					} else {
		            						$HotelRooms = $PriceChanged['HotelRooms']['HotelRoom'];
		            					}
		            					$tax[$RAkey] = $PriceChanged['HotelRooms']['HotelRoom']['RoomRate']['@attributes']['RoomTax'];
		            					$Amount[$RAkey] = $PriceChanged['HotelRooms']['HotelRoom']['RoomRate']['@attributes']['RoomFare'];
	            					 ?>

	            					 <input type="hidden" name="RoomIndex[]" value="<?php echo $HotelRooms['RoomIndex'] ?>">
	            					 <input type="hidden" name="Room<?php echo $RAkey+1 ?>" value="<?php echo $HotelRooms['RoomIndex'] ?>">
            						<input type="hidden" name="RoomTypeName[]" value="<?php echo $HotelRooms['RoomTypeName'] ?>">
            						<input type="hidden" name="RoomTypeCode[]" value="<?php echo $HotelRooms['RoomTypeCode'] ?>">
            						<input type="hidden" name="RatePlanCode[]" value="<?php echo $HotelRooms['RatePlanCode'] ?>">
            						<input type="hidden" name="RoomFare[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['RoomFare'] ?>">
            						<input type="hidden" name="RoomTax[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['RoomTax'] ?>">
            						<input type="hidden" name="TotalFare[]" value="<?php echo $HotelRooms['RoomRate']['@attributes']['TotalFare'] ?>">

	            					 <?php for ($i=0; $i <$tot_days ; $i++) {
            					 		if (isset($HotelRooms['RoomRate']['DayRates']['DayRate'][$i])) {
        					 				$DayRates = $HotelRooms['RoomRate']['DayRates']['DayRate'][$i]['@attributes']['BaseFare'];
            					 		} else {
        					 				$DayRates = $HotelRooms['RoomRate']['DayRates']['DayRate']['@attributes']['BaseFare'];
            					 		}
            					 		$DayRates = ($DayRates*$total_markup)/100+$DayRates;
            					 	 ?>
	            					<tr>
		            					<td><?php echo date('d/m/Y' ,strtotime($result[$i+1]['date'])) ?></td>
		            					<td><?php echo $HotelRooms['RoomTypeName'] ?></td>
		            					<td class="text-center">BB</td>
		            					<td class="text-right"><?php echo agent_currency().' '.xml_currency_change($DayRates,$HotelRooms['RoomRate']['@attributes']['Currency'],agent_currency()); ?></td>
	            					</tr>
	            					<?php
	            					}
	            					$suppl = 0;
        							  if (isset($HotelRooms['Supplements']['Supplement'][0])) {
				                        $Supplements = $HotelRooms['Supplements']['Supplement'];
				                      } else {
				                        $Supplements[0] = $HotelRooms['Supplements']['Supplement'];
				                      }
                                    foreach ($Supplements as $key1 => $value1) {
	            					 if (isset($value1['@attributes']['SuppName'])) { 
	            						?>
	            					<tr>
	            						<input type="hidden" name="Room<?php echo $RAkey+1 ?>SuppID[]" value="<?php echo $value1['@attributes']['SuppID']; ?>">
										<input type="hidden" name="Room<?php echo $RAkey+1 ?>SuppChargeType[]" value="<?php echo  $value1['@attributes']['SuppChargeType']; ?>">
										<input type="hidden" name="Room<?php echo $RAkey+1 ?>Price[]" value="<?php echo $value1['@attributes']['Price']; ?>">
		            					<td></td>
		            					<td><?php echo $value1['@attributes']['SuppName'] ?></td>
		            					<td class="text-center">-</td>
		            					<td class="text-right"><?php echo $value1['@attributes']['SuppChargeType']=="AtProperty" ? '<span style="color: #0074b9;" title="Exclusive">Excl.</span> ' : '<span style="color: #0074b9;" title="Inclusive">Incl.</span> '  ?> <?php 
		            					$suppl = $value1['@attributes']['Price'];
		            					$supplAmnt = ($suppl*$total_markup)/100+$suppl;
		            					// $supplAmnt[$RAkey] = $value1['@attributes']['Price'];
		            					echo $value1['@attributes']['CurrencyCode'].' '.$suppl; ?></td>
	            					</tr>
	            					<?php } } ?>

	            				</tbody>
	            				
	            			</table>
	            		</div>
	            	</div>
        	    <?php } } ?>


                </div>
                <div class="col-md-12">
	            		<p>Special Request</p>
	            		<textarea name="SpecialRequest" class="form-control" placeholder="eg: I want early check-in or specify the time you will check-in"></textarea>
            	</div>
			<div class="clearfix pbottom15"></div>
			<div class="row b-rates margtop10">
	            <div class="col-sm-12">
		            <div class="col-sm-12">
		              <h5 class="b-rates--tax">Tax Amount : <span class="right"><?php echo agent_currency().' '.xml_currency_change($taxAmount,$xmlCurrency,agent_currency()); ?></span></h5>
		              <h5 class="b-rates--grand">GRAND TOTAL : 
		              	<span class="right"><?php echo agent_currency(); ?> 
		              	<span class="b-rates--grand-total"><?php
							$total_amount = xml_currency_change($TotalAmount+$taxAmount,$xmlCurrency,'AED');
						 echo xml_currency_change($TotalAmount+$taxAmount,$xmlCurrency,agent_currency()); ?></span></span></h5>
						 <input type="hidden" name="tot" value="<?php echo $total_amount ?>">
		            </div>
	            </div>
	          </div>
     		<div class="clear-fix"></div>
			<?php 
        	if(isset($cancelinfo) && count($cancelinfo)!=0) { 
        		if (isset($HotelNorms) && count($cancelinfo)!=0) {
    		?>
			<div class="col-md-12 padding30" style="float: left;">
				<span class="opensans size18 blue bold pull-left">Important Remarks & Policies</span><br><br>
				<div class="pull-left"><?php 
				echo implode("<br>", $HotelNorms['HotelNorms']['string']);  ?>
					
				</div>
			</div> 
			<div class="clear-fix"></div>
			<br>
			<?php } ?>
			<div class="alert alert-info padding30 col-md-12"  style="float: left;">
				<span class="opensans size18 blue bold">Cancellation Policy *</span><br><br>
				<div>
					<table class="table table-bordered table-hover">
						<thead>
					      <tr>
					        <th>Cancelled on or After</th>
					        <th>Cancelled on or Before</th>
					        <th>Cancellation Charge</th>
					      </tr>
					    </thead>
					    <tbody> 
					    	<?php if (isset($cancelinfo['CancelPolicies']['CancelPolicy'][0])) {
					    		$cancelList = $cancelinfo['CancelPolicies']['CancelPolicy'];
					    	    } else {
					    		$cancelList[0] = $cancelinfo['CancelPolicies']['CancelPolicy'];
					    	   } 
					    	  foreach ($cancelList as $key => $value) {
					    	?>
					    	<tr>
					    		<td><?php echo $value['@attributes']['FromDate'] ?></td>
					    		<td><?php echo $value['@attributes']['ToDate'] ?></td>
					    		<td><?php echo $value['@attributes']['CancellationCharge']; if($value['@attributes']['ChargeType']=='Percentage') { 
					    				echo '%' ; 
					    			} else { 
					    				echo ' USD'; 
					    			} ?> 
					    		</td>
					    	</tr>
					      <?php } ?>
				    	</tbody>
					</table>
					
				</div> 
				<br>
				<input type="checkbox" name="cancel_agree" id="cancel_agree" >
						<span id="check_box_cancellation_err blink_me"></span>
				 	<label class="opensans size12 blue bold" for="cancel_agree">If you agree to the cancellation policy, kindly select the checkbox and proceed.</label>
			</div>
			<?php } ?>

			<?php $check_tot = $total_amount; ?>
				<div class="clearfix"></div>
				<div class="row">
				<div class="col-md-12">
					<div class="col-md-12 pay_options">
						<h4 class="hpadding20 dark bold">Choose a Payment Option<small class="pay_error"></small></h4>
						<div class="hpadding20">
						<?php 
						$check_tot = $finalAmount;
						if ($check_tot <= $agent_credit_amount) { ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="credit" name="paymenttype" value="credit" class="hidden payment-radio__btn">
				                <label for="credit" class="payment-radio__label">
				                  <span>Credit Amount</span>
				                  <small>The amount paid will be deducted from the agent credit.</small>
				                  <img src="" alt="" height="30">
				                </label>
			              	</div>
						<?php }
						if($paypal[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="paypal" name="paymenttype" value="paypal" class="hidden payment-radio__btn">
				                <label for="paypal" class="payment-radio__label">
				                  <span>Paypal</span>
				                  <small>The amount paid will be deducted from the paypal.</small>
				                  <img src="" alt="" height="30">
				                </label>
				              </div>
						<?php } 
						if($checkout[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="checkout" name="paymenttype" value="checkout" class="hidden payment-radio__btn">
				                <label for="checkout" class="payment-radio__label">
				                  <span>2Checkout</span>
				                  <small>The amount paid will be deducted from the 2Checkout.</small>
				                  <img src="" alt="" height="30">
				                </label>
				              </div>
						<?php } 
						if($braintree[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="braintree" name="paymenttype" value="braintree" class="hidden payment-radio__btn">
				                <label for="braintree" class="payment-radio__label">
				                  <span>Braintree</span>
				                  <small>The amount paid will be deducted from the Braintree.</small>
				                  <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } 
						if($mollie[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="mollie" name="paymenttype" value="mollie" class="hidden payment-radio__btn">
				                <label for="mollie" class="payment-radio__label">
				                  <span>Mollie</span>
				                  <small>The amount paid will be deducted from the Mollie.</small>
				                  <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } 
						if($authorize_sim[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="authorize_sim" name="paymenttype" value="authorize_sim" class="hidden payment-radio__btn">
				                <label for="authorize_sim" class="payment-radio__label">
				                  <span>Authorize.net SIM</span>
				                  <small>The amount paid will be deducted from the Authorize.net SIM.</small>
				                 <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } 
						if($authorize_aim[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="authorize_aim" name="paymenttype" value="authorize_aim" class="hidden payment-radio__btn">
				                <label for="authorize_aim" class="payment-radio__label">
				                  <span>Authorize.net AIM</span>
				                  <small>The amount paid will be deducted from the Authorize.net AIM.</small>
				                  <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } 
						if($stripe[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="stripe" name="paymenttype" value="stripe" class="hidden payment-radio__btn">
				                <label for="stripe" class="payment-radio__label">
				                  <span>Stripe</span>
				                  <small>The amount paid will be deducted from the Stripe.</small>
				                  <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } 
						if($telr[0]->active=='1'){ ?>
							<div class="payment-radio-group clearfix">
				                <input type="radio" id="telr" name="paymenttype" value="telr" class="hidden payment-radio__btn">
				                <label for="telr" class="payment-radio__label">
				                  <span>Credit card/Debit card</span>
				                  <small>The amount paid will be deducted from the Credit card/Debit card.</small>
				                  <img src="" alt="" height="30">
				                </label>
			                </div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="col-sm-12 mt10">
				<?php 
				if ($availablityerr==0) {
				if ($check_tot <= $agent_credit_amount  || $paypal[0]->active=='1'|| $checkout[0]->active=='1' || $braintree[0]->active=='1' || $mollie[0]->active=='1' || $authorize_sim[0]->active=='1'|| $authorize_aim[0]->active=='1'|| $stripe[0]->active=='1' || $telr[0]->active=='1') { ?>
					<div class="form-group col-md-2 pull-right">
						<button class="bluebtn pull-right" id="Confirm_xml_book" type="button" name="Continue_book">Confirm</button>
					</div>
				<?php	} else { ?> 
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<p class="text-center text-danger">Credit amount too low.please contact admin</p>
						</div>
					</div>
				<?php } } else { ?>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<p class="text-center text-danger">This booking is temporary unavailable !</p>
						</div>
					</div>
				<?php }  ?>
		</div>	
		<div class="clear-fix"></div>
		</div>
	</div>
		<!-- END OF RIGHT CONTENT -->
	</div>
	<?php } ?>
</div>
<!-- END OF CONTENT -->
<?php init_front_black_tail(); ?> 

	



