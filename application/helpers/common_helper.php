 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function email_validation($mail) {
  $ci =& get_instance();
    $query = $ci->db->query("Select Email from hotel_tbl_agents where Email= '".$mail."'");
    $data = $query->result();
    if(count($data) ==0) {
      return 1;
    } else {
      return 0;
    }
}
function forget_email_validation($mail) {
  $ci =& get_instance();
    $query = $ci->db->query("Select Email from hotel_tbl_user where Email= '".$mail."'");
    $data = $query->result();
    if(count($data) ==0) {
      return 1;
    } else {
      return 0;
    }
}
function user_email_validation($mail) {
  $ci =& get_instance();
    $query = $ci->db->query("Select Email from hotel_tbl_user where Email= '".$mail."'");
    $data=$query->result();
    if(count($data)==0) {
      return 1;
    } else {
      return 0;
    }
    // print_r($data);
    // exit();
}
 function title() {
    $ci =& get_instance();
      $ci->db->select('Title');
      $ci->db->from('hotel_tbl_general_settings');
      $ci->db->where('id',1);
      $query=$ci->db->get();
      $final= $query->result();
      return $final;
}
function hotel_facility_icon($icon_id) {
    $ci =& get_instance();
      $ci->db->select('hotel_tbl_icons.icon_src');
      $ci->db->from('hotel_tbl_hotel_facility');
      $ci->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_hotel_facility.Icon', 'left');
      $ci->db->where('hotel_tbl_hotel_facility.id',$icon_id);
      $query=$ci->db->get();
      $final= $query->result();
      print_r($final[0]->icon_src);
}
function hotel_facility_icon_ajax($icon_id) {
    $ci =& get_instance();
      $ci->db->select('hotel_tbl_icons.icon_src');
      $ci->db->from('hotel_tbl_hotel_facility');
      $ci->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_hotel_facility.Icon', 'left');
      $ci->db->where('hotel_tbl_hotel_facility.id',$icon_id);
      $query=$ci->db->get();
      $final= $query->result();
      if (count($final)!=0) {
        return $final[0]->icon_src;
      } else {
        return '';
      }
}
function hotel_facility_icon_name_ajax($icon_id) {
    $ci =& get_instance();
      $ci->db->from('hotel_tbl_hotel_facility');
      $ci->db->where('id',$icon_id);
      $query=$ci->db->get();
      $final= $query->result();
      if (count($final)!=0) {
        return $final[0]->Hotel_Facility;
      } else {
        return '';
      }
}
function room_facility_icon($icon_id) {
    $ci =& get_instance();
      $ci->db->select('hotel_tbl_icons.icon_src');
      $ci->db->from('hotel_tbl_room_facility');
      $ci->db->join('hotel_tbl_icons','hotel_tbl_icons.id = hotel_tbl_room_facility.Icon', 'left');
      $ci->db->where('hotel_tbl_room_facility.id',$icon_id);
      $query=$ci->db->get();
      $final= $query->result();
      print_r($final[0]->icon_src);
}
function agent_image() {
    $ci =& get_instance();
    if ($ci->session->userdata('agent_id')=="") {
      redirect(base_url());
    }
    $id=$ci->session->userdata('agent_id');
    $ci->db->select('profile_image');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$id);
    $query=$ci->db->get();
    $final =  $query->result();
    return $final[0]->profile_image;
}
function contry_image() {
    $ci =& get_instance();
    $id=$ci->session->userdata('agent_id');
    $ci->db->select('*');
    $ci->db->from('currency_update');
    $query=$ci->db->get();
    $final =  $query->result();
    return $final;
}
function mark_up_get() {
  $ci =& get_instance();
    $id=$ci->session->userdata('agent_id');
    $ci->db->select('Markup');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$id);
    $query=$ci->db->get();
    $final =  $query->result();
    return $final[0]->Markup;
}
function hotel_mark_up_get() {
  $ci =& get_instance();
    $ci->db->select('markup');
    $ci->db->from('hotel_tbl_contract');
    $ci->db->where('hotel_id',$id);
    $query=$ci->db->get();
    $final =  $query->result();
    return $final[0]->markup;
}
function general_mark_up_get() {
  $ci =& get_instance();
    $id=$ci->session->userdata('agent_id');
    $ci->db->select('general_markup');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$id);
    $query=$ci->db->get();
    $final =  $query->result();
    return $final[0]->general_markup;
}
function admin_mark_up_get() {
  $ci =& get_instance();
    $ci->db->select('markup');
    $ci->db->from('hotel_tbl_general_settings');
    $query=$ci->db->get();
    $final =  $query->result();
    return $final[0]->markup;
}

function agent_request() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('delflg','2');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function agent_request_count() {
    $ci =& get_instance();
    $id=$ci->session->userdata('id');
    // return $id;
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_notifications_list');
    $query=$ci->db->get();
    $final =$query->result();
    if (count($final)!=0) {
      foreach($final as $key => $value) {
        $explode_id[$key] =explode(",", $value->user_id);
        foreach ($explode_id[$key] as $key1 => $value1) {
          if($value1==$id){
             if ($value->notification_type=="hotel_request") {
                $hotel_request[$key] = $value;
             }
             if ($value->notification_type=="hotel_booking_accept") {
                $hotel_booking_accept[$key] = $value->id;
             }
             if ($value->notification_type=="hotel_booking__reject") {
                $hotel_booking__reject[$key] = $value->id;
             }
             if ($value->notification_type=="hotel_booking_cancelled") {
                $hotel_booking_cancelled[$key] = $value->id;
             }
             if ($value->notification_type=="agent_request") {
                $agent_request[$key] = $value->id;
             }
             if ($value->notification_type=="hotel_booking_request") {
                $hotel_booking_request[$key] = $value->id;
             } 
             if ($value->notification_type=="transfer_booking_cancelled") {
                $transfer_booking_cancelled[$key] = $value->id;
             } 
             if ($value->notification_type=="tour_booking_cancelled") {
                $tour_booking_cancelled[$key] = $value->id;
             } 
             if ($value->notification_type=="tour_booking_request") {
                $tour_booking_request[$key] = $value->id;
             }
             if ($value->notification_type=="transfer_booking_request") {
                $transfer_booking_request[$key] = $value->id;
             }
          }
        
      }
    }
  } 
  if (!isset($hotel_request)) {
    $return['hotel_request'] = 0;
  } else {
    $return['hotel_request'] = count($hotel_request);
  }
  if (!isset($hotel_booking_accept)) {
    $return['hotel_booking_accept'] = 0;
  } else {
    $return['hotel_booking_accept'] = count($hotel_booking_accept);
  }
  if (!isset($hotel_booking__reject)) {
    $return['hotel_booking__reject'] = 0;
  } else {
    $return['hotel_booking__reject'] = count($hotel_booking__reject);
  }
  if (!isset($hotel_booking_cancelled)) {
    $return['hotel_booking_cancelled'] = 0;
  } else {
    $return['hotel_booking_cancelled'] = count($hotel_booking_cancelled);
  }
  if (!isset($agent_request)) {
    $return['agent_request'] = 0;
  } else {
    $return['agent_request'] = count($agent_request);
  }
  if (!isset($hotel_booking_request)) {
    $return['hotel_booking_request'] = 0;
  } else {
    $return['hotel_booking_request'] = count($hotel_booking_request);
  }

  if (!isset($transfer_booking_cancelled)) {
    $return['transfer_booking_cancelled'] = 0;
  } else {
    $return['transfer_booking_cancelled'] = count($transfer_booking_cancelled);
  }
  if (!isset($tour_booking_cancelled)) {
    $return['tour_booking_cancelled'] = 0;
  } else {
    $return['tour_booking_cancelled'] = count($tour_booking_cancelled);
  }
  if (!isset($tour_booking_request)) {
    $return['tour_booking_request'] = 0;
  } else {
    $return['tour_booking_request'] = count($tour_booking_request);
  }
  if (!isset($transfer_booking_request)) {
    $return['transfer_booking_request'] = 0;
  } else {
    $return['transfer_booking_request'] = count($transfer_booking_request);
  }
  return $return;
}

function notify_list_remove($data,$id){
  $ci =&get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_notifications_list');
  $ci->db->where('notification_type',$data);
  $query=$ci->db->get();
  $final = $query->result();
  foreach ($final as $key => $value) {
    $explode_userId[$key] = explode(",", $value->user_id);
    foreach ($explode_userId[$key] as $key1 => $value1) {
      if ($id!=$value1) {
       $id_split[$key1] = $value1;
      }
    }
  }
  $implode_id = implode(",", $id_split);
  $data1 = array('user_id'=>$implode_id);
  $ci->db->where('notification_type',$data);
  $ci->db->update('hotel_tbl_notifications_list',$data1);
 return true;
}

