<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<div class="booking-view">
<div class="row">
	<div class="col-md-6">
		<h3>Tour booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>tour/agent_booking">back</a>
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
				<h4 class="dark bold">Tour Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-4">
					<div class="pro-bg">
					<img  class="img_size_custom"   width="300" src="<?php echo base_url(); ?>uploads/tour_services_images/<?php echo $view[0]->tour_id ?>/<?php echo $view[0]->image ?>" class="left" alt="">
				</div>
				</div>
				<div class="col-md-8">
					<div class="col-md-6">
						<p><span class="opensans size17 bold"><?php echo $view[0]->type ?></span></p>
						<div class="row">
							<div class="col-md-12">
								<h4>Address</h4>
							</div>
							<div class="col-md-12">
								<div class="col-md-6">
									<?php echo $view[0]->countryName.', '.$view[0]->CityName ?>
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
									<?php echo $view[0]->countryName.', '.$view[0]->CityName ?>
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
					<span>Booking Id : <?php echo $view[0]->booking_id ?></span><br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></span>
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
							<label>Adult(s) Details <span class="badge"><?php echo $view[0]->adults_count ?></span></label>
								
						</div>
						<div class="col-sm-6">
							<label>Children(s) Details <span class="badge"><?php echo $view[0]->childs_count ?></span></label>
						</div>
					</div>
				</div><br>
				<div class="col-mds-12">
				<h4>Contact Details</h4> 
					<table class="table table-striped">
						<thead class="table-dark">
							<tr>
								<td>Name</td>
								<td>Email</td>
								<td>Contact number</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $view[0]->bk_contact_fname.' '.$view[0]->bk_contact_lname ?></td>
								<td><?php echo $view[0]->bk_contact_email ?></td>
								<td><?php echo $view[0]->bk_contact_number ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php if (count($multiservice)!=0) { ?>
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9" >
			            <h4 class="dark bold" >Services Details</h4> <br>
						<table class="table table-bordered">
							<thead class="table-dark">
								<tr>
									<td>Services</td>
									<td>Date</td>
									<td>schedule</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($multiservice as $key => $value) { ?>
								<tr>
									<td><?php echo $value->services  ?></td>
									<td><?php echo date('d/m/Y' ,strtotime($value->tourDate)) ?></td>
									<td><?php echo $value->FromTime.' - '.$value->ToTime ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<br>
		<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<h4>Day Details</h4> 
				<p>Total Days : <?php echo $view[0]->duration.' '.$view[0]->durationType ?></p>
				<span>Date of Tour : </span><span class="bold"><?php $check_in=date_create($view[0]->arrivaldate);
				 echo date_format($check_in,'d-M-Y') ?></span>&nbsp
				
			</div>
			</br>
				<?php $total_markup = $view[0]->agent_markup+$view[0]->admin_markup; ?>
			<div class="line2"></div>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<div class="row payment-table-wrap">
            		<div class="col-md-12">
            			<table class="table-bordered" >
            				<thead>
            					<tr>
            						<th style="width: 85px;">Date</th>
	            					<th style="width: calc(100% - 265px);">Tour Type</th>
	            					<th style="width: 120px; text-align: right">Rate</th>
            					</tr>
            				</thead>
            				<tbody>
            					<tr>
	            					<td><?php echo date('d/m/Y', strtotime($view[0]->arrivaldate)); ?></td>
	            					<td><?php echo $view[0]->type; ?></td>
	            					<td style="text-align: right">
            							<p class="new-price">
            								<?php 
            								$total_amount = ($view[0]->total_amount*$total_markup)/100+$view[0]->total_amount;
            								echo currency_type(agent_currency(),$total_amount); ?> <?php echo agent_currency() ?></p>
	            					</td>
            					</tr>
            				</tbody>
            				<tfoot>
            					<tr>
            						<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo currency_type(agent_currency(),$total_amount)  ?> <?php echo agent_currency() ?></td>
            					</tr>
            				</tfoot>
            			</table>
            		<div>
            	</div>
			</div>
			<div class="col-md-12">
			    <div class="col-md-6 bold">
				    <p>GRAND TOTAL</p>
			    </div>
			    <div class="col-md-6 bold">
				    <p><?php 
				    echo agent_currency() ?> <?php echo currency_type(agent_currency(),$total_amount) ?></p>
			    </div>
				<!-- </div> -->
			</div>
		</div>
		</br>
		<?php if($view[0]->SpecialRequest!="") { ?>
			<div class="col-mds-12">
				<div class="card">
					<div class="card-header text-uppercase" style="padding: 10px; border: 1px solid #ccc; ">
						<h4 class="bold" style=" border-bottom:  1px solid #ccc;">Special Request</h4>
						<br>
						<p><?php echo $view[0]->SpecialRequest ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<?php if(isset($cancellation) && count($cancellation)!=0) {
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
					    	<?php foreach ($cancellation as $Canckey => $Cancvalue) { ?>					    		
						    	   	<tr>
						    		<td><?php 
						    		if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->arrivaldate))) < $view[0]->Created_Date) {
						    			echo date('d/m/Y',strtotime($view[0]->Created_Date));
						    		} else {
						    			echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->arrivaldate)));
						    		}
						    		?></td>
						    		<td><?php if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($view[0]->arrivaldate))) < $view[0]->Created_Date) {
						    			echo date('d/m/Y',strtotime($view[0]->Created_Date));
						    		} else {
						    			echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($view[0]->arrivaldate)));
						    		} ?></td>
						    		<td><?php echo $Cancvalue->cancellationPercentage ?>%</td>
						    	</tr>
							<?php }  ?>
				    	</tbody>
				</table>
			</div>
			<?php } 
			if(isset($conditions) && count($conditions)!=0) { ?>
			<div class="col-md-12">
				<h4 class="bold">Important Notes</h4>
				<?php foreach ($conditions as $Canckey => $Cancvalue) { ?>
				<div><?php echo $Cancvalue->condition?></div>
				</div>
				<?php }
			} ?>
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
</div>
<?php init_front_head_footer(); ?> 


