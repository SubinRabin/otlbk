<?php init_front_head_dashboard(); ?>
<script src="<?php echo base_url(); ?>skin/js/agentrequests.js"></script>
<div class="booking-view">
<div class="row">
	<div class="col-md-6">
		<h3>Booking view</h3>
	</div>
	<div class="col-md-6">
		</br>
		<a class="pull-right btn btn-primary" href="<?php echo  base_url(); ?>offlinerequests/agentpackage_requests">back</a>
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
				<h4 class="dark bold">Package Booking Details</h4>
			</div>
			<div class="col-md-12">
					<div class="col-md-6">
						<p><span class="opensans size17 bold"><?php echo $view[0]->tourrequired ?></span></p>
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
					<span>Booking Id : PKB<?php echo $view[0]->id ?></span><br>
					<span>Request date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></span><br>
					<span>Nationality : <?php echo NationalityGet($view[0]->nationality) ?></span>
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
			</div><br>
			<?php } ?>
				</div>
			</br>
			<div class="col-md-12">
				<h4 class="opensans dark bold">Booking Amount Breakup</h4>
				<?php 
				$SellingPrice =$view[0]->sellingprice;
				?>
				<div class="row payment-table-wrap">
            		<div class="col-md-12">
               			<table class="table-bordered" >
            				<thead>
            					<tr>
	            					<th style="width: 85px;">Tour required</th>
	            					<th style="width: 85px">Date</th>
	            					<th style="width: 120px; text-align: right">Rate</th>
            					</tr>
            				</thead>
            				<tbody>	
            					<tr>
            							<td style="text-align: left"><?php echo $view[0]->tourrequired; ?></td>
            							<td><?php echo date('d/m/Y', strtotime($view[0]->checkin)).' - '.date('d/m/Y', strtotime($view[0]->checkout)); ?></td>
            							
            							<td style="text-align: right"><?php echo isset($SellingPrice) && $SellingPrice!="" ? agent_currency()." ".currency_type(agent_currency(),$SellingPrice) : '' ?></td>
            						</tr>
        					</tbody>
    						<tfoot>
            					<tr>
            						<?php 
            							$SellingTotal = $SellingPrice;
            						?> 
            						<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo agent_currency()." ".currency_type(agent_currency(),$SellingPrice); ?></td>
            					</tr>
            				</tfoot>
						</table>
					</div>
				</div>
			
			</div>
			<div class="col-md-12">
			    <div class="col-md-12 bold" style="padding-left: 0px;">
				    <p>GRAND TOTAL : <?php echo agent_currency()." ".currency_type(agent_currency(),$SellingTotal); ?></p>
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