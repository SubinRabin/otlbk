$(document).ready(function(){
	favourite_dropdown();
});
function favourite_dropdown() {
  $.ajax({    
      type: 'post',
      url: base_url+'dashboard/favourite_dropdown',
      cache: false,
      success: function (response) {
        // alert(response);
        $(".favourite_dropdown").html(response);
      }        
    });
}
function currency_change(type){
   $.ajax({    
      type: 'post',
      url: base_url+'login/sessions_reset?type='+type,
      cache: false,
      success: function (response) {
        document.location.reload(true);
        // window.location.href=window.location.href;
      }        
    });
}

