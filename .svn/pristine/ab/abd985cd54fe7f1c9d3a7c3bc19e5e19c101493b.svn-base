$(document).ready(function() {
  // room_occupancy_add();

  var providers = $("#providers").val();
  $(".dateCheckLoadAfter").hide();
    var hotel_id = $("#hotel_id").val();
    if (providers=='otelseasy') {
      review_get_data(hotel_id);
      average_ratings(hotel_id);
    } else {
      TBO_available_check();
    }
    
    $('#details_review_add_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'details/review_insert',
          data: $('#review_form').serialize(),
          cache: false,
          success: function (response) {
            if (response.status != "1") {
              if (response.error == "Name field is required !") {
                $(".name_error").css("color","red");
                $(".name_error").text(response.error);
              } else if (response.error == "Title field is required !") {
                $(".title_error").css("color","red");
                $(".title_error").text(response.error);
              } else if (response.error == "Comment field is required !") {
                $(".comment_error").css("color","red");
                $(".comment_error").text(response.error);
              }
            } else {
                $(".success_error").css("color","green");
                $(".success_error").text(response.error);
                $(".name_error").text('');
                $(".title_error").text('');
                $(".comment_error").text('');
                average_ratings(hotel_id);
                review_get_data(hotel_id);
                review_clear();
              // addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
         });
    });

    var nextDay = new Date($("#datepicker1").val());
    nextDay.setDate(nextDay.getDate() + 1);

    $("#datepicker1").datepicker({
          minDate: 0,
          altField: "#alternate",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
          var nextDay = new Date(dateText);
          nextDay.setDate(nextDay.getDate() + 1);
          $("#datepicker2").datepicker('option', 'minDate', nextDay);
          setTimeout(function(){
            $( "#datepicker2" ).datepicker('show');
          }, 16); 
          total_night_calc1();
          if (providers=="otelseasy") {
            available_check();
            contract_check();
            childAgeoptionsMax();
            requestCheck();
          } else {
            TBO_available_check();
          }
          
     }
    });

      $("#datepicker2").datepicker({
          minDate: nextDay,
          altField: "#alternate2",
          altFormat: "dd/mm/yy",
          onSelect: function(dateText) {
            if (providers=="otelseasy") {
              total_night_calc1();
              available_check();
              contract_check();
              childAgeoptionsMax();
              requestCheck();
            } else {
              TBO_available_check();
            }
          }
      });

      
    $("#datepicker1").datepicker({
       minDate: 0,
       altField: "#alternate",
      altFormat: "dd/mm/yy",
      onSelect: function(dateText) {
      total_night_calc1();
      }
    });
    $("#datepicker2").datepicker({
       minDate: 0,
       altField: "#alternate2",
      altFormat: "dd/mm/yy",
      onSelect: function(dateText) {
      total_night_calc1();
      }
    });
     $("#alternate").click(function() {
        $( "#datepicker1" ).trigger('focus');
    });
     $("#alternate2").click(function() {
        $( "#datepicker2" ).trigger('focus');
    });
     
    

  
});
function review_get_data(id) {
   $.ajax({
      type: 'post',
      url: base_url+'details/review_view?hotel_id='+id,
      dataType: 'json',
      cache: false,
      data: $('#review_form').serialize(),
      success: function (response) {
        // alert(response);
        $("#review_data_id").html(response);
      },
       error: function (xhr,status,error) {
         alert("Error: " + error);
      }
     });
}
function average_ratings(id) {
   $.ajax({
      type: 'post',
      url: base_url+'details/average_ratings?hotel_id='+id,
      dataType: 'json',
      cache: false,
      data: $('#review_form').serialize(),
      success: function (response) {
        $("#average_rating").html(response.review_count);
        $("#review_rating").html(response.review_rating);
        $("#review_rating_count").html(response.review_rating_count);
        $("#review_guest_rating").html(response.review_guest_rating);
        $("#guest_recomend_percentage").html(response.guest_recomend_percentage);
      },
       error: function (xhr,status,error) {
         alert("Error: " + error);
      }
     });
}
// function hotel_book(id,id2) {
//   var from_date = $("#datepicker1").val();
//   var to_date = $("#datepicker2").val();
//   var Available = $("#room_count_val"+id).val();
//   var Request = $("#no_of_rooms").val();
//   $("#room_id").val(id);
//   if (Number(Available) >= Request) {
//    $.ajax({
//       type: 'post',
//       url: base_url+'details/all_allotment_checking?hid='+id+'&&rid='+id2,
//       dataType: 'json',
//       cache: false,
//        success:function(allotment){
//         if (allotment.date=="" && allotment.room=="" || allotment.room<=Request) {
//          $('#hotel_booking_form_id').submit();
//         } else {
//           alert("Minmum allotment "+allotment.room)
//         }
//     }
//     });
//   } else {
//     $("#no_of_rooms").focus();
//     alert('Your requested number of rooms is not Available')
//   }
  
