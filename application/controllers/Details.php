<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends MY_Controller {
	
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->helper('common');
    $this->load->model('List_Model');
  }
	public function index() {
		  if ($this->session->userdata('agent_name')=="") {
  			redirect("../backend/logout/agent_logout");
  		}
      $result['agent_currency'] =  agent_currency();
      if (isset($_REQUEST['mark_up']) && $_REQUEST['mark_up']!="") {
        $agent_markup = $_REQUEST['mark_up']+mark_up_get()+general_mark_up_get();
      } else {
        $agent_markup = mark_up_get()+general_mark_up_get();
      } 
      
      $result['view'] = $this->List_Model->single_view($_REQUEST);
      if (count($result['view'])==0) {
        redirect("../hotels");
      }
      $result['related'] = $this->List_Model->related_hotel_list($result['view'][0]->city,$_REQUEST['search_id']);
  
     	foreach ($result['view'] as $key => $value) {
    		$result['view']['gallery_images']=explode(",",$value->gallery_images); 
    	}
    	$hotel_facilities = explode(",",$result['view'][0]->hotel_facilities); 
    	foreach ($hotel_facilities as $key => $value) {
    		$result['hotel_facilities'][$key] = $this->List_Model->hotel_facilities_data($value);
    	}

      $room_facilities = explode(",",$result['view'][0]->room_facilities); 
      foreach ($room_facilities as $key => $value) {
        $result['room_facilities'][$key] = $this->List_Model->room_facilities_data($value);
      }
      $result['contractList'] =  $this->List_Model->contractchecking1($_REQUEST);
      $result['view']['rooms'] = $this->List_Model->hotel_rooms_data($result['view'][0]->id);
      // print_r($result['view']['rooms']);
      // exit();
      foreach ($result['view']['rooms'] as $key => $value) {
          $result['view']['room_facilities'][$key] = explode(",",$value->room_facilities);
      }
      $h_id = $value->hotel_id;
      $result['markup'] = 0;
      $allotment_hotel_id=$result['view']['rooms'][0]->hotel_id;
      // $result['allotment'] = $this->List_Model->allotment_checking($allotment_hotel_id);
		$this->load->view('frontend/details/index',$result); 
	}
  public function review_insert() {
    if ($this->session->userdata('agent_name')=="") {
        redirect("../backend/logout/agent_logout");
      }
      if ($_REQUEST['review_uname']=="") {
        $Return['error'] = "Name field is required !";
        $Return['status'] = "0";
      } else if ($_REQUEST['title']=="") {
        $Return['error'] = "Title field is required !";
        $Return['status'] = "0";
      } else if ($_REQUEST['comment']=="") {
        $Return['error'] = "Comment field is required !";
        $Return['status'] = "0"; 
      } else {
        $Return['error'] = "Successfully Submitted !";
        $review= $this->List_Model->review_add($_REQUEST);
        $Return['status'] = "1";
      }
    echo json_encode($Return);
  }
  public function review_view() {
     $data = array();
     $result= $this->List_Model->review_view($_REQUEST['hotel_id']);
     if(count($result)!=0) {
     foreach ($result as $key => $value) {
      $Cleanliness = explode(";", $value->Cleanliness);
      $Room_Comfort = explode(";", $value->Room_Comfort);
      $Location = explode(";", $value->Location);
      $Service_Staff = explode(";", $value->Service_Staff);
      $Sleep_Quality = explode(";", $value->Sleep_Quality);
      $Value_Price = explode(";", $value->Value_Price);
      if ($Cleanliness['1'] == "1" || $Cleanliness['1'] == "2" || $Cleanliness['1'] == "3" || $Cleanliness['1'] == "4" || $Cleanliness['1'] == "5") {
        $Cleanliness['1'] = $Cleanliness['1'].".0";
      }
      if ($Room_Comfort['1'] == "1" || $Room_Comfort['1'] == "2" || $Room_Comfort['1'] == "3" || $Room_Comfort['1'] == "4" || $Room_Comfort['1'] == "5") {
        $Room_Comfort['1'] = $Room_Comfort['1'].".0";
      }
      if ($Location['1'] == "1" || $Location['1'] == "2" || $Location['1'] == "3" || $Location['1'] == "4" || $Location['1'] == "5") {
        $Location['1'] = $Location['1'].".0";
      }
      if ($Service_Staff['1'] == "1" || $Service_Staff['1'] == "2" || $Service_Staff['1'] == "3" || $Service_Staff['1'] == "4" || $Service_Staff['1'] == "5") {
        $Service_Staff['1'] = $Service_Staff['1'].".0";
      }
      if ($Sleep_Quality['1'] == "1" || $Sleep_Quality['1'] == "2" || $Sleep_Quality['1'] == "3" || $Sleep_Quality['1'] == "4" || $Sleep_Quality['1'] == "5") {
        $Sleep_Quality['1'] = $Sleep_Quality['1'].".0";
      }
      if ($Value_Price['1'] == "1" || $Value_Price['1'] == "2" || $Value_Price['1'] == "3" || $Value_Price['1'] == "4" || $Value_Price['1'] == "5") {
        $Value_Price['1'] = $Value_Price['1'].".0";
      }
     $data[] = '<div class="hpadding20">  
                  <div class="col-md-4 offset-0 center">
                    <div class="padding20">
                      <div class="bordertype5">
                        <div class="circlewrap">
                          <img src="'.base_url().'skin/images/user-avatar.jpg" class="circleimg" alt=""/>
                          <span>4.5</span>
                        </div>
                        <span class="dark">by '.$value->Username.'</span><br/>
                        <img src="'.base_url().'skin/images/check.png" alt=""/><br/>
                        <span class="green">Recommended<br/>for Everyone</span>
                      </div>
                      
                    </div>
                  </div>
                  <div class="col-md-8 offset-0">
                    <div class="padding20">
                      <span class="opensans size16 dark">'.$value->Evaluation.'</span><br/>
                      <span class="opensans size13 lgrey">Posted on '.$value->Updated_Date.' </span><br/>
                      <p>'.$value->Comment.'</p>  
                      <ul class="circle-list">
                        <li>'.$Cleanliness['1'].'</li>
                        <li>'.$Room_Comfort['1'].'</li>
                        <li>'.$Location['1'].'</li>
                        <li>'.$Service_Staff['1'].'</li>
                        <li>'.$Sleep_Quality['1'].'</li>
                        <li>'.$Value_Price['1'].'</li>
                      </ul>
                    </div>
                  </div>
                  <div class="clearfix"></div>              
                </div>  
                <div class="line2"></div>';
     }
   } else {
      $data[] = '<div class="col-md-12 center" style="margin-top: 31px;">No reviews</div>
                  <div class="clearfix"></div>';
   }
          echo json_encode($data);
  }
  public function average_ratings() {
    $data = array();
    $Cleanliness_arry = array();
    $Room_Comfort_arry = array();
    $Location_arry = array();
    $Service_Staff_arry = array();
    $Sleep_Quality_arry = array();
    $Value_Price_arry = array();
    $result=$this->List_Model->average_ratings($_REQUEST['hotel_id']);
    $recommended_count=$this->List_Model->recommended_count($_REQUEST['hotel_id']);
    $count = count($result);
    if ($count!=0) {
      foreach ($result as $key => $value) {
        $clean[$key] = explode(";", $value->Cleanliness);
        $Cleanliness_arry[$key] = $clean[$key][1];
        $room[$key] = explode(";", $value->Room_Comfort);
        $Room_Comfort_arry[$key] = $room[$key][1];
        $location[$key] = explode(";", $value->Location);
        $Location_arry[$key] = $location[$key][1];
        $service_staff[$key] = explode(";", $value->Service_Staff);
        $Service_Staff_arry[$key] = $service_staff[$key][1];
        $sleep_quality[$key] = explode(";", $value->Sleep_Quality);
        $Sleep_Quality_arry[$key] = $clean[$key][1];
        $value_price[$key] = explode(";", $value->Value_Price);
        $Value_Price_arry[$key] = $clean[$key][1];
      }
   
        $tot_cleanliness = array_sum($Cleanliness_arry);
        $total_cleanliness=round($tot_cleanliness/$count,1);
        $tot_room_comfort = array_sum($Room_Comfort_arry);
        $total_room_comfort=round($tot_room_comfort/$count,1);
        $tot_location = array_sum($Location_arry);
        $total_location=round($tot_location/$count,1);
        $tot_service_staff = array_sum($Service_Staff_arry);
        $total_service_staff=round($tot_service_staff/$count,1);
        $tot_sleep_quality = array_sum($Sleep_Quality_arry);
        $total_sleep_quality=round($tot_sleep_quality/$count,1);
        $tot_value_price = array_sum($Value_Price_arry);
        $total_value_price=round($tot_value_price/$count,1);
      if ($total_cleanliness == "1" || $total_cleanliness == "2" || $total_cleanliness == "3" || $total_cleanliness == "4" || $total_cleanliness == "5") {
        $total_cleanliness = $total_cleanliness.".0";
      }
      if ($total_room_comfort == "1" || $total_room_comfort == "2" || $total_room_comfort == "3" || $total_room_comfort == "4" || $total_room_comfort == "5") {
        $total_room_comfort = $total_room_comfort.".0";
      }
      if ($total_location == "1" || $total_location == "2" || $total_location == "3" || $total_location == "4" || $total_location == "5") {
        $total_location = $total_location.".0";
      }
      if ($total_service_staff == "1" || $total_service_staff == "2" || $total_service_staff == "3" || $total_service_staff == "4" || $total_service_staff == "5") {
        $total_service_staff = $total_service_staff.".0";
      }
      if ($total_sleep_quality == "1" || $total_sleep_quality == "2" || $total_sleep_quality == "3" || $total_sleep_quality == "4" || $total_sleep_quality == "5") {
        $total_sleep_quality = $total_sleep_quality.".0";
      }
      if ($total_value_price == "1" || $total_value_price == "2" || $total_value_price == "3" || $total_value_price == "4" || $total_value_price == "5") {
        $total_value_price = $total_value_price.".0";
      }

      $review_rating = ($total_cleanliness+$total_room_comfort+$total_location+$total_service_staff+$total_sleep_quality+$total_value_price)/6;
      $total_review_rating_round=ceil($review_rating);
      $percentange_rate = $total_review_rating_round*"2"."0";
      $total_review_rating=substr($review_rating, 0, 3);
      $ceil_starsrating = ceil($total_review_rating);

      $rating_insert =  $this->List_Model->rating_update($_REQUEST['hotel_id'],$total_review_rating,$count,$ceil_starsrating);

      $recommended_total =$count - $recommended_count;
      $count_percnt = ($count/$count)*100;
      $get_count_percnt = ($recommended_total/$count)*100;

      $data['guest_recomend_percentage'][] = '<span class="opensans size30 bold grey2">'.ceil($get_count_percnt).'%</span><br/>
          of guests<br/>recommend';

      $data['review_guest_rating'][] = '<span class="opensans size30 bold grey2">'.$total_review_rating.'</span>/5<br/>
          guest ratings';

      $data['review_rating_count'][] = '<img src="'.base_url().'skin/images/user-rating-'.$total_review_rating_round.'.png" alt=""/><br/>
          '.$count.' reviews';

      $data['review_rating'][] ='<div class="col-md-4 offset-0">
                <span class="opensans dark size60 slim lh3 ">'.$total_review_rating.'/5</span><br/>
                <img src="'.base_url().'skin/images/user-rating-'.$total_review_rating_round.'.png" alt=""/>
              </div>
              <div class="col-md-8 offset-0">
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success wh'.$percentange_rate.'percent" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">'.$total_review_rating.' out of 5</span>
                  </div>
                </div>    
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success wh'.ceil($get_count_percnt).'percent" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">'.ceil($get_count_percnt).'% of guests recommend</span>
                  </div>
                </div>
                <div class="clearfix"></div>
                Ratings based on 5 Verified Reviews
              </div>';

      $data['review_count'][] = '<div class="col-md-4 offset-0">
                  <div class="scircle left">'.$total_cleanliness.'</div>
                  <div class="sctext left margtop15">Cleanliness</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">'.$total_service_staff.'</div>
                  <div class="sctext left margtop15">Service & staff</div>
                  <div class="clearfix"></div>                
                </div>
                <div class="col-md-4 offset-0">
                  <div class="scircle left">'.$total_room_comfort.'</div>
                  <div class="sctext left margtop15">Room comfort</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">'.$total_sleep_quality.'</div>
                  <div class="sctext left margtop15">Sleep Quality</div>      
                  <div class="clearfix"></div>                    
                </div>
                <div class="col-md-4 offset-0">
                  <div class="scircle left">'.$total_location.'</div>
                  <div class="sctext left margtop15">Location</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">'.$total_value_price.'</div>
                  <div class="sctext left margtop15">Value for Price</div>  
                  <div class="clearfix"></div>                
                </div>  ';
    } else {
        $data['guest_recomend_percentage'][] = '<span class="opensans size30 bold grey2">0%</span><br/>
          of guests<br/>recommend';

        $data['review_guest_rating'][] = '<span class="opensans size30 bold grey2">0.0</span>/5<br/>
          guest ratings';

        $data['review_rating_count'][] = '<img src="'.base_url().'skin/images/user-rating-0.png" alt=""/><br/>
          0 reviews';

        $data['review_count'][] = '<div class="col-md-4 offset-0">
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Cleanliness</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Service & staff</div>
                  <div class="clearfix"></div>                
                </div>
                <div class="col-md-4 offset-0">
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Room comfort</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Sleep Quality</div>      
                  <div class="clearfix"></div>                    
                </div>
                <div class="col-md-4 offset-0">
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Location</div>
                  <div class="clearfix"></div>
                  <div class="scircle left">0.0</div>
                  <div class="sctext left margtop15">Value for Price</div>  
                  <div class="clearfix"></div>                
                </div>  ';
        $data['review_rating'][] ='<div class="col-md-4 offset-0">
                <span class="opensans dark size60 slim lh3 ">0.0/5</span><br/>
                <img src="'.base_url().'skin/images/user-rating-0.png" alt=""/>
              </div>
              <div class="col-md-8 offset-0">
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">0.0 out of 5</span>
                  </div>
                </div>    
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success wh100percent" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">100% of guests recommend</span>
                  </div>
                </div>
                <div class="clearfix"></div>
                Ratings based on 5 Verified Reviews
              </div>';
    }
     echo json_encode($data);
  }
  public function all_date_checking() {
      $start1      = $_REQUEST['Check_in']; 
      $stop1       = $_REQUEST['Check_out'];
      if (isset($_REQUEST['mark_up']) && $_REQUEST['mark_up']!="") {
        $agent_markup = $_REQUEST['mark_up']+mark_up_get()+general_mark_up_get();
      } else {
        $agent_markup = mark_up_get()+general_mark_up_get();
      } 
    
      foreach ($_REQUEST['room_ajax_id'] as $key => $value) {
        foreach ($_REQUEST['contract_ajax_id'] as $key1 => $value1) {
          $contract_markup[$key1] = $this->List_Model->contract_markup($_REQUEST['hotel_id'],$value1);
          $revenue_markup = revenue_markup($_REQUEST['hotel_id'],$value1,$this->session->userdata('agent_id'));
          $total_markup[$key1] = $contract_markup[$key1]+$agent_markup;
          if ($revenue_markup!=0) {
            $total_markup[$key1] = $revenue_markup+mark_up_get();
          }
          $roomDetails = $this->List_Model->roomDetails($value);

          $contractBoardget = $this->List_Model->contractBoardget($_REQUEST['hotel_id'],$value1);

          $room_current_count[$key][$key1] = $this->List_Model->room_current_count($value,$start1,$stop1,$_REQUEST['contract_id'],$_REQUEST['adults'],$_REQUEST['Child'],$_REQUEST,$total_markup[$key1],$value1);
          $room_booked[$key][$key1] = $this->List_Model->all_booked_room($value,$start1,$stop1,$value1);
          
          $room_closedout[$key][$key1] = $this->List_Model->all_closedout_room($_REQUEST['hotel_id'],$value1,$_REQUEST,$value);
          
          $minimumStay[$key][$key1] = $this->List_Model->minimumStayCheckAvailability($_REQUEST,$value1);
          $total_room[$key][$key1] = $room_current_count[$key][$key1]['allotement'];
          if($room_closedout[$key][$key1]['condition']!=1 && $minimumStay[$key][$key1]=="true" 
            // && $room_current_count[$key][$key1]['allotement']!=0 && $total_room[$key][$key1]!=0 
            // && substr($room_current_count[$key][$key1]['allotement'], 0, 1)!="-"
             // &&  count($_REQUEST['adults']) <= $room_current_count[$key][$key1]['allotement']
          ) {
              $contract_val[$value][] = $value1;
              $hotel_val[$value][] = $_REQUEST['hotel_id'];
              $occupancy[$value][] = $roomDetails->occupancy;
              $occupancy_child[$value][] = $roomDetails->occupancy_child;
              if (substr($room_current_count[$key][$key1]['allotement'], 0, 1)=="-") {
                $count[$value][] = 0;
              } else {
                $count[$value][] = $room_current_count[$key][$key1]['allotement'];

              }
              $condition[$value][] = $room_current_count[$key][$key1]['condition'];
              $contractBoard[$value][] = $contractBoardget->board;
              $generalsupplementType[$value][] = $room_current_count[$key][$key1]['generalsupplementType'];
              $extrabedType[$value][] = array_unique($room_current_count[$key][$key1]['extrabedType']);
              $nonRefundable[$value][] = $room_current_count[$key][$key1]['nonRefundable'];
              $discount[$value][] = $room_current_count[$key][$key1]['discount'];
              $price[$value][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['price']);
              $discountAmount[$value][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['discountAmount']);
          } else {
              $contract_val[$value][] = $value1;
              $hotel_val[$value][] = $_REQUEST['hotel_id'];
              $occupancy[$value][] = $roomDetails->occupancy;
              $occupancy_child[$value][] = $roomDetails->occupancy_child;
              if (substr($room_current_count[$key][$key1]['allotement'], 0, 1)=="-") {
                $count[$value][] = 0;
              } else {
                $count[$value][] = $room_current_count[$key][$key1]['allotement'];

              }
              $condition[$value][] = false;
              $contractBoard[$value][] = $contractBoardget->board;
              $generalsupplementType[$value][] = $room_current_count[$key][$key1]['generalsupplementType'];
              $extrabedType[$value][] = array_unique($room_current_count[$key][$key1]['extrabedType']);
              $nonRefundable[$value][] = $room_current_count[$key][$key1]['nonRefundable'];
              $discount[$value][] = $room_current_count[$key][$key1]['discount'];
              $price[$value][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['price']);
              $discountAmount[$value][] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key][$key1]['discountAmount']);
          }
        }
        $room_id[] = $value;
      }


      $data['room_id']=$room_id;
      $data['contract_val']=$contract_val;
      $data['hotel_val']= $hotel_val;
      $data['occupancy']= $occupancy;
      $data['occupancy_child']= $occupancy_child;
      $data['price']= $price;
      $data['count']= $count;
      $data['condition']= $condition;
      $data['contractBoard']= $contractBoard;
      $data['generalsupplementType']= $generalsupplementType;
      $data['extrabedType']= $extrabedType;
      $data['nonRefundable']= $nonRefundable;
      $data['discount']= $discount;
      $data['discountAmount']= $discountAmount;

      echo json_encode($data);
  }
 public function all_allotments_checking(){
    $start = $_REQUEST['start'];
    $end = $_REQUEST['end'];
    $first_date = strtotime($start);
    $second_date = strtotime($end);
    $offset = $second_date-$first_date; 
    $result = array();
    $checkin_date=date_create($_REQUEST['start']);
    $checkout_date=date_create($_REQUEST['end']);
    $no_of_days=date_diff($checkin_date,$checkout_date);
    $tot_days = $no_of_days->format("%a")+1;


    for($i = 0; $i <= floor($offset/24/60/60); $i++) {
        $result[$i]['date'] = date('Y-m-d', strtotime($start. ' + '.$i.'  days'));
        $allotments_check[]=$this->List_Model->all_allotments_checking($_REQUEST['rid'],$_REQUEST['hid'],$result[$i]['date'],$_REQUEST['conID']);
        if (count($allotments_check[$i]) != 0) {
          $cut_off_all[] = $allotments_check[$i][0]->cut_off;
        } else {
          $cut_off_all[] = array();
        }
      
    }
    if (count($allotments_check[0])==0) {
      $allotments = $this->List_Model->second_allotments_checking($_REQUEST['rid'],$_REQUEST['hid']);
      if ($allotments[0]->allotement==null) {
        $Return['allotments'] = 0;
      } else {
        $Return['allotments'] = $allotments[0]->allotement;
      }
      $Return['cut_off'] = true;
    } else { 
      $max_cut_off = max($cut_off_all);
      $Return['allotments'] = $allotments_check[0][0]->allotement;
      $check_date=date_create($_REQUEST['start']);
      $current_date=date_create(date('m/d/Y'));
      $date_diff=date_diff($check_date,$current_date);
      $check_res = $date_diff->format("%a");
        if ($max_cut_off > $check_res) {
          $Return['cut_off'] = "This booking has ended.Please check another date";
        } else {
          $Return['cut_off'] = true;
        }
    }
    echo json_encode($Return);
    
  }
  public function contractchecking() {
    $contractchecking = $this->List_Model->contractchecking($_REQUEST);
    echo json_encode($contractchecking);
  }
  public function boardsupplementDetails() {
    $boardsupplement = array();
    $array_unique = array();
    $start1      = $_REQUEST['Check_in']; 
    $stop1       = $_REQUEST['Check_out'];
    // $_REQUEST['room_ajax_id']=[11,7,6,3,1];
    foreach ($_REQUEST['room_ajax_id'] as $key => $value) {
        $boardsupplement[$key] =$this->List_Model->boardsupplementListGet($value,$_REQUEST['hotel_id'],isset($_REQUEST['contract_ajax_id'][$key]) ? $_REQUEST['contract_ajax_id'][$key] : $_REQUEST['contract_id'],$start1,$stop1,$_REQUEST['room_ajax_id']);
        foreach ($boardsupplement[$key] as $key1 => $value1) {
            $array_unique[] = $value1;
        }
    }
    foreach (array_unique($array_unique) as $key => $value) {
      // echo "<li>Including ".$value." <input type='checkbox' value='".$value."' /></li>";
      echo '<label for="'.$value.'" class="btn btn-default boardSelector">Including '.$value.' <input type="checkbox" onclick="available_check();" id="'.$value.'" value="'.$value.'" name="board[]" class="badgebox"><span class="badge">&check;</span></label>';
    }
  }
  public function requestCheck() {
    $return = array();
    if (count($_REQUEST['board'])!=0) {
      foreach ($_REQUEST['board'] as $key => $value) {
        $return[] = $value;
      }
    }
    echo json_encode($return);

  }
  public function roomFacilitiesDetailsModal() {
    if(isset($_REQUEST['id'])) { 
      $result['view'] = $this->List_Model->get_room_facility($_REQUEST['id']);
      $room_facilities = explode(",",$result['view'][0]->room_facilities);

      foreach ($room_facilities as $key => $value) {
        $result['room_facilities'][$key] = $this->List_Model->room_facilities_data($value);
      }

      $this->load->view('frontend/details/roomFacilitiesDetailsModal',$result);
    };
  }
  public function HotelFacilitiesDetailsModal() {
    if(isset($_REQUEST['hotel_id'])) { 
      $result['view'] = $this->List_Model->get_hotel_facility($_REQUEST['hotel_id']);
      $hotel_facilities = explode(",",$result['view'][0]->hotel_facilities); 
      foreach ($hotel_facilities as $key => $value) {
        $result['hotel_facilities'][$key] = $this->List_Model->hotel_facilities_data($value);
      }
      $this->load->view('frontend/details/HotelFacilitiesDetailsModal',$result);
    }
  }
  public function roomListsorting() {
    if ($this->session->userdata('agent_name')=="") {
        redirect("../backend/logout/agent_logout");
      }
      $_REQUEST['search_id'] = $_REQUEST['hotel_id'];
      $agent_currency =  agent_currency();
      if (isset($_REQUEST['mark_up']) && $_REQUEST['mark_up']!="") {
        $agent_markup = $_REQUEST['mark_up']+mark_up_get()+general_mark_up_get();
      } else {
        $agent_markup = mark_up_get()+general_mark_up_get();
      } 
            
      $result['view'] = $this->List_Model->single_view($_REQUEST);
  
      $contractList =  $this->List_Model->contractchecking1($_REQUEST);
      $view['rooms'] = $this->List_Model->hotel_rooms_data($result['view'][0]->id);
      $output = array();
      if ($contractList==false) {
            foreach ($view['rooms'] as $key => $value) {
              $Occadults = $value->occupancy;
              $Occchild = "";
              if ($value->occupancy_child!=0 && $value->occupancy_child!="") {
                $Occchild = $value->occupancy_child==1 ? $value->occupancy_child.' child' : $value->occupancy_child.' childrens';
              }

               $contract_markup = $this->List_Model->contract_markup($_REQUEST['hotel_id'],$_REQUEST['contract_id']);
              $total_markup = $agent_markup+$contract_markup;
              $markup = $total_markup;
              
              $ceilAmnt = ceil(currency_type(($agent_currency),(($value->price*$markup)/100+$value->price)));


             $output[] = '<input type="hidden" name="room_ajax_id[]" id="room_ajax_id" value="'.$value->id.'">
              <input type="hidden" name="contract_ajax_id[]" value="">

              <div class="roomRateCheckdiv'.$value->id.'">
                  <div class="padding20 contractCheckDiv">
                    <div class="col-md-4 offset-0">';
                      if ($value->images!="") { 
                        $output[] = '<a href="#"><img src="'.base_url().'uploads/rooms/'.$value->id.'/'.$value->images.'" alt="" class="fwimg"/></a>';
                      } else { 
                        $output[] = '<a href="#"><img src="'.base_url().'skin/images/items2/item1.jpg" alt="" class="fwimg"/></a>';
                      }
                    $output[] = '</div>';
                    $output[] = '<div class="col-md-8 offset-0">
                      <div class="col-md-8 mediafix1">
                        <h4 class="opensans dark bold margtop1">'.$value->room_name.'</h4>
                        <p>Max Occupancy: '.$Occadults.' adults, '.$Occchild.'</p>
                         <a class="btn btn-success btn-xs btn-block" onclick="roomFacilitiesDetailsModal('.$value->id.');" data-toggle="modal" data-target="#modal">View Room Facilities</a>
                         <a class="btn btn-success btn-xs btn-block" onclick="HotelFacilitiesDetailsModal('.$value->hotel_id.');" data-toggle="modal" data-target="#modal">View Hotel Facilities</a>
                        <div class="clearfix"></div>
                        <ul class="checklist2 margtop10">
                          <li>Clean Environment</li>
                          <li>24/7 Security Service </li>
                          <div class="generalsupl'.$value->id.'"></div>
                          <div class="mangeneralsupl'.$value->id.'"></div>
                          <div class="boardsupl'.$value->id.'"></div>
                        </ul>                 
                      </div>
                      <div class="col-md-4 center bordertype4">
                      <span class="opensans amount_val'.$value->id.' green size24">'.$agent_currency.'  '.$ceilAmnt.'</span><br/>
                        <span class="total-night opensans lightgrey size12">avg/night</span><br/><br/>
                          <span1 class="availablity'.$value->id.'" id="availablity'.$value->id.'">Available</span1><br/><br/>
                        <input type="hidden" name="room_count" class="room_count_val'.$value->id.'" id="room_count_val'.$value->id.'" value="'.$value->total_rooms.'">
                         <span class="lred bold room_count'.$value->id.'" id="room_count'.$value->id.'">'.$value->total_rooms.'-left</span><br/><br/> 
                        <a href="#" class="bookbtn mt1 book_hotel'.$value->id.'" id="book_hotel'.$value->id.'" onclick="hotel_book('.$value->id.','.$_REQUEST['search_id'].','.$value->occupancy.','.$value->occupancy_child.','."".')" >Book</a>
                        <a href="#" class="bookbtn mt1 check_room'.$value->id.'" id="check_room'.$value->id.'">check</a>
                      </a>
                      </div>                    
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="line2 contractCheckDiv"></div>  
                </div>'; 
          } 
      } else {
          foreach ($contractList['contract_id'] as $key3 => $value3) {
            foreach ($view['rooms'] as $key => $value) {
              $contract_markup = $this->List_Model->contract_markup($_REQUEST['hotel_id'],$value3);
              $total_markup = $agent_markup+$contract_markup;
              $markup = $total_markup;

              $Occadults = $value->occupancy;
              $Occchild = "";
              if ($value->occupancy_child!=0 && $value->occupancy_child!="") {
                $Occchild = $value->occupancy_child==1 ? $value->occupancy_child.' child' : $value->occupancy_child.' childrens';
              }

              $ceilAmnt = ceil(currency_type(($agent_currency),(($value->price*$markup)/100+$value->price)));

            $output[] = '<input type="hidden" name="room_ajax_id[]" id="room_ajax_id" value="'.$value->id.'">
            <input type="hidden" name="contract_ajax_id[]" value="'.$value3.'">
            <div class="ctype'.$value3.'  roomRateCheckdiv'.$value->id.'">
              <div class="padding20 contractCheckDiv">
                <div class="col-md-4 offset-0">';
                  if ($value->images!="") { 
                    $output[] = '<a href="#"><img src="'.base_url().'uploads/rooms/'.$value->id.'/'.$value->images.'" alt="" class="fwimg"/></a>';
                  } else { 
                    $output[] = '<a href="#"><img src="'.base_url().'skin/images/items2/item1.jpg" alt="" class="fwimg"/></a>';
                  } 
                $output[] = '</div>';
                $output[] = '<div class="col-md-8 offset-0">
                      <div class="col-md-8 mediafix1">
                        <h4 class="opensans dark bold margtop1">'.$value->room_name.'</h4>
                        <p>Max Occupancy: '.$Occadults.' adults, '.$Occchild.'</p>
                         <a class="btn btn-success btn-xs btn-block" onclick="roomFacilitiesDetailsModal('.$value->id.');" data-toggle="modal" data-target="#modal">View Room Facilities</a>
                         <a class="btn btn-success btn-xs btn-block" onclick="HotelFacilitiesDetailsModal('.$value->hotel_id.');" data-toggle="modal" data-target="#modal">View Hotel Facilities</a>';
                      $output[] = '<div class="clearfix"></div>
                        <ul class="checklist2 margtop10">
                          <li>Clean Environment</li>
                          <li>24/7 Security Service </li>
                          <div class="generalsupl'.$value->id.'"></div>
                          <div class="mangeneralsupl'.$value->id.'"></div>
                          <div class="boardsupl'.$value->id.'"></div>
                        </ul>                 
                      </div>';
                      $output[] = '<div class="col-md-4 center bordertype4">
                        <span class="opensans amount_val'.$value->id.' green size24">'.$agent_currency.'  '.$ceilAmnt.'</span><br/>
                        <span class="total-night opensans lightgrey size12">avg/night</span><br/><br/>
                          <span1 class="availablity'.$value->id.'" id="availablity'.$value->id.'">Available</span1><br/><br/>
                        <input type="hidden" name="room_count" class="room_count_val'.$value->id.'" id="room_count_val'.$value->id.'" value="'.$value->total_rooms.'">
                         <span class="lred bold room_count'.$value->id.'" id="room_count'.$value->id.'">'.$value->total_rooms.'-left</span><br/><br/> 
                        <a href="#" class="bookbtn mt1 book_hotel'.$value->id.'" id="book_hotel'.$value->id.'" onclick="hotel_book('.$value->id.','.$_REQUEST['search_id'].','.$value->occupancy.','.$value->occupancy_child.','."'$value3'".')" >Book</a>
                        <a href="#" class="bookbtn mt1 check_room'.$value->id.'" id="check_room'.$value->id.'">check</a>
                      </a>
                      </div>                    
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="line2 contractCheckDiv"></div>  
                </div>';  
               
            } 
          }
      } 
      foreach ($output as $key => $value) {
        echo $value;
      }
  }
  public function all_date_checking1() {
      $start1      = $_REQUEST['Check_in']; 
      $stop1       = $_REQUEST['Check_out'];
      if (isset($_REQUEST['mark_up']) && $_REQUEST['mark_up']!="") {
        $agent_markup = $_REQUEST['mark_up']+mark_up_get()+general_mark_up_get();
      } else {
        $agent_markup = mark_up_get()+general_mark_up_get();
      } 
    
    
      foreach ($_REQUEST['room_ajax_id'] as $key => $value) {
        $contract_markup = $this->List_Model->contract_markup($_REQUEST['hotel_id'],isset($_REQUEST['contract_ajax_id'][$key]) ? $_REQUEST['contract_ajax_id'][$key] : $_REQUEST['contract_id']);
        $total_markup = $contract_markup+$agent_markup;
        $room_current_count[$key] = $this->List_Model->room_current_count($value,$start1,$stop1,$_REQUEST['contract_id'],$_REQUEST['adults'],$_REQUEST['Child'],$_REQUEST,$total_markup,$_REQUEST['contract_ajax_id'][$key]);
        $room_count[$key] = $this->List_Model->all_room_count($value);
        $room_booked[$key] = $this->List_Model->all_booked_room($value,$start1,$stop1,$_REQUEST['contract_ajax_id'][$key]);
        $room_closedout[$key] = $this->List_Model->all_closedout_room($_REQUEST['hotel_id'],isset($_REQUEST['contract_ajax_id'][$key]) ? $_REQUEST['contract_ajax_id'][$key] : $_REQUEST['contract_id'],$_REQUEST);
        if($room_closedout[$key]['condition']==1) {
          $cut_off_msg[] = $room_closedout[$key]['reason'];
          $msg[] = 'Closed';
          $count[] = "0";
          $price[]= agent_currency()." ".currency_type(agent_currency(),0);
          $condition[] =False;
          $rooms = $_REQUEST['room_ajax_id'];
          $crequest = $_REQUEST['contract_ajax_id'];
          $generalsupplementType[] = array();
          $MangeneralsupplementType[] = array();
          $BoardsupplementType[] = array();
        } else if ($room_booked[$key] != 0) {
          $total_room[$key] = $room_current_count[$key]['allotement']-$room_booked[$key];
          $minimumStay[$key] = $this->List_Model->minimumStayCheckAvailability($_REQUEST,$_REQUEST['contract_ajax_id'][$key]);
          if ($total_room[$key] == 0) {
            $msg[] = 'Booked';
            $cut_off_msg[] = "";
            if (substr($room_current_count[$key]['allotement']-$room_booked[$key], 0, 1)=="-") {
              $count[] = 0;
            } else {
              $count[] = $room_current_count[$key]['allotement']-$room_booked[$key];
            }
            $rooms = $_REQUEST['room_ajax_id'];
            $crequest = $_REQUEST['contract_ajax_id'];
            $generalsupplementType[] = $room_current_count[$key]['generalsupplementType'];
            $MangeneralsupplementType[] = $room_current_count[$key]['MangeneralsupplementType'];
            $BoardsupplementType[] = $room_current_count[$key]['BoardsupplementType'];
          } else if($minimumStay[$key]!=true) {
            $msg[] = 'Minimum';
            $cut_off_msg[] = $minimumStay[$key];
            if (substr($room_current_count[$key]['allotement']-$room_booked[$key], 0, 1)=="-") {
              $count[] = 0;
            } else {
              $count[] = $room_current_count[$key]['allotement']-$room_booked[$key];
            }
            $rooms = $_REQUEST['room_ajax_id'];
            $crequest = $_REQUEST['contract_ajax_id'];
            $price[] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key]['price']);
            $condition[] = False;
            $generalsupplementType[] = $room_current_count[$key]['generalsupplementType'];
            $MangeneralsupplementType[] = $room_current_count[$key]['MangeneralsupplementType'];
            $BoardsupplementType[] = $room_current_count[$key]['BoardsupplementType'];
          } else {
            $msg[] = 'Available';
            $cut_off_msg[] = $room_current_count[$key]['cut_off_msg'];
            if (substr($room_current_count[$key]['allotement']-$room_booked[$key], 0, 1)=="-") {
              $count[] = 0;
            } else {
              $count[] = $room_current_count[$key]['allotement']-$room_booked[$key];
            }
            $rooms = $_REQUEST['room_ajax_id'];
            $crequest = $_REQUEST['contract_ajax_id'];
            $price[] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key]['price']);
            $condition[] = $room_current_count[$key]['condition'];
            $generalsupplementType[] = $room_current_count[$key]['generalsupplementType'];
            $MangeneralsupplementType[] = $room_current_count[$key]['MangeneralsupplementType'];
            $BoardsupplementType[] = $room_current_count[$key]['BoardsupplementType'];
          }
        } else {
          $minimumStay[$key] = $this->List_Model->minimumStayCheckAvailability($_REQUEST,$_REQUEST['contract_ajax_id'][$key]);
          if($minimumStay[$key]!="true") {
            $msg[] = 'Minimum';
            $rooms = $_REQUEST['room_ajax_id'];
            $crequest = $_REQUEST['contract_ajax_id'];
            $count[] = $room_current_count[$key]['allotement'];
            $price[] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key]['price']);
            $condition[] = False;
            $cut_off_msg[] = $minimumStay[$key];
            $generalsupplementType[] = $room_current_count[$key]['generalsupplementType'];
            $MangeneralsupplementType[] = $room_current_count[$key]['MangeneralsupplementType'];
            $BoardsupplementType[] = $room_current_count[$key]['BoardsupplementType'];
          } else {
            $msg[] = 'Available';
            $rooms = $_REQUEST['room_ajax_id'];
            $crequest = $_REQUEST['contract_ajax_id'];
            $count[] = $room_current_count[$key]['allotement'];
            $price[] = agent_currency()." ".currency_type(agent_currency(),$room_current_count[$key]['price']);
            $condition[] = $room_current_count[$key]['condition'];
            $cut_off_msg[] = $room_current_count[$key]['cut_off_msg'];
            $generalsupplementType[] = $room_current_count[$key]['generalsupplementType'];
            $MangeneralsupplementType[] = $room_current_count[$key]['MangeneralsupplementType'];
            $BoardsupplementType[] = $room_current_count[$key]['BoardsupplementType'];
          } 
        }
    }

    $data['cut_off_msg']=$cut_off_msg;
    $data['mssg1']=$msg;
    $data['mssgc']= $count;
    $data['mssgrooms']= $rooms;
    $data['crequest']= $crequest;
    $data['price']= $price;
    $data['condition']= $condition;
    $data['generalsupplementType']= $generalsupplementType;
    $data['MangeneralsupplementType']= $MangeneralsupplementType;
    $data['BoardsupplementType']= $BoardsupplementType;
    echo json_encode($data);
  }
  public function hoteldetails() {
    $data['details'] = $this->List_Model->TbohotelDetails($_REQUEST['search_id']);
    $this->load->view('frontend/details/xmlhotel',$data); 

  }
  public function TBO_available_check() {
   $output =  $this->List_Model->TBORoomList($_REQUEST['hotel_id']);
   if ($output=='') {
     $output = '<p class="text-center">No Records found</p>';
   }
   echo json_encode($output);
  }
  public function contact() {
    $this->load->view('frontend/details/contact'); 
  }
  public function termcondition() {
    $this->load->view('frontend/details/termcondition'); 
  }
  public function PrivacyPolicy() {
    $this->load->view('frontend/details/PrivacyPolicy'); 
  }
}


