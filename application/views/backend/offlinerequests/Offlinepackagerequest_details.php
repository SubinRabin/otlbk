<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
	   
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
						<span class="pull-right">
						<?php $packageMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Package'); 
          				if($packageMenu[0]->edit!=0) { ?>
							<a class="btn-sm btn-primary" href="<?php echo base_url() ?>backend/offlinerequest/OfflineEditPackageRequestModal?id=<?php echo $view[0]->id ?>">Edit</a>
							<?php if( $view[0]->requestFlg ==2 || $view[0]->requestFlg ==4) { 
								if ($view[0]->ContactName=="" || $view[0]->contactemail=="" || $view[0]->contactnum=="") { ?>
								<a href="#" class="btn-sm btn-success" onclick="GuestDataValidation()" class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger " onclick="GuestDataValidation()" href="#" > Cancel </a> 
							<?php } else { ?>
								<a href="#" class="btn-sm btn-success" onclick="OffllinePackageRequestactionfun(<?php echo $view[0]->id ?>,1)" data-toggle="modal" data-target="#booking_modal"  class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger " onclick="OffllinePackageRequestactionfun(<?php echo $view[0]->id ?>,0)" data-toggle="modal" data-target="#booking_modal"  href="#" > Cancel </a> <?php } } ?>
							<?php if( $view[0]->requestFlg ==1 ) { 
								if ($view[0]->ContactName=="" || $view[0]->contactemail=="" || $view[0]->contactnum=="") { ?> 
								<a class="btn-sm btn-danger " onclick="GuestDataValidation()" href="#" > Cancel </a> 
							<?php } else { ?>
								<a class="btn-sm btn-danger "  onclick="OffllinePackageRequestactionfun(<?php echo $view[0]->id ?>,0)" data-toggle="modal" data-target="#booking_modal"    href="#" > Cancel </a> <?php } } 
							} ?>
						 &nbsp<a class="btn-sm btn-primary" href="<?php echo  base_url(); ?>backend/offlinerequest/package_requests">back</a>
					</span>
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $view[0]->id ?>">
				<!-- <div class="col-md-12">-->
			<div class="row">
				<div class="col-md-6"> 
					<span>Request Id : PKB<?php echo $view[0]->id ?></span><br>
					<span>Request date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></span><br>
					<span>Nationality : <?php echo NationalityGet($view[0]->nationality) ?></span><br>
				</div>
			</div>
			
			</br>
			<div class="row">
				<div class="col-md-6">
					<h4 class="dark bold" >Adult(s) Details - <?php echo $view[0]->adults?> adults</h4>
				</div>
				<div class="col-md-6">
					<h4 class="dark bold"> Childs(s) Details - <?php echo $view[0]->child ?> childs</h4>
				</div>
                <br>
				<div class="col-md-9">
	                <h4 class="bold">Guest Form</h4>
	                <br>
	                <table class="table-bordered" >
	                    <thead style="background-color: #F2F2F2;">
	                      <tr>
	                        <th>Name</th>
	                        <th>Email</th>
	                        <th>Contact number</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                      <tr>
	                        <td><?php echo $view[0]->ContactName ?></td>
	                        <td><?php echo $view[0]->contactemail ?></td>
	                        <td><?php echo $view[0]->contactnum ?></td>
	                      </tr>
	                    </tbody>
	                  </table>
	                  <br>
	              </div>
			</div>
		</br>
		<?php if(isset($view[0]->specialrequest) && $view[0]->specialrequest!="") { ?>
				<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9">
						<h4 class="dark bold" >Special Request</h4> <br>
						<p><?php echo $view[0]->specialrequest ?></p>
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
        						<span class="pull-right" style="font-size: 18px; text-transform: capitalize;">progress : <?php if ($view[0]->requestFlg==0) { ?>
								<span class="text-danger">Rejected</span>
								<?php } else if($view[0]->requestFlg==1) { ?><span class="text-success">Success</span><?php } else if($view[0]->requestFlg==2) { ?><span class="label label-warning">Pending</span> <?php } else if($view[0]->requestFlg==3) { ?><span class="text-danger">Cancelled</span> <?php } else if($view[0]->requestFlg==4) { ?><span class="text-danger">Accepted Pending</span> <?php } else if($view[0]->requestFlg==5) { ?><span class="text-danger">Cancellation Pending</span> <?php } ?></span>
								</h3>
        				</div>
        				<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
							<?php 
							$CostPrice =$view[0]->costprice;
                            $SellingPrice = $view[0]->sellingprice;
                            $ProfitPrice = $view[0]->profitprice;
                            $margin = $view[0]->margin;
                            ?>
                           
							<div class="row payment-table-wrap">
			            		<div class="col-md-12">
			            			
			            			<table class="table-bordered" >
			            				<thead style="background-color: #F2F2F2;">
			            					<tr>
			            						<th style="width: 85px;">Tours Required</th>
			            						<th style="width: 85px;">Dates</th>
			                					<th style="width: 60px; text-align: center">Cost Rate</th>
				            					<th style="width: 120px; text-align: right">Selling Rate</th>
				            					<th style="width: 60px; text-align: right">Profit</th>
				            					<th style="width: 60px; text-align: right">Margin</th>
			            					</tr>
			            				</thead>
			            				<tbody>
			            					
			            						<tr>
			            							
			            							<td><?php echo $view[0]->tourrequired; ?></td>
			            							<td><?php echo date('d/m/Y',strtotime($view[0]->checkin)).' -  '.date('d/m/Y',strtotime($view[0]->checkout)); ?></td>
			              							<td style="text-align: right"><?php echo isset($CostPrice) && $CostPrice!="" ? $CostPrice : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($SellingPrice) && $SellingPrice!="" ? $SellingPrice : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($ProfitPrice) && $ProfitPrice!="" ? $ProfitPrice : '' ?></td>
			            							<td style="text-align: right"><?php echo isset($margin) && $margin!="" ? $margin : '' ?></td>

			            						</tr>	   
            							</tbody>
            							<tfoot>
			            					<tr>
			            						<?php 
			            							$CostTotal = $CostPrice;
			            							$SellingTotal = $SellingPrice;
			            							$profitTotal = $ProfitPrice;
			            							$marginTotal = $margin;
			            							
			            						?>
			            						<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo $CostPrice; ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo $SellingPrice; ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo $ProfitPrice; ?></td>
			            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo $marginTotal; ?></td>
			            					</tr>
            							</tfoot>
            						</table>
            						<br>
            					</div>
            				</div>
            				
						</div>
				
						<div class="card-block"  style="padding: 15px;">
          					<div class="row m-b-1">
            					<div class="col-md-12">
            						<div class="col-md-12">
									    <div class="col-md-12 bold">
										    <p>COST TOTAL : <?php echo $CostTotal ?></p>
									    </div>
									    <div class="col-md-12 bold">
										    <p>SELLING TOTAL : <?php echo $SellingTotal  ?></p>
									    </div>
									    <!-- <div class="col-md-12 bold">
										    <p>Agent Profit</p>
									    </div> -->
										<div class="col-md-12 bold">
										    <p>PROFIT TOTAL : <?php echo $profitTotal ?></p>
									    </div>
									    <div class="col-md-12 bold">
										    <p>MARGIN TOTAL : <?php echo $marginTotal.'%' ?></p>
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
<script>
// @offline package request action
// load the modal for offline package request status update
function OffllinePackageRequestactionfun(id,val) {
  $("#booking_modal").load(base_url+"backend/offlinerequest/OfflinePackageActionModal?id="+id+'&val='+val);
  $('#booking_modal').modal({
    backdrop: 'static',
    keyboard: false
  });
}
function GuestDataValidation() {
	alert("Must fill the guest details.please click edit !");
}
</script>
<?php init_tail(); ?>
