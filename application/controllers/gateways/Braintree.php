<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Braintree extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_Model');
        $this->load->library('gateways/App_gateway', '', 'App_gateway');
        $this->load->library('gateways/Paypal_braintree_gateway', '', 'paypal_braintree_gateway');
        $this->load->library('session');
    }

    public function complete_purchase()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['nonce']      =  $this->input->post('payment_method_nonce');
            $data['currency']    = $this->input->post('currency');
            $data['braintree'] = $this->Common_Model->braintreedetails();
            
            $oResponse      = $this->paypal_braintree_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $data['transactionid'] = $transactionid;
                $paymentResponse = $this->paypal_braintree_gateway->fetch_payment($transactionid,$data['braintree']);
                $paymentData      = $paymentResponse->getData();
                redirect(site_url('backend/common/paymentgateway?msg=success'));
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
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
        $data['total']        = $this->input->get('total');
        $data['client_token'] = $this->paypal_braintree_gateway->generate_token();
        echo $this->get_view($data);
    }
    public function complete_purchase_booking()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['nonce']      =  $this->input->post('payment_method_nonce');
            $data['currency']    = $this->input->post('currency');
            $data['braintree'] = $this->Common_Model->braintreedetails();
            
            $oResponse      = $this->paypal_braintree_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $data['transactionid'] = $transactionid;
                $paymentResponse = $this->paypal_braintree_gateway->fetch_payment($transactionid,$data['braintree']);
                $paymentData      = $paymentResponse->getData();
                $total =  $paymentData->amount;
                $currency = $paymentData->currencyIsoCode;
                redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=braintree'));
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
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['nonce']      =  $this->input->post('payment_method_nonce');
            $data['currency']    = $this->input->post('currency');
            $data['braintree'] = $this->Common_Model->braintreedetails();
            
            $oResponse      = $this->paypal_braintree_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $data['transactionid'] = $transactionid;
                $paymentResponse = $this->paypal_braintree_gateway->fetch_payment($transactionid,$data['braintree']);
                $paymentData      = $paymentResponse->getData();
                $total =  $paymentData->amount;
                $currency = $paymentData->currencyIsoCode;
                redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=braintree'));
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
                redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
        }
    }
  }


public function get_view($data = array()){ ?>
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
    <script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="col-md-8 col-md-offset-2 mtop30">
        <div class="row">
          <div class="panel_s">
            <div class="panel-body">
             <h4 class="no-margin">
              <?php echo _l('payment_for_invoice'); ?>
              <a href="<?php echo site_url('viewinvoice/'. $data['invoice']->id . '/' . $data['invoice']->hash); ?>">
              <?php echo format_invoice_number($data['invoice']->id); ?>
              </a>
            </h4>
            <hr />
            <p>
              <span class="bold">
                <?php echo _l('payment_total',format_money($data['total'],$data['invoice']->symbol)); ?>
              </span>
            </p>
            <form method="post" id="payment-form" action="<?php echo site_url('gateways/braintree/complete_purchase'); ?>">
              <section>
                <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
                </div>
                <input id="amount" name="amount" type="hidden" value="<?php echo number_format($data['total'], 2, '.', ''); ?>">
                <input type="hidden" name="invoiceid" value="<?php echo $data['invoice']->id; ?>">
              </section>
              <div class="text-center" style="margin-top:15px;">
                <button class="btn btn-info" type="submit"><?php echo _l('submit_payment'); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      braintree.setup('<?php echo $data['client_token']; ?>', 'dropin', {
        container: 'bt-dropin'
      });
    </script>
  </body>
  </html>
  <?php }
}
