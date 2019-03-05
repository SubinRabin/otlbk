<?php init_head();  ?>   


<style>
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
    <div class="sb2-2">
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="col s12">
                <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                    <h2>Edit Requests</h2>
                <?php } else { ?>
                <h2>New Requests</h2>
                <?php } ?>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/booking/Offlinebooking" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/offlinerequest/OfflineRequestSubmit" name="add_requests_form" id="add_requests_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            <input type="hidden" name="edit_id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
            <div class="row">
            	<div class="col-md-12">
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Agent Name</label>
                             <select name="agent_id" id="agent_id">
                                <option value="">Select Agent</option>
                               <?php $count=count($agents);
                                    for ($i=0; $i <$count ; $i++) {  ?>
                                        <option value="<?php echo $agents[$i]->id; ?>"><?php echo $agents[$i]->First_Name.' '.$agents[$i]->Last_Name; ?></option>
                                <?php  } ?> 
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                          <label for="list-title">Destination</label>
                          <input type="text" name="Destination" class="form-control" id="Destination" placeholder="Enter destination" autocomplete="off">
                          <ul class="search-dropdown txtcountry" style="margin-left:15px;margin-right:0px;display:none" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
                        </div>   
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label for="list-title">Nationality</label>
                            <select name="nationality" id="nationality">
                                <option value="">Select Nationality</option>
                               <?php $count=count($nationality);
                                    for ($i=0; $i <$count ; $i++) {  ?>
                                        <option value="<?php echo $nationality[$i]->sortname; ?>"><?php echo $nationality[$i]->name ?></option>
                                <?php  } ?> 
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Hotel Name</label>
                            <input type="text" name="hotel_name" class="form-control" id="hotel_name" placeholder="Enter hotel name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Check in</label><span>*</span>
                            <input type="text" class="form-control" id="CheckIn" name="CheckIn" value="<?php echo date('m/d/Y') ?>">
                            <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate1" class="form-control" value="<?php echo date('d/m/Y') ?>">
                        </div>  
                        <div class="col-md-6 form-group">
                            <label>Check out</label><span>*</span>
                            <input type="text" name="CheckOut" class="form-control" id="CheckOut" value="<?php echo date('m/d/Y' ,strtotime('+1 days')) ?>">
                            <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate2" class="form-control" value="<?php echo date('d/m/Y' ,strtotime('+1 days')) ?>">
                        </div> 
                    </div>     
                    <div class="row">
                        <div class="col-md-1">
                            <label for="" class="control-label">Rooms</label><br>
                            <select  class="mySelectBoxClass" id="Rooms" onchange="roomsCheck();" name="noOfRooms">
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
                        <div class="col-md-1">
                            <label for="" class="adults_err control-label">Adults</label>
                            <select id="adults" name="adults[]" class="mySelectBoxClass">
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
                        <div class="col-md-1">
                            <label for="" class="control-label">Child</label>
                            <select name="Child[]" class="mySelectBoxClass room1-child">
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
                            <div class="col-md-1 room1-child<?php echo $l; ?> <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!=""&& $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : 'hide' ?>" style="padding-right: 0;width: 5.88%;">
                                <select name="room1-childAge[]" class=" room1-childAges<?php echo $l; ?>" <?php echo isset($_REQUEST['Child'][0]) && $_REQUEST['Child'][0]!="" && $_REQUEST['Child'][0]!=0 && $_REQUEST['Child'][0] >= $l ? '' : '' ?>  id="room1-childAge<?php echo $l; ?>">
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
                            <div class="col-md-1 col-md-offset-1">
                                <label for="" class="adults_err control-label">Adults</label>
                                <select id="adults"  name="adults[]" class="room<?php echo $i; ?>-adults roomadults mySelectBoxClass">
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
                            <div class="col-md-1">
                                <label for="" class="control-label">Child</label>
                                <select name="Child[]"  class="roomsChild mySelectBoxClass room<?php echo $i ?>-child"> 
                                    <option value="0"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="row room<?php echo $i ?>-childAge hide" style="transform: translateX(-8px);margin: 0 -8px;">
                                    <p style="margin-bottom: 0 ! important"><label class="room<?php echo $i ?>-child-p rate_err control-label" style="padding-left: 15px;">Children Age</label></p>
                                    <?php for ($l=1; $l <= 4 ; $l++) {  ?>
                                        <div class="col-md-1 room<?php echo $i ?>-child<?php echo $l; ?> hide" style="padding-right: 0;width: 11.88%">
                                            <select name="room<?php echo $i; ?>-childAge[]" class="mySelectBoxClass room<?php echo $i; ?>-childAges<?php echo $l; ?>"   id="room<?php echo $i; ?>-childAge<?php echo $l; ?>">
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
                         <div class="form-group col-md-6">
                            <label for="list-title">Other Special Requests</label>
                             <textarea class="form-control" id="special_req" name="special_req"></textarea>  
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Budget</label>
                            <input type="number" name="budget" class="form-control" id="budget" placeholder="Enter budget">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_requests_submit_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_requests_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                   
                    
                    <hr/>
            	</div>
            </form>
           
        </div>
    </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/offlinerequests.js"></script> 
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
      $(window).load(function() {
        $(".roomadults").attr("disabled","disabled");
        $(".roomsChild").attr("disabled","disabled");
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
                        $('#DropdownCountry').append('<li name="destination" role="displayCountries" ><a CityCode="'+value.CityCode+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
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
              var room = $(".room<?php echo $l ?>-child option:selected").val();
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

<?php init_tail(); ?>


