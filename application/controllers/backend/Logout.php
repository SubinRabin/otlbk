<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {
    
    public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->model('User_Model');
     }
    
    public function index()
    {
	    $session = $this->session->userdata('name');
	    $admin_id = $this->session->userdata('id');
	    $active_data = array(
                'active_status' => '0'
              );
              $active_id = $this->User_Model->update_admin_active_status($admin_id,$active_data);
		$last_data = array(
			'is_logged_in' => '0',
			'last_logout_date' => date('d-m-Y H:i:s')
		); 
		$this->User_Model->update_record($last_data, $this->session->userdata('id'));
				
		// Removing session data
		$sess_array = array('name' => '');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('last_action');
		// $this->session->sess_destroy();
		redirect('../backend/', 'refresh');
      // redirect("../backend/");
    }
    public function agent_logout()
    {
	    $session = $this->session->userdata('name');
	    $agent_id = $this->session->userdata('agent_id');
	    $active_data = array(
                'active_status' => '0'
              );
              $active_id = $this->User_Model->update_agent_active_status($agent_id,$active_data);
		$last_data = array(
			'is_logged_in' => '0',
			'last_logout_date' => date('d-m-Y H:i:s')
		); 
		$this->User_Model->update_agent_login_record($last_data, $this->session->userdata('agent_id'), $this->session->userdata('logeed_id'));
				
		// Removing session data
		$sess_array = array('name' => '');
		$this->session->unset_userdata('logeed_id');
		$this->session->unset_userdata('agent_id');
		$this->session->unset_userdata('agent_email');
		$this->session->unset_userdata('agent_name');
		$this->session->unset_userdata('currency');
		// $this->session->sess_destroy();
		redirect('../', 'refresh');
      // redirect("../backend/");
    }
    public function hotel_logout()
    {
		// Removing session data
		$sess_array = array('name' => '');
		$this->session->unset_userdata('hotelid');
		$this->session->unset_userdata('hotel_code');
		$this->session->unset_userdata('hotel_name');
		// $this->session->sess_destroy();
		redirect('../', 'refresh');
      // redirect("../backend/");
    }
}


