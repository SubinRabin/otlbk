<?php init_front_head_dashboard(); ?>
<style type="text/css">
  .mt-10 {
    margin-top: 20px !important;
  }
  .mb-10 {
    margin-bottom: 10px !important;
  }
</style>
<script type="text/javascript">
	$(document).ready(function() {
    $("#creditfilterDropdown").click(function() {
      $("#creditfilterDropdownDiv").toggleClass('show');
      $("#creditfilterDropdownMain").toggleClass('open');
    })

    $("#bookingfilterDropdown").click(function() {
      $("#bookingfilterDropdownDiv").toggleClass('show');
      $("#bookingfilterDropdownMain").toggleClass('open');
    })
		    //------------------------------
    /*Amount data from dashboard controller*/
    //------------------------------
    var BookingChart = new Chart(document.getElementById("BookingChart"), {
      type: 'doughnut',
      data : {
        labels: ["Empty"],
        datasets: [{
            data: [100],
            backgroundColor: ["#255A79"],
        }],
      },
      options: {
        title: {
          display: true,
          fontSize: 20,
          fontStyle: 'bold',
          text: 'Total Bookings'
        }
      }
    });


    var CreditChart = new Chart(document.getElementById("CreditChart"), {
      type: 'line',
      data : {
        labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
        datasets: [
          {
              data: [0,0,0,0,0,0,0,0,0,0,0,0],
              label: "Credit",
              borderColor: "#4CAF50",
              fill: false
          },
          {
              data: [0,0,0,0,0,0,0,0,0,0,0,0],
              label: "Used",
              borderColor: "#255a79",
              fill: false
          }
        ],
      },
      options: {
        title: {
          display: true,
          fontSize: 20,
          fontStyle: 'bold',
          text: 'Credit Information of <?php echo date('Y') ?>'
        }
      }
    });

    var labelName = [];
    var dataBooking = [];
    var bookingYear = $("#bookingYear").val();
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'dashboard/booking_chart?year='+bookingYear,
      data: $('#agent_reg').serialize(),
      cache: false,
      success: function (response) {
        labelName.push("Confirmed");
        labelName.push("Cancelled");
        labelName.push("On Request");
        labelName.push("Cancellation Request");
        labelName.push("Accept Request");

        dataBooking.push(response.confirm_count);
        dataBooking.push(response.cancel_count);
        dataBooking.push(response.request_count);
        dataBooking.push(response.cancel_req_count);
        dataBooking.push(response.accept_req_count);

          let newData = {
            labels: labelName,
            datasets: [
              {
                backgroundColor: ['#00bcd4', '#e53935', '#de8040', '#df35aa','#2d2d2d'],
                data: dataBooking
              }
            ]
          }

          BookingChart.data = newData;
          BookingChart.update();
      }
    });

    $("#bookingFilter").click(function() {
        var labelName = [];
        var dataBooking = [];
        var bookingYear = $("#bookingYear").val();
        if (bookingYear!='All') {
          BookingChart.options.title.text = 'Bookings of '+bookingYear;
        } else {
          BookingChart.options.title.text = 'Total Bookings';
        }
        $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'dashboard/booking_chart?year='+bookingYear,
        data: $('#agent_reg').serialize(),
        cache: false,
        success: function (response) {
          labelName.push("Confirmed");
          labelName.push("Cancelled");
          labelName.push("On Request");
          labelName.push("Cancellation Request");
          labelName.push("Accept Request");

          dataBooking.push(response.confirm_count);
          dataBooking.push(response.cancel_count);
          dataBooking.push(response.request_count);
          dataBooking.push(response.cancel_req_count);
          dataBooking.push(response.accept_req_count);

            let newData2 = {
              labels: labelName,
              datasets: [
                {
                  backgroundColor: ['#00bcd4', '#e53935', '#de8040', '#df35aa','#2d2d2d'],
                  data: dataBooking
                }
              ]
            }

            BookingChart.data = newData2;
            BookingChart.update();
        }
      });
    })

    var year = $("#CreditYear").val();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'dashboard/amount_chart?year='+year,
        data: $('#agent_reg').serialize(),
        cache: false,
        success: function (response) {
          let newData1 = {
              labels : response.months,
              datasets: [
              {
                  data: response.credit,
                  label: "Credit",
                  borderColor: "#4CAF50",
                  fill: false
              },
              {
                  data: response.used,
                  label: "Used",
                  borderColor: "#255a79",
                  fill: false
              }
            ]
          }
          CreditChart.data = newData1;
          CreditChart.update();
        }
      });

    $("#creditFilter").click(function() {
      var year = $("#CreditYear").val();
      CreditChart.options.title.text = 'Credit Information of '+year;
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'dashboard/amount_chart?year='+year,
        data: $('#agent_reg').serialize(),
        cache: false,
        success: function (response) {
          let newData1 = {
              labels : response.months,
              datasets: [
              {
                  data: response.credit,
                  label: "Credit",
                  borderColor: "#4CAF50",
                  fill: false
              },
              {
                  data: response.used,
                  label: "Used",
                  borderColor: "#255a79",
                  fill: false
              }
            ]
          }
          CreditChart.data = newData1;
          CreditChart.update();
        }
      });
    })    

    
	});
