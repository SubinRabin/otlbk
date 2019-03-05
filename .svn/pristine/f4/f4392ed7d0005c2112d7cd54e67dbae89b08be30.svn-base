$(document).ready(function() {
	tourSearch();
	   $("#tour_search_button").click(function() {
		    var location = $("#location").val();
		    var nationality = $("#nationality").val();
		    var arrivaldate = $("#arrivaldate").val();
		    var adults = $("#adults").val();
		    if (location=="" &&  nationality=="") {
		      $(".dest_err").css("color","red");
		      $(".nat_err").css("color","red");
		    } else if(location=="") {
		      $(".dest_err").css("color","red");
		      $(".nat_err").css("color","black");
		    } else if(nationality=="") {
		      $(".dest_err").css("color","black");
		      $(".nat_err").css("color","red");
		    } else if (arrivaldate=="") {
		      $(".arrival_err").css("color","red");
		    } else if (adults=="") {
		      $(".adults_err").css("color","red");
		    } else {
		      $("#main_tour_search_form").attr("action",base_url+"tour/tourlist");
		      $("#main_tour_search_form").submit();
		    }
	  });
	   FullLoading('stop');
	  var jslide_change = "1";
	  $("#name_order").change(function() {
    	tourSearch();
  	  });
  	  $("#price_order").change(function() {
    	tourSearch();
      });
	  $(".gridbtn").click(function() {
	    $("#view_type").val("grid");
	    $(this).addClass("active");
	    $(".listbtn").removeClass("active");
	    $(".grid2btn").removeClass("active");
	    tourSearch();
	  });
	  $(".listbtn").click(function() {
	    $("#view_type").val("list");
	    $(this).addClass("active");
	    $(".gridbtn").removeClass("active");
	    $(".grid2btn").removeClass("active");
	    tourSearch();
	  });
	  $(".grid2btn").click(function() {
	    $("#view_type").val("grid2");
	    $(this).addClass("active");
	    $(".listbtn").removeClass("active");
	    $(".gridbtn").removeClass("active");
	    tourSearch();
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
	function initMap() {
        var input = document.getElementById('region');
        var countries = $(".countrycode").val();

       // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set initial restrict to the greater list of countries.
        autocomplete.setComponentRestrictions(
            {'country': [countries]});

        // Specify only the data fields that are needed.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

      }
      function tourSearch(){
      	$.ajax({
	      dataType: 'json',
	      type: 'post',
	      url: base_url+'tour/search_list',
	      data: $('#tempForm').serialize(),
	      cache: false,
	      // async: false,
	      success: function (response) {
	        hotelLoading('stop');

	        $("#result_search").html(response.list);
	         count(response.counttours,response.countprice);
	        StartAnime2();
	      }
		});
	 }
	 function custom_filter() {
  		tourSearch();
	 }
	 function FullLoading(flag, dest, from, to) {
	  const fullLoading = document.querySelector('#fullLoading');
	  let destination = dest || 'Dubai';
	  let fromDate = from || '12/05/2018';
	  let toDate = to || '16/05/2018';

	  function startLoading() {
	      let html = `<div id="fullLoading" class="full-loading"><img src="../skin/images/fullloading.gif" alt=""><div class="fl-data"><h2 class="fl-title">We are on it! Searching the best prices.</h2><p class="fl-subtext">In a few moments, you'll be celebrating hotel options galore!</p><div class="fl-info-card"><div class="top"><span>- Destination -</span><p>${destination}</p></div><div class="mid"><div><span>From</span><p>${fromDate}</p></div><div><span>To</span><p>${toDate}</p></div></div></div></div></div>`;
	      document.body.innerHTML += html;
	  }

	  // function stopLoading() {
	  //     document.body.removeChild(fullLoading);
	  // }

	  // flag == 'start' ? startLoading() : stopLoading();
	}
	function count(count,price) {
  if (count==0 || count==1) {
    $(".tourcnt").text('Tour');
  } else {
    $(".tourcnt").text('Tours');
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
    $('.counttour').countTo({
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
function tourview(tourcontractid,tourid) {
	$("#contractid").val(tourcontractid);
	$("#tourid").val(tourid);
	strdate = new Date();
  	var date = moment(strdate).format('YYYYMMDDHHmmss');
  	url = base_url+'tour/tourview?'+$('#tempForm').serialize();
  	window.open(url+"&token="+date,'_blank');
}
function tourdetails(tourcontractid,tourid) {
  $("#contractid").val(tourcontractid);
  $("#tourid").val(tourid);
  strdate = new Date();
    var date = moment(strdate).format('YYYYMMDDHHmmss');
    url = base_url+'tour/tourdetails?'+$('#tempForm').serialize();
    window.open(url,'_blank');
}
function page_click(page) {
  $("#page").val(page);
  tourSearch();
}