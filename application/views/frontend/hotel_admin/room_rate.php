<?php init_hotel_login_header(); ?>
 <script src="<?php echo base_url(); ?>skin/js/payment.js"></script>
 <link href="<?php echo base_url(); ?>skin/distn/css/bootstrap-imageupload.css" rel="stylesheet">
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 3px 5px;
}
tr:nth-child(even) {
    background-color: #ffffff;
}
.coloring{
      background-color: #f9f9f9;
}
.date_text{
    padding: 0px !important;
    width: 81% !important;
   	border: none !important;
    height: 20px !important;
    font-size: 12px !important;
}
</style>
<div class="row">
		<!-- <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>" id="hotel_id"> -->
		<div class="inn-title">
             <h3>Room Rate Settings</h3>
             <span class="text-danger rate_error"></span>
        </div>
        <br>
        
        <form action="<?php echo base_url(); ?>dashboard/updating_room_rate_details" name="hotel_excel_form[]" id="hotel_excel_form" method="post" enctype="multipart/form-data">
            <div class="tab-inn">
                <div class="table-responsive">
                    <table  id="hotel_room_table_excel1">
                      <thead>
                      	<tr>
                      	<td colspan="2" class="text-center coloring"> <b>Currency </td>
                      	<td class="coloring">AED </td>
                      	<td class="coloring"> </td>
                        <td class="coloring"></td>
                        <td class="coloring"></td>
                        <td class="coloring"></td>
                        <td class="coloring"></td>
                        <td class="coloring"></td>
                        <td class="coloring"></td>
                        </tr>
					  <tr>
					    <!-- <th class="text-center coloring"><div class="col s12">Rates per  Period</th> -->
					    <th colspan="2" class="text-center coloring">Rates per Period</th>
					    <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
                        <th class="coloring"></th>
					  </tr>
					  <tr>
					    <td colspan="2">From</td>
					    <td><input type="date" class="form-control date_text" id="from_high1" name="from_high1" value="<?php  echo isset($view[0]->from_high1) ? $view[0]->from_high1 : ''  ?>" ></td>
					    <td><input type="date" class="form-control date_text" id="from_shoulder1" name="from_shoulder1" value="<?php  echo isset($view[0]->from_shoulder1) ? $view[0]->from_shoulder1 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="from_peak1" name="from_peak1" value="<?php  echo isset($view[0]->from_peak1) ? $view[0]->from_peak1 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="from_peak2" name="from_peak2" value="<?php  echo isset($view[0]->from_peak2) ? $view[0]->from_peak2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="from_shoulder2" name="from_shoulder2" value="<?php  echo isset($view[0]->from_shoulder2) ? $view[0]->from_shoulder2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="from_high2" name="from_high2" value="<?php  echo isset($view[0]->from_high2) ? $view[0]->from_high2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="from_low" name="from_low" value="<?php  echo isset($view[0]->from_low) ? $view[0]->from_low : ''  ?>"></td>
					    <td></td>
					  </tr>
					  <tr>
					     <td colspan="2">To</td>
					    <td><input type="date" class="form-control date_text" id="to_high1" name="to_high1" value="<?php  echo isset($view[0]->to_high1) ? $view[0]->to_high1 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_shoulder1" name="to_shoulder1" value="<?php  echo isset($view[0]->to_shoulder1) ? $view[0]->to_shoulder1 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_peak1" name="to_peak1" value="<?php  echo isset($view[0]->to_peak1) ? $view[0]->to_peak1 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_peak2" name="to_peak2" value="<?php  echo isset($view[0]->to_peak2) ? $view[0]->to_peak2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_shoulder2" name="to_shoulder2" value="<?php  echo isset($view[0]->to_shoulder2) ? $view[0]->to_shoulder2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_high2" name="to_high2" value="<?php  echo isset($view[0]->to_high2) ? $view[0]->to_high2 : ''  ?>"></td>
					    <td><input type="date" class="form-control date_text" id="to_low" name="to_low" value="<?php  echo isset($view[0]->to_low) ? $view[0]->to_low : ''  ?>"></td>
					    <td></td>
					  </tr>
					  <tr>
					    <td  class="text-center coloring"><b>Room</b></td>
					   <!--  <td class="coloring"><b>Room</td>
					    <td class="coloring"><b>Room</td> -->
					    <td class="coloring"><b>Type</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Amount</td>
					    <td class="coloring"><b>Actual Price</td>
					  </tr>
					   <tr>  

					   	<?php 
					   //	print_r($room_list);
					   foreach ($room_list as $key => $value) { ?>
					    <td class="coloring"><b><?php echo $value->room_name ?></td>
					    <td class="coloring"><b><?php echo $value->room_type_name ?></td>
					    <td class="coloring"><input type="text" name="high_1[]" class="form-control" id="high_1[]" value="<?php echo isset($room_amount[$key][0]->high_1) ? $room_amount[$key][0]->high_1 : '' ?>"></td>
					    <td class="coloring"><input type="text" name="shoulder_1[]" class="form-control" id="shoulder_1[]" value="<?php echo isset($room_amount[$key][0]->shoulder_1) ? $room_amount[$key][0]->shoulder_1 : '' ?>"></td>
					    <td class="coloring"><input type="text" name="peak_1[]" class="form-control" id="peak_1[]" value="<?php echo isset($room_amount[$key][0]->peak_1) ? $room_amount[$key][0]->peak_1 : '' ?>"></td>
					    <td class="coloring"><input type="text" name="peak_2[]" class="form-control" id="peak_2[]" value="<?php echo isset($room_amount[$key][0]->peak_2) ? $room_amount[$key][0]->peak_2: '' ?>"></td>
					    <td class="coloring"><input type="text" name="shoulder_2[]" class="form-control" id="shoulder_2[]" value="<?php echo isset($room_amount[$key][0]->shoulder_2) ? $room_amount[$key][0]->shoulder_2 : '' ?>"></td>
					    <td class="coloring"><input type="text" name="high_2[]" class="form-control" id="high_2[]"  value="<?php echo isset($room_amount[$key][0]->high_2) ? $room_amount[$key][0]->high_2: '' ?>"></td>
					    <td class="coloring"><input type="text" name="low[]" id-="low[]" class="form-control" value="<?php echo isset($room_amount[$key][0]->low) ? $room_amount[$key][0]->low : '' ?>"></td>
					    <td class="coloring"><?php echo $value->price ?></td>


					    <td  class="coloring"><input type="hidden" name="id[]"  value="<?php echo isset($room_amount[$key][0]->id) ? $room_amount[$key][0]->id : '' ?>">
					    	<input type="hidden" name="room_id[]"  value="<?php echo $value->id ?>"><b><?php echo $value->room_name ?></b></td>
					  </tr>
					  <?php } ?>
						<tr> <th colspan="2" class="coloring"><b>Release (cutt off) by arrival date </b> </th>
					   
                        <td class="coloring"><input type="text" name="high_1_cutt_of" class="form-control" id="high_1_cutt_of" value="<?php  echo isset( $cutt_off[0]->high_1) ?  $cutt_off[0]->high_1:''?>"></td>
                        <td class="coloring"><input type="text" name="shoulder_1_cutt_of" class="form-control" id="shoulder_1_cutt_of"
                        	value="<?php  echo isset( $cutt_off[0]->shoulder_1) ?  $cutt_off[0]->shoulder_1:''?>"></td>
                        <td class="coloring"><input type="text" name="peak_1_cutt_of" class="form-control" id="peak_1_cutt_of" value="<?php  echo isset( $cutt_off[0]->peak_1) ?  $cutt_off[0]->peak_1:''?>"></td>
                         <td class="coloring"><input type="text" name="peak_2_cutt_of" class="form-control" id="peak_2_cutt_of" value="<?php  echo isset( $cutt_off[0]->peak_2) ?  $cutt_off[0]->peak_2:''?>"></td>
                        <td class="coloring"><input type="text" name="shoulder_2_cutt_of" class="form-control" id="shoulder_2_cutt_of" value="<?php  echo isset( $cutt_off[0]->shoulder_2) ?  $cutt_off[0]->shoulder_2:''?>"></td>
                        <td class="coloring"><input type="text" name="high_2_cutt_of" class="form-control" id="high_2_cutt_of" value="<?php  echo isset( $cutt_off[0]->high_2) ?  $cutt_off[0]->high_2:''?>"></td>
                    	<td class="coloring"><input type="text" name="low_cutt_of" class="form-control" id="low_cutt_of" value="<?php  echo isset( $cutt_off[0]->low) ?  $cutt_off[0]->low:''?>"></td>
                    	<td class="coloring"><b></td>
                    	
                    	
                    </tr>
                      </thead>
					  <tbody>
                       </tbody>
					</table>
					<br>
                         <button type="button" class="btn-sm btn-success update_button pull-right" id="room_rate_update">update</button>
                </div>
            </div>
        </form>
        </div>
<?php init_hotel_login_footer(); ?>
