<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telr extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("Common_Model");
        $this->load->helper("form");
        $this->load->helper("common");
        $this->load->library('gateways/App_gateway', '', 'App_gateway');
        $this->load->library('gateways/telr_gateway', '', 'telr_gateway');
        $this->load->library('session');
    }
    public function make_payment() {
        $data['total']        = $this->input->get('total');
        $data['currency']     = $this->input->get('currency');
        $details = $this->Common_Model->telrdetails();
        $params = array(
            'ivp_method'  => 'create',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'ivp_cart'    => 'HOB'.date('mDHis'),  
            'ivp_test'    => $details[0]->test_enable,
            'ivp_amount'  => $data['total'],
            'ivp_currency'=> $data['currency'],
            'ivp_desc'    => 'Test payment from otelseasy',
            'return_auth' => base_url().'gateways/telr/complete_payment',
            'return_can'  => base_url().'gateways/telr/complete_payment',
            'return_decl' => base_url().'gateways/telr/complete_payment'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        curl_close($ch);
        $results = json_decode($results,true);
        $ref= trim($results['order']['ref']);
        $this->session->set_userdata('telr_order',$ref);
        $url= trim($results['order']['url']);
        if (empty($ref) || empty($url)) {
            redirect(site_url('backend/common/paymentgateway?msg=failed'));
        } 
        else {
            redirect($url);
        }
    }
    public function complete_payment() {
          $details = $this->Common_Model->telrdetails();
          $order_ref = $this->session->userdata('telr_order');
          $params = array(
            'ivp_method'  => 'check',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'order_ref'    =>  $order_ref,  
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        $results = json_decode($results,true);
        $transaction_id = $results['order']['transaction']['ref'];
        if($results['order']['transaction']['status']=='A') {
            redirect(site_url('backend/common/paymentgateway?msg=success'));
        } else {
            redirect(site_url('backend/common/paymentgateway?msg=failed'));
        }
    }    
    public function make_payment_booking() {
        $data['total']        = $this->input->get('total');
        $data['currency']     = $this->input->get('currency');
        $details = $this->Common_Model->telrdetails();
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYHOTEL-".$max_id[0]->id;
        $params = array(
            'ivp_method'  => 'create',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'ivp_cart'    => $max_transid,  
            'ivp_test'    => $details[0]->test_enable,
            'ivp_amount'  => $data['total'],
            'ivp_currency'=> $data['currency'],
            'ivp_desc'    => 'Otelseasy hotel booking',
            'return_auth' => base_url().'gateways/telr/complete_payment_booking',
            'return_can'  => base_url().'gateways/telr/complete_payment_booking',
            'return_decl' => base_url().'gateways/telr/complete_payment_booking'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        curl_close($ch);
        $results = json_decode($results,true);
        $ref= trim($results['order']['ref']);
        $this->session->set_userdata('telr_order',$ref);
        $url= trim($results['order']['url']);
        if (empty($ref) || empty($url)) {
            redirect(site_url('payment/booking_online_payment_response?msg=failed'));
        } 
        else {
            redirect($url);
        }
    }
    public function complete_payment_booking() {
        $details = $this->Common_Model->telrdetails();
        $order_ref = $this->session->userdata('telr_order');
        $params = array(
            'ivp_method'  => 'check',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'order_ref'    =>  $order_ref,  
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        $results = json_decode($results,true);
        if($results['order']['transaction']['status']=='A') {
            $transaction_id = $results['order']['transaction']['ref'];
            $amount = $results['order']['amount'];
            $currency = $results['order']['currency'];
            $trans_id = $results['order']['cartid'];
            redirect(site_url('payment/booking_online_payment_response?ordernumber='.$transaction_id.'&amount='.$amount.'&currency='.$currency.'&msg=success&transid='.$trans_id.'&gateway=Telr'));
        } else {
            redirect(site_url('payment/booking_online_payment_response?msg=failed'));
        }
    }    
    public function make_payment_xml_booking() {
        $data['total']        = $this->input->get('total');
        $data['currency']     = $this->input->get('currency');
        $details = $this->Common_Model->telrdetails();
        $max_id = getTransactionid();
        $max_transid = "OTELSEASYHOTEL-".$max_id[0]->id;
        $params = array(
            'ivp_method'  => 'create',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'ivp_cart'    => $max_transid,  
            'ivp_test'    => $details[0]->test_enable,
            'ivp_amount'  => $data['total'],
            'ivp_currency'=> $data['currency'],
            'ivp_desc'    => 'Otelseasy hotel booking',
            'return_auth' => base_url().'gateways/telr/complete_payment_xml_booking',
            'return_can'  => base_url().'gateways/telr/complete_payment_xml_booking',
            'return_decl' => base_url().'gateways/telr/complete_payment_xml_booking'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        curl_close($ch);
        $results = json_decode($results,true);
        $ref= trim($results['order']['ref']);
        $this->session->set_userdata('telr_order',$ref);
        $url= trim($results['order']['url']);
        if (empty($ref) || empty($url)) {
            redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
        } 
        else {
            redirect($url);
        }
    }
    public function complete_payment_xml_booking() {
        $details = $this->Common_Model->telrdetails();
        $order_ref = $this->session->userdata('telr_order');
        $params = array(
            'ivp_method'  => 'check',
            'ivp_store'   => $details[0]->store_id,
            'ivp_authkey' => $details[0]->auth_id,
            'order_ref'    =>  $order_ref,  
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $results = curl_exec($ch);
        $error= curl_error($ch);
        $results = json_decode($results,true);
        if($results['order']['transaction']['status']=='A') {
            $transaction_id = $results['order']['transaction']['ref'];
            $amount = $results['order']['amount'];
            $currency = $results['order']['currency'];
            $trans_id = $results['order']['cartid'];
            redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$transaction_id.'&amount='.$amount.'&currency='.$currency.'&msg=success&transid='.$trans_id.'&gateway=Telr'));
        } else {
            redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
        }
    }    
}
?>