// }
function hotel_book(room_id,hotel_id,adultCount,childCount,contract_id,type) {
  $("#RequestType").val(type);
  var start     = $("#datepicker1").val();
  var end       = $("#datepicker2").val();
  var Available = $(".room_count_val"+room_id).val();
  strdate = new Date();
  var date = moment(strdate).format('YYYYMMDDHHmmss');
  $("#token").val(date);
  var Request = $("#no_of_rooms").val();
  $("#room_id").val(room_id);
  if (Number(adultCount) < $("#room1-adults").val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room2-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room2-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room3-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room3-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room4-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room4-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room5-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room5-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room6-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room6-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room7-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room7-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room8-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room8-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room9-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room9-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if ($("#room10-adults").not(':disabled').val()!=undefined && Number(adultCount) < $("#room10-adults").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max adult is '+adultCount,
      );
  } else if(Number(childCount) < $(".room1-child").val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room2-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room2-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room3-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room3-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room4-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room4-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room5-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room5-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room6-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room6-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room7-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room7-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room8-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room8-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room9-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room9-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else if ($(".room10-child").not(':disabled').val()!=undefined && Number(childCount) < $(".room10-child").not(':disabled').val()) {
    swal(
        'Alert!',
        'Max child is '+childCount,
      );
  } else {
      $("#contract_id").val(contract_id);
      $('#hotel_booking_form_id').submit();
  }
}
function total_night_calc1() {
  var check_in = $("#datepicker1").val();
  var check_out = $("#datepicker2").val();
  var total_date = daydiff(parseDate(check_in), parseDate(check_out));
  if (total_date==1) {
    $(".total-night").text(total_date+ " night");
  } else {
    $(".total-night").text(total_date+ " nights");
  }
  if (total_date<1) {
    alert("Checkout date should be within one month duration.");
    $("#datepicker1").val("");
    $("#alternate2").val("dd/mm/yy");
  } else if (total_date>31) {
    alert("Checkout date should be within one month duration.");
    $("#datepicker2").val("");
    $("#alternate2").val("dd/mm/yy");
  } 
}
function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function daydiff(first, second) {
    return Math.round((second-first)/(1000*60*60*24));
}
function available_check(){
 
  var currencyPic = $("#currencyPic").val();
    $.ajax({
      type: 'post',
      // async : true,
      url: base_url+'details/all_date_checking',
      dataType: 'json',
      cache: false,
      data : $("#hotel_booking_form_id").serialize(),
       success:function(data){
          $(".roomRateCheckdiv div").remove();
          $.each(data.room_id, function (i, item) {
            $(".RateCheckdiv"+item).addClass('hide');
            $(".clearfixdiv"+item).addClass('hide');
            $(".linediv"+item).addClass('hide');
            $.each(data.contractBoard[item], function (j, boarditem) {
              if (boarditem=="RO") {
                icon = "bed";
              } else {
                icon = "cutlery";
              }
              if (boarditem=="RO") {
                title = "Room Only";
              } else if (boarditem=="BB") {
                title = "Bed and Breakfast";
              } else if (boarditem=="HB") {
                title = "Half Board";
              } else {
                title = "Full Board";
              }
              if (data.generalsupplementType[item][j]!="") {
                generalsupl = '<li>'+data.generalsupplementType[item][j]+'</li>';
              } else {
                generalsupl = '';
              }
              extrabedType = '';
              if (data.extrabedType[item][j]!="") {
                $.each(data.extrabedType[item][j], function (q, exbed) {
                  extrabedType += '<li>'+exbed+'</li>';
                });
              } 
              if (data.nonRefundable[item][j]!="") {
                nonRefundable = '<li>'+data.nonRefundable[item][j]+'</li>';
              } else {
                nonRefundable = '';
              }
              if (data.discount[item][j]!=0) {
                oldPrice = '<small class="mb-0 bold old-price">'+data.discountAmount[item][j]+'</small>';
              } else {
                oldPrice = '';
              }
              if (data.condition[item][j]=="true") {
                $(".RateCheckdiv"+item).removeClass('hide');
                $(".clearfixdiv"+item).removeClass('hide');
                $(".linediv"+item).removeClass('hide');
                if (data.count[item][j]==0) {
                  leftStyle = '';
                  style = '';
                  btn_name = 'On Request';
                } else {
                  leftStyle = '<small class="color-red">'+data.count[item][j]+' left!</small>';
                  style = 'style="background:green;border-bottom: 2px solid green;"';
                  btn_name = 'Book';
                }

                $(".RateCheckdiv"+item+" .roomRateCheckdiv").append('<div class="col-md-12"><div class="row contract-board">'+
                  '<input type="hidden" name="room_count" class="room_count_val'+item+'"  value="'+data.count[item][j]+'">'+
                  '<div class="col-xs-2"> <h5 class="color-blue bold tool-tip" title="'+title+'"><i class="fa fa-'+icon+'"></i><span> '+boarditem+'</span></h5><br/>'+
                  leftStyle+
                  '</div>'+
                  '<div class="col-xs-5"><ul>'+generalsupl+'</ul><ul>'+extrabedType+'</ul><ul>'+nonRefundable+'</ul></div>'+
                  '<div class="col-xs-3 text-right">'+
                    oldPrice+
                    '<p class="color-blue mb-0 bold">'+data.price[item][j]+'</p>'+
                  '</div>'+
                  '<div class="col-xs-2 text-right">'+
                  '<a href="#" '+style+' class="hotel-view-btn1 sbookbtn mt1" onclick="hotel_book('+item+','+data.hotel_val[item][j]+','+data.occupancy[item][j]+','+data.occupancy_child[item][j]+',\''+data.contract_val[item][j]+'\',\''+btn_name+'\')" >'+btn_name+'</a></div></div>');
              } 
            });
          });
           
          $(".dateCheckLoad").hide();
          $(".dateCheckLoadAfter").show();
      },
       error: function (xhr,status,error) {
         if ($(".contract_ajax_id").val()==undefined) {
            $(".dateCheckLoad").hide();
            $(".dateCheckLoadAfter").show();
            $(".contractCheckDiv").addClass('hide');
            $(".contractCheckSuccessDiv").removeClass('hide');
        } 
      }
    });
}
function review_clear() {
  $("#review_uname").val("");
  $("#title").val("");
  $("#comment").val("");
  $("#evaluation").prop('selectedIndex', 0); 
}
function cut_off_msg(msg) {
  swal(
        'Alert!',
        msg
      );
}
function favourite_add(agent_id,hotel_id)
  { 
    $.ajax({
       dataType: 'json',
       type: 'post',
       url: base_url+'dashboard/favourite_ajax?agent_id='+agent_id+'&hotel_id='+hotel_id,
       cache: false,
       success: function (response) {
        favourite_ajax(agent_id,hotel_id);
       }
     });
  }
function favourite_ajax(agent_id,hotel_id) {
  $.ajax({
       type: 'post',
       url: base_url+'dashboard/favourite_ajax_check?agent_id='+agent_id+'&hotel_id='+hotel_id,
       cache: false,
       success: function (response) {
        $("#favourite").html(response);
       }
     });
}

function contract_check() {
  $(".dateCheckLoad").show();
  $(".dateCheckLoadAfter").hide();
  $(".hides .contract_ajax_id").remove();
  
  $.ajax({
      type: 'post',
      url: base_url+'details/contractchecking',
      dataType: 'json',
      cache: false,
      data : $("#hotel_booking_form_id").serialize(),
       success:function(data){
          $(".hides .contract_ajax_id").remove();
          if (data==false) {
            $("#contract_id").val("");
            $("#max_child_age").val("");
            $(".contractCheckDiv").addClass('hide');
            $(".contractCheckSuccessDiv").removeClass('hide');
            childAgeoptionsMax();
            requestCheck();
            available_check();
            board_check();
          } else {
            $.each(data.contract_id,function(i,item) {
              $(".hides").append('<input type="hidden" class="contract_ajax_id" name="contract_ajax_id[]" value="'+item+'"/>');
            });
            $("#contract_id").val(data.contract_id[0]);
            $("#max_child_age").val(16);
            $(".contractCheckDiv").removeClass('hide');
            $(".contractCheckSuccessDiv").addClass('hide');
            childAgeoptionsMax();
            requestCheck();
            available_check();
            board_check();
          }
       }
   });
}
function board_check() {
  $.ajax({
      type: 'post',
      url: base_url+'details/boardsupplementDetails',
      cache: false,
      data : $("#hotel_booking_form_id").serialize(),
       success:function(data){
          $(".board-list-div").html(data);
       }
   });
}
function MaxChildAgeCheck(className) {
  var max_child_age = $("#max_child_age").val();
  var child_age = $("."+className).val();
  if (Number(child_age) > Number(max_child_age)) {
    swal(
        'Alert!',
        'Max child age is '+max_child_age,
      );
    $("."+className+" option[value='"+child_age+"']").attr('selected',true);
    // $("."+className).customSelect();
  }
}
function childAgeoptionsMax() {

var max_child_age = $("#max_child_age").val();
  $(".child-age-option option").show();
    for (i = Number(max_child_age)+1; i <= 17; i++) {
      $(".child-age-option option[value='"+i+"']").hide();
    }
}
function requestCheck() {
  $.ajax({
      type: 'post',
      url: base_url+'details/requestCheck',
      dataType: 'json',
      cache: false,
      data : $("#hotel_booking_form_id").serialize(),
       success:function(data){
          $.each(data,function(i,v) {
            $("#"+v).attr("checked",true);
          });
       }
   });
}
function roomFacilitiesDetailsModal(room_id) {
  $("#modal").load(encodeURI(base_url+"details/roomFacilitiesDetailsModal?id="+room_id));
}
function HotelFacilitiesDetailsModal(hotel_id) {
  // alert(encodeURI(base_url+"details/HotelFacilitiesDetailsModal?hotel_id="+hotel_id));
  $("#modal").load(encodeURI(base_url+"details/HotelFacilitiesDetailsModal?hotel_id="+hotel_id));
}
// function available_check(){
//   var currencyPic = $("#currencyPic").val();
//     $.ajax({
//       type: 'post',
//       // async : true,
//       url: base_url+'details/all_date_checking',
//       dataType: 'json',
//       cache: false,
//       data : $("#hotel_booking_form_id").serialize(),
//        success:function(data){
//           $.each(data.mssgrooms, function (i, item) {
//               if (data.mssgc[i]=="0") {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).addClass("hide");
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item+" li").remove();
//                   $(".ctype"+data.crequest[i]+" .mangeneralsupl"+item+" li").remove();
//                   $(".ctype"+data.crequest[i]+" .boardsupl"+item+" li").remove();
//                 } else {
//                   $(".roomRateCheckdiv"+item).addClass("hide");
//                   $(".generalsupl"+item+" li").remove();
//                   $(".mangeneralsupl"+item+" li").remove();
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               } else {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).removeClass("hide");
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item+" li").remove();
//                   $(".ctype"+data.crequest[i]+" .mangeneralsupl"+item+" li").remove();
//                   $(".ctype"+data.crequest[i]+" .boardsupl"+item+" li").remove();
//                 } else {
//                   $(".roomRateCheckdiv"+item).removeClass("hide");
//                   $(".generalsupl"+item+" li").remove();
//                   $(".mangeneralsupl"+item+" li").remove();
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               }
//              if(data.mssg1[i]=="Closed") {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+" .amount_val"+item).text(data.price[i]);
//                   $(".ctype"+data.crequest[i]+" .check_room"+item).removeClass("hide");
//                   $(".ctype"+data.crequest[i]+" .check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                   $(".ctype"+data.crequest[i]+" .room_count"+item).addClass("hide");
//                   $(".ctype"+data.crequest[i]+" .book_hotel"+item).addClass("hide");
//                   $(".ctype"+data.crequest[i]+" .availablity"+item).addClass('red bold');
//                   $(".ctype"+data.crequest[i]+" .availablity"+item).text(data.cut_off_msg[i]);
//                   $.each(data.generalsupplementType[i], function(j, itemName) {
//                     $(".ctype"+data.crequest[i]+" .generalsupl"+item).append("<li>"+itemName+"</li>");
//                   });
//                   $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                     $(".ctype"+data.crequest[i]+"  .mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                   }); 
//                   if(data.BoardsupplementType[i]!="") {
//                     $(".ctype"+data.crequest[i]+"  .boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                   } else {
//                     $(".ctype"+data.crequest[i]+"  .boardsupl"+item+" li").remove();
//                   }
//                 } else {
//                   $ (".amount_val"+item).text(data.price[i]);
//                   $(".check_room"+item).removeClass("hide");
//                   $(".check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                   $(".room_count"+item).addClass("hide");
//                   $(".book_hotel"+item).addClass("hide");
//                   $(".availablity"+item).addClass('red bold');
//                   $(".availablity"+item).text(data.cut_off_msg[i]);
//                   $.each(data.generalsupplementType[i], function(j, itemName) {
//                     $(".generalsupl"+item).append("<li>"+itemName+"</li>");
//                   });
//                   $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                     $(".mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                   });
//                   if(data.BoardsupplementType[i]!="") {
//                     $(".boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                   } else {
//                     $(".boardsupl"+item+" li").remove();
//                   }
//                 }
//              } else
//               if (data.mssg1[i]=="Booked") {
//               if (data.crequest[i]!="") {
//                 $(".ctype"+data.crequest[i]+" .amount_val"+item).text(data.price[i]);
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).removeAttr("href");
//                 $(".ctype"+data.crequest[i]+" .room_count"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).addClass('red bold');
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).text(data.mssg1[i]);
//                 $(".ctype"+data.crequest[i]+" .book_hotel"+item).addClass("hide");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+"  .mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 }); 
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item+" li").remove();
//                 }

