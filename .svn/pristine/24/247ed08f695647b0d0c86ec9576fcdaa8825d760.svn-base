$(document).ready(function() {
    $('#new_company').click(function (e) {
        var company_name  = $("#c_name").val();
        var pincode       = $("#c_pin").val();
        var tin_num       = $("#c_tin").val();
        var cmail         = $("#c_mail").val();
        var filter        = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (company_name=="" || pincode=="" || tin_num=="") {
        if (company_name=="") {
          $(".c_name_error").text("Company Name is required");
          $("#c_name").focus();
          }else{
          $(".c_name_error").text("");
          }
         if (pincode=="") {
          $(".c_pin_error").text("Pin Code is required");
          $("#c_pin").focus();
          }else{
          $(".c_pin_error").text("");
        }
        if (tin_num=="") {
          $(".c_tin_error").text("Tin Number is required");
          $("#c_tin").focus();
          }else{
          $(".c_tin_error").text("");
        }
        if (!filter.test(cmail)) {
            $(".c_mail_error").text("Please enter a valid email address!");
          } else {
            $(".c_mail_error").text("");
          }
    }
        else {
          $('#company_add').submit();
        }
      });
    $('#company_dlt').click(function () {
        var company = $("#company_select").val();
            
        if (company=="") {
            $(".company_select_error").text("Must select a company");
            $("#company_select").focus();
            }
            else{
            $(".company_select_error").text("");
            $("#delete_id").val(company);
            $("#company_delt").attr("action",action);
            $('#myModal').modal();
          }

      });
     $('#new_branch').click(function (e) {
        var id       = $("#id").val();
        var g_name   = $("#g_name").val();
        if (id=="" || g_name=="") {
        if (id=="") {
          $(".id_error").text("Company Name is required");
          $("#id").focus();
          }else{
          $(".id_error").text("");
          }
         if (g_name=="") {
          $(".g_name_error").text("Pin Code is required");
          $("#g_name").focus();
          }else{
          $(".g_name_error").text("");
        }
    }
        else {
          $('#branch_add').submit();
        }
      });

 $("#delete_head").click(function() {
    var group_id = $("#group_id").val();
    if (group_id=="") {
      addToast('Select an group !','red');
    } else {
      if (confirm("Do you want delete this !")) {
        $('#head_update').attr("action",base_url+"backend/finance/delete_head");
        $('#head_update').submit();
      } else {
        return false;
      }
    }
 }); 

  $('#save_btn').click(function () {
    var group_name = $("#group_name").val();
    var open_bal = $("#open_bal").val();
    var open_date = $("#open_date").val();
    if(group_name=="") {
      addToast('Name field is required!','orange');
      $("#group_name").focus();
    } else if(open_bal=="") {
      addToast('Opening balance is required!','orange');
      $("#open_bal").focus();
    } else if(open_date=="") {
      addToast('Opening date is required!','orange');
      $("#open_date").focus();
    }  else {
      $('#head_update').submit();
    }
  });
  $('#group_save_btn').click(function () {
    var group_name = $("#group_name").val();
    if(group_name=="") {
      addToast('Group Name field is required!','orange');
      $("#group_name").focus();
    } else {
      $('#group_update').submit();
    }
  });

  $("#group_delete").click(function() {
    var group_id = $("#group_id").val();
    if (group_id=="") {
      addToast('Select an group !','red');
    } else {
      if (confirm("Do you want delete this !")) {
        $('#group_update').attr("action",base_url+"backend/finance/delete_group");
        $('#group_update').submit();
      } else {
        return false;
      }
    }
 }); 

  $("#Voucher_type_add").click(function() {
    var Voucher_name = $("#Voucher_name").val();
    if (Voucher_name=="") {
      addToast('Name field is required!','orange');
      $("#Voucher_name").focus();
    } else {
      $("#Voucher_type_add").attr("disabled","disabled");
      Voucher_type_add_fun();
    }
  });

  var Voucher_type = $('#Voucher_type').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/finance/voucher_type_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 

  var fin_transaction_table = $('#fin_transaction_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/finance/financial_transaction_list?filter=',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  var filter_voucher =  $("#voucher_type").val()
  var voucher_settings_table = $('#voucher_settings_table').dataTable({
        "bDestroy": true,
        "lengthMenu": [[-1,10, 25, 50], ["All",10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/finance/voucher_settings_list?filter='+filter_voucher,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
  var acc_head_filter = $("#acc_head_filter").val();
  var opening_balance_table = $('#opening_balance_table').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/finance/opening_balance_list?filter='+acc_head_filter,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });   

  
 $("#ledger_view_btn").click(function() {
  var head = $("#trans_head").val();
  var child = $("#child_head").val();
  var cost = $("#cost_center").val();
  var from_date = $("#from_date").val();
  var to_date = $("#to_date").val();
  // alert(base_url+'/backend/finance/ledger_list?head='+head+'&child='+child+'&cost='+cost+'&from_date='+from_date+'&to_date='+to_date);
  if (head=="") {
    addToast("Must select Transaction head !","orange");
    $("#trans_head").focus()
  } else if(cost=="") {
    addToast("Must select Cost Center !","orange");
    $("#trans_head").focus()
  } else {
    var ledger_table = $('#ledger_table').dataTable({
        "bDestroy": true,
        "lengthMenu": [[-1,10, 25, 50], ['All',10, 25, 50]],
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "ajax": {
            url : base_url+'/backend/finance/ledger_list?head='+head+'&child='+child+'&cost='+cost+'&from_date='+from_date+'&to_date='+to_date,
            type : 'GET'
        },
      "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
      }
    }); 
  }
  });

    /* Delete data */
  $("#delete_form").submit(function(e){
  /*Form Submit*/
  e.preventDefault();
    var obj = $(this), action = obj.attr('name');
    $.ajax({
      dataType: 'json',
      type: "POST",
      url: e.target.action,
      data: obj.serialize(),
      cache: false,
      success: function (response) {
        if (response.table=="fin_transaction_table") {
          if (response.status==1) {
          close_delete_modal();
            fin_transaction_table.api().ajax.reload(function(){ 
                addToast(response.error,response.color);
              }, true); 
          } else {
            close_delete_modal();
            addToast(response.error,response.color);
          }
        } else {
          if (response.status==1) {
            close_delete_modal();
              Voucher_type.api().ajax.reload(function(){ 
                  addToast(response.error,response.color);
                }, true); 
          } else {
            addToast(response.error,response.color);
          }
        }
      }
    });

  });
  $("#Voucher_type_New").click(function() {
    $("#voucher_id").val("");
    $("#Voucher_name").val("");
    $("#restarts_on").prop('selectedIndex', 0); 
    $("#disable").prop('selectedIndex', 0); 
    $("#is_debit").prop('selectedIndex', 0); 
    $("#numbering").prop('selectedIndex', 0); 
    $("#dis_journal").prop('selectedIndex', 0); 
    $("#starts_from").val("");
    $("#Voucher_type_New").addClass("hide");
    $("#Voucher_type_add").text("Add");
  });

  $("#add_voucher").click(function() {
    var date = $("#date").val();
    var from_main_account = $("#from_main_account").val();
    var to_main_head = $("#to_main_head").val();
    var amount = $("#amount").val();
    var voucher_type = $("#voucher_type").val();
    if (date=="") {
      addToast('Date field is required!','orange');
      $("#date").focus();
    } else if (from_main_account=="") {
      addToast('From main account is required!','orange');
      $("#from_main_account").focus();
    } else if (to_main_head=="") {
      addToast('To main head field is required!','orange');
      $("#to_main_head").focus();
    } else if (amount=="") {
      addToast('Amount field is required!','orange');
      $("#amount").focus();
    } else if (voucher_type=="") {
      addToast('Voucher type field is required!','orange');
      $("#voucher_type").focus();
    } else {
      addToast('Inserted Successfully','green');
      $("#voucher_entry_form").attr("action",base_url+"backend/finance/voucher_entry_add");
      $("#voucher_entry_form").submit();
    }
  });

  $(".filter_fin_transaction").click(function() {
      var filter = $(this).val();
      var fin_transaction_table = $('#fin_transaction_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/finance/financial_transaction_list?filter='+filter,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      }); 
  });
  $("#search_fin_acc").click(function() {
    var filter = $("#custom").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    var account = $("#all_accounts").val();
    var voucher = $("#voucher_type").val(); 

    if($('#custom').is(':checked')) { 
      var fin_transaction_table = $('#fin_transaction_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/finance/financial_transaction_list?filter='+filter+'&from_date='+from_date+
            '&to_date='+to_date+'&account='+account+'&voucher='+voucher,
            type : 'GET'
        },
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }
      }); 
    } else { 
      addToast('Select Custom Filter','orange');
      $("#custom").focus();
    }
  });

  $(".cash_bank_change").click(function() {
    var cash_bank = $(this).val();
    if (cash_bank==0) {
      $("#cheque_no").attr("disabled","disabled");
      $("#cheque_date").attr("disabled","disabled");
    } else {
      $("#cheque_no").removeAttr("disabled","disabled");
      $("#cheque_date").removeAttr("disabled","disabled");
    }
  });

  $("#dr_active").click(function() {
    $("#dr_account").removeAttr("disabled","disabled");
    $("#dr_inactive").removeClass("hide");
    $(this).addClass("hide");
  });
  $("#dr_inactive").click(function() {
    $("#dr_account").attr("disabled","disabled");
    $("#dr_active").removeClass("hide");
    $(this).addClass("hide");
  });
  $("#cr_active").click(function() {
    $("#cr_account").removeAttr("disabled","disabled");
    $("#cr_inactive").removeClass("hide");
    $(this).addClass("hide");
  });
  $("#cr_inactive").click(function() {
    $("#cr_account").attr("disabled","disabled");
    $("#cr_active").removeClass("hide");
    $(this).addClass("hide");
  });

  $("#update_voucher_entry_btn").click(function() {
    if($('#bank').is(':checked')) {
      var cheque_no = $("#cheque_no").val();
      var cheque_date = $("#cheque_date").val();
      if (cheque_no=="") {
        addToast('Cheque Number field is required !','orange');
        $("#cheque_no").focus();
      } else if(cheque_date=="") {
        addToast('Cheque date field is required !','orange');
        $("#cheque_date").focus();
      } else {
        update_voucher_entry_fun();
      }
    } else {
      update_voucher_entry_fun();
    }
  });

  $("#update_voucher_account_btn").click(function() {
    var dr_account = $("#dr_account").val();
      update_voucher_account_fun();
  })
  $("#voucher_type_id").val($("#voucher_type").val());

  $("#voucher_settings_btn").click(function() {
    $("#voucher_settings_form").attr("action",base_url+"backend/finance/voucher_settings_update");
    $("#voucher_settings_form").submit();
  });

  $("#open_balance_add").click(function() {
    var acc_head = $("#acc_head").val();
    var child_acc_head = $("#child_acc_head").val();
    var open_bal = $("#open_bal").val();
    var open_date = $("#open_date").val();
    if (acc_head=="") {
      addToast('Account Head field is required !','orange');
      $("#acc_head").focus();
    } else if (child_acc_head=="") {
      addToast('Child Account Head field is required !','orange');
      $("#child_acc_head").focus();
    } else if (open_bal=="") {
      addToast('Opening Balance Head field is required !','orange');
      $("#open_bal").focus();
    } else if (open_date=="") {
      addToast('Opening date Head field is required !','orange');
      $("#open_date").focus();
    } else {
      $("#open_balance_add").attr("disabled","disabled");
      opening_balance_ajax_update_insert();
      clear_open_balance_form();
    }
  });

  $("#open_balance_New").click(function() {
   clear_open_balance_form();
   $("#open_balance_add").text("Add");
   $(this).addClass("hide");
  });

  $('#delete_cost_center').click(function () { 
    var cost_center = $("#cost_center").val();
    if(cost_center==""){
      addToast('Finance Cost center field is required!',"orange");
      $("#cost_center").focus();
    } else{
      $("#delete_id").val(cost_center);
      $("#hide_popup_btn").trigger('click');
    }
  }); 
  $('#cost_center_save').click(function () { 
    var cost_center_name = $("#cost_center_name").val();
    if(cost_center_name==""){
      addToast('Finance Cost center  Name field is required!',"orange");
      $("#cost_center_name").focus();
    } 
    else{
      $("#cost_center_form").submit();
    }
           
  }); 



  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy'
  });



}); 
function company_change_fun() {
  var company_select = $("#company_select").val();
    $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/finance/copmany_select?id='+company_select,
      success: function(data) {
        fetch_company_data(data);
      }
  }); 
}
function fetch_company_data(data) {
   $("#id").val(data.Com_ID);
   $("#c_name").val(data.Com_Name);
   $("#c_address").val(data.Com_Address);
   $("#c_city").val(data.Com_City);
   $("#c_state").val(data.Com_State);
   $("#c_pin").val(data.Com_PIN);
   $("#c_office_num").val(data.Com_OfficeNo);
   $("#c_fax").val(data.Com_Fax);
   $("#c_mob1").val(data.Com_Mob1);
   $("#c_mob2").val(data.Com_Mob2);
   $("#c_mail").val(data.Com_MailID);
   $("#c_tin").val(data.Com_TinNo);
   $("#c_cen").val(data.Com_CEN);
   $("#firm").val(data.Com_Type);
   $("#cst_num").val(data.Com_CST);
   $("#date-picker").val(data.Com_FinYearFrom);
}
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
function company_one_fun() {
  var company_select = $("#one_company").val();
    $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/finance/copmany_select?id='+company_select,
      success: function(data) {
        fetch_one_company_data(data);
      }
  }); 
}
function fetch_one_company_data(data) {
   var company = $("#one_company").val();
   $("#c_address").val(data.Com_Address);
   $("#c_tin").val(data.Com_TinNo);
   $("#date-picker").val(data.Com_FinYearFrom);
   $("#delete_id").val(company);
   $("#company_delt").attr("action",action);
   $('#myModal').modal();
}
function fetch_one_branch_data(data) {
  // alert(data)
   $("#b_id").val(data.Fah_ParentID);
   $("#b_name").val(data.Fah_Name);
   $("#b_description").val(data.Fah_Description);
}
function company_account_head(type,id) {
    $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/finance/head_select?id='+id,
      success: function(data) {
        account_head_fetch_fun(data);
      }
  }); 
}
function account_head_fetch_fun(data) {
  $("#account_group option[value=" + data[0].Fag_ID + "]").attr("selected","selected");
  $('#account_group').material_select();
  $("#group_id").val(data[0].Fah_ID);
  $("#group_name").val(data[0].Fah_Name);
  if (data[0].Fah_Address != "NULL") {
    $("#address").val(data[0].Fah_Address);
  }
  if (data[0].Fah_ContactPerson != "NULL") {
    $("#con_person").val(data[0].Fah_ContactPerson);
  }
  if (data[0].Fah_Phone != "NULL") {
    $("#phn_no").val(data[0].Fah_Phone);
  }
  if (data[0].Fah_Description != "NULL") {
    $("#description").val(data[0].Fah_Description);
  }

  if (data[0].Fah_Type=="0") {
    $("#Normal").attr("checked","checked");
  } else if (data[0].Fah_Type=="1") {
    $("#Bank").attr("checked","checked");
  } else if (data[0].Fah_Type=="2") {
    $("#Cash").attr("checked","checked");
  } else if (data[0].Fah_Type=="3") {
    $("#Stock").attr("checked","checked");
  }

  $("#open_bal").val(data[0].Fah_OpeningBal);

  if (data[0].Fah_IsDebit=="0") {
    $("#Debit").attr("checked","checked");
  } else if (data[0].Fah_IsDebit=="1") {
    $("#Credit").attr("checked","checked");
  } 

  $("#open_date").val(data[0].date);

  if (data[0].Fah_Nature=="0") {
    $("#Asset").attr("checked","checked");
  } else if (data[0].Fah_Nature=="1") {
    $("#Income").attr("checked","checked");
  } else if (data[0].Fah_Nature=="2") {
    $("#Expense").attr("checked","checked");
  } else if (data[0].Fah_Nature=="3") {
    $("#Liability").attr("checked","checked");
  } 

  $("#category option[value=" + data[0].Fah_Category + "]").attr("selected","selected");
  $('#category').material_select();

  $("#reverse_head option[value=" + data[0].Fah_ReverseHeadID + "]").attr("selected","selected");
  $('#reverse_head').material_select();

  if (data[0].Fah_AmountSQL != "NULL") {
    $("#amount_sql").val(data[0].Fah_AmountSQL);
  }
  if (data[0].Fah_DataSQL != "NULL") {
    $("#data_sql").val(data[0].Fah_DataSQL);
  }
  if (data[0].Fah_TransactionSQL != "NULL") {
    $("#transaction_sql").val(data[0].Fah_TransactionSQL);
  }
  if (data[0].Fah_SQLTable != "NULL") {
    $("#ref_table_name").val(data[0].Fah_SQLTable);
  }
  if (data[0].Fah_SQLID != "NULL") {
    $("#data_id_field").val(data[0].Fah_SQLID);
  }
  if (data[0].Fah_SQLName != "NULL") {
    $("#data_name_field").val(data[0].Fah_SQLName);
  }
}   

