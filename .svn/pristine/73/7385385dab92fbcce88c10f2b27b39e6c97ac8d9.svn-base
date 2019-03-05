<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
     {
          parent::__construct();
	      $this->load->helper('common');
        $this->load->library('email');
        $this->load->model("Hotels_Model");
     }
	public function index()
	{
		$this->load->view('backend/login');
	}
	public function hotel_portal()
	{
    $data['currency_list']= $this->Hotels_Model->currency();
		$this->load->view('frontend/hotel_admin/hotel_login',$data);
	}
	public function forgetAgentPassword() {
		$this->load->view('backend/Agents/forgetAgentPassword');
	}
	public function agent_forget_password() {
		$email = agent_password_reset($_REQUEST['agent_code'],$_REQUEST['email']);
		if ($email=="0") {
			$return['error'] ="Check your Email";
		} elseif ($email=="inactive") {
			$return['error'] ="Please Contact Admin";
		} else {
			$return['error'] ="Success";
      OtherlogActivity('Agent password reseted [Agent Code: '.$_REQUEST['agent_code'].']');
		}

		echo json_encode($return);
	}
  public function agent_password_update_success() {
    if (!isset($_REQUEST['email'])) {
      redirect('../');
    }
     $hotel=$this->Hotels_Model->GetTitle();
    
      $Password = rand(1000,9999);
      $agent_password_update = agent_password_update($_REQUEST['agent_code'],$Password);

      $subject = 'Password Reset';
      $mail_settings = mail_details();
      $message = '<div class="wrapper" style="max-width: 400px;
                width: 100%;
                margin: 5% auto;
                border-radius: 3px;
                 box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
              <header style="padding: 10px 10%;
                text-align: center;">
                <img src="'.base_url().'skin/images/logo.png" alt="" style="width: 200px;">
              </header>
              <section style="padding: 10px 10%;text-align: center;">
                <h2 style="text-align: center;">Login with the Password below</h2>
                <div style="margin-top: 25px;
                margin-bottom: 10px;
                display: inline-block;"><a style="background-color: #0074b9;
                    color: #fff;
                    text-decoration: none;
                    padding: 6px 12px;
                    border-radius: 3px;
                    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.3);
                    letter-spacing: .5px;
                    text-transform: uppercase;" href="javascript:void()">Password : '.$Password.'</a></div>
                <p style="color: cornsilk;
                text-align: center;
                color: #90A4AE;"></p>
              </section>
              <footer style="text-align: center;
                padding: 1px;
                background-color: #37474F;
                color: #fff;
                border-radius: 0 0 3px 3px;">
                <p>'.$hotel[0]->Title.' | 2017</p>
              </footer>
            </div>';
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($_REQUEST['email']);

      $this->email->subject($subject);
      $this->email->message($message);

      $mail = $this->email->send();
      if ($mail==1) {
          $this->load->view('frontend/password_reset');
      } else {
        redirect('../');
      }
  }
}

