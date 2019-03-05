<?php init_front_head(); ?> 
<?php init_front_head_menu(); 
	$CustomerSupport = CustomerSupport();
?> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
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
		var transfertype = $("#transfertype").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var contact_num = $("#contact_num").val();
        var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phoneno = /^\d{10}$/;  
        var first_name = $(".first_name").val();
        var arrivalno = $("#arrivalno").val();
        var f_arrivaldate = $("#f_arrivaldate").val();
        var departno = $("#departno").val();
        var departdate = $("departdate").val();
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
            } else if (arrivalno=="") {
                tooltip_fun("#arrivalno");
            } else if (f_arrivaldate=="") {
                tooltip_fun("#f_arrivaldate");
            } else if (transfertype=="two-way" && departno=="") {
                tooltip_fun("#departno");
            } else if (transfertype=="two-way" && departdate=="") {
                tooltip_fun("#departdate");
            } else {
                $("#payment_form").attr("action","paymentbooking");
                $("#payment_form").submit();
            }
        } else {
            tooltip_fun("#cancel_agree");
        }     
	  });
	$.datetimepicker.setDateFormatter({
	  parseDate: function (date, format) {
	      var d = moment(date, format);
	      return d.isValid() ? d.toDate() : false;
	  },
	  formatDate: function (date, format) {
	      return moment(date).format(format);
	  },
	});
	$(".datetime").datetimepicker({
		format: 'DD/MM/Y HH:mm',
		formatDate: 'YYYY/MM/DD',
		formatTime: 'HH:mm',
		minDate:0,
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
	        <span>Search Transfers</span>
	        <i></i>
	      </li><li class="active">
	        <span> Transfer Information</span>
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
		$myDateTime = DateTime::createFromFormat('d/m/Y H:i', $_REQUEST['arrivaldate']);
		$fromdate = $myDateTime->format('Y-m-d');			
		$arrivaldate = $_REQUEST['arrivaldate'];
		$returndate = $_REQUEST['returndate'];
		$passenger = $_REQUEST['Passenger'];
		$type = $_REQUEST['transfertype'];
		if($type=='one-way') {
			$t = 1;
		} else {
			$t = 2;
		}
		$oneway_amt = $passenger * $transferdetails[0]->Passenger_selling;
		$oneway_amt = ($oneway_amt*$totalMarkup)/100+$oneway_amt;
	   	$total_amount = $t * $passenger * $transferdetails[0]->Passenger_selling;
		$total_amount = ($total_amount*$totalMarkup)/100+$total_amount;
	?>
	<div class="container">
		<input type="hidden" id="startTime" value="<?php echo date('D M d Y H:i:s',strtotime($_REQUEST['token'])); ?>">
		<div class="container mt25 offset-0">
			<!-- LEFT CONTENT -->
			<div class="col-md-4" >
				<div class="pagecontainer2 paymentbox grey">
					<div class="padding30">
						<span class="opensans size18 dark bold">Book Transfer Details</span> <br> <br>
						<img src="<?php echo base_url();?>uploads/tour_services_images/<?php echo $transferdetails[0]->vehicleid ?>/<?php echo $transferdetails[0]->vehicle_image?>" class="left margright20" width="100%" alt=""/>
						<p><span class="opensans size17 bold"><?php echo $transferdetails[0]->ContractName?></span></p>
						
						<br> <br>
					</div>
					<div class="clearfix"></div>
					<div class="line3"></div>
					<div class="hpadding20 margtop20">
						<span class="opensans size15 bold">Vehicle Name</span>
						<br>
					     <td class="center green bold"><?php echo $transferdetails[0]->VehicleName; ?></td> <br> <br>
				    </div>
		            <div class="line3"></div>
		            <div class="hpadding20 margtop20"><br> 
						<span class="opensans size15 bold">Vehicle Type</span>
						<br>
						<td class="center green bold"><?php echo $transferdetails[0]->vehicleType ?></td> <br> <br>
					</div>
					<div class="line3"></div>
					<div class="hpadding20 margtop20"><br> 
						<span class="opensans size15 bold">Description</span>
						<br>
						<td class="center green bold"><?php echo $transferdetails[0]->description ?></td> <br> <br>
					<div class="clearfix"></div>			
					<div class="wh50percent chckin_err textleft left"><br>
						<span class="opensans size13"><b>Arrival date</b></span><span>*</span>
						<input type="hidden" class="form-control wh90percent" id="datepicker3" name="arrivaldate" placeholder="mm/dd/yyyy" readonly value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" />
						<input type="text" class="form-control wh90percent" value="<?php echo $_REQUEST['arrivaldate']; ?>" readonly>
					</div>
					<?php $date = date('m/d/Y', strtotime("+1 day", strtotime(date('m/d/Y')))); ?>
					<?php if($type=='two-way') { ?>
					<div class="wh50percent  textleft right"><br>
						<span class="opensans size13"><b>Departure date</b></span><span>*</span>
						<input type="hidden" class="form-control wh90percent" id="datepicker3" name="returndate" readonly placeholder="mm/dd/yyyy" value="<?php echo isset($_REQUEST['returndate']) ? $_REQUEST['returndate'] : '' ?>" />
						<input type="text" class="form-control wh90percent" value="<?php echo $_REQUEST['returndate']; ?>" readonly>
					</div>
					<?php } ?>
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
			    <input type="hidden" name="transfertype" id="transfertype" value="<?php echo $_REQUEST['transfertype'] ?>">
				<input type="hidden" name="passenger" id="passenger" value="<?php echo $_REQUEST['Passenger'] ?>">
				<input type="hidden" name="contractid" id="contractid" value="<?php echo $_REQUEST['contractid'] ?>">
				<input type="hidden" name="vehicleid" id="vehicleid" value="<?php echo $_REQUEST['vehicleid']?>">
				<input type="hidden" name="nationality" id="nationality" value="<?php echo $_REQUEST['nationality']?>">
				<input type="hidden" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>">
				<input type="hidden"  name="returndate"  value="<?php echo isset($_REQUEST['returndate']) ? $_REQUEST['returndate'] : '' ?>" />
				<input type="hidden"  name="location"  value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?>" />
				<input type="hidden"  name="region"  value="<?php echo isset($_REQUEST['region']) ? $_REQUEST['region'] : '' ?>" />
				<input type="hidden"  name="airportID"  value="<?php echo isset($_REQUEST['airportID']) ? $_REQUEST['airportID'] : '' ?>" />
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
					<div class="padding20 margtop25" style="background-color: ghostwhite;">
						<div class="row">
							<div class="col-sm-6">
								<label>Passenger(s) Details <span class="badge"><?php echo $passenger ?></span></label>
									
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
					<span class="size16px bold dark">Transfer details</span><br/> <br>
					
					<div class="row">
	                   	<div class="col-md-12">
	                   		<div class="row">
	                   			<div class="col-md-2">
	                   			
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				 <input type="text" class="form-control arrivalno " id="arrivalno" name="arrivalno" placeholder="Arrival Flight No">
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				<input type="text" class="form-control datetime f_arrivaldate" id="f_arrivaldate" name="f_arrivaldate" placeholder="Flight Arrival Date/Time"  autocomplete="off">
	                   			</div>
							</div>
							<br>
	                   		<?php if($type=='two-way') { ?>
	                   		<div class="row">
	                   			<div class="col-md-2">
	                   			
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				 <input type="text" class="form-control departno " name="departno" id="departno" placeholder="Departure Flight No">
	                   			</div>
	                   			<div class="col-md-5 textleft">
	                   				<input type="text" class="form-control datetime departdate" id="departdate" name="departdate" placeholder="Flight Departure Date/Time"  autocomplete="off">
	                   			</div>
	                   		</div>
	                   		<?php } ?>
						</div>
					</div>
					
					<div class="clearfix"></div>					
				</form>
				<br><br>        
				<h4 class="opensans dark bold">Booking Amount Breakup</h4><br>     <div class="row payment-table-wrap">
	            		<div class="col-md-12">
	            			<table class="table-bordered" >
	            				<thead>
	            					<tr>
	            						<th style="width: 85px;">Transfer Type</th>
	            						<th style="width: 85px;">Date & Time</th>
		            					<th style="width:150px;">Vehicle Name</th>
		            					<th style="width: 100px; text-align: right">Rate</th>
	            					</tr>
	            				</thead>
	            				<tbody>
	            					<tr>
		            					<td><?php echo 'One-way' ?></td>
		            					<td><?php echo $_REQUEST['arrivaldate'] ?></td>
		            					<td><?php echo $transferdetails[0]->VehicleName ?> 
		            					<td style="text-align: right"><?php 
		            					echo currency_type(agent_currency(),$oneway_amt) ?> <?php echo agent_currency() ?></td>
	            					</tr>
	            					<?php if($type=='two-way') { ?>
	            					<tr>
		            					<td><?php echo 'Return' ?></td>
		            					<td><?php echo $_REQUEST['returndate'] ?></td>
		            					<td><?php echo $transferdetails[0]->VehicleName ?> 
		            					<td style="text-align: right"><?php 
		            					echo currency_type(agent_currency(),$oneway_amt) ?> <?php echo agent_currency() ?></td>
	            					</tr>

	            					<?php } ?>
	            				</tbody>
	            				<tfoot>
	            					<tr>
	            						<td colspan="3" style="text-align: right"><strong class="text-blue">Total</strong></td>
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
					    		<td><?php $after = date('Y-m-d', strtotime('-'.$value->from_day.' days', strtotime($fromdate))); 
					    		if($tdate<$after) {
					    			echo $after;
					    		} else { 
					    			echo $tdate;
					    		} ?></td>
					    		<td><?php $before = date('Y-m-d', strtotime('-'.$value->to_day.' days', strtotime($fromdate)));
					    		if($tdate<$before) {
					    			echo $before;
					    		} else { 
					    			echo $before;
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

	

