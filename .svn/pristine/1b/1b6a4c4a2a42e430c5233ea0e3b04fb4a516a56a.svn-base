<?php init_front_head(); ?> 
<?php init_front_head_menu();
	if (count($details)!=0) {
 ?> 
<?php $adults = explode(",", $_REQUEST['adults']) ?>
<?php $child = explode(",", $_REQUEST['child']) ?>
<script src="<?php echo base_url(); ?>assets/js/details.js"></script>  
<div class="container breadcrub">
	<input type="hidden" id="lat_val" value="<?php echo $details['Latitude'] ?>">
	<input type="hidden" id="long_val" value="<?php echo $details['Longitude'] ?>">
    <div>
		<a class="homebtn left" href="<?php echo base_url(); ?>dashboard"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="<?php echo base_url(); ?>hotels">Hotels</a></li>
				<li>/</li>
				<li><a href="#"><?php echo $_REQUEST['countryname'] ?></a></li>
				<li>/</li>					
				<li><a href="#" class="active"><?php echo $details['HotelName'] ?></a></li>					
			</ul>				
		</div>
		<a class="backbtn right" href="#"></a>
	</div>
	<div class="clearfix"></div>
	<div class="brlines"></div>
</div>
<div class="container">
	<input type="hidden" id="currencyPic" value="<?php echo $this->session->userdata('currency') ?>">
	<input type="hidden" id="providers" value="<?php echo $_REQUEST['providers'] ?>">
	<div class="container pagecontainer offset-0">	
			<!-- SLIDER -->
			<div class="col-md-8 details-slider">
				<div id="c-carousel">
					<div id="wrapper">
					<div id="inner">
						<div id="caroufredsel_wrapper2">
							<div id="carousel">
								<img src="<?php echo $details['HotelPicture']; ?>" alt=""/>
							</div>
						</div>
						<div id="pager-wrapper">
							<div id="pager">
								<img src="<?php echo $details['HotelPicture']; ?>" width="120" height="68" alt=""/>	
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
					<h4 class="lh1"><?php echo $details['HotelName'] ?></h4>
					<img src="<?php echo base_url(); ?>skin/images/smallrating-<?php echo $details['Rating'] ?>.png" alt=""/>
				</div>
				
				<div class="line3"></div>
				
				<div class="hpadding20">
					<h2 class="opensans slim green2">Wonderful!</h2>
				</div>
				
				<div class="line3 margtop20"></div>
				
				<div class="clearfix"></div><br/>
				
				<div class="hpadding20" id="favourite">
					
				</div>
			</div>
			<!-- END OF RIGHT INFO -->
	</div>
	<div class="container mt25 offset-0">
			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="cstyle10"></div>
		
				<ul class="nav nav-tabs" id="myTab">
					<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span class="summary"></span><span class="hidetext">Summary</span>&nbsp;</a></li>
					<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span class="rates"></span><span class="hidetext">Room rates</span>&nbsp;</a></li>
					<li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span class="maps"></span><span class="hidetext">Maps</span>&nbsp;</a></li>
				</ul>			
				<div class="tab-content4" >
					<!-- TAB 1 -->				
					<div id="summary" class="tab-pane fade ">
						<p class="hpadding20">
							<?php echo $details['HotelDescription'] ?> 
						</p>
						<div class="line4"></div>
						<p class="hpadding20 collapsebtn2">Address</p>
						<p class="hpadding20">
							<?php echo $details['HotelAddress'] ?> 
						</p>
						<div class="line4"></div>
						
						<!-- Collapse 1 -->	
						<!-- End of collapse 6 -->								
					</div>
					<!-- TAB 2 -->
					<div id="roomrates" class="tab-pane fade active in">
						<form id="hotel_booking_form_id" name="hotel_booking_form_id" method="get" action="<?php echo base_url();?>payment">
							<input type="hidden" name="RequestType" id="RequestType">
							<input type="hidden" name="citycode"  value="<?php echo $_REQUEST['citycode'] ?>">
							<input type="hidden" name="cityname"  value="<?php echo $_REQUEST['cityname'] ?>">
							<input type="hidden" name="countryname" value="<?php echo $_REQUEST['countryname'] ?>">
					    <div class="hpadding20">
							<p class="dark">Your travel rates</p>
							<div class="row">
								<div class="col-sm-2">
										<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $_REQUEST['search_id'] ?>">
										<input type="hidden" name="contract_id" id="contract_id" value="<?php echo $_REQUEST['contract_id'] ?>">
										<input type="hidden" name="max_child_age" id="max_child_age" value="">
									<div class=" textleft">
									    <label class="control-label">Check in</label>
									    <input type="text" style="opacity: 0;height: 34px" class="mySelectCalendar" id="datepicker1" placeholder="mm/dd/yyyy" name="Check_in" value="<?php echo isset($_REQUEST['Check_in']) ? $_REQUEST['Check_in'] : '' ?>" />
								    </div>
									<div class="input-group" style="transform: translateY(-36px);">
									      <input type="text" name=""  class="form-control" id="alternate" value="<?php echo isset($_REQUEST['Check_in']) ? date('d/m/Y' ,strtotime($_REQUEST['Check_in'])) : '' ?>">
									      <label for="datepicker1" class="datepickerLabel input-group-addon"><i class="fa fa-calendar"></i></label>
									</div>
									<input type="hidden" name="mark_up" value="<?php echo $_REQUEST['mark_up'] ?>">
									<input type="hidden" name="room_id" id="room_id">
									<input type="hidden" name="nationality" value="<?php echo $_REQUEST['nationality']; ?>">
									<input type="hidden" name="roomIndex" id="roomIndex" value="">
									<input type="hidden" name="roomName" id="roomName" value="">
								</div>
								<div class="col-sm-2">
									<label class="control-label">Check out</label>
									<input type="text" style="opacity: 0;height: 34px" class=" mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy" name="Check_out" value="<?php echo isset($_REQUEST['Check_out']) ? $_REQUEST['Check_out'] : '' ?>" />
									<div class="input-group"  style="transform: translateY(-36px);">
									      <input type="text" name="" class="form-control" id="alternate2" value="<?php echo isset($_REQUEST['Check_out']) ? date('d/m/Y' ,strtotime($_REQUEST['Check_out'])) : '' ?>">
									      <label for="datepicker2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
								    </div>
								</div>
								<div class="col-sm-6">
									<input type="hidden" name="no_of_rooms" id="no_of_rooms" value="<?php echo count($adults) ?>">
									<div class="row">
									<div class="col-md-6 offset-0">
										<div class="room1" >
											<div class="w50percent">
												<div class="wh90percent textleft">
													<span class="opensans size13"><b>ROOM 1</b></span><br/>
													
													<!-- <div class="addroom1 block"><a onclick="addroom2()" class="grey cpointer">+ Add room</a></div> -->
												</div>
											</div>
											<div class="w50percentlast">	
												<div class="wh90percent textleft right ohidden">
													<div class="w50percent">
														<div class="wh90percent textleft left">
															<span class="opensans size13">Adult </span>
															<select class="form-control mySelectBoxClass" name="adults[]" id="room1-adults" onchange="available_check();">
																<?php for ($i=1; $i <=30 ; $i++) { 
																	if ($adults[0]==$i) {?>
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
																	if ($child[0]==$i) {?>
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
								<?php $Room1ChildAges = explode(",", $_REQUEST['Room1ChildAges']);
									 ?>
								
									<div class="row col-md-12">
										<div class="addroom1 <?php echo isset($child[1]) ? 'none' : 'block' ?>"><a onclick="addroomcustom2('2'); available_check();" class="grey cpointer">+ Add room</a></div>
									</div>
								</div>
								</div>

								<div class="col-md-6">
									<div class="row room1-childAge <?php echo isset($Room1ChildAges[0]) && $Room1ChildAges[0]!="" ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
									<p class="room1-child-p" style="padding-left: 15px;margin-bottom: 0px;">Children Age</p>
									<?php for ($l=1; $l <= 4 ; $l++) {  ?>
										<div class="col-xs-3 room1-child<?php echo $l; ?> <?php echo isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]!="" ? '' : 'hide' ?>" style="padding-right: 0;">
											<select name="room1-childAge[]" class="child-age-option form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]!="" ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>"  onchange="MaxChildAgeCheck('room1-childAges<?php echo $l; ?>'); available_check();">
												<?php for ($i=0; $i <18 ; $i++) { 
													if (isset($Room1ChildAges[$l-1]) && $Room1ChildAges[$l-1]==$i) { ?>
													  <option selected="" value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } else { ?>
													  <option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php }  } ?>
											</select>
										</div>
									<?php } ?>
									</div>
								</div>
								</div>
							<?php for ($i=2; $i <=10 ; $i++) { ?>
								<div class="row room<?php echo $i; ?> <?php echo isset($adults[$i-1]) ? 'block' : 'none' ?>">
									<div class="col-md-6 offset-0">
										<div class="room<?php echo $i; ?> <?php echo isset($adults[$i-1]) ? 'block' : 'none' ?>">
											<div class="clearfix"></div>
											<div class="line1"></div>
											<div class="w50percent">
												<div class="wh90percent textleft">
													<span class="opensans size13"><b>ROOM <?php echo $i; ?></b></span><br/>
												</div>
											</div>
											<div class="w50percentlast">	
												<div class="wh90percent textleft right">
													<div class="w50percent">
														<div class="wh90percent textleft left">
															<span class="opensans size13">Adult</span>
															<select name="adults[]" class="form-control mySelectBoxClass" id="room<?php echo $i ?>-adults" <?php echo isset($adults[$i-1]) ? '' : 'disabled' ?> onchange="available_check();">
																<?php for ($q=1; $q <= 30 ; $q++) { 
																	if (isset($adults[$i-1]) && $adults[$i-1]==$q) { ?>
															  		<option selected="" value="<?php echo $q ?>"><?php echo $q ?></option>
																<?php } else { ?>
															  		<option value="<?php echo $q ?>"><?php echo $q ?></option>
																<?php } } ?>
															</select>
														</div>
													</div>							
													<div class="w50percentlast">
														<div class="wh90percent textleft right">
														<span class="opensans size13">Child</span>
															<select name="Child[]" onchange="available_check();" class="form-control mySelectBoxClass room<?php echo $i ?>-child" <?php echo isset($child[$i-1]) ? '' : 'disabled' ?>>
															 	<?php for ($q=0; $q <= 4 ; $q++) { 
															 		if (isset($child[$i-1]) && $child[$i-1]==$q) { ?>
															  		<option selected="" value="<?php echo $q ?>"><?php echo $q ?></option>
																<?php } else { ?>
															  		<option value="<?php echo $q ?>"><?php echo $q ?></option>
																<?php } } ?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="row col-md-12">
												<?php if ($i!=10) { ?>
												<div class="addroom<?php echo $i; ?> <?php echo isset($adults[$i]) ? 'none' : 'block' ?> grey"><a onclick="addroomcustom<?php echo $i+1; ?>(<?php echo $i+1; ?>); available_check();" class="grey cpointer">+ Add room</a> | <a onclick="removeroomcustom<?php echo $i; ?>(<?php echo $i; ?>);  available_check();" class="orange cpointer"><img src="<?php echo base_url(); ?>skin/images/delete.png" alt="delete"/></a></div>
												<?php } else { ?>
												<a onclick="removeroomcustom<?php echo $i; ?>(<?php echo $i; ?>); available_check();" class="orange cpointer"><img src="<?php echo base_url(); ?>skin/images/delete.png" alt="delete"/></a>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="col-md-6">
									<?php 	 $childAges[$i] = explode(",", $_REQUEST['Room'.$i.'ChildAges']);
									 ?>
									 	
										<div class="row room<?php echo $i; ?>-childAge <?php echo $_REQUEST['Room'.$i.'ChildAges']=="" ? 'hide' : '' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
											<div class="clearfix "></div>
										<div class="line1 "></div>
											<p class="room<?php echo $i; ?>-child-p" style="padding-left: 15px;margin-bottom: 0px">Children's Age</p>
										<?php for ($k=1; $k <=4 ; $k++) { ?>
											<div class="col-xs-3 room<?php echo $i; ?>-child<?php echo $k; ?>  <?php echo isset($childAges[$i][$k-1]) ? '' : 'hide' ?>" style="padding-right: 0;">

											<select name="room<?php echo $i; ?>-childAge[]" class="child-age-option form-control mySelectBoxClass room<?php echo $i; ?>-childAges<?php echo $k ?>" id="room<?php echo $i; ?>-childAge"  <?php echo isset($childAges[$i][$k-1]) && $childAges[$i][$k-1]!="" ? '' : 'disabled' ?> onchange="MaxChildAgeCheck('room<?php echo $i; ?>-childAges<?php echo $k ?>'); available_check();">
												<?php for ($j=0; $j <18 ; $j++) {
													if (isset($childAges[$i][$k-1]) && $childAges[$i][$k-1]==$j) { ?>
													  <option selected="" value="<?php echo $j ?>"><?php echo $j ?></option>
												<?php } else { ?>
													  <option value="<?php echo $j ?>"><?php echo $j ?></option>
												<?php } } ?>
											</select>
											</div>
										<?php } ?>

									</div>
								</div>
								</div>
									
								<?php } ?>
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
						<h4 class="hpadding20 dark contractCheckDiv">Room type</h4>
						<div id="modal" name = "modal" class="modal fade-scale" role="dialog">
						</div>
						<div class="line2"></div>
						<!-- <div class="board-list-div col-md-12 contractCheckDiv"></div> -->
						<div class="roomListClass"></div>
						<div class="line2 contractCheckSuccessDiv hide"></div>
						</div>
                      <input type="hidden" id="token" name="token" value="<?php echo date('YmdHis'); ?>">
						</form>
					</div>
					<!-- TAB 4 -->					
					<div id="maps" class="tab-pane fade">
						<div class="hpadding20">
							<div id="map-canvas"></div>
						</div>
					</div>
					
					<!-- TAB 5 -->					
				</div>
			</div>
	</div>
</div>
<?php } else { ?> 
	<div class="container" style="margin-top: 100px">
		<div class="container mt25 offset-0">
			<div class="col-md-12 pagecontainer2 offset-0">
				
				 <div class="tab-content4" >
								
					<div id="summary" style="height:200px">
						<p class="hpadding20">
							No hotels found 
						</p>
														
					</div>
				</div>
			</div>
		</div>
	</div>


<?php } init_front_black_tail(); ?> 