function hotel_request() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_hotels');
    $ci->db->where('delflg','2');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function sights_request() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_sight_seeing');
    $ci->db->where('delflg','2');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function hotel_booking__accept_notify() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_booking');
    $ci->db->where('booking_flag','1');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function hotel_booking__request_notify() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_booking');
    $ci->db->where('booking_flag','2');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function hotel_booking__reject_notify() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_booking');
    $ci->db->where('booking_flag','0');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function hotel_booking__cancelled_notify() {
  $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_booking');
    $ci->db->where('booking_flag','3');
    $query=$ci->db->get();
    $final =  $query->result();
    return count($final);
}
function mail_details() {
    $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_mail_setting');
    $ci->db->where('id','1');
    $query=$ci->db->get();
    return  $query->result();
}
// function hotel_portal_notify() {
//   $ci =& get_instance();
//   $id = $ci->session->userdata('id');
//   $ci->db->select('*');
//   $ci->db->from('hotel_tbl_booking');
//   $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_booking.room_id', 'left');
//   $ci->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.Room_Type', 'left');
//   $ci->db->where('hotel_tbl_booking.check_in >=',date('m/d/Y'));
//   $ci->db->where('hotel_tbl_booking.hotel_id',$id);
//   $query=$ci->db->get();
//   return  $query->result();
// }
function hotel_portal_notify() {
  $ci =& get_instance();
  $id = $ci->session->userdata('hotelid');
  $ci->db->select('hotel_tbl_notification.*,hotel_tbl_notification.id as bk_id,hotel_tbl_booking.*,hotel_tbl_hotels.*,hotel_tbl_hotel_room_type.*,hotel_tbl_agents.*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->join('hotel_tbl_booking','hotel_tbl_booking.id = hotel_tbl_notification.booking_id', 'left');
  $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_booking.room_id', 'left');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id', 'left');
  $ci->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_notification.agent_id', 'left');
  $ci->db->where('hotel_tbl_notification.hotel_id',$id);
  $ci->db->order_by('hotel_tbl_notification.id', "desc");
  $ci->db->limit('5');
  $query=$ci->db->get();
  return  $query->result();
}
function hotel_portal_notify_count1() {
  $ci =& get_instance();
  $id = $ci->session->userdata('hotelid');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->where('hotel_id',$id);
  $ci->db->where('rejected',0);
  $query=$ci->db->get();
  return  $query->result();
}
function hotel_portal_notify_count2() {
  $ci =& get_instance();
  $id = $ci->session->userdata('hotelid');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->where('hotel_id',$id);
  $ci->db->where('rejected',2);
  $query=$ci->db->get();
  return  $query->result();
}
function agent_portal_notify_count() {
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_notification.hotel_id', 'left');

  $ci->db->where('hotel_tbl_hotels.delflg',1);
  $ci->db->where('hotel_tbl_notification.agent_id',$id);
  $ci->db->where('hotel_tbl_notification.readed',1);
  $query=$ci->db->get();
  return  $query->result();
}
function agent_portal_notify() {
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('hotel_tbl_notification.*,hotel_tbl_booking.*,hotel_tbl_booking.id as bk_id,hotel_tbl_hotels.*,hotel_tbl_hotel_room_type.*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->join('hotel_tbl_booking','hotel_tbl_booking.id = hotel_tbl_notification.booking_id', 'left');
  $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_booking.room_id', 'left');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id', 'left');
  $ci->db->where('hotel_tbl_notification.agent_id',$id);
  $ci->db->where('hotel_tbl_hotels.delflg',1);
  // $ci->db->order_by('hotel_tbl_notification.readed', "asc");
  $ci->db->limit('5');
  $query=$ci->db->get();
  return  $query->result();
}
function agent_portal_all_notify() {
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('hotel_tbl_notification.*,hotel_tbl_booking.*,hotel_tbl_booking.id as bk_id,hotel_tbl_hotels.*,hotel_tbl_hotel_room_type.*');
  $ci->db->from('hotel_tbl_notification');
  $ci->db->join('hotel_tbl_booking','hotel_tbl_booking.id = hotel_tbl_notification.booking_id', 'left');
  $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_booking.room_id', 'left');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id', 'left');
  $ci->db->where('hotel_tbl_notification.agent_id',$id);
  // $ci->db->order_by('hotel_tbl_notification.readed', "asc");
  $ci->db->limit('100');
  $query=$ci->db->get();
  return  $query->result();
}
// function agent_portal_notify() {
//   $ci =& get_instance();
//   $id = $ci->session->userdata('agent_id');
//   $ci->db->select('hotel_tbl_booking.id as bk_id , hotel_tbl_booking.*,hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.*,hotel_tbl_hotels.*');
//   $ci->db->from('hotel_tbl_booking');
//   $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.id = hotel_tbl_booking.room_id', 'left');
//   $ci->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.Room_Type', 'left');
//   $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id', 'left');
//   $ci->db->where('hotel_tbl_booking.check_out >=',date('m/d/Y'));
//   $ci->db->where('hotel_tbl_booking.agent_id',$id);
//   $query=$ci->db->get();
//   return  $query->result();
// }
function agent_currency() {
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $currency=$ci->session->userdata('currency');
  return $currency;
}
function currency_type($usr_c,$c_type) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$usr_c);
  // $converted_amount = $c_type*$rate;
  $query=$ci->db->get();
  $final= $query->result();
  $db_amount=($final[0]->amount);
  $converted_amount = $db_amount*$c_type;
  return number_format($converted_amount,2);
}
function xml_currency_change($amount,$dc_type,$c_type) {
  $ci =& get_instance();
  
  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$dc_type);
  $query=$ci->db->get();
  $final= $query->result();

  $dc_out = $final[0]->amount;

  $dc_divided = $amount/$dc_out;

  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$c_type);
  $query=$ci->db->get();
  $final1= $query->result();
  $c_out = $final1[0]->amount;

  $converted_amount = $c_out*$dc_divided;
  return number_format($converted_amount,2);
}
function currency_type1($usr_c,$c_type) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$usr_c);
  // $converted_amount = $c_type*$rate;
  $query=$ci->db->get();
  $final= $query->result();
  $db_amount=($final[0]->amount);
  $converted_amount = $db_amount*$c_type;
  return $converted_amount;
}
function onload_currency() {
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('Preferred_Currency');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$id);
  $query=$ci->db->get();
  $final= $query->result();
  return $final[0]->Preferred_Currency;
}
function currency_type_gc($usr_c,$c_type) {
  $ci =& get_instance();
  $arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
      ),
  );

  $to_currency = $usr_c;
  $amount= $c_type;
  $from_Currency = urlencode("AED");
  $to_Currency = urlencode($to_currency); 
  if ($from_Currency!=$to_Currency) {
    // $get = file_get_contents("https://finance.google.com/bctzjpnsun/converter?a=1&from=$from_Currency&to=$to_Currency", false, stream_context_create($arrContextOptions));
    // $get = explode("<span class=bld>",$get);
    // $get = explode("</span>",$get[1]);
    // $rate= preg_replace("/[^0-9\.]/", null, $get[0]);
    $resultKey = $from_Currency.'_'.$to_Currency;
    $get = file_get_contents("http://free.currencyconverterapi.com/api/v6/convert?q=".$resultKey."&&compact=ultra&apiKey=b06fe49c67407a0f5c71", false, stream_context_create($arrContextOptions));
    $get = json_decode($get);
    // $get = $get->results;
    // $rate =$get->$resultKey->val;
    $rate = $get->$resultKey;
    $converted_amount = $amount*$rate;
    return $converted_amount;
  }else{
    return $c_type;
  }
}
function currency_type_aed($f_cur,$usr_c,$c_type) {
  $ci =& get_instance();
  $ci->db->select('amount');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$f_cur);
  $query=$ci->db->get()->result();
  
  $amount = $query[0]->amount;

  return $c_type/$amount;

}
function tcpdf()
{
    require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');
}
function special_offer_amount($date,$room_id,$hotel_id,$contract_id) {
  $date = date('Y-m-d', strtotime($date));
  $ci =& get_instance();
  $ci->db->select('amount');
  $ci->db->from('hotel_tbl_allotement');
  $ci->db->where('room_id',$room_id);
  $ci->db->where('hotel_id',$hotel_id);
  $ci->db->where('allotement_date',$date);
  $ci->db->where('contract_id',$contract_id);
  $query=$ci->db->get();
  $result = $query->result();
  if (count($result)!=0) {
    $amount = $result[0]->amount;
  } else {
    $ci->db->select('price');
    $ci->db->from('hotel_tbl_hotel_room_type');
    $ci->db->where('id',$room_id);
    $query1=$ci->db->get();
    $result1 = $query1->result();
    $amount = $result1[0]->price;
  }
  return $amount;
}
function agent_password_reset($code,$mail) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('Agent_Code',$code);
  $ci->db->where('Email',$mail);
  $query=$ci->db->get();
  $result = $query->result();

  if (count($result)!=0) {
    if ($result[0]->delflg=="1") {
      return $result[0]->Email;
    } else {
      return "inactive";
    }
  } else {
    return 0;

  }
}
function agent_password_update($code,$pwd) {
  $ci =& get_instance();
  $data  = array('password' => md5($pwd),'fisrTry'=>'1');
  $ci->db->where('Agent_Code',$code);
  $ci->db->update('hotel_tbl_agents',$data);
  return true;
}
function admin_password_reset($mail) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('Email',$mail);
  $query=$ci->db->get();
  $result = $query->result();

  if (count($result)!=0) {
    if ($result[0]->Del_Flag=="1") {
      return $result[0]->Email;
    } else {
      return "inactive";
    }
  } else {
    return 0;

  }
}
function admin_password_update($mail,$pwd) {
  $ci =& get_instance();
  $data  = array('Password' => md5($pwd),
                  'password_reset' => 1);
  $ci->db->where('Email',$mail);
  $ci->db->update('hotel_tbl_user',$data);
  return true;
}
function user_image() {
  $ci =& get_instance();
  $id=$ci->session->userdata('id');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$id);
  $query=$ci->db->get();
  $result = $query->result();
  if ($ci->session->userdata('hotel_code')!="") {
    $sess_array = array('name' => '');
    $ci->session->sess_destroy();
    redirect(base_url()."backend");
  }
  if($result[0]->Img!="") {
    return base_url()."uploads/user_profile_pic/".$result[0]->id."/thumb_".$result[0]->Img;
  } else {
    return base_url()."assets/images/user/6.png";
  }
}
function last_update_hotel($hotel_id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_hotels');
  $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.hotel_id = hotel_tbl_hotels.id', 'left');
  $ci->db->where('hotel_tbl_hotels.id',$hotel_id);
  $ci->db->where('hotel_tbl_hotels.delflg',1);
  $ci->db->where('hotel_tbl_hotel_room_type.delflg',1);
  $ci->db->order_by("hotel_tbl_hotels.id", "desc");
  $ci->db->limit('1');
  $query=$ci->db->get();
  return $query->result();
}
function permission_get() {
  $ci =& get_instance();
  // $drop = 'DROP TABLE IF EXISTS permission_search';
  // $query3 = $ci->db->query($drop);
  $ci->db->query("CREATE TEMPORARY TABLE permission_search  (hotel_id INT(11),Agent_id VARCHAR(100))");
  return true;
}
function fav_count(){
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('hotel_tbl_favourite.fav_hotel_id');
  $ci->db->from('hotel_tbl_favourite');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_favourite.fav_hotel_id','left');
  $ci->db->where('hotel_tbl_favourite.agent_id',$id);
  $ci->db->where('hotel_tbl_hotels.delflg',1);
  // $query=$ci->db->get();
  $num_results = $ci->db->count_all_results();
  // return $count->result();
  return $num_results;
}
function favourite(){
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_favourite');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_favourite.fav_hotel_id', 'left');
  $ci->db->where('hotel_tbl_favourite.agent_id',$id);
  $ci->db->where('hotel_tbl_hotels.delflg',1);
  $ci->db->limit('5');
  $query=$ci->db->get();
  return $query->result();
}
function all_favourite(){
  $ci =& get_instance();
  $id = $ci->session->userdata('agent_id');
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_favourite');
  $ci->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_favourite.fav_hotel_id', 'left');
  $ci->db->where('agent_id',$id);
  $query=$ci->db->get();
  return $query->result();
}
function get_room_type($id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_room_type');
  $ci->db->where('id',$id);
  $query=$ci->db->get();
  $final = $query->result();
  return $final[0]->Room_Type;
}
function get_room_name_type($id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_room_type');
  $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id','left');
  $ci->db->where('hotel_tbl_hotel_room_type.id',$id);
  $query=$ci->db->get();
  $final = $query->result();
  if (count($final)!=0) {
    return $final[0]->Room_Type.' '.$final[0]->room_name;
  } 
}
function agentIp_currency($id) {
  $ci =& get_instance();
  // $c_typez=$ci->session->userdata('currency');
  $ci->db->select('Preferred_Currency');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$id);
  $result=$ci->db->get()->result();
  // $ip_currency = var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ci->input->ip_address()))['geoplugin_currencyCode'],true);
  
  // if ($ip_currency!="NULL" && $ip_currency!="") {
  //   $currency = trim($ip_currency,"'");
  // } else if ($c_typez!="") {
  //    $currency = $c_typez;
  // } else {
    $currency = $result[0]->Preferred_Currency;
  // }
  // print_r($result[0]->Preferred_Currency);
  // return $result;
  return $currency;
}
function availableContract() {
  $data['adults'][0] = 2;
  $data['Child'][0] = 0;

  $ci =& get_instance();
  $start_date = date("Y-m-d" , strtotime('+2 days')); 
  $endDate = date("Y-m-d" , strtotime('+4 days'));
  $data['Check_in'] = $start_date;
  $data['Check_out'] = $endDate;
  $checkin_date=date_create($start_date);
  $checkout_date=date_create($endDate);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  
 $ci->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS  contractProcessTbl  (hotel_id INT(11), GsAdultPrice VARCHAR(100), GsChildPrice VARCHAR(100), roomType INT(11),roomID INT(11),contract_id VARCHAR(255))");
      
      $ci->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS  contractExtrabed  (hotel_id INT(11), Price VARCHAR(100), roomID INT(11),contract_id VARCHAR(255))");
  /*contract check start*/
            $contractHotelId = array('');
            $contractConId = array('');
            $outData = array();
            $arrResult = array();
            $gsData = array();
            $mangsData = array();
            $extrabedAmount = array();
            for($i = 0; $i < $tot_days; $i++) {
              $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
              $ot[$i] = $ci->db->query("SELECT * FROM hotel_tbl_contract WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND contract_flg  = 1")->result();
              foreach ($ot[$i] as $key5 => $value5) {
                $agentCheck = $ci->db->query("SELECT * FROM hotel_agent_permission WHERE contract_id = '".$value5->contract_id."' AND hotel_id = '".$value5->hotel_id."'")->result();

                /*Agent check start*/
                if (count($agentCheck)!=0) {
                  foreach (explode(",", $agentCheck[0]->permission) as $key25 => $value25) {
                    if ($ci->session->userdata('agent_id')==$value25) {
                      $agentCheckResult = $value25;
                    } else {
                      $agentCheckResult = "";
                    }
                  }
                } else {
                  $agentCheckResult = "";
                }
                /*Agent Check end*/
                /*Country check start*/
                $countryCheck = $ci->db->query("SELECT * FROM hotel_country_permission WHERE contract_id = '".$value5->contract_id."' AND hotel_id = '".$value5->hotel_id."'")->result();
                if (count($countryCheck)!=0) {
                  foreach (explode(",", $countryCheck[0]->permission) as $key9 => $value9) {
                    if (substr($ci->session->userdata('currency'),0,2)==$value9) {
                      $countryCheckResult = $value9;
                    } else {
                      $countryCheckResult = "";
                    }
                  }
                } else {
                  $countryCheckResult = "";
                }
                /*Country check end*/
                if ($agentCheckResult=="" && $countryCheckResult=="") {
                  if ($value5->contract_type=="Sub") {
                    $enablecon = $ci->db->query('SELECT * FROM hotel_tbl_contract WHERE contract_id = "CON0'.$value5->linkedContract.'" AND contract_flg = 1')->result();
                    if (count($enablecon)!=0) {
                      $outData[$i][$key5]['hotel_id'] = $value5->hotel_id;
                      $outData[$i][$key5]['contract_id'] = $value5->contract_id;
                    }
                  } else {
                    $outData[$i][$key5]['hotel_id'] = $value5->hotel_id;
                    $outData[$i][$key5]['contract_id'] = $value5->contract_id;
                  }
                }

              }
            }
            foreach ($outData as $key6 => $value6) {
               foreach ($value6 as $key7 => $value7) {
                  // $dateArraySum = implode("','", $date);

                  // $linkConclosed = $ci->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$value7['contract_id']."' AND hotel_id = '".$value7['hotel_id']."'")->result();
                  // if ($linkConclosed[0]->contract_type=="Sub") {
                  //   $Lcontract_id = "CON0".$linkConclosed[0]->linkedContract;
                  // } else {
                  //   $Lcontract_id = $value7['contract_id'];
                  // }
                  // $closedOutCheck  = $ci->db->query("SELECT * FROM hotel_tbl_closeout_period WHERE closedDate IN ('".$dateArraySum."') AND contract_id = '".$Lcontract_id."' AND hotel_id = '".$value7['hotel_id']."'")->result();
                   // if (count($closedOutCheck)==0) {
                      $arrResult[$value7['hotel_id']][$key6]['hotel_id'] = $value7['hotel_id']; 
                      $arrResult[$value7['hotel_id']][$key6]['hotel_id1'][] =$value7['hotel_id']; 
                      $arrResult[$value7['hotel_id']][$key6]['contract_id1'][] =$value7['contract_id']; 
                      $arrResult[$value7['hotel_id']][$key6]['contract_id'] =$value7['contract_id']; 
                   // }
               }
            }
             // general supplement Check start
            foreach ($arrResult as $key8 => $value8) {
              if (count($value8)>=$tot_days) {
          
                if (count($value8[0]['contract_id1'])!=0) {
                  foreach ($value8[0]['contract_id1'] as $key22 => $value22) {
                      $contractBoardCheck = $ci->db->query('SELECT * FROM hotel_tbl_contract WHERE contract_id = "'.$value22.'"')->result();
                        
                      $max_child_age = $contractBoardCheck[0]->max_child_age;
                      $contract_board = $contractBoardCheck[0]->board;

                      foreach ($data['Child'] as $Rreqkey => $Rreqvalue) {
                        if ($Rreqvalue!=0) {
                          for ($q=1; $q <=$Rreqvalue ; $q++) { 
                              if ( isset($data['room'.($Rreqkey+1).'-childAge'][$q-1]) && $data['room'.($Rreqkey+1).'-childAge'][$q-1] >= $max_child_age) {
                                $data['adults'][$Rreqkey]+=1;
                                $data['Child'][$Rreqkey]-=1;
                                unset($data['room'.($Rreqkey+1).'-childAge'][$q-1]);
                              }
                          }
                        }
                      }
                      // print_r($data['adults']);
                      // echo "<br>";
                      // print_r($data['Child']);

                    for($i = 0; $i < $tot_days; $i++) {
                        $Sdate[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
                        $RoomData[$key22][$i] = $ci->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE hotel_id = '".$value8[0]['hotel_id1'][$key22]."' AND delflg = 1")->result();
                           
                        $generalSplmntCheck[$key22][$i] = $ci->db->query("SELECT * FROM hotel_tbl_generalsupplement WHERE '".$Sdate[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$value22."' AND hotel_id = '".$value8[0]['hotel_id1'][$key22]."' AND mandatory = 1")->result();

                       

                        foreach ($RoomData[$key22][$i] as $key15 => $value15) {
                            if (count($generalSplmntCheck[$key22][$i])!=0) {
                                foreach ($generalSplmntCheck[$key22][$i] as $key11 => $value11) {
                                  $childAmount[$key22][$i][$key11][$value15->id] = 0;
                                  $roomTypeexplode[$key22][$i][$key11] = explode(",", $value11->roomType);
                                  foreach ($roomTypeexplode[$key22][$i][$key11] as $key12 => $value12) {
                                    if ($value15->id==$value12) {
                                      if ($value11->application=="Per Person") {
                                        $adultAmount[$key22][$i][$key11][$value15->id] = $value11->adultAmount*array_sum($data['adults']);
                                          for ($k=1; $k <= count($data['Child']); $k++) { 
                                            if (isset($data['room'.$k.'-childAge'])) {
                                              foreach ($data['room'.$k.'-childAge'] as $key38 => $value38) {
                                                if ($value11->MinChildAge < $value38) {
                                                  $childAmount[$key22][$i][$key11][$value15->id] = $value11->childAmount;
                                                } 
                                              }
                                            }
                                          }
                                      } else {
                                        $adultAmount[$key22][$i][$key11][$value15->id] = $value11->adultAmount*count($data['adults']);
                                        $childAmount[$key22][$i][$key11][$value15->id] = 0;
                                      }
                                    }
                                  }
                                }
                                
                            }

                        }

                      }  
                      $AdultsumArray = array();
                      $ChildsumArray = array();
                      if (isset($adultAmount[$key22])) {
                        foreach ($adultAmount[$key22] as $gskey => $gsvalue) {
                          foreach ($gsvalue as $gs1key => $gs1value) {
                            foreach ($gs1value as $gs2key => $gs2value) {
                              if (isset($AdultsumArray[$gs2key])) {
                                $AdultsumArray[$gs2key]+=$gs2value;
                              } else {
                                $AdultsumArray[$gs2key] =$gs2value;
                              }
                            }
                          }
                        }
                        foreach ($childAmount[$key22] as $gsckey => $gscvalue) {
                          foreach ($gscvalue as $gsc1key => $gsc1value) {
                            foreach ($gsc1value as $gsc2key => $gsc2value) {
                              if (isset($ChildsumArray[$gsc2key])) {
                                $ChildsumArray[$gsc2key]+=$gsc2value;
                              } else {
                                $ChildsumArray[$gsc2key] =$gsc2value;
                              }
                            }
                          }
                        }



                        foreach ($AdultsumArray as $gsfinalKey => $gsfinalValue) {
                            $gsroomId = $gsfinalKey;
                            $gsContractId = $value22;
                            $gsHotelId = $value8[0]['hotel_id1'][$key22];
                            $gsAdultAmount = $gsfinalValue;
                            $gsChildAmount = $ChildsumArray[$gsfinalKey];
                            // echo $gsroomId." ".$gsAdultAmount." ".$gsChildAmount." ".$gsContractId." ".$gsHotelId;
                            // echo "<br>";
                            $ci->db->query("INSERT INTO contractProcessTbl ( hotel_id, GsAdultPrice,GsChildPrice,roomType,contract_id,roomID)   VALUES   ('$gsHotelId', '$gsAdultAmount','$gsChildAmount','','$gsContractId','$gsroomId')");
                        }
                      }
                  

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

                          for($i = 0; $i < $tot_days; $i++) {
                            $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
                            $extrabedallotment[$key22][$i] = $ci->db->query("SELECT * FROM hotel_tbl_extrabed WHERE '".$date[$i]."' BETWEEN from_date AND to_date AND contract_id = '".$value22."' AND  hotel_id = '".$value8[0]['hotel_id1'][$key22]."'")->result();
                            foreach ($RoomData[$key22][$i] as $key15 => $value15) {
                                $standard_capacity = $value15->standard_capacity;

                              if (count($extrabedallotment[$key22][$i])!=0) {
                                // print_r($extrabedallotment[$i]);
                                foreach ($extrabedallotment[$key22][$i] as $key35 => $value35) {
                                  foreach ($data['adults'] as $key37 => $value37) {
                                    if (($value37+$data['Child'][$key37]) > $standard_capacity) {
                                      for ($k=1; $k <= count($data['Child']); $k++) { 
                                        if (isset($data['room'.$k.'-childAge'])) {
                                          foreach ($data['room'.$k.'-childAge'] as $key38 => $value38) {
                                              if ($max_child_age <= $value38) {
                                                  $explodebRType = explode(",", $value35->roomType);
                                                  foreach ($explodebRType as $exrtypekey => $exrtypevalue) {
                                                      if ($value15->id==$exrtypevalue) {
                                                        $extrabedAmount[$key22][$i][$value15->id][] =  $value35->amount;
                                                      }
                                                  }
                                              } else {
                                                  $boardalt[$i] = $ci->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$value22."' AND board IN ('".$implodeboardRequest."')")->result();
                                                  if (count($boardalt[$i])!=0) {
                                                    foreach ($boardalt[$i] as $key21 => $value21) {
                                                      if ($value21->startAge <= $value38 && $value21->finalAge >= $value38) {
                                                            $explodeRType = explode(",", $value21->roomType);
                                                            foreach ($explodeRType as $rtypekey => $rtypevalue) {
                                                                if ($value15->id==$rtypevalue) {
                                                                    $extrabedAmount[$key22][$i][$value15->id][] =  $value21->amount;
                                                                } 
                                                            }
                                                            
                                                      }
                                                      
                                                    }
                                                  }
                                                  

                                              }
                                          }
                                          
                                        }

                                      }
                                      if ($value37 > $standard_capacity) {
                                        $explodebRType = explode(",", $value35->roomType);
                                        foreach ($explodebRType as $exrtypekey => $exrtypevalue) {
                                            if ($value15->id==$exrtypevalue) {
                                              $extrabedAmount[$key22][$i][$value15->id][] =  $value35->amount;
                                            }
                                        }
                                      }

                                    }
                                  }
                                }
                            }
                          }
                      }

                      $sumArray = array();
                      if (isset($extrabedAmount[$key22])) {
                        foreach ($extrabedAmount[$key22] as $extrabedkey => $extrabedvalue) {
                          
                          foreach ($extrabedvalue as $extrabed2key => $extrabed2value) {
                              if (isset($sumArray[$extrabed2key])) {
                                $sumArray[$extrabed2key]+=array_sum($extrabed2value);
                              } else {
                                $sumArray[$extrabed2key] =array_sum($extrabed2value);
                              }
                            }
                          }

                          foreach ($sumArray as $febkey => $febvalue) {
                              $ebRoomId = $febkey;
                              $ebContractId = $value22;
                              $ebhotelId = $value8[0]['hotel_id1'][$key22];
                              $ebPrice = $febvalue;

                            $ci->db->query("INSERT INTO contractExtrabed ( hotel_id, Price,contract_id,roomID)   VALUES   ('$ebhotelId', '$ebPrice','$ebContractId','$ebRoomId')");

                          }
                          
                        }

                  }
                }
                
                


                // All condition check start
                  foreach ($value8[0]['hotel_id1'] as $key25 => $value25) {
                    $contractHotelId[] = $value8[0]['hotel_id1'][$key25];
                    $contractConId[] = $value8[0]['contract_id1'][$key25];
                  }
                // All condition check end
                
              
              }
            } 
            // general supplement Check end

            // $ids = array('4', '3');
            $ci->db->where_in('hotel_tbl_hotel_room_type.hotel_id', $contractHotelId);
          /*contract check end*/

          
          /*Allotment check start*/

          for($i = 0; $i < $tot_days; $i++) {
            $dateAlt[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
          }
          $implode_data = implode("','", $dateAlt);
          $implode_data1 = implode("','", $contractHotelId);
          $implode_data2 = implode("','", $contractConId);

          $ci->db->query("CREATE TEMPORARY TABLE IF NOT EXISTS allotement_search  (hotel_id INT(11), price VARCHAR(100), contract_id VARCHAR(1000),board VARCHAR(100),roomID INT(11),alt INT(11),RoomType INT(11))");
          $allote_list = $ci->db->query("SELECT * ,sum(amount) as price,count(*) as count FROM hotel_tbl_allotement WHERE allotement_date IN ('".$implode_data."') AND hotel_id IN ('".$implode_data1."') AND contract_id IN ('".$implode_data2."') AND DATEDIFF(allotement_date,'".date('Y-m-d')."') >= cut_off GROUP BY contract_id,room_id")->result();
          

          $closedOutResult =array();
          foreach ($allote_list as $key => $value) {
            if ($tot_days==$value->count) {
              $max_capacity = $ci->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE id = '".$value->room_id."'")->result();
              foreach ($data['adults'] as $key77 => $value77) {
                if (($value77+$data['Child'][$key77]) > $max_capacity[0]->max_total || ($value77 > $max_capacity[0]->occupancy) || ($data['Child'][$key77] > $max_capacity[0]->occupancy_child)) {
                  $rtrn[$key77] = 1;
                } else {
                  $rtrn[$key77] = 0;
                }
              }
              $minimumStay = $ci->List_Model->minimumStayCheckAvailability($data,$value->contract_id);

               // Closed out Check start
              $linkConclosed = $ci->db->query("SELECT * FROM hotel_tbl_contract WHERE contract_id = '".$value->contract_id."' AND hotel_id = '".$value->hotel_id."'")->result();

              if ($linkConclosed[0]->contract_type=="Sub") {
                $Lcontract_id = "CON0".$linkConclosed[0]->linkedContract;
              } else {
                $Lcontract_id = $value7['contract_id'];
              }
              $closedOutCheck  = $ci->db->query("SELECT * FROM hotel_tbl_closeout_period WHERE closedDate IN ('".$implode_data."') AND contract_id = '".$Lcontract_id."' AND hotel_id = '".$value->hotel_id."'")->result();
              if (count($closedOutCheck)!=0) {
                foreach ($closedOutCheck as $COkey => $COvalue) {
                    $explodeCoRoomType = explode(",", $COvalue->roomType);
                    foreach ($explodeCoRoomType as $CoRTkey => $CoRTvalue) {
                        if ($CoRTvalue == $value->room_id) {
                            $closedOutResult[$key] = 1;
                        }
                    }
                }
              }
              // Closed out Check end

              if (array_sum($rtrn)==0 && $minimumStay=="true") {
                $booked = all_booked_room_ajax($value->room_id,$data['Check_in'],$data['Check_out'],$value->contract_id);
                if (substr($value->allotement-$booked,0,1)!="-" && ($value->allotement-$booked)!=0) {
                  $contractBoard = $ci->db->query('SELECT * FROM hotel_tbl_contract WHERE contract_id = "'.$value->contract_id.'"')->result();
                  $ci->db->query("INSERT INTO allotement_search (hotel_id,price,contract_id,board,roomID,alt,RoomType) VALUES ('$value->hotel_id','$value->price','$value->contract_id','".$contractBoard[0]->board."','$value->room_id','".($value->allotement-$booked)."','".$max_capacity[0]->room_type."')");
                }
              }
            }
            
          }
          // print_r($dff);
          /*Allotment check end*/

      $allote_list =  $ci->db->query("SELECT (allotement_search.price+IF(contractProcessTbl.GsAdultPrice IS NULL,0,contractProcessTbl.GsAdultPrice)+IF(contractProcessTbl.GsChildPrice IS NULL,0,contractProcessTbl.GsChildPrice)+IF(contractExtrabed.Price IS NULL,0,contractExtrabed.Price)) as price ,allotement_search.hotel_id as  hotel_id ,allotement_search.contract_id as  contract_id FROM allotement_search  LEFT JOIN contractProcessTbl ON contractProcessTbl.roomID = allotement_search.roomID AND contractProcessTbl.contract_id = allotement_search.contract_id LEFT JOIN contractExtrabed ON contractExtrabed.roomID = allotement_search.roomID AND contractExtrabed.contract_id = allotement_search.contract_id ")->result();

      // $allote_list = $ci->db->query("SELECT * , (price+IF(contractProcessTbl.GsAdultPrice IS NULL,0,contractProcessTbl.GsAdultPrice)+IF(contractProcessTbl.GsChildPrice IS NULL,0,contractProcessTbl.GsChildPrice)) as price ,allotement_search.hotel_id as hotel_id ,allotement_search.contract_id as contract_id FROM allotement_search LEFT JOIN contractProcessTbl ON contractProcessTbl.roomID = allotement_search.roomID AND contractProcessTbl.contract_id = allotement_search.contract_id WHERE  allotement_search.hotel_id IN ('".$implode_data1."') AND allotement_search.contract_id IN ('".$implode_data2."') ")->result();
      // print_r($dd);
      // exit();
  return $allote_list;
}
function hotel_menu_permission() {
  $ci =& get_instance();
  $id = $ci->session->userdata('id');
  if ($ci->session->userdata('hotel_code')=="") {
    $sess_array = array('name' => '');
    $ci->session->sess_destroy();
    redirect(base_url()."hotel_panel");
  }
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_hotels');
  $ci->db->where('id',$id);
  return $ci->db->get()->result();
  // $query=$ci->db->get();
  // return $per= $query->result();
  //return $per[0]->edit_profile;
}
function menuPermissionAvailability($user_id,$main_menu,$sub_menu) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$user_id);
  $output = $ci->db->get()->result();
  $userRole = $output[0]->Category;
  $ci->db->select('menupermissiontbl.*,hoteltableroles.*,permissionmainsubmenus.*');
  $ci->db->from('menupermissiontbl');
  $ci->db->join('hoteltableroles','hoteltableroles.id = menupermissiontbl.role','left');
  $ci->db->join('permissionmainsubmenus','permissionmainsubmenus.id = menupermissiontbl.menu_id','left');
  $ci->db->where('hoteltableroles.id',$userRole);
  $ci->db->where('permissionmainsubmenus.main_menu',$main_menu);
  if ($sub_menu!="") {
    $ci->db->where('permissionmainsubmenus.sub_menu',$sub_menu);
  }
  return $ci->db->get()->result();
}
function RoleAvailability($user_id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$user_id);
  $output = $ci->db->get()->result();
  $userRole = $output[0]->Category;

  $ci->db->select('*');
  $ci->db->from('hoteltableroles');
  $ci->db->where('id',$userRole);
  return $ci->db->get()->result();
}
function contract_idGet($hotel_id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_contract');
  $ci->db->where('hotel_id',$hotel_id);
  
  $contract =  $ci->db->get()->result();
  if (count($contract)!=0) {
    return $contract[0]->contract_id;
  } else {
    return 0;
  }
}
function CustomerSupport() {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('customersupport');
  $ci->db->where('id','1');
  return  $ci->db->get()->result();

}
function HotelsView() {
  $ci =& get_instance();
  $ci->db->select('htl_banner');
  $ci->db->from('hotel_tbl_general_settings');
  $ci->db->where('id',1);
  $result = $ci->db->get()->result();
  if ($result[0]->htl_banner!="") {
    $hotelId = explode(",", $result[0]->htl_banner);
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_hotels');
    $ci->db->where_in('id',$hotelId);
    $result1 = $ci->db->get()->result();
  } else {
    $result1 = $ci->db->query('SELECT COUNT(*) as c,b.* FROM hotel_tbl_booking a inner join hotel_tbl_hotels b on a.hotel_id = b.id group by hotel_id order by c desc limit 4')->result(); 
  }
  return $result1;
}
function all_booked_room_ajax($id,$start_date,$end_date,$contract_id) {
      $ci =& get_instance();
      $lcon_id = array();
      $contractType = $ci->db->query('SELECT contract_type,linkedContract FROM hotel_tbl_contract WHERE contract_id = "'.$contract_id.'"')->result();
      
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
        $linkedcontract = $ci->db->query('SELECT contract_id,contract_type,linkedContract FROM hotel_tbl_contract WHERE linkedContract = "'.str_replace("CON0","",$contract_id).'"')->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
        $linkedcontract = $ci->db->query('SELECT linkedContract,contract_id,contract_type FROM hotel_tbl_contract WHERE linkedContract = "'.str_replace("CON0","",$contractType[0]->linkedContract).'"')->result();
        // $ci->db->select('*');
        // $ci->db->from('hotel_tbl_contract');
        // $ci->db->where('linkedContract',str_replace("CON0","0",$contractType[0]->linkedContract));
        // $linkedcontract=$ci->db->get()->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = "CON0".$contractType[0]->linkedContract;
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 


        // $where1 = "(check_in BETWEEN '".$start_date."' AND '".$end_date."' OR check_out BETWEEN '".$start_date."' AND '".$end_date."')";
        $where1 = "check_in <= '".$start_date."' AND check_out > '".$start_date."'";
        // $ci->db->select('*');
        // $ci->db->from('hotel_tbl_booking');
        // $ci->db->where('room_id',$id);
        if (count($lcon_id)!=0) {
            $implodeContract = implode("','", $lcon_id);
            $where = "contract_id IN ('".$contract_id."','".$implodeContract."')";
            // $ci->db->where($where);
          } else {
            $where = 'contract_id = "'.$contract_id.'"';
            // $ci->db->where('contract_id',$contract_id);
          }
        // $ci->db->where($where);
        // $ci->db->where('booking_flag',1);
        // $query=$ci->db->get();

        $query1 = $ci->db->query('SELECT book_room_count FROM hotel_tbl_booking WHERE room_id = "'.$id.'" AND '.$where.' AND '.$where1.' AND booking_flag != 0 AND booking_flag != 3')->result();


        if (count($query1)!=0) {
            foreach ($query1 as $key => $value) {
                $room_count[] = $value->book_room_count;
            }
            $booking = array_sum($room_count);
        } else {
            $booking = 0;
        }
        return $booking;
    }

