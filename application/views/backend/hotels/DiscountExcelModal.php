<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Excel Update</h4>
      </div>
      <div class="modal-body">
        <form id="ExcelUpdateForm" method="POST" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-md-6">
                    <label>Hotel</label>
                    <select class="form-control" name="hotel_name" id="hotel_name">
                        <option value="">select</option>
                        <?php foreach ($view as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->hotel_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Contract</label>
                    <div class="multi-select-mod">
                        <select class="form-control" style="height: 35px" multiple="" name="Contract_id[]" id="Contract_id">
                            <option>select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Rooms</label>
                    <div class="multi-select-mod">
                        <select class="form-control" style="height: 35px" multiple="" name="Rooms[]" id="Rooms">
                            <option>select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>DiscountCode</label>
                    <input type="text" class="form-control" name="DiscountCode" id="DiscountCode">
                </div>
                <div class="col-md-12">
                    <label>Excel file</label>
                    <input type="file" name="excelfile" id="excelfile" onchange="return ValidateFileUpload();">
                </div>
                <div class="col-md-12">
                    <table id="exceltable">  
                    </table> 
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn-sm btn-success"  id="ExcelUpdate">Update</button>
      </div>
    </div>
  </div>
<script type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('excelfile');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
      
        var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

        //The file uploaded is an image

        if (Extension == "xlsx" || Extension == "xls") {
            $("#exceltable tbody").remove();
            $("#exceltable thead").remove();
            ExportToTable();
        } else {
            error = "Excel file only allows file types of xlsx, xls. ";
              color = "red";
           $("#excelfile").val("");
           $("#exceltable tbody").remove();
            $("#exceltable thead").remove();
           addToast(error,color);
        }
    }

function ExportToTable() {  
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 $('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  
 }  
 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {  
         var row$ = $('<tr/>');  
         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
             var cellValue = jsondata[i][columns[colIndex]];  
             if (cellValue == null)  
                 cellValue = "";  
             row$.append($('<td/>').html(cellValue));  
         }  
         $(tableid).append(row$);  
     }  
 }  
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     $(tableid).append(headerTr$);  
     return columnSet;  
 }  


 $("#hotel_name").change(function() {
    var hotelValues = $(this).val();
    $.ajax({
      url: base_url+'/backend/hotels/contractList/'+hotelValues,
      type: "POST",
      // dataType: "json",
      success:function(data) {
        $("#Contract_id").html(data);
        $('#Contract_id').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
      }
    });
    $.ajax({
      url: base_url+'/backend/hotels/roomList/'+hotelValues,
      type: "POST",
      // dataType: "json",
      success:function(data) {
        $("#Rooms").html(data);
        $('#Rooms').multiselect({
            includeSelectAllOption: true,
            selectAllValue: 0
        });
      }
    });
 });
 $("#ExcelUpdate").click(function() {
    var hotel_name = $("#hotel_name").val();
    var Contract_id = $("#Contract_id").val();
    var Rooms = $("#Rooms").val();
    var DiscountCode = $("#DiscountCode").val();
    var excelfile = $("#excelfile").val();
    if (hotel_name=="") {
        addToast('Hotel field is required!','orange');
        $("#hotel_name").focus();
    } else if(Contract_id=="" || Contract_id==null) {
        addToast('Contract field is required!','orange');
        $("#Contract_id").focus();
    } else if(Rooms=="" || Rooms==null) {
        addToast('Rooms field is required!','orange');
        $("#Rooms").focus();
    } else if(DiscountCode=="") {
        addToast('DiscountCode field is required!','orange');
        $("#DiscountCode").focus();
    } else if(excelfile=="") {
        addToast('Excel file field is required!','orange');
        $("#excelfile").focus();
    } else {
        addToast('Updated successfully','green');
        $("#ExcelUpdateForm").attr("action",base_url+"backend/hotels/DiscountExcelUpdate");
        $("#ExcelUpdateForm").submit();
    }
 });
</script>
