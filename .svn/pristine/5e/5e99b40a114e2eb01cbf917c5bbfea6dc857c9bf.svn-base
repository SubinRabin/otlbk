<script src="<?php echo base_url(); ?>skin/js/agentrequests.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>

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
<div class="modal-dialog" style="height:100%;overflow-y:auto;">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-body">
      <h3>Add offline transfer request</h3>
      <hr>
      <form method="post" id="OfflineTransferRequestform">
        <input type="hidden" name="id" id="id">
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Type of transfer</label><br>
            <input type="radio" class="with-gap" id="one-way" name="transfertype" checked="" value="one-way" class="form-control" />
            <label for="one-way">One-Way</label>                            &nbsp&nbsp&nbsp
            <input type="radio" class="with-gap" id="two-way" name="transfertype" value="two-way" class="form-control"/>
            <label for="two-way">Two-Way</label>
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
            <label>Nationality</label>
            <select name="nationality" class="form-control" id="nationality">
              <option value="">Select Nationality</option>
              <?php $count=count($nationality);
              for ($i=0; $i <$count ; $i++) {  ?>
                <option value="<?php echo $nationality[$i]->sortname; ?>"><?php echo $nationality[$i]->name ?></option>
              <?php  } ?> 
            </select>
          </div> 
          <div class="col-md-3 form-group">
            <label for="" class="adults_err control-label">Passenger</label>
            <select id="Passenger" name="Passenger" class="form-control mySelectBoxClass">
              <?php for ($i=1; $i <= 15; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Bags</label>
            <select name="Bags" class="form-control mySelectBoxClass">
              <?php for ($i=0; $i <= 15; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <fieldset class="oneway">
              <legend>One Way </legend>
              <div class="row">
              <div class="form-group col-md-6">
                <label>Arrival Flight No</label><span>*</span>
                <input type="text" class="form-control" id="arrivalNo" name="arrivalNo">
              </div>
              <div class="form-group col-md-6">
                <label>Arrival Flight Time</label><span>*</span>
                <input type="text" class="form-control datetime" id="arrivalTime" name="arrivalTime" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
               <label>Pick up Point</label>
               <input type="text" class="form-control" id="pickpoint" name="pickpoint">
             </div>
             <div class="form-group col-md-6">
               <label>Drop Off Point</label>
               <input type="text" class="form-control" id="droppoint" name="droppoint">
             </div>
             </div>
           </fieldset> 
         </div>  
       </div>
       <div class="row">                
        <div class="form-group col-md-12">
          <fieldset class="twoway">
            <legend>Two Way </legend>
            <div class="row">
            <div class="form-group col-md-6">
              <label>Departure Flight No</label><span>*</span>
              <input type="text" class="form-control" id="departureNo" name="departureNo">
            </div>
            <div class="form-group col-md-6">
              <label>Departure Flight Time</label><span>*</span>
              <input type="text" class="form-control datetime" id="departureTime" name="departureTime" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
             <label>Pick up Point</label>
             <input type="text" class="form-control" id="pickpoint1" name="pickpoint1">

           </div>
           <div class="form-group col-md-6">
             <label>Drop Off Point</label>
             <input type="text" class="form-control" id="droppoint1" name="droppoint1">

           </div>
           </div>
         </fieldset> 

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
        <button class="pull-right btn btn-success ml10" id="OfflineTransferRequestSubmit">Submit</button>
        <button type="button" data-dismiss="modal" id="OfflineTransferRequestreject_button" class="close_but btn btn-danger ml10 pull-right">No</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>

<script type="text/javascript">      
  $(document).ready(function() {
    $(".twoway").hide();
        // @datepicker
        // datepicker  for transfer dates
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
      // @transfer type
      // to display one way and two way list based on the option checked
      $(".with-gap").click(function() {
        var type=$('input[name=transfertype]:checked').val();
        if(type=='one-way'){
          $(".twoway").hide();
        }else if(type=='two-way'){
          $(".twoway").show();
        }
      })     
    </script>
