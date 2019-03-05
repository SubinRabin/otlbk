<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                    <div class="inn-title">
                        <span>Account Group</span>
                    </div>
                    <div class="bor">
                     <div class="row">
                             <div class="form-group col-md-6">
                                <div class="treeview-css group_head_tree">
                                  <ul>
                                    <li><input  value="<?php echo $view[0]->Com_ID; ?>" type="checkbox" id="item-2"/><label for="item-2">Account Group[ <?php echo $view[0]->Com_Name; ?> ]</label>
                                    <ul style="margin-left: 0px;">
                                        <?php
                                            $strGroupId = "";
                                            if (count($view_accounts) > 0) {
                                                foreach ($view_accounts as $key => $value) {
                                                   if ($value->Fag_ParentID == "0")
                                                    { ?>
                                                        <?php if(count($sub_accounts1[$key]) > 0) {  ?><li class="mar_left_25"><input  value="<?php echo $value->Fag_ID; ?>" type="checkbox" id="<?php echo $value->Fag_ID; ?>" name="<?php echo $value->Fag_ID;  ?>" > <?php } else { ?>
                                                            <li>
                                                        <?php } ?>
                                                         <label  for="<?php echo $value->Fag_ID; ?>"  value="<?php echo $value->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value->Fag_ID  ?>')"> <?php echo $value->Fag_Name; ?></label><br>
                                                            <ul>
                                                                <?php if (count($sub_accounts1) > 0) {
                                                                     foreach ($sub_accounts1[$key] as $key1 => $value1) { ?>
                                                                        <?php if(count($sub_accounts2[$key][$key1]) > 0) {  ?><li class="mar_left_25"><input  value="<?php echo $value1->Fag_ID; ?>" type="checkbox" id="<?php echo $value1->Fag_ID; ?>" name="<?php echo $value1->Fag_ID;  ?>" > <?php } else { ?>
                                                                            <li>
                                                                        <?php } ?>
                                                                        <label  for="<?php echo $value1->Fag_ID; ?>"  value="<?php echo $value1->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value1->Fag_ID  ?>')"> <?php echo $value1->Fag_Name; ?></label><br>
                                                                        <ul>
                                                                        <?php if (count($sub_accounts2[$key][$key1]) > 0) {
                                                                            foreach ($sub_accounts2[$key][$key1] as $key2 => $value2) { ?>
                                                                                <?php if (count($sub_accounts3[$key][$key1][$key2]) > 0) { ?>
                                                                                 <li class="mar_left_25"><input  value="<?php echo $value2->Fag_ID; ?>" type="checkbox" id="<?php echo $value2->Fag_ID; ?>" name="<?php echo $value2->Fag_ID;  ?>" ><?php } else { ?>
                                                                                    <li>
                                                                                <?php } ?>
                                                                                <label  for="<?php echo $value2->Fag_ID; ?>"  value="<?php echo $value2->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value2->Fag_ID  ?>')"> <?php echo $value2->Fag_Name; ?></label><br>
                                                                                <ul>
                                                                                <?php if (count($sub_accounts3[$key][$key1][$key2]) > 0) {
                                                                                    foreach ($sub_accounts3[$key][$key1][$key2] as $key3 => $value3) { ?>
                                                                                    <?php if(count($sub_accounts4[$key][$key1][$key2][$key3]) > 0) {  ?>
                                                                                        <li class="mar_left_25"><input  value="<?php echo $value3->Fag_ID; ?>" type="checkbox" id="<?php echo $value3->Fag_ID; ?>" name="<?php echo $value3->Fag_ID;  ?>" ><?php } else { ?>
                                                                                            <li>
                                                                                        <?php } ?>
                                                                                        <label  for="<?php echo $value3->Fag_ID; ?>"  value="<?php echo $value3->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value3->Fag_ID  ?>')"> <?php echo $value3->Fag_Name; ?></label><br>
                                                                                         <ul>
                                                                                            <?php if (count($sub_accounts4[$key][$key1][$key2][$key3]) > 0) {
                                                                                                foreach ($sub_accounts4[$key][$key1][$key2][$key3] as $key4 => $value4) { ?>
                                                                                                <?php if (count($sub_accounts5[$key][$key1][$key2][$key3][$key4]) > 0) { ?><li class="mar_left_25">
                                                                                                    <input  value="<?php echo $value4->Fag_ID; ?>" type="checkbox" id="<?php echo $value4->Fag_ID; ?>" name="<?php echo $value4->Fag_ID;  ?>" ><?php } else { ?>
                                                                                                        <li>
                                                                                                    <?php } ?>
                                                                                                    <label  for="<?php echo $value4->Fag_ID; ?>"  value="<?php echo $value4->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value4->Fag_ID  ?>')"> <?php echo $value4->Fag_Name; ?></label><br>
                                                                                                    <ul>
                                                                                                        <?php if (count($sub_accounts5[$key][$key1][$key2][$key3][$key4]) > 0) {
                                                                                                            foreach ($sub_accounts5[$key][$key1][$key2][$key3][$key4] as $key5 => $value5) { ?>
                                                                                                            <?php if (count($sub_accounts6[$key][$key1][$key2][$key3][$key4][$key5]) > 0) { ?><li class="mar_left_25">
                                                                                                                <input  value="<?php echo $value5->Fag_ID; ?>" type="checkbox" id="<?php echo $value5->Fag_ID; ?>" name="<?php echo $value5->Fag_ID;  ?>" ><?php } else { ?>
                                                                                                                        <li>
                                                                                                                    <?php } ?>
                                                                                                                <label  for="<?php echo $value5->Fag_ID; ?>"  value="<?php echo $value5->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value5->Fag_ID  ?>')"> <?php echo $value5->Fag_Name; ?></label><br>
                                                                                                                <ul>
                                                                                                                    <?php if (count($sub_accounts6[$key][$key1][$key2][$key3][$key4][$key5]) > 0) {
                                                                                                                        foreach ($sub_accounts6[$key][$key1][$key2][$key3][$key4][$key5] as $key6 => $value6) { ?>
                                                                                                                        <?php if (count($sub_accounts7[$key][$key1][$key2][$key3][$key4][$key5][$key6]) > 0) { ?>
                                                                                                                        <li class="mar_left_25">
                                                                                                                            <input  value="<?php echo $value6->Fag_ID; ?>" type="checkbox" id="<?php echo $value6->Fag_ID; ?>" name="<?php echo $value6->Fag_ID;  ?>" ><?php } else { ?>
                                                                                                                                <li>
                                                                                                                            <?php } ?>
                                                                                                                            <label  for="<?php echo $value6->Fag_ID; ?>"  value="<?php echo $value6->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value6->Fag_ID  ?>')"> <?php echo $value6->Fag_Name; ?></label><br>
                                                                                                                            <ul>
                                                                                                                                <?php if (count($sub_accounts7[$key][$key1][$key2][$key3][$key4][$key5][$key6]) > 0) {
                                                                                                                                    foreach ($sub_accounts7[$key][$key1][$key2][$key3][$key4][$key5][$key6] as $key7 => $value7) { ?>
                                                                                                                                    <li>
                                                                                                                                        <label  for="<?php echo $value7->Fag_ID; ?>"  value="<?php echo $value7->Fag_Name; ?>" id="branch_id" onclick="company_account_group('<?php echo $value7->Fag_ID  ?>')"> <?php echo $value7->Fag_Name; ?></label><br>
                                                                                                                                    </li>
                                                                                                                                <?php } } ?>
                                                                                                                            </ul>
                                                                                                                        </li>
                                                                                                                    <?php } } ?>
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        <?php } } ?>
                                                                                                    </ul>
                                                                                                </li>
                                                                                            <?php } } ?>
                                                                                        </ul>
                                                                                    </li>
                                                                                <?php } } ?>
                                                                            </ul>
                                                                            </li>
                                                                        <?php } } ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </li>
                                                        <?php 
                                                    }
                                                }
                                            }
                                         ?>
                                        </ul>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <form name="group_update"  id="group_update" action="<?php echo base_url('backend/finance/group_add_update'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="company_id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="group_id" id="g_id" value="">

                                <div class="form-group col-md-6">
                                    <div class="col-sm-12">
                                        <label for="group_id">ID :</label>
                                        <input id="group_id"  type="text" class="form-control" value="<?php echo $new_id ?>" />
                                        <div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                           <label for="group_name">Group Name :</label>
                                            <input id="group_name" name="group_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <br>
                                        <input type="checkbox" class="filled-in" id="group_disabled" name="group_disabled" value="1" />
                                        <label for="group_disabled" style="margin-top: 10px;">Disable</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="Parent_group">Parent Group :</label>
                                            <select  id="Parent_group" name="Parent_group">
                                                <option value="" >--Select--</option>
                                                 <?php foreach ($view_accounts as $key => $value) { ?>
                                                    <option value="<?php echo $value->Fag_ID; ?>"><?php echo $value->Fag_Name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="b_description">Description :</label>
                                            <textarea name="b_description" id="b_description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label for="acc_nature">Account Nature :</label>
                                            <select  id="acc_nature" name="acc_nature">
                                                <option selected="selected" value="0">Asset</option>
                                                <option value="1">Income</option>
                                                <option value="3">Liability</option>
                                                <option value="2">Expenditure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <label>Is Affected Gross Profit :</label>
                                            <select  id="group_profit" name="group_profit">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="button" id="group_delete" class="waves-effect mar_left_5 waves-light btn-sm btn-danger pull-right" value="Delete">
                                    <input type="button" id="group_save_btn" class="waves-effect mar_left_5 waves-light btn-sm btn-success pull-right" value="Save">

                                    <a href="<?php echo base_url(); ?>backend/finance/account_group?id=<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ?>" class="waves-effect mar_left_5 waves-light btn-sm btn-primary pull-right" >New</a>
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