//               } else {
//                 $(".amount_val"+item).text(data.price[i]);
//                 $(".check_room"+item).addClass("hide");
//                 $(".check_room"+item).removeAttr("href");
//                 $(".room_count"+item).addClass("hide");
//                 $(".availablity"+item).addClass('red bold');
//                 $(".availablity"+item).text(data.mssg1[i]);
//                 $(".book_hotel"+item).addClass("hide");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               }
              
//             } else if(data.mssg1[i]=="Minimum") {
//               /*Minimum Stay data start*/
//               if (data.mssgc[i]=="0") {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).addClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).addClass("hide");
//                 }
//               } else {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).removeClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).removeClass("hide");
//                 }
//               }
              
//               if (data.crequest[i]!="") {
//                 $(".ctype"+data.crequest[i]+" .amount_val"+item).text(data.price[i]);
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).removeClass("hide");
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                 $(".ctype"+data.crequest[i]+" .room_count"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .book_hotel"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).addClass('red bold');
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).text(data.cut_off_msg[i]);
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+"  .mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 }); 
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item+" li").remove();
//                 }
//               } else {
//                 $(".amount_val"+item).text(data.price[i]);
//                 $(".check_room"+item).removeClass("hide");
//                 $(".check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                 $(".room_count"+item).addClass("hide");
//                 $(".book_hotel"+item).addClass("hide");
//                 $(".availablity"+item).addClass('red bold');
//                 $(".availablity"+item).text(data.cut_off_msg[i]);
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               }
//               /*Minimum Stay data start*/
              
