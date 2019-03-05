<?php init_head(); 
$usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users','');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>skin/dist/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" type="text/javascript" src="<?php echo base_url();?>assets/DataTables/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/js/dataTables.bootstrap4.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Responsive/js/dataTables.responsive.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<!--== BODY INNER CONTAINER ==-->
 <div class="sb2-2 <?php echo count($usersmenu)=="" ? "hide" : '' ?>">
    <!--== DASHBOARD INFO ==-->
    <div class="sb2-2-1">
        <h2>Admin Dashboard </h2>
        <div class="db-2">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="dash-book">
                        <h5><b><span class="card-title">Users</span></b></h5>
                        <h4><?php echo $user_count; ?></h4>
                        <a href="<?php echo base_url();?>/backend/users">View more</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="dash-book">
                        <h5><b><span class="card-title">Agents</span></b></h5>
                        <h4><?php echo $agent_count; ?></h4>
                        <a href="<?php echo base_url();?>/backend/agents">View more</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="dash-book">
                        <h5><b><span class="card-title">Hotels</span></b></h5>
                        <h4><?php echo $hotel_count; ?></h4>
                        <a href="<?php echo base_url();?>/backend/hotels">View more</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="dash-book">
                        <h5><b><span class="card-title">Bookings</span></b></h5>
                        <h4><?php echo $booking_count; ?></h4>
                        <a href="<?php echo base_url();?>/backend/booking">View more</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="chart-wrap" style="height: 500px">
              
              <div class="dropdown" style="width: 100%; margin: 10px 20px">
                <h4 class="pull-left">Total Room Night</h4>
                <button type="button"  id="TRNfilterDropdown" class="btn-sm btn dropdown-toggle" data-toggle="dropdown" style="float: right;background: #337ab7;height: 33px;margin-top: 2px; margin-right: 20px">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                  </button>
                  <style type="text/css">
                    #TRNfilterDropdownUl > li {
                      border: none;
                    }
                  </style>
                  <ul class="dropdown-menu" id="TRNfilterDropdownUl" style="left: auto; right: 20px;top: 40px;   max-width: 204px;width: 200px;">
                    <li style="border: none">
                      <div class="form-group col-md-12 mt-10">
                        <input type="text" class="datePicker-hide datepicker input-group-addon" id="TRNFromDate" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d',strtotime('-5 month')) ?>" />
                        <div class="input-group">
                        <input class="form-control datepicker date-pic" id="TRNalternate1" name="" value="<?php echo date('d/m/Y',strtotime('-5 month')) ?>" readonly>
                        <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <input type="text" class="datePicker-hide datepicker input-group-addon" id="TRNToDate" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                        <?php $today=date('d/m/Y'); ?>
                        <div class="input-group">
                        <input class="form-control datepicker date-pic" id="TRNalternate2" value="<?php echo date('d/m/Y') ?>" readonly>
                        <label for="to_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <select id="TRNConSelect" onchange="TRNConSelectFun();" class="form-control">
                        <?php 
                        foreach ($country as $key => $v) {
                          if ($v->id==229) { ?>
                          <option selected="" value="<?php echo $v->id;?>"><?php echo $v->name; ?></option>
                        <?php  } else {
                           ?>
                          <option value="<?php echo $v->id;?>"><?php echo $v->name; ?></option>
                        <?php } } ?>
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <div class="multi-select-mod multi-select-trans1 input-hide">
                        <select id="TRNstateSelect"  class="form-control">
                        <option value=""> --State-- </option>
                        </select> 
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="col-md-12 mb-10">
                          <input type="button" class="form-control btn-sm btn-primary" id="TRNReportButton" value="Search">
                      </div>
                    </li>
                  </ul>
              </div>
                <canvas id="bar-chart-lead" style="width: 100%; height: 80%;"></canvas>
                <script type="text/javascript">
                  var TRN = new Chart(document.getElementById("bar-chart-lead"), {
                      type: 'bar',
                      data: {
                        labels: [1,2,3,4,5,6,7,8,9,10],
                        datasets: [
                          {
                            backgroundColor: ['#357ebd'],
                            data: [0,0,0,0,0,0,0,0,0,0]
                          }
                        ]
                      },
                      options: {
                        responsive:true,
                        legend: { display: false },
                        scales: {
                          yAxes: [{
                            scaleLabel: {
                              display: true,
                              labelString: 'Transaction'
                            }
                          }],
                          xAxes: [{
                            scaleLabel: {
                              display: true,
                              labelString: 'Lead Time'
                            }
                          }]
                        }
                      }
                  });
                </script>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="chart-wrap" style="height: 400px">
                  <p>
                    <ul class="tabs" style="width: 92%;float: left;">
                      <li class="tab col s3"><a class="active" href="#" onclick="MBCbookingreportfilter('1')">Received</a></li>
                      <li class="tab col s3"><a  href="#" onclick="MBCbookingreportfilter('2')">Materialized</a></li>
                      <li class="tab col s3"><a href="#" onclick="MBCbookingreportfilter('3')">Cancelled</a></li>
                    </ul>
                    <div class="dropdown" style="width: 8%">
                      <button type="button"  id="MBCfilterDropdown" class="btn-sm btn dropdown-toggle" data-toggle="dropdown" style="float: right;background: #337ab7;height: 33px;margin-top: 2px;">
                          <i class="fa fa-filter" aria-hidden="true"></i>
                        </button>
                        <style type="text/css">
                          #MBCfilterDropdownUl > li {
                            border: none;
                          }
                        </style>
                        <ul class="dropdown-menu" id="MBCfilterDropdownUl" style="left: auto; right: 20px;top: 40px;   max-width: 204px;width: 200px;">
                          <li style="border: none">
                            <div class="form-group col-md-12 mt-10">
                              <select class="form-control" id="MBCYear">
                                <?php for ($i=date('Y'); $i >=2017 ; $i--) { ?> 
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </li>
                          <input type="hidden" id="MBCfilter" value="1">
                          <li>
                            <div class="col-md-12 mb-10">
                                <input type="button" class="form-control btn-sm btn-primary" id="MBCReportButton" value="Search">
                            </div>
                          </li>
                        </ul>
                    </div>
                    </p>
                    <canvas id="bar-chart" style="position: relative; height:300px; width:100%"></canvas>
                    <script>
                    // Bar chart
                    var MBC = new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                          labels: [<?php if (count($mbcdata) !=0) {
                              foreach ($mbcdata as $key => $value) { ?>"<?php echo $value->country ?>"<?php } } ?>],
                          datasets: [
                            {
                              backgroundColor: [<?php if (count($mbcdata) !=0) {
                              foreach ($mbcdata as $key => $value) { ?>"#b0bec5"<?php } } ?>],
                              data: [<?php if (count($mbcdata) !=0) {
                              foreach ($mbcdata as $key => $value) { ?>"<?php echo $value->tot ?>"<?php } } ?>]
                            }
                          ]
                        },
                        options: {
                          legend: { display: false },
                          title: {
                            display: true,
                            text: 'Most Booking countries of <?php echo date('Y') ?>'
                          }
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: 'rgba(0,0,0,0.05)',
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    // beginAtZero: true,
                                    autoSkip: true,
                                },
                                gridLines: {
                                    display: false,
                                    drawOnChartArea: false
                                }
                            }]
                        }
                    });
                    </script>


                </div>
            </div>
           <div class="col-sm-12 col-lg-6">
                <div class="chart-wrap" style="height: 400px">
                    <div class="dropdown" style="width: 100%; margin: 10px 20px">
                      <h4 class="pull-left">Bookings of <span id="BCSpan"><?php echo date('Y') ?></span></h4>
                      <button type="button"  id="BCfilterDropdown" class="btn-sm btn dropdown-toggle" data-toggle="dropdown" style="float: right;background: #337ab7;height: 33px;margin-top: 2px; margin-right: 20px">
                          <i class="fa fa-filter" aria-hidden="true"></i>
                        </button>
                        <style type="text/css">
                          #BCfilterDropdownUl > li {
                            border: none;
                          }
                        </style>
                        <ul class="dropdown-menu" id="BCfilterDropdownUl" style="left: auto; right: 20px;top: 40px;   max-width: 204px;width: 200px;">
                          <li style="border: none">
                            <div class="form-group col-md-12 mt-10">
                              <select class="form-control" id="BCYear">
                                <?php for ($i=date('Y'); $i >=2017 ; $i--) { ?> 
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </li>
                          <li>
                            <div class="col-md-12 mb-10">
                                <input type="button" class="form-control btn-sm btn-primary" id="BCReportButton" value="Search">
                            </div>
                          </li>
                        </ul>
                    </div>
                    <canvas id="line-chart" style="position: relative; height:300px; width:100%"></canvas>
                    <script>
                        var BC = new Chart(document.getElementById("line-chart"), {
                          type: 'line',
                          data: {
                            labels: [<?php foreach ($month as $key1 => $value1) {  echo "'".strtoupper(substr($value1,0,3))."',";
                            }  ?>],
                            datasets: [
                            { 
                                data: [<?php foreach ($booking_Pen_status as $key2 => $value2) { echo count($value2).",";}  ?>],
                                label: "Requested",
                                borderColor: "#4CAF50",
                                fill: false
                              },
                              { 
                                data: [<?php foreach ($booking_app_status as $key2 => $value2) { echo count($value2).",";}  ?>],
                                label: "Approved",
                                borderColor: "#255a79",
                                fill: false
                              }, { 
                                data: [<?php foreach ($booking_can_status as $key3 => $value3) { echo count($value3).",";}  ?>],
                                label: "Cancelled",
                                borderColor: "#b0bec5",
                                fill: false
                              }
                            ]
                          }
                        });
                    </script>
                </div>
           </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="chart-wrap" style="height: 632px;">
                <p>
                  <ul class="tabs" style="width: 92%;float: left;">
                    <li class="tab col s3"><a class="active" href="#" onclick="bookingreportfilter('2')">Received</a></li>
                    <li class="tab col s3"><a  href="#" onclick="bookingreportfilter('1')">Materialized</a></li>
                    <li class="tab col s3"><a href="#" onclick="bookingreportfilter('3')">Cancelled</a></li>
                  </ul>

                <!-- Dropdown Structure -->
                <div class="dropdown" style="width: 8%">
                  <button type="button"  id="filterDropdown" class="btn-sm btn dropdown-toggle" data-toggle="dropdown" style="float: right;background: #337ab7;height: 33px;margin-top: 2px;">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                  </button>
                  <style type="text/css">
                    #filterDropdownUl > li {
                      border: none;
                    }
                    .mt-10 {
                      margin-top: 10px !important;
                    }
                    .mb-10 {
                      margin-bottom: 10px !important;
                    }
                  </style>
                  <ul class="dropdown-menu" id="filterDropdownUl" style="left: -140px;top: 40px;   max-width: 204px;width: 200px;">
                    <li style="border: none">
                      <div class="form-group col-md-12 mt-10">
                        <input type="text" class="datePicker-hide datepicker input-group-addon" id="from_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d' ,strtotime('-5 month')) ?>" />
                        <div class="input-group">
                        <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo date('d/m/Y' ,strtotime('-5 month')) ?>" readonly>
                        <label for="from_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <input type="text" class="datePicker-hide datepicker input-group-addon" id="to_date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('Y-m-d') ?>" />
                        <?php $today=date('d/m/Y'); ?>
                        <div class="input-group">
                        <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo $today ?>" readonly>
                        <label for="to_date" class="input-group-addon"><i class="fa fa-calendar"></i></label>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();" class="form-control">
                        <?php 
                        foreach ($country as $key => $v) {
                          if ($v->id==229) { ?>
                          <option selected="" value="<?php echo $v->id;?>"><?php echo $v->name; ?></option>
                        <?php  } else {
                           ?>
                          <option value="<?php echo $v->id;?>"><?php echo $v->name; ?></option>
                        <?php } } ?>
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <div class="multi-select-mod multi-select-trans1 input-hide">
                        <select name="stateSelect" id="stateSelect"  onchange ="StateSelectFun();" class="form-control">
                        <option value=""> --State-- </option>
                        </select> 
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group col-md-12">
                        <div class="multi-select-mod multi-select-trans1 input-hide">
                         <select name="HotelSelect" id="HotelSelect" class="form-control">
                          <option value=""> --Hotels-- </option>
                          </select> 
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="col-md-12 mb-10">
                          <input type="button" class="form-control btn-sm btn-primary" id="BookingFormReportButton" value="Search">
                      </div>
                    </li>
                  </ul>
                </div>
              </p>
             <div class="clearfix"></div>
             <br>
                <input type="hidden" id="filter" value="2">
                <table class="table table-responsive table-bordered" id="BookingReportTable">
                    <thead>
                        <tr>
                          <td>Name</td>
                          <td class="text-center summable" title="Total Transaction">TT</td>
                          <td class="text-center summable" title="Transaction % From Total">TFT</td>
                          <td class="text-center summable" title="Total Room Nights">TRN</td>
                          <td class="text-center summable" title="Room Nights % From Total">RNFT</td>
                          <td class="text-center" title="Average Lead Days">ALD</td>
                          <td class="text-center" title="Average Length Of Stay">ALS</td>
                        </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Grand Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th colspan="3"></th>
                        
                      </tr>
                    </tfoot>
                </table>
            </div>
          </div>
          <div class="col-md-6">
            <div class="chart-wrap" style="height: 632px;">
              <div class="col-md-12">
                    <canvas id="TransactionsChart" style="position: relative; height:275px; width:100%"></canvas>
                </div>
                <div class="col-md-12">
                    <canvas id="RoomNightsChart" style="position: relative; height:275px; width:100%"></canvas>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="map-wrap">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-lg-5">
                        <table class="table">
                        <tbody>
                            <?php if (count($location_count) !=0) {
                              foreach ($location_count as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <div class="flag"><img width="25" src="<?php echo base_url(); ?>assets/images/flg/<?php echo strtolower($value->country_code) ?>.png"></div>
                                        
                                    </td>
                                    <td><?php echo country_name($value->country_code) ?></td>
                                    <td class="text-right"><?php echo $value->count ?></td>
                                    <td class="text-right"><?php echo $total_booking ?></td>
                                    <td class="text-right"><?php echo number_format(($value->count/$total_booking)*100 ,2) ?>%</td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-lg-offset-1 col-lg-6">
                        <div id="container" style="position: relative; width: 100%; height: 300px;"></div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
</div>

<div id="myModal" class="modal fade delete_modal" data-target="#myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-md-12 form-group">
          <h3>Change Password</h3>
        </div>
        <div class="line2"></div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 form-group">
            <span class="text cpass">Current Password</span><span class="text_red1 cpass1 cPassword-error"></span>
            <input type="Password" name="cPassword" class="form-control">
          </div>
          <div class="col-md-12 form-group">
            <span class="text npass">New Password</span><span class="text_red1 npass1 nPassword-error"></span>
            <input type="Password" name="nPassword" class="form-control">
          </div>
            <input type="hidden" name="email" value="<?php echo $password_reset[0]->Email ?>">
          <div class="col-md-12 form-group" style="padding-bottom: 20px;">
            <button class="btn btn-primary pull-right ChangePasswordSubmit " style="margin-left: 5px;">Change</button>
            <button class="btn btn-danger pull-right ChangePasswordCancel " data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clearfix">
</div>
<script type="text/javascript">
  var TranChart = new Chart(document.getElementById("TransactionsChart"), {
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
        text: 'Total Transactions'
      }
    }
  });


  var RoomNightChart = new Chart(document.getElementById("RoomNightsChart"), {
    type: 'doughnut',
    data: {
      labels: ["Empty"],
      datasets: [
        {
          backgroundColor: ["#255A79"],
          data: [100]
        }
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        fontStyle: 'bold',
        text: 'Total Room Nights'
      }
    }
});


  $(function() {
    $("#TRNfilterDropdown").click(function() {
      $("#TRNfilterDropdownUl").toggleClass('show');
    })

    $("#MBCfilterDropdown").click(function() {
      $("#MBCfilterDropdownUl").toggleClass('show');
    })

    $("#BCfilterDropdown").click(function() {
      $("#BCfilterDropdownUl").toggleClass('show');
    })

    $("#filterDropdown").click(function() {
      $("#filterDropdownUl").toggleClass('show');
    })
    $('#BookingReportTable').dataTable();
    ConSelectFun();
    TRNConSelectFun();

    $("#TRNReportButton").click(function() {
      var TRNFromDate = $("#TRNFromDate").val();
      var TRNToDate = $("#TRNToDate").val();
      var TRNConSelect = $("#TRNConSelect option:selected").text();
      if (TRNFromDate==""){
        addToast('From Date Must be entered',"orange");
        $("#TRNFromDate").focus();
      } else if(TRNToDate==""){
        addToast('To Date Must be entered',"orange");
        $("#TRNToDate").focus();
      } else if(TRNConSelect==" Country "){
        addToast('To Date Must be entered',"orange");
        $("#TRNToDate").focus();
      } else {
        TRNformload();
      }
    });

    $("#BookingFormReportButton").click(function() {
          var from_date = $("#from_date").val();
          var to_date   = $("#to_date").val();
          var Con       = $("#ConSelect option:selected").text();
          if (from_date==""){
            addToast('From Date Must be entered',"orange");
            $("#from_date").focus();
          } else if(to_date==""){
            addToast('To Date Must be entered',"orange");
            $("#to_date").focus();
          } else if (from_date>to_date){
            addToast('To Date Must be After From Date',"orange");
            $("#to_date").focus();
          } else if (Con==" Country "){
            addToast('Select a country from list',"orange");
            $("#ConSelect").focus();
          } else{
            bookingreportfilter($("#filter").val());
          }
    });

    $("#BCReportButton").click(function() {
      BCReportfun();
    })

    $("#MBCReportButton").click(function() {
      MBCReportfun();
    })

    setTimeout(defaultloadfun, 1000)
  }) 
  function MBCbookingreportfilter(val)  {
      $("#MBCfilter").val(val);
      MBCReportfun();
  }
  function defaultloadfun() {
    // BCReportfun();
    TRNformload();
    bookingreportfilter($("#filter").val());
  }
  function TRNConSelectFun(){
    var hiddenState = $("#TRNhiddenState").val();
    $('#TRNstateSelect option').remove();
      var ConSelect = $('#TRNConSelect').val();
      $.ajax({
          url: base_url+'/backend/Report/StateSelect?Conid='+ConSelect,
          type: "POST",
          data:{},
          dataType: "json",
          success:function(data) {
            $('#TRNstateSelect').append('<option value=""> --State-- </option>');
              $.each(data, function(i, v) {
                if(hiddenState==v.id) {
                    selected = 'selected';
                  } else {
                    selected = '';
                  }
                  $('#TRNstateSelect').append('<option '+selected+' value="'+ v.id +'">'+ v.name +'</option>');
              });
          }
      });
  }

  function ConSelectFun(){
    var hiddenState = $("#hiddenState").val();
    $('#stateSelect option').remove();
      var ConSelect = $('#ConSelect').val();
      $.ajax({
          url: base_url+'/backend/Report/StateSelect?Conid='+ConSelect,
          type: "POST",
          data:{},
          dataType: "json",
          success:function(data) {
            $('#stateSelect').append('<option value=""> --State-- </option>');
              $.each(data, function(i, v) {
                if(hiddenState==v.id) {
                    selected = 'selected';
                  } else {
                    selected = '';
                  }
                  $('#stateSelect').append('<option '+selected+' value="'+ v.id +'">'+ v.name +'</option>');
              });
              StateSelectFun();
          }
      });
  }

  function StateSelectFun(){
      var hiddenHotel = $("#hiddenHotel").val();
      $('#HotelSelect option').remove();
        var StateSelect = $('#stateSelect').val();
        $.ajax({
            url: base_url+'/backend/Report/HotelSelect?stateid='+StateSelect,
            type: "POST",
            data:{},
            dataType: "json",
            success:function(data) {
              $('#HotelSelect').append('<option value=""> --Hotel-- </option>');
                $.each(data, function(i, v) {
                  if(hiddenHotel==v.id) {
                      selected = 'selected';
                    } else {
                      selected = '';
                    }
                    $('#HotelSelect').append('<option '+selected+' value="'+ v.id +'">'+ v.hotel_name +'</option>');
                });
            }
        });
  }

  function BCReportfun() {
    var year = $("#BCYear option:selected").val();
    $("#BCSpan").text(year);
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/BCReport?year='+year,
      cache: false,
      success: function (response) {
        let BCData = {
                labels: response.month,
                datasets: [ { 
                    data: response.booking_Pen_status,
                    label: "Requested",
                    borderColor: "#4CAF50",
                    fill: false
                  },
                  { 
                    data: response.booking_app_status,
                    label: "Approved",
                    borderColor: "#255a79",
                    fill: false
                  }, { 
                    data: response.booking_can_status,
                    label: "Cancelled",
                    borderColor: "#b0bec5",
                    fill: false
                  }
                ]
              }
        BC.data = BCData;
        BC.update();
      }
    });
  }

  function MBCReportfun() {
    var filter = $("#MBCfilter").val();
    var year = $("#MBCYear option:selected").val();
    MBC.options.title.text = 'Most Booking countries of '+year;
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/MBCReport?filter='+filter+'&year='+year,
      cache: false,
      success: function (response) {
        country = [];
        TotalTransaction = [];
        colors = [];
        if (response.mbcdata.length!=0) {
          $.each(response.mbcdata, function(i, v) {
             country.push(v.country);
             TotalTransaction.push(v.tot);
             colors.push('#b0bec5');
          });

          let MBCData=  {
              labels: country,
              datasets: [
                {
                  backgroundColor: colors,
                  data: TotalTransaction
                }
              ]
            }
          MBC.data = MBCData;
          MBC.update();
        } else {
          let MBCData=  {
              labels: country,
              datasets: [
                {
                  backgroundColor: colors,
                  data: TotalTransaction
                }
              ]
            }
          MBC.data = MBCData;
          MBC.update();
        }
      }
    });
  }

  function TRNformload() {
    var from_date = $("#TRNFromDate").val();
    var to_date   = $("#TRNToDate").val();
    var Con       = $("#TRNConSelect option:selected").text();
    var country_id = $("#TRNConSelect option:selected").val();
    var state     = $("#TRNstateSelect option:selected").text();
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/TRNReport?from_date='+from_date+'&to_date='+to_date+'&ConSelect='+Con+'&state='+state+'&city=Select',
      cache: false,
      success: function (response) {
        if (response.LeadTime.length!=0) {
          let TRNData = {
            labels: response.LeadTime,
            datasets: [
              {
                backgroundColor: response.colors,
                data: response.Transaction
              }
            ]
          }
          TRN.data = TRNData;
          TRN.update();
        } else {
          let TRNData = {
            labels: [1,2,3,4,5,6,7,8,9,10],
            datasets: [
              {
                backgroundColor: ['#357ebd'],
                data: [0,0,0,0,0,0,0,0,0,0]
              }
            ]
          }
          TRN.data = TRNData;
          TRN.update();
        }
      }
    });
  }

  function bookingreportfilter(val) {
      $("#filter").val(val);
      var from_date = $("#from_date").val();
      var to_date   = $("#to_date").val();
      var Con       = $("#ConSelect option:selected").text();
      var country_id = $("#ConSelect option:selected").val();
      var state     = $("#stateSelect").val();
      var hotelid = $("#HotelSelect").val();
      var agent_id  = '';
      var BookingReportTable = $('#BookingReportTable').dataTable({
        "bDestroy": true,
        "ajax": {
          url : base_url+'backend/report/BookingReportList?filter='+val+'&from_date='+from_date+
          '&to_date='+to_date+'&country_id='+country_id+'&state='+state+'&hotelid='+hotelid+'&agent_id='+agent_id,
          type : 'POST' 
          },

        "fnDrawCallback": function(settings){
               $('[data-toggle="tooltip"]').tooltip();          
        },
        "footerCallback":function(row, data, start, end, display){
                  var api = this.api();
                  api.columns('.summable').every(function() {
                      var sum = api.cells(null, this.index()).render('display').reduce(function(a, b) {var x = parseFloat(a) || 0 ;var y = parseFloat(b) || 0;return x + y;}, 0);$(this.footer()).html('<h5>'+sum+'</h5>');});
              }

      });    

      


      // Chart 

      Name = [];
          Transaction = [];
          Nights = [];
          colors = [];
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'backend/report/BookingPatternReportList?&from_date='+from_date+'&to_date='+to_date+'&country_id='+country_id+'&state='+state+'&hotelid='+hotelid,
          cache: false,
          success: function (response) {
            if (response.length!=0) {
              $.each(response.Name, function(i, v) {
                 Name.push(v);
                 Transaction.push(response.TOTALCOUNT[i]);
                 Nights.push(response.TOTALROOMNIGHTS[i]);
                 colors.push(response.colors[i]);
              });


              // Chart TransactionsChart
              let newData = {
                labels: Name,
                datasets: [
                  {
                    backgroundColor: colors,
                    data: Transaction
                  }
                ]
              }

              let newData1 = {
                labels: Name,
                datasets: [
                  {
                    backgroundColor: colors,
                    data: Nights
                  }
                ]
              }


              TranChart.data = newData;
              RoomNightChart.data = newData1;
              TranChart.update();
              RoomNightChart.update();

            }
            
          } 
        });
  }

    $("#TRNFromDate").datepicker({
      yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
      altField: "#alternate1",
      // altField: "#alternate",
      dateFormat: "yy-mm-dd",
      altFormat: "dd/mm/yy",
      changeYear : true,
      changeMonth : true,
    });

    $("#TRNalternate1").click(function() {
      $( "#TRNFromDate" ).trigger('focus');
    });


    $("#TRNToDate").datepicker({
            yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
            altField: "#alternate2",
            // altField: "#alternate",
            dateFormat: "yy-mm-dd",
            altFormat: "dd/mm/yy",
            changeYear : true,
            changeMonth : true,
  });
  $("#TRNalternate2").click(function() {
      $( "#TRNToDate" ).trigger('focus');
  });

    $("#from_date").datepicker({
        yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
        altField: "#alternate1",
        // altField: "#alternate",
        dateFormat: "yy-mm-dd",
        altFormat: "dd/mm/yy",
        changeYear : true,
        changeMonth : true,
    });
    $("#alternate1").click(function() {
        $( "#from_date" ).trigger('focus');
    });
    $("#to_date").datepicker({
              yearRange: "2016:<?php echo date('Y' ,strtotime('+2 year')) ?>",
              altField: "#alternate2",
              // altField: "#alternate",
              dateFormat: "yy-mm-dd",
              altFormat: "dd/mm/yy",
              changeYear : true,
              changeMonth : true,
    });
    $("#alternate2").click(function() {
        $( "#to_date" ).trigger('focus');
    });
