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
                <h2>New Park Requests</h2>
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/offlinerequest/park_requests" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/offlinerequest/OfflineParkRequestSubmit" name="add_park_requests_form" id="add_park_requests_form" method="post" enctype="multipart/form-data">
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
                            <label for="list-title">Theme Park</label>
                            <input type="text" class="form-control" id="themePark" name="themePark" placeholder="Enter theme park">
                        </div>
                        <div class="col-md-6 form-group departdate">
                          <label>Date</label><span>*</span>
                          <input type="text" class="datePicker-hide datepicker input-group-addon" id="pdate" name="pdate" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                          <?php $today=date('d/m/Y'); ?>
                            <div class="input-group">
                              <input class="form-control datepicker date-pic" id="alternate" name="" value="<?php echo $today ?>">
                              <label for="datepicker" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                            </div>
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
                        <div class="col-md-1">
                            <label for="" class="adults_err control-label">Adults</label>
                            <select id="adults" name="adults" class="mySelectBoxClass">
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
                            <select name="Child" class="mySelectBoxClass room1-child">
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
                    <div class="row">
                       <div class="form-group col-md-6">
                            <label for="list-title">Other Special Request</label>
                            <textarea name="special_req" class="form-control" id="special_req"></textarea>
                        </div> 
                    </div> 
                      <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group col-md-12">
                                <button type="button" style="margin-top: 25px" id="add_park_requests_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
                               
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
  // @datepicker
  // datepicker  for departure and return
      $("#pdate").datepicker({
            yearRange: "1950:<?php echo date('Y') ?>",
            altField: "#alternate",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
        });
        $("#alternate").click(function() {
            $( "#pdate" ).trigger('focus');
        });
      $(window).load(function() {   
      // @from autocomplete
      // dropdown with autocomplete for selecting from city
        var xhrTimer;
        var theXRequest;
        // @from autocomplete
        // dropdown with autocomplete for selecting destination city
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
        // @children age
        // children age fields based on the count of children
         $(".room1-child").change(function() {
              var room = $(".room1-child option:selected").val();
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
      // @flight request form submit
          $('#add_park_requests_submit_button').click(function (e) {
            e.preventDefault();
              $.ajax({
              dataType: 'json',
              type: 'post',
              url: base_url+'backend/offlinerequest/park_requests_validation',
              data: $('#add_park_requests_form').serialize(),
              cache: false,
              success: function (response) {
                // alert("data");
                if (response.status == "1") {
                  addToast(response.error,response.color);
                  window.setTimeout(function(){
                     $("#add_park_requests_form").submit();
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
    </script>

<?php init_tail(); ?>