//             } else if (data.condition[i]=="False") {
//               /*False  Data start*/
//               if (data.mssgc[i]=="0") {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).addClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).addClass("hide");
//                 }
//               } else {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).removeClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).removeClass("hide");
//                 }
//               }
//               if (data.crequest[i]!="") {
//                 $(".ctype"+data.crequest[i]+" .amount_val"+item).text(data.price[i]);
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).removeClass("hide");
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                 $(".ctype"+data.crequest[i]+" .room_count"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .book_hotel"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).addClass('red bold');
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).text("Not Available");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+"  .mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 }); 
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item+" li").remove();
//                 }
//               } else {
//                 $(".amount_val"+item).text(data.price[i]);
//                 $(".check_room"+item).removeClass("hide");
//                 $(".check_room"+item).attr("href","javascript:cut_off_msg('"+data.cut_off_msg[i]+"')");
//                 $(".room_count"+item).addClass("hide");
//                 $(".book_hotel"+item).addClass("hide");
//                 $(".availablity"+item).addClass('red bold');
//                 $(".availablity"+item).text("Not Available");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               }
              
//               /*False  Data start*/
              
//             } else {
//               /*Available Data start*/
//               if (data.mssgc[i]=="0") {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).addClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).addClass("hide");
//                 }
//               } else {
//                 if (data.crequest[i]!="") {
//                   $(".ctype"+data.crequest[i]+".roomRateCheckdiv"+item).removeClass("hide");
//                 } else {
//                   $(".roomRateCheckdiv"+item).removeClass("hide");
//                 }
//               }
//               if (data.crequest[i]!="") {
//                 $(".ctype"+data.crequest[i]+" .amount_val"+item).text(data.price[i]);
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).addClass("hide");
//                 $(".ctype"+data.crequest[i]+" .check_room"+item).removeAttr("href");
//                 $(".ctype"+data.crequest[i]+" .room_count"+item).removeClass("hide");
//                 $(".ctype"+data.crequest[i]+" .room_count"+item).text(data.mssgc[i]+"-left");
//                 $(".ctype"+data.crequest[i]+" .room_count_val"+item).val(data.mssgc[i]);
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).removeClass('red');
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).addClass('bold');
//                 $(".ctype"+data.crequest[i]+" .availablity"+item).text(data.mssg1[i]);
//                 $(".ctype"+data.crequest[i]+" .book_hotel"+item).removeClass("hide");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+" .generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".ctype"+data.crequest[i]+"  .mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 }); 
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".ctype"+data.crequest[i]+"  .boardsupl"+item+" li").remove();
//                 }
//               } else {
//                 $(".amount_val"+item).text(data.price[i]);
//                 $(".check_room"+item).addClass("hide");
//                 $(".check_room"+item).removeAttr("href");
//                 $(".room_count"+item).text(data.mssgc[i]+"-left");
//                 $(".room_count_val"+item).val(data.mssgc[i]);
//                 $(".availablity"+item).removeClass('red');
//                 $(".availablity"+item).addClass('bold');
//                 $(".availablity"+item).text(data.mssg1[i]);
//                 $(".book_hotel"+item).removeClass("hide");
//                 $.each(data.generalsupplementType[i], function(j, itemName) {
//                   $(".generalsupl"+item).append("<li>"+itemName+"</li>");
//                 });
//                 $.each(data.MangeneralsupplementType[i], function(j, itemName) {
//                   $(".mangeneralsupl"+item).append("<li>"+itemName+"</li>");
//                 }); 
//                 if(data.BoardsupplementType[i]!="") {
//                   $(".boardsupl"+item).append("<li>"+data.BoardsupplementType[i]+"</li>");
//                 } else {
//                   $(".boardsupl"+item+" li").remove();
//                 }
//               }
              
