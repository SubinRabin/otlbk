// $(document).ready(function() {
  var review_table = $('#review_list_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/reviews/hotel_review_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
	// $('#review_add_button').click(function (e) {
 //      e.preventDefault();
 //          $.ajax({
 //          dataType: 'json',
 //          type: 'post',
 //          url: 'hotel_review_validation',
 //          data: $('#hotel_review_form').serialize(),
 //          cache: false,
 //          success: function (response) {
 //            if (response.status == "1") {
 //              addToast(response.error,response.color);
 //              window.setTimeout(function(){
 //                 $("#hotel_review_form").submit();
 //              }, 1500);
 //            } else {
 //              addToast(response.error,response.color);
 //            }
 //          },
 //           error: function (xhr,status,error) {
 //             alert("Error: " + error);
 //          }
 //        });
 //    });
   /* Delete data */
  $("#delete_form").submit(function(e){
  /*Form Submit*/
  e.preventDefault();
    var obj = $(this), action = obj.attr('name');
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: base_url+"backend/reviews/hotel_review_delete",
      data: obj.serialize(),
      cache: false,
      success: function (response) {
        if (response.status==1) {
          close_delete_modal();
          review_table.api().ajax.reload(function(){ 
            addToast(response.error,response.color);
          }, true); 
        } else {
          addToast(response.error,response.color);
        }
      },
      error: function (xhr,status,error) {
           alert("Error: " + error);
        }
    });

  });
// }); 
function deletefun(id) {
  deletepopupfun("reviews/hotel_review_delete",id);
}
function view_modal(id) {
  $("#large_modal").modal('show');
  $("#large_modal").load('reviews/hotel_review_view?id='+id);
}
function commonDelete() {
      $.ajax({
      dataType: 'json',
      type: "POST",
      url: $("#delete_form").attr("action"),
      data: $("#delete_form").serialize(),
      cache: false,
      success: function (response) {
        if (response.status==1) {
          close_delete_modal();
          addToast(response.error,response.color);
          var review_table = $('#review_list_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/reviews/hotel_review_list',
                type : 'GET'
            },
            "fnDrawCallback": function(settings){
              $('[data-toggle="tooltip"]').tooltip();          
            }
          }); 
        } else {
          addToast(response.error,response.color);
        }
      }
    });
  }
// function ValidateFileUpload() {
//         var fuData = document.getElementById('profile_image');
//         var FileUploadPath = fuData.value;

// //To check if user upload any file
      
//         var Extension = FileUploadPath.substring(
//         FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

// //The file uploaded is an image

// if (Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {

// // To Display
//           if (fuData.files && fuData.files[0]) {
//               var reader = new FileReader();
//               reader.onload = function(e) {
//                   $('#load_image').attr('src', e.target.result);
//               }

//               reader.readAsDataURL(fuData.files[0]);
//           }

//       } 
// //The file upload is NOT an image
// else {
//       error = "Photo only allows file types of JPG, JPEG and BMP. ";
//       color = "red";
//       $("#profile_image").val("");
//       $("#load_image").attr("src","");
//       addToast(error,color);
//       }
// }