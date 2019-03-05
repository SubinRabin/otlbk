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
<div class="modal-dialog" style="height: 100%;overflow-y:auto;">
    <!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-body">
        		<h3>Add offline Visa request</h3>
            <hr>
            <form method="post" id="OfflineVisaRequestform" enctype="multipart/form-data">
		        <input type="hidden" name="id" id="id">
		        <div class="row">
              <div class="col-md-6 form-group">
                <label>Destination</label>
                <input type="text" name="Destination" class="form-control" id="Destination" placeholder="Enter destination" autocomplete="off">
                <input type="hidden" name="destination_id" class="form-control" id="destination_id" placeholder="Enter destination" autocomplete="off">
                <ul class="search-dropdown txtcountry" style="margin-left:15px;margin-right:0px;display:none" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
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
              <div class="col-md-4 form-group">
                <label>Type of Visa</label>
                <div id="visa_type_select">
                  <select  class="visa_type  form-control" name="visa_type" id="visa_type">
                    <option value="">Select Type of Visa</option>
                    <option value="14 days">14 Days</option>
                    <option value="30 days">30 Days</option>
                    <option value="90 days">90 Days</option>
                    <option value="6 months">6 Months</option>
                  </select>
                </div>
                <input type="text" class="form-control hide" id="other" name="visa_type" disabled=""> 
              </div>
              <div class="form-group col-md-2">
                  <button type="button" id="add_other_button" style="margin-top: 24px" class="waves-effect waves-light btn-sm btn-success">Others</button>                            
              </div> 
               <div class="col-md-6 form-group">
                  <label>Passport Expiry Date</label>
                  <input type="text" class="form-control" id="expiry" name="expiry" value="<?php echo date('m/d/Y') ?>">
                  <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate2" class="form-control" value="<?php echo date('d/m/Y') ?>">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6 form-group">
                  <label>Firstname</label>
                  <input type="text" id="firstname" name="firstname" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label>Lastname</label>
                  <input type="text" id="lastname" name="lastname" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                  <label>Birthday</label>
                  <input type="text" class="form-control" id="bdate" name="bdate" value="<?php echo date('m/d/Y') ?>">
                  <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate1" class="form-control" value="<?php echo date('d/m/Y') ?>">
                </div>
                <div class="col-md-5 form-group">
                  <label>Passport Copy image</label>
                  <input type="file" name="image" class="form-control" id="image" onchange="return ValidateFileUpload();">
                </div>
                <div class="col-md-1" style="line-height: 74px;">
                  <span class="upload-img"><img src="<?php echo base_url()?>/uploads/tour_services_images/<?php echo isset($edit[0]->id) ? $edit[0]->id : ''; ?>/<?php echo isset($edit[0]->image) ? $edit[0]->image : ''; ?>" alt="" id="load_image" style="width:30px;height: 30px"></span>
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
                <button class="pull-right btn btn-success ml10" id="OfflineVisaRequestSubmit">Submit</button>
                <button type="button" data-dismiss="modal" id="OfflineVisaRequestreject_button" class="close_but btn btn-danger ml10 pull-right">No</button>
              </div>
            </div>
      		</div>
        </form>
    	</div>
  	</div>

    <script type="text/javascript">
      // @datepicker
      // datepicker  for tour date
      var nextDay = new Date($("#bdate").val());
      nextDay.setDate(nextDay.getDate() + 1);
      $("#bdate").datepicker({
          yearRange: "1950:<?php echo date('Y') ?>",
          changeYear : true,
          changeMonth : true,
          altField: "#alternate1",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $("#bdate").datepicker('option', 'minDate', nextDay);
            setTimeout(function(){
              $( "#datepicker2" ).datepicker('show');
            }, 16);     
          }
      });
      $("#expiry").datepicker({
          minDate: 0,
          altField: "#alternate2",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $("#expiry").datepicker('option', 'minDate', nextDay);
            setTimeout(function(){
              $( "#datepicker2" ).datepicker('show');
            }, 16);     
          }
      });
      
      $("#alternate1").click(function() {
          $( "#bdate" ).trigger('focus');
      });
      $("#alternate2").click(function() {
          $( "#expiry" ).trigger('focus');
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
  });
      $("#add_other_button").click(function() {
            var val = $(this).text();
            if(val == 'Others'){
                $('#add_other_button').text('Default'); 
                $('#other').removeAttr('disabled');   
                $('#visa_type').attr('disabled','disabled');   
            } else {
                $('#add_other_button').text('Others');
                $('#visa_type').removeAttr('disabled');   
                $('#other').attr('disabled','disabled');   
            }
            $('#visa_type_select').toggleClass('hide');
            $('#other').toggleClass('hide');   
        }); 
        // to load image
      function ValidateFileUpload() {
            var fuData = document.getElementById('image');
            var FileUploadPath = fuData.value;   
              if (fuData.files && fuData.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      $('#load_image').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(fuData.files[0]);
              }   
      }    
</script>