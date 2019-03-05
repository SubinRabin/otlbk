<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function search_list_count($data,$start_price,$end_price,$tempHotels) {  
    $this->db->select('count(id) as count');
    $this->db->from('hotel_tbl_hotels');
    if (count($tempHotels)==0) {
      $tempHotels = array('');
    }
    $this->db->where_in('id',$tempHotels);
    $this->db->where('delflg',1);

    if (isset($data['guest_rating']) && $data['guest_rating']!="") {
      $this->db->where('ceil_starsrating',$data["guest_rating"]);
    }
    $rate1 = "";
    $rate2 = "";
    $rate3 = "";
    $rate4 = "";
    $rate5 = "";
    $rate10 = "";
    if (isset($data["rating5"])) {
      $rate5 = "5";
    }
    if (isset($data["rating4"])) {
      $rate4 = "4";
    }
    if (isset($data["rating3"])) {
      $rate3 = "3";
    }
    if (isset($data["rating2"])) {
      $rate2 = "2";
    }
    if (isset($data["rating1"])) {
      $rate1 = "1";
    }
    if (isset($data["rating10"])) {
      $rate10 = "10";
    }
    if (isset($data["rating5"]) || isset($data["rating4"]) || isset($data["rating3"]) || isset($data["rating2"]) || isset($data["rating1"]) || isset($data["rating10"])) {
      $where = "(rating = '$rate1' OR rating = '$rate2' OR rating = '$rate3' OR rating = '$rate4' OR rating = '$rate5' OR rating = '$rate10')";
      $this->db->where($where);
    }
    if (isset($data['preference'])) {
      foreach ($data['preference'] as $key => $value) {
        $this->db->where('FIND_IN_SET("'.$value.'", IFNULL(hotel_facilities,"")) > 0');
      }
    }
    // $this->db->group_by('id');
    $query=$this->db->get()->result();
    return $query[0]->count;
  }
  public function search_list($limit, $start, $data,$start_price,$end_price,$tempHotels) { 
    $this->db->select('hotel_tbl_hotels.hotel_name,hotel_tbl_hotels.hotel_description,hotel_tbl_hotels.hotel_facilities,
      hotel_tbl_hotels.promoteList,hotel_tbl_hotels.rating,hotel_tbl_hotels.Image1,hotel_tbl_hotels.reviews,hotel_tbl_hotels.starsrating,hotel_tbl_hotels.id as hotel_id,hotel_tbl_hotel_room_type.id as BookroomId');
    $this->db->from('hotel_tbl_hotel_room_type');
    $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_hotel_room_type.hotel_id', 'left');
    $this->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
    if (count($tempHotels)==0) {
      $tempHotels = array('');
    }
    $this->db->where_in('hotel_tbl_hotels.id',$tempHotels);
    $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
    $this->db->where('hotel_tbl_hotels.delflg',1);

    if (isset($data['guest_rating']) && $data['guest_rating']!="") {
      $this->db->where('hotel_tbl_hotels.ceil_starsrating',$data["guest_rating"]);
    }
    $rate1 = "";
    $rate2 = "";
    $rate3 = "";
    $rate4 = "";
    $rate5 = "";
    $rate10 = "";
    if (isset($data["rating5"])) {
      $rate5 = "5";
    }
    if (isset($data["rating4"])) {
      $rate4 = "4";
    }
    if (isset($data["rating3"])) {
      $rate3 = "3";
    }
    if (isset($data["rating2"])) {
      $rate2 = "2";
    }
    if (isset($data["rating1"])) {
      $rate1 = "1";
    }
    if (isset($data["rating10"])) {
      $rate10 = "10";
    }
    if (isset($data["rating5"]) || isset($data["rating4"]) || isset($data["rating3"]) || isset($data["rating2"]) || isset($data["rating1"]) || isset($data["rating10"])) {
      $where = "(hotel_tbl_hotels.rating = '$rate1' OR hotel_tbl_hotels.rating = '$rate2' OR hotel_tbl_hotels.rating = '$rate3' OR hotel_tbl_hotels.rating = '$rate4' OR hotel_tbl_hotels.rating = '$rate5' OR hotel_tbl_hotels.rating = '$rate10')";
      $this->db->where($where);
    }
    if (isset($data['preference'])) {
      foreach ($data['preference'] as $key => $value) {
        $this->db->where('FIND_IN_SET("'.$value.'", IFNULL(hotel_tbl_hotels.hotel_facilities,"")) > 0');
      }
    }

    if (isset($data['name_order']) && isset($data['price_order'])) {
      if ($data['name_order']=="1") {
        $name_order = 'hotel_tbl_hotels.hotel_name asc';
      } else {
        $name_order = 'hotel_tbl_hotels.hotel_name desc';
      }
      $order_by = 'hotel_tbl_hotels.promoteList  desc,'.$name_order.'';
    } else if(isset($data['name_order']) || !isset($data['price_order'])) {
      if (isset($data['name_order']) && $data['name_order']=="1") {
        $name_order = 'hotel_tbl_hotels.hotel_name asc';
      } else {
        $name_order = 'hotel_tbl_hotels.hotel_name desc';
      }
      $order_by = 'hotel_tbl_hotels.promoteList  desc,'.$name_order.',';
    } else if(!isset($data['name_order']) || isset($data['price_order'])) {
      $order_by = 'hotel_tbl_hotels.promoteList  desc';
    } else {
      $order_by = 'hotel_tbl_hotels.promoteList  desc';
    }
    $this->db->order_by($order_by);
    $this->db->group_by('hotel_tbl_hotels.id');
    $this->db->limit($limit, $start);
    $query=$this->db->get();
    return $query->result();
  }
  public function temporarySearchProcess($data) {
    $OtelseasyHotels = array();
    if ($this->session->userdata('agent_id')!=104) {
    $tempHotels = array();

    $start_date = $data['Check_in'];
    $end_date = $data['Check_out'];
    $first_date = strtotime($start_date);
    $second_date = strtotime($end_date);
    $offset = $second_date-$first_date; 
    $result = array();
    $checkin_date=date_create($data['Check_in']);
    $checkout_date=date_create($data['Check_out']);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");


    $searchedHotels = $this->List_Model->searchedHotels($data);

    $searchHotel_id = array();
    if (count($searchedHotels)!=0) {
      foreach ($searchedHotels as $key85 => $value85) {
        $searchHotel_id[$key85] = $value85->id;
      }
    }

    $searchHotel_id = implode("','", array_unique($searchHotel_id));

    $ignore = array();
    /*contract check start*/
    $contractHotelId = array('');
    $contractConId = array('');
    $outData = array();
    $arrResult = array();
    $gsData = array();
    $mangsData = array();
    $extrabedAmount = array();
    $ot = $this->db->query("SELECT contract_id,hotel_id,contract_type,linkedContract FROM hotel_tbl_contract a WHERE not exists (select 1 from  hotel_agent_permission b where   a.contract_id = b.contract_id and FIND_IN_SET('".$this->session->userdata('agent_id')."', IFNULL(permission,'')) > 0) AND FIND_IN_SET('".$data['nationality']."', IFNULL(nationalityPermission,'')) = 0
     AND not exists (select 1 from hotel_country_permission c where a.contract_id = c.contract_id and FIND_IN_SET('".substr($this->session->userdata('currency'),0,2)."', IFNULL(permission,'')) > 0) AND hotel_id IN ('".$searchHotel_id."') AND from_date <= '".date('Y-m-d',strtotime($data['Check_in']))."' AND to_date > '".date('Y-m-d',strtotime($data['Check_in']))."' AND  from_date < '".date('Y-m-d',strtotime($data['Check_out']))."' AND to_date >= '".date('Y-m-d',strtotime($data['Check_out']))."' AND contract_flg  = 1")->result();

    foreach ($ot as $key5 => $value5) {
      if ($value5->contract_type=="Sub") {
        $enablecon = $this->db->query('SELECT id FROM hotel_tbl_contract WHERE contract_id = "CON0'.$value5->linkedContract.'" AND contract_flg = 1')->result();
        if (count($enablecon)!=0) {
          $outData[$key5]['hotel_id'] = $value5->hotel_id;
          $outData[$key5]['contract_id'] = $value5->contract_id;
        }
      } else {
        $outData[$key5]['hotel_id'] = $value5->hotel_id;
        $outData[$key5]['contract_id'] = $value5->contract_id;
      }

    }

    foreach ($outData as $key8 => $value8) {
    // All condition check start
      $contractHotelId[] = $value8['hotel_id'];
      $contractConId[] = $value8['contract_id'];
    // All condition check end
    } 

    /*contract check end*/
    /*Allotment check start*/

    for($i = 0; $i < $tot_days; $i++) {
      $dateAlt[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
    }
    $implode_data = implode("','", $dateAlt);
    $implode_data1 = implode("','", array_unique($contractHotelId));
    $implode_data2 = implode("','", array_unique($contractConId));
    $OtelseasyHotels = $this->db->query("select *,min(TtlPrice) as TotalPrice,min(OrgPrice) as OriginalPrice  from (SELECT a.contract_id, a.hotel_id as HotelCode,b.hotel_name as HotelName,b.location as HotelAddress,concat('".base_url()."uploads/gallery/',a.hotel_id,'/',b.Image1) as HotelPicture,b.hotel_description as HotelDescription,b.rating as Rating,sum(a.amount) as TtlPrice,'".agent_currency()."' as Currency,sum(a.amount) as OrgPrice,' ' as oldPrice,'otelseasy' as DataType,b.rating as RatingImg,b.starsrating as  ReviewImg,reviews as reviews ,'' as BookBtn ,'' as HotelRequest,'' as Inclusion,count(*) as counts FROM hotel_tbl_allotement a 
      INNER JOIN hotel_tbl_hotels b ON b.id = a.hotel_id 
     WHERE a.allotement_date IN ('".$implode_data."') AND (SELECT count(*) FROM hotel_tbl_minimumstay WHERE a.amount !=0 AND a.allotement_date BETWEEN fromDate AND toDate AND contract_id = a.contract_id AND minDay > ".$tot_days.") = 0 AND (SELECT count(*) FROM hotel_tbl_closeout_period WHERE closedDate IN ('".$implode_data."') AND FIND_IN_SET(a.room_id,roomType)>0 AND contract_id = a.contract_id AND hotel_id = a.hotel_id) =0 AND a.hotel_id IN ('".$implode_data1."') AND a.contract_id IN ('".$implode_data2."') AND DATEDIFF(a.allotement_date,'".date('Y-m-d')."') >= a.cut_off  GROUP BY a.hotel_id,a.room_id,a.contract_id Having counts >= ".$tot_days.") m group by HotelCode")->result();
    }
    
    $TBOHotels = array();
    $TBOHotels = $this->xmlrequest($data);
    /*Allotment check end*/
    $return['OtelseasyHotels'] = $OtelseasyHotels;
    $return['TBOHotels'] = $TBOHotels;
    return $return;
  }
  public function searchedHotels($data) {
    $search = '';
    $hotelName = '';
    if (!empty($data['location'])) {
      $str = explode('-',$data['location']);
      if (!isset($str[1])) {
        $str = explode(',',$data['location']);
      }
      $data['location'] = $str[0];
      $search = "a.location LIKE '%".$data['location']."%' OR a.keywords LIKE '%".$data['location']."%' OR a.city LIKE '%".$data['location']."%' OR b.name  = '".$data['location']."' ";
    }
    
    if ($search!='') {
      $search = '('.$search.') AND ';
    }

    if ($data['hotel_name']!="") {
      $hotelName = " hotel_name  LIKE '%".$data['hotel_name']."%' AND ";
    }
    $adults = max($data['adults']);
    $child = max($data['Child']);
    foreach ($data['adults'] as $key77 => $value77) {
      $max_total[] = ($value77+$data['Child'][$key77]);
    }
    $maxTotal = max($max_total);

    $query =  $this->db->query("SELECT a.id FROM hotel_tbl_hotels a INNER JOIN states b ON  b.id = IF(a.state!='',a.state,3798) INNER JOIN hotel_tbl_hotel_room_type c ON c.hotel_id = a.id WHERE ".$search.$hotelName."  a.delflg = 1 and (c.max_total > ".$maxTotal." or c.occupancy > ".$adults." or c.occupancy_child > ".$child.")  and c.delflg = 1")->result();
    return $query;
  }
  public function contract_markup($hotel_id,$contract_id) {  
    $this->db->select('markup');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('contract_id',$contract_id);
    $query = $this->db->get();
    $row_values  = $query->row_array();
    return $row_values['markup'];
  }
  public function get_general_supplement($hotel_id,$contract_id) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_generalsupplement');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('contract_id',$contract_id);
    $query = $this->db->get();
    return $query->result();
  }
  public function single_view($data) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_hotels');
    $this->db->where('id',$data['search_id']);
    $this->db->where('delflg',1);
    $this->db->order_by('id','desc');
    $query=$this->db->get();
    return $query->result();
  }
  public function hotel_facilities_data($id) {
    $this->db->select('hotel_tbl_hotel_facility.* , hotel_tbl_icons.icon_src');
    $this->db->from('hotel_tbl_hotel_facility');
    $this->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_hotel_facility.Icon', 'left');
    $this->db->where('hotel_tbl_hotel_facility.id',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function room_facilities_data($id) {
    $this->db->select('hotel_tbl_room_facility.* , hotel_tbl_icons.icon_src');
    $this->db->from('hotel_tbl_room_facility');
    $this->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_room_facility.Icon', 'left');
    $this->db->where('hotel_tbl_room_facility.id',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function hotel_rooms_data($hotel_id,$room_id=null) {
    $this->db->select('hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.Room_Type as room_type_name');
    $this->db->from('hotel_tbl_hotel_room_type');
    $this->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type', 'left');
    $this->db->where('hotel_tbl_hotel_room_type.hotel_id',$hotel_id);
    if (isset($room_id)) {
      $this->db->where('hotel_tbl_hotel_room_type.id',$room_id);
    }
    $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
    $this->db->order_by('hotel_tbl_hotel_room_type.id','desc');
    $query=$this->db->get();
    return $query->result();
  }
  public function review_add($data) {
    $data= array(
      'Username' =>$data['review_uname'],
      'Evaluation' =>$data['evaluation'],
      'Title' =>$data['title'],
      'Comment' =>$data['comment'],
      'Cleanliness' =>$data['cleanliness'],
      'Room_Comfort' =>$data['room_comfort'],
      'Location' =>$data['location'],
      'Service_Staff' =>$data['service_staff'],
      'Sleep_Quality' =>$data['sleep_quality'],
      'Value_Price' =>$data['value_price'],
      'Hotel_Id' => $_REQUEST['hotel_id'],
      'Created_Date' => date('Y-m-d'),
    );
    $this->db->insert('hotel_tbl_review',$data);
    return true;
  }
  public function review_view($id) {
    $this->db->select('*');
    $this->db->from('hotel_tbl_review');
    $this->db->where('Hotel_Id',$id);
    $this->db->where('delflg',1);
    $this->db->order_by('id','desc');
    $query=$this->db->get();
    return $query->result();
  }
    public function agent_data($id) {//To display the city and country in reviews
      $this->db->select('*');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $this->db->where('delflg',1);
      $this->db->order_by('id','desc');
      $query=$this->db->get();
      return $query->result();
    }
    public function average_ratings($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_review');
      $this->db->where('Hotel_Id',$id);
      $this->db->where('delflg',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function rating_update($id ,$rating,$reviews,$ceil_starsrating) {
      $data= array(
        'starsrating' =>$rating,
        'reviews' =>$reviews,
        'ceil_starsrating' =>$ceil_starsrating,
      );
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_hotels',$data);
      return true;
    }
    public function recommended_count($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_review');
      $this->db->where('Hotel_Id',$id);
      $this->db->where('Evaluation',"Don't recommend");
      $this->db->where('delflg',1);
      $query=$this->db->get();
      return $query->num_rows();
    }
    public function hotel_facilities_list() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_facility');
      $this->db->where('delflg',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function related_hotel_list($city,$id) {
      $this->db->select('*,hotel_tbl_hotel_room_type.id as room_id');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_hotel_room_type.hotel_id', 'left');
      $this->db->where('hotel_tbl_hotels.location LIKE', '%'.$city.'%');
      $this->db->where('hotel_tbl_hotels.id !=',$id);
      $this->db->where('hotel_tbl_hotel_room_type.hotel_id !=',$id);
      $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
      $this->db->where('hotel_tbl_hotels.delflg',1);
      $this->db->order_by('hotel_tbl_hotel_room_type.id','desc');
      $this->db->order_by('hotel_tbl_hotel_room_type.price','asc');
      $this->db->group_by('hotel_tbl_hotels.id');
      $this->db->limit("4");
      $query=$this->db->get();
      return $query->result();
    }
    public function all_booked_room($id,$start_date,$end_date,$contract_id) {
      $LRofcount = $this->List_Model->linkedRoomOverflowCount($id,$start_date,$end_date,$contract_id);
      $lcon_id = array();
      $this->db->select('*');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('contract_id',$contract_id);
      $contractType=$this->db->get()->result();
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
        $this->db->select('*');
        $this->db->from('hotel_tbl_contract');
        $this->db->where('linkedContract',str_replace("CON0","",$contract_id));
        $linkedcontract=$this->db->get()->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
        $this->db->select('*');
        $this->db->from('hotel_tbl_contract');
        $this->db->where('linkedContract',str_replace("CON0","",$contractType[0]->linkedContract));
        $linkedcontract=$this->db->get()->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = "CON0".$contractType[0]->linkedContract;
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 

        // $where = "(check_in BETWEEN '".$start_date."' AND '".$end_date."' OR check_out BETWEEN '".$start_date."' AND '".$end_date."')";
      $where = "check_in <= '".$start_date."' AND check_out > '".$start_date."'";
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      $this->db->where('room_id',$id);
      $this->db->where($where);
      if (count($lcon_id)!=0) {
        $implodeContract = implode("','", $lcon_id);
        $where1 = "contract_id IN ('".$contract_id."','".$implodeContract."')";
        $this->db->where($where1);
      } else {
        $this->db->where('contract_id',$contract_id);
      }
      $this->db->where('booking_flag !=',3);
      $query=$this->db->get();
      if (count($query->result())!=0) {
        foreach ($query->result() as $key => $value) {
          $room_count[] = $value->book_room_count;
        }
        $booking = array_sum($room_count);
      } else {
        $booking = 0;
      }

      return $booking+$LRofcount;
    }
    public function all_closedout_room($id,$contract_id,$data,$room_id)
    {
      $ignore = array();
      $ignoredate = array();
      $start_date = $data['Check_in'];
      $end_date = $data['Check_out'];
      $first_date = strtotime($start_date);
      $second_date = strtotime($end_date);
      $offset = $second_date-$first_date; 
      $result = array();
      $checkin_date=date_create($data['Check_in']);
      $checkout_date=date_create($data['Check_out']);
      $no_of_days=date_diff($checkin_date,$checkout_date);
      $tot_days = $no_of_days->format("%a")+1;

      for($i = 0; $i < floor($offset/24/60/60); $i++) {
        $result['date'][$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
        $query2[$i]=$this->db->query("SELECT roomType,closedDate,hotel_id FROM hotel_tbl_closeout_period WHERE closedDate ='".$result['date'][$i]."' AND hotel_id = '".$id."' AND contract_id = '".$contract_id."' ")->result();
      }
      foreach ($query2 as $key => $value) {
        foreach ($value as $key1 => $value1) {
          $explodeRoomType = explode(",", $value1->roomType);
          foreach ($explodeRoomType as $ERkey => $ERvalue) {
            if ($ERvalue==$room_id) {
              $ignore[] = $value1->hotel_id;
              $ignoredate[] = date('d/m/Y' ,strtotime($value1->closedDate));
            }
          }

        }
      }
      if (count($ignore) != 0) 
      {
        $closedDate = implode(",", $ignoredate);
        foreach ($query2 as $key => $value) {
          if (count($value)!=0) {

            $reason = "Cannot book selected dates (".$closedDate.") due to close out period. Kindly select another date";
            break;
          }
        }
        $data['condition'] = 1;
        $data['reason'] = $reason;
      } else {
        $data['condition'] = 0;
        $data['reason'] ="";
      }
      return  $data;
    }
    public function all_not_booked_room($id,$id2) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('id',$id);
      $this->db->where('hotel_id',$id2);
      $query=$this->db->get();
      return $query->result();
    }
    public function all_booked_room_check($id) {
      $this->db->select('*,hotel_tbl_hotel_room_type.*');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.hotel_id = hotel_tbl_booking.hotel_id', 'left');
      $this->db->where('hotel_tbl_booking.hotel_id',$id);
      $this->db->where('hotel_tbl_booking.booking_flag',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function all_booked_date($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->join('hotel_tbl_booking','hotel_tbl_booking.hotel_id = hotel_tbl_hotel_room_type.hotel_id', 'left');
      $this->db->where('hotel_tbl_booking.hotel_id',$id);
      $this->db->where('hotel_tbl_booking.booking_flag',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function all_room_count($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $final =  $query->result();
      return $final[0]->total_rooms;
    }
    public function all_allotments_checking($id,$hid1,$star,$contract_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_allotement');
      $this->db->where('room_id',$id);
      $this->db->where('hotel_id',$hid1);
      $this->db->where('contract_id',$contract_id);
      $this->db->where('allotement_date',$star);
      $query=$this->db->get();
      return $query->result();
    }
    public function second_allotments_checking($id,$hid1) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotel_room_type');
      $this->db->where('id',$id);
      $this->db->where('hotel_id',$hid1);
      $query=$this->db->get();
      return $query->result();
    }
    public function all_allotment_checking($id,$hid1) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_allotement');
      $this->db->where('room_id',$id);
      $this->db->where('hotel_id',$hid1);
      $query=$this->db->get();
      $out['result'] = $query->result();
      return $out;
    }
    public function room_current_count($room_id,$start_date,$end_date,$contract_id,$adults,$child,$request,$markup,$contract_ajax_id) {
      /*Tax percentage grt from contract start*/

      $request['contract_id']  = $contract_ajax_id;
      if ($contract_ajax_id!="") {
       $contract_id = $contract_ajax_id;
     }

     $this->db->select('linkedContract,contract_type');
     $this->db->from('hotel_tbl_contract');
     $this->db->where('hotel_id',$request['hotel_id']);
     $this->db->where('contract_id',$contract_id);
     $linkedcontract=$this->db->get()->result();
     if ($linkedcontract[0]->contract_type=="Sub") {
      $Lcontract_id = "CON0".$linkedcontract[0]->linkedContract;
    } else {
      $Lcontract_id = $contract_id;
    }

    $this->db->select('tax_percentage,max_child_age,board,nonRefundable');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$request['hotel_id']);
    if ($contract_ajax_id!="") {
      $this->db->where('contract_id',$contract_ajax_id);
    } else {
      $this->db->where('contract_id',$request['contract_id']);
    }
    $query = $this->db->get();
    $row_values  = $query->row_array();
    $tax = $row_values['tax_percentage'];
    $max_child_age = $row_values['max_child_age'];
    

    $contract_board = $row_values['board'];
    $nonRefundable = '';
    if ($row_values['nonRefundable']==1) {
      $nonRefundable = 'Non Refundable';
    }
    /*Tax percentage grt from contract end*/

    /*Standard capacity get from rooms start*/

    $this->db->select('occupancy,occupancy_child,standard_capacity,max_total,linked_to_room_type');
    $this->db->from('hotel_tbl_hotel_room_type');
    $this->db->where('hotel_id',$request['hotel_id']);
    $this->db->where('id',$room_id);
    $Rmquery = $this->db->get();
    $Rmrow_values  = $Rmquery->row_array();
    $occupancyAdult = $Rmrow_values['occupancy'];
    $occupancyChild = $Rmrow_values['occupancy_child'];
    $standard_capacity = $Rmrow_values['standard_capacity'];
    $max_capacity = $Rmrow_values['max_total'];
    /*Standard capacity get from rooms end*/
    $BoardsupplementType = array();
    $adultBoardAmount = array();
    $childBoardAmount = array();
    $childarrayBoardSumData =array();
    $adultAmount = array();
    $childAmount = array();
    $adultAmountPR = array();
    $childAmountPR = array();
    $generalsupplementType  = array();
    $ManadultAmount  = array();
    $ManadultAmountPR = array();
    $MangeneralsupplementforAdults = array();
    $ManchildAmount = array();
    $MangeneralsupplementforChilds = array();
    $MangeneralsupplementType = array();
    $generalsupplementforAdults = array();
    $generalsupplementforChilds = array();
    $extrabedAmount  = array();
    $extrabedType = array();
    
    $adultscount = array_sum($adults);
    $childscount = array_sum($child);
    $roomType = $this->db->query("SELECT id FROM hotel_tbl_hotel_room_type WHERE id = '".$room_id."'")->result();
    $cut_off_date = array();
    $cut_off_msg = "";
    $checkin_date=date_create($start_date);
    $checkout_date=date_create($end_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i < $tot_days; $i++) {
      $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
      if (isset($request['board'])) {
        foreach ($request['board'] as $key5 => $value5) {
          $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = '".$value5."'")->result();
          // print_r("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = '".$value5."'");
          // echo "<br>";


          foreach ($boardSplmntCheck[$i] as $key7 => $value7) {

            $explodeBoardroomtype[$key7] = explode(",", $value7->roomType);

            foreach ($explodeBoardroomtype[$key7] as $key6 => $value6) {

              if ($value6==$roomType[0]->id) {

                    //   $boardsupplementData[$key7] = $value7;
                if ($max_child_age<$value7->startAge || $max_child_age<$value7->finalAge) {

                  $BoardsupplementType[$key5] = $value7->board;

                  $adultBoardAmount[$key5] = $value7->amount;
                }
                      // if($max_child_age >= $value7->finalAge) {

                $childBoardcnt[$i] = array();
                for ($j=1; $j <= count($request['adults']); $j++) { 
                  if (isset($request['room'.$j.'-childAge'])) {
                    foreach ($request['room'.$j.'-childAge'] as $key4 => $value4) {
                      if ($value7->startAge <= $value4 && $value7->finalAge >= $value4) {
                       $childBoardcnt[$i][]= $value4;
                     } 
                   }

                 }

               }
               if (count($childBoardcnt[$i])!=0) {
                $childBoardAmount[$i][] = $value7->amount*count($childBoardcnt[$i]);
              } 
                      // }
            }
          }
        }
      }
    }

    $adultarrayBoardSumData[$i] = array_sum($adultBoardAmount);
    if (isset($childBoardAmount[$i])) {
      $childarrayBoardSumData[$i] = array_sum($childBoardAmount[$i]);
    }
    /*mandatory General Supplement start*/

    $generalSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."'  AND FIND_IN_SET('".$roomType[0]->id."', IFNULL(roomType,'')) > 0 AND mandatory = 1")->result();
    
    $gsarraySum[$i] = count($generalSplmntCheck[$i]);
    if ($gsarraySum[$i]!=0) {
      $gsData[$i] = $generalSplmntCheck[$i];

      foreach ($gsData[$i] as $key3 => $value3) {

        $explodeRoomType[$key3] = explode(",", $value3->roomType);
        if ($value3->application=="Per Person") {
          $adultAmount[] = $value3->adultAmount;
          for ($j=1; $j <= count($request['adults']); $j++) { 
            if (isset($request['room'.$j.'-childAge'])) {
              foreach ($request['room'.$j.'-childAge'] as $key44 => $value44) {
                if ($value3->MinChildAge < $value44) {
                  $childAmount[] = $value3->childAmount;
                } 
              }

            }
          }
        } else {
          $adultAmountPR[] = $value3->adultAmount;
          $childAmountPR[] = $value3->childAmount;
        }
        $generalsupplementType[] = $value3->type;
        $generalsupplementforAdults[] = $occupancyAdult;
        $generalsupplementforChilds[] =  $occupancyChild;
      }

    }
    /*mandatory General Supplement end*/
    /*Extrabed allotment start*/

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

    $extrabedallotment[$i] = $this->db->query("SELECT amount,ChildAmount,ChildAgeFrom,ChildAgeTo FROM hotel_tbl_extrabed WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND contract_id = '".$contract_id."' AND  hotel_id = '".$request['hotel_id']."' AND FIND_IN_SET('".$roomType[0]->id."', IFNULL(roomType,'')) > 0")->result();
    if (count($extrabedallotment[$i])!=0) {
      foreach ($extrabedallotment[$i] as $key15 => $value15) {
       foreach ($request['adults'] as $key17 => $value17) {
        if (($value17+$request['Child'][$key17]) > $standard_capacity) {
                    // for ($k=1; $k <= count($adults); $k++) { 
          if (isset($request['room'.($key17+1).'-childAge'])) {
            foreach ($request['room'.($key17+1).'-childAge'] as $key18 => $value18) {
              if ($max_child_age <= $value18) {
               $extrabedAmount[] =  $value15->amount;
               $extrabedType[] =  'Adult Extrabed';
             } else {
              if ($value15->ChildAmount!=0 && $value15->ChildAmount!="") {
                if ($value15->ChildAgeFrom <= $value18 && $value15->ChildAgeTo >= $value18) {
                  $extrabedAmount[] =  $value15->ChildAmount;
                  $extrabedType[] =  'Child Extrabed';
                }
              } else {
                $boardalt[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board IN ('".$implodeboardRequest."') AND FIND_IN_SET('".$roomType[0]->id."', IFNULL(roomType,'')) > 0")->result();
                if (count($boardalt[$i])!=0) {
                  foreach ($boardalt[$i] as $key21 => $value21) {
                    if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
                      $extrabedAmount[] =  $value21->amount;
                      $extrabedType[] =  'Child '.$value21->board;
                    }

                  }
                }
              }  

            }
          }

        }

                    // }
                    // if ($request['Child'][$key17]==0) {
        if ($value17 > $standard_capacity) {
          $extrabedAmount[] =  $value15->amount;
          $extrabedType[] =  'Adult Extrabed';
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
  $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Half Board' AND FIND_IN_SET('".$roomType[0]->id."', IFNULL(roomType,'')) > 0")->result();
} else if($contract_board=="FB") {
  $boardSp[$i] = $this->db->query("SELECT startAge,finalAge,amount,board FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = 'Full Board' AND FIND_IN_SET('".$roomType[0]->id."', IFNULL(roomType,'')) > 0")->result();
}
if (count($boardSp[$i])!=0) {
  foreach ($boardSp[$i] as $key21 => $value21) {
    foreach ($request['adults'] as $key17 => $value17) {
      if (($value17+$request['Child'][$key17]) > $standard_capacity) {
        if (isset($request['room'.($key17+1).'-childAge'])) {
          foreach ($request['room'.($key17+1).'-childAge'] as $key18 => $value18) {
            if ($value21->startAge <= $value18 && $value21->finalAge >= $value18) {
              $extrabedAmount[] =  $value21->amount;
              $extrabedType[] =  'Child '.$value21->board;
            }
          }
        }
      }
      if ($value21->startAge >= 18) {
        $extrabedAmount[] =  $value21->amount;
        $extrabedType[] =  'Adult '.$value21->board;
      }
    }
  }
}

/* Board wise supplement check end */
          // print_r($extrabedType);
          // echo "<br>";
/*Extrabed allotment end*/

}
    // $totalAdultBoardSumData =  array_sum($adultarrayBoardSumData)*$adultscount; 
    // $totalChildBoardSumData =  array_sum($childarrayBoardSumData); 
$array_sumAdultAmount = array_sum($adultAmount)*array_sum($request['adults'])+(array_sum($adultAmountPR)*count($request['adults']));
$array_sumChildAmount = array_sum($childAmount);
$manGenarray_sumAdultAmount =  array_sum($ManadultAmount)+array_sum($ManadultAmountPR);
$manGenarray_sumChildAmount = array_sum($ManchildAmount);
$extrabedTotalAmount = array_sum($extrabedAmount);
    // print_r($extrabedAmount);
    //     echo "<br>";

if ($markup!=0) {
      // $totalAdultBoardSumData = (($totalAdultBoardSumData*$markup)/100)+$totalAdultBoardSumData;
      // $totalChildBoardSumData = (($totalChildBoardSumData*$markup)/100)+$totalChildBoardSumData;
  $array_sumAdultAmount = (($array_sumAdultAmount*$markup)/100)+$array_sumAdultAmount;
  $array_sumChildAmount = (($array_sumChildAmount*$markup)/100)+$array_sumChildAmount;
  $manGenarray_sumAdultAmount = (($manGenarray_sumAdultAmount*$markup)/100)+$manGenarray_sumAdultAmount;
  $manGenarray_sumChildAmount = (($manGenarray_sumChildAmount*$markup)/100)+$manGenarray_sumChildAmount;
  $extrabedTotalAmount =  (($extrabedTotalAmount*$markup)/100)+$extrabedTotalAmount;
}
$implode = implode("','",$date);
$linkedAllotmentquery = array();
if ($Rmrow_values['linked_to_room_type']!="" && $Rmrow_values['linked_to_room_type']!=NULL) {
  $linkedAllotmentquery = $this->db->query("SELECT allotement FROM hotel_tbl_allotement WHERE allotement_date IN ('".$implode."') AND room_id = '".$Rmrow_values['linked_to_room_type']."' AND contract_id = '".$Lcontract_id."'")->result();
}

$query = $this->db->query("SELECT hotel_id,room_id,allotement_date,contract_id,allotement,cut_off FROM hotel_tbl_allotement WHERE allotement_date IN ('".$implode."') AND room_id = '".$room_id."' AND contract_id = '".$Lcontract_id."'")->result();
if (count($query)!=0) {
  foreach ($query as $key1 => $value1) {

    $RMdiscount = DateWisediscount(date('Y-m-d',strtotime($start_date)),$value1->hotel_id,$value1->room_id,$Lcontract_id,'Room');
    $amtGet = $this->db->query("SELECT amount FROM hotel_tbl_allotement WHERE allotement_date = '".$value1->allotement_date."' AND room_id = '".$room_id."' AND contract_id = '".$contract_id."'")->result();
    if (count($amtGet)!=0) {
      $ramount = $amtGet[0]->amount;
    } else {
      $ramount = 0;
    }

    if ($markup!=0) {
      $ramount = (($ramount*$markup)/100)+$ramount;
    } else {
      $ramount = $ramount;
    }
    $amount[$key1] = $ramount-($ramount*$RMdiscount)/100;
    $Disamount[$key1] = $ramount;
    $discount[$key1] = $RMdiscount;
    if ($ramount!=0) {
      if (isset($linkedAllotmentquery[$key1]->allotement)) {
        $linkedAllotment=$linkedAllotmentquery[$key1]->allotement;
      } else {
        $linkedAllotment=0;
      }
      $booked = $this->List_Model->all_booked_roomDatewise($value1->hotel_id,$value1->room_id,$value1->allotement_date,$value1->contract_id);
      $allotement[] = ($value1->allotement+$linkedAllotment)-$booked;
    } else {
      $allotement[] = 0;
    }

    $current_date = date_create(date('Y-m-d'));
    $ck_2 = date_create($value1->allotement_date);
    $date_diff_check = date_diff($current_date,$ck_2);
    $check_cutoff1 = $date_diff_check->format("%a");
    if ($check_cutoff1<$value1->cut_off) {
      $cut_off_date[] = date('d/m/Y', strtotime($value1->allotement_date));
    }  

  }
  if (count($cut_off_date)!=0) {
    $cut_off_msg = "Cannot book selected dates (".implode(",", $cut_off_date).") due to cut off period. Kindly select another date";
  }

  foreach ($query as $key => $value) {
    $c1 = date_create(date('Y-m-d'));
    $c2 = date_create($value->allotement_date);
    $days=date_diff($c1,$c2);
    $check_cutoff = $days->format("%a");

    if ($check_cutoff<$value->cut_off) {
      $data['condition'] =  "false";
      break;
    } else {
      $data['condition'] =  "true";
    }
  }

  if (isset($request['nationality'])) {
    $nationality = $this->db->query("SELECT contract_id FROM hotel_tbl_contract WHERE contract_id = '".$contract_id."' AND FIND_IN_SET('".$request['nationality']."', IFNULL(nationalityPermission,'')) = 0")->result();
    if (count($nationality)==0) {
      $data['condition'] =  "false";
    }

  }

  $data['cut_off_msg'] = $cut_off_msg;
  $adultsRoomCount = count($adults);
      // print_r($manGenarray_sumAdultAmount);
      // echo "<br>";
      // $totalbkamount = ceil((array_sum($amount)*$adultsRoomCount)+$array_sumAdultAmount+$array_sumChildAmount+$totalAdultBoardSumData+$totalChildBoardSumData+$manGenarray_sumAdultAmount+$manGenarray_sumChildAmount)+$extrabedTotalAmount;
  $totalbkamount = ((array_sum($amount)*$adultsRoomCount)+$array_sumAdultAmount+$array_sumChildAmount+$manGenarray_sumAdultAmount+$manGenarray_sumChildAmount)+$extrabedTotalAmount;
  $totalbkamount1 = ((array_sum($Disamount)*$adultsRoomCount)+$array_sumAdultAmount+$array_sumChildAmount+$manGenarray_sumAdultAmount+$manGenarray_sumChildAmount)+$extrabedTotalAmount;

  if($tax!=0) {
    $totalbkamount = ((($totalbkamount*$tax)/100)+$totalbkamount);
    $totalbkamount1 = ((($totalbkamount*$tax)/100)+$totalbkamount);
  }
  $data['price'] = $totalbkamount;
  $data['discountAmount'] = $totalbkamount1;
  $rtrn = array();
  foreach ($request['adults'] as $key77 => $value77) {


    if ((($value77+$request['Child'][$key77]) > $max_capacity) || ($value77 > $occupancyAdult) || ($request['Child'][$key77] > $occupancyChild)) {
      $rtrn[$key77] = 1;
    } else {
      $rtrn[$key77] = 0;
    }
  }
  if (array_sum($rtrn) == 0 && $cut_off_msg=="") {
    $data['allotement'] = min($allotement);
  } else {
    $data['allotement'] = 0;
    $data['condition'] =  "false";
  }
  $data['generalsupplementType'] = array_unique($generalsupplementType);
  $data['MangeneralsupplementType'] = array_unique($MangeneralsupplementType);
  $data['BoardsupplementType'] = implode(", ", array_unique($BoardsupplementType));
  $data['nonRefundable'] = $nonRefundable;
  $data['extrabedType'] = $extrabedType;
  $data['discount'] = array_sum($discount);

} else {
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotel_room_type');
  $this->db->where('id',$room_id);
  $query1=$this->db->get();
  $final =  $query1->result();
  $data['cut_off_msg'] = $cut_off_msg;
  $data['condition'] =  "TRUE";
  $data['price'] = $final[0]->price+$array_sumAdultAmount+$array_sumChildAmount;
  $data['discountAmount'] = $final[0]->price+$array_sumAdultAmount+$array_sumChildAmount;
  $data['allotement'] = $final[0]->allotement;
  $data['generalsupplementType'] = array_unique($generalsupplementType);
  $data['MangeneralsupplementType'] = array_unique($MangeneralsupplementType);
  $data['BoardsupplementType'] = implode(", ", array_unique($BoardsupplementType));
  $data['extrabedType'] = $extrabedType;
  $data['nonRefundable'] = $nonRefundable;
  $data['discount'] = 0;
}
return $data;
}
public function favourite_hotel(){
  $data=$this->session->userdata();
  print_r($data);
}
public function contractchecking($request) {
  $AgentperContract = array();
  $countryperContract = array();
  $start = $request['Check_in'];
  $end = $request['Check_out'];
  $checkin_date=date_create($request['Check_in']);
  $checkout_date=date_create($request['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");

      // Contract Check start
  $contract_id = array();
  $count = array();

  
  $ot = $this->db->query("SELECT contract_id FROM hotel_tbl_contract a WHERE not exists (select 1 from  hotel_agent_permission b where   a.contract_id = b.contract_id and FIND_IN_SET('".$this->session->userdata('agent_id')."', IFNULL(permission,'')) > 0) AND not exists (select 1 from hotel_country_permission c where a.contract_id = c.contract_id and FIND_IN_SET('".substr($this->session->userdata('currency'),0,2)."', IFNULL(permission,'')) > 0) AND from_date <= '".date('Y-m-d',strtotime($request['Check_in']))."' AND to_date > '".date('Y-m-d',strtotime($request['Check_in']))."' AND  from_date < '".date('Y-m-d',strtotime($request['Check_out']))."' AND to_date >= '".date('Y-m-d',strtotime($request['Check_out']))."'  AND hotel_id = '".$request['hotel_id']."' AND contract_flg  = 1")->result();

  foreach ($ot as $key5 => $value5) {
    $contract_id[] =  $value5->contract_id;
  }
  $count[] =  count($ot);
  if (count($count)!=0) {
    $array_uniquecon = array_unique($contract_id);
    foreach ($array_uniquecon as $key10 => $value10) {
      $dataOut['contract_id'][] = $value10;
      $max_child_age = $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id ='".$value10."'")->result();
      $dataOut['max_child_age'][] = $max_child_age[0]->max_child_age;
    }
    return $dataOut;
  } else {
    return false;
  }
}
public function boardsupplementListGet($room_id,$hotel_id,$contract_id,$checkIn,$checkOut) {
  $dataFilter = array();
  $dataBoard = array();
  $roomType = $this->db->query("SELECT room_type FROM hotel_tbl_hotel_room_type WHERE id = '".$room_id."'")->result();
  $checkin_date=date_create($_REQUEST['Check_in']);
  $checkout_date=date_create($_REQUEST['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  for($i = 0; $i <= $tot_days; $i++) {
    $date[$i] = date('Y-m-d', strtotime($_REQUEST['Check_in']. ' + '.$i.'  days'));
    $data[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE hotel_id = '".$hotel_id."' AND contract_id = '".$contract_id."' AND '".$date[$i]."' BETWEEN fromDate AND toDate group by board")->result();
  }

  foreach ($data as $key => $value) {
    if (count($value)!=0) {
      foreach ($value as $key1 => $value1) {
       $dataBoard[] = $value1;
     }
     break;
   }
 }
 foreach ($dataBoard as $key3 => $value3) {
  $explodeRoomType[$key3] = explode(",", $value3->roomType);
  foreach ($explodeRoomType[$key3] as $key4 => $value4) {
    if ($roomType[0]->room_type==$value4) {
      $dataFilter[] = $dataBoard[$key3]->board;
    }
  }
}
return $dataFilter;
}
public function minimumStayCheckAvailability($request,$contract_id) {
  $data = array();
  $checkin_date=date_create($request['Check_in']);
  $checkout_date=date_create($request['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  for($i = 0; $i < $tot_days; $i++) {
    $date[$i] = date('Y-m-d', strtotime($request['Check_in']. ' + '.$i.'  days'));
    $query[$i] = $this->db->query('SELECT minDay FROM hotel_tbl_minimumstay WHERE "'.$date[$i].'" BETWEEN fromDate AND toDate AND contract_id = "'.$contract_id.'"')->result();
    if (count($query[$i])!=0) {
      $data = $query[$i][0];
    }
  }
  if (count($data)!=0) {
    if ($tot_days >=$data->minDay) {
      return "true";
    } else {
      return "Minimum stay ".$data->minDay." days";
    }
  } else {
    return "true";
  }
}
public function get_room_facility($request) {
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotel_room_type');
  $this->db->where('id',$request);
  $this->db->where('delflg',1);
  $this->db->order_by('id','desc');
  $query=$this->db->get();
  return $query->result();
}
public function get_hotel_facility($request) {
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotels');
  $this->db->where('id',$request);
  $this->db->where('delflg',1);
  $this->db->order_by('id','desc');
  $query=$this->db->get();
  return $query->result();
}
public function contractchecking1($request) {

  $AgentperContract = array();
  $countryperContract = array();
  $start = $request['Check_in'];
  $end = $request['Check_out'];
  $checkin_date=date_create($request['Check_in']);
  $checkout_date=date_create($request['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");

      // Contract Check start
  $contract_id = array();
  $count = array();
  for($i = 0; $i <= $tot_days; $i++) {
    $date[$i] = date('Y-m-d', strtotime($start. ' + '.$i.'  days'));
    $ot[$i] = $this->db->query("SELECT * FROM hotel_tbl_contract WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND hotel_id = '".$request['search_id']."' AND contract_flg  = 1")->result();
    foreach ($ot[$i] as $key5 => $value5) {

          // Agent Check start
      $agentCheck = $this->db->query("SELECT * FROM hotel_agent_permission WHERE contract_id = '".$value5->contract_id."'")->result();

      if (count($agentCheck)!=0) {
        foreach (explode(",", $agentCheck[0]->permission) as $key10 => $value10) {
          if ($this->session->userdata('agent_id')==$value10) {
            $agentCheckResult = $value10;
          } else {
            $agentCheckResult = "";
          }
        }
      } else {
        $agentCheckResult = "";
      }
            // Agent Check end
            // country Check start
      $countryCheck = $this->db->query("SELECT * FROM hotel_country_permission WHERE contract_id = '".$value5->contract_id."'")->result();
      if (count($countryCheck)!=0) {
        foreach (explode(",", $countryCheck[0]->permission) as $key9 => $value9) {
          if (substr($this->session->userdata('currency'),0,2)==$value9) {
            $countryCheckResult = $value9;
          } else {
            $countryCheckResult = "";
          }
        }
      } else {
        $countryCheckResult = "";
      }

              // country Check end
      if ($countryCheckResult=="" && $agentCheckResult == "") {
        $contract_id[] =  $value5->contract_id;
        $count[] =  count($value5);
      }

    }
  }

  if (count($count)>=$tot_days+1) {
    $array_uniquecon = array_unique($contract_id);
    foreach ($array_uniquecon as $key10 => $value10) {
      $dataOut['contract_id'][] = $value10;
      $max_child_age = $this->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id ='".$value10."'")->result();
      $dataOut['max_child_age'][] = $max_child_age[0]->max_child_age;
    }
    return $dataOut;
  } else {
    return false;
  }
}
public function room_current_count1($room_id,$start_date,$end_date,$contract_id,$adults,$child,$request,$markup,$contract_ajax_id) {
  /*Tax percentage grt from contract start*/
    // print_r($request['board']);
    // echo "<br>";

  if ($contract_ajax_id!="") {
   $contract_id = $contract_ajax_id;
 }

 $this->db->select('*');
 $this->db->from('hotel_tbl_contract');
 $this->db->where('hotel_id',$request['hotel_id']);
 $this->db->where('contract_id',$contract_id);
 $linkedcontract=$this->db->get()->result();
 if ($linkedcontract[0]->contract_type=="Sub") {
  $Lcontract_id = "CON0".$linkedcontract[0]->linkedContract;
} else {
  $Lcontract_id = $contract_id;
}

$this->db->select('*');
$this->db->from('hotel_tbl_contract');
$this->db->where('hotel_id',$request['hotel_id']);
if ($contract_ajax_id!="") {
  $this->db->where('contract_id',$contract_ajax_id);
} else {
  $this->db->where('contract_id',$request['contract_id']);
}
$query = $this->db->get();
$row_values  = $query->row_array();
$tax = $row_values['tax_percentage'];

/*Tax percentage grt from contract end*/

/*Standard capacity get from rooms start*/

$this->db->select('*');
$this->db->from('hotel_tbl_hotel_room_type');
$this->db->where('hotel_id',$request['hotel_id']);
$this->db->where('id',$room_id);
$Rmquery = $this->db->get();
$Rmrow_values  = $Rmquery->row_array();
$occupancyAdult = $Rmrow_values['occupancy'];
$occupancyChild = $Rmrow_values['occupancy_child'];
$standard_capacity = $Rmrow_values['standard_capacity'];
$max_capacity = $Rmrow_values['max_total'];
/*Standard capacity get from rooms end*/
$BoardsupplementType = array();
$adultBoardAmount = array();
$childBoardAmount = array();
$childarrayBoardSumData =array();
$adultAmount = array();
$childAmount = array();
$adultAmountPR = array();
$childAmountPR = array();
$generalsupplementType  = array();
$ManadultAmount  = array();
$ManadultAmountPR = array();
$MangeneralsupplementforAdults = array();
$ManchildAmount = array();
$MangeneralsupplementforChilds = array();
$MangeneralsupplementType = array();
$generalsupplementforAdults = array();
$generalsupplementforChilds = array();
if (isset($request['max_child_age'])) {
  $max_child_age = $request['max_child_age'];
} else {
  $max_child_age = 0;
}
$adultscount = array_sum($adults);
$childscount = array_sum($child);
$roomType = $this->db->query("SELECT room_type FROM hotel_tbl_hotel_room_type WHERE id = '".$room_id."'")->result();
$cut_off_date = array();
$cut_off_msg = "";
$checkin_date=date_create($start_date);
$checkout_date=date_create($end_date);
$no_of_days=date_diff($checkin_date,$checkout_date);
$tot_days = $no_of_days->format("%a");
for($i = 0; $i < $tot_days; $i++) {
  $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
  if (isset($request['board'])) {
    foreach ($request['board'] as $key5 => $value5) {
      $boardSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."' AND board = '".$value5."'")->result();

      foreach ($boardSplmntCheck[$i] as $key7 => $value7) {

        $explodeBoardroomtype[$key7] = explode(",", $value7->roomType);

        foreach ($explodeBoardroomtype[$key7] as $key6 => $value6) {

          if ($value6==$roomType[0]->room_type) {

                    //   $boardsupplementData[$key7] = $value7;
            if ($max_child_age<$value7->startAge || $max_child_age<$value7->finalAge) {

              $BoardsupplementType[$key5] = $value7->board;

              $adultBoardAmount[$key5] = $value7->amount;
            }
                      // if($max_child_age >= $value7->finalAge) {

            $childBoardcnt[$i] = array();
            for ($j=1; $j <= count($request['adults']); $j++) { 
              if (isset($request['room'.$j.'-childAge'])) {
                foreach ($request['room'.$j.'-childAge'] as $key4 => $value4) {
                  if ($value7->startAge <= $value4 && $value7->finalAge >= $value4) {
                   $childBoardcnt[$i][]= $value4;
                 } 
               }

             }

           }
           if (count($childBoardcnt[$i])!=0) {
            $childBoardAmount[$i][] = $value7->amount*count($childBoardcnt[$i]);
          } 
                      // }
        }
      }
    }
  }
}

$adultarrayBoardSumData[$i] = array_sum($adultBoardAmount);
if (isset($childBoardAmount[$i])) {
  $childarrayBoardSumData[$i] = array_sum($childBoardAmount[$i]);
}

/*mandatory General Supplement start*/

$generalSplmntCheck[$i] = $this->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$contract_id."'  AND mandatory = 1")->result();
$gsarraySum[$i] = count($generalSplmntCheck[$i]);

if ($gsarraySum[$i]!=0) {
  $gsData[$i] = $generalSplmntCheck[$i];

  foreach ($gsData[$i] as $key3 => $value3) {
    $explodeRoomType[$key3] = explode(",", $value3->roomType);
    foreach ($explodeRoomType[$key3] as $key4 => $value4) {
      if ($value4==$roomType[0]->room_type) {
        if ($value3->application=="Per Person") {
          $adultAmount[] = $value3->adultAmount;
          for ($j=1; $j <= count($request['adults']); $j++) { 
            if (isset($request['room'.$j.'-childAge'])) {
              foreach ($request['room'.$j.'-childAge'] as $key44 => $value44) {
                if ($value3->MinChildAge < $value44) {
                  $childAmount[] = $value3->childAmount;
                } 
              }

            }

          }
        } else {
          $adultAmountPR[] = $value3->adultAmount;
          $childAmountPR[] = $value3->childAmount;
        }
        $generalsupplementType[] = $value3->type;
        $generalsupplementforAdults[] = $occupancyAdult;
        $generalsupplementforChilds[] =  $occupancyChild;
      }
    }

  }

}
/*mandatory General Supplement end*/

}

$totalAdultBoardSumData =  array_sum($adultarrayBoardSumData)*$adultscount; 
$totalChildBoardSumData =  array_sum($childarrayBoardSumData); 
$array_sumAdultAmount = array_sum($adultAmount)*array_sum($request['adults'])+(array_sum($adultAmountPR)*count($request['adults']));
$array_sumChildAmount = array_sum($childAmount);
$manGenarray_sumAdultAmount =  array_sum($ManadultAmount)+array_sum($ManadultAmountPR);
$manGenarray_sumChildAmount = array_sum($ManchildAmount);
if ($markup!=0) {
  $totalAdultBoardSumData = (($totalAdultBoardSumData*$markup)/100)+$totalAdultBoardSumData;
  $totalChildBoardSumData = (($totalChildBoardSumData*$markup)/100)+$totalChildBoardSumData;
  $array_sumAdultAmount = (($array_sumAdultAmount*$markup)/100)+$array_sumAdultAmount;
  $array_sumChildAmount = (($array_sumChildAmount*$markup)/100)+$array_sumChildAmount;
  $manGenarray_sumAdultAmount = (($manGenarray_sumAdultAmount*$markup)/100)+$manGenarray_sumAdultAmount;
  $manGenarray_sumChildAmount = (($manGenarray_sumChildAmount*$markup)/100)+$manGenarray_sumChildAmount;
}
$implode = implode("','",$date);
$query = $this->db->query("SELECT * FROM hotel_tbl_allotement WHERE allotement_date IN ('".$implode."') AND room_id = '".$room_id."' AND contract_id = '".$Lcontract_id."'")->result();
if (count($query)!=0) {
  foreach ($query as $key1 => $value1) {

    if ($markup!=0) {
      $amtGet = $this->db->query("SELECT amount FROM hotel_tbl_allotement WHERE allotement_date = '".$value1->allotement_date."' AND room_id = '".$room_id."' AND contract_id = '".$contract_id."'")->result();
      if (count($amtGet)!=0) {
        $ramount = $amtGet[0]->amount;
      } else {
        $ramount = 0;
      }
      $amount[$key1] = (($ramount*$markup)/100)+$ramount;
    } else {
      $amtGet = $this->db->query("SELECT amount FROM hotel_tbl_allotement WHERE allotement_date = '".$value1->allotement_date."' AND room_id = '".$room_id."' AND contract_id = '".$contract_id."'")->result();
      if (count($amtGet)!=0) {
        $ramount = $amtGet[0]->amount;
      } else {
        $ramount = 0;
      }
      $amount[$key1] = $ramount;
    }
    if ($ramount!=0) {
      $allotement[] = $value1->allotement;
    } else {
      $allotement[] = 0;
    }

    $current_date = date_create(date('Y-m-d'));
    $ck_2 = date_create($value1->allotement_date);
    $date_diff_check = date_diff($current_date,$ck_2);
    $check_cutoff1 = $date_diff_check->format("%a");
    if ($check_cutoff1<$value1->cut_off) {
      $cut_off_date[] = date('d/m/Y', strtotime($value1->allotement_date));
    }  

  }
  if (count($cut_off_date)!=0) {
    $cut_off_msg = "Cannot book selected dates (".implode(",", $cut_off_date).") due to cut off period. Kindly select another date";
  }

  foreach ($query as $key => $value) {
    $c1 = date_create(date('Y-m-d'));
    $c2 = date_create($value->allotement_date);
    $days=date_diff($c1,$c2);
    $check_cutoff = $days->format("%a");

    if ($check_cutoff<$value->cut_off) {
      $data['condition'] =  "False";
      break;
    } else {
      $data['condition'] =  "TRUE";
    }
  }
  $data['cut_off_msg'] = $cut_off_msg;
  $adultsRoomCount = count($adults);
      // print_r($manGenarray_sumAdultAmount);
      // echo "<br>";
  $totalbkamount = ceil((array_sum($amount)*$adultsRoomCount)+$array_sumAdultAmount+$array_sumChildAmount+$totalAdultBoardSumData+$totalChildBoardSumData+$manGenarray_sumAdultAmount+$manGenarray_sumChildAmount);

  if($tax!=0) {
    $totalbkamount = ceil((($totalbkamount*$tax)/100)+$totalbkamount);
  }
  $data['price'] = $totalbkamount;
  $rtrn = array();
  foreach ($request['adults'] as $key77 => $value77) {
    if (($value77+$request['Child'][$key77]) > $max_capacity) {
      $rtrn[$key77] = 1;
    } else {
      $rtrn[$key77] = 0;
    }
  }
  if (array_sum($rtrn) == 0 && $cut_off_msg=="") {
    $data['allotement'] = max($allotement);
  } else {
    $data['allotement'] = 0;
  }
  $data['generalsupplementType'] = array_unique($generalsupplementType);
  $data['MangeneralsupplementType'] = array_unique($MangeneralsupplementType);
  $data['BoardsupplementType'] = implode(", ", array_unique($BoardsupplementType));
} else {
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotel_room_type');
  $this->db->where('id',$room_id);
  $query1=$this->db->get();
  $final =  $query1->result();
  $data['cut_off_msg'] = $cut_off_msg;
  $data['condition'] =  "TRUE";
  $data['price'] = $final[0]->price+$array_sumAdultAmount+$array_sumChildAmount+$totalAdultBoardSumData+$totalChildBoardSumData;
  $data['allotement'] = $final[0]->allotement;
  $data['generalsupplementType'] = array_unique($generalsupplementType);
  $data['MangeneralsupplementType'] = array_unique($MangeneralsupplementType);
  $data['BoardsupplementType'] = implode(", ", array_unique($BoardsupplementType));

}
return $data;
}
public function roomDetails($room_id)
{
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotel_room_type');
  $this->db->where('id',$room_id);
  $query1=$this->db->get()->result();
  return $query1[0];
}
public function contractBoardget($hotel_id,$contract_id) {
  $this->db->select('board');
  $this->db->from('hotel_tbl_contract');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('contract_id',$contract_id);
  $query1=$this->db->get()->result();
  return $query1[0];
}
public function ContractBasedFetchData($hotel_id,$Adroom=null,$Adcontract=null) {
  $_REQUEST['hotel_id'] = $hotel_id;
  $start1      = $_REQUEST['Check_in']; 
  $stop1       = $_REQUEST['Check_out'];
  $room_id = array();
  $contract_val = array();
  $hotel_val = array();
  $occupancy = array();
  $occupancy_child = array();
  $price = array();
  $count = array();
  $avail = array();
  $count = array();
  $condition = array();
  $contractBoard = array();
  $generalsupplementType = array();
  $extrabedType = array();
  $nonRefundable = array();
  $discount = array();
  $discountAmount = array();
  if (isset($_REQUEST['mark_up']) && $_REQUEST['mark_up']!="") {
    $agent_markup = $_REQUEST['mark_up']+mark_up_get()+general_mark_up_get();
  } else {
    $agent_markup = mark_up_get()+general_mark_up_get();
  } 
  $roomDetails= $this->List_Model->hotel_rooms_data($hotel_id,$Adroom);

  $contractchecking = $this->List_Model->contractcheckingwithboard($_REQUEST,$Adroom,$Adcontract);

  foreach ($roomDetails as $key => $value) {
    foreach ($contractchecking['contract_id'] as $key1 => $value1) {
      $contract_markup[$key1] = $this->List_Model->contract_markup($hotel_id,$value1);
      $revenue_markup = revenue_markup($hotel_id,$value1,$this->session->userdata('agent_id'));
      $total_markup[$key1] = $contract_markup[$key1]+$agent_markup;
      if ($revenue_markup!=0) {
        $total_markup[$key1] = $revenue_markup+mark_up_get();
      }
      // $roomDetails = $this->List_Model->roomDetails($value->id);
      $contractBoardget = $this->List_Model->contractBoardget($_REQUEST['hotel_id'],$value1);

      $room_current_count[$key][$key1] = $this->List_Model->room_current_count($value->id,$start1,$stop1,$value1,$_REQUEST['adults'],$_REQUEST['Child'],$_REQUEST,$total_markup[$key1],$value1);

      $room_closedout[$key][$key1] = $this->List_Model->all_closedout_room($_REQUEST['hotel_id'],$value1,$_REQUEST,$value->id);

      $minimumStay[$key][$key1] = $this->List_Model->minimumStayCheckAvailability($_REQUEST,$value1);
      $total_room[$key][$key1] = $room_current_count[$key][$key1]['allotement'];
      if($room_closedout[$key][$key1]['condition']!=1 && $minimumStay[$key][$key1]=="true" 
        // && $room_current_count[$key][$key1]['allotement']!=0 && $total_room[$key][$key1]!=0 && $total_room[$key][$key1] > 0
    ) {
        $contract_val[$value->id][] = $value1;
      $hotel_val[$value->id][] = $_REQUEST['hotel_id'];
      $occupancy[$value->id][] = $value->occupancy;
      $occupancy_child[$value->id][] = $value->occupancy_child;
      if (substr($room_current_count[$key][$key1]['allotement'], 0, 1)=="-") {
        $count[$value->id][] = 0;
        $avail[$value->id][] = 0;
      } else {
                // $count[$value->id][] = $room_current_count[$key][$key1]['allotement']-$room_booked[$key][$key1];
        $count[$value->id][] = $room_current_count[$key][$key1]['allotement'];
        if ($room_current_count[$key][$key1]['condition']=='false' || round($room_current_count[$key][$key1]['price'])==0) {
         $avail[$value->id][] = 0;
       } else {
        $avail[$value->id][] = 1;
      }
    }
    
    if (round($room_current_count[$key][$key1]['price'])!=0) {
      $condition[$value->id][] = $room_current_count[$key][$key1]['condition'];
    } else {
      $condition[$value->id][] = "false";
    }
    $contractBoard[$value->id][] = $contractBoardget->board;
    $generalsupplementType[$value->id][] = $room_current_count[$key][$key1]['generalsupplementType'];
    $extrabedType[$value->id][] = $room_current_count[$key][$key1]['extrabedType'];
    $nonRefundable[$value->id][] = $room_current_count[$key][$key1]['nonRefundable'];
    $discount[$value->id][] = $room_current_count[$key][$key1]['discount'];
    $price[$value->id][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['price']);
    $discountAmount[$value->id][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['discountAmount']);
  } else {
    $contract_val[$value->id][] = $value1;
    $hotel_val[$value->id][] = $_REQUEST['hotel_id'];
    $occupancy[$value->id][] = $value->occupancy;
    $occupancy_child[$value->id][] = $value->occupancy_child;
    $count[$value->id][] = 0;
    $avail[$value->id][] = 0;
    $condition[$value->id][] = "false";
    $contractBoard[$value->id][] = $contractBoardget->board;
    $generalsupplementType[$value->id][] = $room_current_count[$key][$key1]['generalsupplementType'];
    $extrabedType[$value->id][] = $room_current_count[$key][$key1]['extrabedType'];
    $nonRefundable[$value->id][] = $room_current_count[$key][$key1]['nonRefundable'];
    $discount[$value->id][] = $room_current_count[$key][$key1]['discount'];
    $price[$value->id][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['price']);
    $discountAmount[$value->id][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['discountAmount']);
  }
}
$room_id[] = $value->id;
}
$data['room_id']=$room_id;
$data['contract_val']=$contract_val;
$data['hotel_val']= $hotel_val;
$data['occupancy']= $occupancy;
$data['occupancy_child']= $occupancy_child;
$data['price']= $price;
$data['count']= $count;
$data['avail']= $avail;
$data['condition']= $condition;
$data['contractBoard']= $contractBoard;
$data['generalsupplementType']= $generalsupplementType;
$data['extrabedType']= $extrabedType;
$data['nonRefundable']= $nonRefundable;
$data['discount']= $discount;
$data['discountAmount']= $discountAmount;
return $data;
}
public function moreDetailsFetch($hotel_id) {
  $data = $this->List_Model->ContractBasedFetchData($hotel_id);
  $roomDetails1= $this->List_Model->hotel_rooms_data($hotel_id);
  $style = '';
  $requestChildAge = array();
  $imploderequestChildAge = array();
  $imploderequestChildAge1 = '';
  foreach ($roomDetails1 as $key01 => $value01) {
    $child = '';
    if ($value01->occupancy_child!=0 && $value01->occupancy_child!="") {
      $child =  $value01->occupancy_child==1 ? $value01->occupancy_child.' child' : $value01->occupancy_child.' childrens'; 
    }
    if (array_sum($data['avail'][$value01->id])!=0) {
      $style.='<div class="col-md-12 offset-0 sroom-border">
      <div class="col-md-12 mediafix1">
      <h4 style="font-size:14px" class="opensans text-transform dark bold margtop1">'.$value01->room_name." ".$value01->room_type_name.'</h4>
      <p>Max Occupancy: '.$value01->occupancy.' adults, '.$child.'</p>
      </div>
      <div class="col-md-12 mediafix1 pad_left_0">
      <div class="clearfix"></div>
      <div class="roomRateCheckdiv">';

      foreach ($data['contractBoard'][$value01->id] as $key02 => $value02) {

        foreach ($_REQUEST['Child'] as $reqCkey => $reqCvalue) {

          for ($i=1; $i <= $reqCvalue ; $i++) { 
            foreach ($_REQUEST['room'.($reqCkey+1).'-childAge'] as $reCAkey => $reCAvalue) {
              $requestChildAge[$reqCkey][$reCAkey] = 'room'.($reqCkey+1).'-childAge[]='.$reCAvalue;
            }
            $imploderequestChildAge[$reqCkey] = implode("&", $requestChildAge[$reqCkey]);

          }
        }

        $imploderequestChildAge1 = implode("&", $imploderequestChildAge);
        if ($imploderequestChildAge1!='') {
          $imploderequestChildAge1 = '&'.$imploderequestChildAge1;
        } 
        $requestAdults = "adults[]=".implode("&adults[]=", $_REQUEST['adults']);
        $requestChild = "Child[]=".implode("&Child[]=", $_REQUEST['Child']);
                       // $request = urldecode($request);
                       // print_r($request);
                       // echo "<br>";
        if ($value02=="RO") {
          $icon = "bed";
        } else {
          $icon = "cutlery";
        }

        if ($value02=="RO") {
          $title = "Room Only";
        } else if ($value02=="BB") {
          $title = "Bed and Breakfast";
        } else if ($value02=="HB") {
          $title = "Half Board";
        } else {
          $title = "Full Board";
        }

        if (count($data['generalsupplementType'][$value01->id][$key02])!=0 && $data['generalsupplementType'][$value01->id][$key02]!="") {
          $generalsupl = '<li>'.implode(",", array_unique($data['generalsupplementType'][$value01->id][$key02])).'</li>';
        } else {
          $generalsupl = '';
        }
        if (count($data['extrabedType'][$value01->id][$key02])!=0 && $data['extrabedType'][$value01->id][$key02]!="") {
          $extrabedType = '<li>'.implode(",", array_unique($data['extrabedType'][$value01->id][$key02])).'</li>';
        } else {
          $extrabedType = '';
        }
        if (count($data['nonRefundable'][$value01->id])!=0 && $data['nonRefundable'][$value01->id][$key02]!="") {
          $nonRefundable = '<li>'.$data['nonRefundable'][$value01->id][$key02].'</li>';
        } else {
          $nonRefundable = '';
        }

        if ($data['discount'][$value01->id][$key02]!=0) {
          $oldPrice = '<small class="mb-0 bold old-price">'.$data['discountAmount'][$value01->id][$key02].'</small>';
        } else {
          $oldPrice = '';
        }

        if (count($data['condition'][$value01->id])!=0 && $data['condition'][$value01->id][$key02]!="false" 
          // && $data['count'][$value01->id][$key02]!=0
      ) {

          if ($data['count'][$value01->id][$key02]==0) {
            $leftStyle = '<small class="color-red"></small>';
            $styles = '';
            $btn_name = 'On Request';
            $Reloadrequest = 'RequestType=On Request&room_id='.$value01->id.'&hotel_id='.$data['hotel_val'][$value01->id][$key02].'&mark_up=&contract_id='.$data['contract_val'][$value01->id][$key02].'&Check_in='.$_REQUEST['Check_in'].'&Check_out='.$_REQUEST['Check_out'].'&'.$requestAdults.'&'.$requestChild.$imploderequestChildAge1.'&no_of_rooms='.count($_REQUEST['adults']).'&max_child_age='.$this->max_child_age_get($data['contract_val'][$value01->id][$key02]).'&nationality='.$_REQUEST['nationality'];
          } else {
            $leftStyle = '<small class="color-red">'.$data['count'][$value01->id][$key02].' left!</small>';
            $styles = 'style="background:green;border-bottom: 2px solid green;"';
            $btn_name = 'Book';
            $Reloadrequest = 'RequestType=Book&room_id='.$value01->id.'&hotel_id='.$data['hotel_val'][$value01->id][$key02].'&mark_up=&contract_id='.$data['contract_val'][$value01->id][$key02].'&Check_in='.$_REQUEST['Check_in'].'&Check_out='.$_REQUEST['Check_out'].'&'.$requestAdults.'&'.$requestChild.$imploderequestChildAge1.'&no_of_rooms='.count($_REQUEST['adults']).'&max_child_age='.$this->max_child_age_get($data['contract_val'][$value01->id][$key02]).'&nationality='.$_REQUEST['nationality'];
          }

          $style.= '<div class="col-md-12">
          <div class="row contract-board">
          <div class="col-xs-2"> 
          <h5 class="color-blue bold tool-tip" title="'.$title.'"><i class="fa fa-'.$icon.'"></i><span> '.$value02.'</span></h5><br>
          '.$leftStyle.'
          </div>
          <div class="col-xs-5">
          <ul>'.$generalsupl.'</ul>
          <ul>'.$extrabedType.'</ul>
          <ul>'.$nonRefundable.'</ul>
          </div>
          <div class="col-xs-3 text-right">
          '.$oldPrice.'
          <p class="color-blue mb-0 bold">'.$data['price'][$value01->id][$key02].'</p>
          </div>
          <div class="col-xs-2 text-right">
          <a '.$styles.' onclick="tokenSetfn(\''.base_url().'payment?'.$Reloadrequest.'\')" href="#" class="hotel-view-btn1 sbookbtn mt1"  >'.$btn_name.'</a>
          </div>
          </div>
          </div>';

                      // $style.= '</div>';
                      // $style.= '</div>';
        }


      }
      $style.= '</div>
      </div>
      </div>';
    }

  }
  return $style;
}
public function MinAmountData($hotel_id,$Adroom=null,$Adcontract=null) {
  $amountdec = array();
  $imploderequestChildAge = array();
  $data = $this->List_Model->ContractBasedFetchData($hotel_id);

  $roomDetails1= $this->List_Model->hotel_rooms_data($hotel_id);

  $q=0;
  foreach ($roomDetails1 as $key01 => $value01) {
    $child = '';
    if ($value01->occupancy_child!=0 && $value01->occupancy_child!="") {
      $child =  $value01->occupancy_child==1 ? $value01->occupancy_child.' child' : $value01->occupancy_child.' childrens'; 
    }


    // if (array_sum($data['count'][$value01->id])!=0) {
    foreach ($data['contractBoard'][$value01->id] as $key02 => $value02) {
      if (count($data['condition'][$value01->id][$key02])!=0 && $data['condition'][$value01->id][$key02]!="false" 
          // && $data['count'][$value01->id][$key02]!=0
    ) {

        foreach ($_REQUEST['Child'] as $reqCkey => $reqCvalue) {
          for ($i=1; $i <= $reqCvalue ; $i++) { 
            foreach ($_REQUEST['room'.($reqCkey+1).'-childAge'] as $reCAkey => $reCAvalue) {
              $requestChildAge[$reqCkey][$reCAkey] = 'room'.($reqCkey+1).'-childAge[]='.$reCAvalue;
            }
            $imploderequestChildAge[$reqCkey] = implode("&", $requestChildAge[$reqCkey]);

          }
        }

        $imploderequestChildAge1 = implode("&", $imploderequestChildAge);
        if ($imploderequestChildAge1!='') {
          $imploderequestChildAge1 = '&'.$imploderequestChildAge1;
        } 

        $requestAdults = "adults[]=".implode("&adults[]=", $_REQUEST['adults']);

        $requestChild = "Child[]=".implode("&Child[]=", $_REQUEST['Child']);

        if ($data['count'][$value01->id][$key02]!=0) {
          $RequestType = 'RequestType=Book&';
        } else {
          $RequestType = 'RequestType=On Request&';
        }
        $request[$q] = $RequestType.'room_id='.$value01->id.'&hotel_id='.$data['hotel_val'][$value01->id][$key02].'&mark_up=&contract_id='.$data['contract_val'][$value01->id][$key02].'&Check_in='.$_REQUEST['Check_in'].'&Check_out='.$_REQUEST['Check_out'].'&'.$requestAdults.'&'.$requestChild.$imploderequestChildAge1.'&no_of_rooms='.count($_REQUEST['adults']).'&max_child_age='.$this->max_child_age_get($data['contract_val'][$value01->id][$key02]).'&nationality='.$_REQUEST['nationality'];
        $contract_val[$q] = $data['contract_val'][$value01->id][$key02];
        $amount[$q] = mb_substr($data['price'][$value01->id][$key02],3);
        $amountdec[$q] = floatval(preg_replace('/[^\d.]/', '', $amount[$q]));
        $RoomName[$q] = $value01->room_name." ".$value01->room_type_name;
        $occupancy[$q] = $value01->occupancy.' adults, '.$child;
        $RoomLeft[$q] = $data['count'][$value01->id][$key02];

        if ($value02=="RO") {
          $icon[$q] = "bed";
        } else {
          $icon[$q] = "cutlery";
        }

        if ($value02=="RO") {
          $title[$q] = "Room Only";
        } else if ($value02=="BB") {
          $title[$q] = "Bed and Breakfast";
        } else if ($value02=="HB") {
          $title[$q] = "Half Board";
        } else {
          $title[$q] = "Full Board";
        }

        $board[$q] = $value02;
        if (count($data['generalsupplementType'][$value01->id][$key02])!=0 && $data['generalsupplementType'][$value01->id][$key02]!="") {
          $generalsupl[$q] = '<li>'.implode(",", array_unique($data['generalsupplementType'][$value01->id][$key02])).'</li>';
        } else {
          $generalsupl[$q] = '';
        }
        if (count($data['extrabedType'][$value01->id][$key02])!=0 && $data['extrabedType'][$value01->id][$key02]!="") {
          $extrabedType[$q] = '<li>'.implode(",", array_unique($data['extrabedType'][$value01->id][$key02])).'</li>';
        } else {
          $extrabedType[$q] = '';
        }
        if (count($data['nonRefundable'][$value01->id][$key02])!=0 && $data['nonRefundable'][$value01->id][$key02]!="") {
          $nonRefundable[$q] = '<li>'.$data['nonRefundable'][$value01->id][$key02].'</li>';
        } else {
          $nonRefundable[$q] = '';
        }

        if ($data['discount'][$value01->id][$key02]!=0) {
          $oldPrice[$q] = '<small class="mb-0 bold old-price">'.$data['discountAmount'][$value01->id][$key02].'</small>';
        } else {
          $oldPrice[$q] = '';
        }

      }
      $q++;
    }
    // }
  }


  if (count($amountdec)!=0) {
    $Ckey = array_keys($amountdec, min($amountdec))[0];
    
    $return['oldPrice'] = $oldPrice[$Ckey];
    $return['amount'] = $amount[$Ckey];
    $return['RoomName'] = $RoomName[$Ckey];
    $return['occupancy'] = $occupancy[$Ckey];
    $return['icon'] = $icon[$Ckey];
    $return['title'] = $title[$Ckey];
    $return['generalsupl'] = $generalsupl[$Ckey];
    $return['extrabedType'] = $extrabedType[$Ckey];
    $return['nonRefundable'] = $nonRefundable[$Ckey];
    $return['request'] = $request[$Ckey];
    $return['board'] = $board[$Ckey];
    $return['RoomLeft'] = $RoomLeft[$Ckey];
    $return['contract_id'] = $contract_val[$Ckey];
    
    $checkin_date=date_create($_REQUEST['Check_in']);
    $checkout_date=date_create($_REQUEST['Check_out']);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    
    $return['night'] = $tot_days;
    $return['night'] = $tot_days;
  } else {
    $return = 'false';
  }
  return $return;
    // print_r($data);
}
public function max_child_age_get($contract_id) {
  $this->db->select('*');
  $this->db->from('hotel_tbl_contract');
  $this->db->where('contract_id',$contract_id);
  $query = $this->db->get()->result();
  return $query[0]->max_child_age;
}
public function ChangePasswordSubmit($agent_id,$cpassword,$npassword) {
  $this->db->select('*');
  $this->db->from('hotel_tbl_agents');
  $this->db->where('id',$agent_id);
  $this->db->where('password',md5($cpassword));
  $query = $this->db->get()->result();
  if (count($query)!=0) {
    $data= array(
      'password' => md5($npassword),
      'fisrTry' => "0",
      'Updated_By' => $agent_id,
      'Updated_Date' => date('Y-m-d'),
    );
    $this->db->where('id',$agent_id);
    $this->db->update('hotel_tbl_agents',$data);
    $msg = 'success';
  } else {
    $msg = 'is incorrect';
  }
  return $msg;
}
public function ChangePasswordCancel($agent_id) {
  $data= array(
    'fisrTry' => "0",
    'Updated_By' => $agent_id,
    'Updated_Date' => date('Y-m-d'),
  );
  $this->db->where('id',$agent_id);
  $this->db->update('hotel_tbl_agents',$data);
  return true;
}
public function ChangeHotelPassword($cpassword,$npassword,$hotel_id) {
  $this->db->select('*');
  $this->db->from('hotel_tbl_hotels');
  $this->db->where('id',$hotel_id);
  $this->db->where('password',md5($cpassword));
  $query = $this->db->get()->result();
  if (count($query)!=0) {
    $data= array(
      'password' => md5($npassword),
      'password_reset' => "0",
      'Updated_date' => date('Y-m-d'),
    );
    $this->db->where('id',$hotel_id);
    $this->db->update('hotel_tbl_hotels',$data);
    $msg = 'success';
  } else {
    $msg = 'is incorrect';
  }
  return $msg;
}
public function ChangeHotelPasswordCancel($hotel_id) {
  $data= array(
    'password_reset' => "0",
    'Updated_date' => date('Y-m-d'),
  );
  $this->db->where('id',$hotel_id);
  $this->db->update('hotel_tbl_hotels',$data);
  return true;
}
public function contractcheckingwithboard($request,$Adroom=null,$Adcontract=null) {
  $boardRequest = array();
  if (isset($request['RO'])) {
    $boardRequest[] = 'RO';
  }
  if (isset($request['BB'])) {
    $boardRequest[] = 'BB';
  }
  if (isset($request['HB'])) {
    $boardRequest[] = 'HB';
  }
  if (isset($request['FB'])) {
    $boardRequest[] = 'FB';
  }
  $implodeboardRequest = implode("','", $boardRequest);
  $AgentperContract = array();
  $countryperContract = array();
      // Contract Check start
  $contract_id = array();
  $count = array();
  $contractQuery = '';
  if (isset($Adcontract)) {
    $contractQuery = ' AND contract_id = "'.$Adcontract.'"';
  }

  if (count($boardRequest)!=0) {
    $ot = $this->db->query("SELECT contract_id FROM hotel_tbl_contract a WHERE not exists (select 1 from  hotel_agent_permission b where   a.contract_id = b.contract_id and FIND_IN_SET('".$this->session->userdata('agent_id')."', IFNULL(permission,'')) > 0) AND not exists (select 1 from hotel_country_permission c where a.contract_id = c.contract_id and FIND_IN_SET('".substr($this->session->userdata('currency'),0,2)."', IFNULL(permission,'')) > 0) AND from_date <= '".date('Y-m-d',strtotime($request['Check_in']))."' AND to_date > '".date('Y-m-d',strtotime($request['Check_in']))."' AND  from_date < '".date('Y-m-d',strtotime($request['Check_out']))."' AND to_date >= '".date('Y-m-d',strtotime($request['Check_out']))."'  AND hotel_id = '".$request['hotel_id']."' AND board IN ('".$implodeboardRequest."') AND contract_flg  = 1 ".$contractQuery."")->result();
  } else {
    $ot = $this->db->query("SELECT contract_id FROM hotel_tbl_contract a WHERE not exists (select 1 from  hotel_agent_permission b where   a.contract_id = b.contract_id and FIND_IN_SET('".$this->session->userdata('agent_id')."', IFNULL(permission,'')) > 0) AND not exists (select 1 from hotel_country_permission c where a.contract_id = c.contract_id and FIND_IN_SET('".substr($this->session->userdata('currency'),0,2)."', IFNULL(permission,'')) > 0) AND from_date <= '".date('Y-m-d',strtotime($request['Check_in']))."' AND to_date > '".date('Y-m-d',strtotime($request['Check_in']))."' AND  from_date < '".date('Y-m-d',strtotime($request['Check_out']))."' AND to_date >= '".date('Y-m-d',strtotime($request['Check_out']))."' AND hotel_id = '".$request['hotel_id']."' AND  contract_flg  = 1 ".$contractQuery."")->result();

  }

  foreach ($ot as $key5 => $value5) {
    $contract_id[] =  $value5->contract_id;
    $count[] =  $value5->contract_id;
  }

  if (count($count)!=0) {
    $array_uniquecon = array_unique($contract_id);
    foreach ($array_uniquecon as $key10 => $value10) {
      $dataOut['contract_id'][$key10] = $value10;
      $max_child_age = $this->db->query("SELECT max_child_age FROM hotel_tbl_contract WHERE contract_id ='".$value10."'")->result();
      $dataOut['max_child_age'][$key10] = $max_child_age[0]->max_child_age;
    }
    return $dataOut;
  } else {
    return false;
  }
}
public function linkedAllotmentGet($room_id,$allotement_date,$contract_id) {
  $linkedAllotment = 0;
  $LinkedRoom = $this->db->query("SELECT linked_to_room_type FROM hotel_tbl_hotel_room_type WHERE id = '".$room_id."'")->result();

  $linkedContract = $this->db->query("SELECT contract_type,linkedContract FROM hotel_tbl_contract WHERE contract_id = '".$contract_id."'")->result();
  if ($linkedContract[0]->contract_type=="Sub") {
    $contract_id = "CON0".$linkedContract[0]->linkedContract;

  }
  if ($LinkedRoom[0]->linked_to_room_type!="" && $LinkedRoom[0]->linked_to_room_type!=NULL) {
    $linkedRoomAllotment = $this->db->query("SELECT allotement FROM hotel_tbl_allotement WHERE contract_id = '".$contract_id."' AND room_id = '".$LinkedRoom[0]->linked_to_room_type."' AND  allotement_date = '".$allotement_date."'")->result();
    if (count($linkedRoomAllotment)!=0) {
      $linkedAllotment = $linkedRoomAllotment[0]->allotement;
    }
  }
  return $linkedAllotment;
}
public function linkedRoomOverflowCount($room_id,$start_date,$end_date,$contract_id) {
  /*Linked room booking overflow count get start*/
  $LRBCount = 0;
  $LRofcount = 0;

  $lcon_id = array();

  $contractType = $this->db->query("SELECT contract_type,linkedContract FROM hotel_tbl_contract WHERE contract_id = '".$contract_id."'")->result();
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
    $linkedcontract = $this->db->query("SELECT * FROM hotel_tbl_contract WHERE linkedContract = '".str_replace("CON0","",$contract_id)."'")->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  } 
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
    $linkedcontract = $this->db->query("SELECT contract_id,contract_type FROM hotel_tbl_contract WHERE linkedContract = '".str_replace("CON0","",$contractType[0]->linkedContract)."'")->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = "CON0".$contractType[0]->linkedContract;
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  } 

  $LRquery = $this->db->query("SELECT id FROM hotel_tbl_hotel_room_type WHERE linked_to_room_type = '".$room_id."'")->result();

  if (count($LRquery)!=0) {
    $id = $LRquery[0]->id;


    $where = "(check_in BETWEEN '".$start_date."' AND '".$end_date."' OR check_out BETWEEN '".$start_date."' AND '".$end_date."')";


    if (count($lcon_id)!=0) {
      $implodeContract = implode("','", $lcon_id);
      $where1 = " AND contract_id IN ('".$contract_id."','".$implodeContract."')";
    } else {
      $where1 = " AND contract_id = '".$contract_id."'";
    }

    $query = $this->db->query("SELECT book_room_count FROM hotel_tbl_booking WHERE room_id = '".$id."' AND ".$where.$where1." AND booking_flag != 3")->result();
    if (count($query)!=0) {
      foreach ($query as $key => $value) {
        $room_count[] = $value->book_room_count;
      }
      $booking = array_sum($room_count);
    } else {
      $booking = 0;
    }
    $checkin_date=date_create($start_date);
    $checkout_date=date_create($end_date);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a");
    for($i = 0; $i < $tot_days; $i++) {
      $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
    }
    $implode = implode("','",$date);

    $linkedcontract = $this->db->query("SELECT contract_type,linkedContract FROM hotel_tbl_contract WHERE contract_id = '".$contract_id."'")->result();
    if ($linkedcontract[0]->contract_type=="Sub") {
      $Lcontract_id = "CON0".$linkedcontract[0]->linkedContract;
    } else {
      $Lcontract_id = $contract_id;
    }

    $query = $this->db->query("SELECT allotement FROM hotel_tbl_allotement WHERE allotement_date IN ('".$implode."') AND room_id = '".$id."' AND contract_id = '".$Lcontract_id."'")->result();
    if (count($query)!=0) {
      $linkedAllotment = $query[0]->allotement;
      if ($linkedAllotment<$booking) {
       $LRofcount = $booking - $linkedAllotment;
     }
   } 
 }

 /*Linked room booking overflow count get end*/
      // Linked Room booking count start
 $LRBCquery = $this->db->query("SELECT linked_to_room_type FROM hotel_tbl_hotel_room_type WHERE id = '".$room_id."'")->result();
 if ($LRBCquery[0]->linked_to_room_type!="") {
  $where = "(check_in BETWEEN '".$start_date."' AND '".$end_date."' OR check_out BETWEEN '".$start_date."' AND '".$end_date."')";


  if (count($lcon_id)!=0) {
    $implodeContract = implode("','", $lcon_id);
    $where1 = " AND contract_id IN ('".$contract_id."','".$implodeContract."')";
  } else {
    $where1 = " AND contract_id = '".$contract_id."'";
  }

  $query2 = $this->db->query("SELECT book_room_count FROM hotel_tbl_booking WHERE room_id = '".$LRBCquery[0]->linked_to_room_type."' AND ".$where.$where1." AND booking_flag != 3")->result();
  if (count($query2)!=0) {
    foreach ($query2 as $key2 => $value2) {
      $LRBCroom_count[] = $value2->book_room_count;
    }
    $LRBCbooking = array_sum($LRBCroom_count);
  } else {
    $LRBCbooking = 0;
  }
  $LRBCount = $LRBCbooking;
}
      // Linked Room booking count end
return $LRofcount+$LRBCount;
}
public function discountCheck($Check_in,$Check_out,$hotel_id,$room_id,$contract_id) {
  $discount = 0;
  $hotelidCheck = array();
  $contractCheck = array();
  $roomCheck = array();
  $startDate = date('Y-m-d',strtotime($Check_in));
  $endDate = date('Y-m-d',strtotime($Check_out));


  $checkin_date=date_create($startDate);
  $checkout_date=date_create(date('Y-m-d'));
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");


  $query = $this->db->query('SELECT hotelid,contract,room,discount FROM hoteldiscount WHERE Styfrom <= "'.$startDate.'" AND Styto > "'.$startDate.'" AND (BkFrom <= "'.date('Y-m-d').'" AND BkTo > "'.date('Y-m-d').'" OR Bkbefore >= '.$tot_days.') AND Discount_flag = 1 AND discount  = (SELECT MIN(discount) FROM hoteldiscount  WHERE Discount_flag = 1 AND Styfrom <= "'.$startDate.'" AND Styto > "'.$startDate.'" AND (BkFrom <= "'.date('Y-m-d').'" AND BkTo > "'.date('Y-m-d').'" OR Bkbefore >= '.$tot_days.'))')->result();
  if (count($query)!=0) {
    $hotelid = explode(",", $query[0]->hotelid);
    $contract = explode(",", $query[0]->contract);
    $room = explode(",", $query[0]->room);
    foreach ($hotelid as $key => $value) {
      if ($value==$hotel_id) {
        $hotelidCheck[$key] = 1;
      }
    }
    if (array_sum($hotelidCheck)!=0) {
      foreach ($contract as $key1 => $value1) {
        if ($value1==$contract_id) {
          $contractCheck[$key] = 1;
        }
      }
    }
    if (array_sum($hotelidCheck)!=0 && array_sum($contractCheck)!=0) {
      foreach ($room as $key3 => $value3) {
        if ($value3==$room_id) {
          $roomCheck[$key] = 1;
        }
      }
    }
    if (array_sum($hotelidCheck)!=0 && array_sum($contractCheck)!=0 && array_sum($roomCheck)) {
      $discount = $query[0]->discount;
    }
  }
  return $discount;
}
public function getNationality() {
  $this->db->select("*");
  $this->db->from("countries");
  return $query = $this->db->get()->result();
}
public function all_booked_roomDatewise($hotel_id,$room_id,$date,$con_id) {
  $LRofcount = $this->List_Model->overflowcountDatewise($hotel_id,$room_id,$date,$con_id);
  $lcon_id = array();

  $date_split = explode("-", $date);
  if ($date=="") {
    $check_date = $date;
  } else {
    $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
  }

  $this->db->select('*');
  $this->db->from('hotel_tbl_contract');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('contract_id',$con_id);
  $contractType=$this->db->get()->result();
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('linkedContract',str_replace("CON0","",$con_id));
    $linkedcontract=$this->db->get()->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  } 
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('linkedContract',str_replace("CON0","",$contractType[0]->linkedContract));
    $linkedcontract=$this->db->get()->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = "CON0".$contractType[0]->linkedContract;
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  } 


  $this->db->select('*');
  $this->db->from('hotel_tbl_booking');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('room_id',$room_id);
  if (count($lcon_id)!=0) {
    $implodeContract = implode("','", $lcon_id);
    $where = "contract_id IN ('".$con_id."','".$implodeContract."')";
    $this->db->where($where);
  } else {
    $this->db->where('contract_id',$con_id);
  }
  $this->db->where('"'.$check_date.'" >= check_in');
  $this->db->where('"'.$check_date.'" < check_out');
  $this->db->where('booking_flag !=',0);
  $this->db->where('booking_flag !=',3);
  $query=$this->db->get();
      // print_r($this->db->last_query());
      // exit();
  $result = $query->result();
  if (count($result)!=0) {
    foreach ($result as $key => $value) {
      $room_count[] = $value->book_room_count;
    }
    $booking = array_sum($room_count);
  } else {
    $booking = 0;
  }
  return $booking+$LRofcount;
}
public function overflowcountDatewise($hotel_id,$room_id,$date,$con_id) {

  /*Linked room booking overflow count get start*/
  $LRBCount = 0;
  $LRallotement = 0;
  $lcon_id = array();

  $date_split = explode("-", $date);
  if ($date=="") {
    $check_date = $date;
  } else {
    $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
  }

  $this->db->select('*');
  $this->db->from('hotel_tbl_contract');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('contract_id',$con_id);
  $contractType=$this->db->get()->result();
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('linkedContract',str_replace("CON0","",$con_id));
    $linkedcontract=$this->db->get()->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  } 
  if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
    $this->db->select('*');
    $this->db->from('hotel_tbl_contract');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('linkedContract',str_replace("CON0","",$contractType[0]->linkedContract));
    $linkedcontract=$this->db->get()->result();
    if (count($linkedcontract)!=0) {
      foreach ($linkedcontract as $key => $value) {
        if ($value->contract_type=="Sub") {
          $lcon_id[] = "CON0".$contractType[0]->linkedContract;
          $lcon_id[] = $value->contract_id;
        }
      }
    }
  }

  $LRofcount = 0;

  $this->db->select('id');
  $this->db->from('hotel_tbl_hotel_room_type');
  $this->db->where('linked_to_room_type',$room_id);
  $LRquery=$this->db->get()->result();
  if (count($LRquery)!=0) {
    $LRallotement =  $this->List_Model->room_allotement_real($hotel_id,$LRquery[0]->id,$date,$con_id);

    $this->db->select('*');
    $this->db->from('hotel_tbl_booking');
    $this->db->where('hotel_id',$hotel_id);
    $this->db->where('room_id',$LRquery[0]->id);
    if (count($lcon_id)!=0) {
      $implodeContract = implode("','", $lcon_id);
      $where = "contract_id IN ('".$con_id."','".$implodeContract."')";
      $this->db->where($where);
    } else {
      $this->db->where('contract_id',$con_id);
    }
    $this->db->where('"'.$check_date.'" >= check_in');
    $this->db->where('"'.$check_date.'" < check_out');
    $this->db->where('booking_flag !=',0);
    $this->db->where('booking_flag !=',3);
    $LRBquery=$this->db->get()->result();
    if (count($LRBquery)!=0) {
      foreach ($LRBquery as $key1 => $value1) {
        $LRroom_count[] = $value1->book_room_count;
      }
      $LRbooking = array_sum($LRroom_count);
    } else {
      $LRbooking = 0;
    }
    if ($LRallotement<$LRbooking) {
     $LRofcount = $LRbooking - $LRallotement;
   }
 }

 /*Linked room booking overflow count get end*/
      // Linked Room booking count start

 $this->db->select('linked_to_room_type');
 $this->db->from('hotel_tbl_hotel_room_type');
 $this->db->where('id',$room_id);
 $LRBCquery=$this->db->get()->result();

 if ($LRBCquery[0]->linked_to_room_type!="") {
  $this->db->select('*');
  $this->db->from('hotel_tbl_booking');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('room_id',$LRBCquery[0]->linked_to_room_type);
  if (count($lcon_id)!=0) {
    $implodeContract = implode("','", $lcon_id);
    $where = "contract_id IN ('".$con_id."','".$implodeContract."')";
    $this->db->where($where);
  } else {
    $this->db->where('contract_id',$con_id);
  }
  $this->db->where('"'.$check_date.'" >= check_in');
  $this->db->where('"'.$check_date.'" < check_out');
  $this->db->where('booking_flag !=',0);
  $this->db->where('booking_flag !=',3);
  $LRBCquery1=$this->db->get()->result();
  if (count($LRBCquery1)!=0) {
    foreach ($LRBCquery1 as $key2 => $value2) {
      $LRBCroom_count[] = $value2->book_room_count;
    }
    $LRBCbooking = array_sum($LRBCroom_count);
  } else {
    $LRBCbooking = 0;
  }
  $LRBCount = $LRBCbooking;
}
      // Linked Room booking count end

return $LRofcount+$LRBCount;
}
public function room_allotement_real($hotel_id,$room_id,$date,$con_id) {
  $linkedRoomAllotment = 0;

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
    $this->db->where('allotement_date',$date);
    $this->db->where('contract_id',$con_id);
    $query3=$this->db->get();
    $result3 = $query3->result();
    if (count($result3)!=0) {
      $linkedRoomAllotment = $result3[0]->allotement;
    } 
  }

  $this->db->select('*');
  $this->db->from('hotel_tbl_contract');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('contract_id',$con_id);
  $linkedcontract=$this->db->get()->result();
  if ($linkedcontract[0]->contract_type=="Sub") {
    $con_id = "CON0".$linkedcontract[0]->linkedContract;
  }
  $this->db->select('allotement');
  $this->db->from('hotel_tbl_allotement');
  $this->db->where('hotel_id',$hotel_id);
  $this->db->where('room_id',$room_id);
  $this->db->where('allotement_date',$date);
  $this->db->where('contract_id',$con_id);
  $query=$this->db->get();
  $result = $query->result();
  if (count($result)!=0) {
    $allotement = $result[0]->allotement;
  } else {
    $allotement = $result1[0]->allotement;
  }
  return $allotement;
}
/*Existing final search functions start*/
public function search_list_count1($data,$start_price,$end_price) {  
  $checkin_date=date_create($data['Check_in']);
  $checkout_date=date_create($data['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  for($i = 0; $i < $tot_days; $i++) {
    $idate[$i] = date('Y-m-d', strtotime($data['Check_in']. ' + '.$i.'  days'));
  }
  $idate = implode("','", $idate);
  $this->db->select("hotel_tbl_hotels.hotel_name,hotel_tbl_contract.hotel_id,
    hotel_tbl_hotel_room_type.room_name,
    hotel_tbl_allotement.room_id,
    hotel_tbl_hotel_room_type.occupancy,
    hotel_tbl_hotel_room_type.occupancy_child,
    hotel_tbl_hotel_room_type.standard_capacity,
    hotel_tbl_hotel_room_type.max_total,
    hotel_tbl_contract.contract_id,
    hotel_tbl_hotel_room_type.linked_to_room_type,
    hotel_tbl_contract.board, 
    hotel_tbl_allotement.allotement,
    (SELECT count(book_room_count) FROM hotel_tbl_booking WHERE room_id = hotel_tbl_allotement.room_id AND check_in <= '".date('m/d/Y',strtotime($data['Check_in']))."' AND check_out > '".date('m/d/Y',strtotime($data['Check_in']))."') as booked_room,
    count(hotel_tbl_allotement.room_id) as room_count ,
    hotel_tbl_contract.board,
    (SELECT distinct(allotement) FROM hotel_tbl_allotement WHERE allotement_date = hotel_tbl_allotement.allotement_date AND room_id = hotel_tbl_hotel_room_type.linked_to_room_type AND contract_id = hotel_tbl_contract.contract_id) as linkedRoom_alt");

  $this->db->from('hotel_tbl_hotels');
  $this->db->join('hotel_tbl_contract','hotel_tbl_contract.hotel_id = hotel_tbl_hotels.id', 'inner');
  $this->db->join('hotel_tbl_allotement','hotel_tbl_allotement.contract_id = hotel_tbl_contract.contract_id', 'left');
  $this->db->join('hotel_agent_permission','hotel_agent_permission.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_country_permission','hotel_country_permission.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_tbl_minimumstay','hotel_tbl_minimumstay.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_allotement.room_id', 'left');
  $this->db->join('hotel_tbl_closeout_period','hotel_tbl_closeout_period.closedDate = hotel_tbl_allotement.allotement_date AND hotel_tbl_closeout_period.contract_id = hotel_tbl_allotement.contract_id AND FIND_IN_SET(hotel_tbl_allotement.room_id, IFNULL(hotel_tbl_closeout_period.roomType,"")) != 0','left');
  if (!empty($data['location'])) {
    $explode_search = explode(" ", str_replace('/ ','',str_replace("- " ,'', $data['location'])));

          // $explode_search = explode(" ", $data['location']." ");
    foreach ($explode_search as $key8 => $value8) {
      if (!empty($value8)) {
        $search = "(hotel_tbl_hotels.location LIKE '%".$value8."%' OR hotel_tbl_hotels.keywords LIKE '%".$value8."%' OR hotel_tbl_hotels.city LIKE '%".$value8."%')";
      }
    }
    $this->db->where($search);
  }
  $this->db->where('hotel_tbl_allotement.contract_id !=','');
  $this->db->where('hotel_tbl_contract.contract_flg',1);
  $this->db->where('hotel_tbl_contract.from_date <=',''.date('Y-m-d',strtotime($data['Check_in'])).'');
  $this->db->where('hotel_tbl_contract.to_date >=',''.date('Y-m-d',strtotime($data['Check_in'])).'');
  $this->db->where('hotel_tbl_contract.from_date <=',''.date('Y-m-d',strtotime($data['Check_out'])).'');
  $this->db->where('hotel_tbl_contract.to_date >=',''.date('Y-m-d',strtotime($data['Check_out'])).'');
  $this->db->where_in('hotel_tbl_allotement.allotement_date',''.$idate.'');
  $this->db->where('hotel_tbl_allotement.allotement !=',0);
  $this->db->where("DATEDIFF(hotel_tbl_allotement.allotement_date,'".date('Y-m-d')."') >=",' hotel_tbl_allotement.cut_off');
  $this->db->where("FIND_IN_SET(74, IFNULL(hotel_agent_permission.permission,'')) = 0");
  $this->db->where("FIND_IN_SET('IN', IFNULL(hotel_country_permission.permission,'')) = 0");
  $this->db->where("FIND_IN_SET(0, IFNULL(hotel_tbl_contract.nationalityPermission,'')) = 0");
  $this->db->where("IFNULL(hotel_tbl_minimumstay.minDay,1) >= 1");
  $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
  $this->db->where('hotel_tbl_allotement.amount !=',0);
  $this->db->where("IFNULL(hotel_tbl_closeout_period.closedDate,'') = ''");
  foreach ($data['adults'] as $key77 => $value77) {
    $this->db->where('(hotel_tbl_hotel_room_type.max_total >= 2 OR hotel_tbl_hotel_room_type.occupancy >= 2 OR hotel_tbl_hotel_room_type.occupancy_child >= 0)');
  }
  $reqRo = "";
  $reqBB = "";
  $reqHB = "";
  $reqFB = "";
  if(isset($data['RO'])) {
    $reqRo = "RO";
  }
  if(isset($data['BB'])) {
    $reqBB = "BB";
  }
  if(isset($data['HB'])) {
    $reqHB = "HB";
  } 
  if(isset($data['FB'])) {
    $reqFB = "FB";
  }
  if (isset($data["RO"]) || isset($data["BB"]) || isset($data["HB"]) || isset($data["FB"])) {
    $whereBoard = "(hotel_tbl_contract.board = '$reqRo' OR hotel_tbl_contract.board = '$reqBB' OR hotel_tbl_contract.board = '$reqHB' OR hotel_tbl_contract.board = '$reqFB')";
    $this->db->where($whereBoard);
  }

  if ($data['guest_rating']!="") {
    $this->db->where('hotel_tbl_hotels.ceil_starsrating',$data["guest_rating"]);
  }
  $rate1 = "";
  $rate2 = "";
  $rate3 = "";
  $rate4 = "";
  $rate5 = "";
  $rate10 = "";
  if (isset($data["rating5"])) {
    $rate5 = "5";
  }
  if (isset($data["rating4"])) {
    $rate4 = "4";
  }
  if (isset($data["rating3"])) {
    $rate3 = "3";
  }
  if (isset($data["rating2"])) {
    $rate2 = "2";
  }
  if (isset($data["rating1"])) {
    $rate1 = "1";
  }
  if (isset($data["rating10"])) {
    $rate10 = "10";
  }
  if (isset($data["rating5"]) || isset($data["rating4"]) || isset($data["rating3"]) || isset($data["rating2"]) || isset($data["rating1"]) || isset($data["rating10"])) {
    $where = "(hotel_tbl_hotels.rating = '$rate1' OR hotel_tbl_hotels.rating = '$rate2' OR hotel_tbl_hotels.rating = '$rate3' OR hotel_tbl_hotels.rating = '$rate4' OR hotel_tbl_hotels.rating = '$rate5' OR hotel_tbl_hotels.rating = '$rate10')";
    $this->db->where($where);
  }
  if (isset($data['preference'])) {
    foreach ($data['preference'] as $key => $value) {
      $this->db->like('hotel_tbl_hotels.hotel_facilities',$value);
    }
  }


  $this->db->group_by('hotel_tbl_allotement.hotel_id');
  $this->db->having('room_count >=',2);
  $this->db->having('(allotement+IFNULL(linkedRoom_alt,0))-booked_room >',0);
  $query=$this->db->get();
  return $query->num_rows();
}
public function search_list1($limit, $start, $data,$start_price,$end_price) { 
  $checkin_date=date_create($data['Check_in']);
  $checkout_date=date_create($data['Check_out']);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  for($i = 0; $i < $tot_days; $i++) {
    $idate[$i] = date('Y-m-d', strtotime($data['Check_in']. ' + '.$i.'  days'));
  }
  $idate = implode("','", $idate);

  $this->db->select("hotel_tbl_hotels.hotel_name,hotel_tbl_contract.hotel_id,
    hotel_tbl_hotels.hotel_description,hotel_tbl_hotels.hotel_facilities,
    hotel_tbl_hotels.promoteList,hotel_tbl_hotels.rating,hotel_tbl_hotels.Image1,hotel_tbl_hotels.reviews,hotel_tbl_hotels.starsrating,
    hotel_tbl_allotement.room_id,hotel_tbl_allotement.room_id as BookroomId,hotel_tbl_contract.board,
    hotel_tbl_contract.contract_id,hotel_tbl_allotement.allotement,
    hotel_tbl_hotel_room_type.linked_to_room_type,
    (SELECT count(book_room_count) FROM hotel_tbl_booking WHERE room_id = hotel_tbl_allotement.room_id AND check_in <= '".date('m/d/Y',strtotime($data['Check_in']))."' AND check_out > '".date('m/d/Y',strtotime($data['Check_in']))."') as booked_room,
    count(hotel_tbl_allotement.room_id) as room_count ,
    hotel_tbl_contract.board,hotel_tbl_hotel_room_type.room_name as RoomName,
    (SELECT distinct(allotement) FROM hotel_tbl_allotement WHERE allotement_date = hotel_tbl_allotement.allotement_date AND room_id = hotel_tbl_hotel_room_type.linked_to_room_type AND contract_id = hotel_tbl_contract.contract_id) as linkedRoom_alt");

  $this->db->from('hotel_tbl_hotels');
  $this->db->join('hotel_tbl_contract','hotel_tbl_contract.hotel_id = hotel_tbl_hotels.id', 'inner');
  $this->db->join('hotel_tbl_allotement','hotel_tbl_allotement.contract_id = hotel_tbl_contract.contract_id', 'left');
  $this->db->join('hotel_agent_permission','hotel_agent_permission.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_country_permission','hotel_country_permission.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_tbl_minimumstay','hotel_tbl_minimumstay.contract_id = hotel_tbl_allotement.contract_id', 'left');
  $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_allotement.room_id', 'left');
  $this->db->join('hotel_tbl_closeout_period','hotel_tbl_closeout_period.closedDate = hotel_tbl_allotement.allotement_date AND hotel_tbl_closeout_period.contract_id = hotel_tbl_allotement.contract_id AND FIND_IN_SET(hotel_tbl_allotement.room_id, IFNULL(hotel_tbl_closeout_period.roomType,"")) != 0','left');
  if (!empty($data['location'])) {
    $explode_search = explode(" ", str_replace('/ ','',str_replace("- " ,'', $data['location'])));

          // $explode_search = explode(" ", $data['location']." ");
    foreach ($explode_search as $key8 => $value8) {
      if (!empty($value8)) {
        $search = "(hotel_tbl_hotels.location LIKE '%".$value8."%' OR hotel_tbl_hotels.keywords LIKE '%".$value8."%' OR hotel_tbl_hotels.city LIKE '%".$value8."%')";
      }
    }
    $this->db->where($search);
  }
  $this->db->where('hotel_tbl_allotement.contract_id !=','');
  $this->db->where('hotel_tbl_contract.contract_flg',1);
  $this->db->where('hotel_tbl_contract.from_date <=',''.date('Y-m-d',strtotime($data['Check_in'])).'');
  $this->db->where('hotel_tbl_contract.to_date >=',''.date('Y-m-d',strtotime($data['Check_in'])).'');
  $this->db->where('hotel_tbl_contract.from_date <=',''.date('Y-m-d',strtotime($data['Check_out'])).'');
  $this->db->where('hotel_tbl_contract.to_date >=',''.date('Y-m-d',strtotime($data['Check_out'])).'');
  $this->db->where('hotel_tbl_allotement.allotement !=',0);
  $this->db->where("DATEDIFF(hotel_tbl_allotement.allotement_date,'".date('Y-m-d')."') >=",' hotel_tbl_allotement.cut_off');
  $this->db->where("FIND_IN_SET(74, IFNULL(hotel_agent_permission.permission,'')) = 0");
  $this->db->where("FIND_IN_SET('IN', IFNULL(hotel_country_permission.permission,'')) = 0");
  $this->db->where("FIND_IN_SET(0, IFNULL(hotel_tbl_contract.nationalityPermission,'')) = 0");
  $this->db->where("IFNULL(hotel_tbl_minimumstay.minDay,1) >= 1");
  $this->db->where('hotel_tbl_hotel_room_type.delflg',1);
  $this->db->where('hotel_tbl_allotement.amount !=',0);
  $this->db->where("IFNULL(hotel_tbl_closeout_period.closedDate,'') = ''");
  foreach ($data['adults'] as $key77 => $value77) {
    $this->db->where('(hotel_tbl_hotel_room_type.max_total >= 2 OR hotel_tbl_hotel_room_type.occupancy >= 2 OR hotel_tbl_hotel_room_type.occupancy_child >= 0)');
  }
  $reqRo = "";
  $reqBB = "";
  $reqHB = "";
  $reqFB = "";
  if(isset($data['RO'])) {
    $reqRo = "RO";
  }
  if(isset($data['BB'])) {
    $reqBB = "BB";
  }
  if(isset($data['HB'])) {
    $reqHB = "HB";
  } 
  if(isset($data['FB'])) {
    $reqFB = "FB";
  }
  if (isset($data["RO"]) || isset($data["BB"]) || isset($data["HB"]) || isset($data["FB"])) {
    $whereBoard = "(hotel_tbl_contract.board = '$reqRo' OR hotel_tbl_contract.board = '$reqBB' OR hotel_tbl_contract.board = '$reqHB' OR hotel_tbl_contract.board = '$reqFB')";
    $this->db->where($whereBoard);
  }

  if ($data['guest_rating']!="") {
    $this->db->where('hotel_tbl_hotels.ceil_starsrating',$data["guest_rating"]);
  }
  $rate1 = "";
  $rate2 = "";
  $rate3 = "";
  $rate4 = "";
  $rate5 = "";
  $rate10 = "";
  if (isset($data["rating5"])) {
    $rate5 = "5";
  }
  if (isset($data["rating4"])) {
    $rate4 = "4";
  }
  if (isset($data["rating3"])) {
    $rate3 = "3";
  }
  if (isset($data["rating2"])) {
    $rate2 = "2";
  }
  if (isset($data["rating1"])) {
    $rate1 = "1";
  }
  if (isset($data["rating10"])) {
    $rate10 = "10";
  }
  if (isset($data["rating5"]) || isset($data["rating4"]) || isset($data["rating3"]) || isset($data["rating2"]) || isset($data["rating1"]) || isset($data["rating10"])) {
    $where = "(hotel_tbl_hotels.rating = '$rate1' OR hotel_tbl_hotels.rating = '$rate2' OR hotel_tbl_hotels.rating = '$rate3' OR hotel_tbl_hotels.rating = '$rate4' OR hotel_tbl_hotels.rating = '$rate5' OR hotel_tbl_hotels.rating = '$rate10')";
    $this->db->where($where);
  }
  if (isset($data['preference'])) {
    foreach ($data['preference'] as $key => $value) {
      $this->db->like('hotel_tbl_hotels.hotel_facilities',$value);
    }
  }

  if (isset($data['name_order']) && isset($data['price_order'])) {
    if ($data['name_order']=="1") {
      $name_order = 'hotel_tbl_hotels.hotel_name asc';
    } else {
      $name_order = 'hotel_tbl_hotels.hotel_name desc';
    }
    $order_by = 'hotel_tbl_hotels.promoteList  desc,'.$name_order.'';
  } else if(isset($data['name_order']) || !isset($data['price_order'])) {
    if ($data['name_order']=="1") {
      $name_order = 'hotel_tbl_hotels.hotel_name asc';
    } else {
      $name_order = 'hotel_tbl_hotels.hotel_name desc';
    }
    $order_by = 'hotel_tbl_hotels.promoteList  desc,'.$name_order.',';
  } else if(!isset($data['name_order']) || isset($data['price_order'])) {
    $order_by = 'hotel_tbl_hotels.promoteList  desc';
  } else {
    $order_by = 'hotel_tbl_hotels.promoteList  desc';
  }
  $this->db->order_by($order_by);


  $this->db->group_by('hotel_tbl_allotement.hotel_id');
  $this->db->having('room_count >=',2);
  $this->db->having('(allotement+IFNULL(linkedRoom_alt,0))-booked_room >',0);
  $this->db->limit($limit, $start);
  $query=$this->db->get();
  print_r($this->db->last_query());
  exit();
  return $query->result();
}
/*Existing final search function end*/
public function xmlrequest($request) {
    $status = $this->db->query('select xmlproviderFlg from xml_providers_tbl where id = 1')->result();
    $TBOFlg = isset($status[0]->xmlproviderFlg) ? $status[0]->xmlproviderFlg : 0;
    $Room1ChildAges='';
    $Room2ChildAges='';
    $Room3ChildAges='';
    $Room4ChildAges='';
    $Room5ChildAges='';
    $Room6ChildAges='';
    $Room7ChildAges='';
    $Room8ChildAges='';
    $Room9ChildAges='';
    $Room10ChildAges='';

    if ($_REQUEST['Check_in']!='') {
      $checkin = $_REQUEST['Check_in'];
    }
    if($_REQUEST['Check_out']!='') {
      $checkout=$_REQUEST['Check_out'];
    }
    if ($_REQUEST['adults']!='') {
      $adults = implode(",", $_REQUEST['adults']) ;
    }
    if ($_REQUEST['Child']!='') {
      $child = implode(",", $_REQUEST['Child']) ;
    }
    if ($_REQUEST['Child'][0]!=0 && isset($_REQUEST['room1-childAge'])) {
      $Room1ChildAges = implode(",", $_REQUEST['room1-childAge']) ;
    }
    if (isset($_REQUEST['Child'][1]) && $_REQUEST['Child'][1]!=0) {
      $Room2ChildAges = implode(",", $_REQUEST['room2-childAge']) ;
    }
    if (isset($_REQUEST['Child'][2]) &&  $_REQUEST['Child'][2]!=0) {
      $Room3ChildAges = implode(",", $_REQUEST['room3-childAge']) ;
    }
    if (isset($_REQUEST['Child'][3]) &&  $_REQUEST['Child'][3]!=0) {
      $Room4ChildAges = implode(",", $_REQUEST['room4-childAge']) ;
    }
    if (isset($_REQUEST['Child'][4]) &&  $_REQUEST['Child'][4]!=0) {
      $Room5ChildAges = implode(",", $_REQUEST['room5-childAge']) ;
    }
    if (isset($_REQUEST['Child'][5]) &&  $_REQUEST['Child'][5]!=0) {
      $Room6ChildAges = implode(",", $_REQUEST['room6-childAge']) ;
    }
    if (isset($_REQUEST['Child'][6]) &&  $_REQUEST['Child'][6]!=0) {
      $Room7ChildAges = implode(",", $_REQUEST['room7-childAge']) ;
    }
    if (isset($_REQUEST['Child'][7]) &&  $_REQUEST['Child'][7]!=0) {
      $Room8ChildAges = implode(",", $_REQUEST['room8-childAge']) ;
    }
    if (isset($_REQUEST['Child'][8]) &&  $_REQUEST['Child'][8]!=0) {
      $Room9ChildAges = implode(",", $_REQUEST['room9-childAge']) ;
    }
    if (isset($_REQUEST['Child'][9]) &&  $_REQUEST['Child'][9]!=0) {
      $Room10ChildAges = implode(",", $_REQUEST['room10-childAge']) ;
    }


  $nationality = $this->db->query('SELECT sortname FROM countries where id = '.$request['nationality'].'')->result();
  $nationality = $nationality[0]->sortname;

    foreach ($_REQUEST['adults'] as $key => $value) {
      if (!isset($_REQUEST['Child'][$key]) || $_REQUEST['Child'][$key]=="") {
        $_REQUEST['Child'][$key] = 0;
      }
      $childAge  = array();
      if ($_REQUEST['Child'][$key]!=0) {
          for ($i=1; $i <= $_REQUEST['Child'][$key] ; $i++) { 
            foreach ($_REQUEST['room'.($key+1).'-childAge'] as $reCAkey => $reCAvalue) {
              $childAge[$reCAkey] = [
                    "ChildAge" => [
                      "value" => [
                        "int" => [
                          "value" => $reCAvalue
                        ]
                      ]
                    ]
                  ];
            }
          }

        }
      $RoomGuest[] = ["RoomGuest"=>[
                          "attr"=>[
                              "AdultCount"=>$value,
                              "ChildCount"=> $_REQUEST['Child'][$key]
                          ],
                          "value"=> $childAge
                      ]];
    }


 // $HotelNameReq =  
  $inp_arr_hotel = [
      "CheckInDate"=>[
          "value"=>date('Y-m-d',strtotime($request['Check_in']))
      ],
      "CheckOutDate"=>[
          "value"=>date('Y-m-d',strtotime($request['Check_out']))
      ],
      "CountryName"=>[
          "value"=>$request['countryname']
      ],
      "CityName"=>[
          "value"=>$request['cityname']
      ],
      "CityId"=>[
          "value"=>$request['citycode']
      ],
      "IsNearBySearchAllowed"=>[
          "value"=>'false'
      ],
      "NoOfRooms"=>[
          "value"=>count($_REQUEST['adults'])
      ],
      "GuestNationality"=>[
          "value"=>$nationality
      ],
      "RoomGuests"=>[
          "value"=>
          $RoomGuest
      ],
      "PreferredCurrencyCode" =>[
          "value"=>agent_currency()
      ],
      "ResultCount" => [
          "value" => 0
      ],
      "Filters" => [
          "value" => [
              "HotelName" =>[
                "value"=>$request['hotel_name']
              ],
              "StarRating" =>[
                  "value"=>"All"
              ],
              "OrderBy" =>[
                  "value"=>"PriceAsc"
              ]
          ]
      ],
      "ResponseTime" => [
            "value" => 0
        ]
  ];
  $return = array();

  if ($TBOFlg==1) {
  // $Tbohotels = $this->HotelSearch($inp_arr_hotel);
    
    $revenue_markup = xmlrevenue_markup('tbo',$this->session->userdata('agent_id'));
    $total_markup = mark_up_get()+general_mark_up_get();
    if ($revenue_markup!=0) {
      $total_markup = mark_up_get()+$revenue_markup;
    }
    $Tbohotels = $this->HotelSearch($inp_arr_hotel);
      // echo "<br>";
      // echo "<br>";
    if (isset($Tbohotels['Status']['StatusCode']) && $Tbohotels['Status']['StatusCode']==01) {
      if (isset($Tbohotels['HotelResultList']['HotelResult'][1])) {
        foreach ($Tbohotels['HotelResultList']['HotelResult'] as $key => $value) {
              // print_r($value);
              // echo "<br>";
              // echo "<br>";
            $return[$key]['resultindex'] = $value['ResultIndex'];
            $return[$key]['sessionid'] = $Tbohotels['SessionId'];
            $return[$key]['HotelCode'] = $value['HotelInfo']['HotelCode'];
            $return[$key]['HotelName'] = $value['HotelInfo']['HotelName'];
            $return[$key]['HotelAddress'] = $value['HotelInfo']['HotelAddress'];
            $return[$key]['HotelPicture'] = isset($value['HotelInfo']['HotelPicture']) ? $value['HotelInfo']['HotelPicture'] : '';
            $return[$key]['HotelDescription'] = $value['HotelInfo']['HotelDescription'];
            if ($value['HotelInfo']['Rating']=="FiveStar") {
              $star = 5;
            } 
            if ($value['HotelInfo']['Rating']=="FourStar") {
              $star = 4;
            } 
            if ($value['HotelInfo']['Rating']=="ThreeStar") {
              $star = 3;
            } 
            if ($value['HotelInfo']['Rating']=="TwoStar") {
              $star = 2;
            }
            if ($value['HotelInfo']['Rating']=="OneStar") {
              $star = 1;
            }
            $return[$key]['Rating'] = $star;
            

            $TotalPrice = $value['MinHotelPrice']['@attributes']['TotalPrice'];

            $TotalPrice = ($TotalPrice*$total_markup/100)+$TotalPrice;

            $return[$key]['TotalPrice'] = xml_currency_change($TotalPrice,$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());
            $return[$key]['oldPrice'] = 0;
            $return[$key]['Currency'] = agent_currency();
            $return[$key]['OriginalPrice'] = xml_currency_change($TotalPrice,$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());
            if (!isset($value['HotelInfo']['TripAdvisorRating'])) {
              $value['HotelInfo']['TripAdvisorRating'] = '0.0';
            }
            $return[$key]['RatingImg'] = '<img src="'.base_url().'skin/images/filter-rating-'.$star.$star.'.png" class="hotel-rating" alt="">';
            $return[$key]['ReviewImg'] = base_url().'skin/images/ta-rating-'.ceil($value['HotelInfo']['TripAdvisorRating']).'.png';
            $return[$key]['DataType'] = 'TBO';
            $return[$key]['reviews'] = ceil($value['HotelInfo']['TripAdvisorRating']);

          $RoomIndex = 1;

            $return[$key]['BookBtn'] = '<a style="background:green;border-bottom: 2px solid green;cursor:pointer;" onclick="getdetails('.$RoomIndex.','.$value['HotelInfo']['HotelCode'].',\''.str_replace("'", "", $value['HotelInfo']['HotelName']).'\',\''.str_replace("'", "", $value['HotelInfo']['HotelAddress']).'\',\''. $return[$key]['HotelPicture'].'\','.$return[$key]['Rating'] = $star.',\''.$RoomName.'\',\''.$Tbohotels['SessionId'].'\',\''.$return[$key]['resultindex'].'\')"  class="hotel-view-btn">Book</a>';
            $return[$key]['HotelRequest'] = base_url().'hoteldetails?search_id='.$value['HotelInfo']['HotelCode'].'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id=&nationality='.$_REQUEST['nationality'].'&providers=TBO&countryname='.$request['countryname'].'&cityname='.$request['cityname'].'&citycode='.$request['citycode'];

        }
      } else {
        $value = $Tbohotels['HotelResultList']['HotelResult'];
        $return[0]['resultindex'] = $value['ResultIndex'];
        $return[0]['HotelCode'] = $value['HotelInfo']['HotelCode'];
        $return[0]['HotelName'] = $value['HotelInfo']['HotelName'];
        $return[0]['HotelPicture'] = isset($value['HotelInfo']['HotelPicture']) ? $value['HotelInfo']['HotelPicture'] : '';
        $return[0]['HotelDescription'] = $value['HotelInfo']['HotelDescription'];
        if ($value['HotelInfo']['Rating']=="FiveStar") {
          $star = 5;
        } 
        if ($value['HotelInfo']['Rating']=="FourStar") {
          $star = 4;
        } 
        if ($value['HotelInfo']['Rating']=="ThreeStar") {
          $star = 3;
        } 
        if ($value['HotelInfo']['Rating']=="TwoStar") {
          $star = 2;
        }
        if ($value['HotelInfo']['Rating']=="OneStar") {
          $star = 1;
        }
        $return[0]['Rating'] = $star;
        $TotalPrice = $value['MinHotelPrice']['@attributes']['TotalPrice'];

        $TotalPrice = ($TotalPrice*$total_markup/100)+$TotalPrice;


        $return[0]['TotalPrice'] = xml_currency_change($TotalPrice,$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());
        $return[0]['oldPrice'] = 0;   
        $return[0]['Currency'] = agent_currency();
        $return[0]['OriginalPrice'] = xml_currency_change($TotalPrice,$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());

        if (!isset($value['HotelInfo']['TripAdvisorRating'])) {
          $value['HotelInfo']['TripAdvisorRating'] = '0.0';
        }
        $return[0]['RatingImg'] = '<img src="'.base_url().'skin/images/filter-rating-'.$star.$star.'.png" class="hotel-rating" alt="">';
        $return[0]['ReviewImg'] = base_url().'skin/images/ta-rating-'.ceil($value['HotelInfo']['TripAdvisorRating']).'.png';
        $return[0]['DataType'] = 'TBO';
        $return[0]['reviews'] = ceil($value['HotelInfo']['TripAdvisorRating']);
        $RoomIndex = 1;
        $return[0]['BookBtn'] = '<a style="background:green;border-bottom: 2px solid green;cursor:pointer;"  onclick="getdetails('.$RoomIndex.','.$value['HotelInfo']['HotelCode'].',\''.str_replace("'", "", $value['HotelInfo']['HotelName']).'\',\''.str_replace("'", "", $value['HotelInfo']['HotelAddress']).'\',\''. $return[0]['HotelPicture'].'\','.$return[0]['Rating'] = $star.',\''.$return['RoomName'][0].'\',\''.$Tbohotels['SessionId'].'\''.$return[0]['resultindex'].'\')"  class="hotel-view-btn">Book</a>';
        $return[0]['HotelRequest'] = base_url().'hoteldetails?search_id='.$value['HotelInfo']['HotelCode'].'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id=&nationality='.$_REQUEST['nationality'].'&providers=TBO&countryname='.$request['countryname'].'&cityname='.$request['cityname'].'&citycode='.$request['citycode'];
      }
    }
  }
  return $return;
}
public function loadRequest($action,$arr_value) {
    $this->db->select("*");
    $this->db->from('xml_providers_tbl');
    $this->db->where('Name','TBO');
    $query = $this->db->get()->result();
    $this->xml = new DOMDocument("1.0", "UTF-8");
    $xml_env = $this->xml->createElement("soap:Envelope");
    $xml_env->setAttribute("xmlns:soap", "http://www.w3.org/2003/05/soap-envelope");
    $xml_env->setAttribute("xmlns:hot", "http://TekTravel/HotelBookingApi");

    /*create header*/
    $xml_hed = $this->xml->createElement("soap:Header");
    $xml_hed->setAttribute("xmlns:wsa", "http://www.w3.org/2005/08/addressing");

    $xml_cred = $this->xml->createElement("hot:Credentials");
    $xml_cred->setAttribute("UserName", $query[0]->UserName);
    $xml_cred->setAttribute("Password", $query[0]->password);

    $xml_wsaa = $this->xml->createElement("wsa:Action", "http://TekTravel/HotelBookingApi/$action");
    $xml_wsat = $this->xml->createElement("wsa:To", $query[0]->url);

    $xml_hed->appendChild($xml_cred);
    $xml_hed->appendChild($xml_wsaa);
    $xml_hed->appendChild($xml_wsat);

    $xml_env->appendChild($xml_hed);

    /*create body*/
    $xml_bdy = $this->xml->createElement("soap:Body");
    if ($action=="AvailableHotelRooms") {
      $xml_bdyreq= $this->xml->createElement("hot:HotelRoomAvailabilityRequest");
    } else {
      $xml_bdyreq= $this->xml->createElement("hot:$action"."Request");
    }
    

    foreach ($arr_value as $key => $value ) {
        $this->recursion($key,$value,$xml_bdyreq);
    }


    $xml_bdy->appendChild($xml_bdyreq);
    $xml_env->appendChild($xml_bdy);

    $this->xml->appendChild($xml_env);
    $request = $this->xml->saveXML();
    // print_r(htmlentities($request));
    // exit();
    $location = "https://api.tbotechnology.in/hotelapi_v7/hotelservice.svc";
    $action = "http://TekTravel/HotelBookingApi/$action";
    $restore = error_reporting(0);
    $result = '';
     try {
      $client = new SoapClient("https://api.tbotechnology.in/hotelapi_v7/hotelservice.svc?wsdl", ['exceptions' => true]);
      $this->result = $client->__doRequest($request, $location, $action, 2);
      $result = $this->result;
      // print_r(htmlentities($result));exit;
    } catch (SoapFault $exception) {
       return true;
    }
    return $result;
  }
  public function recursion($key,$value,&$xml_elem) {

      $attr = (isset($value['attr'])) ? $value['attr'] : null;
      $value['value'] = (isset($value['value'])) ? $value['value'] : '';
      if (is_array($value['value'])) {
          $xml_bdyreqele = $this->xml->createElement("hot:$key");
          if ($attr) {
              foreach ($attr as $k => $v) {
                  $xml_bdyreqele->setAttribute($k, $v);
              }
          }
          foreach ($value['value'] as $key2 => $value2) {
                  
              if (is_numeric($key2)) {
                $this->recursion(array_keys($value2)[0],array_values($value2)[0],$xml_bdyreqele);
              } else {
                $this->recursion($key2,$value2,$xml_bdyreqele);
              }
          }
          $xml_elem->appendChild($xml_bdyreqele);
      } else {
          $xml_bdyreqele = $this->xml->createElement("hot:$key", htmlspecialchars($value['value']));
          if ($attr) {
              foreach ($attr as $k => $v) {
                  $xml_bdyreqele->setAttribute($k, $v);
              }
          }
          $xml_elem->appendChild($xml_bdyreqele);
      }
  }
  public function HotelSearch($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  private function responseTemplate($function,$arg=[]){
    if ($function=="AvailableHotelRooms") {
      $this->array_key_search($this->xmlstr_to_array($this->loadRequest($function,$arg)),'HotelRoomAvailabilityResponse');
    } else {
      $this->array_key_search($this->xmlstr_to_array($this->loadRequest($function,$arg)),$function.'Response');
    }

  }
  private function array_key_search($array,$key){
      foreach($array as $k => $v){
          if($k == $key){
              $this->result = $array[$k];
              break;
          } else {
              if(is_array($v)){
                  $this->array_key_search($v,$key);
              }
          }
      }

  }
  private function xmlstr_to_array($xmlstr) {
      $doc = new DOMDocument();
      $doc->loadXML($xmlstr);
      return $this->domnode_to_array($doc->documentElement);
  }
  private function domnode_to_array($node) {
        $output = array();
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = $this->domnode_to_array($child);
                    if(isset($child->tagName)) {
                        $t = $child->tagName;
                        if(!isset($output[$t])) {
                            $output[$t] = array();
                        }
                        $output[$t][] = $v;
                    }
                    elseif($v) {
                        $output = (string) $v;
                    }
                }
                if(is_array($output)) {
                    if($node->attributes->length) {
                        $a = array();
                        foreach($node->attributes as $attrName => $attrNode) {
                            $a[$attrName] = (string) $attrNode->value;
                        }
                        $output['@attributes'] = $a;
                    }
                    foreach ($output as $t => $v) {
                        if(is_array($v) && count($v)==1 && $t!='@attributes') {
                            $output[$t] = $v[0];
                        }
                    }
                }
                break;
        }
        return $output;
  }
  public function CountryList(){
      $this->responseTemplate(__FUNCTION__);
      return $this->result;
  }
  public function  DestinationCityList($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function HotelSearchWithRooms($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function AvailableHotelRooms($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function AvailabilityAndPricing($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function HotelCancellationPolicy($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function HotelBook($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function HotelBookingDetail($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function HotelCancel($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function Amendment($arg){
      $this->responseTemplate(__FUNCTION__,$arg);
      return $this->result;
  }
  public function singleHotelDetails($hotelid) {
    $Room1ChildAges='';
    $Room2ChildAges='';
    $Room3ChildAges='';
    $Room4ChildAges='';
    $Room5ChildAges='';
    $Room6ChildAges='';
    $Room7ChildAges='';
    $Room8ChildAges='';
    $Room9ChildAges='';
    $Room10ChildAges='';

    if ($_REQUEST['Check_in']!='') {
      $checkin = $_REQUEST['Check_in'];
    }
    if($_REQUEST['Check_out']!='') {
      $checkout=$_REQUEST['Check_out'];
    }
    if ($_REQUEST['adults']!='') {
      $adults = implode(",", $_REQUEST['adults']) ;
    }
    if ($_REQUEST['Child']!='') {
      $child = implode(",", $_REQUEST['Child']) ;
    }
    if ($_REQUEST['Child'][0]!=0 && isset($_REQUEST['room1-childAge'])) {
      $Room1ChildAges = implode(",", $_REQUEST['room1-childAge']) ;
    }
    if (isset($_REQUEST['Child'][1]) && $_REQUEST['Child'][1]!=0) {
      $Room2ChildAges = implode(",", $_REQUEST['room2-childAge']) ;
    }
    if (isset($_REQUEST['Child'][2]) &&  $_REQUEST['Child'][2]!=0) {
      $Room3ChildAges = implode(",", $_REQUEST['room3-childAge']) ;
    }
    if (isset($_REQUEST['Child'][3]) &&  $_REQUEST['Child'][3]!=0) {
      $Room4ChildAges = implode(",", $_REQUEST['room4-childAge']) ;
    }
    if (isset($_REQUEST['Child'][4]) &&  $_REQUEST['Child'][4]!=0) {
      $Room5ChildAges = implode(",", $_REQUEST['room5-childAge']) ;
    }
    if (isset($_REQUEST['Child'][5]) &&  $_REQUEST['Child'][5]!=0) {
      $Room6ChildAges = implode(",", $_REQUEST['room6-childAge']) ;
    }
    if (isset($_REQUEST['Child'][6]) &&  $_REQUEST['Child'][6]!=0) {
      $Room7ChildAges = implode(",", $_REQUEST['room7-childAge']) ;
    }
    if (isset($_REQUEST['Child'][7]) &&  $_REQUEST['Child'][7]!=0) {
      $Room8ChildAges = implode(",", $_REQUEST['room8-childAge']) ;
    }
    if (isset($_REQUEST['Child'][8]) &&  $_REQUEST['Child'][8]!=0) {
      $Room9ChildAges = implode(",", $_REQUEST['room9-childAge']) ;
    }
    if (isset($_REQUEST['Child'][9]) &&  $_REQUEST['Child'][9]!=0) {
      $Room10ChildAges = implode(",", $_REQUEST['room10-childAge']) ;
    }

    if (count($hotelid)==0) {
      $hotelid = array('');
    }
    $this->db->select('hotel_name,hotel_description,hotel_facilities,
      promoteList,rating,Image1,reviews,starsrating,id as hotel_id');
    $this->db->from('hotel_tbl_hotels');
    $this->db->where_in('id',$hotelid);
    $this->db->where('delflg',1);
    $query=$this->db->get()->result();

    $return = array();
    if (count($query)!=0) {
      foreach ($query as $key => $value) {
        $MinAmountData = $this->MinAmountData($value->hotel_id);
        if ($MinAmountData!="false") {
          $return['HotelCode'][$key] = $value->hotel_id;
          $return['HotelName'][$key] = $value->hotel_name;
          $return['HotelPicture'][$key] = base_url().'uploads/gallery/'.$value->hotel_id.'/'.$value->Image1;
          $return['HotelDescription'][$key] = $value->hotel_description;
          $return['Rating'][$key] = $value->rating;
          $return['DataType'][$key] = 'otelseasy';

          if ($value->rating!=10) {
            $filterRating = '<img src="'.base_url().'skin/images/filter-rating-'.ceil($value->rating).ceil($value->rating).'.png" class="hotel-rating" alt=""/>';
          } else {
            $filterRating = '<label style="width:100px;" class="hotel-rating"><i class="fa fa-building" style="color: #258732;"></i> Apartment</label>';
          }

          $return['RatingImg'][$key] = $filterRating;

          $return['ReviewImg'][$key] = base_url().'skin/images/user-rating-'.ceil($value->starsrating).'.png';
          $return['reviews'][$key] = $value->reviews;
          $return['RoomName'][$key] = $MinAmountData['RoomName'];
          $return['TotalPrice'][$key] = $MinAmountData['amount'];
          $return['Currency'][$key] = agent_currency();
          $return['oldPrice'][$key] = $MinAmountData['oldPrice'];
          $return['OriginalPrice'][$key] = $MinAmountData['amount'];
          $return['Inclusion'][$key] = $MinAmountData['title'];
          if ($MinAmountData['RoomLeft'] > 0) {
            $leftStyle = '<small class="color-red">'.$MinAmountData['RoomLeft'].' left!</small>';
            $style = 'style="background:green;border-bottom: 2px solid green;"';
            $btn_name = 'Book';
          } else {
            $leftStyle = '';
            $style = '';
            $btn_name = 'On Request';
          }

          $return['BookBtn'][$key] = '<a onclick="tokenSetfn(\''.base_url().'payment?'.$MinAmountData['request'].'\')" '.$style.'  href="#" class="hotel-view-btn">'.$btn_name.'</a>';

          $return['HotelRequest'][$key] = base_url().'details?search_id='.$value->hotel_id.'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id='.$MinAmountData['contract_id'].'&nationality='.$_REQUEST['nationality'].'&providers=otelseasy';
        }
      }
    }
    return $return;
  }
  public function TBOsingleHotelDetails($hotelid,$request) {
    $Room1ChildAges='';
    $Room2ChildAges='';
    $Room3ChildAges='';
    $Room4ChildAges='';
    $Room5ChildAges='';
    $Room6ChildAges='';
    $Room7ChildAges='';
    $Room8ChildAges='';
    $Room9ChildAges='';
    $Room10ChildAges='';

    if ($_REQUEST['Check_in']!='') {
      $checkin = $_REQUEST['Check_in'];
    }
    if($_REQUEST['Check_out']!='') {
      $checkout=$_REQUEST['Check_out'];
    }
    if ($_REQUEST['adults']!='') {
      $adults = implode(",", $_REQUEST['adults']) ;
    }
    if ($_REQUEST['Child']!='') {
      $child = implode(",", $_REQUEST['Child']) ;
    }
    if ($_REQUEST['Child'][0]!=0 && isset($_REQUEST['room1-childAge'])) {
      $Room1ChildAges = implode(",", $_REQUEST['room1-childAge']) ;
    }
    if (isset($_REQUEST['Child'][1]) && $_REQUEST['Child'][1]!=0) {
      $Room2ChildAges = implode(",", $_REQUEST['room2-childAge']) ;
    }
    if (isset($_REQUEST['Child'][2]) &&  $_REQUEST['Child'][2]!=0) {
      $Room3ChildAges = implode(",", $_REQUEST['room3-childAge']) ;
    }
    if (isset($_REQUEST['Child'][3]) &&  $_REQUEST['Child'][3]!=0) {
      $Room4ChildAges = implode(",", $_REQUEST['room4-childAge']) ;
    }
    if (isset($_REQUEST['Child'][4]) &&  $_REQUEST['Child'][4]!=0) {
      $Room5ChildAges = implode(",", $_REQUEST['room5-childAge']) ;
    }
    if (isset($_REQUEST['Child'][5]) &&  $_REQUEST['Child'][5]!=0) {
      $Room6ChildAges = implode(",", $_REQUEST['room6-childAge']) ;
    }
    if (isset($_REQUEST['Child'][6]) &&  $_REQUEST['Child'][6]!=0) {
      $Room7ChildAges = implode(",", $_REQUEST['room7-childAge']) ;
    }
    if (isset($_REQUEST['Child'][7]) &&  $_REQUEST['Child'][7]!=0) {
      $Room8ChildAges = implode(",", $_REQUEST['room8-childAge']) ;
    }
    if (isset($_REQUEST['Child'][8]) &&  $_REQUEST['Child'][8]!=0) {
      $Room9ChildAges = implode(",", $_REQUEST['room9-childAge']) ;
    }
    if (isset($_REQUEST['Child'][9]) &&  $_REQUEST['Child'][9]!=0) {
      $Room10ChildAges = implode(",", $_REQUEST['room10-childAge']) ;
    }

    $nationality = $this->db->query('SELECT sortname FROM countries where id = '.$request['nationality'].'')->result();
    $nationality = $nationality[0]->sortname;

    foreach ($request['adults'] as $key => $value) {
      $RoomGuest[] = ["RoomGuest"=>[
                          "attr"=>[
                              "AdultCount"=>$value,
                              "ChildCount"=> 0
                          ]
                      ]];
    }

    $inp_arr_hotel = [
        "CheckInDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_in']))
        ],
        "CheckOutDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_out']))
        ],
        "CountryName"=>[
            "value"=>$request['countryname']
        ],
        "CityName"=>[
            "value"=>$request['cityname']
        ],
        "CityId"=>[
            "value"=>$request['citycode']
        ],
        "IsNearBySearchAllowed"=>[
            "value"=>'false'
        ],
        "NoOfRooms"=>[
            "value"=>count($_REQUEST['adults'])
        ],
        "GuestNationality"=>[
            "value"=>$nationality
        ],
        "RoomGuests"=>[
            "value"=>
              $RoomGuest
            // [
            //     "RoomGuest"=>[
            //         "attr"=>[
            //             "AdultCount"=>1,
            //             "ChildCount"=> 0
            //         ]
            //     ]
            // ]
        ],
        "PreferredCurrencyCode" =>[
            "value"=>agent_currency()
        ],
        // "ResultCount" => [
        //     "value" => 1
        // ],
        "Filters" => [
            "value" => [
                "StarRating" =>[
                    "value"=>"All"
                ],
                "OrderBy" =>[
                    "value"=>"PriceAsc"
                ],
                "HotelCodeList" =>[
                    "value"=>$hotelid
                    // "value"=>"1102800"
                ]
            ]
        ],
        "ResponseTime" => [
            "value" => 0
        ]
    ];

    $return = '';
   
    $Tbohotels = $this->HotelSearchWithRooms($inp_arr_hotel);
    if ($Tbohotels['Status']['StatusCode']==01) {
      if (isset($Tbohotels['HotelResultList']['HotelResult'][1])) {
        foreach ($Tbohotels['HotelResultList']['HotelResult'] as $key => $value) {
              
            $return['HotelCode'][$key] = $value['HotelInfo']['HotelCode'];
            $return['HotelName'][$key] = $value['HotelInfo']['HotelName'];
            $return['HotelPicture'][$key] = isset($value['HotelInfo']['HotelPicture']) ? $value['HotelInfo']['HotelPicture'] : '';
            $return['HotelDescription'][$key] = $value['HotelInfo']['HotelDescription'];
            if ($value['HotelInfo']['Rating']=="FiveStar") {
              $star = 5;
            } 
            if ($value['HotelInfo']['Rating']=="FourStar") {
              $star = 4;
            } 
            if ($value['HotelInfo']['Rating']=="ThreeStar") {
              $star = 3;
            } 
            if ($value['HotelInfo']['Rating']=="TwoStar") {
              $star = 2;
            }
            if ($value['HotelInfo']['Rating']=="OneStar") {
              $star = 1;
            }
            $return['Rating'][$key] = $star;

            $return['TotalPrice'][$key] = xml_currency_change($value['MinHotelPrice']['@attributes']['TotalPrice'],$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());
            $return['Currency'][$key] = agent_currency();
            $return['OriginalPrice'][$key] = xml_currency_change($value['MinHotelPrice']['@attributes']['TotalPrice'],$value['MinHotelPrice']['@attributes']['Currency'],agent_currency());
            if (!isset($value['HotelInfo']['TripAdvisorRating'])) {
              $value['HotelInfo']['TripAdvisorRating'] = '0.0';
            }
            $return['RatingImg'][$key] = '<img src="'.base_url().'skin/images/filter-rating-'.$star.$star.'.png" class="hotel-rating" alt="">';
            $return['ReviewImg'][$key] = base_url().'skin/images/ta-rating-'.ceil($value['HotelInfo']['TripAdvisorRating']).'.png';
            $return['DataType'][$key] = 'TBO';
            $return['reviews'][$key] = '';

            if (isset($value['HotelRooms']['HotelRoom'][1])) {
              $HotelRooms = $value['HotelRooms']['HotelRoom'];
              foreach ($HotelRooms as $key1 => $value1) {
                if ($value['MinHotelPrice']['@attributes']['TotalPrice']==$value1['RoomRate']['@attributes']['TotalFare']) {
                  $return['RoomName'][$key] = $value1['RoomTypeName'];
                }
              }
            } else {
              $value1 = $value['HotelRooms']['HotelRoom'];
              $return['RoomName'][$key] = $value1['RoomTypeName'];
            }
            $paymentReq = base_url().'payment/payments?';
            $return['BookBtn'][$key] = '<a style="background:green;border-bottom: 2px solid green;"  onclick="" href="'.$paymentReq.'" class="hotel-view-btn">Book</a>';
            $return['HotelRequest'][$key] = base_url().'details?search_id='.$value['HotelInfo']['HotelCode'].'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id=&nationality='.$_REQUEST['nationality'].'&providers=TBO';
        }
      } else {
        $value = $Tbohotels['HotelResultList']['HotelResult'];
        $return['HotelCode'][0] = $value['HotelInfo']['HotelCode'];
        $return['HotelName'][0] = $value['HotelInfo']['HotelName'];
        $return['HotelPicture'][0] = isset($value['HotelInfo']['HotelPicture']) ? $value['HotelInfo']['HotelPicture'] : '';
        $return['HotelDescription'][0] = $value['HotelInfo']['HotelDescription'];
        if ($value['HotelInfo']['Rating']=="FiveStar") {
          $star = 5;
        } 
        if ($value['HotelInfo']['Rating']=="FourStar") {
          $star = 4;
        } 
        if ($value['HotelInfo']['Rating']=="ThreeStar") {
          $star = 3;
        } 
        if ($value['HotelInfo']['Rating']=="TwoStar") {
          $star = 2;
        }
        if ($value['HotelInfo']['Rating']=="OneStar") {
          $star = 1;
        }
        $return['Rating'][0] = $star;
        $return['TotalPrice'][0] = $value['MinHotelPrice']['@attributes']['PrefPrice'];
        $return['Currency'][0] = agent_currency();
        $return['OriginalPrice'][0] = $value['MinHotelPrice']['@attributes']['PrefPrice'];
        if (!isset($value['HotelInfo']['TripAdvisorRating'])) {
          $value['HotelInfo']['TripAdvisorRating'] = '0.0';
        }
        $return['RatingImg'][0] = '<img src="'.base_url().'skin/images/filter-rating-'.$star.$star.'.png" class="hotel-rating" alt="">';
        $return['ReviewImg'][0] = base_url().'skin/images/ta-rating-'.ceil($value['HotelInfo']['TripAdvisorRating']).'.png';
        $return['DataType'][0] = 'TBO';
        $return['reviews'][0] = '';

        if (isset($value['HotelRooms']['HotelRoom'][1])) {
          $HotelRooms = $value['HotelRooms']['HotelRoom'];
          foreach ($HotelRooms as $key1 => $value1) {
            if ($value['MinHotelPrice']['@attributes']['TotalPrice']==$value1['RoomRate']['@attributes']['TotalFare']) {
              $return['RoomName'][0] = $value1['RoomTypeName'];
            }
          }
        } else {
          $value1 = $value['HotelRooms']['HotelRoom'];
          $return['RoomName'][0] = $value1['RoomTypeName'];
        }
        $return['BookBtn'][0] = '<a style="background:green;border-bottom: 2px solid green;" onclick="" href="#" class="hotel-view-btn">Book</a>';
        $return['HotelRequest'][0] = base_url().'details?search_id='.$value['HotelInfo']['HotelCode'].'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id=&nationality='.$_REQUEST['nationality'].'&providers=TBO';
      }
    }
    return $return;
  }
  public function TBORoomList($hotelid) {
    $Room1ChildAges='';
    $Room2ChildAges='';
    $Room3ChildAges='';
    $Room4ChildAges='';
    $Room5ChildAges='';
    $Room6ChildAges='';
    $Room7ChildAges='';
    $Room8ChildAges='';
    $Room9ChildAges='';
    $Room10ChildAges='';

    if ($_REQUEST['Check_in']!='') {
      $checkin = $_REQUEST['Check_in'];
    }
    if($_REQUEST['Check_out']!='') {
      $checkout=$_REQUEST['Check_out'];
    }
    if ($_REQUEST['adults']!='') {
      $adults = implode(",", $_REQUEST['adults']) ;
    }
    if ($_REQUEST['Child']!='') {
      $child = implode(",", $_REQUEST['Child']) ;
    }
    if ($_REQUEST['Child'][0]!=0 && isset($_REQUEST['room1-childAge'])) {
      $Room1ChildAges = implode(",", $_REQUEST['room1-childAge']) ;
    }
    if (isset($_REQUEST['Child'][1]) && $_REQUEST['Child'][1]!=0) {
      $Room2ChildAges = implode(",", $_REQUEST['room2-childAge']) ;
    }
    if (isset($_REQUEST['Child'][2]) &&  $_REQUEST['Child'][2]!=0) {
      $Room3ChildAges = implode(",", $_REQUEST['room3-childAge']) ;
    }
    if (isset($_REQUEST['Child'][3]) &&  $_REQUEST['Child'][3]!=0) {
      $Room4ChildAges = implode(",", $_REQUEST['room4-childAge']) ;
    }
    if (isset($_REQUEST['Child'][4]) &&  $_REQUEST['Child'][4]!=0) {
      $Room5ChildAges = implode(",", $_REQUEST['room5-childAge']) ;
    }
    if (isset($_REQUEST['Child'][5]) &&  $_REQUEST['Child'][5]!=0) {
      $Room6ChildAges = implode(",", $_REQUEST['room6-childAge']) ;
    }
    if (isset($_REQUEST['Child'][6]) &&  $_REQUEST['Child'][6]!=0) {
      $Room7ChildAges = implode(",", $_REQUEST['room7-childAge']) ;
    }
    if (isset($_REQUEST['Child'][7]) &&  $_REQUEST['Child'][7]!=0) {
      $Room8ChildAges = implode(",", $_REQUEST['room8-childAge']) ;
    }
    if (isset($_REQUEST['Child'][8]) &&  $_REQUEST['Child'][8]!=0) {
      $Room9ChildAges = implode(",", $_REQUEST['room9-childAge']) ;
    }
    if (isset($_REQUEST['Child'][9]) &&  $_REQUEST['Child'][9]!=0) {
      $Room10ChildAges = implode(",", $_REQUEST['room10-childAge']) ;
    }


    $request = $_REQUEST;
    $nationality = $this->db->query('SELECT sortname FROM countries where id = '.$request['nationality'].'')->result();
    $nationality = $nationality[0]->sortname;
    foreach ($_REQUEST['adults'] as $key => $value) {
      $childAge  = '';
      if ($_REQUEST['Child'][$key]!=0) {
          for ($i=1; $i <= $_REQUEST['Child'][$key] ; $i++) { 
            foreach ($_REQUEST['room'.($key+1).'-childAge'] as $reCAkey => $reCAvalue) {
              $childAge[$reCAkey] = [
                    "ChildAge" => [
                      "value" => [
                        "int" => [
                          "value" => $reCAvalue
                        ]
                      ]
                    ]
                  ];
            }
          }

        }
      $RoomGuest[] = ["RoomGuest"=>[
                          "attr"=>[
                              "AdultCount"=>$value,
                              "ChildCount"=> $_REQUEST['Child'][$key]
                          ],
                          "value"=> $childAge
                      ]];
    }

    $inp_arr_hotel = [
        "CheckInDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_in']))
        ],
        "CheckOutDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_out']))
        ],
        "CountryName"=>[
            "value"=>$request['countryname']
        ],
        "CityName"=>[
            "value"=>$request['cityname']
        ],
        "CityId"=>[
            "value"=>$request['citycode']
        ],
        "IsNearBySearchAllowed"=>[
            "value"=>'false'
        ],
        "NoOfRooms"=>[
            "value"=>count($_REQUEST['adults'])
        ],
        "GuestNationality"=>[
            "value"=>$nationality
        ],
        "RoomGuests"=>[
            "value"=>
              $RoomGuest
           
        ],
        "PreferredCurrencyCode" =>[
            "value"=>agent_currency()
        ],
        "Filters" => [
            "value" => [
                "StarRating" =>[
                    "value"=>"All"
                ],
                "OrderBy" =>[
                    "value"=>"PriceAsc"
                ],
                "HotelCodeList" =>[
                    "value"=>$hotelid
                ]
            ]
        ],
        "ResponseTime" => [
            "value" => 0
        ]
    ];
   
    $total_markup = mark_up_get()+general_mark_up_get();
    
    $Tbohotels = $this->HotelSearchWithRooms($inp_arr_hotel);

    $return = array();
    $style = '';
    if ($Tbohotels['Status']['StatusCode']==01) {
      if (isset($Tbohotels['HotelResultList']['HotelResult']['HotelRooms']['HotelRoom'][1])) {
        foreach ($Tbohotels['HotelResultList']['HotelResult']['HotelRooms']['HotelRoom'] as $key => $value) {
          $RoomIndex = $value['RoomIndex'];
          $paymentReq = base_url().'payment/payments?SessionId='.$Tbohotels['SessionId'].'&hotel_id='.$Tbohotels['HotelResultList']['HotelResult']['HotelInfo']['HotelCode'].'&&mark_up=&&Check_in='.$checkin.'&&Check_out='.$checkout.'&&countryname='.$request['countryname'].'&&cityname='.$request['cityname'].'&&citycode='.$request['citycode'].'&&adults='.$adults.'&&child='.$child.'&&Room1ChildAges='.$Room1ChildAges.'&&Room2ChildAges='.$Room2ChildAges.'&&Room3ChildAges='.$Room3ChildAges.'&&Room4ChildAges='.$Room4ChildAges.'&&Room5ChildAges='.$Room5ChildAges.'&&Room6ChildAges='.$Room6ChildAges.'&&Room7ChildAges='.$Room7ChildAges.'&&Room8ChildAges='.$Room8ChildAges.'&&Room9ChildAges='.$Room9ChildAges.'&&Room10ChildAges='.$Room10ChildAges.'&&contract_id=&nationality='.$_REQUEST['nationality'].'&providers=TBO&RoomIndex='.$RoomIndex.'&ResultIndex='.$Tbohotels['HotelResultList']['HotelResult']['ResultIndex'];

          // $paymentReq = base_url().'payment/payments?SessionId='.$Tbohotels['SessionId'].'&Check_in='.$request['Check_in'].'&Check_out='.$request['Check_out'].'&ResponseTime='.$Tbohotels['ResponseTime'].'&HotelCode='.$Tbohotels['HotelResultList']['HotelResult']['HotelInfo']['HotelCode'].'&RoomIndex='.$RoomIndex.'&ResultIndex='.$Tbohotels['HotelResultList']['HotelResult']['ResultIndex'];

          

          $supplement = isset($value['Supplements']['Supplement']['@attributes']['Type']) ? '<ul><li>'.$value['Supplements']['Supplement']['@attributes']['SuppName'].'</li></ul>' : ''; 
          $style.='<div class="col-md-12 offset-0 sroom-border">
              <div class="col-md-12 mediafix1">
              <h4 style="font-size:14px"  class="opensans text-transform dark bold margtop1">'.$value['RoomTypeName'].'</h4>
              </div>
              <div class="col-md-12 mediafix1 pad_left_0">
              <div class="clearfix"></div>
              <div class="roomRateCheckdiv">';

          $TotalPrice =0;    
          $TotalPrice = $value['RoomRate']['@attributes']['TotalFare'];
          $TotalPrice = ($TotalPrice*$total_markup/100)+$TotalPrice;

          $style.= '<div class="col-md-12">
                    <div class="row contract-board">
                    <div class="col-xs-2"> 
                    </div>
                    <div class="col-xs-5">
                      '.$supplement.'
                    </div>
                    <div class="col-xs-3 text-right">
                    <p class="color-blue mb-0 bold">'.agent_currency().' '.xml_currency_change($TotalPrice,$value['RoomRate']['@attributes']['Currency'],agent_currency()).'</p>
                    </div>
                    <div class="col-xs-2 text-right">
                    <a style="background:green;border-bottom: 2px solid green;" target="_blank" href="'.$paymentReq.'" class="hotel-view-btn1 sbookbtn mt1"  >book</a>
                    </div>
                    </div>
                    </div>';
            $style.= '</div>
                </div>
                </div>';

                  }
      } else {
        $value = $Tbohotels['HotelResultList']['HotelResult']['HotelRooms']['HotelRoom'];
        $RoomIndex = $value['RoomIndex'];
        $paymentReq = base_url().'payment/payments?SessionId='.$Tbohotels['SessionId'].'&ResponseTime='.$Tbohotels['ResponseTime'].'&hotel_id='.$Tbohotels['HotelResultList']['HotelResult']['HotelInfo']['HotelCode'].'&RoomIndex='.$RoomIndex.'&ResultIndex='.$Tbohotels['HotelResultList']['HotelResult']['ResultIndex'];
        $TotalPrice =0;    
        $TotalPrice = $value['RoomRate']['@attributes']['TotalFare'];
        $TotalPrice = ($TotalPrice*$total_markup/100)+$TotalPrice;
        $supplement = isset($value['Supplements']['Supplement']['@attributes']['Type']) ? '<ul><li>'.$value['Supplements']['Supplement']['@attributes']['SuppName'].'</li></ul>' : ''; 
        $style.='<div class="col-md-12 offset-0 sroom-border">
              <div class="col-md-12 mediafix1">
              <h4 style="font-size:14px"  class="opensans text-transform dark bold margtop1">'.$value['RoomTypeName'].'</h4>
              </div>
              <div class="col-md-12 mediafix1 pad_left_0">
              <div class="clearfix"></div>
              <div class="roomRateCheckdiv">';
          $style.= '<div class="col-md-12">
                    <div class="row contract-board">
                    <div class="col-xs-2"> 
                    </div>
                    <div class="col-xs-5">
                      '.$supplement.'
                    </div>
                    <div class="col-xs-3 text-right">
                    <p class="color-blue mb-0 bold">'.agent_currency().' '.xml_currency_change($TotalPrice,$value['RoomRate']['@attributes']['Currency'],agent_currency()).'</p>
                    </div>
                    <div class="col-xs-2 text-right">
                    <a style="background:green;border-bottom: 2px solid green;" href="'.$paymentReq.'" class="hotel-view-btn1 sbookbtn mt1"  >book</a>
                    </div>
                    </div>
                    </div>';

            $style.= '</div>
                </div>
                </div>';
          
      }
    }
    
    return $style;
  }
  public function TbohotelDetails($hotelid) {
    $request = $_REQUEST;
    $nationality = $this->db->query('SELECT sortname FROM countries where id = '.$request['nationality'].'')->result();
    $nationality = $nationality[0]->sortname;
    $inp_arr_hotel = [
        "CheckInDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_in']))
        ],
        "CheckOutDate"=>[
            "value"=>date('Y-m-d',strtotime($request['Check_out']))
        ],
        "CountryName"=>[
            "value"=>$request['countryname']
        ],
        "CityName"=>[
            "value"=>$request['cityname']
        ],
        "CityId"=>[
            "value"=>$request['citycode']
        ],
        "IsNearBySearchAllowed"=>[
            "value"=>'false'
        ],
        "NoOfRooms"=>[
            "value"=>1
        ],
        "GuestNationality"=>[
            "value"=>$nationality
        ],
        "RoomGuests"=>[
            "value"=>[
                "RoomGuest"=>[
                    "attr"=>[
                        "AdultCount"=>1,
                        "ChildCount"=> 0
                    ]
                ]
            ]
        ],
        "PreferredCurrencyCode" =>[
            "value"=>agent_currency()
        ],
        // "ResultCount" => [
        //     "value" => 1
        // ],
        "Filters" => [
            "value" => [
                "StarRating" =>[
                    "value"=>"All"
                ],
                "OrderBy" =>[
                    "value"=>"PriceAsc"
                ],
                "HotelCodeList" =>[
                    "value"=>$hotelid
                ]
            ]
        ],
        "ResponseTime" => [
            "value" => 300
        ]
    ];
    $Tbohotels = $this->HotelSearch($inp_arr_hotel);
    $return = array();
    if ($Tbohotels['Status']['StatusCode']==01) {
      $value = $Tbohotels['HotelResultList']['HotelResult'];
          $return['HotelCode'] = $value['HotelInfo']['HotelCode'];
          $return['HotelName'] = $value['HotelInfo']['HotelName'];
          $return['HotelPicture'] = $value['HotelInfo']['HotelPicture'];
          $return['HotelDescription'] = $value['HotelInfo']['HotelDescription'];
          $return['Latitude'] = $value['HotelInfo']['Latitude'];
          $return['Longitude'] = $value['HotelInfo']['Longitude'];
          $return['HotelAddress'] = $value['HotelInfo']['HotelAddress'];
          if ($value['HotelInfo']['Rating']=="FiveStar") {
            $star = 5;
          } 
          if ($value['HotelInfo']['Rating']=="FourStar") {
            $star = 4;
          } 
          if ($value['HotelInfo']['Rating']=="ThreeStar") {
            $star = 3;
          } 
          if ($value['HotelInfo']['Rating']=="TwoStar") {
            $star = 2;
          }
          if ($value['HotelInfo']['Rating']=="OneStar") {
            $star = 1;
          }
          $return['Rating'] = $star;
          $return['TotalPrice'] = $value['MinHotelPrice']['@attributes']['TotalPrice'];
          $return['Currency'] = $value['MinHotelPrice']['@attributes']['Currency'];
          $return['OriginalPrice'] = $value['MinHotelPrice']['@attributes']['OriginalPrice'];
    }
    return $return;
  }
  public function SelectState($Conid){
      $this->db->select('*');
        $this->db->from('states');
        $this->db->where('country_id',$Conid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
  }
  public function SelectCity($Stateid){
      $this->db->select('*');
        $this->db->from('cities');
        $this->db->where('state_id',$Stateid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
  }
  public function SearchListDataFetchcount() {
    $expPrice = explode(";", $_REQUEST['price']);
    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
    /*Rating filter start*/
    $rating = array();
    if (isset($_REQUEST["rating5"])) {
      $rating[] = "5";
    }
    if (isset($_REQUEST["rating4"])) {
      $rating[] = "4";
    }
    if (isset($_REQUEST["rating3"])) {
      $rating[] = "3";
    }
    if (isset($_REQUEST["rating2"])) {
      $rating[] = "2";
    }
    if (isset($_REQUEST["rating1"])) {
      $rating[] = "1";
    }
    if (isset($_REQUEST["rating10"])) {
      $rating[] = "10";
    }
    /*Rating filter end*/
    /*Board filter start*/
    $Inclusion = array();
    if (isset($_REQUEST['RO'])) {
      $Inclusion[] = 'Room Only';
      $Inclusion[] = 'ROOM ONLY';
    }
    if (isset($_REQUEST['BB'])) {
      $Inclusion[] = 'Bed and Breakfast';
      $Inclusion[] = 'Room & Breakfast';
      $Inclusion[] = 'Breakfast';
    }
    if (isset($_REQUEST['HB'])) {
      $Inclusion[] = 'Half Board';
    }
    if (isset($_REQUEST['FB'])) {
      $Inclusion[] = 'Full Board';
    }

    /*Board filter end*/
    $this->db->select('*');
    $this->db->from('ci_sessions');
    $this->db->where('agent_id',$this->session->userdata('agent_id'));
    $this->db->where('TotalPrice >',$price1);
    $this->db->where('TotalPrice <',$price2);
    $this->db->where('ip_add',get_client_ip());
    if (count($rating)!=0) {
      $this->db->where_in('Rating',$rating);
    }
    if (count($Inclusion)!=0) {
      $this->db->where_in('Inclusion',$Inclusion);
    }
    $query = $this->db->get()->result();
    return count($query); 
  }

  public function SearchListDataFetch($limit, $start) {
    $expPrice = explode(";", $_REQUEST['price']);
    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
    

    /*Rating filter start*/
    $rating = array();
    if (isset($_REQUEST["rating5"])) {
      $rating[] = "5";
    }
    if (isset($_REQUEST["rating4"])) {
      $rating[] = "4";
    }
    if (isset($_REQUEST["rating3"])) {
      $rating[] = "3";
    }
    if (isset($_REQUEST["rating2"])) {
      $rating[] = "2";
    }
    if (isset($_REQUEST["rating1"])) {
      $rating[] = "1";
    }
    if (isset($_REQUEST["rating10"])) {
      $rating[] = "10";
    }
    /*Rating filter end*/
    /*Board filter start*/
    $Inclusion = array();
    if (isset($_REQUEST['RO'])) {
      $Inclusion[] = 'Room Only';
      $Inclusion[] = 'ROOM ONLY';
    }
    if (isset($_REQUEST['BB'])) {
      $Inclusion[] = 'Bed and Breakfast';
      $Inclusion[] = 'Room & Breakfast';
      $Inclusion[] = 'Breakfast';
    }
    if (isset($_REQUEST['HB'])) {
      $Inclusion[] = 'Half Board';
    }
    if (isset($_REQUEST['FB'])) {
      $Inclusion[] = 'Full Board';
    }

    /*Board filter end*/
    $this->db->select('*');
    $this->db->from('ci_sessions');
    $this->db->where('agent_id',$this->session->userdata('agent_id'));
    $this->db->where('TotalPrice >',$price1);
    $this->db->where('TotalPrice <',$price2);
    $this->db->where('ip_add',get_client_ip());
    if (count($rating)!=0) {
      $this->db->where_in('Rating',$rating);
    }
    if (count($Inclusion)!=0) {
      $this->db->where_in('Inclusion',$Inclusion);
    }
    if ($_REQUEST['guest_rating']==1) {
      $this->db->order_by('Rating','desc');
    } 
    if($_REQUEST['guest_rating']==2) {
      $this->db->order_by('Rating','asc');
    }
    if ($_REQUEST['name_order']==1) {
      $this->db->order_by('HotelName','asc');
    } 
    if($_REQUEST['name_order']==2) {
      $this->db->order_by('HotelName','desc');
    }
    // if ($_REQUEST['price_order']==1) {
    //   $this->db->order_by('round(TotalPrice)','asc');
    // } 
    if($_REQUEST['price_order']==2) {
      $this->db->order_by('round(TotalPrice)','desc');
    } else {
      $this->db->order_by('round(TotalPrice)','asc');
    }
    $this->db->limit($limit, $start);
    $query = $this->db->get()->result();
    return $query; 
  }
  public function transfersearchprocess($request) {
    $from_date = date('Y-m-d',strtotime($request['arrivaldate']));
    $to_date = date('Y-m-d',strtotime($request['departdate']));
    $destination = $request['cityId'];
    $query =$this->db->query("select a.*,b.*,c.* from tour_contracts a inner join tbl_tour_types b inner join tour_suppliers c on a.tour_type=b.id and a.supplier_id=c.id where b.cityId='".$destination."' and '".$from_date."' > valid_from and '".$to_date."' < valid_to")->result();
    return $query;
  }
  public function GetAirport($keyword) {    
    if ($keyword=="") {
        $query = array();
      } else {
          $query=$this->db->query("select * from airports where cityName like '%".$keyword."%' or name like '%".$keyword."%' or countryName like '%".$keyword."%'limit 5")->result_array();
      }    
        return $query;
  }
  public function Trasfersearch_list($limit,$start) {
    $expPrice = explode(";", $_REQUEST['price']);
    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
    $vtype = "";
    if(isset($_REQUEST['vtype'])){
       $vtype = '("' . implode('", "', $_REQUEST['vtype']) . '")';
    }
   
    if($vtype!=""){
      $typein = 'and d.vehicleType in '.$vtype.'';
    }
    else{
      $typein = "";
    }
    if($_REQUEST['name_order']==2) {
      $order =  ', a.ContractName desc';
    } else {
      $order =  ', a.ContractName asc';
    }
    if($_REQUEST['price_order']==2) {
      $order1 =  ' order by total desc';
    } else {
      $order1 =  ' order by total asc';
    }
    $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $_REQUEST['arrivaldate']);
    $arrivaldate = $myDateTime->format('Y-m-d');
    $airportID = $_REQUEST['airportID'];
    $passengers = $_REQUEST['Passenger'];
    $transfer_type = $_REQUEST['transfertype'];
    if($transfer_type=='return') {
      $type = 2;
    } else { 
      $type = 1;
    } 
    $query = $this->db->query("select *,(".$type." * ".$passengers." * a.Passenger_selling) as total from transfer_contracts a inner join transfer_contract_vehicles b inner join transfer_airport_vehicles c  inner join transfer_vehicle d  inner join airports e inner join transfer_multiple_locations f on a.id=b.contractID and b.vehicleID=c.vehicleID and d.id=b.vehicleID and e.id=c.airportID and f.contractID=a.id where valid_from < '".$arrivaldate."' and valid_to > '".$arrivaldate."'  and status='1' and c.airportID='".$airportID."' ".$typein." having  total >'".$price1."' and total <'".$price2."' and a.transfer_type='".$transfer_type."' and f.location LIKE '%".$_REQUEST['region']."%' ".$order1.$order." limit ".$start." , ".$limit."")->result();
    return $query; 
  }
   public function Trasfersearch_listcount($request) {
    $expPrice = explode(";", $_REQUEST['price']);
    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
    $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $request['arrivaldate']);
    $vtype = "";
    if(isset($_REQUEST['vtype'])){
       $vtype = '("' . implode('", "', $_REQUEST['vtype']) . '")';
    }
   
    if($vtype!=""){
      $typein = 'and d.vehicleType in '.$vtype.'';
    }
    else{
      $typein = "";
    }
    $passengers = $_REQUEST['Passenger'];
    $arrivaldate = $myDateTime->format('Y-m-d');
    $airportID = $request['airportID'];
    if($_REQUEST['transfertype']=='one-way') {
      $type = 1;
    } else {
      $type = 2;
    } 
    $query = $this->db->query("select *,(".$type." * ".$passengers." * a.Passenger_selling) as total from transfer_contracts a inner join transfer_contract_vehicles b inner join transfer_airport_vehicles c  inner join transfer_vehicle d  inner join airports e on a.id=b.contractID and b.vehicleID=c.vehicleID and d.id=b.vehicleID and e.id=c.airportID where valid_from < '".$arrivaldate."' and valid_to > '".$arrivaldate."'  and status='1' and c.airportID='".$airportID."' ".$typein." having  total >'".$price1."' and total <'".$price2."'")->result();
    return count($query);
  }
  public function GetVehicleTypes() {
    $query = $this->db->query("select vehicleType from transfer_vehicle")->result();
    return $query;
  }
  public function gettransferdetails($conid,$vehicleid) {
      $query = $this->db->query("select a.*,b.*,b.id as vehicleid from transfer_contracts a inner join transfer_vehicle b inner join transfer_contract_vehicles c on a.id=c.contractId and b.id=c.vehicleId  where a.id=".$conid." and b.id=".$vehicleid." and a.status=1")->result();
      return $query;
  }
  public function gettransfercontractpolicies($id) {
      $this->db->select('*');
      $this->db->from('transfer_contract_policies');
      $this->db->where('contract_id',$id);
      $query = $this->db->get()->result();
      return $query;
  }
  public function gettransfercontractconditions($id) {
      $this->db->select('*');
      $this->db->from('transfer_contract_conditions');
      $this->db->where('contract_id',$id);
      $query = $this->db->get()->result();
      return $query;
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
  public function max_transferbooking_id() {
        $this->db->select_max('id');
        $this->db->from('transfer_tbl_booking');
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
  public function transfer_booking_add($request,$max_booking_id,$agent_currency_type,$total_amount,$oneway_cost,$oneway_selling,$passengercost,$passengerselling,$totalcost,$individual_amount,$agent_markup,$admin_markup) {
        if ($request['RequestType']=='Book') {
          $booking_flag = 2;
        } else {
          $booking_flag = 8;
        }
        if (isset($request['first_name'])) {
          $request['first_name'] = $request['first_name'];
          $request['last_name'] = $request['last_name'];
        } else {
          $request['first_name'] = "";
          $request['last_name'] = "";
        }
        if (isset($request['departno']) && isset($request['departdate'])) {
          $request['departno'] = $request['departno'];
          $request['departdate'] = $request['departdate'];
        } else {
          $request['departno'] = "";
          $request['departdate'] = "";
        }

        $datas= array(
                  'nationality' => $request['nationality'],
                  'booking_flag' => $booking_flag,
                  'booking_id' =>$max_booking_id,
                  'vehicleid' =>$request['vehicleid'],
                  'total_amount' =>$total_amount,
                  'currency_type' =>$agent_currency_type,
                  'passengers' =>$request['passenger'],
                  'passenger_cost' =>$passengercost,
                  'passenger_selling' => $passengerselling,
                  'CostPerWay' => $oneway_cost,
                  'SellingPerWay' => $oneway_selling,
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  $this->session->userdata('agent_id'),
                  'agent_id' =>  $this->session->userdata('agent_id'),
                  'arrivalDate' => $request['arrivaldate'],
                  'returndate' => $request['returndate'],
                  'total_cost' => $totalcost,
                  'total_selling' => $total_amount,
                  'individual_amount' => $individual_amount,
                  'bk_contact_fname' => $request['first_name'],
                  'bk_contact_lname' => $request['last_name'],
                  'bk_contact_email' => $request['email'],
                  'bk_contact_number' => $request['contact_num'],
                  'contract_id' => $request['contractid'],
                  'SpecialRequest' => $request['SpecialRequest'], 
                  'arrivalFlight' => $request['arrivalno'] ,
                  'arrivalTime' => $request['f_arrivaldate'],
                  'departureFlight' => $request['departno'],
                  'departureTime' => $request['departdate'],
                  'From_location' => $request['location'],
                  'To_location' => $request['region'],
                  'airportID' => $request['airportID'],
                  'transfertype' => $request['transfertype'],
                  'admin_markup' => $admin_markup,
                  'agent_markup' => $agent_markup          
                );
        $this->db->insert('transfer_tbl_booking',$datas);
        $book_id = $this->db->insert_id();

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
                'transfer_id'          => $request['vehicleid'],
                'agent_id'          => $this->session->userdata('agent_id'),
                'booking_id'        => $book_id,
                'rejected'          => 2,
                'notification_date' => $date,
                'notification_type' => 'booked',
                'notification_msg' => 'You have new booking Request');
        $this->db->insert('hotel_tbl_notification',$data);

        $datas1 = array('user_id' => $implode,
                'notification_type' => 'transfer_booking_request');

        $this->db->insert('hotel_tbl_notifications_list',$datas1);
        return $book_id;
  }
  public function addTransferCancellationBooking($booking_id,$cancellationId,$from_date,$to_date,$cancel_percent,$from_day,$to_day,$msg) {
      $datas= array(
                  'bookingId'               =>$booking_id,
                  'cancellationId'          =>$cancellationId,
                  'daysFrom'                =>$from_day,
                  'daysTo'                  =>$to_day,
                  'fromDate'                =>$from_date,
                  'toDate'                  =>$to_date,
                  'cancellationPercentage'  =>$cancel_percent,
                  'msg'                     =>$msg,
                  'createdDate'             => date('Y-m-d'),
                  'createdBy'               =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('transfer_tbl_bookcancellationpolicy',$datas);
    return true;
  }
  public function addTransferConditionsBooking($booking_id,$conditionId,$conditions) {
      $datas= array(
                  'bookingId'               =>$booking_id,
                  'condition'               =>$conditions,
                  'conditionId'             =>$conditionId,
                  'createdDate'             => date('Y-m-d'),
                  'createdBy'               =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('transfer_tbl_bookconditions',$datas);
    return true;
  }
  public function transfer_booking_list($filter) {
      $this->db->select('a.*,b.*,a.id as bookId');
      $this->db->from('transfer_tbl_booking a');
      $this->db->join('transfer_contracts b','a.contract_id=b.id','inner');
      $this->db->where('a.booking_flag',$filter);
      $this->db->where('a.agent_id',$this->session->userdata('agent_id'));
      $this->db->order_by('a.id','desc');
      $result = $this->db->get();
      return $result;
  }
  public function transfer_booking_details($id) {
      $this->db->select('a.*,b.*,c.*');
      $this->db->from('transfer_tbl_booking a');
      $this->db->join('transfer_contracts b','a.contract_id=b.id','inner');
      $this->db->join('transfer_vehicle c','c.id=a.vehicleid ','inner');
      $this->db->where('a.id',$id);
      $this->db->where('a.agent_id',$this->session->userdata('agent_id'));
      $result = $this->db->get()->result();
      return $result;
  }
   public function gettransfercancellationpolicies($request) {
      $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $request['arrivaldate']);
      $fromdate = $myDateTime->format('Y-m-d');
      $this->db->select('*');
      $this->db->from('transfer_contract_policies');
      $this->db->where(array('contract_id'=>$request['contractid'],'from_date <'=>$fromdate,'to_date >'=>$fromdate));
      $query = $this->db->get()->result();
      return $query;
  }
  public function gettransferbookpolicy($id) {
      $this->db->select('*');
      $this->db->from('transfer_tbl_bookcancellationpolicy');
      $this->db->where(array('bookingId'=>$id));
      $query = $this->db->get()->result();
      return $query;
  }
  public function gettransferbookcancelpolicy($id,$arrivaldate) {
      $myDateTime = DateTime::createFromFormat('d/m/Y', $arrivaldate);
      $fromdate = $myDateTime->format('Y-m-d');
      $this->db->select('*');
      $this->db->from('transfer_tbl_bookcancellationpolicy');
      $this->db->where(array('bookingId'=>$id,'fromDate <'=>$fromdate,'toDate >'=>$fromdate));
      $query = $this->db->get()->result();
      return $query;
  }
  public function gettransferbookcondition($id) {
      $this->db->select('*');
      $this->db->from('transfer_tbl_bookconditions');
      $this->db->where('bookingId',$id);
      $query = $this->db->get()->result();
      return $query;
  }
  public function CancellationTransferBookingUpdate($id) {
    $array = array(
              'cancelled_date' => date('Y-m-d H:i:s'),
              'CancelledBy' => $this->session->userdata('agent_name'),
              'booking_flag' => 3,
            );
    $this->db->where('id',$id);
    $this->db->update('transfer_tbl_booking',$array);

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
                  'agent_id'          => $this->session->userdata('agent_id'),
                  'booking_id'        => $id,
                  'rejected'          => 2,
                  'notification_date' => $date,
                  'notification_type' => 'Cancelled',
                  'notification_msg' => 'You have new Cancelled Request');
    $this->db->insert('hotel_tbl_notification',$data);

    $datas1 = array('user_id' => $implode,
                'notification_type' => 'transfer_booking_cancelled');

      $this->db->insert('hotel_tbl_notifications_list',$datas1);
    return true;
  }
  public function transfer_booking_detail($id) {
    $this->db->select('a.id as bookid,a.*,b.*,c.*,d.First_Name as AFName,d.Last_Name as ALName,d.Mobile,d.Email,e.name as countryName,f.CityName');
    $this->db->from('transfer_tbl_booking a');
    $this->db->join('transfer_contracts b','a.contract_id=b.id','inner');
    $this->db->join('transfer_vehicle c','c.id=a.vehicleid ','inner');
    $this->db->join('hotel_tbl_agents d','d.id=a.agent_id','inner');
    $this->db->join('countries e','e.id=c.Country','inner');
    $this->db->join('xml_city_tbl f','f.id=c.City','inner');
    $this->db->where('a.id',$id);
    $result = $this->db->get()->result();
    return $result;
  }
  public function getpaypaldetails() {    
    $this->db->select('*');
    $this->db->from('tbl_paypal_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function getcheckoutdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_checkout_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function getbraintreedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_braintree_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function getmolliedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_mollie_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function getsimdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_authorizesim_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function getaimdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_authorizeaim_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  } 
  public function getstripedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_stripe_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }  
  public function rotateHotels($request) {
    $result = array();
    $this->db->select('a.* ,b.name as cityName');
    $this->db->from('hotel_tbl_ranking a');
    $this->db->join('states b','b.id = a.CityID','inner');
    $this->db->where('a.FromDate <=',date('Y-m-d',strtotime($request['Check_in'])));
    $this->db->where('a.ToDate >=',date('Y-m-d',strtotime($request['Check_in'])));
    $this->db->where('a.delFlag',1);
    $this->db->like('b.name',$request['cityname']);
    $this->db->limit('1');
    $query = $this->db->get()->result();
  
    if (count($query)!=0) {
      $hotelId = explode(",", $query[0]->Hotels);
      $this->db->select('*');
      $this->db->from('ci_sessions');
      $this->db->where('agent_id',$this->session->userdata('agent_id'));
      $this->db->where_in('HotelCode',$hotelId);
      $this->db->where('ip_add',get_client_ip());
      $this->db->where('DataType','otelseasy');
      $result = $this->db->limit(5)->get()->result();
    }
    return $result;
  }
  public function gettelrdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_telr_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  } 
  public function trendingHotels() {
    $this->db->select('htl_banner');
    $this->db->from('hotel_tbl_agents');
    $this->db->where('id',$this->session->userdata('agent_id'));
    $result = $this->db->get()->result();
    if ($result[0]->htl_banner!="") {
      $hotelId = explode(",", $result[0]->htl_banner);
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotels');
      $this->db->where_in('id',$hotelId);
      $result1 = $this->db->get()->result();
    } else {
      $result1 = $this->db->query('SELECT COUNT(*) as c,b.* FROM hotel_tbl_booking a inner join hotel_tbl_hotels b on a.hotel_id = b.id group by hotel_id order by c desc limit 6')->result(); 
    }
    return $result1;
  }
}    





