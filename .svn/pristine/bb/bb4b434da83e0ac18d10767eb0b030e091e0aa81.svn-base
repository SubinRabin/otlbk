    <div class="modal-dialog ">
          <div class="modal-content">
                  <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Amendments</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="scol-md-12">
                          <br><br>
                         <table class="table table-bordered">
                              <thead class="table-dark">
                                <tr>
                                  <th class="text-center">#</th>
                                  <th>Guesttype</th>
                                  <th>Title</th>                                  
                                  <th>Fisrstname</th>
                                  <th>Lastname</th>
                                  <th class="text-center">Age</th>
                                  <td>Lead Guest</td>
                                  <td>Action</td>
                                </tr>
                              </thead>
                              <tbody class="guesttbody">
                                <?php

                                if (isset($view['Roomtype']['RoomDetails'][0])) {
                                  $RoomDetails = $view['Roomtype']['RoomDetails'];
                                } else {
                                  $RoomDetails[0] = $view['Roomtype']['RoomDetails'];
                                }
                                ?>
                                <?php
                                foreach ($RoomDetails as $key => $value) { ?>
                                  <tr class="room-no">
                                    <td class="text-center"><i class="fa fa-home"></i></td>
                                    <td colspan="5">Room <?php echo $key+1 ?></td>
                                    <td colspan="2"><button type="button" id="room<?php echo $key+1 ?>-add_new" class="btn-sm btn-info pull-right">Add New</button><input type="hidden" class="room-pos" value="<?php echo $key+1 ?>"></td>
                                  </tr>
                                  <?php
                                    if (isset($value['GuestInfo']['Guest'][0])) {
                                      $GuestInfo = $value['GuestInfo']['Guest'];
                                    } else {
                                      $GuestInfo[0] = $value['GuestInfo']['Guest'];
                                    }
                                   foreach ($GuestInfo as $key1 => $value1) { 
                                    if ($value1['@attributes']['GuestInRoom']==$key+1) { ?>
                                  <tr>
                                    <td class="text-center"><?php echo $key1+1 ?></td>
                                    <td><?php echo $value1['@attributes']['GuestType'] ?></td>
                                    <td><?php echo $value1['Title'] ?></td>
                                    <td><?php echo $value1['FirstName'] ?></td>
                                    <td><?php echo $value1['LastName'] ?></td>
                                    <td><?php echo $value1['Age'] ?></td>
                                    <td class="text-center"><?php echo $value1['@attributes']['LeadGuest'] ?></td>
                                     <td style="display: none">room<?php echo $key+1 ?></td>
                                    <td><?php if($value1['@attributes']['LeadGuest']=="false"){ ?>
                                      
                                      <button type="button" id="delete" class="btn-sm btn-danger delete"><i class="fa fa-times-circle  red" style="margin-right: 5px; aria-hidden="true"></i></button>
                                      <button type="button" id="rename" class="btn-sm btn-primary rename"><i class="fa fa-pencil" aria-hidden="true" style="margin-right: 5px;" href="#"></i></button>
                                      
                                     
                                   
                                     <?php } ?></td>
                                    </tr>
                                <?php } } }?>    
                              </tbody>
                            </table>
                            

                          </div>
                        </div><br><br>
                        <form action="" name="amendmentForm" id="amendmentForm" method="post" enctype="multipart/form-data">
                          <inpt type="hidden" name="count" id="count" value="<?php echo $count ?>">
                          <input type="hidden" name="noRooms" id="noRooms" value="<?php echo $view['NoOfRooms'] ?>">
                          <input type="hidden" name="xmlbookid" value="<?php echo $view['@attributes']['BookingId'] ?>">
                          <input type="hidden" name="bookid" value="<?php echo $bookid ?>">
                          <input type="hidden" name="checkin" value="<?php echo $view['CheckInDate'] ?>">
                          <input type="hidden" name="checkout" value="<?php echo $view['CheckOutDate'] ?>">
                          <div class="row">
                              <div class="col-md-12 form-group">
                                <table class="table table-bordered table-responsive hide" id="amendmentTable">
                                  <thead>
                                      <tr>
                                          <th>Room</th>
                                          <th>Guesttype</th>
                                          <th>Title</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Age</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      
                                  </tbody>
                              </table>
                                    
                              </div>
                          </div>
                        </form>
                    </div>
                           <div class="modal-footer">
                              <div class="row">
                                    <button type="button" id="amendmentUpdate" class="btn-sm btn-primary">Update</button>
                              </div>
                          </div>
                     
                  
          </div>
      </div>
