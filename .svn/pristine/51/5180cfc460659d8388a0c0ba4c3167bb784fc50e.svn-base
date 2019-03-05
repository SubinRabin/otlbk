<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Finance_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
      	$this->load->model('Payment_Model');
	}
	// report strart
    public function hotel_finance_list_select($hotel_id,$from_date,$to_date)
	{ 
		$this->db->select('hotel_tbl_booking.*,COUNT(hotel_tbl_booking.hotel_id) AS book_count,hotel_tbl_hotels.*,hotel_tbl_booking.*,SUM(hotel_tbl_booking.normal_price) AS sum_price,SUM(hotel_tbl_booking.no_of_days) AS sum_day,SUM(hotel_tbl_booking.book_room_count) AS sum_room');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		if($hotel_id!=""){
			$this->db->where('hotel_tbl_hotels.id',$hotel_id);
		}
		$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_hotels.delflg',1);
		$this->db->group_by('hotel_tbl_booking.hotel_id');
		$this->db->order_by('hotel_tbl_booking.id','desc');
		$query=$this->db->get();
		return $query;
	   
	}
	public function agent_report_list_select($agent_id,$from_date,$to_date){
		// $this->db->select('hotel_tbl_booking.*,COUNT(hotel_tbl_booking.agent_id) AS book_count,hotel_tbl_agents.*,SUM(FinalAmountAgent.FinalTot)As price,SUM(hotel_tbl_booking.no_of_days) AS sum_day,SUM(hotel_tbl_booking.book_room_count) AS sum_room');
		// $this->db->from('hotel_tbl_booking');
		// $this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
		// $this->db->join('FinalAmountAgent','FinalAmountAgent.BookId=hotel_tbl_booking.id');
		$this->db->select('*,COUNT(hotel_tbl_booking.agent_id) AS book_count,');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.Created_By','left');
		if($agent_id!="")
		{
			$this->db->where('hotel_tbl_agents.id',$agent_id);
		}
		if ($from_date!="" && $to_date!="") {
			$this->db->where("(STR_TO_DATE(hotel_tbl_booking.check_in, '%m/%d/%Y')) >=",$from_date);
	     	$this->db->where("(STR_TO_DATE(hotel_tbl_booking.check_out, '%m/%d/%Y')) <=",$to_date);
		}
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
        $this->db->group_by('hotel_tbl_booking.agent_id');
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
				
	}
	public function hotel_finance_list_all_select($id,$from_date,$to_date)
	{   
		
		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_hotels.*,hotel_tbl_booking.id as booking_id');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
        $this->db->where('hotel_id',$id);
		if($from_date!="" && $to_date!=""){
	        $this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     		$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
    	}
        $this->db->where('hotel_tbl_booking.booking_flag',1);
        $this->db->order_by('hotel_tbl_booking.id');
        $query=$this->db->get();
    	return $query;
    	
	}
	public function agent_fin_list_all_select($id,$from_date,$to_date)
	{    
		if($from_date!="" && $to_date!=""){
        	// $real_from_date = date('m/d/Y', strtotime($from_date));
        	// $real_to_date = date('m/d/Y', strtotime($to_date));
			$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_agents.*,hotels_tbl_booking_invoice.*');
        	$this->db->from('hotel_tbl_booking');
        	$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
        	$this->db->join('hotels_tbl_booking_invoice','hotels_tbl_booking_invoice.booking_id = hotel_tbl_booking.id');
        	$this->db->where('agent_id',$id);
        	$this->db->where('booking_flag',1);
        	$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     		$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
        	$this->db->order_by('hotel_tbl_booking.id','desc');
        	//$this->db->order_by('id','desc');
        	$query=$this->db->get();
        	// print_r($query->result());
        	// exit();
        	return $query;
    	}else{
    		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_agents.*,hotels_tbl_booking_invoice.*');
        	$this->db->from('hotel_tbl_booking');
        	$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
        	$this->db->join('hotels_tbl_booking_invoice','hotels_tbl_booking_invoice.booking_id = hotel_tbl_booking.id');
        	$this->db->where('hotel_tbl_booking.booking_flag',1);
        	$this->db->where('hotel_tbl_booking.agent_id',$id);
        	$this->db->order_by('hotel_tbl_booking.id','desc');
        	//$this->db->order_by('id','desc');
        	$query=$this->db->get();
        	// print_r($query->result());
        	// exit();
        	return $query;
    	}
		
	}
	public function hotel_report_list_first_select($bookingid)
	{    
		
		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_booking.normal_price AS price,hotel_tbl_booking.no_of_days AS dayz,hotel_tbl_booking.book_room_count AS roomz,hotel_tbl_hotels.*');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		//$this->db->where('hotel_tbl_hotels.id',$hotel_id);
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_hotels.delflg',1);
		//$this->db->where('id',$hotel_id);
        $this->db->where('hotel_tbl_booking.hotel_id',$bookingid);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
		
	}
	public function agent_report_list_first_select($bookingid)
	{    
		$this->db->select('hotel_tbl_booking.*,FinalAmountAgent.*,hotel_tbl_booking.booking_id AS booked,FinalAmountAgent.AgentTot AS price,hotel_tbl_booking.no_of_days AS dayz,hotel_tbl_booking.book_room_count AS roomz,hotel_tbl_agents.*');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
		$this->db->join('FinalAmountAgent','FinalAmountAgent.BookId=hotel_tbl_booking.id');
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
		//$this->db->where('id',$hotel_id);
        $this->db->where('hotel_tbl_booking.agent_id',$bookingid);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
		

	}
	public function profit_report_list_select($hotel_id,$agent_id)
	{   
	 
		// if($agent_id != "" && $hotel_id != ""){
			$this->db->select('hotel_tbl_booking.*,hotel_tbl_agents.*,hotel_tbl_hotels.*,hotel_tbl_booking.id AS full_id');
        	$this->db->from('hotel_tbl_booking');
        	$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id','left');
			$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id','left');
			if($agent_id != "") 
			{
				$this->db->where('hotel_tbl_agents.id',$agent_id);
			}
			if($hotel_id != "") 
			{
				$this->db->where('hotel_tbl_hotels.id',$hotel_id);
			}
			// $this->db->where('hotel_tbl_booking.booking_flag',1);
        	// $this->db->group_by('hotel_tbl_booking.agent_id');
			$this->db->order_by('hotel_tbl_booking.id');
	    	$query=$this->db->get();
        	return $query;
	}
	public function profit_report_list_first_select($bookingid)
	{    
		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_booking.normal_price AS price,hotel_tbl_booking.no_of_days AS dayz,hotel_tbl_booking.book_room_count AS roomz,hotel_tbl_agents.*');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
        $this->db->where('hotel_tbl_booking.agent_id',$bookingid);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
	}
	public function reports_list_all_select($id)
	{    
		$this->db->select('hotel_tbl_booking.*,hotel_tbl_hotels.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_booking.book_room_count AS room_num,hotels_tbl_booking_invoice.*');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		$this->db->join('hotels_tbl_booking_invoice','hotels_tbl_booking_invoice.booking_id = hotel_tbl_booking.id');
		$this->db->where('hotel_tbl_booking.booking_flag',1);
        $this->db->where('hotel_tbl_booking.id',$id);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
	}
	// report end
	// finance start
	public function finance_hotel_list_select()
	{    
		$this->db->select('hotel_tbl_hotels.*');
		$this->db->from('hotel_tbl_hotels');
		$this->db->where('hotel_tbl_hotels.delflg',1);
		$this->db->order_by('hotel_tbl_hotels.id','desc');
	    $query=$this->db->get();
		return $query;
	}
	 public function insert_finance_update() {
        $datas= array(
                  'hotel_id' =>$_REQUEST['credit_amount'],
                  'credit_amount' =>$_REQUEST['credit_amount'],
                  'paid' =>$_REQUEST['paid'],
                  'balance' =>$_REQUEST['balance'],
                  'date' => date('Y-m-d'),
                );
        $this->db->insert('hotel_tbl_finance',$datas);
        $hotel_id = $this->db->insert_id();
        return $hotel_id;
    }
    public function hotel_select() {
	    $this->db->select('*');
        $this->db->from('hotel_tbl_hotels');
        $this->db->where('delflg',1);
        $this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query->result();
    }
    public function agent_select() {
	    $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->where('delflg',1);
        $this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query->result();
    }
    public function select_hotel_list($hotel_id){
    	$this->db->select('*');
    	$this->db->from('hotel_tbl_hotels');
    	$this->db->where('id',$hotel_id);
    	return $query=$this->db->get();

    }
    public function hotel_select_list()
	{    
		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_hotels.*,hotels_tbl_booking_invoice.*');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		$this->db->join('hotels_tbl_booking_invoice','hotels_tbl_booking_invoice.booking_id = hotel_tbl_booking.id');
		$this->db->where('hotel_tbl_booking.booking_flag',1);
        $this->db->where('hotel_tbl_booking.hotel_id',$id);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
	}
	public function hotel_booking_list_select($hotel_id,$from_date,$to_date){
       	$this->db->select('hotel_tbl_booking.*,COUNT(hotel_tbl_booking.hotel_id) AS book_count,hotel_tbl_hotels.*,hotel_tbl_booking.*,SUM(hotel_tbl_booking.normal_price) AS sum_price,SUM(hotel_tbl_booking.no_of_days) AS sum_day,SUM(hotel_tbl_booking.book_room_count) AS sum_room');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		if($hotel_id!=""){
			$this->db->where('hotel_tbl_hotels.id',$hotel_id);
		}
		$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_hotels.delflg',1);
		$this->db->group_by('hotel_tbl_booking.hotel_id');
		$this->db->order_by('hotel_tbl_booking.id','desc');
		$query=$this->db->get();
		return $query->result();
     }
     public function get_final_amount($hotel_id,$from_date,$to_date)
     {
     	$comp_total = 0;
     	$this->db->select('*');
     	$this->db->from('hotel_tbl_booking');
        // $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
        $this->db->where('hotel_tbl_booking.hotel_id',$hotel_id);
        $this->db->where('hotel_tbl_booking.booking_flag',1);
     	$this->db->where("hotel_tbl_booking.Created_Date BETWEEN '".$from_date."' AND '".$to_date."'");
     	$query=$this->db->get()->result();
     	foreach ($query as $key => $value) {
     		$board_amount = $this->Finance_Model->get_board_amount($value->id);
     		$general_amount = $this->Finance_Model->get_general_amount($value->id);
     		$extrabed_amount = $this->Finance_Model->get_extrabed_amount($value->id);
     		$individual_amount = $this->Finance_Model->get_individual_amount($value->id);
     		$total_amount = $board_amount + $general_amount + $extrabed_amount + $individual_amount;
     		$comp_total += $total_amount;
     	}
     	return $comp_total;
     }

	public function hotel_booking_list_first_select($bookingid,$from_date,$to_date){

		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,hotel_tbl_hotels.*');
        $this->db->from('hotel_tbl_booking');
        $this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
        $this->db->where('hotel_id',$bookingid);
        $this->db->where('booking_flag',1);
        $this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
        $this->db->order_by('hotel_tbl_booking.id','desc');
        //$this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query;
	   
		
	}
	public function booking_agent_list_select($agent_id,$from_date,$to_date){
		

		$this->db->select('hotel_tbl_booking.*,COUNT(hotel_tbl_booking.agent_id) AS book_count,hotel_tbl_agents.*,FinalAmountAgent.*,SUM(FinalAmountAgent.FinalTot) AS price,SUM(hotel_tbl_booking.no_of_days) AS sum_day,SUM(hotel_tbl_booking.book_room_count) AS sum_room');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
		$this->db->join('FinalAmountAgent','FinalAmountAgent.BookId=hotel_tbl_booking.id');
		$this->db->where('hotel_tbl_agents.id',$agent_id);
		if ($from_date!="" && $to_date!="") {
			$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
	     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
		}
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
        $this->db->group_by('hotel_tbl_booking.agent_id');
		$this->db->order_by('hotel_tbl_booking.id','desc');
	    $query=$this->db->get();
		return $query;
		
	}
	public function agent_booking_list_first_select($agent_id,$from_date,$to_date){
	   

		$this->db->select('hotel_tbl_booking.*,hotel_tbl_booking.booking_id AS booked,FinalAmountAgent.*,FinalAmountAgent.AgentTot AS price');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.agent_id');
		$this->db->join('FinalAmountAgent','FinalAmountAgent.BookId=hotel_tbl_booking.id');
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
		$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
        $this->db->where('hotel_tbl_booking.agent_id',$agent_id);
        // $this->db->where($where);
		$this->db->order_by('hotel_tbl_booking.id','desc');
	     $query=$this->db->get();
	   	// print_r($query->result());
		return $query;
	}
	
  	public function RoomNightReportFilter($request){

		$this->db->select(' hotel_tbl_booking.*, (STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y")) As Checkdate, hotel_tbl_booking.Created_Date As Createdate, DATEDIFF( STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y"), hotel_tbl_booking.Created_Date) As LeadTime, COUNT(DATEDIFF( STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y"), hotel_tbl_booking.Created_Date)) As noOfTrans');
    	$this->db->from('hotel_tbl_booking');
    	$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
    	$this->db->where('hotel_tbl_booking.booking_flag',1);
    	$this->db->where("hotel_tbl_booking.Created_Date >=",$request['from_date']);
    	$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) <=",$request['to_date']);
    	if (isset($request['ConSelect']) && $request['ConSelect']!=" Country ") {
			$this->db->like('hotel_tbl_hotels.location', $request['ConSelect']);
    	}
    	if (isset($request['state']) && $request['state']!="Select" && $request['state']!=" --State-- ") {
    		$this->db->like('hotel_tbl_hotels.location',$request['state']);
    	}
    	if (isset($request['city']) && $request['city']!="Select") {
    		$this->db->like('hotel_tbl_hotels.city',$_REQUEST['city']);
		}
    	$this->db->group_by('LeadTime');
        $query=$this->db->get();
       	return $query;
  
	}
  	public function SelectCountry() {

	    $this->db->select('*');
        $this->db->from('countries');
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectState($Conid){
    	$this->db->select('*');
        $this->db->from('states');
        $this->db->where('country_id',$Conid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectRoom($Roomid){
    	$this->db->select('*,hotel_tbl_hotel_room_type.id As roomz_id');
        $this->db->from('hotel_tbl_hotel_room_type');
    	$this->db->join('hotel_tbl_room_type','hotel_tbl_room_type.id = hotel_tbl_hotel_room_type.room_type');
        $this->db->where('hotel_tbl_hotel_room_type.hotel_id',$Roomid);
        $this->db->order_by('hotel_tbl_hotel_room_type.id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectContract($Contid){
    	$this->db->select('*');
        $this->db->from('hotel_tbl_contract');
        $this->db->where('hotel_id',$Contid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function CitySelect($stateid){
    	$this->db->select('*');
        $this->db->from('cities');
        $this->db->where('state_id',$stateid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectHotel() {

	    $this->db->select('*');
        $this->db->from('hotel_tbl_hotels');
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectAgent() {

	    $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function RoomNightReportFilter30Con($request){

		$this->db->select(' hotel_tbl_booking.*, (STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y")) As Checkdate, hotel_tbl_booking.Created_Date As Createdate, DATEDIFF( STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y"), hotel_tbl_booking.Created_Date) As LeadTime, COUNT(DATEDIFF( STR_TO_DATE(hotel_tbl_booking.check_in, "%m/%d/%Y"), hotel_tbl_booking.Created_Date)) As noOfTrans ');
    	$this->db->from('hotel_tbl_booking');
    	$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
    	$this->db->where('hotel_tbl_booking.booking_flag',1);
    	$this->db->where("hotel_tbl_booking.Created_Date >=",$request['from_date']);
    	$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) <=",$request['to_date']);
    	if (isset($request['ConSelect']) && $request['ConSelect']!=" Country ") {
			$this->db->like('hotel_tbl_hotels.location', $request['ConSelect']);
    	}
    	if (isset($request['state']) && $request['state']!="Select") {
    		$this->db->like('hotel_tbl_hotels.location',$request['state']);
    	}
    	if (isset($request['city']) && $request['city']!="Select") {
    		$this->db->like('hotel_tbl_hotels.city',$_REQUEST['city']);
		}
    	$this->db->group_by('LeadTime');
    	$this->db->limit(30); 
    	$this->db->order_by('noOfTrans','DESC'); 
        $query=$this->db->get();
       	return $query;
  
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
    public function getExtrabedDetails($book_id){
    $this->db->select('*');
    $this->db->from('BookingExtraBed');
    $this->db->where('bookID',$book_id);
    $query = $this->db->get();
    return $query->result();
	}
	public function  FinalAmountAdd($final_total,$BookId,$hotel_id){
		$this->db->select('*');
   	    $this->db->from('BookingFinalAmount');
   	    $this->db->where('BookId',$BookId);
   	    $this->db->where('HotelId',$hotel_id);
   	    $result = $this->db->get()->result();
   	    if (count($result)==0) {
			$data = array(
						'FinalTot' => $final_total,
					  	'BookId'   => $BookId,
					  	'HotelId'  => $hotel_id,
					);
			$this->db->insert('BookingFinalAmount',$data);
		} else {
			$data1 = array(
						'FinalTot' => $final_total,
					);
			 $this->db->where('BookId',$BookId);
			 $this->db->where('HotelId',$hotel_id);
			 $this->db->update('BookingFinalAmount',$data1);

		}
       
        return true;
	}
	public function BookingAmounttotal($hotel_id)
	{  

		$this->db->select('hotel_tbl_booking.*,hotel_tbl_hotels.*,BookingFinalAmount.*,SUM(BookingFinalAmount.FinalTot)As price');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id');
		$this->db->join('BookingFinalAmount','BookingFinalAmount.BookId=hotel_tbl_booking.id');

		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_hotels.delflg',1);
		$this->db->group_by('hotel_tbl_booking.hotel_id');
		$this->db->order_by('hotel_tbl_booking.id','desc');
		$query=$this->db->get();
		return $query;
		
	}
	public function get_board_amount($book_id) {
		$board = 0;
		$this->db->select('*');
		$this->db->from('hotel_tbl_bookingboard');
		$this->db->where('bookingID',$book_id);
		$query = $this->db->get()->result();
		if(count($query)!=0 && $query != "")
		{
			$net_adult_amount = $net_child_amount = 0;
			foreach ($query as $key => $value) 
			{
				$board_adult = $board_child = 0;
				$board_adult = $query[$key]->adultamount * $query[$key]->Breqadults;
				$board_child = array_sum(explode(",", $query[$key]->childAmount));
				$net_adult_amount += $board_adult;
				$net_child_amount += $board_child;
			}
			$board = $net_adult_amount + $net_child_amount;
		}
		return $board;
	}
    public function get_general_amount($book_id) {
		$general = 0;
		$this->db->select('*');
		$this->db->from('hotel_tbl_bookgeneralsupplement');
		$this->db->where('bookingID',$book_id);
		$query = $this->db->get()->result();
		if(count($query)!=0 && count($query)!="") 
		{
			$net_general_adult = $net_general_child = 0;
			foreach ($query as $key => $value) 
			{
				$general_adult = $general_child = 0;
				$general_adult = $query[$key]->gadultamount * $query[$key]->reqadults;
				$general_child = $query[$key]->gchildamount * $query[$key]->reqChild;
				$net_general_adult += $general_adult;
				$net_general_child += $general_child;
			}
			$general = $net_general_adult + $net_general_child;
		}
		return $general;
    }
    public function get_extrabed_amount($book_id){
		$extrabed = 0;
		$this->db->select('*');
		$this->db->from('BookingExtraBed');
		$this->db->where('bookID',$book_id);
		$query = $this->db->get()->result();
		if(count($query)!=0 && count($query)!="") 
		{ 
			$extrabed =0;
			foreach ($query as $key => $value)
			{
				$extrabed += $query[$key]->amount;
			}
		}
		return $extrabed;
  	}
  	public function get_individual_amount($book_id) {
		$ind_amount = 0;
		$this->db->select('*');
		$this->db->from('hotel_tbl_booking');
		$this->db->where('id',$book_id);
		$query = $this->db->get()->result();
		if(count($query)!=0 && count($query)!="") 
		{	
			$amount_explode = array();
			foreach ($query as $key => $value) 
			{
				$amount_explode = explode(",", $value->individual_amount);
			}
			$ind_amount = array_sum($amount_explode);
		}
		return $ind_amount*($query[0]->book_room_count);
  	}
  	public function get_agent_amount($id,$from_date,$to_date) {
  		$comp_total = $markup_total = 0;
  		$this->db->select('*');
		$this->db->from('hotel_tbl_booking');
		$this->db->where('agent_id',$id);
		if ($from_date!="" && $to_date!="") {
			$this->db->where("(STR_TO_DATE(check_in, '%m/%d/%Y')) >=",$from_date);
	     	$this->db->where("(STR_TO_DATE(check_out, '%m/%d/%Y')) <=",$to_date);
		}
		$query = $this->db->get()->result();
		if(count($query)!=0)
		{
			foreach ($query as $key => $value) 
			{	
				$total_amount = 0;
				$board_amount = $this->Finance_Model->get_board_amount($value->id);
	     		$general_amount = $this->Finance_Model->get_general_amount($value->id);
	     		$extrabed_amount = $this->Finance_Model->get_extrabed_amount($value->id);
	     		$individual_amount = $this->Finance_Model->get_individual_amount($value->id);
	     		$total_amount = $board_amount + $general_amount + $extrabed_amount + $individual_amount;
	     		$markup_total = ($total_amount * $value->agent_markup)/100;
	     		$comp_total += $markup_total;
			}
		}
		return $comp_total;
  	}
  	public function BookingReportList($request,$filter) {
  		$query = array();
  		$from_date = date('Y-m-d' ,strtotime($request['from_date']));
  		$to_date = date('Y-m-d' ,strtotime($request['to_date']));
  		$location1 = '';
  		$location2 = '';
  		$location3 = '';
  		$location4 = '';
  		$countryid = '';
  		if (isset($request['country_id']) && $request['country_id']!="") {
  			$countryid = $request['country_id'];
    	}
  		if (isset($request['ConSelect']) && $request['ConSelect']!=" Country ") {
  			$location1 = ' and b.location like "%'.$request['ConSelect'].'%"';
    	}
    	if (isset($request['state']) && $request['state']!="Select") {
  			$location2 = ' and b.location like "%'.$request['state'].'%"';
    	}
		if (isset($request['agent_id']) && $request['agent_id']!="") {
  			$location4 = ' and a.agent_id = "'.$request['agent_id'].'" ';
		}

		if ($request['state']=="" && $request['hotelid']=="") { 
		  if($filter==2){
		  	$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date)) as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  Created_Date between '".$from_date."' and '".$to_date."')'ROOMNIGHTTOTAL',c.name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b inner join states as c on b.state=c.id and c.country_id='".$countryid."' and a.hotel_id=b.id where a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.state")->result();
		  } else if($filter==1){
		  	$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',c.name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b inner join states as c  on b.state=c.id and c.country_id='".$countryid."' and a.hotel_id=b.id  where a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by c.name")->result();
		  } else if($filter==3){
		  	$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',c.name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b inner join states as c  on b.state=c.id and c.country_id='".$countryid."' and a.hotel_id=b.id  where a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by c.name")->result();

		  } 
		} else if($request['hotelid']==""){
			$stateid=$request['state'];
			if($filter==2){
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date)) as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  Created_Date between '".$from_date."' and '".$to_date."')'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b  on a.hotel_id=b.id where b.state='".$stateid."' and a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.hotel_name")->result();

			} else if($filter==1){
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on  a.hotel_id=b.id  where b.state='".$stateid."' and  a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by b.hotel_name")->result();

			} else if($filter==3) {
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on  a.hotel_id=b.id  where b.state='".$stateid."' and  a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by b.hotel_name")->result();
			}
		} else {
			$hotel_id=$request['hotelid'];
			if($filter==2) {
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date)) as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  Created_Date between '".$from_date."' and '".$to_date."')'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b  on a.hotel_id=b.id where b.id='".$hotel_id."' and a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' ".$location4." and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.hotel_name")->result();
			} else if($filter==1) {
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on  a.hotel_id=b.id  where b.id='".$hotel_id."' and  a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by b.hotel_name")->result();

			} else if($filter==3) {
				$query = $this->db->query("select max(datediff(STR_TO_DATE(a.check_in, '%m/%d/%Y'), a.created_date))  as AVERAGELEADDAYS, max(datediff(STR_TO_DATE(a.check_out, '%m/%d/%Y'), STR_TO_DATE(a.check_in, '%m/%d/%Y'))) as AVERAGELENGTHOFSTAY,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',(select sum(no_of_days) from hotel_tbl_booking a where a.booking_flag = '".$filter."' ".$location4." and  (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."'))'ROOMNIGHTTOTAL',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on  a.hotel_id=b.id  where b.id='".$hotel_id."' and  a.booking_flag='".$filter."' ".$location4." and (STR_TO_DATE(a.check_in,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."' OR  STR_TO_DATE(a.check_out,'%m/%d/%Y')  between '".$from_date."' and '".$to_date."') group by b.hotel_name")->result();

			}
		}
       // echo $this->db->last_query();
		return $query;
  	}
  	public function altUtlzReportList($request) {
  		$query = $this->db->query("SELECT * FROM hotel_tbl_allotement a inner join hotel_tbl_hotel_room_type b on a.room_id=b.id WHERE a.hotel_id = '".$request['hotel_id']."' AND allotement_date BETWEEN '".$request['from_date']."' AND  '".$request['to_date']."'");
  		// echo $this->db->last_query();exit();
  		return $query;
  	}
  	public function allotmentOutput($hotel_id,$room_id,$contract_id,$altdate,$agent) {
      // Allotment count get
	  $linkedRoomAllotment = 0;
	  $allotement = 0;
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
        $this->db->where('allotement_date',$altdate);
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
      $this->db->where('allotement_date',$altdate);
      $this->db->where('contract_id',$contract_id);
      $query=$this->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $allotement = $result[0]->allotement;
      } else {
        $allotement = $result1[0]->allotement;
      }

      // Booking count get
      $LRofcount = $this->overflowcount($hotel_id,$room_id,$altdate,$contract_id);
      $lcon_id = array();

      $date_split = explode("-", $altdate);
      if ($altdate=="") {
        $check_date = $altdate;
      } else {
        $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
      }

      $this->db->select('*');
      $this->db->from('hotel_tbl_contract');
      $this->db->where('hotel_id',$hotel_id);
      $this->db->where('contract_id',$contract_id);
      $contractType=$this->db->get()->result();
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
        $this->db->select('*');
        $this->db->from('hotel_tbl_contract');
        $this->db->where('hotel_id',$hotel_id);
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
      $this->db->where('agent_id',$agent);
      if (count($lcon_id)!=0) {
        $implodeContract = implode("','", $lcon_id);
        $where = "contract_id IN ('".$contract_id."','".$implodeContract."')";
        $this->db->where($where);
      } else {
        $this->db->where('contract_id',$contract_id);
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



       $return['booking'] =  $booking;
       $return['allotment'] =  $allotement;
       $return['balance'] =  $allotement-$booking;
       return $return;
  	}
  	public function overflowcount($hotel_id,$room_id,$date,$con_id) {
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
        $LRallotement =  $this->room_allotement_real($hotel_id,$LRquery[0]->id,$date,$con_id);

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
    public function NationalityReportList($request) {
  		$from_date 	= date('Y-m-d' ,strtotime($request['from_date']));
  		$to_date 	= date('Y-m-d' ,strtotime($request['to_date']));
  		$location1 = '';
  		if($request['ConSelect']=="" && $request['hotelid']=="") {
  			$query = $this->db->query("select c.name as NAME,b.hotel_name,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS' FROM `hotel_tbl_booking` a inner join `hotel_tbl_hotels` b inner join countries c on c.id=a.nationality and b.id=a.hotel_id where  a.Created_Date between '".$from_date."' and '".$to_date."' group by a.nationality ");	
  		} else if ($request['hotelid']=="") { 
  			$query = $this->db->query("select b.hotel_name as NAME,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS' FROM `hotel_tbl_booking` a inner join `hotel_tbl_hotels` b inner join countries c on c.id=a.nationality and b.id=a.hotel_id where  a.Created_Date between '".$from_date."' and '".$to_date."' and a.nationality='".$request['ConSelect']."' group by b.hotel_name");	
    	} else {
    		$query = $this->db->query("select b.hotel_name as NAME,count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS' FROM `hotel_tbl_booking` a inner join `hotel_tbl_hotels` b inner join countries c on c.id=a.nationality and b.id=a.hotel_id where  a.Created_Date between '".$from_date."' and '".$to_date."' and a.hotel_id='".$request['hotelid']."' and a.nationality='".$request['ConSelect']."' group by b.id");
    	}
		return $query;
  	}
  	public function availabilityFilterList($fromDate,$toDate,$state,$country){
    	$query = array();
    	$return = array();
    	$checkin_date=date_create($fromDate);
		$checkout_date=date_create($toDate);
		$no_of_days=date_diff($checkin_date,$checkout_date);
		$tot_days = $no_of_days->format("%a");
	    for($i = 0; $i <= $tot_days; $i++) {
	        $date = date('Y-m-d', strtotime($fromDate. ' + '.$i.'  days'));
	        $this->db->select('hotel_tbl_contract.hotel_id');
	        $this->db->from('hotel_tbl_contract');
	        $this->db->where('contract_flg',1);
	        $between = '"'.$date.'" BETWEEN from_date and to_date';
	        $this->db->where($between);
	     	// $this->db->where("to_date <=",$date);
	        $query[$i]=$this->db->get()->result();
	         $allhotel_id = array();
	        if (count($query[$i])!=0) {
	        	foreach ($query[$i] as $key => $value) {
	        		$allhotel_id[$key] = $value->hotel_id;
	        	}
	        	$hotel_id[$i] = array_unique($allhotel_id);
				$this->db->select('GROUP_CONCAT(hotel_tbl_hotels.id) as hotelId, count(hotel_tbl_hotels.id) as count,states.name');
				$this->db->from('hotel_tbl_hotels');
				$this->db->join('states','hotel_tbl_hotels.state=states.id','left');
				$this->db->where_in('hotel_tbl_hotels.id',$hotel_id[$i]);
				$this->db->where('hotel_tbl_hotels.state !=',"");
				if ($country!="") {
    				$this->db->where('hotel_tbl_hotels.country',$country);
    			}
				if ($state!="") {
    				$this->db->where('hotel_tbl_hotels.state',$state);
    			}
			    $this->db->where('hotel_tbl_hotels.delflg',1);
				$this->db->group_by('hotel_tbl_hotels.state');

				$query1[$i]=$this->db->get()->result();
				if (count($query1[$i])!=0) {
					foreach ($query1[$i] as $key1 => $value1) {
						$return['state'][] = $value1->name;
						$return['count'][] = $value1->count;
						$return['date'][] = $date;
						$return['hotelRoom'][] = $value1->hotelId;
	     //    		    $return['hotelRoom'][] =$hotelId;
					}
				}
		    }   
        }
        //$HotId=explode(",", $return['hotelRoom']);

        
        // print_r($return['hotelRoom']);
        // exit();
  		return $return;
  	}
  	public function GetRoomAva($hotelId,$date){
		$Exhotel_id = explode(",", $hotelId);
		$query = array();
		$bal = array();
		$closeCheck = array();
		foreach ($Exhotel_id as $key => $value) {
	        	$hotel_id[$key] = $value;
	    
			    $this->db->select('hotel_tbl_contract.hotel_id as hotel,hotel_tbl_contract.id as conId ,hotel_tbl_contract.contract_id as contract');
				$this->db->from('hotel_tbl_contract');
				$this->db->where('hotel_id', $hotel_id[$key]);
				$this->db->where('contract_type',"Main");
				$between = '"'.$date.'" BETWEEN from_date and to_date';
			    $this->db->where($between);
			    
				//$this->db->group_by('hotel_id');
				$query1 =$this->db->get()->result();
				foreach ($query1 as $key4 => $value4) {
					$this->db->select('hotel_tbl_hotel_room_type.id as roomId,hotel_tbl_hotel_room_type.hotel_id as HotId ');
					$this->db->from('hotel_tbl_hotel_room_type');
					$this->db->where('hotel_id', $value4->hotel);
					$query2 =$this->db->get()->result();

					foreach ($query2 as $key2 => $value2) {
						$bal[$key2] = $this->room_balance($value2->HotId,$value2->roomId,$date,$value4->contract);
	  					$closeCheck[$key2] = $this->closed_out_check($value2->HotId,$value2->roomId,$date,$value4->contract);
	  					if ($closeCheck[$key2]==1) {
	  						$bal[$key2] = 0;
	  					}
	  					if($closeCheck[$key2]==1) {
	  						$closeCheck[$key2] = 1;
	  						break;
	  					}
  					}


				}
				$Finalbal[$key] = array_sum($bal);
  				$FinalcloseCheck[$key4] = array_sum($closeCheck);
		}
		// print_r($Finalbal);
		$return['balance'] = array_sum($Finalbal);
		$return['stopSaleCount'] = array_sum($FinalcloseCheck);
		return $return;
		    

  	}
  	public function room_balance($hotel_id,$room_id,$date,$con_id) {
      $LRofcount = $this->overflowcount($hotel_id,$room_id,$date,$con_id);
      $ci =& get_instance();
      $linkedRoomAllotment = 0;

      $ci->db->select('allotement,linked_to_room_type');
      $ci->db->from('hotel_tbl_hotel_room_type');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('id',$room_id);
      $query1=$ci->db->get();
      $result1 = $query1->result();

      if ($result1[0]->linked_to_room_type!="" && $result1[0]->linked_to_room_type!=Null) {
        $ci->db->select('allotement');
        $ci->db->from('hotel_tbl_allotement');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('room_id',$result1[0]->linked_to_room_type);
        $ci->db->where('allotement_date',$date);
        $ci->db->where('contract_id',$con_id);
        $query3=$ci->db->get();
        $result3 = $query3->result();
        if (count($result3)!=0) {
          $linkedRoomAllotment = $result3[0]->allotement;
        } 
      }

      $lcon_id = array();
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_contract');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('contract_id',$con_id);
      $contractType=$ci->db->get()->result();
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Main") {
        $ci->db->select('*');
        $ci->db->from('hotel_tbl_contract');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('linkedContract',str_replace("CON0","",$con_id));
        $linkedcontract=$ci->db->get()->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 
      if (count($contractType)!=0 && $contractType[0]->contract_type=="Sub") {
        $ci->db->select('*');
        $ci->db->from('hotel_tbl_contract');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('linkedContract',str_replace("CON0","",$contractType[0]->linkedContract));
        $linkedcontract=$ci->db->get()->result();
        if (count($linkedcontract)!=0) {
          foreach ($linkedcontract as $key => $value) {
            if ($value->contract_type=="Sub") {
              $lcon_id[] = "CON0".$contractType[0]->linkedContract;
              $lcon_id[] = $value->contract_id;
            }
          }
        }
      } 

      $ci->db->select('*');
      $ci->db->from('hotel_tbl_contract');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('contract_id',$con_id);
      $linkedcontract=$ci->db->get()->result();
      if ($linkedcontract[0]->contract_type=="Sub") {
        $con_id = "CON0".$linkedcontract[0]->linkedContract;
      }

      $ci->db->select('allotement');
      $ci->db->from('hotel_tbl_allotement');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('room_id',$room_id);
      $ci->db->where('allotement_date',$date);
      $ci->db->where('contract_id',$con_id);
      $query=$ci->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $allotement = $result[0]->allotement;
      } else {
        
        $allotement = $result1[0]->allotement;
      }
      /*booking*/

      $date_split = explode("-", $date);
      if ($date=="") {
        $check_date = $date;
      } else {
        $check_date = $date_split[1]."/".$date_split[2]."/".$date_split[0];
      }


      $ci->db->select('*');
      $ci->db->from('hotel_tbl_booking');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('room_id',$room_id);
      if (count($lcon_id)!=0) {
        $implodeContract = implode("','", $lcon_id);
        $where = "contract_id IN ('".$con_id."','".$implodeContract."')";
        $ci->db->where($where);
      } else {
        $ci->db->where('contract_id',$con_id);
      }
      $ci->db->where('"'.$check_date.'" >= check_in');
      $ci->db->where('"'.$check_date.'" < check_out');
      $ci->db->where('booking_flag !=',0);
      $ci->db->where('booking_flag !=',3);
      $query2=$ci->db->get();
      $result2 = $query2->result();
        if (count($result2)!=0) {
            foreach ($result2 as $key => $value) {
                $room_count[] = $value->book_room_count;
            }
            $booking = array_sum($room_count);
        } else {
            $booking = 0;
        }
      
      return ($allotement+$linkedRoomAllotment)-($booking+$LRofcount);	
    }
    public function room_allotement_real($hotel_id,$room_id,$date,$con_id) {
      $ci =& get_instance();
      $linkedRoomAllotment = 0;

      $ci->db->select('allotement,linked_to_room_type');
      $ci->db->from('hotel_tbl_hotel_room_type');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('id',$room_id);
      $query1=$ci->db->get();
      $result1 = $query1->result();

      if ($result1[0]->linked_to_room_type!="" && $result1[0]->linked_to_room_type!=Null) {
        $ci->db->select('allotement');
        $ci->db->from('hotel_tbl_allotement');
        $ci->db->where('hotel_id',$hotel_id);
        $ci->db->where('room_id',$result1[0]->linked_to_room_type);
        $ci->db->where('allotement_date',$date);
        $ci->db->where('contract_id',$con_id);
        $query3=$ci->db->get();
        $result3 = $query3->result();
        if (count($result3)!=0) {
          $linkedRoomAllotment = $result3[0]->allotement;
        } 
      }

      $ci->db->select('*');
      $ci->db->from('hotel_tbl_contract');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('contract_id',$con_id);
      $linkedcontract=$ci->db->get()->result();
      if ($linkedcontract[0]->contract_type=="Sub") {
        $con_id = "CON0".$linkedcontract[0]->linkedContract;
      }
      $ci->db->select('allotement');
      $ci->db->from('hotel_tbl_allotement');
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('room_id',$room_id);
      $ci->db->where('allotement_date',$date);
      $ci->db->where('contract_id',$con_id);
      $query=$ci->db->get();
      $result = $query->result();
      if (count($result)!=0) {
        $allotement = $result[0]->allotement;
      } else {
        $allotement = $result1[0]->allotement;
      }
      return $allotement;
    }
  	public function closed_out_check($hotel_id,$room_id,$date,$con_id) {
      $output = "";
      $ci =& get_instance();
      $closedCheck = array();
      // $ci->db->select('*');
      // $ci->db->from('hotel_tbl_contract');
      // $ci->db->where('hotel_id',$hotel_id);
      // $ci->db->where('contract_id',$con_id);
      // $linkedcontract=$ci->db->get()->result();
      // if ($linkedcontract[0]->contract_type=="Sub") {
      //   $con_id = "CON0".$linkedcontract[0]->linkedContract;
      // }

      $ci->db->select('*');
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
            
      $ci->db->select('*');
      $ci->db->from('hotel_tbl_closeout_period');
      //$ci->db->where( $room_type_data[$key][$key1],$room_id);
      $ci->db->where('hotel_id',$hotel_id);
      $ci->db->where('closedDate',$date);
      $ci->db->where('contract_id',$con_id);
      // $ci->db->where('"'.$date.'" BETWEEN from_date AND to_date');
      $query1=$ci->db->get();
      $result1 = $query1->result();
      if (count($result1)!=0 && array_sum($closedCheck)!=0) {
        $output = 1;
      } else{
      	$output = 0;
      }
      return  $output;

    }
    public function AgentsalesReport($month,$year,$agent_id){
    	// if ($month!=11 && $month!=12 && $month!=10) {
    	// 	$month = '0'.$month;
    	// }
    	$this->db->select('hotel_tbl_hotels.hotel_name as hotel,hotel_tbl_booking.hotel_id,sum(hotel_tbl_booking.no_of_days) as room,GROUP_CONCAT(hotel_tbl_booking.id) as booking_id,hotel_tbl_agents.First_Name as firstname,hotel_tbl_agents.Last_Name as lastname,hotel_tbl_agents.id as agentId,GROUP_CONCAT(hotel_tbl_booking.id) as bkid,(hotel_tbl_booking.id) as book');
		$this->db->from('hotel_tbl_booking');
		$this->db->join('hotel_tbl_agents','hotel_tbl_agents.id = hotel_tbl_booking.Created_By','left');
		$this->db->join('hotel_tbl_hotels','hotel_tbl_hotels.id = hotel_tbl_booking.hotel_id','left');
		if($agent_id!='')
		{
		 $this->db->where('hotel_tbl_agents.id',$agent_id);
		}
		$this->db->where("month(STR_TO_DATE(hotel_tbl_booking.check_out,'%m/%d/%Y')) ",$month);
		$this->db->where("year(STR_TO_DATE(hotel_tbl_booking.check_out,'%m/%d/%Y')) ",$year);
		$this->db->where('hotel_tbl_booking.booking_flag',1);
		$this->db->where('hotel_tbl_agents.delflg',1);
		$this->db->where('hotel_tbl_hotels.delflg',1);
		// $this->db->group_by('hotel_tbl_booking.Created_Date');
		$this->db->group_by('hotel_tbl_booking.hotel_id');
       $this->db->group_by('hotel_tbl_booking.agent_id');
		// $this->db->order_by('hotel_tbl_booking.id','desc');
	    $query = $this->db->get();
	    // foreach ($query1[] as $key1 => $value1) {
					// 	$return['state'][] = $value1->name;
					// 	$return['count'][] = $value1->count;
					// 	$return['date'][] = $date;
					// 	$return['hotelRoom'][] = $value1->hotelId;
	    //  //    		    $return['hotelRoom'][] =$hotelId;
					// }
	   return $query;
	    // print_r($query);
	    // echo "<br>";
	    // print_r($query->result());
	 //exit();
    	
    }
    public function get_cancellation_terms($book_id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_bookcancellationpolicy');
      $this->db->where('hotel_tbl_bookcancellationpolicy.bookingId',$book_id);
      $this->db->order_by('hotel_tbl_bookcancellationpolicy.daysInAdvance','asc');
      $query=$this->db->get();
      return $query->result();
    }
    public function agent_booking_detail($book_id,$agent_id) {
      //$id = $this->session->userdata('agent_id');
      $this->db->select('hotel_tbl_booking.booking_id as bk_id,hotel_tbl_booking.*,hotel_tbl_hotels.*,hotel_tbl_hotel_room_type.*,hotel_tbl_room_type.*,hotel_tbl_agents.*,hotel_tbl_policies.*,hotel_tbl_booking.Created_Date as booking_date,hotel_tbl_booking.board as boardName');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_agents','hotel_tbl_booking.agent_id = hotel_tbl_agents.id', 'left');
      $this->db->join('hotel_tbl_policies','hotel_tbl_booking.hotel_id = hotel_tbl_policies.hotel_id', 'left');
      $this->db->where('hotel_tbl_booking.id',$book_id);
      $this->db->where('hotel_tbl_booking.agent_id',$agent_id);
     
      $query=$this->db->get()->result();
      return $query;
    } 
    public function TotcostGet($book_id){
		$data = $this->Payment_Model->agent_booking_detail($book_id);
		$board = $this->Payment_Model->board_booking_detail($book_id);
		$general = $this->Payment_Model->general_booking_detail($book_id);
		$cancelation =  $this->Payment_Model->get_cancellation_terms($book_id);
		$ExBed =  $this->Payment_Model->getExtrabedDetails($book_id);


		$book_room_count = $data[0]->book_room_count;
		$individual_amount = explode(",", $data[0]->individual_amount);
		$individual_discount = explode(",", $data[0]->individual_discount);
		$checkin_date=date_create($data[0]->check_in);
		$checkout_date=date_create($data[0]->check_out);
		$no_of_days=date_diff($checkin_date,$checkout_date);
		$tot_days = $no_of_days->format("%a");

		for ($i=1; $i <= $book_room_count; $i++) {
			for ($j=0; $j < $tot_days ; $j++) {
                $ExAmount[$j] = 0;
                $TExAmount[$j] = 0;
                $GAamount[$j] = 0;
                $GCamount[$j] = 0;
                $BAamount[$j] = 0;
                $BCamount[$j] = 0;
                $TBAamount[$j] = 0;
                $TBCamount[$j] = 0;
                // Room only Rate start
                if (!isset($individual_discount[$j])) {
                	$individual_discount[$j] = 0;
                }
                $roomAmount[$j] = $individual_amount[$j]-($individual_amount[$j]*$individual_discount[$j])/100;
                   
                // Room only Rate end
                // Extrabed list start
                if (count($ExBed)!=0) {
                    foreach ($ExBed as $Exkey => $Exvalue) {
                  		if ($Exvalue->date==date('Y-m-d', strtotime($data[0]->check_in. ' + '.$j.'  days'))) {
                            $exroomExplode = explode(",", $Exvalue->rooms);
                            $examountExplode = explode(",", $Exvalue->Exrwamount);
                            $exTypeExplode = explode(",", $Exvalue->Type);
                            foreach ($exroomExplode as $Exrkey => $EXRvalue) {
                              if ($EXRvalue==$i) { 

                                $ExAmount[$j] = $examountExplode[$Exrkey];

                                $TExAmount[$j] += $examountExplode[$Exrkey];
                      			} 
                      		} 
                  		} 
                  	} 
                }
                // Extrabed list end 
                // Adult and room General supplement list start
              	if (count($general)!=0) {
                    foreach ($general as $gskey => $gsvalue) {
                       if ($gsvalue->gstayDate==date('d/m/Y', strtotime($data[0]->check_in. ' + '.$j.'  days'))) {
                            $gsadultExplode = explode(",", $gsvalue->Rwadult);
                            $gsadultAmountExplode = explode(",", $gsvalue->Rwadultamount);
                            foreach ($gsadultExplode as $gsakey => $gsavalue) {
                              if ($gsavalue==$i) {
                                $GAamount[$j] = $gsadultAmountExplode[$gsakey];
                                } 
                              }

                          $gschildExplode = explode(",", $gsvalue->Rwchild);
                          $gschildAmountExplode = explode(",", $gsvalue->RwchildAmount);
                           foreach ($gschildExplode as $gsckey => $gscvalue) {
                                if ($gscvalue==$i) {
                                  $GCamount[$j] = $gschildAmountExplode[$gsckey];
                                }  
                            }

                        } 
                    } 
                }

                // Adult and room General supplement list end
                // Adults Board supplement list start

              	foreach ($board as $bkey => $bvalue) { 
                    if ($bvalue->stayDate==date('d/m/Y', strtotime($data[0]->check_in. ' + '.$j.'  days'))) {
						$ABRwadultexplode = explode(",", $bvalue->Rwadult);
						$ABRwadultamountexplode = explode(",", $bvalue->RwadultAmount);
                        foreach ($ABRwadultexplode as $ABRwkey => $ABRwvalue) {
                            if ($ABRwvalue==$i) {
                              $BAamount[$j] = $ABRwadultamountexplode[$ABRwkey];
                              $TBAamount[$j] += $BAamount[$j];
                        	} 
                        }
                    // Adults Board supplement list end
                    // Child Board supplement list start
                          $CBRwchildexplode = explode(",", $bvalue->Rwchild);
                          $CBRwchildamountexplode = explode(",", $bvalue->RwchildAmount);
                          foreach ($CBRwchildexplode as $CBRwkey => $CBRwvalue) {
                            if ($CBRwvalue==$i) {
                              $BCamount[$j] = $CBRwchildamountexplode[$CBRwkey];

                              $TBCamount[$j] += $BCamount[$j];

                            } 
                        }
                    } 
                }
                    // Child Board supplement list end

          	}

          	$total[$i] = array_sum($roomAmount)+array_sum($TExAmount)+array_sum($GAamount)+array_sum($GCamount)+array_sum($TBAamount)+array_sum($TBCamount);
		}
       return array_sum($total);
    }
    public function TotsellingGet($book_id) {
      $total = $this->Finance_Model->TotcostGet($book_id);
	  $data = $this->Payment_Model->agent_booking_detail($book_id);
      $total_markup = $data[0]->agent_markup+$data[0]->admin_markup+$data[0]->search_markup;
      return ($total*$total_markup)/100+$total;
    }
    public function TotmarginGet($book_id) {
      $total = $this->Finance_Model->TotcostGet($book_id);
	  $data = $this->Payment_Model->agent_booking_detail($book_id);
      $total_markup = $data[0]->agent_markup+$data[0]->admin_markup+$data[0]->search_markup;
      return ($total*$total_markup)/100;
    }
    public function SelectHotelBystate($stateid){
    	$this->db->select('*');
        $this->db->from('hotel_tbl_hotels');
        $this->db->where('state',$stateid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function BookingPatternReportList($request) {
  		$query = array();
  		$from_date = date('Y-m-d' ,strtotime($request['from_date']));
  		$to_date = date('Y-m-d' ,strtotime($request['to_date']));
  		$countryid = '';
  		if (isset($request['country_id']) && $request['country_id']!="") {
  			$countryid = $request['country_id'];
    	}
		if ($request['state']=="" && $request['hotelid']=="") { 
		  	$query = $this->db->query("select count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',c.name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b inner join states as c on b.state=c.id and c.country_id='".$countryid."' and a.hotel_id=b.id where a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.state")->result();
		}else if ($request['hotelid']=="") { 
			$stateid = $request['state'];
		  	$query = $this->db->query("select count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on a.hotel_id=b.id where b.state='".$stateid."' and  a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.hotel_name")->result();
		} else{
			$hotel_id = $request['hotelid'];
			$query = $this->db->query("select count(a.id) as TOTALCOUNT,sum(a.no_of_days*a.book_room_count) 'TOTALROOMNIGHTS',b.hotel_name as NAME FROM `hotel_tbl_booking` as a inner join `hotel_tbl_hotels` as b on a.hotel_id=b.id where a.hotel_id='".$hotel_id."' and  a.booking_flag !='3' and a.booking_flag !='5' and a.booking_flag !='4' and a.booking_flag !='8' and  a.Created_Date between '".$from_date."' and '".$to_date."' group by b.hotel_name")->result();
		}
        //echo $this->db->last_query();
		return $query;
  	}
  	public function SelectHotelByCountry($conid){
    	$this->db->select('*');
        $this->db->from('hotel_tbl_hotels');
        $this->db->where('country',$conid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function getRooms($hotel_id) {
  		$query = $this->db->query("SELECT * FROM hotel_tbl_hotel_room_type WHERE hotel_id = '".$hotel_id."'");
  		return $query;
  	}
  	public function utilizationAlotfun($room_id,$ndate,$hotel_id) {
  		$query = $this->db->query("select IFNULL(sum(b.allotement),0) as allotement from hotel_tbl_contract a inner join hotel_tbl_allotement  b on a.contract_id=b.contract_id where b.room_id = '$room_id' and b.allotement_date='$ndate' and b.hotel_id='$hotel_id' and a.contract_flg='1' and contract_type='Main' and  '$ndate' between a.from_date and a.to_date");
  		return $query->result();

  	}
  	public function utilizedAlotfun($room_id,$ndate) {
  		$query = $this->db->query("select IFNULL(sum(book_room_count),0) as utilized from hotel_tbl_booking where room_id = '$room_id' and Created_Date='$ndate' and booking_flag!='3' and booking_flag!='5'");
  		return $query->result();

  	}
}

