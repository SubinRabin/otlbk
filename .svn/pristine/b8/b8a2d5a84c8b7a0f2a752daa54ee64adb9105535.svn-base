<?php init_front_head(); ?> 
<?php init_front_head_menu(); ?> 
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/destination_autocomplete.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>skin/js/tourlist.js"></script>
<script>
    FullLoading('start', '<?php echo $_REQUEST['location'] ?>', '<?php echo date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) ?>', '<?php echo date('d/m/Y' ,strtotime($_REQUEST['departdate'])) ?>');
	$(document).ready(function() {
		tourSearch();
		var nextDay = new Date($("#datepicker").val());
		nextDay.setDate(nextDay.getDate() + 1);
		$("#datepicker").datepicker({
			minDate: 0,
			altField: "#alternate",
			altFormat: "dd/mm/yy",
			onSelect: function(dateText) {
				var nextDay = new Date(dateText);
				nextDay.setDate(nextDay.getDate() + 1);
				$("#datepicker2").datepicker('option', 'minDate', nextDay);
				setTimeout(function(){
					$( "#datepicker2" ).datepicker('show');
				}, 16);     
			}
		});
		$("#datepicker2").datepicker({
			minDate: nextDay,
			altField: "#alternate2",
			altFormat: "dd/mm/yy",
			onSelect: function(dateText) {
			}
		});
		$("#alternate").click(function() {
			$( "#datepicker" ).trigger('focus');
		});
		$("#alternate2").click(function() {
			$( "#datepicker2" ).trigger('focus');
		});
		
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
	  	});
	  <?php } ?>
	});
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

