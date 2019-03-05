// $(document).ready(function() {

var finance_hotel = $('#finance_hotel').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'backend/Finance/hotel_finance_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
function finance_edit(id) {
  financepopupfun("finance_edit",id);
}
function financepopupfun(action,id) {
    $("#edit_id").val(id);
    $("#hotel_finance").attr("action",action);
   $('#finance_view').modal();
}
$('#credit_update').click(function (e) {
 		var credit  = $("#credit_amount").val();
 		var paid    = $("#paid").val();
   
    if (credit=="" || paid=="") {
 		if (credit=="") {
 			$(".credit_amount_error").text("Credit amount is required");
 			$("#credit").focus();
      }else{
      $(".credit_amount_error").text("");
      }
 		 if (paid=="") {
      $(".paid_error").text("Paid amount is required");
      $("#paid").focus();
      }else{
      $(".paid_error").text("");
    }
}
    else {
      $('#hotel_finance').submit();
 		}
 	});

$("#search_book_hotel").click(function() {
  //alert("fgfg")

    var hotel_select = $("#hotel_select").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    if (hotel_select=="") {
        addToast('Select a Hotel',"orange");
        $("#hotel_select").focus();
    }
    if (from_date>to_date){
        addToast('To Date Must be After From Date',"orange")
        $("#to_date").focus();
    }  
    var hotel_finance = $('#hotel_finance').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/search_booking_list?hotel_id='+hotel_select+'&from_date='+from_date+'&to_date='+to_date,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      }); 
  
  });
  $("#search_booking_agents").click(function() {
    var agent_select = $("#agent_select").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    if (agent_select=="") {
        addToast('Select a Agent',"orange");
        $("#agent_select").focus();
    }
    if (from_date>to_date){
        addToast('To Date Must be After From Date',"orange");
        $("#to_date").focus();
    }  
    var agent_finance = $('#agent_finance').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/search_booking_agents_list?id='+agent_select+'&from_date='+from_date+
            '&to_date='+to_date,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
   }); 
  
  });
  var from_date = $("#from_date").val();
  var to_date   = $("#to_date").val();
  var NightReporttbl = $('#NightReporttbl').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/RoomNightReportFilter?from_date='+from_date+
            '&to_date='+to_date,
            type : 'GET'   
        },

    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }

  });
  var altutlzhotel_id = $("#hotel_id").val();
  var altutlzroom_id = $("#room_id").val();
  var altutlzcontract_id = $("#contract_id").val();
  // var altUtlzReportTable = $('#altUtlzReportTable').dataTable({
  //       "bDestroy": true,
  //       "ajax": {
  //           url : base_url+'/backend/Report/altUtlzReportList?from_date='+from_date+
  //           '&to_date='+to_date+'&hotel_id='+altutlzhotel_id+'&room_id='+altutlzroom_id+'&contract_id='+altutlzcontract_id,
  //           type : 'GET'   
  //       },

  //   "fnDrawCallback": function(settings){
  //   $('[data-toggle="tooltip"]').tooltip();          
  //   }

  // });

  $("#SearchNightReport").click(function() {
    
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").text();
        var state     = $("#stateSelect option:selected").text();
        var city      = $("#citySelect option:selected").text();
        
        if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        }
        var NightReporttbl = $('#NightReporttbl').dataTable({
          "pageLength": 100,
          "bDestroy": true,
          "ordering": false,
          "ajax": {
            url : base_url+'/backend/Report/RoomNightReportFilter?from_date='+from_date+
            '&to_date='+to_date+'&ConSelect='+Con+'&state='+state+'&city='+city,
            type : 'POST' 
            },

          "fnDrawCallback": function(settings){
                 $('[data-toggle="tooltip"]').tooltip();          
          }

        }); 
            
          
  });

  $("#BookingFormReportButton").click(function() {
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").text();
        var country_id = $("#ConSelect").val();
        var state     = $("#stateSelect option:selected").text();
        var hotelid = $("#HotelSelect").val();
        var agent_id  = $("#agent_id option:selected").val();
        if (from_date==""){
          addToast('From Date Must be entered',"orange");
              $("#from_date").focus();
        } else if(to_date==""){
          addToast('To Date Must be entered',"orange");
              $("#to_date").focus();
        }
        else if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        } 
        else if (Con==" Country "){
              addToast('Select a country from list',"orange");
              $("#ConSelect").focus();
        }
        else{
          bookingreportfilter($("#filter").val());
        }
       

           
  });
  $("#altUtlzFormReport").click(function() {
     var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").val();
        var state     = $("#stateSelect option:selected").val();
        var city      = $("#citySelect option:selected").text();
        var Hotel     = $("#HotelSelect").val();
        var Agent     = $("#AgentSelect option:selected").val();
        if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        } else if (Con == ''){
               addToast('Must Select Country',"orange");
              $("#ConSelect").focus();
        } else if (state == ''){
               addToast('Must Select State',"orange");
              $("#stateSelect").focus();
        } else if (Hotel == ''){
               addToast('Must Select Hotel',"orange");
              $("#HotelSelect").focus();
        } else {
          $("#bookingReport_filter").submit();
        }
        // $.ajax({
        //     dataType: 'json',
        //     type: "POST",
        //     url: base_url+'/backend/Report/altUtlzReportList?from_date='+from_date+
        //     '&to_date='+to_date+'&ConSelect='+Con+'&state='+state+'&hotel_id='+Hotel+'&Agent='+Agent,
        //     cache: false,
        //     success: function(response) {
              
        //         $("#altUtlzReportTable").html(response);
                 
            
        //     }
        // });     
  });

  $("#nationalityReport").click(function() {
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").val();
        var hotelid      = $("#HotelSelect option:selected").val();
        
        if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        }
        var nationalityReportTable = $('#nationalityReportTable').dataTable({
          "pageLength": 100,
          "ordering":false,
          "bDestroy": true,
          "ajax": {
            url : base_url+'/backend/Report/nationalityReportList?from_date='+from_date+
            '&to_date='+to_date+'&ConSelect='+Con+'&hotelid='+hotelid,
            type : 'POST' 
            },

          "fnDrawCallback": function(settings){
                 $('[data-toggle="tooltip"]').tooltip();          
          },
        }); 
            
          
  });

  var from_date = $("#from_date").val();
  var to_date   = $("#to_date").val();
  var NightReporttbl30 = $('#NightReporttbl30').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/RoomNightReport30Con?from_date='+from_date+
            '&to_date='+to_date,
            type : 'GET'   
        },

    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }

  });
  var from_date = $("#from_date").val();
  var to_date   = $("#to_date").val();
  //alert(base_url+'/backend/Report/avaReportFilter?from_date='+from_date+
            //'&to_date='+to_date);
  var availabilityReportTable = $('#availabilityReportTable').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/Report/avaReportFilter?from_date='+from_date+
            '&to_date='+to_date,
            type : 'GET'   
        },

    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }

  });


  $("#SearchNightReport30").click(function() {
    
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").text();
        var state     = $("#stateSelect option:selected").text();
        var city      = $("#citySelect option:selected").text();
        
        if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        }
        var NightReporttbl30 = $('#NightReporttbl30').dataTable({
          "bDestroy": true,
          "ajax": {
            url : base_url+'/backend/Report/RoomNightReport30Con?from_date='+from_date+
            '&to_date='+to_date+'&ConSelect='+Con+'&state='+state+'&city='+city,
            type : 'POST' 
            },

          "fnDrawCallback": function(settings){
                 $('[data-toggle="tooltip"]').tooltip();          
          }

        }); 
            
          
  });
  $("#AvaReport").click(function() {
    
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var stateSelect = $("#stateSelect").val();
        var country =$("#ConSelect").val();
       
        // $("#AvaReport_filter").attr("action",base_url+'/backend/Report/avaReportFilter?from_date='+from_date+
        //          '&to_date='+to_date+'&stateSelect='+stateSelect+'&country='+country);
        // $("#AvaReport_filter").submit();
        var availabilityReportTable = $('#availabilityReportTable').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/Report/avaReportFilter?from_date='+from_date+
                '&to_date='+to_date+'&stateSelect='+stateSelect+'&country='+country,
                type : 'GET'   
            },

        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }

      });
  });
  $("#AgentSalesFilter").click(function() {
    
        var month    = $("#month").val();
        var year      = $("#year").val();
        var agent_select = $("#agent_select").val();
        // $("#agentSale_filter").attr("action",base_url+'/backend/Report/agentsalesfilter?agent_id='+agent_select+'&from_date='+from_date+'&to_date='+to_date);
        // $("#agentSale_filter").submit();
      
        var AgentSales = $('#AgentSales').dataTable({
            "bDestroy": true,
            "ajax": {
                url : base_url+'/backend/Report/agentsalesfilter?agent_id='+agent_select+'&month='+month+'&year='+year,
                type : 'GET'   
            },

        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        },
        "footerCallback":function(row, data, start, end, display){

            // console.log('started',tfoot)
            var api = this.api();
            api.columns('.summable').every(function() {
                var sum = api.cells(null, this.index()).render('display').reduce(function(a, b) {var x = parseFloat(a) || 0.00;var y = parseFloat(b) || 0.00;return x + y;}, 0);console.log(this.index() + ' ' + sum);$(this.footer()).html('<h5>'+sum.toFixed(2)+'</h5>');});
        }

      });
     
  });

