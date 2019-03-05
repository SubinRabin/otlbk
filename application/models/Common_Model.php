<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function general_settings_update($array) 
    {
        $this->db->where('id',1);
        $this->db->update('hotel_tbl_general_settings',$array);
        return true;
    }
    public function general_settings_select()
    {    
        $this->db->select('*');
        $this->db->from('hotel_tbl_general_settings');
        $this->db->where('id',1);
        $this->db->order_by('id','desc');
        $query=$this->db->get();
        return $query->result();
    }
    public function update($data,$id) {
      $data= array(
                'icon_name' =>$data['icons'],
                'updated_date' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('id'),
                  );
      $this->db->where('id',$id);
      $this->db->update('hotel_tbl_icons',$data);
      return true;
    }
    public function insert($data) {
      $datas= array(
                'icon_name' =>$data['icons'],
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('id'),
                   );
      $this->db->insert('hotel_tbl_icons',$datas);
      $agent_id = $this->db->insert_id();
      return $agent_id;
    }
    public function icon_select() {    
      $this->db->select('*');
      $this->db->from('hotel_tbl_icons');
      $this->db->order_by('id','desc');
        $query=$this->db->get();
      return $query;
    }
     public function edit($id) {
      $this->db->select('*');
      $this->db->from('hotel_tbl_icons');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $final= $query->result();
      return $final;
    }
    public function user_count() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_user');
      $this->db->where('Del_Flag',1);
      $query=$this->db->get();
      $final= $query->result();
      $count= count($final);
      return $count;
    }
    public function agent_count() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('delflg',1);
      $query=$this->db->get();
      $final= $query->result();
      $count= count($final);
      return $count;
    }
     public function hotel_count() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_hotels');
      $this->db->where('delflg',1);
      $query=$this->db->get();
      $final= $query->result();
      $count= count($final);
      return $count;
    }
    public function booking_count() {
      $this->db->select('*');
      $this->db->from('hotel_tbl_booking');
      // $this->db->where('booking_flag',1);
      $query=$this->db->get();
      $final= $query->result();
      $count= count($final);
      return $count;
    }
    public function agent_profile() {
      $id= $this->session->userdata('agent_id');
      $this->db->select('profile_image');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $final= $query->result();
      return $final;
    }
    public function general_settings_payment_update($data)
    {
      $this->db->where('id',1);
      $this->db->update('hotel_tbl_general_settings',$data);
      return true;
    }
    public function mail_settings_select()
    {    
      $this->db->select('*');
      $this->db->from('hotel_tbl_mail_setting');
      $this->db->where('id',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function mail_settings_update($data)
    {
      $this->db->where('id',1);
      $this->db->update('hotel_tbl_mail_setting',$data);
      return true;
    }
    public function country_booking_count() {
      $this->db->select('hotel_tbl_booking.*,hotel_tbl_hotels.*,count(hotel_tbl_booking.id) as count');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id','left');
      // $this->db->where('hotel_tbl_booking.booking_flag',1);
      $this->db->where('hotel_tbl_hotels.delflg',1);
      $this->db->group_by('country_code');
      $this->db->limit('10');
      $query=$this->db->get();
      return $query->result();
    }
    public function Report_country_booking_count($filter,$year) {
      if ($filter==2) {
        $query= $this->db->query("SELECT count(*) as cnt,sum(book_room_count*no_of_days) as tot,c.name as country FROM hotel_tbl_booking a inner join hotel_tbl_hotels b on b.id = a.hotel_id inner join countries c on c.sortname = b.country_code where a.booking_flag !=3 and a.booking_flag !=5 and a.booking_flag !=4 and a.booking_flag !=8 AND DATE_FORMAT(a.Created_Date, '%Y') = '".$year."' group by b.country_code limit 10")->result();
      } else if ($filter==1) {
        $query= $this->db->query("SELECT count(*) as cnt,sum(book_room_count*no_of_days) as tot,c.name as country FROM hotel_tbl_booking a inner join hotel_tbl_hotels b on b.id = a.hotel_id inner join countries c on c.sortname = b.country_code where DATE_FORMAT(a.Created_Date, '%Y') = '".$year."' group by b.country_code limit 10")->result();
      } else {
        $query= $this->db->query("SELECT count(*) as cnt,sum(book_room_count*no_of_days) as tot,c.name as country FROM hotel_tbl_booking a inner join hotel_tbl_hotels b on b.id = a.hotel_id inner join countries c on c.sortname = b.country_code where a.booking_flag =3 and DATE_FORMAT(a.Created_Date, '%Y') = '".$year."' group by b.country_code limit 10")->result();
      }
      return $query;
    }
    public function total_booking() {
      $this->db->select('hotel_tbl_booking.*,hotel_tbl_hotels.*,count(hotel_tbl_booking.id) as count');
      $this->db->from('hotel_tbl_booking');
      $this->db->join('hotel_tbl_hotels','hotel_tbl_booking.hotel_id = hotel_tbl_hotels.id','left');
      // $this->db->where('hotel_tbl_booking.booking_flag',1);
      $this->db->where('hotel_tbl_hotels.delflg',1);
      $this->db->group_by('country_code');
      $this->db->limit('10');
      $query=$this->db->get();
      return $query->result();
    }
    public function country_booking_status($status,$keyword) {
      if ($status==1) {
        $this->db->select('id');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('Created_Date LIKE','%'.$keyword.'%');
        $this->db->where('booking_flag',1);
        $query=$this->db->get();
      } else if ($status==0) {
        $this->db->select('id');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('Created_Date LIKE','%'.$keyword.'%');
        // $this->db->where('booking_flag !=',1);
        // $this->db->where('booking_flag !=',3);
        $query=$this->db->get();
      } else {
        $this->db->select('id');
        $this->db->from('hotel_tbl_booking');
        $this->db->where('Created_Date LIKE','%'.$keyword.'%');
        $this->db->where('booking_flag',3);
        $query=$this->db->get();
      }
      return $query->result();
    }
    public function check_password_reset($email) {
      $this->db->select('password_reset,Email');
      $this->db->from('hotel_tbl_user');
      $this->db->where('Email',$email);
      $query=$this->db->get();
      return $query->result();
    }
    public function added_currency_update($data){
     
      $this->db->insert('currency_update',$data);
      return $this->db->insert_id();
    }
    public function currency_type_list(){
    $this->db->select('*');
    $this->db->from('currency_update');
    return $query=$this->db->get();
  }
  public function added_currency_amount_update($data,$id){
      
      $amount=array( 'amount'     => $data,
                     'Updated_Date' => date("Y-m-d H:i:s"),
                     'Updated_By' =>  $this->session->userdata('id'),
                  );

      $this->db->where('id',$id);
      $this->db->update('currency_update',$amount);
      return true;
  }
  public function currency_type_get(){
    $this->db->select('*');
    $this->db->from('currency_update');
    $query=$this->db->get();
    return $query;

  }
  public function currency(){
    $this->db->select('*');
    $this->db->from('currency_update');
    $query=$this->db->get();
    return $query->result();

  }
  public function notification(){
    $this->db->select('*');
    $this->db->from('hotel_tbl_notification');
    $query=$this->db->get();
    return $query->result();
  }
  public function notify_remove($id,$user_id){
    $this->db->select('*');
    $this->db->from('hotel_tbl_notification');
    $this->db->where('id',$id);
    $query=$this->db->get();
    $final = $query->result();
    $explode_userID = explode(",", $final[0]->user_id);
    foreach ($explode_userID as $key => $value) {
      if ($value!=$user_id) {
        $userId_split[] = $value;
      }
    }
    $implode_userId = implode(",", $userId_split);
    $data = array('user_id'=>$implode_userId);
    $this->db->where('id',$id);
    $this->db->update('hotel_tbl_notification',$data);
   return true;
  }
  public function favourite_add($agent_id,$hotel_id){
    $data=array('agent_id'=>$agent_id,
                'fav_hotel_id'=>$hotel_id);
    $this->db->insert('hotel_tbl_favourite',$data);
    return true;
  }
  public function favourite_ajax_check($agent_id,$hotel_id){
    $this->db->select('*');
    $this->db->from('hotel_tbl_favourite');
    $this->db->where('agent_id',$agent_id);
    $this->db->where('fav_hotel_id',$hotel_id);
    $query=$this->db->get();
    if (count($query->result())!=0) {
      return 1;
    } else {
      return 0;
    } 
  }
  public function currency_auto_update() {
    $this->db->select('*');
    $this->db->from('currency_update');
    $query=$this->db->get();
    return $query->result();
  }
  public function PerRoleName(){
    $this->db->select('*');
    $this->db->from('hoteltableroles');
    $query=$this->db->get();
    return $query;

  }
  public function RoleEdit($id) {
    $this->db->where('id',$id);
    $this->db->from('hoteltableroles');
    $this->db->limit('1');
      $query=$this->db->get();
    return $query->result();
  }
  public function DeleteRoleModel($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('hoteltableroles');

    $this->db->where('role',$id);
    $this->db->delete('menupermissiontbl');
    return true;
  }
  public function RoleNameAdd($request){

    $data = array('role_name'  => $request['roleName'],
                  );
      //$this->db->where('id',$id);
      $this->db->insert('hoteltableroles',$data);
      return true;

  }
  public function defaultmenu() {
    $this->db->select('*');
    $this->db->from('permissionmainsubmenus');
    $query=$this->db->get();
    return $query->result();
  }
  public function menuEditdetails($id) {
    $this->db->select('*');
    $this->db->from('menupermissiontbl');
    $this->db->where('role',$id);
    $query=$this->db->get();
    return $query->result();
  }
  public function CheckboxValuesupdate($role,$id,$viewCheck,$createCheck,$editCheck,$deleteCheck){
    $this->db->select('*');
    $this->db->from('menupermissiontbl');
    $this->db->where('menu_id',$id);
    $this->db->where('role',$role);
    $query=$this->db->get();
    $menu = $query->result();
    if (count($menu)!=0) {
          $data= array( 
                    'view' =>$viewCheck,
                    'create' =>$createCheck,
                    'edit' =>$editCheck,
                    'delete' =>$deleteCheck,
                      );

          $this->db->where('menu_id',$id);
          $this->db->where('role',$role);
          $result = $this->db->update('menupermissiontbl',$data);
    } else {
          $data= array( 
                      'view' =>$viewCheck,
                      'create' =>$createCheck,
                      'edit' =>$editCheck,
                      'delete' =>$deleteCheck,
                      'menu_id' =>$id,
                      'role' =>$role,
                      );
          $result = $this->db->insert('menupermissiontbl',$data);
             
    }
    return true;
  }
  public function CheckboxValuesAdd($role,$id,$viewCheck,$createCheck,$editCheck,$deleteCheck){ 
    $data= array( 
            'view'    =>$viewCheck,
            'create'  =>$createCheck,
            'edit'    =>$editCheck,
            'delete'  =>$deleteCheck,
            'menu_id' =>$id,
            'role'    =>$role,
          );
     $result = $this->db->insert('menupermissiontbl',$data);
     return true;    
  }
  public function roleAdd($request) {
    $data= array( 
            'role_name' =>$request['roleName'],
          );
     $result = $this->db->insert('hoteltableroles',$data);
     $insert_id = $this->db->insert_id();
     return $insert_id;    
  }
  public function RoleUpdate($request) {
    $data= array( 
            'role_name' =>$request['roleName'],
          );
     $this->db->where('id',$request['edit_id']);
     $result = $this->db->Update('hoteltableroles',$data);
    
     return true;    
  }
  public  function get_all_RoleName($roleName ) {
    $this->db->select('*');
    $this->db->from('hoteltableroles');
    $this->db->where('role_name', $roleName);
    $query = $this->db->get()->result();
    if(count($query)==0){
        return true;
    } else {
        return false;
    }
  }
  public function SelectRole(){
    $this->db->select('*');
    $this->db->from('hoteltableroles');
    $query=$this->db->get();
    return $query->result();

  }
  public function RoleSelectAdd($id,$request){
    $data= array(
          'Category'=>$request['role'],
          );
    $this->db->where('id',$id);
    $result = $this->db->update('hotel_tbl_user',$data);
    return true;  
  }
  public function GetTitle(){
    $this->db->select('*');
    $this->db->from('hotel_tbl_general_settings');
    $query=$this->db->get()->result();
    return $query;

  }
  public function cusSuppportSave($request){
    $this->db->select('*');
    $this->db->from('CustomerSupport');
    $query=$this->db->get();
    $Cus = $query->result();
    if (count($Cus)==0) {
      $data= array( 
             'cusNumber'  => $request['cusNumber'],
             'cusEmail'   => $request['cusEmail'],
             'description'=> $request['description'],
             'id'         => 1,
          );
    $result = $this->db->insert('CustomerSupport',$data);
    
    } else {
      $data= array( 
             'cusNumber'  => $request['cusNumber'],
             'cusEmail'   => $request['cusEmail'],
             'description'=> $request['description'],
             
          );
    $this->db->where('id',1);
    $result = $this->db->update('CustomerSupport',$data);

    }
    return true;
  }
  public function customerSupportView(){
    $this->db->select('*');
    $this->db->from('CustomerSupport');
    $this->db->where('id',1);
    $query = $this->db->get();
    return $query->result();

  }
  public function HistoryLogs($module) {
    $query = array();
    if ($module == 'Users') {
      $query = $this->db->query('SELECT *,id as userid,CONCAT(First_Name," ",Last_Name) as name,Updated_Date as dateVal,"Admin" as userType,"Update" as event,"Updated Existing User" as narration,
        (SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By) as userName FROM hotel_tbl_user as a where a.Updated_Date!=""')->result();
    } else if($module == 'Agents') {
      $query = $this->db->query('SELECT *,id as userid,CONCAT(First_Name," ",Last_Name) as name,Updated_Date as dateVal,IF(Updated_By != "","Admin","Agent") as userType,"Update" as event,"Updated Existing Agent" as narration, IF(Updated_By != "",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By), (SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_agents WHERE id = a.id)) as userName FROM hotel_tbl_agents as a where  a.Updated_Date!=""')->result();
    } else if($module == 'Hotels') {
      $query = $this->db->query('SELECT *,id as userid,hotel_name as name,Updated_Date as dateVal,IF(Updated_By=" ","Hotel","Admin") as userType,"Update" as event,"Updated Existing  Hotel" as narration, IF(Updated_By!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.id)) as userName FROM hotel_tbl_hotels as a where a.updated_date!=""')->result();
    } else if($module == 'Rooms') {
      $query = $this->db->query('SELECT *,id as userid,room_name as name,updated_date as dateVal,"Admin" as userType,"Update" as event,CONCAT("updated Existing Room in ",(SELECT c.hotel_name FROM hotel_tbl_hotels as c where c.id = a.hotel_id)) as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by) as userName FROM hotel_tbl_hotel_room_type as a where a.updated_date!=""')->result();
    } else if($module == 'Contracts') {
      $query = $this->db->query('SELECT *,id as userid,contract_id as name,Updated_Date as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing contract in",(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as narration,IF(Updated_By!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_contract as a where a.Updated_Date!=""')->result();
    } else if($module== 'Room Type Master') {
      $query = $this->db->query('SELECT * ,id as userid,Room_Type as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,"Updated existing Room type " as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By) as userName FROM hotel_tbl_room_type as a where a.Updated_Date!=""')->result();
    } else if($module== 'Hotel Facility Master') {
      $query = $this->db->query('SELECT * ,id as userid,Hotel_Facility as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,"Updated Existing Hotel Facility" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By) as userName FROM hotel_tbl_hotel_facility as a where a.Updated_Date!=""')->result();
    } else if($module == 'Room Facility Master') {
      $query = $this->db->query('SELECT * ,id as userid,Room_Facility as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,"Updated Existing Room Facility" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By)as userName FROM hotel_tbl_room_facility as a where a.Updated_Date!=""')->result();
    } else if($module == 'Discounts') {
      $query = $this->db->query('SELECT *,id as userid,discountCode as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,CONCAT("Created new discount for ",a.contract) as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By) as userName FROM hoteldiscount as a where a.Updated_Date!=""')->result();
    } else if($module == 'Revenue') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType ,"Update" as event ,CONCAT("Updated new revenue for ",a.contracts) as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy) as userName FROM hotel_tbl_revenue as a where a.UpdatedDate!=""')->result();
    } else if($module == 'Booking') {
      $query1 = $this->db->query('SELECT * ,id as userid,booking_id as name,Updated_Date as dateVal,IF(Updated_By="0","Agent","Admin") as userType ,"Update" as event ,"Updated existed booking" as narration ,IF(Updated_By!="0",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By),(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_agents WHERE id = a.agent_id)) as userName FROM hotel_tbl_booking as a')->result();
      $query2 = $this->db->query('SELECT *,id as userid,BookingId as name,UpdatedDate as dateVal,IF(UpdatedBy="0","Agent","Admin") as userType ,"Update" as event ,"Updated existed booking" as narration ,a.UpdatedBy as userName FROM xml_hotel_booking as a')->result();
      $query = array_merge($query1,$query2);
    } else if($module=='Icons Settings') {
      $query = $this->db->query('SELECT * ,id as user_id,icon_name as name,updated_date as dateVal,"Admin" as userType ,"Update" as event ,"Created new Icon" as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by)!="",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by),"Existing Admin") as userName FROM hotel_tbl_icons as a where a.updated_date!=""')->result();
    } else if($module=='Availability') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing allotment for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_allotement as a where a.UpdatedDate!="" limit 500')->result();
    } else if($module=='Board Supplements') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing board supplements for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_boardsupplement as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } else if($module=='General Supplements') {
      $query = $this->db->query('SELECT *,id as userid,type as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing general supplement for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_generalsupplement as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } else if($module=='Extrabed') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing extrabed details for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_extrabed as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } else if($module=='Cancellation Policy') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing cancellation policy for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_cancellationfee as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } else if($module=='Minimum Stay') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing minimum stay details for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_minimumstay as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } else if($module=='Closeout Period') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,UpdatedDate as dateVal,"Admin" as userType,"Update" as event ,CONCAT("Updated existing closeout period details for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(UpdatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.UpdatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_closeout_period as a where a.UpdatedDate!="" order by a.UpdatedDate desc limit 500')->result(); 
    } 
    return $query;
  }
  public function HistoryOldLogs($module) {
    $query = array();
    if ($module == 'Users') {
      $query = $this->db->query('SELECT *,id as userid,CONCAT(First_Name," ",Last_Name) as name,Created_Date as dateVal,"Admin" as userType,"Create" as event,"Created new User" as narration,
        (SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By) as userName FROM hotel_tbl_user as a')->result();
    } else if($module == 'Agents') {
      $query = $this->db->query('SELECT *,id as userid,CONCAT(First_Name," ",Last_Name) as name,Created_Date as dateVal,IF(Created_By != "New","Admin","Agent") as userType,"Create" as event,"Created new Agent" as narration, IF(Created_By != "New",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By), (SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_agents WHERE id = a.id)) as userName FROM hotel_tbl_agents as a where a.Created_By IS NOT NULL and a.Created_Date IS NOT NULL')->result();
    } else if($module == 'Hotels') {
      $query = $this->db->query('SELECT *,id as userid,hotel_name as name,Created_Date as dateVal,IF(Created_By=" ","Hotel","Admin") as userType,"Create" as event,"Created New Hotel" as narration, IF(Created_By!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.id)) as userName FROM hotel_tbl_hotels as a')->result();
    } else if($module == 'Rooms') {
      $query = $this->db->query('SELECT *,id as userid,room_name as name,created_date as dateVal,"Admin" as userType,"Create" as event,CONCAT("Created New Room in ",(SELECT c.hotel_name FROM hotel_tbl_hotels as c where c.id = a.hotel_id)) as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.created_by)!="", (SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.created_by),"Existing Admin" ) as userName FROM hotel_tbl_hotel_room_type as a')->result();
    } else if($module == 'Contracts') {
      $query = $this->db->query('SELECT *,id as userid,contract_id as name,Created_Date as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new contract in",(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as narration,IF(Created_By!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_contract as a')->result();
    } else if($module== 'Room Type Master') {
      $query = $this->db->query('SELECT * ,id as userid,Room_Type as name,Created_Date as dateVal,"Admin" as userType ,"Create" as event ,"Created New Room type " as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By) as userName FROM hotel_tbl_room_type as a')->result();
    } else if($module== 'Hotel Facility Master') {
      $query = $this->db->query('SELECT * ,id as userid,Hotel_Facility as name,Created_Date as dateVal,"Admin" as userType ,"Create" as event ,"Created New Hotel Facility" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By) as userName FROM hotel_tbl_hotel_facility as a')->result();
    } else if($module == 'Room Facility Master') {
      $query = $this->db->query('SELECT * ,id as userid,Room_Facility as name,Created_Date as dateVal,"Admin" as userType ,"Create" as event ,"Created New Room Facility" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By)as userName FROM hotel_tbl_room_facility as a')->result();
    } else if($module == 'Discounts') {
      $query = $this->db->query('SELECT *,id as userid,discountCode as name,Created_Date as dateVal,"Admin" as userType ,"Create" as event ,CONCAT("Created new discount for ",a.contract) as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Created_By) as userName FROM hoteldiscount as a')->result();
    } else if($module == 'Revenue') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType ,"Create" as event ,CONCAT("Created new revenue for ",a.contracts) as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy) as userName FROM hotel_tbl_revenue as a')->result();
    } else if($module == 'Booking') {
      $query1 = $this->db->query('SELECT * ,id as userid,booking_id as name,Created_Date as dateVal,"Agent" as userType ,"Create" as event ,"Created new booking" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_agents WHERE id = a.Created_By) as userName FROM hotel_tbl_booking as a')->result();
      $query2 = $this->db->query('SELECT *,id as userid,BookingId as name,CreatedDate as dateVal,"Agent" as userType  ,"Create" as event ,"Created new booking" as narration ,(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_agents WHERE id = a.CreatedBy) as userName FROM xml_hotel_booking as a')->result();
      $query = array_merge($query1,$query2);
    } else if($module=='General Settings') {
      $query = $this->db->query('SELECT * ,id as user_id,"" as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,"Updated general settings" as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By)!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By),"Existing Admin") as userName
        FROM hotel_tbl_general_settings as a')->result();
    } else if($module=='Payment Settings') {
      $query = $this->db->query('SELECT * ,id as user_id,"" as name,Updated_Date as dateVal,"Admin" as userType ,"Update" as event ,CONCAT("Updated ",currency_name," currency") as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By)!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.Updated_By),"Existing Admin") as userName FROM currency_update as a')->result();
    } else if($module=='Icons Settings') {
      $query = $this->db->query('SELECT * ,id as user_id,icon_name as name,created_date as dateVal,"Admin" as userType ,"Create" as event ,CONCAT("Created ",icon_name," icon") as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.created_by)!="",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.created_by),"Existing Admin") as userName
          FROM hotel_tbl_icons as a')->result();
    } else if($module=='Mail Settings') {
      $query = $this->db->query('SELECT * ,id as user_id,"" as name,updated_date as dateVal,"Agent" as userType ,"Update" as event ,"Updated general mail settings" as narration ,IF((SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by)!="",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.updated_by),"Existing Admin") as userName FROM hotel_tbl_mail_setting as a')->result();
    } else if($module=='Availability') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new allotment for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_allotement as a limit 500')->result(); 
    } else if($module=='Board Supplements') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new board supplement for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_boardsupplement as a order by a.CreatedDate desc limit 500')->result(); 
    } else if($module=='General Supplements') {
      $query = $this->db->query('SELECT *,id as userid,type as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new general supplement for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_generalsupplement as a order by a.CreatedDate desc limit 500')->result(); 
    } else if($module=='Extrabed') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new general supplement for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_extrabed as a order by a.CreatedDate desc limit 500')->result(); 
    } else if($module=='Cancellation Policy') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new cancellation policy for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_cancellationfee as a order by a.CreatedDate desc limit 500')->result(); 
    } else if($module=='Minimum Stay') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new minimum stay for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_minimumstay as a order by a.CreatedDate desc limit 500')->result(); 
    } else if($module=='Closeout Period') {
      $query = $this->db->query('SELECT *,id as userid,"" as name,CreatedDate as dateVal,"Admin" as userType,"Create" as event ,CONCAT("Created new closeout period for",(SELECT contract_id FROM hotel_tbl_contract WHERE id = a.contract_id)) as narration,IF(CreatedBy!=" ",(SELECT CONCAT(First_Name, " ", Last_Name) FROM hotel_tbl_user WHERE id = a.CreatedBy),(SELECT hotel_name FROM hotel_tbl_hotels WHERE id = a.hotel_id)) as userName FROM hotel_tbl_closeout_period as a order by a.CreatedDate desc limit 500')->result(); 
    } 
    return $query;
  }
  public function customer_care_select() {    
    $this->db->select('*');
    $this->db->from('customersupport');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function customer_care_update($data) {
    $this->db->where('id',1);
    $this->db->update('customersupport',$data);
    return true;
  }
  public function about_update($data) {
    $this->db->where('id',1);
    $this->db->update('aboutdetails',$data);
    return true;
  }
  public function about_select() {    
    $this->db->select('*');
    $this->db->from('aboutdetails');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function checkoutsubmit($data) {
    $this->db->where('id',1);
    $this->db->update('tbl_checkout_provider',$data);
    return true;
  }
  public function checkoutdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_checkout_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function paypaldetails() {    
    $this->db->select('*');
    $this->db->from('tbl_paypal_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function paypalsubmit($data) {
    $this->db->where('id',1);
    $this->db->update('tbl_paypal_provider',$data);
    return true;
  }
  public function braintreesubmit($data) {
    $this->db->where('id',1);
    $this->db->update('tbl_braintree_provider',$data);
    return true;
  }
  public function braintreedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_braintree_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function molliesubmit($data) {
    $this->db->where('id',1);
    $this->db->update('tbl_mollie_provider',$data);
    return true;
  }
  public function molliedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_mollie_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function authorizeSIMsubmit($data) {    
   $this->db->where('id',1);
   $this->db->update('tbl_authorizeSIM_provider',$data);
   return true;
  }
  public function authorizeSIMdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_authorizeSIM_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function authorizeAIMsubmit($data) {    
   $this->db->where('id',1);
   $this->db->update('tbl_authorizeAIM_provider',$data);
   return true;
  }
  public function authorizeAIMdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_authorizeAIM_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function stripesubmit($data) {    
   $this->db->where('id',1);
   $this->db->update('tbl_stripe_provider',$data);
   return true;
  }
  public function stripedetails() {    
    $this->db->select('*');
    $this->db->from('tbl_stripe_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function make_backup_db($manual = false) {
        // if ((get_option('auto_backup_enabled') == "1" && time() > (get_option('last_auto_backup') + get_option('auto_backup_every') * 24 * 60 * 60)) || $manual == true) {
            $this->load->dbutil();
            $prefs       = array(
                'format' => 'zip',
                'filename' => date("Y-m-d-H-i-s") . '_backup.sql'
            );
            $backup      = $this->dbutil->backup($prefs);
            $backup_name = 'database_backup_' . date("Y-m-d-H-i-s") . '.zip';
            $backup_name = unique_filename(BACKUPS_FOLDER, $backup_name);
            $save        = BACKUPS_FOLDER . $backup_name;
            $this->load->helper('file');
            if (write_file($save, $backup)) {
                // if ($manual == false) {
                //     logActivity('Database Backup [' . $backup_name . ']', null);
                //     update_option('last_auto_backup', time());
                // } else {
                //     logActivity('Database Backup [' . $backup_name . ']');
                // }

                // $delete_backups = get_option('delete_backups_older_then');
                // // After write backup check for delete
                // if ($delete_backups != '0') {
                //     $backups = list_files(BACKUPS_FOLDER);
                //     $backups_days_to_seconds = ($delete_backups * 24 * 60 * 60);
                //     foreach ($backups as $b) {
                //         if ((time()-filectime(BACKUPS_FOLDER.$b)) > $backups_days_to_seconds) {
                //             @unlink(BACKUPS_FOLDER.$b);
                //         }
                //     }
                // }

                return true;
            }
        // }

        return false;
  }
  public function ActivityLogList($date) {
    $this->db->select('*');
    $this->db->from('tblactivitylog');
    if ($date!="") {
      $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") = "'.$date.'"');
    }
    $this->db->order_by('id','desc');
    $this->db->limit(500);
    $query=$this->db->get();
    return $query;
  }
  public function telrdetails() {    
    $this->db->select('*');
    $this->db->from('tbl_telr_provider');
    $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
  public function telrsubmit($data) {
    $this->db->where('id',1);
    $this->db->update('tbl_telr_provider',$data);
    return true;
  }
  public function getpaymentrecordsdata() {
    $this->db->select('a.*,b.First_Name as Fname,b.Last_Name as Lname,IF(a.provider="TBO",(select ConfirmationNo from xml_hotel_booking where id=a.bookingId),(select booking_id from hotel_tbl_booking where id=a.bookingId)) as bookingid');
    $this->db->from('tbl_onlinepaymentrecords a');
    $this->db->join('hotel_tbl_agents b','a.agentId = b.id', 'inner');
    $this->db->order_by('id','desc');
    $query=$this->db->get();
    return $query;
  }
  public function agent_info() {
      $id= $this->session->userdata('agent_id');
      $this->db->select('*');
      $this->db->from('hotel_tbl_agents');
      $this->db->where('id',$id);
      $query=$this->db->get();
      $final= $query->result();
      return $final;
  }
  public function hotelBannerDetails() {
    $this->db->select('htl_banner');
    $this->db->from('hotel_tbl_general_settings');
    $this->db->where('id',1);
    $result = $this->db->get()->result();
    return $result;
  }
  public function hotelsBannerUpdate($request) {
    $data= array(
                  'htl_banner'                  => implode(",", $request['hotels_to']),
                  'Updated_Date'                => date('Y-m-d'),
                  'Updated_By'                  =>  $this->session->userdata('id'),
                );
    $this->db->where('id',1);
    $this->db->update('hotel_tbl_general_settings',$data);
  }
}

