<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/transfer.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbjpN_xqyT_yhaKh0ikHujN_xCX7KWot4&libraries=places&callback=initMap"
        async defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/transfer_autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<script>

	$(document).ready(function() {
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
	function initMap() {
        var input = document.getElementById('region');
        var countries = $(".countrycode").val();

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
<script>
	
	function tokenSetfn(url) {
		strdate = new Date();
		var date = moment(strdate).format('YYYYMMDDHHmmss');
		window.open(url+"&token="+date,'_blank');
	}

	

</script>
<style type="text/css"> 
.date-picker-wrapper {
	/*left: 414.234px ! important;*/
	top: 412px ! important;
}
.rate-size img {
	width: 60px ! important;
	padding-bottom :5px !important;
}
</style>
<style>
        .full-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #c9f1ff;
            text-align: center;
            /*font-family: 'Titillium Web';*/
            z-index: 9999999;
        }
        
        .full-loading img {
            width: 30vw;
            position: relative;
            top: -3em;
        }
        
        .fl-data {
            position: relative;
            top: -9vw;
        }
        
        .fl-title {
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 2px;
            color: #0784ff;
        }
        
        .fl-subtext {
            margin: 0;
            color: #757575;
        }
        
        .fl-info-card {
            height: 170px;
            width: 450px;
            margin: 1.5em auto 0;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 1px 0 #ccc;
            overflow: hidden;
        }
        
        .fl-info-card .top {
            height: 70px;
            background-color: #0784ff;
            padding: 0 15px;
        }
        
        .fl-info-card .top>p {
            margin: 0;
            text-transform: uppercase;
            font-size: 20px;
            line-height: 1.5;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        .fl-info-card .top>span {
            display: block;
            text-transform: uppercase;
            font-size: 12px;
            padding-top: 10px;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .fl-info-card .mid {
            display: flex;
            border-bottom: 2px solid #F5F5F5;
        }
        
        .fl-info-card .mid>div {
            flex: 1;
            padding: 10px;
            position: relative;
        }
        
        .fl-info-card .mid>div:first-child::after {
            content: "";
            height: 60%;
            background-color: #F5F5F5;
            width: 2px;
            position: absolute;
            right: 0;
            top: 20%;
        }
        
        .fl-info-card .mid>div>p {
            margin: 0;
            color: #0784ff;
        }
        
        .fl-info-card .mid>div>span {
            color: #9E9E9E;
            font-size: 14px;
        }

.hotelstab2         {
	position: relative;
}
.search-dropdown {
    position: absolute;
    max-height: 200px;
    /* top: 50px; */
    left: 21px;
    z-index: 1000;
    width: 85%;
    padding: 0;
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
.returnsearch-dropdown {
    position: absolute;
    max-height: 200px;
    /* top: 50px; */
    left: 21px;
    z-index: 1000;
    width: 85%;
    padding: 0;
    margin: 0;
    font-size: 12px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
.returnsearch-dropdown li {
	padding: 3px 8px;
	cursor: pointer;
}
.returnsearch-dropdown li:hover {
	background-color: #eee;
}
.returnsearch-dropdown li > a > i {
	margin-right: 8px;
}
.returnsearch-dropdown li:hover > a > i {
	color: #72bf66;
}
.returnsearch-dropdown li a {
	text-decoration: none;
	width: 100%;
	display: block;
	letter-spacing: .5px;
}
.returnsearch-dropdown li > a > span {
	color: #9e9e9e;
	font-size: 80%;
	letter-spacing: .5px;
}
.listitem {
	border-style: solid;
    border-color: #f0f0f0;
	background-image: url('../assets/images/default_car.jpg');
	background-size: cover;
}
</style>
<div class="clearfix"></div>
<div class="container breadcrub">
	   <div>
		<a class="homebtn left" href="<?php echo base_url(); ?>transfer"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="#">Transfers</a></li>
				<?php if (isset($_REQUEST['countryname'])) { ?>
					<li>/</li>
					<li><a href="#"><?php echo isset($_REQUEST['countryname']) ? $_REQUEST['countryname'] : '' ?></a></li>
				<?php } ?>	
				<?php if (isset($_REQUEST['cityname'])) { ?>
					<li>/</li>
					<li><a href="#"><?php echo isset($_REQUEST['cityname']) ? $_REQUEST['cityname'] : '' ?></a></li>
				<?php } ?>		
			</ul>				
		</div>
		<a class="backbtn right" href="<?php echo base_url(); ?>transfer"></a>
	</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	

			<!-- FILTERS -->
			<div class="col-md-3 filters offset-0">
			
				
				<!-- TOP TIP -->
				<div class="filtertip">
					<div class="padding20">
						<p class="size13">
							Total 
							<span class="size18 bold counttransfer"></span> <span class="transfercnt">Transfers</span> </p>
							<p class="size13">starting at</p>
							<p class="size30 bold"><?php echo $agent_currency; ?> <span class="countprice"></span></p>
							<p class="size13">Narrow results </p>
						</div>
					<div class="tip-arrow"></div>
				</div>
				
	
				<div class="bookfilters hpadding20">
					
				
				<div class="size30 dark">Transfers</div>				
					<!-- CARS TAB -->
					<form id="TransferSearchForm" >
					<div class="">
					<br>
						<p>Type of Transfer</p>
						<div class="col-md-6">
							<div class="radio radiomargin0">
							  <label>
								<input type="radio" name="transfertype" id="transfertype" <?php echo isset($_REQUEST['transfertype']) && $_REQUEST['transfertype']=='one-way' ? 'checked' : '' ?> class="type"  checked="" value="one-way">
								One Way
							  </label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="radio radiomargin0">
							  <label>
								<input type="radio" name="transfertype" id="transfertype" <?php echo isset($_REQUEST['transfertype']) && $_REQUEST['transfertype']=='two-way' ? 'checked' : '' ?> class="type" value="two-way">
								Return
							  </label>
							</div>
						</div><br>
						<p class="margtop10">From the airport<p>
						<div class="margtop10">
							<input type="text" name="location" id="location" class="form-control" placeholder="Enter country name" value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?>" autocomplete="off">
							
							<ul class="txtcountry search-dropdown" style="margin-right:0px;display:none;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
						</div>
						<div class="margtop10">
								<input type="text" name="region" id="region" class="form-control" placeholder="Enter the location" value="<?php echo isset($_REQUEST['region']) ? $_REQUEST['region'] : '' ?>" autocomplete="off">
						</div>
						<div class="margtop10">
							<select class="form-control" name="nationality" id="Nationality">
								<option value="">--Nationality--</option>
								<?php foreach ($nationality as $key => $value) {
									if (isset($_REQUEST['nationality']) && $_REQUEST['nationality']==$value->id) { ?>
									<option selected="" value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
								<?php	} else {
								 ?>
									<option  value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
								<?php } } ?>
							</select>
						</div>
						<div class="margtop10">
 							<input type="text" class="form-control datetime" id="arrivaldate" placeholder="Arrival Date/Time" name="arrivaldate" autocomplete="off" value="<?php echo isset($_REQUEST['arrivaldate']) && $_REQUEST['arrivaldate']!="" ? $_REQUEST['arrivaldate'] : ''  ?>">
						</div>
						<div class="return <?php echo isset($_REQUEST['transfertype']) && $_REQUEST['transfertype']=='two-way' ? '' : 'hide' ?>">
							<p class="margtop10">Return<p>						
							<div class="margtop10">
								<input type="text" placeholder="Return Date/Time" class="form-control datetime" id="returndate" name="returndate" autocomplete="off" value="<?php echo isset($_REQUEST['returndate']) && $_REQUEST['returndate']!="" ? $_REQUEST['returndate'] : ''  ?>">
							</div>
						</div>	
						<input type="hidden" name="cityname" class="cityname" value="<?php echo $_REQUEST['cityname'] ?>">
						<input type="hidden" name="countryname" class="countryname" value="<?php echo $_REQUEST['countryname'] ?>">	
						<input type="hidden" name="countrycode" class="countrycode" value="<?php echo $_REQUEST['countrycode'] ?>">		
						<input type="hidden" name="airportID" class="airportID" value="<?php echo $_REQUEST['airportID'] ?>">	
						<input type="hidden" name="view_type" value="<?php echo isset($_REQUEST['view_type']) ? $_REQUEST['view_type'] : 'list' ?>">								
						<div class="clearfix pbottom15"></div>
						<div class="w50percent">
							<div class="wh90percent textleft left">
								<span class="opensans size13 adults_err">Passenger</span>
								<select class="form-control mySelectBoxClass" name="Passenger" id="adults">
									<?php for ($i=1; $i <=15 ; $i++) { 
										if (isset($_REQUEST['Passenger']) && $_REQUEST['Passenger']==$i) {?>
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
								<span class="opensans size13">Bags</span>
								<select name="Bags" class="form-control mySelectBoxClass room1-child">
									<?php for ($i=0; $i <5 ; $i++) { 
										if (isset($_REQUEST['Bags']) && $_REQUEST['Bags']==$i) {?>
											<option  selected="" value="<?php echo $i?>"><?php echo $i?></option>
										<?php } else { ?>
											<option value="<?php echo $i?>"><?php echo $i?></option>
										<?php 	}
									} ?>
								</select>
							</div>
						</div>
						<div class="row room1-childAge <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 ? '' : 'hide' ?>" style="transform: translateX(-8px);margin: 0 -8px;">
							<p class="room1-child-p" style="padding-left: 15px;">Children Age</p>
								<?php for ($l=1; $l <= 4 ; $l++) {  ?>
									<div class="col-xs-3 room1-child<?php echo $l; ?> <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'hide' ?>" style="padding-right: 0;">
									<select name="room1-childAge[]" class="form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>">
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
							<div class="clearfix pbottom15"></div>
						<div class="clearfix"></div><br/>
						<button type="button" id="transferSearch" class="btn-search3">Search</button>
					</div>
					<!-- END OF CARS TAB -->
					</form>
						
						
				</div>
				<!-- END OF BOOK FILTERS -->	
				
				<div class="line2"></div>
				<form id="TransferSearchReqForm"  method="get">
					<input type="hidden" name="transfertype" value="<?php echo $_REQUEST['transfertype'] ?>">
					<input type="hidden" name="location" value="<?php echo $_REQUEST['location'] ?>">
					<input type="hidden" name="region" value="<?php echo $_REQUEST['region'] ?>">
					<input type="hidden" name="nationality" value="<?php echo $_REQUEST['nationality'] ?>">
					<input type="hidden" name="arrivaldate" value="<?php echo $_REQUEST['arrivaldate'] ?>">
					<input type="hidden" name="airportID" value="<?php echo $_REQUEST['airportID'] ?>">
					<input type="hidden" name="returndate" value="<?php echo $_REQUEST['returndate'] ?>">
					<input type="hidden" name="cityname" value="<?php echo $_REQUEST['cityname'] ?>">
					<input type="hidden" name="countryname" value="<?php echo $_REQUEST['countryname'] ?>">
					<input type="hidden" name="countrycode" value="<?php echo $_REQUEST['countrycode'] ?>">
					<input type="hidden" name="Passenger" value="<?php echo $_REQUEST['Passenger'] ?>">
					<input type="hidden" name="Bags" value="<?php echo $_REQUEST['Bags'] ?>">
					<input type="hidden" name="view_type" value="<?php echo isset($_REQUEST['view_type']) ? $_REQUEST['view_type'] : 'list' ?>">	
				<div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
				<div class="line2"></div>
				
			
				<!-- Price range -->					
				<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
				  Price range <span class="collapsearrow"></span>
				</button>
					
				<div id="collapse2" class="collapse in">
					<div class="padding20">
						<div class="layout-slider wh100percent">
							<span class="cstyle09"><input id="Slider1" type="slider" name="price" value="10;20000" /></span>
						</div>
						<script type="text/javascript" >
							$(document).ready(function(){
								$("#Slider1").slider({ from: <?php echo ceil(currency_type1(agent_currency(),"10")) ?>, to: <?php echo ceil(currency_type1(agent_currency(),"20000")) ?>, step: 5, smooth: true, round: 0, dimension: "&nbsp;<?php echo agent_currency(); ?>", skin: "round" });
							})
						</script>
					</div>
				</div>
				<!-- End of Price range -->	
				
				<div class="line2"></div>
				
				<!-- Car type -->
				<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse3">
				 Vehicle Types <span class="collapsearrow"></span>
				</button>	
				<div id="collapse3" class="collapse in">
					<div class="hpadding20">
						<?php foreach ($vehicletypes as $value) { ?>
							<div class="checkbox">
							<label>
							  <input type="checkbox" value="<?php echo $value->vehicleType ?>" name="vtype[]" class="vehicletype" id="vehicletype"><?php echo $value->vehicleType ?>
							</label>
						</div>
						<?php } ?>
						
					</div>
					<div class="clearfix"></div>						
				</div>	
				<!-- End of Car type -->
				
				<div class="line2"></div>
				


				<div class="clearfix"></div>
				<br/>
				<br/>
				<br/>
				
				
			</div>
			<!-- END OF FILTERS -->
			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-9 offset-0">
			
				<div class="hpadding20">
					<!-- Top filters -->
					<div class="topsortby">
						<div class="col-md-4 offset-0">
								
								<div class="left mt7"><b>Sort by:</b></div>
								
								<div class="right wh70percent">
									<select class="form-control mySelectBoxClass " name="name_order" id="name_order">
									  <option selected>Name</option>
									  <option value="1">A to Z</option>
									  <option value="2">Z to A</option>
									</select>
								</div>

						</div>			
						<div class="col-md-4">
							<div class="w50percent">
								<div class="wh90percent">
									<select class="form-control mySelectBoxClass " name="price_order" id="price_order">
									  <option selected>Price</option>
									  <option value="1">Ascending</option>
									  <option value="2">Descending</option>
									</select>
								</div>
							</div>
							<div class="w50percentlast">
								<div class="wh90percent none">
									<select class="form-control mySelectBoxClass ">
									  <option selected>Price</option>
									  <option>Ascending</option>
									  <option>Descending</option>
									</select>
								</div>
							</div>					
						</div>
						<div class="col-md-4 offset-0">
							<div class="wh50percent left none">
								<select class="form-control mySelectBoxClass ">
								  <option selected>Fuel type</option>
								  <option>Diesel</option>
								  <option>Petrol</option>
								  <option>Hibrid</option>
								  <option>Electric</option>
								</select>
							</div>
							<div class="right">
								<!-- <button class="gridbtn active">&nbsp;</button> -->
								<button class="listbtn active">&nbsp;</button>
								<!-- <button class="grid2btn active">&nbsp;</button> -->
							</div>
						</div>
					</div>
					<!-- End of topfilters-->
				</div>
				<!-- End of padding -->
				
				<br/><br/>
				<div class="clearfix"></div>
				
				
			

				<div class="itemscontainer offset-1">
					<div class="spin-wrapper" style="display: none">
						<img src="<?php echo base_url(); ?>/assets/images/ellipsis-spinner.gif" alt="">
					</div>
					<div id="result_search">
						
					</div>

					
					
					
					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>					
				<input type="hidden" name="contractid" id="contractid">
				<input type="hidden" name="vehicleid" id="vehicleid">
				</div>	
				
			</div>
			<!-- END OF LIST CONTENT-->
			
		
			</form>
		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		    $(".modal-body").html('<img width="100%" src="'+$(this).attr('href')+'"/>'); 
		});
	});
	 $(".type").click(function() {
      var type=$('input[name=transfertype]:checked').val();
      if(type=='one-way'){
        $(".return").addClass('hide');
      }else if(type=='two-way'){
        $(".return").removeClass('hide');
      }
     })    
</script>

<?php init_front_black_tail(); ?> 
<script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.slider - Copy.js"></script>

