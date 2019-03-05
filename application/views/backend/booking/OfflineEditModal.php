<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                       <!-- print_r($this->session->userdata()); exit()  -->
                        <span>Offline request edit</span>
                    </div>
                </div>
            </div>
            <form method="post" id="OfflineRequestForm">
            <div class="tab-inn">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        <h4 class="bold">Booking Details</h4>
                        <br>
                        <p>Booking Id : HOB<?php echo $view[0]->id ?></p>
                        <p>Booking date : <?php echo date('d/m/Y',strtotime($view[0]->createdDate)) ?></p>
                        <p>Agent Name : <?php echo $view[0]->AFName.' '.$view[0]->ALName ?></p>
                      </div>
                      <div class="col-md-9">
                        <h4 class="bold">Guest Form</h4>
                        <br>
                        <table class="table-bordered">
                          <thead style="background-color: #F2F2F2;">
                            <tr>
                              <td>Name</td>
                              <td>Email</td>
                              <td>Contact number</td>
                            </tr>
                          </thead>
                          <tr>
                          <td><input type="text" name="ContactName" value="<?php echo $view[0]->ContactName ?>"></td>
                          <td>
                              <input type="text" name="ContactEmail" value="<?php echo $view[0]->ContactEmail ?>">
                          </td>
                          <td>
                              <input type="number" name="ContactNumber" value="<?php echo $view[0]->ContactNumber ?>">
                          </td>
                        </tr>
                        </table>
                        <br>
                      </div>
                      <div class="col-md-12">
                        <?php 
                          $checkin_date=date_create($view[0]->check_in);
                                $checkout_date=date_create($view[0]->check_out);
                                $no_of_days=date_diff($checkin_date,$checkout_date);
                                $tot_days = $no_of_days->format("%a");
                        ?>
                        <h4 class="bold">Booking Form</h4>
                        <br>
                        <div class="row">
                          <input type="hidden" id="no_of_rooms" value="<?php echo $view[0]->no_of_rooms ?>">
                          
                            <input type="hidden" name="id" value="<?php echo $view[0]->id; ?>">
                            <div class="form-group col-md-3">
                              <label for="hotelName">Hotel Name</label><span>*</span>
                              <input type="text" class="form-control" name="hotelName" id="hotelName" value="<?php echo $view[0]->hotel_name ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="roomName">Room Name</label><span>*</span>
                              <input type="text" class="form-control" name="roomName" id="roomName" value="<?php echo $view[0]->room_name ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="SupplierName">Supplier Name</label><span>*</span>
                              <input type="text" class="form-control" name="SupplierName" id="SupplierName" value="<?php echo $view[0]->SupplierName ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="board">Board</label>
                              <input type="text" class="form-control" name="board" id="board" value="<?php echo $view[0]->board ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="HotelAddress">Hotel Address</label><span>*</span>
                              <textarea class="form-control" name="HotelAddress" id="HotelAddress"><?php echo $view[0]->hotel_addresss ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="SupplierAddress">Supplier Address</label><span>*</span>
                              <textarea class="form-control" name="SupplierAddress" id="SupplierAddress"><?php echo $view[0]->SupllierAddress ?></textarea>
                            </div>
                            <?php 
                            
                            for ($i=1; $i <= $view[0]->no_of_rooms; $i++) { 
                              $roomCost = 'room'.$i.'Cost';
                              $roomSelling = 'room'.$i.'Selling';
                              $roomProfit = 'room'.$i.'Profit';
                              $roomMargin = 'room'.$i.'Margin';
                              $CostPrice = explode(",", $view[0]->$roomCost);
                              $SellingPrice = explode(",", $view[0]->$roomSelling);
                              $ProfitPrice = explode(",", $view[0]->$roomProfit);
                              $margin = explode(",", $view[0]->$roomMargin);
                              if(array_sum($SellingPrice)!=0 && array_sum($ProfitPrice)!=0){
                                $marginper = round(array_sum($ProfitPrice)/array_sum($SellingPrice) * 100); $marginper = round(array_sum($ProfitPrice)/array_sum($SellingPrice) * 100);
                              }
                              else{
                                $marginper =0;
                              }
                              ?>
                                <div class="col-md-12">
                                  <h4 class="room-name">Room <?php echo $i; ?> </h4><br>
                                  <table class="table-bordered"  style="margin-bottom: 15px;">
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
                                      <?php for ($j=0; $j < $tot_days ; $j++) { ?>
                                        <tr>
                                          <td><?php echo date('d/m/Y', strtotime($view[0]->check_in. ' + '.$j.'  days')); ?></td>
                                          <td style="text-align: right"><input type="number" name="Cost[<?php echo $i ?>][]" class="text-right costtext" value="<?php echo isset($CostPrice[$j]) && $CostPrice[$j]!="" ? $CostPrice[$j] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Selling[<?php echo $i ?>][]" class="text-right Sellingtext" value="<?php echo isset($SellingPrice[$j]) && $SellingPrice[$j]!="" ? $SellingPrice[$j] : 0 ?>"></td>
                                          <td style="text-align: right"><input type="number" name="Profit[<?php echo $i ?>][]" class="text-right Profittext" value="<?php echo isset($ProfitPrice[$j]) && $ProfitPrice[$j]!="" ? $ProfitPrice[$j] : 0 ?>" readonly></td>
                                          <td style="text-align: right"><input type="number" name="margin[<?php echo $i ?>][]" class="text-right margintext" value="<?php echo isset($margin[$j]) && $margin[$j]!="" ? $margin[$j] : 0 ?>" readonly></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td  style="text-align: right"><strong class="text-blue">Total</strong></td>
                                        <td class="totalcost" style="text-align: right; font-weight: 700;"><?php echo array_sum($CostPrice); ?></td>
                                        <td class="totalSelling" style="text-align: right; font-weight: 700;"><?php echo array_sum($SellingPrice); ?></td>
                                        <td class="totalProfit" style="text-align: right; font-weight: 700;"><?php echo array_sum($ProfitPrice); ?></td>
                                        <td class="totalMargin" style="text-align: right; font-weight: 700;"><?php echo $marginper.'%'; ?></td>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                                <br>
                            <?php 
                          }
                           ?>
                          </form>
                        </div>
                        <br>
                        <div class="form-group" style="padding-bottom: 50px;">
                          <p>Grand Total : <span class="GrandTotal"><?php echo array_sum($SellingPrice)*$view[0]->no_of_rooms; ?></span></p>
                          <a href="#" class="btn-sm btn-success pull-right" onclick="OfflineRequestUpdate();" >Update</a>
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
  
  var no_of_rooms = $("#no_of_rooms").val();

  $(".costtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(3) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(2) input').val();
     $(this).parent('td').parent('tr').find('td:nth-child(4) input').val(Selling-Cost);
    var profit = Selling-Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(5) input').val(margin);
    var sum = 0;
    $(this).closest('table').find(".costtext").each(function(){
        sum += +$(this).val();
    });
    $(this).closest('table').find(".totalcost").text(sum);

    var margin = 0;
    $(this).closest('table').find(".margintext").each(function(){
        margin += parseFloat($(this).val());  
    });
    $(this).closest('table').find(".totalMargin").text(margin);

    var profit = 0;
    $(this).closest('table').find(".Profittext").each(function(){
        profit += parseFloat($(this).val());  
    });
    $(this).closest('table').find(".totalProfit").text(profit);

    Profitcheck();
  });

  $(".Sellingtext").on("input",function() {
    var Selling =  $(this).parent('td').parent('tr').find('td:nth-child(3) input').val();
    var Cost =  $(this).parent('td').parent('tr').find('td:nth-child(2) input').val();
     $(this).parent('td').parent('tr').find('td:nth-child(4) input').val(Selling-Cost);
    var profit = Selling-Cost;
    var margin = Math.round(profit/Selling*100);
    $(this).parent('td').parent('tr').find('td:nth-child(5) input').val(margin);
    var sum = 0;
    $(this).closest('table').find(".Sellingtext").each(function(){
        sum += +$(this).val();
        //  $(".Profittext").text($(this).val()-$(".costtext").val());
    });

    $(this).closest('table').find(".totalSelling").text(sum);

    var margin = 0;
    $(this).closest('table').find(".margintext").each(function(){
        margin += parseFloat($(this).val());  
    });
    $(this).closest('table').find(".totalMargin").text(margin);

    var profit = 0;
    $(this).closest('table').find(".Profittext").each(function(){
        profit += parseFloat($(this).val());  
    });
    $(this).closest('table').find(".totalProfit").text(profit);
    Profitcheck();
  });

  function Profitcheck() {
    var sum = 0;
    $(".totalSelling").each(function(){
        sum += +$(this).text();
    });
    $(".GrandTotal").text(Number(sum));
  }
  
  function goBack() {
    window.history.back();
  }
</script>
<?php init_tail(); ?>
