<?php init_hotel_login_header(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<span ><a class="pull-right btn btn-primary mar-left-5" href="<?php echo  base_url(); ?>Dashboard/hotel_room_booking_details">back</a>
		<?php if( $view[0]->booking_flag ==2 || $view[0]->booking_flag ==8) { ?>
		<!-- <a class="pull-right btn btn-danger mar-left-5"  data-toggle="modal" data-target="#myModal" onclick="deletefun('.$r->bk_id.');"  href="#" > Reject </a> -->
		<a href="#" class="pull-right btn btn-success mar-left-5" data-toggle="modal" data-target="#booking_modal" onclick="hotelactionfun('.$r->id.',1,'.$r->hotel_id.','.$r->agent_id.');" class="sb2-2-1-edit delete">Accept</a> <?php } ?>
	</div>
</div>
<div class="clearfix"></div>
</br>
</br>
<?php $currency_type="AED"; ?>
	<input type="hidden" name="id" id="id" value="<?php echo $view[0]->bkid ?>">
	<input type="hidden" name="Hid" id="Hotelid" value="<?php echo $view[0]->hotel_id ?>">
	<input type="hidden" name="Aid" id="Agentid" value="<?php echo $view[0]->agent_id ?>">

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
				</div><br
				<div class="col-mds-12">
				<h4>Contact Details</h4> 
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Rooms</td>
								<td>Name</td>
								
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
									
								<?php } else { ?>
									<td><?php echo $view[0]->$RoomFname; ?> <?php echo isset($view[0]->$RoomLname) ? $view[0]->$RoomLname : '' ?></td>
									
								<?php } ?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</br>
	<div class="col-md-12 sleft_bor">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Day Details</h4>
				<p>Total Nights : <?php echo $view[0]->no_of_days ?></p>
				<span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view[0]->check_in);
				 echo date_format($check_in,'d-M-Y') ?></span>&nbsp
				<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view[0]->check_out);
				echo date_format($check_out,'d-M-Y') ?></span>
			</div>
				</br>
		</div>
		</div>
	
		<div class="col-md-12">
				<h4 class="dark bold">Booking Amount Breakup</h4>
		</div>
		<div class="scol-md-12">
			<div class="col-md-12">
				<!-- <h4 class="opensans dark bold">Booking Amount Breakup</h4> -->
					<?php 
					// print_r($board);
			        $total_markup 	 = $view[0]->agent_markup+$view[0]->admin_markup+$view[0]->search_markup;
					$book_room_count = $view[0]->book_room_count;
					$individual_amount = explode(",", $view[0]->individual_amount);
					$individual_discount = explode(",", $view[0]->individual_discount);
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
									$GAamount[$j] = 0;
									$GCamount[$j] = 0;
									$BAamount[$j] = 0;
									$BCamount[$j] = 0;
									$TBAamount[$j] = 0;
									$TBCamount[$j] = 0;
            					?>
            					<tr>
	            					<td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
	            					<td><?php echo $view[0]->room_name." ".$view[0]->Room_Type ?></td>
	            					<td style="text-align: center"><?php echo $view[0]->boardName; ?></td>
	            					<td style="text-align: right">
            							<p class="new-price">

            								<?php 
            								if (!isset($individual_discount[$j])!=0) {
            									$individual_discount[$j] = 0;
            								}
        									$roomAmount[$j] = $individual_amount[$j];

        									$DisroomAmount[$j] = $roomAmount[$j]-($roomAmount[$j]*$individual_discount[$j])/100;

            								if ($individual_discount[$j]!=0) { ?>
		            						<small class="old-price text-danger"><?php 
		            						echo currency_type($currency_type,$roomAmount[$j]) ?> <?php echo $currency_type ?></small>
		            						<br>
		            						<?php }

            								echo number_format(($DisroomAmount[$j]),2),$currency_type ?></p>
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
		            					 	$ExAmount[$j]+= $examountExplode[$Exrkey];
		            					 	echo number_format(($examountExplode[$Exrkey]),2),$currency_type
		            					 	?> </td>
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
		            					 		$GAamount[$j]=$gsadultAmountExplode[$gsakey];
		            					 		echo number_format(($GAamount[$j]),2),$currency_type
		            					 	 ?> </td>
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
		            					 		$GCamount[$j]=$gschildAmountExplode[$gsckey];
		            					 		echo number_format(($GCamount[$j]),2),$currency_type
		            					 	 ?> </td>
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
            								$BAamount[$j] = $ABRwadultamountexplode[$ABRwkey];
            								$TBAamount[$j] += $BAamount[$j];

            								echo number_format(($BAamount[$j]),2),$currency_type;
            							 ?></td>
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
            								$BCamount[$j] = $CBRwchildamountexplode[$CBRwkey];;
            								$TBCamount[$j] += $BCamount[$j];
            								
            								
            								echo number_format(($TBCamount[$j]),2),$currency_type
            							 ?></td>
            						</tr>
            						
            					<?php } }  ?>
            					<?php } } ?>
            					<!-- Child Board supplement list end -->
            					<?php } ?>
            				</tbody>
            				<tfoot>
            					<tr>
            						<?php 

            						$total[$i] = array_sum($DisroomAmount)+array_sum($ExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount); 

            						
            						$totalNotMar[$i] = array_sum($roomAmount)+array_sum($ExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount); 

            						
            						?>
            						<?php  ?>
            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php 
            						echo number_format(($total[$i]),2),$currency_type  ?> </td>
            					</tr>
            				</tfoot>
            			</table>
            		</div>
            	</div>
            	<?php } ?>
			</div>
		</div>
		<div class="col-md-12">
			    <?php 
				$array_sumTotal 	= (array_sum($total)*$view[0]->tax)/100 + array_sum($total);
				$wioarray_sumTotal 	= (array_sum($totalNotMar)*$view[0]->tax)/100 + array_sum($totalNotMar);
				$array_sumTotalNM	= (array_sum($totalNotMar));

			    if (array_sum($individual_discount)!=0) { ?>
				    <div class="col-md-6 bold">
					    <p></p>
				    </div>
				    <div class="col-md-6 bold">
					    <p><div class="slashed-price">
								<small class="old-price text-danger">
									<?php 
									echo number_format(($wioarray_sumTotal),2),$currency_type
									 ?> 
								</small>
							</div>
						</p>
				    </div>
			    <?php } ?>
			    <div class="col-md-6 bold" style="padding-left: 0;">
				    <p>GRAND TOTAL</p>
			    </div>
			    <div class="col-md-6 bold" style="padding-left: 0;">
				    <p><?php 
				    $final_total = $array_sumTotal;
				    echo number_format(ceil($final_total),2),$currency_type
				     ?> 
				    </p>
			    </div>
			    
		

		
		</br>
		<br>
		<!-- <div class="row">
			<?php if(count($cancelation)!=0) { ?>
			<div class="col-md-12">
				<h4 class="bold">Cancelation Policy</h4>
				<?php foreach ($cancelation as $cpkey => $cpvalue) {
					echo $cpvalue->msg;
					echo "<br>";
				} ?>
			</div>
			<?php } ?>
		</div> -->
	<!-- 	<div class="row">
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
		</div> -->
		<?php if ($view[0]->SpecialRequest!="") { ?>
		<div clas="row">
			<div class="col-md-12" >
				<div class="card">
					<div class="card-header text-uppercase" style="padding: 5px; border: 1px solid #ccc; ">
						<h4 class="bold" style=" border-bottom: 1px solid #ccc;">Special Request</h4>
						<br>
						<p><?php echo $view[0]->SpecialRequest ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">progress : <?php if ($view[0]->booking_flag==0) { ?>
					<span class="red">Rejected</span>
				<?php } else if($view[0]->booking_flag==1) { ?><span class="green">Success</span><?php } else if($view[0]->booking_flag==2) { ?><span class="orange">Pending</span> <?php } else if($view[0]->booking_flag==4) { ?><span class="orange">Accept Pending</span> <?php }  else if($view[0]->booking_flag==5) { ?><span class="orange">Cancellation Pending</span> <?php }  else if($view[0]->booking_flag==3) { ?><span class="orange">Cancelled</span> <?php } ?></h4>
			</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="height: 100px;">
                    <p>Do you want cancel this booking?</p>
                    <input type="hidden" name="id" id="idz" value="<?php echo $view[0]->bkid ?>">
                    <input type="hidden" name="hotel_id" id="hotelz_id" value="<?php echo $view[0]->hotel_id ?>">
                    <input type="hidden" name="agent_id" id="agentz_id" value="<?php echo $view[0]->agent_id ?>">
                    <button type="button" id="reject_button" class="ml10 btn btn-danger pull-right">Yes</button>
                    <button type="button" data-dismiss="modal" id="reject_button" class="close_but btn btn-primary ml10 pull-right">No</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="height: 200px;">
      	            <form   action="" id="invoice_form" name="invoice_form" method="post">
                        <div class="col-md-12 form-group">
                        	<p>Do you want Accept this booking?</p>
                        </div>
      	                <div class="col-md-6 form-group">
                          		<input type="hidden" class="form-control" id="booking_invoice_id" name="booking_invoice_id" placeholder="Invoice ID" readonly>
                              <input type="hidden" name="id" id="booking_id" value="<?php echo $view[0]->bkid ?>">
                          	  <input type="hidden" name="hotel_id" id="hotels_id" value="<?php echo $view[0]->hotel_id ?>">
                              <input type="hidden" name="agent_id" id="agents_id" value="<?php echo $view[0]->agent_id ?>">
                          		<input type="hidden" name="invoice_ck" id="invoice_ck" value="0">
                          		<span class="text-danger invoice_err"></span>
      	                </div>
      	                <div class="col-md-6 form-group">
                          		<input type="hidden" class="form-control" id="booking_invoice_date" name="booking_invoice_date" placeholder="Invoice date" readonly >
                          		<span class="text-danger invoice_date_err"></span>
      	                </div> 
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation" name="booking_confirmation" placeholder="Confirmation number">
                        </div>
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation_name" name="booking_confirmation_name" placeholder="Confirmation name">
                        </div>
                        <div class="col-md-12 form-group">
                    	        <button type="button" id="accept_button"  class="ml10 btn btn-danger pull-right">Yes</button>
                    	        <button type="button" data-dismiss="modal" id="accept_no_button" class="close_but btn btn-primary ml10 pull-right">No</button>
                        </div>
    	              </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade col-md-6 col-md-offset-3" id="booking_success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <!-- Modal content-->
          </div>
    </div>

<?php init_hotel_login_footer(); ?>

