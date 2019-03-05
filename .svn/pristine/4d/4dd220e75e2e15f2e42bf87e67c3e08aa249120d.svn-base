<?php init_head(); ?>
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <span>Financial Transactions</span>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/agents/new_agent" class="btn-sm btn-primary">Add</a></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                <p>
                                    <input class="with-gap filter_fin_transaction" name="group1" type="radio" id="Today" value="1" checked="" />
                                    <label for="Today">Today</label>
                                    <input class="with-gap filter_fin_transaction" name="group1" type="radio" id="last_week"  value="2" />
                                    <label for="last_week">Last week</label>
                                    <input class="with-gap filter_fin_transaction" name="group1" type="radio" id="last_month"  value="3"/>
                                    <label for="last_month">Last month</label>
                                    <input class="with-gap filter_fin_transaction" name="group1" type="radio" id="all"  value="4"/>
                                    <label for="all">All</label>
                                    <input class="with-gap filter_fin_transaction" name="group1" type="radio" id="custom"  value="5"/>
                                    <label for="custom">Custom</label>
                                </p>  
                                </div> 
                             </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mar_top_10">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group col-md-2">
                                        <label for="from_date">From</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo $date1 = date('Y-m-d', strtotime('-1 week')); ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="to_date">To</label>
                                        <input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="all_accounts">All Accounts</label>
                                        <select id="all_accounts" name="all_accounts">
                                            <option value="">--All Accounts--</option>
                                            <?php foreach ($main_account_head as $key => $value) { ?>
                                            <option value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="voucher_type">Voucher Type</label>
                                        <select id="voucher_type" name="voucher_type">
                                            <option value="">--All--</option>
                                            <?php foreach ($voucher_type as $key => $value) { ?>
                                            <option value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="button" class="mar_top_23 btn-sm btn-primary" id="search_fin_acc" value="Search">
                                    </div>
                                </div> 
                             </div> 
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    <div class="col-md-12">
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-condensed table-hover" id="fin_transaction_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Vch Type</th>
                                        <th>Vch No</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Cheque No</th>
                                        <th>Cheque Date</th>
                                        <th>By</th>
                                        <th>Narration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div id="fin_acc_modal" class="modal-large delete_modal modal fade">
</div>
<?php init_tail(); ?>
