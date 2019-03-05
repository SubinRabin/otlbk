<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Omnipay\Omnipay;

require_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');

class Paypal_gateway extends App_gateway
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
        $this->setId('paypal');

        /**
         * REQUIRED
         * Gateway name
         */
        $this->setName('Paypal');

        /**
         * Add gateway settings
        */
        $this->setSettings(
        array(
            array(
                'name'=>'username',
                'encrypted'=>true,
                'label'=>'settings_paymentmethod_paypal_username',
                ),
            array(
                'name'=>'password',
                'encrypted'=>true,
                'label'=>'settings_paymentmethod_paypal_password',
                ),
            array(
                'name'=>'signature',
                'encrypted'=>true,
                'label'=>'settings_paymentmethod_paypal_signature',
                ),
            array(
                'name'=>'currencies',
                'label'=>'settings_paymentmethod_currencies',
                'default_value'=>'EUR,USD',
                ),
            array(
                'name'=>'test_mode_enabled',
                'type'=>'yes_no',
                'default_value'=>1,
                'label'=>'settings_paymentmethod_testing_mode',
                ),
            )
        );

        /**
         * REQUIRED
         * Hook gateway with other online payment modes
         */
       // add_action('before_add_online_payment_modes', array( $this, 'initMode' ));
    }

    /**
     * REQUIRED FUNCTION
     * @param  array $data
     * @return mixed
     */
    public function process_payment($data,$details)
    {
        // Process online for PayPal payment start
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($details[0]->username);
        $gateway->setPassword($details[0]->password);
        $gateway->setSignature($details[0]->signature);
        $gateway->setTestMode($details[0]->enable);
        $gateway->setlogoImageUrl(base_url('skin/images/dash/logo.png'));
        $gateway->setbrandName('otelseasy');

        $request_data = array(
            'amount' => number_format($data['amount'], 2, '.', ''),
            'returnUrl' => site_url('gateways/paypal/complete_purchase'),
            'cancelUrl' => site_url('backend/common/paymentgateway'),
            'currency' => $data['currency'],
            'description' =>'test paypal payment',
            );
        try {
            $response = $gateway->purchase($request_data)->send();
            if ($response->isRedirect()) {
                $this->ci->session->set_userdata(array(
                    'online_payment_amount' => number_format($data['amount'], 2, '.', ''),
                    'currency' => $data['currency'],
                    ));
                $response->redirect();
            } else {
                exit($response->getMessage());
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br />';
            exit('Sorry, there was an error processing your payment. Please try again later.');
        }
    }
    public function process_payment_booking($details)
    {
        // Process online for PayPal payment start
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($details[0]->username);
        $gateway->setPassword($details[0]->password);
        $gateway->setSignature($details[0]->signature);
        $gateway->setTestMode($details[0]->enable);
        $gateway->setlogoImageUrl(base_url('skin/images/dash/logo.png'));
        $gateway->setbrandName('otelseasy');
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $amount = xml_currency_change($total,agent_currency(),'USD');
        $request_data = array(
            'amount' => number_format($amount, 2, '.', ''),
            'returnUrl' => site_url('gateways/paypal/complete_purchase_booking'),
            'cancelUrl' => site_url('payment/booking_online_payment_response?msg=failed'),
            'currency' => 'USD',
            'description' =>'hotel booking',
            );
        try {
            $response = $gateway->purchase($request_data)->send();
            if ($response->isRedirect()) {
                $this->ci->session->set_userdata(array(
                    'online_payment_amount' => number_format($amount, 2, '.', ''),
                    'currency' => $currency,
                    ));
                $response->redirect();
            } else {
                exit($response->getMessage());
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br />';
            exit('Sorry, there was an error processing your payment. Please try again later.');
        }
    }
    public function process_payment_xml_booking($details)
    {
        // Process online for PayPal payment start
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($details[0]->username);
        $gateway->setPassword($details[0]->password);
        $gateway->setSignature($details[0]->signature);
        $gateway->setTestMode($details[0]->enable);
        $gateway->setlogoImageUrl(base_url('skin/images/dash/logo.png'));
        $gateway->setbrandName('otelseasy');
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        $amount = xml_currency_change($total,agent_currency(),'USD');
        $request_data = array(
            'amount' => number_format($amount, 2, '.', ''),
            'returnUrl' => site_url('gateways/paypal/complete_purchase_xml_booking'),
            'cancelUrl' => site_url('payment/xml_booking_online_payment_response?msg=failed'),
            'currency' => 'USD',
            'description' =>'hotel booking',
            );
        try {
            $response = $gateway->purchase($request_data)->send();
            if ($response->isRedirect()) {
                $this->ci->session->set_userdata(array(
                    'online_payment_amount' => number_format($amount, 2, '.', ''),
                    'currency' => $currency,
                    ));
                $response->redirect();
            } else {
                exit($response->getMessage());
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br />';
            exit('Sorry, there was an error processing your payment. Please try again later.');
        }
    }


    /**
     * Custom function to complete the payment after user is returned from paypal
     * @param  array $data
     * @return mixed
     */
    public function complete_purchase($data)
    {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername($data['username']);
        $gateway->setPassword($data['password']);
        $gateway->setSignature($data['signature']);
        $gateway->setTestMode($data['active']);

        $response       = $gateway->completePurchase(array(
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            ))->send();

        $paypalResponse = $response->getData();

        return $paypalResponse;
    }
}
