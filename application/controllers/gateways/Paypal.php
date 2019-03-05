
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paypal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Common');

    }

    public function complete_purchase()
    {
        $online_payment_amount = $this->session->userdata('online_payment_amount');
        $currency              = $this->session->userdata('currency'); 
        $paypaldata = $this->Common_Model->paypaldetails();
        $paypalResponse = $this->paypal_gateway->complete_purchase(array(
            'amount' => $online_payment_amount,
            'currency' => $currency,
            'username' => $paypaldata[0]->username,
            'password' => $paypaldata[0]->password,
            'signature' => $paypaldata[0]->signature,
            'active' => $paypaldata[0]->enable
        ));
        
        // Check if error exists in the response
        if (isset($paypalResponse['L_ERRORCODE0'])) {
            set_alert('warning', $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0']);
            logActivity('Paypal Payment Error [Error CODE: ' . $paypalResponse['L_ERRORCODE0'] . ' Message: ' . $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0'] . ']');
            redirect(site_url('common/paymentgateway');
        } elseif (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Add payment to database
            $payment_data['amount']        = $online_payment_amount;
            $payment_data['paymentmode']   = $this->paypal_gateway->getId();
            $payment_data['transactionid'] = $paypalResponse['PAYMENTINFO_0_TRANSACTIONID'];
           
            $this->session->unset_userdata('online_payment_amount');
            $this->session->unset_userdata('currency');

            if ($success) {
                set_alert('success', _l('online_payment_recorded_success'));
            } else {
                set_alert('danger', _l('online_payment_recorded_success_fail_database'));
            }
            redirect(site_url('common/paymentgateway'));
        }
    }
    public function complete_purchase_booking()
    {
        $total = $this->session->userdata('online_payment_amount');
        $online_payment_amount = xml_currency_change($total,agent_currency(),'USD');
        $currency              = $this->session->userdata('currency'); 
        $paypaldata = $this->Common_Model->paypaldetails();
        $paypalResponse = $this->paypal_gateway->complete_purchase_booking(array(
            'amount' => $online_payment_amount,
            'currency' => 'USD',
            'username' => $paypaldata[0]->username,
            'password' => $paypaldata[0]->password,
            'signature' => $paypaldata[0]->signature,
            'active' => $paypaldata[0]->enable
        ));
        
        // Check if error exists in the response
        print_r($paypalResponse);exit;
        if (isset($paypalResponse['L_ERRORCODE0'])) {
            set_alert('warning', $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0']);
            logActivity('Paypal Payment Error [Error CODE: ' . $paypalResponse['L_ERRORCODE0'] . ' Message: ' . $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0'] . ']');
            redirect(site_url('payment/booking_online_payment_response?msg=failed');
        } elseif (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Add payment to database
            $amount        = $online_payment_amount;
            $paymentmode   = $this->paypal_gateway->getId();
            $transactionid = $paypalResponse['PAYMENTINFO_0_TRANSACTIONID'];
            $pcurrency =  $currency;
           
            $this->session->unset_userdata('online_payment_amount');
            $this->session->unset_userdata('currency');
            redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$amount.'&currency='.$pcurrency.'&msg=success&transid=0&gateway=paypal'));
        }
    }
    public function complete_purchase_xml_booking()
    {
        $total = $this->session->userdata('online_payment_amount');
        $online_payment_amount = xml_currency_change($total,agent_currency(),'USD');
        $currency              = $this->session->userdata('currency'); 
        $paypaldata = $this->Common_Model->paypaldetails();
        $paypalResponse = $this->paypal_gateway->complete_purchase_booking(array(
            'amount' => $online_payment_amount,
            'currency' => 'USD',
            'username' => $paypaldata[0]->username,
            'password' => $paypaldata[0]->password,
            'signature' => $paypaldata[0]->signature,
            'active' => $paypaldata[0]->enable
        ));
        
        // Check if error exists in the response
        print_r($paypalResponse);exit;
        if (isset($paypalResponse['L_ERRORCODE0'])) {
            set_alert('warning', $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0']);
            logActivity('Paypal Payment Error [Error CODE: ' . $paypalResponse['L_ERRORCODE0'] . ' Message: ' . $paypalResponse['L_SHORTMESSAGE0'] . '<br />' . $paypalResponse['L_LONGMESSAGE0'] . ']');
            redirect(site_url('payment/booking_online_payment_response?msg=failed');
        } elseif (isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            // Add payment to database
            $amount        = $online_payment_amount;
            $paymentmode   = $this->paypal_gateway->getId();
            $transactionid = $paypalResponse['PAYMENTINFO_0_TRANSACTIONID'];
            $pcurrency =  $currency;           
            $this->session->unset_userdata('online_payment_amount');
            $this->session->unset_userdata('currency');
            redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transactionid.'&amount='.$amount.'&currency='.$pcurrency.'&msg=success&transid=0&gateway=paypal'));
        }
    }
}
