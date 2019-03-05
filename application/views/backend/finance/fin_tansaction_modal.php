  <!-- Modal content-->
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Voucher Entry</h4>
    </div>
    <div class="modal-body">
      <form method="post" id="update_voucher_entry_form">
      <div class="row">
        <div class="col-md-6 form-group">
            <label>Voucher Number</label>
            <input type="text" class="form-control" value="<?php echo $view[0]->Fve_GroupID ?>" readonly="">
            <input type="hidden" name="voucher_id" value="<?php echo $view[0]->Fve_GroupID ?>">
        </div>
        <div class="col-md-6 form-group">
            <label for="voucher_type">Voucher Type</label>
            <select id="voucher_type" name="voucher_type" class="form-control">
                <?php foreach ($voucher_type as $key => $value) {
                  if ($view[0]->Fve_IsVoucher==$value->Fvt_ID) { ?>
                <option selected="" value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
               <?php  } else { ?>
                <option value="<?php echo $value->Fvt_ID ?>"><?php echo $value->Fvt_TypeName ?></option>
               <?php  } }?>
            </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group">
            <label for="voucher_date">Voucher Date</label>
            <input type="date" id="voucher_date" name="voucher_date" class="form-control" value="<?php echo date('Y-m-d', strtotime( $view[0]->Fve_Date )); ?>">
        </div>
        <div class="col-md-6 form-group">
            <label>Cash/Bank</label>
            <p>
              <input class="with-gap cash_bank_change" name="cash_bank" type="radio" id="cash" <?php echo $view[0]->Fve_IsCheque==0 ? 'checked' : '' ?> value="0"  />
              <label for="cash">Cash A/C</label>
              <input class="with-gap cash_bank_change" name="cash_bank" type="radio" id="bank" <?php echo $view[0]->Fve_IsCheque==1 ? 'checked' : '' ?> value="1" />
              <label for="bank">Bank A/C</label>
            </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group">
            <label for="cheque_no">Cheque Number</label>
            <input type="number" <?php echo $view[0]->Fve_IsCheque==0 ? 'disabled' : '' ?> class="form-control" id="cheque_no" name="cheque_no" value="<?php echo isset($view[0]->Fve_ChequeNo) ? $view[0]->Fve_ChequeNo : '' ?>">
        </div>
        <div class="col-md-6 form-group">
            <label for="cheque_date">Cheque Date</label>
            <input type="date" <?php echo $view[0]->Fve_IsCheque==0 ? 'disabled' : '' ?>  id="cheque_date" name="cheque_date" value="<?php echo isset($view[0]->Fve_ChequeDate) ? date('Y-m-d', strtotime( $view[0]->Fve_ChequeDate )) : ''; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group">
            <label for="narration">Narration</label>
            <textarea id="narration" name="narration" class="form-control"><?php echo isset($view[0]->Fve_Description) ? $view[0]->Fve_Description : '' ?></textarea>
         </div>
         <div class="col-md-6 form-group">
            <input type="button" value="update" id="update_voucher_entry_btn" class="btn-sm btn-primary mar_top_45">
         </div>
      </div>
      </form>
      <div class="row">
        <div class="col-md-12">
          <br>
            <span>Account Details</span>
        </div>
        <div class="col-md-12">
          <form method="post" id="update_voucher_account">
          <table>
              <thead>
                <tr>
                  <td>SlNo</td>
                  <td>Particular</td>
                  <td>Dr.Amount</td>
                  <td>Cr.Amount</td>
                  <td>DR/Cr</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1
                    <input type="hidden" name="dr_id" value="<?php echo $view[0]->Fve_ID ?>">
                  </td>
                  <td>
                    <select id="dr_account" name="dr_account" class="form-control" disabled="">
                      <?php foreach ($main_account_head as $key => $value) {
                        if ($view[0]->Fve_FrmTransID==$value->Fah_ID) { ?>
                        <option selected="" value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                        <?php  } else {  ?>
                        <option value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                        <?php } } ?>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="" value="<?php echo $view[0]->Fve_Amount ?>" readonly>
                  </td>
                  <td>
                    <input type="text" name="" value="0.00" readonly>
                  </td>
                  <td>DR</td>
                  <td>
                    <a href="#" id="dr_active"  class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="#" id="dr_inactive"  class="sb2-2-1-add hide"><i class="fa fa-close text-danger" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>2
                    <input type="hidden" name="cr_id" value="<?php echo $view[1]->Fve_ID ?>">
                  </td>
                  <td>
                    <select id="cr_account" name="cr_account" class="form-control" disabled="">
                      <?php foreach ($main_account_head as $key => $value) {
                        if ($view[1]->Fve_ToTransID==$value->Fah_ID) { ?>
                        <option selected="" value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                        <?php  } else {  ?>
                        <option value="<?php echo  $value->Fah_ID ?>"><?php echo  $value->Fah_Name ?></option>
                        <?php } } ?>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="" value="0.00" readonly>
                  </td>
                  <td>
                    <input type="text" name="" value="<?php echo $view[1]->Fve_Amount ?>" readonly>
                  </td>
                  <td>Cr</td>
                  <td>
                    <a href="#" id="cr_active"  class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="#" id="cr_inactive"  class="sb2-2-1-add hide"><i class="fa fa-close text-danger" aria-hidden="true"></i></a>
                  </td>
                </tr>
              </tbody>
          </table>
          </form>
        </div>
      <div>
    </div>
    <div class="modal-footer">
      <button type="button" id="update_voucher_account_btn" class="btn-sm btn-primary">update</button>
    </div>
  </div>
