<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sight_seeing extends MY_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('html');
        $this->load->model('Sight_seeing_Model');
    }
    public function index() 
	{
		if ($this->session->userdata('name')=="") {
			redirect("../backend/");
		}
		$this->load->view('backend/sight_seeing/index');
	}
	public function new_sight_seeing()
	{
		if ($this->session->userdata('name')=="") {
			redirect("../backend/");
		}
		
		// $data = array();
		// $data['view'] = array();
		// if (isset($_REQUEST['hotels_edit_id'])) {
		// $data['view'] =$this->Hotels_Model->hotel_detail_get($_REQUEST['hotels_edit_id']);
		// $data['view']['rooms'] = $this->Hotels_Model->hotel_rooms_view($data['view'][0]->hotel_id);
		// }
		// $data['hotel_facilties'] = $this->Hotels_Model->hotel_facilties_get();
		// $data['room_type'] = $this->Hotels_Model->room_type_get();
		// $data['room_facilties'] = $this->Hotels_Model->room_facilties_get();
		$this->load->view('backend/sight_seeing/new_sight_seeing');
	}
	// public function sight_seeing_insert() {
 //    	if ($this->session->userdata('name')=="") {
	// 		redirect("../backend/");
	// 	}
	// 	print_r($_REQUEST);
	// 	exit();
	// }

} 

 ?>