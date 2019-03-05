<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>

<div class="sb2-2">
    <div class="sb2-2-3">
	    <div class="col-sm-12 col-xs-12">
		    <div class="card">
		        <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;"><h3>Tour Details</h3>
		        </div>
		        <div class="card-block"  style="padding: 15px;">
		          	<div class="row m-b-1">
				        <div class="col-md-3 col-sm-3">
				            <div class="text-center mb-sm-0" style="background-color: #eaeaea">
				            	<?php  
				            		if (isset($view[0]->image)) { ?>
                                            <img src="<?php echo base_url(); ?>uploads/tour_services_images/<?php echo $view[0]->tour_id ?>/<?php echo $view[0]->image ?>" width="70%"  >
                                            <?php  } else {  { ?>
                                            <img src="">
                                <?php  } }?>

				            </div>
				        </div>
				        <?php $currency="AED"; ?>
				        <div class="col-md-9 col-sm-9">
				            <div class="row">
					            <div class="col-sm-6">
					               <form class="form-horizontal" role="form">
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                    <i class="fa fa-hotel" style="color: #4caf50;"></i>&nbsp;
			                                    	Tour name :
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                	<label for=""><?php echo $view[0]->type ?>
			                                	
			                                	</label>
			                              	</div>
			                            </div>
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                <i class="fa fa-map-marker" style="color: #4caf50;"></i>&nbsp;
			                                    	Address :
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                    <label for=""><?php echo $view[0]->countryName.', '.$view[0]->CityName ?></label>
			                                </div>
			                            </div>
			                            <div class="form-group">
			                                <label class="col-sm-6 col-md-6 col-lg-5" style="color: #000; font-size: 13px;">
			                                <i class="fa fa-calendar" style="color: #4caf50;"></i>&nbsp;
			                                    	Joining Date :
			                                </label>
			                                <div class="col-sm-6 col-md-6 col-lg-7">
			                                    <label for=""><?php echo date('d/m/Y',strtotime($view[0]->Created_Date)) ?></label>
			                                </div>
			                            </div>
			                        </form>
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
						<?php 
						$tourMenu = menuPermissionAvailability($this->session->userdata('id'),'Booking','Tour Booking');
				        if($tourMenu[0]->edit!=0){
				        	if( $view[0]->booking_flag ==2 || $view[0]->booking_flag ==4) { ?>
							<a href="#" class="btn-sm btn-success  " data-toggle="modal" data-target="#booking_modal"  class="sb2-2-1-edit delete">Accept</a> &nbsp<a class="btn-sm btn-danger "  data-toggle="modal" data-target="#myModal" onclick="tourdeletefun('.$r->booking_id.');"  href="#" > Cancel </a> <?php } ?>
							<?php if( $view[0]->booking_flag ==1 ) { ?> 
							<a class="btn-sm btn-danger "  data-toggle="modal" data-target="#myModal"   href="#" > Cancel </a> <?php } ?>
							<?php if( $view[0]->booking_flag ==5) { ?>
							<a class="btn-sm btn-danger "  data-toggle="modal" data-target="#myModal" onclick="tourdeletefun('.$r->booking_id.');"  href="#" >cancellation approved</a> <?php } 
						} ?>
						 &nbsp<a class="btn-sm btn-primary" href="<?php echo  base_url(); ?>backend/booking/TourBooking">back</a>
					</span>
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $view[0]->booking_id ?>">
			<input type="hidden" name="tour_id" id="tour_id" value="<?php echo $view[0]->tour_id ?>">
			<input type="hidden" name="agent_id" id="agent_id" value="<?php echo $view[0]->agent_id ?>">
		
				<!-- <div class="col-md-12">-->
			<div class="row">
				<div class="col-md-6"> 
					<span>Booking Id : <?php echo $view[0]->booking_id ?></span><br>
					<span>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->arrivaldate)) ?></span>
				</div>
			</div>
			
			</br>
			<div class="row">
				<div class="col-md-6">
								<h4 class="dark bold" >Adult(s) Details - <?php echo $view[0]->adults_count ?> adults</h4>
				</div>
				<div class="col-md-6">
					<h4 class="dark bold"> Childs(s) Details - <?php echo $view[0]->childs_count ?> childs</h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9" >
			            <h4 class="dark bold" >Contact Details</h4> <br>
						<table class="table-bordered">
							<thead  style="background-color: #F2F2F2;">
								<tr>
									<td>Name</td>
									<td>Email</td>
									<td>Contact number</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $view[0]->bk_contact_fname." ".$view[0]->bk_contact_lname; ?></td>
									<td><?php echo $view[0]->bk_contact_email ?></td>
									<td><?php echo $view[0]->bk_contact_number ?></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<br>
			<?php 
			if (count($multiservice)!=0) { ?>
			<div class="row">
				<div class="scol-md-12">
					<div class="col-md-9" >
			            <h4 class="dark bold" >Services Details</h4> <br>
						<table class="table-bordered">
							<thead  style="background-color: #F2F2F2;">
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
				<div class="scol-md-12">
					<div class="col-md-9">
								<h4 class="dark bold" >Day Details</h4> 
								<br>
								<p>Total Days : <?php echo $view[0]->no_of_days ?></p>
								<span>Date of tour : </span><span class="bold"><?php $check_in=date_create($view[0]->arrivaldate);
				 				echo date_format($check_in,'d-M-Y') ?></span>&nbsp
					</div>
				</div>
			</div>
			</br>	
			<div class="card">
			</div>
    		<div class="">
      			<div class="card">
		                <div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
		                
					<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
        						<h3>Booking Amount Breakup
        						<span class="pull-right" style="font-size: 18px; text-transform: capitalize;">progress : <?php if ($view[0]->booking_flag==0) { ?>
								<span class="text-danger">Rejected</span>
								<?php } else if($view[0]->booking_flag==1) { ?><span class="text-success">Success</span><?php } else if($view[0]->booking_flag==2) { ?><span class="label label-warning">Pending</span> <?php } else if($view[0]->booking_flag==3) { ?><span class="text-danger">Cancelled</span> <?php } else if($view[0]->booking_flag==4) { ?><span class="text-danger">Accepted Pending</span> <?php } else if($view[0]->booking_flag==5) { ?><span class="text-danger">Cancellation Pending</span> <?php } ?></span>
								</h3>
        				</div>
        				<?php $total_markup = $view[0]->agent_markup+$view[0]->admin_markup; ?>
        				<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc; ">
							<div class="row payment-table-wrap">
			            		<div class="col-md-12">
			            			<table class="table-bordered" >
			            				<thead>
				        					<tr>
				        						<th style="width: 85px;">Date</th>
				            					<th style="width: 120px">Tour Type</th>
				            					<th style="width: 60px; text-align: center">Cost Rate</th>
				            					<th style="width: 60px; text-align: right">Selling Rate</th>
				        					</tr>
				        				</thead>
			            				<tbody>
			            					<tr>
			            						<td><?php echo date('d/m/Y', strtotime($view[0]->arrivaldate)); ?></td>
	            								<td><?php echo $view[0]->type; ?></td>
	            								<td style="text-align: right">
            									<p class="new-price">
            									<?php 
            									echo currency_type(admin_currency(),$view[0]->total_cost); ?> <?php echo admin_currency() ?></p></td>
            									<td style="text-align: right">
            									<p class="new-price">
            									<?php 
            									$total_amount = ($view[0]->total_amount*$total_markup)/100+$view[0]->total_amount;
            									echo currency_type(admin_currency(),$total_amount); ?> <?php echo admin_currency() ?></p></td>
            								</tr>
            							</tbody>
            							<tfoot>
			            					<tr>
            									<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
            									<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo number_format(backend_currency_type($view[0]->total_cost),2),admin_currency();?></td>
            									<td style="text-align: right; font-weight: 700; color: #0074b9"><?php
            									$total_amount = ($view[0]->total_amount*$total_markup)/100+$view[0]->total_amount; echo number_format(backend_currency_type($total_amount),2),admin_currency(); ?></td>
            								</tr>
            							</tfoot>
            						</table>
            						<br>
            					</div>
            				</div>
						</div>
						<?php
						$Agentprofit = ($view[0]->total_amount*($view[0]->agent_markup))/100;

						$Adminprofit= $view[0]->total_amount-$view[0]->total_cost;
						?>
				
						<div class="card-block"  style="padding: 15px;">
          					<div class="row m-b-1">
            					<div class="col-md-12">
            						<div class="col-md-12">
					
			    			<div class="col-md-6">
							    <p>Tax</p>
						    </div>
						    <div class="col-md-6">
							    <p><?php echo '0' ?>%</p>
						    </div>			    			
						    <div class="col-md-6 bold">
							    <p>GRAND TOTAL</p>
						    </div>

						    <div class="col-md-6 bold">
							    <p><?php 
							   echo number_format(backend_currency_type($total_amount),2); echo ' '.admin_currency()
							    ?></p>
						    </div>
						    <div class="col-md-6 bold">
							    <p>Admin Profit</p>
						    </div>
						    <div class="col-md-6 bold">
							    <p><?php 
							    	 echo number_format(backend_currency_type($Adminprofit),2);
							    	 echo ' '.admin_currency();
							    	?>
							    </p>
						    </div>
						    <div class="col-md-6 bold">
							    <p>Agent Profit</p>
						    </div>
						    <div class="col-md-6 bold">
							    <p><?php 
							    	 echo number_format(backend_currency_type($Agentprofit),2);
							    	 echo ' '.admin_currency();
							    	?>
							    </p>
						    </div>
							<div class="col-md-6 bold">
							    <p>COST PRICE TOTAL</p>
						    </div>
						    <div class="col-md-6 bold">
							    <p><?php echo number_format(backend_currency_type($view[0]->total_cost),2);
							    	 echo ' '.admin_currency() ?></p>
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
<?php if ($view[0]->SpecialRequest!="") { ?>
<div class="col-sm-12 col-xs-12">
	<div class="card">
		<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
			<h4 class="bold">Special Request</h4>
			<br>
			<p><?php echo $view[0]->SpecialRequest ?></p>
		</div>
	</div>
</div>
<?php } ?>
<?php if(count($cancelation)!=0) { ?>
	<div class="col-sm-12 col-xs-12">
	<div class="card">
		<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
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
					    	<?php foreach ($cancelation as $Canckey => $Cancvalue) { ?>
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
							<?php } ?>
				    	</tbody>
				</table>
		</div>
		<br>
	</div>
	</div>
<?php } ?>

<!-- Modal-->
<div id="myModal" class="modal fade delete_modal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
            	<div class="modal-header">
	                <span>Do you want cancel this booking?</span>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <form   action="" id="invoice_form1" name="invoice_form1" method="post">
	                    <input type="hidden" name="id" id="idz" value="<?php echo $view[0]->bookid ?>">
	                    <input type="hidden" name="tourz_id" id="tourz_id" value="<?php echo $view[0]->tour_id ?>">
	                    <input type="hidden" name="agent_id" id="agentz_id" value="<?php echo $view[0]->agent_id ?>">
	                </form>
                <!-- <h4 class="modal-title">Add Reference Id</h4> -->
        		</div>
        		<?php if(count($cancelation)!=0) { ?>
                <div class="modal-body" style="height: 300px;">
                	
                    
                	<div class="col-sm-12 col-xs-12">
						
							<div class="card-header text-uppercase" style="padding: 10px; border-bottom: 1px solid #ccc;">
								<h4 class="bold">Cancelation Policy</h4><br>
								<table class="table table-bordered table-hover">
									<thead>
									      	<tr style="background-color: #0074b9;color: white">
										        <th>Cancelled on or After</th>
										        <th>Cancelled on or Before</th>
										        <th>Cancellation Charge</th>
									      	</tr>
								    </thead>
								    <tbody> 
								    	<?php foreach ($cancelation as $Canckey => $Cancvalue) { ?>
									    <tr>
								    		<td><?php 
								    		if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($view[0]->arrivaldate))) < $view[0]->Created_Date) {
								    			echo date('d/m/Y',strtotime($view[0]->Created_Date));
								    		} else {
								    			echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($fromdate)));
								    		}
								    		?></td>
								    		<td><?php if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($view[0]->arrivaldate))) < $view[0]->Created_Date) {
								    			echo date('d/m/Y',strtotime($view[0]->Created_Date));
								    		} else {
								    			echo date('d/m/Y' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($arrivaldate)));
								    		} ?></td>
								    		<td><?php echo $Cancvalue->cancellationPercentage ?>%</td>
								    	</tr>
									<?php } ?>
							    	</tbody>
								</table>
							</div>
							<br>
						</div>
					<?php } ?>
					
                	<div class="row">
                	<div class="col-md-12 form-group">
	                    <button type="button" id="tour_reject_button" class="btn-sm btn-success pull-right" style="margin-left: 5px;">Yes</button>
	            		<button type="button" data-dismiss="modal" id="tour_reject_button" style="margin-left: 10px;" class="btn-sm btn-danger pull-right">No</button>
                	</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade  delete_modal" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            	<div class="modal-header">
	                <span>Do you want Accept this booking?</span>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <form   action="" id="invoice_form" name="invoice_form" method="post">
	                	<div class="col-md-6 form-group">
                  		<input type="hidden" class="form-control" id="booking_invoice_id" name="booking_invoice_id" placeholder="Invoice ID" readonly>
                        <input type="hidden" name="id" id="book_id" value="<?php echo $view[0]->bookid ?>">
                  	    <input type="hidden" name="tour_id" id="tour_id" value="<?php echo $view[0]->tour_id ?>">
                        <input type="hidden" name="agent_id" id="agents_id" value="<?php echo $view[0]->agent_id ?>">
                        </div>
                    </form>
                <!-- <h4 class="modal-title">Add Reference Id</h4> -->
        		</div>
               <!--  <div class="modal-body" style="height: 100px;">
      	            
                          		<input type="hidden" name="invoice_ck" id="invoice_ck" value="0">
                          		<span class="text-danger invoice_err"></span>
      	                </div>
      	                <div class="col-md-6 form-group">
                          		<input type="hidden" class="form-control" id="booking_invoice_date" name="booking_invoice_date" placeholder="Invoice date" readonly >
                          		<span class="text-danger invoice_date_err"></span>
      	                </div> 
      	                <?php if($view[0]->booking_flag==4) { ?>
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation" name="booking_confirmation" value="<?php echo $view[0]->confirmationNumber ?>" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                              <input type="text" class="form-control" id="booking_confirmation_name" name="booking_confirmation_name" value="<?php echo $view[0]->confirmationName ?>" readonly>
                        </div>
                        <?php 	} else { ?>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" id="booking_confirmation" name="booking_confirmation" placeholder="Confirmation number">
                      	</div>
	                    <div class="col-md-6 form-group">
	                        <input type="text" class="form-control" id="booking_confirmation_name" name="booking_confirmation_name" placeholder="Confirmation name">
	                    </div>
	                    <?php  } ?>
                </div> -->
                <div class="modal-footer">
		           <div class="row">
		           		<div class="col-md-12 form-group">
				           <button type="button" data-dismiss="modal" id="accept_no_button" class="btn-sm btn-danger ">No</button>
				           <button type="button" id="tour_accept_button"  class="btn-sm btn-success">Yes</button>
				        </div>
		         		</div>
		         	</div>
            </div>
        </div>
    </div>

    <div class="modal fade col-md-6 col-md-offset-3" id="booking_success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <!-- Modal content-->
          </div>
    </div>
    <script type="text/javascript">
    $("#tour_accept_button").click(function(e) {
      	var book_id = $("#book_id").val();
      	var tour_id = $("#tour_id").val();
      	var agent_id = $("#agent_id").val();
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/tour_portel_admin_permission?id='+book_id+'&tour_id='+tour_id+'&agent_id='+agent_id,
            cache: false,
            success: function(response) {
              addToast("Accepted Successfully","green");
              document.location.reload(true);
           
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
   	});
    $("#tour_reject_button").click(function(e) {
		var book_id = $("#idz").val();
		var tour_id = $("#tourz_id").val();
		var agent_id = $("#agentz_id").val();
		addToast("Canceld Successfully","green");
		$.ajax({
		  // dataType: 'json',
		  type: "POST",
		  url: base_url+'backend/booking/tourcancellationUpdate?book_id='+book_id+'&tour_id='+tour_id+'&agent_id='+agent_id,
		  cache: false,
		  success: function (response) {
		    document.location.reload(true); 
		  }
		});
	});
    </script>

<?php init_tail(); ?>