// }); 


 function hotel_select_fun() {
  var hotel_select = $("#hotel_select").val();
  var from_date = $("#from_date").val();
  var to_date = $("#to_date").val();
  var hotel_finance = $('#hotel_finance').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/Report/hotel_select_list?hotel_id='+hotel_select+'&from_date='+from_date+'&to_date='+to_date,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}
function agent_select_fun() {
  var agent_select = $("#agent_select").val();
  var from_date = $("#from_date").val();
  var to_date = $("#to_date").val();
  var agent_finance = $('#agent_finance').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/Report/agent_report_list?agent_id='+agent_select+'&from_date='+from_date+'&to_date='+to_date,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}

function select_profit_fun() {
  var agent_select = $("#agent_select").val();
  var hotel_select = $("#hotel_select").val();
  //alert('&hotel_id='+hotel_select);
  var profit_report = $('#profit_report').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/Report/profit_report_list?hotel_id='+hotel_select+'&agent_id='+agent_select,
            type : 'GET'
        },

    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}
// function select_hotel_profit_fun() {
//   //var agent_select = $("#agent_select").val();
//   var hotel_select = $("#hotel_select").val();
//   //alert('&hotel_id='+hotel_select);
//   var profit_report = $('#profit_report').dataTable({
//         "bDestroy": true,
//         "lengthMenu": [[10, 25, 50], [10, 25, 50]],
//         "ajax": {
//             url : base_url+'/backend/Report/profit_report_list?hotel_id='+hotel_select,
//             type : 'GET'
//         },

//     "fnDrawCallback": function(settings){
//     $('[data-toggle="tooltip"]').tooltip();          
//     }
//   });
// }

function total_night_calc1() {
  var total_nights = tpj("#nights").val();
  var from_date = tpj("#from_date").val();
  var to_date = tpj("#to_date").val();
  var total_date = daydiff(parseDate(from_date), parseDate(to_date));
  if (total_date<1) {
    alert("Checkout date should be within one month duration.");
    tpj("#to_date").val("");
    tpj("#alternate2").val("dd/mm/yy");
  } else if (total_date>31) {
    alert("Checkout date should be within one month duration.");
    tpj("#to_date").val("");
    tpj("#alternate2").val("dd/mm/yy");
  } else {
    tpj('#nights option').each(function() {
        if(tpj(this).val() == total_date) {
            tpj(this).prop("selected", true);
        }
    });
    tpj(".night_custom_class span:last-child").text(total_date);
  }
}
function ConSelectFun(){
  var hiddenState = $("#hiddenState").val();
  $('#stateSelect option').remove();
    var ConSelect = $('#ConSelect').val();
    $.ajax({
        url: base_url+'/backend/Report/StateSelect?Conid='+ConSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#stateSelect').append('<option value="">Select</option>');
            $.each(data, function(i, v) {
              if(hiddenState==v.id) {
                  selected = 'selected';
                } else {
                  selected = '';
                }
                $('#stateSelect').append('<option '+selected+' value="'+ v.id +'">'+ v.name +'</option>');
            });
            StateSelectFun();
        }
    });
}