function company_account_group(id) {
   $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/finance/group_select?id='+id,
      success: function(data) {
        account_group_fetch_fun(data);
      }
  }); 
} 

function account_group_fetch_fun(data) {
  $("#g_id").val(data[0].Fag_ID);
  $("#group_id").val(data[0].Fag_ID);
  $("#group_name").val(data[0].Fag_Name);
  if (data[0].Fag_Disable=="1") {
    $("#group_disabled").attr("checked","checked");
  } else {
    $("#group_disabled").removeAttr("checked","checked");
  }
  if (data[0].Fag_ParentID==0) {
    $("#Parent_group").prop('selectedIndex', 0); 
    $('#Parent_group').material_select();
  } else {
    $("#Parent_group option[value=" + data[0].Fag_ParentID + "]").attr("selected","selected");
    $('#Parent_group').material_select();
  }
  
  if (data[0].Fag_ParentID==0) {
    $("#acc_nature").removeAttr("disabled","disabled");
    $("#group_profit").attr("disabled","disabled");

    $("#acc_nature option[value=" + data[0].Fah_Nature + "]").attr("selected","selected");
    $('#acc_nature').material_select();

    $("#group_profit option[value=" + data[0].isAffectGP + "]").attr("selected","selected");
    $('#group_profit').material_select();
  } else {
    $("#acc_nature").attr("disabled","disabled");
    $("#group_profit").attr("disabled","disabled");
    $("#acc_nature option[value=" + data[0].Fah_Nature + "]").attr("selected","selected");
    $('#acc_nature').material_select();

    $("#group_profit option[value=" + data[0].isAffectGP + "]").attr("selected","selected");
    $('#group_profit').material_select();
  }
}
function Voucher_type_add_fun() {
  var voucher_id = $("#voucher_id").val();
  if (voucher_id=="") {
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/voucher_type_add',
      data: $('#Voucher_type_form').serialize(),
      cache: false,
      success: function(data) {
        if (data==true) {
          addToast('Added Successfully','green');
          $("#Voucher_type_add").removeAttr("disabled","disabled");

          clear_voucher_type_data();
        } else {
          $("#Voucher_type_add").removeAttr("disabled","disabled");
          addToast('Added Unsuccessfully','red');
        }
        $("#Voucher_type_add").removeAttr("disabled","disabled");
      }
    }); 
  } else {
    $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/voucher_type_add',
      data: $('#Voucher_type_form').serialize(),
      cache: false,
      success: function(data) {
        if (data==true) {
          addToast('Updated Successfully','green');
          $("#Voucher_type_add").removeAttr("disabled","disabled");

          clear_voucher_type_data();
        } else {
          $("#Voucher_type_add").removeAttr("disabled","disabled");
          addToast('Updated Unsuccessfully','red');
        }
        $("#Voucher_type_add").removeAttr("disabled","disabled");
      }
    }); 
  }
  
}

