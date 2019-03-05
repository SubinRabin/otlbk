<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<style type="text/css">
	.hidden_book{
		display: none;
	}
	.date-picker-wrapper {
		/*left: 414.234px ! important;*/
    	top: 840px ! important;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		checkavailabletours();
		$("#arrivaldate").datepicker({
		 	minDate: 0,
		 	altField: "#alternate",
		 	altFormat: "dd/mm/yy",
		 	onSelect: function(dateText) {
		 		checkavailabletours();
		 	}
 		});
 		$("#alternate").click(function() {
 			$( "#arrivaldate" ).trigger('focus');
 		});
    favourite_ajax('<?php echo $this->session->userdata('agent_id') ?>','<?php echo $_REQUEST['tourid'] ?>');
  	<?php for ($l = 1; $l <=11 ; $l++) { ?>
	  	$(".room<?php echo $l ?>-child").change(function() {
	  		var room = $(this).val();
	  		<?php for ($k = 1; $k <= 4; $k++) { ?>
	  			$(".room<?php echo $l ?>-child<?php echo $k ?>").addClass('hide');
	  			$(".room<?php echo $l ?>-childAges<?php echo $k ?>").attr("disabled","disabled");
	  		<?php } ?>
	  		if (room!=0) {
	  			if (room==1) {
	  				$(".room<?php echo $l ?>-child-p").text("Child Age");
	  			} else {
	  				$(".room<?php echo $l ?>-child-p").text("Children Age");
	  			}
	  			$(".room<?php echo $l ?>-childAge").removeClass('hide');

	  			for (var k = 1; k <= room; k++) {
	  				$(".room<?php echo $l ?>-child"+k).removeClass('hide');
	  				$(".room<?php echo $l ?>-childAges"+k).removeAttr("disabled");
	  			}
	  		} else {
	  			$(".room<?php echo $l ?>-childAge").addClass('hide');
	  		}
	  		checkavailabletours();
	  	});
	  <?php } ?>


	});
</script>
<!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>skin/plugins/jslider/css/jslider.round-blue.css" type="text/css">
        <!-- jQuery-->  
        <script src="<?php echo base_url(); ?>skin/assets/js/jquery-ui.js"></script>  
        <script src="<?php echo base_url(); ?>assets/js/details.js"></script>  
        <!-- end -->
<div class="container breadcrub">
    <div>
		<a class="homebtn left" href="<?php echo base_url(); ?>dashboard"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="<?php echo base_url(); ?>tour">Tours</a></li>
				<li>/</li>
				<li><a href="#"><?php echo $view[0]->city ?></a></li>
				<li>/</li>					
				<li><a href="#" class="active"><?php echo $view[0]->type ?></a></li>					
			</ul>				
		</div>
		<a class="backbtn right" href="#"></a>
	</div>
	<div class="clearfix"></div>
	<div class="brlines"></div>