function changePasswordRequest($id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$id);
  $query =  $ci->db->get()->result();
  return $query[0]->fisrTry;
}
function CategoryCheck($id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$id);
  $query =  $ci->db->get()->result();
  return $query[0]->Category;
}
function get_board($id) {
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_bookingboard');
  $ci->db->where('bookingID',$id);
  $query =  $ci->db->get()->result();
  return $query[0]->Category;
}
function supplementAvailability($request,$supplementType) {
  $ci =& get_instance();
  $SupplementAvailDate = array();
  $start_date = $request['Check_in'];
  $end_date = $request['Check_out'];
  $checkin_date=date_create($start_date);
  $checkout_date=date_create($end_date);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");

  for($i = 0; $i < $tot_days; $i++) {
    $date[$i] = date('Y-m-d', strtotime($start_date. ' + '.$i.'  days'));
    $boardSplmntCheck[$i] = $ci->db->query("SELECT * FROM hotel_tbl_boardsupplement WHERE '".$date[$i]."' BETWEEN fromDate AND toDate AND contract_id = '".$request['contract_id']."' AND board = '".$supplementType."' ")->result();
    if (count($boardSplmntCheck[$i])!=0) {
      $SupplementAvailDate[] = $date[$i];
    }
  } 
  return $SupplementAvailDate;
}
function emailNotification($mailTYpe , $MailProcess, $agent_id,$hotel_id,$booking_id,$room_id,$discount,$type) {

    $ci =& get_instance();
    $ci->load->library('email');
    $ci->load->model("Finance_Model");
    $mail_settings = mail_details();

    $total_amount= $ci->Finance_Model->TotsellingGet($booking_id);

    $cancellation = $ci->Payment_Model->get_cancellation_terms($booking_id);



    $ci->db->select('*');
    $ci->db->from('hotel_tbl_general_settings');
    $title=$ci->db->get()->result();
    $titleOut = $title[0]->Title;

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$agent_id);
    $agent=$ci->db->get()->result();

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_hotels'); 
    $ci->db->join('hotel_tbl_hotel_room_type','hotel_tbl_hotel_room_type.hotel_id = hotel_tbl_hotels.id','left');
    $ci->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type','left');
    $ci->db->where('hotel_tbl_hotels.id',$hotel_id);
    $ci->db->where('hotel_tbl_hotel_room_type.id',$room_id);
    $hotel=$ci->db->get()->result();


    $ci->db->select('*');
    $ci->db->from('hotel_tbl_booking');
    $ci->db->where('id',$booking_id);
    $booking=$ci->db->get()->result();
    $discountCode = '';
    $contractName = $ci->db->query('select contractName,BookingCode from hotel_tbl_contract where contract_id = "'.$booking[0]->contract_id.'"')->result();
    if ($booking[0]->discountCode!='') {
      $discountCode = 'Booking Code : '.$booking[0]->discountCode.'<br>';
    } else {
      if ($contractName[0]->BookingCode!='') {
        $discountCode = 'Booking Code : '.$contractName[0]->BookingCode.'<br>';
      }
    }
    $board = "";
    if ($booking[0]->board!="") {
      $board = 'Board : '.$booking[0]->board.'<br>';
    }
    $total_markup = $booking[0]->agent_markup+$booking[0]->admin_markup;

    if ($type=='Book') {
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : '.$booking[0]->booking_id.')';     
      $BookingMsg = 'YOUR BOOKING IS CONFIRMED';
      $bookingTypeTag = '**(UNDER ALLOTMENT/FREESALE)**';
    } else {
      $subject = 'YOUR BOOKING IS ON REQUEST (BOOKING ID : '.$booking[0]->booking_id.')';     
      $BookingMsg = '<span style="color:red;">YOUR BOOKING IS ON REQUEST</span>. We will get back to you within 24 hours for update';
      $bookingTypeTag = '**(<span style="color:red;">ON REQUEST</span>)**';
    }


    /*Agent mail start*/

          $cancellationTerm = '';
          if (count($cancellation)!=0) {
            $cancellationTerm.= '<p style="color: #b21105;font-weight: bold;">Cancellations / Amendments</p>';
              foreach($cancellation as $CTkey => $CTvalue) {
                $cancellationTerm.=''.$CTvalue->msg.'<br>';
              }
              $cancellationTerm.= '<br><br>';
          }

         $grandTotal =  $total_amount;
          $message = 'Dear '.$booking[0]->bk_contact_fname." ".$booking[0]->bk_contact_lname.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            '.$BookingMsg.'<br><br>
            Booking Details : <br>
            Reference Number : '.$booking[0]->booking_id.'<br>
            Hotel Name : '.$hotel[0]->hotel_name.'<br>
            Room Type : '.$hotel[0]->room_name." ".$hotel[0]->Room_Type.'<br>
            '.$board.'
            No. of Room(s) : '.$booking[0]->book_room_count.'<br>
            Check-In Date : '.date('d/m/Y',strtotime($booking[0]->check_in)).'<br>
            Check-Out Date : '.date('d/m/Y',strtotime($booking[0]->check_out)).'<br>
            No. of Night(s): '.$booking[0]->no_of_days.'<br><br>

            Guest Name : '.$booking[0]->bk_contact_fname." ".$booking[0]->bk_contact_lname.'<br><br>

            -------------------------------------------------------------<br>
            <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $grandTotal).'</b><br>
            -------------------------------------------------------------
            <br><br>

            <a style="color:#357ebd;" href="'.base_url().'Payment/agent_booking_view?id='.$booking[0]->id.'">Please click here to view your voucher.</a><br><br>

            '.$cancellationTerm.'

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  

          $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
          $ci->email->to($agent[0]->Email);
          $ci->email->Bcc($agent[0]->Email_Accounts);
          $ci->email->Bcc($agent[0]->Email_Reservation);
          $ci->email->Bcc($agent[0]->Email_Management);
          $ci->email->Bcc($mail_settings[0]->smtp_user);
          
          $ci->email->subject($subject);
          $ci->email->message($message);
          
          $ci->email->send();
         
          // $ci->email->clear();
    /*Agent mail end*/
    /*Hotel mail start*/
      $subject1 = 'NEW BOOKING FROM OTELSEASY.COM (BOOKING ID : '.$booking[0]->booking_id.')';
      $message1 = 'Dear Reservations,<br><br>
                  Greetings from Otelseasy.com.<br><br>
                  <img src="'.base_url().'skin/images/logo.png" alt="" style="width: 200px;"><br><br>
                  

                  Reference Number : '.$booking[0]->booking_id.'<br>
                  Room Type : '.$hotel[0]->room_name." ".$hotel[0]->Room_Type.'<br>
                  '.$board.'
                  No. of Room(s) : '.$booking[0]->book_room_count.'<br>
                  Check-In Date : '.date('d/m/Y',strtotime($booking[0]->check_in)).'<br>
                  Check-Out Date : '.date('d/m/Y',strtotime($booking[0]->check_out)).'<br>
                  No. of Night(s): '.$booking[0]->no_of_days.'<br>
                  '.$discountCode.'<br>
                  '.$bookingTypeTag.'<br>
                  <div style="margin-top: 25px;
                    margin-bottom: 10px;
                    display: inline-block;"><a style="background-color: #0074b9;
                    color: #fff;
                    text-decoration: none;
                    padding: 6px 12px;
                    border-radius: 3px;
                    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.3);
                    letter-spacing: .5px;
                    text-transform: uppercase;" href="'.base_url().'Dashboard/hotel_booking_view?id='.$booking[0]->id.'">Booking id : '.$booking[0]->booking_id.'</a>
                  </div><br><br><br>

                    Best Regards,<br>
                    OTELSEASY.COM<br>
                    '.$mail_settings[0]->smtp_user.'<br>
                    971 54 441 2554<br>
                    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  

          $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
          // $contractMail = explode(",", $hotel[0]->contract_mail);
          $ci->email->to($hotel[0]->contract_mail);
          $ci->email->Bcc($mail_settings[0]->smtp_user);
          
          $ci->email->subject($subject1);
          $ci->email->message($message1);
          
          $ci->email->send();
    /*Hotel mail end*/
    return true;
}
function RegisteringMail($id,$type) {
  $ci =& get_instance();
  $ci->load->library('email');
  $mail_settings = mail_details();

  if ($type=="agent") {
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$id);
    $agent=$ci->db->get()->result();
    $subject = 'WELCOME TO OTELSEASY.COM';     
    $message = 'Dear <b>'.$agent[0]->First_Name." ".$agent[0]->Last_Name.'</b>,<br><br>
      Thank you for showing interest with Otelseasy.com <br><br>
      We have successfully received your request for log in credentials to access our B2B portal. One of our
        staff will contact you shortly.<br><br>
      Looking forward to working with you soon.<br><br>

      Best Regards,<br>
      OTELSEASY.COM<br>
      '.$mail_settings[0]->smtp_user.'<br>
      971 54 441 2554<br>
      <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>';   
            
            
      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      
      $ci->email->send();
  } else {
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_hotels');
    $ci->db->where('id',$id);
    $hotel=$ci->db->get()->result();
    $subject = 'WELCOME TO OTELSEASY.COM';
    $message = 'Dear <b>'.$hotel[0]->hotel_name.'</b>,<br><br>
      Thank you for showing interest with Otelseasy.com <br><br>
      We have successfully received your request for log in credentials to access our B2B portal. One of our
        staff will contact you shortly.<br><br>
      Looking forward to working with you soon.<br><br>

      Best Regards,<br>
      OTELSEASY.COM<br>
      '.$mail_settings[0]->smtp_user.'<br>
      971 54 441 2554<br>
      <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>';   
            
            
      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($hotel[0]->sale_mail);
      $ci->email->Bcc($hotel[0]->revenu_mail);
      $ci->email->Bcc($hotel[0]->contract_mail);
      $ci->email->Bcc($hotel[0]->finance_mail);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      
      $ci->email->send();
  }
  return true;
}
function country_name($country_code) {
  $ci =& get_instance();
  $ci->db->select('name');
  $ci->db->from('countries');
  $ci->db->where('sortname',$country_code);
  $query = $ci->db->get()->result();
  return $query[0]->name;
}
function Con_menu_permission($conId){
  $ci =& get_instance();
  $ci->db->select('*');
  $ci->db->from('hotel_tbl_contract');
  $ci->db->where('contract_id',$conId);
  return $ci->db->get()->result();
}
function DateWisediscount($date,$hotel_id,$room_id,$contract_id,$type) {
  $ci =& get_instance();
  $checkin_date=date_create($date);
  $checkout_date=date_create(date('Y-m-d'));
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  $discount = 0;
  $hotelidCheck = array();
  $contractCheck = array();
  $roomCheck = array();
  $BlackoutDateCheck = array();

  $query = $ci->db->query('SELECT * FROM hoteldiscount WHERE Discount_flag = 1 AND
    FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND ((Styfrom <= "'.$date.'" AND Styto >= "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo >= "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.') AND discount  = (SELECT MIN(discount) FROM hoteldiscount  WHERE Discount_flag = 1 AND FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND (Styfrom <= "'.$date.'" AND Styto >= "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo >= "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.')')->result();


  if (count($query)!=0) {
        // $hotelid = explode(",", $query[0]->hotelid);
        // $contract = explode(",", $query[0]->contract);
        // $room = explode(",", $query[0]->room);
        $BlackoutDate = explode(",", $query[0]->BlackOut);
          
        if($query[0]->BlackOut!="")  {
          foreach ($BlackoutDate as $key0 => $value0) {
              if ($value0==$date) {
                  $BlackoutDateCheck[$key0] = 1;
              }
          }
        }
        if (array_sum($BlackoutDateCheck)==0) {
          $discount = $query[0]->discount;
        }

    }
 return $discount;
}
function DateWisediscountCode($date,$hotel_id,$room_id,$contract_id,$type) {
  $ci =& get_instance();
  $checkin_date=date_create($date);
  $checkout_date=date_create(date('Y-m-d'));
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  $discount = '';
  $hotelidCheck = array();
  $contractCheck = array();
  $roomCheck = array();
  $BlackoutDateCheck = array();

  $query = $ci->db->query('SELECT * FROM hoteldiscount WHERE Discount_flag = 1 AND  FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND ((Styfrom <= "'.$date.'" AND Styto > "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo > "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.') AND discount  = (SELECT MIN(discount) FROM hoteldiscount  WHERE Discount_flag = 1 AND FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND (Styfrom <= "'.$date.'" AND Styto > "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo > "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.')')->result();


  if (count($query)!=0) {
        // $hotelid = explode(",", $query[0]->hotelid);
        // $contract = explode(",", $query[0]->contract);
        // $room = explode(",", $query[0]->room);
        $BlackoutDate = explode(",", $query[0]->BlackOut);
          
        if($query[0]->BlackOut!="")  {
          foreach ($BlackoutDate as $key0 => $value0) {
              if ($value0==$date) {
                  $BlackoutDateCheck[$key0] = 1;
              }
          }
        }
        if (array_sum($BlackoutDateCheck)==0) {
          $discount = $query[0]->discountCode;
        }

    }
 return $discount;
}
function DateWisediscountNonRefundable($date,$hotel_id,$room_id,$contract_id,$type) {
  $ci =& get_instance();
  $checkin_date=date_create($date);
  $checkout_date=date_create(date('Y-m-d'));
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");
  $discount = 0;
  $NRF = 0;
  $hotelidCheck = array();
  $contractCheck = array();
  $roomCheck = array();
  $BlackoutDateCheck = array();

  $query = $ci->db->query('SELECT * FROM hoteldiscount WHERE Discount_flag = 1 AND  NonRefundable = 1 AND FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND ((Styfrom <= "'.$date.'" AND Styto > "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo > "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.') AND discount  = (SELECT MIN(discount) FROM hoteldiscount  WHERE Discount_flag = 1 AND NonRefundable = 1 AND FIND_IN_SET('.$hotel_id.' ,hotelid) > 0 AND FIND_IN_SET('.$room_id.',room) > 0 AND FIND_IN_SET("'.$contract_id.'",contract) > 0 AND (Styfrom <= "'.$date.'" AND Styto > "'.$date.'" AND  BkFrom <= "'.date("Y-m-d").'" AND BkTo > "'.date("Y-m-d").'") AND Bkbefore < '.$tot_days.')')->result();


  if (count($query)!=0) {
        // $hotelid = explode(",", $query[0]->hotelid);
        // $contract = explode(",", $query[0]->contract);
        // $room = explode(",", $query[0]->room);
        $BlackoutDate = explode(",", $query[0]->BlackOut);
          
        if($query[0]->BlackOut!="")  {
          foreach ($BlackoutDate as $key0 => $value0) {
              if ($value0==$date) {
                  $BlackoutDateCheck[$key0] = 1;
              }
          }
        }
        if (array_sum($BlackoutDateCheck)==0) {
          $discount = $query[0]->discount;
          $NRF = $query[0]->NonRefundable;
        }

    }
    $return['discount'] = $discount;
    $return['NRF'] = $NRF;
 return $return;
}
function backend_currency_type($c_amount) {
  $ci =& get_instance();
  $id = $ci->session->userdata('id');
  $ci->db->select('CurrencyType');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$id);

  $query1=$ci->db->get();
  $final1= $query1->result();

  $usr_c = $final1[0]->CurrencyType;

  if ($usr_c=="") {
    $usr_c = 'AED';
  }

  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$usr_c);
  // $converted_amount = $c_amount*$rate;
  $query=$ci->db->get();
  $final= $query->result();
  if (count($final)!=0) {
    $db_amount=($final[0]->amount);
  } else {
    $db_amount= 1;
  }
  $converted_amount = $db_amount*$c_amount;
  return $converted_amount;
}
function backend_Aed_convertion($usr_c,$c_amount) {
  $ci =& get_instance();
  if ($usr_c=="") {
    $usr_c = 'AED';
  }

  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$usr_c);
  // $converted_amount = $c_amount*$rate;
  $query=$ci->db->get();
  $final= $query->result();
  if(count($final)!=0) {
    $db_amount = ($final[0]->amount);
  } else {
    $db_amount = 1;
  }
  $converted_amount = $c_amount/$db_amount;
  return $converted_amount;
}
function admin_currency() {
  $ci =& get_instance();
  $id = $ci->session->userdata('id');
  $ci->db->select('CurrencyType');
  $ci->db->from('hotel_tbl_user');
  $ci->db->where('id',$id);

  $query1=$ci->db->get();
  $final1= $query1->result();

  $usr_c = $final1[0]->CurrencyType;

  if ($usr_c=="") {
    $usr_c = 'AED';
  }
  return $usr_c;
}
function hotel_currency_type($hotel_id) {
  $ci =& get_instance();
  $id = $ci->session->userdata('id');
  $ci->db->select('Preferred_currency');
  $ci->db->from('hotel_tbl_hotels');
  $ci->db->where('id',$hotel_id);

  $query1=$ci->db->get();
  $final1= $query1->result();

  $usr_c = $final1[0]->Preferred_currency;
  if ($usr_c=="") {
    $usr_c = 'AED';
  }
  return $usr_c;
}
function contract_currency_type($usr_c,$c_amount) {
  $ci =& get_instance();
  if ($usr_c=="") {
    $usr_c = 'AED';
  }
  $ci->db->select('*');
  $ci->db->from('currency_update');
  $ci->db->where('currency_type',$usr_c);
  // $converted_amount = $c_amount*$rate;
  $query=$ci->db->get();
  $final= $query->result();
  if (count($final)!=0) {
  	$db_amount=($final[0]->amount);
  } else {
  	$db_amount= 1;
  }
  $converted_amount = $db_amount*$c_amount;
  return $converted_amount;
}
function entryreport($admin_id,$agent_id,$hotel_id,$table,$primary_id,$created_date,$updated_date,$narration,$module,$event) {
  $ci =& get_instance();
  $ci->db->query('INSERT INTO hotel_tbl_entryreport (admin_id, agent_id, hotel_id,table_name,primary_id,created_date,updated_date,narration,module,event)
VALUES ("'.$admin_id.'", "'.$agent_id.'", "'.$hotel_id.'","'.$table.'","'.$primary_id.'","'.$created_date.'","'.$updated_date.'","'.$narration.'","'.$module.'","'.$event.'")');
  return true;
}
function offlineemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_offlinerequest');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->AgentId);
  $agent=$ci->db->get()->result();


  $checkin_date=date_create($booking[0]->check_in);
  $checkout_date=date_create($booking[0]->check_out);
  $no_of_days=date_diff($checkin_date,$checkout_date);
  $tot_days = $no_of_days->format("%a");

  $SellingPrice = explode(",", $booking[0]->SellingPrice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : HOB'.$booking[0]->id.')';     
  $message = 'Dear '.$booking[0]->Room1ContactName.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details : <br>
    Reference Number : HOB'.$booking[0]->id.'<br>
    Hotel Name : '.$booking[0]->hotel_name.'<br>
    Room Type : '.$booking[0]->room_name.'<br>
    '.$booking[0]->board.'
    No. of Room(s) : '.$booking[0]->no_of_rooms.'<br>
    Check-In Date : '.date('d/m/Y',strtotime($booking[0]->check_in)).'<br>
    Check-Out Date : '.date('d/m/Y',strtotime($booking[0]->check_out)).'<br>
    No. of Night(s): '.$tot_days.'<br><br>

    Guest Name : '.$booking[0]->Room1ContactName.'<br><br>

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    <a style="color:#357ebd;" href="'.base_url().'Payment/agent_Offlinebooking_view?id='.$booking[0]->id.'">Please click here to view your voucher.</a><br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
          
          
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function revenue_markup($hotel_id,$contract_id,$agent_id) {  
  $ci =& get_instance();
  $query = $ci->db->query("SELECT IFNULL(MAX(Markup),0) as Markup FROM `hotel_tbl_revenue` where FIND_IN_SET(".$hotel_id.", IFNULL(hotels,'')) > 0 AND FIND_IN_SET('".$contract_id."', IFNULL(contracts,'')) > 0 AND FIND_IN_SET(".$agent_id.", IFNULL(Agents,'')) > 0 AND FromDate <= '".date('Y-m-d',strtotime($_REQUEST['Check_in']))."' AND  ToDate >= '".date('Y-m-d',strtotime($_REQUEST['Check_out'].'-1 days'))."'")->result();
  return $query[0]->Markup;
}
function profile($id = null)
{
    $CI =& get_instance();
    if (empty($id)) {
        $id = $CI->session->userdata('id');
    }
    if (!empty($id)) {

        return $CI->db
            ->where("id", $id)
            ->get("hotel_tbl_user")->row();
    } else {
        return false;
    }
}
function profile_agent($id = null)
{
    $CI =& get_instance();
   
    if (!empty($id)) {

        return $CI->db
            ->where("id", $id)
            ->get("hotel_tbl_agents")->row();
    } else {
        return false;
    }
}
function my_id()
{
    $CI =& get_instance();
    return $CI->session->userdata('id');
}
function Hotelsbanner() {
  $ci =& get_instance();
  $query=$ci->db->query('select id,hotel_name,hotel_description,image1,website from hotel_tbl_hotels where hotel_name like "%Raintree%" order by rand() limit 1')->result();
  return $query;
}
function get_row($table, $where, $fields = null)
{
    $CI =& get_instance();
    $query = $CI->db->where($where)->get($table);
    if ($query->num_rows() > 0) {
        $row = $query->row();
        if (!empty($fields)) {
            return $row->$fields;
        } else {
            return $row;
        }
    }
}
function update($table, $where, $data)
{
    $CI =& get_instance();
    $CI->db->where($where);
    $CI->db->update($table, $data);
}
function time_ago($time_ago)
{
    if (is_numeric($time_ago) && (int)$time_ago == $time_ago) {
        $time_ago = $time_ago;
    } else {
        $time_ago = strtotime($time_ago);
    }
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return 'just now';
    } //Minutes
    elseif ($minutes <= 60) {
        if ($minutes == 1) {
            return '1 minute ago';
        } else {
            return $minutes.' minutes ago';
        }
    } //Hours
    elseif ($hours <= 24) {
        if ($hours == 1) {
            return '1 hour ago';
        } else {
            return $hours.' hours ago';
        }
    } //Days
    elseif ($days <= 7) {
        if ($days == 1) {
            return 'yesterday';
        } else {
            return $days.' days ago';
        }
    } //Weeks
    elseif ($weeks <= 4.3) {
        if ($weeks == 1) {
            return '1 week ago';
        } else {
            return $weeks.' weeks ago';
        }
    } //Months
    elseif ($months <= 12) {
        if ($months == 1) {
            return '1 month';
        } else {
            return $months.' months ago';
        }
    } //Years
    else {
        if ($years == 1) {
            return '1 year';
        } else {
            return $year.' years ago';
        }
    }
}
function staffImage($user_id = null)
{
    $CI =& get_instance();
    if (empty($user_id)) {
        $user_id = $CI->session->userdata('id');
    }
    $userInfo = $CI->db->where('id', $user_id)->get('hotel_tbl_user')->row();
    if (!empty($userInfo->Img)) {
        return 'uploads/user_profile_pic/'.$user_id.'/thumb_'.$userInfo->Img;
    } 
    else{
      return 'skin/images/dash/no-avatar.jpg';

    }
}
function staffImage2($user_id = null)
{
    $CI =& get_instance();
    if (empty($user_id)) {
        $user_id = $CI->session->userdata('id');
    }
    $userInfo = $CI->db->where('id', $user_id)->get('hotel_tbl_agents')->row();
    if (!empty($userInfo->profile_image)) {
        return 'uploads/agent_profile_pic/'.$user_id.'/thumb_'.$userInfo->profile_image;
    }else{
      return 'skin/images/dash/no-avatar.jpg';

    }
}
  function get_online_users() {
    $CI =& get_instance();
    $profile = profile();
    $CI->db->select('*');
    $CI->db->from('hotel_tbl_agents');
    $query=$CI->db->get();
    return $query->result();
  }
  function get_admin_active_status(){
    $CI =& get_instance();
    $CI->db->select('*');
    $CI->db->from('hotel_tbl_user');
    $CI->db->where('active_status',1);
    $query=$CI->db->get()->result();
    return count($query);
  }

