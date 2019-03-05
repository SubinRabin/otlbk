<script type="text/javascript">
    $(document).ready(function() {
      supplementFormcheck();
    });
    $(".dateAvail").click(function() {
      supplementFormcheck();
    });
</script>
<div class="modal-dialog modal-full-height sright modal-right modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
              <p class="heading lead"><i class="fa fa-cutlery"></i>&nbsp;<?php echo $_REQUEST['board'] ?></p>
          </div>
  
          <!--Body-->
          <div class="modal-body">
          <?php 
            if($this->session->userdata($_REQUEST['board'])!="" && $this->session->userdata($_REQUEST['board'])['contract_id']==$_REQUEST['contract_id'] && $this->session->userdata($_REQUEST['board'])['room_id']==$_REQUEST['room_id'] && $this->session->userdata($_REQUEST['board'])['token']==$_REQUEST['token']) {
              $request = $this->session->userdata($_REQUEST['board']);
            } else {
              $request = array();
            }
          ?>
              <form name="supplementForm" id="supplementForm" action="<?php echo base_url(); ?>payment/supplementFormSubmit">
                <input type="hidden" name="token" value="<?php echo $_REQUEST['token'] ?>">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="rateAvailspl reteAvailspl list-unstyled">
                      <?php  $availDate = supplementAvailability($_REQUEST,$_REQUEST['board']); 
                      foreach ($availDate as $Availkey => $availvalue) {
                          if (count($request)!=0) {
                            if (isset($request[$availvalue])) { ?>
                              <li><input id="<?php echo $availvalue; ?>" name="<?php echo $availvalue; ?>"  class="dateAvail" checked=""  type="checkbox" value="1">
                              <label for="<?php echo $availvalue; ?>" class="date-select-label"></label>
                              <div>
                                <p class="mon-yr"><?php echo date('M Y',strtotime($availvalue)); ?></p>
                                <p class="dt"><?php echo date('d',strtotime($availvalue)); ?></p>
                                <p class="day"><?php echo date('D',strtotime($availvalue)); ?></p>
                              </div></li>
                          <?php  } else { ?>
                            <li><input id="<?php echo $availvalue; ?>" name="<?php echo $availvalue; ?>"  class="dateAvail" type="checkbox" value="1">
                              <label for="<?php echo $availvalue; ?>" class="date-select-label"></label>
                              <div>
                                <p class="mon-yr"><?php echo date('M Y',strtotime($availvalue)); ?></p>
                                <p class="dt"><?php echo date('d',strtotime($availvalue)); ?></p>
                                <p class="day"><?php echo date('D',strtotime($availvalue)); ?></p>
                              </div></li>
                       <?php  }
                          } else { ?>
                              <li><input id="<?php echo $availvalue; ?>" name="<?php echo $availvalue; ?>" class="dateAvail" checked="" type="checkbox" value="1">
                              <label for="<?php echo $availvalue; ?>" class="date-select-label"></label>
                              <div>
                                <p class="mon-yr"><?php echo date('M Y',strtotime($availvalue)); ?></p>
                                <p class="dt"><?php echo date('d',strtotime($availvalue)); ?></p>
                                <p class="day"><?php echo date('D',strtotime($availvalue)); ?></p>
                              </div></li>
                       <?php   } } ?>
                    </ul>
                  </div>
                </div>

                <?php foreach ($_REQUEST['reqadults'] as $key => $value) { ?>
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Room <?php echo $key+1; ?></h4>
                      <table class="table text-center">
                        <thead class="thead-inverse text-center">
                          <tr>
                            <th class="text-center" style="width: 15%">Adults</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Child</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Active</th>
                          </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="supplementType" value="<?php echo $_REQUEST['board'] ?>">
                            <input type="hidden" name="contract_id" value="<?php echo $_REQUEST['contract_id'] ?>">
                            <input type="hidden" name="hotel_id" value="<?php echo $_REQUEST['hotel_id'] ?>">
                            <input type="hidden" name="room_id" value="<?php echo $_REQUEST['room_id'] ?>">
                            <input type="hidden" name="Check_in" value="<?php echo $_REQUEST['Check_in'] ?>"> 
                            <input type="hidden" name="Check_out" value="<?php echo $_REQUEST['Check_out'] ?>">
                          <tr>
                            <td scope="row">
                              <select class="form-control input-sm" name="splAdults[]" onchange="supplementFormcheck()">
                                <?php for ($k=1; $k <= $value ; $k++) { 
                                    if (isset($request['splAdults'][$key])) { ?>
                                  <option <?php echo  $k ==$request['splAdults'][$key] ? "selected" : '' ?>  class="<?php echo $k ?>"><?php echo $k ?></option>
                                <?php } else { ?>
                                  <option <?php echo  $k == $value ? "selected" : '' ?>  class="<?php echo $k ?>"><?php echo $k ?></option>

                                <?php } ?>
                                <?php } ?>
                              </select>
                            </td>
                            <td class="room<?php echo $key+1; ?>-adult-rate"></td>
                            <td><input <?php echo isset($request['splAdultsCheck'][$key]) ? 'checked' : ''  ?> type="checkbox" class="person" onclick="supplementFormcheck()"  name="splAdultsCheck[<?php echo $key ?>]" class="squaredTwo"></td>
                            <input type="hidden" name="splChild[]" value="<?php echo $_REQUEST['reqChild'][$key] ?>">
                            <?php if ($_REQUEST['reqChild'][$key]!=0) { ?>
                              <?php for ($j=1; $j <=$_REQUEST['reqChild'][$key] ; $j++) { 
                                if ($j!=1) {
                                ?>
                                <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <?php } ?>
                              <input type="hidden" onclick="supplementFormcheck()" name="splRoom<?php echo ($key+1) ?>-ChildAge[<?php echo $j ?>]" value="<?php echo $_REQUEST['reqroom'.($key+1).'-childAge'][($j-1)] ?>">
                              <td><?php echo $j ?></td>
                              <td><?php echo $_REQUEST['reqroom'.($key+1).'-childAge'][($j-1)] ?></td>
                              <td class="room<?php echo ($key+1) ?>-child<?php echo $j ?>Age-rate">0</td>
                              <td><input <?php echo isset($request['room'.($key+1).'-child'.$j.'Age-rateCheck']) ? 'checked' : ''  ?> type="checkbox" onclick="supplementFormcheck()" class="person" name="room<?php echo ($key+1) ?>-child<?php echo $j ?>Age-rateCheck" class="squaredTwo">
                              </td>
                            <?php } } else { ?>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            <?php } ?>
                            <?php if ($_REQUEST['reqChild'][$key]!=0) { ?>
                              <?php for ($j=1; $j <$_REQUEST['reqChild'][$key] ; $j++) { ?>
                              <!-- <td></td>
                              <td></td>
                              <td></td>
                              <td></td> -->
                            <?php  } } ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                <?php } ?>
              </form>

              <div class="row">
                <div class="col-md-10 text-right">
                  
                </div>
              </div>
          </div>
  
          <!--Footer-->
          <div class="modal-footer">
                <div class="col-md-6">
                  <p class="pull-left" style="margin-top: 5px; margin-bottom: 0">
                    <span>Total Amount : </span>
                    <label class="TotalAmount text-green"></label>
                  </p>
                </div>

                <div class="col-md-6 text-right">
                  <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No,thanks</a>
                  <a type="button" id="Submitbtn" class="btn btn-success" onclick="supplementformSubmitfn();">Get it now</a>
                </div>
              
          </div>
      </div>
      <!--/.Content-->
  </div>
