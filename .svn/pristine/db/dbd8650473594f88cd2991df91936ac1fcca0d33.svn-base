<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stripe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Common_Model");
        $this->load->helper("form");
        $this->load->library('gateways/App_gateway', '', 'App_gateway');
        $this->load->library('gateways/stripe_gateway', '', 'stripe_gateway');
        $this->load->library('session');
    }
    public function complete_purchase()
    {
        if ($this->input->post()) {

            $data      = $this->input->post();
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['description'] = 'test payment';
            $data['currency']    = $this->input->post('currency');
            $data['stripedata'] = $this->Common_Model->stripedetails();
            $oResponse      = $this->stripe_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $oResponse = $oResponse->getData();
                if ($oResponse['status'] == 'succeeded') {
                      redirect(site_url('backend/common/paymentgateway?msg=success'));                }
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
                 redirect(site_url('backend/common/paymentgateway?msg=failed'));
            }
        }
    }

    public function make_payment()
    {
        $data['total']        = $this->input->get('total');
        $data['currency']        = $this->input->get('currency');
        $stripedata = $this->Common_Model->stripedetails();
        $data['publish_key'] = $stripedata[0]->public_key;
        echo $this->get_view($data);
    }
    public function make_payment_booking()
    {
        $data['total']        = $this->input->get('total');
        $data['currency']        = $this->input->get('currency');
        $stripedata = $this->Common_Model->stripedetails();
        $data['publish_key'] = $stripedata[0]->public_key;
        $this->load->view('frontend/payments/stripe_payment',$data);
    }
    public function complete_purchase_booking()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['description'] = 'hotel booking payment';
            $data['currency']    = $this->input->post('currency');
            $data['stripedata'] = $this->Common_Model->stripedetails();
            $oResponse      = $this->stripe_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $oResponse = $oResponse->getData();
                $currency = $oResponse['currency'];
                if ($oResponse['status'] == 'succeeded') {
                      redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=stripe'));                }
            } elseif ($oResponse->isRedirect()) {
                $oResponse->redirect();
            } else {
                 redirect(site_url('payment/booking_online_payment_response?msg=failed'));
            }
        }
    }
    public function make_payment_xml_booking()
    {
        $data['total']        = $this->input->get('total');
        $data['currency']        = $this->input->get('currency');
        $stripedata = $this->Common_Model->stripedetails();
        $data['publish_key'] = $stripedata[0]->public_key;
        $this->load->view('frontend/payments/xml_stripe_payment',$data);
    }
    public function complete_purchase_xml_booking()
    {
        if ($this->input->post()) {
            $data      = $this->input->post();
            $total     = $this->input->post('total');
            $data['amount']      = $total;
            $data['description'] = 'hotel booking payment';
            $data['currency']    = $this->input->post('currency');
            $data['stripedata'] = $this->Common_Model->stripedetails();
            $oResponse      = $this->stripe_gateway->finish_payment($data);
            if ($oResponse->isSuccessful()) {
                $transactionid  = $oResponse->getTransactionReference();
                $oResponse = $oResponse->getData();
                $currency = $oResponse['currency'];
                if ($oResponse['status'] == 'succeeded') {
                      redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$total.'&currency='.$currency.'&msg=success&transid=0&gateway=stripe'));                }
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
                test payment
            </title>
           
          
            <!-- Bootstrap -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href='<?php echo base_url('assets/plugins/roboto/roboto.css'); ?>' rel='stylesheet'>
           
        </head>
        <body>
            <div class="container">
                <div class="col-md-8 col-md-offset-2 mtop30">
                    <div class="row">
                        <div class="panel_s">
                            <div class="panel-body">
                              
                              <hr />
                              <p>
                                  <!-- <span class="bold">
                                    <?php  echo $data['total'].' '.$data['currency']; ?>
                                  </span> -->
                              </p>
                              <?php 
                              $form = '<form action="' . site_url('gateways/stripe/complete_purchase') . '" method="POST">
                                <script 
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="' . $data['publish_key'] . '"
                                data-amount="' . ($data['total'] * 100). '"
                                data-name="test"
                                data-description="test payment";
                                data-locale="auto"
                                data-currency="'.$data['currency'].'"
                                >
                            </script>
                            '.form_hidden('total',$data['total']).'
                            '.form_hidden('currency',$data['currency']).'
                        </form>';
                        echo $form;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $('.stripe-button-el').hide();
                $('.stripe-button-el').click();
            });
        </script>
    </body>
    </html>
    <?php
    }
}
