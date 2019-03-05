<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/agentrequests.js"></script>
<div class="booking-view">
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>offlinerequests/agentvisa_requests">back</a>
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
				<h4 class="dark bold">Visa Booking Details</h4>
			</div>
			<div class="col-md-12">
					<div class="col-md-6">
						<p><span class="opensans size17 bold"><?php echo $view[0]->visa_type ?></span></p>
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
					<span>Booking Id : VRB<?php echo $view[0]->id ?></span><br>
					<span>Request date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></span><br>
					<span>Nationality : <?php echo NationalityGet($view[0]->nationality) ?></span>
				</div>
			</div>
		</div>
		</br>
		<?php if(isset($view[0]->special_request) && $view[0]->special_request!="") { ?>
				<div class="col-md-12 sleft_bor">
					<div class="row">
						<div class="col-md-12">
							<h4 class="dark bold">Special Request</h4>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<span><?php echo $view[0]->special_request ?></span><br>
								
							</div>
						</div>
					</div><br>
				<?php } ?>
				</br>
		<div class="row">
			
			</br>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				 $SellingPrice = $view[0]->sellingprice;
				?>
				<div class="row payment-table-wrap">
            		<div class="col-md-12">
               			<table class="table-bordered" >
            				<thead>
            					<tr>
            						<th style="width: 85px;">Type of Visa</th>
			            			<th style="width: 85px;">Fullname</th>
			            			<th style="width: 85px;">Passport Expirydate</th>
	            					<th style="width: 60px; text-align: center">Rate</th>
				            		
            					</tr>
            				</thead>
            				<tbody>	
            					<tr>
            							<td style="text-align: left"><?php echo $view[0]->visa_type; ?></td>
            							<td><?php echo $view[0]->firstname.' '.$view[0]->lastname; ?></td>
			            				<td><?php echo $view[0]->expirydate ?></td>
            							<td style="text-align: right"><?php echo isset($SellingPrice) && $SellingPrice!="" ? $SellingPrice : '' ?></td>
            						</tr>
               					</tbody>
    						<tfoot>
            					<tr>
            						<?php 
            							$SellingTotal = $SellingPrice;
            						?> 
            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo agent_currency()." ".currency_type(agent_currency(),$SellingPrice); ?></td>
            					</tr>
            				</tfoot>
						</table>
					</div>
				</div>
			
			</div>
			
			<div class="col-md-12">
			    <div class="col-md-12 bold" style="padding-left: 0px;">
				    <p>GRAND TOTAL : <?php echo agent_currency()." ".currency_type(agent_currency(),$SellingPrice); ?></p>
			    </div>
				<!-- </div> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>progress : <?php if ($view[0]->requestFlg==0) { ?>
					<span class="red">Cancelled</span>
				<?php } else if($view[0]->requestFlg==1) { ?><span class="green">Success</span><?php } else if($view[0]->requestFlg==2) { ?><span class="orange">Pending</span> <?php } ?></h4>
			</div>
		</div>
	</div>
</div>
</div>

<?php init_front_head_footer(); ?> 