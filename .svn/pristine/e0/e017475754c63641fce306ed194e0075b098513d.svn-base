<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offlinerequest extends MY_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
    $this->load->helper('html');
    $this->load->model("Hotels_Model");
    $this->load->model("Payment_Model");
    $this->load->model("OfflineModel");
    $this->load->helper('upload');
    $this->load->helper('common');
    $this->load->helper('manuallog');
    $this->load->library('email');
    $this->load->library('Calendar');
	}
	public function new_hotel_requests() {
	  if ($this->session->userdata('name')=="") {
      	redirect("../backend/");
   	}
 	  $data['nationality'] = $this->OfflineModel->nationalityList();
 	  $data['agents'] = $this->OfflineModel->get_agents();
    $hotelMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Hotels');
    if (count($hotelMenu)!=0 && $hotelMenu[0]->view==1 && $hotelMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_hotel_requests',$data);        
    } else {
      redirect(base_url().'backend/dashboard');
    }  	  
	}
	public function requests_validation() {
		 if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['hotel_name']=="") {
      $Return['error'] = 'Hotel Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['budget']=="") {
      $Return['error'] = 'Budget field is required!';
      $Return['color'] = 'orange';
    }
    else {
      if ($_REQUEST['edit_id']!="") {
        $Return['error'] = "Updated Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';
      } else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';
      }  
    }
    echo json_encode($Return);
	}
  public function OfflineRequestSubmit() {
      $Room1ChildAge = '';
      if (isset($_REQUEST['room1-childAge'])) {
          $Room1ChildAge = implode(",", $_REQUEST['room1-childAge']);
      }
      $Room2ChildAge = '';
      if (isset($_REQUEST['room2-childAge'])) {
          $Room2ChildAge = implode(",", $_REQUEST['room2-childAge']);
      }
      $Room3ChildAge = '';
      if (isset($_REQUEST['room3-childAge'])) {
          $Room3ChildAge = implode(",", $_REQUEST['room3-childAge']);
      }
      $Room4ChildAge = '';
      if (isset($_REQUEST['room4-childAge'])) {
          $Room4ChildAge = implode(",", $_REQUEST['room4-childAge']);
      }
      $Room5ChildAge = '';
      if (isset($_REQUEST['room5-childAge'])) {
          $Room5ChildAge = implode(",", $_REQUEST['room5-childAge']);
      }
      $Room6ChildAge = '';
      if (isset($_REQUEST['room6-childAge'])) {
          $Room6ChildAge = implode(",", $_REQUEST['room6-childAge']);
      }
      $Room7ChildAge = '';
      if (isset($_REQUEST['room7-childAge'])) {
          $Room7ChildAge = implode(",", $_REQUEST['room7-childAge']);
      }
      $Room8ChildAge = '';
      if (isset($_REQUEST['room8-childAge'])) {
          $Room8ChildAge = implode(",", $_REQUEST['room8-childAge']);
      }
      $Room9ChildAge = '';
      if (isset($_REQUEST['room9-childAge'])) {
          $Room9ChildAge = implode(",", $_REQUEST['room9-childAge']);
      }
      $Room10ChildAge = '';
      if (isset($_REQUEST['room10-childAge'])) {
          $Room10ChildAge = implode(",", $_REQUEST['room10-childAge']);
      }


      $Room1ContactName = ''; 
      $Room2ContactName = ''; 
      $Room3ContactName = ''; 
      $Room4ContactName = ''; 
      $Room5ContactName = ''; 
      $Room6ContactName = ''; 
      $Room7ContactName = ''; 
      $Room8ContactName = ''; 
      $Room9ContactName = ''; 
      $Room10ContactName = ''; 


      $adults = implode(",", $_REQUEST['adults']);
      $Child = implode(",", $_REQUEST['Child']);
      $data =  array(
                    'hotel_name' => $_REQUEST['hotel_name'], 
                    'Destination' => $_REQUEST['Destination'], 
                    'check_in' => $_REQUEST['CheckIn'], 
                    'check_out' => $_REQUEST['CheckOut'], 
                    'no_of_rooms' => $_REQUEST['noOfRooms'], 
                    'adults' => $adults, 
                    'child' => $Child, 
                    'Room1ChildAge' => $Room1ChildAge, 
                    'Room2ChildAge' => $Room2ChildAge, 
                    'Room3ChildAge' => $Room3ChildAge, 
                    'Room4ChildAge' => $Room4ChildAge, 
                    'Room5ChildAge' => $Room5ChildAge, 
                    'Room6ChildAge' => $Room6ChildAge, 
                    'Room7ChildAge' => $Room7ChildAge, 
                    'Room8ChildAge' => $Room8ChildAge, 
                    'Room9ChildAge' => $Room9ChildAge, 
                    'Room10ChildAge' => $Room10ChildAge, 
                    'Nationality' => $_REQUEST['nationality'],
                    'SpecialRequest' => $_REQUEST['special_req'], 
                    'createdDate' => date('Y-m-d'),
                    'AgentId' => $_REQUEST['agent_id'],
                    'budget' => $_REQUEST['budget']
                );
      $result = $this->OfflineModel->OfflineRequestSubmit($data);
      $type="hotel";
      $description = 'New hotel offline request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/booking/Offlinebooking');
    } 
  public function tour_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $tourMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Tours'); 
    if (count($tourMenu)!=0 && $tourMenu[0]->view==1) {
      $this->load->view('backend/offlinerequests/tour_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }   
  }  
  public function new_tour_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $tourMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Tours');
    if (count($tourMenu)!=0 && $tourMenu[0]->view==1 && $tourMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_tour_requests',$data);    
    } else {
      redirect(base_url().'backend/dashboard');
    }        
  } 
  public function tour_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['tour_type']=="") {
      $Return['error'] = 'Tour type field is required!';
      $Return['color'] = 'orange';
    }
    else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';  
    }
    echo json_encode($Return);
  }
  public function OfflineTourRequestSubmit() {
    $ChildAge = '';
      if (isset($_REQUEST['room1-childAge'])) {
          $ChildAge = implode(",", $_REQUEST['room1-childAge']);
      }
      $data =  array(
                    'tour_type' => $_REQUEST['tour_type'], 
                    'destination' => $_REQUEST['Destination'], 
                    'destination_id' => $_REQUEST['destination_id'],
                    'tdate' => $_REQUEST['tdate'], 
                    'adults' => $_REQUEST['adults'], 
                    'child' => $_REQUEST['Child'], 
                    'childage' => $ChildAge,
                    'nationality' => $_REQUEST['nationality'],
                    'special_request' => $_REQUEST['special_req'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                );
      $result = $this->OfflineModel->OfflineTourRequestSubmit($data);
      $type="tour";
      $description = 'New tour offline request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/tour_requests');
    } 
    public function offline_tour_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->tour_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $tourMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Tours'); 
          if($tourMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllineTourRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept = '<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllineTourRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($tourMenu[0]->view!=0){
            $view='<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_tour_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'TOB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->tour_type,
              $r->destination,
              date('d/m/Y' ,strtotime($r->tdate)),
              $r->sellingprice,
              $status,
              $booking_success .$view.$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  public function offline_tour_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinetourrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlinetourrequest_details',$data);
  }
  public function OfflineEditTourRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinetourrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditTourRequestModal',$data);
  }
  public function OfflineTourRequestupdate() {
    $this->OfflineModel->OfflineTourRequestupdate($_REQUEST);
    $description = 'Tour offline request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_tour_request_view?id=".$_REQUEST['id']);
  }
  public function OfflineActionModal() {
    $data['view'] = $this->OfflineModel->Offlinetourrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineActionModal',$data);
  }
  public function OfflineActionSubmit() {
    $this->OfflineModel->OfflineActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlinetourrequest_details($_REQUEST['id']);
    if ($_REQUEST['val']==1) {
      $this->tourrequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $this->load->library('email');
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : TOB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message); 
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');    
      $this->email->send();
      $description = 'Tour offline request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Tour offline request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  }
  public function transfer_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $tranferMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Transfers'); 
    if (count($tranferMenu)!=0 && $tranferMenu[0]->view==1) {
       $this->load->view('backend/offlinerequests/transfer_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }      
  }  
  public function new_transfer_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $tranferMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Transfers'); 
    if (count($tranferMenu)!=0 && $tranferMenu[0]->view==1 && $tranferMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_transfer_requests',$data);        
    } else {
      redirect(base_url().'backend/dashboard');
    }    
  } 
  public function transfer_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['arrivalNo']=="") {
      $Return['error'] = 'Arrival flight no field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['arrivalTime']=="") {
      $Return['error'] = 'Arrival flight time field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['pickpoint']=="") {
      $Return['error'] = 'Pick up point field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['droppoint']=="") {
      $Return['error'] = 'Drop off point field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['transfertype']=='two-way' && $_REQUEST['departureNo']=="") {
      $Return['error'] = 'Departure flight no field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['transfertype']=='two-way' && $_REQUEST['departureTime']=="") {
      $Return['error'] = 'Departure flight time field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['transfertype']=='two-way' && $_REQUEST['pickpoint1']=="") {
      $Return['error'] = 'Return pick up point field is required!';
      $Return['color'] = 'orange';
    }else if ($_REQUEST['transfertype']=='two-way' && $_REQUEST['droppoint1']=="") {
      $Return['error'] = 'Return drop off point field is required!';
      $Return['color'] = 'orange';
    }
    else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';  
    }
    echo json_encode($Return);
  }
  public function OfflineTransferRequestSubmit() {
      $data =  array(
                    'transfer_type' => $_REQUEST['transfertype'], 
                    'destination' => $_REQUEST['Destination'], 
                    'destination_id' => $_REQUEST['destination_id'],
                    'Passenger' => $_REQUEST['Passenger'], 
                    'Bags' => $_REQUEST['Bags'], 
                    'nationality' => $_REQUEST['nationality'],
                    'special_request' => $_REQUEST['special_req'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                    'arrivalNo' =>$_REQUEST['arrivalNo'],
                    'arrivalTime' =>$_REQUEST['arrivalTime'],
                    'pickpoint' => $_REQUEST['pickpoint'],
                    'droppoint' => $_REQUEST['droppoint'],
                    'departureNo' => $_REQUEST['departureNo'],
                    'departureTime' => $_REQUEST['departureTime'],
                    'returnpickpoint' => $_REQUEST['pickpoint1'],
                    'returndroppoint' => $_REQUEST['droppoint1'],
                );
      $result = $this->OfflineModel->OfflineTransferRequestSubmit($data);
      $type = "transfer";
      $description = 'New offline transfer request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/transfer_requests');
    } 
    public function offline_transfer_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->transfer_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $tranferMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Transfers'); 
          if($tranferMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllineTransferRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept = '<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllineTransferRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($tranferMenu[0]->view!=0){
            $view='<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_transfer_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          $SellingPrice = explode(",", $r->sellingprice);
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'TRB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->transfer_type,
              $r->destination,
              array_sum($SellingPrice),
              $status,
              $booking_success .$view .$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  public function OfflineTransferActionModal() {
    $data['view'] = $this->OfflineModel->Offlinetransferrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineTransferActionModal',$data);
  }
  public function OfflineTransferActionSubmit() {
    $this->OfflineModel->OfflineTransferActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlinetransferrequest_details($_REQUEST['id']);
    if ($_REQUEST['val']==1) {
      $this->load->library('email');
      $this->transferrequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : TRB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message);  
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');      
      $this->email->send();
      $description = 'Offline transfer request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Offline transfer request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  }
  public function offline_transfer_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinetransferrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlinetransferrequest_details',$data);
  }
  public function OfflineEditTransferRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinetransferrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditTransferRequestModal',$data);
  }
  public function OfflineTransferRequestupdate() {
    $this->OfflineModel->OfflineTransferRequestupdate($_REQUEST);
    $description = 'Offline transfer request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_transfer_request_view?id=".$_REQUEST['id']);
  }
  //offline visa requests
  public function visa_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $visaMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Visa'); 
    if (count($visaMenu)!=0 && $visaMenu[0]->view==1) {
      $this->load->view('backend/offlinerequests/visa_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }     
  }  
  // add new offline visa requests
  public function new_visa_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $visaMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Visa'); 
    if (count($visaMenu)!=0 && $visaMenu[0]->view==1 && $visaMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_visa_requests',$data);      
    } else {
      redirect(base_url().'backend/dashboard');
    }       
  } 
  //offline visa requests form validation
  public function visa_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['visa_type']=="") {
      $Return['error'] = 'Visa type field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['firstname']=="") {
      $Return['error'] = 'Firstname field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['lastname']=="") {
      $Return['error'] = 'Lastname field is required!';
      $Return['color'] = 'orange';
    }
    else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';
    }
    echo json_encode($Return);
  }
  //Offline visa request insert formdata
  public function OfflineVisaRequestSubmit() {
             $data =  array(
                    'visa_type' => $_REQUEST['visa_type'], 
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'], 
                    'expirydate' => $_REQUEST['expiry'], 
                    'birthdate' => $_REQUEST['bdate'], 
                    'firstname' => $_REQUEST['firstname'],
                    'lastname' => $_REQUEST['lastname'],
                    'nationality' => $_REQUEST['nationality'],
                    'special_request' => $_REQUEST['special_req'], 
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                );
      $result = $this->OfflineModel->OfflineVisaRequestSubmit($data);
      visa_request_passport_image_upload($result);
      $type = "visa";
      $description = 'New offline visa request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/visa_requests');
    } 
    //offline visa requests datatable list view
    public function offline_visa_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->visa_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $visaMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Visa'); 
          if($visaMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllineVisaRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept = '<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllineVisaRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($visaMenu[0]->view!=0){
            $view='<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_visa_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'VRB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->visa_type,
              $r->destination,
              $r->firstname.' '.$r->lastname,
              $r->sellingprice,
              $status,
              $booking_success .$view.$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  // alert box to accept and cancel offline visa requests
  public function OfflineVisaActionModal() {
    $data['view'] = $this->OfflineModel->Offlinevisarequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineVisaActionModal',$data);
  }
  // update the status of the offline visa request
  public function OfflineVisaActionSubmit() {
    $this->OfflineModel->OfflineVisaActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlinevisarequest_details($_REQUEST['id']);
    if ($_REQUEST['val']==1) {
      $this->load->library('email');
      $this->visarequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : VRB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message);  
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');    
      $this->email->send();
      $description = 'Offline visa request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Offline visa request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  }
  //view offline visa request details
  public function offline_visa_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinevisarequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlinevisarequest_details',$data);
  }
  // Edit offline visa requests
  public function OfflineEditVisaRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinevisarequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditVisaRequestModal',$data);
  }
  // update offline visa requests data
  public function OfflineVisaRequestupdate() {
    $this->OfflineModel->OfflineVisaRequestupdate($_REQUEST);
    $description = 'Offline visa request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_visa_request_view?id=".$_REQUEST['id']);
  }
  // @offline package requests
  // load the view page of offline package requests
  public function package_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $packageMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Package'); 
    if (count($packageMenu)!=0 && $packageMenu[0]->view==1) {
      $this->load->view('backend/offlinerequests/package_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }     
  }  
  // @add new offline package requests
  // load the form for adding offline package requests
  public function new_package_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $packageMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Package'); 
    if (count($packageMenu)!=0 && $packageMenu[0]->view==1 && $packageMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_package_requests',$data);        
    } else {
      redirect(base_url().'backend/dashboard');
    }   
  } 
  // @Offline package request validation
  // validating form fields on adding new
  // offline package requests
  public function package_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['toursreq']=="") {
      $Return['error'] = 'Tours required field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['budget']=="") {
      $Return['error'] = 'Budget field is required!';
      $Return['color'] = 'orange';
    }
    else { 
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';    
    }
    echo json_encode($Return);
  }
  // @Offline package request submit
  // get all the data of new offline package request to insert
  public function OfflinePackageRequestSubmit() {
    $ChildAge = '';
      if (isset($_REQUEST['room1-childAge'])) {
          $ChildAge = implode(",", $_REQUEST['room1-childAge']);
      }
             $data =  array(
                    'tourrequired' => $_REQUEST['toursreq'], 
                    'destination' => $_REQUEST['Destination'], 
                    'destination_id' => $_REQUEST['destination_id'],
                    'nationality' => $_REQUEST['nationality'], 
                    'checkin' => $_REQUEST['CheckIn'], 
                    'checkout' => $_REQUEST['CheckOut'],
                    'adults' => $_REQUEST['adults'],
                    'child'=>$_REQUEST['Child'],
                    'childage' => $ChildAge,
                    'specialrequest' => $_REQUEST['special_req'], 
                    'budget' => $_REQUEST['budget'],
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                );
      $result = $this->OfflineModel->OfflinePackageRequestSubmit($data);
      $type = "package";
      $description = 'New offline package request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/package_requests');
    } 
    // @offline package requests list
    // Lists all the offline package requests in datatable
    public function offline_package_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->package_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $packageMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Package'); 
          if($packageMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllinePackageRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept = '<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllinePackageRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($packageMenu[0]->view!=0){
            $view = '<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_package_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'PKB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->tourrequired,
              $r->destination,
              date('d/m/Y' ,strtotime($r->checkin)),
              date('d/m/Y' ,strtotime($r->checkout)),
              $r->sellingprice,
              $status,
              $booking_success .$view.$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  // @offline package requests status update
  // load the alert box to accept or cancel 
  // the offline package request
  public function OfflinePackageActionModal() {
    $data['view'] = $this->OfflineModel->Offlinepackagerequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflinePackageActionModal',$data);
  }
  // @offline pacakge request update
  // update the status of the offline package request
  public function OfflinePackageActionSubmit() {
    $this->OfflineModel->OfflinePackageActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlinepackagerequest_details($_REQUEST['id']);
     if ($_REQUEST['val']==1) {
      $this->load->library('email');
      $this->packagerequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : PKB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message);  
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');   
      $this->email->send();
      $description = 'Offline package request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Offline package request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  }
  // @offline package request view
  // view the complete details of offline package requests
  public function offline_package_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinepackagerequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlinepackagerequest_details',$data);
  }
  // @offline package requests edit view
  // load view page to edit the offline package requests
  public function OfflineEditPackageRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlinepackagerequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditPackageRequestModal',$data);
  }
  // @offline package requests edit
  //  update offline package requests data
  public function OfflinePackageRequestupdate() {
    $this->OfflineModel->OfflinePackageRequestupdate($_REQUEST);
    $description = 'Offline package request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_package_request_view?id=".$_REQUEST['id']);
  }
  // @offline flight requests
  // load the view page of offline flight requests
  public function flight_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $flightMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Flight'); 
    if (count($flightMenu)!=0 && $flightMenu[0]->view==1) {
      $this->load->view('backend/offlinerequests/flight_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }        
  }  
  // @add new offline flight requests
  // load the form for adding offline flight requests
  public function new_flight_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $flightMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Flight'); 
    if (count($flightMenu)!=0 && $flightMenu[0]->view==1 && $flightMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_flight_requests',$data);        
    } else {
      redirect(base_url().'backend/dashboard');
    }   
  } 
  // @Offline flight request validation
  // validating form fields on adding new
  // offline flight requests
  public function flight_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['From']=="") {
      $Return['error'] = 'From field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination field is required!';
      $Return['color'] = 'orange';
    }
    else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';  
    }
    echo json_encode($Return);
  }
 // @Offline flight request submit
 // get all the data of new offline flight request to insert
  public function OfflineFlightRequestSubmit() {
    $ChildAge = '';
      if (isset($_REQUEST['room1-childAge'])) {
          $ChildAge = implode(",", $_REQUEST['room1-childAge']);
      }
             $data =  array(
                    'from' => $_REQUEST['From'],
                    'from_id' => $_REQUEST['from_id'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'],
                    'departdate' => $_REQUEST['departdate'], 
                    'returndate' => $_REQUEST['returndate'],
                    'adults' => $_REQUEST['adults'],
                    'child'=>$_REQUEST['Child'],
                    'childage' => $ChildAge,
                    'specialrequest' => $_REQUEST['special_req'], 
                    'type' => $_REQUEST['type'],
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                );
      $result = $this->OfflineModel->OfflineFlightRequestSubmit($data);
      $type="flight";
      $description = 'New offline flight request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/flight_requests');
    } 
    // @offline flight requests list
    // Lists all the offline flight requests in datatable
    public function offline_flight_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->flight_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $flightMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Flight'); 
          if($flightMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllineFlightRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept = '<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllineFlightRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($flightMenu[0]->view!=0){
            $view = '<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_flight_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          $SellingPrice = explode(",", $r->sellingprice);
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'FGB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->type,
              $r->from,
              $r->destination,
              array_sum($SellingPrice),
              $status,
              $booking_success .$view.$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  // @offline flight requests status update
  // load the alert box to accept or cancel 
  // the offline flight request
  public function OfflineFlightActionModal() {
    $data['view'] = $this->OfflineModel->Offlineflightrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineFlightActionModal',$data);
  }
  // @offline flight request update
  // update the status of the offline flight request
  public function OfflineFlightActionSubmit() {
    $this->OfflineModel->OfflineFlightActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlineflightrequest_details($_REQUEST['id']);
    if ($_REQUEST['val']==1) {
      $this->load->library('email');
      $this->flightrequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : FGB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message);  
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');
      $this->email->send();
      $description = 'Offline flight request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Offline flight request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  }
  // @offline flight request view
  // view the complete details of offline flight requests
  public function offline_flight_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlineflightrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlineflightrequest_details',$data);
  }
  // @offline flight requests edit view
  // load view page to edit the offline flight requests
  public function OfflineEditFlightRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlineflightrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditFlightRequestModal',$data);
  }
  // @offline flight requests edit
  //  update offline flight requests data
  public function OfflineFlightRequestupdate() {
    $this->OfflineModel->OfflineFlightRequestupdate($_REQUEST);
    $description = 'Offline flight request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_flight_request_view?id=".$_REQUEST['id']);
  }
  // @offline park requests
  // load the view page of offline park requests
  public function park_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $parkMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Park'); 
    if (count($parkMenu)!=0 && $parkMenu[0]->view==1) {
       $this->load->view('backend/offlinerequests/park_requests');
    } else {
      redirect(base_url().'backend/dashboard');
    }  
  }   
  // @add new offline park requests
  // load the form for adding offline park requests
  public function new_park_requests() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
    }
    $data['nationality'] = $this->OfflineModel->nationalityList();
    $data['agents'] = $this->OfflineModel->get_agents();
    $parkMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Park');
    if (count($parkMenu)!=0 && $parkMenu[0]->view==1 && $parkMenu[0]->create==1) {
      $this->load->view('backend/offlinerequests/new_park_requests',$data);        
    } else {
      redirect(base_url().'backend/dashboard');
    } 
  }
  // @Offline park request validation
  // validating form fields on adding new
  // offline park requests
  public function park_requests_validation() {
     if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    if ($_REQUEST['agent_id']=="") {
      $Return['error'] = 'Agent Name field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['Destination']=="") {
      $Return['error'] = 'Destination is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['themePark']=="") {
      $Return['error'] = 'Theme park field is required!';
      $Return['color'] = 'orange';
    }
    else if ($_REQUEST['nationality']=="") {
      $Return['error'] = 'Nationality field is required!';
      $Return['color'] = 'orange';
    }
    else {
        $Return['error'] = "Inserted Successfully!";
        $Return['color'] = 'green';
        $Return['status'] = '1';  
    }
    echo json_encode($Return);
  }
  // @Offline park request submit
  // get all the data of new offline park request to insert
  public function OfflineParkRequestSubmit() {
    $ChildAge = '';
      if (isset($_REQUEST['room1-childAge'])) {
          $ChildAge = implode(",", $_REQUEST['room1-childAge']);
      }
             $data =  array(
                    'themePark' => $_REQUEST['themePark'],
                    'nationality' => $_REQUEST['nationality'],
                    'destination' => $_REQUEST['Destination'],
                    'destination_id' => $_REQUEST['destination_id'],
                    'pdate' => $_REQUEST['pdate'], 
                    'adults' => $_REQUEST['adults'],
                    'child'=>$_REQUEST['Child'],
                    'childage' => $ChildAge,
                    'specialrequest' => $_REQUEST['special_req'],
                    'created_date' => date('Y-m-d'),
                    'agent_id' => $_REQUEST['agent_id'],
                );
      $result = $this->OfflineModel->OfflineParkRequestSubmit($data);
      $type="park";
      $description = 'New offline park request added [ID: '.$result.']';
      AdminlogActivity($description);
      offlinerequestMailNotification($result,$type);
      redirect(base_url().'backend/Offlinerequest/park_requests');
    } 
    // @offline flight requests list
    // Lists all the offline flight requests in datatable
    public function offline_park_request_list() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      if (!isset($_REQUEST['filter'])) {
        $_REQUEST['filter'] = 2;
      }
      $booking_list = $this->OfflineModel->park_offline_request_list($_REQUEST['filter']);
        foreach($booking_list->result() as $key => $r) {
          $parkMenu = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Park');
          if($parkMenu[0]->edit!=0) {
            $reject = '<a title="Reject" href="#" class="btn-sm" onclick="OffllineParkRequestactionfun('.$r->id.',0);" data-toggle="modal" data-target="#booking_modal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
            $accept ='<a href="#" class="btn-sm" data-toggle="modal" data-target="#booking_modal" onclick="OffllineParkRequestactionfun('.$r->id.',1);" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a>';
          } else {
            $reject = '';
            $accept = '';
          }
          if($parkMenu[0]->view!=0){
            $view = '<a title="view" class="btn-sm"  href="'.base_url().'backend/offlinerequest/offline_park_request_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
          } else {
            $view="";
          }
          $SellingPrice = explode(",", $r->sellingprice);
          if ($r->requestFlg==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = $accept;
            $permission = $reject;
          } else if ($r->requestFlg==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
            $permission = $reject;
          } else  {
            $status= "<span class='text-danger'>Cancelled</span>";
            $booking_success = '';
            $permission = '';
          }
              $data[] = array(
              $key+1,
              'PRB'.$r->id,
              date('d/m/Y' ,strtotime($r->created_date)),
              $r->themePark,
              $r->destination,
              date('d/m/Y' ,strtotime($r->pdate)),
              array_sum($SellingPrice),
              $status,
              $booking_success .$view.$permission,
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
  }
  // @offline park requests status update
  // load the alert box to accept or cancel 
  // the offline park request
  public function OfflineParkActionModal() {
    $data['view'] = $this->OfflineModel->Offlineparkrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineParkActionModal',$data);
  }
  // @offline park request update
  // update the status of the offline park request
  public function OfflineParkActionSubmit() {
    $this->OfflineModel->OfflineParkActionupdate($_REQUEST);
    $data = $this->OfflineModel->Offlineparkrequest_details($_REQUEST['id']);
    if ($_REQUEST['val']==1) {
      $this->load->library('email');
      $this->parkrequest_accepted_mailinvoice_attach($_REQUEST['id']);
      $mail_settings = mail_details();
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : PRB'.$data[0]->requestid.')';
      $message = 'Dear '.$data[0]->ContactName.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            Your booking is confirmed.<br><br>
            
            -------------------------------------------------------------
            <br><br>

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
      $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $this->email->to($data[0]->contactemail);
      $this->email->Bcc($mail_settings[0]->smtp_user); 
      $this->email->subject($subject);
      $this->email->message($message);  
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/'.'Invoice00'.$data[0]->requestid.'.pdf'; 
      $this->email->attach($path,'');    
      $this->email->send();
      $description = 'Offline park request accepted [ID: '.$_REQUEST['id'].']';
    } else {
      $description = 'Offline park request cancelled [ID: '.$_REQUEST['id'].']';
    }
    AdminlogActivity($description);
    echo json_encode(true);
  } 
  // @offline park request view
  // view the complete details of offline park requests
  public function offline_park_request_view() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlineparkrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/Offlineparkrequest_details',$data);
  }
  // @offline park requests edit view
  // load view page to edit the offline park requests
  public function OfflineEditParkRequestModal() {
    if ($this->session->userdata('name')=="") {
        redirect("../backend/");
      }
    $data['view'] = $this->OfflineModel->Offlineparkrequest_details($_REQUEST['id']);
    $this->load->view('backend/offlinerequests/OfflineEditParkRequestModal',$data);
  }
  // @offline park requests edit
  //  update offline park requests data
  public function OfflineParkRequestupdate() {
    $this->OfflineModel->OfflineParkRequestupdate($_REQUEST);
    $description = 'Offline park request details edited [ID: '.$_REQUEST['id'].']';
    AdminlogActivity($description);
    redirect("../backend/offlinerequest/offline_park_request_view?id=".$_REQUEST['id']);
  }
  public function dummy() {
    offlinerequestMailNotification(2,'park');
  }
  // @Tour invoice mail
  // generating invoice to attach with the customer mail
  public function tourrequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlinetourrequest_details($id);
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //TOUR DETAILS
    $invoice_company_name=$data[0]->tour_type;
    $invoice_company_address=$data[0]->destination;  
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "TOB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;"></td>
          <td style="text-align:right;">Tour name : '.$invoice_company_name.'</td>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb2, true, false, false, false, '');
    // TOUR DETAILS
    $arrivaldate=date('d-m-Y',strtotime($data[0]->tdate));

    //ADULT & CHILD DETAILS 
    $child_no=$data[0]->adults;
    $adult_no=$data[0]->child;

    $tb4=
    '
      <style type="text/css">
        .tb4h {font-size:10px; background-color:ghostwhite; padding-top:5px;padding-bottom:5px}
      </style>

      <table class="tb4h">
        <tr>
          <td>Adult(s) : '.$adult_no.'</td>
          <td>Child(s) : '.$child_no.'</td>
        </tr>
      </table>
    ';

    // $pdf->writeHTML($tb4,true,false,false,false,'');


    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Date of Tour</td>
          <td style="color: white">Tour Name</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$arrivaldate.'</td>
                <td>'.$invoice_company_name.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</td>
          </tr>
    ';                  
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';

    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = $data[0]->sellingprice;
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END
    $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*'); 
      foreach($files as $file){
          if(is_file($file))
          unlink($file); 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
  // @Transfer invoice mail
  // generating invoice to attach with the customer mail
  public function transferrequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlinetransferrequest_details($id);  
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //TRANSFER DETAILS
    $invoice_company_address=$data[0]->destination;  
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "TRB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
        </tbody>
      </table>
    ';

    $pdf->writeHTML($tb2, true, false, false, false, '');
    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $SellingPrice = explode(",", $data[0]->sellingprice);
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Date & Time</td>
          <td style="color: white">Pickup/Dropoff</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$data[0]->arrivalTime.'</td>
                <td>'.$data[0]->pickpoint.'<br> - <br>'.$data[0]->droppoint.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$SellingPrice[0]).' '.admin_currency().'</td>
          </tr>
    ';   
    if($data[0]->transfer_type == 'two-way') {
      $tb51 .=
      '
          <tr>
                <td>'.$data[0]->departureTime.'</td>
                <td>'.$data[0]->returnpickpoint.'<br> - <br>'.$data[0]->returndroppoint.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$SellingPrice[1]).' '.admin_currency().'</td>
          </tr>
      ';  
    }               
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),array_sum($SellingPrice)).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';
    


    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = array_sum($SellingPrice);
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END

      $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*'); 
      foreach($files as $file){
          if(is_file($file))
          unlink($file); 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
  // @Visa invoice mail
  // generating invoice to attach with the customer mail
  public function visarequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlinevisarequest_details($id);
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //TOUR DETAILS
    $invoice_company_name=$data[0]->visa_type;
    $invoice_company_address=$data[0]->destination;  
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "VRB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;"></td>
          <td style="text-align:right;">Type of Visa : '.$invoice_company_name.'</td>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb2, true, false, false, false, '');
   
    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Type of Visa</td>
          <td style="color: white">Applicant Name</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$invoice_company_name.'</td>
                <td>'.$data[0]->firstname.' '.$data[0]->lastname.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</td>
          </tr>
    ';                  
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';

    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = $data[0]->sellingprice;
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END
    $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*');
      foreach($files as $file){
          if(file_exists($file)) {
            unlink($file); 
          } 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
  // @Package invoice mail
  // generating invoice to attach with the customer mail
  public function packagerequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlinepackagerequest_details($id);
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //PACKAGE DETAILS
    $checkin=date('d-m-Y',strtotime($data[0]->checkin));
    $checkout=date('d-m-Y',strtotime($data[0]->checkout));
    $invoice_company_address=$data[0]->destination;  
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "PKB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb2, true, false, false, false, '');
   
    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Tours Required</td>
          <td style="color: white">Dates</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$data[0]->tourrequired.'</td>
                <td>'.$checkin.' -  '.$data[0]->checkout.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</td>
          </tr>
    ';                  
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';

    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = $data[0]->sellingprice;
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END
    $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*'); 
      foreach($files as $file){
          if(is_file($file))
          unlink($file); 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
  // @Flight invoice mail
  // generating invoice to attach with the customer mail
  public function flightrequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlineflightrequest_details($id);  
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //TRANSFER DETAILS
    $departdate = date("d-m-y",strtotime($data[0]->departdate));
    $returndate = date("d-m-y",strtotime($data[0]->returndate));
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "FGB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
        </tbody>
      </table>
    ';

    $pdf->writeHTML($tb2, true, false, false, false, '');
    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $SellingPrice = explode(",", $data[0]->sellingprice);
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Type</td>
          <td style="color: white">Date</td>
          <td style="color: white">From</td>
          <td style="color: white">To</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$data[0]->type.'</td>
                <td>'.$departdate.'</td>
                <td>'.$data[0]->from.'</td>
                <td>'.$data[0]->destination.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$SellingPrice[0]).' '.admin_currency().'</td>
          </tr>
    ';   
    if($data[0]->type == 'Round trip') {
      $tb51 .=
      '
          <tr>
                <td>Return</td>
                <td>'.$returndate.'</td>
                <td>'.$data[0]->destination.'</td>
                <td>'.$data[0]->from.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$SellingPrice[1]).' '.admin_currency().'</td>
          </tr>
      ';  
    }               
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="4" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),array_sum($SellingPrice)).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';
    


    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = array_sum($SellingPrice);
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END

      $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*'); 
      foreach($files as $file){
          if(is_file($file))
          unlink($file); 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
  // @Park invoice mail
  // generating invoice to attach with the customer mail
  public function parkrequest_accepted_mailinvoice_attach($id) {
    $data = $this->OfflineModel->Offlineparkrequest_details($id);
    require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
    ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $this->load->library('Pdf');
    $dimensions = $pdf->getPageDimensions();
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');

    // HEADER
    $pdf->SetAuthor('Otelseasy');
    $pdf->SetTitle('Otelseasy');

    // DESIGN
    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    // $pdf->SetHeaderMargin(20);
    $pdf->AddPage();
    $info_right_column = '';
    $info_left_column  = '';
    $invoice='';  

    //AGENT DETAILS
    $agent_name=$data[0]->AFName." ".$data[0]->ALName;
    $agent_number=$data[0]->Mobile;
    $agent_email=$data[0]->Email;

    //PARK DETAILS
    $invoice_company_name=$data[0]->themePark;
    $invoice_company_address=$data[0]->destination;  
    $tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl .= 
    '
      <tr>
        <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
        <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
        </td>
      </tr>
    ';

    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    $html='
    <div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
    <div  style="font-size:12px ">Issued to : </div>
    ';
    $pdf->writeHTML($html, false, false, false, false, '');

    //INVOICE DETAILS
    $invoice_data_date= date("d-m-Y");
    $invoice_number = "Invoice00".$data[0]->requestid;
    $reference_id = "PRB".$data[0]->requestid;
    $customer_name=$data[0]->ContactName;
    $customer_email=$data[0]->contactemail;
    $customer_phone=$data[0]->contactnum;
    $tb2 =
    '
      <table class="table2">
      <tbody>
        <tr>
          <td style="text-indent:5px;">'.$customer_name.'</td>
          <td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_phone.'</td>
          <td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;">'.$customer_email.'</td>
          <td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
        </tr>
        <tr>
          <td style="text-indent:5px;"></td>
          <td style="text-align:right;">Park name : '.$invoice_company_name.'</td>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb2, true, false, false, false, '');
    // TOUR DETAILS
    $arrivaldate=date('d-m-Y',strtotime($data[0]->pdate));

   
    //AMOUNT DETAILS START

    $tb5=
    '
      <table style="border-collapse: collapse">
      <tbody>
        <tr>
          <th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
        </tr>
      </tbody>
      </table>
    ';
    $pdf->writeHTML($tb5,true,false,false,false,'');
    $tb51=
    '
      <style type="text/css">
        .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
        .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
        .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
      </style>
    ';
    $tb51.=
    '
      <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
      <thead>
        <tr style="background-color: #0074b9;">
          <td style="color: white">Park Name</td>
          <td style="color: white">Date</td>
          <td style="color: white">Rate</td>
        </tr>
      </thead>
      <tbody>
    ';
    $tb51 .=
    '
          <tr>
                <td>'.$data[0]->themePark.'</td>
                <td>'.$arrivaldate.'</td>
                <td style="text-align: right">
                '.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</td>
          </tr>
    ';                  
    $tb51 .=
    '
      </tbody>
      <tfoot>
        <tr>
            <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
            <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(admin_currency(),$data[0]->sellingprice).' '.admin_currency().'</strong></td>
        </tr>
    </tfoot>
    </table>';

    $pdf->writeHTML($tb51,true,false,false,false,'');
    $final_total = $data[0]->sellingprice;
    $tb52 =
    '
      <table style="border-collapse: collapse">
        <tr>
          <td colspan="2"></td>
          <td>Tax :</td>
          <td style="text-align:right">0%</td>
        </tr>
    ';

    $tb52 .= 
    '
        <tr>
          <td colspan="2"></td>
          <td>GRAND TOTAL :</td>
          <td style="text-align:right">'.currency_type(admin_currency(),$final_total).' '.admin_currency().'</td>
        </tr>
      </table>
    ';
    $pdf->writeHTML($tb52,true,false,false,false,'');
    //AMOUNT DETAILS END
    $bankDetails = $this->Payment_Model->bankDetails();
      $tb9 = 
      '
        <table style="border-collapse: collapse">
          <thead>
            <tr>
                <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
                </td>   
              </tr>
              <tr>
                <td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
                </td>
              </tr>
              <tr>
                <td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
              </tr>
            </thead>
        </table>
      ';      
      $pdf->writeHTML($tb9,true,false,false,false,'');
      $path = get_upload_path_by_type('offline_requests_invoice_pdf').$this->session->userdata('id').'/';
      _maybe_create_upload_path($path);
      $files = glob($path.'*'); 
      foreach($files as $file){
          if(is_file($file))
          unlink($file); 
      }
      $newpath  = $path . $invoice_number.'.pdf';
      $type = 'F';
      $pdf->Output($newpath, $type);
  }
}