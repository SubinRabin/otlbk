<?php init_head(); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Offline Flight Request Edit</span>
                    </div>
                </div>
            </div>
            <div class="tab-inn">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        <h4 class="bold">Request Details</h4>
                        <br>
                        <p>Request Id : FGB<?php echo $view[0]->id ?></p>
                        <p>Request Date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></p>
                        <p>Agent Name : <?php echo $view[0]->AFName.' '.$view[0]->ALName ?></p>
                      </div>
                      <form method="post" id="OfflineFlightRequestForm">
                      <div class="col-md-9">
                        <h4 class="bold">Guest Form</h4>
                        <br>
                        <table class="table-bordered" >
                            <thead style="background-color: #F2F2F2;">
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact number</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="text" name="ContactName" value="<?php echo $view[0]->ContactName ?>"></td>
                                <td><input type="text" name="contactemail" value="<?php echo $view[0]->contactemail ?>"></td>
                                <td><input type="number" name="contactnum" value="<?php echo $view[0]->contactnum ?>"></td>
                              </tr>
                            </tbody>
                          </table>
                          <br>
                      </div>
                      <div class="col-md-12">
                       
                        <h4 class="bold">Booking Form</h4>
                        <br>
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $view[0]->id; ?>">
                             <input type="hidden" name="type" value="<?php echo $view[0]->type; ?>" id="type">
                            <div class="form-group col-md-3">
                              <label for="arrivalNo">Arrival Flight No</label><span>*</span>
                              <input type="text" class="form-control" name="arrivalNo" id="arrivalNo" value="<?php echo $view[0]->arrivalNo ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="arrivalTime">Arrival Flight Time</label><span>*</span>
                               <input type="text" class="form-control datetime" id="arrivalTime" name="arrivalTime" autocomplete="off" value="<?php echo $view[0]->arrivalTime ?>">
                            </div>
                            <?php if($view[0]->type=="Round trip"){ ?> 
                               <div class="form-group col-md-3">
                              <label for="departureNo">Departure Flight No</label><span>*</span>
                              <input type="text" class="form-control" name="departureNo" id="departureNo" value="<?php echo $view[0]->departureNo ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="departureTime">Departure Flight Time</label><span>*</span>
                               <input type="text" class="form-control datetime" id="departureTime" name="departureTime" autocomplete="off" value="<?php echo $view[0]->departureTime ?>">
                            </div>
                            <?php } 
                            $CostPrice =explode(",", $view[0]->costprice);
                            $SellingPrice = explode(",", $view[0]->sellingprice);
                            $ProfitPrice = explode(",", $view[0]->profitprice);
                            $margin = explode(",", $view[0]->margin);
                            if(array_sum($SellingPrice)!=0 && array_sum($ProfitPrice)!=0){
                              $marginper = round(array_sum($ProfitPrice)/array_sum($SellingPrice) * 100); 
                              $marginper = round(array_sum($ProfitPrice)/array_sum($SellingPrice) * 100);
                            }
                            else{
                              $marginper =0;
                            }
                            
                            // for ($i=1; $i <= $view[0]->no_of_rooms; $i++) { 
                              ?>
                                <div class="col-md-12">
                                  <!-- <h4 class="room-name">Room <?php echo $i; ?> </h4><br> -->
                                  <table class="table-bordered" >
                                    <thead style="background-color: #F2F2F2;">
                                     <tr>
                                        <th style="width: 85px;">Type</th>
                                        <th style="width: 85px;">Date</th>
                                        <th style="width: 85px;">From</th>
                                        <th style="width: 85px;">Destination</th>
                                          <th style="width: 60px; text-align: center">Cost Rate</th>
                                        <th style="width: 120px; text-align: right">Selling Rate</th>
                                        <th style="width: 60px; text-align: right">Profit</th>
                                        <th style="width: 60px; text-align: right">Margin</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td><?php echo $view[0]->type; ?></td>
                                          <td><?php echo date('d/m/Y',strtotime($view[0]->departdate )) ?></td>
                                          <td><?php echo $view[0]->from ?></td>
                                          <td><?php echo $view[0]->destination ?></td>
                                          <td style="text-align: right"><input type="number" name="Cost[]" class="text-right costtext" value="<?php echo isset($CostPrice[0]) && $CostPrice[0]!="" ? $CostPrice[0] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Selling[]" class="text-right Sellingtext" value="<?php echo isset($SellingPrice[0]) && $SellingPrice[0]!="" ? $SellingPrice[0] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Profit[]" class="text-right Profittext" value="<?php echo isset($ProfitPrice[0]) && $ProfitPrice[0]!="" ? $ProfitPrice[0] : 0 ?>" readonly></td>
                                          <td style="text-align: right"><input type="number" name="margin[]" class="text-right margintext" value="<?php echo isset($margin[0]) && $margin[0]!="" ? $margin[0] : 0 ?>" readonly></td>
                                        </tr>
                                        <?php if($view[0]->type=='Round trip'){ ?>
                                          <tr>
                                          <td><?php echo 'Return' ?></td>
                                          <td><?php echo date('d/m/Y',strtotime($view[0]->returndate ))?></td>
                                          <td><?php echo $view[0]->destination ?></td>
                                          <td><?php echo $view[0]->from ?></td>
                                          <td style="text-align: right"><input type="number" name="Cost[]" class="text-right costtext" value="<?php echo isset($CostPrice[1]) && $CostPrice[1]!="" ? $CostPrice[1] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Selling[]" class="text-right Sellingtext" value="<?php echo isset($SellingPrice[1]) && $SellingPrice[1]!="" ? $SellingPrice[1] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Profit[]" class="text-right Profittext" value="<?php echo isset($ProfitPrice[1]) && $ProfitPrice[1]!="" ? $ProfitPrice[1] : 0 ?>" readonly></td>
                                          <td style="text-align: right"><input type="number" name="margin[]" class="text-right margintext" value="<?php echo isset($margin[1]) && $margin[1]!="" ? $margin[1] : 0 ?>" readonly></td>
                                        </tr>
                                          <?php } ?>
                                   
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td  colspan="4" style="text-align: right"><strong class="text-blue">Total</strong></td>
                                        <td class="totalcost" style="text-align: right; font-weight: 700;"><?php echo array_sum($CostPrice); ?></td>
                                        <td class="totalSelling" style="text-align: right; font-weight: 700;"><?php echo array_sum($SellingPrice) ?></td>
                                        <td class="totalProfit" style="text-align: right; font-weight: 700;"><?php echo array_sum($ProfitPrice) ; ?></td>
                                        <td class="totalMargin" style="text-align: right; font-weight: 700;"><?php echo $marginper.'%' ; ?></td>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                                <br>
                            <?php 
                          // }
                           ?>
                          </form>
                        </div>
                        <br>
                        <div class="form-group">
                          <p>Grand Total : <span class="GrandTotal"><?php echo array_sum($SellingPrice)?></span></p>
                          <a href="#" class="btn-sm btn-success pull-right" onclick="OfflineFlightRequestUpdate();" >Update</a>
                          <a style="margin-right: 5px;" href="#" class="btn-sm btn-primary pull-right" onclick="goBack();">Back</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/offlinerequests.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script type="text/javascript">
  // @datetimepicker
  //datetimepicker with alternate days for arrival time and departure time
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
      
  // @calculations
  // calculating total costprice,selling price 
  // and profit price based on costprice
  $(".costtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(6) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(5) input').val();
     $(this).parent('td').parent('tr').find('td:nth-child(7) input').val(Selling-Cost);
    var profit = Selling-Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(8) input').val(margin);
    var sum = 0;
    $(".costtext").each(function(){
        sum += +$(this).val();
    });
    $(".totalcost").text(sum);
    var totalcost = $(".totalcost").text();
    var totalSelling = $(".totalSelling").text();
    var totalProfit = $(".totalProfit").text();
    $(".GrandTotal").text(Number(totalSelling));
    Profitcheck();
  });

  // calculating total costprice,selling price 
  // and profit price based on selling price
  $(".Sellingtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(6) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(5) input').val();
     $(this).parent('td').parent('tr').find('td:nth-child(7) input').val(Selling-Cost);
    var profit = Selling-Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(8) input').val(margin);
    var sum = 0;
    $(".Sellingtext").each(function(){
        sum += +$(this).val();
    });
    $(".totalSelling").text(sum);
    var totalcost = $(".totalcost").text();
    var totalSelling = $(".totalSelling").text();
    var totalProfit = $(".totalProfit").text();
    $(".GrandTotal").text(Number(totalSelling));
    Profitcheck();
    MarginCheck();
  });
  // calculating total costprice,selling price 
  // and profit price based on profitprice
  function Profitcheck() {
    var sum = 0;
    $(".Profittext").each(function(){
        sum += +$(this).val();
    });
    $(".totalProfit").text(sum);
    var totalcost = $(".totalcost").text();
    var totalSelling = $(".totalSelling").text();
    var totalProfit = $(".totalProfit").text();
    $(".GrandTotal").text(Number(totalSelling));
  }
  function MarginCheck() {
    var marginper = 0;
    $(".margintext").each(function(){
       var totalSelling = $(".totalSelling").text();
       var totalProfit = $(".totalProfit").text();
       marginper = Math.round((totalProfit/totalSelling) * 100);
    });
    $(".totalMargin").text(marginper+'%');
    var totalcost = $(".totalcost").text();
    var totalSelling = $(".totalSelling").text();
    var totalProfit = $(".totalProfit").text();
    $(".GrandTotal").text(Number(totalSelling));
  }
  // @redirect
  // redirect to the previous page
  function goBack() {
    window.history.back();
  }
  // @ offline flight request update
  // update the cost price,selling price and profit price
  function OfflineFlightRequestUpdate() {
    var arrivalNo = $("#arrivalNo").val(); 
    var arrivalTime = $("#arrivalTime").val();
    var departureNo = $("#departureNo").val();
    var departureTime = $("#departureTime").val();
    var type = $("#type").val();
    if (arrivalNo=="") {
        addToast("Arrival flight no field is required!","orange");
        $("#arrivalNo").focus(); 
    } else if(arrivalTime=="") {
        addToast("Flight arrival time field is required!","orange");
        $("#arrivalTime").focus(); 
    } else if(departureNo=="" && type=="Round trip") {
        addToast("Departure flight no field is required!","orange");
        $("#departureNo").focus(); 
    } else if(departureTime=="" && type=="Round trip") {
        addToast("Flight departure time field is required!","orange");
        $("#departureTime").focus();
    } else {
        addToast("Updated Successfully","green");
        $("#OfflineFlightRequestForm").attr('action',base_url+'backend/offlinerequest/OfflineFlightRequestupdate');
        $("#OfflineFlightRequestForm").submit();
    }
  
}
</script>
<?php init_tail(); ?>
