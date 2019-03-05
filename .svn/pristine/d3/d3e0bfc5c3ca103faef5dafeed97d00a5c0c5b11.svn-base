<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authorize_aim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_Model');
        $this->load->library('gateways/App_gateway', '', 'App_gateway');
        $this->load->library('gateways/Authorize_aim_gateway', '', 'authorize_aim_gateway');
         $this->load->library('session');
    }

    public function complete_purchase()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $data['amount']      = $this->input->post('total');
            $data['currency']    = $this->input->post('curency');
            $data['aimdata'] = $this->Common_Model->authorizeAIMdetails();

            try {
                $oResponse      = $this->authorize_aim_gateway->finish_payment($data);

            } catch (Exception $e) {
                $message = $e->getMessage();
                print_r($message);
        exit();
                redirect(site_url('backend/common/paymentgateway?msg=failed'));
            }

            $oResponseData = $oResponse->getData();

            if (isset($oResponseData->messages->resultCode) && $oResponseData->messages->resultCode == 'Error') {
                $message = $oResponseData->messages->message->text;
                  redirect(site_url('backend/common/paymentgateway?msg=failed'));
            }

            if ($oResponse->isSuccessful()) {
                if ($oResponseData->transactionResponse->responseCode == '1') {
                  redirect(site_url('backend/common/paymentgateway?msg=success'));   
                }
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
               print_r($message);
        exit();
                redirect(site_url('backend/common/paymentgateway?msg=failed'));
            }
        }
    }

    public function make_payment()
    {
        check_invoice_restrictions($this->input->get('invoiceid'), $this->input->get('hash'));
        $this->load->model('invoices_model');
        $invoice      = $this->invoices_model->get($this->input->get('invoiceid'));
        load_client_language($invoice->clientid);
        $data['invoice']      = $invoice;
        $billing_country = get_country($invoice->billing_country);
        $data['total']        = $this->session->userdata('total_authorize');
        $data['billing_name'] = '';
        if (is_client_logged_in()) {
            $contact = $this->clients_model->get_contact(get_contact_user_id());
            $data['billing_name'] = $contact->firstname . ' '  . $contact->lastname;
        } else {
            if (total_rows('tblcontacts', array('userid'=>$invoice->clientid)) == 1) {
                $contact = $this->clients_model->get_contact(get_primary_contact_user_id($invoice->clientid));
                if ($contact) {
                    $data['billing_name'] = $contact->firstname . ' '  . $contact->lastname;
                }
            }
        }
        echo $this->get_html($data);
    }
    public function complete_purchase_booking()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $data['amount']      = xml_currency_change($this->input->post('total'),agent_currency(),'USD');
            $total = $data['amount'];
            $data['currency']    = 'USD';
            $currency = $data['currency'];
            $data['aimdata'] = $this->Common_Model->authorizeAIMdetails();

            try {
                $oResponse      = $this->authorize_aim_gateway->finish_payment_booking($data);

            } catch (Exception $e) {
                $message = $e->getMessage();
                // print_r($message);
                redirect(site_url('payment/booking_online_payment_response?msg=failed'));
            }

            $oResponseData = $oResponse->getData();
            if (isset($oResponseData->messages->resultCode) && $oResponseData->messages->resultCode == 'Error') {
                $message = $oResponseData->messages->message->text;
                  redirect(site_url('payment/booking_online_payment_response?msg=failed'));
            }

            if ($oResponse->isSuccessful()) {
                if ($oResponseData->transactionResponse->responseCode == '1') {
                  $response = xml2array($oResponseData->transactionResponse);
                  $transactionid = $response['transHash'];
                  redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=authorize_aim'));  
                }
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
                redirect(site_url('payment/booking_online_payment_response?msg=failed'));
            }
        }
    }
    public function complete_purchase_xml_booking()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $data['amount']      = xml_currency_change($this->input->post('total'),agent_currency(),'USD');
            $total = $data['amount'];
            $data['currency']    = 'USD';
            $currency = $data['currency'];
            $data['aimdata'] = $this->Common_Model->authorizeAIMdetails();

            try {
                $oResponse      = $this->authorize_aim_gateway->finish_payment_xml_booking($data);

            } catch (Exception $e) {
                $message = $e->getMessage();
                // print_r($message);
                redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
            }

            $oResponseData = $oResponse->getData();
            if (isset($oResponseData->messages->resultCode) && $oResponseData->messages->resultCode == 'Error') {
                $message = $oResponseData->messages->message->text;
                  redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
            }

            if ($oResponse->isSuccessful()) {
                if ($oResponseData->transactionResponse->responseCode == '1') {
                  $response = xml2array($oResponseData->transactionResponse);
                  $transactionid = $response['transHash'];
                  redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=authorize_aim'));  
                }
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
                redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
            }
        }
    }


    public function get_html($data = array()){
        ob_start(); ?>
        <!DOCTYPE html>
        <html lang="en">
           <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
              <title>
                 <?php echo _l('payment_for_invoice') . ' ' . format_invoice_number($data['invoice']->id); ?>
              </title>
              <?php if(get_option('favicon') != ''){ ?>
              <link href="<?php echo base_url('uploads/company/'.get_option('favicon')); ?>" rel="shortcut icon">
              <?php } ?>
              <?php echo app_stylesheet('assets/css','reset.css'); ?>
              <!-- Bootstrap -->
              <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
              <link href='<?php echo base_url('assets/plugins/roboto/roboto.css'); ?>' rel='stylesheet'>
              <?php echo app_stylesheet('assets/css','bs-overides.css'); ?>
              <?php echo app_stylesheet(template_assets_path().'/css','style.css'); ?>
              <style>
                 .text-danger {
                    color: #fc2d42;
                 }
              </style>
           </head>
           <body>
              <div class="container">
                 <div class="col-md-8 col-md-offset-2 mtop30">
                    <div class="row">
                       <div class="panel_s">
                          <div class="panel-body">
                             <h4 class="no-margin">
                                <?php echo _l('payment_for_invoice'); ?> <a href="<?php echo site_url('viewinvoice/'. $data['invoice']->id . '/' . $data['invoice']->hash); ?>"><?php echo format_invoice_number($data['invoice']->id); ?></a>
                             </h4>
                             <hr />
                             <h4 class="mbot20"><?php echo _l('payment_total',format_money($data['total'],$data['invoice']->symbol)); ?></h4>
                             <?php echo form_open(site_url('gateways/authorize_aim/complete_purchase'),array('novalidate'=>true,'id'=>'authorize_form')); ?>
                             <?php echo form_hidden('invoiceid',$data['invoice']->id); ?>
                             <?php echo form_hidden('total',$data['total']); ?>
                             <div>
                                <div class="form-group mtop15">
                                   <label class="control-label">
                                   <?php echo _l('payment_credit_card_number'); ?>
                                   </label>
                                   <input class="form-control" name="ccNo" id="ccNo" type="text" autocomplete="off" required />
                                </div>
                             </div>
                             <div>
                               <div class="form-group">
                                <label class="control-label" for="expMonth">
                                 <?php echo _l('card_expiration_month'); ?> (MM)
                               </label>
                               <input class="form-control" name="expMonth" id="expMonth" type="number" maxlength="2" required />
                             </div>
                             <div class="form-group">
                              <label class="control-label" for="expYear">
                               <?php echo _l('card_expiration_year'); ?> (YYYY)
                             </label>
                             <input class="form-control" name="expYear" id="expYear" type="number" maxlength="4" required />
                           </div>
                             </div>
                             <div>
                                <div class="form-group mtop15">
                                   <label class="control-label">
                                   CVV
                                   </label>
                                   <input class="form-control" name="cvv" id="cvv" type="text" autocomplete="off" required />
                                </div>
                                <hr />
                                <h4><?php echo _l('billing_address'); ?></h4>
                                <div class="form-group mtop15">
                                   <label class="control-label">
                                   <?php echo _l('payment_cardholder_name'); ?>
                                   </label>
                                   <input type="text" name="billingName" class="form-control" value="<?php echo $data['billing_name']; ?>" required>
                                </div>
                                <div class="row">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <label class="control-label">
                                         <?php echo _l('billing_address'); ?>
                                         </label>
                                         <input type="text" name="billingAddress1" class="form-control" required value="<?php echo $data['invoice']->billing_street; ?>">
                                      </div>
                                   </div>
                                   <div class="clearfix"></div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">
                                         <?php echo _l('billing_city'); ?>
                                         </label>
                                         <input type="text" name="billingCity" class="form-control" required value="<?php echo $data['invoice']->billing_city; ?>">
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">
                                         <?php echo _l('billing_state'); ?>
                                         </label>
                                         <input type="text" name="billingState" class="form-control" value="<?php echo $data['invoice']->billing_state; ?>">
                                      </div>
                                   </div>
                                   <div class="clearfix"></div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">
                                         <?php echo _l('billing_country'); ?>
                                         </label>
                                         <select name="billingCountry" class="form-control" required>
                                            <option value=""></option>
                                            <?php foreach(get_all_countries() as $country){
                                               $selected = '';
                                               if($data['invoice']->billing_country == $country['country_id']){
                                                 $selected = 'selected';
                                               }
                                               echo '<option '.$selected.' value="'.$country['iso3'].'">'.$country['short_name'].'</option>';
                                               }
                                               ?>
                                         </select>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">
                                         <?php echo _l('billing_zip'); ?>
                                         </label>
                                         <input type="text" name="billingPostcode" class="form-control" value="<?php echo $data['invoice']->billing_zip; ?>">
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <input type="submit" class="btn btn-info" value="<?php echo _l('submit_payment'); ?>" />
                             </form>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
              <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
              <script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
              <script>
                 $.validator.setDefaults({
                     errorElement: 'span',
                     errorClass: 'text-danger',
                 });
                 $(function(){
                    $('#authorize_form').validate();
                 });
              </script>
           </body>
        </html>
        <?php
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
      }
}
