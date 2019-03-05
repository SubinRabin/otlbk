<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function hotel_details_view($id) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_hotel_room_type');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_hotel_room_type.hotel_id = hotel_tbl_hotels.id', 'left');
        // $this->db->join('hotel_tbl_policies','hotel_tbl_hotels.id = hotel_tbl_policies.hotel_id', 'left');
        // $this->db->from('hotel_tbl_room_type');
        $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
        $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
        $this->db->where('hotel_tbl_hotels.delflg',1);
        $this->db->where('hotel_tbl_room_type.delflg',1);
        $this->db->where('hotel_tbl_hotel_room_type.id',$id);
        // $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result();
    }
    public function get_policy_contract($hotel_id,$contract_id){
        $this->db->select('*');
        $this->db->from('hotel_tbl_policies');
        $this->db->where('hotel_id',$hotel_id);
        $this->db->where('contract_id',$contract_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function room_booking_add($request,$max_booking_id,$agent_markup,$admin_markup,$normal_price,$per_room_amount,$tax_amount,$total_amount,$agent_currency_type,$search_markup,$discount,$discountCode) {
        if ($request['RequestType']=='Book') {
          $booking_flag = 2;
        } else {
          $booking_flag = 8;
        }
        $checkin_date=date_create($request['Check_in']);
        $checkout_date=date_create($request['Check_out']);
        $no_of_days=date_diff($checkin_date,$checkout_date);
        $tot_days = $no_of_days->format("%a");

        for ($i=0; $i < $tot_days ; $i++) {
          $dateOut = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
          $RMdiscount[$i] = DateWisediscount($dateOut,$request['hotel_id'],$request['room_id'],$request['contract_id'],'Room');
        }
        $individual_discount = implode(",", $RMdiscount);

        $Rwadults = implode(",", $request['reqadults']);
        $RwChild = implode(",", $request['reqChild']);
        $reqroom1childAge = "";
        $reqroom2childAge = "";
        $reqroom3childAge = "";
        $reqroom4childAge = "";
        $reqroom5childAge = "";
        $reqroom6childAge = "";
        $reqroom7childAge = "";
        $reqroom8childAge = "";
        $reqroom9childAge = "";
        $reqroom10childAge = "";
        if (isset($request['reqroom1-childAge'])) {
          $reqroom1childAge = implode(",", $request['reqroom1-childAge']);
        }
        if (isset($request['reqroom2-childAge'])) {
          $reqroom2childAge = implode(",", $request['reqroom2-childAge']);
        }
        if (isset($request['reqroom3-childAge'])) {
          $reqroom3childAge = implode(",", $request['reqroom3-childAge']);
        }
        if (isset($request['reqroom4-childAge'])) {
          $reqroom4childAge = implode(",", $request['reqroom4-childAge']);
        }
        if (isset($request['reqroom5-childAge'])) {
          $reqroom5childAge = implode(",", $request['reqroom5-childAge']);
        }
        if (isset($request['reqroom6-childAge'])) {
          $reqroom6childAge = implode(",", $request['reqroom6-childAge']);
        }
        if (isset($request['reqroom7-childAge'])) {
          $reqroom7childAge = implode(",", $request['reqroom7-childAge']);
        }
        if (isset($request['reqroom8-childAge'])) {
          $reqroom8childAge = implode(",", $request['reqroom8-childAge']);
        }
        if (isset($request['reqroom9-childAge'])) {
          $reqroom9childAge = implode(",", $request['reqroom9-childAge']);
        }
        if (isset($request['reqroom10-childAge'])) {
          $reqroom10childAge = implode(",", $request['reqroom10-childAge']);
        }
        $this->db->select('*');
        $this->db->from('hotel_tbl_contract');
        $this->db->where('contract_id',$request['contract_id']);
        $contract_board = $this->db->get()->result();

        if (isset($request['first_name_child'])) {
            $first_name_child = implode(",", $request['first_name_adult']);
        } else {
            $first_name_child = "";
        }
        if (isset($request['last_name_child'])) {
            $last_name_child =  implode(",", $request['last_name_child']);
        } else {
            $last_name_child = "";
        }
        if (isset($request['pax_kid'])) {
            $pax_kid = implode(",", $request['pax_kid']);
        } else {
            $pax_kid = "";
        }
        for ($i=0; $i < 11; $i++) { 
          if (isset($request['first_name'][$i])) {
            $request['first_name'][$i] = $request['first_name'][$i];
            $request['last_name'][$i] = $request['last_name'][$i];
          } else {
            $request['first_name'][$i] = "";
            $request['last_name'][$i] = "";
          }
        }
        $datas= array(
                  'booking_flag' => $booking_flag,
                  'booking_id' =>$max_booking_id,
                  'hotel_id' =>$request['hotel_id'],
                  'room_id' =>$request['room_id'],
                  'normal_price' =>$normal_price,
                  'per_room_amount' =>$per_room_amount,
                  'tax' =>$request['tax'],
                  'tax_amount' =>$tax_amount,
                  'total_amount' =>$total_amount,
                  'currency_type' =>$agent_currency_type,
                  'adults_count' =>$request['adults'],
                  'childs_count' =>$request['childs'],
                  'agent_markup' =>$agent_markup,
                  'admin_markup' =>$admin_markup,
                  'check_in' => $request['Check_in'],
                  'check_out' => $request['Check_out'],
                  'no_of_days' => $tot_days,
                  'book_room_count' => $request['no_of_rooms'],
                  'agent_id' =>  $this->session->userdata('agent_id'),
                  'search_markup' =>  $search_markup,
                  'bk_contact_fname' => $request['first_name'][0],
                  'bk_contact_lname' => $request['last_name'][0],
                  'bk_contact_email' => $request['email'],
                  'bk_contact_number' => $request['contact_num'],
                  'contract_id' => $request['contract_id'],
                  'board' => $contract_board[0]->board,
                  'discount' => $discount,
                  'Rwadults' => $Rwadults,
                  'Rwchild' => $RwChild,
                  'Room1ChildAge' => $reqroom1childAge,
                  'Room2ChildAge' => $reqroom2childAge,
                  'Room3ChildAge' => $reqroom3childAge,
                  'Room4ChildAge' => $reqroom4childAge,
                  'Room5ChildAge' => $reqroom5childAge,
                  'Room6ChildAge' => $reqroom6childAge,
                  'Room7ChildAge' => $reqroom7childAge,
                  'Room8ChildAge' => $reqroom8childAge,
                  'Room9ChildAge' => $reqroom9childAge,
                  'Room10ChildAge' => $reqroom10childAge,
                  'individual_amount' => implode(",",$request['per_day_amount']),
                  'individual_discount' => $individual_discount,
                  'SpecialRequest' => $request['SpecialRequest'],
                  'Room1-FName' => $request['first_name'][0],
                  'Room2-FName' => $request['first_name'][1],
                  'Room3-FName' => $request['first_name'][2],
                  'Room4-FName' => $request['first_name'][3],
                  'Room5-FName' => $request['first_name'][4],
                  'Room6-FName' => $request['first_name'][5],
                  'Room7-FName' => $request['first_name'][6],
                  'Room8-FName' => $request['first_name'][7],
                  'Room9-FName' => $request['first_name'][8],
                  'Room10-FName' => $request['first_name'][9],
                  'Room1-LName' => $request['last_name'][0],
                  'Room2-LName' => $request['last_name'][1],
                  'Room3-LName' => $request['last_name'][2],
                  'Room4-LName' => $request['last_name'][3],
                  'Room5-LName' => $request['last_name'][4],
                  'Room6-LName' => $request['last_name'][5],
                  'Room7-LName' => $request['last_name'][6],
                  'Room8-LName' => $request['last_name'][7],
                  'Room9-LName' => $request['last_name'][8],
                  'Room10-LName' => $request['last_name'][9],
                  'discountCode' => $discountCode,
                  'nationality' => $request['nationality'],
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('hotel_tbl_booking',$datas);
        $bool_id = $this->db->insert_id();
        return $bool_id;
    }
    public function max_booking_id() {
        $this->db->select_max('id');
        $this->db->from('hotel_tbl_booking');
        $query=$this->db->get();
        return $query->result();
    }
    public function room_price_get($id) {
        $this->db->select('price');
        $this->db->where('id',$id);
        $this->db->from('hotel_tbl_hotel_room_type');
        $query=$this->db->get();
        return $query->result();
    }
    public function agent_currency_type() {
        $id = $this->session->userdata('agent_id');
        $this->db->select('Preferred_Currency');
        $this->db->where('id',$id);
        $this->db->from('hotel_tbl_agents');
        $query=$this->db->get();
        $result = $query->result();
        return $result[0]->Preferred_Currency;
    }
    public function agent_credit_get() {
       $id = $this->session->userdata('agent_id');
        $this->db->select('Credit_amount');
        $this->db->where('id',$id);
        $this->db->from('hotel_tbl_agents');
        $query=$this->db->get();
        $result = $query->result();
        return $result[0]->Credit_amount;
    }
    public function agent_price_update($amount) {
      $id = $this->session->userdata('agent_id');
      $datas= array(
                    'Credit_amount' => $amount);
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_agents',$datas);
      return true;
    }
    public function agent_booking_list($filter) {
      $id = $this->session->userdata('agent_id');
      $this->db->select('hotel_tbl_booking.id as bk_id,hotel_tbl_booking.* ,hotel_tbl_booking.booking_id as book_id, hotel_tbl_hotels.hotel_name, ,hotel_tbl_room_type.Room_Type');
      $this->db->from('hotel_tbl_booking');
      $this->db->distinct();
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_bookingboard','hotel_tbl_booking.id = hotel_tbl_bookingboard.bookingID', 'left');
      $this->db->join('hotel_tbl_bookgeneralsupplement','hotel_tbl_booking.id = hotel_tbl_bookgeneralsupplement.bookingID', 'left');
      $this->db->where('hotel_tbl_booking.agent_id',$id);
      $this->db->where('hotel_tbl_booking.booking_flag',$filter);
      $this->db->order_by('hotel_tbl_booking.id','desc');
      // $this->db->where('hotel_tbl_booking.booking_flag !=',3);
      return $query=$this->db->get();
    } 
    public function agent_booking_detail($book_id) {
      $this->db->select('hotel_tbl_booking.booking_id as bk_id,hotel_tbl_booking.*,hotel_tbl_hotels.*,hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.*,hotel_tbl_agents.*,hotel_tbl_policies.*,hotel_tbl_booking.Created_Date as booking_date,hotel_tbl_booking.board as boardName');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_agents','hotel_tbl_booking.agent_id = hotel_tbl_agents.id', 'left');
      $this->db->join('hotel_tbl_policies','hotel_tbl_booking.hotel_id = hotel_tbl_policies.hotel_id', 'left');
      $this->db->where('hotel_tbl_booking.id',$book_id);
      // $this->db->where('hotel_tbl_booking.booking_flag !=',3);
      $query=$this->db->get();
      return $query->result();
    } 
    public function board_booking_detail($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$book_id);
      $query = $this->db->get();
      return $query->result();
    }
    public function general_booking_detail($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$book_id);
      $query = $this->db->get();
      return $query->result();
    }
    public function agent_booking_cancel($id) {
      $datas = array(
        'booking_flag' => '5',
        'Updated_Date' => date('Y-m-d H:i:s'),
        'Updated_By' => '');
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_booking',$datas);


      $this->db->select('*');
      $this->db->from('hotel_tbl_user');
      $query1=$this->db->get();
      $result1 = $query1->result();
      foreach ($result1 as $key => $value) {
        $user_id[] = $value->id;
      }
      $implode = implode(",", $user_id);
      $agent_id = $this->session->userdata('agent_id');
      $data = array('user_id' => $implode,
                    'agent_id' => $agent_id,
                    'rejected' => 0,
                    'notification_type' => 'booking Cancelled',
                    'notification_msg' => 'You have new booking Cancelled Request');
      $this->db->insert('hotel_tbl_notification',$data);

      $datas1 = array('user_id' => $implode,
                'notification_type' => 'hotel_booking_cancelled');

      $this->db->insert('hotel_tbl_notifications_list',$datas1);
      return true;
    }
    public function general_tax($id) {
      $this->db->select('tax_percentage');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('hotel_id',$id);
      $query=$this->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        return $result[0]->tax_percentage;
      }
      return 0;
    }
    public function agent_booking_profit_list() {
      $id = $this->session->userdata('agent_id');
      $this->db->select('hotel_tbl_booking.id as bk_id, hotel_tbl_booking.* , hotel_tbl_hotels.hotel_name, ,hotel_tbl_room_type.Room_Type');
      $this->db->distinct();
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_bookingboard','hotel_tbl_booking.id = hotel_tbl_bookingboard.bookingID', 'left');
      $this->db->join('hotel_tbl_bookgeneralsupplement','hotel_tbl_booking.id = hotel_tbl_bookgeneralsupplement.bookingID', 'left');
      $this->db->where('hotel_tbl_booking.agent_id',$id);
      $this->db->where('hotel_tbl_booking.booking_flag',1);
      // $this->db->where('hotel_tbl_booking.booking_flag !=',0);
      // $this->db->where('hotel_tbl_booking.booking_flag !=',2);
      $this->db->order_by('hotel_tbl_booking.id','desc');
      return $query=$this->db->get();
    } 
    public function agent_credit_amount() {
      $id = $this->session->userdata('agent_id');
      $this->db->select('Credit_amount');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $result = $query->result();
      return $result[0]->Credit_amount;
    }
    public function agent_currency_typesss() {
      $id = $this->session->userdata('agent_id');
      $this->db->select('Preferred_Currency');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $result = $query->result();
      return $result[0]->Preferred_Currency;
    }
    public function add_agent_credit($agent_id,$amount) {
      $datas= array(
                    'Credit_amount' => $amount);
      $this->db->where('id',$agent_id);
      $this->db->update('hotel_tbl_agents',$datas);
      return true;
    }
    public function get_current_agent_credit($agent_id) {
      $this->db->select('Credit_amount');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$agent_id);
      $query = $this->db->get();
      return $query->result();
    }
    public function insert_agent_detail($agent_id,$credit,$total,$createdBy) {
      $data = array
              ('Agent_id' => $agent_id, 
                'credit_amount' => $credit,
                'Total_credit' => $total,
                'narration' => 'Refund',
                'created_date' => date("Y-m-d"),
                'created_by' => $createdBy,
              );
      $this->db->insert('hotel_tbl_agent_credit_detail',$data);
    }
    public function agent_invoice_list() {
      $id = $this->session->userdata('agent_id');
      $this->db->select('hotel_tbl_booking.id as bk_id,hotel_tbl_booking.* ,hotel_tbl_booking.booking_id as book_id, hotel_tbl_hotels.hotel_name, ,hotel_tbl_room_type.Room_Type');
      $this->db->distinct();
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_bookingboard','hotel_tbl_booking.id = hotel_tbl_bookingboard.bookingID', 'left');
      $this->db->join('hotel_tbl_bookgeneralsupplement','hotel_tbl_booking.id = hotel_tbl_bookgeneralsupplement.bookingID', 'left');
      $this->db->where('hotel_tbl_booking.agent_id',$id);
      $this->db->where('hotel_tbl_booking.booking_flag',1);
      $this->db->order_by('hotel_tbl_booking.id','desc');
      return $query=$this->db->get();
    }
    public function agent_amount_status_update($credit_amt ,$used_amt,$booking_id) {
      $datas= array(
                    'Credit_amount' => $credit_amt,
                    'used_amount' => $used_amt,
                    'booking_id' => $booking_id,
                    'date' => date('d/m/Y'),
                    'agent_id' =>  $this->session->userdata('agent_id'),
                  );
      $this->db->insert('hotels_tbl_agent_amount_status',$datas);
      return true;
    }
    public function confirm_notification($agent_id,$hotel_id,$book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_user');
      $query=$this->db->get();
      $result = $query->result();
      foreach ($result as $key => $value) {
        $user_id[] = $value->id;
      }
      $implode = implode(",", $user_id);
      $date = date('Y-m-d H:i:s');
      $data = array('user_id'           => $implode,
                    'hotel_id'          => $hotel_id,
                    'agent_id'          => $agent_id,
                    'booking_id'        => $book_id,
                    'rejected'          => 2,
                    'notification_date' => $date,
                    'notification_type' => 'booked',
                    'notification_msg' => 'You have new booking Request');
      $this->db->insert('hotel_tbl_notification',$data);

      $datas1 = array('user_id' => $implode,
                'notification_type' => 'hotel_booking_request');

      $this->db->insert('hotel_tbl_notifications_list',$datas1);
      return true;
    }
    public function notification_off($booking_id) {
      $data= array('readed' => 2,);
      $this->db->where('booking_id',$booking_id);
      $this->db->update('hotel_tbl_notification',$data);
      return true;
    }
    public function clear_all_notifications($id){
      $data= array('readed' => 2,);
      $this->db->where('agent_id',$id);
      $this->db->update('hotel_tbl_notification',$data);
      return true;
    }
    public function get_board_supplement($request) {
      $adultBoardAmount = array();
      $childBoardAmount = array();
      $childBoardcnt = array();
      $childBoardcount = array();
      $childBoardAge = array();
      $adultAmount = array();
      $childAmount = array();
      $return = array();
      $bsarraySum = array();
      $adultscount = array_sum($request['adults']);
      $childscount = array_sum($request['Child']);
      $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
      $checkin_date=date_create($request['Check_in']);
      $checkout_date=date_create($request['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
        $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatdate[$i] = date('d/m/Y', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatday[$i] = date('D', strtotime($request['Check_in']. ' + '.$i.'  days'));
        if (isset($request['board'])) {
          foreach ($request['board'] as $key => $value) {
              $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND hotel_id = '".$request['hotel_id']."' AND board = '".$value."'")->result();
              $bsarraySum[$i] = count($boardSplmntCheck[$i]);
              foreach ($boardSplmntCheck[$i] as $key1 => $value1) {
                $explodeBoardroomtype[$key1] = explode(",", $value1->roomType);
                foreach ($explodeBoardroomtype[$key1] as $key2 => $value2) {
                  
                  if ($value2==$roomType[0]->id) {
                    if ($request['max_child_age'] < $value1->startAge || $request['max_child_age'] < $value1->finalAge) 
                    {
                      $adultBoardAmount[$value] = $value1->amount;
                    } 
                    // if($request['max_child_age'] >= $value1->finalAge) {
                        $childBoardcnt[$value][$key1] = array();
                        for ($j=1; $j <= count($request['Child']); $j++) { 
                          if (isset($request['room'.$j.'-childAge'])) {
                            foreach ($request['room'.$j.'-childAge'] as $key4 => $value4) {
                              if ($value1->startAge <= $value4 && $value1->finalAge >= $value4) {
                                $childBoardcnt[$value][$key1][] = $value4;
                              } 
                            }
                          }
                        }
                        if (count($childBoardcnt[$value][$key1])!=0) {
                          $childBoardcount[$value][$key1] = count($childBoardcnt[$value][$key1]);
                          $childBoardAge[$value][$key1] = $value1->startAge." to ".$value1->finalAge;
                          $childBoardAmount[$value][$key1] = $value1->amount;
                        } 
                    // }
                  }
                }
            }
          }   
        }   
        $return['date'][$i] = $dateFormatdate[$i];
        $return['day'][$i] = $dateFormatday[$i];
        $return['adultamount'][$i] = $adultBoardAmount;
        $return['childamount'][$i] = $childBoardAmount;
        $return['childcount'][$i] = $childBoardcount;
        $return['childage'][$i] = $childBoardAge;
        $return['board'][$i] = $request['board'];
          
      }
      $return['bsCount'] = array_sum($bsarraySum);
      return $return;
    }
    public function get_general_supplement($request) {
      /*Standard capacity get from rooms start*/

      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('id',$request['room_id']);
      $Rmquery = $this->db->get();
      $Rmrow_values  = $Rmquery->row_array();
      $occupancyAdult = $Rmrow_values['occupancy'];
      $occupancyChild = $Rmrow_values['occupancy_child'];
      $standard_capacity = $Rmrow_values['standard_capacity'];

      /*Standard capacity get from rooms end*/

      $adultAmount =array();
      $return = array();
      $RWadultAmount = array();
      $childAmount =array();
      $RWchildAmount = array();
      $generalsupplementType = array();
      $boardSplmntCheck  = array();
      $gsarraySum = array();
      $mangsarraySum = array();
      $ManadultAmount  = array();
      $MangeneralsupplementforAdults = array();
      $ManchildAmount = array();
      $MangeneralsupplementforChilds = array();
      $MangeneralsupplementType = array();
      $extrabedAmount = array();

      $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
      // print_r($request);
      $checkin_date=date_create($request['Check_in']);
      $checkout_date=date_create($request['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
        $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatdate[$i] = date('d/m/Y', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatday[$i] = date('D', strtotime($request['Check_in']. ' + '.$i.'  days'));
        
        /*Mandatory General Supplement start*/
        $adultAmount =array();
        $RWadultAmount = array();
        $generalSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."'  AND mandatory = 1")->result();
          $gsarraySum[$i] = count($generalSplmntCheck[$i]);
        if (count($generalSplmntCheck[$i])!=0) {
          foreach ($generalSplmntCheck[$i] as $key1 => $value1) {
                $explodeRoomType[$key1] = explode(",", $value1->roomType);
                foreach ($explodeRoomType[$key1] as $key4 => $value4) {
                    if ($value4==$roomType[0]->id) {
                      if ($value1->application=="Per Person") {
                        if (round($value1->adultAmount)!=0) {
                          $adultAmount[$value1->type] = $value1->adultAmount*array_sum($request['adults']);
                        }
                        for ($j=1; $j <= count($request['adults']); $j++) {
                          if (round($value1->adultAmount)!=0) {
                            $RWadultAmount[$value1->type][$j] = $value1->adultAmount*$request['adults'][$j-1];
                          }
                          if (isset($request['room'.$j.'-childAge'])) {
                            foreach ($request['room'.$j.'-childAge'] as $key44 => $value44) {
                              if ($value1->MinChildAge < $value44) {
                                if (round($value1->childAmount)!=0) {
                                  $childAmount[$value1->type] = $value1->childAmount;
                                  $RWchildAmount[$value1->type][$j][$key44] = $value1->childAmount;
                                }
                              } 
                            }

                          }

                        }
                      } else {
                        if (round($value1->adultAmount)!=0) {
                          $adultAmount[$value1->type] = $value1->adultAmount*count($request['adults']);
                           $RWadultAmount[$value1->type][1] = $value1->adultAmount*count($request['adults']);
                        }
                      }
                      $generalsupplementType[$key1] = $value1->type;
                    }
                }
                
            }
        }
        /*Mandatory General Supplement end*/
        $return['date'][$i] = $dateFormatdate[$i];
        $return['day'][$i] = $dateFormatday[$i];
        $return['adultamount'][$i] = $adultAmount;
        $return['RWadultamount'][$i] = $RWadultAmount;
        $return['childamount'][$i] = $childAmount;
        $return['RWchildAmount'][$i] = $RWchildAmount;
        $return['general'][$i] = array_unique($generalsupplementType);
        $return['ManadultAmount'][$i] = $ManadultAmount;
        $return['ManchildAmount'][$i] = $ManchildAmount;
        $return['ManchildAmount'][$i] = $ManchildAmount;
        $return['Manadultcount'][$i] = $MangeneralsupplementforAdults;
        $return['Manchildcount'][$i] = $MangeneralsupplementforChilds;
        $return['mangeneral'][$i] = array_unique($MangeneralsupplementType);
      }
      $return['gnlCount'] = array_sum($gsarraySum)+array_sum($mangsarraySum);
      return $return;
    }
    public function get_PaymentConfirmboard_supplement($request) {
      $adultBoardAmount = array();
      $childBoardAmount = array();
      $childBoardcnt = array();
      $childBoardcount = array();
      $childBoardAge = array();
      $adultAmount = array();
      $childAmount = array();
      $return = array();
      $bsarraySum = array();
      $adultscount = array_sum($request['reqadults']);
      $childscount = array_sum($request['reqChild']);
      $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
      $checkin_date=date_create($request['Check_in']);
      $checkout_date=date_create($request['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
        $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatdate[$i] = date('d/m/Y', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatday[$i] = date('D', strtotime($request['Check_in']. ' + '.$i.'  days'));
        if (isset($request['board'])) {
          foreach ($request['board'] as $key => $value) {
              $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND hotel_id = '".$request['hotel_id']."' AND board = '".$value."'")->result();
              $bsarraySum[$i] = count($boardSplmntCheck[$i]);
              foreach ($boardSplmntCheck[$i] as $key1 => $value1) {
                $explodeBoardroomtype[$key1] = explode(",", $value1->roomType);
                foreach ($explodeBoardroomtype[$key1] as $key2 => $value2) {
                  
                  if ($value2==$roomType[0]->id) {
                    if ($request['max_child_age'] < $value1->startAge || $request['max_child_age'] < $value1->finalAge) 
                    {
                      $adultBoardAmount[$value] = $value1->amount;
                    } 
                    // if($request['max_child_age'] >= $value1->finalAge) {

                        $childBoardcnt[$value][$key1] = array();
                        for ($j=1; $j <= count($request['reqadults']); $j++) { 
                          if (isset($request['reqroom'.$j.'-childAge'])) {

                            foreach ($request['reqroom'.$j.'-childAge'] as $key4 => $value4) {
                              if ($value1->startAge <= $value4 && $value1->finalAge >= $value4) {
                                $childBoardcnt[$value][$key1][] = $value4;
                              } 
                            }
                          }
                        }
                        if (count($childBoardcnt[$value][$key1])!=0) {
                          $childBoardcount[$value][$key1] = count($childBoardcnt[$value][$key1]);
                          $childBoardAge[$value][$key1] = $value1->startAge." to ".$value1->finalAge;
                          $childBoardAmount[$value][$key1] = $value1->amount;
                        } 
                    // }
                  }
                }
            }
          }   
        }   
        $return['date'][$i] = $dateFormatdate[$i];
        $return['day'][$i] = $dateFormatday[$i];
        $return['adultamount'][$i] = $adultBoardAmount;
        $return['childamount'][$i] = $childBoardAmount;
        $return['childcount'][$i] = $childBoardcount;
        $return['childage'][$i] = $childBoardAge;
        $return['board'][$i] = $request['board'];
          
      }
      $return['bsCount'] = array_sum($bsarraySum);
      return $return;
    }
    public function bkboardSupplementConfirm($stayDate, $BookingDate, $board, $adultamount, $childage, $childAmount, $agent_markup, $total_markup, $admin_markup,$booking_id,$reqadults,$reqchildCount,$rwadult,$rwadultamount,$rwchild,$rwchildAmount) {
      $datas= array(
                  'bookingID' =>$booking_id,
                  'stayDate' =>$stayDate,
                  'BookingDate' =>$BookingDate,
                  'board' =>$board,
                  'adultamount' =>$adultamount,
                  'childage' =>$childage,
                  'childAmount' =>$childAmount,
                  'agent_markup' =>$agent_markup,
                  'total_markup' =>$total_markup,
                  'admin_markup' =>$admin_markup,
                  'Breqadults' => $reqadults,
                  'BreqchildCount' => $reqchildCount,
                  'Rwadult' => $rwadult,
                  'RwadultAmount' => $rwadultamount,
                  'Rwchild' => $rwchild,
                  'RwchildAmount' => $rwchildAmount,
                  'createdDate' => date('Y-m-d'),
                  'createdBy' =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('hotel_tbl_bookingboard',$datas);
     return true;
    }
    public function bkgeneralSupplementConfirm($gstayDate, $gBookingDate, $generalType, $gadultamount , $gchildamount, $agent_markup, $total_markup, $admin_markup,$booking_id,$reqadults,$reqChild,$mand,$Rwadult,$Rwchild,$Rwadultamount,$RwchildAmount,$application) {
      $datas= array(
                  'bookingID' =>$booking_id,
                  'gstayDate' =>$gstayDate,
                  'gBookingDate' =>$gBookingDate,
                  'generalType' =>$generalType,
                  'gadultamount' =>$gadultamount,
                  'gchildamount' =>$gchildamount,
                  'agent_markup' =>$agent_markup,
                  'total_markup' =>$total_markup,
                  'admin_markup' =>$admin_markup,
                  'reqadults' =>$reqadults,
                  'reqChild' =>$reqChild,
                  'mandatory' =>$mand,
                  'Rwadult' =>$Rwadult,
                  'Rwchild' =>$Rwchild,
                  'Rwadultamount' =>$Rwadultamount,
                  'RwchildAmount' =>$RwchildAmount,
                  'application' => $application,
                  'createdDate' => date('Y-m-d'),
                  'createdBy' =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('hotel_tbl_bookGeneralSupplement',$datas);
     return true;
    }
    public function get_Confirmgeneral_supplement($request) {

      /*Standard capacity get from rooms start*/

      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('id',$request['room_id']);
      $Rmquery = $this->db->get();
      $Rmrow_values  = $Rmquery->row_array();
      $occupancyAdult = $Rmrow_values['occupancy'];
      $occupancyChild = $Rmrow_values['occupancy_child'];
      $standard_capacity = $Rmrow_values['standard_capacity'];

      /*Standard capacity get from rooms end*/

      $return = array();
      $adultAmount =array();
      $RWadultAmount = array();
      $RWadult = array();
      $RWchild = array();
      $childAmount =array();
      $RWchildAmount = array();
      $generalsupplementType = array();
      $generalsupplementapplication = array();
      $boardSplmntCheck  = array();
      $gsarraySum = array();
      $mangsarraySum = array();
      $ManadultAmount  = array();
      $MangeneralsupplementforAdults = array();
      $ManchildAmount = array();
      $MangeneralsupplementforChilds = array();
      $MangeneralsupplementType = array();
      $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
      // print_r($request);
      $checkin_date=date_create($request['Check_in']);
      $checkout_date=date_create($request['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
        $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatdate[$i] = date('d/m/Y', strtotime($request['Check_in']. ' + '.$i.'  days'));
        $dateFormatday[$i] = date('D', strtotime($request['Check_in']. ' + '.$i.'  days'));
        
        /*Mandatory General Supplement start*/
        $adultAmount =array();
        $RWadultAmount = array();
        $generalSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."'  AND mandatory = 1")->result();
          $gsarraySum[$i] = count($generalSplmntCheck[$i]);
        if (count($generalSplmntCheck[$i])!=0) {
          foreach ($generalSplmntCheck[$i] as $key1 => $value1) {
                $explodeRoomType[$key1] = explode(",", $value1->roomType);
                foreach ($explodeRoomType[$key1] as $key4 => $value4) {
                    if ($value4==$roomType[0]->id) {
                      if ($value1->application=="Per Person") {
                        if (round($value1->adultAmount)!=0) {
                          $adultAmount[$value1->type] = $value1->adultAmount*array_sum($request['reqadults']);
                        }
                        for ($j=1; $j <= count($request['reqadults']); $j++) { 
                          if (round($value1->adultAmount)!=0) {
                            $RWadultAmount[$value1->type][$j] = $value1->adultAmount*$request['reqadults'][$j-1];
                            $RWadult[$value1->type][$j] = $j;
                          }
                          if (isset($request['reqroom'.$j.'-childAge'])) {
                            foreach ($request['reqroom'.$j.'-childAge'] as $key44 => $value44) {
                              if ($value1->MinChildAge < $value44) {
                                if (round($value1->childAmount)!=0) {
                                  $childAmount[$value1->type] = $value1->childAmount;
                                  $RWchildAmount[$value1->type][$j][$key44] = $value1->childAmount;
                                  $RWchild[$value1->type][$j] = $j;
                                }
                                // $childAmount[$value1->type] = $value1->childAmount;
                              } 
                            }

                          }

                        }
                      } else {
                        if (round($value1->adultAmount)!=0) {
                          $adultAmount[$value1->type] = $value1->adultAmount*count($request['reqadults']);
                          $childAmount[$value1->type] = 0;
                          $RWadultAmount[$value1->type][1] = $value1->adultAmount*count($request['reqadults']);
                          $RWadult[$value1->type][1] = 1;
                        }
                      }
                      $generalsupplementType[$key1] = $value1->type;
                      $generalsupplementapplication[$key1] = $value1->application;
                    }
                }
                
            }
        }

        /*Mandatory General Supplement end*/
        /*Without Mandatory General Supplement start*/
        // $MangeneralSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."'  AND mandatory = 0")->result();
        // if (count($MangeneralSplmntCheck[$i])!=0) {
        //     foreach ($MangeneralSplmntCheck[$i] as $key5 => $value5) {
              
        //       $ManexplodeRoomType[$key5] = explode(",", $value5->roomType);
        //         foreach ($ManexplodeRoomType[$key5] as $key6 => $value6) {
        //             if ($value6==$roomType[0]->id) {
        //               foreach ($request['reqadults'] as $key7 => $value7) {
        //                 if (($value7+$request['reqChild'][$key7]) > $standard_capacity) {
        //                   // echo ($value7+$request['Child'][$key7]);
        //                   $mangsarraySum[$i] = count($MangeneralSplmntCheck[$i]);
        //                   if ($value5->application=="Per Person") {
        //                     $ManadultAmount[$value5->type][$key7] = ($value5->adultAmount*$value7);
        //                     $ManchildAmount[$value5->type][$key7] = ($value5->childAmount*$request['reqChild'][$key7]);
        //                     $MangeneralsupplementforAdults[$value5->type][$key7] = $value7;
        //                     $MangeneralsupplementforChilds[$value5->type][$key7] =  $request['reqChild'][$key7];
        //                   } else {
        //                     $ManadultAmount[$value5->type][$key7] = $value5->adultAmount;
        //                     $ManchildAmount[$value5->type][$key7] = 0;
        //                     $MangeneralsupplementforAdults[$value5->type][$key7] = 1;
        //                     $MangeneralsupplementforChilds[$value5->type][$key7] =  0;
        //                   }
        //                   $MangeneralsupplementType[$key5] = $value5->type;
        //                 }
        //               }
                      
        //             }
        //         }
        //     }
        //   }
        /*Without Mandatory General Supplement end*/
        $return['date'][$i] = $dateFormatdate[$i];
        $return['day'][$i] = $dateFormatday[$i];
        $return['adultamount'][$i] = $adultAmount;
        $return['RWadultamount'][$i] = $RWadultAmount;
        $return['RWadult'][$i] = $RWadult;
        $return['RWchild'][$i] = $RWchild;
        $return['childamount'][$i] = $childAmount;
        $return['RWchildAmount'][$i] = $RWchildAmount;
        $return['general'][$i] = array_unique($generalsupplementType);
        $return['application'][$i] = array_unique($generalsupplementapplication);
        $return['ManadultAmount'][$i] = $ManadultAmount;
        $return['ManchildAmount'][$i] = $ManchildAmount;
        $return['ManchildAmount'][$i] = $ManchildAmount;
        $return['Manadultcount'][$i] = $MangeneralsupplementforAdults;
        $return['Manchildcount'][$i] = $MangeneralsupplementforChilds;
        $return['mangeneral'][$i] = array_unique($MangeneralsupplementType);
      }
      $return['gnlCount'] = array_sum($gsarraySum)+array_sum($mangsarraySum);
      // print_r($return);
      // exit();
      return $return;
    }
    public function get_CancellationPolicy_contract($request) {
      $refund= $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$request['contract_id']."' AND nonRefundable = 1")->result();
      if (count($refund)!=0) {
        $data[0] = "This booking is Nonrefundable";
      } else {

        $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
        $data = array();
        $checkin_date=date_create($request['Check_in']);
        $checkout_date=date_create($request['Check_out']);
        $no_of_days=date_diff($checkin_date,$checkout_date);
        $tot_days = $no_of_days->format("%a");
        for($i = 0; $i < $tot_days; $i++) {
          $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
          $CancellationPolicyCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_cancellationfee WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."'")->result();
          if (count($CancellationPolicyCheck[$i])!=0) {
            foreach ($CancellationPolicyCheck[$i] as $key => $value) {
                $exploderoomType[$key] = explode(",", $value->roomType);
                foreach ($exploderoomType[$key] as $key1 => $value1) {
                  if ($value1==$roomType[0]->id) {
                      if ($value->daysInAdvance==0) {
                        $daysInAdvance = 'your check-in date';
                      } else if($value->daysInAdvance==1) {
                        $daysInAdvance = 'within 24 hours of your check-in';
                      } else {
                        $daysInAdvance = 'within '.$value->daysInAdvance.' days of your check-in';
                      }
                      if ($value->application=="FIRST NIGHT") {
                        $data[$key] = '<span>
                                   If you cancel '.$daysInAdvance.',you will pay '.$value->cancellationPercentage.'% of one night stay with supplementary charges no matter the number of stay days.
                                </span>';
                      } else if ($value->application=="STAY") {

                          $data[$key] = '<span>
                                      If you cancel '.$daysInAdvance.', you will pay '.$value->cancellationPercentage.'% of the booking amount.
                                </span>';
                      } else {
                        $data[$key] = '<span>
                                   If you cancel '.$daysInAdvance.',  Cancellation charge is free .
                              </span>';
                      }
                  }
                }
            }
          }
        }
        

      }
      return $data;
    }
    public function addCancellationBooking($booking_id,$msg,$percentage,$daysFrom,$daysTo,$application) {
      $datas= array(
                  'bookingID'               =>$booking_id,
                  'daysFrom'                =>$daysFrom,
                  'daysTo'                  =>$daysTo,
                  'cancellationPercentage'  =>$percentage,
                  'application'             =>$application,
                  'msg'                     =>$msg,
                  'createdDate'             => date('Y-m-d'),
                  'createdBy'               =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('hotel_tbl_bookcancellationpolicy',$datas);
     return true;
    }
    public function board_single_amount($id,$check_in) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$id);
      $this->db->where('stayDate',$check_in);
      $query=$this->db->get();
      return $query->result();
    }
    public function board_amount($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookingboard');
      $this->db->where('bookingID',$request);
      $query=$this->db->get();
      return $query->result();
    }
    public function general_single_amount($id,$check_in) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$id);
      $this->db->where('gstayDate',$check_in);
      $query=$this->db->get();
      return $query->result();
    }
    public function general_amount($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookgeneralsupplement');
      $this->db->where('bookingID',$request);
      $query=$this->db->get();
      return $query->result();
    }
    public function get_cancellationamount($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->where('hotel_tbl_bookcancellationpolicy.bookingId',$request);
      $query=$this->db->get();
      return $query->result();
    }
    public function get_first_night_amount($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->join('hotel_tbl_booking','hotel_tbl_bookcancellationpolicy.bookingId = hotel_tbl_booking.id', 'left');
      $this->db->where('bookingId',$request);
      $query=$this->db->get();
      return $query->result();
    }
    public function loget_cancellation_terms($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->where('hotel_tbl_bookcancellationpolicy.bookingId',$request);
      $this->db->order_by('hotel_tbl_bookcancellationpolicy.daysInAdvance','asc');
      $query=$this->db->get();
      return $query->result();
    }
    public function extrabedAllotment($request) {
      $extrabedAmount  = array();
      $extraBedtotal  = array();
      $extrabedType = array();

      $this->db->select('*');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('contract_id',$request['contract_id']);
      $query = $this->db->get();
      $row_values  = $query->row_array();
      $tax = $row_values['tax_percentage'];
      $max_child_age = $row_values['max_child_age'];
      $contract_board = $row_values['board'];
      $contract_id = $request['contract_id'];

      // foreach ($request['Child'] as $Rreqkey => $Rreqvalue) {
      //     if ($Rreqvalue!=0) {
      //       for ($q=1; $q <=$Rreqvalue ; $q++) { 
      //           if ( isset($request['room'.($Rreqkey+1).'-childAge'][$q-1]) && $request['room'.($Rreqkey+1).'-childAge'][$q-1] >= $max_child_age) {
      //             $request['adults'][$Rreqkey]+=1;
      //             $request['Child'][$Rreqkey]-=1;
      //             unset($request['room'.($Rreqkey+1).'-childAge'][$q-1]);
      //           }
      //       }
      //     }
      //   }


      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('id',$request['room_id']);
      $Rmquery = $this->db->get();
      $Rmrow_values  = $Rmquery->row_array();
      $occupancyAdult = $Rmrow_values['occupancy'];
      $occupancyChild = $Rmrow_values['occupancy_child'];
      $standard_capacity = $Rmrow_values['standard_capacity'];
      $max_capacity = $Rmrow_values['max_total'];
      $Room_Type = $Rmrow_values['id'];


      $start_date = $request['Check_in'];
      $end_date = $request['Check_out'];
      $checkin_date=date_create($start_date);
      $checkout_date=date_create($end_date);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
      /*Extrabed allotment start*/
          $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));

          if ($contract_board=="BB") {
              $contract_boardRequest = array('Breakfast');
          } else if($contract_board=="HB") {
              $contract_boardRequest = array('Breakfast','Dinner');
          } else if($contract_board=="FB") {
              $contract_boardRequest = array('Breakfast','Dinner','Lunch');
          } else {
              $contract_boardRequest = array();
          }
          $implodeboardRequest = implode("','", $contract_boardRequest);

           $extrabedallotment[$i] = $this->db->query("SELECT * FROM hotel_tbl_extrabed WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND contract_id = '".$contract_id."' AND  hotel_id = '".$request['hotel_id']."'")->result();
            if (count($extrabedallotment[$i])!=0) {
            foreach ($extrabedallotment[$i] as $key15 => $value15) {
                 foreach ($request['adults'] as $key17 => $value7) {
                  if (($value7+$request['Child'][$key17]) > $standard_capacity) {

                    // for ($k=1; $k <= count($request['adults']); $k++) { 

                      if (isset($request['room'.($key17+1).'-childAge'])) {
                        foreach ($request['room'.($key17+1).'-childAge'] as $key18 => $value18) {
                            if ($max_child_age <= $value18) {
                              $explodeexRType = explode(",", $value15->roomType);
                              foreach ($explodeexRType as $exexrtypekey => $exexrtypevalue) {
                                if ($Room_Type==$exexrtypevalue) {
                                  $extrabedAmount[$i][$key17][] =  $value15->amount;
                                  $extrabedType[$i][$key17][] =  'Adult Extrabed';
                                }
                              }
                            } else {
                              if ($value15->ChildAmount!=0 && $value15->ChildAmount!="") {
                                  if ($value15->ChildAgeFrom <= $value18 && $value15->ChildAgeTo >= $value18) {
                                    $extrabedAmount[$i][$key17][$key18] =  $value15->ChildAmount;
                                    $extrabedType[$i][$key17][$key18] =  'Child Extrabed';
                                  }
                              } else {
                                $boardalt[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board IN ('".$implodeboardRequest."')")->result();
                                if (count($boardalt[$i])!=0) {
                                  foreach ($boardalt[$i] as $key21 => $value21) {
                                    if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
                                        $explodeRType = explode(",", $value21->roomType);
                                        foreach ($explodeRType as $exrtypekey => $exrtypevalue) {
                                          if ($Room_Type==$exrtypevalue) {
                                            $extrabedAmount[$i][$key17][$key18] =  $value21->amount;
                                            $extrabedType[$i][$key17][$key18] =  'Child '.$value21->board;
                                          }
                                        }
                                    }
                                    
                                  }
                                }
                              }  

                            }
                        }
                        
                      }

                    // }
                    if ($value7 > $standard_capacity) {
                      $explodeexRType = explode(",", $value15->roomType);
                      foreach ($explodeexRType as $exexrtypekey => $exexrtypevalue) {
                        if ($Room_Type==$exexrtypevalue) {
                          $extrabedAmount[$i][$key17][] =  $value15->amount;
                          $extrabedType[$i][$key17][] =  'Adult Extrabed';
                        }
                      }
                    }
                    // echo $request['Child'][$key17];
                    // echo "<BR>";

                  }
                 }
            }
          }

          /* Board wise supplement check start */
            $boardSp[$i] = array();
            if($contract_board=="HB") {
              $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Half Board' AND FIND_IN_SET('".$Room_Type."', IFNULL(roomType,'')) > 0")->result();
            } else if($contract_board=="FB") {
              $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Full Board' AND FIND_IN_SET('".$Room_Type."', IFNULL(roomType,'')) > 0")->result();
            }

            if (count($boardSp[$i])!=0) {
              foreach ($boardSp[$i] as $key21 => $value21) {
                foreach ($request['adults'] as $key17 => $value17) {
                  if (($value17+$request['Child'][$key17]) > $standard_capacity) {
                    if (isset($request['room'.($key17+1).'-childAge'])) {
                      foreach ($request['room'.($key17+1).'-childAge'] as $key18 => $value18) {
                        if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
                          if (round($value21->amount)!=0) {
                            $extrabedAmount[$i][$key17][] =  $value21->amount;
                            $extrabedType[$i][$key17][] =  'Child '.$value21->board;
                          }
                        }
                      }
                    }
                  }
                  if ($value21->startAge >= 18) {
                    if (round($value21->amount)!=0) {
                      $extrabedAmount[$i][$key17][] =  $value21->amount;
                      $extrabedType[$i][$key17][] =  'Adult '.$value21->board;
                    }
                  }
                }
              }
            }

        /* Board wise supplement check end */
         
          if (isset($extrabedAmount[$i])) {
            $Texamount[$i] = array();
            foreach ($extrabedAmount[$i] as $Texamkey => $Texam) {
                $Texamount[$i][] = array_sum($Texam);
            }
            $extraBedtotal[$i] = array_sum($Texamount[$i]);
          }

        }
        if (count($extraBedtotal)!=0) {
          $return['date'] = $date;
          $return['extrabedAmount'] = $extraBedtotal;
          $return['extrabedType'] = $extrabedType;
          $return['RwextrabedAmount'] = $extrabedAmount;
          $return['count'] = count($extraBedtotal);
        } else {
          $return['count'] = 0;
        }
        // print_r($extrabedAmount);
        // exit();
        return $return;
    }
    public function get_PaymentConfirmextrabedAllotment($request) {
      
      $extrabedAmount  = array();
      $extraBedtotal  = array();
      $exrooms = array();
      $extrabedType = array();

      $this->db->select('*');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('contract_id',$request['contract_id']);
      $query = $this->db->get();
      $row_values  = $query->row_array();
      $tax = $row_values['tax_percentage'];
      $max_child_age = $row_values['max_child_age'];
      $contract_board = $row_values['board'];
      $contract_id = $request['contract_id'];

      // foreach ($request['reqChild'] as $Rreqkey => $Rreqvalue) {
      //   if ($Rreqvalue!=0) {
      //     for ($q=1; $q <=$Rreqvalue ; $q++) { 
      //         if ( isset($request['reqroom'.($Rreqkey+1).'-childAge'][$q-1]) && $request['reqroom'.($Rreqkey+1).'-childAge'][$q-1] >= $max_child_age) {
      //           $request['reqadults'][$Rreqkey]+=1;
      //           $request['reqChild'][$Rreqkey]-=1;
      //           unset($request['reqroom'.($Rreqkey+1).'-childAge'][$q-1]);
      //         }
      //     }
      //   }
      // }
        
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('hotel_id',$request['hotel_id']);
      $this->db->where('id',$request['room_id']);
      $Rmquery = $this->db->get();
      $Rmrow_values  = $Rmquery->row_array();
      $occupancyAdult = $Rmrow_values['occupancy'];
      $occupancyChild = $Rmrow_values['occupancy_child'];
      $standard_capacity = $Rmrow_values['standard_capacity'];
      $max_capacity = $Rmrow_values['max_total'];
      $Room_Type = $Rmrow_values['id'];


      $start_date = $request['Check_in'];
      $end_date = $request['Check_out'];
      $checkin_date=date_create($start_date);
      $checkout_date=date_create($end_date);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
      /*Extrabed allotment start*/
          $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));

          if ($contract_board=="BB") {
              $contract_boardRequest = array('Breakfast');
          } else if($contract_board=="HB") {
              $contract_boardRequest = array('Breakfast','Dinner');
          } else if($contract_board=="FB") {
              $contract_boardRequest = array('Breakfast','Dinner','Lunch');
          } else {
              $contract_boardRequest = array();
          }
          $implodeboardRequest = implode("','", $contract_boardRequest);

           $extrabedallotment[$i] = $this->db->query("SELECT * FROM hotel_tbl_extrabed WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND contract_id = '".$contract_id."' AND  hotel_id = '".$request['hotel_id']."'")->result();
            if (count($extrabedallotment[$i])!=0) {
            foreach ($extrabedallotment[$i] as $key15 => $value15) {
                 foreach ($request['reqadults'] as $key17 => $value7) {
                  if (($value7+$request['reqChild'][$key17]) > $standard_capacity) {
                    // for ($k=1; $k <= count($request['reqadults']); $k++) { 
                      if (isset($request['reqroom'.($key17+1).'-childAge'])) {
                        foreach ($request['reqroom'.($key17+1).'-childAge'] as $key18 => $value18) {
                            if ($max_child_age <= $value18) {
                                $explodeexRType = explode(",", $value15->roomType);
                                  foreach ($explodeexRType as $exexrtypekey => $exexrtypevalue) {
                                    if ($Room_Type==$exexrtypevalue) {
                                      $extrabedAmount[$i][$key17][] =  $value15->amount;
                                      $exrooms[$i][$key17][] = $key17+1;
                                      $extrabedType[$i][$key17][] =  'Adult Extrabed';
                                    }
                                  }
                            } else {
                              if ($value15->ChildAmount!=0 && $value15->ChildAmount!="") {
                                  if ($value15->ChildAgeFrom <= $value18 && $value15->ChildAgeTo >= $value18) {
                                    $extrabedAmount[$i][$key17][$key18] =  $value15->ChildAmount;
                                    $extrabedType[$i][$key17][$key18] =  'Child Extrabed';
                                    $exrooms[$i][$key17][$key18] = $key17+1;
                                  }
                              } else {
                                $boardalt[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board IN ('".$implodeboardRequest."')")->result();
                                if (count($boardalt[$i])!=0) {
                                  foreach ($boardalt[$i] as $key21 => $value21) {
                                    if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
                                        $explodeRType = explode(",", $value21->roomType);
                                        foreach ($explodeRType as $exrtypekey => $exrtypevalue) {
                                          if ($Room_Type==$exrtypevalue) {
                                            $extrabedAmount[$i][$key17][$key18] =  $value21->amount;
                                            $exrooms[$i][$key17][$key18] = $key17+1;
                                            $extrabedType[$i][$key17][$key18] =  'Child '.$value21->board;
                                          }
                                        }
                                    }
                                    
                                  }
                                }
                              } 

                            }
                        }
                        
                      }

                    // }
                    if ($value7 > $standard_capacity) {
                      $explodeexRType = explode(",", $value15->roomType);
                      foreach ($explodeexRType as $exexrtypekey => $exexrtypevalue) {
                        if ($Room_Type==$exexrtypevalue) {
                          $extrabedAmount[$i][$key17][] =  $value15->amount;
                          $exrooms[$i][$key17][] = $key17+1;
                          $extrabedType[$i][$key17][] =  'Adult Extrabed';
                        }
                      }
                    }
                    // echo $request['Child'][$key17];
                    // echo "<BR>";

                  }
                 }
            }
          }

          /* Board wise supplement check start */
            $boardSp[$i] = array();
            if($contract_board=="HB") {
              $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Half Board' AND FIND_IN_SET('".$Room_Type."', IFNULL(roomType,'')) > 0")->result();
            } else if($contract_board=="FB") {
              $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Full Board' AND FIND_IN_SET('".$Room_Type."', IFNULL(roomType,'')) > 0")->result();
            }

            if (count($boardSp[$i])!=0) {
              foreach ($boardSp[$i] as $key21 => $value21) {
                foreach ($request['reqadults'] as $key17 => $value17) {
                  if (($value17+$request['reqChild'][$key17]) > $standard_capacity) {
                    if (isset($request['reqroom'.($key17+1).'-childAge'])) {
                      foreach ($request['reqroom'.($key17+1).'-childAge'] as $key18 => $value18) {
                        if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
                          if (round($value21->amount)!=0) {
                            $extrabedAmount[$i][$key17][] =  $value21->amount;
                            $extrabedType[$i][$key17][] =  'Child '.$value21->board;
                          }
                        }
                      }
                    }
                  }
                  if ($value21->startAge >= 18) {
                    if (round($value21->amount)!=0) {
                      $extrabedAmount[$i][$key17][] =  $value21->amount;
                      $extrabedType[$i][$key17][] =  'Adult '.$value21->board;
                    }
                  }
                }
              }
            }

        /* Board wise supplement check end */
         

          if (isset($extrabedAmount[$i])) {
            $Texamount[$i] = array();
            foreach ($extrabedAmount[$i] as $Texamkey => $Texam) {
                $Texamount[$i][] = array_sum($Texam);
            }
            $extraBedtotal[$i] = array_sum($Texamount[$i]);
          }
        }
        if (count($extraBedtotal)!=0) {
          $return['date'] = $date;
          $return['extrabedAmount'] = $extraBedtotal;
          $return['extrabedType'] = $extrabedType;
          $return['RwextrabedAmount'] = $extrabedAmount;
          $return['Exrooms'] = $exrooms;
          $return['count'] = count($extraBedtotal);
        } else {
          $return['count'] = 0;
        }
        return $return;
    }
  public function AddPaymentConfirmExtrabed($date,$amount,$bookId,$rooms,$rwamount,$type){
    $data= array(
                  'date'   =>   $date,
                  'amount' =>   $amount,
                  'rooms' =>   $rooms,
                  'Exrwamount' =>   $rwamount,
                  'Type' =>   $type,
                  'bookId' =>   $bookId,
                );

    $this->db->insert('bookingextrabed',$data);
    return true;
  }
  public function getExtrabedDetails($book_id){
    $this->db->select('*');
    $this->db->from('bookingextrabed');
    $this->db->where('bookID',$book_id);
    $query = $this->db->get();
    return $query->result();

  }
  public function refundablecheck($contract_id) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('contract_id',$contract_id);
    $query = $this->db->get()->result();
    if ($query[0]->nonRefundable!=1) {
      return true;
    } else {
      return false;
    }
  }
  public function additionalfoodrequest($request,$boardRequest) {
    $adultBoardAmount = array();
    $childBoardAmount = array();
    $childarrayBoardSumData = array();
    $bsCount = array();
    $BoardsupplementType = array();
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('contract_id',$request['contract_id']);
    $query1 = $this->db->get()->result();
    $max_child_age = $query1[0]->max_child_age;

    $start_date = $request['Check_in'];
    $end_date = $request['Check_out'];
    $checkin_date=date_create($start_date);
    $checkout_date=date_create($end_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i < $tot_days; $i++) {
      $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
      $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND board = '".$boardRequest."' ")->result();
      foreach ($boardSplmntCheck[$i] as $key7 => $value7) {

        $explodeBoardroomtype[$key7] = explode(",", $value7->roomType);
            
        foreach ($explodeBoardroomtype[$key7] as $key6 => $value6) {
          if ($value6==$request['room_id']) {
              $BoardsupplementType[$i] = $value7->board;
          }
        }
      }
    }
    if (count($BoardsupplementType)!=0) {
      return true;
    } else {
      return false;
    }
  }
  public function contractBoardCheck($contract_id) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('contract_id',$contract_id);
    $query = $this->db->get()->result();
    return $query['0']->board;
  }
  public function get_CancellationRefund_contract($request) {
    $refund= $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$request['contract_id']."'")->result();
    return $refund;
    
  }
  public function supplementcheck($request) {
    // print_r($request);

    $revenue_markup = revenue_markup($_REQUEST['hotel_id'],$_REQUEST['contract_id'],$this->session->userdata('agent_id'));
    $agent_markup = mark_up_get()+general_mark_up_get();
    if ($revenue_markup!=0) {
      $agent_markup = mark_up_get();
    }
    $data = array();
    $data1 = array();
    $data2 = array();
    $adultBoardAmount = array();
    $childBoardAmount[] = array();
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('contract_id',$request['contract_id']);
    $query1 = $this->db->get()->result();
    $max_child_age = $query1[0]->max_child_age;
    $contract_markup = $query1[0]->markup;
    $total_markup = $agent_markup+$contract_markup;


    $start_date = $request['Check_in'];
    $end_date = $request['Check_out'];
    $checkin_date=date_create($start_date);
    $checkout_date=date_create($end_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i < $tot_days; $i++) {
        $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
        if(isset($request[$date[$i]])) {
        $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND board = '".$request['supplementType']."' ")->result();
        if (count($boardSplmntCheck[$i])!=0) {
          $SupplementAvailDate[] = $date[$i];
        }
        foreach ($boardSplmntCheck[$i] as $key7 => $value7) {
          $explodeBoardroomtype[$key7] = explode(",", $value7->roomType);
          foreach ($explodeBoardroomtype[$key7] as $key6 => $value6) {
            if ($value6==$request['room_id']) {
              if ($max_child_age<$value7->startAge || $max_child_age<$value7->finalAge) {
                $adultBoardAmount[$i] = $value7->amount;

                for ($q=0; $q <= count($request['splAdults']); $q++) { 
                  if (isset($request['splAdults'][$q]) && isset($request['splAdultsCheck'][$q])) {
                    $data['adults']['date'][$i] = $date[$i];
                    $data['adults']['adultAmount'][$i][$q+1] = $value7->amount*$request['splAdults'][$q];
                  }
                }

                
              }
              for ($j=1; $j <= count($request['splAdults']); $j++) { 
                if (isset($request['splRoom'.$j.'-ChildAge'])) {
                  foreach ($request['splRoom'.$j.'-ChildAge'] as $key4 => $value4) {
                    if ($value7->startAge <= $value4 && $value7->finalAge >= $value4) {
                      $childBoardAmount[$i]['room'.$j.'-child'.($key4).'Age-rate']= $value7->amount;
                      if (isset($request['room'.$j.'-child'.($key4).'Age-rateCheck'])) {
                        $data['childs']['date'][$i] = $date[$i];
                        $data['childs']['childAmount'][$i][$j][$key4] = $value7->amount;
                      }
                    } 
                  }

                }

              }
            }
          }
        }
      }
    }
    foreach ($childBoardAmount as $reqChildkey => $reqChildvalue) {
      foreach ($reqChildvalue as $reqChildkey1 => $reqChildvalue1) {
          if(isset($data1[$reqChildkey1])) {
            $data1[$reqChildkey1]+= ($reqChildvalue1*$total_markup)/100+$reqChildvalue1;
          } else {
            $data1[$reqChildkey1] = ($reqChildvalue1*$total_markup)/100+$reqChildvalue1;
          }
          if (isset($request[$reqChildkey1."Check"])) {
            if(isset($data2[$reqChildkey1])) {
              $data2[$reqChildkey1]+= ($reqChildvalue1*$total_markup)/100+$reqChildvalue1;
            } else {
              $data2[$reqChildkey1] = ($reqChildvalue1*$total_markup)/100+$reqChildvalue1;
            }
          }
      }
      
    }
    $totChildAmount = array_sum($data2);
    $data['child'] = $data1;
    $totAdultAmount = array();
    foreach ($request['splAdults'] as $reqAdultkey => $reqAdultvalue) {
      $data['adult']['room'.($reqAdultkey+1).'-adult-rate'] = (array_sum($adultBoardAmount)*$reqAdultvalue*$total_markup)/100+(array_sum($adultBoardAmount)*$reqAdultvalue);
      if (isset($request['splAdultsCheck'][$reqAdultkey])) {
        $totAdultAmount[] = (array_sum($adultBoardAmount)*$reqAdultvalue*$total_markup)/100+(array_sum($adultBoardAmount)*$reqAdultvalue);
      }
    }
    // $data['child'] = $data1;
    // print_r($request);
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    // print_r($data);
    // exit();

    $data['totAmount'] = ceil(array_sum($totAdultAmount)+$totChildAmount);
    return $data;
  }
  public function supplementConfirm($request,$Bookdate) {
    // print_r($request);
    if (isset($request['mark_up']) && $request['mark_up']!="") {
      $agent_markup = $request['mark_up']+mark_up_get()+general_mark_up_get();
    } else {
      $agent_markup = mark_up_get()+general_mark_up_get();
    } 

    $data = array();
    $data1 = array();
    $data2 = array();
    $adultBoardAmount = array();
    $childBoardAmount = array();
    $childBoardAge = array();
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('contract_id',$request['contract_id']);
    $query1 = $this->db->get()->result();
    $max_child_age = $query1[0]->max_child_age;
    $contract_markup = $query1[0]->markup;
    $total_markup = $agent_markup+$contract_markup;

    $boardSplmntCheck = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$Bookdate."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND board = '".$request['supplementType']."' ")->result();
    if (count($boardSplmntCheck)!=0) {
      foreach ($boardSplmntCheck as $key7 => $value7) {
        $explodeBoardroomtype[$key7] = explode(",", $value7->roomType);
        foreach ($explodeBoardroomtype[$key7] as $key6 => $value6) {
          if ($value6==$request['room_id']) {
            if ($max_child_age<$value7->startAge || $max_child_age<$value7->finalAge) {
              $adultBoardAmount = $value7->amount;
              for ($q=0; $q <= count($request['splAdults']); $q++) { 
                  if (isset($request['splAdults'][$q]) && isset($request['splAdultsCheck'][$q])) {
                    $data['adults']['adultAmount'][$q+1] = $value7->amount*$request['splAdults'][$q];
                    $data['adults']['rooms'][$q+1] = $q+1;
                  }
                }
            }
            for ($j=1; $j <= count($request['splAdults']); $j++) { 
              if (isset($request['splRoom'.$j.'-ChildAge'])) {
                foreach ($request['splRoom'.$j.'-ChildAge'] as $key4 => $value4) {
                  if ($value7->startAge <= $value4 && $value7->finalAge >= $value4) {
                    if (isset($request['room'.$j.'-child'.($key4).'Age-rateCheck'])) {
                      $childBoardAmount[]= $value7->amount;
                      $childBoardAge[]= ($value7->startAge."-".$value7->finalAge);
                      if (isset($request['room'.$j.'-child'.($key4).'Age-rateCheck'])) {
                        $data['childs']['rooms'][$j] = $j;
                        $data['childs']['childAmount'][$j][$key4] = $value7->amount;
                      }
                    }
                  } 
                }

              }

            }
          }
        }
        
      }
      $adults_count= 0;
      foreach ($request['splAdults'] as $reqAdultkey => $reqAdultvalue) {
        if (isset($request['splAdultsCheck'][$reqAdultkey])) {
          $adults_count+= $reqAdultvalue;
        }
      }
      
      $data['adultsCount'] = $adults_count;
      $data['adultsAmount'] = $adultBoardAmount;
      $data['ChildAmount'] = implode(",", $childBoardAmount);
      $data['ChildAge'] = implode(",", $childBoardAge);
      $data['totalAmount'] = ($adultBoardAmount*$adults_count)+array_sum($childBoardAmount);
    } else {
      $data = 0;
    }

    return $data;
  }
  public function get_CancellationPolicy_contractConfirm($request) {
      $refund= $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$request['contract_id']."' AND nonRefundable = 1")->result();
      if (count($refund)!=0) {
        $data[0]['msg'] = "This booking is Nonrefundable";
        $data[0]['percentage'] = 100;
        $data[0]['daysInAdvance'] = 0;
        $data[0]['application'] = 'NON REFUNDABLE';
        $data[0]['daysFrom'] = '365';
        $data[0]['daysTo'] = '0';
      } else {

        $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
        $data = array();
        $checkin_date=date_create($request['Check_in']);
        $checkout_date=date_create($request['Check_out']);
        $no_of_days=date_diff($checkin_date,$checkout_date);
        $tot_days = $no_of_days->format("%a");

        $start=date_create(date('m/d/Y'));
        $end=date_create($request['Check_in']);
        $nod=date_diff($start,$end);
        $tot_days1 = $nod->format("%a");

        for($i = 0; $i < $tot_days; $i++) {
          $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
          $CancellationPolicyCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_cancellationfee WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."' AND daysTo <= '".$tot_days1."' order by daysTo asc")->result();
          if (count($CancellationPolicyCheck[$i])!=0) {
            foreach ($CancellationPolicyCheck[$i] as $key => $value) {
                $exploderoomType[$key] = explode(",", $value->roomType);
                foreach ($exploderoomType[$key] as $key1 => $value1) {
                  if ($value1==$roomType[0]->id) {
                      if ($value->daysFrom==0) {
                        $daysInAdvance = 'your check-in date';
                      } else if($value->daysFrom==1) {
                        $daysInAdvance = 'within 24 hours of your check-in';
                      } else {
                        $daysInAdvance = 'within '.$value->daysFrom.' days of your check-in';
                      }
                      $data[$key]['daysFrom'] = $value->daysFrom;
                      $data[$key]['daysTo'] = $value->daysTo;
                      $data[$key]['percentage'] = $value->cancellationPercentage;
                      $data[$key]['application'] = $value->application;
                      if ($value->application=="FIRST NIGHT") {
                        $data[$key]['msg'] = '<span>
                                   If you cancel '.$daysInAdvance.',you will pay '.$value->cancellationPercentage.'% of one night stay with supplementary charges no matter the number of stay days.
                                </span>';
                      } else if ($value->application=="STAY") {
                          $data[$key]['msg'] = '<span>
                                      If you cancel '.$daysInAdvance.', you will pay '.$value->cancellationPercentage.'% of the booking amount.
                                </span>';
                      } else {
                        $data[$key]['msg'] = '<span>
                                   If you cancel '.$daysInAdvance.',  Cancellation charge is free .
                              </span>';
                      }
                  }
                }
            }
          }
        }
        

      }
      return $data;
    }
    public function get_cancellationamountCancelPeriod($request,$day) {
      return $this->db->query('SELECT * FROM hotel_tbl_bookcancellationpolicy WHERE bookingId = '.$request.' AND daysInAdvance = (SELECT MIN(daysInAdvance) FROM hotel_tbl_bookcancellationpolicy WHERE bookingId = '.$request.' AND daysInAdvance >= '.$day.')')->result();
    }
    public function roomAvailability($room_id,$start_date,$end_date,$contract_id,$hotel_id) {
      $bookedCount = all_booked_room_ajax($room_id,$start_date,$end_date,$contract_id);

      $linkedRoomAllotment = 0;
      $checkin_date=date_create($start_date);
      $checkout_date=date_create($end_date);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");
      for($i = 0; $i < $tot_days; $i++) {
          $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
      }
      $implode = implode("','",$date);

      $this->db->select('allotement,linked_to_room_type');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('hotel_id',$hotel_id);
      $this->db->where('id',$room_id);
      $query1=$this->db->get();
      $result1 = $query1->result();

      if ($result1[0]->linked_to_room_type!="" && $result1[0]->linked_to_room_type!=Null) {
        $this->db->select('allotement');
        $this->db->from('hotel_tbl_allotement');
        $this->db->where('hotel_id',$hotel_id);
        $this->db->where('room_id',$result1[0]->linked_to_room_type);
        $this->db->where_in('allotement_date',$implode);
        $this->db->where('contract_id',$contract_id);
        $query3=$this->db->get();
        $result3 = $query3->result();
        if (count($result3)!=0) {
          $linkedRoomAllotment = $result3[0]->allotement;
        } 
      }

      $this->db->select('*');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('hotel_id',$hotel_id);
      $this->db->where('contract_id',$contract_id);
      $linkedcontract=$this->db->get()->result();
      if ($linkedcontract[0]->contract_type=="Sub") {
        $contract_id = "CON0".$linkedcontract[0]->linkedContract;
      }
      $this->db->select('allotement');
      $this->db->from('hotel_tbl_allotement');
      $this->db->where('hotel_id',$hotel_id);
      $this->db->where('room_id',$room_id);
      $this->db->where_in('allotement_date',$implode);
      $this->db->where('contract_id',$contract_id);
      $query=$this->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $allotement = $result[0]->allotement;
      } else {
        $allotement = $result1[0]->allotement;
      }
      return ($allotement+$linkedRoomAllotment)-$bookedCount;
    }
    public function get_CancellationPolicy_tableFlow($request) {
      $refund= $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$request['contract_id']."' AND nonRefundable = 1")->result();
      $checkin_date=date_create($_REQUEST['Check_in']);
      $checkout_date=date_create($_REQUEST['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a");

      $disNRFVal = '';

      for ($i=0; $i < $tot_days ; $i++) {
        $dateOut = date('Y-m-d', strtotime($_REQUEST['Check_in']. ' + '.$i.'  days'));
        $disNRF[$i] = DateWisediscountNonRefundable($dateOut,$request['hotel_id'],$request['room_id'],$request['contract_id'],'Room');
        if ($disNRF[$i]['NRF']==1) {
          $disNRFVal = $disNRF[$i]['discount'];
        }
      }
      
  
      if (count($refund)!=0) {
        $data[0]['description'] = "This booking is Nonrefundable";
        $data[0]['after'] = "";
        $data[0]['before'] = "";
        $data[0]['percentage'] = "";
        $data[0]['application'] = "Nonrefundable";
      } else if($disNRFVal!='') {
        $data[0]['description'] = "This booking is Nonrefundable";
        $data[0]['after'] = '';
        $data[0]['before'] = '';
        $data[0]['percentage'] = "";
        $data[0]['application'] = "Nonrefundable";
      } else {
        $roomType = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$request['room_id']."'")->result();
        $data = array();
        $checkin_date=date_create($request['Check_in']);
        $checkout_date=date_create($request['Check_out']);
        $no_of_days=date_diff($checkin_date,$checkout_date);
        $tot_days = $no_of_days->format("%a");


        $start=date_create(date('m/d/Y'));
        $end=date_create($request['Check_in']);
        $nod=date_diff($start,$end);
        $tot_days1 = $nod->format("%a");

        for($i = 0; $i < $tot_days; $i++) {
          $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
          $CancellationPolicyCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_cancellationfee WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."'  AND hotel_id = '".$request['hotel_id']."' AND daysTo <= '".$tot_days1."' order by daysTo asc")->result();
          if (count($CancellationPolicyCheck[$i])!=0) {
            foreach ($CancellationPolicyCheck[$i] as $key => $value) {
                $exploderoomType[$key] = explode(",", $value->roomType);
                foreach ($exploderoomType[$key] as $key1 => $value1) {

                  
                  if ($value1==$roomType[0]->id) {
                      $after = date('Y-m-d', strtotime('-'.$value->daysFrom.' days', strtotime($request['Check_in'])));
                      $before = date('Y-m-d', strtotime('-'.$value->daysTo.' days', strtotime($request['Check_in'])));
                      if ($after < date('Y-m-d')) {
                        $data[$key]['after'] = date('d/m/Y');
                      } else {
                        $data[$key]['after'] = date('d/m/Y', strtotime('-'.$value->daysFrom.' days', strtotime($request['Check_in'])));
                      }
                      if ($before < date('Y-m-d')) {
                        $data[$key]['before'] = date('d/m/Y');
                      } else {
                        $data[$key]['before'] = date('d/m/Y', strtotime('-'.$value->daysTo.' days', strtotime($request['Check_in'])));
                      }

                      if ($value->daysFrom==0) {
                        $daysInAdvance = 'your check-in date';
                      } else if($value->daysFrom==1) {
                        $daysInAdvance = 'within 24 hours of your check-in';
                      } else {
                        $daysInAdvance = 'within '.$value->daysFrom.' days of your check-in';
                      }

                      
                      $data[$key]['percentage'] = $value->cancellationPercentage;
                          $data[$key]['application'] = $value->application;

                      if ($value->application=="FIRST NIGHT") {
                        $data[$key]['description'] = '<span>
                                   If you cancel '.$daysInAdvance.',you will pay '.$value->cancellationPercentage.'% of one night stay with supplementary charges no matter the number of stay days.
                                </span>';

                      } else if ($value->application=="STAY") {

                          $data[$key]['description'] = '<span>
                                      If you cancel '.$daysInAdvance.', you will pay '.$value->cancellationPercentage.'% of the booking amount.
                                </span>';
                      } else {
                        $data[$key]['description'] = '<span>
                                   If you cancel '.$daysInAdvance.',  Cancellation charge is free .
                              </span>';
                      }
                  }
                }
            }
          }
        }
        

      }
      return $data;
    }
    public function offlineRequestList($filter) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_offlinerequest');
      $this->db->where('AgentId',$this->session->userdata('agent_id'));
      $this->db->where('bookingFlg',$filter);
      $query = $this->db->get();
      return $query;
    }
    public function OfflineRequestSubmit($request) {
      
      $Room1ChildAge = '';
      if (isset($request['room1-childAge'])) {
          $Room1ChildAge = implode(",", $request['room1-childAge']);
      }
      $Room2ChildAge = '';
      if (isset($request['room2-childAge'])) {
          $Room2ChildAge = implode(",", $request['room2-childAge']);
      }
      $Room3ChildAge = '';
      if (isset($request['room3-childAge'])) {
          $Room3ChildAge = implode(",", $request['room3-childAge']);
      }
      $Room4ChildAge = '';
      if (isset($request['room4-childAge'])) {
          $Room4ChildAge = implode(",", $request['room4-childAge']);
      }
      $Room5ChildAge = '';
      if (isset($request['room5-childAge'])) {
          $Room5ChildAge = implode(",", $request['room5-childAge']);
      }
      $Room6ChildAge = '';
      if (isset($request['room6-childAge'])) {
          $Room6ChildAge = implode(",", $request['room6-childAge']);
      }
      $Room7ChildAge = '';
      if (isset($request['room7-childAge'])) {
          $Room7ChildAge = implode(",", $request['room7-childAge']);
      }
      $Room8ChildAge = '';
      if (isset($request['room8-childAge'])) {
          $Room8ChildAge = implode(",", $request['room8-childAge']);
      }
      $Room9ChildAge = '';
      if (isset($request['room9-childAge'])) {
          $Room9ChildAge = implode(",", $request['room9-childAge']);
      }
      $Room10ChildAge = '';
      if (isset($request['room10-childAge'])) {
          $Room10ChildAge = implode(",", $request['room10-childAge']);
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


      $adults = implode(",", $request['adults']);
      $Child = implode(",", $request['Child']);
      $data =  array(
                    'hotel_name' => $request['hotel_name'], 
                    'Destination' => $request['Destination'], 
                    'check_in' => $request['CheckIn'], 
                    'check_out' => $request['CheckOut'], 
                    'no_of_rooms' => $request['noOfRooms'], 
                    'Nationality' => $_REQUEST['nationality'],
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
                    'SpecialRequest' => $request['SpecialRequest'], 
                    'budget' => $request['budget'],
                    'createdDate' => date('Y-m-d'),
                    'AgentId' => $this->session->userdata('agent_id'),
                );
   
      $this->db->insert('hotel_tbl_offlinerequest',$data);
      return $this->db->insert_id();

    }
    public function get_cancellation_terms($request) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->where('hotel_tbl_bookcancellationpolicy.bookingId',$request);
      $this->db->order_by('hotel_tbl_bookcancellationpolicy.daysInAdvance','asc');
      $query=$this->db->get();
      return $query->result();
    }
    public function bankDetails() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_general_settings');
      $this->db->where('id',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function agent_Offlinebooking_details($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_offlinerequest');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function TBOBookingConfirm($agent_id,$ClientReferenceNumber,$BookingId,$TripId,$ConfirmationNo,$BookingStatus,$hotel_name,$RoomTypeName,$Check_in,$Check_out,$total_amount,$no_of_days,$no_of_rooms,$Hotel_id,$PriceChange,$admin_markup) {
      $data = array(
                    'XMLProvider' => 'TBO',
                    'agent_id'    => $agent_id,
                    'ClientReferenceNumber'    => $ClientReferenceNumber,
                    'BookingId'    => $BookingId,
                    'TripId'    => $TripId,
                    'ConfirmationNo' => $ConfirmationNo,
                    'BookingStatus' => $BookingStatus,
                    'hotel_name' => $hotel_name,
                    'RoomTypeName' => $RoomTypeName,
                    'Check_in' => $Check_in,
                    'Check_out' => $Check_out,
                    'total_amount' => $total_amount,
                    'no_of_days' => $no_of_days,
                    'no_of_rooms' => $no_of_rooms,
                    'Hotel_id' => $Hotel_id,
                    'agent_markup' =>  mark_up_get(),
                    'admin_markup' =>  $admin_markup,
                    'CreatedDate'    => date('Y-m-d H:mm'),
                    'CreatedBy'    => $agent_id,
                    'Bookingdate'    => date('m/d/Y'),
                    'PriceChange' => $PriceChange,
      );
      $this->db->insert('xml_hotel_booking',$data);
      $id = $this->db->insert_id();
      $description = 'New hotel booking added [BookingID: '.$BookingId.' ,HotelID: '.$Hotel_id.' ,Provider: TBO]';
      AgentlogActivity($description);
      xmlbookingMailNotification($id);
      return $id;
    }
    public function xml_booking_list($filter) {
      $this->db->select('*');
      $this->db->from('xml_hotel_booking');
      $this->db->where('bookingFlg',$filter);
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $this->db->order_by('id','desc');
      $query = $this->db->get();
      return $query;
    }
    public function add_payment_records($request,$bookingid) {
      $data = array('bookingId' => $bookingid,
                    'amount' => $request['amount'],
                    'currency' => $request['currency'],
                    'transactionId' => $request['transid'],
                    'orderNumber' => $request['ordernumber'],
                    'method' => $request['gateway'],
                    'date' => date('Y-m-d'),
                    'agentId' => $this->session->userdata('agent_id'),
                    'provider' => 'Otelseasy');
      $this->db->insert('tbl_onlinepaymentrecords',$data);
      return true;
    }
    public function add_xml_payment_records($request,$bookingid) {
      $data = array('bookingId' => $bookingid,
                    'amount' => $request['amount'],
                    'currency' => $request['currency'],
                    'transactionId' => $request['transid'],
                    'orderNumber' => $request['ordernumber'],
                    'method' => $request['gateway'],
                    'date' => date('Y-m-d'),
                    'agentId' => $this->session->userdata('agent_id'),
                    'provider' => 'TBO');
      $this->db->insert('tbl_onlinepaymentrecords',$data);
      return true;
    }
    public function hotelDetails($hotel_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotels');
      $this->db->where('id',$hotel_id);
      $query = $this->db->get()->result();
      return $query;
    }
}
