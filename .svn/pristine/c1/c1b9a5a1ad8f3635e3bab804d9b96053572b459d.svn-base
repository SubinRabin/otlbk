<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentRequests_Model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    // @countries list
    // select and return the whole countries list
    public function nationalityList() {
		$this->db->select('*');
        $this->db->from('countries');
        $query=$this->db->get();
        return $query->result();
	}
	// @Offline tour requests
	// select and return the offline requests 
	// added by the corresponding client
    public function agentTourRequestList($filter) {
      $this->db->select('*');
      $this->db->from('tour_tbl_requests');
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $this->db->where('requestFlg',$filter);
      $query = $this->db->get();
      return $query;
    }
    // @new offline tour request
    // insert the new offline tour requests form data
    public function OfflineTourRequestSubmit($request) {
      $ChildAge = '';
      if (isset($request['room1-childAge'])) {
          $ChildAge = implode(",", $request['room1-childAge']);
      }
      $adults = $request['adults'];
      $Child = $request['Child'];
      $data =  array(
                    'tour_type' => $request['tour_type'],
                    'tdate' => $request['tdate'],  
                    'destination' => $request['Destination'], 
                    'destination_id' => $request['destination_id'], 
                    'nationality' => $request['nationality'], 
                    'adults' => $adults, 
                    'child' => $Child, 
                    'childage' => $ChildAge, 
                    'special_request' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('tour_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline tour requests
    // select and return the complete details on a offline tour request
    public function agent_Offlinetourbooking_details($id) {
      $this->db->select('*');
      $this->db->from('tour_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    // @Offline transfer requests
	// select and return the offline transfer requests 
	// added by the corresponding client
    public function agentTransferRequestList($filter) {
      $this->db->select('*');
      $this->db->from('transfer_tbl_requests');
      $this->db->where('requestFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $query = $this->db->get();
      return $query;
    }
    // @new offline transfer request
    // insert the new offline transfer requests form data
    public function OfflineTransferRequestSubmit($request) {
      $Passenger = $request['Passenger'];
      $Bags = $request['Bags'];
      $data =  array(
                    'transfer_type' => $request['transfertype'],
                    'arrivalNo' => $_REQUEST['arrivalNo'],
                    'arrivalTime' => $_REQUEST['arrivalTime'],
                    'pickpoint' => $_REQUEST['pickpoint'],
                    'droppoint' => $_REQUEST['droppoint'],
                    'departureNo' => $_REQUEST['departureNo'],
                    'departureTime' => $_REQUEST['departureTime'],
                    'returnpickpoint' => $_REQUEST['pickpoint1'],
                    'returndroppoint' => $_REQUEST['droppoint1'],
                    'destination' => $request['Destination'], 
                    'destination_id' => $request['destination_id'], 
                    'nationality' => $request['nationality'], 
                    'Passenger' => $Passenger, 
                    'Bags' => $Bags, 
                    'special_request' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('transfer_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline transfer requests
    // select and return the complete details on a offline transfer request
    public function agent_Offlinetransferbooking_details($id) {
      $this->db->select('*');
      $this->db->from('transfer_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    // @Offline visa requests
	// select and return the offline visa requests 
	// added by the corresponding client
    public function agentVisaRequestList($filter) {
      $this->db->select('*');
      $this->db->from('visa_tbl_requests');
      $this->db->where('requestFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $query = $this->db->get();
      return $query;
    }
    // @new offline visa request
    // insert the new offline visa requests form data
    public function OfflineVisaRequestSubmit($request) {
      $data =  array(
                    'visa_type' => $request['visa_type'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'], 
                    'expirydate' => $_REQUEST['expiry'], 
                    'birthdate' => $_REQUEST['bdate'], 
                    'firstname' => $_REQUEST['firstname'],
                    'lastname' => $_REQUEST['lastname'],
                    'nationality' => $_REQUEST['nationality'],
                    'created_date' => date('Y-m-d'),
                    'special_request' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('visa_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline visa requests
    // select and return the complete details on a offline visa request
    public function agent_Offlinevisabooking_details($id) {
      $this->db->select('*');
      $this->db->from('visa_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    } 
    // @Offline package requests
	// select and return the offline package requests 
	// added by the corresponding client
    public function agentPackageRequestList($filter) {
      $this->db->select('*');
      $this->db->from('package_tbl_requests');
      $this->db->where('requestFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $query = $this->db->get();
      return $query;
    }
    // @new offline package request
    // insert the new offline package requests form data
    public function OfflinePackageRequestSubmit($request) {
      $ChildAge = '';
      if (isset($request['room1-childAge'])) {
          $ChildAge = implode(",", $request['room1-childAge']);
      }
      $adults = $request['adults'];
      $Child = $request['Child'];
      $data =  array(
                    'tourrequired' => $request['tourreq'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'],
                    'budget' => $_REQUEST['budget'],
                    'checkin' => $_REQUEST['checkin'], 
                    'checkout' => $_REQUEST['checkout'], 
                    'nationality' => $_REQUEST['nationality'],
                    'created_date' => date('Y-m-d'),
                    'adults' => $adults,
                    'child' => $Child,
                    'childage' => $ChildAge,
                    'specialrequest' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('package_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline package requests
    // select and return the complete details on a offline package request
    public function agent_Offlinepackagebooking_details($id) {
      $this->db->select('*');
      $this->db->from('package_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    // @Offline flight requests
	// select and return the offline flight requests 
	// added by the corresponding client
    public function agentFlightRequestList($filter) {
      $this->db->select('*');
      $this->db->from('flight_tbl_requests');
      $this->db->where('requestFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $query = $this->db->get();
      return $query;
    }
    // @new offline flight request
    // insert the new offline flight requests form data
    public function OfflineFlightRequestSubmit($request) {
      $ChildAge = '';
      if (isset($request['room1-childAge'])) {
          $ChildAge = implode(",", $request['room1-childAge']);
      }
      $adults = $request['adults'];
      $Child = $request['Child'];
      $data =  array(
                    'type' => $request['type'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'],
                    'from' => $_REQUEST['From'],
                    'from_id' => $_REQUEST['from_id'],
                    'departdate' => $_REQUEST['departdate'], 
                    'returndate' => $_REQUEST['returndate'], 
                    'created_date' => date('Y-m-d'),
                    'adults' => $adults,
                    'child' => $Child,
                    'childage' => $ChildAge,
                    'specialrequest' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('flight_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline flight requests
    // select and return the complete details on a offline flight request
    public function agent_Offlineflightbooking_details($id) {
      $this->db->select('*');
      $this->db->from('flight_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    // @Offline park requests
	// select and return the offline park requests 
	// added by the corresponding client
    public function agentParkRequestList($filter) {
      $this->db->select('*');
      $this->db->from('park_tbl_requests');
      $this->db->where('requestFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $query = $this->db->get();
      return $query;
    }
    // @new offline park request
    // insert the new offline park requests form data
    public function OfflineParkRequestSubmit($request) {
      $ChildAge = '';
      if (isset($request['room1-childAge'])) {
          $ChildAge = implode(",", $request['room1-childAge']);
      }
      $adults = $request['adults'];
      $Child = $request['Child'];
      $data =  array(
                    'themePark' => $request['themePark'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'],
                    'pdate' => $_REQUEST['pdate'], 
                    'nationality' => $_REQUEST['nationality'],
                    'created_date' => date('Y-m-d'),
                    'adults' => $adults,
                    'child' => $Child,
                    'childage' => $ChildAge,
                    'specialrequest' => $request['SpecialRequest'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('park_tbl_requests',$data);
      return $this->db->insert_id();
    }
    // @view offline park requests
    // select and return the complete details on a offline park request
    public function agent_Offlineparkbooking_details($id) {
      $this->db->select('*');
      $this->db->from('park_tbl_requests');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
}