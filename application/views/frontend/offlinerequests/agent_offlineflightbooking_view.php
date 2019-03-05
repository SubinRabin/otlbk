<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/agentrequests.js"></script>
<div class="booking-view">
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>offlinerequests/agentflight_requests">back</a>
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
				<h4 class="dark bold">Flight Booking Details</h4>
			</div>
			<div class="col-md-12">
					<div class="col-md-12">
						<p><span class="opensans size17 bold"><?php echo $view[0]->type ?></span></p>
					</div>
			</div>
			<div class="col-md-12">
				<?php if(isset($view[0]->arrivalNo)) { ?>
				<div class="col-sm-6">
		            <div class="form-group">
		                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;"><i class="fa fa-plane" style="color: #4caf50;"></i>&nbsp;                 	Arrival Flight No : </label>
		                <div class="col-sm-6 col-md-6 col-lg-7">
		                    <label for=""><?php echo $view[0]->arrivalNo ?>    	</label>
		                </div>
		            </div>
				</div> <?php }
				 if(isset($view[0]->arrivalNo)) { ?> 
				<div class="col-sm-6">
			        <div class="form-group">
			            <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">&nbsp;                 	Arrival Flight Time : </label>
			            <div class="col-sm-6 col-md-6 col-lg-7">
			                <label for=""><?php echo $view[0]->arrivalTime ?>    	</label>
			            </div>
			         </div>
				</div>
				<?php } ?>
			</div>
			<?php if($view[0]->type=='Round trip') { 
				if(isset($view[0]->departureNo)) { ?>
			<div class="col-md-12">
				<div class="col-sm-6">
			        <div class="form-group">
			            <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;"><i class="fa fa-plane" style="color: #4caf50;"></i>&nbsp;                 	Departure Flight No : </label>
			            <div class="col-sm-6 col-md-6 col-lg-7">
			                <label for=""><?php echo $view[0]->departureNo ?>    	</label>
			            </div>
			        </div>
				</div>
				<?php }
				if(isset($view[0]->departureTime)) { ?>
				<div class="col-sm-6">
			        <div class="form-group">
			            <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">&nbsp;  	Departure Flight Time :
			            </label>
			            <div class="col-sm-6 col-md-6 col-lg-7">
			                <label for=""><?php echo $view[0]->departureTime ?>    	</label>
			            </div>
			         </div>
				</div>
			</div>
			<?php }
		} ?>
		</div>
	</div>
	<div class="col-md-12 sleft_bor">
		<div class="row">
			<div class="col-md-12">
				<h4 class="dark bold">Booking Details</h4>
			</div>
			<div class="col-md-12">
				<div class="col-md-6">
					<span>Booking Id : FGB<?php echo $view[0]->id ?></span><br>
					<span>Request date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></span>
				</div>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12">
				<div class="padding20 margtop25" style="background-color: ghostwhite;">
					<div class="row">
						<div class="col-sm-6"  style="border-right: 1px dashed #bbb">
							<label>Adult(s) Details <span class="badge"><?php echo $view[0]->adults ?></span></label>
								
						</div>
						<div class="col-sm-6">
							<label>Children(s) Details <span class="badge"><?php echo $view[0]->child ?></span></label>
						</div>
					</div>
				</div><br>
			</div>
			<?php if(isset($view[0]->specialrequest) && $view[0]->specialrequest!="") { ?>
				<div class="col-md-12 sleft_bor">
					<div class="row">
						<div class="col-md-12">
							<h4 class="dark bold">Special Request</h4>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<span><?php echo $view[0]->specialrequest ?></span><br>
								
							</div>
						</div>
					</div><br>
				<?php } ?>
			</br>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				 $SellingPrice = explode(",", $view[0]->sellingprice);
				?>
				<div class="row payment-table-wrap">
            		<div class="col-md-12">
               			<table class="table-bordered" >
            				<thead>
            					<tr>
            						<th style="width: 85px;">Type</th>
			            			<th style="width: 85px;">From</th>
			            			<th style="width: 85px;">Destination</th>
			            			<th style="width: 85px;">Date</th>
	            					<th style="width: 60px; text-align: center">Rate</th>	
            					</tr>
            				</thead>
            				<tbody>	
            					<tr>
            							<td style="text-align: left"><?php echo $view[0]->type; ?></td>
            							<td><?php echo $view[0]->from ?></td>
			            				<td><?php echo $view[0]->destination ?></td>
			            				<td><?php echo $view[0]->departdate?></td>
            							<td style="text-align: right"><?php echo isset($SellingPrice[0]) && $SellingPrice[0]!="" ? $SellingPrice[0] : '' ?></td>
            						</tr>
            						<?php if($view[0]->type=='Round trip'){ ?>
			            			<tr>
			            				<td><?php echo 'Return' ?></td>
			            				<td><?php echo $view[0]->destination; ?></td>
			            				<td><?php echo $view[0]->from; ?></td>
			            				<td><?php echo $view[0]->returndate; ?></td>
			            				<td style="text-align: right"><?php echo isset($SellingPrice[1]) && $SellingPrice[1]!="" ? $SellingPrice[1] : '' ?></td>
			            			</tr>
			            			<?php } ?>
        					</tbody>
    						<tfoot>
            					<tr>
            						<?php 
            							$SellingTotal = $SellingPrice;
            						?> 
            						<td colspan="4" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo agent_currency()." ".currency_type(agent_currency(),array_sum($SellingPrice)); ?></td>
            					</tr>
            				</tfoot>
						</table>
					</div>
				</div>
			
			</div>
			<div class="col-md-12">
			    <div class="col-md-12 bold" style="padding-left: 0px;">
				    <p>GRAND TOTAL : <?php echo agent_currency()." ".currency_type(agent_currency(),array_sum($SellingPrice)); ?></p>
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