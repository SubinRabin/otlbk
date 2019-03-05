<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents_Model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data,$agent_id) {
      if ($data['password']=="") {
        $data['password'] = "welcomeagent";
      }
        $datas= array(
                  'Agent_Code' =>$agent_id,
                  'First_Name' =>$data['first_name'],
                  'Last_Name' =>$data['last_name'],
                  'Mobile' =>$data['phone'],
                  'Phone_Num' =>$data['telephone'],
                  'Address' =>$data['address'],
                  'Date_Of_Birth' =>$data['date'],
                  'Sex' =>$data['sex'],
                  'password' =>md5($data['password']),
                  'City' =>$data['city'],
                  'Country' =>$data['country'],
                  'Credit_amount' =>$data['credit'],
                  'Agency_Name' =>$data['agency_name'],
                  'Email' =>$data['email'],
                  'Iata_Status' =>$data['iata_status'],
                  'Iata_Reg_Number' =>$data['iata_reg'],
                  'Designation' =>$data['designation'],
                  'Nature_Business' =>$data['nature_business'],
                  'Business_Type' =>$data['business_type'],
                  'Preferred_Currency' =>$data['preferred_currency'],
                  'Pincode' =>$data['pincode'],
                  'Fax' =>$data['fax'],
                  'Website' =>$data['website'],
                  'Markup' =>$data['markup'],
                  'general_markup' =>$data['gen_markup'],
                  'Username' =>$data['username'],
                  'First_Name_Accounts' =>$data['first_name_accounts'],
                  'First_Name_Reservation' =>$data['first_name_reservation'],
                  'First_Name_Management' =>$data['first_name_management'],
                  'Email_Accounts' =>$data['email_accounts'],
                  'Email_Reservation' =>$data['email_reservation'],
                  'Email_Management' =>$data['email_management'],
                  'Number_Accounts' =>$data['number_accounts'],
                  'Number_Reservation' =>$data['number_reservation'],
                  'Number_Management' =>$data['number_management'],
                  // 'profile_image' => $profile_pic,
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  $this->session->userdata('id'),
                );
        $this->db->insert('hotel_tbl_agents',$datas);
        $agent_id = $this->db->insert_id();
        return $agent_id;
    }
    public function select($filter)
    {    
        $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->where('delflg',$filter);
        $this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query;
    }
    public function delete_agent($id)
    {
        $data = array('delflg' => '0');
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_agents',$data);
        return true;
    }
    public function update($data,$id)
    {
      // print_r($data['date']);
      // exit();
      // if (isset($data['date'])) {
      //   $data['date'] = date('d/m/Y' ,strtotime($data['date']));
      // }
      if (isset($data['password']) && $data['password']!="") {
        $data= array(
                  'First_Name'                  =>$data['first_name'],
                  'Last_Name'                   =>$data['last_name'],
                  'Mobile'                      =>$data['phone'],
                  'Phone_Num'                   =>$data['telephone'],
                  'Date_Of_Birth'               =>$data['date'],
                  'Sex'                         =>$data['sex'],
                  'password'                    =>md5($data['password']),
                  'City'                        =>$data['city'],
                  'Country'                     =>$data['country'],
                  'Credit_amount'               =>$data['credit'],
                  'Email'                       =>$data['email'],
                  'Address'                     =>$data['address'],
                  'Markup'                      =>$data['markup'],
                  'general_markup'              =>$data['gen_markup'],
                  'Agency_Name'                 =>$data['agency_name'],
                  // 'Agent_Code' =>$data['agency_code'],
                  'Designation'                 =>$data['designation'],
                  'Iata_Status'                 =>$data['iata_status'],
                  'Iata_Reg_Number'             =>$data['iata_reg'],
                  'Nature_Business'             =>$data['nature_business'],
                  'Business_Type'               =>$data['business_type'],
                  'Preferred_Currency'          =>$data['preferred_currency'],
                  'Pincode'                     =>$data['pincode'],
                  'Fax'                         =>$data['fax'],
                  'Website'                     =>$data['website'],
                  'Username'                    =>$data['username'],
                  'First_Name_Accounts'         =>$data['first_name_accounts'],
                  'First_Name_Reservation'      =>$data['first_name_reservation'],
                  'First_Name_Management'       =>$data['first_name_management'],
                  'Email_Accounts'              =>$data['email_accounts'],
                  'Email_Reservation'           =>$data['email_reservation'],
                  'Email_Management'            =>$data['email_management'],
                  'Password_Accounts'           =>md5($data['password_accounts']),
                  'Password_Reservation'        =>md5($data['password_reservation']),
                  'Password_Management'         =>md5($data['password_management']),
                  'accounts_password'           =>$data['password_accounts'],
                  'reservation_password'        =>$data['password_reservation'],
                  'management_password'         =>$data['password_management'],
                  'Number_Accounts'             =>$data['number_accounts'],
                  'Number_Reservation'          =>$data['number_reservation'],
                  'Number_Management'           =>$data['number_management'],
                  'Updated_Date'                => date('Y-m-d'),
                  'Updated_By'                  =>  $this->session->userdata('id'),);
      } else {
        $data= array(
                  'First_Name'                  =>$data['first_name'],
                  'Last_Name'                   =>$data['last_name'],
                  'Mobile'                      =>$data['phone'],
                  'Phone_Num'                   =>$data['telephone'],
                  'Date_Of_Birth'               =>$data['date'],
                  'Sex'                         =>$data['sex'],
                  'City'                        =>$data['city'],
                  'Country'                     =>$data['country'],
                  'Credit_amount'               =>$data['credit'],
                  'Email'                       =>$data['email'],
                  'Address'                     =>$data['address'],
                  'Markup'                      =>$data['markup'],
                  'general_markup'              =>$data['gen_markup'],
                  'Agency_Name'                 =>$data['agency_name'],
                  // 'Agent_Code' =>$data['agency_code'],
                  'Designation'                 =>$data['designation'],
                  'Iata_Status'                 =>$data['iata_status'],
                  'Iata_Reg_Number'             =>$data['iata_reg'],
                  'Nature_Business'             =>$data['nature_business'],
                  'Business_Type'               =>$data['business_type'],
                  'Preferred_Currency'          =>$data['preferred_currency'],
                  'Pincode'                     =>$data['pincode'],
                  'Fax'                         =>$data['fax'],
                  'Website'                     =>$data['website'],
                  'Username'                    =>$data['username'],
                  'First_Name_Accounts'         =>$data['first_name_accounts'],
                  'First_Name_Reservation'      =>$data['first_name_reservation'],
                  'First_Name_Management'       =>$data['first_name_management'],
                  'Email_Accounts'              =>$data['email_accounts'],
                  'Email_Reservation'           =>$data['email_reservation'],
                  'Email_Management'            =>$data['email_management'],
                  'Password_Accounts'           =>md5($data['password_accounts']),
                  'Password_Reservation'        =>md5($data['password_reservation']),
                  'Password_Management'         =>md5($data['password_management']),
                  'accounts_password'           =>$data['password_accounts'],
                  'reservation_password'        =>$data['password_reservation'],
                  'management_password'         =>$data['password_management'],
                  'Number_Accounts'             =>$data['number_accounts'],
                  'Number_Reservation'          =>$data['number_reservation'],
                  'Number_Management'           =>$data['number_management'],
                  'Updated_Date'                => date('Y-m-d'),
                  'Updated_By'                  =>  $this->session->userdata('id'),);
      }
        
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_agents',$data);
        return true;
    }
    public function room_type_single_data($id) {
        $this->db->where('id',$id);
        $this->db->from('hotel_tbl_agents');
        $this->db->limit('1');
        $query=$this->db->get();
        return $query->result();
    }
    public function edit($id) {
        $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $final= $query->result();
        return $final;
    }
    public function agent_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('hotel_tbl_agents');
      $final= $query->result();
      return $final;
    }
    public function agents_permission($request) {
      $data= array(
              'delflg' => $request['flag'],
              'updated_date' => date('Y-m-d'),
              'updated_by' =>  $this->session->userdata('id'),);
      $this->db->where('id',$request['id']);
      $this->db->update('hotel_tbl_agents',$data);
      return true;
    }
    public function front_end_select($id)
    {    
        $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->where('delflg',1);
        $this->db->where('id',$id);
        $this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query->result();
    }
    public function used_amount($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      // $this->db->where('booking_flag !=',0);
      // $this->db->where('booking_flag !=',2);
      // $this->db->where('booking_flag !=',4);
      $this->db->where('agent_id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function booking_counts($id,$flg,$year=Null) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      $this->db->where('agent_id',$id);
      $this->db->where('booking_flag',$flg);
      if ($year!=Null && $year!="All") {
        $this->db->like('Created_Date',$year);
      }
      $query=$this->db->get();
      return $query->result();
    }
    public function agent_details($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
      
    }
    public function agent_booking_detail($book_id) {
      $this->db->select('*,hotel_tbl_agents.id as agent_id');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id', 'left');
      $this->db->join('hotel_tbl_hotel_room_type','hotel_tbl_booking.room_id = hotel_tbl_hotel_room_type.id', 'left');
      $this->db->join('hotel_tbl_room_type','hotel_tbl_hotel_room_type.room_type = hotel_tbl_room_type.id', 'left');
      $this->db->join('hotel_tbl_agents','hotel_tbl_booking.agent_id = hotel_tbl_agents.id', 'left');
      $this->db->join('hotels_tbl_booking_invoice','hotel_tbl_booking.id = hotels_tbl_booking_invoice.booking_id', 'left');
      $this->db->where('hotel_tbl_booking.id',$book_id);
      // $this->db->where('hotel_tbl_booking.booking_flag !=',3);
      $query=$this->db->get();
      return $query->result();
    }
    public function add_agent_credit($agent_id,$amount) {
      $datas= array(
                    'Credit_amount' => $amount);
      $this->db->where('id',$agent_id);
      $this->db->update('hotel_tbl_agents',$datas);
      entryreport($this->session->userdata('id'),'','','hotel_tbl_agents',$agent_id, '',date("Y-m-d H:i:s"),'Updated agent credit amount','Agents','Update');
      return true;
    }
    public function amount_details($id,$year) {
      $this->db->select("SUM(used_amount) as usedAmount,SUM(credit_amount) as creditAmount, DATE_FORMAT(STR_TO_DATE(date, '%d/%m/%Y'),'%M') as months");
      $this->db->from('hotels_tbl_agent_amount_status');
      $this->db->where('agent_id',$id);
      $this->db->like('date',$year);
      $this->db->where('del_flg',1);
      $this->db->group_by("DATE_FORMAT(STR_TO_DATE(date, '%d/%m/%Y'),'%m-%Y')");
      $query=$this->db->get();
      return $query->result();

    }
    public function hotels_booking_counts($id,$flg) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      $this->db->where('hotel_id',$id);
      $this->db->where('booking_flag',$flg);
      $query=$this->db->get();
      return $query->result();
    }
    public function agents_credit_details($id){
      $this->db->select('*');
      $this->db->from('hotel_tbl_agent_credit_detail');
      $this->db->join('hotel_tbl_agents','hotel_tbl_agent_credit_detail.Agent_id = hotel_tbl_agents.id', 'left');
      $this->db->where('hotel_tbl_agent_credit_detail.Agent_id',$id);
      $query=$this->db->get();
      return $query;
    }
    public function add_credit_agent_($request,$amount){
      $data= array( 'Agent_id'       => $request['agent_id'],
                    'credit_amount'  => $amount+$request['amount'],
                    'Total_credit'   => $request['amount'],
                    'created_date'   => date('Y-m-d H:i:s'),
                    'created_by'     => $this->session->userdata('name'),
                );
      $this->db->insert('hotel_tbl_agent_credit_detail',$data);
      $data1= array( 'Credit_amount'   => $request['amount']+$amount,);
      $this->db->where('id',$request['agent_id']);
      $this->db->update('hotel_tbl_agents',$data1);
      return true;
  }
  public function agents_credit_details_view($id){
      $this->db->select('*');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function currency(){
    $this->db->select('*');
    $this->db->from('currency_update');
    $query=$this->db->get();
    return $query->result();

  }
  public function general_settings_select($id)
    {    
        $this->db->select('*');
        $this->db->from('hotel_tbl_agents');
        $this->db->where('id',$id);
        //$this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query->result();
    }
    public function GetTitle(){
        $this->db->select('*');
        $this->db->from('hotel_tbl_general_settings');
        $query=$this->db->get()->result();
        return $query;

  }
  public function hotelsBannerUpdate($request) {
    $data= array(
                  'htl_banner'                  => implode(",", $request['hotels_to']),
                  'Updated_Date'                => date('Y-m-d'),
                  'Updated_By'                  =>  $this->session->userdata('id'),
                );
    $this->db->where('id',$request['id']);
    $this->db->update('hotel_tbl_agents',$data);
  }
    
}
?>
