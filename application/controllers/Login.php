<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('custom');
          $this->load->model('User_Model');
          $this->load->model('Hotels_Model');
          $this->load->helper('common');

     }
    
    public function index()
    { 
        if ($_REQUEST['agent_code']=="") {
          $Return['error'] = 'Agent Code field is required!';
          $Return['color'] = 'orange';
        }else if ($_REQUEST['user_name']=="") {
          $Return['error'] = 'User Name field is required!';
          $Return['color'] = 'orange';
        } else if ($_REQUEST['password']=="") {
          $Return['error'] = 'Password field is required!';
          $Return['color'] = 'orange';
        } else {
          $username  = $_REQUEST['user_name'];
          $password  = md5($_REQUEST['password']);
          $agent_code = $_REQUEST['agent_code'];
          $result = $this->User_Model->authorizeagent($username,$password,$agent_code);
          if ($result=="failed") {
              $Return['error'] = 'Login failed';
              $Return['color'] = 'red';
              OtherlogActivity('Agent login attempt failed [Agent Code: '.$agent_code.', Username: '.$username.']');
          } else  {
              OtherlogActivity('Agent login attempt success [Agent Code: '.$agent_code.', Username: '.$username.']');
              $active_data = array(
                'active_status' => '1'
              );
              $active_id = $this->User_Model->update_agent_active_status($result[0]->id,$active_data);
              $data = array(
                'is_logged_in' => '1',
                'last_login_date' => date('d-m-Y H:i:s')
              ); 
              $login_id = $this->User_Model->update_login_record_agent($data,$result[0]->id);
              $newdata = array(
                      'logeed_id'  => $login_id,
                      'agent_id'  => $result[0]->id,
                      'agent_email'     => $result[0]->Email,
                      'agent_name'     => $result[0]->First_Name." ".$result[0]->Last_Name,
                      'currency'     => agentIp_currency($result[0]->id),
              );
              
              $this->session->set_userdata($newdata);
              $Return['error'] = 'Login Successfully';
              $Return['color'] = 'green';
              $Return['status'] = '1';
          }
        }
        echo json_encode($Return);
    }
    public function general_settings() {
      $data['select']=$this->Common_Model->general_settings_select();
      $this->load->view('backend/general_settings',$data);
    }
    public function general_settings_update() {
      if ($_REQUEST['title']=="") {
          $Return['error'] = 'Title field is required';
          $Return['color'] = 'red';

      } else {
        $Return['error'] = 'Updated Successfully';
        $Return['color'] = 'green';
        $Return['status'] = '1';
      }      
      echo json_encode($Return);
    }
    public function adding_hotel() { 
        $property       = $_REQUEST['property'];
        $sell_currency  = $_REQUEST['sell_currency'];
        $star           = $_REQUEST['str1'];
        $vcc            = $_REQUEST['acs'];
        $num_room       = $_REQUEST['numroom'];
        $channel        = $_REQUEST['channel'];
        $website        = $_REQUEST['website'];
        $chain          = $_REQUEST['chain'];
        $sale_name      = $_REQUEST['sale_name'];
        $revenu_name    = $_REQUEST['revenu_name'];
        $contract_name  = $_REQUEST['contract_name'];
        $finance_name   = $_REQUEST['finance_name'];
        $sale_mail      = $_REQUEST['sale_mail'];
        $revenu_mail    = $_REQUEST['revenu_mail'];
        $contract_mail  = $_REQUEST['contract_mail'];
        $finance_mail   = $_REQUEST['finance_mail'];
        $sale_number    = $_REQUEST['sale_number'];
        $revenu_number  = $_REQUEST['revenu_number'];
        $contract_number= $_REQUEST['contract_number'];
        $finance_number = $_REQUEST['finance_number'];
        $last_id        = $this->Hotels_Model->maxgetid();
        $hotel_last_id  = $last_id[0]['id']+1;
        $passwording    = $last_id[0]['id']+423;
        $password       = "temp".$passwording."";
        $hotel_id       = "HE0".$hotel_last_id."";
        $result         = $this->Hotels_Model->addhotelreqst($property,$hotel_id,$sell_currency,$star,$vcc,$num_room,$channel,$website,$chain,$sale_name,$revenu_name,$sale_mail,$revenu_mail,$sale_number,$password,$revenu_number,$contract_name,$finance_name,$contract_mail,$finance_mail,$contract_number,$finance_number);
        OtherlogActivity('New hotel registered [Hotel ID: '.$hotel_id.']');
        RegisteringMail($result,'hotel');
        if ($result==true) {
            $Return['error'] = 'Successfully Registerd';
            $Return['status'] = '1';
        } else  {
            $Return['error'] = 'Registeration failed';
      }
      echo json_encode($Return);
    
  }
  public function hotel_portel_login()
    {     
        if ($_REQUEST['user_name']=="") {
          $Return['error'] = 'Hotel code is required!';
          $Return['color'] = 'orange';
        }  elseif ($_REQUEST['password']=="") {
          $Return['error'] = 'Password field is required!';
          $Return['color'] = 'orange';
        } else {
          $username  = $_REQUEST['user_name'];
          $password  = md5($_REQUEST['password']);
          $result = $this->Hotels_Model->authorizehotelportel($username,$password);
          if ($result=="failed") {
              $Return['error'] = 'Login failed';
              $Return['color'] = 'red';
              OtherlogActivity('Hotel login attempt failed [Username: '.$username.']');
          } else  {
              OtherlogActivity('Hotel login attempt success [Username: '.$username.']');
              $newdatauser = array(
                      'hotelid'           => $result[0]->id,
                      'hotel_code'   => $result[0]->hotel_code,
                      'hotel_name'   => $result[0]->hotel_name,
              );
              
              $this->session->set_userdata($newdatauser);
              $Return['error'] = 'Login Successfully';
              $Return['color'] = 'green';
              $Return['status'] = '1';
          }
        }
        echo json_encode($Return);
    }
  public function sessions_reset()  
   {
    $new_session = array(
                      'currency'     => $_REQUEST['type'],
                        );
    $this->session->set_userdata($new_session);
   }
  

}

