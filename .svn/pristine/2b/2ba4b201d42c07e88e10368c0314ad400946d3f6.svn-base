<?php init_head(); ?>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Offline Tour Request Edit</span>
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
                        <p>Request Id : TOB<?php echo $view[0]->id ?></p>
                        <p>Request Date : <?php echo date('d/m/Y',strtotime($view[0]->created_date)) ?></p>
                        <p>Agent Name : <?php echo $view[0]->AFName.' '.$view[0]->ALName ?></p>
                        <p>Date : <?php echo date('d/m/Y', strtotime($view[0]->tdate)); ?></p>

                      </div>
                      <form method="post" id="OfflineTourRequestForm">
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
                            <div class="form-group col-md-3">
                              <label for="hotelName">Type of Tour</label><span>*</span>
                              <input type="text" class="form-control" name="tour_type" id="tour_type" value="<?php echo $view[0]->tour_type ?>">
                            </div>
                            
                            <?php 
                            $CostPrice = $view[0]->costprice;
                            $SellingPrice = $view[0]->sellingprice;
                            $ProfitPrice = $view[0]->profitprice;
                            $margin = $view[0]->margin;
                            // for ($i=1; $i <= $view[0]->no_of_rooms; $i++) { 
                              ?>
                                <div class="col-md-12">
                                  <!-- <h4 class="room-name">Room <?php echo $i; ?> </h4><br> -->
                                  <table class="table-bordered" >
                                    <thead style="background-color: #F2F2F2;">
                                      <tr>
                                        <th>Date</th>
                                        <th style="text-align: center">Cost Rate</th>
                                        <th style="text-align: right">Selling Rate</th>
                                        <th style="text-align: right">Profit</th>
                                        <th style="text-align: right">Margin</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td><?php echo date('d/m/Y', strtotime($view[0]->tdate)); ?></td>
                                          <td style="text-align: right"><input type="number" name="Cost[]" class="text-right costtext" value="<?php echo isset($CostPrice) && $CostPrice!="" ? $CostPrice : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Selling[]" class="text-right Sellingtext" value="<?php echo isset($SellingPrice) && $SellingPrice!="" ? $SellingPrice : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Profit[]" class="text-right Profittext" value="<?php echo isset($ProfitPrice) && $ProfitPrice!="" ? $ProfitPrice : 0 ?>" readonly></td>
                                           <td style="text-align: right"><input type="number" name="margin[]" class="text-right margintext" value="<?php echo isset($margin) && $margin!="" ? $margin : 0 ?>" readonly></td>
                                        </tr>
                                   
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td  style="text-align: right"><strong class="text-blue">Total</strong></td>
                                        <td class="totalcost" style="text-align: right; font-weight: 700;"><?php echo $CostPrice; ?></td>
                                        <td class="totalSelling" style="text-align: right; font-weight: 700;"><?php echo $SellingPrice ?></td>
                                        <td class="totalProfit" style="text-align: right; font-weight: 700;"><?php echo $ProfitPrice; ?></td>
                                         <td class="totalMargin" style="text-align: right; font-weight: 700;"><?php echo $margin; ?></td>
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
                          <p>Grand Total : <span class="GrandTotal"><?php echo $SellingPrice?></span></p>
                          <a href="#" class="btn-sm btn-success pull-right" onclick="OfflineTourRequestUpdate();" >Update</a>
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
<script type="text/javascript">
  
 

  $(".costtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(3) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(2) input').val();
    $(this).parent('td').parent('tr').find('td:nth-child(4) input').val(Selling-Cost);
    var profit = Selling-Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(5) input').val(margin);


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

  $(".Sellingtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(3) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(2) input').val();
    $(this).parent('td').parent('tr').find('td:nth-child(4) input').val(Selling-Cost);
    var profit = Selling - Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(5) input').val(margin);
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
  function goBack() {
    window.history.back();
  }
  function OfflineTourRequestUpdate() {
  var tour_type = $("#tour_type").val();
  if (tour_type=="") {
    addToast("Type of tour field is required!","orange");
    $("#tour_type").focus(); 
  } else {
    addToast("Updated Successfully","green");
    $("#OfflineTourRequestForm").attr('action',base_url+'backend/offlinerequest/OfflineTourRequestupdate');
    $("#OfflineTourRequestForm").submit();
  }
}
</script>
<?php init_tail(); ?>