</style>
<div class="clearfix"></div>
<div class="container breadcrub">
	   <div>
		<a class="homebtn left" href="<?php echo base_url(); ?>tour"></a>
		<div class="left">
			<ul class="bcrumbs">
				<li>/</li>
				<li><a href="#">Tours</a></li>
				<?php if (isset($_REQUEST['location'])) { ?>
					<li>/</li>
					<li><a href="#"><?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?></a></li>
				<?php } ?>			
			</ul>				
		</div>
		<a class="backbtn right" href="<?php echo base_url(); ?>tour"></a>
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
							<span class="size18 bold counttour"></span> <span class="tourcnt">Tours</span> </p>
							<p class="size13">starting at</p>
							<p class="size30 bold"><?php echo $agent_currency; ?> <span class="countprice"></span></p>
							<p class="size13">Narrow results </p>
						</div>
					<div class="tip-arrow"></div>
				</div>
				
	
				<div class="bookfilters hpadding20">
					
				
				<div class="size30 dark">Tours</div>				
					<!-- CARS TAB -->
					<div class="">
					<br>
					<form id="main_tour_search_form" method="get">
					<input type="hidden" name="cityId"  value="<?php echo $_REQUEST['cityId'] ?>">
						<input type="hidden" name="cityname"  value="<?php echo $_REQUEST['cityname'] ?>">
						<input type="hidden" name="countryname" value="<?php echo $_REQUEST['countryname'] ?>">

						<input type="hidden" name="page" value="<?php isset($_REQUEST['page']) ? $_REQUEST['page'] : "1" ?>">
						<input type="hidden" name="view_type" value="<?php echo isset($_REQUEST['view_type']) ? $_REQUEST['view_type'] : 'list' ?>">	
						
						<div class="margtop10">
							<span class="opensans size1 dest_err">Enter Destination</span>
							<input type="text" name="location" id="location" class="form-control" placeholder="Enter country name" value="<?php echo isset($_REQUEST['location']) ? $_REQUEST['location'] : '' ?>" autocomplete="off">
							
							<ul class="txtcountry search-dropdown" style="margin-right:0px;display:none;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
						</div>
						<div class="margtop10">
							<span class="opensans size1 nat_err">Nationality</span>
							<select class="form-control" name="nationality" id="nationality">
								<?php foreach ($nationality as $key => $value) { ?>
									<option <?php echo isset($_REQUEST['nationality']) && $value->id==$_REQUEST['nationality'] ? 'selected' : '' ?> value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="margtop10">
							<span class="opensans size1 arrival_err">Arrival Date</span>
							<input type="text"  style="width: 1000%;opacity: 0;height: 40px;"  class="mySelectCalendar" id="datepicker" name="arrivaldate" value="<?php echo isset($_REQUEST['arrivaldate']) ? $_REQUEST['arrivaldate'] : '' ?>" placeholder="dd/mm/yyyy"/>
							<div class="input-group" style="transform: translateY(-34px);">
								<input type="text" name="" class="form-control" id="alternate" value="<?php echo isset($_REQUEST['arrivaldate']) ? date('d/m/Y' ,strtotime($_REQUEST['arrivaldate'])) : '' ?>">
								<label for="datepicker" class="input-group-addon" style="padding: 5px"><i class="fa fa-calendar"></i></label>
							</div>


						</div>
						<div style="margin-top: -20px;">
							<span class="opensans size1 depart_err">Departure Date</span>
							<input type="text" style="width: 1000%;opacity: 0;height: 40px;"  class="mySelectCalendar" id="datepicker2" name="departdate" value="<?php echo isset($_REQUEST['departdate']) ? $_REQUEST['departdate'] : '' ?>" placeholder="dd/mm/yyyy"/>
								
								<div class="input-group" style="transform: translateY(-34px);">
									<input type="text" name="" class="form-control" id="alternate2" value="<?php echo isset($_REQUEST['departdate']) ? date('d/m/Y' ,strtotime($_REQUEST['departdate'])) : '' ?>">
									<label for="datepicker2" class="input-group-addon"  style="padding: 5px"><i class="fa fa-calendar"></i></label>
								</div>
						</div>
						<div >
							<span class="opensans size1">Type of Service</span>
								<input type="text" class="form-control" id="serviceType" name="serviceType" autocomplete="off" value="<?php echo isset($_REQUEST['serviceType']) ? $_REQUEST['serviceType'] : ''?>" placeholder="Type of Service">
						</div>							
						<div class="clearfix pbottom15"></div>
						<div class="w50percent">
							<div class="wh90percent textleft left">
								<span class="opensans size13 adults_err">Adult </span>
								<?php if(!isset($_REQUEST['adults'][0]))
								$_REQUEST['adults'][0]="2";
								?>
								<select class="form-control mySelectBoxClass" name="adults[]" id="adults">
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
						<button type="submit" id="tour_search_button" class="btn-search3">Find Tour</button>
					</form>
					</div>

					<!-- END OF CARS TAB -->

						
						
				</div>
				<!-- END OF BOOK FILTERS -->	
				
				<div class="line2"></div>
				<form name="tempForm" id="tempForm" method="get">
							<input type="hidden" class="form-control b-r-40" name="cityname" class="cityname" value="<?php echo $_REQUEST['cityname'] ?>">
							<input type="hidden" class="form-control b-r-40" name="cityId" class="cityId" value="<?php echo $_REQUEST['cityId'] ?>">
							<input type="hidden" class="form-control b-r-40" name="countryname" class="countryname" value="<?php echo $_REQUEST['countryname'] ?>">
							<input type="hidden" name="arrivaldate" value="<?php echo $_REQUEST['arrivaldate'] ?>">
							<input type="hidden" name="departdate" value="<?php echo $_REQUEST['departdate'] ?>">
							<input type="hidden" name="location" value="<?php echo $_REQUEST['location'] ?>">
							<input type="hidden" name="nationality" value="<?php echo $_REQUEST['nationality'] ?>">
							<input type="hidden" name="serviceType" value="<?php echo $_REQUEST['serviceType'] ?>">
							<input type="hidden" name="page" value="<?php isset($_REQUEST['page']) ? $_REQUEST['page'] : "1" ?>" id="page">
							<input type="hidden" name="view_type" id="view_type" value="<?php echo isset($_REQUEST['view_type']) ? $_REQUEST['view_type'] : 'grid' ?>">
							<?php foreach ($_REQUEST['adults'] as $key => $value) { ?>
								<input type="hidden" name="adults[]" value="<?php echo $value ?>">
							<?php } ?>
							<?php foreach ($_REQUEST['Child'] as $key => $value) { ?>
								<input type="hidden" name="Child[]" value="<?php echo $value ?>">
							<?php } ?>
							<?php if (isset($_REQUEST['room1-childAge'])) {
									foreach ($_REQUEST['room1-childAge'] as $key => $value) { ?>
										<input type="hidden" name="room1-childAge[]" value="<?php echo $value; ?>">
							<?php   }
							} ?>

			
				
			
				<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">Price range <?php echo $agent_currency; ?> <span class="collapsearrow"></span></button>

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
								<button type="button" class="gridbtn active">&nbsp;</button>
							<!-- 	<button type="button" class="listbtn active">&nbsp;</button>
								<button type="button" class="grid2btn active">&nbsp;</button> -->
							</div>
						</div>
					</div>
					<!-- End of topfilters-->
				</div>
				<!-- End of padding -->
				<input type="hidden" name="contractid" id="contractid">
			</form>
		
				<br/><br/>
				<div class="clearfix"></div>			
			<div class="itemscontainer offset-1">
				<div id="result_search" class="shide" >
					
				</div>

        </div>
			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	
<script type="text/javascript">
	$(document).ready(function() {
		$(".return").hide();
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		    $(".modal-body").html('<img width="100%" src="'+$(this).attr('href')+'"/>'); 
		});
	});
	 $(".type").click(function() {
      var type=$('input[name=transfertype]:checked').val();
      if(type=='one-way'){
        $(".return").hide();
      }else if(type=='two-way'){
        $(".return").show();
      }
     })    
</script>

<?php init_front_black_tail(); ?> 
<script type="text/javascript" src="<?php echo base_url(); ?>skin/plugins/jslider/js/jquery.slider - Copy.js"></script>

