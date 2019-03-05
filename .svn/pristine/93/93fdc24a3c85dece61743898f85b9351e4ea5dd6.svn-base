<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    
    public function __construct()
     {
          parent::__construct();
          $this->load->library('email');
          $this->load->library('session');
          $this->load->library('upload');
          $this->load->helper('url');
          $this->load->helper('common');
          $this->load->helper('html');
          $this->load->helper('custom');
          $this->load->helper('upload');
          $this->load->model('User_Model');
          $this->load->model('Common_Model');


     }
    
    public function index()
    {
        if ($_REQUEST['user_name']=="") {
          $Return['error'] = 'User Name field is required!';
          $Return['color'] = 'orange';
        } else if (!filter_var($_REQUEST['user_name'], FILTER_VALIDATE_EMAIL)) {
          $Return['error'] = "Invalid email format"; 
          $Return['color'] = 'orange';
        } elseif ($_REQUEST['password']=="") {
          $Return['error'] = 'Password field is required!';
          $Return['color'] = 'orange';
        } else {
          $username  = $_REQUEST['user_name'];
          $password  = md5($_REQUEST['password']);
          $result = $this->User_Model->authorize($username,$password);
          if ($result=="failed") {
              $Return['error'] = 'Login failed';
              $Return['color'] = 'red';
              OtherlogActivity('Backend login attempt failed [Username: '.$username.']');
          } else {
              OtherlogActivity('Backend login attempt success [Username: '.$username.']');
              $active_data = array(
                'active_status' => '1'
              );
              $active_id = $this->User_Model->update_admin_active_status($result[0]->id,$active_data);
              $data = array(
                'is_logged_in' => '1',
                'last_login_date' => date('d-m-Y H:i:s')
              ); 
              $this->User_Model->update_login_record($data,$result[0]->id);
              $newdata = array(
                      'id'  => $result[0]->id,
                      'email'    => $result[0]->Email,
                      'name'     => $result[0]->First_Name." ".$result[0]->Last_Name,
                      'role'     => $result[0]->Category,
                      'last_action'     => date('YmdHis'),
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
      $Settings = menuPermissionAvailability($this->session->userdata('id'),'General','Settings'); 
      if (count($Settings)!=0 && $Settings[0]->view==1) {
      $this->load->view('backend/general_settings',$data);     
      } else {
          redirect(base_url().'backend/dashboard');
      }

    }
    public function general_settings_update() {
      if ($_REQUEST['title']=="") {
          $Return['error'] = 'Title field is required';
          $Return['color'] = 'red';

      } else {
        $Return['error'] = 'Updated Successfully';
        $Return['color'] = 'green';
        $Return['status'] = '1';
        $description = 'General settings details updated';
        AdminlogActivity($description);
      }      
      echo json_encode($Return);
    }
    public function handle_general_settings_image_upload($id = '') {
      $array=array(
                   'Title'    => $_REQUEST['title'],
                   'Logo'     => "logo.png",
                   'Fav_Icon' => "fav.ico",
                   'account'  => $_REQUEST['account'],
                   'email'    => $_REQUEST['email'],
                  );
        $result = $this->Common_Model->general_settings_update($array);
        handle_genaral_images_upload("1");
        handle_genaral_fav_icon_upload("1");
        redirect("../backend/login/general_settings");
    }
    public function forget_password() {
      $this->load->view('backend/forget_password');
    }
    public function user_mail_check() {
        if ($_REQUEST['email']!="") {
          $mail = forget_email_validation($_REQUEST['email']);
        } 
        else
        {
          $mail = 2;
        }
        echo json_encode($mail);
    }
    public function admin_forget_password() {
        $email = admin_password_reset($_REQUEST['email']);
    if ($email=="0") {
      $return['error'] ="Check your Email";
    } elseif ($email=="inactive") {
      $return['error'] ="Please Contact Admin";
    } else {
      OtherlogActivity('Backend password reseted [Email: '.$_REQUEST['email'].']');
      $return['error'] ="Success";
    }

    echo json_encode($return);
    }
     public function admin_password_update_success() {
    if (!isset($_REQUEST['email'])) {
      redirect('../');
    }$hotel=$this->Common_Model->GetTitle();
      $Password = rand(1000,9999);
      $admin_password_update = admin_password_update($_REQUEST['email'],$Password);

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
      // print_r($mail);
      // exit();
      if ($mail==1) {
          $this->load->view('backend/admin_password_reset');
      } else {
        redirect('../backend');
      }
  }
}

