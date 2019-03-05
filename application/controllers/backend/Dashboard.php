<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->model('Common_Model');
          $this->load->model('Finance_Model');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('Country');
          $this->load->helper('common');
          $this->load->helper('manuallog');
     }
	
	public function index()
	{

		if ($this->session->userdata('name')=="") {
      redirect("../backend/logout");
    }
    $countTotal = array();
    $data['user_count'] = $this->Common_Model->user_count();
    $data['agent_count'] = $this->Common_Model->agent_count();
    $data['hotel_count'] = $this->Common_Model->hotel_count();
    $data['booking_count'] = $this->Common_Model->booking_count();
    $data['map'] = $this->Common_Model->country_booking_count();
    $data['location_count'] = $this->Common_Model->country_booking_count();
    $data['mbcdata'] = $this->Common_Model->Report_country_booking_count(2,date('Y'));
    $total_booking = $this->Common_Model->total_booking();
    foreach ($total_booking as $key => $value) {
      $countTotal[$key] = $value->count;
    }
    $data['total_booking'] = array_sum($countTotal);
    for ($m=1; $m<=12; $m++) {
			$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
			$date = date('Y-m', mktime(0,0,0,$m, 1, date('Y')));
     // echo $month. '<br>' . $date;
	    $data['month'][] = $month;
  		$data['booking_app_status'][$m] = $this->Common_Model->country_booking_status("1",$date);
  		$data['booking_can_status'][$m] = $this->Common_Model->country_booking_status("3",$date);
      $data['booking_Pen_status'][$m] = $this->Common_Model->country_booking_status("0",$date);
    }
    if ($this->session->userdata('email')!="") {
      $data['password_reset'] = $this->Common_Model->check_password_reset($this->session->userdata('email'));
    }
    $rolecheck = RoleAvailability($this->session->userdata('id')); 
   
    if (count($rolecheck)==0) {
      $data1['role']=$this->Common_Model->SelectRole();
      $this->load->view('backend/dashboard/role_modal',$data1);
    } else {
      $data['country']= $this->Finance_Model->SelectCountry();
      $this->load->view('backend/dashboard/index',$data);
    }
	}
  public function notify_alert() {
    $data = $this->Common_Model->notification();
    $Ses_userID = $this->session->userdata('id');
    if (count($data)!=0) {
      foreach ($data as $key => $value) {
        $check_id[$key] = explode(",", $value->user_id);
        foreach ($check_id[$key] as $key1 => $value1) {
            if ($value1==$Ses_userID) {
              $notifi_id[] = $value->id;
              $user_id[] = $value1;
              $msg_type[] = $value->notification_msg;
              $condition[] = true;
            } else {
              $user_id[] = "";
              $msg_type[] = "";
              $condition[] = false;
              $notifi_id[] = $value->id;
            }
        }
      }
    } else {
      $user_id[] = "";
      $msg_type[] = "";
      $condition[] = false;
      $notifi_id[] = '';
    }
    $return['user_id'] = $user_id;
    $return['msg_type'] = $msg_type;
    $return['condition'] = $condition;
    $return['notifi_id'] = $notifi_id;
    echo json_encode($return);
  }
  public function notify_remove(){
    $data = $this->Common_Model->notify_remove($_REQUEST['id'],$_REQUEST['user_id']);
    echo json_encode(true);
  }
  public function notify_list() {
    $notify = "";
    $data = agent_request_count();
    $id=$this->session->userdata('id');
    $total = $data['agent_request']+$data['hotel_request']+$data['hotel_booking_accept']+$data['hotel_booking__reject']+$data['hotel_booking_cancelled']+$data['hotel_booking_request']+$data['transfer_booking_cancelled']+$data['tour_booking_request']+$data['transfer_booking_request'];
    // print_r($id);
    // exit();
    $notify.= "<a class='waves-effect btn-noti dropdown-toggle' href='javascript:void()' data-toggle='dropdown'><i class='fa fa-bell-o' aria-hidden='true'></i><span>".$total."</span></a>
          <ul class='dropdown-menu'>
            <li class='text-center noti-title'><h4>Notification</h4></li>";
    if ($data['agent_request']!=0) {
      $type = '"agent_request"';
      $url = '"'.base_url().'backend/agents"';
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-user pull-left'></i>
                <div class='bold noti-head'>New agent registered</div>
                <small class='noti-text'>You have ".$data['agent_request']." unread messages</small>
            </a></li>";
    }
    if ($data['hotel_request']!=0) {
      $type = '"hotel_request"';
      $url = '"'.base_url().'backend/hotels"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-building-o pull-left'></i>
                <div class='bold noti-head'>New hotel registered</div>
                <small class='noti-text'>You have ".$data['hotel_request']." unread messages</small>
            </a></li>";
    }
     if ($data['hotel_booking_accept']!=0) {
      $type = '"hotel_booking_accept"';
      $url = '"'.base_url().'backend/booking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-heart-o pull-left'></i>
                <div class='bold noti-head'>Hotel booking Accepted</div>
                <small class='noti-text'>You have ".$data['hotel_booking_accept']." unread messages</small>
            </a></li>";
    }
    if ($data['hotel_booking__reject']!=0) {
      $type = '"hotel_booking__reject"';
      $url = '"'.base_url().'backend/booking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-minus-square pull-left'></i>
                <div class='bold noti-head'>Hotel booking Rejected</div>
                <small class='noti-text'>You have ".$data['hotel_booking__reject']." unread messages</small>
            </a></li>";
    }
    if ($data['hotel_booking_cancelled']!=0) {
      $type = '"hotel_booking_cancelled"';
      $url = '"'.base_url().'backend/booking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-ban pull-left'></i>
                <div class='bold noti-head'>Hotel booking Cancelled</div>
                <small class='noti-text'>You have ".$data['hotel_booking_cancelled']." unread messages</small>
            </a></li>";
    }
    if ($data['hotel_booking_request']!=0) {
      $type = '"hotel_booking_request"';
      $url = '"'.base_url().'backend/booking"'; 
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-shopping-cart pull-left'></i>
                <div class='bold noti-head'>New Booking</div>
                <small class='noti-text'>You have ".$data['hotel_booking_request']." unread messages</small>
            </a></li>";
    }
    if ($data['transfer_booking_request']!=0) {
      $type = '"transfer_booking_request"';
      $url = '"'.base_url().'backend/booking/TransferBooking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-heart-o pull-left'></i>
                <div class='bold noti-head'>Transfer booking Accepted</div>
                <small class='noti-text'>You have ".$data['transfer_booking_request']." unread messages</small>
            </a></li>";
    }
    if ($data['transfer_booking_cancelled']!=0) {
      $type = '"transfer_booking_cancelled"';
      $url = '"'.base_url().'backend/booking/TransferBooking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-ban pull-left'></i>
                <div class='bold noti-head'>Transfer booking Cancelled</div>
                <small class='noti-text'>You have ".$data['transfer_booking_cancelled']." unread messages</small>
            </a></li>";
    }
    if ($data['tour_booking_request']!=0) {
      $type = '"tour_booking_request"';
      $url = '"'.base_url().'backend/booking/TourBooking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-heart-o pull-left'></i>
                <div class='bold noti-head'>Tour booking Accepted</div>
                <small class='noti-text'>You have ".$data['tour_booking_request']." unread messages</small>
            </a></li>";
    }
    if ($data['tour_booking_cancelled']!=0) {
      $type = '"tour_booking_cancelled"';
      $url = '"'.base_url().'backend/booking/TourBooking"';     
      $notify.= "<li><a href='javascript:notify_list_remove($type,$id,$url);'>
                <i class='fa fa-ban pull-left'></i>
                <div class='bold noti-head'>Tour booking Cancelled</div>
                <small class='noti-text'>You have ".$data['tour_booking_cancelled']." unread messages</small>
            </a></li>";
    }
    $notify.= "</ul>";

    echo $notify;
  }
  public function notify_list_remove() {
    notify_list_remove($_REQUEST['type'],$_REQUEST['id']);
    echo json_encode(true);
  }
  public function currency_auto_update() {
    $currency_get = $this->Common_Model->currency_auto_update(); 
    foreach ($currency_get as $key => $value) {
      $data[$key]=currency_type_gc($value->currency_type,"1");
      $update = $this->Common_Model->added_currency_amount_update($data[$key],$value->id); 
    }
    return true;
  }
  public function calendar_modal() {
    $this->load->model("Hotels_Model");
    $data = array();
    $data['view']= $this->Hotels_Model->all_contract();
    $data['hotels'] = $this->Hotels_Model->contract_hotel_list();
    if (isset($_REQUEST['hotel_id'])) {
      $hotel_id = $_REQUEST['hotel_id'];
    } else {
      $hotel_id = $data['view'][0]->hotel_id;
    }
    $data['contract'] = $this->Hotels_Model->hotel_contract_list($hotel_id);
    $rooms = $this->Hotels_Model->hotel_rooms_list($hotel_id);
    $data['rooms'] = $rooms->result();
    if (isset($_REQUEST['con_id'])) {
      $con_id = $_REQUEST['con_id'];
    } else {
      $con_id = $data['contract'][0]->contract_id;
    }

    $this->load->view('backend/components/calendar_modal',$data);
  }
  public function dummy(){
    $this->load->model("Hotels_Model");
    $data = array();
    $data['view']= $this->Hotels_Model->all_contract();
    $data['hotels'] = $this->Hotels_Model->contract_hotel_list();
    if (isset($_REQUEST['hotel_id'])) {
      $hotel_id = $_REQUEST['hotel_id'];
    } else {
      $hotel_id = $data['view'][0]->hotel_id;
    }
    $data['contract'] = $this->Hotels_Model->hotel_contract_list($hotel_id);
    $rooms = $this->Hotels_Model->hotel_rooms_list($hotel_id);
    $data['rooms'] = $rooms->result();
    if (isset($_REQUEST['con_id'])) {
      $con_id = $_REQUEST['con_id'];
    } else {
      $con_id = $data['contract'][0]->contract_id;
    }
    $data['closedout'] = $this->Hotels_Model->closedout_check($hotel_id,$con_id);
    // print_r($data['view'][0]->hotel_id);
    // print_r($data['contract'][0]);
    // print_r($data['rooms'][0]->id);
    print_r($data['closedout']);
  }
  public function RoleSelectAdd(){
    
    $id=$_REQUEST['user_id'];
    $add= $this->Common_Model->RoleSelectAdd($id,$_REQUEST);
    redirect("../backend/dashboard?id=".$_REQUEST['user_id']);
  }
  public function HistoryLogs() {
    if ($this->session->userdata('name')==""){
      redirect("../backend/");
    }
    $historylogMenu = menuPermissionAvailability($this->session->userdata('id'),'History Logs',''); 
    if (count($historylogMenu)!=0 && $historylogMenu[0]->view==1) {
      $this->load->view('backend/dashboard/HistoryLogs');
    } else {
      redirect(base_url().'backend/dashboard');
    }   
  }
  public function HistoryLogsViews() {
    if ($this->session->userdata('name')==""){
      redirect("../backend/");
    }
    $historylogMenu = menuPermissionAvailability($this->session->userdata('id'),'History Logs',''); 
    if (count($historylogMenu)!=0 && $historylogMenu[0]->view==1) {
      $this->load->view('backend/dashboard/HistoryLogsViews');
    } else {
      redirect(base_url().'backend/dashboard');
    }      
  }
  public function HistoryLogsViewList() {
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query =  $this->Common_Model->HistoryLogs($_REQUEST['module']);
    $query1 =  $this->Common_Model->HistoryOldLogs($_REQUEST['module']);
    foreach ($query1 as $key => $r) {
        if ($r->name!="") {
          $narration = $r->narration.' [Id: '.$r->id.', Name: '.$r->name.']';
        } else {
          $narration = $r->narration.' [Id: '.$r->id.']';
        }
        $data[] = array(
            '',
            $r->dateVal,
            $r->userType,
            $r->userName,
            $r->event,
            $narration,
        );
    }

    foreach ($query as $key => $r) {
        if ($r->name!="") {
          $narration = $r->narration.' [Id: '.$r->id.', Name: '.$r->name.']';
        } else {
          $narration = $r->narration.' [Id: '.$r->id.']';
        }
        $data[] = array(
            '',
            $r->dateVal,
            $r->userType,
            $r->userName,
            $r->event,
            $narration,
        );
    }

    $output = array(
        "draw" => $draw,
       "recordsTotal" => count($query)+count($query1),
       "recordsFiltered" => count($query)+count($query1),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function offlineNotify() {
    $notify = array();
    $this->db->select('id');
    $this->db->from('hotel_tbl_offlinerequest');
    $hotel = $this->db->where('bookingFlg',2)->get()->result();
    if (count($hotel)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/booking/Offlinebooking">
                      <span>You have </span>
                      <strong>'.count($hotel).'</strong>
                      <span>hotel request</span>
                      </a>
                    </div>';
    } 


    $this->db->select('id');
    $this->db->from('tour_tbl_requests');
    $tour = $this->db->where('requestFlg',2)->get()->result();
    if (count($tour)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/tour_requests">
                      <span>You have </span>
                      <strong>'.count($tour).'</strong>
                      <span>tour request</span>
                      </a>
                    </div>';

    } 

    $this->db->select('id');
    $this->db->from('transfer_tbl_requests');
    $transfer = $this->db->where('requestFlg',2)->get()->result();
    if (count($transfer)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/transfer_requests">
                      <span>You have </span>
                      <strong>'.count($transfer).'</strong>
                      <span>transfer request</span>
                      </a>
                    </div>';

    } 

    $this->db->select('id');
    $this->db->from('visa_tbl_requests');
    $visa = $this->db->where('requestFlg',2)->get()->result();
    if (count($visa)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/visa_requests">
                      <span>You have </span>
                      <strong>'.count($visa).'</strong>
                      <span>visa request</span>
                      </a>
                    </div>';

    } 

    $this->db->select('id');
    $this->db->from('package_tbl_requests');
    $package = $this->db->where('requestFlg',2)->get()->result();
    if (count($package)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/package_requests">
                      <span>You have </span>
                      <strong>'.count($package).'</strong>
                      <span>package request</span>
                      </a>
                    </div>';

    } 

    $this->db->select('id');
    $this->db->from('flight_tbl_requests');
    $flight = $this->db->where('requestFlg',2)->get()->result();
    if (count($flight)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/flight_requests">
                      <span>You have </span>
                      <strong>'.count($flight).'</strong>
                      <span>flight request</span>
                      </a>
                    </div>';

    } 

    $this->db->select('id');
    $this->db->from('park_tbl_requests');
    $park = $this->db->where('requestFlg',2)->get()->result();
    if (count($park)!=0) {
      $notify[] = '<div class="home_header">
                        <a href="'.base_url().'backend/offlinerequest/park_requests">
                      <span>You have </span>
                      <strong>'.count($park).'</strong>
                      <span>park request</span>
                      </a>
                    </div>';

    }
    echo json_encode($notify);
  }
  public function TRNReport() {
    $noTotal = array();
    $Return['LeadTime'] = array();
    $Return['Transaction'] = array();
    $Return['Totper'] = array();
    $Return['colors'] = array();

    $ReportFilter = $this->Finance_Model->RoomNightReportFilter($_REQUEST);
    foreach ($ReportFilter->result() as $key => $value) {
      $noTotal[] = $value->noOfTrans;
    }
    $arraySum = array_sum($noTotal);

    foreach($ReportFilter->result() as $key1 => $r) {
        $color = $this->random_color_part().$this->random_color_part().$this->random_color_part();
        $Return['LeadTime'][] = $r->LeadTime;
        $Return['Transaction'][] = $r->noOfTrans;
        $Return['Totper'][] = round(($r->noOfTrans * 100)/$arraySum,2);
        $Return['colors'][] = '#81C784';
    }
    echo json_encode($Return);
  }
  public function random_color_part() {
      return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
  }
  public function BCReport() {
    for ($m=1; $m<=12; $m++) {
      $month = strtoupper(substr(date('F', mktime(0,0,0,$m, 1, $_REQUEST['year'])),0,3));
      $date = date('Y-m', mktime(0,0,0,$m, 1, $_REQUEST['year']));

      $data['month'][] = $month;
      $data['booking_app_status'][] = count($this->Common_Model->country_booking_status("1",$date));
      $data['booking_can_status'][] = count($this->Common_Model->country_booking_status("3",$date));
      $data['booking_Pen_status'][] = count($this->Common_Model->country_booking_status("0",$date));
    }
    echo json_encode($data);
  }
  public function MBCReport() {
    $data['mbcdata'] = $this->Common_Model->Report_country_booking_count($_REQUEST['filter'],$_REQUEST['year']);
    echo json_encode($data);

  }
}