function get_online_users_single($id) {
  $CI =& get_instance();
  $CI->db->select('*');
  $CI->db->from('hotel_tbl_agents');
  $CI->db->where('id',$id);
  $query=$CI->db->get()->result();
  return $query[0]->active_status;
}
function offlinetourrequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('tour_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $tourtype= $booking[0]->tour_type;
  $tourdate=  date('d/m/Y' ,strtotime($booking[0]->tdate));
  $name = $booking[0]->firstname.' '.$booking[0]->lastname;

  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : TOB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : TOB'.$booking[0]->id.'<br>
    Type of Tour : '.$tourtype.'<br>
    Date : '.$tourdate.'<br>
    Name : '.$name.'<br>

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
    print_r($message);exit;
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlinetransferrequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('transfer_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $oneway="<p>Arrival Flight No: ".$booking[0]->arrivalNo."<br>Flight Arrival Time: ".$booking[0]->arrivalTime."<br>Pickup Point: ".$booking[0]->pickpoint."<br>Pickup Time: ".$booking[0]->pickdate."<br>Dropoff Point: ".$booking[0]->droppoint."<br>Dropoff Date: ".$booking[0]->dropdate;

 if($booking[0]->transfer_type=="two-way"){
  $oneway=$oneway."<br><br>Return<p>Departure Flight No: ".$booking[0]->departureNo."<br>Flight Departure Time: ".$booking[0]->departureTime."<br>Pickup Point: ".$booking[0]->returnpickpoint."<br>Pickup Time: ".$booking[0]->returnpickdate."<br>Dropoff Point: ".$booking[0]->returndroppoint."<br>Dropoff Date: ".$booking[0]->returndropdate;
 }
 

  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : TRB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : TRB'.$booking[0]->id.'<br>
    '.$oneway.'<br><br>
    

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
          
          
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlinevisarequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('visa_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $visa_type= $booking[0]->visa_type;
  $expirydate=  date('d/m/Y' ,strtotime($booking[0]->expirydate));

  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : VRB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : VRB'.$booking[0]->id.'<br>
    Type of Visa : '.$visa_type.'<br>
    Passport Expiry Date : '.$expirydate.'<br>

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlinepackagerequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('package_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $tourrequired= $booking[0]->tourrequired;
  $package= $booking[0]->package;
  $checkin_date=date('d/m/Y' ,strtotime($booking[0]->checkin));
  $checkout_date=date('d/m/Y' ,strtotime($booking[0]->checkout));

  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : PKB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : PKB'.$booking[0]->id.'<br>
    Tours Required : '.$tourrequired.'<br>
    Package : '.$package.'<br>
    Checkin : '.$checkin_date.'<br>
    Checkout : '.$checkout_date.'<br>

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlineflightrequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('flight_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $from= $booking[0]->from;
  $destination= $booking[0]->destination;

  $oneway="<br>Flight Details <br><p>Flight No: ".$booking[0]->arrivalNo."<br>Flight Time: ".$booking[0]->arrivalTime."<br>Date: ".date('d/m/Y' ,strtotime($booking[0]->departdate))."<br>";

 if($booking[0]->type=="Round trip"){
  $oneway=$oneway."<br><br>Return Flight Details <p>Flight No: ".$booking[0]->departureNo."<br>Flight Time: ".$booking[0]->departureTime."<br>Date: ".date('d/m/Y' ,strtotime($booking[0]->returndate))."<br>";
 }

  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : FGB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : FGB'.$booking[0]->id.'<br>
    From : '.$from.'<br>
    destination : '.$destination.'<br>
    '.$oneway.'<br>

    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlineparkrequestemailNotification($id) {
  $ci =& get_instance();
  $ci->load->library('email');
  $ci->load->model("Finance_Model");
  $mail_settings = mail_details();

  $ci->db->select('*');
  $ci->db->from('park_tbl_requests');
  $ci->db->where('id',$id);
  // $converted_amount = $c_amount*$rate;
  $booking=$ci->db->get()->result();

  $ci->db->select('*');
  $ci->db->from('hotel_tbl_agents');
  $ci->db->where('id',$booking['0']->agent_id);
  $agent=$ci->db->get()->result();
  $themepark= $booking[0]->themePark;
  $pdate=date('d/m/Y' ,strtotime($booking[0]->pdate));
  $SellingPrice = explode(",", $booking[0]->sellingprice);
  $SellingPriceArr = array_sum($SellingPrice);

  $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : PRB'.$booking[0]->id.')';     
  $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
    Thank you for booking with Otelseasy.com<br><br>
    YOUR BOOKING IS CONFIRMED<br><br>
    Booking Details <br>
    Reference Number : PRB'.$booking[0]->id.'<br>
    Theme Park : '.$themepark.'<br>
    Date : '.$pdate.'<br>
 
    -------------------------------------------------------------<br>
    <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $SellingPriceArr).'</b><br>
    -------------------------------------------------------------
    <br><br>

    Once again thank you for booking with Otelseasy.com <br><br>

    Thank you<br><br>
    Best Regards,<br>
    OTELSEASY.COM<br>
    '.$mail_settings[0]->smtp_user.'<br>
    971 54 441 2554<br>
    <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
    $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
    $ci->email->to($agent[0]->Email);
    // $ci->email->Bcc($agent[0]->Email_Accounts);
    // $ci->email->Bcc($agent[0]->Email_Reservation);
    // $ci->email->Bcc($agent[0]->Email_Management);
    $ci->email->Bcc($mail_settings[0]->smtp_user);
    
    $ci->email->subject($subject);
    $ci->email->message($message);
    
    $ci->email->send();
    return true;
}
function offlinerequestMailNotification($id,$type) {
  $ci =& get_instance();
  $ci->load->library('email');
  $mail_settings = mail_details();
  if($type=="hotel") { 
    $ci->db->select('a.*,b.name as nationality');
    $ci->db->from('hotel_tbl_offlinerequest a');
    $ci->db->join('countries b','b.sortname=a.nationality','inner');
    $ci->db->where('a.id',$id);
    $booking=$ci->db->get()->result();
    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$booking['0']->AgentId);
    $agent=$ci->db->get()->result();
    $adults = explode(",", $booking[0]->adults);
    $adultcount = array_sum($adults);
    $child = explode(",", $booking[0]->child);
    $childcount = array_sum($child);
    
    $childARR = array();
    $childStr ='';
    if ($childcount!=0) {
      for ($i=1; $i <= $booking[0]->no_of_rooms; $i++) { 
          $chaReq = 'Room'.$i.'ChildAge';
          $childval = explode(",", $booking[0]->$chaReq);
          for ($j=0; $j < $child[$i-1]; $j++) { 
              if ($childval[$j]!=0) {
                $childARR[] = $childval[$j];
              }
          }
      }
      $childStr ='Children age: '.implode(",", $childARR).'<br>';
    }

    $SpecialRequest = '';
    if ($booking[0]->SpecialRequest!="") {
      $SpecialRequest = 'Special Request: '.$booking[0]->SpecialRequest.'<br>';
    }

    $budget = '';
    if ($booking[0]->budget!="") {
      $budget = 'Budget: '.$booking[0]->budget.' AED <br>';
    }

    $subject = 'NEW OFFLINE REQUEST (Reference ID : HOB'.$booking[0]->id.')';   
    $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
      Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
     
      Request Details <br><br>
      Destination: '.$booking[0]->Destination.'<br>
      Hotel Name: '.$booking[0]->hotel_name.'<br>
      Nationality: '.$booking[0]->nationality.'<br>
      CheckIn: '.date('d/m/Y' ,strtotime($booking[0]->check_in)).'<br>
      CheckOut: '.date('d/m/Y' ,strtotime($booking[0]->check_out)).'<br>
      No of rooms: '.$booking[0]->no_of_rooms.'<br>
      No of adults: '.$adultcount.'<br>
      No of children: '.$childcount.'<br>
      '.$childStr.$SpecialRequest.$budget.'
      <br><br>

      One of our staff will contact you wihin 24 hours.<br><br>

      Thank you<br><br>
      Best Regards,<br>
      OTELSEASY.COM<br>
      '.$mail_settings[0]->smtp_user.'<br>
      971 54 441 2554<br>
      <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
      
      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);

      $ci->email->send();
    } 

    if($type=="tour") {
      $ci->db->select('a.*,b.name as nationality');
      $ci->db->from('tour_tbl_requests a');
      $ci->db->join('countries b','b.sortname=a.nationality','inner');
      $ci->db->where('a.id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();
      $adults = explode(",", $booking[0]->adults);
      $adultcount = array_sum($adults);
      $child = explode(",", $booking[0]->child);
      $childcount = array_sum($child);

      $childAgeStr = '';
      if ($childcount!=0) {
       $childAgeStr = 'Children age: '.$booking[0]->childage.'<br>'; 
      }

      $special_request = '';
      if ($booking[0]->special_request!="") {
        $special_request = 'Special Request: '.$booking[0]->special_request.'<br>';
      }
      $subject = 'NEW OFFLINE REQUEST (Reference ID : TOB'.$booking[0]->id.')';   
      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        Destination: '.$booking[0]->destination.'<br>
        Type of Tour: '.$booking[0]->tour_type.'<br>
        Nationality: '.$booking[0]->nationality.'<br>
        Date: '.date('d/m/Y' ,strtotime($booking[0]->tdate)).'<br>
        No of adults: '.$adultcount.'<br>
        No of children: '.$childcount.'<br>
        '.$childAgeStr.$special_request.'
       
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';

      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      $ci->email->send();
    } 

    if($type=="transfer") {
      $ci->db->select('a.*,b.name as nationality');
      $ci->db->from('transfer_tbl_requests a');
      $ci->db->join('countries b','b.sortname=a.nationality','inner');
      $ci->db->where('a.id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();

      $special_request = '';
      if ($booking[0]->special_request!="") {
        $special_request = 'Special Request: '.$booking[0]->special_request.'<br>';
      }
      $subject = 'NEW OFFLINE REQUEST (Reference ID : TRB'.$booking[0]->id.')';
      if($booking[0]->transfer_type=="two-way") {
        $return = '<br>Return<br>Departure Flight No: '.$booking[0]->departureNo.'<br>Flight Departure Time: '.$booking[0]->departureTime.'<br>Pickup Point: '.$booking[0]->returnpickpoint.'<br>Dropoff Point: '.$booking[0]->returndroppoint.'<br>'; 
      } else {
        $return = "";
      }
      
      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        Destination: '.$booking[0]->destination.'<br>
        Type of Transfer: '.$booking[0]->transfer_type.'<br>
        Nationality: '.$booking[0]->nationality.'<br>
        Passenger: '.$booking[0]->Passenger.'<br>
        Bags: '.$booking[0]->Bags.'<br>
        Transfer Details:<br>
        Arrival Flight No: '.$booking[0]->arrivalNo.'<br>
        Flight Arriving Time: '.$booking[0]->arrivalTime.'<br>
        Pickup Point : '.$booking[0]->pickpoint.'<br>
        Dropoff Point: '.$booking[0]->droppoint.'<br>
        '.$return.$special_request.'
  
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>';

      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      $ci->email->send();
    } 

    if($type=="visa") {
      $ci->db->select('a.*,b.name as nationality');
      $ci->db->from('visa_tbl_requests a');
      $ci->db->join('countries b','b.sortname=a.nationality','inner');
      $ci->db->where('a.id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();
      $name = $booking[0]->firstname.' '.$booking[0]->lastname;
      $birthdate = date('d/m/Y',strtotime($booking[0]->birthdate));
      $expirydate = date('d/m/Y',strtotime($booking[0]->expirydate));

      $special_request = '';
      if ($booking[0]->special_request!="") {
        $special_request = 'Special Request: '.$booking[0]->special_request.'<br>';
      }

      $subject = 'NEW OFFLINE REQUEST (Reference ID : VRB'.$booking[0]->id.')';   
      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        Destination: '.$booking[0]->destination.'<br>
        Type of Visa: '.$booking[0]->visa_type.'<br>
        Nationality: '.$booking[0]->nationality.'<br>
        Name: '.$name.'<br>
        Date of Birth: '.$birthdate.'<br>
        Expiry Date: '.$expirydate.'<br>
        '.$special_request.'  
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';

      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      $ci->email->send();
    } 

    if($type=="package") {
      $ci->db->select('a.*,b.name as nationality');
      $ci->db->from('package_tbl_requests a');
      $ci->db->join('countries b','b.sortname=a.nationality','inner');
      $ci->db->where('a.id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();
      $tour = $booking[0]->tourrequired;
      $checkin = date('d/m/Y',strtotime($booking[0]->checkin));
      $checkout = date('d/m/Y',strtotime($booking[0]->checkout));
      $adults = explode(",", $booking[0]->adults);
      $adultcount = array_sum($adults);
      $child = explode(",", $booking[0]->child);
      $childcount = array_sum($child);
      $childAgeStr = '';
      if ($childcount!=0) {
       $childAgeStr = 'Children age: '.$booking[0]->childage.'<br>'; 
      }

      $specialrequest = '';
      if ($booking[0]->specialrequest!="") {
        $specialrequest = 'Special Request: '.$booking[0]->specialrequest.'<br>';
      }
      $budget = '';
      if ($booking[0]->budget!="") {
        $budget = 'Special Request: '.$booking[0]->budget.'<br>';
      }
      $subject = 'NEW OFFLINE REQUEST (Reference ID : PKB'.$booking[0]->id.')';   
      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        Destination: '.$booking[0]->destination.'<br>
        Nationality: '.$booking[0]->nationality.'<br>
        Tours Required: '.$tour.'<br>
        Check in: '.$checkin.'<br>
        Check out: '.$checkout.'<br>
        No of Adults: '.$adultcount.'<br>
        No of Children: '.$childcount.'<br>
        '.$childAgeStr.$budget.$specialrequest.'    
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';
       
      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);  
      $ci->email->send();
    } 

    if($type=="flight") {
      $ci->db->select('*');
      $ci->db->from('flight_tbl_requests');
      $ci->db->where('id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();
      $adults = explode(",", $booking[0]->adults);
      $adultcount = array_sum($adults);
      $child = explode(",", $booking[0]->child);
      $childcount = array_sum($child);
      $childAgeStr = '';
      if ($childcount!=0) {
       $childAgeStr = 'Children age: '.$booking[0]->childage.'<br>'; 
      }
      $subject = 'NEW OFFLINE REQUEST (Reference ID : FGB'.$booking[0]->id.')';
      if($booking[0]->type=="Round trip") {
        $return = '<br>Return Date: '.$booking[0]->returndate.'<br>'; 
      } else {
        $return = "";
      }
      
      $specialrequest = '';
      if ($booking[0]->specialrequest!="") {
        $specialrequest = 'Special Request: '.$booking[0]->specialrequest.'<br>';
      }

      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        From: '.$booking[0]->from.'<br>
        Destination: '.$booking[0]->destination.'<br>
        No of adults: '.$adultcount.'<br>
        No of children: '.$childcount.'<br>
        '.$childAgeStr.'<br>
        Departure Date: '.$booking[0]->departdate.'<br>
        '.$return.$specialrequest.'
  
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>';

      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      $ci->email->send();
    } 

    if($type=="park") {
      $ci->db->select('a.*,b.name as nationality');
      $ci->db->from('park_tbl_requests a');
      $ci->db->join('countries b','b.sortname=a.nationality','inner');
      $ci->db->where('a.id',$id);
      $booking=$ci->db->get()->result();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_agents');
      $ci->db->where('id',$booking['0']->agent_id);
      $agent=$ci->db->get()->result();
      $themepark = $booking[0]->themePark;
      $pdate = date('d/m/Y',strtotime($booking[0]->pdate));
      $adults = explode(",", $booking[0]->adults);
      $adultcount = array_sum($adults);
      $child = explode(",", $booking[0]->child);
      $childcount = array_sum($child);
      $childAgeStr = '';
      if ($childcount!=0) {
       $childAgeStr = 'Children age: '.$booking[0]->childage.'<br>'; 
      }

      $specialrequest = '';
      if ($booking[0]->specialrequest!="") {
        $specialrequest = 'Special Request: '.$booking[0]->specialrequest.'<br>';
      }

      $subject = 'NEW OFFLINE REQUEST (Reference ID : PRB'.$booking[0]->id.')';   
      $message = 'Dear '.$agent[0]->First_Name.' '.$agent[0]->Last_Name.',<br><br>
        Greetings from Otelseasy! We have successfully received your offline inquiry as per the below.<br><br>
       
        Request Details <br><br>
        Destination: '.$booking[0]->destination.'<br>
        Theme Park: '.$themepark.'<br>
        Nationality: '.$booking[0]->nationality.'<br>
        Date: '.$pdate.'<br>
        Adults: '.$adultcount.'<br>
        Children: '.$childcount.'<br>
        '.$childAgeStr.$specialrequest.'     
        <br><br>

        One of our staff will contact you wihin 24 hours.<br><br>

        Thank you<br><br>
        Best Regards,<br>
        OTELSEASY.COM<br>
        '.$mail_settings[0]->smtp_user.'<br>
        971 54 441 2554<br>
        <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.'; 

      $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
      $ci->email->to($agent[0]->Email);
      // $ci->email->Bcc($agent[0]->Email_Accounts);
      // $ci->email->Bcc($agent[0]->Email_Reservation);
      // $ci->email->Bcc($agent[0]->Email_Management);
      $ci->email->Bcc($mail_settings[0]->smtp_user);
      
      $ci->email->subject($subject);
      $ci->email->message($message);
      $ci->email->send();
    } 
    return true;
  }
  function NationalityGet($val) {
    $ci =& get_instance();
    $ci->db->select('name'); 
    $ci->db->from('countries'); 
    $ci->db->where('sortname',$val);
    $query = $ci->db->get()->result(); 
    return $query[0]->name;
  }
  function transferemailNotification($mailTYpe , $MailProcess, $agent_id,$booking_id,$type) {
    $ci =& get_instance();
    $ci->load->library('email');
    $ci->load->model("List_Model");
    $mail_settings = mail_details();

    $cancellation = $ci->List_Model->gettransferbookpolicy($booking_id);



    $ci->db->select('*');
    $ci->db->from('hotel_tbl_general_settings');
    $title=$ci->db->get()->result();
    $titleOut = $title[0]->Title;

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$agent_id);
    $agent=$ci->db->get()->result();

    $ci->db->select('a.*,b.*,c.*,d.name as booknationality');
    $ci->db->from('transfer_tbl_booking a');
    $ci->db->join('transfer_contracts b','a.contract_id=b.id','inner');
    $ci->db->join('transfer_vehicle c','c.id=a.vehicleid ','inner');
    $ci->db->join('countries d','d.id=a.nationality','inner');
    $ci->db->where('a.id',$booking_id);
    $ci->db->where('a.agent_id',$agent_id);  
    $transfer=$ci->db->get()->result();
    $total_markup = $transfer[0]->agent_markup+$transfer[0]->admin_markup;

    if ($type=='Book') {
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : '.$transfer[0]->booking_id.')';     
      $BookingMsg = 'YOUR BOOKING IS CONFIRMED';
      $bookingTypeTag = '**(UNDER ALLOTMENT/FREESALE)**';
    } else {
      $subject = 'YOUR BOOKING IS ON REQUEST (BOOKING ID : '.$transfer[0]->booking_id.')';     
      $BookingMsg = '<span style="color:red;">YOUR BOOKING IS ON REQUEST</span>. We will get back to you within 24 hours for update';
      $bookingTypeTag = '**(<span style="color:red;">ON REQUEST</span>)**';
    }
     if($transfer[0]->transfertype=="two-way") {
        $return = '<br>Return<br>Departure Flight No: '.$transfer[0]->departureFlight.'<br>Flight Departure Time: '.$transfer[0]->departureTime.'<br>'; 
      } else {
        $return = "";
      }
      $special_request = '';
      if ($transfer[0]->SpecialRequest!="") {
        $special_request = 'Special Request: '.$transfer[0]->SpecialRequest.'<br>';
      }


    /*Agent mail start*/

          $cancellationTerm = '';
          // if (count($cancellation)!=0) {
          //   $cancellationTerm.= '<p style="color: #b21105;font-weight: bold;">Cancellations / Amendments</p>';
          //     foreach($cancellation as $CTkey => $CTvalue) {
          //       $cancellationTerm.=''.$CTvalue->msg.'<br>';
          //     }
          //     $cancellationTerm.= '<br><br>';
          // }
          $agent_markup = $transfer[0]->agent_markup;
          $admin_markup = $transfer[0]->admin_markup;
          $total_markup = $agent_markup+$admin_markup;

         $grandTotal =  ($transfer[0]->total_amount*$total_markup)/100+$transfer[0]->total_amount;
          $message = 'Dear '.$transfer[0]->bk_contact_fname." ".$transfer[0]->bk_contact_lname.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            '.$BookingMsg.'<br><br>
            Booking Details  <br>
            Reference Number : '.$transfer[0]->booking_id.'<br>
            Transfer Name : '.$transfer[0]->ContractName.'<br>
            Nationality : '.$transfer[0]->booknationality.'<br>
            Arrival Date : '.$transfer[0]->arrivaldate.'<br>
            Guest Name : '.$transfer[0]->bk_contact_fname." ".$transfer[0]->bk_contact_lname.'<br><br>
            Transfer Details <br>
            Arrival Flight No: '.$transfer[0]->arrivalFlight.'<br>
            Flight Arriving Time: '.$transfer[0]->arrivalTime.'<br>
           '.$return.'<br><br>
           '.$special_request.'<br><br>

            -------------------------------------------------------------<br>
            <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $grandTotal).'</b><br>
            -------------------------------------------------------------
            <br><br>

            <a style="color:#357ebd;" href="'.base_url().'transfer/transfer_booking_view/'.$transfer[0]->id.'">Please click here to view your voucher.</a><br><br>

            '.$cancellationTerm.'

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
          $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
          $ci->email->to($agent[0]->Email);
          $ci->email->Bcc($agent[0]->Email_Accounts);
          $ci->email->Bcc($agent[0]->Email_Reservation);
          $ci->email->Bcc($agent[0]->Email_Management);
          $ci->email->Bcc($mail_settings[0]->smtp_user);
          
          $ci->email->subject($subject);
          $ci->email->message($message);
          
          $ci->email->send();
         
          // $ci->email->clear();
    /*Agent mail end*/
    return true;
}
function touremailNotification($mailTYpe , $MailProcess, $agent_id,$booking_id,$type) {
    $ci =& get_instance();
    $ci->load->library('email');
    $ci->load->model("Tour_Model");
    $mail_settings = mail_details();

    $cancellation = $ci->Tour_Model->gettourbookpolicy($booking_id);



    $ci->db->select('*');
    $ci->db->from('hotel_tbl_general_settings');
    $title=$ci->db->get()->result();
    $titleOut = $title[0]->Title;

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$agent_id);
    $agent=$ci->db->get()->result();
    $ci->db->select('a.*,b.type,b.duration,b.durationType,c.name as booknationality');
    $ci->db->from('tour_tbl_booking a');
    $ci->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
    $ci->db->join('countries c','c.id=a.nationality','inner');
    $ci->db->where('a.id',$booking_id);
    $ci->db->where('a.agent_id',$agent_id);  
    $booking=$ci->db->get()->result();
    $total_markup = $booking[0]->agent_markup+$booking[0]->admin_markup;

    if ($type=='Book') {
      $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : '.$booking[0]->booking_id.')';     
      $BookingMsg = 'YOUR BOOKING IS CONFIRMED';
      $bookingTypeTag = '**(UNDER ALLOTMENT/FREESALE)**';
    } else {
      $subject = 'YOUR BOOKING IS ON REQUEST (BOOKING ID : '.$booking[0]->booking_id.')';     
      $BookingMsg = '<span style="color:red;">YOUR BOOKING IS ON REQUEST</span>. We will get back to you within 24 hours for update';
      $bookingTypeTag = '**(<span style="color:red;">ON REQUEST</span>)**';
    }
      $special_request = '';
      if ($booking[0]->SpecialRequest!="") {
        $special_request = 'Special Request: '.$booking[0]->SpecialRequest.'<br>';
      }


    /*Agent mail start*/

          $cancellationTerm = '';
          // if (count($cancellation)!=0) {
          //   $cancellationTerm.= '<p style="color: #b21105;font-weight: bold;">Cancellations / Amendments</p>';
          //     foreach($cancellation as $CTkey => $CTvalue) {
          //       $cancellationTerm.=''.$CTvalue->msg.'<br>';
          //     }
          //     $cancellationTerm.= '<br><br>';
          // }
          $agent_markup = $booking[0]->agent_markup;
          $admin_markup = $booking[0]->admin_markup;
          $total_markup = $agent_markup+$admin_markup;

         $grandTotal =  ($booking[0]->total_amount*$total_markup)/100+$booking[0]->total_amount;
          $message = 'Dear '.$booking[0]->bk_contact_fname." ".$booking[0]->bk_contact_lname.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            '.$BookingMsg.'<br><br>
            Booking Details  <br>
            Reference Number : '.$booking[0]->booking_id.'<br>
            Tour Name : '.$booking[0]->type.'<br>
            Nationality : '.$booking[0]->booknationality.'<br>
            Date of Tour : '.date('d/m/Y',strtotime($booking[0]->arrivaldate)).'<br>
            Duration : '.$booking[0]->duration.' '.$booking[0]->durationType.'<br>
            Guest Name : '.$booking[0]->bk_contact_fname." ".$booking[0]->bk_contact_lname.'<br><br>
           '.$special_request.'<br><br>

            -------------------------------------------------------------<br>
            <b>Grand Total : '.$agent[0]->Preferred_Currency.' '.currency_type($agent[0]->Preferred_Currency, $grandTotal).'</b><br>
            -------------------------------------------------------------
            <br><br>

            <a style="color:#357ebd;" href="'.base_url().'tour/tour_booking_view/'.$booking[0]->id.'">Please click here to view your voucher.</a><br><br>

            '.$cancellationTerm.'

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  
          $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
          $ci->email->to($agent[0]->Email);
          $ci->email->Bcc($agent[0]->Email_Accounts);
          $ci->email->Bcc($agent[0]->Email_Reservation);
          $ci->email->Bcc($agent[0]->Email_Management);
          $ci->email->Bcc($mail_settings[0]->smtp_user);
          
          $ci->email->subject($subject);
          $ci->email->message($message);
          
          $ci->email->send();
         
          // $ci->email->clear();
    /*Agent mail end*/
    return true;
}
function NationalityIduseGetName($val) {
    if ($val=="") {
      $val =  101;
    }
    $ci =& get_instance();
    $ci->db->select('name'); 
    $ci->db->from('countries'); 
    $ci->db->where('id',$val);
    $query = $ci->db->get()->result(); 
    return $query[0]->name;
}
/**
 * Unique filename based on folder
 * @since  Version 1.0.1
 * @param  string $dir      directory to compare
 * @param  string $filename filename
 * @return string           the unique filename
 */