//               /*Available Data end*/
              
//             }
//           });
//         $(".dateCheckLoad").hide();
//         $(".dateCheckLoadAfter").show();
//       }
//     });
// }
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}
$(".dateCheckLoadAfter").hide();
    var hotel_id = $("#hotel_id").val();
    review_get_data(hotel_id);
    average_ratings(hotel_id);
    $('#frontend_review_add_button').click(function (e) {
      e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'welcome/review_add',
          data: $('#review_form').serialize(),
          cache: false,
          success: function (response) {
            if (response.status != "1") {
              if (response.error == "Name field is required !") {
                $(".name_error").css("color","red");
                $(".name_error").text(response.error);
              } else if (response.error == "Title field is required !") {
                $(".title_error").css("color","red");
                $(".title_error").text(response.error);
              } else if (response.error == "Comment field is required !") {
                $(".comment_error").css("color","red");
                $(".comment_error").text(response.error);
              }
            } else {
                $(".success_error").css("color","green");
                $(".success_error").text(response.error);
                $(".name_error").text('');
                $(".title_error").text('');
                $(".comment_error").text('');
                average_ratings(hotel_id);
                review_get_data(hotel_id);
                review_clear();
              // addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
         });
    });
function TBO_available_check() {
  $(".dateCheckLoad").show();
  $(".dateCheckLoadAfter").hide();
  $.ajax({
      type: 'post',
      // async : true,
      url: base_url+'details/TBO_available_check',
      dataType: 'json',
      cache: false,
      data : $("#hotel_booking_form_id").serialize(),
      success:function(data){
        $(".dateCheckLoad").hide();
        $(".dateCheckLoadAfter").show();
        $(".roomListClass").html(data);
      }
  });
}
function getdetails(roomindex,hotelcode,roomName) {
  $('#hotel_id').val(hotelcode);
  $('#roomIndex').val(roomindex);
  $('#roomName').val(roomName);
  strdate = new Date();
  var date = moment(strdate).format('YYYYMMDDHHmmss');
  url = base_url+'payment/payments?'+$('#hotel_booking_form_id').serialize();
  window.open(url+"&token="+date,'_blank');
}
function checkavailabletours(){
  var currencyPic = $("#currencyPic").val();
    $.ajax({
      type: 'post',
      // async : true,
      url: base_url+'tour/all_date_checking',
      dataType: 'json',
      cache: false,
      data : $("#tour_booking_form_id").serialize(),
       success:function(data){         
          $.each(data, function (key,value) { 
            $(".roomRateCheckdiv div").remove();
            $(".roomRateCheckdiv").append('<div class="RateCheckdiv'+value.contractid+'"></div>');
            $(".RateCheckdiv"+value.contractid).append('<div class="col-md-12"><div class="row contract-board">'+
                '<input type="hidden" name="contract_id"  value="'+value.id+'">'+
                '<div class="col-xs-6"> <h5 class="color-blue bold tool-tip text-right" title="'+value.type+'"><span> '+value.type+'</span></h5><br/></div>'+'<div class="col-xs-3"> <h5  class="color-blue bold tool-tip text-right" title="'+value.type+'"><span> '+value.totalamount+' '+currencyPic+'</span></h5><br/></div>'+'<div class="col-xs-3 text-right">'+'<a href="#"  class="hotel-view-btn1 sbookbtn mt1" onclick="tourview('+value.contractid+','+value.tour_type+')">Book</a></div></div></div>');
              
           
          });
           
          $(".dateCheckLoad").hide();
          $(".dateCheckLoadAfter").show();
      },
       error: function (xhr,status,error) {
        
            $(".dateCheckLoad").hide();
            $(".dateCheckLoadAfter").show();
            $(".contractCheckDiv").addClass('hide');
            $(".contractCheckSuccessDiv").removeClass('hide');
      
      }
    });
}
function tourview(tourcontractid,tourid) {
  $("#contractid").val(tourcontractid);
  $("#tourid").val(tourid);
  strdate = new Date();
    var date = moment(strdate).format('YYYYMMDDHHmmss');
    url = base_url+'tour/tourview?'+$('#tour_booking_form_id').serialize();
    window.open(url+"&token="+date,'_blank');
}


