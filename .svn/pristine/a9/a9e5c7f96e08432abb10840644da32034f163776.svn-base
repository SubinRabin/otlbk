<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Omnipay\Omnipay;

require_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');

class Authorize_aim_gateway extends App_gateway
{
    public function __construct()
    {
        /**
        * Call App_gateway __construct function
        */
        parent::__construct();
        /**
         * REQUIRED
         * Gateway unique id
         * The ID must be alpha/alphanumeric
         */
         $this->ci->load->helper('common');
        $this->setId('authorize_aim');

        /**
         * REQUIRED
         * Gateway name
         */
        $this->setName('Authorize.net AIM');

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

        // add_action('before_render_payment_gateway_settings', 'authorize_aim_notice');
    }

    public function process_payment($data)
    {
        $this->ci->session->set_userdata(array(
            'total_authorize' => preg_replace('[,]','',$data['amount'])
        ));

        redirect(site_url('gateways/authorize_aim/make_payment?invoiceid=' . $data['invoiceid'] . '&total=' . $data['amount'] . '&hash=' . $data['invoice']->hash));
    }

    public function finish_payment($data)
    {
        $gateway = Omnipay::create('AuthorizeNet_AIM');
        $gateway->setApiLoginId($data['aimdata'][0]->loginid);
        $gateway->setTransactionKey($data['aimdata'][0]->trans_id);

        $gateway->setTestMode($data['aimdata'][0]->test_enable);
        // $gateway->setDeveloperMode($data['aimdata'][0]->developer_enable);
        $gateway->setDeveloperMode(1);

        $billing_data = array();

        $billing_data['billingCompany']  = 'test';
        $billing_data['billingAddress1'] = $this->ci->input->post('billingAddress1');
        $billing_data['billingName']     = $this->ci->input->post('billingName');
        $billing_data['billingCity']     = $this->ci->input->post('billingCity');
        $billing_data['billingState']    = $this->ci->input->post('billingState');
        $billing_data['billingPostcode'] = $this->ci->input->post('billingPostcode');
        $billing_data['billingCountry']  = $this->ci->input->post('billingCountry');
        $billing_data['number']      = $this->ci->input->post('ccNo');
        $billing_data['expiryMonth'] = $this->ci->input->post('expMonth');
        $billing_data['expiryYear']  = $this->ci->input->post('expYear');
        $billing_data['cvv']         = $this->ci->input->post('cvv');
        $requestData = array(
            'amount' => number_format($data['amount'], 2, '.', ''),
            'currency' => $this->ci->input->post('currency'),
            'description' => 'test payment',
            'transactionId' => 'TESTINV003',
            'invoiceNumber'=> 'TESTINV003',
            'card' => $billing_data
        );
        $oResponse = $gateway->purchase($requestData)->send();
        return $oResponse;
    }
    public function finish_payment_booking($data)
    {
        $gateway = Omnipay::create('AuthorizeNet_AIM');
        $gateway->setApiLoginId($data['aimdata'][0]->loginid);
        $gateway->setTransactionKey($data['aimdata'][0]->trans_id);

        $gateway->setTestMode($data['aimdata'][0]->test_enable);
        // $gateway->setDeveloperMode($data['aimdata'][0]->developer_enable);
        $gateway->setDeveloperMode(1);

        $billing_data = array();

        $billing_data['billingCompany']  = 'test';
        $billing_data['billingAddress1'] = $this->ci->input->post('billingAddress1');
        $billing_data['billingName']     = $this->ci->input->post('billingName');
        $billing_data['billingCity']     = $this->ci->input->post('billingCity');
        $billing_data['billingState']    = $this->ci->input->post('billingState');
        $billing_data['billingPostcode'] = $this->ci->input->post('billingPostcode');
        $billing_data['billingCountry']  = $this->ci->input->post('billingCountry');
        $billing_data['number']      = $this->ci->input->post('ccNo');
        $billing_data['expiryMonth'] = $this->ci->input->post('expMonth');
        $billing_data['expiryYear']  = $this->ci->input->post('expYear');
        $billing_data['cvv']         = $this->ci->input->post('cvv');
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYHOTEL-".$max_id[0]->id;
        $requestData = array(
            'amount' => number_format($data['amount'], 2, '.', ''),
            'currency' => $this->ci->input->post('currency'),
            'description' => 'hotel booking payment',
            'transactionId' => $max_transid,
            'invoiceNumber'=> $max_transid,
            'card' => $billing_data
        );
        $oResponse = $gateway->purchase($requestData)->send();
        return $oResponse;
    }
    public function finish_payment_xml_booking($data)
    {
        $gateway = Omnipay::create('AuthorizeNet_AIM');
        $gateway->setApiLoginId($data['aimdata'][0]->loginid);
        $gateway->setTransactionKey($data['aimdata'][0]->trans_id);

        $gateway->setTestMode($data['aimdata'][0]->test_enable);
        // $gateway->setDeveloperMode($data['aimdata'][0]->developer_enable);
        $gateway->setDeveloperMode(1);

        $billing_data = array();

        $billing_data['billingCompany']  = 'test';
        $billing_data['billingAddress1'] = $this->ci->input->post('billingAddress1');
        $billing_data['billingName']     = $this->ci->input->post('billingName');
        $billing_data['billingCity']     = $this->ci->input->post('billingCity');
        $billing_data['billingState']    = $this->ci->input->post('billingState');
        $billing_data['billingPostcode'] = $this->ci->input->post('billingPostcode');
        $billing_data['billingCountry']  = $this->ci->input->post('billingCountry');
        $billing_data['number']      = $this->ci->input->post('ccNo');
        $billing_data['expiryMonth'] = $this->ci->input->post('expMonth');
        $billing_data['expiryYear']  = $this->ci->input->post('expYear');
        $billing_data['cvv']         = $this->ci->input->post('cvv');
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYHOTEL-".$max_id[0]->id;
        $requestData = array(
            'amount' => number_format($data['amount'], 2, '.', ''),
            'currency' => $this->ci->input->post('currency'),
            'description' => 'hotel booking payment',
            'transactionId' => $max_transid,
            'invoiceNumber'=> $max_transid,
            'card' => $billing_data
        );
        $oResponse = $gateway->purchase($requestData)->send();
        return $oResponse;
    }
}


function authorize_aim_notice($gateway)
{
    if ($gateway['id'] == 'authorize_aim') {
        echo '<p class="text-warning">' . _l('authorize_notice') . '</p>';
        echo '<p class="text-dark"><b>' . _l('currently_supported_currencies') . '</b>: USD, AUD, GBP, CAD, EUR, NZD</p>';
    }
}