function unique_filename($dir, $filename) {
    // Separate the filename into a name and extension.
    $info     = pathinfo($filename);
    $ext      = !empty($info['extension']) ? '.' . $info['extension'] : '';
    $filename = sanitize_file_name($filename);
    $number   = '';
    // Change '.ext' to lower case.
    if ($ext && strtolower($ext) != $ext) {
        $ext2      = strtolower($ext);
        $filename2 = preg_replace('|' . preg_quote($ext) . '$|', $ext2, $filename);
        // Check for both lower and upper case extension or image sub-sizes may be overwritten.
        while (file_exists($dir . "/$filename") || file_exists($dir . "/$filename2")) {
            $filename  = str_replace(array(
                "-$number$ext",
                "$number$ext"
            ), "-$new_number$ext", $filename);
            $filename2 = str_replace(array(
                "-$number$ext2",
                "$number$ext2"
            ), "-$new_number$ext2", $filename2);
            $number    = $new_number;
        }

        return $filename2;
    }
    while (file_exists($dir . "/$filename")) {
        if ('' == "$number$ext") {
            $filename = "$filename-" . ++$number;
        } else {
            $filename = str_replace(array(
                "-$number$ext",
                "$number$ext"
            ), "-" . ++$number . $ext, $filename);
        }
    }

    return $filename;
}
/**
 * Sanitize file name
 * @param  string $filename filename
 * @return mixed
 */
