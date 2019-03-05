<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mollie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_Model');
        $this->load->library('gateways/App_gateway', '', 'App_gateway');
        $this->load->library('gateways/Mollie_gateway', '', 'mollie_gateway');
        $this->load->library('session');
    }

    public function verify_payment()
    {
        // $token = $this->session->userdata('token');
        $Mollietoken = $this->session->userdata('Mollietoken');

        $molliedata = $this->Common_Model->molliedetails();
        $oResponse = $this->mollie_gateway->fetch_payment(array(
            'transaction_id' => $Mollietoken),$molliedata[0]->api_key);
        if ($oResponse->isSuccessful()) {
            $data = $oResponse->getData();
            if ($data['status'] == 'paid') {
            redirect(site_url('backend/common/paymentgateway?msg=success'));
            }
        } else {
             redirect(site_url('backend/common/paymentgateway?msg=failed'));
        }
        //redirect(site_url('viewinvoice/' . $invoice->id . '/' . $invoice->hash));
    }

    public function webhook()
    {
        $molliedata = $this->Common_Model->molliedetails();
        $ip = $this->input->ip_address();
        if (ip_in_range($ip, '87.233.229.26-87.233.229.27')) {
            $trans_id  = $this->input->post('id');
            $oResponse = $this->mollie_gateway->fetch_payment(array(
                'transaction_id' => $trans_id
            ),$molliedata[0]->api_key);
            $data      = $oResponse->getData();
            if ($data['status'] == 'paid') {
                // Add payment to database
                $payment_data['amount']        = $data['amount'];
                $payment_data['invoiceid']     = $data['metadata']['order_id'];
                $payment_data['paymentmode']   = $this->mollie_gateway->getId();
                $payment_data['paymentmethod']   = $data['method'];
                $payment_data['transactionid'] = $trans_id;
                // $this->load->model('payments_model');
                // $this->payments_model->add($payment_data);
            } elseif ($data['status'] == 'refunded' || $data['status'] == 'cancelled' || $data['status'] == 'charged_back') {
                // $this->db->where('invoiceid', $data['metadata']['order_id']);
                // $this->db->where('transactionid', $trans_id);
                // $this->db->delete('tblinvoicepaymentrecords');
                // update_invoice_status($data['metadata']['order_id']);
            }

            header("HTTP/1.1 200 OK");
        }
    }
    public function verify_payment_booking()
    {
        $Mollietoken = $this->session->userdata('Mollietoken');
        
        $molliedata = $this->Common_Model->molliedetails();
        $oResponse = $this->mollie_gateway->fetch_payment_booking(array(
            'transaction_id' => $Mollietoken),$molliedata[0]->api_key);

        if ($oResponse->isSuccessful()) {
            $data = $oResponse->getData();
            if ($data['status'] == 'paid') {
                redirect(site_url('payment/booking_online_payment_response?ordernumber='.$data['id'].'&amount='.$data['amount'].'&currency=EUR&msg=success&transid='.$data['metadata']['order_id'].'&gateway=mollie'));  
            }
        } else {
            redirect(site_url('payment/booking_online_payment_response?msg=failed'));
        }
    }
    public function webhook_booking()
    {
        $molliedata = $this->Common_Model->molliedetails();
        $ip = $this->input->ip_address();
        if (ip_in_range($ip, '87.233.229.26-87.233.229.27')) {
            $trans_id  = $this->input->post('id');
            $oResponse = $this->mollie_gateway->fetch_payment(array(
                'transaction_id' => $trans_id
            ),$molliedata[0]->api_key);
            $data      = $oResponse->getData();
            if ($data['status'] == 'paid') {
                // Add payment to database
                $payment_data['amount']        = $data['amount'];
                $payment_data['invoiceid']     = $data['metadata']['order_id'];
                $payment_data['paymentmode']   = $this->mollie_gateway->getId();
                $payment_data['paymentmethod']   = $data['method'];
                $payment_data['transactionid'] = $trans_id;
                // $this->load->model('payments_model');
                // $this->payments_model->add($payment_data);
            } elseif ($data['status'] == 'refunded' || $data['status'] == 'cancelled' || $data['status'] == 'charged_back') {
                // $this->db->where('invoiceid', $data['metadata']['order_id']);
                // $this->db->where('transactionid', $trans_id);
                // $this->db->delete('tblinvoicepaymentrecords');
                // update_invoice_status($data['metadata']['order_id']);
            }

            header("HTTP/1.1 200 OK");
        }
    }
    public function verify_payment_xml_booking()
    {
        $Mollietoken = $this->session->userdata('Mollietoken');        
        $molliedata = $this->Common_Model->molliedetails();
        $oResponse = $this->mollie_gateway->fetch_payment_xml_booking(array(
            'transaction_id' => $Mollietoken),$molliedata[0]->api_key);

        if ($oResponse->isSuccessful()) {
            $data = $oResponse->getData();
            if ($data['status'] == 'paid') {
                redirect(site_url('payment/xml_booking_online_payment_response?ordernumber='.$data['id'].'&amount='.$data['amount'].'&currency=EUR&msg=success&transid='.$data['metadata']['order_id'].'&gateway=mollie'));  
            }
        } else {
            redirect(site_url('payment/xml_booking_online_payment_response?msg=failed'));
        }
    }
    public function webhook_xml_booking()
    {
        $molliedata = $this->Common_Model->molliedetails();
        $ip = $this->input->ip_address();
        if (ip_in_range($ip, '87.233.229.26-87.233.229.27')) {
            $trans_id  = $this->input->post('id');
            $oResponse = $this->mollie_gateway->fetch_payment_xml_booking(array(
                'transaction_id' => $trans_id
            ),$molliedata[0]->api_key);
            $data      = $oResponse->getData();
            if ($data['status'] == 'paid') {
                // Add payment to database
                $payment_data['amount']        = $data['amount'];
                $payment_data['invoiceid']     = $data['metadata']['order_id'];
                $payment_data['paymentmode']   = $this->mollie_gateway->getId();
                $payment_data['paymentmethod']   = $data['method'];
                $payment_data['transactionid'] = $trans_id;
                // $this->load->model('payments_model');
                // $this->payments_model->add($payment_data);
            } elseif ($data['status'] == 'refunded' || $data['status'] == 'cancelled' || $data['status'] == 'charged_back') {
                // $this->db->where('invoiceid', $data['metadata']['order_id']);
                // $this->db->where('transactionid', $trans_id);
                // $this->db->delete('tblinvoicepaymentrecords');
                // update_invoice_status($data['metadata']['order_id']);
            }

            header("HTTP/1.1 200 OK");
        }
    }
}
