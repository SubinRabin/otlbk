$(document).ready(function() {
    var cssRule =
    "color: red;" +
    "font-size: 60px;" +
    "font-weight: bold;" +
    "text-shadow: 1px 1px 5px rgb(249, 162, 34);" +
    "filter: dropshadow(color=rgb(249, 162, 34), offx=1, offy=1);";
    var cssRule1 =
    "color: rgb(249, 162, 34);" +
    "font-size: 30px;" +
    "font-weight: bold;" +
    "text-shadow: 1px 1px 5px rgb(249, 162, 34);" +
    "filter: dropshadow(color=rgb(249, 162, 34), offx=1, offy=1);";
    console.log("%cWarning!", cssRule);
    console.log("%cPlease ", cssRule1);


    // document.oncontextmenu = function() {return false;};
    //   $(document).mousedown(function(e){ 
    //     if( e.button == 2 ) { 
    //       return false; 
    //     } 
    //     return true; 
    //   }); 
    //  $(document).keydown(function (event) {
    //     if (event.keyCode == 123) {
    //         return false;
    //     } else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
    //         return false;
    //     }
    // });


    var myTimer = setInterval(notify_alert, 300000);
    var myTimer1 = setInterval(notify_list, 300000);
    // var myTimer2 = setInterval(currency_auto_update, 50000);
    // currency_auto_update();
    notify_list();
    // currency_auto_update();
    "use strict";

    //LEFT MOBILE MENU OPEN
    $(".atab-menu").on('click', function() {
        $(".sb2-1").css("left", "0");
        $(".btn-close-menu").css("display", "inline-block");
    });

    //LEFT MOBILE MENU CLOSE
    $(".btn-close-menu").on('click', function() {
        $(".sb2-1").css("left", "-350px");
        $(".btn-close-menu").css("display", "none");
    });

    //MATERIAL SELECT BOX
    $('select').material_select();

    //MATERIAL COLLAPSIBLE
    $('.collapsible').collapsible();

    //MATERIAL CHIP COMMON
    $('.chips').material_chip();
    $('.chips-initial').material_chip({
        data: [{
            tag: 'Apple',
        }, {
            tag: 'Microsoft',
        }, {
            tag: 'Google',
        }],
    });
    var tag_val = [];
    var tag_val1=[];
    
    // var aminities_str =  $("#room_aminities").val();
    if ($("#keywords").val()==undefined) {
        var keyword_str= "";
    } else {
        var keyword_str= $("#keywords").val();
    }

    // var res = aminities_str.split("close");
   

    var res1= keyword_str.split("close"); 

    // $.each(res, function(i, v) {
    //     if (v!="") 
    //     {
    //        var obj = { tag: v };
    //         tag_val.push(obj);
    //     }

    //  });
    $.each(res1, function(x, y) {
        if (y!="") 
        {
           var obj1 = { tag: y };
            tag_val1.push(obj1);
        }
     });
    //MATERIAL CHIP PLACEHOLDER
    $('#chip1').material_chip({
        placeholder: '+Room Aminities (press enter)',
        secondaryPlaceholder: '+Room Aminities (press enter)',
        data: tag_val,
    });
    // $('.chips2').material_chip();
    $('.chips-initial').material_chip({
        data: [{
            tag: 'Apple',
        }, {
            tag: 'Microsoft',
        }, {
            tag: 'Google',
        }],
    });
    $('#chip2').material_chip({
    placeholder: '+Search keywords (press enter)',
    secondaryPlaceholder: '+Search keywords (press enter)',
    data: tag_val1,
    });

    //MATERIAL CHIP AUTO-COMPLETE
    $('.chips-autocomplete').material_chip({
        autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null
            },
            limit: Infinity,
            minLength: 1
        }
    });
    var url = window.location.href;
    var menu = url.substr(url.lastIndexOf('/') + 1);
    if (menu == "dashboard") {
        $(".dashboard_menu").addClass('menu-active');
    } else if(menu == "users") { 
        $(".main_user").addClass('active');
        $(".main_user .collapsible-header ").addClass('active');
        $(".main_user .left-sub-menu").css('display','block');
        $(".users_menu").addClass('menu-active');
    } else if (menu == "new_user") {
        $(".main_user").addClass('active');
        $(".main_user .collapsible-header").addClass('active');
        $(".main_user .left-sub-menu").css('display','block');
        $(".new_user_menu").addClass('menu-active');
    } else if (menu == "agents") {
        $(".main_agents").addClass('active');
        $(".main_agents .collapsible-header").addClass('active');
        $(".main_agents .left-sub-menu").css('display','block');
        $(".agents_menu").addClass('menu-active');
    } else if (menu == "new_agent") {
        $(".main_agents").addClass('active');
        $(".main_agents .collapsible-header").addClass('active');
        $(".main_agents .left-sub-menu").css('display','block');
        $(".new_agents_menu").addClass('menu-active');
    } else if (menu.slice(0,9) == "new_agent") {
        $(".main_agents").addClass('active');
        $(".main_agents .collapsible-header").addClass('active');
        $(".main_agents .left-sub-menu").css('display','block');
        $(".new_agents_menu").addClass('menu-active');
    } else if (menu == "hotels") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".hotels_menu").addClass('menu-active');
    } else if (menu == "new_hotel") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".new_hotels_menu").addClass('menu-active');
    } else if (menu == "room_type") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_type_menu").addClass('menu-active');
    } else if (menu == "new_room_type") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_type_menu").addClass('menu-active');
    } else if (menu.slice(0,13) == "new_room_type") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_type_menu").addClass('menu-active');
    } else if (menu == "hotel_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".hotel_facilities_menu").addClass('menu-active');
    } else if (menu == "new_hotel_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".hotel_facilities_menu").addClass('menu-active');
    } else if (menu.slice(0,20) == "new_hotel_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".hotel_facilities_menu").addClass('menu-active');
    } else if (menu == "room_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_facilities_menu").addClass('menu-active');
    } else if (menu == "new_room_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_facilities_menu").addClass('menu-active');
    } else if (menu.slice(0,19) == "new_room_facilities") {
        $(".main_hotels").addClass('active');
        $(".main_hotels .collapsible-header").addClass('active');
        $(".main_hotels .left-sub-menu").css('display','block');
        $(".room_facilities_menu").addClass('menu-active');
    }
});
function deletepopupfun(action,id) {
    $("#delete_id").val(id);
    $("#delete_form").attr("action",action);
   $('#myModal').modal();
}
function deletepopupfundel(action,id) {
    $(".delete_id").val(id);
    $("#delete_formhotel").attr("action",action);
   $('#myModalban').modal();
}
function close_delete_modal() {
   $('.close').trigger('click');
}
function notify_alert() {
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/notify_alert',
      cache: false,
      success: function (response) {
        $.each(response.msg_type,function(i,v) {
            if (v!="") {
                notification_remove(response.notifi_id[i],response.user_id[i]); 
                notifyToast(v,"black-trans");
                
            }
        });
      },        
    });
}
function notification_remove(id,user_id) {
//     alert(id);
//     alert(user_id);
    $.ajax({
        dataType: 'json',
        type:'post',
        url : base_url+'backend/dashboard/notify_remove?id='+id+'&user_id='+user_id,
        cache : false,
        success: function(response){

        }
    });
}
function notify_list() {
    $.ajax({
      type: 'post',
      url: base_url+'backend/dashboard/notify_list',
      cache: false,
      success: function (response) {
        $(".notify_dropdown").html(response);
      },        
    });
}
function notify_list_remove(type,id,url) {
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/notify_list_remove?type='+type+'&id='+id,
      cache: false,
      success: function (response) {
        window.location = url;
      },        
    });
}
function currency_auto_update() {
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'backend/dashboard/currency_auto_update',
      cache: false,
      success: function (response) {
      },        
    });
}
function numberonly(e) {
  e=(window.event) ? event : e;
  return (/[0-9]/.test(String.fromCharCode(e.keyCode))); 
}
function close_chatrequest_modal() {
   $('.close').trigger('click');
}