function sanitize_file_name($filename) {
    $special_chars = array(
        "?",
        "[",
        "]",
        "/",
        "\\",
        "=",
        "<",
        ">",
        ":",
        ";",
        ",",
        "'",
        "\"",
        "&",
        "$",
        "#",
        "*",
        "(",
        ")",
        "|",
        "~",
        "`",
        "!",
        "{",
        "}",
        "%",
        "+",
        chr(0)
    );
    $filename      = str_replace($special_chars, '', $filename);
    $filename      = str_replace(array(
        '%20',
        '+'
    ), '-', $filename);
    $filename      = preg_replace('/[\r\n\t -]+/', '-', $filename);
    $filename      = trim($filename, '.-_');
    // Split the filename into a base and extension[s]
    $parts         = explode('.', $filename);
    // Return if only one extension
    if (count($parts) <= 2) {
        return $filename;
    }
    // Process multiple extensions
    $filename  = array_shift($parts);
    $extension = array_pop($parts);

    $filename .= '.' . $extension;
    $CI =& get_instance();
    $filename = $CI->security->sanitize_filename($filename);

    return $filename;
}
function AdminlogActivity($description) {
    $CI =& get_instance();
    $log = array(
        'description' => $description,
        'date' => date('Y-m-d H:i:s'),
        'Name' => $CI->session->userdata('name'),
        'type' => 'Admin'
        );
    $CI->db->insert('tblactivitylog', $log);
    return true;
}
function AgentlogActivity($description) {
    $CI =& get_instance();
    $log = array(
        'description' => $description,
        'date' => date('Y-m-d H:i:s'),
        'Name' => $CI->session->userdata('agent_name'),
        'type' => 'Agent'
        );
    $CI->db->insert('tblactivitylog', $log);
    return true;
}
function HotellogActivity($description) {
    $CI =& get_instance();
    $log = array(
        'description' => $description,
        'date' => date('Y-m-d H:i:s'),
        'Name' => $CI->session->userdata('hotel_name'),
        'type' => 'Hotel'
        );
    $CI->db->insert('tblactivitylog', $log);
    return true;
}
function OtherlogActivity($description) {
    $CI =& get_instance();
    $log = array(
        'description' => $description,
        'date' => date('Y-m-d H:i:s'),
        'Name' => '',
        'type' => 'Other'
        );
    $CI->db->insert('tblactivitylog', $log);
    return true;
}
function getTransactionid() {
    $ci =& get_instance();
    $ci->db->select_max('id'); 
    $ci->db->from('tbl_onlinepaymentrecords'); 
    $query = $ci->db->get()->result(); 
    if (count($query)==0 || !isset($query[0]->id)) {
      $maxID = 1;
    } else {
      $maxID = $query[0]->id+1;
    }
    return $query;

}
function xml2array ( $xmlObject, $out = array () ) {
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;

    return $out;
}
function xmlbookingMailNotification($id) {

    $ci =& get_instance();

    $agent_id = $ci->session->userdata('agent_id');

    $ci->load->library('email');
    $ci->load->model("Finance_Model");
    $mail_settings = mail_details();

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_general_settings');
    $title=$ci->db->get()->result();
    $titleOut = $title[0]->Title;

    $ci->db->select('*');
    $ci->db->from('hotel_tbl_agents');
    $ci->db->where('id',$agent_id);
    $agent=$ci->db->get()->result();


    $ci->db->select('*');
    $ci->db->from('xml_hotel_booking');
    $ci->db->where('id',$id);
    $booking=$ci->db->get()->result();
    $discountCode = '';

    $board = "";
    $total_markup = $booking[0]->agent_markup+$booking[0]->admin_markup;

    $subject = 'YOUR BOOKING IS CONFIRMED (BOOKING ID : '.$booking[0]->BookingId.')';     
    $BookingMsg = 'YOUR BOOKING IS CONFIRMED';
    $bookingTypeTag = '**(UNDER ALLOTMENT/FREESALE)**';


    /*Agent mail start*/

    $cancellationTerm = '';

    $grandTotal =  $booking[0]->total_amount;
    $message = 'Dear '.$booking[0]->bk_contact_fname." ".$booking[0]->bk_contact_lname.',<br><br>
            Thank you for booking with Otelseasy.com<br><br>
            '.$BookingMsg.'<br><br>
            Booking Details : <br>
            Reference Number : '.$booking[0]->booking_id.'<br>
            Hotel Name : '.$booking[0]->hotel_name.'<br>
            Room Type : '.$hotel[0]->RoomTypeName.'<br>
            No. of Room(s) : '.$booking[0]->no_of_rooms.'<br>
            Check-In Date : '.date('d/m/Y',strtotime($booking[0]->Check_in)).'<br>
            Check-Out Date : '.date('d/m/Y',strtotime($booking[0]->Check_out)).'<br>
            No. of Night(s): '.$booking[0]->no_of_days.'<br><br>


            -------------------------------------------------------------<br>

            <b>Grand Total : '.agent_currency().' '.xml_currency_change($grandTotal,'AED',agent_currency()).'</b><br>
            -------------------------------------------------------------
            <br><br>

            <a style="color:#357ebd;" href="'.base_url().'Payment/xml_booking_view?id='.$booking[0]->id.'&ConfirmationNo='.$booking[0]->ConfirmationNo.'">Please click here to view your voucher.</a><br><br>

            '.$cancellationTerm.'

            Once again thank you for booking with Otelseasy.com <br><br>

            Thank you<br><br>
            Best Regards,<br>
            OTELSEASY.COM<br>
            '.$mail_settings[0]->smtp_user.'<br>
            971 54 441 2554<br>
            <strong><a style="color:blue;" href="'.base_url().'">www.otelseasy.com</a></strong><br>.';  

          $ci->email->from($mail_settings[0]->smtp_user, $mail_settings[0]->company_name);
          $ci->email->to($agent[0]->Email);
          $ci->email->Bcc($agent[0]->Email_Accounts);
          $ci->email->Bcc($agent[0]->Email_Reservation);
          $ci->email->Bcc($agent[0]->Email_Management);
          $ci->email->Bcc($mail_settings[0]->smtp_user);
          
          $ci->email->subject($subject);
          $ci->email->message($message);
          
          $ci->email->send();
         
          // $ci->email->clear();
    /*Agent mail end*/
    return true;
}
function ObjectToArray($val) {
  if (is_object($val)) {
    $val = json_decode(json_encode($val),true);
  }
  return $val;
}
function xmlrevenue_markup($provider,$agent_id) {  
  $ci =& get_instance();
  $query = $ci->db->query("SELECT IFNULL(MAX(Markup),0) as Markup FROM `hotel_tbl_revenue` where ".$provider." = 1 AND FIND_IN_SET(".$agent_id.", IFNULL(Agents,'')) > 0 AND FromDate <= '".date('Y-m-d',strtotime($_REQUEST['Check_in']))."' AND  ToDate >= '".date('Y-m-d',strtotime($_REQUEST['Check_out']))."'")->result();
  return $query[0]->Markup;
}
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
