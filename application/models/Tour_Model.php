<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_supplier($data) {
    	$this->db->insert('tour_suppliers',$data);
    	return $this->db->insert_id();
    }
    public function details_select() {
		$this->db->select('*');
		$this->db->from('tour_suppliers');
  	    $query=$this->db->get();
		return $query;
	}
	public function supplier_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('tour_suppliers');
      $final= $query->result();
      return $final;
    }
   	public function supplier_details($id) {
		$this->db->select('*');
		$this->db->from('tour_suppliers');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function update_supplier($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("tour_suppliers",$data);
		return $id;
	}
	public function delete_supplier($id) {
		$this->db->where('id',$id);
		$this->db->delete('tour_suppliers');
		return true;
	}	
	public function contract_details_select() {
		$this->db->select('*');
		$this->db->from('tour_contracts');
  	    $query=$this->db->get();
		return $query;
	}
	public function suppliers_select() {
		$this->db->select('*');
		$this->db->from('tour_suppliers');
  	    $query=$this->db->get()->result();
		return $query;
	}
	public function get_supplier_detail($id) {
		$this->db->select('*');
		$this->db->from('tour_suppliers');
		$this->db->where('id',$id);
  	    $query=$this->db->get()->result();
		return $query;
	}
	public function add_contract($data) {
    	$this->db->insert('tour_contracts',$data);
    	return $this->db->insert_id();
    }
    public function update_contract($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("tour_contracts",$data);
		return $id;
	}
	public function contractStatus($id,$status) {
		$data= array( 
			 'status' 	  => $status,
			);
		$this->db->where('id',$id);
		$this->db->update('tour_contracts',$data);
		return true;
	}
	public function contract_details($id) {
		$this->db->select('*');
		$this->db->from('tour_contracts');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_contract($id) {
		$this->db->where('id',$id);
		$this->db->delete('tour_contracts');
		$this->db->where('contract_id',$id);
		$this->db->delete('tour_contract_policies');
		$this->db->where('contract_id',$id);
		$this->db->delete('tour_contract_conditions');
		return true;
	}	
	public function policy_details_select($id) {
		$this->db->select('*');
		$this->db->from('tour_contract_policies');
		$this->db->where('contract_id',$id);
		$query=$this->db->get();
		return $query;
	}
	public function add_policy($data) {
    	$this->db->insert('tour_contract_policies',$data);
    	return $this->db->insert_id();
    }
    public function update_policy($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("tour_contract_policies",$data);
		return $id;
	}
	public function policy_details($id) {
		$this->db->select('*');
		$this->db->from('tour_contract_policies');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_policy($id) {
		$this->db->where('id',$id);
		$this->db->delete('tour_contract_policies');
		return true;
	}	
	public function condition_details_select($id) {
		$this->db->select('*');
		$this->db->from('tour_contract_conditions');
		$this->db->where('contract_id',$id);
		$query=$this->db->get();
		return $query;
	}
	public function add_condition($data) {
    	$this->db->insert('tour_contract_conditions',$data);
    	return $this->db->insert_id();
    }
    public function update_condition($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("tour_contract_conditions",$data);
		return $id;
	}
	public function condition_details($id) {
		$this->db->select('*');
		$this->db->from('tour_contract_conditions');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_condition($id) {
		$this->db->where('id',$id);
		$this->db->delete('tour_contract_conditions');
		return true;
	}	
	public function types_select() {
		$this->db->select('*');
		$this->db->from('tbl_tour_types');
  	    $query=$this->db->get()->result();
		return $query;
	}
	public function contract_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('tour_contracts');
      $final= $query->result();
      return $final;
    }
    public function get_tour_type($id) {
		$this->db->select('*');
		$this->db->from('tbl_tour_types');
		$this->db->where('id',$id);
  	    $query=$this->db->get()->result();
		return $query;
	}
	public function tour_typeIdget($tour) {
		if (is_numeric($tour)) {
			$return = $tour;
		} else {
			$this->db->select('id');
			$this->db->from('tbl_tour_types');
			$this->db->where('type',$tour);
	  	    $query=$this->db->get()->result();
	  	    if (count($query)!=0) {
				$return = $query[0]->id;
	  	    } else {
	  	    	$data = ['type' => $tour];
	  	    	$this->db->insert('tbl_tour_types',$data);
	  	    	$return = $this->db->insert_id();
	  	    }
		}
		return $return;
	}
	public function service_details_select() {
		$this->db->select('a.*,b.name as countryName,c.CityName');
		$this->db->from('tbl_tour_types a');
		$this->db->join('countries b','b.id = a.countryId','inner');
		$this->db->join('xml_city_tbl c','c.id = a.cityId','inner');
		$query=$this->db->get();
		return $query;
	}
	public function add_service($data) {
    	$this->db->insert('tbl_tour_types',$data);
    	return $this->db->insert_id();
    }
    public function update_service($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("tbl_tour_types",$data);
		return $id;
	}
	public function service_details($id) {
		$this->db->select('*');
		$this->db->from('tbl_tour_types');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_service($id) {
		$this->db->where('id',$id);
		$this->db->delete('tbl_tour_types');
		return true;
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
    public function SelectCity($Conid){
    	$this->db->select('*');
        $this->db->from('states');
        $this->db->where('country_id',$Conid);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function SelectXmlCity($concode){
    	$this->db->select('*');
        $this->db->from('xml_city_tbl');
        $this->db->where('CountryCode',$concode);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function toursearchprocess($request) {
	    $destination = $request['cityId'];
	    $from_date = date('Y-m-d',strtotime($request['arrivaldate']));	   
	    $from = date_create($from_date);
	    $query = $this->db->query("select a.*,b.* from tbl_tour_types a inner join tour_contracts b on a.id=b.tour_type where IFNULL(FIND_IN_SET('".$from_date."',b.BlackOut),0) =0 and a.cityId='".$destination."' and '".$from_date."' > b.valid_from and '".$from_date."' < b.valid_to")->result();   
	    return $query;
  	}
 	public function SearchTourListDataFetchcount() {
 		if(isset($_REQUEST['serviceType'])&&($_REQUEST['serviceType']!='')){
	    	$service = ' a.type like "%'.$_REQUEST['serviceType'].'%" and';
	    }
	    else {
	    	$service = "";
	    }
	    $expPrice = explode(";", $_REQUEST['price']);
	    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
	    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
	    $adult_count = array_sum($_REQUEST['adults']);
	    $child_count = array_sum($_REQUEST['Child']);
	    $destination = $_REQUEST['cityId'];
	    $from_date = date('Y-m-d',strtotime($_REQUEST['arrivaldate']));
	    $from = date_create($from_date);
	    $query = $this->db->query("select a.*,b.*,(".$adult_count." * b.adult_selling) as price1,(".$child_count." * b.child_selling) as price2 from tbl_tour_types a inner join tour_contracts b on a.id=b.tour_type where ".$service." b.status = 1 and IFNULL(FIND_IN_SET('".$from_date."',b.BlackOut),0) =0 and a.cityId='".$destination."'  and '".$from_date."' > b.valid_from and '".$from_date."' < b.valid_to having  (price1+price2)>'".$price1."' and (price1+price2)<'".$price2."'")->result();   
	    return count($query);
  	}
  	public function SearchTourListDataFetch($limit,$start) {
	    $expPrice = explode(";", $_REQUEST['price']);
	    $price1 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[0]) ));
	    $price2 = floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),$expPrice[1]) ));
	    if($_REQUEST['name_order']==2) {
	      //$order =  ', a.type desc';
	    	$order = 'desc';
	    } else {
	     // $order =  ', a.type asc';
	    	$order = 'asc';
	    }
	    if($_REQUEST['price_order']==2) {
	     // $order1 =  ' order by (price1+price2) desc';
	      $order1 = 'desc';
	    } else {
	      //$order1 =  ' order by (price1+price2) asc';
	    	$order1 = 'asc';
	    }
	    if(isset($_REQUEST['serviceType'])&&($_REQUEST['serviceType']!='')){
	    	$service = ' a.type like "%'.$_REQUEST['serviceType'].'%" and';
	    }
	    else {
	    	$service = "";
	    }
	    $adult_count = array_sum($_REQUEST['adults']);
	    $child_count = array_sum($_REQUEST['Child']);
	    $destination = $_REQUEST['cityId'];
	    $from_date = date('Y-m-d',strtotime($_REQUEST['arrivaldate']));
	    $from = date_create($from_date);	   

	    $child1Age = isset($_REQUEST['room1childAge'][0]) ? $_REQUEST['room1childAge'][0] : 0;
	    $child2Age = isset($_REQUEST['room1childAge'][1]) ? $_REQUEST['room1childAge'][1] : 0;
	    $child3Age = isset($_REQUEST['room1childAge'][2]) ? $_REQUEST['room1childAge'][2] : 0;
	    $child4Age = isset($_REQUEST['room1childAge'][3]) ? $_REQUEST['room1childAge'][3] : 0;

	    $this->db->select("a.*,b.*,b.id as contractid,(".$adult_count." * b.adult_selling) as price1,(".$child_count." * b.child_selling) as price2,IF(".$child1Age."=0,0,IF(b.max_childAge < ".$child1Age.",1,0)) as child1");
	    $this->db->from('tbl_tour_types a');
	    $this->db->join('tour_contracts b','a.id=b.tour_type','inner');
	    $this->db->like('a.type',$_REQUEST['serviceType']);
	    $this->db->where("IFNULL(FIND_IN_SET('".$from_date."',b.BlackOut),0)",0);
	    $this->db->where(array('b.status'=>1,'a.cityid'=>$destination,'b.valid_from <' => $from_date,'b.valid_to >'=>$from_date));
	    $this->db->having(array('(price1+price2)>'=>$price1,'(price1+price2)<'=>$price2));
	    $this->db->order_by('(price1+price2)',$order1);
	    $this->db->order_by('a.type',$order);
	    $this->db->limit($limit,$start);
	    $query = $this->db->get()->result();
	    return $query;
	    // $query = $this->db->query("select a.*,b.*,b.id as contractid,(".$adult_count." * b.adult_selling) as price1,(".$child_count." * b.child_selling) as price2 from tbl_tour_types a inner join tour_contracts b on a.id=b.tour_type where ".$service." b.status = 1 and a.cityId='".$destination."'  and '".$from_date."' > b.valid_from and '".$from_date."' < b.valid_to having  (price1+price2)>'".$price1."' and (price1+price2)<'".$price2."' ".$order1.$order." limit ".$start." , ".$limit." " )->result();
	    // return $query;
  	}
  	public function gettourdetails($conid,$tourid) {
	    $query = $this->db->query("select a.*,b.*,b.id as tourid,c.name as country,d.CityName as city from tour_contracts a inner join tbl_tour_types b inner join countries c inner join xml_city_tbl d on a.tour_type=b.id and b.countryId=c.id  and b.cityId=d.id where a.id=".$conid."")->result();
	    return $query;
  	}
  	public function getcontractpolicies($id) {
	    $this->db->select('*');
	    $this->db->from('tour_contract_policies');
	    $this->db->where('contract_id',$id);
	    $query = $this->db->get()->result();
	    return $query;
 	}
  	public function getcontractconditions($id) {
	    $this->db->select('*');
	    $this->db->from('tour_contract_conditions');
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
    public function getNationality() {
	  	$this->db->select("*");
	  	$this->db->from("countries");
	  	return $query = $this->db->get()->result();
	}
	public function max_booking_id() {
        $this->db->select_max('id');
        $this->db->from('tour_tbl_booking');
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
    public function tour_booking_add($request,$max_booking_id,$agent_currency_type,$total_amount,$total_cost,$adult_selling,$adult_cost,$child_selling,$child_cost,$admin_markup,$agent_markup) {
        if ($request['RequestType']=='Book') {
          $booking_flag = 2;
        } else {
          $booking_flag = 8;
        }
        $arrivaldate=date_create($request['arrivaldate']);
        if (isset($request['room1-childAge'])) {
          $room1childAge = implode(",", $request['room1-childAge']);
        } else {
          $room1childAge ='';
        }
        if (isset($request['first_name'])) {
          $request['first_name'] = $request['first_name'];
          $request['last_name'] = $request['last_name'];
        } else {
          $request['first_name'] = "";
          $request['last_name'] = "";
        }
        $datas= array(
        		  'nationality' => $request['nationality'],
                  'booking_flag' => $booking_flag,
                  'booking_id' =>$max_booking_id,
                  'tour_id' =>$request['tourid'],
                  'total_amount' =>$total_amount,
                  'currency_type' =>$agent_currency_type,
                  'adults_count' =>$request['adults'],
                  'childs_count' =>$request['childs'],
                  'arrivaldate' => $request['arrivaldate'],
                  'agent_id' =>  $this->session->userdata('agent_id'),
                  'bk_contact_fname' => $request['first_name'],
                  'bk_contact_lname' => $request['last_name'],
                  'bk_contact_email' => $request['email'],
                  'bk_contact_number' => $request['contact_num'],
                  'contract_id' => $request['contractid'],
                  'ChildAge' => $room1childAge,
                  'SpecialRequest' => $request['SpecialRequest'],
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  $this->session->userdata('agent_id'),
                  'total_cost' => $total_cost,
                  'adult_cost' => $adult_cost,
                  'adult_selling' => $adult_selling,
                  'child_cost' =>$child_cost,
                  'child_selling' => $child_selling,
                  'admin_markup' => $admin_markup,
                  'agent_markup' => $agent_markup
                );
        $this->db->insert('tour_tbl_booking',$datas);
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
		            'tour_id'          => $request['tourid'],
		            'agent_id'          => $this->session->userdata('agent_id'),
		            'booking_id'        => $book_id,
		            'rejected'          => 2,
		            'notification_date' => $date,
		            'notification_type' => 'booked',
		            'notification_msg' => 'You have new booking Request');
		$this->db->insert('hotel_tbl_notification',$data);

      	$datas1 = array('user_id' => $implode,
                'notification_type' => 'tour_booking_request');

      	$this->db->insert('hotel_tbl_notifications_list',$datas1);

        return $book_id;
    }
    public function tour_booking_list($filter) {
    	$this->db->select('a.id as bookId,a.*,b.type,b.duration,b.durationType');
    	$this->db->from('tour_tbl_booking a');
    	$this->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
    	$this->db->where('a.booking_flag',$filter);
    	$this->db->where('a.agent_id',$this->session->userdata('agent_id'));
    	$this->db->order_by('a.id','desc');
    	$result = $this->db->get();
    	return $result;
    }
    public function tour_booking_details($id) {
    	$this->db->select('a.*,b.type,b.duration,b.durationType,b.image,c.name as countryName,d.CityName');
    	$this->db->from('tour_tbl_booking a');
    	$this->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
    	$this->db->join('countries c','c.id=b.countryId','inner');
    	$this->db->join('xml_city_tbl d','d.id=b.cityId','inner');
    	$this->db->where('a.id',$id);
    	$this->db->where('a.agent_id',$this->session->userdata('agent_id'));
    	$result = $this->db->get()->result();
    	return $result;
    }
    public function getcancellationpolicies($request) {
    	$from_date = date('Y-m-d',strtotime($_REQUEST['arrivaldate']));
	    $this->db->select('*');
	    $this->db->from('tour_contract_policies');
	   	$this->db->where(array('contract_id'=>$request['contractid'],'from_date <'=>$from_date,'to_date >'=>$from_date));
	    $query = $this->db->get()->result();
	    return $query;
 	}
 	public function addCancellationBooking($booking_id,$cancellationId,$from_date,$to_date,$cancel_percent,$from_day,$to_day,$msg) {
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
        $this->db->insert('tour_tbl_bookcancellationpolicy',$datas);
    	return true;
  	}
  	public function addConditionsBooking($booking_id,$conditionId,$conditions) {
      $datas= array(
                  'bookingId'               =>$booking_id,
                  'condition'               =>$conditions,
                  'conditionId'             =>$conditionId,
                  'createdDate'             => date('Y-m-d'),
                  'createdBy'               =>  $this->session->userdata('agent_id'),
                );
        $this->db->insert('tour_tbl_bookconditions',$datas);
    	return true;
  	}
   	public function gettourbookcondition($id) {
		$this->db->select('*');
		$this->db->from('tour_tbl_bookconditions');
		$this->db->where('bookingId',$id);
		$query = $this->db->get()->result();
		return $query;
  	}
  	public function gettourbookpolicy($id) {
		$this->db->select('*');
		$this->db->from('tour_tbl_bookcancellationpolicy');
		$this->db->where(array('bookingId'=>$id));
		$query = $this->db->get()->result();
		return $query;
  	}
  	public function CancellationTourBookingUpdate($id) {
	    $array = array(
	              'cancelled_date' => date('Y-m-d H:i:s'),
	              'cancelled_by' => $this->session->userdata('agent_name'),
	              'booking_flag' => 3,
	            );
	    $this->db->where('id',$id);
	    $this->db->update('tour_tbl_booking',$array);

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
	                'notification_type' => 'tour_booking_cancelled');

	    $this->db->insert('hotel_tbl_notifications_list',$datas1);
	    return true;
  	}
  	public function tour_booking_detail($id) {
	    $this->db->select('a.id as bookid,a.*,b.type,b.duration,b.durationType,b.image,c.name as countryName,d.CityName,e.First_Name as AFName,e.Last_Name as ALName,e.Mobile,e.Email');
	    $this->db->from('tour_tbl_booking a');
	    $this->db->join('tbl_tour_types b','b.id=a.tour_id','inner');
	    $this->db->join('countries c','c.id=b.countryId','inner');
	    $this->db->join('xml_city_tbl d','d.id=b.cityId','inner');
	    $this->db->join('hotel_tbl_agents e','e.id=a.agent_id','inner');
	    $this->db->where('a.id',$id);
	    $result = $this->db->get()->result();
	    return $result;
  	} 
  	public function add_Multipleservice($id,$request) {
  		$this->db->where('ServiceID',$id);
		$this->db->delete('tour_tbl_multiServices');

		foreach ($request['Services'] as $key => $value) {
			$data = array(
						'Services' => $value, 
						'FromTime' => $request['FromTiming'][$key], 
						'ToTime' => $request['ToTiming'][$key],  
						'ServiceID' => $id,  
				);
			$this->db->insert('tour_tbl_multiServices',$data);
		}
		return true;
  	}
  	public function multipleServices($id) {
  		$this->db->select('*');
		$this->db->from('tour_tbl_multiServices');
  		$this->db->where('ServiceID',$id);
  		$query = $this->db->get()->result();
  		return $query;
  	}	
  	public function multiserviceBook_add($book_id,$date,$Service,$FromTime,$ToTime) {
  		$data = array(
			'booking_id' => $book_id, 
			'tourDate' => $date, 
			'services' => $Service, 
			'FromTime' => $FromTime, 
			'ToTime' => $ToTime, 
		);
		$this->db->insert('tour_tbl_multiservicebooking',$data);
		return true;
  	}
  	public function gettourbookmultiservice($id) {
	    $this->db->select('*');
	    $this->db->from('tour_tbl_multiservicebooking');
	    $this->db->where('booking_id',$id);
	    $query = $this->db->get()->result();
	    return $query;
	}
	public function getcontracts($id) {
	    $this->db->select('*');
	    $this->db->from('tour_contracts');
	    $this->db->where('tour_type',$id);
	    $query = $this->db->get()->result();
	    return $query;
  	}
  	public function all_details($request) {
  		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $totalMarup = $agentMarkup+$adminMarkup;
	    $adult_count = array_sum($_REQUEST['adults']);
	    $child_count = array_sum($_REQUEST['Child']);
	    $from_date = date('Y-m-d',strtotime($_REQUEST['arrivaldate']));
	    $from = date_create($from_date);	   

	    $child1Age = isset($_REQUEST['room1-childAge'][0]) ? $_REQUEST['room1-childAge'][0] : 0;
	    $child2Age = isset($_REQUEST['room1-childAge'][1]) ? $_REQUEST['room1-childAge'][1] : 0;
	    $child3Age = isset($_REQUEST['room1-childAge'][2]) ? $_REQUEST['room1-childAge'][2] : 0;
	    $child4Age = isset($_REQUEST['room1-childAge'][3]) ? $_REQUEST['room1-childAge'][3] : 0;

	    $this->db->select("a.*,b.*,b.id as contractid,((((".$adult_count." * b.adult_selling + ".$child_count." * b.child_selling) * ".$totalMarup." )/100) + (".$adult_count." * b.adult_selling + ".$child_count." * b.child_selling)) as totalamount,IF(".$child1Age."=0,0,IF(b.max_childAge < ".$child1Age.",1,0)) as child1");
	    $this->db->from('tbl_tour_types a');
	    $this->db->join('tour_contracts b','a.id=b.tour_type','inner');
	    $this->db->where("IFNULL(FIND_IN_SET('".$from_date."',b.BlackOut),0)",0);
	    $this->db->where(array('b.status'=>1,'a.cityid'=>$_REQUEST['cityId'],'b.valid_from <' => $from_date,'b.valid_to >'=>$from_date));
	    $query = $this->db->get()->result();
	    return $query;
	    // $query = $this->db->query("select a.*,b.*,b.id as contractid,(".$adult_count." * b.adult_selling) as price1,(".$child_count." * b.child_selling) as price2 from tbl_tour_types a inner join tour_contracts b on a.id=b.tour_type where ".$service." b.status = 1 and a.cityId='".$destination."'  and '".$from_date."' > b.valid_from and '".$from_date."' < b.valid_to having  (price1+price2)>'".$price1."' and (price1+price2)<'".$price2."' ".$order1.$order." limit ".$start." , ".$limit." " )->result();
	    // return $query;
  	}
}