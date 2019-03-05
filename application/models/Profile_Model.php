<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
        $this->load->database();
	}
	public function profile_insert($data) {
		$datas= array(
                  'First_Name' =>$data['first_name'],
                  'Last_Name' =>$data['last_name'],
                  'Email' =>$data['email'],
                  'Phone_Number' =>$data['phone_number'],
                  'Birth_Date' =>$data['birth_date'],
                  'City' =>$data['city'],
                  'Country' =>$data['country'],
                  'Zip_Code' =>$data['email'],
                  'Address' =>$data['address'],
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  $this->session->userdata('id'),
                );
        $this->db->insert('hotel_tbl_profile',$datas);
        return;
	}
	public function profile_get($id) {
		$this->db->where('id',$id);
    $this->db->from('hotel_tbl_agents');
    $this->db->limit('1');
    $query=$this->db->get();
    return $query->result();
	}
	public function profile_update($data,$id) {
		 $data= array(
                  'First_Name'              =>$data['first_name'],
                  'Last_Name'               =>$data['last_name'],
                  'Email'                   =>$data['email'],
                  'Mobile'                  =>$data['phone'],
                  'Phone_Num'               =>$data['phone_num'],
                  'Date_Of_Birth'           =>$data['date'],
                  'Sex'                     =>$data['sex'],
                  'City'                    =>$data['city'],
                  'Country'                 =>$data['country'],
                  'Address'                 =>$data['address'],
                  'State'                   =>$data['state'],
                  'Designation'             =>$data['designation'],
                  'Pincode'                 =>$data['pin_code'],
                  'Fax'                     =>$data['fax'],
                  'Website'                 =>$data['web_site'],
                  'Nature_Business'         =>$data['nature_business'],
                  // 'Markup'                  =>$data['markup'],
                  'Business_Type'           =>$data['business_type'],
                  'Preferred_Currency'      =>$data['preferred_currency'],
                  'Iata_Status'             =>$data['iata_status'],
                  'Iata_Reg_Number'         =>$data['iata_reg'],
                  'First_Name_Accounts'     =>$data['First_Name_Accounts'],
                  'First_Name_Reservation'  =>$data['First_Name_Reservation'],
                  'First_Name_Management'   =>$data['First_Name_Management'],
                  'Email_Accounts'          =>$data['Email_Accounts'],
                  'Email_Reservation'       =>$data['Email_Reservation'],
                  'Email_Management'        =>$data['Email_Management'],
                  'Number_Accounts'         =>$data['Number_Accounts'],
                  'Number_Reservation'      =>$data['Number_Reservation'],
                  'Password_Accounts'       =>md5($data['password_accounts']),
                  'Password_Reservation'    =>md5($data['password_reservation']),
                  'Password_Management'     =>md5($data['password_management']),
                  'accounts_password'       =>$data['password_accounts'],
                  'reservation_password'    =>$data['password_reservation'],
                  'management_password'     =>$data['password_management'],
                  'Number_Management'       =>$data['Number_Management'],
                  'Updated_Date'            => date('Y-m-d H:i:s'),
                  'Updated_By'              => '',
                );
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_agents',$data);
        return true;
	}
	public function password_update($data,$id) {
		 $data= array(
                  'password' =>md5($data['new_password']),
              );
        $this->db->where('id',$id);
        $this->db->update('hotel_tbl_agents',$data);
        entryreport('',$id,'','hotel_tbl_agents',$id,'',date("Y-m-d H:i:s"),'Password changed','Agents','Update');
        return true;
	}

  public function agent_reg_insert($data,$agent_id) {
    $datas= array(
                  'Agent_Code' =>$agent_id,
                  'Agency_Name' =>$data['agency_name'],
                  'Email' =>$data['email'],
                  'First_Name' =>$data['first_name'],
                  'Last_Name' =>$data['last_name'],
                  'Designation' =>$data['designation'],
                  'Fax' =>$data['fax'],
                  'Preferred_Currency' =>$data['preferred_currency'],
                  'Phone_Num' =>$data['telephone'],
                  'Mobile' =>$data['phone'],
                  'Nature_Business' =>$data['nature_business'],
                  'Business_Type' =>$data['business_type'],
                  'Website' =>$data['website'],
                  'City' =>$data['city'],
                  'Country' =>$data['country'],
                  'Pincode' =>$data['pincode'],
                  'Address' =>$data['address'],
                  'Iata_Status' =>$data['iata_status'],
                  'Iata_Reg_Number' =>$data['iata_reg'],
                  'Username' => $data['username'],
                  'Password' => md5($data['password']),
                  'First_Name_Accounts' => $data['first_name_accounts'],
                  'First_Name_Reservation' => $data['first_name_reservation'],
                  'First_Name_Management' => $data['first_name_management'],
                  'Email_Accounts' => $data['email_accounts'],
                  'Email_Reservation' => $data['email_reservation'],
                  'Email_Management' => $data['email_management'],
                  'Number_Accounts' => $data['number_accounts'],
                  'Number_Reservation' => $data['number_reservation'],
                  'Number_Management' => $data['number_management'],
                  'Password_Accounts'           =>md5($data['password_accounts']),
                  'Password_Reservation'        =>md5($data['password_reservation']),
                  'Password_Management'         =>md5($data['password_management']),
                  'accounts_password'           =>$data['password_accounts'],
                  'reservation_password'        =>$data['password_reservation'],
                  'management_password'         =>$data['password_management'],
                  'delflg' => '2',
                  'Created_Date' => date('Y-m-d'),
                  'Created_By' =>  "new",
                );
      $this->db->insert('hotel_tbl_agents',$datas);
      $agent_id = $this->db->insert_id();
      $this->db->select('*');
      $this->db->from('hotel_tbl_user');
      $query1=$this->db->get();
      $result1 = $query1->result();
      foreach ($result1 as $key => $value) {
        $user_id[] = $value->id;
      }
      $implode = implode(",", $user_id);

      $data = array('user_id' => $implode,
                    'notification_type' => 'You have new Agent Registration Request',
                    'notification_msg' => 'You have new Agent Registration Request');

      $this->db->insert('hotel_tbl_notification',$data);
      
      $datas1 = array('user_id' => $implode,
                'notification_type' => 'agent_request');

      $this->db->insert('hotel_tbl_notifications_list',$datas1);
      return $agent_id;
  }
  public function agent_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('hotel_tbl_agents');
      $final= $query->result();
      return $final;
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
    public function currency(){
    $this->db->select('*');
    $this->db->from('currency_update');
    $query=$this->db->get();
    return $query->result();

  }
}
