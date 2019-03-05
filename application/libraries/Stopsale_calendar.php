<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class stopsale_calendar {  
     
    /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function hotel_currency() {
      $ci =& get_instance();
      $id = $_GET['hotel_id'];
      $ci->db->select('sell_currency');
      $ci->db->from('hotel_tbl_hotels');
      $ci->db->where('id',$id);
      $query=$ci->db->get();
      $result = $query->result();
      return $result[0]->sell_currency;
    }
    public function room_amount($hotel_id,$room_id,$date,$con_id) {
      $ci =& get_instance();
      $ci->db->select('amount');
      $ci->db->from('hotel_tbl_allotement');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('room_id',$room_id);
      $ci->db->where('allotement_date',$date);
      $ci->db->where('contract_id',$con_id);
      $ci->db->limit('1');
      $query=$ci->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $amount = $result[0]->amount;
      } else {
        $amount = 0;
      }
      return round(contract_currency_type(hotel_currency_type($hotel_id),$amount));
    }
    public function room_allotement($hotel_id,$room_id,$date,$con_id) {
      $ci =& get_instance();
      $linkedRoomAllotment = 0;
      $allotement = 0;
      $cut_off = 0;

      $ci->db->select('allotement,linked_to_room_type,(select count(*) from hotel_tbl_hotel_room_type where hotel_id = '.$hotel_id.' and id = a.linked_to_room_type) as cnt');
      $ci->db->from('hotel_tbl_hotel_room_type as a');
      $ci->db->where('a.hotel_id',$hotel_id);
      $ci->db->where('a.id',$room_id);
      $ci->db->having('cnt !=',0);
      $ci->db->limit('1');
      $query1=$ci->db->get();
      $result1 = $query1->result();
      // Linked Contract id get condition start
      $ci->db->select('linkedContract,contract_type');
      $ci->db->from('hotel_tbl_contract');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('contract_id',$con_id);
      $linkedcontract=$ci->db->get()->result();
      if ($linkedcontract[0]->contract_type=="Sub") {
        $con_id = "CON0".$linkedcontract[0]->linkedContract;
      }
      // Linked Contract id get condition end

      // Linked Room allotment get condition start
      if (count($result1) != 0 && $result1[0]->linked_to_room_type!="" && $result1[0]->linked_to_room_type!=Null && $result1[0]->linked_to_room_type!="--Select--") {
        $ci->db->select('allotement');
        $ci->db->from('hotel_tbl_allotement');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('room_id',$result1[0]->linked_to_room_type);
        $ci->db->where('allotement_date',$date);
        $ci->db->where('contract_id',$con_id);
        $ci->db->limit('1');
        $query3=$ci->db->get();
        $result3 = $query3->result();
        if (count($result3)!=0) {
          $linkedRoomAllotment = $result3[0]->allotement;
        } else {
          $linkedRoomAllotment = 0;
        }
        // Linked Room allotment get condition end
        $ci->db->select('allotement,cut_off');
        $ci->db->from('hotel_tbl_allotement');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('room_id',$room_id);
        $ci->db->where('allotement_date',$date);
        $ci->db->where('contract_id',$con_id);
        $ci->db->limit('1');
        $query=$ci->db->get();
        $result = $query->result();
        if (count($result)!=0) {
          $allotement = $result[0]->allotement;
          $cut_off = $result[0]->cut_off;
        }

      } else {
        $ci->db->select('allotement,cut_off');
        $ci->db->from('hotel_tbl_allotement');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('room_id',$room_id);
        $ci->db->where('allotement_date',$date);
        $ci->db->where('contract_id',$con_id);
        $ci->db->limit('1');
        $query=$ci->db->get();
        $result = $query->result();
        if (count($result)!=0) {
          $allotement = $result[0]->allotement;
          $cut_off = $result[0]->cut_off;
        }
      }
      $return['allotment'] = $allotement+$linkedRoomAllotment;
      $return['Realallotment'] = $allotement;
      $return['cut_off'] = $cut_off;
      return $return;
    }
    public function room_booking($hotel_id,$room_id,$date,$con_id) {
      $ci =& get_instance();
      $date_split = explode("-", $date);
      if ($date=="") {
        $check_date = $date;
      } else {
        $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
      }

      $ci->db->select('book_room_count');
      $ci->db->from('hotel_tbl_booking');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('room_id',$room_id);
      $ci->db->where('"'.$check_date.'" >= check_in');
      $ci->db->where('"'.$check_date.'" < check_out');
      $ci->db->where('booking_flag !=',0);
      $ci->db->where('booking_flag !=',3);
      $query=$ci->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        foreach ($result as $key => $value) {
            $room_count[] = $value->book_room_count;
        }
        $booking = array_sum($room_count);
      } else {
          $booking = 0;
      }
      return $booking;
    }
    public function closed_out_check($hotel_id,$room_id,$date,$con_id) {
      $output = "";
      $ci =& get_instance();
      $closedCheck = array();

      $ci->db->select('roomType');
      $ci->db->from('hotel_tbl_closeout_period');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('closedDate',$date);
      $ci->db->where('contract_id',$con_id);
      $query=$ci->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $room= $result[0]->roomType;

        $explode_data= explode(",", $room);
        foreach ($explode_data as $key1 => $value1) {
          if ($value1==$room_id) {
            $closedCheck[$key1] = 1;
          } 
        }
      }
            
      $ci->db->select('id');
      $ci->db->from('hotel_tbl_closeout_period');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('closedDate',$date);
      $ci->db->where('contract_id',$con_id);
      $query1=$ci->db->get();
      $result1 = $query1->result();
      
      if (count($result1)!=0 && array_sum($closedCheck)!=0) {
        $output = '<img src="'.base_url().'assets/images/closed.jpg" style="width: 70%;opaacity: 0.7;padding-top:15px;">';
      }
      return  $output;
    }
    public function cancellationCheck($hotel_id,$room_id,$date,$con_id) {
      $output = "";
      $ci =& get_instance();

      $ci->db->select('id');
      $ci->db->from('hotel_tbl_hotel_room_type');
      $ci->db->where('id',$room_id);
      $ci->db->limit('1');
      $roomquery=$ci->db->get();
      $roomResult = $roomquery->result();

      $ci->db->select('*');
      $ci->db->from('hotel_tbl_cancellationfee');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('contract_id',$con_id);
      $ci->db->where('"'.$date.'" BETWEEN fromDate AND toDate');
      $ci->db->limit('1');
      $query1=$ci->db->get();
      $result1 = $query1->result();

      if (count($result1)!=0) {

        $explode_room = explode(",", $result1[0]->roomType);
        foreach ($explode_room as $key => $value) {
          if ($value==$roomResult[0]->id) {
            $start_date=date_create($result1[0]->fromDate);
            $end_date=date_create($result1[0]->toDate);
            $no_of_days=date_diff($start_date,$end_date);
            $tot_days = $no_of_days->format("%a");
            for($i = 0; $i <= $tot_days; $i++) {
              $result[$i]= date('Y-m-d', strtotime($result1[0]->fromDate. ' + '.$i.'  days'));
              if ($date==$result[$i]) {
                $application = $result1[0]->application;
                $season = $result1[0]->season;
                $output = '<span class="cp-style" onclick="cancellationCheck('.$result1[0]->daysFrom.','.$result1[0]->daysTo.','.$result1[0]->cancellationPercentage.','."'$date'".','."'$season'".','."'$application'".')" data-toggle="modal" data-target="#canModal">CP</span>';
              }
            }
          }
        }
        
      } 
      return $output;
    }
    public function Editpermission($date) {
      $button = "";
      if ($date >= date('Y-m-d')) {
        $button = '<i class="fa fa-edit editCal" data-toggle="modal" data-target="#calModal"></i>';
      }
      return $button;
    }
    public function show() {
        $year  = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());  
         
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar"><form method="post" id="allotement_update_form">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</form></div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             $room_amount = $this->room_amount($_GET['hotel_id'],$_GET['room_id'],$this->currentDate,$_GET['con_id']);
            $allotement = $this->room_allotement($_GET['hotel_id'],$_GET['room_id'],$this->currentDate,$_GET['con_id']);

            $room_allotement = $allotement['allotment'];
            $real_allotement = $allotement['Realallotment'];
            $room_cut_off = $allotement['cut_off'];

            $room_booking = $this->room_booking($_GET['hotel_id'],$_GET['room_id'],$this->currentDate,$_GET['con_id']);
            $room_balance = $room_allotement-$room_booking;
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
            $room_amount = 0;
            $room_allotement = 0;
            $real_allotement = 0;
            $room_cut_off = 0;
            $room_booking = 0;
            $room_balance = 0;
        }
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'"><input type="hidden" class="alt-price-li-'.$this->currentDate.'" name="price[]" value="'.$room_amount.'"/>
                '.$this->closed_out_check($_GET['hotel_id'],$_GET['room_id'],$this->currentDate,$_GET['con_id']).'
                <input type="hidden"  name="alotement_date[]" value="'.$this->currentDate.'"/>
                <input type="hidden" class="alt-roomalt-li-'.$this->currentDate.'" name="alotement[]" value="'.$room_allotement.'"/>
                <input type="hidden" class="alt-cut-off-li-'.$this->currentDate.'" name="cut_off[]" value="'.$room_cut_off.'"/>
                <input type="hidden" name="hotel_id[]" value="'.$_GET['hotel_id'].'"/>
                <input type="hidden" name="contract_id[]" value="'.$_GET['con_id'].'"/>
                <input type="hidden" name="room_id[]" value="'.$_GET['room_id'].'"/>
                
                <span class="cal-date">'.$this->Editpermission($this->currentDate).$this->cancellationCheck($_GET['hotel_id'],$_GET['room_id'],$this->currentDate,$_GET['con_id']).$cellContent.'</span>
                <div class="cal-info-group">
                    <div class="cal-amt">Amount :<span class="input">'.$room_amount.'</span></div>
                    <div class="cal-alot-real hide">Allotment : <span class="input">'.$real_allotement.'</span></div>
                    <div class="cal-alot">Allotment : <span class="input">'.$room_allotement.'</span></div>
                    <div class="cal-bal">Cut-off :<span class="input">'.$room_cut_off.'</span></div>
                <div class="cal-bkd">Booked : <span class="input">'.$room_booking.'</span></div>
                <div class="cal-bal-room">Balance : <span class="input">'.$room_balance.'</span></div>
                </div><span class="hidden"><i class="fa fa-buysellads"></i></span><span class="hidden"></span></li>';
    }
    /**
    * create navigation
    */
    private function _createNavi(){     
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
                '<a class="prev" href="'.base_url().'backend/hotels/hotels_stopSale?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'&hotel_id='.$_GET['hotel_id'].'&room_id='.$_GET['room_id'].'&con_id='.$_GET['con_id'].'">Prev</a>'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.base_url().'backend/hotels/hotels_stopSale?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'&hotel_id='.$_GET['hotel_id'].'&room_id='.$_GET['room_id'].'&con_id='.$_GET['con_id'].'">Next</a>'.
            '</div>';
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
             
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
 
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
     
}
