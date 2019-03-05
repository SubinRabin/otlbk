<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="booking-view">
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>Payment/offlineRequest">back</a>
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
					<div class="col-md-6">
						<p><?php echo $view[0]->hotel_name ?></p>
						<div class="row">
							<div class="col-md-12">
								<?php echo $view[0]->hotel_addresss ?>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="col-md-12 sleft_bor">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Booking Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
					<span>Booking Id : HOB<?php echo $view[0]->id ?></span><br>
					<span>Room Name : <?php echo $view[0]->room_name ?></span><br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->createdDate)) ?></span>
					<?php if ($view[0]->board!="") { ?>
						<br><span>Board : <?php echo $view[0]->board ?></span>
					<?php } ?>
					<br><span>Nationality : <?php echo NationalityGet($view[0]->nationality) ?></span>
				</div>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<div class="padding20 margtop25" style="background-color: ghostwhite;">
					<div class="row">
						<div class="col-sm-6"  style="border-right: 1px dashed #bbb">
							<label>Adult(s) Details <span class="badge"><?php echo array_sum(explode(",", $view[0]->adults)) ?></span></label>
								
						</div>
						<div class="col-sm-6">
							<label>Children(s) Details <span class="badge"><?php echo array_sum(explode(",", $view[0]->child)) ?></span></label>
						</div>
					</div>
				</div><br>		
			
			<div class="col-md-12">
				<?php 
				$checkin_date=date_create($view[0]->check_in);
	            $checkout_date=date_create($view[0]->check_out);
	            $no_of_days=date_diff($checkin_date,$checkout_date);
	            $tot_days = $no_of_days->format("%a");
				 ?>
		 	<div class="row">
				<h4 class="dark bold">Day Details</h4> 
			</div>
				<p>Total Days : <?php echo $tot_days ?></p>
				<p>No of rooms : <?php echo $view[0]->no_of_rooms ?></p>
				<span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view[0]->check_in);
				 echo date_format($check_in,'d-M-Y') ?></span>&nbsp
				<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view[0]->check_out);
				echo date_format($check_out,'d-M-Y') ?></span>
			</div>
			</br>
			<?php if(isset($view[0]->SpecialRequest) && $view[0]->SpecialRequest!="") { ?>
				<div class="col-md-12 sleft_bor">
					<div class="row">
						<div class="col-md-12">
							<h4 class="dark bold">Special Request</h4>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<span><?php echo $view[0]->SpecialRequest ?></span><br>
							</div>
						</div>
					</div>
					</br>
			<?php } 
			if(isset($view[0]->budget) && $view[0]->budget!="") { ?>
				<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
						<h4 class="dark bold" >Budget : <?php echo $view[0]->budget ?></h4> <br>
						
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Booking Amount Breakup</h4>
				<?php 
				for ($i=1; $i <= $view[0]->no_of_rooms; $i++) { 
					$roomCost = 'room'.$i.'Cost';
					$roomSelling = 'room'.$i.'Selling';
					$roomProfit = 'room'.$i.'Profit';
					$roomMargin = 'room'.$i.'Margin';
					$CostPrice = explode(",", $view[0]->$roomCost);
					$SellingPrice = explode(",", $view[0]->$roomSelling);
					$ProfitPrice = explode(",", $view[0]->$roomProfit);
					$margin = explode(",", $view[0]->$roomMargin);
				?>

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
            						
                              ?>
            						<tr>
            							<td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
            							<td><?php echo $view[0]->room_name; ?></td>
            							<td style="text-align: center"><?php echo $view[0]->board; ?></td>

            							<td style="text-align: right"><?php echo isset($SellingPrice[$j]) && $SellingPrice[$j]!="" ? agent_currency()." ".currency_type(agent_currency(),$SellingPrice[$j]) : '' ?></td>
            						</tr>
        						<?php } ?>
    						</tbody>
    						<tfoot>
            					<tr>
            						<?php 
            							$SellingTotal[$i] = array_sum($SellingPrice);
            						?> 
            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo agent_currency()." ".currency_type(agent_currency(),array_sum($SellingPrice)); ?></td>
            					</tr>
            				</tfoot>
						</table>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="col-md-12">
			    <div class="col-md-12 bold" style="padding-left: 0px;">
				    <p>GRAND TOTAL : <?php echo agent_currency()." ".currency_type(agent_currency(),array_sum($SellingTotal)); ?></p>
			    </div>
				<!-- </div> -->
			</div>
			</div>
		</div>
		<div class="col-md-12">
			<h4>progress : <?php if ($view[0]->bookingFlg==0) { ?>
				<span class="red">Cancelled</span>
			<?php } else if($view[0]->bookingFlg==1) { ?><span class="green">Success</span><?php } else if($view[0]->bookingFlg==2) { ?><span class="orange">Pending</span> <?php } ?></h4>
		</div>
	</div>
</div>
</div>

<?php init_front_head_footer(); ?> 