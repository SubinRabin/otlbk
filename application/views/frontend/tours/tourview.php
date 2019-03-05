<?php init_front_head(); ?> 
<?php init_front_head_menu(); 
	$CustomerSupport = CustomerSupport();
?> 
<script>
function goBack() {
    window.history.back();
}
$(document).ready(function() {
	var startStamp = new Date($("#startTime").val()).getTime();
	var start = new Date($("#startTime").val());
	var maxTime = (30*60)*1000;
	var timeoutVal = Math.floor(maxTime/100);
	animateUpdate();

	function updateProgress(percentage) {
		$("#book-progress").val((100-percentage));
	}

	function animateUpdate() {
	    var now = new Date();
	    var timeDiff = now.getTime() - start.getTime();
	    var perc = Math.round((timeDiff/maxTime)*100);
	      if (perc <= 100) {
	       updateProgress(perc);
	       setTimeout(animateUpdate, timeoutVal);
	      } else {
           	window.location = base_url+"hotels";
	      }
	}
	function updateClock() {
		var now = new Date();
	    var timeDiff = now.getTime() - start.getTime();
		var nowTime = new Date().getTime();

		var diff = Math.round((nowTime-startStamp)/1000);

		var d = Math.floor(diff/(24*60*60)); /* though I hope she won't be working for consecutive days :) */
		diff = diff-(d*24*60*60);
		var h = Math.floor(diff/(60*60));
		diff = diff-(h*60*60);
		var m = Math.floor(diff/(60));
		diff = diff-(m*60);
		var s = diff;
      	if(m<=30) {
      		if (s<10) {
      			s = '0'+s;
      		}
      		if (m<10) {
      			m = '0'+m;
      		}
      		$("#timeLeft").text((30-m)+":"+(60-s));
      	}
	}
	setInterval(updateClock, 1000);
	$('#Continue_book').click(function () {
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var contact_num = $("#contact_num").val();
        var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phoneno = /^\d{10}$/;  
        var first_name = $(".first_name").val();
        if ($("#cancel_agree").is(':checked')) {
            if (first_name=="") {
                tooltip_fun(".first_name");
            } else if (email=="") {
                tooltip_fun("#email");
            } else if (!filter.test(email)) {
                tooltip_fun("#email");
            } else if (contact_num=="") {
                tooltip_fun("#contact_num");
            } else if (!contact_num.match(/^\d+/)) {
                tooltip_fun("#contact_num");
            } else {
                $("#payment_form").attr("action","paymentbooking");
                $("#payment_form").submit();
            }
        } else {
            tooltip_fun("#cancel_agree");
        }     
	  });
	});
	function tooltip_fun(id) {
	    $(id).attr({"title":"required !","data-toggle":"tooltip"});
	    $(id).tooltip();
	    $(id).focus().setTimeout(alertFunc(), 3000);
	}
	function alertFunc() {
	    
	}
</script>

<style type="text/css">
	
