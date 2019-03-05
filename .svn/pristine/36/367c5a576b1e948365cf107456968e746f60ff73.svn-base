<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>skin/js/transfer_autocomplete.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&libraries=places&callback=initMap"
        async defer></script>
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
    /* top: 50px; */
    left: 15px;
    z-index: 1000;
    width: 93.5%;
    padding: 0px;
    margin: 0;
    font-size: 12px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
.search-dropdown li {
	padding: 3px 8px;
	cursor: pointer;
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
.datePic-style {
	width: 47%;
	float: left;
}
.return {
  margin-left: 25px;
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
  var xhrTimer;
  var theXRequest;
  /* Destination search key events start */
  tpj("#location").keydown(function(e) {
    if (e.keyCode == '38') {
          if (tpj(".search-dropdown li").hasClass("focus-li")) {
            index = tpj(".search-dropdown").children('li.focus-li').index();
            tpj(".search-dropdown").children('li').eq(index).removeClass('focus-li');
            tpj(".search-dropdown").children('li').eq(index-1).addClass('focus-li');
            if (tpj(".search-dropdown").children('li').length == index-1) {
              tpj(".search-dropdown li:last-child").addClass('focus-li');
            }
          } else {
            tpj(".search-dropdown li:last-child").addClass('focus-li');
          }
      }
      else if (e.keyCode == '40') {
          // down arrow
          if (tpj(".search-dropdown li").hasClass("focus-li")) {
            index = tpj(".search-dropdown").children('li.focus-li').index();
            tpj(".search-dropdown").children('li').eq(index).removeClass('focus-li');
            tpj(".search-dropdown").children('li').eq(index+1).addClass('focus-li');
            if (tpj(".search-dropdown").children('li').length == index+1) {
              tpj(".search-dropdown li:first-child").addClass('focus-li');
            }
          } else {
            tpj(".search-dropdown li:first-child").addClass('focus-li');
          }
      }
      if (e.keyCode  == 13) {
        tpj(".focus-li a").trigger('click');
      }
  });

  tpj("#location").bind('input',function(e) {
      tpj('#DropdownCountry').slideUp('fast');
      tpj('.countrycode').val("");
      tpj('.cityname').val("");
      tpj('.countryname').val("");
      tpj('.airportID').val("");
    if (theXRequest) { theXRequest.abort(); }
    clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
      xhrTimer = setTimeout(function () { // assign timer a new timeout 
        tpj('#DropdownCountry li').remove();
          theXRequest = tpj.ajax({
            dataType: 'json',
            type: 'post',
            url: base_url+'transfer/GetAirportName?keyword='+tpj("#location").val(),
            cache: false,
            async: true,
            success: function (data) {
              tpj.each(data, function (key,value) {
              if (data.length >= 0)
               tpj('#DropdownCountry').append('<li  role="displayCountries" ><a airportID="'+value.id+'"CityName="'+value.cityName+'" CountryName="'+value.countryName+'" CountryCode="'+value.countryCode+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-plane"></i>' + value.name + ',<span> ' + value.cityName + '</span>,<span>' + value.countryName + '</span> <span> (' + value.code + ')</span></a></li>');
                    });
                tpj('#DropdownCountry').show();

            }

          });
      }, 500); 
  });

  tpj('ul.txtcountry').on('click', 'li a', function () {
      // alert(tpj(this).attr('CityCode'));
            tpj('#location').val(tpj(this).text());
            tpj('.countrycode').val(tpj(this).attr('CountryCode'));
            tpj('.cityname').val(tpj(this).attr('CityName'));
            tpj('.countryname').val(tpj(this).attr('CountryName'));
            tpj('.airportID').val(tpj(this).attr('airportID'));
            tpj('#DropdownCountry').slideUp('fast');
            tpj('#DropdownCountry li').remove();
            tpj('#region').val('');
            initMap();
  });
  tpj("#location").focusout(function () {
    // tpj('#DropdownCountry').slideUp('fast');
    if (tpj(".countrycode").val() === '') {
      tpj('#location').val('');
      tpj('.cityname').val('');
      tpj('.countryname').val();
      tpj('.airportID').val();
    }
  });
  tpj("#returnlocation").keydown(function(e) {
    if (e.keyCode == '38') {
        if (tpj(".returnsearch-dropdown li").hasClass("focus-li")) {
          index = tpj(".returnsearch-dropdown").children('li.focus-li').index();
          tpj(".returnsearch-dropdown").children('li').eq(index).removeClass('focus-li');
          tpj(".returnsearch-dropdown").children('li').eq(index-1).addClass('focus-li');
          if (tpj(".returnsearch-dropdown").children('li').length == index-1) {
            tpj(".returnsearch-dropdown li:last-child").addClass('focus-li');
          }
        } else {
          tpj(".returnsearch-dropdown li:last-child").addClass('focus-li');
        }
    }
    else if (e.keyCode == '40') {
        // down arrow
        if (tpj(".returnsearch-dropdown li").hasClass("focus-li")) {
          index = tpj(".returnsearch-dropdown").children('li.focus-li').index();
          tpj(".returnsearch-dropdown").children('li').eq(index).removeClass('focus-li');
          tpj(".returnsearch-dropdown").children('li').eq(index+1).addClass('focus-li');
          if (tpj(".returnsearch-dropdown").children('li').length == index+1) {
            tpj(".returnsearch-dropdown li:first-child").addClass('focus-li');
          }
        } else {
          tpj(".returnsearch-dropdown li:first-child").addClass('focus-li');
        }
    }
    if (e.keyCode  == 13) {
      tpj(".focus-li a").trigger('click');
    }
  });
  tpj("#returnlocation").bind('input',function(e) {
      tpj('#returnDropdownCountry').slideUp('fast');
      tpj('.returncitycode').val("");
      tpj('.returncityname').val("");
      tpj('.returncountryname').val("");
    if (theXRequest) { theXRequest.abort(); }
    clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
      xhrTimer = setTimeout(function () { // assign timer a new timeout 
        tpj('#returnDropdownCountry li').remove();
          theXRequest = tpj.ajax({
            dataType: 'json',
            type: 'post',
            url: base_url+'welcome/GetCountryName?keyword='+tpj("#returnlocation").val(),
            cache: false,
            async: true,
            success: function (data) {
              tpj.each(data, function (key,value) {
                if (data.length >= 0)
                tpj('#DropdownCountry').append('<li  role="displayCountries" ><a CityName="'+value.cityName+'" CountryName="'+value.countryName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.name + ',<span> ' + value.cityName + '</span>,<span> ' + value.countryName + '</span></a></li>');
                    });
                tpj('#returnDropdownCountry').show();
            }
          });
      }, 500); 
  });
  tpj('ul.returntxtcountry').on('click', 'li a', function () {
      // alert(tpj(this).attr('CityCode'));
            tpj('#returnlocation').val(tpj(this).text());
            tpj('.returncitycode').val(tpj(this).attr('CityCode'));
            tpj('.returncityname').val(tpj(this).attr('CityName'));
            tpj('.returncountryname').val(tpj(this).attr('CountryName'));
            tpj('#returnDropdownCountry').slideUp('fast');
            tpj('#returnDropdownCountry li').remove();
  });
  tpj("#returnlocation").focusout(function () {
    // tpj('#DropdownCountry').slideUp('fast');
    if (tpj(".returncitycode").val() === '') {
        tpj('#returnlocation').val('');
        tpj('.returncitycode').val('');
      tpj('.returncityname').val('');
      tpj('.returncountryname').val();
    }
  });
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
	tpj("#transfer_search_btn").click(function() {
		var location = tpj("#location").val();
		var Nationality = tpj("#Nationality").val();
		var region = tpj("#region").val();
		var arrivaldate = tpj("#arrivaldate").val();
		var returndate = tpj("#returndate").val();
		var type = tpj('input[name="transfertype"]:checked').val();
		if (location=="" && Nationality=="" && region=="") {
			tpj(".dest_err").css("color","red");
			tpj(".nat_err").css("color","red");
			tpj(".region_err").css("color","red");
			if (type=="two-way") {
				if (arrivaldate=="" || returndate=="") {
					tpj(".chckin_err").css("color","red");
				} else if(returndate!="" && arrivaldate!="") {
					tpj(".chckin_err").css("color","white");
				}
			} else {
				if (arrivaldate=="") {
					tpj(".chckin_err").css("color","red");
				} else {
					tpj(".chckin_err").css("color","white");
				}
			}
		} else if(location=="") {
			tpj(".dest_err").css("color","red");
		} else if(region=="") {
			tpj(".dest_err").css("color","white");
			tpj(".region_err").css("color","red");
		} else if(Nationality=="") {
			tpj(".dest_err").css("color","white");
			tpj(".region_err").css("color","white");
			tpj(".nat_err").css("color","red");
		} else {
			tpj(".dest_err").css("color","white");
			tpj(".region_err").css("color","white");
			tpj(".nat_err").css("color","white");
			if (type=="two-way") {
				if (arrivaldate=="" || returndate=="") {
					tpj(".chckin_err").css("color","red");
				} else if(returndate!="" && arrivaldate!="") {
					tpj(".chckin_err").css("color","white");
					tpj("#transfer_search_form").submit();
				}
			} else {
				if (arrivaldate=="") {
					tpj(".chckin_err").css("color","red");
				} else {
					tpj(".chckin_err").css("color","white");
					tpj("#transfer_search_form").submit();
				}
			}
		}

	});
 tpj(".type").click(function() {
  var type=tpj('input[name=transfertype]:checked').val();
  if(type=='arrival'){
    tpj(".returndate").addClass('hide');
    tpj(".arrivaldate").removeClass('datePic-style');
    tpj(".arrivaldate").removeClass('hide');
    tpj(".region_err").text('Drop off location');
    tpj(".dest_err").text('Pick up location');
  } else if(type=='departure'){
    tpj(".returndate").removeClass('hide');
    tpj(".returndate").removeClass('datePic-style');
    tpj(".arrivaldate").addClass('hide');
    tpj(".returndate").removeClass('return');
    tpj(".dest_err").text('Drop off location');
    tpj(".region_err").text('Pick up location');
  } else if(type=='return'){
     tpj(".returndate").removeClass('hide');
     tpj(".arrivaldate").addClass('datePic-style');
     tpj(".returndate").addClass('datePic-style');
     tpj(".arrivaldate").removeClass('hide');
     tpj(".returndate").addClass('return');
     tpj(".region_err").text('Drop off location');
     tpj(".dest_err").text('Pick up location');
  }
 });

tpj.datetimepicker.setDateFormatter({
  parseDate: function (date, format) {
      var d = moment(date, format);
      return d.isValid() ? d.toDate() : false;
  },
  formatDate: function (date, format) {
      return moment(date).format(format);
  },
});
tpj(".datetime").datetimepicker({
	format: 'DD/MM/Y HH:mm',
	formatDate: 'YYYY/MM/DD',
	formatTime: 'HH:mm',
	minDate:0,
});
/* var input = document.getElementById('location');
 var autocomplete = new google.maps.places.Autocomplete(input);*/

   


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
function initMap() {
        var input = document.getElementById('region');
        var countries = tpj(".countrycode").val();

       // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set initial restrict to the greater list of countries.
        autocomplete.setComponentRestrictions(
            {'country': [countries]});

        // Specify only the data fields that are needed.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

      }
</script>
<!-- WRAP -->
<div class="wrap cstyle03">
	 
	<div class="container mt-250 z-index100">		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="bs-example bs-example-tabs cstyle04">
					
					<ul class="nav nav-tabs hidden-xs" id="myTab">
						<li onclick="mySelectUpdate()" class="active hide"><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Transfer</a></li>
						<!-- <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#Sights"><span class="sights"></span>Sights</a></li> -->
					</ul>
					<form action="<?php echo base_url(); ?>transfer/searchresults" id="transfer_search_form" method="get">
						<input type="hidden" name="price" value="10;10000">
						<input type="hidden" name="view_type" id="view_type" value="list">
						<input type="hidden" name="cityname" class="cityname" value="">
						<input type="hidden" name="countryname" class="countryname" value="">	
						<input type="hidden" name="countrycode" class="countrycode" value="">	
						<input type="hidden" name="airportID" class="airportID" value="">	
						<div class="tab-content" id="myTabContent">
							<div class="blur-me"></div>
							<div id="hotel" class="tab-pane fade active in">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<label for="location" class="dest_err control-label text-white">Pick up location</label>
										<input type="text" name="location" id="location" class="form-control" placeholder="Enter country name" value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?>" autocomplete="off">
							
										<ul class="txtcountry search-dropdown" style="margin-right:0px;display:none;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
									</div>	
									<div class="col-md-6">
										<label for="region" class="region_err control-label text-white">Drop-off location</label>
										<input type="text" name="region" id="region" class="form-control" placeholder="Enter the location" value="" autocomplete="off">
										<input type="hidden" name="countrycode" class="countrycode">
									</div>
									<?php $date = date('m/d/Y', strtotime("+1 day", strtotime(date('m/d/Y'))));
									$date1 = date('d/m/Y', strtotime("+1 day", strtotime(date('m/d/Y')))); ?>
									<div class="col-md-6">
										<label class="nat_err control-label text-white">Nationality</label>
										<select class="form-control" name="nationality" id="Nationality">
											<option value="">--select--</option>
											<?php foreach ($nationality as $key => $value) { ?>
												<option  value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-md-6">
										<div class=" textleft">
											<label for="" style="width: 100%" class="chckin_err control-label text-white">Date & Time </label>
											<input type="text" class="form-control datetime arrivaldate" id="arrivaldate" name="arrivaldate" placeholder="Arrival Date/Time"  autocomplete="off">
											<input type="text" placeholder="Return Date/Time" class="form-control datetime returndate hide" id="returndate" name="returndate" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row" style="margin-top: 15px;">
									<div class="col-md-4">
                    <p class="bold control-label text-white">Type of Transfer</p>
                    <div class="col-md-4">
                      <div class="radio radiomargin0">
                        <label class="bold control-label text-white">
                        <input type="radio" name="transfertype" id="arrival" class="type"  checked="" value="arrival">
                        Arrival
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="radio radiomargin0">
                        <label class="bold control-label text-white">
                        <input type="radio" name="transfertype" class="type" value="departure">
                        Departure
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="radio radiomargin0">
                        <label class="bold control-label text-white">
                        <input type="radio" name="transfertype" class="type" value="return">
                        Return
                        </label>
                      </div>
                    </div>
                  </div>
									<div class="col-xs-6 col-md-1">
										<label for="" class="adults_err control-label text-white">Passenger</label>
										<select id="adults" name="Passenger" class="form-control mySelectBoxClass">
											<?php for ($i=1; $i <=15 ; $i++) { ?> 
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-xs-6 col-md-1">
										<label for="" class="control-label text-white">Bags</label>
										<select name="Bags" class="form-control mySelectBoxClass room1-child">
											<?php for ($i=1; $i <=15 ; $i++) { ?> 
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php } ?>
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
											<button type="button" id="transfer_search_btn" class="btn-search btn-block">Search</button>
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