</script>
<div class="my-card">
	<div class="row">
		<div class="col-sm-4">
			<div class="circle-tile ">
		        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-credit-card fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content dark-blue">
		          <div class="circle-tile-number text-faded">Credit Info</div>
		          <div class="circle-tile-description text-faded">Available<span class="countervenue"><?php echo currency_type($available[0]->Preferred_Currency,$available[0]->Credit_amount).' '.$available[0]->Preferred_Currency ?></span><span>:</span></div>
		          <div class="circle-tile-description text-faded">Used<span class="countervenue"><?php echo currency_type($available[0]->Preferred_Currency,$used).' '.$available[0]->Preferred_Currency ?></span><span>:</span></div>
		          <div class="circle-tile-description text-faded"> Total<span class="countervenue"><?php echo currency_type($available[0]->Preferred_Currency,$available[0]->Credit_amount+$used).' '.$available[0]->Preferred_Currency ?></span><span>:</span></div>
		        </div>
	     	</div>
		</div>
		<div class="col-sm-4">
			<div class="circle-tile ">
		        <a href="#"><div class="circle-tile-heading light-blue"><i class="fa fa-gift fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content light-blue">
		          <div class="circle-tile-number text-faded">Rewards</div>
		          <div class="circle-tile-description text-faded">Pending<span class="countervenue">0</span><span>:</span></div>
		          <div class="circle-tile-description text-faded">Accumulated<span class="countervenue">0</span><span>:</span></div>
		          <div class="circle-tile-description text-faded"> Total<span class="countervenue">0</span><span>:</span></div>
		        </div>
	     	</div>
		</div>
		<div class="col-sm-4">
			<div class="circle-tile ">
		        <a href="#"><div class="circle-tile-heading light-green"><i class="fa fa-hotel fa-fw fa-3x"></i></div></a>
		        <div class="circle-tile-content light-green">
		        	<div class="circle-tile-number text-faded">Bookings</div>
              <div class="circle-tile-description text-faded">On Request<span class="countervenue"><?php echo $request_count; ?></span><span>:</span></div>
		        	<div class="circle-tile-description text-faded">Confirmed<span class="countervenue"><?php echo $confirm_count; ?></span><span>:</span></div>
		        	<div class="circle-tile-description text-faded">Cancelled<span class="countervenue"><?php echo $cancel_count; ?></span><span>:</span></div>
              <div class="circle-tile-description text-faded">Cancellation Request<span class="countervenue"><?php echo $cancel_req_count; ?></span><span>:</span></div>
		        	<div class="circle-tile-description text-faded">Accept Request<span class="countervenue"><?php echo $accept_req_count; ?></span><span>:</span></div>
		        	<div class="circle-tile-description text-faded">Total<span class="countervenue"><?php echo $confirm_count+$cancel_count+$request_count+$reject_count+$cancel_req_count+$accept_req_count ?></span><span>:</span></div>
		        </div>
	     	</div>	
		</div>
		<div class="clearfix"></div>
	</div>
	</div>

	<div class="col-md-6">
    <div class="dropdown" id="creditfilterDropdownMain" style="transform: translateY(26px);
    z-index: 9999999999;right: 10px;float: right;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="creditfilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter" aria-hidden="true"></i>
      </button>
      <div class="dropdown-menu" id="creditfilterDropdownDiv" style="    transform: translateX(-130px);width: 168px;">
        <li>
          <div class="form-group col-md-12 mt-10">
            <select class="form-control" id="CreditYear">
              <?php for ($i=date('Y'); $i >=2017 ; $i--) { ?> 
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </li>
        <li>
          <div class="col-md-12 mb-10">
            <input type="button" class="form-control btn-sm btn-primary" id="creditFilter" value="Search">
          </div>
        </li>
      </div>
    </div>
    <div class="btm-card" >
		<div class="col-md-12">
			<canvas id="CreditChart" style="position: relative; height:300px; width:100%"></canvas>
		</div>
    </div>
	</div>

	<div class="col-md-6">
    <div class="dropdown" id="bookingfilterDropdownMain" style="transform: translateY(26px);
    z-index: 9999999999;right: 10px;float: right;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="bookingfilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter" aria-hidden="true"></i>
      </button>
      <div class="dropdown-menu" id="bookingfilterDropdownDiv" style="    transform: translateX(-130px);width: 168px;">
        <li>
          <div class="form-group col-md-12 mt-10">
            <select class="form-control" id="bookingYear">
              <option value="All">All</option>
              <?php for ($i=date('Y'); $i >=2017 ; $i--) { ?> 
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </li>
        <li>
          <div class="col-md-12 mb-10">
            <input type="button" class="form-control btn-sm btn-primary" id="bookingFilter" value="Search">
          </div>
        </li>
      </div>
    </div>
     <div class="btm-card">
		<div class="col-md-12">
      <canvas id="BookingChart" style="position: relative; height:300px; width:100%"></canvas>
		</div>
  </div>
	</div>



	</div>
	<!-- END OF RIGHT CPNTENT -->
	<div class="clearfix"></div>
	</div>
	<!-- END CONTENT -->			
	</div>
	</div>
	<!-- END OF CONTENT -->
	<div class="masternotice none">
	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	 Message from MacLink Info Pvt
	</div>
<?php init_front_head_footer(); ?> 