</style>
	<div class="container breadcrub">
		<ol class="track-progress" data-steps="5">
	      <li class="done">
	        <span>Search</span>
	      </li><li class="done">
	        <span>Search Tours</span>
	        <i></i>
	      </li><li class="active">
	        <span>Tour Information</span>
	        <i></i>
	      </li><li>
	        <span>Review Booking</span>
	        <i></i>
	      </li><li>
	        <span>Confirm</span>
	      </li>
	    </ol>
	</div>	
	<!-- CONTENT -->
	<?php 
	    $result = array();
	  	$arrivaldate=date_create($_REQUEST['arrivaldate']);
		$adultcount = array_sum($_REQUEST['adults']);
		$childcount = array_sum($_REQUEST['Child']);
	    if (isset($_REQUEST['room1-childAge'])) {
			foreach ($_REQUEST['room1-childAge'] as $key => $age) { 
				if($age > $tourdetails[0]->max_childAge) {
					$adultcount++;
					$childcount--;
				}
			}
		} 
	   	$total_amount = ($adultcount * $tourdetails[0]->adult_selling) + ($childcount * $tourdetails[0]->child_selling);
	   	$total_amount = ($total_amount*$totalMarkup)/100+$total_amount;
		$viwedate1 = date("d/m/Y", strtotime(isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : ''));
	?>
	<div class="container">
		<input type="hidden" id="startTime" value="<?php echo date('D M d Y H:i:s',strtotime($_REQUEST['token'])); ?>">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 paymentbox grey">
					<div class="padding30">
						<span class="opensans size18 dark bold">Book Tour Details</span> <br> <br>
						<img src="<?php echo base_url();?>uploads/tour_services_images/<?php echo $tourdetails[0]->tour_type ?>/<?php echo $tourdetails[0]->image ?>" class="left margright20" width="100%" alt=""/>
						<p><span class="opensans size17 bold"><?php echo $tourdetails[0]->type?></span></p>
						
						<br> <br>
					</div>
					<div class="clearfix"></div>
					<div class="line3"></div>
					<div class="hpadding20 margtop20">
						<span class="opensans size15 bold">Location</span>
						<br>
					     <td class="center green bold"><?php echo $tourdetails[0]->city.', '.$tourdetails[0]->country; ?></td> <br> <br>
				    </div>
		            <div class="line3"></div>
		            <div class="hpadding20 margtop20">
					          <br> 
								<span class="opensans size15 bold">Highlights</span>
								<br>
								<td class="center green bold"><?php echo $tourdetails[0]->highlights ?></td> <br> <br>
								<div class="clearfix"></div>	
									<div class="wh50percent chckin_err textleft left">
									<br>
									<span class="opensans size13"><b>Date of Tour</b></span><span>*</span>
									<input type="hidden" class="form-control wh90percent" id="datepicker3" name="arrivaldate" placeholder="mm/dd/yyyy" readonly value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" />
									<input type="text" class="form-control wh90percent" value="<?php echo $viwedate1; ?>" readonly>
									</div>							
							<!-- </tr> -->
						<!-- </table> -->
					</div>	
					<div class="line3"></div>
					<div class="padding30">					
						<div class="clearfix"></div>
					</div>
				</div><br/>
				<div class="pagecontainer2 needassistancebox">
					<div class="cpadding1">
						<span class="icon-help"></span>
						<h3 class="opensans">Need Assistance?</h3>
						<p class="size14 grey"><?php echo $CustomerSupport[0]->description ?></p>
						<p class="opensans size30 lblue xslim"><?php echo $CustomerSupport[0]->cusNumber ?></p>
					</div>
				</div><br/><br/>
				<button  onclick="goBack()" class="col-md-12 btn btn-warning bold" style="left: 13px;bottom: 20px; padding: 15px">Back</button>
			</div>
			<!-- END OF LEFT CONTENT -->
			<!-- RIGHT CONTENT -->
			<div class="col-md-8 pagecontainer2 offset-0">
			<form method="get" name="payment_form" id="payment_form">
			    <input type="hidden" name="RequestType" value="<?php echo isset($_REQUEST['RequestType']) ? $_REQUEST['RequestType'] : 'Book' ?>">
				<input type="hidden" name="adults" id="adults" value="<?php echo array_sum($_REQUEST['adults']) ?>">
				<input type="hidden" name="childs" id="childs" value="<?php echo array_sum($_REQUEST['Child']) ?>">	
				<?php if (isset($_REQUEST['room1-childAge'])) {
									foreach ($_REQUEST['room1-childAge'] as $key => $value) { ?>
										<input type="hidden" name="room1-childAge[]" value="<?php echo $value; ?>">
							<?php   }
							} ?>			
				<input type="hidden" name="contractid" id="contractid" value="<?php echo $_REQUEST['contractid'] ?>">
				<input type="hidden" name="tourid" id="tourid" value="<?php echo $_REQUEST['tourid']?>">
				<input type="hidden" name="nationality" id="nationality" value="<?php echo $_REQUEST['nationality']?>">
				<input type="hidden" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>">
				<input type="hidden" name="token" value="<?php echo $_REQUEST['token'] ?>">
				<div class="padding30 grey">
					<span class="opensans size18 dark bold">Booking Details</span>
					<!-- <div class="roundstep active right">1</div> -->
					<span class="right text-right">
						<span>Time Left : <b id="timeLeft">00:00</b></span>
						<progress id="book-progress" value="0" max="100"></progress>
					</span>
					<div class="clearfix"></div>
					<div class="line4"></div>
					
					<?php 
                       $adult= array_sum($_REQUEST['adults']);
            			if (isset($_REQUEST['Child'][0])) {
            				$childs= array_sum($_REQUEST['Child']);
            			} else {
            				$childs= "0";
            			}
                    ?>
					<div class="padding20 margtop25" style="background-color: ghostwhite;">
						<div class="row">
							<div class="col-sm-6"  style="border-right: 1px dashed #bbb">
								<?php 
				                       $adultss= array_sum($_REQUEST['adults']); ?>
								<label>Adult(s) Details <span class="badge"><?php echo $adultss ?></span></label>
									
							</div>
							<div class="col-sm-6">
								<label>Children(s) Details <span class="badge"><?php echo $childs ?></span></label>
							</div>
						</div>
					</div><br>
					<span class="size16px bold dark">Contact details</span><br/> <br>
					
					<div class="row">
	                   	<div class="col-md-12">
	                   		<div class="row">
	                   			<div class="col-md-2">
	                   			
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				 <input type="text" class="form-control first_name first_name" name="first_name" placeholder="First Name">
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				<input type="text" class="form-control" name="last_name"  placeholder="Last Name" >
	                   			</div>
							</div>
							<br>
	                   		
	                   		<div class="row">
	                   			<div class="col-md-5 col-md-offset-2 textleft">
	                   				<input type="text" class="form-control" name="email" id="email" placeholder="Email">
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				<input type="number" class="hide-spinner  form-control" name="contact_num" id="contact_num" placeholder="Contact">
	                   			</div>
	                   		</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
					
				</form>
				<?php if (count($services)!=0) { ?>
				<h4 class="opensans dark bold">Tour details</h4>     
				<div class="row payment-table-wrap">
					<div class="col-md-8">
						<table class="table-bordered">
							<thead>
		    					<tr>
		    						<th>Services</th>
		    						<th>Date</th>
		        					<th style="width:100px;">schedule</th>
		    					</tr>
	    					</thead>
	    					<tbody>
	    						<?php foreach ($services as $key => $value) { ?>
			    					<tr>
			        					<td><?php echo $value->Services ?></td>
		    							<th>
		    								<input type="hidden" name="mulltiService[]" value="<?php echo $value->Services ?>">
		    								<input type="hidden" name="mulltiServiceFromTime[]" value="<?php echo $value->FromTime ?>">
		    								<input type="hidden" name="mulltiServiceToTime[]" value="<?php echo $value->ToTime ?>">
		    								<select class="form-control"  name="mulltiServiceDate[]">
		    									<?php if ($tourdetails[0]->durationType=='days') { 
		    									 for ($i=0; $i < $tourdetails[0]->duration ; $i++) { 
		    									 ?>
		    									<option value="<?php echo date('Y-m-d' ,strtotime($_REQUEST['arrivaldate'].' +'.$i.' days')) ?>"><?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'].' +'.$i.' days')) ?></option>
		    									<?php } } else { ?>
		    									<option value="<?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) ?>"><?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) ?></option>
		    									<?php } ?>
		    								</select>
		    							</th>
			        					<td><?php echo $value->FromTime ?> - <?php echo $value->ToTime ?></td>
			    					</tr>	
	    						<?php } ?>
	    					</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
				<h4 class="opensans dark bold">Booking Amount Breakup</h4><br>     <div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			
	            			<table class="table-bordered">
	            				<thead>
	            					<tr>
	            						<th style="width: 85px;">Date of Tour</th>
		            					<th style="width:150px;">Tour</th>
		            					
		            					<th style="width: 100px; text-align: right">Rate</th>
	            					</tr>
	            				</thead>
	            				<tbody>
	            					<tr>
		            					<td><?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) ?></td>
		            					<td><?php echo $tourdetails[0]->type ?> 
		            					<td style="text-align: right"><?php 
		            					
		            					echo currency_type(agent_currency(),$total_amount) ?> <?php echo agent_currency() ?></td>
	            					</tr>
	            				</tbody>
	            				<tfoot>
	            					<tr>
	            						<td colspan="2" style="text-align: right"><strong class="text-blue">Total</strong></td>
	            						<td style="text-align: right; font-weight: 700; color: #0074b9"><?php echo currency_type(agent_currency(),$total_amount)." ".agent_currency();  ?></td>
	            					</tr>
	            				</tfoot>
	            			</table>
	            		</div>
	            	</div>
            

            	<div class="row">
            		<div class="col-md-6">
            			<p>Tax</p>
            			<h4 class="text-green payment-grand-totals p-left"></h4>
            			<h4 class="text-green payment-grand-total p-left"> GRAND TOTAL</h4>
            		</div>
            		<div class="col-md-6">
            			<p class="text-right"><?php echo "0" ?>%</p>
            			<h4 class="new-price text-green text-right payment-grand-total p-right">           				
            				<?php 
            				
            				echo currency_type(agent_currency(),$total_amount)." ".agent_currency();  ?></h4>
            		</div><br>
	            	<div class="col-md-12">
	            		<p>Special Request</p>
	            		<textarea name="SpecialRequest" class="form-control" placeholder="eg: I want early check-in or specify the time you will check-in"></textarea>
	            	</div>
            	</div>
        	</div>
			<div class="alert alert-info padding30">
				<span class="opensans size18 blue bold">Cancellation Policy *</span><br>
				<?php 
				if (count($contract_policies)!=0) {
				?>
				<div>
					<table class="table table-bordered table-hover">
						<thead>
					      <tr>
					        <th>Cancelled on or After</th>
					        <th>Cancelled on or Before</th>
					        <th>Cancellation Charge</th>
					      </tr>
					    </thead>
					    <tbody> 
					    	<?php $tdate = date('Y-m-d');
					    	foreach ($contract_policies as $value) { ?>
					    	<tr>
					    		<td><?php $after = date('Y-m-d', strtotime('-'.$value->from_day.' days', strtotime($_REQUEST['arrivaldate']))); 
					    		if($tdate<$after) {
					    			echo $after;
					    		} else { 
					    			echo $tdate;
					    		}?></td>
					    		<td><?php $before = date('Y-m-d', strtotime('-'.$value->to_day.' days', strtotime($_REQUEST['arrivaldate'])));
					    		if($tdate<$before) {
					    			echo $before;
					    		} else { 
					    			echo $tdate;
					    		}  ?></td>
					    		<td><?php echo $value->cancel_percent ?>% </td>
					    	</tr>
							<?php } ?>
				    	</tbody>
					</table>
				</div>
				<?php } ?>
				<div>
				</div> 
				<br>
				<?php if ($contract_policies!="") { ?>
					<input type="checkbox" name="cancel_agree" id="cancel_agree">
						<span id="check_box_cancellation_err blink_me"></span>
				 	<label class="opensans size12 blue bold" for="cancel_agree">If you agree to the cancellation policy, kindly select the checkbox and proceed.</label> 
				<?php } else { ?>
					<input type="checkbox" name="cancel_agree" id="cancel_agree" checked="true" disabled>
						<span id="check_box_cancellation_err blink_me"></span>
				 	<label class="opensans size12 blue bold" for="cancel_agree">If you agree to the cancellation policy, kindly select the checkbox and proceed.</label> 
				 <?php } ?>
			</div>
			<div class="col-md-12 padding30">
				<span class="opensans size18 blue bold">Important Notes & Conditions</span><br><br>
				<div><?php 
					if (count($contractconditions)!=0) {
						foreach ($contractconditions as $value) {
						echo $value->conditions."<br>"; 
						}
					}?></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix pbottom15"></div>
			<?php $check_tot = $total_amount ;	
			 if ($check_tot <= $agent_credit_amount) { ?>
				<div class="form-group col-md-12">
					<?php if ($check_tot <= $agent_credit_amount) { ?>
					<button class="bluebtn pull-right margbottom20" id="Continue_book" type="button" name="Continue_book">Continue Booking</button>
					<?php } ?>
				</div>
			<?php	} else { ?> 
			<div class="col-md-12">
				<p class="text-center text-danger">Credit amount too low. Please contact admin</p>
			</div>
			<?php } ?>
			<div class="clear-fix"></div>
		</div>
	</div>
		<!-- END OF RIGHT CONTENT -->
	</div>
</div>
<!-- END OF CONTENT -->
  
 
  

<?php init_front_black_tail(); ?> 

	

