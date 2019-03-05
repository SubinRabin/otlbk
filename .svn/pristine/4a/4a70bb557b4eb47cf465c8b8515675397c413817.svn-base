<script src="<?php echo base_url(); ?>skin/js/booking.js"></script>
<style type="text/css">
  .modal-backdrop {
    z-index: 500;
  }
  .modal {
    z-index: 501;
  }
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
<div class="modal-dialog" style="overflow-y:auto;height: 100%">
    <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-body">
        		<h3>Add offline request</h3>
            <hr>
            <form method="post" id="OfflineRequestform">
		        <input type="hidden" name="id" id="id">
		        <div class="row">
              <div class="col-md-6 form-group">
                <label>Hotel name</label>
                <input type="text" name="hotel_name" class="form-control" id="hotel_name" placeholder="Enter hotel name..">
              </div> 
              <div class="col-md-6 form-group">
                <label>Destination</label><span>*</span>
                <input type="text" name="Destination" class="form-control" id="Destination" placeholder="Enter destination" autocomplete="off">
                <ul class="search-dropdown txtcountry" style="margin-left:15px;margin-right:0px;display:none" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
              </div> 
              <div class="col-md-6 form-group">
                <label>Check in</label><span>*</span>
                <input type="text" class="form-control" id="CheckIn" name="CheckIn" value="<?php echo date('m/d/Y') ?>">
                <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate1" class="form-control" value="<?php echo date('d/m/Y') ?>">
              </div>  
              <div class="col-md-6 form-group">
                <label>Check out</label><span>*</span>
                <input type="text" name="CheckOut" class="form-control" id="CheckOut" value="<?php echo date('m/d/Y' ,strtotime('+1 days')) ?>">
                <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate2" class="form-control" value="<?php echo date('d/m/Y' ,strtotime('+1 days')) ?>">
              </div> 
              <div class="form-group col-md-6">
                  <label for="list-title">Nationality</label>
                  <select name="nationality" class="form-control" id="nationality">
                      <option value="">Select Nationality</option>
                     <?php $count=count($nationality);
                          for ($i=0; $i <$count ; $i++) {  ?>
                              <option value="<?php echo $nationality[$i]->sortname; ?>"><?php echo $nationality[$i]->name ?></option>
                      <?php  } ?> 
                  </select>
            </div>
              <div class="col-md-6 form-group">
                <label>Budget</label>
                <input type="text" name="budget" class="form-control" id="budget" placeholder="Enter budget..">
              </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                  <label for="" class="control-label">Rooms</label><br>
                  <select  class="form-control mySelectBoxClass" id="Rooms" onchange="roomsCheck();" name="noOfRooms">
                    <option value="1">1</option>
                    <option value="2">2</option>
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
                <div class="col-md-2">
                  <label for="" class="adults_err control-label">Adults</label>
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
                <div class="col-md-2">
                  <label for="" class="control-label">Child</label>
                  <select name="Child[]" class="form-control mySelectBoxClass room1-child">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="room1-childAge <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 ? '' : 'hide' ?>" style="margin: 0 -8px;">
                  <p style="margin-bottom: 0 ! important"><label class="room1-child-p rate_err control-label" style="padding-left: 15px;">Children Age</label></p>
                  <?php for ($l=1; $l <= 4 ; $l++) {  ?>
                    <div class="col-md-6 room1-child<?php echo $l; ?> <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'hide' ?>" style="padding-right: 0;width: 11%;">
                      <select name="room1-childAge[]" class="form-control mySelectBoxClass room1-childAges<?php echo $l; ?>" <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'disabled' ?>  id="room1-childAge<?php echo $l; ?>">
                        <?php for ($i=0; $i <18 ; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <?php } ?>
                
                </div>
              </div>
              <?php for ($i=2; $i <=10 ; $i++) { ?>
                <div class="row">
                  <div class="room<?php echo $i; ?> hide roomshide">
                    <div class="col-md-2 col-md-offset-2">
                      <label for="" class="adults_err control-label">Adults</label>
                      <select id="adults"  disabled="" name="adults[]" class="room<?php echo $i; ?>-adults roomadults form-control mySelectBoxClass">
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
                    <div class="col-md-2">
                      <label for="" class="control-label">Child</label>
                      <select name="Child[]" disabled="" class="roomsChild form-control mySelectBoxClass room<?php echo $i ?>-child"> 
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <div class="row room<?php echo $i ?>-childAge hide" style="transform: translateX(-8px);margin: 0 -8px;">
                        <p style="margin-bottom: 0 ! important"><label class="room<?php echo $i ?>-child-p rate_err control-label" style="padding-left: 15px;">Children Age</label></p>
                        <?php for ($l=1; $l <= 4 ; $l++) {  ?>
                          <div class="col-md-6 room<?php echo $i ?>-child<?php echo $l; ?> hide" style="padding-right: 0;width: 24%">
                            <select name="room<?php echo $i; ?>-childAge[]" class="form-control mySelectBoxClass room<?php echo $i; ?>-childAges<?php echo $l; ?>" disabled=""  id="room<?php echo $i; ?>-childAge<?php echo $l; ?>">
                            <?php for ($j=0; $j <18 ; $j++) { ?>
                                <option value="<?php echo $j ?>"><?php echo $j ?></option>
                            <?php } ?>
                          </select>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <h4>Special Request</h4>
                <hr>
              </div>
              <div class="col-md-12 form-group">
                <textarea class="form-control" name="SpecialRequest"></textarea>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <button class="pull-right btn btn-success ml10" id="OfflineRequestSubmit">Submit</button>
                <button type="button" data-dismiss="modal" id="OfflineRequestreject_button" class="close_but btn btn-danger ml10 pull-right">No</button>
              </div>
            </div>
      		</div>
        </form>
    	</div>
  	</div>

    <script type="text/javascript">
      var nextDay = new Date($("#CheckIn").val());
      nextDay.setDate(nextDay.getDate() + 1);
      $("#CheckIn").datepicker({
          minDate: 0,
          altField: "#alternate1",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $("#CheckOut").datepicker('option', 'minDate', nextDay);
            setTimeout(function(){
              $( "#datepicker2" ).datepicker('show');
            }, 16);     
          }
      });
      $("#CheckOut").datepicker({
          minDate: nextDay,
          altField: "#alternate2",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          }
      });
      $("#alternate1").click(function() {
          $( "#CheckIn" ).trigger('focus');
      });
      $("#alternate2").click(function() {
          $( "#CheckOut" ).trigger('focus');
      });
      $(document).ready(function() {
        /*var input = document.getElementById('Destination');
        var autocomplete = new google.maps.places.Autocomplete(input);*/
        var xhrTimer;
        var theXRequest;
        $("#Destination").keyup(function() {
        $('#DropdownCountry').slideUp('fast');
        if (theXRequest) { theXRequest.abort(); }
        clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
        xhrTimer = setTimeout(function () { // assign timer a new timeout 
        $('#DropdownCountry li').remove();
          theXRequest = $.ajax({
            dataType: 'json',
            type: 'post',
            url: base_url+'welcome/GetCountryName?keyword='+$("#Destination").val(),
            cache: false,
            success: function (data) {
              $.each(data, function (key,value) {
                if (data.length >= 0)
                        $('#DropdownCountry').append('<li  role="displayCountries" ><a CityCode="'+value.CityCode+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
                  $('#DropdownCountry').show();
                    });

            }
          });
      }, 500); 
    });
    $('ul.txtcountry').on('click', 'li a', function () {
      $('#Destination').val($(this).text());
      $('#DropdownCountry').slideUp('fast');
      $('#DropdownCountry li').remove();
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
      function roomsCheck() {
          // $(".ContactRoomsCommon").addClass("hide");
          $(".roomshide").addClass("hide");
          $(".roomadults").attr("disabled","disabled");
          $(".roomsChild").attr("disabled","disabled");
          var rooms = $("#Rooms").val();
          for ( i = 2; i <= rooms; i++) {
            // $(".ContactRooms"+i).removeClass("hide");
            $(".room"+i).removeClass("hide");
            $(".room"+i+"-adults").removeAttr("disabled");
            $(".room"+i+"-child").removeAttr("disabled");
          }
        }
     </script>