function FullLoading(flag, dest, from, to) {
  const fullLoading = document.querySelector('#fullLoading');
  let destination = dest || 'Dubai';
  let fromDate = from || '12/05/2018';
  let toDate = to || '16/05/2018';

  function startLoading() {
      let html = `<div id="fullLoading" class="full-loading"><img src="`+base_url+`skin/images/fullloading.gif" alt=""><div class="fl-data"><h2 class="fl-title">We are on it! Searching the best prices.</h2><p class="fl-subtext">In a few moments, you'll be celebrating hotel options galore!</p><div class="fl-info-card"><div class="top"><span>- Destination -</span><p>${destination}</p></div><div class="mid"><div><span>From</span><p>${fromDate}</p></div><div><span>To</span><p>${toDate}</p></div></div></div></div></div>`;
      document.body.innerHTML += html;
  }

  function stopLoading() {
    document.body.removeChild(fullLoading);
  }

  flag == 'start' ? startLoading() : stopLoading();
}
$(document).ready(function() {
	tpj("#nights").change(function() {
		total_night_calc();
	});
	tpj("#search_btn").click(function() {
		var location = tpj("#location").val();
		var Nationality = tpj("#Nationality").val();
		var hotel_name = tpj("#hotel_name").val();
		var check_in = tpj("#datepicker3").val();
		var check_out = tpj("#datepicker2").val();
		var adults = tpj("#adults").val();
		var rate = tpj(".rate:checked").val();
		var altCheckIn = $("#alternate3").val();
    	var altCheckOut = $("#alternate2").val();
		if (location=="" && hotel_name=="" && Nationality=="") {
			tpj(".dest_err").css("color","red");
			tpj(".htl_err").css("color","red");
			tpj(".nat_err").css("color","red");
		} else if(Nationality=="") {
			tpj(".dest_err").css("color","white");
			tpj(".htl_err").css("color","white");
			tpj(".nat_err").css("color","red");
		} else if (check_in=="") {
			tpj(".chckin_err").css("color","red");
		} else if (check_out=="") {
			tpj(".chckout_err").css("color","red");
		} else if (adults=="") {
			tpj(".adults_err").css("color","red");
		// } else if (rate==undefined || rate=="") {
		// 	tpj(".rate_err").css("color","red");
		} else {
			var req = tpj("#hotel_search_form").serialize();
			FullLoading('start', location, altCheckIn, altCheckOut);
			window.location.href=base_url+'lists/index?'+req;
			// tpj("#hotel_search_form").submit();
		}

	});
	tpj(".ratingall").click(function() {
		if(!tpj(".ratingall").is(':checked')){
			tpj('.rating1').prop('checked', false);
			tpj('.rating2').prop('checked', false);
			tpj('.rating3').prop('checked', false);
			tpj('.rating4').prop('checked', false);
			tpj('.rating5').prop('checked', false);
		} else {
			tpj('.rating1').prop('checked', true);
			tpj('.rating2').prop('checked', true);
			tpj('.rating3').prop('checked', true);
			tpj('.rating4').prop('checked', true);
			tpj('.rating5').prop('checked', true);
		}
	}); 
	tpj(".rating2").click(function() { 
		if(tpj(".rating1").is(':checked') && tpj(".rating2").is(':checked') && tpj(".rating3").is(':checked') &&
		 tpj(".rating4").is(':checked') && tpj(".rating5").is(':checked')){
		 	tpj('.ratingall').prop('checked', true);
		} else {
		 	tpj('.ratingall').prop('checked', false);
		}
	});
	tpj(".rating3").click(function() { 
		if(tpj(".rating1").is(':checked') && tpj(".rating2").is(':checked') && tpj(".rating3").is(':checked') &&
		 tpj(".rating4").is(':checked') && tpj(".rating5").is(':checked')){
		 	tpj('.ratingall').prop('checked', true);
		} else {
		 	tpj('.ratingall').prop('checked', false);
		}
	});
	tpj(".rating4").click(function() { 
		if(tpj(".rating1").is(':checked') && tpj(".rating2").is(':checked') && tpj(".rating3").is(':checked') &&
		 tpj(".rating4").is(':checked') && tpj(".rating5").is(':checked')){
		 	tpj('.ratingall').prop('checked', true);
		} else {
		 	tpj('.ratingall').prop('checked', false);
		}
	});
	tpj(".rating5").click(function() { 
		if(tpj(".rating1").is(':checked') && tpj(".rating2").is(':checked') && tpj(".rating3").is(':checked') &&
		 tpj(".rating4").is(':checked') && tpj(".rating5").is(':checked')){
		 	tpj('.ratingall').prop('checked', true);
		} else {
		 	tpj('.ratingall').prop('checked', false);
		}
	});
	var xhrTimer;
	var theXRequest;

	/* Destination search key events start */
	tpj("#location").keydown(function(e) {
		if (e.keyCode == '38') {
	        if (tpj(".search-dropdown li").hasClass("focus-li")) {
	        	index = tpj(".search-dropdown").children('li.focus-li').index();
	        	tpj(".search-dropdown").children('li').eq(index).removeClass('focus-li');
	       		tpj(".search-dropdown").children('li').eq(index-1).addClass('focus-li');
	       		if (tpj(".search-dropdown").children('li').length == index-1) {
	       			tpj(".search-dropdown li:last-child").addClass('focus-li');
	       		}
	        } else {
	       		tpj(".search-dropdown li:last-child").addClass('focus-li');
	        }
	    }
	    else if (e.keyCode == '40') {
	        // down arrow
	        if (tpj(".search-dropdown li").hasClass("focus-li")) {
	        	index = tpj(".search-dropdown").children('li.focus-li').index();
	        	tpj(".search-dropdown").children('li').eq(index).removeClass('focus-li');
	       		tpj(".search-dropdown").children('li').eq(index+1).addClass('focus-li');
	       		if (tpj(".search-dropdown").children('li').length == index+1) {
	       			tpj(".search-dropdown li:first-child").addClass('focus-li');
	       		}
	        } else {
	       		tpj(".search-dropdown li:first-child").addClass('focus-li');
	        }
	    }
	    if (e.keyCode  == 13) {
	    	tpj(".focus-li a").trigger('click');
	    }
	});

	tpj("#location").bind('input',function(e) {
    	tpj('#DropdownCountry').slideUp('fast');
    	tpj('#citycode').val("");
      	tpj('#cityname').val("");
      	tpj('#countryname').val("");
		if (theXRequest) { theXRequest.abort(); }
		clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
	    xhrTimer = setTimeout(function () { // assign timer a new timeout 
        tpj('#DropdownCountry li').remove();
	        theXRequest = tpj.ajax({
	        	dataType: 'json',
		        type: 'post',
		        url: base_url+'welcome/GetCountryName?keyword='+tpj("#location").val(),
		        cache: false,
		        success: function (data) {
		        	tpj.each(data, function (key,value) {
		        		if (data.length >= 0)
		                    tpj('#DropdownCountry').append('<li  role="displayCountries" ><a CityCode="'+value.CityCode+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
		        			tpj('#DropdownCountry').show();
		                });
		        	tpj(".search-dropdown li:first-child").addClass('focus-li');

		        }
		        // ,
	         //   error: function (xhr,status,error) {
	         //     alert("Error: " + error);
	         //  }

	        });
	    }, 500); 
	});

	tpj('ul.txtcountry').on('click', 'li a', function () {
			// alert(tpj(this).attr('CityCode'));
		        tpj('#location').val(tpj(this).text());
		        tpj('#citycode').val(tpj(this).attr('CityCode'));
		        tpj('#cityname').val(tpj(this).attr('CityName'));
		        tpj('#countryname').val(tpj(this).attr('CountryName'));
		        tpj('#DropdownCountry').slideUp('fast');
       			tpj('#DropdownCountry li').remove();
    });

	
    tpj("#location").focusout(function () {
    	// tpj('#DropdownCountry').slideUp('fast');
		// tpj('#DropdownCountry li').remove();
        if (tpj("#citycode").val() === '') {
            tpj('#location').val('');
            tpj('#citycode').val();
	        tpj('#cityname').val();
	        tpj('#countryname').val();
        }
    });
	/* Destination search key events end */
});


function total_night_calc() {
		var total_nights = tpj("#nights").val();
		var check_in = tpj("#datepicker3").val();
		var check_out = tpj("#datepicker2").val();
		var myDate = new Date(check_in);
			myDate.setDate(myDate.getDate() + Number(total_nights));
			if (myDate.getMonth()+1 == "1") {
				month = "01";
			} else if (myDate.getMonth()+1 == "2") {
				month = "02";
			}  else if (myDate.getMonth()+1 == "3") {
				month = "03";
			}  else if (myDate.getMonth()+1 == "4") {
				month = "04";
			}  else if (myDate.getMonth()+1 == "5") {
				month = "05";
			}  else if (myDate.getMonth()+1 == "6") {
				month = "06";
			}  else if (myDate.getMonth()+1 == "7") {
				month = "07";
			} else if (myDate.getMonth()+1 == "8") {
				month = "08";
			} else if (myDate.getMonth()+1 == "9") {
				month = "09";
			}  else {
				month = myDate.getMonth()+1;
			} 

			if (myDate.getDate() == "1") {
				date = "01";
			} else if (myDate.getDate() == "2") {
				date = "02";
			}  else if (myDate.getDate() == "3") {
				date = "03";
			}  else if (myDate.getDate() == "4") {
				date = "04";
			}  else if (myDate.getDate() == "5") {
				date = "05";
			}  else if (myDate.getDate() == "6") {
				date = "06";
			}  else if (myDate.getDate() == "7") {
				date = "07";
			} else if (myDate.getDate() == "8") {
				date = "08";
			} else if (myDate.getDate() == "9") {
				date = "09";
			}  else {
				date = myDate.getDate();
			} 
		var date_format = month+"/"+date+"/"+myDate.getFullYear();
		tpj("#datepicker2").val(date_format);
		if (daydiff(parseDate(check_in), parseDate(date_format))>30) {
			alert("Checkout date should be within one month duration.");
			tpj("#datepicker2").val("");
		} else if(daydiff(parseDate(check_in), parseDate(check_out))>30) {
			alert("Checkout date should be within one month duration.");
			tpj("#datepicker2").val("");
		}
}
function total_night_calc1() {
	var total_nights = tpj("#nights").val();
	var check_in = tpj("#datepicker3").val();
	var check_out = tpj("#datepicker2").val();
	var total_date = daydiff(parseDate(check_in), parseDate(check_out));
	if (total_date<1) {
		alert("Checkout date should be within one month duration.");
		tpj("#datepicker2").val("");
		tpj("#alternate2").val("dd/mm/yy");
	} else if (total_date>31) {
		alert("Checkout date should be within one month duration.");
		tpj("#datepicker2").val("");
		tpj("#alternate2").val("dd/mm/yy");
	} else {
		tpj('#nights option').each(function() {
		    if(tpj(this).val() == total_date) {
		        tpj(this).prop("selected", true);
		    }
		});
		tpj(".night_custom_class span:last-child").text(total_date);
	}
}
function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function daydiff(first, second) {
    return Math.round((second-first)/(1000*60*60*24));
}
function roomsCheck() {
	tpj(".roomshide").addClass("hide");
	tpj(".roomadults").attr("disabled","disabled");
	tpj(".roomsChild").attr("disabled","disabled");
	var rooms = tpj("#Rooms").val();
	for ( i = 2; i <= rooms; i++) {
		tpj(".room"+i).removeClass("hide");
		tpj(".room"+i+"-adults").removeAttr("disabled");
		tpj(".room"+i+"-child").removeAttr("disabled");
	}
}

