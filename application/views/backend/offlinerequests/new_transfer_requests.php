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
                
                <h2>New Transfer Requests</h2>
               
                <span class="pull-right"><a href="<?php echo base_url(); ?>backend/offlinerequest/transfer_requests" class="btn-sm btn-primary">Back</a></span>
            </div>
            <form action="<?php echo base_url(); ?>backend/offlinerequest/OfflineTransferRequestSubmit" name="add_transfer_requests_form" id="add_transfer_requests_form" method="post" enctype="multipart/form-data">
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
                        <div class="form-group col-md-6">
                            <label for="list-title">Other Special Requests</label>
                             <textarea class="form-control" id="special_req" name="special_req"></textarea>
                        </div>
                                          
                    </div> 
                    <div class="row">
                        <div class="col-md-1">
                            <label for="" class="adults_err control-label">Adults</label>
                            <select id="Passenger" name="Passenger" class="mySelectBoxClass">
                                <?php for ($i=1; $i <=15 ; $i++) { ?> 
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="" class="control-label">Bags</label>
                            <select name="Bags" class="mySelectBoxClass">
                                <?php for ($i=0; $i <=15 ; $i++) { ?> 
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> 
                    <hr> 
                    <div class="row">
                      <div class="form-group col-md-6">

                          <label for="list-title">Type of Transfer</label><br>
                          <input type="radio" class="with-gap" id="one-way" name="transfertype" checked="" value="one-way" />
                          <label for="one-way">One-Way</label>                              &nbsp&nbsp&nbsp
                          <input type="radio" class="with-gap" id="two-way" name="transfertype" value="two-way"/>
                          <label for="two-way">Two-Way</label>
                       </div>
                    </div>
                          
                      <div class="row">
                        <div class="form-group col-md-6">
                          <fieldset class="oneway">
                            <legend>One Way </legend>
                            <div class="form-group col-md-6">
                              <label>Arrival Flight No</label><span>*</span>
                              <input type="text" class="form-control" id="arrivalNo" name="arrivalNo">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Arrival Flight Time</label><span>*</span>
                              <input type="text" class="form-control datetime" id="arrivalTime" name="arrivalTime" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                             <label>Pick up Point</label><span>*</span>
                              <input type="text" class="form-control" id="pickpoint" name="pickpoint">
                            </div>
                            <div class="form-group col-md-6">
                             <label>Drop Off Point</label><span>*</span>
                              <input type="text" class="form-control" id="droppoint" name="droppoint">
                            </div>
                         </fieldset> 
                        </div>  
                  
                    
                        <div class="form-group col-md-6">
                          <fieldset class="twoway">
                            <legend>Two Way </legend>
                            <div class="form-group col-md-6">
                              <label>Departure Flight No</label><span>*</span>
                              <input type="text" class="form-control" id="departureNo" name="departureNo">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Departure Flight Time</label><span>*</span>
                              <input type="text" class="form-control datetime" id="departureTime" name="departureTime" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                             <label>Pick up Point</label><span>*</span>
                              <input type="text" class="form-control" id="pickpoint1" name="pickpoint1">
                            </div>
                            <div class="form-group col-md-6">
                             <label>Drop Off Point</label><span>*</span>
                              <input type="text" class="form-control" id="droppoint1" name="droppoint1">   
                            </div>
                         </fieldset> 
                        </div>
                      </div>
               
                   
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group col-md-12">
                                <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                     <button type="button" id="add_transfer_requests_submit_button" class="waves-effect waves-light btn-sm btn-success">Update</button>
                                <?php } else { ?>
                                <button type="button" style="margin-top: 25px" id="add_transfer_requests_submit_button" class="waves-effect waves-light btn-sm btn-success pull-right">Submit</button>
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
        /*var input = document.getElementById('Destination');
        var autocomplete = new google.maps.places.Autocomplete(input);*/
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
      });
      
        $(".twoway").hide();
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
  $('#add_transfer_requests_submit_button').click(function (e) {
    e.preventDefault();
      $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/offlinerequest/transfer_requests_validation',
      data: $('#add_transfer_requests_form').serialize(),
      cache: false,
      success: function (response) {
        // alert("data");
        if (response.status == "1") {
          addToast(response.error,response.color);
          window.setTimeout(function(){
             $("#add_transfer_requests_form").submit();
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
 $(".with-gap").click(function() {
  var type=$('input[name=transfertype]:checked').val();
  if(type=='one-way'){
    $(".twoway").hide();
  }else if(type=='two-way'){
    $(".twoway").show();
  }
 })

     
</script>
     

<?php init_tail(); ?>


