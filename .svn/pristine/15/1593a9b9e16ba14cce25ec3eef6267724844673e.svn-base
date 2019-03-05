$(document).ready(function() {
	$("#sight_seeing_tab_1").click(function() {
    var map_location = $("#us3-address").val();
    var map_error = "Map location field is required!";
    if (map_location=="") {
      addToast(map_error,"orange");
    } else if(map_location!="") {
      $("#menu1").addClass("in active")
      $("#home").removeClass("in active")
      $(".menu1").addClass("active")
      $(".home").removeClass("active")
    }
  });
  $("#sight_seeing_tab_2").click(function() {
    var sight_seeing_name = $("#sight_seeing_name").val();
    var country = $("#country").val();
    var state = $("#state").val();
    var city = $("#city").val();
    var description = $("#description").val();
    var summary = $("#summary").val();
    var inclusion = $("#inclusion").val();
    var notes = $("#notes").val();
    if (sight_seeing_name=="") {
      addToast("Sight Seeing Name field is required!","orange");
      $("#sight_seeing_name").focus();
    } else if (country=="") {
      addToast("country field is required!","orange");
      $("#country").focus();
    } else if (state=="") {
      addToast("state field is required!","orange");
      $("#state").focus();
    } else if (city=="") {
      addToast("city field is required!","orange");
      $("#city").focus();
    } else if (description=="") {
      addToast("Description field is required!","orange");
      $("#description").focus();
    } else if (summary=="") {
      addToast("Summary field is required!","orange");
      $("#summary").focus();
    } else if (inclusion=="") {
      addToast("Inclusion field is required!","orange");
      $("#inclusion").focus();
    } else if (notes=="") {
      addToast("Notes field is required!","orange");
      $("#notes").focus();
    }
    else {
      $("#menu2").addClass("in active")
      $("#menu1").removeClass("in active")
      $("#home").removeClass("in active")
      $(".menu2").addClass("active")
      $(".menu1").removeClass("active")
      $(".home").removeClass("active")
    }
  });
  $("#tour_operation_add").click(function() {
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    var from_time = $("#from_time").val();
    var to_time = $("#to_time").val();
    var days_of_week = $("#days_of_week").val();
    var departure_point = $("#departure_point").val();
    if (from_date=="") {
      addToast("From date field is required!","orange");
      $("#from_date").focus();
    } else if (to_date=="") {
      addToast("To date field is required!","orange");
      $("#to_date").focus();
    } else if (from_time=="") {
      addToast("From time field is required!","orange");
      $("#from_time").focus();
    } else if (to_time=="") {
      addToast("To time field is required!","orange");
      $("#to_time").focus();
    } else {
      add_value_in_table(from_date,to_date,from_time,to_time,days_of_week,departure_point);
      clear_value_from_form();
    }
  });

});
function add_value_in_table(from_date,to_date,from_time,to_time,days_of_week,departure_point) {
  var sno=1;
    $('#tour_add_table > tbody tr').each(function(){
       $(this).find('.sno').html(sno++);
    });
  $("#tour_add_table > tbody").append('<tr class="tr'+sno+'"><td class="sno" >'+sno+'</td><td>'+from_date+'</td><td>'+to_date+'</td><td>'+from_time +'</td><td>'+to_time+'</td><td>'+days_of_week+'</td><td>'+departure_point+'</td><td><a class="red accent-4 btn-floating mar_left_5" href="javascript:room_type_delete('+sno+')">' + '<i class="fa fa-trash" aria-hidden="true"></i>'+ 
        '</a><input type="hidden" class="tour_frm_date'+sno+'" name="tour_frm_date[]" value="'+from_date+'"><input type="hidden" class="tour_to_date'+sno+'" name="tour_to_date[]" value="'+to_date+'"><input type="hidden" class="tour_frm_time'+sno+'" name="tour_frm_time[]" value="'+from_time+'"><input type="hidden" class="tour_to_time'+sno+'" name="tour_to_time[]" value="'+to_time+'"><input type="hidden" class="tour_frm_date'+sno+'" name="tour_frm_date[]" value="'+days_of_week+'"><input type="hidden" class="tour_departure_point'+sno+'" name="tour_departure_point[]" value="'+departure_point+'"></td></tr>');
}
function clear_value_from_form() {
  $("#from_date").val("");
  $("#to_date").val("");
  $("#from_time").val("");
  $("#to_time").val("");
  $("#departure_point").val("");
}
function room_type_delete(id) {
  var room_edit_id = $('#room_add_table > tbody .tr'+id+' #room_edit_id'+id).val();
    $('#room_add_table > tbody .tr'+id+' #room_edit_id'+id).each(function () {
        val.push(this.value);
    });
    $("#deleted_id").val(val.join(','));
  $('#room_add_table > tbody .tr'+id).remove();
}