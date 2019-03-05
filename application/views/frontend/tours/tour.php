<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/tour.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<!-- id="dajy" was here -->
<style type="text/css"> 
.date-picker-wrapper {
	/*left: 976.234px ! important;*/
	/*top: 302px ! important;*/
	margin-top: 5px ! important;
	/*margin-left: 2.3px ! important;*/
}

/*.search-dropdown:empty {
	display: none;
}*/
.search-dropdown {
	position: absolute;
    max-height: 200px;
    top: 100%;
    left: 0;
    z-index: 1000;
    width: 93.5%;
    padding: 0;
    margin: 0;
    font-size: 14px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
.focus-li > a > i {
	color: #72bf66;
}
.focus-li {
    background-color: #eee;
}
.search-dropdown li {
	padding: 3px 8px;
	cursor: pointer;
}

.search-dropdown li:hover {
	background-color: #eee;
}
.search-dropdown li > a > i {
	margin-right: 8px;
}
.search-dropdown li:hover > a > i {
	color: #72bf66;
}
.search-dropdown li a {
	text-decoration: none;
	width: 100%;
	display: block;
	letter-spacing: .5px;
}
.search-dropdown li > a > span {
	color: #9e9e9e;
	font-size: 80%;
	letter-spacing: .5px;
}
</style>
<div id="" class="fullscreen-container mtslide sliderbg fixed">
	<div class="fullscreenbanner">
		<ul>
			<!-- papercut fade turnoff flyin slideright slideleft slideup slidedown-->
			<!-- FADE -->
			<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
				<img src="<?php echo base_url(); ?>skin/images/slider/slider1.jpg" width="100%" alt=""/>
			</li>	

			<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
				
				<img src="<?php echo base_url(); ?>skin/images/slider/slider2.jpg" width="100%" alt=""/>
			</li>	

			<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
				<img src="<?php echo base_url(); ?>skin/images/slider/slider3.jpg" width="100%" alt=""/>
			</li>
			
			<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
				<img src="<?php echo base_url(); ?>skin/images/slider/slider4.jpg" width="100%" alt=""/>
			</li>
			

		</ul>
		<div class="tp-bannertimer none"></div>
	</div>
</div>
<script type="text/javascript">

	var tpj=jQuery;
	tpj.noConflict();

	tpj(document).ready(function() {
		favourite_dropdown();
		if (tpj.fn.cssOriginal!=undefined)
			tpj.fn.css = tpj.fn.cssOriginal;

		tpj('.fullscreenbanner').revolution(
		{
			delay:9000,
			startwidth:1170,
			startheight:500,

				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:0,
				navigationType:"bullet",				// bullet, thumb, none
				navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:false,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


				navigationHAlign:"left",				// Vertical Align top,center,bottom
				navigationVAlign:"bottom",					// Horizontal Align left,center,right
				navigationHOffset:30,
				navigationVOffset:30,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				touchenabled:"on",						// Enable Swipe Function : on/off
				hideArrowsOnMobile: "off",


				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
				hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
				hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value

				fullWidth:"off",							// Same time only Enable FullScreen of FullWidth !!
				autoHeight: "off",
				fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!

				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});

	
   var nextDay = new Date(tpj("#datepicker2").val());
 nextDay.setDate(nextDay.getDate() + 1);
 tpj("#datepicker2").datepicker({
 	minDate: +1,
 	altField: "#alternate2",
 	altFormat: "dd/mm/yy",
 	onSelect: function(dateText) {
 		// total_night_calc1();

 	}
 });
 tpj("#datepicker3").datepicker({
 	minDate: 0,
 	altField: "#alternate3",
 	altFormat: "dd/mm/yy",
 	onSelect: function(dateText) {
 		var nextDay = new Date(dateText);
 		nextDay.setDate(nextDay.getDate() + 1);
 		tpj("#datepicker2").datepicker('option', 'minDate', nextDay);
 		// total_night_calc1();
 		setTimeout(function(){
 			tpj( "#datepicker2" ).datepicker('show');
 		}, 16);
 	}
 });
 tpj("#alternate2").click(function() {
 	tpj( "#datepicker2" ).trigger('focus');
 });
 tpj("#alternate3").click(function() {
 	tpj( "#datepicker3" ).trigger('focus');
 });
/* var input = document.getElementById('location');
 var autocomplete = new google.maps.places.Autocomplete(input);*/


 <?php for ($l = 1; $l <=11 ; $l++) { ?>
 	tpj(".room<?php echo $l ?>-child").change(function() {
 		var room = tpj(this).val();
 		<?php for ($k = 1; $k <= 4; $k++) { ?>
 			tpj(".room<?php echo $l ?>-child<?php echo $k ?>").addClass('hide');
 			tpj(".room<?php echo $l ?>-childAges<?php echo $k ?>").attr("disabled","disabled");
 		<?php } ?>
 		if (room!=0) {
 			if (room==1) {
 				tpj(".room<?php echo $l ?>-child-p").text("Child Age");
 			} else {
 				tpj(".room<?php echo $l ?>-child-p").text("Children Age");
 			}
 			tpj(".room<?php echo $l ?>-childAge").removeClass('hide');

 			for (var k = 1; k <= room; k++) {
 				tpj(".room<?php echo $l ?>-child"+k).removeClass('hide');
 				tpj(".room<?php echo $l ?>-childAges"+k).removeAttr("disabled");
 			}
 		} else {
 			tpj(".room<?php echo $l ?>-childAge").addClass('hide');
 		}
 	});
 <?php } ?>



});
window.onload = function() {
	window.setTimeout(function(){
		message_hide();
	}, 3000);
};
function message_hide() {
	tpj(".sucess_msg_fix_toaster").hide();
}
function favourite_dropdown() {
	tpj.ajax({    
		type: 'post',
		url: base_url+'dashboard/favourite_dropdown',
		cache: false,
		success: function (response) {
        // alert(response);
        tpj(".favourite_dropdown").html(response);
    }        
});
}
function currency_change(type){
	tpj.ajax({    
		type: 'post',
		url: base_url+'login/sessions_reset?type='+type,
		cache: false,
		success: function (response) {
			document.location.reload(true);
        // window.location.href=window.location.href;
    }        
});
}
</script>
<!-- WRAP -->
<div class="wrap cstyle03">
	
	<div class="container mt-250 z-index100">		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="bs-example bs-example-tabs cstyle04">
					
					<ul class="nav nav-tabs hidden-xs" id="myTab">
						<li onclick="mySelectUpdate()" class="active hide"><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Tour</a></li>
						<!-- <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#Sights"><span class="sights"></span>Sights</a></li> -->
					</ul>
					<form action="<?php echo base_url(); ?>tour/tourlist" id="tour_search_form" method="get">
						<input type="hidden" name="price" value="10;10000">
						<input type="hidden" name="view_type" id="view_type" value="grid">
						<div class="tab-content" id="myTabContent">
							<div class="blur-me"></div>
							<div id="hotel" class="tab-pane fade active in">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<label for="" class="dest_err control-label text-white">Enter Destination</label>
										<!--<input type="text" class="form-control b-r-40" name="location" placeholder="Enter country name" id="location">-->
										<input type="text" class="form-control b-r-40" name="location" placeholder="Enter country name" id="location" autocomplete="off">
										<input type="hidden" class="form-control b-r-40" name="cityId" id="cityId">
										<input type="hidden" class="form-control b-r-40" name="cityname" id="cityname">
										<input type="hidden" class="form-control b-r-40" name="countryname" id="countryname">
										<ul class="search-dropdown txtcountry" style="margin-left:15px;margin-right:0px;display:none" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
									</div>	
									<?php $date = date('m/d/Y', strtotime("+1 day", strtotime(date('m/d/Y'))));
									$date1 = date('d/m/Y', strtotime("+1 day", strtotime(date('m/d/Y')))); ?>
									<div class="col-xs-6 col-md-6">
										<label class="nat_err control-label text-white">Nationality</label>
										<select class="form-control" name="nationality" id="Nationality">
											<option value="">--select--</option>
											<?php foreach ($nationality as $key => $value) { ?>
												<option  value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="row" style="margin-top: 15px;">
									<div class="col-xs-6 col-md-6 hidden-xs">
										<label for="" class="control-label htl_err text-white">Type of Service</label>
										<input type="text" id="serviceType" name="serviceType" class="form-control b-r-40" placeholder="Enter type of service" />
									</div>	
									<div class="col-xs-6 col-md-6">
										<div class=" textleft">
											<label for="" class="arrival_err control-label text-white">Date of Tour</label>
											<input type="text" style="width: 100% ! important;opacity: 0" class="mySelectCalendar" id="datepicker3" name="arrivaldate" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y') ?>" />
										</div>
										<div class="input-group" style="transform: translateY(-27px);">
											<input type="text"  name="" class="form-control" id="alternate3" value="<?php echo date('d/m/Y') ?>">
											<label for="datepicker3" class="input-group-addon"><i class="fa fa-calendar"></i></label>
										</div>
									</div>
									<div class="col-xs-6 col-md-1">
										<label for="" class="adults_err control-label text-white">Adults</label>
										<select id="adults" name="adults[]" class="form-control mySelectBoxClass">
											<option value="1">1</option>
											<option selected value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
									<div class="col-xs-6 col-md-1">
										<label for="" class="control-label text-white">Child</label>
										<select name="Child[]" class="form-control mySelectBoxClass room1-child">
											<option value=""></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
									</div>

									<!-- <div class="hidden-xs col-xs-6 col-md-3"> -->
										<!-- <label for="" class="control-label text-white">Markup %</label> -->
										<input type="hidden" name="mark_up" class="form-control b-r-40"/>
										<!-- </div> -->
										
										<div class="col-xs-6 col-md-3 scol-md-offset-9">
											<div class="row room1-childAge <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
												<p style="margin-bottom: 0 ! important"><label class="room1-child-p rate_err control-label text-white" style="padding-left: 15px;">Children Age</label></p>
												<?php for ($l=1; $l <= 4 ; $l++) {  ?>
													<div class="col-xs-3 room1-child<?php echo $l; ?> <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'hide' ?>" style="padding-right: 0;">
														<select name="room1-childAge[]" class="form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>">
															<?php for ($i=0; $i <18 ; $i++) { ?>
																<option value="<?php echo $i ?>"><?php echo $i ?></option>
															<?php } ?>
														</select>
													</div>
												<?php } ?>
												
											</div>
										</div>
										
										
										<div class="col-xs-6 col-md-6 col-md-offset-6">
											<button type="button" id="tour_search_btn" class="btn-search btn-block">Find Tours</button>
										</div>
									</div>

									<div class="clearfix"></div>
									<div class="room1 margtop15">
										<div class="w50percentlast">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		

		<!-- END OF WRAP -->
		<?php init_front_tail(); ?>

