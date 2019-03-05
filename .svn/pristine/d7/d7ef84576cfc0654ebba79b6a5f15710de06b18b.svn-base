<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Omnipay\Omnipay;

require_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');

class Mollie_gateway extends App_gateway
{
    public function __construct() {

         /**
         * Call App_gateway __construct function
         */
        parent::__construct();
        $this->ci->load->library('session');
        /**
         * REQUIRED
         * Gateway unique id
         * The ID must be alpha/alphanumeric
         */
        $this->setId('mollie');

        /**
         * REQUIRED
         * Gateway name
         */
        $this->setName('Mollie');

        /**
         * Add gateway settings
        */
        $this->setSettings(array(
            array(
                'name' => 'api_key',
                'encrypted' => true,
                'label' => 'settings_paymentmethod_mollie_api_key'
            ),
            array(
                'name' => 'currencies',
                'label' => 'currency',
                'default_value' => 'EUR'
            ),
            array(
                'name' => 'test_mode_enabled',
                'type' => 'yes_no',
                'default_value' => 1,
                'label' => 'settings_paymentmethod_testing_mode'
            )
        ));

        /**
         * REQUIRED
         * Hook gateway with other online payment modes
         */
       // add_action('before_add_online_payment_modes', array( $this, 'initMode' ));
    }
    public function process_payment($data,$mollie) {
        $gateway = Omnipay::create('Mollie');
        $gateway->setApiKey($mollie[0]->api_key);
        $oResponse = $gateway->purchase(array(
            'amount' => number_format($data['amount'], 2, '.', ''),
            'description' => 'Mollie test payment',
            'returnUrl' => site_url('gateways/mollie/verify_payment'),
            // 'returnUrl' => site_url('gateways/mollie/verify_payment?token='.$oResponse->getTransactionReference()),
            // 'notifyUrl' => site_url('gateways/mollie/webhook'),
            'notifyUrl' => site_url('gateways/mollie/webhook'),
            'metadata' => array(
                'order_id' => 'TESTINV002'
            )
        ))->send();  
        $token = $oResponse->getTransactionReference();
        $this->ci->session->set_userdata('Mollietoken',$token);
 
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } elseif ($oResponse->isPending()) {
            echo "Pending, Reference: " . $oResponse->getTransactionReference();
        } else {
            echo "Error " . $oResponse->getCode() . ': ' . $oResponse->getMessage();
        }
    }

    public function fetch_payment($data,$api_key) {
        $gateway = Omnipay::create('Mollie');
        $gateway->setApiKey($api_key);
        return $gateway->fetchTransaction(array(
            'transactionReference' => $data['transaction_id']
        ))->send();
    }
    public function process_payment_booking($mollie) {
        $gateway = Omnipay::create('Mollie');
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $gateway->setApiKey($mollie[0]->api_key);
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYTRANSACTION-".$max_id[0]->id;
        $amount = xml_currency_change($total,agent_currency(),'EUR');
        $oResponse = $gateway->purchase(array(
            'amount' => number_format($amount, 2, '.', ''),
            'description' => 'Hotel booking payment',
            'returnUrl' => site_url('gateways/mollie/verify_payment_booking'),
            // 'returnUrl' => site_url('gateways/mollie/verify_payment?token='.$oResponse->getTransactionReference()),
            // 'notifyUrl' => site_url('gateways/mollie/webhook'),
            'notifyUrl' => site_url('gateways/mollie/webhook_booking'),
            'metadata' => array(
                'order_id' => $max_transid 
            )
        ))->send();  
        $token = $oResponse->getTransactionReference();
        $this->ci->session->set_userdata('Mollietoken',$token);
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } elseif ($oResponse->isPending()) {
            echo "Pending, Reference: " . $oResponse->getTransactionReference();
        } else {
            echo "Error " . $oResponse->getCode() . ': ' . $oResponse->getMessage();
        }
    }
    public function fetch_payment_booking($data,$api_key) {
        $gateway = Omnipay::create('Mollie');
        $gateway->setApiKey($api_key);
        return $gateway->fetchTransaction(array(
            'transactionReference' => $data['transaction_id']
        ))->send();
    }
    public function process_payment_xml_booking($mollie) {
        $gateway = Omnipay::create('Mollie');
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $gateway->setApiKey($mollie[0]->api_key);
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYTRANSACTION-".$max_id[0]->id;
        $amount = xml_currency_change($total,agent_currency(),'EUR');
        $oResponse = $gateway->purchase(array(
            'amount' => number_format($amount, 2, '.', ''),
            'description' => 'Hotel booking payment',
            'returnUrl' => site_url('gateways/mollie/verify_payment_xml_booking'),
            // 'returnUrl' => site_url('gateways/mollie/verify_payment?token='.$oResponse->getTransactionReference()),
            // 'notifyUrl' => site_url('gateways/mollie/webhook'),
            'notifyUrl' => site_url('gateways/mollie/webhook_xml_booking'),
            'metadata' => array(
                'order_id' => $max_transid 
            )
        ))->send();  
        $token = $oResponse->getTransactionReference();
        $this->ci->session->set_userdata('Mollietoken',$token);
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } elseif ($oResponse->isPending()) {
            echo "Pending, Reference: " . $oResponse->getTransactionReference();
        } else {
            echo "Error " . $oResponse->getCode() . ': ' . $oResponse->getMessage();
        }
    }
    public function fetch_payment_xml_booking($data,$api_key) {
        $gateway = Omnipay::create('Mollie');
        $gateway->setApiKey($api_key);
        return $gateway->fetchTransaction(array(
            'transactionReference' => $data['transaction_id']
        ))->send();
    }
}
