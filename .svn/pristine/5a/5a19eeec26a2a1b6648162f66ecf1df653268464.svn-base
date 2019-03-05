<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
		      $this->load->helper('common');
          $this->load->model('Hotels_Model');
          $this->load->model('Agents_Model');
          $this->load->model('Payment_Model');
          $this->load->model('Finance_Model');
          $this->load->model('List_Model');
          $this->load->helper('upload');
          $this->load->library('Hotel_calendar');
          $this->load->library('email');
     }
	
	public function index()
	{
		if ($this->session->userdata('agent_name')=="") {
			redirect("../");
		}
    $arr_sum=array();
		$id=$this->session->userdata('agent_id');
		$data['available']=$this->Agents_Model->front_end_select($id);
		
    $request_count=$this->Agents_Model->booking_counts($id,2);
    $data['request_count'] = count($request_count);

    $confirm_count=$this->Agents_Model->booking_counts($id,1);
    $data['confirm_count'] = count($confirm_count);

    $cancel_count=$this->Agents_Model->booking_counts($id,3);
    $data['cancel_count'] = count($cancel_count);

    $cancel_req_count=$this->Agents_Model->booking_counts($id,5);
    $data['cancel_req_count'] = count($cancel_req_count);

    $accept_req_count=$this->Agents_Model->booking_counts($id,4);
    $data['accept_req_count'] = count($accept_req_count);

    $reject_count=$this->Agents_Model->booking_counts($id,0);
		$data['reject_count'] = count($reject_count);

		$used=$this->Agents_Model->used_amount($id);
		foreach ($used as $key => $value) {
			$arr_sum[$key] = $value->total_amount-(($value->total_amount*$value->agent_markup)/100);
		}
		$data['used'] = array_sum($arr_sum);
    $this->load->view('frontend/home',$data);
		// $this->load->view('frontend/notification',$data);
	}
	// public function profile()
	// {
	// 	if ($this->session->userdata('agent_name')=="") {
	// 		redirect("index");
	// 	}
	// 	$this->load->view('frontend/profile'); 

	// }
	public function hotel_panel()
	{   
		if ($this->session->userdata('hotelid')=="") {
			redirect("../hotel_panel");
		}
    $id = $this->session->userdata('hotelid');
    $hotels_rooms_active_counts=$this->Hotels_Model->hotels_rooms_counts($id,1);
    $data['hotels_rooms_active_counts'] = count($hotels_rooms_active_counts);
    $hotels_rooms_inactive_counts=$this->Hotels_Model->hotels_rooms_counts($id,0);
    $data['hotels_rooms_inactive_counts'] = count($hotels_rooms_inactive_counts);
    $data['password_reset'] = $this->Hotels_Model->check_password_reset($id);

		$reject_count=$this->Agents_Model->hotels_booking_counts($id,0);
    $data['reject_count'] = count($reject_count);
    $confirm_count=$this->Agents_Model->hotels_booking_counts($id,1);
    $data['confirm_count'] = count($confirm_count);
    $request_count=$this->Agents_Model->hotels_booking_counts($id,2);
    $data['request_count'] = count($request_count);
    $cancel_count=$this->Agents_Model->hotels_booking_counts($id,3);
    $data['cancel_count'] = count($cancel_count);
		
		$this->load->view('frontend/hotel_admin/hotel_admin',$data);
	}

	public function hotel_details()
	{   
		if ($this->session->userdata('hotelid')=="") {
			redirect("../hotel_panel");
		}
		$this->load->helper("common");
		$id=$this->session->userdata();
		$hotel_log_id=$this->session->userdata('hotelid');
        $result['view'] = $this->Hotels_Model->hotel_login_details($hotel_log_id);
        
        $result['hfacilities'] = $this->Hotels_Model->hotel_facilities_all_data();
    	foreach($result['hfacilities'] as $key => $value) {
    		($value->Hotel_Facility);
    	}
        $result['rfacilities'] = $this->Hotels_Model->room_facilities_all_data();
        foreach($result['rfacilities'] as $key => $value) {
    		($value->Room_Facility);
    	}
        $hotel_facilities = explode(",",$result['view'][0]['hotel_facilities']); 
    	foreach ($hotel_facilities as $key => $value) {
    		$result['hotel_facilities'][$key] = $this->Hotels_Model->hotel_facilities_data($value);
    	}
        if ($result['view'][0]['board']!="" && isset($result['view'][0]['board'])) {
          $result['board'] = array($result['view'][0]['board'] => $result['view'][0]['board'],'RO'=> 'RO' ,'B&B' => 'B&B','HB' => 'HB','FB' => 'FB','AL' => 'AL'); 
        } else {
          $result['board'] = array('' => '','RO'=> 'RO' ,'B&B' => 'B&B','HB' => 'HB','FB' => 'FB','AL' => 'AL'); 
        }
	      $room_facilities = explode(",",$result['view'][0]['room_facilities']); 
	      foreach ($room_facilities as $key => $value) {
	        $result['room_facilities'][$key] = $this->Hotels_Model->room_facilities_data($value);
	      }
        
      //$result['view1'] = $this->Hotels_Model->general_settings_select('id');
      $result['currency_list']= $this->Hotels_Model->currency();
      $exroom=explode("close",$result['view'][0]['room_aminities']);
      $imroom=implode(",",$exroom);
      $exkey=explode("close",$result['view'][0]['keywords']);
      $imkey=implode(",",$exkey);
      $value=explode(',', $imroom);
      $result['rAminity'] = $this->Hotels_Model->get_aminities();
      foreach ($value as $key => $value) {
          $result['room_amin'][$key] = $this->Hotels_Model->get_aminity_text($value);
      }
      $result['implodedata1'] = $imroom;
      $result['implodedata2'] = $imkey;
      // print_r($result['room_amin']);
      // exit();
		$this->load->view('frontend/hotel_admin/hotel_detail',$result);
		
	}
  	public function updating_hotel_details() {
      // $aminity=(explode(",",$_REQUEST['room_aminity']));
      $aminity=$_REQUEST['room_aminity'];
      $keyword= (explode(",",$_REQUEST['keyword']));
      $hotel_log_id=$this->session->userdata('hotelid');
  		$Update = $this->Hotels_Model->updateinghoteldetaillog($_REQUEST,$hotel_log_id,$aminity,$keyword);
        // print_r($aminity);
        // exit();
            // echo json_encode($Update);
      HotellogActivity('Hotel details updated [ID: '.$hotel_log_id.']');
      redirect('../dashboard/hotel_details?proc=succ');
    }
    public function updating_hotel_contact() {
      $hotel_log_id=$this->session->userdata('hotelid');
      $Update = $this->Hotels_Model->updateinghoteldetaillog_contact($_REQUEST,$hotel_log_id);
      HotellogActivity('Hotel contact info updated [ID: '.$hotel_log_id.']');
      redirect('../dashboard/contact_info?proc=succ');
    }
    public function hotel_room_details(){ 
		$data = array();
		$data['view'] = array();
		if (isset($_REQUEST['hotels_edit_id'])) {
		$data['view'] =$this->Hotels_Model->hotel_detail_get($_REQUEST['hotels_edit_id']);
		$data['view']['rooms'] = $this->Hotels_Model->hotel_rooms_view($data['view'][0]->hotel_id);
		}
		$data['hotel_facilties'] = $this->Hotels_Model->hotel_facilties_get();
		$data['room_type'] = $this->Hotels_Model->room_type_get();
		$data['room_facilties'] = $this->Hotels_Model->room_facilties_get();
		$this->load->view('frontend/hotel_admin/room_detail',$data);
	}
	public function hotel_room_list() {
		 $hotel_log_id=$this->session->userdata('hotelid');
		$data = array();
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$room_type = $this->Hotels_Model->select_hotel_room($hotel_log_id);
		foreach($room_type->result() as $key => $r) {
			$data[] = array(
				$key+1,
				$r->Room_Type,
				$r->total_rooms,
				$r->occupancy,
				$r->occupancy_child,
				$r->sell_currency." ".$r->price,
				'<a class="btn btn-sm btn-success" href="#" onclick="vieweditfunctionn('.$r->room_id.');"data-toggle="modal" data-target="#myModaleditview" class="sb2-2-1-edit delete"><i class="fa fa-eye" aria-hidden="true"></i></a>
				<a class="btn btn-sm btn-primary" href="#" onclick="editfunctionn('.$r->room_id.');"data-toggle="modal" data-target="#myModaledit" class="sb2-2-1-edit delete"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        		<a class="btn btn-sm btn-danger" href="#" onclick="deletefunctionn('.$r->room_id.');" data-toggle="modal" data-target="#myModaldelete" class="sb2-2-1-edit delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
				

			);
      }
      	
		$output = array(
		   	"draw" => $draw,
			 "recordsTotal" => $room_type->num_rows(),
			 "recordsFiltered" => $room_type->num_rows(),
			 "data" => $data
		);
		echo json_encode($output);
	}
	public function add_new_hotel_room(){ 
		$hotel_log_id=$this->session->userdata('id');
		$result= $this->Hotels_Model->hotel_login_room_details($_REQUEST,$hotel_log_id);
		handle_hotel_room_image_login_upload($result);
		redirect('../dashboard/hotel_room_details?proc=succ');
	}
	public function update_new_hotel_room(){ 
		$hotel_log_id=$this->session->userdata('id');
		$result= $this->Hotels_Model->hotel_login_room_details_uploads($_REQUEST,$_REQUEST['room_id']);
		handle_hotel_room_image_login_upload($_REQUEST['room_id']);
		redirect('../dashboard/hotel_room_details?update=succ');
	}
	public function delete_room_type_hotel_log() {
		$result = $this->Hotels_Model->delete_room_type_hotel_portel($_REQUEST['room_id']);
		if ($result==true) {
      		redirect('../dashboard/hotel_room_details?dlt=succ');
		} else {
			$Return['error'] = "Deleted Unsuccessfully!";
		}
        echo json_encode($Return);
	}
   
   public function room_detail_viewings() {

   	    $data = array();
		$data['view1'] = array();
		$data['hotel_facilties'] = $this->Hotels_Model->hotel_facilties_get();
		$data['room_type'] = $this->Hotels_Model->room_type_get();
		$data['room_facilties'] = $this->Hotels_Model->room_facilties_get();
		$data['room_facilties1'] = $this->Hotels_Model->room_facilties_get_hotel_login();
	    $data['view'] =$this->Hotels_Model->hotel_detail_view_room_type($_REQUEST['id']);
		$room_facilities = explode(",",$data['view'][0]->room_facilities);
        foreach ($room_facilities as $key => $value) {
        	$data['room_facilities'][$key] = $this->List_Model->room_facilities_data($value);
        } 
		$this->load->view('frontend/hotel_admin/room_model',$data);

  }
  public function room_detail_viewings_only() {

   	    $data = array();
		$data['view1'] = array();
		$data['hotel_facilties'] = $this->Hotels_Model->hotel_facilties_get();
		$data['room_type'] = $this->Hotels_Model->room_type_get();
		$data['room_facilties'] = $this->Hotels_Model->room_facilties_get();
		$data['room_facilties1'] = $this->Hotels_Model->room_facilties_get_hotel_login();
	    $data['view'] =$this->Hotels_Model->hotel_detail_view_room_type($_REQUEST['id']);
		$room_facilities = explode(",",$data['view'][0]->room_facilities);
        foreach ($room_facilities as $key => $value) {
        	$data['room_facilities'][$key] = $this->List_Model->room_facilities_data($value);
        } 
		$this->load->view('frontend/hotel_admin/room_viewing',$data);

  }
  public function hotel_gallery_image(){ 
		$this->load->helper("common");
		$id=$this->session->userdata();
		$hotel_log_id=$this->session->userdata('hotelid');
        $result['view'] = $this->Hotels_Model->hotel_login_details($hotel_log_id);
        $result['hotel_images'] = explode(",",$result['view'][0]['gallery_images']); 
    	
    	// print_r($result['view']);
     //  exit();
    	
		$this->load->view('frontend/hotel_admin/image_gallery',$result);
	}
	public function image_update_hotel(){ 
    for ($i=1; $i <=5 ; $i++) { 
        if ($_FILES['img'.$i]['name']!="") {
          handle_hotel_gallery_image_upload($_REQUEST['hotel_id'],$i);
        }
      }
    HotellogActivity('New images uploaded[ID: '.$_REQUEST['hotel_id'].']');
		redirect('../dashboard/hotel_gallery_image?proc=succ');
	}
	public function social_media()
	{   
		$this->load->helper("common");
		$id=$this->session->userdata();
		$hotel_log_id=$this->session->userdata('hotelid');
    $result['view'] = $this->Hotels_Model->hotel_login_details($hotel_log_id);
		$this->load->view('frontend/hotel_admin/social_media',$result);
		
	}
  public function contact_info()
  {   
    $this->load->helper("common");
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
        $result['view'] = $this->Hotels_Model->hotel_login_details($hotel_log_id);
    $this->load->view('frontend/hotel_admin/contact',$result);
  }
  public function policy_hotel()
  {   
    $this->load->helper("common");
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
        $result['view'] = $this->Hotels_Model->hotel_login_policies($hotel_log_id);
    $this->load->view('frontend/hotel_admin/hotel_policy',$result);
    
  }
  public function contract()
  {
    $this->load->helper("common");
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
    $result['view'] = $this->Hotels_Model->hotel_contract_details($hotel_log_id);
    if(count($result['view'])!=0 && $result['view'][0]['contract_type']!="" && isset($result['view'][0]['contract_type'])) {
          $result['contract_type'] = array($result['view'][0]['contract_type'] => $result['view'][0]['contract_type'],'FIT'=> 'FIT' ,'Non Refundable' => 'Non Refundable','Opaque' => 'Opaque'); 
      } else {
        $result['contract_type'] = array('FIT'=> 'FIT' ,'Non Refundable' => 'Non Refundable','Opaque' => 'Opaque'); 
      }
      if(count($result['view'])!=0 && $result['view'][0]['classification']!="" && isset($result['view'][0]['classification'])) {
          $result['classification'] = array($result['view'][0]['classification'] => $result['view'][0]['classification'],'Normal'=> 'Normal' ,'Priority' => 'priority'); 
      } else {
        $result['classification'] = array('Normal'=> 'Normal' ,'Priority' => 'priority'); 
      }
      if(count($result['view'])!=0 && $result['view'][0]['application']!="" && isset($result['view'][0]['application'])) {
          $result['application'] = array($result['view'][0]['application'] => $result['view'][0]['application'],'Per Room'=> 'per Room' ,'Per Person' => 'Per Person'); 
      } else {
        $result['application'] = array( 'Per Room'=> 'per Room' ,'Per Person' => 'Per Person'); 
      }
      if(count($result['view'])!=0 && $result['view'][0]['max_child_age']!="" && isset($result['view'][0]['max_child_age'])) {
          $result['max_child_age'] = array($result['view'][0]['max_child_age'] => $result['view'][0]['max_child_age'],'1'=> '1' ,'2' => '2', '3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11'); 
      } else {
        $result['max_child_age'] = array('1'=> '1' ,'2' => '2', '3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11' ); 
      }
      if(count($result['view'])!=0 && $result['view'][0]['rate_type']!="" && isset($result['view'][0]['rate_type'])) {
          $result['rate_type'] = array($result['view'][0]['rate_type'] => $result['view'][0]['rate_type'],'Net'=> 'Net' ,'Commision' => 'Commision'); 
      } else {
        $result['rate_type'] = array('Net'=> 'Net' ,'Commision' => 'Commision'); 
      }
      if(count($result['view'])!=0 && $result['view'][0]['tax_percentage']!="" && isset($result['view'][0]['tax_percentage'])) {
          $result['tax_percentage'] = array($result['view'][0]['tax_percentage'] => $result['view'][0]['tax_percentage'],'Included'=> 'Included' ,'8' => '8','12'=>'12','20'=>'20'); 
      } else {
        $result['tax_percentage'] = array('Included'=> 'Included' ,'8' => '8','12'=>'12','20'=>'20'); 
      }
       if(count($result['view'])!=0 && $result['view'][0]['pay_mode']!="" && isset($result['view'][0]['pay_mode'])) {
          $result['pay_mode'] = array($result['view'][0]['pay_mode'] => $result['view'][0]['pay_mode'],'Payment'=> 'Peyment' ,'PrePayment' => 'PrePayment'); 
      } else {
        $result['pay_mode'] = array('Payment'=> 'Peyment' ,'PrePayment' => 'PrePayment'); 
      }
       
       
    $this->load->view('frontend/hotel_admin/contract',$result);

  }
	public function socialmedia_update() {

        $hotel_log_id=$this->session->userdata('hotelid');
  		  $Update = $this->Hotels_Model->updateinghoteldetaillog_social($_REQUEST,$hotel_log_id);
        HotellogActivity('Hotel social media details updated [ID: '.$hotel_log_id.']');
        // echo json_encode($Update);

        redirect('../dashboard/social_media?proc=succ');
    }
  public function hotel_room_booking_details(){ 
		$this->load->view('frontend/hotel_admin/bookin_detail');
	}
	public function hotel_booking_list() {
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
      $booking_list = $this->Hotels_Model->hotel_room_booking_list($filter);
        foreach($booking_list->result() as $key => $r) {
          
          $totalcost= $this->Finance_Model->TotcostGet($r->id);
          $final_total = ceil($totalcost);

            $permission = '';
            $booking_success = '';
          if ($r->booking_flag==2) {
            $status= "<span class='text-primary'>pending</span>";
            $booking_success = '<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#booking_modal" onclick="hotelactionfun('.$r->id.',1,'.$r->hotel_id.','.$r->agent_id.');" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a> ';
            // $permission = ' <a title="Reject" href="#" class="btn btn-sm btn-danger" onclick="deletefun('.$r->bk_id.','.$r->hotel_id.','.$r->agent_id.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
          } else if ($r->booking_flag==1) {
            $status= "<span class='text-success'>Accepted</span>";
            $booking_success = '';
          } else if ($r->booking_flag==4) {
            $status= "<span class='text-danger'>Accept Pending</span>";
            $booking_success = '<a href="#" data-toggle="modal" data-target="#booking_success_modal" onclick="hotel_invoice('.$r->id.',1);"  class="btn btn-sm btn-success" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a> ';
          } else if ($r->booking_flag==0) {
            $status= "<span class='text-danger'>Rejected</span>";
            // $permission = ' <a title="Already Rejected" href="#" class="btn btn-sm btn-danger"  class="sb2-2-1-edit delete"><i class="fa fa-ban" aria-hidden="true"></i></a>';
          } else if ($r->booking_flag==3) {
            $status= "<span class='text-danger'>Cancelled</span>";
            // $permission = ' <a title="Already Rejected" href="#" class="btn btn-sm btn-danger"  class="sb2-2-1-edit delete"><i class="fa fa-ban" aria-hidden="true"></i></a>';
          } else if($r->booking_flag==5) {
            $status= "<span class='text-danger'>Cancellation Pending</span>";
          } else if($r->booking_flag==8) {
            $status= "<span class='text-danger'>On Request</span>";
            $booking_success = '<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#booking_modal" onclick="hotelactionfun('.$r->id.',1,'.$r->hotel_id.','.$r->agent_id.');" class="sb2-2-1-edit delete"><i class="fa fa-check" aria-hidden="true"></i></a> ';
          }
          if ($r->booking_flag==2) {
            $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'.$permission,
              );
          } else if ($r->booking_flag==1) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'.$permission,
              );
          } else if ($r->booking_flag==8) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
              );
          } else if ($r->booking_flag==4) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
              );
          } else if ($r->booking_flag==0) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'.$permission,
              );
          } else if ($r->booking_flag==3) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>'.$permission,
              );
          } else if ($r->booking_flag==5) {
              $data[] = array(
                $key+1,
                // $r->agent_id,
                // $r->hotel_id,
                $r->booking_id,
                date('d/m/Y' ,strtotime($r->Created_Date)),
                $r->confirmationNumber,
                strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
                date('d/m/Y' ,strtotime($r->check_in)),
                date('d/m/Y' ,strtotime($r->check_out)),
                $r->no_of_days,
                $r->book_room_count,
                $r->sell_currency." ".$final_total,
                $status,
                $booking_success . '<a title="view" class="btn btn-sm  btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->bk_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
              );
          }
        }
        $output = array(
         "draw"            => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data"            => $data
        );
        echo json_encode($output);
        exit();
     }
   	public function hotel_booking_view() {
      $data['board'] = $this->Hotels_Model->board_booking_detail($_REQUEST['id']);
      $data['general'] = $this->Hotels_Model->general_booking_detail($_REQUEST['id']);
      $data['view'] = $this->Hotels_Model->hotel_booking_detail($_REQUEST['id']);
      
      $data['ExBed']  =  $this->Payment_Model->getExtrabedDetails($_REQUEST['id']);
      $data['cancelation'] =  $this->Payment_Model->get_cancellation_terms($_REQUEST['id']);
      $this->load->view('frontend/hotel_admin/hotel_booking_view',$data);
	}
    public function hotel_portel_permission() {
      $mail_settings = mail_details();
      $hotel=$this->Hotels_Model->GetTitle();
      $agent_details = $this->Hotels_Model->agent_details_from_booking($_REQUEST['id']);
      $admin_details = $this->Hotels_Model->user_details_from_booking();  
  		$invoice_insert = $this->Hotels_Model->invoice_insert($_REQUEST['id'],$_REQUEST);
  		$result = $this->Hotels_Model->hotel_booking_permission($_REQUEST);
      $subject = 'Approved Your booking Request';
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
                    <h2 style="text-align: center;">'.$agent_details[0]->hotel_name.' - Approved your booking</h2>
                    <div style="margin-top: 25px;
                    margin-bottom: 10px;
                    display: inline-block;"><a style="background-color: #0074b9;
                        color: #fff;
                        text-decoration: none;
                        padding: 6px 12px;
                        border-radius: 3px;
                        box-shadow: 0 1px 2px 0 rgba(0,0,0,0.3);
                        letter-spacing: .5px;
                        text-transform: uppercase;" href="javascript:void()">Booked Id : '.$agent_details[0]->booking_id.'</a></div>
                    <p style="color: cornsilk;
                    text-align: center;
                    color: #90A4AE;">Room Type - '.$agent_details[0]->Room_Type.'</p>
                  </section>
                  <footer style="text-align: center;
                    padding: 1px;
                    background-color: #37474F;
                    color: #fff;
                    border-radius: 0 0 3px 3px;">
                    <p>'.$hotel[0]->Title.' | 2017</p>
                  </footer>
                </div>';
      // $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      // $this->email->to($admin_details[0]->Email);
      
      // $this->email->subject($subject);
      // $this->email->message($message);
      //  // print_r($message);
      //  // exit();
      // $this->email->send();
      HotellogActivity('Hotel booking accepted [ID: '.$_REQUEST['id'].']');
      echo json_encode(true);
  	}
  	public function booking_reject() {
      // $get_add_amount = $this->Agents_Model->agent_booking_detail($_REQUEST['id']);
      //  $agent_used_amount = ($get_add_amount[0]->normal_price*$get_add_amount[0]->book_room_count)*$get_add_amount[0]->no_of_days;
      //  $total_markup = $get_add_amount[0]->admin_markup+$get_add_amount[0]->agent_markup;
      //  $total_agent_used_amount = (($agent_used_amount*$total_markup)/100)+$agent_used_amount;
      //  $agent_id= $get_add_amount[0]->agent_id;
      //  $agent_credit_amount = $this->Agents_Model->agent_details($agent_id);

      //  $bal_amount = $agent_credit_amount[0]->Credit_amount+$total_agent_used_amount;
      //  $this->Agents_Model->add_agent_credit($agent_id,$bal_amount);
      $mail_settings = mail_details();
      $result = $this->Hotels_Model->booking_rejected_notification($_REQUEST['id'],$_REQUEST['hotel_id'],$_REQUEST['agent_id']);
      // $agent_details = $this->Hotels_Model->agent_details_from_booking($_REQUEST['id']);
      // $admin_details = $this->Hotels_Model->user_details_from_booking();

  		$reject = $this->Hotels_Model->booking_cancel_Request($_REQUEST['id']);
      AgentlogActivity('Hotel booking cancelled [ID: '.$_REQUEST['id'].', Provider: Otelseasy]');
      // $hotel=$this->Hotels_Model->GetTitle();
      // $subject = 'Booking Request Rejected';
      // $message = '<div class="wrapper" style="max-width: 400px;
      //               width: 100%;
      //               margin: 5% auto;
      //               border-radius: 3px;
      //                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
      //             <header style="padding: 10px 10%;
      //               text-align: center;">
      //               <img src="'.base_url().'skin/images/logo.png" alt="" style="width: 200px;">
      //             </header>
      //             <section style="padding: 10px 10%;text-align: center;">
      //               <h2 style="text-align: center;">Sorry Your '.$agent_details[0]->hotel_name.'  booking request rejected!</h2>
      //               <div style="margin-top: 25px;
      //               margin-bottom: 10px;
      //               display: inline-block;"><a style="background-color: #0074b9;
      //                   color: #fff;
      //                   text-decoration: none;
      //                   padding: 6px 12px;
      //                   border-radius: 3px;
      //                   box-shadow: 0 1px 2px 0 rgba(0,0,0,0.3);
      //                   letter-spacing: .5px;
      //                   text-transform: uppercase;" href="javascript:void()">Booked Id : '.$agent_details[0]->booking_id.'</a></div>
      //               <p style="color: cornsilk;
      //               text-align: center;
      //               color: #90A4AE;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
      //               doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
      //               inventore veritatis</p>
      //             </section>
      //             <footer style="text-align: center;
      //               padding: 1px;
      //               background-color: #37474F;
      //               color: #fff;
      //               border-radius: 0 0 3px 3px;">
      //               <p>'.$hotel[0]->Title.' | 2017</p>
      //             </footer>
      //           </div>';
      // $this->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      // $this->email->to($admin_details[0]->Email);
      
      // $this->email->subject($subject);
      // $this->email->message($message);
      echo  json_encode(true);
  	}
  	public function invoice_check() {
  		$invoice_check = $this->Hotels_Model->invoice_check($_REQUEST['id']);
  		if (count($invoice_check)==0) {
  			$result = "0";
  		} else {
  			$result = "1";
  		}
      	echo  json_encode($result);
  	}
  	public function hotel_invoice() {
  		$result['view'] = $this->Hotels_Model->hotel_invoice($_REQUEST['id']);
  		$this->load->view('frontend/hotel_admin/booking_invoice_modal',$result);
  	}
  	public function hotel_room_booking_history(){ 
		$this->load->view('frontend/hotel_admin/booking_history');
	}
		public function hotel_booking_history() {
      $data = array();
      // Datatables Variables
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $booking_list = $this->Hotels_Model->hotel_room_booking_history_list();
        foreach($booking_list->result() as $key => $r) {
          if ($r->booking_flag==2) {
            $status= "<span class='text-primary'>pending</span>";
          } else if ($r->booking_flag==4) {
            $status= "<span class='text-success'>Accepted</span>";
          } else if ($r->booking_flag==0) {
            $status= "<span class='text-danger'>Rejected</span>";
          } else if ($r->booking_flag==3) {
            $status= "<span class='text-danger'>Cancelled</span>";
          }
            $data[] = array(
            $key+1,
            $r->booking_id,
            date('d/m/Y',strtotime($r->Created_Date)),
            $r->confirmationNumber,
            strlen($r->Room_Type)> 15 ? substr($r->Room_Type,0,15)."..." : $r->Room_Type,
            date('d/m/Y',strtotime($r->check_in)),
            date('d/m/Y',strtotime($r->check_out)),
            $r->no_of_days,
            $r->book_room_count,
            $r->sell_currency." ".(($r->normal_price*$r->no_of_days)*$r->no_of_days),
            $status,
            '<a title="view" class="btn btn-sm btn-primary"  href="'.base_url().'Dashboard/hotel_booking_view?id='.$r->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
          );
        }
        $output = array(
          "draw" => $draw,
         "recordsTotal" => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
     }

    public function hotel_policy_add_update() {
     // print_r($_REQUEST['hotel_id']);
     // exit();
      $policy_check  = $this->Hotels_Model->hotel_policies_check($_REQUEST['hotel_id']);
      
      if (count($policy_check)!=0) {
        $this->Hotels_Model->update_hotel_policies($_REQUEST,$_REQUEST['hotel_id']);
      } else {
            $this->Hotels_Model->add_hotel_policies($_REQUEST,$_REQUEST['hotel_id']);
      }
      if ($_FILES['gallery_image']['name'][0]!="") {
        handle_hotel_gallery_image_upload($_REQUEST['hotel_id']);
      }
    
    redirect("../dashboard/policy_hotel?update=succ");
  } 
  public function amount_chart() {
    $id=$this->session->userdata('agent_id');
    for ($m=1; $m<=12; $m++) {
      $months = date('F', mktime(0,0,0,$m, 1, $_REQUEST['year']));
      $date = date('m/Y', mktime(0,0,0,$m, 1, $_REQUEST['year']));
      $amount_details =    $this->Agents_Model->amount_details($id,$date);
      if (count($amount_details)!="") {
        $Return['months'][] = $months;
        $Return['credit'][] = str_replace(",","", currency_type(agent_currency(),$amount_details[0]->creditAmount));
        $Return['used'][] = str_replace(",","", currency_type(agent_currency(),$amount_details[0]->usedAmount));
      } else {
        $Return['months'][] = $months;
        $Return['credit'][] = 0;
        $Return['used'][] = 0;
      }

    }
    echo json_encode($Return);
  }
  public function booking_chart() {
    $id=$this->session->userdata('agent_id');
    $year = $_REQUEST['year'];
    $reject_count=$this->Agents_Model->booking_counts($id,0,$year);
    $confirm_count=$this->Agents_Model->booking_counts($id,1,$year);
    $request_count=$this->Agents_Model->booking_counts($id,2,$year);
    $cancel_count=$this->Agents_Model->booking_counts($id,3,$year);
    $cancel_req_count=$this->Agents_Model->booking_counts($id,5,$year);
    $accept_req_count=$this->Agents_Model->booking_counts($id,4,$year);
    $total_count = $reject_count+$reject_count+$request_count+$cancel_count+$cancel_req_count+$accept_req_count;
    if ($total_count>0) {
      $data['reject_count'] = count($reject_count);

      $data['confirm_count'] = count($confirm_count);

      $data['request_count'] = count($request_count);

      $data['cancel_count'] = count($cancel_count);

      $data['cancel_req_count'] = count($cancel_req_count);

      $data['accept_req_count'] = count($accept_req_count);

      $data['null_count'] = 0;
    } else {
      $data['reject_count'] = count($reject_count);

      $data['confirm_count'] = count($confirm_count);

      $data['request_count'] = count($request_count);

      $data['cancel_count'] = count($cancel_count);

      $data['cancel_req_count'] = count($cancel_req_count);
      
      $data['accept_req_count'] = count($accept_req_count);

      $data['null_count'] = 100;
    }
    

    echo json_encode($data);
  }
  public function room_rate_details(){
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
    $result['view'] = $this->Hotels_Model->hotel_room_rate_details($hotel_log_id);
    $result['cutt_off'] = $this->Hotels_Model->hotel_room_rate_cutt_off_details($hotel_log_id);
    $result['view1'] = $this->Hotels_Model->hotel_rooms_list_count($hotel_log_id);
    $rooms = $this->Hotels_Model->hotel_rooms_list($hotel_log_id);
    $result['room_list'] = $rooms->result();
    foreach ($result['room_list'] as $key => $value) {
      $result['room_amount'][] = $this->Hotels_Model->hotel_rooms_list_amount($value->id);
    }
    $this->load->view('frontend/hotel_admin/room_rate',$result);

  }

  public function room_min_stay(){
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
    $data['view'] = $this->Hotels_Model->date_hotel_minimum_stay($hotel_log_id);
    $data['view1'] = $this->Hotels_Model->date_hotel_close_period($hotel_log_id);
    $this->load->view('frontend/hotel_admin/room_min_stay',$data);
  }


  public function updating_room_rate_details(){
    $id=$this->session->userdata();
    $hotel_log_id=$this->session->userdata('hotelid');
    $data = $this->Hotels_Model->room_rate_details_date_update($_REQUEST,$hotel_log_id);
    $data2 = $this->Hotels_Model->hotel_room_rate_setting_release_cuttoff_update($_REQUEST,$hotel_log_id);
    //print_r($_REQUEST);
    // exit();
    foreach ($_REQUEST['high_1'] as $key => $value) {
          $data2=$this->Hotels_Model->hotel_room_rate_setting_amount_update($_REQUEST['id'][$id],$hotel_log_id,$_REQUEST['room_id'][$key],$_REQUEST['high_1'][$key],$_REQUEST['shoulder_1'][$key],$_REQUEST['peak_1'][$key],$_REQUEST['peak_2'][$key],$_REQUEST['shoulder_2'][$key],$_REQUEST['high_2'][$key],$_REQUEST['low'][$key]);
        }

    redirect('../dashboard/room_rate_details?proc=succ');
  }
  public function hotel_minimum_stay_update()
  {
    $data= $this->Hotels_Model->minimum_stay_setting_date($_REQUEST);
    $hotel_id=$_REQUEST['hotel_id'];
    $data= $this->Hotels_Model->close_out_period_setting_date($_REQUEST);
    redirect('../dashboard/room_min_stay?id='.$hotel_id.'');

  }
  public function room_booking_invoice(){
   
   // print_r($_REQUEST);
   // exit();
    $id=$_REQUEST['booking_id'];
      $data= $this->Hotels_Model->room_booking_invoice_create($id);
     redirect('../dashboard/hotel_room_booking_details');
  }
  // public function dummy(){
  //   $data = currency_type();
  //   print_r($data);
  // }
  
  public function favourite_ajax(){
    $this->load->model('Common_Model');
    $data = $this->Common_Model->favourite_add($_REQUEST['agent_id'],$_REQUEST['hotel_id']);
    // favourite_add($_REQUEST['agent_id'],$_REQUEST['hotel_id']);
    echo json_encode(true);
  }
  public function favourite_ajax_check() {
    $this->load->model('Common_Model');
    $data = $this->Common_Model->favourite_ajax_check($_REQUEST['agent_id'],$_REQUEST['hotel_id']);
    if ($data==1) {
      $html = '<a href="#" class="booknow margtop50 btnmarg">Added to favourite</a>';
    } else {
      $html = '<a href="#" class="add2fav margtop50" onclick="favourite_add('.$this->session->userdata("agent_id").','.$_REQUEST["hotel_id"].')">Add to favourite</a>';  
    }
    echo $html;
  }
  public function favourite_ajax_check1(){
    $this->load->model('Common_Model');
    $data = $this->Common_Model->favourite_ajax_check($_REQUEST['agent_id'],$_REQUEST['hotel_id']);
    if($data==0)
    {
      $this->Common_Model->favourite_add($_REQUEST['agent_id'],$_REQUEST['hotel_id']);
    }
    echo json_encode(true);
    
    // favourite_ajax();
  }
  public function favourite_dropdown() {
    $html1 = "";
    $fav_count=fav_count();
    $favourite=favourite();
    $date = date("m/d/Y",strtotime("+1 days"));
    $date1 = date("m/d/Y",strtotime("+2 days"));
    // print_r($favourite);
    $html1.='<a data-toggle="dropdown" class="dropdown-toggle" href="#" class="active" id="fav_button"><i class="fa fa-heart-o"></i>   <span class="d-mes active" >'.$fav_count.'</span></a>
          <ul class="dropdown-menu posright-0">
              <div class=" row dropwidth01 offset-0">
              <ul class="droplist col-md-4">';

      if (count($favourite)!=0) {
        foreach ($favourite as $key => $value) {
          $contract_id = contract_idGet($value->fav_hotel_id);
          $image1="";
          $image[$key]=explode(",", $value->gallery_images);
          $html1.= ' <li><a href="'.base_url().'details?search_id='.$value->fav_hotel_id.'&&mark_up='.''.'&&Check_in='.$date.'&&Check_out='.$date1.'&&adults=2&&child=0&&Room1ChildAges=&&Room2ChildAges=&&Room3ChildAges=&&Room4ChildAges=&&Room5ChildAges=&&Room6ChildAges=&&Room7ChildAges=&&Room8ChildAges=&&Room9ChildAges=&&Room10ChildAges=&&contract_id='.$contract_id.'"><img class="left margright10 roundav" width="25" height="25" src='.base_url().'uploads/gallery/'.$value->fav_hotel_id.'/'.str_replace(" ","%20",$image[$key][0]).'> '.$value->hotel_name.'</li>';
        }
      $html1.='<li><div class="text-center view-more"><a href="'.base_url().'Dashboard/all_favourites">view more</a></div></li>';
      }
      else{
      $html1.= '<li>No favourites added!</li>';
          }
      $html1.= '</ul>
            </div>
          </ul>';
        echo $html1;
  }
  public function all_favourites()
  {
      $this->load->view('frontend/favourite');
  }
  public function booking_details_portel()
  {
    $data= $this->Hotels_Model->booking_details_portel_flag_off($_REQUEST['id']);
    redirect('../dashboard/hotel_room_booking_details');
  }
  public function hotel_room_contracts(){
    $hotel_code=$_SESSION['hotelid'];
    $data['view']= $this->Hotels_Model->select_hotel_for_contract($hotel_code)->result();
     $data['hotel_code'] = $hotel_code;
    $this->load->view('frontend/hotel_admin/contract',$data);
  }
  public function contract_data(){
    // $this->load->helper("common");
    // $id=$this->session->userdata();
    $data = array();
    // Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $hotel_contract = $this->Hotels_Model->select_hotel_for_contract($_REQUEST['id'],1);
    // print_r($hotel_contract);exit;
    foreach($hotel_contract->result() as $key => $r) {

        // $allotement = '<a href="#" onclick="allotment_select('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#contract_model"><span class="text-primary bold">Click here</span></a>'; 
        $room_id =  $this->Hotels_Model->hotel_rooms_view($r->hotel_id);
        $allotement = '<a href="'.base_url().'dashboard/allotement?hotel_id='.$r->hotel_id.'&room_id='.$room_id[0]->id.'&con_id='.$r->contract_id.'" ><span class="text-primary bold">Click here</span></a>';
        // // if ($r->designation=="Main") {
        //   $action = '<a href="#" onclick="contract_copy('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#contract_model" class="sb2-2-1-copy"><i class="fa fa-files-o" aria-hidden="true"></i></a>
        //    <a href="#" onclick="contract_edit('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#contract_model" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        // // } else {
          // $action = '<a href="#" onclick="contract_copy('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#contract_model" class="sb2-2-1-copy"><i class="fa fa-files-o" aria-hidden="true"></i></a>
          //  <a href="#" onclick="contract_edit('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#contract_model" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          //  <a href="#" onclick="contract_delete('."'$r->hotel_id'".','."'$r->contract_id'".');" class="sb2-2-1-delete" data-toggle="modal" data-target="#delete_modal" ><i class="red accent-4 fa fa-trash-o" aria-hidden="true"></i></a>';
        // }
           $linked='<span class="text ">'.$this->Hotels_Model->linkedContractGet($r->linkedContract).'</span>';
        $data[] = array(
          $key+1,
          $r->contract_id,
          $r->contract_type,
          $r->contractName,
          $linked,
          $r->board,
          $r->max_child_age,
          $r->from_date,
          $r->to_date,
          '<a href="#" onclick="policy_view('."'$r->hotel_id'".','."'$r->contract_id'".');" data-toggle="modal" data-target="#policy_model"><span class="text-primary bold">Click here</span></a>',
          $allotement,
          // $action,
          // $r->from_date,
          // $r->to_date,
          // $r->contract_hold,
          
        );
        }
    $output = array(
        "draw" => $draw,
       "recordsTotal" => $hotel_contract->num_rows(),
       "recordsFiltered" => $hotel_contract->num_rows(),
       "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function policies(){
    // print_r($_REQUEST);
    // exit();
    $data['view'] = $this->Hotels_Model->get_policy_id($_REQUEST);
    // print_r($data['view']);
    // exit();
    $this->load->view('frontend/hotel_admin/policies',$data);
  }
  public function policiesSubmit() {
    $this->Hotels_Model->update_hotel_policies($_REQUEST);
    redirect("../dashboard/hotel_room_contracts?hotel_id=".$_REQUEST['hotel_id']);
  }
  public function country_accessible_modal(){
    $data['list'] = $this->Hotels_Model->Country_list();
    $data['permission'] = $this->Hotels_Model->permission_Country_list($_REQUEST['hotel_id'],$_REQUEST['id']);
    $this->load->view('frontend/hotel_admin/country_accessible_modal',$data);
  }
  public function contract_Modal() {
    $data['view'] = array();
    if (isset($_REQUEST['id'])) {
      $data['view'] = $this->Hotels_Model->contractdetails($_REQUEST['id']);
    }
    $this->load->view('frontend/hotel_admin/contract_Modal',$data);
  }
  public function add_contract(){
    // $contract_id = $this->Hotels_Model->get_contract_id();
    // print_r($contract_id);
    // exit();
    $view = $this->Hotels_Model->add_hotel_contract($_REQUEST);
    HotellogActivity('New contract added [ID: '.$view.']');
    redirect("../dashboard/hotel_room_contracts?hotel_id=".$_REQUEST['id']);
  }
  public function delete_contract() {
    $result = $this->Hotels_Model->delete_contract($_REQUEST['delete_id']);
    $this->Hotels_Model->delete_policies($_REQUEST['delete_id']);
    if ($result==true) {
      $Return['error'] = "Deleted Successfully";
        $Return['color'] = 'green';
        $Return['status'] = '1';
        $Return['table'] = 'hotel_contract';
    } else {
      $Return['error'] = "Deleted Unsuccessfully!";
        $Return['color'] = 'red';
        $Return['table'] = 'hotel_contract';
    }
        // echo json_encode($Return);
  }
  public function update_contract(){
    $view = $this->Hotels_Model->update_contract($_REQUEST);
    redirect("../dashboard/hotel_room_contracts?hotel_id=".$_REQUEST['id']);
  }
  public function contract_del(){
    $this->Hotels_Model->contract_delete($_REQUEST['id']);
    $this->Hotels_Model->delete_policies($_REQUEST['id']);
    redirect("../dashboard/hotel_room_contracts");
  }
  public function allotement() {

    $redirect_con = "false";
    $data['get_room']=$this->Hotels_Model->get_room_id($_REQUEST['hotel_id']);
    // print_r($data['get_room']);
    $rooms = $this->Hotels_Model->hotel_rooms_list($_REQUEST['hotel_id']);
    $data['contract'] = $this->Hotels_Model->hotel_contract_list($_REQUEST['hotel_id']);
    $data['hotels'] = $this->Hotels_Model->contract_hotel_list();
    $data['rooms'] = $rooms->result();
    $data['edit_permission'] = $this->Hotels_Model->edit_permission_check($_REQUEST['hotel_id']);
    $calendar = new Hotel_calendar();
    $data['calendar'] = $calendar->show();
    $this->load->view('frontend/hotel_admin/allotment',$data);
  }
  public function contractProcess(){
    $this->load->model("Agents_Model");
    $data['list'] = $this->Agents_Model->select('1')->result();
    $data['permission'] = $this->Hotels_Model->permission_agent_id($_REQUEST['hotel_id'],$_REQUEST['con_id']);
    $data['policy'] = $this->Hotels_Model->get_policy($_REQUEST);
    $redirect_con = "false";
    $rooms = $this->Hotels_Model->hotel_rooms_list($_REQUEST['hotel_id']);
    $data['contract'] = $this->Hotels_Model->hotel_contract_list($_REQUEST['hotel_id']);
    $data['hotels'] = $this->Hotels_Model->contract_hotel_list();
    $data['rooms'] = $rooms->result();
    $calendar = new Hotel_calendar();
    $data['calendar'] = $calendar->show();
    $this->load->view('frontend/hotel_admin/allotment',$data);
  }
  public function allotementBlkupdate() {
  $update  = $this->Hotels_Model->HotelPanelallotBlkupdate($_REQUEST);
  HotellogActivity('Hotel contract bulk update[Hotel ID: '.$_REQUEST['hotel_id'].', Contract ID: '.$_REQUEST['bulk_alt_contract_id'].', From Date: '.$_REQUEST['bulk-alt-fromDate'].', To Date: '.$_REQUEST['bulk-alt-toDate'].']');
  redirect('../dashboard/allotement?month='.$_REQUEST['month'].'&year='.$_REQUEST['year'].'&hotel_id='.$_REQUEST['hotel_id'].'&room_id='.$_REQUEST['room_id'].'&con_id='.$_REQUEST['bulk_alt_contract_id']);
  }
  public function cancellationCheck_modal() {
    $this->load->view('frontend/hotel_admin/cancellationCheck_modal');
  }
  public function allotement_update() {

      $date = explode("li-", $_REQUEST['calDate']);

      $this->Hotels_Model->hotelPanelallot_update($date[1],$_REQUEST['calEditroom_id'],$_REQUEST['calEdithotel_id'],$_REQUEST['calEditAmt'],$_REQUEST['calEditAlot'],$_REQUEST['calEditBal'],$_REQUEST['calEditcontract_id']);

      if (isset($_REQUEST['calEditclosedout'])) {
        $this->Hotels_Model->closeOutSingleUpdate($date[1],$_REQUEST['calEdithotel_id'],$_REQUEST['calEditcontract_id'],$_REQUEST['calEditroom_id']);
      } else {
        $this->Hotels_Model->closeOutSingleDelete($date[1],$_REQUEST['calEdithotel_id'],$_REQUEST['calEditcontract_id'],$_REQUEST['calEditroom_id']);
      }
      echo json_encode(true);
    exit();
    }
    public function contract_policy_submit(){
      
      $this->Hotels_Model->update_hotel_policies($_REQUEST);
      redirect("../dashboard/hotel_room_contracts");
      // echo json_encode(true);
        // print_r($_REQUEST);
        // exit();

    }
    public function cancellationPolicySelect() {
      $data =$this->Hotels_Model->cancellationPolicySelect($_REQUEST);
      echo json_encode($data);
    }
    public function CancellationPolicyContentget() {
      $data =$this->Hotels_Model->CancellationPolicyContentget($_REQUEST);
      echo json_encode($data);
   }
   public function maincontractCheck() {
    $result = $this->Hotels_Model->maincontractCheck($_REQUEST);
        echo json_encode($result);
  }
  
}


