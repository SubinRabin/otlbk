<script src="<?php echo base_url(); ?>skin/js/agentrequests.js"></script>
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
<div class="modal-dialog" style="overflow-y:auto;">
    <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-body">
        		<h3>Add offline tour request</h3>
            <hr>
            <form method="post" id="OfflineTourRequestform">
		        <input type="hidden" name="id" id="id">
		        <div class="row">
              <div class="col-md-6 form-group">
                <label>Type of tour</label>
                <input type="text" name="tour_type" class="form-control" id="tour_type" placeholder="Enter type of tour..">
              </div> 
              <div class="col-md-6 form-group">
                <label>Destination</label>
                <input type="text" name="Destination" class="form-control" id="Destination" placeholder="Enter destination" autocomplete="off">
                <input type="hidden" name="destination_id" class="form-control" id="destination_id" placeholder="Enter destination" autocomplete="off">
                <ul class="search-dropdown txtcountry" style="margin-left:15px;margin-right:0px;display:none" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <label>Date</label>
                <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo date('m/d/Y') ?>">
                <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate1" class="form-control" value="<?php echo date('d/m/Y') ?>">
              </div>  
              <div class="col-md-6 form-group">
                <label>Nationality</label>
                <select name="nationality" class="form-control" id="nationality">
                  <option value="">Select Nationality</option>
                  <?php $count=count($nationality);
                      for ($i=0; $i <$count ; $i++) {  ?>
                        <option value="<?php echo $nationality[$i]->sortname; ?>"><?php echo $nationality[$i]->name ?></option>
                      <?php  } ?> 
                </select>
              </div> 
            </div>
            <div class="row">
                <div class="col-md-2">
                  <label for="" class="adults_err control-label">Adults</label>
                  <select id="adults" name="adults" class="form-control mySelectBoxClass">
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
                  <select name="Child" class="form-control mySelectBoxClass room1-child">
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
           
          
            <div class="row">
              
              <div class="col-md-12 form-group">
                <label>Special Request</label>
                <textarea class="form-control" id="SpecialRequest" name="SpecialRequest"></textarea>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <button class="pull-right btn btn-success ml10" id="OfflineTourRequestSubmit">Submit</button>
                <button type="button" data-dismiss="modal" id="OfflineTourRequestreject_button" class="close_but btn btn-danger ml10 pull-right">No</button>
              </div>
            </div>
      		</div>
        </form>
    	</div>
  	</div>

    <script type="text/javascript">
      // @datepicker
      // datepicker  for tour date
      var nextDay = new Date($("#tdate").val());
      nextDay.setDate(nextDay.getDate() + 1);
      $("#tdate").datepicker({
          minDate: 0,
          altField: "#alternate1",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $("#tdate").datepicker('option', 'minDate', nextDay);
            setTimeout(function(){
              $( "#datepicker2" ).datepicker('show');
            }, 16);     
          }
      });
      $("#alternate1").click(function() {
          $( "#tdate" ).trigger('focus');
      });
      $(document).ready(function() {
        // @destination autocomplete
        // dropdown with autocomplete for selecting destination city
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
                        $('#DropdownCountry').append('<li  role="displayCountries" ><a Cityid="'+value.cityid+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
                  $('#DropdownCountry').show();
                    });

            }
          });
      }, 500); 
    });
    $('ul.txtcountry').on('click', 'li a', function () {
      $('#Destination').val($(this).text());
      $('#destination_id').val($(this).attr('Cityid'));
      $('#DropdownCountry').slideUp('fast');
      $('#DropdownCountry li').remove();
    });
      // @children age
      // children age fields based on the count of children
          $(".room1-child").change(function() {
              var room = $(this).val();
             <?php for ($k = 1; $k <= 4; $k++) { ?>
                  $(".room1-child<?php echo $k ?>").addClass('hide');
              $(".room1-childAges<?php echo $k ?>").attr("disabled","disabled");
              <?php } ?>
                if (room!=0) {
                  if (room==1) {
                    $(".room1-child-p").text("Child Age");
                  } else {
                    $(".room1-child-p").text("Children Age");
                  }
                  $(".room1-childAge").removeClass('hide');

                  for (var k = 1; k <= room; k++) {
                      $(".room1-child"+k).removeClass('hide');
                  $(".room1-childAges"+k).removeAttr("disabled");
                  }
                } else {
                  $(".room1-childAge").addClass('hide');
                }
            });     
      });     
</script>