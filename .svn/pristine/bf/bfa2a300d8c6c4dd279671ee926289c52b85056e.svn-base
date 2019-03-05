<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                    <div class="inn-title">
                        <span>Account Head</span>
                    </div>
                    <div class="bor">
                     <div class="row">
                            <div class="form-group col-md-6">
                                <div class="treeview-css">
                                <!-- Tree Ul start -->

                                <ul>
                                <li><input  value="<?php echo $view[0]->Com_ID; ?>" type="checkbox" id="item-2"/><label for="item-2">Account Head [ <?php echo $view[0]->Com_Name; ?> ]</label>
                                <ul>
                                <?php
                                $strGroupId = "";
                                $strSubGroupId = "";
                                $strSubChildGroupId = "";
                                if (count($view_accounts) > 0) {
                                    foreach ($view_accounts as $key => $value) {
                                       if ($strGroupId != $value->GroupID &&  $value->GroupParentID == "0")
                                        { ?>

                                            <li><input  value="<?php echo $value->GroupID; ?>" type="checkbox" id="<?php echo $value->GroupID; ?>" name="<?php echo $value->GroupID;  ?>" >
                                                     <label  for="<?php echo $value->GroupID; ?>"  value="<?php echo $value->GroupName; ?>" id="branch_id"> <?php echo $value->GroupName; ?></label><br>
                                                     <ul>
                                                        <?php if (count($account_group_parent[$key]) > 0) { 
                                                                foreach ($account_group_parent[$key] as $key2 => $value2) {
                                                                    if($strSubChildGroupId != $value2->GroupParentID && $value2->GroupParentID != 0)?>
                                                                <li class="mar_left_25"><input  value="<?php echo $value2->GroupID; ?>" type="checkbox" id="<?php echo $value2->GroupID; ?>" name="<?php echo $value2->GroupID;  ?>" >
                                                                    <label  for="<?php echo $value2->GroupID; ?>"  value="<?php echo $value2->GroupName; ?>" id="branch_id"> <?php echo $value2->GroupName; ?></label><br>
                                                                    <ul class="mar_left_35">
                                                                        <?php if (count($account_group_sub_branch) > 0) { 
                                                                            foreach ($account_group_sub_branch[$key][$key2] as $key3 => $value3) { ?>
                                                                            <li><label onclick="company_account_head('A','<?php echo $value3->AccountID  ?>')"><?php echo $value3->AccountName; ?></label></li>
                                                                        <?php } } ?>
                                                                    </ul>
                                                            </li>
                                                        <?php } }?>
                                                        <?php  if(count($view_accounts_branch[$key]) > 0) {
                                                            foreach ($view_accounts_branch[$key] as $key1 => $value1) {
                                                        if($strSubGroupId != $value1->GroupID) { ?>
                                                            <li><label  for="<?php echo $value1->AccountID; ?>"  value="<?php echo $value1->AccountName; ?>" id="branch_id" onclick="company_account_head('A','<?php echo $value1->AccountID  ?>')"> <?php echo $value1->AccountName; ?></label>
                                                            </li>
                                                       <?php  } 
                                                            } 
                                                        }?>
                                                </ul>
                                            <?php 
                                                }
                                            }
                                        }
                                     ?>
                                    </ul>
                                </li>
                                </ul>
                                <!-- Tree Ul start -->
                            </div>
                            </div>
                              <form name="head_update"  id="head_update" action="<?php echo base_url('backend/finance/head_add'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="group_id" id="group_id">
                                <input type="hidden" name="company_id" id="company_id"
                                 value="<?php echo $_REQUEST['id'] ?>">
                                <div class="form-group col-md-6">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="account_group">Account Group :</label>
                                            <select id="account_group" name="account_group">
                                                <?php foreach ($account_group_list as $key => $value) { ?>
                                                    <option value="<?php echo $value->Fag_ID?>"><?php echo $value->Fag_Name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="group_name">Name :</label><span>*</span>
                                            <input id="group_name" name="group_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="address">Address :</label>
                                           <textarea id="address" name="address" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="con_person">Contact Person :</label>
                                            <input id="con_person" name="con_person" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="phn_no">Phone No :</label>
                                            <input id="phn_no" name="phn_no" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="email">Email :</label>
                                            <input id="email" name="email" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label for="description">Description :</label>
                                           <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label>Account Type :</label>
                                           <p><input type="radio" checked="" id="Normal" name="acc_type" value="0">
                                            <label for="Normal">Normal</label>
                                           <input type="radio" id="Bank" name="acc_type" value="1">
                                            <label for="Bank">Bank</label>
                                           <input type="radio" id="Cash" name="acc_type" value="2">
                                            <label for="Cash">Cash</label>
                                           <input type="radio" id="Stock" name="acc_type" value="3">
                                            <label for="Stock">Stock</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 pad_left_none">
                                               <label for="open_bal">Opening Balance :</label><span>*</span>
                                               <input id="open_bal" name="open_bal" type="number" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                               <br>
                                               <p>
                                                    <input type="radio" checked="" id="Debit" name="bal_type" value="0">
                                                    <label for="Debit">Debit</label>
                                                   <input type="radio" id="Credit" name="bal_type" value="1">
                                                    <label for="Credit">Credit</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 pad_left_none">
                                                <label for="open_date">Opening Date :</label>
                                                <input id="open_date" name="open_date" type="date" class="form-control datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                           <label>Account Nature :</label>
                                           <p><input type="radio" checked="" id="Asset" name="acc_nature" value="0">
                                            <label for="Asset">Asset</label>
                                           <input type="radio" id="Income" name="acc_nature" value="1">
                                            <label for="Income">Income</label>
                                           <input type="radio" id="Expense" name="acc_nature" value="2">
                                            <label for="Expense">Expense</label>
                                           <input type="radio" id="Liability" name="acc_nature" value="3">
                                            <label for="Liability">Liability</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="category">Category :</label>
                                            <select id="category" name="category">
                                                <?php foreach ($Category as $key => $value) { ?>
                                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="reverse_head">Default Reverse Head :</label>
                                            <select id="reverse_head" name="reverse_head">
                                                <option value="" selected="">-none-</option>
                                                <?php foreach ($account_head_list as $key => $value) { ?>
                                                    <option value="<?php echo $value->Fah_ID?>"><?php echo $value->Fah_Name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="amount_sql">Amount SQL :</label>
                                            <textarea class="form-control" id="amount_sql" name="amount_sql"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="data_sql">Data SQL :</label>
                                            <textarea class="form-control" id="data_sql" name="data_sql"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="transaction_sql">Transaction SQL :</label>
                                            <textarea class="form-control" id="transaction_sql" name="transaction_sql"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="ref_table_name">Ref Table Name :</label>
                                            <input class="form-control" type="text" id="ref_table_name" name="ref_table_name"></input>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="data_id_field">Data ID Field :</label>
                                            <input class="form-control" type="text" id="data_id_field" name="data_id_field"></input>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="data_name_field">Data Name Field :</label>
                                            <input class="form-control" type="text" id="data_name_field" name="data_name_field"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="button" id="delete_head" class="waves-effect mar_left_5 waves-light btn-sm btn-danger pull-right" value="Delete">
                                    <input type="button" id="save_btn" class="waves-effect mar_left_5 waves-light btn-sm btn-success pull-right" value="Save">
                                    <a href="<?php echo base_url(); ?>backend/finance/account_head?id=<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" class="waves-effect mar_left_5 waves-light btn-sm btn-primary pull-right" >New</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php init_tail(); ?>