function StateSelectFun(){
  var hiddenHotel = $("#hiddenHotel").val();
  $('#HotelSelect option').remove();
    var StateSelect = $('#stateSelect').val();
    $.ajax({
        url: base_url+'/backend/Report/HotelSelect?stateid='+StateSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#HotelSelect').append('<option value="">Select</option>');
            $.each(data, function(i, v) {
              if(hiddenHotel==v.id) {
                  selected = 'selected';
                } else {
                  selected = '';
                }
                $('#HotelSelect').append('<option '+selected+' value="'+ v.id +'">'+ v.hotel_name +'</option>');
            });
        }
    });

}
function HotelSelectFun(){
  $('#roomSelect option').remove();
  $('#contractSelect option').remove();
  var HotelSelect = $('#HotelSelect').val();
    $.ajax({
        url: base_url+'/backend/Report/RoomSelect?Roomid='+HotelSelect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#roomSelect').append('<option value="">Select</option>');
            $.each(data, function(i, v) {
                $('#roomSelect').append('<option value="'+ v.roomz_id +'">'+ v.room_name +' '+ v.Room_Type +'</option>');
            });
                $.ajax({
                        url: base_url+'/backend/Report/ContractSelect?Contid='+HotelSelect,
                        type: "POST",
                        data:{},
                        dataType: "json",
                        success:function(data) {
                          $('#contractSelect').append('<option value="">Select</option>');
                            $.each(data, function(i, s) {
                                $('#contractSelect').append('<option value="'+ s.contract_id +'">'+ s.contract_id +' '+ s.board +'</option>');
                            });
                        }
                    });
            }
        });
}

