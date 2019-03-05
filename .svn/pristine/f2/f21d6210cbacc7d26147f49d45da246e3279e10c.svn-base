 $('#add_requests_submit_button').click(function (e) {
        e.preventDefault();
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'backend/offlinerequest/requests_validation',
          data: $('#add_requests_form').serialize(),
          cache: false,
          success: function (response) {
            // alert("data");
            if (response.status == "1") {
              addToast(response.error,response.color);
              window.setTimeout(function(){
                 $("#add_requests_form").submit();
              }, 1500);
            }
             else {
              addToast(response.error,response.color);
            }
          },
           error: function (xhr,status,error) {
             alert("Error: " + error);
          }
        });
    });