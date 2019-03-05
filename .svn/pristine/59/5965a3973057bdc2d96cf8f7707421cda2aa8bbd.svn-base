$(document).ready(function() {
	tpj("#tour_search_btn").click(function() {
		var location = tpj("#location").val();
		var Nationality = tpj("#Nationality").val();
		if (location=="" && Nationality=="") {
			tpj(".dest_err").css("color","red");
			tpj(".nat_err").css("color","red");
		} else if(Nationality=="") {
			tpj(".dest_err").css("color","white");
			tpj(".nat_err").css("color","red");
		} else {
			tpj("#tour_search_form").submit();
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
    	tpj('#cityId').val("");
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
		                    tpj('#DropdownCountry').append('<li  role="displayCountries" ><a cityId="'+value.cityid+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
		        			tpj('#DropdownCountry').show();
		                });
		        	tpj(".search-dropdown li:first-child").addClass('focus-li');

		        }
		    });
	    }, 500); 
	});

	tpj('ul.txtcountry').on('click', 'li a', function () {
			// alert(tpj(this).attr('CityCode'));
		        tpj('#location').val(tpj(this).text());
		        tpj('#cityId').val(tpj(this).attr('cityId'));
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
