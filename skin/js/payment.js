$(document).ready(function() {
  // var letters = /^[A-Za-z]+$/;
  var letters = /[A-Za-z]+$/;
    $('.validate').on('focusout',function(e) {
        $(this).val($.trim($(this).val()));
        if ($(this).val()=="") {
            $(this).removeClass('validated');
        } else {
            $(this).addClass('validated');
        }
    })
    $('.name-validate').on('focusout',function(e) {
        $(this).val($.trim($(this).val()));
        if ($(this).val()=="") {
            $(".traveller-validate").text('');
            $(this).removeClass('validated');
        } else {
            $(this).addClass('validated');
            if($(this).val().match(letters)) {
                if ($(this).val().length < 2) {
                    $(".traveller-validate").text('Minimum two letters should be used in First name and Last name!');
                } else {
                    $(".traveller-validate").text('');
                }
            } else {
                $(".traveller-validate").text('Please check alphabets only accepted in First name and Last name!');
            }
        }
    })
	$('#Continue_book').click(function () {
    var err = 0;
        var validate = $('.validate');
        $.each(validate,function() {
            if ($(this).val()=="" || $(this).val()==" ") {
                $(this).removeClass('validated');
                err += 1;
                $("#email").focus();
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            } else {
                $(this).addClass('validated');
            }
         })

        var namevalidate = $('.name-validate');

        $.each(namevalidate,function() {
            if ($(this).val()=="" || $(this).val()==" ") {
                $(this).removeClass('validated');
                err += 1;
                $("#email").focus();
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            } else {
                if($(this).val().match(letters)) {
                    if ($(this).val().length < 2) {
                        err += 1;
                        $(".traveller-validate").text('Minimum two letters should be used in First name and Last name!');
                    } else {
                        $(this).addClass('validated');
                    }
                } else {
                    err += 1;
                    $(".traveller-validate").text('Please check alphabets only accepted in First name and Last name!');
                    $("#email").focus();
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            }
         })

        cnt = 0;
        $.each($('.r-type--list'),function(){
            cnt += $(this).find('input[type="radio"]:checked').length;
        })
        if ($('.r-type--list').length==cnt) {
            $('.room-type-validate').addClass('validated');
        } else {
            $('.room-type-validate').removeClass('validated');
            err += 1;
        }

        if (err==0) {
            $("#payment_form").attr("action","payment/payment_booking");
            $("#payment_form").submit();
        }        
  	});
    $("#Confirm_book").click(function() {
      var type = $("input[name='paymenttype']:checked").val();
      if ($("#cancel_agree").is(':checked')) {
        if(typeof type=="undefined") {
            $(".pay_error").text("( Please select a payment option )*");
            $(".pay_error").css('color','red');
            $("#pay_options").focus();
        } else {
            $("#Confirm_book").attr('disabled');
            $("#payment_form").attr("action",base_url+"payment/payment_booking_confirm");
            $("#payment_form").submit();
        }
      } else {
        tooltip_fun("#cancel_agree");
      }
    });
     $('#room_rate_update').click(function () {
    var from_heigh1 = $("#from_high1").val();
    var from_heigh2 = $("#from_high2").val();
    var from_shoulder1 = $("#from_shoulder1").val();
    var from_shoulder2 = $("#from_shoulder2").val();
    var from_peak1 = $("#from_peak1").val();
    var from_peak2 = $("#from_peak2").val();
    var from_low = $("#from_low").val();
    var to_heigh1 = $("#to_high1").val();
    var to_heigh2 = $("#to_high2").val();
    var to_shoulder1 = $("#to_shoulder1").val();
    var to_shoulder2 = $("#to_shoulder2").val();
    var to_peak1 = $("#to_peak1").val();
    var to_peak2 = $("#to_peak2").val();
    var to_low = $("#to_low").val();
    if(from_heigh1!="" && to_heigh1=="")
    {
      $(".rate_error").text("Season 1 To Date field is required!");
      $("#to_high1").focus();
    } 
    else if (to_heigh1!="" && from_heigh1=="") 
    {
      $(".rate_error").text("Season 1 From Date field is required!");
      $("#from_high1").focus();
    }
    else if(from_shoulder1!="" && to_shoulder1=="")
    {
      $(".rate_error").text("Season 2 To Date field is required!");
      $("#to_shoulder1").focus();
    } 
    else if(to_shoulder1!="" && from_shoulder1=="") 
    {
      $(".rate_error").text("Season 2 From Date field is required!");
      $("#from_shoulder1").focus();
    }
     else if(from_peak1!="" && to_peak1=="")
    {
       $(".rate_error").text("Season 3 To Date field is required!");
      $("#to_peak1").focus();
    }
    else if (to_peak1!="" && from_peak1=="") {
      $(".rate_error").text("Season 3 From Date field is required!");
      $("#from_peak1").focus();
    }
     else if(from_low!="" && to_low=="")
    {
      $(".rate_error").text("Season 7 To Date field is required!");
      $("#to_low").focus();
    }
    else if (to_low!="" && from_low=="")
     {
      $(".rate_error").text("Season 7 From Date field is required!");
      $("#from_low").focus();
    }
    else if(from_heigh2!="" && to_heigh2=="")
    {
      $(".rate_error").text("Season 6 To Date field is required!");
      $("#to_height2").focus();
    }
    else if (to_heigh2!="" && from_heigh2=="") 
    {
      $(".rate_error").text("Season 6 From Date field is required!");
      $("#from_height2").focus();
    }
    else if(from_shoulder2!="" && to_shoulder2=="")
    {
      $(".rate_error").text("Season 5 To Date field is required!");
      $("#to_shoulder2").focus();
    }
    else if (to_shoulder2!="" && from_shoulder2=="") 
    {
      $(".rate_error").text("Season 5 From Date field is required!");
      $("#from_shoulder2").focus();
    }
    else if(from_peak2!="" && to_peak2=="")
    {
       $(".rate_error").text("Season 4 To Date field is required!");
       $("#to_peak2").focus();
    }
    else if (to_peak2!="" && from_peak2=="") {
      $(".rate_error").text("Season 4 To Date field is required!");
      $("#from_peak2").focus();
    }
     else
      {
      $("#hotel_excel_form").submit();
     }
    });

     
     $('#room_minimum_stay_update').click(function () { 
    var from1 = $("#from1").val();
    var from2 = $("#from2").val();
    var from3 = $("#from3").val();
    var from4 = $("#from4").val();
    var from5 = $("#from5").val();
    var from6 = $("#from6").val();
    var to1   = $("#to1").val();
    var to2   = $("#to2").val();
    var to3   = $("#to3").val();
    var to4   = $("#to4").val();
    var to5   = $("#to5").val();
    var to6   = $("#to6").val();
    var close_from1   = $("#close_from1").val();
    var close_from2   = $("#close_from2").val();
    var close_from3   = $("#close_from3").val();
    var close_from4   = $("#close_from4").val();
    var close_from5   = $("#close_from5").val();
    var close_from6   = $("#close_from6").val();
    var close_to1  = $("#close_to1").val();
    var close_to2   = $("#close_to2").val();
    var close_to3  = $("#close_to3").val();
    var close_to4   = $("#close_to4").val();
    var close_to5  = $("#close_to5").val();
    var close_to6   = $("#close_to6").val();
  if(from1!="" && to1=="")
    {
      $(".min_stay_error").text("event1 To Date field is required!");
      $("#to1").focus();
    } 
    else if(to1!="" && from1=="") 
    {
      $(".min_stay_error").text("event1 From Date field is required!");
      $("#from1").focus();
    }
    else if(from2!="" && to2=="")
    {
      $(".min_stay_error").text("event2 To Date field is required!");
      $("#to2").focus();
    } 
    else if (to2!="" && from2=="") 
    {
      $(".min_stay_error").text("event2 From Date field is required!");
      $("#from2").focus();
    }
   else if(from3!="" && to3=="")
    {
      $(".min_stay_error").text("event3 To Date field is required!");
      $("#to3").focus();
    } 
    else if(to3!="" && from3=="") 
    {
      $(".min_stay_error").text("event3 From Date field is required!");
      $("#from3").focus();
    }
     else if(from4!="" && to4=="")
    {
      $(".min_stay_error").text("event4 To Date field is required!");
      $("#to4").focus();
    } 
    else if(to4!="" && from4=="") 
    {
      $(".min_stay_error").text("event4 From Date field is required!");
      $("#from4").focus();
    }
    else if(from5!="" && to5=="")
    {
      $(".min_stay_error").text("event5 To Date field is required!");
      $("#to5").focus();
    } 
    else if(to5!="" && from5=="") 
    {
      $(".min_stay_error").text("event5 From Date field is required!");
      $("#from5").focus();
    }
    else if(from6!="" && to6=="")
    {
      $(".min_stay_error").text("event6 To Date field is required!");
      $("#to6").focus();
    } 
    else if(to6!="" && from6=="") 
    {
      $(".min_stay_error").text("event6 From Date field is required!");
      $("#from6").focus();
    }
    else if(close_from1!="" && close_to1=="")
    {
      $(".min_stay_error").text("Close Period event1 To Date field is required!");
      $("#close_to1").focus();
    } 
    else if(close_to1!="" && close_from1=="") 
    {
      $(".min_stay_error").text("Close Period event1 From Date field is required!");
      $("#close_from1").focus();
    }
    else if(close_from2!="" && close_to2=="")
    {
      $(".min_stay_error").text("Close Period event2 To Date field is required!");
      $("#close_to2").focus();
    } 
    else if(close_to2!="" && close_from2=="") 
    {
      $(".min_stay_error").text("Close Period event2 From Date field is required!");
      $("#close_from2").focus();
    }
    else if(close_from3!="" && close_to3=="")
    {
      $(".min_stay_error").text("Close Period event3 To Date field is required!");
      $("#close_to3").focus();
    } 
    else if(close_to3!="" && close_from3=="") 
    {
      $(".min_stay_error").text("Close Period event3 From Date field is required!");
      $("#close_from3").focus();
    }
    else if(close_from4!="" && close_to4=="")
    {
      $(".min_stay_error").text("Close Period event4 To Date field is required!");
      $("#close_to4").focus();
    } 
    else if(close_to4!="" && close_from4=="") 
    {
      $(".min_stay_error").text("Close Period event4 From Date field is required!");
      $("#close_from4").focus();
    }
    else if(close_from5!="" && close_to5=="")
    {
      $(".min_stay_error").text("Close Period event5 To Date field is required!");
      $("#close_to5").focus();
    } 
    else if(close_to5!="" && close_from5=="") 
    {
      $(".min_stay_error").text("Close Period event5 From Date field is required!");
      $("#close_from5").focus();
    }
    else if(close_from6!="" && close_to6=="")
    {
      $(".min_stay_error").text("Close Period event6 To Date field is required!");
      $("#close_to6").focus();
    } 
    else if(close_to6!="" && close_from6=="") 
    {
      $(".min_stay_error").text("Close Period event6 From Date field is required!");
      $("#close_from6").focus();
    }
    else
      {
      $("#hotel_minimum_stay_form").submit();
     }
 });
}); 
	
 function tooltip_fun(id) {
    $(id).attr({"title":"required !","data-toggle":"tooltip"});
    $(id).tooltip();
    $(id).focus().setTimeout(alertFunc(), 3000);
 }
function alertFunc() {
    
}
var objQueryString={};
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
function aditionalfoodRequest(key,value) {
  //Get query string value
  var searchUrl=location.search;
  if(searchUrl.indexOf("?")== "-1") {
    var urlValue='?'+key+'='+value;
    history.pushState({state:1, rand: Math.random()}, '', urlValue);
  }
  else {
    //Check for key in query string, if not present
    // if(searchUrl.indexOf(key)== "-1") {
      var urlValue=searchUrl+'&'+key+'='+value;
    // }
    // else {  //If key present in query string
    //   oldValue = getParameterByName(key);
    //   // if(searchUrl.indexOf("?"+key+"=")!= "-1") {
    //   //   urlValue = searchUrl.replace('?'+key+'='+oldValue,'?'+key+'='+value);
    //   // }
    //   // else {
    //     urlValue = searchUrl.replace('&'+key+'='+oldValue,'&'+key+'='+value); 
    //   // }
    // }
    history.pushState({state:1, rand: Math.random()}, '', urlValue);
    //history.pushState function is used to add history state.
    //It takes three parameters: a state object, a title (which is currently ignored), and (optionally) a URL.
  }
  objQueryString.key=value;
  sendAjaxReq();
}
function sendAjaxReq(objQueryString) {
  // $.post('test.php', objQueryString, function(data) {
    window.location.reload(true);
  // })
}
//Function used to remove querystring
function aditionalfoodromoveRequest(key,name) {
  var urlValue=document.location.href;
  
  //Get query string value
  var searchUrl=location.search;
  
  if(key!="") {
    // oldValue = getParameterByName(key);
    removeVal=key+"="+name;

    if(searchUrl.indexOf('?'+removeVal+'&')!= "-1") {
      urlValue=urlValue.replace('?'+removeVal+'&','?');
    }
    else if(searchUrl.indexOf('&'+removeVal+'&')!= "-1") {
      urlValue=urlValue.replace('&'+removeVal+'&','&');
    }
    else if(searchUrl.indexOf('?'+removeVal)!= "-1") {
      urlValue=urlValue.replace('?'+removeVal,'');
    }
    else if(searchUrl.indexOf('&'+removeVal)!= "-1") {
      urlValue=urlValue.replace('&'+removeVal,'');
    }
  }
  else {
    var searchUrl=location.search;
    urlValue=urlValue.replace(searchUrl,'');
  }
  history.pushState({state:1, rand: Math.random()}, '', urlValue);
  sendAjaxReq();
}
function aditionalfoodRequest1(prm,req) {
    request = $("#payment_form").serialize();
    $('#boardAllocation').modal({
        backdrop: 'static',
        keyboard: false
    })
    $("#boardAllocation").load(base_url+'payment/boardAllocation?board='+req+'&'+request);
  // alert(prm);
  // alert(req);
}
function supplementformSubmitfn() {
  $.ajax({
    dataType: 'json',
    type: 'post',
    url: base_url+'payment/supplementFormSubmit',
    data: $('#supplementForm').serialize(),
    cache: false,
    success: function (respose) {
      reloadRequestCatchfun();
      window.location.reload(true);
    }
  });
}
function reloadRequestCatchfun() {
  $.ajax({
    dataType: 'json',
    type: 'post',
    url: base_url+'payment/reloadRequestCatchfun',
    data: $('#payment_form').serialize(),
    cache: false,
    success: function (respose) {
    }
  });
}
function supplementFormcheck() {
  // $("#supplementForm").submit();
  // console.log($('#supplementForm').serialize());
  $.ajax({
    dataType: 'json',
    type: 'get',
    async: true,
    url: base_url+'payment/supplementFormcheck',
    data: $('#supplementForm').serialize(),
    cache: false,
    success: function (response) {
      supplementFormFill(response);
    }
  });
}
function supplementFormFill(value) {
  // alert(value['adult']);
  $.each(value['adult'], function(i, v) {
    $('.'+i).text(v);
  })
  $.each(value['child'], function(j, v1) {
    $('.'+j).text(v1);
  })
  $('.TotalAmount').text(value['totAmount']);
  if (value['totAmount']==0) {
    $("#Submitbtn").attr('disabled')
  } else {
    $("#Submitbtn").attr('disabled')
  }
  var checkboxCheck = $('#supplementForm .person:checked').length;
  var checkboxCheck1 = $('#supplementForm .dateAvail:checked').length;
  if (checkboxCheck == 0 || checkboxCheck1 == 0) {
    $("#Submitbtn").attr('disabled','disabled');
  } else {
    $("#Submitbtn").removeAttr('disabled','disabled');
  }
}
function aditionalfoodRemoveRequest1(prm,req) {
  $.ajax({
    dataType: 'json',
    type: 'post',
    url: base_url+'payment/supplementFormRemove?board='+req,
    cache: false,
    success: function (respose) {
      window.location.reload(true);
    }
  });
}