</script>
<script>
    $(function() {
        var options = {
          height: 250,
          seriesBarDistance: 10
        };
        var dataLine = {
          labels: [<?php foreach ($month as $key1 => $value1) { 
              echo "'".strtoupper(substr($value1,0,3))."',";
          }  ?>],
          series: [
            [<?php foreach ($booking_app_status as $key2 => $value2) { 
              echo count($value2).",";}  ?>],[<?php foreach ($booking_can_status as $key3 => $value3) { 
              echo count($value3).",";}  ?>]
          ]
        };
        var dataBar = {
          labels: [<?php foreach ($month as $key1 => $value1) { 
              echo "'".strtoupper(substr($value1,0,3))."',";
          }  ?>],
            series: [
            [<?php foreach ($booking_can_status as $key3 => $value3) { 
              echo count($value3).",";}  ?>],[<?php foreach ($booking_app_status as $key2 => $value2) { 
              echo count($value2).",";}  ?>]
          ]
        };

        // new Chartist.Line('.line-chart', dataLine, options);
        // new Chartist.Bar('.ct-chart', dataBar, options);

        // var map = new Datamap({element: document.getElementById('container')});
        // $('#world-map').vectorMap({map: 'world_mill'});
    var map = new Datamap({
      element: document.getElementById("container"),
      projection: 'mercator',
      geographyConfig: { 
        highlightFillColor: '#66BB6A',
        highlightBorderColor: '#66BB6A'
        },
      fills: {
        defaultFill: "#ABDDA4",
        authorHasTraveledTo: "#E57373",
      },
      data: {
        <?php if (count($map) !=0) {
          foreach ($map as $key => $value) { ?>
            <?php echo country_code($value->country_code) ?> : { fillKey: "authorHasTraveledTo" },
        <?php } } ?>
      }
    });
    var colors = d3.scale.category10();
  });

  $(document).on('click', '#btnSelectAll', function (event)
  {
    event.preventDefault();
  });
  // $(document).ready(function() {
        $('.ChangePasswordSubmit').click(function() {
        cPassword = $('input[name="cPassword"]').val();
        nPassword = $('input[name="nPassword"]').val();
        email = $('input[name="email"]').val();
        if (cPassword=="" || nPassword=="") {
          if (cPassword=="" && nPassword=="") {
            $(".cPassword-error").text(' is required');
            $(".nPassword-error").text(' is required');
            $(".cpass").addClass('text_red1');
            $(".cpass1").addClass('text_red1');
            $(".npass").addClass('text_red1');
            $(".npass1").addClass('text_red1');
          } else if(cPassword=="") {
            $(".nPassword-error").text('');
            $(".cPassword-error").text(' is required');
            $(".cpass").addClass('text_red1');
            $(".cpass1").addClass('text_red1');
            $(".npass").removeClass('text_red1');
            $(".npass1").removeClass('text_red1');

          } else if(nPassword=="") {
            $(".cPassword-error").text('');
            $(".nPassword-error").text(' is required');
            // $(".nPassword").addClass('text_red1');
            // $(".nPassword").removeClass('text_red1');
            // $(".nPassword-error").removeClass('text_red1');
            $(".npass").addClass('text_red1');
            $(".npass1").addClass('text_red1');
            $(".cpass").removeClass('text_red1');
            $(".cpass1").removeClass('text_red1');
          }
        } else {
          $("span").removeClass('text_red1');
          $("span").removeClass('text_red1');
          $(".cPassword-error").text('*');
          $(".nPassword-error").text('*');
          $.ajax({
                dataType: 'json',
                type: "Post",
                url: base_url+'backend/hotels/ChangeHotelPassword?cPassword='+cPassword+'&nPassword='+nPassword+'&email='+email,
                success: function(data) {
                  if (data=="success") {
                      window.location = base_url+"/backend/logout";
                  } else {
                    $(".cPassword-error").text(' is incorrect. Try again!');
                  }
                }
            });
          }
        });
        $('.ChangePasswordCancel').click(function() {
          email = $('input[name="email"]').val();
          $.ajax({
                dataType: 'json',
                type: "Post",
                url: base_url+'backend/hotels/ChangeHotelPasswordCancel?email='+email,
                success: function(data) {
                  $('#myModal').dialog("close");
                }
            });
        });
    if(<?php echo $password_reset[0]->password_reset ?> == 1)
        {
          $('#myModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
          });
          $("#myModal").load(base_url+'backend/hotels/myModal');
          $('#myModal').removeClass('fade'); 
          // $('#myModal').modal('show');
        }
    

      $('.test').click(function() {
        $('#myModal').modal('show');
      }); 

    // });
      $('.notify_dropdown').click(function() {
        $(this).toggleClass('open');
        $('.notify_dropdown > .dropdown-menu').css({"margin": "0px", "right": "0","left": "-275px"});
    });

</script>
<?php init_tail(); ?>


<style type="text/css">
  .text_red1{
    color: red;
  }
</style>

<!-- END OF CONTENT -->

