$(document).ready(function() {
    var letters = /^[A-Za-z]+$/;
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
                if ($(this).val().length < 3) {
                    $(".traveller-validate").text('Minimum three letters should be used in First name and Last name!');
                } else {
                    $(".traveller-validate").text('');
                }
            } else {
                $(".traveller-validate").text('Please check alphabets only accepted in First name and Last name!');
            }
        }
    })
	$('#Continue_book_xml').click(function () {
        var err = 0;
        var validate = $('.validate');
        $.each(validate,function() {
            if ($(this).val()=="" || $(this).val()==" ") {
                $(this).removeClass('validated');
                err += 1;
                $("#email").focus();
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
            } else {
                if($(this).val().match(letters)) {
                    if ($(this).val().length < 3) {
                        err += 1;
                        $(".traveller-validate").text('Minimum three letters should be used in First name and Last name!');
                    } else {
                        $(this).addClass('validated');
                    }
                } else {
                    err += 1;
                    $(".traveller-validate").text('Please check alphabets only accepted in First name and Last name!');
                    $("#email").focus();
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
            $("#xml_payment_form").attr("action",base_url+"payment/xml_payment_booking");
            $("#xml_payment_form").submit();
        }        
	});
    $("#Confirm_xml_book").click(function() {
        var type = $("input[name='paymenttype']:checked").val();
        if ($("#cancel_agree").is(':checked')==false) {
             tooltip_fun("#cancel_agree");
        } else if(typeof type=="undefined") {
          $(".pay_error").text("( Please select a payment option )*");
          $(".pay_error").css('color','red');
          $("#pay_options").focus();
        } else {
           $("#Confirm_xml_book").attr('disabled');
           $("#xml_payment_form").attr("action",base_url+"payment/xml_payment_booking_confirm");
           $("#xml_payment_form").submit();
        }
    }); 


    $("#Guest_Submitbtn").click(function() {
        RoomsCNt = $(".RoomsCNt").length;
        
        var InputArray = [];
        var TrArray = [];
        var er_count = 0;

        for (x = 0; x < RoomsCNt; x++) {
            first_name_length= $(".Room-"+(x+1)+"Adultfirst_name").length;
            Child_first_name_length= $(".Room-"+(x+1)+"Child_first_name").length;
            for (i = 0; i < first_name_length; i++) {
                if ($(".Room-"+(x+1)+"Adulttitle").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Adulttitle").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Adulttitle").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'Adulttitle[]" value="'+$(".Room-"+(x+1)+"Adulttitle").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Adultfirst_name").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Adultfirst_name").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Adultfirst_name").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'AdultFirstName[]" value="'+$(".Room-"+(x+1)+"Adultfirst_name").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Adultlast_name").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Adultlast_name").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Adultlast_name").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'AdultLastName[]" value="'+$(".Room-"+(x+1)+"Adultlast_name").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Adultage").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Adultage").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Adultage").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'AdultAge[]" value="'+$(".Room-"+(x+1)+"Adultage").eq(i).val()+'" />');
                }

                TrArray.push('<tr><td>Room '+(x+1)+'</td><td>'+(i+1)+'</td><td>'+$(".Room-"+(x+1)+"Adulttitle").eq(i).val()+'.'+$(".Room-"+(x+1)+"Adultfirst_name").eq(i).val()+' '+
                    $(".Room-"+(x+1)+"Adultlast_name").eq(i).val()+'</td><td>'+$(".Room-"+(x+1)+"Adultage").eq(i).val()+'</td></tr>');

            }

            for (i = 0; i < Child_first_name_length; i++) {
                if ($(".Room-"+(x+1)+"Child_title").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Child_title").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Child_title").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'ChildTitle[]" value="'+$(".Room-"+(x+1)+"Child_title").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Child_first_name").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Child_first_name").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Child_first_name").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'ChildFirstName[]" value="'+$(".Room-"+(x+1)+"Child_first_name").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Child_last_name").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Child_last_name").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Child_last_name").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'ChildLastName[]" value="'+$(".Room-"+(x+1)+"Child_last_name").eq(i).val()+'" />');
                }

                if ($(".Room-"+(x+1)+"Child_age").eq(i).val()=="") {
                    $(".Room-"+(x+1)+"Child_age").eq(i).css('border','1px solid red');
                    er_count += 1;
                } else {
                    $(".Room-"+(x+1)+"Child_age").eq(i).css('border','2px solid #ebebeb');
                    InputArray.push('<input type="hidden" name="Room'+(x+1)+'ChildAge[]" value="'+$(".Room-"+(x+1)+"Child_age").eq(i).val()+'" />');
                }
            }
        }
       
        if (er_count==0) {
            $("#er_count").val(er_count);
            $(".guesttbody").html(TrArray);
            $(".guestRequest").html(InputArray);
            $(".close-modal-btn").trigger('click');
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