</div>
<div class="container">
	<input type="hidden" id="currencyPic" value="<?php echo $this->session->userdata('currency') ?>">
	
	<div class="container pagecontainer offset-0">	
			<!-- SLIDER -->
			<div class="col-md-8 details-slider">
				<div id="c-carousel">
					<div id="wrapper">
					<div id="inner">
						<div id="caroufredsel_wrapper2">
							<div id="carousel">							
									<img src="<?php echo base_url(); ?>uploads/tour_services_images/<?php echo $view[0]->tourid; ?>/<?php echo $view[0]->image; ?>" alt=""/>	
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<button id="prev_btn2" class="prev2"><img src="<?php echo base_url(); ?>skin/images/spacer.png" alt=""/></button>
					<button id="next_btn2" class="next2"><img src="<?php echo base_url(); ?>skin/images/spacer.png" alt=""/></button>		
						
					</div>
				</div> <!-- /c-carousel -->
			</div>
			<!-- END OF SLIDER -->			
			<!-- RIGHT INFO -->
			<div class="col-md-4 detailsright offset-0">
				<div class="padding20">
					<h4 class="lh1"><?php echo $view[0]->type ?></h4>
				</div>
				
				<div class="line3"></div>
				
				<div class="hpadding20">
					<h2 class="opensans slim green2">Wonderful!</h2>
				</div>
				
				<div class="line3 margtop20"></div>
				
				<div class="col-md-6 bordertype1 padding20">
					<div id="guest_recomend_percentage"></div>
				</div>
				<div class="col-md-6 bordertype2 padding20">
					<div id="review_guest_rating"></div>
				</div>
				<div class="col-md-6 bordertype3">
					<div id="review_rating_count"></div>
				</div>
				<div class="col-md-6 bordertype3">
					<!-- <a onclick="add_review();trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6();" data-toggle="tab" href="#reviews" class="grey">+Add review</a> -->
					<a onclick="#" data-toggle="tab" href="#reviews" class="grey">+Add review</a>
				</div>
				<div class="clearfix"></div><br/>
				
				<div class="hpadding20" id="favourite">
					
					<!-- <a href="<?php echo base_url(); ?>payment?room=<?php echo $_REQUEST['room'] ?>" class="booknow margtop20 btnmarg">Book now</a> -->
				</div>
			</div>
			<!-- END OF RIGHT INFO -->
	</div>
	<div class="container mt25 offset-0">
			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="cstyle10"></div>
		
				<ul class="nav nav-tabs" id="myTab">
					<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span class="summary"></span><span class="hidetext">Summary</span>&nbsp;</a></li>
					<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#tourrates"><span class="rates"></span><span class="hidetext">Tour Rates</span>&nbsp;</a></li>
					<li onclick="mySelectUpdate()"><a data-toggle="tab" href="#highlights"><span class="rates"></span><span class="hidetext">Highlights</span>&nbsp;</a></li>
				</ul>			
				<div class="tab-content4" >
					<!-- TAB 1 -->				
					<div id="summary" class="tab-pane fade ">
						<p class="hpadding20">
							<?php echo $view[0]->description ?> 
						</p>
						<div class="line4"></div>
						
						<!-- Collapse 1 -->	
						<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse1">
						  <?php echo $view[0]->city ?> <span class="collapsearrow"></span>
						</button>
						
						<!-- End of collapse 1 -->	
						
						<div class="line4"></div>						
						
						<!-- Collapse 2 -->	
						<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse2">
						  Near by places <span class="collapsearrow"></span>
						</button>
						
						<div id="collapse2" class="collapse in">
							<div class="hpadding20">
								<?php echo $view[0]->near_by ?>
							</div>
							<div class="clearfix"></div>
						</div>
						<!-- End of collapse 2 -->	
						
						<div class="line4"></div>										
					</div>
					<!-- TAB 2 -->
					<div id="tourrates" class="tab-pane fade active in">
						<form id="tour_booking_form_id" name="tour_booking_form_id" method="get" action="<?php echo base_url();?>tour/tourview">
							<input type="hidden" name="RequestType" id="RequestType">
					    <div class="hpadding20">
							<p class="dark"></p>
							<div class="row">
								<div class="col-sm-2">
										<input type="hidden" name="tourid" id="tourid" value="<?php echo $_REQUEST['tourid'] ?>">
										<input type="hidden" name="contractid" id="contractid" value="<?php echo $_REQUEST['contractid'] ?>">
										<input type="hidden" name="cityId" id="cityId" value="<?php echo $_REQUEST['cityId'] ?>">
									<div class=" textleft">
									    <label class="control-label">Arrival Date</label>
									    <input type="text" style="opacity: 0;height: 34px" class="mySelectCalendar" id="arrivaldate" placeholder="mm/dd/yyyy" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" />
								    </div>
									<div class="input-group" style="transform: translateY(-36px);">
									      <input type="text" name=""  class="form-control" id="alternate" value="<?php echo isset($_REQUEST['arrivaldate']) ? date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) : '' ?>">
									      <label for="arrivaldate" class="datepickerLabel input-group-addon"><i class="fa fa-calendar"></i></label>
									</div>
									<input type="hidden" name="nationality" value="<?php echo $_REQUEST['nationality']; ?>">
								</div>
								<div class="col-sm-6">
									<div class="row">
									 <div class="col-md-3 offset-0">
											<div class="w20percentlast">	
											<div class="wh90percent textleft right ohidden">
												<div class="w50percent">
													<div class="wh90percent textleft left">
														<span class="opensans size13">Adult </span>
														<select class="form-control mySelectBoxClass" name="adults[]" id="room1-adults" onchange="checkavailabletours();">
															<?php for ($i=1; $i <=30 ; $i++) { 
																if ($_REQUEST['adults'][0]==$i) {?>
														  		<option  selected="" value="<?php echo $i?>"><?php echo $i?></option>
															<?php } else { ?>
														  		<option value="<?php echo $i?>"><?php echo $i?></option>

															<?php 	}
															} ?>
														</select>
													</div>
												</div>							
												<div class="w50percentlast">
													<div class="wh90percent textleft right ohidden">
													<span class="opensans size13">Child</span>
														<select name="Child[]" class="form-control mySelectBoxClass room1-child">
														  <?php for ($i=0; $i <5 ; $i++) { 
																if ($_REQUEST['Child'][0]==$i) {?>
														  		<option  selected="" value="<?php echo $i?>"><?php echo $i?></option>
															<?php } else { ?>
														  		<option value="<?php echo $i?>"><?php echo $i?></option>

															<?php 	}
															} ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
								</div>

								<div class="col-md-6">
									<div class="row room1-childAge <?php echo array_sum($_REQUEST['Child'])!=0 ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
									<p class="room1-child-p" style="padding-left: 15px;margin-bottom: 0px;">Children Age</p>
									<?php for ($l=1; $l <= 4 ; $l++) {  ?>
										<div class="col-xs-3 room1-child<?php echo $l; ?> <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'hide' ?>" style="padding-right: 0;">
											<select name="room1-childAge[]" class="form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>" onchange="checkavailabletours()">
												<?php for ($i=0; $i <18 ; $i++) { 
												if ($_REQUEST['room1-childAge'][$l-1]==$i) { ?>
													<option selected=""  value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } else { ?>
													<option  value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php }
											} ?>
											</select>
										</div>
									<?php } ?>
									</div>
								</div>
								</div>
							
									</div>
								
							</div>
							

						<div class="clearfix"></div>
						</div>
						<div class="dateCheckLoad">
							<div class="line2"></div>
							<div class="spin-wrapper" style="/* display: none; */text-align: center;">
								<img src="<?php echo base_url(); ?>/assets/images/ellipsis-spinner.gif" alt="" style="width: 100px;">
							</div>
							<div class="line2"></div>
						</div>
						<div class="dateCheckLoadAfter">
						<h4 class="hpadding20 dark contractCheckDiv">Tour Rates</h4>
						<div id="modal" name = "modal" class="modal fade-scale" role="dialog">
						</div>
						<div class="line2"></div>
						<!-- <div class="board-list-div col-md-12 contractCheckDiv"></div> -->
						<!-- <div class="roomListsortClass"></div> -->
						<div class="hides contractCheckDiv">
						
								
								<div class="RateCheckdiv">
									<div class="padding20">
										<div class="col-md-4 offset-0">
											
										</div>
										<div class="col-md-8 offset-0">
											<div class="col-md-12 mediafix1">
												<!-- <h4 class="opensans text-transform dark bold margtop1"><?php echo $view[0]->type ?></h4>
												<p>Max childage: <?php echo $value->max_childAge ?></p> -->
											</div>
										</div>
										<div class="col-md-12 mediafix1 pad_left_0">
												<div class="clearfix"></div>
												<div class="roomRateCheckdiv">
													
												</div>
											</div>
									</div>								
								</div>

								<div class="clearfix clearfixdiv"></div>
								<div class="line2 linediv"></div>

							
						</div>
						<div class="contractCheckSuccessDiv hide text-center col-md-12">
							<p>Rooms not available for these days!</p>
						</div>
						<div class="line2 contractCheckSuccessDiv hide"></div>
						</div>
                      <input type="hidden" id="token" name="token" value="<?php echo date('YmdHis'); ?>">
						</form>
					</div>
					<!-- TAB 3 -->					
					<div id="highlights" class="tab-pane fade">
						<p class="hpadding20">
							<?php echo $view[0]->highlights ?>
						</p>
						
						<div class="line4"></div>						
					</div>
				</div>
			</div>
	</div>
</div>

<?php init_front_black_tail(); ?> 
    <script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.slider.js"></script>

