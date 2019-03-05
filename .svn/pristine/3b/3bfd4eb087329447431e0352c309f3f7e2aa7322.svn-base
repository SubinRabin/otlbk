$(document).ready(function() {
  var xhrTimer;
  var theXRequest;
  /* Destination search key events start */
  $("#location").keydown(function(e) {
    if (e.keyCode == '38') {
          if ($(".search-dropdown li").hasClass("focus-li")) {
            index = $(".search-dropdown").children('li.focus-li').index();
            $(".search-dropdown").children('li').eq(index).removeClass('focus-li');
            $(".search-dropdown").children('li').eq(index-1).addClass('focus-li');
            if ($(".search-dropdown").children('li').length == index-1) {
              $(".search-dropdown li:last-child").addClass('focus-li');
            }
          } else {
            $(".search-dropdown li:last-child").addClass('focus-li');
          }
      }
      else if (e.keyCode == '40') {
          // down arrow
          if ($(".search-dropdown li").hasClass("focus-li")) {
            index = $(".search-dropdown").children('li.focus-li').index();
            $(".search-dropdown").children('li').eq(index).removeClass('focus-li');
            $(".search-dropdown").children('li').eq(index+1).addClass('focus-li');
            if ($(".search-dropdown").children('li').length == index+1) {
              $(".search-dropdown li:first-child").addClass('focus-li');
            }
          } else {
            $(".search-dropdown li:first-child").addClass('focus-li');
          }
      }
      if (e.keyCode  == 13) {
        $(".focus-li a").trigger('click');
      }
  });

  $("#location").bind('input',function(e) {
      $('#DropdownCountry').slideUp('fast');
      $('.citycode').val("");
      $('.cityid').val("");
      $('.cityname').val("");
      $('.countryname').val("");
    if (theXRequest) { theXRequest.abort(); }
    clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
      xhrTimer = setTimeout(function () { // assign timer a new timeout 
        $('#DropdownCountry li').remove();
          theXRequest = $.ajax({
            dataType: 'json',
            type: 'post',
            url: base_url+'welcome/GetCountryName?keyword='+$("#location").val(),
            cache: false,
            async: true,
            success: function (data) {
              $.each(data, function (key,value) {
                if (data.length >= 0)
                 $('#DropdownCountry').append('<li  role="displayCountries" ><a CityId="'+value.cityid+'" CityCode="'+value.CityCode+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
                    });
                $('#DropdownCountry').show();

            }

          });
      }, 500); 
  });

  $('ul.txtcountry').on('click', 'li a', function () {
      // alert(tpj(this).attr('CityCode'));
            $('#location').val($(this).text());
            $('.citycode').val($(this).attr('CityCode'));
            $('.cityid').val($(this).attr('CityId'));
            $('.cityname').val($(this).attr('CityName'));
            $('.countryname').val($(this).attr('CountryName'));
            $('#DropdownCountry').slideUp('fast');
            $('#DropdownCountry li').remove();
  });
  $("#location").focusout(function () {
    // $('#DropdownCountry').slideUp('fast');
    if ($(".citycode").val() === '') {
      $('#location').val('');
      $('.citycode').val('');
      $('.cityid').val('');
      $('.cityname').val('');
      $('.countryname').val();
    }
  });
  $("#returnlocation").keydown(function(e) {
    if (e.keyCode == '38') {
        if ($(".returnsearch-dropdown li").hasClass("focus-li")) {
          index = $(".returnsearch-dropdown").children('li.focus-li').index();
          $(".returnsearch-dropdown").children('li').eq(index).removeClass('focus-li');
          $(".returnsearch-dropdown").children('li').eq(index-1).addClass('focus-li');
          if ($(".returnsearch-dropdown").children('li').length == index-1) {
            $(".returnsearch-dropdown li:last-child").addClass('focus-li');
          }
        } else {
          $(".returnsearch-dropdown li:last-child").addClass('focus-li');
        }
    }
    else if (e.keyCode == '40') {
        // down arrow
        if ($(".returnsearch-dropdown li").hasClass("focus-li")) {
          index = $(".returnsearch-dropdown").children('li.focus-li').index();
          $(".returnsearch-dropdown").children('li').eq(index).removeClass('focus-li');
          $(".returnsearch-dropdown").children('li').eq(index+1).addClass('focus-li');
          if ($(".returnsearch-dropdown").children('li').length == index+1) {
            $(".returnsearch-dropdown li:first-child").addClass('focus-li');
          }
        } else {
          $(".returnsearch-dropdown li:first-child").addClass('focus-li');
        }
    }
    if (e.keyCode  == 13) {
      $(".focus-li a").trigger('click');
    }
  });
  $("#returnlocation").bind('input',function(e) {
      $('#returnDropdownCountry').slideUp('fast');
      $('.returncitycode').val("");
      $('.returncityname').val("");
      $('.returncountryname').val("");
    if (theXRequest) { theXRequest.abort(); }
    clearTimeout(xhrTimer); // Clear the timer so we don't end up with dupes.
      xhrTimer = setTimeout(function () { // assign timer a new timeout 
        $('#returnDropdownCountry li').remove();
          theXRequest = $.ajax({
            dataType: 'json',
            type: 'post',
            url: base_url+'welcome/GetCountryName?keyword='+$("#returnlocation").val(),
            cache: false,
            async: true,
            success: function (data) {
              $.each(data, function (key,value) {
                if (data.length >= 0)
                 $('#returnDropdownCountry').append('<li  role="displayCountries" ><a CityCode="'+value.CityCode+'" CountryName="'+value.CountryName+'" CityName="'+value.CityName+'" role="menuitem dropdownCountryli"  class="dropdownlivalue"><i class="fa fa-map-marker"></i>' + value.CityName + ',<span> ' + value.CountryName + '</span></a></li>');
                    });
                $('#returnDropdownCountry').show();
            }
          });
      }, 500); 
  });
  $('ul.returntxtcountry').on('click', 'li a', function () {
      // alert(tpj(this).attr('CityCode'));
            $('#returnlocation').val($(this).text());
            $('.returncitycode').val($(this).attr('CityCode'));
            $('.returncityname').val($(this).attr('CityName'));
            $('.returncountryname').val($(this).attr('CountryName'));
            $('#returnDropdownCountry').slideUp('fast');
            $('#returnDropdownCountry li').remove();
  });
  $("#returnlocation").focusout(function () {
    // $('#DropdownCountry').slideUp('fast');
    if ($(".returncitycode").val() === '') {
        $('#returnlocation').val('');
        $('.returncitycode').val('');
      $('.returncityname').val('');
      $('.returncountryname').val();
    }
  });
});