function bookingreportfilter(val) {
  $("#filter").val(val);
  var from_date = $("#from_date").val();
  var to_date   = $("#to_date").val();
  var Con       = $("#ConSelect option:selected").text();
  var country_id = $("#ConSelect option:selected").val();
  var state     = $("#stateSelect").val();
  var hotelid = $("#HotelSelect").val();
  var agent_id  = $("#agent_id option:selected").val();
  var BookingReportTable = $('#BookingReportTable').dataTable({
    "bDestroy": true,
    "ajax": {
      url : base_url+'backend/report/BookingReportList?filter='+val+'&from_date='+from_date+
      '&to_date='+to_date+'&country_id='+country_id+'&state='+state+'&hotelid='+hotelid+'&agent_id='+agent_id,
      type : 'POST' 
      },

    "fnDrawCallback": function(settings){
           $('[data-toggle="tooltip"]').tooltip();          
    },
    "footerCallback":function(row, data, start, end, display){

              // console.log('started',tfoot)
              var api = this.api();
              api.columns('.summable').every(function() {
                  var sum = api.cells(null, this.index()).render('display').reduce(function(a, b) {var x = parseFloat(a) || 0 ;var y = parseFloat(b) || 0;return x + y;}, 0);console.log(this.index() + ' ' + sum);$(this.footer()).html('<h5>'+sum+'</h5>');});
          }

  });    
}
 $("#BookingPatternReportButton").click(function() {
        var from_date = $("#from_date").val();
        var to_date   = $("#to_date").val();
        var Con       = $("#ConSelect option:selected").text();
        var country_id = $("#ConSelect").val();
        var state     = $("#stateSelect").val();
        var hotelid = $("#HotelSelect").val();
        if (from_date==""){
          addToast('From Date Must be entered',"orange");
              $("#from_date").focus();
        } else if(to_date==""){
          addToast('To Date Must be entered',"orange");
              $("#to_date").focus();
        }
        else if (from_date>to_date){
              addToast('To Date Must be After From Date',"orange");
              $("#to_date").focus();
        } 
        else if (Con==" Country "){
              addToast('Select a country from list',"orange");
              $("#ConSelect").focus();
        }
        else {
          Name = [];
          Transaction = [];
          Nights = [];
          colors = [];
          $.ajax({
          dataType: 'json',
          type: 'post',
          url: base_url+'backend/report/BookingPatternReportList?&from_date='+from_date+'&to_date='+to_date+'&country_id='+country_id+'&state='+state+'&hotelid='+hotelid,
          cache: false,
          success: function (response) {
            if (response.length!=0) {
              $.each(response.Name, function(i, v) {
                 Name.push(v);
                 Transaction.push(response.TOTALCOUNT[i]);
                 Nights.push(response.TOTALROOMNIGHTS[i]);
                 colors.push(response.colors[i]);
              });
              // Chart TransactionsChart
              // Pie chart
                    new Chart(document.getElementById("TransactionsChart"), {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: Transaction,
                                backgroundColor: colors,
                            }],
                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: Name
                        },
                        options: {
                            responsive: true
                          }
                    });
              // Chart RoomNightsChart
               new Chart(document.getElementById("RoomNightsChart"), {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: Nights,
                                backgroundColor: colors,
                            }],
                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: Name
                        },
                        options: {
                            responsive: true
                          }
                    });



            }
            
          } 
        });
            

      }   
});
function CountryHotelSelectFun(){
  $('#HotelSelect option').remove();
    var Conselect = $('#ConSelect').val();
    $.ajax({
        url: base_url+'/backend/Report/CountryHotelSelect?conid='+Conselect,
        type: "POST",
        data:{},
        dataType: "json",
        success:function(data) {
          $('#HotelSelect').append('<option value="">Select</option>');
            $.each(data, function(i, v) {
                $('#HotelSelect').append('<option value="'+ v.id +'">'+ v.hotel_name +'</option>');
            });
        }
    });

}

  
    