<script src="<?php echo base_url(); ?>assets/js/referance_add.js"></script>
<script type="text/javascript">
  // $(document).ready(function() {
  var rooms = $("#noRooms").val();
  var count = $("#count").val();
  for(i=1;i<=rooms;i++) {
    $("#room"+i+"-add_new").click(function() {
    var roompos= $(this).closest('td').find('.room-pos').val();
    $("#amendmentTable").removeClass("hide");
    var markup = "<tr><input type='hidden' name='roompos[]' value='room"+roompos+"'><td>Room "+roompos+"</td><td><select class='form-control' name='room"+roompos+"-guesttype[]'><option value='Adult'>Adult</option><option value='Child'>Child</option></select></td><td style='width:108px'><select name='room"+roompos+"-title[]' class='form-control'><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Miss'>Miss</option><option value='Master'>Master</option></select></td><td><input type='text' class='form-control' name='room"+roompos+"-firstname[]' id='room"+roompos+"-firstname'></td><td><input type='text' class='form-control' name='room"+roompos+"-lastname[]' id='room"+roompos+"-lastname'></td><td><input type='text' class='form-control' name='room"+roompos+"-age[]' id='room"+roompos+"-age'></td><td><input type='hidden' value='Add' name='room"+roompos+"-action[]'>Add<input type='hidden' name='room"+roompos+"-existing[]' value=''></td></tr>";
    $("#amendmentTable").append(markup);
  });
  }
   $(".rename").click(function() {
    $("#amendmentTable").removeClass("hide");
    var markup = "<tr><input type='hidden' name='roompos[]' value='"+$(this).closest("tr").find('td:eq(7)').text()+"'><td>"+$(this).closest("tr").find('td:eq(7)').text()+"</td><td><select class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-guesttype[]'><option value='Adult'>Adult</option><option value='Child'>Child</option></select></td><td style='width:108px'><select name='"+$(this).closest("tr").find('td:eq(7)').text()+"-title[]' class='form-control'><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Miss'>Miss</option><option value='Master'>Master</option></select></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-firstname[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-firstname' value="+$(this).closest("tr").find('td:eq(3)').text()+"></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-lastname[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-lastname' value="+$(this).closest("tr").find('td:eq(4)').text()+"></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-age[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-age' value="+$(this).closest("tr").find('td:eq(5)').text()+"></td><td><input type='hidden' value='Rename' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-action[]'>rename<input type='hidden' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-existing[]' value='"+ $(this).closest("tr").find('td:eq(2)').text() +" " + $(this).closest("tr").find('td:eq(3)').text() + " "+ $(this).closest("tr").find('td:eq(4)').text() +"'></td></tr>"; 
    $("#amendmentTable").append(markup);
    $(this).closest('tr').remove(); 
  });
  $(".delete").on('click',function() {
   $("#amendmentTable").removeClass("hide");
    var markup = "<tr><input type='hidden' name='roompos[]' value='"+$(this).closest("tr").find('td:eq(7)').text()+"'><td>"+$(this).closest("tr").find('td:eq(7)').text()+"</td><td><select class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-guesttype[]'><option value='Adult'>Adult</option><option value='Child'>Child</option></select></td><td style='width:108px'><select name='"+$(this).closest("tr").find('td:eq(7)').text()+"-title[]' class='form-control'><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Miss'>Miss</option><option value='Master'>Master</option></select></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-firstname[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-firstname' value="+$(this).closest("tr").find('td:eq(2)').text()+"></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-lastname[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-lastname' value="+$(this).closest("tr").find('td:eq(3)').text()+"></td><td><input type='text' class='form-control' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-age[]' id='"+$(this).closest("tr").find('td:eq(7)').text()+"-age' value="+$(this).closest("tr").find('td:eq(4)').text()+"></td><td><input type='hidden' value='Delete' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-action[]'>Deleted<input type='hidden' name='"+$(this).closest("tr").find('td:eq(7)').text()+"-existing[]' value='"+$(this).closest("tr").find('td:eq(2)').text() + " " + $(this).closest("tr").find('td:eq(3)').text() + " " + $(this).closest("tr").find('td:eq(4)').text()+"'></td></tr>"; 
    $("#amendmentTable").append(markup);
    $(this).closest('tr').remove(); 
  }); 
  $("#amendmentUpdate").click(function() {
      $.ajax({
            dataType: 'json',
            type: "POST",
            url: base_url+'backend/booking/amendmentRequest',
            data: $('#amendmentForm').serialize(),
            cache: false,
            success: function(response) {
              addToast(response.msg,response.color);
              document.location.reload(true);           
            },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
      });    
    });
</script>
