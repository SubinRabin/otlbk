<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
	    <div class="col-sm-12 col-xs-12">
		    <div class="card">
		        <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;"><h3>Hotel Details</h3>
		        </div>
		        <div class="card-block"  style="padding: 15px;">
		          	<div class="row m-b-1">
				        <?php $currency="AED"; ?>
				        <div class="col-md-9 col-sm-9">
				            <div class="row">
					            <div class="col-sm-6">
		                            <div class="form-group">
		                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
		                                    <i class="fa fa-hotel" style="color: #4caf50;"></i>&nbsp;
		                                    	Hotel name :
		                                </label>
		                                <div class="col-sm-6 col-md-6 col-lg-7">
		                                	<label for=""><?php echo $view[0]->hotel_name ?>
		                                	
		                                	</label>
		                              	</div>
		                            </div>
					            </div>
					            <div class="col-sm-6">
		                            <div class="form-group">
		                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
		                                <i class="fa fa-address-book-o" style="color: #4caf50;"></i>&nbsp;
		                                    	Hotel Address :  
		                                </label>
		                                <div class="col-sm-6 col-md-6 col-lg-7">
		                                     <label for=""><?php echo $view[0]->hotel_addresss ?></label>
		                                </div>
		                            </div>
					            </div>
					            <div class="col-sm-6">
		                            <div class="form-group">
		                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
		                                    <i class="fa fa-dollar" style="color: #4caf50;"></i>&nbsp;
		                                    	Supplier name :
		                                </label>
		                                <div class="col-sm-6 col-md-6 col-lg-7">
		                                	<label for=""><?php echo $view[0]->SupplierName ?>
		                                	
		                                	</label>
		                              	</div>
		                            </div>
					            </div>
					            <div class="col-sm-6">
		                            <div class="form-group">
		                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
		                                <i class="fa fa-address-book-o" style="color: #4caf50;"></i>&nbsp;
		                                    	Supplier Address :  
		                                </label>
		                                <div class="col-sm-6 col-md-6 col-lg-7">
		                                     <label for=""><?php echo $view[0]->SupllierAddress ?></label>
		                                </div>
		                            </div>
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
					<h4 class="dark bold">Agent Name : <?php echo $view[0]->AFName.' '.$view[0]->ALName ?></h4>
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
						<?php  $hotelMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Hotels'); 
						if($hotelMenu[0]->edit!=0) { ?>	
							<a class="btn-sm btn-primary" href="<?php echo base_url() ?>backend/booking/OfflineEditModal?id=<?php echo $view[0]->id ?>">Edit</a>
							<?php if( $view[0]->bookingFlg ==2 || $view[0]->bookingFlg ==4) { 
								if ($view[0]->ContactName=="" || $view[0]->ContactEmail=="" || $view[0]->ContactNumber=="") { ?>
									<a href="#" class="btn-sm btn-success" onclick="GuestDataValidation()" class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger " onclick="GuestDataValidation()" href="#" > Cancel </a> 
							<?php } else {
							?>
							<a href="#" class="btn-sm btn-success" onclick="OffllineBookingactionfun(<?php echo $view[0]->id ?>,1)" data-toggle="modal" data-target="#booking_modal"  class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger " onclick="OffllineBookingactionfun(<?php echo $view[0]->id ?>,0)" data-toggle="modal" data-target="#booking_modal"  href="#" > Cancel </a> 
							<?php } } ?>
							<?php if( $view[0]->bookingFlg ==1 ) { 
								if ($view[0]->ContactName=="" || $view[0]->ContactEmail=="" || $view[0]->ContactNumber=="") { ?> 
									<a class="btn-sm btn-danger " onclick="GuestDataValidation()" href="#" > Cancel </a>
								<?php } else {
							?>
							<a class="btn-sm btn-danger "  onclick="OffllineBookingactionfun(<?php echo $view[0]->id ?>,0)" data-toggle="modal" data-target="#booking_modal"    href="#" > Cancel </a> 
							<?php } }
						}
						?>
						&nbsp<a class="btn-sm btn-primary" href="<?php echo  base_url(); ?>backend/booking/offlinebooking">back</a>
					</span>
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $view[0]->id ?>">
				<!-- <div class="col-md-12">-->
			<div class="row">
				<div class="col-md-6"> 
					<span>Booking Id : HOB<?php echo $view[0]->id ?></span><br>
					<span>Room Name : <?php echo $view[0]->room_name ?></span>
					<br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->createdDate)) ?></span>
					<?php
					 if ($view[0]->board!="") { ?>
						<br><span>Board : <?php echo $view[0]->board ?></span>
					<?php } ?>
					<br><span>Nationality : <?php echo NationalityGet($view[0]->nationality) ?></span>
				</div>
			</div>
			
			</br>
			<div class="row">
				<div class="col-md-6">
								<h4 class="dark bold" >Adult(s) Details - <?php echo array_sum(explode(",", $view[0]->adults)) ?> adults</h4>
				</div>
				<div class="col-md-6">
					<h4 class="dark bold"> Childs(s) Details - <?php echo array_sum(explode(",", $view[0]->child)) ?> childs</h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-9">
                        <h4 class="bold">Guest Form</h4>
                        <br>
                        <table class="table-bordered">
                          <thead style="background-color: #F2F2F2;">
                            <tr>
                              <td>Name</td>
                              <td>Email</td>
                              <td>Contact number</td>
                            </tr>
                          </thead>
                          <tr>
                          <td><?php echo $view[0]->ContactName ?></td>
                          <td>
                              <?php echo $view[0]->ContactEmail ?>
                          </td>
                          <td>
                              <?php echo $view[0]->ContactNumber ?>
                          </td>
                     	</tr>
                        </table>
                        <br>
            	</div>
            </div>
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
						<?php 
							$checkin_date=date_create($view[0]->check_in);
				            $checkout_date=date_create($view[0]->check_out);
				            $no_of_days=date_diff($checkin_date,$checkout_date);
				            $tot_days = $no_of_days->format("%a");
						?>
						<h4 class="dark bold" >Day Details</h4> 
						<br>
						<p>Total Days : <?php echo $tot_days ?></p>
						<p>No of rooms : <?php echo $view[0]->no_of_rooms ?></p>
						<span>Check In Date : </span><span class="bold"><?php $check_in=date_create($view[0]->check_in);
		 				echo date_format($check_in,'d-M-Y') ?></span>&nbsp
						<span class="left_bor">&nbsp  Check Out Date : </span><span class="bold"><?php $check_out=date_create($view[0]->check_out);
						echo date_format($check_out,'d-M-Y') ?></span>
					</div>
				</div>
			</div>
			</br><?php if(isset($view[0]->SpecialRequest) && $view[0]->SpecialRequest!="") { ?>
				<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
						<h4 class="dark bold" >Special Request</h4> <br>
						<p><?php echo $view[0]->SpecialRequest ?></p>
					</div>
				</div>
			</div><br>
			<?php } 
			if(isset($view[0]->budget) && $view[0]->budget!="") { ?>
				<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
						<h4 class="dark bold" >Budget : <?php echo $view[0]->budget ?></h4> <br>
						
					</div>
				</div>
			</div><br>
			<?php } ?>
    		<div class="">
      			<div class="card">
                <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
		                
					<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
        						<h3>Booking Amount Breakup
        						<span class="pull-right" style="font-size: 18px; text-transform: capitalize;">progress : <?php if ($view[0]->bookingFlg==0) { ?>
								<span class="text-danger">Rejected</span>
								<?php } else if($view[0]->bookingFlg==1) { ?><span class="text-success">Success</span><?php } else if($view[0]->bookingFlg==2) { ?><span class="label label-warning">Pending</span> <?php } else if($view[0]->bookingFlg==3) { ?><span class="text-danger">Cancelled</span> <?php } else if($view[0]->bookingFlg==4) { ?><span class="text-danger">Accepted Pending</span> <?php } else if($view[0]->bookingFlg==5) { ?><span class="text-danger">Cancellation Pending</span> <?php } ?></span>
								</h3>
        				</div>
        				<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
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
			            			<h4 class="room-name">Room <?php echo $i; ?> </h4><br>
			            			<table class="table-bordered" >
			            				<thead style="background-color: #F2F2F2;">
			            					<tr>
			            						<th style="width: 85px;">Date</th>
				            					<th style="width: calc(100% - 265px);">Room Type</th>
				            					<th style="width: 60px; text-align: center">Board</th>
				            					<th style="width: 60px; text-align: center">Cost Rate</th>
				            					<th style="width: 120px; text-align: right">Selling Rate</th>
				            					<th style="width: 60px; text-align: right">Profit</th>
				            					<th style="width: 60px; text-align: right">Margin</th>
			            					</tr>
			            				</thead>
			            				<tbody>
			            					<?php for ($j=0; $j < $tot_days ; $j++) { ?>
			            						<tr>
			            							<td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
			            							<td><?php echo $view[0]->room_name; ?></td>
			            							<td style="text-align: center"><?php echo $view[0]->board; ?></td>
			            							<td style="text-align: right"><?php echo isset($CostPrice[$j]) && $CostPrice[$j]!="" ? $CostPrice[$j] : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($SellingPrice[$j]) && $SellingPrice[$j]!="" ? $SellingPrice[$j] : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($ProfitPrice[$j]) && $ProfitPrice[$j]!="" ? $ProfitPrice[$j] : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($margin[$j]) && $margin[$j]!="" ? $margin[$j] : '' ?></td>
			            						</tr>
			        						<?php } ?>
            							</tbody>
            							<tfoot>
			            					<tr>
			            						<?php 
			            							$CostTotal[$i] = array_sum($CostPrice);
			            							$SellingTotal[$i] = array_sum($SellingPrice);
			            							$profitTotal[$i] = array_sum($ProfitPrice);
			            							$marginTotal = $margin;
			            							if($SellingTotal[$i]!=0 && $profitTotal[$i]!=0){
			            								$marginper = round(($profitTotal[$i]/$SellingTotal[$i]) * 100);
			            							}
			            							else{
			            								$marginper = 0;
			            							}

			            							
			            						?>
			            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo array_sum($CostPrice); ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo array_sum($SellingPrice); ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo array_sum($ProfitPrice); ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo $marginper.'%'; ?></td>

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
									    <div class="col-md-12 bold">
										    <p>COST TOTAL : <?php echo array_sum($CostTotal) ?></p>
									    </div>
									    <div class="col-md-12 bold">
										    <p>SELLING TOTAL : <?php echo array_sum($SellingTotal) ?></p>
									    </div>
									    <!-- <div class="col-md-12 bold">
										    <p>Agent Profit</p>
									    </div> -->
										<div class="col-md-12 bold">
										    <p>PROFIT TOTAL : <?php echo array_sum($profitTotal) ?></p>
									    </div>
									     <div class="col-md-12 bold">
										    <p>MARGIN TOTAL : <?php echo $marginper.'%' ?></p>
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
<div class="modal fade delete_modal" id="booking_modal" role="dialog">
</div>
<script type="text/javascript">
	function GuestDataValidation() {
		alert("Must fill the guest details.please click edit !");
	}
</script>
<?php init_tail(); ?>
