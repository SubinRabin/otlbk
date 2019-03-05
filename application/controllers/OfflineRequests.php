<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OfflineRequests extends MY_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('html');
		$this->load->model("AgentRequests_Model");
        $this->load->helper('upload');
        $this->load->helper('common');
        $this->load->library('email');
        $this->load->library('Calendar');
	}
	// @Agent offline tour requests
	// Loads the offline tour requests view page
	public function agenttour_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        	redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/tour_requests');
    }
    // @New offline tour request
    // Loads the modal for adding new tour request
    public function OfflineTourRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflineTourRequestModal',$data);
    }
    // @offline tour requests datatable
    // loads the data to the datatable listing the tour requests
    public function offlineTourRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentTourRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'TOB'.$r->id,
	          $r->destination,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->tour_type,
	          date('d/m/Y' , strtotime($r->tdate)),
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlinetourbooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline tour request form submit
    // submitting form data of new offline tour requests
    public function OfflineTourRequestSubmit() {
      $result = $this->AgentRequests_Model->OfflineTourRequestSubmit($_REQUEST);
      $type="tour";
      AgentlogActivity('New tour offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      echo json_encode(true);
    }
    // @offline tour request view
    // displays the complete details of a particular ofline tour request
    public function agent_Offlinetourbooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlinetourbooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlinetourbooking_view',$data);
    }
    // @Agent offline transfer requests
	// Loads the offline transfer requests view page
    public function agenttransfer_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/transfer_requests');
    }
    // @New offline transfer request
    // Loads the modal for adding new offline transfer request
    public function OfflineTransferRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflineTransferRequestModal',$data);
    }
    // @offline transfer requests datatable
    // loads the data to the datatable listing the transfer requests
    public function offlineTransferRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentTransferRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'TRB'.$r->id,
	          $r->destination,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->transfer_type,
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlinetransferbooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline transfer request form submit
    // submitting form data of new offline transfer requests
    public function OfflineTransferRequestSubmit() {
      $result = $this->AgentRequests_Model->OfflineTransferRequestSubmit($_REQUEST);
      $type = "transfer";
      AgentlogActivity('New transfer offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      echo json_encode(true);
    }
    // @offline transfer request view
    // displays the complete details of a particular ofline transfer request
    public function agent_Offlinetransferbooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlinetransferbooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlinetransferbooking_view',$data);
    }
    // @Agent offline visa requests
	// Loads the offline visa requests view page
    public function agentvisa_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/visa_requests');
    }
    // @New offline visa request
    // Loads the modal for adding new offline visa request
    public function OfflineVisaRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflineVisaRequestModal',$data);
    }
    // @offline visa requests datatable
    // loads the data to the datatable listing the visa requests
    public function offlineVisaRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentVisaRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'VRB'.$r->id,
	          $r->destination,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->visa_type,
	          $r->firstname.' '.$r->lastname,
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlinevisabooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline visa request form submit
    // submitting form data of new offline visa requests
    public function OfflineVisaRequestSubmit() {
      $result=$this->AgentRequests_Model->OfflineVisaRequestSubmit($_REQUEST);
      visa_request_passport_image_upload($result);
      $type="visa";
      AgentlogActivity('New visa offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'OfflineRequests/agentvisa_requests');
    }
    // @offline visa request view
    // displays the complete details of a particular ofline visa request
    public function agent_Offlinevisabooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlinevisabooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlinevisabooking_view',$data);
    }
    // @Agent offline package requests
	// Loads the offline package requests view page
    public function agentpackage_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/package_requests');
    }
    // @New offline package request
    // Loads the modal for adding new offline package request
    public function OfflinePackageRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflinePackageRequestModal',$data);
    }
    // @offline package requests datatable
    // loads the data to the datatable listing the package requests
    public function offlinePackageRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentPackageRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'PKB'.$r->id,
	          $r->destination,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->tourrequired,
	          date('d/m/Y' , strtotime($r->checkin)),
	          date('d/m/Y' , strtotime($r->checkout)),
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlinepackagebooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline package request form submit
    // submitting form data of new offline package requests
    public function OfflinePackageRequestSubmit() {
      $result = $this->AgentRequests_Model->OfflinePackageRequestSubmit($_REQUEST);
      $type="package";
      AgentlogActivity('New package offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      echo json_encode(true);
    }
    // @offline package request view
    // displays the complete details of a particular ofline package request
    public function agent_Offlinepackagebooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlinepackagebooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlinepackagebooking_view',$data);
    }
    // @Agent offline flight requests
	// Loads the offline flight requests view page
    public function agentflight_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/flight_requests');
    }
    // @New offline flight request
    // Loads the modal for adding new offline flight request
    public function OfflineFlightRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflineFlightRequestModal',$data);
    }
    // @offline flight requests datatable
    // loads the data to the datatable listing the flight requests
    public function offlineFlightRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentFlightRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'FGB'.$r->id,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->type,
	          $r->from,
	          $r->destination,
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlineflightbooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline flight request form submit
    // submitting form data of new flight package requests
    public function OfflineFlightRequestSubmit() {
      $result = $this->AgentRequests_Model->OfflineFlightRequestSubmit($_REQUEST);
      $type = "flight";
      AgentlogActivity('New flight offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      echo json_encode(true);
    }
    // @offline package request view
    // displays the complete details of a particular ofline package request
    public function agent_Offlineflightbooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlineflightbooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlineflightbooking_view',$data);
    }
    // @Agent offline park requests
	// Loads the offline park requests view page
    public function agentpark_requests() {
	    if ($this->session->userdata('agent_id')=="") {
        redirect(base_url());
      	}
	    $this->load->view('frontend/offlinerequests/park_requests');
    }
    // @New offline park request
    // Loads the modal for adding new offline park request
    public function OfflineParkRequestModal() {
      $data['nationality'] = $this->AgentRequests_Model->nationalityList();
      $this->load->view('frontend/offlinerequests/OfflineParkRequestModal',$data);
    }
    // @offline park requests datatable
    // loads the data to the datatable listing the park requests
    public function offlineParkRequestList() {
        $data = array();
	    // Datatables Variables
	    $draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    if (isset($_REQUEST['filter'])) {
	      $filter = $_REQUEST['filter'];
	    } else {
	      $filter = "2";
	    }
	    $query = $this->AgentRequests_Model->agentParkRequestList($filter);
	    foreach($query->result() as $key => $r) {
	        if ($r->requestFlg==2) {
	          $status = '<span class="text-primary">Pending</span>';
	        } else if($r->requestFlg==0) {
	          $status = '<span class="text-danger">Cancelled</span>';
	        } else {
	          $status = '<span class="text-success">Success</span>';
	        }
	        $SellingPrice = explode(",", $r->sellingprice);
	        $SellingPriceArr = array_sum($SellingPrice);

	        $data[] = array(
	          $key+1,
	          'PKB'.$r->id,
	          date('d/m/Y' , strtotime($r->created_date)),
	          $r->themePark,
	          date('d/m/Y' , strtotime($r->pdate)),
	          agent_currency()." ".currency_type(agent_currency(),$SellingPriceArr),
	          $status,
	          '<a title="view" class="btn btn-sm btn-success" href="'.base_url().'OfflineRequests/agent_Offlineparkbooking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'
	        );
	      
	    }
	    $output = array(
	       "draw" => $draw,
	       "recordsTotal" => $query->num_rows(),
	       "recordsFiltered" => $query->num_rows(),
	       "data" => $data
	    );
	    echo json_encode($output);
	    exit();
    }
    // @offline park request form submit
    // submitting form data of new park package requests
    public function OfflineParkRequestSubmit() {
      $result = $this->AgentRequests_Model->OfflineParkRequestSubmit($_REQUEST);
      $type="park";
      AgentlogActivity('New park offline request added [ID: '.$result.']');
      offlinerequestMailNotification($result,$type);
      echo json_encode(true);
    }
    // @offline park request view
    // displays the complete details of a particular offline park request
    public function agent_Offlineparkbooking_view() {
      $data['view'] = $this->AgentRequests_Model->agent_Offlineparkbooking_details($_REQUEST['id']);
      $this->load->view('frontend/offlinerequests/agent_offlineparkbooking_view',$data);
    }
}