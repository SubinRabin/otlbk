$("#add_reference_entry_button").click(function() {
    var ref_id        = $("#ref_id").val();
    var book_id       = $("#book_id").val();
    var agent_id      = $("#agent_id").val();
    var validateDate  = $("#validateDate").val();
    var hotel_id      = $("#hotel_id").val();
    var total_amount  = $("#total_amount").val();
    var agent_markup  = $("#agent_markup").val();
    var admin_markup  = $("#admin_markup").val();
    var normal_price  = $("#normal_price").val();
    // if(validateDate=="false") {
    //           addToast("Booking cannot accepted because check In date has expired!","red");
    // } else if (ref_id=="") {
    //           addToast("Reference Id is required !","orange");
    // } else {
    //           $.ajax({
    //           type: 'post',
    //           url: base_url+'backend/booking/reference_id_checking?refe_id='+ref_id,
    //           dataType: 'json',
    //           cache: false,
    //           data: $('#add_reference_entry_form').serialize(),
    //           success: function (response) {
    //               if (response=="") {
    //                     addToast("Accepted Successfully","green");
    //                     $('#add_reference_entry_form').attr("action",base_url+'backend/booking/addreference_id?id='+book_id+'&agent_id='+agent_id+'&total_amount='+total_amount+'&hotel_id='+hotel_id+'&agent_markup='+agent_markup+'&normal_price='+normal_price+'&admin_markup='+admin_markup);
    //                     $('#add_reference_entry_form').submit();
    //               }
    //               else{
    //                     addToast("Reference Id is Already exists !","red");
    //               }
    //           }
    //       });
    //   }
    $.ajax({
              type: 'post',
              url: base_url+'backend/booking/hotel_portel_admin_permission?id='+book_id+'&agent_id='+agent_id+'&total_amount='+total_amount+'&hotel_id='+hotel_id+'&agent_markup='+agent_markup+'&normal_price='+normal_price+'&admin_markup='+admin_markup,
              dataType: 'json',
              cache: false,
              data: $('#add_reference_entry_form').serialize(),
              success: function (response) {
                    addToast("Accepted Successfully","green");
                    $(".close").trigger("click");
                    $(".Pending").trigger("click");
                    var hotel_booking_table = $('#hotel_booking_table').dataTable({
                        "bDestroy": true,
                        "ajax": {
                            url : base_url+'/backend/booking/hotel_booking_list',
                            type : 'GET'
                        },
                    "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                    }
                  }); 
                  
              }
          });
    // $('#add_reference_entry_form').attr("action",);
    // $('#add_reference_entry_form').submit();
  });

