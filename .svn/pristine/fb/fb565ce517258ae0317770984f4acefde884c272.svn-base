<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfflineModel extends CI_Model {
 
  public function __construct() {
        parent::__construct();
        $this->load->database();
  }
  public function nationalityList() {
		$this->db->select('*');
        $this->db->from('countries');
        $query=$this->db->get();
        return $query->result();
	}
	public function get_agents() {
		$this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $query=$this->db->get();
        return $query->result();
	}
	public function OfflineRequestSubmit($data) { 
      $this->db->insert('hotel_tbl_offlinerequest',$data);
      return $this->db->insert_id();
   }
   public function OfflineTourRequestSubmit($data) { 
      $this->db->insert('tour_tbl_requests',$data);
      return $this->db->insert_id();
   }
   public function tour_offline_request_list($filter) {
    	$this->db->select('*');
        $this->db->from('tour_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
   public function Offlinetourrequest_details($id) {
      $this->db->select('tour_tbl_requests.id as requestid,tour_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Mobile,hotel_tbl_agents.Email');
      $this->db->from('tour_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = tour_tbl_requests.agent_id', 'left');
      $this->db->where('tour_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   public function OfflineTourRequestupdate($request) {
    	$Cost = implode(",", $request['Cost']);
    	$Selling = implode(",", $request['Selling']);
    	$Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
    	$data= array(
		          'tour_type' => $request['tour_type'],
		          'costprice' => $Cost,
		          'sellingprice' => $Selling,
		          'profitprice' => $Profit,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],
		      );
		$this->db->where('id',$request['id']);
		$this->db->update('tour_tbl_requests',$data);
		return true;
   }
   public function OfflineActionupdate($request) {
    	if ($request['val']==1) {
    		$data= array(
		          'conFirmNumber' => $request['conNumber'],
		          'ConFirmName' => $request['conName'],
		          'requestFlg' => 1,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
   	} else {
			$data= array(
		          'requestFlg' => 0,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
   	}
		$this->db->where('id',$request['id']);
		$this->db->update('tour_tbl_requests',$data);
		return true;
   }
   public function OfflineTransferRequestSubmit($data) { 
      $this->db->insert('transfer_tbl_requests',$data);
      return $this->db->insert_id();
   }
   public function transfer_offline_request_list($filter) {
    	$this->db->select('*');
        $this->db->from('transfer_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
   public function Offlinetransferrequest_details($id) {
      $this->db->select('transfer_tbl_requests.id as requestid,transfer_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Mobile,hotel_tbl_agents.Email');
      $this->db->from('transfer_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = transfer_tbl_requests.agent_id', 'left');
      $this->db->where('transfer_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   public function OfflineTransferRequestupdate($request) {
    $arrivalNo = $request['arrivalNo'];
      $arrivalTime = $request['arrivalTime'];
      $departureNo = $request['departureNo'];
      $departureTime = $request['departureTime'];
    	$Cost = implode(",", $request['Cost']);
    	$Selling = implode(",", $request['Selling']);
    	$Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
    	$data= array(
		          'costprice' => $Cost,
		          'sellingprice' => $Selling,
		          'profitprice' => $Profit,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
              'arrivalNo' => $arrivalNo,
              'arrivalTime' => $arrivalTime,
              'departureNo' => $departureNo,
              'departureTime' => $departureTime,
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],
		      );
		$this->db->where('id',$request['id']);
		$this->db->update('transfer_tbl_requests',$data);
		return true;
   }
   public function OfflineTransferActionupdate($request) {
    	if ($request['val']==1) {
    		$data= array(
		          'conFirmNumber' => $request['conNumber'],
		          'ConFirmName' => $request['conName'],
		          'requestFlg' => 1,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	} else {
			$data= array(
		          'requestFlg' => 0,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	}
		$this->db->where('id',$request['id']);
		$this->db->update('transfer_tbl_requests',$data);
		return true;
   }
   // insert offline visa request details
   public function OfflineVisaRequestSubmit($data) { 
      $this->db->insert('visa_tbl_requests',$data);
      return $this->db->insert_id();
   }
   // select offline visa requests
   public function visa_offline_request_list($filter) {
    	$this->db->select('*');
        $this->db->from('visa_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
   //select complete details on offline visa requests
   public function Offlinevisarequest_details($id) {
      $this->db->select('visa_tbl_requests.id as requestid,visa_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Email,hotel_tbl_agents.Mobile');
      $this->db->from('visa_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = visa_tbl_requests.agent_id', 'left');
      $this->db->where('visa_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   //update offline visa requests
   public function OfflineVisaRequestupdate($request) {
    	$Cost = implode(",", $request['Cost']);
    	$Selling = implode(",", $request['Selling']);
    	$Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
    	$data= array(
		          'costprice' => $Cost,
		          'sellingprice' => $Selling,
		          'profitprice' => $Profit,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],
		      );
		$this->db->where('id',$request['id']);
		$this->db->update('visa_tbl_requests',$data);
		return true;
   }
   // accept offline visa requests
   public function OfflineVisaActionupdate($request) {
    	if ($request['val']==1) {
    		$data= array(
		          'conFirmNumber' => $request['conNumber'],
		          'ConFirmName' => $request['conName'],
		          'requestFlg' => 1,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	} else {
			$data= array(
		          'requestFlg' => 0,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	}
		$this->db->where('id',$request['id']);
		$this->db->update('visa_tbl_requests',$data);
		return true;
   }
   // @offline package requests submit
   // insert the offline package requests form data
   public function OfflinePackageRequestSubmit($data) { 
      $this->db->insert('package_tbl_requests',$data);
      return $this->db->insert_id();
   }
   // @offline package requests list
   // select all the offline package requests
   public function package_offline_request_list($filter) {
    	$this->db->select('*');
        $this->db->from('package_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
   // @offline package requests complete list
   // select all the offline package results along with agent details
   public function Offlinepackagerequest_details($id) {
      $this->db->select('package_tbl_requests.id as requestid,package_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Mobile,hotel_tbl_agents.Email');
      $this->db->from('package_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = package_tbl_requests.agent_id', 'left');
      $this->db->where('package_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   // @offline package requests edit
   // edit the costprice, selling price and 
   // profit of offline package requests
   public function OfflinePackageRequestupdate($request) {
    	$Cost = implode(",", $request['Cost']);
    	$Selling = implode(",", $request['Selling']);
    	$Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
    	$data= array(
    				 'package' =>$request['package'],
		          'costprice' => $Cost,
		          'sellingprice' => $Selling,
		          'profitprice' => $Profit,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],
		      );
		$this->db->where('id',$request['id']);
		$this->db->update('package_tbl_requests',$data);
		return true;
   }
   // @offline package requests status update
   // accept the offline package requests by 
   // providing the confirmation number and name 
   // or cancel the offline package requests
   public function OfflinePackageActionupdate($request) {
    	if ($request['val']==1) {
    		$data= array(
		          'conFirmNumber' => $request['conNumber'],
		          'ConFirmName' => $request['conName'],
		          'requestFlg' => 1,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	} else {
			$data= array(
		          'requestFlg' => 0,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	}
		$this->db->where('id',$request['id']);
		$this->db->update('package_tbl_requests',$data);
		return true;
   }
   // @offline flight requests submit
   // insert the offline flight requests form data
   public function OfflineFlightRequestSubmit($data) { 
      $this->db->insert('flight_tbl_requests',$data);
      return $this->db->insert_id();
   }
   // @offline flight requests list
   // select all the offline flight requests
   public function flight_offline_request_list($filter) {
    	$this->db->select('*');
        $this->db->from('flight_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
   // @offline flight requests complete list
   // select all the offline flight results along with agent details
   public function Offlineflightrequest_details($id) {
      $this->db->select('flight_tbl_requests.id as requestid,flight_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Mobile,hotel_tbl_agents.Email');
      $this->db->from('flight_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = flight_tbl_requests.agent_id', 'left');
      $this->db->where('flight_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   // @offline flight requests status update
   // accept the offline flight requests by 
   // providing the confirmation number and name 
   // or cancel the offline flight requests
   public function OfflineFlightActionupdate($request) {
    	if ($request['val']==1) {
    		$data= array(
		          'conFirmNumber' => $request['conNumber'],
		          'ConFirmName' => $request['conName'],
		          'requestFlg' => 1,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	} else {
			$data= array(
		          'requestFlg' => 0,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
		      );
    	}
		$this->db->where('id',$request['id']);
		$this->db->update('flight_tbl_requests',$data);
		return true;
   }
   // @offline flight requests edit
   // edit the costprice, selling price and 
   // profit of flight package requests
   public function OfflineFlightRequestupdate($request) {
      $arrivalNo = $request['arrivalNo'];
      $arrivalTime = $request['arrivalTime'];
      $departureNo = $request['departureNo'];
      $departureTime = $request['departureTime'];
    	$Cost = implode(",", $request['Cost']);
    	$Selling = implode(",", $request['Selling']);
    	$Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
    	$data= array(
		          'costprice' => $Cost,
		          'sellingprice' => $Selling,
		          'profitprice' => $Profit,
		          'UpdatedBy' => $this->session->userdata('id'),
		          'UpdatedDate' => date('Y-m-d'),
              'arrivalNo' => $arrivalNo,
              'arrivalTime' => $arrivalTime,
              'departureNo' => $departureNo,
              'departureTime' => $departureTime,
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],

		      );
		$this->db->where('id',$request['id']);
		$this->db->update('flight_tbl_requests',$data);
		return true;
   }
   // @offline park requests submit
   // insert the offline park requests form data
   public function OfflineParkRequestSubmit($data) { 
      $this->db->insert('park_tbl_requests',$data);
      return $this->db->insert_id();
   }
   // @offline park requests list
   // select all the offline park requests
   public function park_offline_request_list($filter) {
      $this->db->select('*');
        $this->db->from('park_tbl_requests');
        $this->db->where('requestFlg',$filter);
        $query=$this->db->get();
        return $query;
   }
    // @offline park requests complete list
   // select all the offline park results along with agent details
   public function Offlineparkrequest_details($id) {
      $this->db->select('park_tbl_requests.id as requestid,park_tbl_requests.*,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName,hotel_tbl_agents.Mobile,hotel_tbl_agents.Email');
      $this->db->from('park_tbl_requests');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = park_tbl_requests.agent_id', 'left');
      $this->db->where('park_tbl_requests.id',$id);
      $query=$this->db->get();
      return $query->result();
   }
   // @offline park requests status update
   // accept the offline park requests by 
   // providing the confirmation number and name 
   // or cancel the offline park requests
   public function OfflineParkActionupdate($request) {
      if ($request['val']==1) {
        $data= array(
              'conFirmNumber' => $request['conNumber'],
              'ConFirmName' => $request['conName'],
              'requestFlg' => 1,
              'UpdatedBy' => $this->session->userdata('id'),
              'UpdatedDate' => date('Y-m-d'),
          );
      } else {
      $data= array(
              'requestFlg' => 0,
              'UpdatedBy' => $this->session->userdata('id'),
              'UpdatedDate' => date('Y-m-d'),
          );
      }
    $this->db->where('id',$request['id']);
    $this->db->update('park_tbl_requests',$data);
    return true;
   }
   // @offline park requests edit
   // edit the costprice, selling price and 
   // profit of park package requests
   public function OfflineParkRequestupdate($request) {
      $Cost = implode(",", $request['Cost']);
      $Selling = implode(",", $request['Selling']);
      $Profit = implode(",", $request['Profit']);
      $margin = implode(",", $request['margin']);
      $data= array(
              'costprice' => $Cost,
              'sellingprice' => $Selling,
              'profitprice' => $Profit,
              'UpdatedBy' => $this->session->userdata('id'),
              'UpdatedDate' => date('Y-m-d'),
              'margin' => $margin,
              'ContactName' => $request['ContactName'],
              'contactnum' => $request['contactnum'],
              'contactemail' => $request['contactemail'],
          );
    $this->db->where('id',$request['id']);
    $this->db->update('park_tbl_requests',$data);
    return true;
  }
}