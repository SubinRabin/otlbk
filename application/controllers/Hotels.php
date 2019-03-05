<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('list_Model');
          $this->load->helper('common');
          $this->session->keep_flashdata('message');
          $this->session->keep_flashdata('failed');
     }
	
	public function index()
	{
		if ($this->session->userdata('agent_name')=="") {
			redirect(base_url());
		}
		$contract_markup = 0;
		// $data['availableContract'] = availableContract();
		$data['availableContract'] = array();
		$agent_markup = mark_up_get()+general_mark_up_get();
		$data['nationality'] = $this->list_Model->getNationality();
		$data['trending'] = $this->list_Model->trendingHotels();
		$data['total_markup'] = $agent_markup+$contract_markup;
		$this->load->view('frontend/search',$data); 
	}
	public function passwordResetModal() {
		$this->load->view('frontend/passwordResetModal'); 
	}
	public function ChangePasswordSubmit() {
		$result = $this->list_Model->ChangePasswordSubmit($this->session->userdata('agent_id'),$_REQUEST['cPassword'],$_REQUEST['nPassword']);
		echo json_encode($result);
	}
	public function ChangePasswordCancel() {
		$result = $this->list_Model->ChangePasswordCancel($this->session->userdata('agent_id'));
		echo json_encode(true);
	}
	public function ChangeHotelPassword() {
		$result = $this->list_Model->ChangeHotelPassword($_REQUEST['cPassword'],$_REQUEST['nPassword'],$_REQUEST['hotel_id']);
		echo json_encode($result);
	}
	public function ChangeHotelPasswordCancel() {
		$result = $this->list_Model->ChangeHotelPasswordCancel($_REQUEST['hotel_id']);
		echo json_encode(true);
	}
}