function clear_voucher_type_data() {
  $("#voucher_id").val("");
  $("#Voucher_name").val("");
  $("#restarts_on").prop('selectedIndex', 0); 
  $("#disable").prop('selectedIndex', 0); 
  $("#is_debit").prop('selectedIndex', 0); 
  $("#numbering").prop('selectedIndex', 0); 
  $("#dis_journal").prop('selectedIndex', 0); 
  $("#starts_from").val("");
  $("#Voucher_type_New").addClass("hide");
  $("#Voucher_type_add").text("Add");

  $('#Voucher_type').dataTable({
        "bDestroy": true,
        "ajax": {
            url : base_url+'/backend/finance/voucher_type_list',
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  }); 
}
function delete_voucher_type_fun(id) {
  deletepopupfun(base_url+"backend/finance/voucher_type_delete",id);
}
function edit_voucher_type_fun(id) {
  $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/voucher_type_detail_get?id='+id,
      cache: false,
      success: function(data) {
        Voucher_type_edit_data(data);
      }
  }); 
}
function Voucher_type_edit_data(data) {
  $("#voucher_id").val(data[0].Fvt_ID);
  $("#Voucher_name").val(data[0].Fvt_TypeName);
  $("#restarts_on option[value=" + data[0].Fvt_RestartNo + "]").attr("selected","selected");
  $("#disable option[value=" + data[0].Fvt_Disable + "]").attr("selected","selected");
  $("#is_debit option[value=" + data[0].Fvt_InitDr + "]").attr("selected","selected");
  $("#numbering option[value=" + data[0].Fvt_Numbering + "]").attr("selected","selected");
  $("#dis_journal option[value=" + data[0].Fvt_DisplayInJournal + "]").attr("selected","selected");
  $("#starts_from").val(data[0].Fvt_NoStatFrom);
  $("#Voucher_type_New").removeClass("hide");
  $("#Voucher_type_add").text("Update");
}
function account_change(from_id,to_id) {
  $("#"+to_id+" option").remove();
  $("#"+to_id).material_select();
  var from_id_val = $("#"+from_id).val();
  $.ajax({
      dataType: 'json',
      type: 'post',
      async:false,
      url: base_url+'/backend/finance/sub_accounts_get?id='+from_id_val,
      cache: false,
      success: function(data) {
        if (data!="") {
          $.each(data, function(i, v) {
            $("#"+to_id).append('<option value="'+v.id+'">'+v.name+'</option>');
            $("#"+to_id).material_select();
          });
        } else {
          $("#"+to_id+" option").remove();
          $("#"+to_id).material_select();
        }
      }
  }); 
}
function edit_voucher_entry_fun(id) {
  $("#fin_acc_modal").load(base_url+"backend/finance/financial_transaction_modal?group_id="+id);
}
function update_voucher_entry_fun() {
  $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/voucher_entry_update',
      cache: false,
      data: $("#update_voucher_entry_form").serialize(),
      success: function(data) {
        if (data==true) {
          addToast('Updated Successfully','green');
        } else {
          addToast('Updated Unsuccessfully','red');
        }
      }
  }); 
}
function update_voucher_account_fun() {
  $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/voucher_account_update',
      cache: false,
      data: $("#update_voucher_account").serialize(),
      success: function(data) {
        if (data==true) {
          addToast('Account Updated Successfully','green');
        } else {
          addToast('Please change Particular !','orange');
        }
      }
  }); 
}
function delete_voucher_entry_fun(group_id) {
    deletepopupfun(base_url+"backend/finance/financial_transaction_delete",group_id);
}
function dr_change_check_all() {
  if ($("#dr_check_all").is(":checked")) {
    $(".dr_childs").attr("checked","checked");
  } else {
    $(".dr_childs").removeAttr("checked","checked");
  }
}
function cr_change_check_all() {
  if ($("#cr_check_all").is(":checked")) {
    $(".cr_childs").attr("checked","checked");
  } else {
    $(".cr_childs").removeAttr("checked","checked");
  }
}
function voucher_type_change_in_settings() {
  $("#voucher_type_id").val($("#voucher_type").val());
  var filter_voucher =  $("#voucher_type").val()
  window.location = base_url+'/backend/finance/voucher_settings?filter='+filter_voucher;
  // var voucher_settings_table = $('#voucher_settings_table').dataTable({
  //       "bDestroy": true,
  //       "lengthMenu": [[-1,10, 25, 50], ["All",10, 25, 50]],
  //       "ajax": {
  //           url : base_url+'/backend/finance/voucher_settings_list?filter='+filter_voucher,
  //           type : 'GET'
  //       },
  //   "fnDrawCallback": function(settings){
  //   $('[data-toggle="tooltip"]').tooltip();          
  //   }
  // }); 
}
function opening_balance_ajax_update_insert() {
  $.ajax({
      dataType: 'json',
      type: 'post',
      url: base_url+'/backend/finance/opening_balance_update',
      cache: false,
      data: $("#opening_bal_form").serialize(),
      success: function(data) {
        if (data=="update") {
          addToast('Opening Balance Updated Successfully','green');
        } else {
          addToast('Opening Balance Inserted Successfully','green');
        }
        $("#open_balance_add").removeAttr("disabled","disabled");
        load_opening_balance();
      }
  }); 
}
function clear_open_balance_form() {
  $("#bal_id").val("");
  $("#acc_head").prop('selectedIndex', 0); 
  $('#acc_head').material_select();
  $("#child_acc_head option").remove();
  $("#child_acc_head").material_select();
  $("#open_bal").val("");
  $("#open_date").val("");
  $("#credit").removeAttr("checked","checked");
  $("#debit").attr("checked","checked");
}
function open_bal_change() {
  var acc_head_filter = $("#acc_head_filter").val();
  var opening_balance_table = $('#opening_balance_table').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/finance/opening_balance_list?filter='+acc_head_filter,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}
function edit_opening_balance_fun(id) {
  clear_open_balance_form();
  $.ajax({
    dataType: 'json',
    type: 'post',
    async: false,
    url: base_url+'/backend/finance/opening_balance_edit?id='+id,
    cache: false,
    success: function(data) {
      fetch_open_balance_form(data);
    }
  }); 
}
function fetch_open_balance_form(data) {
  $("#bal_id").val(data.bal_id);
  $("#acc_head option[value=" + data.head + "]").prop("selected",true);
  $('#acc_head').material_select();
  account_change('acc_head','child_acc_head');
  $("#open_bal").val(data.balance);
  $("#open_date").val(data.date);

  $("#child_acc_head option[value=" + data.child + "]").prop("selected", true);
  $("#child_acc_head").material_select();

  if (data.deb_credit==1) {
    $("#credit").attr("checked","checked");
    $("#debit").removeAttr("checked","checked");
  } else {
    $("#credit").removeAttr("checked","checked");
    $("#debit").attr("checked","checked");
  }
  $("#open_balance_New").removeClass("hide");
  $("#open_balance_add").text("Update");
}
function load_opening_balance() {
  var acc_head_filter = $("#acc_head_filter").val();
  var opening_balance_table = $('#opening_balance_table').dataTable({
        "bDestroy": true,
        "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        "ajax": {
            url : base_url+'/backend/finance/opening_balance_list?filter='+acc_head_filter,
            type : 'GET'
        },
    "fnDrawCallback": function(settings){
    $('[data-toggle="tooltip"]').tooltip();          
    }
  });
}
function cost_center_change_fun() {
  var cost_center = $("#cost_center").val();
    $.ajax({
      dataType: 'json',
      type: "Post",
      url: base_url+'/backend/finance/company_cost_center?id='+cost_center,
      success: function(data) {
        fetch_cost_center_data(data);
      }
  }); 
}
function fetch_cost_center_data(data) {
   $("#cost_id").val(data.Fcc_ID);
   $("#cost_center_name").val(data.Fcc_Name);
   if (data.Fcc_IsDisable==1) {
    $("#cost_disble").attr("checked","checked");
   } else {
    $("#cost_disble").removeAttr("checked","checked");
   }
 }

