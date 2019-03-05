<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authorize_sim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function complete_purchase()
    {
        if ($this->input->post()) {
            $data = $this->input->post();

           
            $success = false;
                if ($data['x_response_code'] == '1') {
                    // Add payment to database
                    $payment_data['amount']        = $data['x_amount'];
                    $payment_data['invoiceid']     = 'TESTINV008';
                    $payment_data['paymentmode']   = $this->authorize_sim_gateway->getId();
                    $payment_data['transactionid'] = $data['x_trans_id'];
                    redirect(site_url('backend/common/paymentgateway?msg=success'));
                } else {
                    redirect(site_url('backend/common/paymentgateway?msg=failed'));
                }

        }
    }

    private function receipt($success, $invoice, $message, $data)
    {
        echo '<div style="width:600px;margin:0 auto;display:block; text-center">';
        if ($success) {
            $message_styling = 'color:#84c529';
        } else {
            $message_styling = 'color:#ff6f00';
        }
        echo '<h1 style="' . $message_styling . '">' . $message . '</h1>';
        do_action('after_authorize_sim_receipt_is_shown', array(
            'success' => $success,
            'invoice' => $invoice,
            'message' => $message
        ));
        if ($invoice) {
            echo '<a href="' . site_url('viewinvoice/' . $invoice->id . '/' . $invoice->hash) . '">Back to invoice</a>';
        } else {
            echo '<a href="' . site_url() . '">Back to merchant</a>';
        }
        echo '</div>';
    }
    public function complete_purchase_booking()
    {
        if ($this->input->post()) {
            $data = $this->input->post();

           
            $success = false;
            print_r($payment_data);exit;
                if ($data['x_response_code'] == '1') {
                    // Add payment to database
                    $amount        = $data['x_amount'];
                    $invoiceid     = 'TESTINV008';
                    $paymentmode   = $this->authorize_sim_gateway->getId();
                    $transactionid = $data['x_trans_id'];
                    redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$amount.'&currency=USD&msg=success&transid=0&gateway=authorize_sim'))
                } else {
                    redirect(site_url('payment/booking_online_payment_response?msg=failed'))
                }

        }
    }
    public function complete_purchase_xml_booking()
    {
        if ($this->input->post()) {
            $data = $this->input->post();

           
            $success = false;
            print_r($payment_data);exit;
                if ($data['x_response_code'] == '1') {
                    // Add payment to database
                    $amount       = $data['x_amount'];
                    $invoiceid    = 'TESTINV008';
                    $paymentmode   = $this->authorize_sim_gateway->getId();
                    $transactionid = $data['x_trans_id'];
                    redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$amount.'&currency=USD&msg=success&transid=0&gateway=authorize_sim'))
                } else {
                    redirect(site_url('payment/booking_online_payment_response?msg=failed'))
                }

        }
    }

}
