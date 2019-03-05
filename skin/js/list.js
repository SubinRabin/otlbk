function FullLoading(flag, dest, from, to) {
  const fullLoading = document.querySelector('#fullLoading');
  let destination = dest || 'Dubai';
  let fromDate = from || '12/05/2018';
  let toDate = to || '16/05/2018';

  function startLoading() {
      let html = `<div id="fullLoading" class="full-loading"><img src="../skin/images/fullloading.gif" alt=""><div class="fl-data"><h2 class="fl-title">We are on it! Searching the best prices.</h2><p class="fl-subtext">In a few moments, you'll be celebrating hotel options galore!</p><div class="fl-info-card"><div class="top"><span>- Destination -</span><p>${destination}</p></div><div class="mid"><div><span>From</span><p>${fromDate}</p></div><div><span>To</span><p>${toDate}</p></div></div></div></div></div>`;
      document.body.innerHTML += html;
  }

  function stopLoading() {
    document.body.removeChild(fullLoading);
  }

  flag == 'start' ? startLoading() : stopLoading();
}
$(document).ready(function() {
   $("#search_button").click(function() {
    var location = $("#location").val();
    var Nationality = $("#nationality").val();
    var hotel_name = $("#hotel_name").val();
    var check_in = $("#datepicker").val();
    var check_out = $("#datepicker2").val();
    var adults = $("#adults").val();
    var rate = $(".rate:checked").val();
    var altCheckIn = $("#alternate").val();
    var altCheckOut = $("#alternate2").val();
    if (location=="" && hotel_name=="" && Nationality=="") {
      $(".dest_err").css("color","red");
      $(".htl_err").css("color","red");
      $(".nat_err").css("color","red");
    }else if(location=="") {
      $(".dest_err").css("color","red");
      $(".htl_err").css("color","black");
      $(".nat_err").css("color","black");
    } 
    else if(Nationality=="") {
      $(".dest_err").css("color","black");
      $(".htl_err").css("color","black");
      $(".nat_err").css("color","red");
    } else if (check_in=="") {
      $(".chckin_err").css("color","red");
    } else if (check_out=="") {
      $(".chckout_err").css("color","red");
    } else if (adults=="") {
      $(".adults_err").css("color","red");
    // } else if (rate==undefined || rate=="") {
    //  tpj(".rate_err").css("color","red");
    } else {
      var req = $("#Mian_search_form").serialize();
      FullLoading('start', location, altCheckIn, altCheckOut);
      window.location.href=base_url+'lists/index?'+req;
    }

  });

  FullLoading('stop');
  var jslide_change = "1";
  search_ajax();
  $("#name_order").change(function() {
    search_ajax();
  });
  $("#price_order").change(function() {
    search_ajax();
  });
   $("#guest_rating").change(function() {
    search_ajax();
  });
   $(".rating").click(function() {
    search_ajax();
  });
   $(".preference_filter").click(function() {
    search_ajax();
  });
  $(".gridbtn").click(function() {
    $("#view_type").val("grid");
    $(this).addClass("active");
    $(".listbtn").removeClass("active");
    $(".grid2btn").removeClass("active");
    search_ajax();
  });
  $(".listbtn").click(function() {
    $("#view_type").val("list");
    $(this).addClass("active");
    $(".gridbtn").removeClass("active");
    $(".grid2btn").removeClass("active");
    search_ajax();
  });
  $(".grid2btn").click(function() {
    $("#view_type").val("grid2");
    $(this).addClass("active");
    $(".listbtn").removeClass("active");
    $(".gridbtn").removeClass("active");
    search_ajax();
  });
  // $("#search_button").click(function() {
  //   $("#Mian_search_form").attr("action",base_url+"lists/index");
  //   $("#Mian_search_form").submit();
  // });
});
function hotelLoading(flag) {
  var spinWrapper = $('.rightcontent .spin-wrapper');
    if (flag === 'start') {
        spinWrapper.show();
    }
    if (flag === 'stop') {
        spinWrapper.fadeOut();
    }
}
function search_ajax() {
  if ($("#datepicker").val()=="") {
    alert("Must select check in date");
  } else if ($("#datepicker2").val()=="") {
    alert("Must select check out date");
  } else {
  hotelLoading('start');
  $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'lists/search_list',
      data: $('#search_form').serialize(),
      cache: false,
      // async: false,
      success: function (response) {
        hotelLoading('stop');
        $("#rotateBanner").html(response.rotateHotels);
        $("#result_search").html(response.list);
        count(response.counthotel,response.countprice);
        StartAnime2();

        $('.hotel-more-btn').click(function() {
          var toggled = $(this).closest('.offset-2').find('.more-wrap').hasClass('in');
        $('.hotel-more-btn').children('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
          $('.hotel-more-btn').children('span').text('More Details');
          if (toggled) {
            $('.more-wrap').removeClass('in');
            $('.more-wrap').slideUp();
            $(this).children('span').text('More Details');
            $(this).children('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
          }
          else {
            $('.more-wrap').removeClass('in');
            $('.more-wrap').slideUp('fast');
            $(this).children('span').text('Hide Details');
            $(this).children('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $(this).closest('.offset-2').find('.more-wrap').addClass('in');
            $(this).closest('.offset-2').find('.more-wrap').slideDown();
          }
       });
        

      }/*,
       error: function (xhr,status,error) {
         alert("Error: " + error);
      }*/
    });
  }
  $("#listarray").val("");
  $("#temp").val(0);
}
function MoreDetailsToggle(hotel_id,type) {
  $("#hotel_id").val(hotel_id);
  $("#Reqtype").val(type);
  if ($(".more-content"+hotel_id).closest('.more-wrap').attr('style')!='display: block;') {
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'lists/MoreDetailsData',
        data: $('#search_form').serialize(),
        cache: false,
        success: function (response) {
          $(".more-content"+hotel_id).html(response);
        }
    });
  }
}
function custom_filter() {
  search_ajax();
}
function page_click(page) {
  $("#page").val(page);
  search_ajax();
}
function count(count,price) {
  if (count==0 || count==1) {
    $(".htlcnt").text('Hotel');
  } else {
    $(".htlcnt").text('Hotels');
  }
  jQuery(function($) {
  "use strict";
    $('.countprice').countTo({
      from: 5,
      to: price,
      speed: 1000,
      refreshInterval: 50,
      onComplete: function(value) {
        console.debug(this);
      }
    });
    $('.counthotel').countTo({
      from: 1,
      to: count,
      speed: 2000,
      refreshInterval: 50,
      onComplete: function(value) {
        console.debug(this);
      }
    });     
  });
}
function total_night_calc1() {
  var check_in = $("#datepicker").val();
  var check_out = $("#datepicker2").val();
  var total_date = daydiff(parseDate(check_in), parseDate(check_out));
  if (total_date<1) {
    alert("Checkout date should be within one month duration.");
    $("#datepicker").val("");
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
//------------------------------
// List Hover Animations
//------------------------------
  
"use strict";

  function StartAnime2() {
    var jQuerywlist = jQuery('.listitem').width();
    var jQueryhlist = jQuery('.listitem').height();
    jQuery('.liover').css({
      "width":100+"%",
      "height":100+"%",
      "background-color":"#0099cc",
      "position":"absolute",
      "top":0+"px", 
      "left":jQuerywlist+"px", 
      "opacity":0.5, 
    });
    jQuery('.fav-icon').css({
      "top":jQueryhlist/2-11+"px",
      "left":-25+"px",
    });
    jQuery('.book-icon').css({
      "top":jQueryhlist/2-11+"px",
      "left":-25+"px",
    });
    
    jQuery( ".listitem" )
      .mouseenter(function() {
      "use strict";
        jQuery(this).find('.liover').stop().animate({ "left":10+"%","top":10+"%","width":80+"%","height":80+"%"  });
        jQuery(this).find('.book-icon').stop().animate({ "left":jQuerywlist/2+18+"px" });
        jQuery(this).find('.fav-icon').stop().animate({ "left":jQuerywlist/2-42+"px" },{ duration: 1000, queue: false });


      })
      .mouseleave(function() {
      "use strict";
        jQuery(this).find('.liover').stop().animate({ "left":jQuerywlist+"px","top":0+"px","width":100+"%","height":100+"%"  });
        jQuery(this).find('.book-icon').stop().animate({ "left":-25+"px" },{ duration: 1000, queue: false });
        jQuery(this).find('.fav-icon').stop().animate({ "left":-25+"px" });
      
      }); 
    
  }
  
  // StartAnime2();
  
  jQuery(window).resize(function() {
  "use strict";
    StartAnime2();          
  });
  
function favourite_add(agent_id,hotel_id)
  { 

    $.ajax({
       dataType: 'json',
       type: 'post',
       url: base_url+'dashboard/favourite_ajax_check1?agent_id='+agent_id+'&hotel_id='+hotel_id,
       cache: false,
       success: function (response) {
       }
     });
    // alert($agent_id);
    // exit();
    
  }

  // function moreClick() {
  //   alert("sdfs");
  //   $('.hotel-more-btn').css('color','red');
  //   $('.more-content').addClass('in');
  // }





//   function fav_search_ajax() {
//   // hotelLoading('start');
//   $.ajax({
//       alert("abc");
//       echo("abc");
//       dataType: 'json',
//       type: 'post',
//       url: base_url+'lists/fav_search_list',
//       data: $('#search_form').serialize(),
//       cache: false,
//       success: function (response) {
//         // hotelLoading('stop');
//         $("#result_search").html(response.list);
//         count(response.counthotel,response.countprice);
//         StartAnime2();
//       }/*,
//        error: function (xhr,status,error) {
//          alert("Error: " + error);
//       }*/
//     });
// }
function getdetails(roomindex,hotelcode,name,adrs,pic,rating,roomName,sessionid,resultindex) {
    var str = name;
    var res = str.replace("&", "and");
    $('#hotel_id').val(hotelcode);
    $('#roomIndex').val(roomindex);
    $('#roomName').val(roomName);
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'lists/bookredirectdata?name='+res+'&&adrs='+adrs+'&&pic='+pic+'&&rating='+rating+'&&sessionid='+sessionid+'&&code='+hotelcode+'&&resultindex='+resultindex,
        cache: false,
        success: function(response) {
          strdate = new Date();
          var date = moment(strdate).format('YYYYMMDDHHmmss');
          url = base_url+'payment/payments?'+$('#search_form').serialize();
          window.open(url+"&&token="+date,'_blank');
        }
    });
}
function hoteldetails(roomindex,hotelcode,name,adrs,pic,rating,roomName,sessionid,resultindex) {
    var str = name;
    var res = str.replace("&", "and");
    $('#hotel_id').val(hotelcode);
    $('#roomIndex').val(roomindex);
    $('#roomName').val(roomName);
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: base_url+'lists/bookredirectdata?name='+res+',&adrs='+adrs+'&pic='+pic+'&rating='+rating+'&sessionid='+sessionid+'&code='+hotelcode+'&resultindex='+resultindex,
        cache: false,
        success: function(response) {
          strdate = new Date();
          var date = moment(strdate).format('YYYYMMDDHHmmss');
          url = base_url+'payment/payments?'+$('#search_form').serialize();
          window.open(url+"&token="+date,'_blank');
        }
    });
}

