<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Set Opening Balance</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="acc_head_filter">Account Head</label>
                                    <select name="acc_head_filter" id="acc_head_filter" onchange="open_bal_change();">
                                        <option value="">--select--</option>
                                        <?php foreach ($account_head as $key => $value) { ?>
                                            <option value="<?php echo $value->Fah_ID ?>"><?php echo $value->Fah_Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-inn">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- <div class="tab-inn"> -->
                                    <h5>Opening Balance List</h5>
                                    <br>
                                    <div class="table-responsive table-desi">
                                        <table class="table table-condensed table-hover" id="opening_balance_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Child Name</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                <!-- </div> -->
                            </div>
                            <div class="col-md-4 left-only-border">
                                
                                <!-- <div class="tab-inn"> -->
                                    <h5>Opening Balance Add</h5>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <form method="post" name="opening_bal_form" id="opening_bal_form" >
                                            <input type="hidden" name="bal_id" id="bal_id">
                                        <div class="form-group col-md-12">
                                            <label for="acc_head">Account Head</label>
                                            <select name="acc_head" id="acc_head" onchange="account_change('acc_head','child_acc_head');">
                                                <option value="">--select--</option>
                                                <?php foreach ($account_head as $key => $value) { ?>
                                                    <option value="<?php echo $value->Fah_ID ?>"><?php echo $value->Fah_Name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="child_acc_head">Account Child Heads</label>
                                            <select name="child_acc_head" id="child_acc_head">
                                                <option value="">--select--</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="open_bal">Opening Balance</label>
                                            <input type="number" name="open_bal" id="open_bal" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <p>
                                                <input type="radio" class="with-gap" id="debit" name="deb_credit" value="0" checked="">
                                                <label for="debit">Debit</label>
                                                <input type="radio" class="with-gap" id="credit" name="deb_credit" value="1">
                                                <label for="credit">Credit</label>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="is_debit">Opening Date</label>
                                            <input type="date" name="open_date" id="open_date"class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <br>
                                            <br>
                                            <button type="button" class="btn-sm btn-success pull-right mar_left_5" id="open_balance_add">Add</button>
                                            <button type="button" class="btn-sm btn-primary pull-right hide" id="open_balance_New">New</button>
                                        </div>
                                        </form>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php init_tail(); ?>
