<?php init_head();  ?>   
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
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
               
                <h2>New Visa Requests</h2>
               
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/offlinerequests/visa_requests" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/offlinerequest/OfflineVisaRequestSubmit" name="add_visa_requests_form" id="add_visa_requests_form" method="post" enctype="multipart/form-data">
            </br>
            </br>
            </br>
            
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
                             <input type="hidden" name="destination_id" class="form-control" id="destination_id" placeholder="Enter destination" autocomplete="off">
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
                        <div class="form-group col-md-5">
                            <label for="stay_pay">Type of Visa</label>
                            <div id="visa_type_select">
                            <select  class="visa_type" name="visa_type" id="visa_type">
                                <option value="">Select Type of Visa</option>
                                <option value="14 days">14 Days</option>
                                <option value="30 days">30 Days</option>
                                <option value="90 days">90 Days</option>
                                <option value="6 months">6 Months</option>
                            </select>
                            </div>
                            <input type="text" class="form-control hide" id="other" name="visa_type" disabled="">     
                        </div>
                        <div class="form-group col-md-1">
                            <button type="button" id="add_other_button" style="margin-top: 24px" class="waves-effect waves-light btn-sm btn-success">Others</button>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="list-title">Firstname</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="list-title">Lastname</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter lastname">
                        </div>
                    </div>  
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label>Birthday</label>
                            <input type="text" class="form-control" id="bdate" name="bdate" value="<?php echo date('m/d/Y') ?>">
                            <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate1" class="form-control datetime" value="<?php echo date('d/m/Y') ?>">
                        </div>  
                      <div class="form-group col-md-6">
                            <label for="list-title">Other Special Request</label>
                            <textarea name="special_req" class="form-control" id="special_req"></textarea>
                        </div> 
                    </div>     
                    
                   
                    <div class="row">
                      <div class="form-group col-md-6">
                            <label>Passport Expiry Date</label>
                            <input type="text" class="form-control" id="expiry" name="expiry" value="<?php echo date('m/d/Y') ?>">
                            <input type="text" readonly="" style="transform: translateY(-34px);" id="alternate2" class="form-control datetime" value="<?php echo date('d/m/Y') ?>">
                        </div> 
                      <div class="form-group col-md-4">
                            <label for="list-title">Passport Copy Image</label>
                            <input type="file" name="image" class="form-control" id="image" onchange="return ValidateFileUpload();">
                        </div>
                        <div class="col-md-2" style="line-height: 74px;">
                            <span class="upload-img"><img src="<?php echo base_url()?>/uploads/tour_services_images/<?php echo isset($edit[0]->id) ? $edit[0]->id : ''; ?>/<?php echo isset($edit[0]->image) ? $edit[0]->image : ''; ?>" alt="" id="load_image"></span>
                        </div> 
                      </div> 
                      <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_visa_requests_submit_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_visa_requests_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
 <script type="text/javascript">
      $(window).load(function() {
       //datepicker
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
          timepicker: false,
          format: 'DD/MM/Y',
          formatDate: 'YYYY/MM/DD',
        });
      // destination autocomplete
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
                        $('#DropdownCountry').append('<li name="destination" role="displayCountries" ><a Cityid="'+value.cityid+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
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
      // visa request form submit
          $('#add_visa_requests_submit_button').click(function (e) {
            e.preventDefault();
              $.ajax({
              dataType: 'json',
              type: 'post',
              url: base_url+'backend/offlinerequest/visa_requests_validation',
              data: $('#add_visa_requests_form').serialize(),
              cache: false,
              success: function (response) {
                // alert("data");
                if (response.status == "1") {
                  addToast(response.error,response.color);
                  window.setTimeout(function(){
                     $("#add_visa_requests_form").submit();
                  }, 1500);
                }
                 else {
                  addToast(response.error,response.color);
                }
              },
               error: function (xhr,status,error) {
                 alert("Error: " + error);
              }
            });
        });
          // visa type dropdown and freetext option
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

<?php init_tail(); ?>


