<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Voucher Entry</span>
                    </div>
                    <div class="tab-inn">
                        <form id="voucher_entry_form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3 form-group">
                                    <label for="date">Date</label><span>*</span>
                                    <input type="date" name="date" id="date" class="datepicker">
                                </div>
                                <div class="col-md-3 form-group left-only-border">
                                    <label for="from_main_account">From Main Account</label><span>*</span>
                                    <select id="from_main_account" name="from_main_account" onchange="account_change('from_main_account','from_sub_account');">
                                        <option value="">--select--</option>
                                        <?php foreach ($main_account_head as $key => $value) { ?>
                                           <option value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="to_main_head">To Main head</label><span>*</span>
                                    <select id="to_main_head" name="to_main_head" onchange="account_change('to_main_head','to_sub_head');">
                                        <option value="">--select--</option>
                                        <?php foreach ($main_account_head as $key => $value) { ?>
                                           <option value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group left-only-border">
                                    <label for="amount">Amount</label><span>*</span>
                                    <input type="number" id="amount" name="amount" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3 form-group">
                                    <label for="voucher_type">Voucher Type</label><span>*</span>
                                    <select id="voucher_type" name="voucher_type">
                                        <option value="">--select--</option>
                                        <?php foreach ($voucher_type as $key => $value) { ?>
                                            <option value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group left-only-border">
                                    <label for="from_sub_account">From Sub Account</label>
                                    <select id="from_sub_account" name="from_sub_account">
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="to_sub_head">To Sub Head</label>
                                    <select id="to_sub_head" name="to_sub_head">
                                    </select>
                                </div>
                                <div class="col-md-3 form-group left-only-border">
                                    <label for="narration">Narration</label>
                                    <textarea class="form-control" id="narration" name="narration"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <input type="button" id="add_voucher" class="waves-effect waves-light btn-sm btn-success pull-right" value="Add Voucher">
                                </div>
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
