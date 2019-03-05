<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Omnipay\Omnipay;

require_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');

class Authorize_sim_gateway extends App_gateway
{
    public function __construct()
    {
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
        $this->setId('authorize_sim');

        /**
         * REQUIRED
         * Gateway name
         */
        $this->setName('Authorize.net SIM');

        /**
         * Add gateway settings
        */
        $this->setSettings(array(

            array(
                'name' => 'api_login_id',
                'encrypted' => true,
                'label' => 'settings_paymentmethod_authorize_api_login_id'
            ),
            array(
                'name' => 'api_transaction_key',
                'label' => 'settings_paymentmethod_authorize_api_transaction_key',
                'encrypted' => true
            ),
            array(
                'name' => 'api_secret_key',
                'label' => 'settings_paymentmethod_authorize_secret_key',
                'encrypted' => true
            ),
            array(
                'name' => 'currencies',
                'label' => 'currency',
                'default_value' => 'USD'
            ),
            array(
                'name' => 'test_mode_enabled',
                'type' => 'yes_no',
                'default_value' => 0,
                'label' => 'settings_paymentmethod_testing_mode'
            ),
            array(
                'name' => 'developer_mode_enabled',
                'type' => 'yes_no',
                'default_value' => 1,
                'label' => 'settings_paymentmethod_developer_mode'
            )
        ));

        /**
        * REQUIRED
        * Hook gateway with other online payment modes
        */
        // add_action('before_add_online_payment_modes', array( $this, 'initMode' ));
        // add_action('before_render_payment_gateway_settings', 'authorize_sim_notice');
    }

    public function process_payment($data,$details)
    {
        $gateway = Omnipay::create('AuthorizeNet_SIM');
        $gateway->setApiLoginId($details[0]->loginid);
        $gateway->setTransactionKey($details[0]->trans_id);
        $gateway->setHashSecret($details[0]->secret_key);
        $gateway->setTestMode($details[0]->test_enable);
        $gateway->setDeveloperMode($details[0]->developer_enable);

        $billing_data['billingCompany']  = "test";
        $billing_data['billingAddress1'] = "test street";
        $billing_data['billingName']     = '';
        $billing_data['billingCity']     = "test city";
        $billing_data['billingState']    = "test_state";
        $billing_data['billingPostcode'] = "6585";

        $_country = 'UAE';
        

        $billing_data['billingCountry']  = $_country;
        $trans_id = time();

        $requestData = array(
                'amount' => number_format($data['amount'], 2, '.', ''),
                'currency' => $data['currency'],
                'returnUrl'=>site_url('gateways/authorize_sim/complete_purchase'),
                'description' => 'test payment',
                'transactionId' => $trans_id,
                'invoiceNumber'=>'TESTINV008',
                'card' => $billing_data
            );


        $oResponse = $gateway->purchase($requestData)->send();
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } else {
            // payment failed: display message to customer
            echo $oResponse->getMessage();
        }
    }
    public function process_payment_booking($details)
    {
        $gateway = Omnipay::create('AuthorizeNet_SIM');
        $gateway->setApiLoginId($details[0]->loginid);
        $gateway->setTransactionKey($details[0]->trans_id);
        $gateway->setHashSecret($details[0]->secret_key);
        $gateway->setTestMode($details[0]->test_enable);
        $gateway->setDeveloperMode($details[0]->developer_enable);
        $trans_id = time();
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $amount = xml_currency_change($total,agent_currency(),'USD');
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYTRANSACTION-".$max_id[0]->id;
        $billing_data[]="";

        $requestData = array(
                'amount' => number_format($amount, 2, '.', ''),
                'currency' => 'USD',
                'returnUrl'=>site_url('gateways/authorize_sim/complete_purchase_booking'),
                'description' => 'hotel booking',
                'transactionId' => $trans_id,
                'invoiceNumber'=> $max_transid,
                'card' => $billing_data
            );


        $oResponse = $gateway->purchase($requestData)->send();
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } else {
            echo $oResponse->getMessage();
        }
    }
    public function process_payment_xml_booking($details)
    {
        $gateway = Omnipay::create('AuthorizeNet_SIM');
        $gateway->setApiLoginId($details[0]->loginid);
        $gateway->setTransactionKey($details[0]->trans_id);
        $gateway->setHashSecret($details[0]->secret_key);
        $gateway->setTestMode($details[0]->test_enable);
        $gateway->setDeveloperMode($details[0]->developer_enable);
        $trans_id = time();
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $amount = xml_currency_change($total,agent_currency(),'USD');
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYTRANSACTION-".$max_id[0]->id;
        $billing_data[]="";

        $requestData = array(
                'amount' => number_format($amount, 2, '.', ''),
                'currency' => 'USD',
                'returnUrl'=>site_url('gateways/authorize_sim/complete_purchase_xml_booking'),
                'description' => 'hotel booking',
                'transactionId' => $trans_id,
                'invoiceNumber'=> $max_transid,
                'card' => $billing_data
            );


        $oResponse = $gateway->purchase($requestData)->send();
        if ($oResponse->isRedirect()) {
            $oResponse->redirect();
        } else {
            echo $oResponse->getMessage();
        }
    }
}
function authorize_sim_notice($gateway)
{
    if ($gateway['id'] == 'authorize_sim') {
        echo '<p class="text-dark"><b>' . _l('currently_supported_currencies') . '</b>: USD, AUD, GBP, CAD, EUR, NZD</p>';
    }
}


