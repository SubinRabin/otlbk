<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_Model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function hotel_booking_list($filter) {
        $this->db->select('hotel_tbl_booking.* ,hotel_tbl_booking.id as book_id,hotel_tbl_booking.agent_id as agent, hotel_tbl_hotels.hotel_name, ,hotel_tbl_room_type.Room_Type,hotel_tbl_hotel_room_type.room_name');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
        $this->db->where('hotel_tbl_booking.booking_flag',$filter);
        $this->db->order_by('hotel_tbl_booking.id','desc') ;
        return $query=$this->db->get();
    } 
    public function hotel_booking_detail($rooom_id) {
        $this->db->select('*,hotel_tbl_booking.created_date as booking_date,hotel_tbl_booking.board as boardName,hotel_tbl_booking.id as bkid,hotel_tbl_agents.First_Name as AFName,hotel_tbl_agents.Last_Name as ALName');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
        $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
        $this->db->join('hotel_tbl_agents','hotel_tbl_booking.agent_id = hotel_tbl_agents.id', 'left');
        $this->db->where('hotel_tbl_booking.id',$rooom_id);
        $query=$this->db->get();
        return $query->result();
    } 
    public function hotel_invoice_admin($id) {
        $this->db->select('*');
        $this->db->where('booking_id',$id);
        $this->db->from('hotels_tbl_booking_invoice');
        $query=$this->db->get();
        return $query->result();
    }
    public function hotel_booking_admin_approved($request) {
        $query = $this->db->query('SELECT (substr(invoice_id,10)) as invoice FROM `hotel_tbl_booking`')->result();

        if (count($query)==0) {
            $max_id = "INVOICE001";
        } else {
            $max_invoice = max($query)->invoice;
            $max_id ="INVOICE00".($max_invoice+ 1);
        }

        $this->db->select('invoice_id');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('id',$request['id']);
        $query=$this->db->get();
        $final = $query->result();
        if ($final[0]->invoice_id=="") {
            $data= array(
                      'invoice_id'   =>$max_id,
                      'booking_flag' => 1,
                      'invoice_date' => date('Y-m-d'),
                      'confirmationNumber' => $request['booking_confirmation'],
                      'confirmationName'  => $request['booking_confirmation_name'],
                      'Updated_Date' => date('Y-m-d'),
                      'Updated_By'   =>  $this->session->userdata('id'),);
            
        } else {
            $data= array(
                  'booking_flag' => 1,
                  'confirmationNumber' => $request['booking_confirmation'],
                  'confirmationName'  => $request['booking_confirmation_name'],
                  'Updated_Date' => date('Y-m-d'),
                  'Updated_By'   =>  $this->session->userdata('id'),);
        }
        $this->db->where('id',$request['id']);
        $this->db->update('hotel_tbl_booking',$data);
        return true;
        }
    public function mail_details_from_booking($id){
        $this->db->select('*');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result();
    }
    public function hotel_booking_approved_invoice($id,$request){
        $query = $this->db->query('SELECT (substr(invoice_id,10)) as invoice FROM `hotel_tbl_booking`')->result();

        if (count($query)==0) {
            $max_id = "INVOICE001";
        } else {
            $max_invoice = max($query)->invoice;
            $max_id ="INVOICE00".($max_invoice+ 1);
        }
        $this->db->select('invoice_id');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $final = $query->result();
        if ($final[0]->invoice_id=="") {
            $data= array(
                      'invoice_id'   =>$max_id,
                      'invoice_date' => date('Y-m-d'),
                      'confirmationNumber' => $request['booking_confirmation'],
                      'confirmationName'  => $request['booking_confirmation_name'],
                        );
            $this->db->where('id',$id);
            $this->db->update('hotel_tbl_booking',$data);
        } 
        return true;
    }
    public function add_reference($request){
        $totalMarkup = $request['agent_markup']+$request['admin_markup'];
        $totalAmount = (($request['total_amount']*$totalMarkup)/100)+$request['total_amount'];
        $whAgmarkuptotalAmount = (($request['total_amount']*$request['admin_markup'])/100)+$request['total_amount'];
        $this->db->select_max('invoice_id');
        $this->db->from('hotel_tbl_booking');
        $query=$this->db->get()->result();
        if (count($query)==0) {
                      $max_id = "INVOICE001";
        } else {
                      $max = $query[0]->invoice_id;
                      $max_invoice = explode("INVOICE" , $max);
                      $max_id ="INVOICE00".($max_invoice[1]+ 1) ;
        } 
        $data= array(
                      'invoice_date' =>  date('Y-m-d'),
                      'invoice_id'   =>  $max_id,
                      'confirmationNumber' => $request['booking_confirmation'],
                      'confirmationName'  => $request['booking_confirmation_name'],
                      // 'reference_id' =>  $request['refe_id'],
                );
        $this->db->where('id',$request['book_id']);
        $this->db->update('hotel_tbl_booking',$data);

        $data= array(
                      'Fte_DrAmt'     => $totalAmount,
                      'Fte_CrAmt'     => 0,
                      'FFte_Table'    => 'hotel_tbl_agents',
                      'Fte_FahID'     => '2',
                      'Fte_ChildID'   =>  $request['agent_id'],
                      'Fte_Narration' =>  $request['book_id'],
                      'Fte_FccID'     => 1,
                      'Fte_Date'      => date('Y-m-d'),
                      'Fte_CurDtTime' => date('Y-m-d h:i:s a', time()),
                      'Fte_CurSysUser'=> $this->session->userdata('id'),
                      'Fte_ByUser'    => $this->session->userdata('id'),
                );
        $this->db->insert('tbl_fin_transactionentry',$data);
        $data= array(
                      'Fte_DrAmt'     => 0,
                      'Fte_CrAmt'     => $whAgmarkuptotalAmount,
                      'FFte_Table'    => 'hotel_tbl_agents',
                      'Fte_FahID'     => '3',
                      'Fte_ChildID'   => $request['agent_id'],
                      'Fte_Narration' => $request['book_id'],
                      'Fte_FccID'     => 1,
                      'Fte_Date'      => date('Y-m-d'),
                      'Fte_CurDtTime' => date('Y-m-d h:i:s a', time()),
                      'Fte_CurSysUser'=> $this->session->userdata('id'),
                      'Fte_ByUser'    => $this->session->userdata('id'),
                );
        
        $this->db->insert('tbl_fin_transactionentry',$data);
        $data= array(
                        'Fte_DrAmt'     =>  0,
                        'Fte_CrAmt'     =>  $request['total_amount'],
                        'FFte_Table'    => 'hotel_tbl_hotels',
                        'Fte_FahID'     => '1',
                        'Fte_ChildID'   => $request['hotel_id'],
                        'Fte_Narration' => $request['book_id'],
                        'Fte_FccID'     => 1,
                        'Fte_Date'      => date('Y-m-d'),
                        'Fte_CurDtTime' => date('Y-m-d h:i:s a', time()),
                        'Fte_CurSysUser'=> $this->session->userdata('id'),
                        'Fte_ByUser'    => $this->session->userdata('id'),
                );
        
        $this->db->insert('tbl_fin_transactionentry',$data);
        $data= array(
                        'Fte_DrAmt'     => $request['total_amount'],
                        'Fte_CrAmt'     => 0,
                        'FFte_Table'    => 'hotel_tbl_hotels',
                        'Fte_FahID'     => '4',
                        'Fte_ChildID'   => $request['hotel_id'],
                        'Fte_Narration' => $request['book_id'],
                        'Fte_FccID'     => 1,
                        'Fte_Date'      => date('Y-m-d'),
                        'Fte_CurDtTime' => date('Y-m-d h:i:s a', time()),
                        'Fte_CurSysUser'=> $this->session->userdata('id'),
                        'Fte_ByUser'    => $this->session->userdata('id'),
                );
        
        $this->db->insert('tbl_fin_transactionentry',$data);
        return true;
    
    }
    public function check_reference($request){
        $this->db->select('reference_id');
        $this->db->where('reference_id',$request['refe_id']);
        $this->db->from('hotel_tbl_booking');
        $query=$this->db->get();
        return $query->result();
    }
    public function booking_approvel_notification($request) {
        $data= array(
                  'hotel_id'            => $request['hotel_id'],
                  'agent_id'            => $request['agent_id'],
                  'booking_id'          => $request['id'],
                  'notification_type'   => 'Approved Your booking Request',
                  'notification_msg'    => 'You have new booking approved Request',
                  'notification_date'   => date('Y-m-d H:i:s'),
                  );
        $this->db->insert('hotel_tbl_notification',$data);
        return true;
    }
    
    
     public function BookingDetailGet($request){
        $this->db->select('*');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('id',$request['book_id']);
        $query=$this->db->get();
        return $query->result();

    }
    public function cancellationUpdate($id){
      $data= array(
                  'booking_flag'  => '3',
                  'Updated_Date' => date('Y-m-d H:i:s'),
                  'Updated_By' => $this->session->userdata('id'),                  
                );
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_booking',$data);
      return true;
    }
    public function rejectionUpdate($id){
      $data= array(
                  'booking_flag'  => '0',
                  
                );
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_booking',$data);
      return true;
    }
    public function hotel_mail_details($hotelId) {
    $this->db->select('*');
    $this->db->where('id', $hotelId);
    $this->db->from('hotel_tbl_hotels');
    $query=$this->db->get();
    return $query->result();
  }
  public function CancellationRefundProcess($book_id,$check_in,$name) {
    $request = array('book_id' => $book_id);
    $bookingDetail = $this->Booking_Model->BookingDetailGet($request);
    $firstDate=date_create(date("Y-m-d"));
    $lastDate=date_create(date("Y-m-d",strtotime($check_in)));
    $no_of_days=date_diff($firstDate,$lastDate);
    $tot_days = $no_of_days->format("%a");
    $query = $this->db->query('SELECT * FROM hotel_tbl_bookcancellationpolicy WHERE bookingId = '.$book_id.' AND daysTo = (SELECT MIN(daysTo) FROM hotel_tbl_bookcancellationpolicy WHERE bookingId = '.$book_id.' AND daysTo <= '.$tot_days.' and  daysFrom >= '.$tot_days.')')->result();
    
    if (count($query)!=0) {
      if($query[0]->application=="STAY") {
        $cancellationAmount = $this->Booking_Model->cancellationAmountGet($book_id,"STAY",$query[0]->cancellationPercentage);
        $current_agent_credit = $this->Payment_Model->get_current_agent_credit($bookingDetail[0]->agent_id);
        $amount_after_refund = $cancellationAmount+$current_agent_credit[0]->Credit_amount;
        $add_agent_credit = $this->Payment_Model->add_agent_credit($bookingDetail[0]->agent_id,$amount_after_refund);
        $this->Payment_Model->insert_agent_detail($bookingDetail[0]->agent_id,$cancellationAmount,$amount_after_refund,$name);
        return true;
      } else if($query[0]->application=="FIRST NIGHT") {
        $cancellationAmount = $this->Booking_Model->cancellationAmountGet($book_id,"FIRST NIGHT",$query[0]->cancellationPercentage);
        $current_agent_credit = $this->Payment_Model->get_current_agent_credit($bookingDetail[0]->agent_id);
        $amount_after_refund = $cancellationAmount+$current_agent_credit[0]->Credit_amount;
        $add_agent_credit = $this->Payment_Model->add_agent_credit($bookingDetail[0]->agent_id,$amount_after_refund);
        $this->Payment_Model->insert_agent_detail($bookingDetail[0]->agent_id,$cancellationAmount,$amount_after_refund,$name);
        return true;
      } else {
        return true;
      } 
      
    } else {
      return true;
    }
    
  }
  public function cancellationAmountGet($book_id,$type,$percentage) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_booking');
    $this->db->where('hotel_tbl_booking.id',$book_id);
    $bookingDetail = $this->db->get()->result();
    $boardTotalAmount = 0;
    $generalTotalAmount = 0;
    $net_Extrabed_amount = 0;

    if ($type=="STAY") {
      // Room Amount get start
      $roomAmount =explode(",", $bookingDetail[0]->individual_amount);
      $roomDiscount = explode(",", $bookingDetail[0]->individual_discount);
      foreach ($roomAmount as $RAmKey => $RAmvalue) {
        if (!isset($roomDiscount[$RAmKey])) {
          $roomDiscount[$RAmKey] = 0;
        }
        $roomAmountVal[$RAmKey] = $RAmvalue-($RAmvalue*$roomDiscount[$RAmKey])/100;
      }
      $roomAmount = array_sum($roomAmountVal);
      // Room Amount get end
      // Board Amount get start 
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$book_id);
      $BoardQuery = $this->db->get()->result();
      $net_adult_amount = $net_child_amount = 0;
      if (count($BoardQuery)!=0) {
        foreach ($BoardQuery as $key => $value) 
        {
          $Chamntarray_explode= explode(",", $value->childAmount);
          $Charray_sum = array_sum($Chamntarray_explode);
          $board_adult_amount = $board_child_amount = 0;
          $board_adult_amount = ($value->adultamount * $value->Breqadults);
          $net_adult_amount += $board_adult_amount;
          $board_child_amount = ($Charray_sum * $value->BreqchildCount);
          $net_child_amount += $board_child_amount;
        }
      }
      $boardTotalAmount = $net_adult_amount+$net_child_amount;
      // Board Amount get end 
      // general Amount start
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$book_id);
      $GeneralQuery=$this->db->get()->result();
      $net_general_adult_amount = $net_board_child_amount = 0;
      if(count($GeneralQuery)!= 0) {
        foreach ($GeneralQuery as $key1 => $value1) 
        {
          $general_adult_amount = $general_child_amount = 0;
          $general_adult_amount = ($value1->gadultamount * $value1->reqadults);
          $net_general_adult_amount += $general_adult_amount;
          $general_child_amount = ($value1->gchildamount * $value1->reqChild);
          $net_board_child_amount += $general_child_amount;
        }
      }
      $generalTotalAmount = $net_general_adult_amount+$net_board_child_amount;
      // general Amount end
      // Extrabed Amount start
      $this->db->select('*');
      $this->db->from('bookingextrabed');
      $this->db->where('bookId',$book_id);
      $ExtrabedQuery=$this->db->get()->result();
      if(count($ExtrabedQuery)!= 0) {
        foreach ($ExtrabedQuery as $key2 => $value2) 
        {
          $net_Extrabed_amount += $value2->amount;
        }
      }
      // Extrabed Amount end
    } else {
      // Room Amount get start
      $roomAmount =explode(",", $bookingDetail[0]->individual_amount);
      $roomDiscount = explode(",", $bookingDetail[0]->individual_discount);
      foreach ($roomAmount as $RAmKey => $RAmvalue) {
        if (!isset($roomDiscount[$RAmKey])) {
          $roomDiscount[$RAmKey] = 0;
        }
        $roomAmountVal[$RAmKey] = $RAmvalue-($RAmvalue*$roomDiscount[$RAmKey])/100;
      }
      $roomAmount = array_sum($roomAmountVal);
      
      // Room Amount get end
      // Board Amount get start 
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$book_id);
      $this->db->where('stayDate',date('Y-m-d',strtotime($bookingDetail[0]->check_in)));
      $BoardQuery = $this->db->get()->result();
      $net_adult_amount = $net_child_amount = 0;
      if (count($BoardQuery)!=0) {
        foreach ($BoardQuery as $key => $value) 
        {
          $Chamntarray_explode= explode(",", $value->childAmount);
          $Charray_sum = array_sum($Chamntarray_explode);
          $board_adult_amount = $board_child_amount = 0;
          $board_adult_amount = ($value->adultamount * $value->Breqadults);
          $net_adult_amount += $board_adult_amount;
          $board_child_amount = ($Charray_sum * $value->BreqchildCount);
          $net_child_amount += $board_child_amount;
        }
      }
      $boardTotalAmount = $net_adult_amount+$net_child_amount;
      // Board Amount get end 
      // general Amount start
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$book_id);
      $this->db->where('gstayDate',date('Y-m-d',strtotime($bookingDetail[0]->check_in)));
      $GeneralQuery=$this->db->get()->result();
      $net_general_adult_amount = $net_board_child_amount = 0;
      if(count($GeneralQuery)!= 0) {
        foreach ($GeneralQuery as $key1 => $value1) 
        {
          $general_adult_amount = $general_child_amount = 0;
          $general_adult_amount = ($value1->gadultamount * $value1->reqadults);
          $net_general_adult_amount += $general_adult_amount;
          $general_child_amount = ($value1->gchildamount * $value1->reqChild);
          $net_board_child_amount += $general_child_amount;
        }
      }
      $generalTotalAmount = $net_general_adult_amount+$net_board_child_amount;
      // general Amount end
      // Extrabed Amount start
      $this->db->select('*');
      $this->db->from('bookingextrabed');
      $this->db->where('bookId',$book_id);
      $this->db->where('date',date('Y-m-d',strtotime($bookingDetail[0]->check_in)));
      $ExtrabedQuery=$this->db->get()->result();
      if(count($ExtrabedQuery)!= 0) {
        foreach ($ExtrabedQuery as $key2 => $value2) 
        {
          $net_Extrabed_amount += $value2->amount;
        }
      }
      // Extrabed Amount end
    }
    $totalAmount = $boardTotalAmount+$generalTotalAmount+$net_Extrabed_amount;
    return (($totalAmount*$bookingDetail[0]->admin_markup)/100+$totalAmount) - ((($totalAmount*$bookingDetail[0]->admin_markup)/100+$totalAmount)*$percentage)/100;
  }
  public function XMlbooking_list($filter) {
      $this->db->select('*');
      $this->db->from('xml_hotel_booking');
      $this->db->where('bookingFlg',$filter);
      $this->db->order_by('id','desc');
      $query = $this->db->get();
      return $query;
  }
  // @xml Booking details
  // This detail datas get from our db 
  public function xmlhotel_booking_details($id) {
    $this->db->select('a.*,b.First_Name as AFName,b.Last_Name as ALName,b.Mobile,b.Email,b.logo');
    $this->db->from('xml_hotel_booking a');
    $this->db->join('hotel_tbl_agents b','b.id=a.agent_id','left');
    $this->db->where('a.id',$id);
    $query = $this->db->get()->result();
    return $query;
  }
  public function updateXMlBookingId($id,$book_id,$InvoiceNumber,$BookingStatus) {
    $array = array(
      'BookingId'=>$book_id,
      'InvoiceNumber'=>$InvoiceNumber,
      'BookingStatus'=>$BookingStatus,
      'ProviderStatus'=>$BookingStatus,

    );
    $this->db->where('id',$id);
    $this->db->update('xml_hotel_booking',$array);
    return true;
  }
  public function hotel_portel_xmlaccept($request) {
    $array = array(
      'confirmationName'=>$request['booking_confirmation_name'],
      'bookingFlg' => 1
    );
    $this->db->where('id',$request['id']);
    $this->db->update('xml_hotel_booking',$array);
    return true;
  }
  public function xmlCancelUpdate($id,$CancellationCharge,$RefundAmount,$ProviderStatus,$booking_flag) {
    $data = array(
              'CancellationCharge' => $CancellationCharge,
              'RefundAmount' => $RefundAmount,
              'ProviderStatus' => $ProviderStatus,
              'CancelledDate' => date('Y-m-d h:i:s'),
              'bookingFlg' => $booking_flag,
              'UpdatedDate'=> date('Y-m-d h:i:s'),
              'UpdatedBy'=> $this->session->userdata('name'),
            );
    $this->db->where('id',$id);
    $this->db->update('xml_hotel_booking' ,$data);
    return true;
  }
  public function tour_booking_list($filter) {
    $this->db->select('a.id as bookid,a.*,b.type,b.duration,b.durationType');
    $this->db->from('tour_tbl_booking a');
    $this->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
    $this->db->where('a.booking_flag',$filter);
    $this->db->order_by('a.id','desc');
    $result = $this->db->get();
    return $result;
  }
  public function tour_booking_detail($id) {
    $this->db->select('a.id as bookid,a.*,b.type,b.duration,b.durationType,b.image,c.name as countryName,d.CityName,e.First_Name as AFName,e.Last_Name as ALName');
    $this->db->from('tour_tbl_booking a');
    $this->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
    $this->db->join('countries c','c.id=b.countryId','inner');
    $this->db->join('xml_city_tbl d','d.id=b.cityId','inner');
    $this->db->join('hotel_tbl_agents e','e.id=a.agent_id','inner');
    $this->db->where('a.id',$id);
    $result = $this->db->get()->result();
    return $result;
  } 
  public function get_tourcancellation_terms($request) {
      $this->db->select('*');
      $this->db->from('tour_tbl_bookcancellationpolicy');
      $this->db->where('tour_tbl_bookcancellationpolicy.bookingId',$request);
      $query=$this->db->get();
      return $query->result();
  }
  public function transfer_booking_list($filter) {
      $this->db->select('a.id as bookid,a.*,b.*');
      $this->db->from('transfer_tbl_booking a');
      $this->db->join('transfer_contracts b','a.contract_id=b.id','inner');
      $this->db->where('a.booking_flag',$filter);
      $this->db->order_by('a.id','desc');
      $result = $this->db->get();
      return $result;
  }
  public function transfer_booking_detail($id) {
      $this->db->select('a.id as bookid,a.*,b.*,c.*,d.First_Name as AFName,d.Last_Name as ALName');
      $this->db->from('transfer_tbl_booking a');
      $this->db->join('transfer_contracts b','a.contract_id=b.id','inner');
      $this->db->join('transfer_vehicle c','c.id=a.vehicleid ','inner');
       $this->db->join('hotel_tbl_agents d','d.id=a.agent_id','inner');
      $this->db->where('a.id',$id);
      $result = $this->db->get()->result();
      return $result;
  }
  public function gettransferbookpolicy($id) {
      $this->db->select('*');
      $this->db->from('transfer_tbl_bookcancellationpolicy');
      $this->db->where(array('bookingId'=>$id));
      $query = $this->db->get()->result();
      return $query;
  }
  public function transfer_booking_admin_approved($request) {
    $query = $this->db->query('SELECT (substr(invoice_id,10)) as invoice FROM `transfer_tbl_booking`')->result();

    if (count($query)==0) {
        $max_id = "INVOICE001";
    } else {
        $max_invoice = max($query)->invoice;
        $max_id ="INVOICE00".($max_invoice+ 1);
    }

    $this->db->select('invoice_id');
    $this->db->from('transfer_tbl_booking');
    $this->db->where('id',$request['id']);
    $query=$this->db->get();
    $final = $query->result();
    if ($final[0]->invoice_id=="") {
        $data= array(
                  'invoice_id'   =>$max_id,
                  'booking_flag' => 1,
                  'invoice_date' => date('Y-m-d'),
                  'Updated_Date' => date('Y-m-d'),
                  'Updated_By'   =>  $this->session->userdata('id'),
                );
        
    } else {
        $data= array(
              'booking_flag' => 1,
              'Updated_Date' => date('Y-m-d'),
              'Updated_By'   =>  $this->session->userdata('id'),
            );
    }
    $this->db->where('id',$request['id']);
    $this->db->update('transfer_tbl_booking',$data);
    return true;
  }
  public function TransferBookingDetailGet($id){
    $this->db->select('*');
    $this->db->from('transfer_tbl_booking');
    $this->db->where('id',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function transfercancellationUpdate($id){
    $data= array(
                'booking_flag'  => '3',               
              );
    $this->db->where('id',$id);
    $this->db->update('transfer_tbl_booking',$data);
    return true;
  }
  public function gettourbookpolicy($id) {
    $this->db->select('*');
    $this->db->from('tour_tbl_bookcancellationpolicy');
    $this->db->where(array('bookingId'=>$id));
    $query = $this->db->get()->result();
    return $query;
  }
  public function tourcancellationUpdate($id){
    $data= array(
                'booking_flag'  => '3',
                'cancelled_date' => date('Y-m-d H:i:s'),
                'cancelled_by' =>  $this->session->userdata('name')           
              );
    $this->db->where('id',$id);
    $this->db->update('tour_tbl_booking',$data);
    return true;
  }
  public function tour_booking_admin_approved($request) {
    $query = $this->db->query('SELECT (substr(invoice_id,10)) as invoice FROM `tour_tbl_booking`')->result();

    if (count($query)==0) {
        $max_id = "INVOICE001";
    } else {
        $max_invoice = max($query)->invoice;
        $max_id ="INVOICE00".($max_invoice+ 1);
    }

    $this->db->select('invoice_id');
    $this->db->from('tour_tbl_booking');
    $this->db->where('id',$request['id']);
    $query=$this->db->get();
    $final = $query->result();
    if ($final[0]->invoice_id=="") {
        $data= array(
                  'invoice_id'   =>$max_id,
                  'booking_flag' => 1,
                  'invoice_date' => date('Y-m-d'),
                  'Updated_Date' => date('Y-m-d'),
                  'Updated_By'   =>  $this->session->userdata('id'),
                );
        
    } else {
        $data= array(
              'booking_flag' => 1,
              'Updated_Date' => date('Y-m-d'),
              'Updated_By'   =>  $this->session->userdata('id'),
            );
    }
    $this->db->where('id',$request['id']);
    $this->db->update('tour_tbl_booking',$data);
    return true;
  }
  public function TourBookingDetailGet($id){
    $this->db->select('*');
    $this->db->from('tour_tbl_booking');
    $this->db->where('id',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function gettourbookmultiservice($id) {
    $this->db->select('*');
    $this->db->from('tour_tbl_multiservicebooking');
    $this->db->where('booking_id',$id);
    $query = $this->db->get()->result();
    return $query;
  }
  public function addAmendment($data) {
    $this->db->insert("hotel_tbl_amendments",$data);
    return true;
  }
  public function updateXmlBooking($id) {
    $data = array('bookingFlg' => 9,
      "UpdatedBy" => $this->session->userdata('id'),
      "UpdatedDate" => date('Y-m-d H:i:s')
    );
    $this->db->where('id',$id);
    $this->db->update('xml_hotel_booking',$data);
    return true;
  }
  public function amendmentdetails($book_id) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_amendments');
    $this->db->where('bookingId',$book_id);
    $query = $this->db->get()->result();
    return $query;
  }
  public function bookingRemarkSubmit($request) {
    $data = array(
      'remarks' => $request['bookingRemark'],
      "Updated_By" => $this->session->userdata('id'),
      "Updated_Date" => date('Y-m-d H:i:s')
    );
    $this->db->where('id',$request['bkId']);
    $this->db->update('hotel_tbl_booking',$data);
    return true;
  }
}

