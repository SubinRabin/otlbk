<?php init_hotel_login_header(); ?>
 <script src="<?php echo base_url(); ?>skin/js/payment.js"></script>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: #ffffff;
}
.coloring{
      background-color: #f9f9f9;
}
.date_text{

}
</style>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
		<input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>" id="hotel_id">
		<div class="inn-title">
             
             <span class="text-danger min_stay_error"></span>
        </div>
          <form action="<?php echo base_url(); ?>dashboard/hotel_minimum_stay_update" name="hotel_excel_form[]" id="hotel_minimum_stay_form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $this->session->userdata('id') ?>">
            <div class="tab-inn">
                <div class="table-responsive">
                    <table  id="hotel_room_table_excel11">
                      <thead>
					  <tr>
					    <!-- <th class="text-center coloring"><div class="col s12">Rates per  Period</th> -->
					    <th colspan="8" class="text-center coloring">Minimum Stay</th>
					  </tr>
					  
					  <tr>
					    <td colspan="2">From</td>
					    <td><input  type="date" name="from1" class="form-control date_text" id="from1"  value="<?php  echo isset($view[0]->from_event1) ? $view[0]->from_event1 : ''  ?>"></td>
					    <td><input  type="date" name="from2" class="form-control date_text" id="from2"  value="<?php  echo isset($view[0]->from_event2) ? $view[0]->from_event2 : ''  ?>"></td>
					    <td><input  type="date" name="from3" class="form-control date_text" id="from3" onchange ="date_calculate()" value="<?php  echo isset($view[0]->from_event3) ? $view[0]->from_event3 : ''  ?>"></td>
					    <td><input  type="date" name="from4" class="form-control date_text" id="from4" onchange ="date_calculate()" value="<?php  echo isset($view[0]->from_event4) ? $view[0]->from_event4 : ''  ?>"></td>
					    <td><input  type="date" name="from5" class="form-control date_text" id="from5" onchange ="date_calculate()" value="<?php  echo isset($view[0]->from_event5) ? $view[0]->from_event5 : ''  ?>"></td>
					    <td><input  type="date" name="from6" class="form-control date_text" id="from6" onchange ="date_calculate()" value="<?php  echo isset($view[0]->from_event6) ? $view[0]->from_event6: ''  ?>"></td>
					  </tr>
					  <tr>
					     <td colspan="2">To</td>
					    <td><input  type="date" name="to1" class="form-control date_text" id="to1"  value="<?php  echo isset($view[0]->to_event1) ? $view[0]->to_event1 : ''  ?>"></td>
					    <td><input  type="date" name="to2" class="form-control date_text" id="to2" onchange ="date_calculate()" value="<?php  echo isset($view[0]->to_event2) ? $view[0]->to_event2: ''  ?>"></td>
					    <td><input  type="date" name="to3" class="form-control date_text" id="to3" onchange ="date_calculate()" value="<?php  echo isset($view[0]->to_event3) ? $view[0]->to_event3 : ''  ?>"></td>
					    <td><input  type="date" name="to4" class="form-control date_text" id="to4" onchange ="date_calculate()" value="<?php  echo isset($view[0]->to_event4) ? $view[0]->to_event4 : ''  ?>"></td>
					    <td><input  type="date" name="to5" class="form-control date_text" id="to5" onchange ="date_calculate()" value="<?php  echo isset($view[0]->to_event5) ? $view[0]->to_event5 : ''  ?>"></td>
					    <td><input  type="date" name="to6" class="form-control date_text" id="to6" onchange ="date_calculate()" value="<?php  echo isset($view[0]->to_event6) ? $view[0]->to_event6 : ''  ?>"></td>
					  </tr>
					  
					  <tr>
					    <!-- <th class="text-center coloring"><div class="col s12">Rates per  Period</th> -->
					    <th colspan="8" class="text-center coloring">Close Out Period</th>
					  </tr>
					  <tr>
					    <td colspan="2">From</td>
					    <td><input  type="date" name="close_from1" class="form-control date_text" id="close_from1" onchange ="date_calculate()" value="<?php  echo isset($view1[0]->from_event1) ? $view1[0]->from_event1 : ''  ?>"></td>
					    <td><input  type="date" name="close_from2" class="form-control date_text" id="close_from2" value="<?php  echo isset($view1[0]->from_event2) ? $view1[0]->from_event2 : ''  ?>" ></td>
					    <td><input  type="date" name="close_from3" class="form-control date_text" id="close_from3" value="<?php  echo isset($view1[0]->from_event3) ? $view1[0]->from_event3 : ''  ?>""></td>
					    <td><input  type="date" name="close_from4" class="form-control date_text" id="close_from4" value="<?php  echo isset($view1[0]->from_event4) ? $view1[0]->from_event4 : ''  ?>""></td>
					    <td><input  type="date" name="close_from5" class="form-control date_text" id="close_from5" value="<?php  echo isset($view1[0]->from_event5) ? $view1[0]->from_event5 : ''  ?>""></td>
					    <td><input  type="date" name="close_from6" class="form-control date_text" id="close_from6" value="<?php  echo isset($view1[0]->from_event6) ? $view1[0]->from_event6: ''  ?>""></td>
					  </tr>
					  <tr>
					     <td colspan="2">To</td>
					    <td><input  type="date" name="close_to1" class="form-control date_text" id="close_to1" value="<?php  echo isset($view1[0]->to_event1) ? $view1[0]->to_event1 : ''  ?>"></td>
					    <td><input  type="date" name="close_to2" class="form-control date_text" id="close_to2" value="<?php  echo isset($view1[0]->to_event2) ? $view1[0]->to_event2 : ''  ?>"></td>
					    <td><input  type="date" name="close_to3" class="form-control date_text" id="close_to3" value="<?php  echo isset($view1[0]->to_event3) ? $view1[0]->to_event3 : ''  ?>"></td>
					    <td><input  type="date" name="close_to4" class="form-control date_text" id="close_to4" value="<?php  echo isset($view1[0]->to_event4) ? $view1[0]->to_event4 : ''  ?>"></td>
					    <td><input  type="date" name="close_to5" class="form-control date_text" id="close_to5" value="<?php  echo isset($view1[0]->to_event5) ? $view1[0]->to_event5 : ''  ?>"></td>
					    <td><input  type="date" name="close_to6" class="form-control date_text" id="close_to6" value="<?php  echo isset($view1[0]->to_event6) ? $view1[0]->to_event6 : ''  ?>"></td>
					  </tr>
					  <tr>
                      </thead>
					  <tbody>
                       </tbody>
					</table><br>
					<input type="button" class="btn-sm btn-success update_button pull-right" id="room_minimum_stay_update" value="update">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php init_hotel_login_footer(); ?>