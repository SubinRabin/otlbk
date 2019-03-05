<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>Payment/agent_booking">back</a>
	</div>
</div>
<div class="clearfix"></div>
</br>
</br>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Hotel Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-4">
					<img width="300" src="<?php echo base_url(); ?>uploads/rooms/<?php echo $view[0]->room_id ?>/<?php echo $view[0]->images ?>" class="left" alt="">
				</div>
				<div class="col-md-8">
					<div class="col-md-6">
						<p><span class="opensans size17 bold"><?php echo $view[0]->hotel_name ?></span></p>
						<p><img src="<?php echo base_url(); ?>skin/images/bigrating-<?php echo $view[0]->rating ?>.png" alt=""></p>
						<div class="row">
							<div class="col-md-12">
								<h4>Address</h4>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<?php echo $view[0]->sale_address ?>
									</br>
									<?php echo $view[0]->revenu_address ?>
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
									<?php echo $view[0]->location ?>
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
		</div>
	</div>
	<div class="col-md-12 sleft_bor">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Booking Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
					<span>Booking Id : <?php echo $view[0]->booking_id ?></span><br>
					<span>Room type : <?php echo $view[0]->room_name." ".$view[0]->Room_Type ?></span><br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->booking_date)) ?></span>
					<?php if ($view[0]->boardName!="") { ?>
						<br><span>Board : <?php echo $view[0]->boardName; ?></span>
					<?php } ?>
				</div>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<div class="padding20 margtop25" style="background-color: ghostwhite;">
					<div class="row">
						<div class="col-sm-6"  style="border-right: 1px dashed #bbb">
							<label>Adult(s) Details <span class="badge"><?php echo $view[0]->adults_count ?></span></label>
								
						</div>
						<div class="col-sm-6">
							<label>Children(s) Details <span class="badge"><?php echo $view[0]->childs_count ?></span></label>
						</div>
					</div>
				</div><br>
				<div class="col-mds-12">
				<h4>Contact Details</h4> 
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Rooms</td>
								<td>Name</td>
								<td>Email</td>
								<td>Contact number</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							for ($w=1; $w <=$view[0]->book_room_count; $w++) { 
							$RoomFname = "Room".$w."-FName";
							$RoomLname = "Room".$w."-LName";

							 ?>
							<tr>
								<td>Room <?php echo $w ?></td>
								<?php if ($w==1) { ?>
									<td><?php echo $view[0]->bk_contact_fname." ".$view[0]->bk_contact_lname; ?></td>
									<td><?php echo $view[0]->bk_contact_email ?></td>
									<td><?php echo $view[0]->bk_contact_number ?></td>
								<?php } else { ?>
									<td><?php echo $view[0]->$RoomFname; ?> <?php echo isset($view[0]->$RoomLname) ? $view[0]->$RoomLname : '' ?></td>
									<td></td>
									<td></td>
								<?php } ?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>Day Details</h4> 
				<p>Total Days : <?php echo $view[0]->no_of_days ?></p>
				<p>No of rooms : <?php echo $view[0]->book_room_count ?></p>
				<span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view[0]->check_in);
				 echo date_format($check_in,'d-M-Y') ?></span>&nbsp
				<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view[0]->check_out);
				echo date_format($check_out,'d-M-Y') ?></span>
			</div>
			</br>
			<?php 
				$net_adult_amount = 0;
				$net_child_amount = 0;
			?>
			<?php if(count($board)!=0 && count($board)!="") { ?><!-- 
				<div class="col-md-12">
					<h4>Board Supplement</h4> 
				</div>
				<div class="col-md-12">
					
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Board</td>
								<td>Adult Amount</td>
								<td>Child amount</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($board as $key => $value) { 
								$Chamntarray_explode= explode(",", $value->childAmount);
								$Charray_sum = array_sum($Chamntarray_explode);
								
                    			$board_adult_amount = $board_child_amount = 0;
                    			$total_board_adult = $value->adultamount * $value->Breqadults;
                    			$total_board_child = $Charray_sum * $value->BreqchildCount;
								$board_adult_amount = $total_board_adult+(($total_board_adult * $value->total_markup)/100);
								$board_child_amount = $total_board_child+(($total_board_child * $value->total_markup)/100); ?>
								<tr>
									<td><?php echo $value->board ?></td>
									<td><?php echo number_format(currency_type(agent_currency(),($board_adult_amount)),2) ?></td>
									<td><?php echo number_format(currency_type(agent_currency(),($board_child_amount)),2) ?></td>
								</tr>
							<?php 
							$net_adult_amount += $board_adult_amount;
							$net_child_amount += $board_child_amount;
							} ?>
						</tbody>
						<tfoot>
							<tr>
								<td>Net Total</td>
								<td><?php echo number_format(currency_type(agent_currency(),($net_adult_amount)),2) ?></td>
								<td><?php echo number_format(currency_type(agent_currency(),($net_child_amount)),2) ?></td>
							</tr>
						</tfoot>
					</table>
				</div> -->
			<?php } ?>
			<?php 
			$net_general_adult = 0;
			$net_general_child = 0;
			?>
			<?php if(count($general)!=0 && count($general)!="") { ?><!-- 
				<div class="col-md-12">
					<h4>General Supplement</h4> 
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Type</td>
								<td>Adult Amount</td>
								<td>Child amount</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($general as $key => $value) { 
								$tot=$value->total_markup;
                    			$general_adult_amount = $general_child_amount = 0;
                    			$total_general_adult = $value->gadultamount * $value->reqadults;
                    			$total_general_child = $value->gchildamount * $value->reqChild;
								$general_adult_amount = $total_general_adult+(($total_general_adult * $value->total_markup)/100);
								$general_child_amount = $total_general_child+(($total_general_child * $value->total_markup)/100);?>
								<tr>
									<td><?php echo $value->generalType ?></td>
									<td><?php echo number_format(currency_type(agent_currency(),($general_adult_amount)),2) ?></td>
									<td><?php echo number_format(currency_type(agent_currency(),($value->gchildamount)),2) ?></td>
								</tr>
								<?php 
								$net_general_adult += $general_adult_amount;
								$net_general_child += $general_child_amount;
								} ?>
						</tbody>
						<tfoot>
							<tr>
								<td>Net Total</td>
								<td><?php echo number_format(currency_type(agent_currency(),($net_general_adult)),2) ?></td>
								<td><?php echo number_format(currency_type(agent_currency(),($net_general_child)),2) ?></td>
							</tr>
						</tfoot>
					</table>
				</div> -->
			<?php } ?>
			<?php 
			$net_Ex_amount = 0;
			?>
			<?php if(count($ExBed)!=0 && count($ExBed)!="") { ?><!-- 
				<div class="col-md-12">
					<h4>Extra Bed</h4> 
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Date</td>
								<td>Board</td>
								<td>Amount</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ExBed as $key => $value) { 
								
							?>
							<tr>
									<td><?php echo $value->date ?></td>
									<td>Extra person</td>
									<td><?php echo $amount=($value->amount*($view[0]->admin_markup+$view[0]->agent_markup))/100+$value->amount; ?></td>
								</tr>
							 <?php 
								$net_Ex_amount += $amount;
								} ?> 
						</tbody>
						<tfoot>
							 <tr>
								<td>Net Total</td>
								<td> </td>
								<td><?php echo number_format(currency_type(agent_currency(),($net_Ex_amount )),2) ?></td>
								
							</tr> 
						</tfoot>
					</table>
				</div> -->
			<?php } ?>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				// print_r($ExBed);
		        $total_markup = $view[0]->agent_markup+$view[0]->admin_markup+$view[0]->search_markup;
				$book_room_count = $view[0]->book_room_count;
				$individual_amount = explode(",", $view[0]->individual_amount);
				$checkin_date=date_create($view[0]->check_in);
				$checkout_date=date_create($view[0]->check_in);
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
            					<?php for ($j=0; $j < $tot_days ; $j++) { 
								$ExAmount[$j] = 0;
								$TExAmount[$j] = 0;
								$GAamount[$j] = 0;
								$GCamount[$j] = 0;
								$BAamount[$j] = 0;
								$BCamount[$j] = 0;
            						?>
            					<tr>
	            					<td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
	            					<td><?php echo $view[0]->room_name." ".$view[0]->Room_Type ?></td>
	            					<td style="text-align: center"><?php echo $view[0]->boardName; ?></td>
	            					<td style="text-align: right">
            							<p class="new-price">

            								<?php 
        									$roomAmount[$j] = (($individual_amount[$j]*$total_markup)/100)+$individual_amount[$j];

            								echo number_format(currency_type(agent_currency(),$roomAmount[$j]),2) ?> <?php echo agent_currency() ?></p>
	            					</td>
            					</tr>
            					<!-- Extrabed list start -->
            					<?php if (count($ExBed)!=0) {
            						foreach ($ExBed as $Exkey => $Exvalue) {
            							if ($Exvalue->date==date('Y-m-d', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
            								$exroomExplode = explode(",", $Exvalue->rooms);
            								$examountExplode = explode(",", $Exvalue->Exrwamount);
            								$exTypeExplode = explode(",", $Exvalue->Type);
            								foreach ($exroomExplode as $Exrkey => $EXRvalue) {
            									if ($EXRvalue==$i) {
            					 ?>
		            					 <tr>
		            					 	<td></td>
		            					 	<td><?php echo $exTypeExplode[$Exrkey] ?></td>
		            					 	<td class="text-center">-</td>
		            					 	<td class="text-right"><?php 
		            					 	$ExAmount[$j] = (($examountExplode[$Exrkey]*$total_markup)/100)+$examountExplode[$Exrkey];

		            					 	$TExAmount[$j] +=(($examountExplode[$Exrkey]*$total_markup)/100)+$examountExplode[$Exrkey];

		            					 	echo number_format(currency_type(agent_currency(),$ExAmount[$j]),2) ?> <?php echo agent_currency() ?></td>
		            					 </tr>

            					<?php } } } } } ?>
            					<!-- Extrabed list end -->
            					<!-- Adult and room General supplement list start -->
            					<?php if (count($general)!=0) {
            						foreach ($general as $gskey => $gsvalue) {
            					 		if ($gsvalue->gstayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
            					 			$gsadultExplode = explode(",", $gsvalue->Rwadult);
            					 			$gsadultAmountExplode = explode(",", $gsvalue->Rwadultamount);
            					 			foreach ($gsadultExplode as $gsakey => $gsavalue) {
            					 				if ($gsavalue==$i) {
            					 ?>
		            					 <tr>
		            					 	<td></td>
		            					 	<td><?php echo $gsvalue->application=="Per Room" ? $gsvalue->generalType : 'Adults '.$gsvalue->generalType ; ?></td>
		            					 	<td class="text-center">-</td>
		            					 	<td class="text-right"><?php 
		            					 		$GAamount[$j] = (($gsadultAmountExplode[$gsakey]*$total_markup)/100)+$gsadultAmountExplode[$gsakey];

		            					 	echo number_format(currency_type(agent_currency(),$GAamount[$j]),2) ?> <?php echo agent_currency() ?></td>
		            					 </tr>
            					<?php } } ?> 
            					<!-- Adult and room General supplement list end -->
            					<!-- Adult General supplement list start -->

            					<?php
            						$gschildExplode = explode(",", $gsvalue->Rwchild);
    					 			$gschildAmountExplode = explode(",", $gsvalue->RwchildAmount);
            					 foreach ($gschildExplode as $gsckey => $gscvalue) {
            					 				if ($gscvalue==$i) { ?>
    					 				<tr>
		            					 	<td></td>
		            					 	<td><?php echo 'Child '.$gsvalue->generalType ; ?></td>
		            					 	<td class="text-center">-</td>
		            					 	<td class="text-right"><?php 
		            					 		$GCamount[$j] = (($gschildAmountExplode[$gsckey]*$total_markup)/100)+$gschildAmountExplode[$gsckey];
		            					 	echo number_format(currency_type(agent_currency(),$GCamount[$j]),2) ?> <?php echo agent_currency() ?></td>
		            					 </tr>
            					<?php } } ?> 

            					<?php } } } ?>
            					<!-- Adult General supplement list end -->
            					<!-- Adults Board supplement list start -->
            					<?php foreach ($board as $bkey => $bvalue) { 
            						if ($bvalue->stayDate==date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days'))) {
            							$ABRwadultexplode = explode(",", $bvalue->Rwadult);
            							$ABRwadultamountexplode = explode(",", $bvalue->RwadultAmount);
            							foreach ($ABRwadultexplode as $ABRwkey => $ABRwvalue) {
            								if ($ABRwvalue==$i) {
            						?>
            						<tr>
            							<td></td>
            							<td>Adult <?php echo $bvalue->board; ?></td>
            							<td class="text-center">-</td>
            							<td class="text-right"><?php 
            								$BAamount[$j] = (($ABRwadultamountexplode[$ABRwkey]*$total_markup)/100)+$ABRwadultamountexplode[$ABRwkey];;

            							echo number_format(currency_type(agent_currency(),$BAamount[$j]),2) ?> <?php echo agent_currency() ?></td>
            						</tr>
            						
            					<?php } } ?>
            					<!-- Adults Board supplement list end -->
            					<!-- Child Board supplement list start -->
            					<?php 
            							$CBRwchildexplode = explode(",", $bvalue->Rwchild);
            							$CBRwchildamountexplode = explode(",", $bvalue->RwchildAmount);
            							foreach ($CBRwchildexplode as $CBRwkey => $CBRwvalue) {
            								if ($CBRwvalue==$i) {
            						?>
            						<tr>
            							<td></td>
            							<td>Child <?php echo $bvalue->board; ?></td>
            							<td class="text-center">-</td>
            							<td class="text-right"><?php 
            								$BCamount[$j] = (($CBRwchildamountexplode[$CBRwkey]*$total_markup)/100)+$CBRwchildamountexplode[$CBRwkey];;

            							echo number_format(currency_type(agent_currency(),$BCamount[$j]),2) ?> <?php echo agent_currency() ?></td>
            						</tr>
            						
            					<?php } }  ?>
            					<?php } } ?>
            					<!-- Child Board supplement list end -->
            					<?php } ?>
            				</tbody>
            				<tfoot>
            					<tr>
            						<?php $total[$i] = array_sum($roomAmount)+array_sum($TExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($BAamount)+array_sum($BCamount); ?>
            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo number_format(currency_type(agent_currency(),$total[$i]),2) ?> <?php echo agent_currency() ?></td>
            					</tr>
            				</tfoot>
            			</table>
            		</div>
            	</div>
            	<?php } ?>
			</div>
			<div class="col-md-12">
				<?php
						$start = $view[0]->check_in;
						$end = $view[0]->check_out;
						$first_date = strtotime($start);
						$second_date = strtotime($end);
				        $offset = $second_date-$first_date; 
				        $result = array();
				        for($i = 0; $i <= floor($offset/24/60/60); $i++) {
				            $result[1+$i]['date'] = date('d-m-Y', strtotime($start. ' + '.$i.'  days'));
				            $result[1+$i]['day'] = date('l', strtotime($start. ' + '.$i.' days'));
				        }
				        $explode_amount = explode(",", $view[0]->individual_amount);
				        for ($j=0; $j < $view[0]->no_of_days; $j++) { 
				        	if (isset($explode_amount[$j])) {
				        		$price[$j] = $explode_amount[$j];
				        	}
				        }
				        $set_of_amount = array_sum($price);
				        $supplement_total=$net_adult_amount+$net_child_amount+$net_general_adult+$net_general_child;
				        $final_total =$view[0]->total_amount + $supplement_total+$net_Ex_amount;
                 ?>
					<!-- <div class="col-md-6">
					    <p>Total amount</p>
				    </div>
				    <div class="col-md-6">
					    <p><?php echo agent_currency() ?> <?php echo number_format(currency_type(agent_currency(),(($set_of_amount*$total_markup)/100)+$set_of_amount),2) ?></p>
				    </div>
				    <?php if(count($general)!=0 && count($general)!="" || count($board)!=0 && count($board)!="") { ?>
				    <div class="col-md-6">
					    <p>Total supplement amount </p>
				    </div>
				    <div class="col-md-6">
					    <p><?php echo agent_currency() ?> <?php echo number_format(currency_type(agent_currency(),($supplement_total)),2) ?></p>
				    </div> <?php } ?>
				    <div class="col-md-6">
					    <p>Total Days</p>
				    </div>
				    <div class="col-md-6">
					    <p><?php echo $view[0]->no_of_days ?></p>
				    </div>
				    <div class="col-md-6">
					    <p>Total Rooms</p>
				    </div>
				    <div class="col-md-6">
					    <p><?php echo $view[0]->book_room_count ?></p>
				    </div> -->
				    <!-- <div class="col-md-6">
					    <p>Total Amount</p>
				    </div>
				    <div class="col-md-6">
					    <p><?php echo agent_currency() ?> <?php echo currency_type(agent_currency(),$view[0]->total_amount) ?></p>
				    </div> -->
			    <div class="col-md-6">
				    <p>Tax</p>
			    </div>
			    <div class="col-md-6">
				    <p><?php echo $view[0]->tax ?>%</p>
			    </div>
			 <!--    <div class="col-md-6">
				    <p>Tax Amount</p>
			    </div>
			    <div class="col-md-6">
				    <p><?php echo agent_currency() ?> <?php echo currency_type(agent_currency(),$view[0]->tax_amount) ?></p>
			    </div> -->
			    <?php 
				$array_sumTotal = (array_sum($total)*$view[0]->tax)/100+array_sum($total);

			    if ($view[0]->discount!=0) { ?>
				    <div class="col-md-6 bold">
					    <p></p>
				    </div>
				    <div class="col-md-6 bold">
					    <p><div class="slashed-price">
								<small class="old-price text-danger">
									<?php 

									echo number_format(currency_type(agent_currency(),$array_sumTotal),2) ?> <?php echo agent_currency() ?>
								</small>
							</div>
						</p>
				    </div>
			    <?php } ?>
			    <div class="col-md-6 bold">
				    <p>GRAND TOTAL</p>
			    </div>
			    <div class="col-md-6 bold">
				    <p><?php 
				    $final_total = $array_sumTotal-($array_sumTotal*$view[0]->discount)/100;

				    echo agent_currency() ?> <?php echo number_format(currency_type(agent_currency(),ceil($final_total)),2) ?></p>
			    </div>
				<!-- </div> -->
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<h4 class="bold">Important Remarks</h4>
				<div style ="whitespace:pre-wrap"><?php  echo isset($view[0]->Important_Remarks_Policies) ? $view[0]->Important_Remarks_Policies : '' ?></div>
			</div>
			<?php if(count($cancelation)!=0) {
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
					    	<?php foreach ($cancelation as $Canckey => $Cancvalue) { 
					    		if ($Cancvalue->application=="NON REFUNDABLE") {  ?>
					    		<tr>
						    		<td><?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></td>
						    		<td><?php echo date('d/m/Y',strtotime($view[0]->check_in)) ?></td>
						    		<td><?php echo $Cancvalue->cancellationPercentage ?>% (<?php echo $Cancvalue->application ?>)</td>
						    	</tr>
					    	<?php 	} else { ?>
						    	<tr>
						    		<td><?php 
						    		if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in))) < date('Y-m-d')) {
						    			echo date('d/m/Y');
						    		} else {
						    			echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->check_in)));
						    		}
						    		?></td>
						    		<td><?php echo date('d/m/Y' , strtotime('-'.$Cancvalue->daysTo.' days', strtotime($view[0]->check_in))) ?></td>
						    		<td><?php echo $Cancvalue->cancellationPercentage ?>% (<?php echo $Cancvalue->application ?>)</td>
						    	</tr>
							<?php } } ?>
				    	</tbody>
				</table>
			</div>
			<?php } ?>
			<div class="col-md-12">
				<h4 class="bold">Important Notes</h4>
				<div><?php  echo isset($view[0]->Important_Notes_Conditions) ? $view[0]->Important_Notes_Conditions : '' ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>progress : <?php if ($view[0]->booking_flag==0) { ?>
					<span class="red">Rejected</span>
				<?php } else if($view[0]->booking_flag==1) { ?><span class="green">Success</span><?php } else if($view[0]->booking_flag==2) { ?><span class="orange">Pending</span> <?php } ?></h4>
			</div>
		</div>
	</div>
</div>
<?php init_front_head_footer(); ?> 

