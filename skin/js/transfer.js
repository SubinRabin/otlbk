$(document).ready(function() {
	transfersearch_ajax();
	$("#transferSearch").click(function() {
		var erCount = 0;
		if ($("#location").val()=="") {
			$("#location").css('border','2px solid red');
			erCount += 1;
		} else {
			$("#location").css('border','2px solid #ebebeb');
		}

		if ($("#region").val()=="") {
			$("#region").css('border','2px solid red');
			erCount += 1;
		} else {
			$("#region").css('border','2px solid #ebebeb');
		}

		if ($("#Nationality").val()=="") {
			$("#Nationality").css('border','2px solid red');
			erCount += 1;
		} else {
			$("#Nationality").css('border','2px solid #ebebeb');
		}

		if ($("#arrivaldate").val()=="") {
			$("#arrivaldate").css('border','2px solid red');
			erCount += 1;
		} else {
			$("#arrivaldate").css('border','2px solid #ebebeb');
		}

		if ($('input[name="transfertype"]:checked').val()=="two-way" && $("#returndate").val()=="") {
			$("#returndate").css('border','2px solid red');
			erCount += 1;
		} else {
			$("#returndate").css('border','2px solid #ebebeb');
		}
		if (erCount == 0) {
			$("#TransferSearchForm").attr('action',base_url+"transfer/searchresults");
			$("#TransferSearchForm").submit();
		}
	});
    var jslide_change = "1";
    $("#name_order").change(function() {
      transfersearch_ajax();
      });
    $("#price_order").change(function() {
      transfersearch_ajax();
    });
    $(".vehicletype").click(function() {
      transfersearch_ajax();
    });
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
function transfersearch_ajax() {
	hotelLoading('start');
	$.ajax({
      dataType: 'json',
      type: 'get',
      url: base_url+'transfer/search_list',
      data: $('#TransferSearchReqForm').serialize(),
      cache: false,
      // async: false,
      success: function (response) {
        hotelLoading('stop');

        $("#result_search").html(response.list);
        count(response.transfercount,response.countprice);
        StartAnime2();
      }/*,
       error: function (xhr,status,error) {
         alert("Error: " + error);
      }*/
    });

}
function custom_filter() {
  transfersearch_ajax();
}
function page_click(page) {
  $("#page").val(page);
  transfersearch_ajax();
}
function count(count,price) {
  if (count==0 || count==1) {
    $(".transfercnt").text('Transfer');
  } else {
    $(".transfercnt").text('Transfers');
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
    $('.counttransfer').countTo({
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
function custom_filter() {
  transfersearch_ajax();
}
function transferview(contractid,vehicleid) {
  $("#contractid").val(contractid);
  $("#vehicleid").val(vehicleid);
  strdate = new Date();
  var date = moment(strdate).format('YYYYMMDDHHmmss');
  url = base_url+'transfer/transferview?'+$('#TransferSearchReqForm').serialize();
  window.open(url+"&token="+date,'_blank');
}
