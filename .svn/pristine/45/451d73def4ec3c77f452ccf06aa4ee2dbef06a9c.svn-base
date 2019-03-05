<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Omnipay\Omnipay;

require_once(APPPATH . 'third_party/omnipay/vendor/autoload.php');
class Telr_gateway extends App_gateway {
    public function __construct() {
        parent::__construct();
        $this->ci->load->library('session');
        $this->ci->load->model('Common_Model');
    }
    public function process_test_payment($data) {
       redirect(site_url('gateways/telr/make_payment?total=' . $data['amount'].'&currency='.$data['currency']));
    }
    public function process_payment_booking($data)  {
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        redirect(site_url('gateways/telr/make_payment_booking?total=' . $total.'&currency='.$currency));
    }
    public function process_payment_xml_booking($data)
    {
        $currency = $this->ci->session->userdata('pay_currency');
        $total = $this->ci->session->userdata('totalamount');
        redirect(site_url('gateways/telr/make_payment_xml_booking?total=' . $total.'&currency='.$currency));
    }
}



   